<?php require_once('includes/authorise.php'); ?>
<?php 

    // check here that the user actually has a meal. If they don't already, redirect to the myServices page.

    $email = getLoggedInUser()['email'];
    $meals = getUserMeals($email);

    if (empty($meals)) {
        redirect('myServices.php');
    }
    
    $totalCalories = 0;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Meal Plan</title>
    <link rel="stylesheet" href="assignment.css" />
    <?php
        require_once("includes/bootstrap.php");
    ?>
    <script src='script.js'></script>
</head>

<body>

    <?php
        require_once("includes/header.php");
        require_once("includes/navbar.php");
    ?>

        <?php // foreach($meals as $meal) {?>

            <?php // $meal_info = getMeal($meal['meal_id']); ?>
            <!-- <h1><?php //echo $meal_info['name'] ?></h1> -->

        <?php  // } ?>

    <div class="containerCenter textcenter">
        <div class="center">
            <h1>Here's your meal plan, <?php echo getLoggedInUser()['first_name']; ?></h1>

            <?php for ($mealNumber = 0; $mealNumber < count($meals); $mealNumber++) { ?>
                
                <h3>Meal number <?php echo $mealNumber+1; ?>:</h3>
                <?php $meal_info = getMeal($meals[$mealNumber]['meal_id']); ?>
                <img class="mealImg" src=<?php echo $meal_info['image_path'] ?> alt=<?php echo $meal_info['name'] ?>></img>
                <h4><?php echo $meal_info['name'] ?></h4>
                <h4>Calories of single serving: <?php echo toCal($meal_info['kilojoules']); ?></h4>
                <h4>No. servings: <?php echo $meals[$mealNumber]['servings'] ?></h4>
                <h4>Overall Calories: <?php echo $meals[$mealNumber]['servings']*toCal($meal_info['kilojoules']); ?></h4>
                <hr>
                <?php $totalCalories += $meals[$mealNumber]['servings']*toCal($meal_info['kilojoules']); ?>

            <?php } ?>

            <h1>Total Calories: <?php echo $totalCalories; ?></h1>
            <a href="service.php?id=4" class="btn btn-primary mr-5">Back to Healthy Habits</a>
        </div>
    </div>

    <br>
    
        


    <!-- <article>
        <h1>There is a meal here!</h1>

    </article> -->

    <?php
        require_once("includes/footer.php");
    ?>
</body>

</html>