<?php
 // busmaster
include('con.php');

session_start();

    $busId= $_POST["busId"];
    $locationIdTo = $_POST["locationIdTo"];
    $locationId=$_POST['locationId'];
    $userId= $_SESSION['userId'];
    $lat=$_POST['lat'];
    $long=$_POST['long'];


    $sql = "INSERT INTO bus_tracking(tracking_date,busid,userid,locationfrom,locationto,latitude,longitude) VALUES ('".date('Y-m-d')."','".$busId."', '".$userId."','".$locationId."','" . $locationIdTo . "','".$lat."','" . $long. "')";
    $stmt = mysqli_query($conn, $sql);

    

?>