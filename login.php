<?php

include('C:/xampp/htdocs/stocker.pk/config/connect.php');

	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['userId'])){
		
		$userName = stripslashes($_REQUEST['userName']); // removes backslashes
		$userName = mysqli_real_escape_string($con,$userName); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE userName='$userName'and password='$password' and userType = 'user' ";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['userId'] = $userName;
         
            
            header("Location: http://localhost/stocker.pk/user/"); // Redirect user to index.php
            
            }
            
            else{
                
				echo '<script>
                window.onload = function () { alert("Please Enter Correct Username or Password or Login Form is Incomplete"); } 
               </script>';
				}
    }


?>
<!DOCTYPE html>
    <html lang="en">
  
    <head>
        <meta charset="utf-8" />
        <title>Login Form</title>
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

        <div class="back-to-home d-none d-sm-block">
            <a href="index.php" class="text-white"><i class="pe-7s-home"></i></a>
        </div>

        
        <section class="bg-home bg-userpage" style="background-image:url('http://localhost/stocker.pk/theme/images/blog/ins02.jpg')">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-7">
                                <div class="login bg-white rounded p-4">
                                    <div class="text-center">
                                    <a href="http://localhost/stocker.pk/" class="logo text-dark">
											<div >
												<img src="http://localhost/stocker.pk/theme/images/logo.png" alt="missing_logo" height="100">
											</div>

										</a>
                                        
                                        <h4 class="title text-uppercase mt-3 mb-4">Enter Login Details</h4>  
                                    </div>
                                    <form class="login-form" action="" method="post">

                                         
                                        <div class="row">
                                        <input class="form-control" type="hidden" name="userId">
                                            <div class="col-lg-12" >
                                                <label>Username </label>
                                                <input class="form-control" type="text" name="userName" placeholder="Name" >
                                                
                                            </div>
    
                                            <div class="col-lg-12 mt-3">
                                                <label>Password </label>
                                                <input type="password" class="form-control" placeholder="Password" name="password" >
                                            </div>
                                           
                                            <div class="col-lg-12 mt-3 mb-0">
                                            <button class="btn btn-custom w-100" type="submit" name="save" value="submit">Sign in</button>
                                            </div>
                                 
                                            <div class="mx-auto">
											<p class="mb-0 mt-2"><small class="text-dark mr-1">Create account </small> <a href="register.php" class="text-dark font-weight-bold">Register</a></p>
											</div>
                                        </div>
                                    </form>
                                </div><!---->
                            </div> <!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </div>
            </div>
        </section><!--end section-->
       
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
    </body>


<!-- Mirrored from shreethemes.in/bizzcane/page_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Apr 2020 15:42:21 GMT -->
</html>