<?php

    include_once('curl.php');

    $APP_URL       = "http://creep.it/app.php";

    // TODO: Fill these in.
    $CLIENT_ID     = "";
    $CLIENT_SECRET = "";
    $REDIRECT_URI  = "http://creep.it/auth.php";
    $RESPONSE_TYPE = "code";
    $AUTH_URL      = "https://foursquare.com/oauth2/authenticate?client_id=$CLIENT_ID&response_type=$RESPONSE_TYPE&redirect_uri=$REDIRECT_URI";

    if(!isset($_GET['code']))
    {
        // Auth the user
        header("Location: $AUTH_URL");
    }
    else
    {
        // Get the access_token
        $access_token_url = "https://foursquare.com/oauth2/access_token?client_id="
                          . $CLIENT_ID
                          . "&client_secret="
                          . $CLIENT_SECRET
                          . "&grant_type=authorization_code"
                          . "&redirect_uri="
                          . $REDIRECT_URI
                          . "&code="
                          . $_GET['code'];

        $curl = new Curl();

        $result = $curl->get($access_token_url);

        var_dump($result);

        $access_token_JSON = json_decode($result->body);

        var_dump($access_token_JSON);

        $access_token = $access_token_JSON->access_token;
		$_COOKIE['access_token'] = $access_token;

        var_dump($COOKIE['access_token']);


    }

    if(isset($_COOKIE['access_token']))
    {
        print('<script language="JavaScript">onloadwindow.location("' . $APP_URL . '");</script>"');
    }

?>
