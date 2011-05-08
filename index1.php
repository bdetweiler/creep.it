<?php

//Put in the key and secret for your Foursquare app
$REDIRECT_URI = "http://creep.it/auth.php";

$loginurl = "";

//Includes the foursquare-asyc library files
require_once('EpiCurl.php');
require_once('EpiSequence.php');
require_once('EpiFoursquare.php');

session_start();
try{
  $foursquareObj = new EpiFoursquare($consumer_key, $consumer_secret);
  $results = $foursquareObj->getAuthorizeUrl($REDIRECT_URI);
  print("\nresults: \n<br />");
  print_r($results);
  print("\nresults[url]: <br />");
  print_r($results['url']);
  print("\nresults[oauth_token]: <br />");
  print_r($results['oauth_token']);
  $loginurl = $results['url'] . "?oauth_token=" . $results['oauth_token'];
  $_SESSION['secret'] = $results['oauth_token_secret'];
} catch (Execption $e) {
  //If there is a problem throw an exception
}

echo "\n<a href='" . $loginurl . "'>Login Via Foursquare</a>";  //Display the Foursquare login link
echo "<br>";
//This is your OAuth token and secret generated above
//The OAuth token is part of the Foursquare link above
//They are dynamic and will change each time you refresh the page
//If everything is working correctly both of these will show up when you open index.php
var_dump($results['oauth_token']);
echo "<br>";
var_dump($_SESSION['secret']);

?>
