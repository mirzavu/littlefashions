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
                               
                                <td>Txn ID</td>
                              
                                <td>Product Details </td>
                                <td>Amount </td>
                                  <td>Date of Order </td>
                                 <td>Payment Mode</td>
                                  <td>Payment Status </td>
  <td>Coupon Used</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                                                    <?php
							$sql_orders = mysql_query("SELECT * FROM orders where `delivery-status` NOT IN (3,0)");
							 $count =mysql_num_rows($sql_orders);
                                                          $count25 =mysql_num_rows($sql_orders);
							$k=1;
							
                                                                                                  
							if($i<=$count)
							{
							while($row_orders = mysql_fetch_array($sql_orders))
							{
								
                             		                                $uid = $row_orders['uid'];
							$txnid = $row_orders['txnid'];
                                                $order_itemcode=$row_orders['order_itemcode']; 
									$name = $row_orders['name'];
									$email = $row_orders['email'];
									$phone = $row_orders['phone'];
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

												 $count500 =count($productidinfo_list);
                                                                                                   
												
                                                                                               //echo"----------------------------";
                                                                                                 
												
                                          
												$productidinfo_list = explode(',',$productidinfo);
                                                                                                
                                                                                             
                                                                                                
                                                                                                
                                                                                                 $prdqunty_list=explode(",",$prdqunty);
                                                                                                 
                                                                                                $allsize_list=explode(",",$allsize);
                                                                                                
                                                                                                
                                                                                                  $allprice_list=explode(",",$allprice);
                                                                                                  
                                                                                                  
                                                                                                
                                                                                                //  print_r($allprice_list);

												  $count25 =count($productidinfo_list);
                                                                                                   
												
                                                                                               //echo"----------------------------";
                                                                                                 
												
                                                                                                            
                                              $sqls3="select * from products where   id in ($productidinfo) ";
            
?>                                     
         <td><?=$k ; ?></td>


<td>
<a href="#cusmod<?=$order_itemcode?>" data-toggle="modal"><?=$order_itemcode ; ?></a>



 <!-- Popup -->
                                <div id="cusmod<?=$order_itemcode?>" class="modal fade" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">View Details Of Customers </h4>
                                            </div>
                                            <div class="modal-body">
                                           		<div class="container-fluid">
                                                    
                                                    <div class="row">
                                                      <div class="col-md-4">Uid</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=@$uid;?></div>
                                                    </div>
                                                     <div class="row">
                                                      <div class="col-md-4">Name</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=@$name;?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Email</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=@$email;?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Phone</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=$phone;?></div>
                                                    </div>
                                                    
                                                   
                                                    
                                                </div>
                                            	
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Popup -->  


</td>
                                          
<?php
 
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




 Product Added By :
                                            <?php
                                            
                                            $uid50=$rowsel['uid'];
                                            
                                            $sqlusr=mysql_query("select * from user_registration where id='$uid50'");
                                            $sqlnumdd=mysql_num_rows($sqlusr);
                                            if($sqlnumdd > 0)
                                            {
                                             $sqlsellers=  mysql_fetch_array($sqlusr) ;
                                             echo $sqlsellers['name'];
                                             echo"&nbsp;";
                                             $product_idimg2=$row_orders['txnid']+$product_idimg;
                                             ?>
                                             <a href="#seller<?=$product_idimg2?>" data-toggle="modal"> view Details </a>
             
                                           <!-- Popup -->
                                <div id="seller<?=$product_idimg2?>" class="modal fade" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">View Details Of Seller</h4>
                                            </div>
                                            <div class="modal-body">
                                           		<div class="container-fluid">
                                                    
                                                    <div class="row">
                                                      <div class="col-md-4">Uid</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=@$sqlsellers[id];?></div>
                                                    </div>
                                                     <div class="row">
                                                      <div class="col-md-4">Username</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=@$sqlsellers[username];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Name</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=@$sqlsellers[name];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Email</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=@$sqlsellers[email];?></div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4">Phone</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-7"><?=@$sqlsellers[mobile];?></div>
                                                    </div>
                                                   
                                                    
                                                </div>
                                            	
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Popup -->  
                                            
                                            
     
                                            
                                            <?php 
                                            }
                                            else
                                            {
                                              echo"Admin";  
                                            }
                                            
                                            ?>
                                            
                                         


                                             </div><div style="float:left;width:30%">
                                                 <img class="etalage_thumb_image" src="../images/products/<?=$row_images['image']; ?>" width="75px" height="75" />
                                         </div>
                                      
                                        </div>
                                        <?php
                                                  }
                                        ?>
                                    </td>
                                                        
                                                        
                                                        
                                                        
                                                        <?php
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    
                                                      }
                                    
                                    
                                    
                                    
                                    
                                    
                                    ?>
                                    
                                    
                                    <td><?=$row_orders['amount']?></td>
                                     <td><?=$row_orders['added']?></td>
                                    <td>
                                      <?
                                      $paymtmode=$row_orders['payment-mode'];
                                              
                                         if($paymtmode=='2')  
                                         {
                                             echo"Cash On delivery ";
                                         }
                                          if($paymtmode=='1')  
                                         {
                                             echo"Online payment ";
                                         }
                                              
                                              
                                              
                                              ?>
                                    
                                    
                                    </td>
                                    
                                    <td>
                                         <?
                                      $paystatus=$row_orders['status'];
                                              
                                         if($paystatus=='1')  
                                         {
                                             echo"paid";
                                         }
                                          if($paystatus=='2')  
                                         {
                                             echo"Not paid ";
                                         }
                                              
                                              
                                              
                                              ?>
                                    
                                    
                                    
                                    </td>
                                   <td>
                                         <?
                                         
                                         $countype=$row_orders['coupontype'];
                                         if($countype !='' &&  $countype !='0')
                                         {
                                            echo  $countype ;
                                             
                                         }
                                         else
                                         {
                                          echo"No coupon Used";   
                                             
                                         }
                                         ?>
                                    
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="edit-orders.php?txid=<?=$txnid;?>">
                                            <i class="fa fa-edit"></i>
                                        </a> &nbsp;
                                        
                                      
                                        <a  href="invoice.php?id=<?=$row_orders['id'];?>" target="_blank">
                                            <i class="fa fa-print"></i>
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
                                                      <div class="col-md-7"><?=$row_orders['amount'];?></div>
                                                    </div>
                                                </div>
                                            	
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Popup -->
                        <? 	
								
							$k++;
							 }
                                                        //}  }}
                                                         
                                                        
                                                        
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