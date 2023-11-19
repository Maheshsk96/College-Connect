<?php

$hostname = "rds-database.cd33lr9sf7fu.eu-north-1.rds.amazonaws.com";
$username = "mahesh";
$password = "Aishu2001";
$database = "mydatabase";
$port = 3308;

$con = mysqli_connect($hostname, $username, $password, $database,$port);

if ($con) {
   //echo "Connection successful";
} 

else {
    die("Connection failed: " . mysqli_connect_error());
}

?>
