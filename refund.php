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
                	<p><strong>Littlefashions.in teams intention is to provide 100% satisfaction to the customers for the goods they have ordered.If by anychance the customers are not satisfied no need to worry we do accept returns.</strong></p>
                    
<p>We accept 10 days return policy for Clothes & Footwear and a 7 days return policy for all other items except for Personal Products such as  Wipes, Creams,oils, Nursing products such as breast pads & nipple shields, bottles and nipples, and cups</p>
<p>Grooming, bath and skin care products</p> 
<p>Oral Care products such as toothbrushes, teethers & soothers .</p>
<p>Please note that the product(s) should be unused, unwashed with all original tags intact and should be sent back in original packaging along with all parts and a copy of original invoice. To ensure that the quality of the product is maintained, we request you to please make sure that the product(s) are properly packaged when you are returning it.Littlefashions.in have the rights to reject any return if the product package is opened or the product looks used.</p>

<p>If any or all products that were originally part of an order placed using a coupon or offer are returned then the coupon code/offer will no longer be applicable on the order. The benefit of the coupon/offer will also not be included in the refund. If the product(s) returned are part of any free offer such as Buy 2 get 1 free or Buy 1 get 1 free, all the products related to the offer have to be returned, as they have been purchased as part of a group offer.</p>
<p><strong>Refund for Return :</strong></p>

<p>The refund process will be intiated only after completing the quality check. We will refund the entire amount paid by you for the product and the money will be directly credited to your account.Shipping and COD charges are non refundable.</p>
<p><strong>Cancellation:</strong></p>
<p>If the customer chooses to cancel the order before the product is shipped, he will be entitled to a 100% refund. Incase the product is shipped then the policy as mentioned above will be applicable.</p>

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