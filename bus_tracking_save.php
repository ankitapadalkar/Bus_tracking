<?php
 // busmaster
include('con.php');
if(isset($_POST["bussubmit"])){

    $busId= $_POST["busId"];
    $userId = $_POST["userId"];
    $locationId= $_POST["locationId"];
    $locationIdTo = $_POST["locationIdTo"];
    $latitude = $_POST["latitude"];
    $latitude = $_POST["latitude"];

    $sql = "INSERT INTO bus_assign_master(busid, userid, locationfrom, locationto, latitude, longitude) VALUES ('".$busId."','".$userId."', '".$locationId."', '".$locationIdTo."',0,0)";
    $stmt = mysqli_query($conn,$sql);
    
    if ($stmt) {
        // Bind parameters (ensure $bus_no and $bus_name are set properly)
        
        header("Location:bustracking.php?msg=Record added successfully");
            
    } else {
        echo "<div class='alert alert-danger'>Something went wrong with the query. Error: " . mysqli_error($conn) . "</div>";
    }
    
}
?>