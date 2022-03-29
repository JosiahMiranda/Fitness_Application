<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
        <link rel="stylesheet" href="assignment.css"/>
        <?php
            require_once("includes/bootstrap.php");
        ?>
        
    </head>
    <body>
        <?php
            require_once("includes/header.php");
            require_once("includes/navbar.php");
        ?>

        <div class="index">
            <div class="container"> 
                <div id="indexCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-inner">
                        <div class="item active">
                            <img class="carousel" src="assets/images/yoga_stock_1.jpeg" alt="Girl doing a yoga pose on a mat.">
                        </div>

                        <div class="item">
                            <img class="carousel" src="assets/images/stretching_stock_1.jpg" alt="Guy doing stretches on the beach.">
                        </div>
                        
                        <div class="item">
                            <img class="carousel" src="assets/images/meditation_stock_1.jpg" alt="Brown woman with legs crossed, and meditating.">
                        </div>

                        <div class="item">
                            <img class="carousel" src="assets/images/healthy_habits_stock_1.jpg" alt="Image of healthy habits text with food icons.">
                        </div>
                        </div>

                        <!-- controls for the left and right buttons -->
                        <a class="left carousel-control" href="#indexCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#indexCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            
                <h1 class = "center">Welcome to LIFE.</h1>
                <h2 class = "center">Life. Let's live it!</h2>
                <img src="assets/images/yoga_index.jpg" alt="">
                <img src="assets/images/stretching_index.jpg" alt="">
                <img src="assets/images/health_index.jpg" alt="">
                <img src="assets/images/meditation_index.jpg" alt="">

                <p class="blocktext service">
                    Here at LIFE, we aim to give you services that help not only your physical, but your mental and even
                    spiritual wellbeing as well. These include Yoga, Stretching, overall Healthy Habits and Meditation!
                    Sign up today, and receive special discounts if you are between the ages of 16-20, a student, or
                    unemployed!
                </p>


        </div>

        <?php
            require_once("includes/footer.php");
        ?>
    </body>
</html>