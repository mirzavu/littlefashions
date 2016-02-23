<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: index.php");
	exit();
 }
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
</head>
<body>
	<?php include_once('header.php'); ?>

	<!-- Navigation -->
    <?php include_once('menu.php'); ?>
    <!-- End Navigation -->

    <div class="container main-container">
        

        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
			
                <div class="col-lg-12 col-sm-12">
                        <span class="title">Add Coupons</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                	<?php 
					
				
						if (!isset($_POST['coupon'])) 
						{
							echo "";
						}
						else
						{
							$coupon = $_POST['coupon'];
							$percentage = $_POST['percentage'];
							
							
							
							
							$sql = mysql_query("INSERT INTO coupons (coupon, percentage, flag) VALUES ('$coupon', '$percentage', '0')");
							
							if (!$sql)
							{
								die('Error: ' . mysql_error());
							}
							else
							{
								echo '<script language=javascript>alert("Coupon Added..")</script>';
								echo "<script type='text/javascript'>window.location='add-coupons.php'</script>";
								exit();					
							}
						}
					?>
                
                	<form action="#" method="post" enctype="multipart/form-data">
                        <div class="col-lg-6 col-sm-6 top10">
                            <label for="category-name">Coupon Name</label>
                            <input type="text" name="coupon" class="form-control" />
                        </div>
                        
                        <div class="clearfix"></div><div class="col-lg-6 col-sm-6 top10">
                            <label for="category-name">Percentage</label>
                            <input type="text" name="percentage" class="form-control" />
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="col-lg-8 col-sm-8 top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" class="btn btn-primary" value="Add Coupon">
                            </div>
                        </div>
                    </form>
            		
                    
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    
            
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