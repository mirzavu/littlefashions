<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: index.php");
	exit();
 }

 $txids=$_GET['txid'];
$sql_ordersa=mysql_query("select * from orders where txnid='$txids'");
$paynt_rows=mysql_fetch_array($sql_ordersa);

 $pay_mode=$paynt_rows['payment-mode'];

 $del_mode=$paynt_rows['delivery-status'];

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
                        <span class="title">Edit Orders </span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                       <?php
                      if(isset($_POST['delsubmit']))
                      {

                       $hidtxids=$_POST['hidtxids'];
                 $paymntmode=$_POST['paymntmode'];
                  $delvtmode=$_POST['delvtmode'];

                   IF($paymntmode!='')
                     {
                $sql_ryupdate=mysql_query(" update orders set `payment-mode`='$paymntmode' where txnid='$hidtxids' ");

                     }

                   IF($delvtmode!='')
                     {
                $sql_ryupdate=mysql_query("update orders set `delivery-status`='$delvtmode' where txnid='$hidtxids'  ");

                     }

echo '<script language=javascript>alert("Updated..")</script>';
						echo "<script type='text/javascript'>window.location='order_history.php'</script>";
									exit();					


                       }


                      ?>






 	
                	
                	<form action="#" method="post"  class="form-horizontal">
                    	<input type="hidden" name="hidtxids" value="<?php echo $txids; ?>"/>
                        <div class="form-group">
                            <label for="product-name" class="col-sm-2 control-label">payment Status</label>
                            <div class="col-sm-6">
                          
                           <select class="form-control"  name='paymntmode'>
                             
                              <option value='1' <?=$pay_mode=='1'? ' selected="selected"' : ''?>>paid</option>
                              <option value='2' <?=$pay_mode=='2'? ' selected="selected"' : ''?>>Not paid</option>
                           </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
 <div class="form-group">
                            <label for="product-name" class="col-sm-2 control-label">Delivery  Status</label>
                            <div class="col-sm-6">
                          
                           <select class="form-control"  name='delvtmode'>
                             <option value='1' <?=$del_mode=='1'? ' selected="selected"' : ''?>>Delivered </option>
                              <option value='2' <?=$del_mode=='2'? ' selected="selected"' : ''?>>Not Delivered</option>
                               <option value='3' <?=$del_mode=='3'? ' selected="selected"' : ''?>>Cancel</option>
                           </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        
                        <div class="form-group col-lg-4 col-sm-4 text-right top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" class="btn btn-primary" name="delsubmit" value="Edit payment status">
                            </div>
                        </div>
                    </form>
            		
                    
                  
					
					
            
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