<?php

session_start();

include_once('db.php');

include_once('functions.php');

if(isset($_SESSION['loggedin']))

{

	header('Location: dashboard.php');

	exit;

}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="https://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Emedihelp</title>

<meta name="robots" content="no-cache" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<link href="images/favicon.png" rel="shortcut icon" />

<link rel="stylesheet" href="css/font-awesome.css">



<link href="css/style.css" rel="stylesheet" type="text/css" />

<link href="css/menu.css" rel="stylesheet" type="text/css" />

<link href="css/megamenu.css" rel="stylesheet" type="text/css" />

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="css/responsiveslides.css" />

<link href="css/owl.carousel.css" rel="stylesheet" />

<link href="css/nivo-lightbox.css" rel="stylesheet" type="text/css" />

<link href="css/default.css" rel="stylesheet" type="text/css" />



<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script src="js/responsiveslides.min.js"></script>

<script src="js/owl.carousel.js"></script>

<script type="text/javascript" src="js/superfish.js"></script>

<script type="text/javascript" src="js/jquery.mousewheel.js"></script>









</head>



<body id="innerpage">

<div id="wrapper" class="boxes">



	<!-- header -->

   <?php include_once('header.php'); ?>

    <!-- /navigation -->

    

    <!-- breadcrumb -->

    <div class="content">

    	<div class="breadcrumb">You are here : <a href="index.php">Home</a> &raquo;  Login </div>

    </div>

    <!-- /breadcrumb -->

    

    <!-- inner page -->

    <div class="inner-page" id="nivo-lightbox-demo">

    	<div class="content">

			

            

            	

            <!-- product details box -->        

            

            <div class="clear">

            	<!-- left panel -->    

			

            <div class="contact-us-block">

            

                <div class="cnt-ltPanel">

                <h3>Sign In</h3>

                    <form name="contactfrm" id="contactfrm" action="login-script.php" method="post">

                        <input name="username" id="username" type="text" placeholder="Email" />

                        <br class="spacer" />

                        

                        <input name="password" id="password" type="password" placeholder="Password" />

                        <br class="spacer" />

                        <input name="submit" type="submit" value="Submit" />

                    </form>

                    <br /><br />

                    <p><a href="forgot-password.php">Forgot Password?</a></p>

                    

                    <br /><br /><br /><br /><br />

                </div>

				

                

			

                

                

                <!-- /left panel -->

                

                

                <!-- right panel -->

                <div class="rtPanel">

                    

                    <div class="account">

                        <h2>Don't have an account? Sign Up!</h2>

                        <div class="span"><a href="login-with.php?provider=Facebook"><img src="images/facebook.png" alt=""/><i>Sign In with Facebook</i><div class="clear"></div></a></div>	

<!--                        <div class="span1"><a href="login-with.php?provider=Twitter"><img src="images/twitter.png" alt=""/><i>Sign In with Twitter</i><div class="clear"></div></a></div>-->

                        <div class="span2"><a href="login-with.php?provider=Google"><img src="images/gplus.png" alt=""/><i>Sign In with Google+</i><div class="clear"></div></a></div>

                    </div>	

                </div>

                 

			</div>

            

            

        </div>

    </div>

    <!-- /inner page -->

</div>   

    <!-- footer -->

    <?php include_once('footer.php'); ?>

	

      

    <!-- /footer -->

</div>







</body>

</html>

