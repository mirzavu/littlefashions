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
                        <span class="title">View Seller </span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-12 col-sm-12 text-center">
                
                	<table class="table table-bordered tbl-cart">
                        <thead>
                            <tr>
                            <td>S.No</td>
                                <td>Name</td>
                                  
                                <td>Email</td>
                                  <td>Mobile Number</td>
                               
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
							$sql_user = mysql_query("SELECT * FROM  user_registration ");
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
                                       <td><?=$row_user['mobile'];?></td>
                         
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