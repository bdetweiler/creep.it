<?php

    $APP_URL = "http://creep.it/app.php";

    if(isset($_COOKIE['access_token']))
    {
        header("Location: $APP_URL");
    }
?>
<a href="auth.php"><img src="images/signin-with-foursquare.png" /></a>
