<?php 
$conn = mysqli_connect("localhost","root",""); 
   mysqli_select_db($conn,"bus_tracking");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
   // echo "Connected successfully!";
}
?>