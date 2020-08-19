<?php

include('C:/xampp/htdocs/stocker.pk/config/connect.php');
include("C:/xampp/htdocs/stocker.pk/auth.php");



if(isset($_GET['userId'])){

    $userId = $_GET['userId'];
    
  
  
  }
  $selectStock = "select d.stockDate,d.stockOpen,d.stockHigh,d.stockLow,d.stockClose,d.adjClose,d.volume, s.stockName from stockdetails d join stockinfo s on d.stockId = s.stockId where userId = '$userId' ";
  $resultStock = mysqli_query($con, $selectStock);
  
  ?>
<!DOCTYPE html>
    <html lang="en">

<head>
<meta charset="utf-8" />
        <title>Stocker.pk</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
        <meta content="Shreethemes" name="author" />
    <!-- FAVICON -->
    <link rel="shortcut icon" href="http://localhost/stocker.pk/theme/images/logo 2.png">
        <!-- BOOTSTRAP -->
        <link href="http://localhost/stocker.pk/theme/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- MAGNIFIC POPUP -->
        <link href="http://localhost/stocker.pk/theme/css/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- ICON -->
        <link href="http://localhost/stocker.pk/theme/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/stocker.pk/theme/css/fontawesome.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/stocker.pk/theme/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" />
        <!--OWL SLIDER-->
        <link rel="stylesheet" href="http://localhost/stocker.pk/theme/css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="http://localhost/stocker.pk/theme/css/owl.theme.css"/> 
        <link rel="stylesheet" href="http://localhost/stocker.pk/theme/css/owl.transitions.css"/>
        <link rel="stylesheet" href="http://localhost/stocker.pk/theme/css/slick-theme.css"/>
        <link rel="stylesheet" href="http://localhost/stocker.pk/theme/css/slick.css"/>
        <!-- Custom Css -->
        <link href="http://localhost/stocker.pk/theme/css/style.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/stocker.pk/theme/css/colors/default.css" rel="stylesheet" id="color-opt">

          <!-- Custom fonts for this template-->
  <link href="http://localhost/stocker.pk/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="http://localhost/stocker.pk/admin/css/sb-admin-2.min.css" rel="stylesheet">

  <link href="http://localhost/stocker.pk/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="http://localhost/stocker.pk/admin/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="http://localhost/stocker.pk/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
    </head>

    <body style="background-image:url('http://localhost/stocker.pk/theme/images/black-and-white-newspaper-stock-exchange-stock-market-102152.jpg')">
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="cube1"></div>
                    <div class="cube2"></div>
                </div>
            </div>
        </div>

        <!-- Navigation Bar-->
        <header id="topnav" class="defaultscroll fixed-top navbar-sticky sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a href="http://localhost/stocker.pk/user/" class="logo">
                        <div >
                        <img src="http://localhost/stocker.pk/theme/images/logo.png" alt="missing_logo" height="65">
                        </div>
                    </a>
                </div>
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                       
                    <li><a href="http://localhost/stocker.pk/user/">Home</a></li>
                        <li><a href="http://localhost/stocker.pk/user/organization.php">Organizations</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li class="has-submenu"><a href="javascript:void(0)"> <?php echo $_SESSION['userId']; ?></a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="dashboard.php?=<?php echo $_SESSION['userId']; ?>">Dashboard</a></li>
                                        <li><a href="changePassword.php?=<?php echo $_SESSION['userId']; ?>">Change Password</a></li>
                                        <li><a href="http://localhost/stocker.pk/logout.php">Logout</a></li>
                                    </ul>
                                </li>


</div>
                        
                        </li>
                    </ul>
                        
                        
                    </ul>
                    <!-- End navigation menu-->
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->

        <!-- Start Home -->        
        <section class="bg-home"  >
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row pt-5 mt-4 justify-content-center">
                            <div class="col-lg-12">
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Stock Details</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Stock Name</th>
                      <th>Date</th>
                      <th>Open</th>
                      <th>High</th>
                      <th>Low</th>
                      <th>Close</th>
                      <th>Adj Close</th>
                      <th>Volume</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Stock Name</th>
                      <th>Date</th>
                      <th>Open</th>
                      <th>High</th>
                      <th>Low</th>
                      <th>Close</th>
                      <th>Adj Close</th>
                      <th>Volume</th>
                  </tfoot>
                  <tbody>
                  <?php 
                 if(mysqli_num_rows($resultStock) > 0)
                {
                  while($row = mysqli_fetch_assoc($resultStock))
                { 
                  ?>   
                  <tr>
                  <td><?php echo $row["stockName"]; ?></td>
                      <td><?php echo $row["stockDate"]; ?></td>
                      <td><?php echo $row["stockOpen"]; ?></td>
                      <td><?php echo $row["stockHigh"]; ?></td>
                      <td><?php echo $row["stockLow"]; ?></td>
                      <td><?php echo $row["stockClose"]; ?></td>
                      <td><?php echo $row["adjClose"]; ?></td>
                      <td><?php echo $row["volume"]; ?></td>
                    </tr>
                    <?php
                }
                }
              

                    ?>                    
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end con-->
                </div>  
            </div>
        </section><!--end section-->
        <!-- End Home -->

    
        
        <!-- javascript -->
        <script src="http://localhost/stocker.pk/theme/js/jquery.min.js"></script>
        <script src="http://localhost/stocker.pk/theme/js/bootstrap.bundle.min.js"></script>
        <script src="http://localhost/stocker.pk/theme/js/menu.js"></script>
        <!-- Magnific Popup -->
        <script src="http://localhost/stocker.pk/theme/js/jquery.magnific-popup.min.js"></script>
        <!-- SLIDER -->
        <script src="http://localhost/stocker.pk/theme/js/owl.carousel.min.js"></script>
        <script src="http://localhost/stocker.pk/theme/js/owlcarousel.init.js"></script>
        <script src="http://localhost/stocker.pk/theme/js/slick.min.js"></script>
        <script src="http://localhost/stocker.pk/theme/js/slick.init.js"></script>
        <!-- PARALLAX -->
        <script src="http://localhost/stocker.pk/theme/js/parallax.js"></script> 
        <!-- Switcher -->
        <script src="http://localhost/stocker.pk/theme/js/switcher.js"></script>
        <!-- Main Js -->
        <script src="http://localhost/stocker.pk/theme/js/app.js"></script>

        
  <!-- Bootstrap core JavaScript-->
  <script src="http://localhost/stocker.pk/admin/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost/stocker.pk/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="http://localhost/stocker.pk/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="http://localhost/stocker.pk/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="http://localhost/stocker.pk/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="http://localhost/stocker.pk/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="http://localhost/stocker.pk/admin/js/demo/datatables-demo.js"></script>
        
    </body>


<!-- Mirrored from shreethemes.in/bizzcane/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Apr 2020 15:33:11 GMT -->
</html>