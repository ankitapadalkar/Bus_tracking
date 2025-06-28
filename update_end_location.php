<?php
 // busmaster
include('con.php');

session_start();

    $id= $_POST["id"];
    $lat=$_POST['lat'];
    $long=$_POST['long'];


    $sql = "update bus_tracking set  latitude_end='".$lat."',longitude_end='" . $long. "' where trackingid='".$id."'";
    $stmt = mysqli_query($conn, $sql);

    

?>