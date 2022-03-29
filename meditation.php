<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meditation</title>
    <link rel="stylesheet" href="assignment.css" />
    <script src='script.js'></script>
</head>

<body>
    <?php
        require_once("includes/header.php");
        require_once("includes/navbar.php");
    ?>

    <article>
        <h1 class="center service">What is Meditation?</h1>

        <p class="blocktext service">
            Meditation, like yoga, is a technique that enhances one's mindfulness and focuses on particular objects, thoughts or activities
            to train their attention and awareness, in order to achieve a mentally clear and emotionally calm state.
        </p>

        <video controls autoplay muted loop>

            <source src="assets/videos/meditation_1.mp4" type="video/mp4">

            Your browser doesn't support embedded videos.
        </video>

    </article>

    <article class="gray">

        <h1 class="center service">Benefits of Meditation.</h1>
        <p class="blocktext service">

            Meditation is a simple and fast way to reduce stress. But that isn't all meditation is good for. Meditation can also help:

        </p>

        <ul class="center service">
            <li>Handling stress.</li>
            <li>Increasing self-awareness.</li>
            <li>Focusing on the present.</li>
            <li>Reducing negative emotions.</li>
            <li>Increasing creativity.</li>
        </ul>

        <video controls autoplay muted loop>

            <source src="assets/videos/meditation_2.mp4" type="video/mp4">

            Your browser doesn't support embedded videos.
        </video>
    </article>

    <article>

        <h1 class="center service">A starter guide to meditation.</h1>
        <p class="blocktext service">
            Here is a simple guide to starting meditation.
        </p>

        <ol class="center service">
            <li>Sit down.</li>
            <li>Set a timer.</li>
            <li>Pay attention to your own body.</li>
            <li>Focus on your breath.</li>
            <li>Take note of when your mind wanders on its own.</li>
            <li>Don't judge yourself for wandering off.</li>
            <li>Close off the practice with happiness and kindness.</li>
        </ol> 
          

        <video controls autoplay muted loop>

            <source src="assets/videos/meditation_3.mp4" type="video/mp4">

            Your browser doesn't support embedded videos.
        </video>
    </article>

    <article class="gray">

        <h1 class="blocktext service">That's it?</h1>
        <p class="blocktext service">
            Yes! ... well, not really. Yes it may seem simple now, but the real challenge is to be able to do it
            regularly, and on schedule. It's far too easy for us to just give up or skip a day. Like all good things in 
            life, you need to work for the benefits, so keeping up the consistency of mediation is the difficult part.
        </p>

        <video controls autoplay muted loop>

            <source src="assets/videos/meditation_4.mp4" type="video/mp4">

            Your browser doesn't support embedded videos.
        </video>
    </article>

    <?php
        require_once("includes/footer.php");
    ?>
</body>

</html>