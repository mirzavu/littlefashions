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
    <?php include_once('menu.php'); ?>
    <!-- End Navigation -->

    <div class="container main-container">
        

        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
			
                <div class="col-lg-12 col-sm-12">
                        <span class="title">Edit Brands</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                
                	<?php
					function renderForm($id, $brand_name,$brand_image, $error)
					{
						if ($error != '')
						{
							echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
						}
					?> 
                	
                	<form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                    	<input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group">
                            <label for="product-name" class="col-sm-2 control-label">Brand Name</label>
                            <div class="col-sm-6">
                            <input type="text" name="brand_name" class="form-control" value="<?php echo $brand_name; ?>" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        
                        <div class="form-group">
                            <label for="product-name" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                            <input type="file" name="image" class="form-control" value=""/>
                                   <img src='../<?=$brand_image?>' width="75px" height="75px" />   
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        
                        
                        
                        <div class="form-group col-lg-4 col-sm-4 text-right top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                            </div>
                        </div>
                    </form>
            		
                    
                    <?php 
					}
					
					if (isset($_POST['submit']))
					{ 
						if (is_numeric($_POST['id']))
						{
							$id = $_POST['id'];
							$brand_name = $_POST['brand_name'];
							
							if ($brand_name == '')
							{
								$error = 'ERROR: Please fill in all required fields!';
								renderForm($id, $brand_name,  $error);
							}
                                                        
                                                        
                                                      
                                                        
							else
							{
								
                                                            
                                                         $cap = substr($brand_name,0,4);
							$file = $_FILES['image']['tmp_name'];
							$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
							$image_name = addslashes($_FILES['image']['name']);
                                                        $rand=  rand(500,250);
							
                                                        
                                                        if($_FILES['image']['name'] != "")
                                                            {

                  
							move_uploaded_file($_FILES["image"]["tmp_name"],"../images/brands/"."$cap". $rand.$_FILES["image"]["name"]);
							
							$img_loc = "images/brands/"."$cap".$rand.$_FILES["image"]["name"];
							
							
							$sql2 = mysql_query("UPDATE brands SET `image` ='$img_loc' WHERE id='$id'");
							
                                                            
                                                        }
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
								$sql = mysql_query("UPDATE brands SET `brand_name` ='$brand_name' WHERE id='$id'");
							
								if (!$sql)
								{
									die('Error: ' . mysql_error());
								}
								else
								{
									echo '<script language=javascript>alert("Updated..")</script>';
									echo "<script type='text/javascript'>window.location='view-brands.php'</script>";
									exit();					
								}
							}
						}
						else
						{
							echo 'Error!';
						}
					}
					else
					{
						if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
						 {
							$id = $_GET['id'];
							$result = mysql_query("SELECT * FROM brands WHERE id = '$id' ")or die(mysql_error()); 
							$row = mysql_fetch_array($result);
							if($row)
							{
								$brand_name = $row['brand_name'];
                                                                $brand_image = $row['image'];
								renderForm($id, $brand_name,$brand_image,'');
							}
							else
							{
								echo "No results!";
							}
						}
						else
						{
							echo 'Error!';
						}
					}
		
					
					?>
            
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