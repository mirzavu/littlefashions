<?php
session_start();
include("includes/db.php");

include("includes/functions.php");
        
if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {

	header("location: login.php");

	exit();

}
$loginpage=$loginpage='https://littlefashions.in/dashboard.php';
$user_id = $_SESSION['user_id'];
if(isset($_POST['cpsubmit']))
{
  $oldpass=$_POST['opw'];  
  $new=$_POST['npw'];  
  $uid=$_POST['useridhid'];
   $sqla=mysql_query("select * from users where id='$uid' and password='$oldpass'");
    $numps=  mysql_num_rows($sqla);
    if($numps > 0)
    {
        echo"password correct";
        
        $sqlup=  mysql_query("update users set password='$new' where id='$uid'");
         echo '<script language=javascript>alert("Password Changed .. !!")</script>';
		        echo "<script type='text/javascript'>window.location='$loginpage'</script>";
		        exit();
    }
    else
    {
                   echo '<script language=javascript>alert("Enter correct password  !!")</script>';
		        echo "<script type='text/javascript'>window.location='$loginpage'</script>";
		        exit();
    }
        
}

?>

<!DOCTYPE html>

<html><head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>Little Fashion : Fashion Redefined</title>

	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/library/font-awesome.min.css">

	<link rel="stylesheet" href="css/library/font-awesome.css">

	<link rel="stylesheet" href="css/library/bootstrap.min.css">

	<link rel="stylesheet" href="css/library/owl.carousel.css">

	<link rel="stylesheet" href="css/library/jquery-ui.min.css">

	<link rel="stylesheet" href="css/library/jquery.fancybox.css">

	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>

    <link href="caurosel/custom.css" rel="stylesheet">

    <!-- Owl Carousel Assets -->

    <link href="caurosel/owl.carousel.css" rel="stylesheet">

    <link href="caurosel/owl.theme.css" rel="stylesheet">

    <!-- Prettify -->

    <link href="caurosel/prettify.css" rel="stylesheet">

    <script>

		$(function(){

 var shrinkHeader = 300;

  $(window).scroll(function() {

    var scroll = getCurrentScroll();

      if ( scroll >= shrinkHeader ) {

           $('.header').addClass('shrink');

        }

        else {

            $('.header').removeClass('shrink');

        }

  });

function getCurrentScroll() {

    return window.pageYOffset || document.documentElement.scrollTop;

    }

});

    </script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>

<style>

	i

	{

		margin-right:5px !important;

	}

</style>

</head>

<body>

	<!-- LOADING -->

	<div class="loading-container" id="loading">

		<div class="loading-inner">

			<span class="loading-1"></span>

			<span class="loading-2"></span>

			<span class="loading-3"></span>

		</div>

	</div>

	<!-- END LOADING -->

	<div class="wrap-page">



		<!-- HEADER -->

					<nav class="navigation_top ">

						<?php include_once('top.php');?>

					</nav>		

         			<header class="header _1">

                    	<?php include_once('header.php');?>

                    </header>

                    <header class="header _1">

                    	<?php include_once('menu.php');?>

					</header>

		<!-- END HEADER -->

				<? 

					$sql = mysql_query("SELECT * FROM `users` where id = '$user_id' ");

					$row = mysql_fetch_array($sql);

				?>		<section class="breakcrumb bg-grey">

			<div class="container">

            	<div class="col-md-6">

				<h3 class="pull-left">My Account</h3>

                </div>

                <div class="col-md-6 pull-right">

                <span class="pull-right"> Welcome : <?=$row['username'];?></span>

                </div>

			</div>

		</section>		<!-- PRODUCT GRID -->

		<section class="product-grid">

			<div class="container">

				<div class="row">

					<div class="col-md-3">

						<?php include_once('user-sidebar.php');?>
					</div>

					<!-- END SIDEBAR -->

					<div class="col-md-9">

						<!-- GRID CONTENT -->

						<div class="grid-cn-1">

							<div class="row">

                            	<h3 class="name border-bottom">CHANGE PASSWORD</h3>
                                
                             <div class="container">    <div class="row">
        
        
        
        <section class="login-register">
			<div class="container">
				<div class="row">

					<!-- LOGIN -->
                    <div class="col-md-3"></div>
					<div class="col-md-4 pull-left">

						<div class="heading _two text-left">
							
						</div>

						<div class="form login ">
							<form ail Addressction="#" method="post">
							<label>Old Password <sup>*</sup></label>
                                                        <input type="hidden" name="useridhid" value="<?=$row['id'];?>">
                                                        <input type="password" name="opw" class="input-text" placeholder="ENTER  OLD PASSWORD">

							<label>New Password <sup>*</sup></label>
                                                        <input type="password" name="npw" class="input-text" placeholder="ENTER  NEW PASSWORD" id='npw'>
                                                          <label>Confirm  Password <sup>*</sup></label>
                                                          <input type="password" name="cpw" class="input-text" placeholder="ENTER CONFIRM " id='cpw'>
							<div class="row">
								<div class="col-sm-6 col-md-12 col-lg-6">
									<button class="btn btn-13 btn-submit text-uppercase" id='chbtn' name="cpsubmit" type="submit">Submit</button>
                            	</div>
                                
                                </div>
							
                            </form>
                           
						</div>

					</div>
					<!-- END LOGIN -->
                     <div class="col-md-3"></div>
				</div>
			</div>
		</section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
   
</div>

						</div>

						<!-- END GRID CONTENT -->

						<!-- BOTTOM LIST -->

					</div>



					<!-- SIDEBAR -->

				</div>

			</div>

		</section>

		<!-- END PRODUCT GRID -->



		<!-- PARTNER -->

		

		<!-- FOOTER -->

		<footer class="dark">

        	<?php include_once('footer.php');?>

		</footer>

		<!-- END FOOTER -->



		<!-- SCROLL TOP -->

		<div id="scroll-top" class="_1">Scroll Top</div>

		<!-- END SCROLL TOP -->



	</div>


	<!-- Library JS -->

	<script src="js/library/jquery-1.11.0.min.js" type="text/javascript"></script>

	<script src="js/library/jquery-ui.min.js" type="text/javascript"></script>

	<script src="js/library/bootstrap.min.js" type="text/javascript"></script>

	<script src="js/library/owl.carousel.min.js" type="text/javascript"></script>

	<script src="js/library/jquery.ui.touch-punch.min.js" type="text/javascript"></script>

	<script src="js/library/parallax.min.js" type="text/javascript"></script>

	<script src="js/library/jquery.countdown.min.js" type="text/javascript"></script>

	<script src="js/library/jquery.mb.YTPlayer.js" type="text/javascript"></script>

	<script src="js/library/jquery.responsiveTabs.min.js" type="text/javascript"></script>

	<script src="js/library/jquery.fancybox.js" type="text/javascript"></script>

	<script src="js/library/SmoothScroll.js" type="text/javascript"></script>

	<script src="js/library/isotope.min.js" type="text/javascript"></script>

	<script src="js/library/jquery.colio.min.js" type="text/javascript"></script>



	<!-- Main Js -->

	<script src="js/script.js" type="text/javascript"></script>
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="js/auto-product.js"></script>
        <script>
        $(document).ready(function(){
        
       
         $('#chbtn').click(function(){
          var cpw=$('#cpw').val();
          var npw=$('#npw').val();
          
          if(cpw != npw)
          {
              
              alert('New Password and Confirm Password are not same');
              return false ;
          }
             
             
         })  ; 
            
            
        });
        </script>

</body>

</html>