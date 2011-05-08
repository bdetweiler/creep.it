<?php

//Includes the foursquare-asyc library files
require_once('EpiCurl.php');
require_once('EpiOAuth.php');
require_once('EpiFoursquare.php');

session_start();
$foursquareObj = new EpiFoursquare($consumer_key, $consumer_secret);
$foursquareObj->setToken($_REQUEST['oauth_token'],$_SESSION['secret']);
$token = $foursquareObj->getAccessToken();
$foursquareObj->setToken($token->oauth_token, $token->oauth_token_secret);

try {
   //Making a call to the API
   $foursquareTest = $foursquareObj->get_user();
   print_r($foursquareTest->response);
 } catch (Exception $e) {
   echo "Error: " . $e;
 }

?>
