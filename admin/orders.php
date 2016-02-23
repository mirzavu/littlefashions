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
                        <span class="title">View Orders</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-12 col-sm-12 text-center">
                	<table class="table table-bordered tbl-cart table-responsive">
                        <thead>
                            <tr>
                                <td>Id</td>                                
                                <td>Uid</td>
                                <td>Txn ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone </td>
                                <td>Amount </td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
							$sql_orders = mysql_query("SELECT * FROM orders");
							$count = mysql_num_rows($sql_orders);
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
						?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$row_orders['uid'];?></td>
                                    <td><a href="#details<?=$i?>" data-toggle="modal"><?=$row_orders['txnid'];?></a></td>         
                                    <td><?=$row_orders['name'];?></td>     
                                    <td><?=$row_orders['email'];?></td>
                                    <td><?=$row_orders['phone'];?></td>
                                    <td><?=$row_orders['amount'];?></td>
                                    <td class="text-center">
                                        <a href="#?id=<?=$row_orders['id'];?>">
                                            <i class="fa fa-print"></i>
                                        </a> &nbsp;
                                        
                                        <a href="#?id=<?=$row_orders['id'];?>" onclick="return confirm('Confirm to delete?');">
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
                                                      <div class="col-md-7"><?=$row_orders['productinfo'];?></div>
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