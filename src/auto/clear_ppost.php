#!/usr/bin/php -q
<?php
$con = new mysqli("localhost","root","","user_db");
$query = "TRUNCATE partypost_tb";
mysqli_query($con,$query);
?>
