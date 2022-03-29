<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap</title>
    <link rel="stylesheet" href="assignment.css" />

</head>

<body>
    <script src='script.js'></script>
    <?php
        require_once("includes/header.php");
        require_once("includes/navbar.php");
    ?>

    <div class="formContainer">

        <h2>Mental Wellbeing</h2>

        <hr>

        <ul>
            <li><a class="sitemaplink" href="services.php">Services</a></li>
            <li><a class="sitemaplink" href="yoga.php">Yoga</a></li>
            <li><a class="sitemaplink" href="stretching.php">Stretching</a></li>
            <li><a class="sitemaplink" href="healthy-habits.php">Healthy Habits</a></li>
            <li><a class="sitemaplink" href="meditation.php">Meditation</a></li>

        </ul>



    </div>

    <?php
        require_once("includes/footer.php");
    ?>
</body>

</html>