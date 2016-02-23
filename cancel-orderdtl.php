<?php
	include("includes/db.php");
	include("includes/functions.php");
	session_start();

if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: login.php");
	exit();
}

$user_id = $_SESSION['user_id'];
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
                            	<h3 class="name border-bottom">Cancel Order List</h3>
							</div>
							<div class="row coupon">
                                 <div class="col-md-12">
                                     
                                 <table class="table table-bordered tbl-cart table-responsive">
                        <thead>
                            <tr>
                                <td>S.no</td>                                
                                
                                <td>Order ID</td>
                                
                                 <td>Product Details </td>
                                <td>Amount </td>
                               
                               
                            </tr>
                        </thead>
                        <tbody>     
                        <?php
                         $k=1 ;
					                 
                        $sql_orders = mysql_query("SELECT * FROM orders  WHERE uid = '$user_id' and `delivery-status`='3'");
							$count = mysql_num_rows($sql_orders);
							$i=1;
							$m=1 ;
							if($i<=$count)
							{
							while($row_orders = mysql_fetch_array($sql_orders))
							{
								
                             		                               $uid = $row_orders['uid'];
									$txnid = $row_orders['txnid'];
									$name = $row_orders['name'];
									$email = $row_orders['email'];
									$phone = $row_orders['phone'];
									$amount = $row_orders['amount'];
                                                                         $productidinfo=$row_orders['productinfo'];
                                                                        $order_itemcode=$row_orders['order_itemcode'];
                                                                         $prdqunty=$row_orders['pqunty'];
                                                                         $allsize=$row_orders['dresssize'];
                                                                         $allprice=$row_orders['priceall'];
                                                                        $cashdelv=$row_orders['payment-mode'];
                                                                        // print_r($prinfo2);
                                                                    
                                                                       
                                                        

											

												$productidinfo_list = explode(',',$productidinfo);
                                                                                                
                                                                                             
                                                                                                
                                                                                                
                                                                                                 $prdqunty_list=explode(",",$prdqunty);
                                                                                                 
                                                                                                $allsize_list=explode(",",$allsize);
                                                                                                
                                                                                                
                                                                                                  $allprice_list=explode(",",$allprice);
                                                                                                  
                                                                                                  
                                                                                                
                                                                                                //  print_r($allprice_list);

												  $count25 =count($productidinfo_list);
                                                                                                   
												
                                                                                               //echo"----------------------------";
                                                                                                 
												
                                                                                                            
                                              $sqls3="select * from products where uid='$uidsell' and  id in ($productidinfo) ";
                                                 
                                            echo"<td>$k </td><td>$order_itemcode</td>";
                                           
                                          $prdatasl=mysql_query($sqls3);                        
                                                                        
                                            $prslnum=mysql_num_rows($prdatasl);                       
                                                                        
                                                 if( $prslnum > 0)     
                                                 {
                                                  
                                                        
                                                        ?>

                                                          <td>
                                                              <?php
                                                                                            for($i=0; $i<$count25; $i++) 

												{

													  $productidinfo_listall =$productidinfo_list[$i];
                                                                                                      
													    $prdqunty_listall = $prdqunty_list[$i];
                                                                                                          
                                                                                                            $allsize_listall=$allsize_list[$i];
                                                                                                            $allprice_listall=$allprice_list[$i];
                                                        $sqla=  mysql_query("select * from products where id='$productidinfo_listall'")   ;                                                 
                                                                                                            
                                                        $rowsel=mysql_fetch_array($sqla);
                                                  
                                                          $product_idimg=$rowsel['product_id'];
                                                      $sql_images = mysql_query("select * from product_images where product_id = '$product_idimg' ");

							

							$count = mysql_num_rows($sql_images);

						

						

							$row_images = mysql_fetch_array($sql_images);
                                                                        
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                           ?>
                                        
                                        <div>
                                            <div style="float:left;display:block;width:70%">
                                               <?=$rowsel['product_name'];?> <br/>
                                           Price:&nbsp; <?=$allprice_listall;?>
                                           <br/>
                                            Quntity:&nbsp; <?=$prdqunty_listall;?>
                                           <br/>
                                            size :&nbsp; <?=get_age1($allsize_listall);?>
                                             </div><div style="float:left;width:30%">
                                            <img class="etalage_thumb_image" src="images/products/<?=$row_images['image']; ?>" width="75px" height="75" onerror="this.src='images/giftcard1.png'" />
                                         </div>
                                      
                                        </div>
                                        <?php
                                                  }
                                        ?>
                                    </td>
                                                        
                                                        
                                                        
                                                        
                                                        <?php
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    
                                                      }
                                    
                                    
                                    
                                    
                                    
                                    
                                    ?>
                                    
                                    
                                    
                                    
                                    <td><?=$row_orders['amount'];?>.Rs&nbsp;</td>
                                    
                                    
                                    
                       
                                </tr>
                                
                              
                        <? 	
								
							
                                                        $k++ ;$m++ ;
							}
							} 
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
</body>
</html>