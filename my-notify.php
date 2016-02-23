<?php
	include("includes/db.php");
	include("includes/functions.php");
	session_start();

if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: login.php");
	exit();
}

$user_id = $_SESSION['user_id'];
$sqlords=mysql_query("select * from notify where user_id='$user_id'")
        
?>
<!DOCTYPE html>
<html><head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Little Fashion : Fashion Redefined</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/library/font-awesome.min.css">
	<link rel="stylesheet" href="css/library/font-awesome.css">
	<link rel="stylesheet" href="css/library/bootstrap.min.css">
	<link rel="stylesheet" href="css/library/owl.carousel.css">
	<link rel="stylesheet" href="css/library/jquery-ui.min.css">
	<link rel="stylesheet" href="css/library/jquery.fancybox.css">
	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="caurosel/custom.css" rel="stylesheet">
    <!-- Owl Carousel Assets -->
    <link href="caurosel/owl.carousel.css" rel="stylesheet">
    <link href="caurosel/owl.theme.css" rel="stylesheet">
    <!-- Prettify -->
    <link href="caurosel/prettify.css" rel="stylesheet">
    <script>
		$(function(){
 var shrinkHeader = 300;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.header').addClass('shrink');
        }
        else {
            $('.header').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});
    </script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
<style>
	i
	{
		margin-right:5px !important;
	}
</style>
</head>
<body>
	<!-- LOADING -->
	<div class="loading-container" id="loading">
		<div class="loading-inner">
			<span class="loading-1"></span>
			<span class="loading-2"></span>
			<span class="loading-3"></span>
		</div>
	</div>
	<!-- END LOADING -->
	<div class="wrap-page">

		<!-- HEADER -->
					<nav class="navigation_top ">
						<?php include_once('top.php');?>
					</nav>		
         			<header class="header _1">
                    	<?php include_once('header.php');?>
                    </header>
                    <header class="header _1">
                    	<?php include_once('menu.php');?>
					</header>
		<!-- END HEADER -->
				<? 
					$sql = mysql_query("SELECT * FROM `users` where id = '$user_id' ");
					$row = mysql_fetch_array($sql);
				?>		<section class="breakcrumb bg-grey">
			<div class="container">
            	<div class="col-md-6">
				<h3 class="pull-left">My Account</h3>
                </div>
                <div class="col-md-6 pull-right">
                <span class="pull-right"> Welcome : <?=$row['username'];?></span>
                </div>
			</div>
		</section>		<!-- PRODUCT GRID -->
		<section class="product-grid">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						
						<?php include_once('user-sidebar.php');?>
					</div>
					<!-- END SIDEBAR -->
					<div class="col-md-9">
						<!-- GRID CONTENT -->
						<div class="grid-cn-1">
							<div class="row">
                            	<h3 class="name border-bottom">NOTIFY</h3>
                              
							</div>
							<div class="row coupon">
                                 <div class="col-md-12">
                                 	
                                    <table class="table-bordered">
                                    	<thead>
                                        	<tr>
                                            	<th>product Number</th>
                                            	<th>Product Name</th>
                                          
                                            	<th>Image</th>
                                            	
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ordnum=  mysql_num_rows($sqlords);
                                            if($ordnum > 0)
                                            {
                                                $arrrt=array();
                                                $i=1;
                                               while($orows=  mysql_fetch_array($sqlords))
                                               {
                                                   echo"<tr><td>".$orows['product_id']."</td>";
                                                  
                                                   $prid=$orows['product_id'] ;
                                                   $prdata=  mysql_query("select * from products where product_id='$prid'");
                                                   $row_products=  mysql_fetch_array($prdata);
                                                   
                                                   $category = $row_products['category'];
									$subcategory = $row_products['subcategory'];
									$menu = $row_products['menu'];
									$brand = $row_products['brand'];
									$color = $row_products['color'];
									$age = $row_products['age'];
									$a= $row_products['gender'];
									$b=$row_products['flag'];
                                                   
                                                   
                                                   $prdataimg=  mysql_query("select * from  product_images where product_id='$prid'");
                                                   $prrowsimg=  mysql_fetch_array($prdataimg);
                                                   
                                                   
                                                       
                                                ?>
                                        <td>
                                            <a href="#details<?=$i?>" data-toggle="modal" /><?=$row_products['product_name']?></a>
                                          
                                            
                                            
                                            
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
                                                      <div class="col-md-7"><img src="images/products/<?=$prrowsimg['image'] ; ?>" width="100" height="100"></div>
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
                                                </div>
                                            	
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Popup -->
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                            </td>
                                               
                                            <td><img src="images/products/<?=$prrowsimg['image'] ; ?>" width="50px"/>
                                            </td></tr>
                                              
                                              <?php
                                           $i++ ;
                                            }}
                                              ?>
                                            
                                            
                                            
                                            
                                        	
                                            	
                                        </tbody>
                                    </table>
                                 </div>                              
							</div>
						<!-- END GRID CONTENT -->
						<!-- BOTTOM LIST -->
					</div>

					<!-- SIDEBAR -->
				</div>
			</div>
		</section>
		<!-- END PRODUCT GRID -->

		<!-- PARTNER -->
		
		<!-- FOOTER -->
		<footer class="dark">
        	<?php include_once('footer.php');?>
		</footer>
		<!-- END FOOTER -->

		<!-- SCROLL TOP -->
		<div id="scroll-top" class="_1">Scroll Top</div>
		<!-- END SCROLL TOP -->

	</div>

	<!-- Library JS -->
	<script src="js/library/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="js/library/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/library/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/library/owl.carousel.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
	<script src="js/library/parallax.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.countdown.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.mb.YTPlayer.js" type="text/javascript"></script>
	<script src="js/library/jquery.responsiveTabs.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.fancybox.js" type="text/javascript"></script>
	<script src="js/library/SmoothScroll.js" type="text/javascript"></script>
	<script src="js/library/isotope.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.colio.min.js" type="text/javascript"></script>

	<!-- Main Js -->
	<script src="js/script.js" type="text/javascript"></script>
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
         <script src="js/auto-product.js"></script>
        <script>
        $(document).ready(function(){
            var spanallda=$(".spnallmnt").text();
            $('#topamnt').text(spanallda);
            
            
        });
        </script>
</body>
</html>