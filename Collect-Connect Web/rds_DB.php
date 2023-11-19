<?php

$hostname = "#";
$username = "#";
$password = "#";
$database = "#";
$port = #;

$con = mysqli_connect($hostname, $username, $password, $database,$port);

if ($con) {
   //echo "Connection successful";
} 

else {
    die("Connection failed: " . mysqli_connect_error());
}

?>
