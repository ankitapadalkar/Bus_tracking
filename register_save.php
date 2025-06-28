<?php
include('con.php');
if(isset($_POST["submit_register"])){

    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array(); 

    if (empty($username) OR empty($password) OR empty($role)) {
        array_push($errors, "All fields are required!");
    }

    if(strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters");
    }

    if(count($errors) > 0) {
        foreach($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            // Use the hashed password here
            $sql = "INSERT INTO users(username,password,role) VALUES ('".$username."','".$password."','".$role."')";
     $stmt = mysqli_query($conn,$sql);
     if ($stmt) {
        // Bind parameters (ensure $bus_no and $bus_name are set properly)
        
        header("Location:register.php?msg=Record added successfully");
            
    } else {
        echo "<div class='alert alert-danger'>Something went wrong with the query. Error: " . mysqli_error($conn) . "</div>";
    }
}  
}
}


?>