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
    <link href='https://cdn.datatables.net/1.10.7/css/jquery.dataTables.css' rel='stylesheet' type='text/css' />

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>


 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>

<style>

tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

</style>

<script>

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
} );

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
                        <span class="title">Search Orders </span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-12 col-sm-12 text-center">
                
                	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Order Id</th>
                <th>Price</th>
                <th>Payment Mode</th>
                <th>Status</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Order Id</th>
                <th>Price</th>
                <th>Payment Mode</th>
                <th>Status</th>
            </tr>
        </tfoot>
        
                        <tbody>
                            
             
                            
                        <?php
							$sql_user = mysql_query("SELECT * FROM orders where `delivery-status`='2' or `delivery-status`='1' or `delivery-status`='3'   ");
							$count = mysql_num_rows($sql_user);
							$i=1;
							
							if($i<=$count)
							{
							while($row_user = mysql_fetch_array($sql_user))
							{
								
						?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$row_user['name'];?></td>
                                     <td><?=$row_user['email'];?></td>
                                       <td><?=$row_user['phone'];?></td>
                                        <td><?=$row_user['order_itemcode'];?></td>
                                         <td><?=$row_user['amount'];?></td>
                                         <td>
                                             <?php $paymode=$row_user['payment-mode'];
                                             
                                             $array=array();
                                             $array= array(
                                                     "1"=>"Online",
                                                     "2" => "Cash On Delivery",
                                                     '3'=>"Wallet",
                                                     '4'=>"Gift Card"
                                                     
                                                     );
                                             echo $array[$paymode];
                                             ?>
                                             
                                         </td>
                                         <td>
                                             <?php $paymode=$row_user['delivery-status'];
                                             
                                             $array=array();
                                             $array= array(
                                                     "1"=>"Delivered",
                                                     "2" => "In Process",
                                                     '3'=>"Canceled",
                                                     
                                                     
                                                     );
                                             echo $array[$paymode];
                                             ?>
                                             
                                         </td>
                         <!--
                                    <td class="text-center">
                                    	 <? 
											if($row_user['flag'] ==1)
											{
										?>
                                        		<a href="enable-user.php?id=<?=$row_user['id'];?>" onclick="return confirm('Confirm to Enable?');">
                                                  <i class="fa fa-trash-o"></i>
                                                </a>
                                                                             <?
												
											}
											elseif($row_user['flag'] ==0)
											{
										?>
                                        		

                                      <a href="disable-user.php?id=<?=$row_user['id'];?>" onclick="return confirm('Confirm to Disable?');">
                                                   
                                                          <i class="fa fa-check"></i>
                                                </a>






                                        <?
											}
										?>
                                     -->
                                        
                                        
                                      
                                    </td>
                                </tr>
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

    <!--<script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/jquery.blImageCenter.js"></script>
  <!--  <script src="js/mimity.js"></script>-->
</body>
</html>