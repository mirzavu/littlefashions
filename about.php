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

        

                    <h2 class="text-uppercase">About Little Fashion</h2>

        

                </div>

                <div class="col-md-12">

                	




<p>Littlefashions.in is designed to provide an opportunity to modern  Indian parents to get products from most of the top brands at lower prices with one click.The company will deal in all kinds of baby products from new born kids to toddlers. Our objective is to provide quality and genuine products to customers at affordable price. We tied up with several international and Indian top brands to provide the best and unique collections to customers. Our office is located in Hyderabad.</p>


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
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="js/auto-product.js"></script>
</body>

</html>