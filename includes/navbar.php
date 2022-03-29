<?php require_once('includes/functions.php'); ?>
<nav>
    <a href="index.php">Home</a>
    <a href="services.php">Services</a>
    <?php if(isUserLoggedIn()) { ?>
        <a href="myServices.php">myServices</a>
    <?php }?>
    <a href="contact-us.php">Contact Us</a>
</nav>