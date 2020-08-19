<?php

include_once('config/connect.php');

?>
<!DOCTYPE html>
    <html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Stocker.pk</title>
       
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
                    <a href="" class="logo">
                        <div >
                            <img src="theme/images/logo.png" alt="not found" height="65">
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
        <section class="bg-home" style="background-image:url('theme/images/black-and-white-business-chart-computer-241544.jpg')">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row pt-5 mt-4 justify-content-center">
                            <div class="col-lg-12">
                                <div class="title-heading text-center">
                                    <h1 class="heading font-weight-bold text-capitalize mb-3 text-white">Stock Market <span class="text-custom"> Prediction System</span></h1>
                                    <p class="text-light mx-auto para-desc">By using Machine Learning</p>
  
                                    <div class="">
                                        <a href="register.php" class="btn rounded btn-custom mb-2 mr-2">Get started</a>
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
        
    </body>


<!-- Mirrored from shreethemes.in/bizzcane/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Apr 2020 15:33:11 GMT -->
</html>