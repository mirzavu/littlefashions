<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Login or Register</title>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>

	<!-- Library CSS -->

	<link rel="stylesheet" href="css/library/font-awesome.min.css">

	<link rel="stylesheet" href="css/library/font-awesome.css">

	<link rel="stylesheet" href="css/library/bootstrap.min.css">
	<link rel="stylesheet" href="css/library/owl.carousel.css">
	<link rel="stylesheet" href="css/library/jquery-ui.min.css">
	<link rel="stylesheet" href="css/library/jquery.fancybox.css">
	
	<!-- MAIN STYLE -->
	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">

        <style>
a {
    color: #FF0000;
}
</style>
	<!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body>

	<!-- LOADING 
	<div class="loading-container" id="loading">
		<div class="loading-inner">
			<span class="loading-1"></span>
			<span class="loading-2"></span>
			<span class="loading-3"></span>
		</div>
	</div>-->
	<!-- END LOADING -->

	<div class="wrap-page">

		<!-- HEADER -->
        <nav class="navigation_top ">
            <?php include_once('top.php');?>
        </nav>		
        <header class="header _1">
            <?php include_once('header.php');?>
        </header>
        <header class="header _1">
            <?php include_once('menu.php');?>
        </header>
		
		<!-- BREAKCRUMB -->
		
		<!-- END BREAKCRUMB -->
		
		<!-- LOGIN REGISTER -->
		<section class="login-register">
			<div class="container">
				<div class="row">

					<!-- LOGIN -->
                    <div class="col-md-3"></div>
					<div class="col-md-6 logborder">

						<div class="heading _two text-left">
							<h2>Login </h2>
						</div>

						<div class="form login ">
							<form action="login-script.php" method="post">
							<label>Username <sup>*</sup></label>
							<input type="text" name="username" class="input-text">

							<label>Password <sup>*</sup></label>
							<input type="password" name="password" class="input-text">
							
							<p>
                                                            <a href="forget-password.php" style="color: #FF0000" >Forgot your Password?</a>
							</p>
							<div class="row">
								<div class="col-sm-6 col-md-12 col-lg-6">
									<button class="btn btn-5 btn-submit text-uppercase" name="submit" type="submit">Login</button>
                            	</div>
                                <div class="col-sm-6 col-md-12 col-lg-6">
                            		<a href="register.php" class="btn btn-5 btn-submit text-uppercase">Register</a>
								</div>
                                </div>
							<div class="btn-group">

								<p>You can login with social networks</p>

								<div class="row">

									<div class="col-sm-6 col-md-12 col-lg-6">
										<a class="btn btn-6 text-uppercase" href='fbconfig.php'><i class="fa fa-facebook"></i> Sign in with Facebook</a>
									</div>

									<div class="col-sm-6 col-md-12 col-lg-6">
										<a class="btn btn-7 text-uppercase"  href='process.php'><i class="fa fa-twitter"></i> Sign in with Twitter</a>
									</div>	

								</div>
                                <br>
                                <br>

							</div>
                            </form>
                           
						</div>

					</div>
					<!-- END LOGIN -->
                     <div class="col-md-3"></div>
				</div>
			</div>
		</section>
		<!-- END LOGIN REGISTER -->

		<!-- PARTNER -->
		<section class="partner partner-list">
        	<?php include_once('partners.php');?>
		</section>
		<!-- END PARTNER -->
		
		<!-- FOOTER -->
		<footer class="dark">
        	<?php include_once('footer.php');?>
		</footer>
		<!-- END FOOTER -->

		<!-- SCROLL TOP -->
		<div id="scroll-top" class="_1">Scroll Top</div>
		<!-- END SCROLL TOP -->

	</div>

	<!-- Library JS -->
	<script src="js/library/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="js/library/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/library/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/library/owl.carousel.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
	<script src="js/library/parallax.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.countdown.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.mb.YTPlayer.js" type="text/javascript"></script>
	<script src="js/library/jquery.responsiveTabs.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.fancybox.js" type="text/javascript"></script>
	<script src="js/library/SmoothScroll.js" type="text/javascript"></script>
	<script src="js/library/isotope.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.colio.min.js" type="text/javascript"></script>

	<!-- Main Js -->
	<script src="js/script.js" type="text/javascript"></script>
</body>
</html>