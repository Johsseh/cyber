<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$server = "localhost";
$username = "root";
$password = "django";
$db = "cyb";
//$conn = mysql_connect($server,$username,$password);
$conn = mysqli_connect($server,$username,$password,$db) or die("Connection failed: " . mysqli_connect_error());
//$db=mysql_select_db($dbname);


?>