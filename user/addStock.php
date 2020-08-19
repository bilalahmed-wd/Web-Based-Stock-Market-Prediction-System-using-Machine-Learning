<?php

include("C:/xampp/htdocs/stocker.pk/config/connect.php");
include("C:/xampp/htdocs/stocker.pk/admin/auth.php");

$userId = $_SESSION['userId'];
$selectUserId = "select * from user where userName = '$userId'";
$resultUserId = mysqli_query($con, $selectUserId);
$row = mysqli_fetch_array($resultUserId);
$id = $row['userId'];


    if(isset($_POST['add'])){  
    $stockName = $_POST['stockName'];
  
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["importfile"]["name"]);
 
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
    $uploadOk = 1;
    if($imageFileType != "csv" ) {
      $uploadOk = 0;
    }
 
    if ($uploadOk != 0) {
       if (move_uploaded_file($_FILES["importfile"]["tmp_name"], $target_dir.'importfile.csv')) {
 
         // Checking file exists or not
         $target_file = $target_dir . 'importfile.csv';
         $fileexists = 0;
         if (file_exists($target_file)) {
            $fileexists = 1;
         }
         if ($fileexists == 1 ) {
 
            // Reading file
            $file = fopen($target_file,"r");
            $i = 0;
 
            $importData_arr = array();
                        
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
              $num = count($data);
 
              for ($c=0; $c < $num; $c++) {
                 $importData_arr[$i][] = $data[$c];
              }
              $i++;
            }
            fclose($file);
 
            $skip = 0;
            // insert import data
            foreach($importData_arr as $data){
               if($skip != 0){
                $stockDate = $data[0];
                $stockOpen = $data[1];
                $stockHigh = $data[2];
                $stockLow = $data[3];
                $stockClose = $data[4];
                $adjClose = $data[5];
                $volume = $data[6];

                $stockDate=date('Y-m-d',strtotime($stockDate));
 
                  // Checking duplicate entry
                  $sql = "select count(*) as allcount from stockdetails where stockDate='" . $stockDate . "' and stockOpen='" . $stockOpen . "' and  stockHigh='" . $stockHigh . "' and stockLow='" . $stockLow . "' and stockClose='" . $stockClose . "' and adjClose='" . $adjClose . "' and volume='" . $volume . "' ";
 
                  $retrieve_data = mysqli_query($con,$sql);
                  $row = mysqli_fetch_array($retrieve_data);
                  $count = $row['allcount'];
 
                  if($count == 0){
                     // Insert record

                     $insertStockInfo = "insert into stockinfo (stockName,userId) VALUES ('$stockName','$id')";
                    
                     if(mysqli_query($con, $insertStockInfo) == 1){ 
                       
                     $insertStockDetails = "INSERT into stockdetails (stockDate,stockOpen,stockHigh,stockLow,stockClose,adjClose,volume,stockId)
                     values ('$stockDate',$stockOpen,$stockHigh,$stockLow,$stockClose,$adjClose,$volume,last_insert_id())";
                     if(mysqli_query($con, $insertStockDetails) == 1){
                      echo '<script>
                      window.onload = function () { alert("Stock Added Successfully"); } 
                     </script>';
                    }        
                  }
                  else
                  {
                      echo '<script>
                       window.onload = function () { alert("Stock Added Unsuccessfully"); } 
                      </script>'.mysqli_error($con);
                  }

                  }
               }
               $skip ++;
            }
            $newtargetfile = $target_file;
            if (file_exists($newtargetfile)) {
               unlink($newtargetfile);
            }
          }
 
       }
    }
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Stocker.pk User Dashboard</title>

  <link rel="shortcut icon" href="http://localhost/stocker.pk/admin/img/logo.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->


<!-- Logo container-->
<div>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="" class="logo">
        <div>
            <img class="img-fluid" src="http://localhost/stocker.pk/admin/img/logo.png" alt="missing_logo"
                height="65">
        </div>
    </a>





    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="http://localhost/stocker.pk/user/">
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">

            <span>Profile Management</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="viewProfile.php?=<?php echo $_SESSION['userId']; ?>">View
                    Profile</a>
                <a class="collapse-item" href="editProfile.php?=<?php echo $_SESSION['userId']; ?>">Edit
                    Profile</a>


            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">

            <span>Stock Management</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="addStock.php">Add Stock</a>

            </div>
        </div>
    </li>



</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userId']; ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="changePassword.php?=<?php echo $_SESSION['userId']; ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
      
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://localhost/stocker.pk/logout.php" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Stock </h1>
          </div>

<!-- Import form (start) -->

<form class="login-form"  method="post" action="" enctype="multipart/form-data">


<div class="row">
<input class="form-control" type="hidden" name="userId">
  <div class="col-md-6 mt-2 mb-0">
    <label>Stock Name</label>
    <input class="form-control" type="text" name="stockName" placeholder="Stock Name" >
  </div>


  <div class="col-md-2 mt-3 mb-0">
    <label>Stock File</label>
    <input type='file' name="importfile" id="importfile">
  </div>
  <div class="col-lg-12 mt-3 mb-0">
  <button class="btn btn-success w-100" type="submit" id="add" name="add" value="Import" >Add</button>
  </div>

</div>
</form>

              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->





  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
