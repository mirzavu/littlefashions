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
                        <span class="title">Edit Collections</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                
                	<?php
					function renderForm($id,  $type, $brand, $color, $age, $price, $gender, $product_name, $quantity, $description, $brandinf, $error)
					{
						if ($error != '')
						{
							echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
						}
					?> 
                	
                	<form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                    	<input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group top10">
                            <label for="subcategory" class="col-sm-2 control-label">Menu Item</label>
                            <div class="col-sm-6">
                            <select name="menu" class="form-control">
                            	<option value="<?php echo $menu; ?>"> <?=get_menu_name($menu);?></option>
                                <option> ---------- </option>
                                <?=get_menu();?>
                            </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group top10">
                            <label for="brand" class="col-sm-2 control-label">Brand</label>
                            <div class="col-sm-6">
                            <select name="brand" class="form-control">
                            	<option value="<?php echo $brand; ?>"> <?=get_brand_name($brand);?></option>
                                <option> ---------- </option>
                                <?=get_brand();?>
                            </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group top10">
                            <label for="color" class="col-sm-2 control-label">Color</label>
                            <div class="col-sm-6">
                            <select name="color" class="form-control">
                            	<option value="<?php echo $color; ?>"> <?=get_color_name($color);?></option>
                                <option> ---------- </option>
                                <?=get_color();?>
                            </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group top10">
                            <label for="age" class="col-sm-2 control-label">Age</label>
                            <div class="col-sm-6">
                            <select name="age" class="form-control">
                            	<option value="<?php echo $age; ?>"> <?=get_age1($age);?></option>
                                <option> ---------- </option>
                                <?=get_age();?>
                            </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group top10">
                            <label for="price" class="col-sm-2 control-label">Price </label>
                            <div class="col-sm-6">
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="form-group top10">
                            <label for="gender" class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-6">
                            <select name="gender" class="form-control">
                            	<option value="<?php echo $gender; ?>"> <?=$gender;?></option>
                                <option> ---------- </option>
                                <option value="1">Boys</option>
                                <option value="2">Girls</option>
                                <option value="3">Unisex</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group top10">
                            <label for="product-description" class="col-sm-2 control-label">Product Name</label>
                            <div class="col-sm-6">
                            <textarea name="product_name" class="form-control"><?php echo $product_name; ?></textarea>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="form-group top10">
                            <label for="product-description" class="col-sm-2 control-label">Quantity</label>
                            <div class="col-sm-6">
                            <textarea name="quantity" class="form-control"><?php echo $quantity; ?></textarea>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="form-group top10">
                            <label for="product-description" class="col-sm-2 control-label">Product Description</label>
                            <div class="col-sm-6">
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <div class="form-group top10">
                            <label for="product-description" class="col-sm-2 control-label">Brand Information</label>
                            <div class="col-sm-6">
                            <textarea name="brandinf" class="form-control"><?php echo $brandinf; ?></textarea>
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
							$category = $_POST['category'];
							$subcategory = $_POST['subcategory'];
							$menu = $_POST['menu'];
							$brand = $_POST['brand'];
							$color = $_POST['color'];
							$age = $_POST['age'];
							$price = $_POST['price'];
							$gender = $_POST['gender'];
							$product_name = $_POST['product_name'];
							$quantity = $_POST['quantity'];
							$description = $_POST['description'];
							$brandinf = $_POST['brandinf'];
							
							if ($category == '')
							{
								$error = 'ERROR: Please fill in all required fields!';
								renderForm($id, $category, $subcategory, $menu, $brand, $color, $age, $price, $gender, $product_name, $quantity, $description, $brandinf, $error);
							}
							else
							{
								
								$sql = mysql_query("UPDATE products SET `category` ='$category',`subcategory` ='$subcategory', `menu` = '$menu', `brand` ='$brand',`color` ='$color',  `age` ='$age', `price` ='$price', `gender` ='$gender', `product_name` ='$product_name', `quantity` ='$quantity', `description` ='$description', `brandinf` ='$brandinf' WHERE id='$id'");
							
								if (!$sql)
								{
									die('Error: ' . mysql_error());
								}
								else
								{
									echo '<script language=javascript>alert("Updated..")</script>';
									echo "<script type='text/javascript'>window.location='view-products.php'</script>";
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
							$result = mysql_query("SELECT * FROM products WHERE id = '$id' ")or die(mysql_error()); 
							$row = mysql_fetch_array($result);
							if($row)
							{
								$category = $row['category'];
								$subcategory = $row['subcategory'];
								$menu = $row['menu'];
								$brand = $row['brand'];
								$color = $row['color'];
								$age = $row['age'];
								$price = $row['price'];
								$gender = $row['gender'];
								$product_name = $row['product_name'];
								$quantity = $row['quantity'];
								$description = $row['description'];
								$brandinf = $row['brandinf'];
								renderForm($id, $category, $subcategory, $menu, $brand, $color, $age, $price, $gender, $product_name, $quantity, $description, $brandinf, '');
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