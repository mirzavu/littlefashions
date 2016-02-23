<?php
 @session_start();
 include_once('includes/db.php');
 include_once('includes/functions.php');

 unset($_SESSION['cart']);
 unset($_SESSION['finalprice']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title> </title>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>

	<!-- Library CSS -->
	<link rel="stylesheet" href="css/library/font-awesome.min.css">
	<link rel="stylesheet" href="css/library/bootstrap.min.css">
	<link rel="stylesheet" href="css/library/owl.carousel.css">
	<link rel="stylesheet" href="css/library/jquery-ui.min.css">
	<link rel="stylesheet" href="css/library/jquery.fancybox.css">
	
	<!-- MAIN STYLE -->
	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">

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
		<section class="breakcrumb bg-grey">
			<div class="container">
				<h3 class="pull-left"></h3>

			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- LOGIN REGISTER -->
		<section class="login-register">
			<div class="container">
				<div class="row">

					<!-- LOGIN -->
					<div class="col-md-3"></div>

					
					<!-- REGISTER -->
					<div class="col-md-6">

						<div class="heading _two text-left">
							<h2></h2>
						</div>

						<div class="form login">
                        	                  
					<?php
                                        /* Mail SCripting Starts*/
                   
                   
                       $msg = "Hello,".$names."Your Product Is Sold with Order ID:".$order_itemcode."For More Details Check Your Dashboard Account";
								
							
	$request = "";
	$param["username"] = "littlefashions"; 
	$param["password"] = "228800"; 
	$param["from"] = "LTLFHN"; 
	$param["to"] = "918341138015";
	$param["text"] = $msg;
	
	foreach($param as $key=>$val){
		$request.= $key."=".urlencode($val);
		$request.= "&";
	}
	
	$request = substr($request, 0, strlen($request)-1); 
	$url = "https://202.62.67.34/smpp.sms?".$request;
	$load = file_get_contents("https://202.62.67.34/smpp.sms?".$request);
        
        
	//$load = file_get_contents("https://202.62.67.34/smpp.sms?".$request);
        
                                        
                                        
                                        ?>
							
								
                        
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div id="sucess">
                                            
                                           <h4 class="pull-left">Your Order Has Been Placed Successfully.Please Check Your Dashboard</h4>
                                           <span><a href="order_history.php">Click Here To View Order History</a></span>  
                                        </div>
                                   <!-- <button class="btn btn-13 btn-submit text-uppercase" align="center" type="submit" name="submit" value="Register">Login</button>-->
                                    </form>
                                  
						</div>

					</div>

					<!-- END REGISTER -->
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