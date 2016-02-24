<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: index.php");
	exit();
 }
$sqlCountry="select id,category_name from categories  order by category_name asc ";
$resCountry=mysql_query($sqlCountry);
$checkCountry=mysql_num_rows($resCountry);
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
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
function selectCity(country_id){
	if(country_id!="-1"){
		loadData('state',country_id);
		$("#city_dropdown").html("<option value='-1'>Select Menu</option>");	
	}else{
		$("#state_dropdown").html("<option value='-1'>Select Sub Category</option>");
		$("#city_dropdown").html("<option value='-1'>Select Menu</option>");		
	}
}

function selectState(state_id){
	if(state_id!="-1"){
		loadData('city',state_id);
	}else{
		$("#city_dropdown").html("<option value='-1'>Select Menu</option>");		
	}
}

function loadData(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "loadData.php",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value='-1'>Select</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}
</script>
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
                        <span class="title">Add Product</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                	<?php 
					
				
						if (!isset($_POST['category'])) 
						{
							echo "";
						}
						else
						{
							$product_id = rand(0000,9999);
							$cat_name = "Products";
							$category = $_POST['category'];
							$subcategory = $_POST['subcategory'];
							$menu = $_POST['menu'];
							$brand = $_POST['brand'];
							$color = $_POST['color'];
							$age = nl2br(implode(', ', $_POST['age']));
							$price = nl2br(implode(', ', $_POST['price']));
							$offerprice = $_POST['offerprice'];
							 $loyalitycash = $_POST['loyalitycashs'];
                                                        
							$gender = $_POST['gender'];
							$cap = substr($category,0,4);
							/*$file = $_FILES['image']['tmp_name'];
							$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
							$image_name = addslashes($_FILES['image']['name']);
							
							move_uploaded_file($_FILES["image"]["tmp_name"],"../images/products/"."$cap".$_FILES["image"]["name"]);
							
							$img_loc = "images/products/"."$cap".$_FILES["image"]["name"];*/
							$product_name =mysql_escape_string($_POST['product_name']);
							$quantity = $_POST['quantity'];
							$description =mysql_escape_string($_POST['description']);
							$brandinf =mysql_escape_string($_POST['brandinf']);
							
							$sql = mysql_query("INSERT INTO products (product_id, category, subcategory, menu, brand, color, age, price, offerprice, gender, product_name, quantity, description, brandinf,product_type,loyalitycash,flag) VALUES ('$product_id', '$category', '$subcategory', '$menu', '$brand', '$color', '$age', '$price',  '$offerprice','$gender', '$product_name', '$quantity', '$description', '$brandinf',1,'$loyalitycash',1)");
							
							
							if (!$sql)
							{
								die('Error: ' . mysql_error());
							}
							else
							{
								
								if(isset($_FILES['image']['name']))
								{
									$file_name_all="";
									for($i=0; $i<count($_FILES['image']['name']); $i++) 
									{
										   $tmpFilePath = $_FILES['image']['tmp_name'][$i];    
										   if ($tmpFilePath != "")
										   {    
											   $path = "../images/products/"; // create folder 
											   $name = $_FILES['image']['name'][$i];
											   $size = $_FILES['image']['size'][$i];
							   
											   list($txt, $ext) = explode(".", $name);
											   if($ext!="jpg" && $ext!="png" && $ext!="jpeg" && $ext!="bmp")
											   	 echo "Invalid file";exit;
											   $file= time().substr(str_replace(" ", "_", $txt), 0);
											   $info = pathinfo($file);
											   $filename = $file.".".$ext;
											   if(move_uploaded_file($_FILES['image']['tmp_name'][$i], $path.$filename)) 
											   { 
												  $sql_image = mysql_query("INSERT INTO product_images (product_id, category, image) VALUES ('$product_id', '$cat_name', '$filename')");
											   }
										 }
									}
									 
								}
								
								echo '<script language=javascript>alert("Product Added..")</script>';
								echo "<script type='text/javascript'>window.location='add-product.php'</script>";
								exit();	
								
							}
							
							
						}
					?>
                
                	<div class="my-form">
						<?php
                        if($checkCountry > 0){
                            ?>
                    <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Category</label>
                            <div class="col-lg-8 col-sm-8">
							<select onchange="selectCity(this.options[this.selectedIndex].value)" name="category" class="form-control">
								<option value="-1">Select Category</option>
								<?php
								while($rowCountry=mysql_fetch_array($resCountry)){
									?>
									<option value="<?php echo $rowCountry['id']?>"><?php echo $rowCountry['category_name']?></option>
									<?php
								}
								?>
							</select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Sub Category</label>
                            <div class="col-lg-8 col-sm-8">
							<select id="state_dropdown" onchange="selectState(this.options[this.selectedIndex].value)" name="subcategory" class="form-control">
								<option value="-1">Select Sub Category</option>
							</select>
							<span id="state_loader"></span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Menu Item</label>
                            <div class="col-lg-8 col-sm-8">
							<select id="city_dropdown" name="menu" class="form-control">
								<option value="-1">Select city</option>
							</select>
							<span id="city_loader"></span>
							<span id="state_loader"></span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Brand</label>
                            <div class="col-lg-8 col-sm-8">
                            <select name="brand" class="form-control">
                            	<option value="0">--- Select Brands ---</option>
                                <?=get_brand();?>
                            </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Color</label>
                            <div class="col-lg-8 col-sm-8">
                            <select name="color" class="form-control">
                            	<option value="0">--- Select Color ---</option>
                                <?=get_color();?>
                            </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group top10">
                        
                        	<p class="text-box">
                                <label for="box1" class="col-sm-2 control-label"> Age <span class="box-number"> 1 </span></label>
                                <span class="col-sm-4">
                                <select name="age[]" class="form-control">
                            	<option value="0">--- Select Age ---</option>
									<?=get_age();?>
                                </select>
                                </span>
                                <span class="col-sm-4">
                                <input type="text" placeholder="price" name="price[]" class="form-control">
                                </span>
                                <a class="add-box" href="#"> Add More + </a>
                            </p>
                        
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Offer Percentage</label>
                            <div class="col-lg-8 col-sm-8"><input type="text" name="offerprice" class="form-control"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Loyality Cash</label>
                            <div class="col-lg-8 col-sm-8"><input type="text" name="loyalitycashs" class="form-control"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Gender</label>
                            <div class="col-lg-8 col-sm-8">
                            	<select name="gender" class="form-control">
                                	<option value="">--Select Gender--</option>
                                	<option value="1">Boys</option>
                                	<option value="2">Girls</option>
                                	<option value="3">Unisex</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                        	<p class="text-box2">
                                <label for="box1" class="col-sm-2 control-label"> Image <span class="image-number"> 1 </span></label>
                                <span class="col-sm-4"><input type="file" name="image[]" required class="form-control" /></span>
                                <a class="add-image" href="#"> Add More + </a>
                            </p>
                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Prodcut Name</label>
                            <div class="col-lg-8 col-sm-8"><input type="text" name="product_name" class="form-control"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Quantity</label>
                            <div class="col-lg-8 col-sm-8"><input type="text" name="quantity" class="form-control"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Product Description</label>
                            <div class="col-lg-8 col-sm-8"><textarea name="description" rows="5" cols="10" class="form-control"></textarea></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Brand Information</label>
                            <div class="col-lg-8 col-sm-8"><textarea name="brandinf" rows="5" cols="10" class="form-control"></textarea></div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="form-group col-lg-4 col-sm-4 text-right top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" class="btn btn-primary" value="Add Product">
                            </div>
                        </div>
                    </form>
							<?php
                        }else{
                            echo 'No Country Name Found';
                        }
                        ?>
                    </div>
            	</div>
        		

				

        	</div>

        	<div class="clearfix visible-sm"></div>

                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
			

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
    
    <script type="text/javascript">
	jQuery(document).ready(function($){
		$('.my-form .add-box').click(function(){
			var n = $('.text-box').length + 1;
			
			var box_html = $('<div class="clearfix"></div><p class="text-box top10"><label for="box' + n + '" class="col-sm-2 control-label"> Age <span class="box-number">' + n + '</span></label><span class="col-sm-4"><select name="age[]" class="form-control"><option value="0">--- Select Age ---</option><?=get_age();?></select></span><span class="col-sm-4"><input type="text" placeholder="price" name="price[]" class="form-control"></span><a href="#" class="remove-box"> Remove </a></p>');
        
        
			box_html.hide();
			$('.my-form p.text-box:last').after(box_html);
			box_html.fadeIn('slow');
			return false;
		});
		$('.my-form').on('click', '.remove-box', function(){
			$(this).parent().css( 'background-color', '#FF6C6C');
			$(this).parent().css( 'height', '45px' );
			$(this).parent().css( 'padding', '5px 0px' );
			$(this).parent().fadeOut("slow", function() {
				$(this).remove();
				$('.box-number').each(function(index){
					$(this).text( index + 1 );
				});
			});
			return false;
		});
	});
		
	</script>
    
    
    <script type="text/javascript">
	jQuery(document).ready(function($){
		$('.my-form .add-image').click(function(){
			var m = $('.text-box2').length + 1;
			
			var box_html = $('<div class="clearfix"></div><p class="text-box2 top10"><label for="box' + m + '" class="col-sm-2 control-label"> Image <span class="image-number">' + m + '</span></label><span class="col-sm-4"><input type="file" name="image[]" required class="form-control" /></span><a href="#" class="remove-image"> Remove </a></p>');
        
        
			box_html.hide();
			$('.my-form p.text-box2:last').after(box_html);
			box_html.fadeIn('slow');
			return false;
		});
		$('.my-form').on('click', '.remove-image', function(){
			$(this).parent().css( 'background-color', '#FF6C6C');
			$(this).parent().css( 'height', '45px' );
			$(this).parent().css( 'padding', '5px 0px' );
			$(this).parent().fadeOut("slow", function() {
				$(this).remove();
				$('.image-number').each(function(index){
					$(this).text( index + 1 );
				});
			});
			return false;
		});
	});
		
	</script>
    
</body>
</html>