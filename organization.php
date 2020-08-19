<?php

include('config/connect.php');

$selectOrganization = "select * from organization where organizationName!='stocker.pk'";
$resultOrganization = mysqli_query($con, $selectOrganization);

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
        <link rel="shortcut icon" href="theme/images/logo.png">
        <!-- BOOTSTRAP -->
        <link href="theme/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- MAGNIFIC POPUP -->
        <link href="theme/css/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- ICON -->
        <link href="theme/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="theme/css/fontawesome.css" rel="stylesheet" type="text/css" />
        <link href="theme/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" />
        <!--OWL SLIDER-->
        <link rel="stylesheet" href="theme/css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="theme/css/owl.theme.css"/> 
        <link rel="stylesheet" href="theme/css/owl.transitions.css"/>
        <link rel="stylesheet" href="theme/css/slick-theme.css"/>
        <link rel="stylesheet" href="theme/css/slick.css"/>
        <!-- Custom Css -->
        <link href="theme/css/style.css" rel="stylesheet" type="text/css" />
        <link href="theme/css/colors/default.css" rel="stylesheet" id="color-opt">

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

    <body  style="background-image:url('theme/images/person-holding-blue-ballpoint-pen-on-white-notebook-669610.jpg')">
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
                    <a href="index-2.html" class="logo">
                        <div >
                            <img src="theme/images/logo.png" alt="missing_logo" height="65">
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
                       
                       <li><a href="index.php">Home</a></li>
                           <li><a href="organization.php">Organizations</a></li>
                           <li><a href="about.php">About Us</a></li>
                           <li><a href="contact.php">Contact Us</a></li>
                           <li class="has-submenu">
                               <a href="javascript:void(0)">Login</a>
                               <ul class="submenu">
                                   <li><a href="login.php"> As User</a></li>  
                                   <li><a href="http://localhost/stocker.pk/admin/"> As Admin</a></li> 
   
                               </ul>
                           </li>
                           <li><a href="register.php">Register</a></li>
                              
                       </ul>
                   
                       
                       <!-- End navigation menu-->
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->
        


        <!-- Start Home -->        
        <section class="bg-home" >

            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row pt-5 mt-4 justify-content-center">
                            <div class="col-lg-12">
                           
                           
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Organization Details</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Organization Name</th>  
                      <th>Organization Type</th>                   
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Organization Name</th>
                    <th>Organization Type</th>                     
                   <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  <?php 
                 if(mysqli_num_rows($resultOrganization) > 0)
                {
                  while($row = mysqli_fetch_assoc($resultOrganization))
                { 
                  ?>   
                  <tr>
                  <td><?php echo $row["organizationName"]; ?></td>
                  <td><?php echo $row["organizationType"]; ?></td>
                     
                      <td>
                      <!-- <button class="btn btn-default"  ><a href="stock.php?userId=<?php echo $row['userId'] ?>">View Stock History</a></button>-->
                      <button class="btn btn-default"  ><a href="predictions.php?userId=<?php echo $row['userId'] ?>">View Stock Prediction</a></button>
                  </td>
                 
                  
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

    




        <!-- Back to top -->
        <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
            <i class="mdi mdi-chevron-up d-block"> </i> 
        </a>
        <!-- Back to top -->
        
        <!-- javascript -->
        <script src="theme/js/jquery.min.js"></script>
        <script src="theme/js/bootstrap.bundle.min.js"></script>
        <script src="theme/js/menu.js"></script>
        <!-- Magnific Popup -->
        <script src="theme/js/jquery.magnific-popup.min.js"></script>
        <!-- SLIDER -->
        <script src="theme/js/owl.carousel.min.js"></script>
        <script src="theme/js/owlcarousel.init.js"></script>
        <script src="theme/js/slick.min.js"></script>
        <script src="theme/js/slick.init.js"></script>
        <!-- PARALLAX -->
        <script src="theme/js/parallax.js"></script> 
        <!-- Switcher -->
        <script src="theme/js/switcher.js"></script>
        <!-- Main Js -->
        <script src="theme/js/app.js"></script>

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