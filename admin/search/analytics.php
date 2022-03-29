<?php
    require_once('../../includes/functions.php');

    // Extract and trim the email variable from the URL.
    $userName = trim(isset($_GET['userName']) ? $_GET['userName'] : '');
    $serviceId = trim(isset($_GET['serviceId']) ? $_GET['serviceId'] : '');

?>


<?php if ($serviceId == 4) { ?>
    <br>
    <hr>
    <h1>Showing <?php echo getUser($userName)['first_name']; ?>'s Meal Plan</h1>
    <br>
    <div class="containerCenter textcenter">
        <div class="center">

            <?php $meals = getUserMeals(getUser($userName)['email']); ?>
            <?php $totalCalories = 0; ?>

            <?php for ($mealNumber = 0; $mealNumber < count($meals); $mealNumber++) { ?>
 
                <h3>Meal number <?php echo $mealNumber+1; ?>:</h3>
                <?php $meal_info = getMeal($meals[$mealNumber]['meal_id']); ?>
                <img width="300" class="img-fluid img-thumbnail" src=<?php echo "../".$meal_info['image_path'] ?> alt=<?php echo $meal_info['name'] ?>></img>
                <h4><?php echo $meal_info['name'] ?></h4>
                <h4>Calories of single serving: <?php echo toCal($meal_info['kilojoules']); ?></h4>
                <h4>No. servings: <?php echo $meals[$mealNumber]['servings'] ?></h4>
                <h4>Overall Calories: <?php echo $meals[$mealNumber]['servings']*toCal($meal_info['kilojoules']); ?></h4>
                <hr>
                <?php $totalCalories += $meals[$mealNumber]['servings']*toCal($meal_info['kilojoules']); ?>

            <?php } ?>

            <h1>Total Calories: <?php echo $totalCalories; ?></h1>
        </div>
    </div>


    
<?php 

        return;
    }

?>



<?php 
    
    // $analysis = getUserService('josiahmiranda@hotmail.com', '1');
    $analysis = getUserService($userName, $serviceId);
    $serviceTypes = array();
    $serviceTypeData = array();
    $serviceTypeLabels = array();
?>

<?php foreach($analysis as $a) { ?>
    <?php
        array_push($serviceTypes, $a['service_type']);
    ?>
<?php } ?>

<?php foreach($serviceTypes as $serviceType) { ?>
    <?php
        if (!in_array($serviceType, $serviceTypeLabels)) {
            array_push($serviceTypeLabels, $serviceType);
        }
    ?>
<?php } ?>

    <?php 
        // print_r($serviceTypes);
        // print_r($serviceTypeLabels);
        $counts = array_count_values($serviceTypes);
        // print_r($counts);
    ?>

    

<?php foreach($serviceTypeLabels as $serviceType) { ?>
    <?php
        array_push($serviceTypeData, $counts[$serviceType]);
    ?>
    <!-- <h3><?php // echo $serviceType; ?></h3> -->

<?php } ?>

    <!-- <h1>Service Type Data</h1> -->

    <?php // foreach($serviceTypeData as $data) { ?>

        <!-- <h3><?php // echo $data; ?></h3> -->

    <?php //} ?>

<!-- <canvas id="polarChart"></canvas> -->
<?php 
    $date6DaysAgo = date("Y-m-d", strtotime('-6 days'));
    $date5DaysAgo = date("Y-m-d", strtotime('-5 days'));
    $date4DaysAgo = date("Y-m-d", strtotime('-4 days'));
    $date3DaysAgo = date("Y-m-d", strtotime('-3 days'));
    $date2DaysAgo = date("Y-m-d", strtotime('-2 days'));
    $date1DayAgo = date("Y-m-d", strtotime('-1 days'));
    $dateToday = date("Y-m-d", strtotime('now'));

    $numServicesOnDates = array();

    array_push($numServicesOnDates, count(getUserServiceOnDate($userName, $serviceId, $date6DaysAgo)));
    array_push($numServicesOnDates, count(getUserServiceOnDate($userName, $serviceId, $date5DaysAgo)));
    array_push($numServicesOnDates, count(getUserServiceOnDate($userName, $serviceId, $date4DaysAgo)));
    array_push($numServicesOnDates, count(getUserServiceOnDate($userName, $serviceId, $date3DaysAgo)));
    array_push($numServicesOnDates, count(getUserServiceOnDate($userName, $serviceId, $date2DaysAgo)));
    array_push($numServicesOnDates, count(getUserServiceOnDate($userName, $serviceId, $date1DayAgo)));
    array_push($numServicesOnDates, count(getUserServiceOnDate($userName, $serviceId, $dateToday)));

    // print_r($numServicesOnDates);

    $dateLabels = array();
    array_push($dateLabels, $date6DaysAgo);
    array_push($dateLabels, $date5DaysAgo);
    array_push($dateLabels, $date4DaysAgo);
    array_push($dateLabels, $date3DaysAgo);
    array_push($dateLabels, $date2DaysAgo);
    array_push($dateLabels, $date1DayAgo);
    array_push($dateLabels, $dateToday);
?>

    <hr>
    <h1>Showing <?php echo getUser($userName)['first_name']; ?>'s statistics for <?php echo getService($serviceId)['name']; ?></h1>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm">
            <canvas id="pieChart"></canvas>
            </div>
            <div class="col-sm">
            <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    

<script>

    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
    labels: <?php echo json_encode($serviceTypeLabels, JSON_NUMERIC_CHECK); ?>,
    datasets: [{
    data: <?php echo json_encode($serviceTypeData, JSON_NUMERIC_CHECK); ?>,
    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
    }]
    },
    options: {
    responsive: true
    }
    });

    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
    // labels: ["January", "February", "March", "April", "May", "June", "July"],
    labels: <?php echo json_encode($dateLabels, JSON_NUMERIC_CHECK); ?>,
    datasets: [{
    label: "Times performed",
    // data: [65, 59, 80, 81, 56, 55, 40],
    data: <?php echo json_encode($numServicesOnDates, JSON_NUMERIC_CHECK); ?>,
    backgroundColor: [
    'rgba(105, 0, 132, .2)',
    ],
    borderColor: [
    'rgba(200, 99, 132, .7)',
    ],
    borderWidth: 2
    }]
    },
    options: {
    responsive: true
    }
    });

</script>

