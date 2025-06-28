<?php 

$hostName = "localhost";
$dbUser = "root";
$dbPassword = ""; 
$dbName = "bus_tracking";

$conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
   // echo "Connected successfully!";
}

    
?>