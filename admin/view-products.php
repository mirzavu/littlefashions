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
    <link href="css/font-awesome.css" rel="stylesheet">
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
                        <span class="title">View Products</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-12 col-sm-12 text-center">
                    
                    
                
                    
                        <?php
                        $cat_id=$_POST['cat_id'];
                        
                        $prdname=$_POST['prdname'];
                        if($cat_id !='')
                        {
                         $sqlpart=" and category='$cat_id'" ;  
                        }
                        
                        if($prdname !='')
                        {
                             
                         $sqlpart.=" and product_name LIKE '%" . $prdname .  "%'" ;  
                        }
                        ?>
                        

                        <form class="form-horizontal" action="#" method="POST">
      <div class="form-group">
        <label for="inputCity" class="col-lg-2 control-label">Category</label>
        <div class="col-lg-3">
              
          <select class="form-control" name='cat_id'>
                 <option value=''>select category</option> 
                <?php echo get_category();?>
              </select>
        </div>
        <label for="inputType" class="col-lg-2 control-label">Product Name</label>
        
         <div class="col-lg-3">
             <input type="text" class="form-control" placeholder="Search product" name="prdname"> 
        </div>
        <button type="submit" class="btn btn-success" name="pdsearch">Search</button>
      </div>
    </form>

                    
                    
                	<table class="table table-bordered tbl-cart table-responsive">
                        <thead>
                            <tr>
                                <td>Id</td>                                
                                <td>Category</td>
                                <td>Subcategory</td>
                                <td>Product Name</td>
                                <td>Brand</td>
                                <td>Color </td>
                                <td>Price </td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        
                                                       $sqlmain="SELECT * FROM products where product_type ='1'";
                                                      $sqlalls=$sqlmain.$sqlpart;
							$sql_Products = mysql_query($sqlalls);
							$count = mysql_num_rows($sql_Products);
							$i=1;
							
							if($i<=$count)
							{
							while($row_products = mysql_fetch_array($sql_Products))
							{
								
                             		$category = $row_products['category'];
									$subcategory = $row_products['subcategory'];
									$menu = $row_products['menu'];
									$brand = $row_products['brand'];
									$color = $row_products['color'];
									$age = $row_products['age'];
									$a= $row_products['gender'];
					    				$b=$row_products['flag'];

                                          
                                      $product_idimg=$row_products['product_id'];
                                      $sql_images = mysql_query("select * from product_images where product_id = '$product_idimg' ");


				      $row_images = mysql_fetch_array($sql_images);






									if ($b=='0')
									{
										$status = "Enable";	
									}
									else
									{
										$status = "Disable";	
									}
									if ($a=='1')
								{
									$gen = "Boys";
								}
							else if($a=='2')
								{
									$gen = "Girls";
								}
								else
								{
									$gen = "Unisex";
								}
       
						?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=get_category_name($category);?></td>
                                    <td><?=get_sub_category_name($subcategory);?></td>
                                    <td><a href="#details<?=$i?>" data-toggle="modal"><?=$row_products['product_name'];?></a></td>          
                                    <td><?=get_brand_name($brand);?></td>     
                                    <td><?=get_color_name($color);?></td>
                                    <td><?=$row_products['price'];?></td>
                                    <td class="text-center">
                                    	 <? 
											if($row_products['flag'] == 0)
											{
										?>
                                        		<a href="enable-products.php?id=<?=$row_products['id'];?>" onclick="return confirm('Confirm to Enable?');">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                        <?
												
											}
											elseif($row_products['flag'] == 1)
											{
										?>
                                        		<a href="disable-products.php?id=<?=$row_products['id'];?>" onclick="return confirm('Confirm to Disable?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                        <?
											}
										?>
                                        <a href="edit-products.php?id=<?=$row_products['id'];?>">
                                            <i class="fa fa-edit"></i>
                                        </a> &nbsp;
                                        
                                        <a href="delete-products.php?id=<?=$row_products['id'];?>" onclick="return confirm('Confirm to delete?');">
                                            <i class="fa fa-close"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                                
                                <!-- Popup -->
                                <div id="details<?=$i?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">View Details</h4>
                                            </div>
                                            <div class="modal-body">
                                           		<div class="container-fluid">
                                                    
                                                    <div class="row">
                                                      <div class="col-md-4">Category</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=get_category_name($category);?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Sub Category</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=get_sub_category_name($subcategory);?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Menu Item Name</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=get_menu_name($menu);?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Brand</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=get_brand_name($brand);?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Color</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=get_color_name($color);?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Age</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=get_age1($age);?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Price</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_products['price'];?></div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                      <div class="col-md-4">Gender</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$gen;?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Product Name</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_products['product_name'];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Image</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7">
<img src="../images/products/<?=$row_images['image']; ?>" width="100" height="100">
</div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Quantity</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_products['quantity'];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Description</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_products['description'];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Brand Information</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_products['brandinf'];?></div>
                                                    </div>

                                                <div class="row">
                                                      <div class="col-md-4">Product Added By</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7">

                              
                                            <?php
                                            
                                            $uid50=$row_products['uid'];
                                            
                                            $sqlusr=mysql_query("select * from user_registration where id='$uid50'");
                                            $sqlnumdd=mysql_num_rows($sqlusr);
                                            if($sqlnumdd > 0)
                                            {
                                             $sqlsellers=  mysql_fetch_array($sqlusr) ;
                                             echo $sqlsellers['name'];
                                             echo"&nbsp;";
                                            }
                                           else
                                            {
                                           echo"Admin";
                                            }


                                               ?>
                                                      </div>
                                                    </div>
                                                </div>
                                            	
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Popup -->
                        <? 	
								
							$i++;
							}
							} 
						?>    
                        </tbody>
                    </table>
                        
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