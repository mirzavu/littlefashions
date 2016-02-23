<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 
 $sel=  mysql_query("select * from coupons where my_choice='signupcoup'");
 $getcoupcoes=  mysql_fetch_assoc($sel);
 
 $coupcode=$getcoupcoes['coupon'];
 $couppercent=$getcoupcoes['percentage'];
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title> Register</title>

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
				<h3 class="pull-left">Register</h3>

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
							<h2>Create an New Account</h2>
						</div>

						<div class="form login">
                        	<?php
		
								if (!isset($_POST['submit'])) {
									echo "";
								}
								
								else
								{
									$min=1;$max=999;
                                                                         $randomid=rand($min,$max);
									$name = $_POST['name'];
									$email = $_POST['email'];
									$username= $_POST['username'];
									$password = $_POST['password'];
									$dob = $_POST['dob'];
									$mrgdate = $_POST['mrgdate'];
									
									$mobile = $_POST['mobile'];
									$flag = 0;
									
									$timezone = "Asia/Calcutta";
									date_default_timezone_set($timezone);
									$added = date("d-m-Y H:i:s");
									$cutomercode_id=user_cutomercode_id();
									$sql_check = mysql_query("SELECT * FROM users where email = '$email' ");
									$row_check = mysql_fetch_array($sql_check);
					
									if(is_array($row_check)) 
									{
										echo "<script language=javascript>alert('User Account Already Exists with the Given Email ID, Please Login..')</script>";
										echo "<script type='text/javascript'>window.location='login.php'</script>";
										exit();	
									}
									else{
							
									
									$sql = mysql_query("INSERT INTO users (cutomercode_id,name, email, username, password, dob, mrgdate, mobile, added, flag,random_id) VALUES ('$cutomercode_id','$name', '$email', '$username', '$password', '$dob', '$mrgdate', '$mobile', '$added', '$flag','$randomid')");
									
									if (!$sql)
									{
										die('Error: ' . mysql_error());
									}
									else
									{
                                                                            $sel=  mysql_query("select * from coupons");
                                                                            $getsign=  mysql_fetch_assoc($sel);
                                                                            $signup=$getsign['coupon'];
                                                                            $perc=$getsign['percentage'];
                                                                            
                                                                             $selusers=  mysql_query("select * from users where random_id='$randomid' ");
                                                                            $fetch=  mysql_fetch_assoc($selusers);
                                                                            $userid=$fetch['id'];

                                                                            $insertwallet=  mysql_query("insert into wallet (user_id,points,txid) values ('$userid','0','0')");
                                                                            
                                                                            
                                                                            $msg = "Hello,".$name."Thank you for Registering with Little Fashions Your Signup Code is $signup.It is Valid Only 1 Time with $perc";
								
							
                                                                                $request = "";
                                                                                $param["username"] = "littlefashions"; 
                                                                                $param["password"] = "228800"; 
                                                                                $param["from"] = "LTLFHN"; 
                                                                                $param["to"] = "91".$mobile;
                                                                                $param["text"] = $msg;

                                                                                foreach($param as $key=>$val){
                                                                                        $request.= $key."=".urlencode($val);
                                                                                        $request.= "&";
                                                                                }

                                                                                $request = substr($request, 0, strlen($request)-1); 
                                                                                $url = "https://202.62.67.34/smpp.sms?".$request;
                                                                                $load = file_get_contents("https://202.62.67.34/smpp.sms?".$request);
        
                                                                            
                                                                            
										$subject = "Welcome to littlefashions.in";
										$emailTo = $email; 
										$emailfrom = "info@littlefashions.in"; 
										$body = "Dear $name, \n\nThank you for Registering with Little Fashions. Please Note This Signup Coupon :".$coupcode." with".$couppercent." Percent Discount \n\n\n\nWith Regards,\nLittle Fashions.    ";
										$headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;
								
										mail($emailTo, $subject, $body, $headers);
										$emailSent = true;
					
									}
									
									}
									
								}
						
							?>
							
							
								<?php if(isset($emailSent) && $emailSent == true) { //If email is sent 
								
									echo "<script type='text/javascript'>window.location='reg_success.php'</script>";
								}else{ ?>
                        
                                    <form action="#" method="post" enctype="multipart/form-data">
                                    <label>Name <sup>*</sup></label>
                                    <input type="text" name="name" class="input-text" required>
        
                                    <label>Email <sup>*</sup></label>
                                    <input type="email" name="email" pattern="([\.a-zA-Z0-9_\-])+@([a-zA-Z0-9_\-])+(([a-zA-Z0-9_\-])*\.([a-zA-Z0-9_\-])+)+" class="input-text" required>
        
                                    <label>Username <sup>*</sup></label>
                                    <input type="text" name="username" class="input-text" required>
        
                                    <label>Password<sup>*</sup></label>
                                    <input type="password" name="password" class="input-text" required>

                                    <label>Child DOB<sup>*</sup></label>
                                    <input type="date" name="dob" class="input-text" >

                                    <label>Marriage Date<sup>*</sup></label>
                                    <input type="date" name="mrgdate" class="input-text" >

        
                                    <label>Mobile<sup>*</sup></label>
                                    <input type="text" name="mobile" pattern="[1-9]{1}[0-9]{9}" maxlength="10" class="input-text" required>
        
        
                                    <button class="btn btn-13 btn-submit text-uppercase" type="submit" name="submit" value="Register">Register</button>
                                    </form>
                                    <? } ?>
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