<?php include('con.php'); 

 session_start();

$role=$_SESSION['role'];

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
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/maruti-style.css" />
    <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png" />
  </head>

  <body>
    <!--Header-part-->
    <?php include('header2.php'); ?>
    <div id="content">
      <div id="content-header">
        <div id="breadcrumb">
          <a href="#" title="Go to Home" class="tip-bottom"
            ><i class="icon-home"></i> Home</a>
          <a href="#" class="current">Bus List</a>
        </div><br>
       &nbsp;&nbsp; &nbsp;&nbsp; <a class="btn btn-primary btn-mini" href="bus_tracking.php">Add New Bus Record</a>
      </div>

       <?php if(isset($_GET['flag'])){

       $query="delete from busassignmaster where assignId='".$_GET['id']."'";
       $result=mysqli_query($conn,$query);
      

       } ?>



      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon"><i class="icon-th"></i></span>
                <h5>Bus List</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Bus No</th>
                      <th>Location From</th>
                      <th>Location To</th>
                      <th>Action</th>


                    </tr>
                  </thead>
                  <tbody>

                  <?php $sql="select busmaster.busno,tracking_date,bus_tracking.busid,bus_tracking.trackingid,
                  users.username,l1.locationname as fromLocation,l2.locationname as toLocation,latitude,longitude,latitude_end,longitude_end
                   from bus_tracking
                  
                   inner join busmaster on busmaster.busId=bus_tracking.busid
                   inner join users on users.userid=bus_tracking.userid

                   inner join locationmaster as l1 on l1.locationId=bus_tracking.locationfrom
                   inner join locationmaster as l2 on l2.locationId=bus_tracking.locationto

                   where role!='Admin'
                  
                  ORDER BY trackingid DESC";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                      ?>
                    <tr class="gradeX">
                      <td><?php echo date('d-m-Y',strtotime($row['tracking_date'])) ?></td>
                      <td><?php echo $row['busno'] ?></td>
                      <td><?php echo $row['fromLocation'] ?></td>
                      <td><?php echo $row['toLocation'] ?></td>


                      <td><a class="btn btn-primary btn-mini"  onClick="updateLocation(<?php echo $row['trackingid'] ?>);">End Location</a></td>
                     
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

<script>
     function updateLocation(id){

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
    xhr.open("POST", "update_end_location.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send("lat=" + lat + "&long=" + long + "&id="+id);

    location.reload();
}
}

</script>

  </body>
</html>
