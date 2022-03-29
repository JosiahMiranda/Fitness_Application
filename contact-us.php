<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="assignment.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="plugin/jquery.validate.js"></script>
    <script src='script.js'></script>

</head>

<body>
    <?php
            require_once("includes/header.php");
            require_once("includes/navbar.php");
    ?>

    <div class="formContainer">
        <form action="mailto:LIFE@localcouncil.com" name="contact-us" method="POST" enctype="text/plain">

            <h1>Contact Us</h1>
            <hr>
            <br>
            <label for="address">Address</label>
            <br>
            <input class="contactus" type="text" id="address" name="address" placeholder="Your address...">
            <br>
            <label for="email">Email</label>
            <br>
            <input class="contactus" type="email" id="email" name="email" placeholder="Your email...">
            <br>
            <label for="enquiry">Enquiry</label>
            <br>
            <textarea class="contactus" id="enquiry" name="enquiry" placeholder="What can we help you with?..."></textarea>
            <br>

            <button class="contactusButton" type="submit">Submit</button>

        </form>
    </div>

    <?php
        require_once("includes/footer.php");
    ?>
</body>

</html>