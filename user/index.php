<?php

include('C:/xampp/htdocs/stocker.pk/config/connect.php');
include("C:/xampp/htdocs/stocker.pk/auth.php");
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

    <body>
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
                       
                    <li><a href="http://localhost/stocker.pk/">Home</a></li>
                        <li><a href="http://localhost/stocker.pk/user/organization.php">Organizations</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li class="has-submenu">
                            <a href="javascript:void(0)"><?php echo $_SESSION['userId']; ?></a>
                            <ul class="submenu">
                            <li><a href="dashboard.php?=<?php echo $_SESSION['userId']; ?>">Dashboard</a></li>
                                <li><a href="changePassword.php?=<?php echo $_SESSION['userId']; ?>">Change Password</a></li>
                                <li><a href="http://localhost/stocker.pk/logout.php">Logout</a></li>

                            </ul>
                        </li>   
                    </ul>
                    <!-- End navigation menu-->
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->

        <!-- Start Home -->        
        <section class="bg-home" style="background-image:url('http://localhost/stocker.pk/theme/images/black-and-white-business-chart-computer-241544.jpg')">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row pt-5 mt-4 justify-content-center">
                            <div class="col-lg-12">
                                <div class="title-heading text-center">
                                    <h1 class="heading font-weight-bold text-capitalize mb-3 text-white">Stock Market <span class="text-custom"> Prediction System</span></h1>
                                    <p class="text-light mx-auto para-desc">By using Machine Learning</p>
                                    <div class="">
                                        <a href="#" class="btn rounded btn-custom mb-2 mr-2">Get started</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end con-->
                </div>  
            </div>
        </section><!--end section-->
        <!-- End Home -->

        <!-- Feature Start -->
        <section class="section features bg-white feature-two-bg">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="card feature-two position-relative bg-transparent pl-4 pr-4 border-0 text-center">
                            <div class="icon mb-3">
                                <i class="pe-7s-world"></i>
                            </div>
                            <h4 class="feature-head mb-3">Top Organizations and Investors Stock Data</h4>
                            <p class="text-muted mb-0">On our platform you can find best information related to the one of the best organizations and investors of stock market </p>
                        </div>
                    </div><!-- end col -->  

                    <div class="col-md-4 center-fe">
                        <div class="card feature-two position-relative bg-transparent pl-4 pr-4 border-0 text-center">
                            <div class="icon mb-3">
                                <i class="pe-7s-shield"></i>
                            </div>
                            <h4 class="feature-head mb-3">Prediction of stocks</h4>
                            <p class="text-muted mb-0">You can be able to get very much accurate prediction related to the stocks that can be very much helpful in investiing money</p>
                        </div>
                    </div><!-- end col -->  

                    <div class="col-md-4 left-fe">
                        <div class="card feature-two position-relative bg-transparent pl-4 pr-4 border-0 text-center">
                            <div class="icon mb-3">
                                <i class="pe-7s-wallet"></i>
                            </div>
                            <h4 class="feature-head mb-3">Financial Analysis</h4>
                            <p class="text-muted mb-0">Along with the prediction the users of the system can also have a very good analysis of stock market as the representation of data will not only be in tablular form but also in form of graphs that will not only provide the details of future but also past records.</p>
                        </div>
                    </div><!-- end col -->  
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Feature End -->

        <!-- Footer Start -->
        <footer class="footer bg-dark">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h4 class="text-light font-weight-normal footer-head mb-4">Stocker.pk</h4>
                        <ul class="list-unstyled footer-list">
                            <li><i class="fas fa-map-marker-alt mr-2"></i> Sialkot,Pakistan</li>
                            <li><i class="fas fa-envelope mr-2"></i> name@domain.com</li>
                            <li><i class="fas fa-mobile mr-2"></i> +92 332 9122007</li>
                            <li><i class="fas fa-mobile mr-2"></i> +92 335 0465075</li>
                            <li><i class="fas fa-mobile mr-2"></i> +92 302 7528478</li>
                         
                        </ul>
                        <div class="mt-3">
                            <ul class="list-unstyled social-icon social mb-0">
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook" title="facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-linkedin" title="linkedin"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-dribbble" title="dribbble"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram" title="instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-twitter" title="twitter"></i></a></li>
                            </ul>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->


        <!-- Back to top -->
        <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
            <i class="mdi mdi-chevron-up d-block"> </i> 
        </a>
        <!-- Back to top -->
        
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