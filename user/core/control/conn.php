<?php
$host="localhost";
$username="root";
$password="";
$database="cms";
$conn = mysql_connect($host, $username, $password) or die ("Could not connect");
$db = mysql_select_db($database, $conn) or die ("Could not select DB");

?>

