<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
        <link rel="stylesheet" href="assignment.css"/>
    </head>
    <body>

        <?php
            require_once("includes/header.php");
            require_once("includes/navbar.php");
        ?>

        <article>
            <h1 class="serviceRight"><a class="servicelink" href="yoga.php">Yoga</a>
                <span>
                    <img class="right"src="assets/images/yoga_stock_1.jpeg" alt="Girl doing a yoga pose on a mat.">
                </span>

            </h1>

            <p class="service">LIFE services offers a wide range of information regarding Yoga, for people of all experience. Whether you are an expert at Yoga, or want to
                look into it, this is a great hub for the How's, Why's, and When's to do Yoga.
            </p>
        </article>  

        <article class="gray">

            <h1 class="serviceLeft"><a class="servicelink" href="stretching.php">Stretching</a>
            
            <span></span>
                <img class="left" src="assets/images/stretching_stock_1.jpg" alt="Guy doing stretches on the beach."> </img>
            </span>

            </h1>
            
            
            <p class="service">It's not enough to just work out and exercise. Stretching is an important aspect to wellbeing that many people overlook, and LIFE services offer
                critical information that can ensure your next morning jog is enjoyable and efficient. We discuss the many benefits to stretching, and how to do them properly.
            </p>
            
        </article> 

        <article>

            <h1 class="serviceRight"><a class="servicelink" href="meditation.php">Meditation</a>
            
            <span></span>
                <img class="right" src="assets/images/meditation_stock_1.jpg" alt="Brown woman with legs crossed, and meditating."> </img>
            </span>

            </h1>
            
            
            <p class="service">Meditation is a fantastic way to clear your mind and prepare yourself for the day. There's no doubt that it is incredibly useful for ensuring
                that your mental well-being is ready to face the many challenges in your day. We talk about what meditation is, and how to do it so that you can get ahead
                of those pesky worries at the back of your mind.
            </p>
            
        </article> 
        <article class="gray">

            <h1 class="serviceLeft"><a class="servicelink" href="healthy-habits.php">Healthy Habits</a>
            
            <span></span>
                <img class="left" src="assets/images/healthy_habits_stock_1.jpg" alt="Image of healthy habits text with food icons."> </img>
            </span>

            </h1>
            
            
            <p class="service">Anybody can spend hours doing yoga, meditating, exercising or even stretching, but to stay healthy takes more than just that.
                Good health doesn't just come from the couple of hours you spend working on your physique or your mental health, it also comes from the decisions
                you make thoughout every hour of every day. We offer top-tier advice regarding the healthy habits that you can adapt to boost your energy and well-being.
            </p>
            
        </article> 

        <?php
            require_once("includes/footer.php");
        ?>
    </body>
    
</html>