<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: index.php");
	exit();
 }
 $uidsell = $_SESSION['user_id'];
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
                        <span class="title">View Orders</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-12 col-sm-12 text-center">
                	<table class="table table-bordered tbl-cart table-responsive">
                        <thead>
                            <tr>
                                <td>Id</td>                                
                                <td>Uid</td>
                                <td>Order ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone </td>
                                <td>Product Details </td>
                                <td>Amount </td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                                                    <?php
							$sql_orders = mysql_query("SELECT * FROM orders where `delivery-status` NOT IN (3,0)");
							 $count =mysql_num_rows($sql_orders);
                                                          $count25 =mysql_num_rows($sql_orders);
							$i=1;
							
                                                                                                  
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
                                                                        
                                                                         $prdqunty=$row_orders['pqunty'];
                                                                         $allsize=$row_orders['dresssize'];
                                                                         $allprice=$row_orders['priceall'];
                                                                         $order_txnid=$row_orders['order_itemcode'];
                                                                         
                                                                        // print_r($prinfo2);
                                                                    
                                                                       
                                                        

											

												$productidinfo_list = explode(',',$productidinfo);
                                                                                                
                                                                                             
                                                                                                
                                                                                                
                                                                                                 $prdqunty_list=explode(",",$prdqunty);
                                                                                                 
                                                                                                $allsize_list=explode(",",$allsize);
                                                                                                
                                                                                                
                                                                                                  $allprice_list=explode(",",$allprice);
                                                                                                
                                                                                                //  print_r($allprice_list);

												 $count =count($productidinfo_list);
                                                                                                   
												
                                                                                               //echo"----------------------------";
                                                                                                 
												for($i=0; $i<$count; $i++) 

												{

													  $productidinfo_listall =$productidinfo_list[$i];
                                                                                                      
													    $prdqunty_listall = $prdqunty_list[$i];
                                                                                                          
                                                                                                            $allsize_listall=$allsize_list[$i];
                                                                                                             $allprice_listall=$allprice_list[$i];
                                                                                                            
                                              $sqls="select * from products where uid='$uidsell' and  id in ($productidinfo) ";
                                                 
                                            
                                           
                                          $prdatasl=mysql_query($sqls);                        
                                                                        
                                            $prslnum=mysql_num_rows($prdatasl);                       
                                                                        
                                                 if( $prslnum > 0)     
                                                 {
                                                  while($rowsel=mysql_fetch_array($prdatasl))
                                                  {
                                                    $product_idimg=$rowsel['product_id'];
                                                    $sql_images = mysql_query("select * from product_images where product_id = '$product_idimg' ");

							

							$count = mysql_num_rows($sql_images);

						

						

							$row_images = mysql_fetch_array($sql_images);
                                                    
						?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$row_orders['uid'];?></td>
                                    <td><a href="#details<?=$i?>" data-toggle="modal"><?=$order_txnid;?></a></td>         
                                    <td><?=$row_orders['name'];?></td>     
                                    <td><?=$row_orders['email'];?></td>
                                    <td><?=$row_orders['phone'];?></td>
                                    
                                    <td>
                                        
                                        
                                        <div>
                                            <div style="float:left;display:block;width:70%">
                                               <?=$rowsel['product_name'];?> <br/>
                                           Price:&nbsp; <?=$allprice_listall;?>
                                           <br/>
                                            Quntity:&nbsp; <?=$prdqunty_listall;?>
                                           <br/>
                                            size :&nbsp; <?=get_age1($allsize_listall);?>
                                             </div><div style="float:left;width:30%">
                                            <img class="etalage_thumb_image" src="../images/products/<?=$row_images['image']; ?>" width="75px" height="75" />
                                         </div>
                                      
                                        </div>
                                        
                                    </td>
                                    
                                    
                                    
                                    <td><?=$allprice_listall*$prdqunty_listall;?></td>
                                    <td class="text-center">
                                        <a href="edit-products.php?id=<?=$row_orders['id'];?>">
                                            <i class="fa fa-edit"></i>
                                        </a> &nbsp;
                                        
                                        <a href="delete-products.php?id=<?=$row_orders['id'];?>" onclick="return confirm('Confirm to delete?');">
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
                                                      <div class="col-md-4">Uid</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_orders['uid'];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Transaction Id</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_orders['txnid'];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Name</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_orders['name'];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Email</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_orders['email'];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Phone</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_orders['phone'];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Address</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$row_orders['address'];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Product Info</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7">  <?=$rowsel['product_name'];?></div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                      <div class="col-md-4">Amount</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$allprice_listall*$prdqunty_listall;?></div>
                                                    </div>
                                                </div>
                                            	
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Popup -->
                        <? 	
								
							//$i++;
							 // }
                                                        }  }}
                                                        } }
                                                        
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