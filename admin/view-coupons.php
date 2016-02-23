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
                        <span class="title">View Coupons</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-12 col-sm-12 text-center">
                
                	<table class="table table-bordered tbl-cart">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Coupon Name</td>
                          
                              
                                <td>Percentage</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
							$sql_brands = mysql_query("SELECT * FROM coupons");
							$count = mysql_num_rows($sql_brands);
							$i=1;
							
							if($i<=$count)
							{
							while($row_brands = mysql_fetch_array($sql_brands))
							{
								
						?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$row_brands['coupon'];?></td>
                                    
                                    
                                    <td><?=$row_brands['percentage'];?></td>
                                    <td class="text-center">
                                    	 <? 
											if($row_brands['flag'] == 0)
											{
										?>
                                        		<a href="enable-coupons.php?id=<?=$row_brands['id'];?>" onclick="return confirm('Confirm to Enable?');">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                        <?
												
											}
											elseif($row_brands['flag'] == 1)
											{
										?>
                                        		<a href="disable-coupons.php?id=<?=$row_brands['id'];?>" onclick="return confirm('Confirm to Disable?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                        <?
											}
										?>
                                        
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

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/jquery.blImageCenter.js"></script>
    <script src="js/mimity.js"></script>
</body>
</html>