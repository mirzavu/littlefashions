<?php
 include_once('../admin/includes/db.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>
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
                        <span class="title">Register</span>
                </div>
                
                <div class="clearfix bottom30"></div>
                <div class="clearfix bottom30"></div>
                
                
                <div class="col-lg-2 col-sm-2 pull-left">
                </div>
            	<div class="col-lg-8 col-sm-8 left">
            		<form action="registration-script.php" method="post" enctype="multipart/form-data" >
                        <div class="col-lg-8 col-sm-8">
                            <div class="col-md-3"><label for="name">Name</label></div>
                            <div class="col-md-9"><input type="text" name="name" class="form-control" required /></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-8 col-sm-8 top10">
                            <div class="col-md-3"><label for="email">Email</label></div>
                            <div class="col-md-9"><input type="email" name="email" class="form-control" required /></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-8 col-sm-8 top10">
                           <div class="col-md-3"> <label for="username">Username</label></div>
                            <div class="col-md-9"><input type="text" name="username" class="form-control" required/></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-8 col-sm-8 top10">
                            <div class="col-md-3"><label for="password">Password</label></div>
                            <div class="col-md-9"><input type="password" name="password" class="form-control" required /></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-8 col-sm-8 top10">
                            <div class="col-md-3"><label for="mobile">Mobile Number</label></div>
                            <div class="col-md-9"><input type="text" name="mobile" class="form-control" required /></div>
                        </div>
                        <div class="col-lg-8 col-sm-8 top10">
                            <div class="col-md-3"><label for="mobile">Address</label></div>
                            <div class="col-md-9"><textarea cols="10" rows="3" name="address" class="form-control" required></textarea></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-8 col-sm-8 text-center top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" name="submit" class="btn btn-primary" value="Register">
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