<?php 

$localhost = "localhost:3306"; 
$username = "root"; 
$password = ""; 
$dbname = "cr11_judith_travelmatic"; 

// create connection 
$connect = new mysqli($localhost, $username, $password, $dbname); 

// check connection 
if($connect->connect_error) {
   die("connection failed: " . $connect->connect_error);
} else {
   //echo "Successfully Connected";
}

?>