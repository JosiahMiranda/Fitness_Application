<?php

require_once('db_functions.php');

// Constants.
const USER_SESSION_KEY = 'user';

// Always call session_start.
session_start();

// --- Utils ----------------------------------------------------------------------------------
function displayError($errors, $name) {
    if(isset($errors[$name]))
        echo "<div class='regError'>{$errors[$name]}</div> <br>";
}

function displayValue($form, $name) {
    if(isset($form[$name]))
        echo 'value="' . htmlspecialchars($form[$name]) . '"';
}

function redirect($location) {
    header("Location: $location");
    exit();
}

// --- User -----------------------------------------------------------------------------------
function isUserLoggedIn() {
    return isset($_SESSION[USER_SESSION_KEY]);
}

function getLoggedInUser() {
    return isUserLoggedIn() ? $_SESSION[USER_SESSION_KEY] : null;
}

function loginUser($form) {
    $errors = [];

    $key = 'email';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
        $errors[$key] = 'Email is invalid.';

    $key = 'password';
    if(!isset($form[$key]) || strlen($form[$key]) < 6)
        $errors[$key] = 'Password is required and must contain at least 8 characters.';

    if(count($errors) === 0) {
        $user = getUser($form['email']);

        if($user !== false && $form['password'] === $user['password'])
            // Set session variable to login user.
            $_SESSION[USER_SESSION_KEY] = $user;
        else
            $errors[$key] = 'Login failed, email and / or password incorrect. Please try again.';
    }

    return $errors;
}

function logoutUser() {
    // Unset all session variables.
    session_unset();
}

function registerUser($form) {
    $errors = [];

    $key = 'firstName';
    if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
        $errors[$key] = 'First name is required.';

    $key = 'lastName';
    if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
        $errors[$key] = 'Last name is required.';

    $key = 'email';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
        $errors[$key] = 'Email is invalid.';
    else if(getUser($form[$key]) !== false)
        $errors[$key] = 'Email is already registered.';

    $key = 'emailRepeat';
    if(!isset($form[$key]) || $form['email'] !== $form[$key])
        $errors[$key] = 'Email does not match.';

    $key = 'phone';
    if(!isset($form[$key]) || preg_match('/^\+61 4\d{2} \d{3} \d{3}$/', $form[$key]) !== 1)
        $errors[$key] = 'Phone number is invalid. Must be in the format: +61 4xx xxx xxx';

    $key = 'age';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 16, 'max_range' => 120]]) === false)
        $errors[$key] = 'Minimum age is 16.';

    $key = 'studentStatus';
    if(!isset($form[$key]) || preg_match('/^true|false$/', $form[$key]) !== 1)
        $errors[$key] = 'Must select student status.';

    $key = 'employmentStatus';
    if(!isset($form[$key]) || preg_match('/^true|false$/', $form[$key]) !== 1)
        $errors[$key] = 'Must select employment status.';
    
    // start with capital letter
    // must have at least 8 characters
    // must have a hyphen or underscore
    // must end with a number

    $key = 'password';
    if(!isset($form[$key]) ||
    preg_match('/^[A-Z][a-zA-Z0-9._-]*((\w{5}(_|-))|(\w{4}(_|-)\w{1})|(\w{3}(_|-)\w{2})|(\w{2}(_|-)\w{3})|(\w{1}(_|-)\w{4})|((_|-)\w{5}))[a-zA-Z0-9._-]*\d$/', $form[$key]) !== 1)
        $errors[$key] = 'Password must start with a capital letter, have at least 8 characters,
        contain a hyphen or underscore, and end with a number.';
    
    $key = 'confirmPassword';
    if(isset($form['password']) && (!isset($form[$key]) || $form['password'] !== $form[$key]))
        $errors[$key] = 'Passwords do not match.';

    if(count($errors) === 0) {
        // Add user.
        $user = [
            'firstname' => htmlspecialchars(trim($form['firstName'])),
            'lastname' => htmlspecialchars(trim($form['lastName'])),
            'email' => trim($form['email']),
            'phone' => htmlspecialchars(trim($form['phone'])),
            'age' => filter_var($form['age'], FILTER_VALIDATE_INT),
            'student_status' => (int) filter_var($form['studentStatus'], FILTER_VALIDATE_BOOLEAN),
            'employment_status' => (int) filter_var($form['employmentStatus'], FILTER_VALIDATE_BOOLEAN),
            'password' => $form['password']
        ];

        // Insert user.
        insertUser($user);

        // Auto-login the registered user.
        loginUser([
            'email' => $user['email'],
            'password' => $form['password']
        ]);
        
    }

    return $errors;
}

// --- Services -------------------------------------------------------------------------------
function recordActivity($email, $serviceID, $form) {
    $errors = [];

    $key = 'duration';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1, 'max_range' => 480]]) === false)
        $errors[$key] = 'Duration must be a whole number and not be less than 1 or greater than 480.';
    
    if(count($errors) === 0) {
        // Prepare activity data.
        $activity = [
            'email' => $email,
            'service_id' => $serviceID,
            'service_type' => $form['type'],
            'duration_minutes' => filter_var($form['duration'], FILTER_VALIDATE_INT)
        ];

        // Insert activity into database.
        insertActivity($activity);
    }

    return $errors;
}

// --- Meal Planner ---------------------------------------------------------------------------

function generateMealPlan($form) {

    $type = $form['mealType'];
    // print_r('Mealtype is '.$type);
    $numMeals = $form['numMeals'];
    $numCalories = $form['amountCalories'];

    $email = getLoggedInUser()['email'];
    $meals = getMeals($type);
    $averageCalories = $numCalories / $numMeals;
    // print_r($meals);

    // get all of the foods that are only of the type specified
    // divide the number of calories by the number of meals and attempt to even calories per meal
    // get all possible meals and choose a random one
    // for every meal afterwards, don't include a meal that has already been chosen so they dont eat the same thing throughout meals.
    // return this information as an array
    // generate that meal plan by inserting into the database

    // insert to user_meal per meal.

    $newMeals = array();

    for ($mealNumber = 0; $mealNumber < $numMeals; $mealNumber++) {

        $possibleMeals = array();

        foreach($meals as $meal) {
            if (toCal($meal['kilojoules']) < $averageCalories && !in_array($meal, $newMeals)) {
                array_push($possibleMeals, $meal);
            }
        }
        
        $randomMeals = array_rand($possibleMeals, 1);
        array_push($newMeals, $possibleMeals[$randomMeals]);

        // now we find out how many servings the user can have in the meal plan for each meal
        $numServings = round($averageCalories/toCal($newMeals[$mealNumber]['kilojoules']));  

        $mealToInsert = [
            'email' => $email,
            'meal_id' => $newMeals[$mealNumber]['meal_id'],
            'servings' => $numServings
        ];

        // print_r($mealToInsert);
    
        insertMeal($mealToInsert);

    }

    

    



}

// convert kilojoules to calories
function toCal($kilojoules) {
    $cal = intdiv($kilojoules, 4);
    // print_r($kilojoules." divded by 4 = ".$cal." ");
    return $cal;
}
