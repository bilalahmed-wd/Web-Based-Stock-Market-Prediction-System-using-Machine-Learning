<?php

include("C:/xampp/htdocs/stocker.pk/config/connect.php");
include("C:/xampp/htdocs/stocker.pk/auth.php");


$selectUser = "select u.userId,u.userName, u.email, u.phone, o.organizationName, 
o.organizationType from user u 
join organization o on u.userId = o.userId 
where userName = '{$_SESSION['userId']}'";

$resultUser = mysqli_query($con, $selectUser);

if(isset($_POST['submit'])){
  $userName = $_POST['userName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $organizationName = $_POST['organizationName'];
  $organizationType = $_POST['organizationType']; 

$changeProfile = "update user 
inner join organization on user.userId = organization.userId 
set user.userName = '$userName' , user.email = '$email' , user.phone = '$phone' ,
organization.organizationName = '$organizationName' , organization.organizationType = '$organizationType'
where userName = '{$_SESSION['userId']}' ";

if(mysqli_query($con, $changeProfile) == 1){
  header("location: http://localhost/stocker.pk/admin/viewProfile.php");
  //echo '<script>
  //window.onload = function () { alert("Profile Updated Successful"); } 
 //</script>';
}
else{
  echo '<script>
  window.onload = function () { alert("Profile not Updated Successful"); } 
 </script>';}

 







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

  <title>Stocker.pk Admin Dashboard</title>

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
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/stocker.pk/admin/" class="logo">
                        <div >
                            <img class="img-fluid" src="http://localhost/stocker.pk/admin/img/logo.png" alt="missing_logo" height="65">
                        </div>
                    </a>  
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/stocker.pk/admin/">
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
   
    <span>Stock Management</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      
      <a class="collapse-item" href="addStock.php">Add Stock</a>
      <a class="collapse-item" href="addPredictions.php">Add Predictions</a>
      
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    
    <span>User Management</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="addUser.php">Add User</a>

    </div>
  </div>
</li>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
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
    <a class="dropdown-item" href="viewProfile.php?=<?php echo $_SESSION['userId']; ?>">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        View Profile
      </a>
      <a class="dropdown-item" href="changePassword.php?=<?php echo $_SESSION['userId']; ?>">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Change Password
      </a>

      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="logout.php" >
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a>
    </div>
  </li>

</ul>

</nav>
<!-- End of Topbar -->
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Profile </h1>
          </div>

          <form class="login-form"  method="post" action="">
          <?php 
if(mysqli_num_rows($resultUser)  == 1)
{
    while($row = mysqli_fetch_assoc($resultUser))
    {
      
?>
     
<div class="row">
<input class="form-control" type="hidden" name="userId" value="<?php echo $row['userId'];?>">

        <div class="col-md-6 mt-2 mb-0">
        <label>User Name</label>
        <input class="form-control" type="text" name="userName" placeholder="User Name" value="<?php echo $row['userName']; ?>" >
    </div>
    <div class="col-md-6 mt-2 mb-0">
        <label>Email</label>
        <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" >
    </div> 
    <div class="col-md-6 mt-2 mb-0">
        <label>Organization Name</label>
        <input class="form-control" type="text" name="organizationName" placeholder="Organization Name" value="<?php echo $row['organizationName']; ?>" >
    </div> 
    <div class="col-md-6 mt-2 mb-0">
        <label>Organization Type</label>
        <input class="form-control" type="text" name="organizationType" placeholder="Organization Type" value="<?php echo $row['organizationType']; ?>" >
    </div> 
 <div class="col-md-6 mt-2 mb-0">
        <label>Phone</label>
        <input class="form-control" type="text" name="phone" placeholder="Phone" value="<?php echo $row['phone']; ?>">
    </div>

    <div class="col-lg-12 mt-3 mb-0">
    <button class="btn btn-success w-100" type="submit" name="submit" value="submit" >Update</button>
    </div>
    <?php
             }
        }

        ?>  



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



  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
