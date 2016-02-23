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
                        <span class="title">View Collections Banners</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-12 col-sm-12 text-center">
                	<table class="table table-bordered tbl-cart table-responsive">
                        <thead>
                            <tr>
                                <td>Id</td>                                
                                <td>Type</td>
                                <td>Banner Name</td>
                                <td>Banner Image</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
							$sql_banners = mysql_query("SELECT * FROM collections");
							$count = mysql_num_rows($sql_banners);
							$i=1;
							
							if($i<=$count)
							{
							while($row_banners = mysql_fetch_array($sql_banners))
							{
								
									$type = $row_banners['type'];
									$banner_name = $row_banners['brand'];
									$banner_image = $row_banners['color'];
									$b=$row_banners['flag'];
									$c=$row_banners['type'];
									if ($b=='0')
									{
										$status = "Enable";	
									}
									else
									{
										$status = "Disable";	
									}
								if ($c=='1')
								{
									$collection = "infant";
								}
							else if($c=='2')
								{
									$collection = "Toddlers Collections";
								}
								else if($c=='2')
								{
									$collection = "Baby Accessories";
								}
								else
								{
									$collection = "Tu Tu Collections";
								}
       
						?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$collection;?></td>
                                    <td><?=$row_banners['banner_name'];?></td>
                                    <td><img src="../<?=$row_banners['image'];?>"></td>
                                    <td class="text-center">
                                    	 <? 
											if($row_banners['flag'] == 0)
											{
										?>
                                        		<a href="enable-collections-banners.php?id=<?=$row_banners['id'];?>" onclick="return confirm('Confirm to Enable?');">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                        <?
												
											}
											elseif($row_banners['flag'] == 1)
											{
										?>
                                        		<a href="disable-collections-banners.php?id=<?=$row_banners['id'];?>" onclick="return confirm('Confirm to Disable?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                        <?
											}
										?>
                                        <a href="edit-collectionbanner.php?id=<?=$row_banners['id'];?>">
                                            <i class="fa fa-edit"></i>
                                        </a> &nbsp;
                                        
                                        <a href="delete-collections-banners.php?id=<?=$row_banners['id'];?>" onclick="return confirm('Confirm to delete?');">
                                            <i class="fa fa-close"></i>
                                        </a>
                                        
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