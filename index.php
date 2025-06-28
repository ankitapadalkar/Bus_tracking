<?php
session_start();

require_once "connection.php";  


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role=$_POST['role'];

 
    $sql = "SELECT * FROM users WHERE username = ? and role=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username,$role);
    $stmt->execute();
    $result = $stmt->get_result();
    
   
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; 
            $_SESSION['userId'] = $user['userId'];

           if($user['role']=='admin')
           {
            header("Location: dashboard.php"); 
          } else{

            header("Location: dashboard_driver.php");
          }

            exit();
        } else {
            $error_message = "Incorrect password!";
        }
    } else {
        $error_message = "No user found with that username!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      body{
        background-color: #226e89!important;
    }
      </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, maruti admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, maruti design, maruti dashboard bootstrap 4 dashboard template"
    />
    <meta
      name="description"
      content="Maruti is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Bus Tracking</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/maruti-admin/"
    />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/maruti-login.css" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png" />
  </head>

  <body>

  <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <div id="loginbox">
      
    <form action="index.php" method="post">       
        <div class="control-group normal_text">
          <h3><img src="img/bus2.png" alt="Logo"/></h3>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-user"></i></span
              ><input type="text" name="username" placeholder="Username"  required/>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-lock"></i></span
              ><input type="password" name="password" placeholder="password" required/>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-lock"></i></span
              ><input type="role" name="role" placeholder="role" required/>
            </div>
          </div>
        </div>
        <div class="form-actions">
        <span class="pull-left"
            ><a  class="btn btn-success" href="register.php">Registration</a>
          </span>

          <span class="pull-right"
            ><input type="submit" name="login" class="btn btn-success" value="Login"
          /></span>
        </div>
      </form>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/maruti.login.js"></script>
  </body>
</html>
