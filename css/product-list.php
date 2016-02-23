<?
	include("includes/db.php");
	include("includes/functions.php");
	session_start();
    	$id = $_GET['id'];
	if($_REQUEST['command'] == 'add'  && $_REQUEST['product_id']>0 ){
		$product_id = $_REQUEST['product_id'];
		addtocart($product_id,1);
		header("location:cart.php");
		exit();
	 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Little Fashiion :: Fashion Redefined</title>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>

	<!-- Library CSS -->
	<link rel="stylesheet" href="css/library/font-awesome.min.css">
	<link rel="stylesheet" href="css/library/bootstrap.min.css">
	<link rel="stylesheet" href="css/library/owl.carousel.css">
	<link rel="stylesheet" href="css/library/jquery-ui.min.css">
	<link rel="stylesheet" href="css/library/jquery.fancybox.css">
    <link rel="stylesheet" href="css/library/font-awesome.css">
	<link rel="stylesheet" href="css/library/colio.css">
	<link rel="stylesheet" href="css/library/isotope.css">
	
	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="zoom/css/etalage.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="zoom/js/jquery.etalage.min.js"></script>
		<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 250,
					thumb_image_height: 300,
					source_image_width: 1200,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});


				// This is for the dropdown list example:
				$('.dropdownlist').change(function(){
					etalage_show( $(this).find('option:selected').attr('class') );
				});

			});
		</script>
