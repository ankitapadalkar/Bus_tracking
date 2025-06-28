<?php include('con.php'); ?>

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
    <?php include('header.php'); ?>
    <!--close-left-menu-stats-sidebar-->

    <div id="content">
    <div id="content-header">
        <h1>Bus Entry Master</h1>
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
                <h5>Bus</h5>
              </div>
              <div class="widget-content nopadding">


              <?php if(isset($_GET['id'])){
                
                $sqlMaster="select * from busmaster where busId='".$_GET['id']."'";
                $result=mysqli_query($conn,$sqlMaster);
                $row=mysqli_fetch_array($result);
                
                ?>

                <form  action="master_save.php" method="post" class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                  <div class="control-group">
                    <label class="control-label">Bus No :</label>
                    <div class="controls">
                      <input
                        type="text"
                        class="span11"
                        name="bus_no"
                        placeholder="Bus no" value="<?php echo $row['busno'] ?>" required
                      />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Bus Name</label>
                    <div class="controls">
                      <input
                        type="text"
                        class="span11"
                        name="bus_name"
                        placeholder="Bus Name" value="<?php echo $row['busname'] ?>" required
                      />
                    </div>
                    </div>
                  <div class="form-actions">
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                  </div>
                </form>



                <?php } else { ?>
                <form  action="master_save.php" method="post" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">Bus No :</label>
                    <div class="controls">
                      <input
                        type="text"
                        class="span11"
                        name="bus_no"
                        placeholder="Bus no" required
                      />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Bus Name</label>
                    <div class="controls">
                      <input
                        type="text"
                        class="span11"
                        name="bus_name"
                        placeholder="Bus Name" required
                      />
                    </div>
                    </div>
                  <div class="form-actions">
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                  </div>
                </form>

                <?php } ?>
              </div>
            </div>
          </div>
        </div>
    </div>    
  </body>
</html>
















