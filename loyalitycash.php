<?php include("includes/db.php");
include("includes/functions.php");
session_start();
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    header("location: login.php");
    exit();
}
ECHO $user_id = $_SESSION['user_id'];
$sqlords = mysql_query("select * from orders where uid='$user_id' and `status`='1' and `delivery-status`!='3' "); ?><!DOCTYPE html><html><head>	<meta http-equiv="content-type" content="text/html; charset=utf-8">	<meta http-equiv="X-UA-Compatible" content="IE=edge">	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">	<title>Little Fashion : Fashion Redefined</title>	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>	<link rel="stylesheet" href="css/library/font-awesome.min.css">	<link rel="stylesheet" href="css/library/font-awesome.css">	<link rel="stylesheet" href="css/library/bootstrap.min.css">	<link rel="stylesheet" href="css/library/owl.carousel.css">	<link rel="stylesheet" href="css/library/jquery-ui.min.css">	<link rel="stylesheet" href="css/library/jquery.fancybox.css">	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>    <link href="caurosel/custom.css" rel="stylesheet">    <!-- Owl Carousel Assets -->    <link href="caurosel/owl.carousel.css" rel="stylesheet">    <link href="caurosel/owl.theme.css" rel="stylesheet">    <!-- Prettify -->    <link href="caurosel/prettify.css" rel="stylesheet">    <script>		$(function () {
        var shrinkHeader = 300;
        $(window).scroll(function () {
            var scroll = getCurrentScroll();
            if (scroll >= shrinkHeader) {
                $('.header').addClass('shrink');
            } else {
                $('.header').removeClass('shrink');
            }
        });
        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }}
    );</script>
        <style>
#cap {
    text-transform: capitalize;
}
        </style>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script><style>	i	{		margin-right:5px !important;	}</style></head><body>	<!-- LOADING -->	<div class="loading-container" id="loading">		<div class="loading-inner">			<span class="loading-1"></span>			<span class="loading-2"></span>			<span class="loading-3"></span>		</div>	</div>	<!-- END LOADING -->	<div class="wrap-page">		<!-- HEADER -->					<nav class="navigation_top ">						<?php include_once('top.php'); ?>					</nav>		         			<header class="header _1">                    	<?php include_once('header.php'); ?>                    </header>                    <header class="header _1">                    	<?php include_once('menu.php'); ?>					</header>		<!-- END HEADER -->				<? $sql = mysql_query("SELECT * FROM `users` where id = '$user_id' ");
$row = mysql_fetch_array($sql); ?>		<section class="breakcrumb bg-grey">			<div class="container">            	<div class="col-md-6">				<h3 class="pull-left">My Account</h3>                </div>                <div class="col-md-6 pull-right">                <span class="pull-right" id="cap"> Welcome : <?= $row['username']; ?></span>                </div>			</div>		</section>		<!-- PRODUCT GRID -->		<section class="product-grid">			<div class="container">				<div class="row">					<div class="col-md-3">												<?php include_once('user-sidebar.php'); ?>					</div>					<!-- END SIDEBAR -->					<div class="col-md-9">						<!-- GRID CONTENT -->						<div class="grid-cn-1">							<div class="row">                            	<h3 class="name border-bottom">Loyality Cash</h3>                                <div class="cash"><h5 class="name border-bottom">You Have <strong>Rs.<span id='topamnt'> </span></strong>                                         Loyalty Cash Available with you <a href="index.php">Shop Now</a></h5>                                </div>							</div>							<div class="row coupon">                                 <div class="col-md-12">                                 	<p>You may now redeem your Loyalty cash. To redeem, please login to your account before placing the order. Expires 31st March every year</p>                                    <table class="table-bordered">                                    	<thead>                                        	<tr>                                            	<th>Order Number</th>                                            	<th>Product Name</th>                                            	<th>Product Cost</th>                                            	<th>Loyality Points Earned</th>                                            	                                            </tr>                                        </thead>                                        <tbody>                                            <?php $ordnum = mysql_num_rows($sqlords);
if ($ordnum > 0) 
    
    
    {
    $sql_temps=mysql_query("select * from wallet  where user_id='$user_id'");
    $sql_tempval=mysql_fetch_array($sql_temps);
   $temp_valss=$sql_tempval['temp'];
 echo"<span class='spnallmnt' style='display:none;'>".$temp_valss."</span>"; 
     $updateloyalitycash = mysql_query("update wallet set loyality_cash='$temp_valss' where user_id='$user_id' ");

       }