</head>
<body>

	<!-- LOADING -->
	<!--<div class="loading-container" id="loading">
		<div class="loading-inner">
			<span class="loading-1"></span>
			<span class="loading-2"></span>
			<span class="loading-3"></span>
		</div>
	</div>-->
	<!-- END LOADING -->

	<div class="wrap-page portfolio_2">

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
		
		<!-- BREAKCRUMB -->
		<section class="breakcrumb bg-grey">
			<div class="container">
				
				<ul class="nav-breakcrumb ">
					<li><a href="index.html">Home</a></li>
					<li><span>Portfolio Showcase</span></li>
				</ul>

			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- portfolio -->
		<section class="portfolio _2">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<aside class="sidebar sidebar-cat _1">

							<h2 class="sidebar-title"><span>Browse By:</span> Baby Clothes</h2>

							<ul class="nav-cat ">

                            	<h4></h4>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="cat-1">

										<label for="cat-1">Bath Time  <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="cat-2">

										<label for="cat-2">Caps, Gloves & Mittens<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="cat-3">

										<label for="cat-3">Ethnic Wear<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="cat-4">

										<label for="cat-4">Footwear <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="cat-5">

										<label for="cat-5">Frocks<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="cat-6">

										<label for="cat-6">Inner Wear &amp; Thermals<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="cat-7">

										<label for="cat-7">Nightwear  <span>(200)</span></label>

									</div>

								</li>

							</ul>

						</aside>

						<!-- END SIDEBAR CATEGORIES -->

						

						<!-- SIDEBAR MANUFACTURE -->

						<aside class="sidebar sidebar-fac _1">

							<h2 class="sidebar-title"><span>By</span> Brands</h2>

							<ul class="nav-cat ">

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="factory-1">

										<label for="factory-1">Little's<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="factory-2">

										<label for="factory-2">Chicco <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="factory-3">

										<label for="factory-3">Morisons<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="factory-4">

										<label for="factory-4">Mee Mee <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="factory-5">

										<label for="factory-5">Pigeon<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="factory-6">

										<label for="factory-6">Sunbaby<span>(200)</span></label>

									</div>

								</li>

							</ul>

						</aside>

						<!-- END SIDEBAR MANUFACTURE -->

						

						<!-- SIDEBAR SLIDER -->

						<aside class="sidebar sidebar-slider  _1">

							<h2 class="sidebar-title"><span>By</span> Prices</h2>

							<div class="slider">

								<div id="slider"></div>

								<div class="slider-g">

									<span class="price-value" id="price-f"></span>

									<span class="price-value" id="price-t"></span>

									<button class="btn-filter">Filter</button>

								</div>

							</div>

						</aside>

						<!-- END SIDEBAR SLIDER -->

						

						<!-- SIDEBAR COLOR -->

						<aside class="sidebar sidebar-color _1">

							<h2 class="sidebar-title"><span>By</span> Colors</h2>

							<ul class="nav-color">

								<li class="_1"><a href="#"></a></li>

								<li class="_2"><a href="#"></a></li>

								<li class="_3"><a href="#"></a></li>

								<li class="_4"><a href="#"></a></li>

								<li class="_5"><a href="#"></a></li>

								<li class="_6"><a href="#"></a></li>

								<li class="_7"><a href="#"></a></li>

								<li class="_8"><a href="#"></a></li>

								<li class="_9"><a href="#"></a></li>

								<li class="_10"><a href="#"></a></li>

							</ul>

						</aside>

						<!-- END SIDEBAR COLOR -->

						

						<!-- SIDEBAR SIZE -->

						<aside class="sidebar sidebar-size _1">

							<h2 class="sidebar-title"><span>By</span> Age</h2>

							<ul class="nav-cat ">

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-1">

										<label for="size-1">0 - 3 Months<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-2">

										<label for="size-2">3-6 Months <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-3">

										<label for="size-3">6-9 Months <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-4">

										<label for="size-4">9-12 Months <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-5">

										<label for="size-5">12-18 Months <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-6">

										<label for="size-6">18-24 Months <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-6">

										<label for="size-7">2-4 Years <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-6">

										<label for="size-8">4-6 Years <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-6">

										<label for="size-9">6-8 Years <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-6">

										<label for="size-10">8-10 Years <span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-6">

										<label for="size-11">10-12 Years <span>(200)</span></label>

									</div>

								</li>

							</ul>

						</aside>

						<!-- END SIDEBAR SIZE -->

						

						<!-- SIDEBAR TAG -->

						<aside class="sidebar sidebar-tags  _1">

							<h2 class="sidebar-title"><span>Shop</span> For</h2>

							<ul class="nav-cat ">

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-1">

										<label for="size-1">Unisex<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-1">

										<label for="size-1">Boy<span>(200)</span></label>

									</div>

								</li>

								<li>

									<div class="check-box">

										<input type="checkbox" class="checkbox" id="size-1">

										<label for="size-1">Girl<span>(200)</span></label>

									</div>

								</li>

                              </ul>  

						</aside>
                    </div>
                    <div class="col-md-9">
					<div id="portfolio" class="portfolio-cn _1 clearfix"  data-theme="3">
						<?php
                                $sql = mysql_query("select * from products WHERE category = '$id' and flag = '1'  ORDER BY id DESC  Limit 0,12 ");
                                while($row_products = mysql_fetch_array($sql))
                                {
									$product_id = $row_products['product_id'];
									$sql_images = mysql_query("select * from product_images where product_id = '$product_id' order by id ASC ");
									
									$row_images = mysql_fetch_array($sql_images);
									
									
                                ?>
						<div class="col-md-4 col-lg-4" data-content="./product-description.php?id=<?=$row_products['id'];?>">
							<div class="portfolio-item _2">

								<div class="img">
									<a href="#">
										<img src="images/products/<?=$row_images['image'];?>" alt="">
									</a>

									<a href="product-description.php?id=<?=$row_products['id'];?>" class="quick-view portfolio-link"><i class="fa fa-eye">Quick View</i></a>

								<div class="text">

									<h2 class="name">
										<a href="product-detail.php?id=<?=$row_products['id'];?>"><?=$row_products['product_name'];?></a>	
									</h2>	

									<div class="price-box"> 
											
                                            <?php $list = explode(',',$row_products['price']);$price = $list[0];?>
		                                  	
		                                  <div class="col-md-6">
                                          	<p class="special-price">
		                                   		<span class="price">Rs. <? echo $price - (($price*$row_products['offerprice'])/100);?></span> 
		                                  	</p> 
                                            </div>
											<div class="col-md-6">
		                                  	<p class="old-price"> 
		                                    	<span class="price">Rs. <? echo $price; ?></span> 
		                                  	</p> 
                                            </div>    

		                          	</div>
								</div>


								</div>
                              

							</div>
                             
						</div>
						<!-- END portfolio -->
 					<? } ?>

					</div>
                    </div>

					<div class="load-more-pf text-center text-uppercase">
						<a href="#" class="btn btn-9" id="load-more-pf">Load More</a>
					</div>

				</div>
			</div>
		</section>
		<!-- END portfolio -->


		<!-- FOOTER -->
		<footer class="dark">
        	<?php include_once('footer.php');?>
		</footer>
		<!-- END FOOTER -->

		<!-- SCROLL TOP -->
		<div id="scroll-top" class="_2">Scroll Top</div>
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
</body>
</html>