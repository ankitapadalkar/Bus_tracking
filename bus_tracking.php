<?php include('con.php');
session_start();

$userId=$_SESSION['userId'];

?>
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
    <link rel="stylesheet" href="css/colorpicker.css" />
    <link rel="stylesheet" href="css/datepicker.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/maruti-style.css" />
    <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png" />
  </head>

  <body>
    <!--Header-part-->
    
    <!--close-left-menu-stats-sidebar-->

    <?php include('header2.php'); ?>

    <div id="content">

      <div id="content-header">
        <h1>Bus Tracking</h1>
      </div>
      
    
    <?php if(isset($_GET['msg'])) {?>

<div class="alert alert-success"><?php echo $_GET['msg'];  ?></div>

<?php }?>
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span6">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Bus Tracking-info</h5>
              </div>
              <div class="widget-content nopadding">
                <form  class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Bus No</label>
                    <div class="controls">
                        
                      <select name="busId" id="busId">
                        <option>Select Bus</option>
                      <?php $sql="select * from bus_assign_master
                      
                      inner join busmaster on busmaster.busId=bus_assign_master.busid
                      
                      where userid='".$userId."'";
                            $result=mysqli_query($conn,$sql);  
                            while($rowbus=mysqli_fetch_array($result))
                             {
                            ?>

                        <option value="<?php echo $rowbus['busid'] ?>"><?php echo $rowbus['busno'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                  </div>
              
                  <div class="control-group">
                    <label class="control-label">Location From</label>
                    <div class="controls">
                      <select name="locationId" id="locationId">
                      <option>Select Location From</option>
                      <?php $sqllocationFrom="select * from locationmaster";
                            $resultlocationFrom=mysqli_query($conn,$sqllocationFrom);  
                            while($rowlocation=mysqli_fetch_array($resultlocationFrom))
                             {
                            ?>

                        <option value="<?php echo $rowlocation['locationId'] ?>"><?php echo $rowlocation['locationname'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Location To</label>
                    <div class="controls">
                      <select name="locationIdTo" id="locationIdTo">
                      <option>Select Location To</option>
                      <?php $sqllocationTo="select * from locationmaster";
                            $resultlocationTo=mysqli_query($conn,$sqllocationTo);  
                            while($rowlocationTo=mysqli_fetch_array($resultlocationTo))
                             {
                            ?>

                        <option value="<?php echo $rowlocationTo['locationId'] ?>"><?php echo $rowlocationTo['locationname'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                  </div>
                
                  <div class="form-actions">
                    <button type="button" name="bussubmit" class="btn btn-success" onClick="storeLocation();">Start</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <hr />
      </div>
    </div>
   
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-colorpicker.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/maruti.js"></script>
    <script src="js/maruti.form_common.js"></script>
  
    <script>

      function storeLocation(){


        var locationIdTo=$('#locationIdTo').val();
        var locationId=$('#locationId').val();
        var busId=$('#busId').val();


          if (!navigator.geolocation) {
            console.log("Your browser doesn't support geolocation feature!");
        } else {
                navigator.geolocation.getCurrentPosition(getPosition);
        }

        function getPosition(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            var accuracy = position.coords.accuracy;

            console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy);

            // Send data to PHP script using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_location.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send("lat=" + lat + "&long=" + long + "&busId="+busId +"&locationId="+locationId +"&locationIdTo="+locationIdTo);
        }
      }
    </script>


  </body>
</html>
