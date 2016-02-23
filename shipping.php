<?php include_once('includes/db.php');?>
<?php include_once('includes/functions.php');
session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Details List</title>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>

	<!-- Library CSS -->
	<link rel="stylesheet" href="css/library/font-awesome.min.css">
       <link rel="stylesheet" href="css/library/font-awesome.css">
	<link rel="stylesheet" href="css/library/bootstrap.min.css">
	<link rel="stylesheet" href="css/library/owl.carousel.css">
	<link rel="stylesheet" href="css/library/font-awesome.min.css">
	<link rel="stylesheet" href="css/library/jquery-ui.min.css">
	<link rel="stylesheet" href="css/library/jquery.fancybox.css">
	
	<!-- MAIN STYLE -->
	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">
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
		<!-- PRODUCT GRID -->
		<section class="product-grid">
			<div class="container">
				<div class="row">
					<div class="col-md-12">



						<!-- GRID CONTENT -->
						<div class="grid-cn-1">
                <div class="row">
                <div class="heading _1 text-center margin_t_15">
        
                    <h2 class="text-uppercase">Shipping Policy</h2>
        
                </div>
                <div class="col-md-12">
                	<p>Littlefashions.in ships its products to almost all parts of India. Orders placed will be shipped within 24 hrs. We ship on all days except Sunday and National Holidays.</p> 
 <p>A fixed shipping charge of Rs. 50 is applicable on all orders below Rs. 499 at all locations with an additional charge applicable at certain locations.
For orders equal to or above Rs. 499 (after the application of coupons or any other offer) free shipping is available at certain locations only. For other locations, additional shipping charges will be applicable. At these locations, in which additional charges are applicable, the Rs. 50 shipping charge will be added to the shipping charges for all orders below Rs. 499. </p>

<p>The shipping charge applicable per quantity of the product can be checked by entering your pin code details on the product pages and the total shipping charge applicable on the order will be the sum of the charges for all chargeable product(s) in your order (+ Rs. 50 for orders below Rs. 499). The order level charge will be visible to you in the cart as well as when you enter the shipping address while you are checking out with your order. </p>

<p>These shipping charges applicable are not refundable in the case of return/cancellation of the product or the order. </p>

<p>The shipping charges can be modified by Zepo Logistics. at any point without prior intimation. The new charges would reflect on the product page as well as in the checkout flow. </p>
<p>Estimated Delivery Time: For all areas serviced by reputed couriers, the delivery time would be within 3 to 4 business days of shipping (business days exclude Sundays and other holidays). However items weighing over 2 kilos or high volume may take a couple of days longer to reach. For other areas the products will be shipped through Indian Postal Service and may take 1-2 weeks depending on location. </p>
</p>
                </div>
                </div>
			</div>
		</section>
		<!-- END PRODUCT GRID -->

		<!-- PARTNER -->
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
       <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

   <script src="js/auto-product.js"></script>
</body>
</html>