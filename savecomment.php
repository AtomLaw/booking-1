<?php

include 'conn/config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];	

	
$sql="INSERT INTO comment (name, email, content)
VALUES ('$name','$email','$message')";

mysql_query($sql);
mysql_close($con);

/*
$sqlstr = mysql_query("SELECT * FROM comment");
$row = mysql_fetch_array($sqlstr);
var_dump($row );

*/
header("location: index.php#3");

	
?>


