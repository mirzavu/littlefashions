<?php
 include_once('includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Seller Panel</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/jquery.bxslider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
		.main-container
		{
			min-height: 500px;
		}
	</style>
</head>
<body>
	<?php include_once('header.php'); ?>

	<!-- Navigation -->
    <?php //include_once('menu.php'); ?>
    <!-- End Navigation -->

    <div class="container main-container">
        

        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
			
                <div class="col-lg-12 col-sm-12">
                        <span class="title">Seller Panel</span>
                </div>
                
                <div class="clearfix bottom30"></div>
                <div class="clearfix bottom30"></div>
                
                
                <div class="col-lg-4 col-sm-4 pull-left">
                </div>
            	<div class="col-lg-6 col-sm-6 left">
            		<form action="login-script.php" method="post">
                        <div class="col-lg-8 col-sm-8">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-8 col-sm-8 top10">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="col-lg-8 col-sm-8 text-center top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" class="btn btn-primary" value="Login"> 
                            <input type="button" class="btn btn-primary" onclick="window.location = 'register.php';" value="Register">
                            <a href='forgot-password.php'>Forgot Password</a>  
                            </div>
                        </div>
                    </form>  
            
            	</div>
        		

				

        	</div>

        	<div class="clearfix visible-sm"></div>

			
			

        </div>
	</div>

	<?php include_once('footer.php'); ?>

    <a href="#top" class="back-top text-center" onclick="$('body,html').animate({scrollTop:0},500); return false">
    	<i class="fa fa-angle-double-up"></i>
    </a>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/jquery.blImageCenter.js"></script>
    <script src="js/mimity.js"></script>
</body>
</html>