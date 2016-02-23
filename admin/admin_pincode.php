<?php

 include_once('includes/db.php');
 include_once('includes/functions.php');
 include_once('includes/excel_reader2.php');
 include_once('includes/SpreadsheetReader.php');
ini_set("display_errors", "1");
error_reporting(E_ALL);
 session_start();
 if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: index.php");
	exit();
 }

 if ( isset($_POST["submit"]) ) {
//echo "<pre>";print_r($_FILES);exit;
   if ( isset($_FILES["file"])) {

            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //Print file details
             /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
             echo "Type: " . $_FILES["file"]["type"] . "<br />";
             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";*/

                 //if file already exists
             if (file_exists("uploads/pincode/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "uploaded_file.xlsx";
            move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/pincode/" . $storagename);
            //echo "Stored in: " . "uploads/pincode/" . $_FILES["file"]["name"] . "<br />";
            }
        }
        mysql_query('TRUNCATE TABLE pincodes');
        $Reader = new SpreadsheetReader("uploads/pincode/" . $storagename);
        foreach ($Reader as $pinrow)
        {
            $pincode = $pinrow[0];
            $prepaid = $pinrow[1];
            $cash = $pinrow[2];
            $cod = $pinrow[3];
            $repl = $pinrow[4];
            $dispatch_center = $pinrow[5];
            $state_code = $pinrow[6];
            $coc_code = $pinrow[7];
            $city = $pinrow[8];
            $sql = mysql_query("INSERT INTO pincodes (pincode,prepaid,cash,cod,repl,dispatchCenter,stateCode,cocCode,city) VALUES ('$pincode','$prepaid','$cash','$cod','$repl','$dispatch_center','$state_code','$coc_code','$city')");
                            
        }

        echo '<script language=javascript>alert("Pincodes saved..")</script>';
     } else {
             echo "No file selected <br />";
     }
}
 
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
                        <span class="title">Upload Pincodes</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                	<form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">

                        <div class="clearfix"></div>
                        <div class="form-group">
                        <div class="col-lg-10 col-sm-10 top10">
                                <label for="current-password" class="col-sm-2 control-label">Pincode XLSX</label>
                                <span class="col-sm-4"><input type="file" name="file" required class="form-control" /></span>
                            
                        </div></div>
                        
                        
                        <div class="clearfix"></div>
                        
                        <div class="form-group col-lg-4 col-sm-4 text-right top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" name='submit' class="btn btn-primary" value="Process File">
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