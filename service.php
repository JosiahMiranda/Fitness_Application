<?php require_once('includes/authorise.php'); ?>
<?php
    $id = (int) $_GET['id'];
    $service = getService($id);

    $errors = [];
    if(isset($_POST['activity'])) {
        $email = getLoggedInUser()['email'];

        $errors = recordActivity($email, $id, $_POST);
    }

    if(isset($_POST['amountCalories']) && trim($_POST['amountCalories']) != '' && $_POST['amountCalories'] >= 1000 && $_POST['amountCalories'] <= 4000) {
        // run generate meal plan code
        removeUserMeals(getLoggedInUser()['email']);
        generateMealPlan($_POST);
        // print_r('Ran!');
        redirect('healthy-habit-meal.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myServices</title>
    <link rel="stylesheet" href="assignment.css"/>
    <?php
        require_once("includes/bootstrap.php");
    ?>
        
</head>
<body>
    <?php require_once('includes/header.php'); ?>
    <?php require_once('includes/navbar.php'); ?>

    <div class="container">
        <div class="containerCenter textcenter">
            <div class="mb-5 center">
                <h1 class="textcenter center">
                    <?php echo $service['name']; ?>
                </h1>
                <img class="center" src="<?php echo $service['image_path']; ?>" />
            </div>

            <?php if($id === 1) { ?>
                <p>Choose the best yoga type below that matches your needs!</p>

                <?php // The form below is displayed if type has not been submitted. ?>
                <?php if(!isset($_POST['type'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>

                    <form method="post">
                        <div class="form-group">
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>" />
                                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                                </div>
                            <?php } ?>
                            <?php if(isset($_POST['service'])) { ?>
                                <div class='text-danger'>You must select a yoga type.</div>
                            <?php } ?>
                        </div>

                        <button type="submit" class="btn btn-primary mr-5" name="service">Go</button>
                        <br>
                        <a href="myServices.php" class="btn btn-primary mr-5">Back to myServices</a>
                    </form>
                <?php } else { ?>
                    <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

                    <h3><?php echo $serviceInstruction['service_type']; ?></h3>
                    <video class="my-3 service" height="400" controls>
                        <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                    </video>

                    <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                        <form method="post">
                            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

                            <div class="center">
                                <label for="duration">Duration (minutes)</label>
                                <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                                    <?php displayValue($_POST, 'duration'); ?> />
                                <?php displayError($errors, 'duration'); ?>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
                            <br>
                            <a href="" class="servicelink">Cancel</a>
                        </form>
                    <?php } else { ?>
                        <div class="alert alert-success">
                            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                            <strong><?php echo $_POST['type']; ?> Yoga</strong>.
                        </div>
                        <div>
                            <a href="" class="servicelink">More <?php echo $service['name']; ?></a>
                            <br>
                            <a href="myServices.php" class="btn btn-primary mr-5">Back to myServices</a>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } elseif($id === 2) { ?>
                <p>Choose the best meditation type below that matches your needs!</p>

                <?php // The form below is displayed if type has not been submitted. ?>
                <?php if(!isset($_POST['type'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>

                    <form method="post">
                        <div>
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>" />
                                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                                </div>
                            <?php } ?>
                            <?php if(isset($_POST['service'])) { ?>
                                <div class='text-danger'>You must select a meditation type.</div>
                            <?php } ?>
                        </div>

                        <button type="submit" class="btn btn-primary mr-5" name="service">Go</button>
                        <br>
                        <a href="myServices.php" class="btn btn-primary mr-5">Back to myServices</a>
                    </form>
                <?php } else { ?>
                    <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

                    <h3><?php echo $serviceInstruction['service_type']; ?></h3>
                    <video class="my-3 service" height="400" controls>
                        <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                    </video>

                    <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                        <form method="post">
                            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

                            <div class="center">
                                <label for="duration">Duration (minutes)</label>
                                <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                                    <?php displayValue($_POST, 'duration'); ?> />
                                <?php displayError($errors, 'duration'); ?>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
                            <br>
                            <a href="" class="servicelink">Cancel</a>
                        </form>
                    <?php } else { ?>
                        <div class="alert alert-success">
                            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                            <strong><?php echo $_POST['type']; ?> Meditation</strong>.
                        </div>
                        <div>
                            <a href="" class="servicelink">More <?php echo $service['name']; ?></a>
                            <br>
                            <a href="myServices.php" class="btn btn-primary mr-5">Back to myServices</a>
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php } elseif($id === 3) { ?>
                <p>Choose the best stretching type below that matches your needs!</p>

                <?php // The form below is displayed if type has not been submitted. ?>
                <?php if(!isset($_POST['type'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>

                    <form method="post">
                        <div class="form-group">
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>" />
                                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                                </div>
                            <?php } ?>
                            <?php if(isset($_POST['service'])) { ?>
                                <div class='text-danger'>You must select a stretching type.</div>
                            <?php } ?>
                        </div>

                        <button type="submit" class="btn btn-primary mr-5" name="service">Go</button>
                        <br>
                        <a href="myServices.php" class="btn btn-primary mr-5">Back to myServices</a>
                    </form>
                <?php } else { ?>
                    <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

                    <h3><?php echo $serviceInstruction['service_type']; ?></h3>
                    <video class="my-3 service" height="400" controls>
                        <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                    </video>

                    <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                        <form method="post">
                            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

                            <div class="center">
                                <label for="duration">Duration (minutes)</label>
                                <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                                    <?php displayValue($_POST, 'duration'); ?> />
                                <?php displayError($errors, 'duration'); ?>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
                            <br>
                            <a href="" class="servicelink">Cancel</a>
                        </form>
                    <?php } else { ?>
                        <div class="alert alert-success">
                            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                            <strong><?php echo $_POST['type']; ?> Stretching</strong>.
                        </div>
                        <div>
                            <a href="" class="servicelink">More <?php echo $service['name']; ?></a>
                            <br>
                            <a href="myServices.php" class="btn btn-primary mr-5">Back to myServices</a>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } elseif($id === 4) { ?>
                <p>Let's start planning your meals!</p>

                <?php // The form below is displayed if type has not been submitted. ?>
                <?php if(!isset($_POST['amountCalories']) || trim($_POST['amountCalories']) == ''
                            || $_POST['amountCalories'] < 1000 || $_POST['amountCalories'] > 4000) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>

                    <form method="post">
                        <div class="form-group">
                        <div class="formContainer center" id="planner">

                            <h1>What type of meal?</h1>
                            <input type="radio" id="anythingMeal" name="mealType" value="Anything" checked>
                              <label for="anythingMeal">Anything</label>
                              <input type="radio" id="vegetarianMeal" name="mealType" value="Vegetarian">
                              <label for="vegetarianMeal">Vegetarian</label>

                            <p>I want to eat <span><input type="text" placeholder="Amount" name="amountCalories" id="amountCalories" value=1400></span>
                                Calories <span class="regError" id="calorieError"></span></p>

                            <p>In
                                <span>
                                    <select name="numMeals" id="numMeals">
                                        <option value="3">3 meals</option>
                                        <option value="4">4 meals</option>
                                    </select>
                                </span>
                            </p>
                        </div>
                            <?php if(isset($_POST['service'])) { ?>
                                <div class='text-danger'>You must input calories between 1000 and 4000.</div>
                            <?php } ?>
                        </div>

                        <button type="submit" class="btn btn-primary mr-5" name="service">Generate Meal Plan</button>
                    </form>

                    <a href="healthy-habit-meal.php" class="btn btn-primary mr-5" name="view">View Meal Plan</a>
                    

                    <a href="myServices.php" class="btn btn-primary mr-5">Back to myServices</a>

                    <?php 
                        //    generateMealPlan('Vegetarian', 3, 1400);
                        
                    ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

    <?php require_once('includes/footer.php'); ?>
</body>
</html>
