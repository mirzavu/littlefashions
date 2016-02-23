<?
	include("includes/db.php");
	include("includes/functions.php");
	session_start();
    	$id = $_GET['id'];
	if($_REQUEST['command'] == 'add'  && $_REQUEST['product_id']>0 ){
		$product_id = $_REQUEST['product_id'];
		addtocart($product_id,1);
		header("location:cart.php");
		exit();
	 }
	 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Contact Us</title>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>

	<!-- Library CSS -->
      <link rel="stylesheet" href="css/library/font-awesome.min.css">

	<link rel="stylesheet" href="css/library/font-awesome.css">

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
				<h3 class="pull-left">Contact Us</h3>

			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- LOGIN REGISTER -->
		<section class="login-register">
			<div class="container">
				<div class="row">

					<!-- LOGIN -->
					<div class="col-md-12">
						<img src="images/contactpagebanner.jpg">
					</div>
                </div>
                    <div class="row">
<?php
		
								if (!isset($_POST['submit'])) {
									echo "";
								}
								
								else
								{
									
									$name = $_POST['name'];
									$email = $_POST['email'];
									$mobile = $_POST['mobile'];
									$city = $_POST['city'];
									$address = $_POST['address'];
									$requirment = $_POST['requirment'];
									
										$subject ="Customer want  Supports ";
										$emailTo ="wecare@littlefashions.in"; 
										$emailfrom =$email;
						$body = "Dear Admin, \n\n one customer Has filled the little fashions contact From";  
                                                $body.="\n Name   ".$name;  
                                                $body.="\n Email  ".$email; 
                                                $body.="\n Mobile Number ".$mobile; 
                                                $body.="\n City  ".$city; 
                                                $body.="\n Address ".$address; 
                                               $body.="\n Requirement  ".$requirment."\n\n\n\n";  

                                          
                                                      
                                             $body.="With Regards,\nLittle Fashions.";
										



                                                                     $headers ='From: $name <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;
								
										mail($emailTo, $subject, $body, $headers);
										$emailSent = true;
					
								}
						
							?>
							
							
								<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
									<center><p><br/><br/><br/>Thank you for Registering with Little Fashions<br/><br/><br/></p></center>
								<?php }else{ ?>
                    	<form action="#" method="POST">
                            <div class="heading _two text-left">
                                <h2>Get In Touch With Us</h2>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4 form login">
                                <label>Name</label>
                                <input type="text" class="input-text" name="name" required>
                                <label>Mobile Number</label>
                                <input type="text" class="input-text" name="mobile" required>
                                <label>Address</label>
                                <textarea rows="5"  name="address" style="width:100%" required></textarea>
                                <button type="submit" name="submit" class="btn btn-5 btn-submit text-uppercase pull-right">Submit</button>
                            </div>
                            <div class="col-md-4 form login">
                                <label>Email</label>
                                <input type="email" class="input-text" name="email" required>
                                <label>City</label>
                                <input type="text" class="input-text" name="city" required>
                                <label>Describe Your Requirement</label>
                                <textarea rows="5"  name="requirment" style="width:100%" required></textarea>
                                <button type="reset" class="btn btn-5 btn-submit text-uppercase">Reset</button>
                            </div>
                            <div class="col-md-2"></div>
                        </form>
                        <? } ?>
                    </div>
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
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="js/auto-product.js"></script>
</body>
</html>