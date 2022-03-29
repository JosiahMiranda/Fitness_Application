<?php

require_once('functions.php');

if(!isUserLoggedIn())
    redirect('login.php');
?>