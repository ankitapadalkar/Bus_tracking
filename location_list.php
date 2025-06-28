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
    <div id="content">
      <div id="content-header">
        <div id="breadcrumb">
          <a href="#" title="Go to Home" class="tip-bottom"
            ><i class="icon-home"></i> Home</a>
          <a href="#" class="current">Location List</a>
        </div><br>
       &nbsp;&nbsp; &nbsp;&nbsp; <a class="btn btn-primary btn-mini" href="locationmaster.php">Add New Location</a>
      </div>

       <?php if(isset($_GET['flag'])){

       $query="delete from locationmaster where locationId='".$_GET['id']."'";
       $result=mysqli_query($conn,$query);
      

       } ?>

      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon"><i class="icon-th"></i></span>
                <h5>Location List</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                  <thead>
                    <tr>
                      <th>Location ID</th>
                      <th>Location Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php $sql="select * from locationmaster ORDER BY locationId DESC";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                  ?>
                    <tr class="gradeX">
                      <td><?php echo $row['locationId'] ?></td>
                      <td><?php echo $row['locationname'] ?></td>
                      <td><a class="btn btn-primary btn-mini" href="locationmaster.php?id=<?php echo $row['locationId']; ?>">Edit</a></td>
                      <td class="center"> <a class="btn btn-danger btn-mini" href="location_list.php?id=<?php echo $row['locationId']; ?>&flag=1">Delete</a></td>
                    </tr>
                    <?php } ?>
                    
                      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
     
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/maruti.js"></script>
    <script src="js/maruti.tables.js"></script>
  </body>
</html>
