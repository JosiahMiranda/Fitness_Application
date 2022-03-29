<?php

 
    $url = "http://api.weatherapi.com/v1/current.json?key=99a27ff147ae4b4cbe480332211310&q={Melbourne}";

    $json = file_get_contents($url);
    $data = json_decode($json, true);

?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
    <div class="container">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link">Home</a>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <?php if ($data['current']['temp_c'] < 15) {?>
                <div class="navbar-nav">
                    <a href="#" class="nav-item nav-link">
                        It's <?php echo $data['current']['temp_c']?><span>&#176;</span> in Melbourne! Bring a Jacket because it's chilly.
                    </a>
                </div>
            <?php } elseif ($data['current']['temp_c'] < 30) {?>
                <div class="navbar-nav">
                    <a href="#" class="nav-item nav-link">
                        It's <?php echo $data['current']['temp_c']?><span>&#176;</span> in Melbourne! Nice and warm!
                    </a>
                </div>
            <?php } else {?>
                <div class="navbar-nav">
                    <a href="#" class="nav-item nav-link">
                        It's <?php echo $data['current']['temp_c']?><span>&#176;</span> in Melbourne! Wear sunscreen because it's hot!
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</nav>