?>   
                                           <?php
                                              $arrrt=array();
                                               while($orows=  mysql_fetch_array($sqlords))
                                               {
                                                   echo"<tr><td>".$orows['order_itemcode']."</td>";
                                                   echo"<td><table>";
                                                   $orderids=$orows['id'];
                                                   $prinfo=$orows['productinfo'];
                                                   $prdata=  mysql_query("select * from products where id in ($prinfo)");
                                                   while ($prrows=  mysql_fetch_array($prdata))
                                                   {
                                                       $arrrt[]=$prrows['id'];
                                                       
                                                      ?>
                                            <tr><td><?=$prrows['product_name']?></td></tr>
                                                  <?php
                                                       
                                                   }
                                                 echo"</table></td>";  
                                                echo"<td>".$orows['amount']."</td>";
                                                
                                            echo"<td>";
                                          
                                               $prdata2=  mysql_query("select SUM(loyalitycash) from products where id in ($prinfo)");
                                                   while ($prrows2= mysql_fetch_array($prdata2))
                                                   {
                                                     
                                                         echo  $prrows2['SUM(loyalitycash)'];  
                                                      
                                                          $allmnt=$allmnt+$prrows2['SUM(loyalitycash)'];
                                                   }
                                                 
                                          echo"</td>";      
                                               }
                                               
                                          
                                            ?>
                                            
                                  








                                                                                                                                                                                                                                                                 	                                            	                                        </tbody>                                    </table>                                 </div>                              							</div>						<!-- END GRID CONTENT -->						<!-- BOTTOM LIST -->					</div>					<!-- SIDEBAR -->				</div>			</div>		</section>		<!-- END PRODUCT GRID -->		<!-- PARTNER -->				<!-- FOOTER -->		<footer class="dark">        	<?php include_once('footer.php'); ?>		</footer>		<!-- END FOOTER -->		<!-- SCROLL TOP -->		<div id="scroll-top" class="_1">Scroll Top</div>		<!-- END SCROLL TOP -->	</div>	<!-- Library JS -->	<script src="js/library/jquery-1.11.0.min.js" type="text/javascript"></script>	<script src="js/library/jquery-ui.min.js" type="text/javascript"></script>	<script src="js/library/bootstrap.min.js" type="text/javascript"></script>	<script src="js/library/owl.carousel.min.js" type="text/javascript"></script>	<script src="js/library/jquery.ui.touch-punch.min.js" type="text/javascript"></script>	<script src="js/library/parallax.min.js" type="text/javascript"></script>	<script src="js/library/jquery.countdown.min.js" type="text/javascript"></script>	<script src="js/library/jquery.mb.YTPlayer.js" type="text/javascript"></script>	<script src="js/library/jquery.responsiveTabs.min.js" type="text/javascript"></script>	<script src="js/library/jquery.fancybox.js" type="text/javascript"></script>	<script src="js/library/SmoothScroll.js" type="text/javascript"></script>	<script src="js/library/isotope.min.js" type="text/javascript"></script>	<script src="js/library/jquery.colio.min.js" type="text/javascript"></script>	<!-- Main Js -->	<script src="js/script.js" type="text/javascript"></script>        <script>        $(document).ready(function () {
        var spanallda = $(".spnallmnt").text();
        $('#topamnt').text(spanallda);
    });</script>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <script src="js/auto-product.js"></script>


</body></html>