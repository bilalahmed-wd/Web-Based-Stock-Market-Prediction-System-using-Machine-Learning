<?php

include_once('config/connect.php');

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
    </head>

    <body >
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
        <section class="bg-home" style="background-image:url('theme/images/blurred-city-skyline-background-financial-graph-with-candlestick-chart-stock-market-black-color_147586-214.jpg'); background-repeat:no-repeat;">

            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row pt-5 mt-4 justify-content-center">
                            <div class="col-lg-12">
                            <h1 class="text-white">About Us</h1>
                            <p class="text-white" style="text-align:justify;">Stock market is very vast and difficult to understand. It is considered too uncertain to be predictable due to huge fluctuation of the market. Stock market prediction task is interesting as well as divides researchers and academics into two groups, those who believe that we can devise mechanisms to predict the market and those who believe that the market is efficient and whenever new information comes up the market absorbs it by correcting itself, thus there is no space for prediction.
Investing in a good stock but at a bad time can have disastrous result, while investing in a stock at the right time can bear profits. Financial investors of today are facing this problem of trading as they do not properly understand as to which stocks to buy or which stocks to sell in order to get optimum result. So, the purposed project will reduce the problem with suitable accuracy faced in such real time scenario.
</p>
                           

                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end con-->
                </div>  
            </div>
        </section><!--end section-->
        <!-- End Home -->

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