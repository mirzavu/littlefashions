<?php

	include("includes/db.php");

	include("includes/functions.php");

	session_start();



if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {

	header("location: login.php");

	exit();

}



$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>

<html><head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>Little Fashion : Fashion Redefined</title>

	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/library/font-awesome.min.css">

	<link rel="stylesheet" href="css/library/font-awesome.css">

	<link rel="stylesheet" href="css/library/bootstrap.min.css">

	<link rel="stylesheet" href="css/library/owl.carousel.css">

	<link rel="stylesheet" href="css/library/jquery-ui.min.css">

	<link rel="stylesheet" href="css/library/jquery.fancybox.css">

	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>

    <link href="caurosel/custom.css" rel="stylesheet">

    <!-- Owl Carousel Assets -->

    <link href="caurosel/owl.carousel.css" rel="stylesheet">

    <link href="caurosel/owl.theme.css" rel="stylesheet">

    <!-- Prettify -->

    <link href="caurosel/prettify.css" rel="stylesheet">

    <script>

		$(function(){

 var shrinkHeader = 300;

  $(window).scroll(function() {

    var scroll = getCurrentScroll();

      if ( scroll >= shrinkHeader ) {

           $('.header').addClass('shrink');

        }

        else {

            $('.header').removeClass('shrink');

        }

  });

function getCurrentScroll() {

    return window.pageYOffset || document.documentElement.scrollTop;

    }

});

    </script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>

<style>

	i

	{

		margin-right:5px !important;

	}

</style>

</head>

<body>

	<!-- LOADING -->

	<div class="loading-container" id="loading">

		<div class="loading-inner">

			<span class="loading-1"></span>

			<span class="loading-2"></span>

			<span class="loading-3"></span>

		</div>

	</div>

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

		<!-- END HEADER -->

				<? 

					$sql = mysql_query("SELECT * FROM `users` where id = '$user_id' ");

					$row = mysql_fetch_array($sql);

				?>		<section class="breakcrumb bg-grey">

			<div class="container">

            	<div class="col-md-6">

				<h3 class="pull-left">My Account</h3>

                </div>

                <div class="col-md-6 pull-right">

                <span class="pull-right"> Welcome : <?=$row['username'];?></span>

                </div>

			</div>

		</section>		<!-- PRODUCT GRID -->

		<section class="product-grid">

			<div class="container">

				<div class="row">

					<div class="col-md-3">

						

						<?php include_once('user-sidebar.php');?>

					</div>

					<!-- END SIDEBAR -->

					<div class="col-md-9">

						<!-- GRID CONTENT -->

						<div class="grid-cn-1">

							<div class="row">

                            	<h3 class="name border-bottom">Cash Coupons</h3>

                                <div class="cash"><h5 class="name border-bottom">You Have <strong>Rs. 1500</strong> 

                                	Cash Available in your account <a href="#">Shop Now</a></h5>

                                </div>

							</div>

							<div class="row coupon">

                                <div class="cp_ctn fw">

                                <div class="col-md-

                                _1">

                                	<div class="col-md-3">

                                        <div class="p_left lef1">

                                            <div class="cp">

                                                Coupon Code

                                            </div>

                                            <div class="blk  lft">

                                                <div class="cpcd sprite-ac sp_img">

                                                    EXT50AVNT

                                                </div>

                                            </div>

                                        </div> 

                                     </div>

                                     <div class="col-md-9">

                                        <div class="p_right rt">

                                            <div class="rtc">

                                                <div class="txt_title rtc_tit">

                                                    <span>Extra Rs. 50 OFF* on Philips Avent</span>

                    

                                                </div>

                                                <div class="rtcl1">

                                                    <div class="p_left">

                                                        <span>Coupon Amount: Rs. </span><span class="bld">50</span>&nbsp;  | &nbsp;<span> Offer valid till : 31-Jul-2015</span>

                                                    </div>

                                                </div>

                                                <div style="clear: both;"></div>

                                                <div class="blk">

                                                    <div class="p_left">

                                                        <span class="span1 show" id="viewId-1"><a href="">View Details</a></span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                     </div>                              

                                </div>

                            </div>

						</div>

						<!-- END GRID CONTENT -->

						<!-- BOTTOM LIST -->

					</div>



					<!-- SIDEBAR -->

				</div>

			</div>

		</section>

		<!-- END PRODUCT GRID -->



		<!-- PARTNER -->

		

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