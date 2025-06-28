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
    
    <!--close-left-menu-stats-sidebar-->

    <?php include('header.php'); ?>

    <div id="content">

      <div id="content-header">
        <h1>Bus Assign To Driver Master</h1>
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
                <h5>Bus-info</h5>
              </div>
              <div class="widget-content nopadding">



              
              <?php if(isset($_GET['id'])){
                
                $sqlMaster="select * from bus_assign_master where assignid='".$_GET['id']."'";
                $result=mysqli_query($conn,$sqlMaster);
                $row=mysqli_fetch_array($result);
                
                ?>
                <form action="master_save.php" method="post" class="form-horizontal">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="control-group">
                    <label class="control-label">Bus No</label>
                    <div class="controls">
                        
                      <select name="busId">
                        <option>Select Bus</option>
                      <?php $sql="select * from busmaster";
                            $resultBus=mysqli_query($conn,$sql);  
                            while($rowbus=mysqli_fetch_array($resultBus))
                             {
                            ?>

                        <option value="<?php echo $rowbus['busId'] ?>"
                        
                        <?php echo  $rowbus['busId']==$row['busid'] ? 'selected="selected"' : ''; ?>
                        
                        ><?php echo $rowbus['busname'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Driver Name</label>
                    <div class="controls">
                      <select name="userId">
                      <option>Select Driver Name</option>
                      <?php $sqlDriverName="select * from users where role!='Admin'";
                            $resultDriverName=mysqli_query($conn,$sqlDriverName);  
                            while($rowname=mysqli_fetch_array($resultDriverName))
                             {
                            ?>

                        <option value="<?php echo $rowname['userId'] ?>"
                        
                        <?php echo  $rowname['userId']==$row['userid'] ? 'selected="selected"' : ''; ?>
                        
                        ><?php echo $rowname['username'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Location From</label>
                    <div class="controls">
                      <select name="locationId">
                      <option>Select Location From</option>
                      <?php $sqllocationFrom="select * from locationmaster";
                            $resultlocationFrom=mysqli_query($conn,$sqllocationFrom);  
                            while($rowlocation=mysqli_fetch_array($resultlocationFrom))
                             {
                            ?>

                        <option value="<?php echo $rowlocation['locationId'] ?>"
                        
                        <?php echo  $rowlocation['locationId']==$row['locationfrom'] ? 'selected="selected"' : ''; ?>
                        
                        ><?php echo $rowlocation['locationname'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Location To</label>
                    <div class="controls">
                      <select name="locationIdTo">
                      <option>Select Location To</option>
                      <?php $sqllocationTo="select * from locationmaster";
                            $resultlocationTo=mysqli_query($conn,$sqllocationTo);  
                            while($rowlocationTo=mysqli_fetch_array($resultlocationTo))
                             {
                            ?>

                        <option value="<?php echo $rowlocationTo['locationId'] ?>"
                        
                        <?php echo  $rowlocationTo['locationId']==$row['locationto'] ? 'selected="selected"' : ''; ?>
                        
                        ><?php echo $rowlocationTo['locationname'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                  </div>
                
                  <div class="form-actions">
                    <button type="submit" name="assignsubmit" class="btn btn-success">Update</button>
                  </div>
                 </div>
                </form>


                <?php } else { ?>
                <form action="master_save.php" method="post" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Bus No</label>
                    <div class="controls">
                        
                      <select name="busId">
                        <option>Select Bus</option>
                      <?php $sql="select * from busmaster";
                            $result=mysqli_query($conn,$sql);  
                            while($rowbus=mysqli_fetch_array($result))
                             {
                            ?>

                        <option value="<?php echo $rowbus['busId'] ?>"><?php echo $rowbus['busno'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Driver Name</label>
                    <div class="controls">
                      <select name="userId">
                      <option>Select Driver Name</option>
                      <?php $sqlDriverName="select * from users where role!='Admin'";
                            $resultDriverName=mysqli_query($conn,$sqlDriverName);  
                            while($rowname=mysqli_fetch_array($resultDriverName))
                             {
                            ?>

                        <option value="<?php echo $rowname['userId'] ?>"><?php echo $rowname['username'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Location From</label>
                    <div class="controls">
                      <select name="locationId">
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
                      <select name="locationIdTo">
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
                    <button type="submit" name="assignsubmit" class="btn btn-success">Save</button>
                  </div>
                 </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div> 
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
  </body>
</html>
