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
                        <span class="title">Add Offers</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                	<?php 
					
				
						if (!isset($_POST['offer_name'])) 
						{
							echo "";
						}
						else
						{
							$offer_name = $_POST['offer_name'];
							$cap = substr($offer_name,0,4);
							$file = $_FILES['image']['tmp_name'];
							$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
							$image_name = addslashes($_FILES['image']['name']);
							$ofper=$_POST['ofper'];
							move_uploaded_file($_FILES["image"]["tmp_name"],"../images/offers/"."$cap".$_FILES["image"]["name"]);
							
							$img_loc = "images/offers/"."$cap".$_FILES["image"]["name"];
							
							
							$sql = mysql_query("INSERT INTO offers (offer_name, image,offerpercent, flag) VALUES ('$offer_name', '$img_loc','$ofper', 1)");
							
							if (!$sql)
							{
								die('Error: ' . mysql_error());
							}
							else
							{
								echo '<script language=javascript>alert("Offer Sucessfully Added..")</script>';
								echo "<script type='text/javascript'>window.location='add-offers.php'</script>";
								exit();					
							}
						}
					?>
                
                	<form action="#" method="post" enctype="multipart/form-data">
                        <div class="col-lg-6 col-sm-6 top10">
                            <label for="category-name">Offer Name</label>
                            <input type="text" name="offer_name" class="form-control" />
                        </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-6 col-sm-6 top10">
                            <label for="category-name">Offer Percentage</label>
                            <input type="text" name="ofper" class="form-control" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-6 col-sm-6 top10">
                            <label for="category-name">Image</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-8 col-sm-8 top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" class="btn btn-primary" value="Add Offer">
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