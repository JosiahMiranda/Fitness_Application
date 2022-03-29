<?php require_once('includes/functions.php'); ?>
<header>
    <div id="header">
        <div id="left">
            <p>Life. Let's live it.</p>
        </div>
        <div id="right">
            <?php if(!isUserLoggedIn()) { ?>
                <h4>
                    <a id="registerLink" href="registration.php">Register</a>
                </h4>

                <h4>
                    <a id="registerLink" href="login.php">Login</a>
                </h4>
            <?php } else { ?>
                <h4>
                    <a id="registerLink" href="logout.php">Logout</a>
                </h4>
            <?php } ?>
        </div>
        <div id="center">
            <h1>LIFE</h1>
        </div>

    </div>
</header>