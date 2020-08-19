<?php

include_once('C:/xampp/htdocs/stocker.pk/config/connect.php');
session_start();

// initializing variables
$userName = "";
$email    = "";
$errors = array();


// REGISTER USER
if (isset($_POST['save'])) {
  // receive all input values from the form
  $userId = $_POST['userId'];
  $userName = $_POST['userName'];
  $userType = $_POST['userType'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];

  $organizationName = $_POST['organizationName'];
  $organizationType = $_POST['organizationType'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($userName)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "select * from user where userName = '$userName' OR email = '$email' limit 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
	if ($user['userName'] === $userName) {
	  array_push($errors, "Username already exists");
	}

	if ($user['email'] === $email) {
	  array_push($errors, "email already exists");
	}
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
	
	  $insert_q1 = "insert into user (userName,userType,email,password,phone) VALUES ('$userName','$userType','$email','$password','$phone')";
	  if(mysqli_query($con, $insert_q1) == 1)
	  {
		  $insert_q2 = "insert into organization (organizationName,organizationType,userId) VALUES ('$organizationName','$organizationType',last_insert_id())";
		  if(mysqli_query($con, $insert_q2) == 1){
			$_SESSION['userName'] = $userName;
			header('location:login.php');
	}

		// echo '<script>
		// window.onload = function () { alert("You are being Registered Successfully. Press OK to Continue."); } 
		//</script>';

	  }
  }
}
?>

<!DOCTYPE html>
	<html lang="en">
<head>
		<meta charset="utf-8" />
		<title>Registration Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
        <meta content="Shreethemes" name="author" />
        <!-- FAVICON -->
    <link rel="shortcut icon" href="http://localhost/stocker.pk/theme/images/logo.png">
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
										<h4 class="title text-uppercase mt-3 mb-4">Create your account</h4>
									</div>
									<form class="login-form" action="register.php" method="post">

									<?php  if (count($errors) > 0) : ?>
	<div class="text-warning">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
										<div class="row">
										<input class="form-control" type="hidden" name="userId">
											<div class="col-md-6 mt-2 mb-0">
												<label>User Name </label>
												<input class="form-control" type="text" name="userName" placeholder="Name"  value="<?php echo $userName; ?>" >
											</div>

											<div class="col-md-6 mt-2 mb-0">
												<label>Organization Name </label>
												<input class="form-control" type="text" name="organizationName" placeholder="Organization Name" >
											</div>
											<div class="col-md-12 mt-2 mb-0">
												<label>Organization Type</label>
												<input class="form-control" type="text" name="organizationType" placeholder="Type" >
											</div>
											<div class="col-md-6 mt-2 mb-0">
												<label>Email <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
											</div>

											<div class="col-md-6 mt-2 mb-0">
												<label>Password <span class="text-danger">*</span></label>
												<input class="form-control" type="password" name="password" placeholder="Password" >
											</div>
											<div class="col-md-12 mt-2 mb-0">
												<label>Phone <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="phone" placeholder="Phone" >
											</div>
											<input class="form-control" type="hidden" name="userType" value="user" >
											<div class="col-lg-12 mt-3 mb-0">
											<button class="btn btn-custom w-100" type="submit" name="save" value="submit" >Register</button>
											</div>
											<div class="mx-auto">
											<p class="mb-0 mt-2"><small class="text-dark mr-1">Already have an account ?</small> <a href="login.php" class="text-dark font-weight-bold">Login</a></p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end Style switcher -->

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


<!-- Mirrored from shreethemes.in/bizzcane/page_signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Apr 2020 15:42:21 GMT -->
</html>