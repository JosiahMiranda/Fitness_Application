<?php require_once('includes/functions.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['login'])) {
        $errors = loginUser($_POST);

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
    <title>Login</title>
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
            <h1>Login</h1>
            <hr>

            <label for="email"><b>Email</b></label>
            <input class="register" type="text" placeholder="Enter Email" name="email" id="email"
               <?php displayValue($_POST, 'email'); ?> />
            <?php displayError($errors, 'email'); ?>

            <div class='form-group'>
               <label for="password">*Password</label>
               <input type="password" class="register" id="password" name="password" />
               <?php displayError($errors, 'password'); ?>
            </div>

            <button type="submit" name="login" class="registerbutton">Login</button>
        </div>
    </form>

    <?php
        require_once("includes/footer.php");
    ?>
</body>

</html>