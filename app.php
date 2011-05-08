<?php

    include_once('curl.php');

    $checkin_url = "https://api.foursquare.com/v2/users/self/checkins?oauth_token="
                 . $_COOKIE['access_token'];

    $curl = new Curl();

    $response = $curl->get($checkin_url);

    var_dump($response);

?>
