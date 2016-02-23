<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: index.php");
	exit();
 }
$sqlCountry="select id,category_name from categories  order by category_name asc ";
$resCountry=mysql_query($sqlCountry);
$checkCountry=mysql_num_rows($resCountry);
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
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
function selectCity(country_id){
	if(country_id!="-1"){
		loadData('state',country_id);
		$("#state_dropdown").html("<option value='-1'>Select Sub Category</option>");
	}else{
		$("#state_dropdown").html("<option value='-1'>Select Sub Category</option>");
		$("#city_dropdown").html("<option value='-1'>Select Menu</option>");		
	}
}

function selectState(state_id){
	if(state_id!="-1"){
		loadData('city',state_id);
	}else{
		$("#city_dropdown").html("<option value='-1'>Select Menu</option>");		
	}
}

function loadData(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "loadData.php",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value='-1'>Select</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}
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
                        <span class="title">Add Menu</span>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-8 col-sm-8">
                
                	<?php 
					
				
						if (!isset($_POST['subcat_name'])) 
						{
							echo "";
						}
						else
						{
							$cat_name = $_POST['cat_name'];
							$subcat_name = $_POST['subcat_name'];
							$menu_name = $_POST['menu_name'];
							
							
							$sql = mysql_query("INSERT INTO menu (cat_id, subcat_name, menu_name, flag) VALUES ('$cat_name','$subcat_name', '$menu_name', 1)");
							
							if (!$sql)
							{
								die('Error: ' . mysql_error());
							}
							else
							{
								echo '<script language=javascript>alert("Menu  Added..")</script>';
								echo "<script type='text/javascript'>window.location='add-menu.php'</script>";
								exit();					
							}
						}
					?>
                	<form action="#" method="post" enctype="multipart/form-data">
					<?php
                    if($checkCountry > 0){
                        ?>
                        <div class="col-lg-6 col-sm-6 top10">
                            <label for="category-name">Category Name : </label>
                            <select name="cat_name" onchange="selectCity(this.options[this.selectedIndex].value)" class="form-control">
								<option value="-1">Select Category</option>
								<?php
								while($rowCountry=mysql_fetch_array($resCountry)){
									?>
									<option value="<?php echo $rowCountry['id']?>"><?php echo $rowCountry['category_name']?></option>
									<?php
								}
								?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-6 col-sm-6 top10">
                            <label for="category-name">Sub Category Name : </label>
							<select id="state_dropdown" name="subcat_name" class="form-control" onchange="selectState(this.options[this.selectedIndex].value)">
								<option value="-1">Select Sub Category</option>
							</select>
							<span id="state_loader"></span>
                        </div>
                         <div class="clearfix"></div>
                        <div class="col-lg-6 col-sm-6 top10">
                            <label for="category-name">Menu :</label>
                            <input type="text" name="menu_name" class="form-control">
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="col-lg-8 col-sm-8 top10">
                            <div class="btn-group btns-cart">
                            <input type="submit" class="btn btn-primary" value="Add Menu">
                            </div>
                        </div>
						<?php }else{
                            echo 'No Country Name Found';
                        }
                        ?>
                    </form>
                    
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    <div class="clearfix bottom30"></div>
                    
            
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