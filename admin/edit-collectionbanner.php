<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: index.php");
	exit();
 }
 
 $editcollection=$_GET['id'];
 $sql_banners = mysql_query("SELECT * FROM collections where id='$editcollection'");
$count = mysql_num_rows($sql_banners);
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
                       <span class="title">Edit  Collections</span><a href="view-collections-banners.php" class="pull-right">View Collection Banners</a>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                	<?php 
					
				
						if (!isset($_POST['banner_name'])) 
						{
							echo "";
						}
						else
						{
							$type =$_POST['collections'];
							$banner_name = $_POST['banner_name'];
							$cap = substr($banner_name,0,4);
							$file = $_FILES['image']['tmp_name'];
							$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
							$image_name = addslashes($_FILES['image']['name']);
                                                       $id=$_POST['banner_id'];
							 if($_FILES['image']['name'] != "")
                                                            {

							move_uploaded_file($_FILES["image"]["tmp_name"],"../images/banners/"."$cap".$_FILES["image"]["name"]);
							
							$img_loc = "images/banners/"."$cap".$_FILES["image"]["name"];
							$sql2 = mysql_query("UPDATE collections SET `image` ='$img_loc' WHERE id='$id'");
							
                                                            }
                                                       
							$sql = mysql_query("UPDATE collections SET `banner_name` ='$banner_name',`type`='$type' WHERE id='$id'");
							
							if (!$sql)
							{
								die('Error: ' . mysql_error());
							}
							else
							{
								echo '<script language=javascript>alert("Collection Updated ..")</script>';
								echo "<script type='text/javascript'>window.location='view-collections-banners.php'</script>";
								exit();					
							}
						}
					?>
                
                     <?php
                    if($count > 0)
                    {
                        $row_banners =mysql_fetch_array($sql_banners);
                         $collection_type=$row_banners['type'];       
                    ?>
                    
                    
                	<form action="#" method="post" enctype="multipart/form-data">
                      
                         <div class="clearfix"></div>
                        <div class="col-lg-6 col-sm-6 top10">
                            <label for="banner-name">Collection Type</label>
                            <select name="collections" class="form-control">
                            	<option value=""> --- Select Collections --- </option>
                                <option value="1" <?=$collection_type=='1'? ' selected="selected"' : ''?>>Infant Collections</option>
                                <option value="2" <?=$collection_type=='2'? ' selected="selected"' : ''?>>Toddlers Collections </option>
                                <option value="3" <?=$collection_type=='3'? ' selected="selected"' : ''?>>Baby Accessories</option>
                                <option value="4" <?=$collection_type=='4'? ' selected="selected"' : ''?>>Tu Tu Collections</option>
                            </select>
                            </div>
                        </div>
                        
                         <div class="clearfix"></div>
                        
                        <div class="clearfix"></div>
                        <div class="col-lg-6 col-sm-6 top10">
                            <label for="banner-name">Banner Name</label>
                                 <input type="hidden" name="banner_id" class="form-control" value="<?=$row_banners['id'] ;?>"/>
                            <input type="text" name="banner_name" class="form-control" value="<?=$row_banners['banner_name'] ;?>"/>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-6 col-sm-6 top10">
                            <label for="category-name">Image</label>
                            <input type="file" name="image" class="form-control" />
                            <img src="../<?=$row_banners['image'];?>" width="100" height="100">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-8 col-sm-8 top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" class="btn btn-primary" value="Add Collection banner">
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
                  <?php
                    }
                   ?>
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