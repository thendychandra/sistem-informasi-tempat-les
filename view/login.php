<!DOCTYPE html>
<html lang="en">
<head>
	<title>Athena Study Center - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" href="lib/img/favicon.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login_lib/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login_lib/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login_lib/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login_lib/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lib/login_lib/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login_lib/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login_lib/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lib/login_lib/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login_lib/css/util.css">
	<link rel="stylesheet" type="text/css" href="lib/login_lib/css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php 
		// if (isset($_GET['log'])) {
    	// 	if ($_GET['log']==2) {
        // 		echo "<div class='alert alert-danger'><strong>Periksa kembali email & katasandi Anda!</strong></div>";
    	// 	}
  		// }
?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('lib/img/profile.png');">
			<?php 
  				if (isset($_GET['log'])) {
    				if ($_GET['log']==2) {
        				echo "<div class='alert alert-danger' style='position: absolute; top: 0; right: auto;'><strong>Periksa kembali username & password Anda!</strong></div>";
    				}
  				}
			?>
			<div class="wrap-login100" >
				<form class="login100-form validate-form" method="post" action="model/proses.php">
					<span class="login100-form-logo" style="overflow: hidden;">	
						<img src="lib/img/favicon.png" style="padding-top: 40px;">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pwd" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<!--<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>-->

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						Don't have account? <br>
						<a class="txt1" href="tel:+6285225400215">
							Please contact Admin here . . .
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="lib/login_lib/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/login_lib/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/login_lib/vendor/bootstrap/js/popper.js"></script>
	<script src="lib/login_lib/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/login_lib/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/login_lib/vendor/daterangepicker/moment.min.js"></script>
	<script src="lib/login_lib/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="lib/login_lib/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="lib/login_lib/js/main.js"></script>

</body>
</html>