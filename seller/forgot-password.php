<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 
 
 $userid = $_SESSION['user_id'];
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
                        <span class="title">Change Password</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                	<?php 
                        
                        
                        if(isset($_POST['reset']))
                        {
                            
                           $email=$_POST['email'];
                        
                            
                            $sel=  mysql_query("select * from user_registration where email='$email'");
                            $row=  mysql_fetch_assoc($sel);
                            $count=  mysql_num_rows($sel);
                            if($count>0)
                            {
                            
                            $username=$row['username'];
                            $password=$row['password'];
                               
                                $em=$row['email'];

                           
                            
                            
                            $subject = "Seller Account Forgot Password";
						$emailTo =$em;
						$emailfrom = "info@littlefashions.in"; 
						$body = "Dear $username,\n\nPlease Find Your Seller Login Details Below \n\n Username: $username \n\n Password:$password  ";
                                              
						$headers = 'From:littlefashions.in <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;
				
						mail($emailTo, $subject, $body, $headers);
						$emailSent = true;
					
                            echo "<script>window.location='index.php'</script>";
                            
                            
                            }
                            
                            
                            
                        }
					
				/*
						if (!isset($_POST['current_password'])) 
						{
							echo "";
						}
						else
						{
							$current_password = $_POST['current_password'];
							$new_password = $_POST['new_password'];
							
							$sql = mysql_query("UPDATE user_registration SET password = '$new_password' WHERE id = '$userid' && password = '$current_password' ");
							
							if (!$sql)
							{
								die('Error: ' . mysql_error());
							}
							else
							{
								echo '<script language=javascript>alert("Password Changed..")</script>';
								echo "<script type='text/javascript'>window.location='dashboard.php'</script>";
								exit();					
							}
						}*/
					?>
                
                	<form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                    	
                        <div class="form-group">
                            <label for="current-password" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                            <input type="text" name="email" class="form-control" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                       <!-- <div class="form-group">
                            <label for="New-password" class="col-sm-2 control-label">New Password</label>
                            <div class="col-sm-6">
                            <input type="password" name="new_password" class="form-control" />
                            </div>
                        </div>-->
                        
                        
                        <div class="clearfix"></div>
                        
                        <div class="form-group col-lg-4 col-sm-4 text-right top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" name='reset' class="btn btn-primary" value="Reset Password">
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