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
	<link rel="stylesheet" href="https://littlefashions.in/css/library/font-awesome.min.css">
	<link rel="stylesheet" href="https://littlefashions.in/css/library/font-awesome.css">
	<link rel="stylesheet" href="https://littlefashions.in/css/library/bootstrap.min.css">
	<link rel="stylesheet" href="https://littlefashions.in/css/library/owl.carousel.css">
	<link rel="stylesheet" href="https://littlefashions.in/css/library/jquery-ui.min.css">
	<link rel="stylesheet" href="https://littlefashions.in/css/library/jquery.fancybox.css">
	<link rel="stylesheet" href="https://littlefashions.in/css/style.css">
	<link rel="stylesheet" href="https://littlefashions.in/css/color-pink.css">
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
<body onload="window.print()">
	<div class="wrap-page">

		<!-- HEADER -->
				<? 
					$sql = mysql_query("SELECT * FROM `users` where id = '$user_id' ");
					$row = mysql_fetch_array($sql);
				?>		<section class="breakcrumb bg-grey">
			<div class="container">
            	<div class="col-md-6">
				
                </div>
                
			</div>
		</section>		<!-- PRODUCT GRID -->
		<section class="product-grid">
			<div class="container">
				<div class="row">
					<!-- END SIDEBAR -->
					<div class="col-md-9">
						<!-- GRID CONTENT -->
						<div class="grid-cn-1">
							<div class="row">
                            	<h3 class="name border-bottom" align='center'>TAX INVOICE</h3>
							</div>
							<div class="row coupon">
                                 <div class="col-md-12">
                                 						
                            <a href="index.php"><img src="images/littlefashionlogo1.png" alt=""></a>

                    	<?php 
						if (isset($_GET['id']) && is_numeric($_GET['id']))
						 {
							 $txnid= $_GET['id']; // get id value
							 $aswarray=array();
							$sql_orders = mysql_query("SELECT *FROM `orders`WHERE `id` = '$txnid'");
							$count = mysql_num_rows($sql_orders);
							$i=1;
							
							if($i<=$count)
							{
							$row_orders = mysql_fetch_array($sql_orders);
							
								
                             		                               $uid = $row_orders['uid'];
									$txnid = $row_orders['txnid'];
									$name = $row_orders['name'];
									$email = $row_orders['email'];
									$phone = $row_orders['phone'];
                                                                        $address=$row_orders['address'];
                                                                        $orderid=$txnid ;
                                                                         $order_idnew=$row_orders['order_itemcode'];
                                                                    
                                                                          $addressusernew=$row_orders['address']; 
						 
							
						?>
								
                            <TABLE width='100%'><TR><TD width='50%'>
                        <p class="text-left">Name: <? echo $name ; ?><br />
                        Invoice No: <? echo $order_idnew; ?><br />              
                        Phone: <? echo $phone ; ?><br />
                        Email: <? echo $email ; ?><br /><br />
                        Address:<?=$addressusernew ;?>
                        </p>
                        </TD>
                        <td style="width:400px;">&nbsp;&nbsp;</td>
                        <TD ALIGN='RIGHT' width='50%'>
                        <p class="text-right">LITTLE FASHIONS<br />
                        Order Number:<? echo $order_idnew ; ?><br />              
                       TIN &nbsp;/&nbsp; VAT &nbsp;NUMBER: 36752399469<br />
                       
                        </p>
                        </TD>
                                
                                </TR></TABLE>
                	
                        
                        
                      
                        <table class="table table-bordered tbl-cart table-responsive" style="min-height: 400px;">
                        <thead>
                            <tr>
                                                             
                               
                                <td>Order ID</td>
                             <td>Transaction ID </td>
                                 <td>Product Details </td>
                                <td>Amount </td>
                               
                             
                            </tr>
                        </thead>
                        <tbody>
                        <?php
							
									$amount = $row_orders['amount'];
                                                                         $productidinfo=$row_orders['productinfo'];
                                                                        
                                                                         $prdqunty=$row_orders['pqunty'];
                                                                         $allsize=$row_orders['dresssize'];
                                                                         $allprice=$row_orders['priceall'];
                                                                        // print_r($prinfo2);
                                                                    
                                                                       
                                                        

											

												$productidinfo_list = explode(',',$productidinfo);
                                                                                                
                                                                                             
                                                                                                
                                                                                                
                                                                                                 $prdqunty_list=explode(",",$prdqunty);
                                                                                                 
                                                                                                $allsize_list=explode(",",$allsize);
                                                                                                
                                                                                                
                                                                                                  $allprice_list=explode(",",$allprice);
                                                                                                  
                                                                                                  
                                                                                                
                                                                                                //  print_r($allprice_list);

												  $count25 =count($productidinfo_list);
                                                                                                   
												
                                                                                               //echo"----------------------------";
                                                                                                 
												
                                                                                                            
                                              $sqls3="select * from products where   id in ($productidinfo) ";
                                                 
                                            echo"<td>".$order_idnew."</td>";
                                            echo"<td>$txnid</td>";
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
                                          <table width='100%' style='border-bottom: 1px solid #d3d3d3 ;'><tr><td>  <div style="float:left;">
                                               <?=$rowsel['product_name'];?> <br/>
                                           Price:&nbsp; <?=$allprice_listall;?>
                                           <br/>
                                            Quntity:&nbsp; <?=$prdqunty_listall;?>
                                           <br/>                                          
                                            size :&nbsp; <?=get_age1($allsize_listall);?>
                                              <br/>
                                             Total amount:&nbsp; <?
                                             
                                           echo   $asdw=$prdqunty_listall*$allprice_listall;
                                             
                                             $aswarray[]=$asdw ;
                                            
                                            ?>
                                         
                                             </div><div style="float:left;width:30%"></td><td>
                                            <img class="etalage_thumb_image" src="../images/products/<?=$row_images['image']; ?>" width="75px" height="75" />
                                         </div>
                                      
                                        </div></td></tr></table>
                                                            
                                        <?php
                                                  }
                                        ?>
                                    </td>
                                                        
                                                        
                                                        
                                                        
                                                        <?php
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    
                                                      }
                                    
                                    
                                    
                                    
                                    
                                    
                                    ?>
                                    
                                    
                                    
                                    <td>
                                     <?
                                    $tatmnt= $row_orders['amount'];
                                    
                                    
                                    
                                     $ccst=array_sum($aswarray);
                                     $totqunt=array_sum($prdqunty_list);
                                     echo "product Cost :&nbsp;&nbsp;Rs.".$ccst ;
                                       if($row_orders['payment-mode']==2)
                                       {
                                    $add60=60;
                                   $amount250= $row_orders['amount'];
                                  
                                   echo"<br/>";
                                   echo "Shipping Charges:&nbsp;&nbsp;Rs. 60" ;
                                       }
                                       
                                       $countype=$row_orders['coupontype'];
                                         if($countype !='' &&  $countype !='0')
                                         {
                                               echo "<br/>Discount:";
                                               $discountam=array_sum($allprice_list);
                                               echo $discount=$ccst-$tatmnt+$add60 ;
                                             
                                         }
                                   
                                    if($row_orders['delivery-status']==2)
                                       {
                                    $shipping=60;
                                    
                                       }
                                       else
                                       {
                                        $shipping=0;   
                                           
                                       }
                                 
                                     @$allmntsa=$allmntsa + $tatmnt ;
                                     ?>
                                    
                                    
                                    </td>
                                  
                                </tr>
                                
                              
                        <?php 	
								
							$i++;
							
                                                        }} 
						?>    
                                <tr><td style="border:0px;"></td><td style="border:0px;"></td><td style="border:0px;">&nbsp;Total Amount</td><td style="border:0px;">Rs.&nbsp;<?=@$allmntsa ;?></td></tr>
                        </tbody>
                    </table>
                                                    
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        		
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