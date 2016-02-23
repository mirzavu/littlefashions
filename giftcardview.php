<?php

include_once("includes/db.php");
include_once("includes/functions.php");

session_start();


/*unset($_SESSION['Itemname']);
unset($_SESSION['receiptname']);
unset($_SESSION['giftamount']);
unset($_SESSION['couponcode']);*/
?>


<?php
if($_REQUEST['command'] == 'add'  && $_REQUEST['product_id']>0 ){

		$product_id = $_REQUEST['product_id'];

                $product_ps=$_REQUEST['product_ps'];

                $product_age=$_REQUEST['product_age'];

		addtocart($product_id,1,$product_ps,$product_age);

		//header("location:cart.php");
                 echo "<script> window.location='cart.php'; </script>";

		exit();

	 }

?>
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

	<link rel="stylesheet" href="css/library/bootstrap.min.css">

	<link rel="stylesheet" href="css/library/owl.carousel.css">

	<link rel="stylesheet" href="css/library/font-awesome.min.css">

	<link rel="stylesheet" href="css/library/jquery-ui.min.css">

	<link rel="stylesheet" href="css/library/jquery.fancybox.css">

	

	<!-- MAIN STYLE -->

	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">

        
        <?php include_once('includes/analytics.php');?>



	<script language="javascript">

		function addtocart(pid,ps,age)

                 {


			document.form1.product_id.value=pid;

                        document.form1.product_ps.value=ps;

                         document.form1.product_age.value=age;

			document.form1.command.value='add';

			document.form1.submit();

		 }
                 
                 function test()
                 {
                     alert();
                 }

	</script>


	

        
        
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

  <form name="form1">    

        <input type="hidden" name="product_id" />

        <input type="hidden" name="product_ps" />

        <input type="hidden" name="product_age" />

        <input type="hidden" name="command" />

    </form>

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

                <div class="heading _1 text-center margin_t_15">

        

                    <h2 class="text-uppercase"> View Giftcard</h2>

        

                </div>

				<div class="row">

					<div class="col-md-12">







						<!-- GRID CONTENT -->

						<div class="grid-cn-1">

							<div class="row">

						<div class=" col-md-8">

							<!-- GRID ITEM -->

								<div class="image" style="height:auto !important;">

 
                                                                     

									<a href="#">

										<img src="images/giftcard1.png" alt="">

									</a>
                                                                   

								</div>

							</div>

							<!-- END GRID ITEM -->

							<div class=" col-md-4">
                                                            

						<div class="form login ">
                                                    <?php
                                                    $coupcode=$_SESSION['couponcode'];
                                                    $sel=  mysql_query("select * from gift_coupon where coup_hint='$coupcode' and status='1'");
                                                    $row=  mysql_fetch_assoc($sel);
                                                    
                                                    $product_id=$row['gid'];
                                                    ?>
                                                   

                                                    <form id="form" name="form" method="GET" action="">

							<label>Recipient's Name <sup>*</sup></label>

                                                      
							<input type="text" readonly value="<?php echo $row['recipient_name']; ?>" name="recipientname" class="input-text">



							<label>Recipient's Email Id<sup>*</sup></label>

							<input type="text" readonly value="<?php echo $row['recipient_email']; ?>" name="recipientemail" class="input-text">

							

                            <label>Message<sup>*</sup></label>

                            <textarea rows="5" readonly name="message" value="" cols="30" class="input-text"><?php echo $row['message']; ?></textarea>



							<label>Gift From<sup>*</sup></label>

							<input type="text" readonly value="<?php echo $row['sender_name']; ?>" name="password" class="input-text">



							<label>Select Amount<sup>*</sup></label>

								<input type="amount" readonly value="<?php echo $row['amount']; ?>" name="password" class="input-text">
                           <?php
                           $price=$row['amount'];
                          $sqlps=$price;
                          $pfirstage=14;
                           ?>

                                                               
<a href="#" class="btn btn-16 add-cart text-uppercase" onclick="addtocart(<?=$product_id ?>,<?=$sqlps?>,<?=$pfirstage?>)" title="add to cart"><i class="fa fa-cart-plus"></i> </a>
			
          

                            </form>



						</div>

                            </div>

							</div>

						</div>

						<!-- END GRID CONTENT -->

					</div>

	

				</div>

                <div class="row">

                <div class="heading _1 text-center margin_t_15">

        

                    <h2 class="text-uppercase">Terms & Conditions</h2>

        

                </div>

                <div class="col-md-12">

                	<ul class="fa-th-list">

                    	<li>Gift certificate value can be anything between Rs.500 and Rs.5000.</li>

                        <li>Delivered via email.</li>

                        <li>The Gift Certificate can be used against your purchase on littlefashion.in.</li>

                        <li>Customers must open a free account at littlefashion.in to redeem his or her gift certificate.</li>

                        <li>Every gift certificate has a unique code. To redeem the gift certificate, enter this code in your shopping cart</li>

                        <li>Both a gift certificate and credit card may be used to pay for your order. If both are used, we will charge the gift card first and the remaining balance will be charged to your credit card.</li>

                        <li>Unused gift certificates may not be redeemed for cash.</li>

                        <li>Gift certificates are not replaceable if lost or stolen.</li>

                        <li>Gift certificates value to be redeemed in single purchase only.</li>

                        <li>Gift certificates can be redeemed within a period of one year from the date of purchase.</li>

                        <li>Gift certificates may only be redeemed for orders shipped in India.</li>

                        <li>Gift Certificate cannot be purchased through Cheque/Cash on Delivery.</li>

                    </ul>

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

</body>

</html>
