<?php require_once('includes/authorise.php'); ?>
<?php 
    $services = getServices(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>myServices</title>
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

    <div class="containerCenter textcenter">
        <div class="center">
            <h1 class="center">MyServices</h1>
            <h3 class="center"> Welcome to LIFE, <?php echo getLoggedInUser()['first_name']; ?>! Let's live it!</h3>
            <p class="center">Please select a service you would like to train.</p>
        </div>

        <div class="row">
            <?php foreach($services as $service) { ?>
                <div class="column">
                    <a class="servicelink" href="service.php?id=<?php echo $service['service_id']; ?>">
                    <h3 class="center"><?php echo $service['name']; ?></h3>
                        <img src="<?php echo $service['image_path']; ?>" alt="<?php echo $service['name']; ?>" class="default" width="400">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

        <?php
            require_once("includes/footer.php");
        ?>
    </body>
</html>