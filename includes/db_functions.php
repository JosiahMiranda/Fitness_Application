<?php

// Constants.
const SERVER_NAME = 'rmit.australiaeast.cloudapp.azure.com';
const DB_NAME = 's3782051_a2';
const USERNAME = 's3782051_a2';
const PASSWORD = '123ea123';

const DNS = 'mysql:host=' . SERVER_NAME . ';dbname=' . DB_NAME;

// --- Utils ----------------------------------------------------------------------------------
function createConnection() {
    return new PDO(DNS, USERNAME, PASSWORD);
}

function prepareAndExecute($query, $params = null) {
    $pdo = createConnection();
    $statement = $pdo->prepare($query);
    $statement->execute($params);

    return $statement;
}

function prepareExecuteAndFetchAll($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function prepareExecuteAndFetch($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

// --- User -----------------------------------------------------------------------------------
function getUsers() {
    return prepareExecuteAndFetchAll('select * from user');
}

function getUser($email) {
    return prepareExecuteAndFetch('select * from user where email = :email', ['email' => $email]);
}

function insertUser($user) {
    return prepareAndExecute(
        'insert into user
        (email, password, first_name, last_name, phone, age, is_student, is_employed) values
        (:email, :password, :firstname, :lastname, :phone, :age, :student_status, :employment_status)', $user);
}

// --- Meal Planner ---------------------------------------------------------------------------

function getUserMeals($email) {

    return prepareExecuteAndFetchAll(
        'select * from user_meal where email = :email', ['email' => $email]);

}

function getMeal($meal_id) {
    return prepareExecuteAndFetch(
        'select * from meal where meal_id = :meal_id', ['meal_id' => $meal_id]);
}

function getMeals($type) {

    if ($type == 'Vegetarian') {
        return prepareExecuteAndFetchAll(
            'select * from meal where type = :type', ['type' => 'Vegetarian']);
    } else {
        return prepareExecuteAndFetchAll(
            'select * from meal');
    }

}

function removeUserMeals($email) {
    return prepareAndExecute(
        'delete from user_meal where email = :email', ['email' => $email]);
}

function insertMeal($meal) {
    return prepareAndExecute(
        'insert into user_meal
        (email, meal_id, servings) values
        (:email, :meal_id, :servings)', $meal);
}

// --- Services -------------------------------------------------------------------------------
function getServices($name = null) {
    if(empty($name)) {
        return prepareExecuteAndFetchAll('select * from service');
    }

    return prepareExecuteAndFetchAll(
        'select * from service where name like concat(\'%\', :name, \'%\')', ['name' => $name]);
}

function getService($id) {
    return prepareExecuteAndFetch('select * from service where service_id = :id', ['id' => $id]);
}

function getUserService($email, $serviceId) {
    return prepareExecuteAndFetchAll('select * from user_service where service_id = :id AND email = :email', ['email' => $email, 'id' => $serviceId]);
}

function getUserServiceOnDate($email, $serviceId, $date) {
    return prepareExecuteAndFetchAll('select * from user_service where service_id = :id AND email = :email AND date_performed = :date', ['email' => $email, 'id' => $serviceId, 'date' => $date]);
}

function getServiceInstructions($id) {
    return prepareExecuteAndFetchAll('select * from service_instruction where service_id = :id', ['id' => $id]);
}

function getServiceInstruction($id, $type) {
    return prepareExecuteAndFetch(
        'select * from service_instruction where service_id = :id and service_type = :type',
        ['id' => $id, 'type' => $type]);
}

function insertActivity($activity) {
    return prepareAndExecute(
        'insert into user_service
        (email, service_id, service_type, date_performed, duration_minutes) values
        (:email, :service_id, :service_type, now(), :duration_minutes)', $activity);
}
