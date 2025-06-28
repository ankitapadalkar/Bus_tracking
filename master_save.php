<?php
 // busmaster
include('con.php');
if(isset($_POST["submit"])){

    $bus_no = $_POST["bus_no"];
    $bus_name = $_POST["bus_name"];

    if(isset($_POST['id']))
    {
    $sql = "update busmaster set busno='".$bus_no."',busname='".$bus_name."' where assignid='".$_POST['id']."'";
    $stmt = mysqli_query($conn, $sql);
   } else{

    $sql = "INSERT INTO busmaster(busno, busname) VALUES ('" . $bus_no . "', '" . $bus_name . "')";
    $stmt = mysqli_query($conn, $sql);
   }

    
    if ($stmt) {
        // Bind parameters (ensure $bus_no and $bus_name are set properly)
        
               header("Location:bus_list.php?msg=Record added successfully");
            
    } else {
        echo "<div class='alert alert-danger'>Something went wrong with the query. Error: " . mysqli_error($conn) . "</div>";
    }
    
    
}


 // Location master

 if(isset($_POST["submit1"])){
 
     
     $location_name = $_POST["location_name"];
 
     $sql = "INSERT INTO locationmaster(locationname) VALUES ('".$location_name."')";
     $stmt = mysqli_query($conn,$sql);
     
     if ($stmt) {
         // Bind parameters (ensure $bus_no and $bus_name are set properly)
         
         header("Location:location_list.php?msg=Record added successfully");
             
     } else {
         echo "<div class='alert alert-danger'>Something went wrong with the query. Error: " . mysqli_error($conn) . "</div>";
     }
     
     
 }

 // Bus Assign Master
 if(isset($_POST["assignsubmit"])){

    $busId= $_POST["busId"];
    $userId = $_POST["userId"];
    $locationId= $_POST["locationId"];
    $locationIdTo = $_POST["locationIdTo"];


    if(isset($_POST['id']))
    {
    $sql = "update bus_assign_master set busid='".$busId."',userid='".$userId."',locationfrom='".$locationId."',locationto='".$locationIdTo."' where busId='".$_POST['id']."'";
    $stmt = mysqli_query($conn, $sql);
   } else{

    $sql = "INSERT INTO bus_assign_master(busid, userid, locationfrom, locationto) VALUES ('".$busId."','".$userId."', '".$locationId."', '".$locationIdTo."')";
    $stmt = mysqli_query($conn,$sql);
   }
    
    if ($stmt) {
        // Bind parameters (ensure $bus_no and $bus_name are set properly)
        
        header("Location:busassignmaster.php?msg=Record added successfully");
            
    } else {
        echo "<div class='alert alert-danger'>Something went wrong with the query. Error: " . mysqli_error($conn) . "</div>";
    }
    
    
}

?>