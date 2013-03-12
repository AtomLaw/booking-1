<?php
$host = "localhost"; //database location
$user = "root"; //database username
$pass = ""; //database password
$db_name = "argie_tamera"; //database name

//database connection
$con = mysql_connect($host, $user, $pass);
mysql_select_db($db_name,$con);

//sets encoding to utf8
mysql_query("SET NAMES utf8");

$homeLocation = "http://localhost/softeng/booking/";
?>