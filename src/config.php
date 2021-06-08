<?php
require_once 'vendor/autoload.php';

$google_client = new Google_Client();
$google_client->setApplicationName("Blacklamp");
$google_client->setClientId('');
$google_client->setClientSecret('');
$google_client->setRedirectUri('https://blacklamp.lampstudio.xyz/sign');
$google_client->addScope('email');
$google_client->addScope('openid');

session_start();
?>
