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
                        <span class="title">
                            <?php
                            $brid=$_GET['id'];
                            $sql_querybd=mysql_query("select * from products where id='$brid'");
                             $bdname=mysql_fetch_array($sql_querybd) ; 
                             $colls=$bdname['collection_type'];
                             $td100=$bdname['trending_type'];
                             $top100=$bdname['toprated_type'];
                             $off100=$bdname['offers_type'];
                             $banner100=$bdname['banner_type'];

                              if($banner100 !='0')
                             {
                                 $bdmessage="Banner";
                             }
                            
                             if($colls !='0')
                             {
                                 $bdmessage="Collection";
                             }
                              if($top100 !='0')
                             {
                                 $bdmessage="Top Rated ";
                             }
                              if($td100 !='0')
                             {
                                 $bdmessage="Trading";
                             }
                              if($off100 !='0')
                             {
                                 $bdmessage="Offers";
                             }
                            ?>
                            
                            Edit  &nbsp; <?=$bdmessage;?> &nbsp; Products
                        
                        </span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                
                	<?php
                                
					function renderForm($id, $category, $subcategory, $menu, $brand, $color, $age, $price, $gender, $product_name, $quantity, $description, $brandinf,$loyality,$offer,$product_id,$collection_type,$offer_type,$trending_type,$toprated_type,$banner_type,$error)
					{
						if ($error != '')
						{
							echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
						}
					?> 
                	
                	<form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" value="<?=$product_id ;?>" name='edtpid'>
                    	<input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="hidden" name="trdtyperd" value="<?=$trending_type;?>">
                        <input type="hidden" name="toprttyperd" value="<?=$toprated_type?>">

                           
                        <?php
                        if($banner_type !='0')
                         {

                       ?>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Banner Type</label>
                            <div class="col-lg-8 col-sm-8">
                       <select name="bannertype" class="form-control">
                       <option value="<?=$banner_type;?>" selected><?=get_banner_name($banner_type);?> </option>
			<?php
                        echo banner_all();
                        ?>

                       <select>
                      </div>
                        </div>
                        
                         <div class="clearfix"></div>

                       <?php
                       }
                       ?>

                        <?php
                        if($collection_type !='0')
                        {
                        ?>
                        
                         <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Collection Type</label>
                            <div class="col-lg-8 col-sm-8">
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
                         <?php
                        }
                         ?>
                       <?php  
                       if($offer_type !='0')
                       {
                           ?>
                       
                           
                                  <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Offer Type</label>
                            <div class="col-lg-8 col-sm-8">
							<select  onChange="getOffer(this.value);"  name="offerid" class="form-control">
								<option value="-1">Select Offers</option>
								<?php
                                                                $sqlof=  mysql_query("select * from offers order by offer_name");
								while($rowoffr=mysql_fetch_array($sqlof)){
									?>
									
									
                           <option value="<?=$rowoffr['id'];?>"  <?=@$rowoffr['id']==$offer_type? ' selected="selected"' : ''?>><?=$rowoffr['offer_name'] ;?></option>                                                 
                                                                            
                                                                            
                                                                            <?php
								}
								?>
							</select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <?php
                         }
                        ?>
                        
                        <div class="form-group top10">
                            <label for="brand" class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-6">
                            <select name="category" class="form-control">
                            	<option value="<?php echo $category; ?>"> <?=get_category_name($category);?></option>
                                <option> ---------- </option>
                                <?=get_category();?>
                            </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group top10">
                            <label for="subcategory" class="col-sm-2 control-label">Sub Category</label>
                            <div class="col-sm-6">
                            <select name="subcategory" class="form-control">
                            	<option value="<?php echo $subcategory; ?>"> <?=get_sub_category_name($subcategory);?></option>
                                <option> ---------- </option>
                                <?=get_subcat();?>
                            </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
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
                        
                        	  <p class="text-box">
                        
                       
                      
                        <?php
                                                    
                        $allprice_list=explode(",",$price);
                         $allsize_list=explode(",",$age);
                        $count25 =count( $allprice_list);
                       for($i=0; $i<$count25; $i++) 

	                 {

	        $allprice_listall=$allprice_list[$i];
                 $allsize_listall=$allsize_list[$i];
                        ?>
                         
                      
                                 <label for="box1" class="col-sm-2 control-label"> Age & Price &nbsp;<?=$i+1;?> </label>
                                 <span class="col-sm-4">
                                     
                               <!--   <input type="text" name="age[]" class="form-control" value="<?php echo get_age1($allsize_listall); ?>" /> -->
                                 
                                  <select name="age[]" class="form-control">
                            	<option value="<?php echo $allsize_listall ; ?>"> <?php echo get_age1($allsize_listall); ?></option>
                                <option> ---------- </option>
                                <?=get_age();?>
                            </select>
                                 </span>
                                <span class="col-sm-4">
                                    
                                <input type="text" name="price[]" class="form-control" value="<?php echo $allprice_listall; ?>" />
                                </span>
                              
                          <div class="clearfix"></div><div class="clearfix"></div>
                          <br/>
                           <?php
                         }
                           ?>
                                  </p>
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

                         <input type="hidden" value="<?php echo $quantity; ?>" name="orgqty">
                            <textarea name="quantity" class="form-control"><?php echo $quantity; ?></textarea>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        
                        <div class="clearfix"></div>
                        
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Offer Percentage</label>
                            <div class="col-lg-8 col-sm-8"><input type="text" id='offervals' name="offerprice" class="form-control" value="<?=$offer;?>"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-10 col-sm-10 top10">
                            <label class="col-sm-2 control-label">Loyality Cash</label>
                            <div class="col-lg-8 col-sm-8"><input type="text" name="loyalitycashs" class="form-control" value="<?=$loyality?>"></div>
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
                        
                        
                        <!--  images     -->
                        <?php
                        $sql_images = mysql_query("select * from product_images where product_id = '$product_id' ");

							

							$count = mysql_num_rows($sql_images);

						

						$i=0;

							while($row_images = mysql_fetch_array($sql_images))

							{
                                                            $imgid=$row_images['id'];
                                                            
                                                     ?>
							 <div class="clearfix"></div>
                        
                        <div class="form-group top10">
                            <label for="product-description" class="col-sm-2 control-label">images</label>
                            <div class="col-sm-6">
                                <img src="../images/products/<?=$row_images['image'];?>" width="75" height="75"/>
                                <a data-toggle="modal" href="#myModal<?=$i;?>"/>edit</a>
                                
                                <!-- Modal -->
<div id="myModal<?=$i;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Images</h4>
      </div>
      <div class="modal-body">
       
              <?php
              if(isset($_POST['editimg']))
              {
                                                                        $pids=$_POST['pids'];
               
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
											   $file= time().substr(str_replace(" ", "_", $txt), 0);
											   $info = pathinfo($file);
											   $filename = $file.".".$ext;
											   if(move_uploaded_file($_FILES['image']['tmp_name'][$i], $path.$filename)) 
											   { 
												  $sql_image =mysql_query("update product_images set image='$filename' where id='$pids'");
											   }
                                                                                           
                                                                                          
										 }
									}
									 
								
                 
              }
              ?>
              
              <div class="form-group col-lg-4 col-sm-4 text-right top10">
                            <div class="btn-group btns-cart">
                                <input type="hidden" name="pids" value="<?=$imgid;?>">
                            <input type="file" name="image[]"/>
                            </div>
                        </div>
          
           <div class="form-group col-lg-4 col-sm-4 text-right top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" class="btn btn-primary"  value="Editimages" name='editimg'>
                            </div>
                        </div>
         
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>
                            </div>
                            
                        </div>	
                                                  <?php
                                                  $i++;
						   }
                                                   ?>
                        
                        
                        
                        <!-- ******88888  -->
                        
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
							$age = nl2br(implode(', ', $_POST['age']));
							$price = nl2br(implode(', ', $_POST['price']));
							$gender = $_POST['gender'];
							$product_name =mysql_escape_string($_POST['product_name']);
							$quantity = $_POST['quantity'];
							$description =mysql_escape_string($_POST['description']);
							$brandinf =mysql_escape_string($_POST['brandinf']);
                                                        $loyalitycashs=$_POST['loyalitycashs'];
                                                        $offerprice=$_POST['offerprice'];
                                                        $offerid=$_POST['offerid'];
                                                        $collections=$_POST['collections'];
							$toprttyperd=$_POST['toprttyperd'];
                                                        $trdtyperd=$_POST['trdtyperd'];

                                                        $orgqty=$_POST['orgqty']; 
                                                      $edtpid=$_POST['edtpid'];
                                                       
                                                     $banner_type=$_POST['bannertype'];

                                                      IF($orgqty==0)
                                                    {
                                                    $sql_ntfy=mysql_query("select * from notify where product_id='$edtpid'");

                                                  $notifynum=mysql_num_rows($sql_ntfy);
                                                    if($notifynum > 0)
                                                     {
                                                      while($notifyrows=mysql_fetch_array($sql_ntfy))
                                                      {
                                                        $user_id=$notifyrows['user_id'];

                                                         $sql_usedtl=mysql_query("select * from users where id='$user_id'");
                                                          $sqlu_num=mysql_num_rows( $sql_usedtl);

                                                if($sqlu_num > 0)
                                                 {

                                               $rows_users=mysql_fetch_array($sql_usedtl);
                                             $uemail=$rows_users['email'];
                                              $uname=ucfirst($rows_users['name']);

                                               $subject = "Your Favourite Product is now available @ littlefashions.in";
						$emailTo =$uemail;
						$emailfrom = "orders@littlefashions.in"; 
						$body = "Dear".$uname.",\n\nThe product  \r\r https://littlefashions.in/product-detail.php?id=".$id ."\r\r".$product_name."\r\r available Now .Happy shopping  \n\n Thanks Littlefashions ";
                                                
              
						
						$headers = 'From:Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;
				
						mail($emailTo, $subject, $body, $headers);
						$emailSent = true;
                                                

                                                 }

                                                      }
                                                     

                                                     }
                                                   }

   
 							if ($category == '')
							{
								$error = 'ERROR: Please fill in all required fields!';
								renderForm($id, $category, $subcategory, $menu, $brand, $color, $age, $price, $gender, $product_name, $quantity, $description, $brandinf, $error);
							}
							else
							{

								
								$sql = mysql_query("UPDATE products SET `category` ='$category',`subcategory` ='$subcategory', `menu` = '$menu', `brand` ='$brand',`color` ='$color',  `age` ='$age', `price` ='$price', `gender` ='$gender', `product_name` ='$product_name', `quantity` ='$quantity', `description` ='$description', `brandinf` ='$brandinf',`offerprice`='$offerprice',`loyalitycash`='$loyalitycashs' WHERE id='$id'");
							       if( $collections !='')
                                                               {
                                                                 $sqlcol = mysql_query("UPDATE products SET `collection_type`='$collections' WHERE id='$id'");  
                                                               }
                                                               if($offerid)
                                                               {
                                                                   $sqlofr = mysql_query("UPDATE products SET `offers_type`='$offerid'  WHERE id='$id'"); 
                                                               }
                                                                
                                                              if($banner_type)
                                                                {
                    $sqlofr = mysql_query("UPDATE products SET `banner_type`='$banner_type'  WHERE id='$id'"); 

                                                                }


  
								if (!$sql)
								{
									die('Error: ' . mysql_error());
								}
								else
								{
									
				
									echo '<script language=javascript>alert("Updated..")</script>';
                                                                        if($collections !=0)
                                                                        {
									echo "<script type='text/javascript'>window.location='view-collection-products.php'</script>";
                                                                        }
                                                                       elseif($offerid !=0)
                                                                        {
                                                                       echo "<script type='text/javascript'>window.location='view-offer-products.php'</script>"; 
                                                                        }
                                                                        elseif($toprttyperd !=0)
                                                                        {
                                                                    echo "<script type='text/javascript'>window.location='viewtoprated-products.php'</script>";             
                                                                        }
                                                                         elseif ($trdtyperd !=0)
                                                                        {
                                                                    echo "<script type='text/javascript'>window.location='viewtrading-products.php'</script>";             
                                                                        }

                                                                       elseif($banner_type !=0)
                                                                       {
                          echo "<script type='text/javascript'>window.location='view-bannerproducts.php'</script>";             
                                                                       }




                                                                       else
                                                                          {
                                      echo "<script type='text/javascript'>window.location='view-products.php'</script>";             
                                                                           }
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
                                                                $loyality=$row['loyalitycash'];
                                                                $offer=$row['offerprice'];
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
                                                                $product_id=$row['product_id'];
                                                                $collection_type=$row['collection_type'];
                                                                $offer_type=$row['offers_type'];
                                                                $trending_type=$row['trending_type'];
                                                                $toprated_type=$row['toprated_type'];
                                                                $banner_type=$row['banner_type'];   
								renderForm($id,$category, $subcategory, $menu, $brand, $color, $age, $price, $gender, $product_name, $quantity, $description, $brandinf,$loyality,$offer,$product_id,$collection_type,$offer_type,$trending_type,$toprated_type,$banner_type, '');
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
    <script>
function getOffer(val) {
	$.ajax({
	type: "POST",
	url: "get_offer.php",
	data:'offer_id='+val,
	success: function(data){
		$("#offervals").val(data);
	}
	});
}
</script>
</body>
</html>