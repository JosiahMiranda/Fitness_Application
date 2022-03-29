<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Habits</title>
    <link rel="stylesheet" href="assignment.css" />
    <script src='script.js'></script>
</head>

<body>

    <?php
        require_once("includes/header.php");
        require_once("includes/navbar.php");
    ?>

    <article>
        <h1 class="blocktext service">What are healthy habits?</h1>

        <p class="blocktext service">
            Well, they're exactly that. They're habits that you can adopt to help keep your mind and body as fresh and
            healthy as
            possible. In LIFE, we focus on striving to ensure the foods you intake are not only nutritious, but easily
            accessible
            and affordable too. Additionally, we aim to provide you with compact knowledge regarding multiple healthy
            activities that
            can help you right now.
        </p>

        <video controls autoplay muted loop>

            <source src="assets/videos/healthy_1.mp4" type="video/mp4">

            Your browser doesn't support embedded videos.
        </video>

    </article>

    <article class="gray">

        <h1 class="blocktext service">Always eat breakfast!</h1>
        <p class="blocktext service">
            Studies show that those who eat breakfast generally have more vitamins and minerals, as well as less fat and
            cholesterol. You
            should try to eat things that are higher in fiber and proteins, as they help with your digestion and also
            increase your energy
            levels. Some examples of these foods are:
        </p>

        <ul class="center service">
            <li>Whole-grain cereals.</li>
            <li>Breads.</li>
            <li>Fruits.</li>
            <li>Yoghurt.</li>
        </ul>

        <video controls autoplay muted loop>

            <source src="assets/videos/breakfast.mp4" type="video/mp4">

            Your browser doesn't support embedded videos.
        </video>
    </article>

    <article>

        <h1 class="blocktext service">Stay hydrated!</h1>
        <p class="blocktext service">
            It should go without saying that getting the correct amount of water every day is incredibly important.
            With every meal and multiple times throughout the day, you should be drinking water to keep you hydrated and
            to ensure that you don't dehydrate. Don't wait until you're starving for water!


        </p>

        <video controls autoplay muted loop>

            <source src="assets/videos/hydrate.mp4" type="video/mp4">

            Your browser doesn't support embedded videos.
        </video>
    </article>

    <article class="gray">

        <h1 class="blocktext service">Get enough sleep!</h1>
        <p class="blocktext service">
            Not having enough sleep can lead to drowsiness, lack of energy, et cetera. It can even make certain
            individuals more
            irritable. It messes with your focus, and attentiveness, and overall makes the day much more difficult to
            power through.
            Not only can a lack of sleep have these annoying short-term effects, but it can even have quite devastating
            long-term effects
            such as brain disorders. So, get your sleep!
        </p>

        <video controls autoplay muted loop>

            <source src="assets/videos/sleep.mp4" type="video/mp4">

            Your browser doesn't support embedded videos.
        </video>
    </article>


    <article>
        <div class="formContainer center" id="planner">
            <h1>Meal Planner</h1>

            <p>Want to start planning a diet?</p>
            <hr>

            <p>What type of meal?</p>
            <input type="radio" id="anythingMeal" name="mealType" value="Anything" checked>
              <label for="anythingMeal">Anything</label>
              <input type="radio" id="vegetarianMeal" name="mealType" value="Vegetarian">
              <label for="vegetarianMeal">Vegetarian</label>

            <p>I want to eat <span><input type="text" placeholder="Amount" id="amountCalories" value=1400></span>
                Calories <span class="regError" id="calorieError"></span></p>

            <p>In
                <span>
                    <select name="numMeals" id="numMeals">
                        <option value="3">3 meals</option>
                        <option value="4">4 meals</option>
                        <option value="5">5 meals</option>
                    </select>
                </span>
            </p>

            <button type="submit" class="generatebutton" onclick="generateMealPlan()">Generate</button>
        </div>

        <div id="plan" class="hidden center">

            <hr>

            <h2>Breakfast</h2>

            <h4 id="breakfast-name"></h4>
            <img class="mealImg" id="breakfast-img" src="" alt="Picture of breakfast"></img>
            <p id="breakfast-servings"></p>
            <p id="breakfast-calories"></p>

            <hr>
            <h2>Lunch</h2>

            <h4 id="lunch-name"></h4>
            <img class="mealImg" id="lunch-img" src="" alt="Picture of lunch"> </img>
            <p id="lunch-servings"></p>
            <p id="lunch-calories"></p>

            <hr>

            <h2>Dinner</h2>

            <h4 id="dinner-name"></h4>
            <img class="mealImg" id="dinner-img" src="" alt="Picture of dinner"> </img>
            <p id="dinner-servings"></p>
            <p id="dinner-calories"></p>

            <hr>

            <div id="snack-one" class="hidden">
                <h2>Snack One</h2>

                <h4 id="snack-one-name"></h4>
                <img class="mealImg" id="snack-one-img" src="" alt="Picture of snack one"> </img>
                <p id="snack-one-servings"></p>
                <p id="snack-one-calories"></p>

                <hr>
            </div>

            <div id="snack-two" class="hidden">

                <h2>Snack Two</h2>

                <h4 id="snack-two-name"></h4>
                <img class="mealImg" id="snack-two-img" src="" alt="Picture of snack two"> </img>
                <p id="snack-two-servings"></p>
                <p id="snack-two-calories"></p>

                <hr>

            </div>

            <h2>Total Calories: <span id="total-calories"></span></h2>

        </div>

    </article>

    <?php
        require_once("includes/footer.php");
    ?>
</body>

</html>