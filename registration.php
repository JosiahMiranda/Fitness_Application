<?php require_once('includes/functions.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['register'])) {
        $errors = registerUser($_POST);

        if(count($errors) === 0)
            redirect('myServices.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assignment.css" />

</head>

<body>
    <script src='script.js'></script>
    <?php
        require_once("includes/header.php");
        require_once("includes/navbar.php");
    ?>

    <form method="post">
        <div class="formContainer">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="firstName"><b>First Name</b></label>
            <input class="register" type="text" placeholder="Enter First Name" name="firstName" id="firstName"
               <?php displayValue($_POST, 'firstName'); ?> />
            <?php displayError($errors, 'firstName'); ?>

            <label for="lastName"><b>Last Name</b></label>
            <input class="register" type="text" placeholder="Enter Last Name" name="lastName" id="lastName"
               <?php displayValue($_POST, 'lastName'); ?> />
            <?php displayError($errors, 'lastName'); ?>

            <label for="email"><b>Email</b></label>
            <input class="register" type="text" placeholder="Enter Email" name="email" id="email"
               <?php displayValue($_POST, 'email'); ?> />
            <?php displayError($errors, 'email'); ?>

            <label for="emailRepeat"><b>Confirm Email</b></label>
            <input class="register" type="text" placeholder="Enter Email Again" name="emailRepeat" id="emailRepeat"
                onpaste="return false;" <?php displayValue($_POST, 'emailRepeat'); ?> />
            <?php displayError($errors, 'emailRepeat'); ?>

            <label for="phone"><b>Phone Number </b></label>
            <input class="register" type="text" placeholder="+61 4xx xxx xxx" name="phone" id="phone"
               <?php displayValue($_POST, 'phone'); ?> />
            <?php displayError($errors, 'phone'); ?>

            <label for="age"><b>Age: </b><span id="ageShown">18</span></label>
            <input type="range" min="16" max="120" value="18" class="ageSlider" id="age" name="age" oninput="updateAge()">
            <?php displayError($errors, 'age'); ?>

            <p><b>Are you a student? </b></p>
            <input type="radio" id="yesStudent" name="studentStatus" value="true" oninput="updateMembershipFee()">
              <label for="yesStudent">Yes</label>
              <input type="radio" id="noStudent" name="studentStatus" value="false" oninput="updateMembershipFee()">
              <label for="noStudent">No</label>
            <?php displayError($errors, 'studentStatus'); ?>

            <p><b>Are you employed? </b></p>
            <input type="radio" id="yesEmployed" name="employmentStatus" value="true" oninput="updateMembershipFee()">
              <label for="yesEmployed">Yes</label>
              <input type="radio" id="noEmployed" name="employmentStatus" value="false" oninput="updateMembershipFee()">
              <label for="noEmployed">No</label>
            <?php displayError($errors, 'employmentStatus'); ?>

            <div class='form-group'>
               <label for="password">*Password</label>
               <input type="password" class="register" id="password" name="password" />
               <?php displayError($errors, 'password'); ?>
            </div>

            <div class='form-group'>
               <label for="confirmPassword">*Confirm password</label>
               <input type="password" class="register" id="confirmPassword" name="confirmPassword" />
               <?php displayError($errors, 'confirmPassword'); ?>
            </div>

            <h2>Membership Fee: $<span id="fee">10</span>/month</h2>

            <button type="submit" name="register" class="registerbutton">Register</button>
        </div>
    </form>

    <?php
        require_once("includes/footer.php");
    ?>
</body>

</html>