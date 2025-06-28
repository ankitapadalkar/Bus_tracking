
<!DOCTYPE html>
<html lang="en">
  <head>
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

    <style>
      body{
        background-color: #226e89!important;
    }
      </style>
  </head>

  <body>
  <?php if(isset($_GET['msg'])) {?>

<div class="alert alert-success"><?php echo $_GET['msg'];  ?></div>

<?php }?>

  <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <div id="loginbox">
    <form action="register_save.php" method="post">       
        <div class="control-group normal_text">
          <h3><img src="img/r.png" alt="Logo" height="300" width="400" /></h3>
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
              ><input type="password" name="password" placeholder="password" id="password"required/>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-lock"></i></span
              ><input type="text" name="Repeat password" placeholder="Repeat password" id="ConfirmPassword"required/>
            </div>
          </div>
        </div>
       <center> <div id="CheckPasswordMatch">
        </div></center>
        <div class="control-group">
          <div class="controls">
            <div class="main_input_box">
              <span class="add-on"><i class="icon-user"></i></span
              ><input type="text" name="role" placeholder="Role" required/>
            </div>
          </div>
        </div>
        <div class="form-actions">
        <span class="pull-right">
          <input type="submit" name="submit_register" class="btn btn-success" value="Registration"/>
  </span>
      <span class="pull-left">
          <a href="index.php" name="submit_register" class="btn btn-success">Login</a>

        </div>
      </form>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/maruti.login.js"></script>
    <script>$(document).ready(function () {
   $("#ConfirmPassword").on('blur', function(){
    var password = $("#password").val();
    var confirmPassword = $("#ConfirmPassword").val();
    if (password != confirmPassword)
   {
        $("#CheckPasswordMatch").html("Password does not match !").css("color","red");
        $("#ConfirmPassword").val("");
   } else {
        $("#CheckPasswordMatch").html("Password match !").css("color","green");
   }
   });
});</script>
  </body>
</html>
