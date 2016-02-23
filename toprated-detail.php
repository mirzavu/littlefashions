<?php include_once('includes/db.php');?>

<?php include_once('includes/functions.php');
session_start();?>

<?php 

	$id = $_GET['id'];

?>

<!DOCTYPE html>

<html>


<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>Little Fashion : Fashion Redefined</title>



	<!-- Google Font -->

	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>



	<!-- Library CSS -->

	<link rel="stylesheet" href="css/library/font-awesome.min.css">

	<link rel="stylesheet" href="css/library/bootstrap.min.css">

	<link rel="stylesheet" href="css/library/owl.carousel.css">

	<link rel="stylesheet" href="css/library/jquery-ui.min.css">

	<link rel="stylesheet" href="css/library/jquery.fancybox.css">

	

	<!-- MAIN STYLE -->

	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">



	<!--[if lt IE 9]>

        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>

        <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

    <![endif]-->

		<link rel="stylesheet" href="zoom1/css/etalage.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<script src="zoom1/js/jquery.etalage.min.js"></script>

		<script>

			jQuery(document).ready(function($){



				$('#etalage').etalage({

					thumb_image_width: 300,

					thumb_image_height: 300,

					source_image_width: 1500,

					source_image_height: 1500,

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

		<!-- BREAKCRUMB -->

		<section class="breakcrumb bg-grey">

			<div class="container">

				<h3 class="pull-left">Item<span>Details</span></h3>

				<ul class="nav-breakcrumb  pull-right">

					<li><a href="index.php">Home</a></li>

					<li><a href="#">Baby Fashion</a></li>

					<li><span>Type Of Product</span></li>

				</ul>

			</div>

		</section>

		<!-- END BREAKCRUMB -->

		

		<!-- PRODUCT DETAIL -->

		<section class="product-detail _1 ">

			<div class="container">



				<div class="row">

						<?php

                        $sql = mysql_query("select * from toprated where id = '$id' ");

                        $row_products = mysql_fetch_array($sql);

						?>

					<div class="col-l text-center">

                        <div id="examples">

                

                            <ul id="etalage">

                                <li>

                                    <a href="#">

                                        <img class="etalage_thumb_image" src="images/products/<?=$images[$i]; ?>" />

                                        <img class="etalage_source_image" src="images/products/<?=$images[$i]; ?> "/>

                                    </a>

                                </li>

                               <? if(isset($images[$i+1])){?>

                                <li>

                                        <img class="etalage_thumb_image" src="images/products/<?=$images[$i+1]; ?>" />

                                        <img class="etalage_source_image" src="images/products/<?=$images[$i+1]; ?>"/>

                                </li>
                               <? } ?>

                                <? if(isset($images[$i+2])){?>

                                <li>

                                        <img class="etalage_thumb_image" src="images/products/<?=$images[$i+2]; ?>" />

                                        <img class="etalage_source_image" src="images/products/<?=$images[$i+2]; ?>"/>

                                </li>

                                <? } ?>

                                <? if(isset($images[$i+3])){?>

                                <li>

                                        <img class="etalage_thumb_image" src="images/products/<?=$images[$i+3]; ?>" />

                                        <img class="etalage_source_image" src="images/products/<?=$images[$i+3]; ?>"/>

                                </li>

                                <? } ?>

                            </ul>

                        </div>

					</div>

					<div class="col-r">



						<div class="product-text">



							<h1 class="name"><?=$row_products['product_name']; ?></h1>



							<div class="product_review">

								<span class="product_stock">Notify</span>

							</div>

							

							<span class="product_stock">Available in stock</span>

							





							<div class="hr _1"></div>



							<div class="price-box"> 



	                          	<p class="special-price">

	                           		<span class="price"><?=$row_products['price']; ?></span> 

	                          	</p> 



	                          	<p class="old-price"> 

	                            	<span class="price"><?=$row_products['price']; ?></span> 

	                          	</p>     



	                      	</div>



	                      	<div class="short-description">

	                      		<p>

	                      			<?=substr($row_products['description'],0,1000); ?>

	                      		</p>

	                      	</div>



	                      	<div class="hr _1"></div>



	                      	<div id="attribute" class="attribute clearfix">



	                      		<fieldset class="attribute_fieldset"> 

	                      			<label class="attribute_label">Color:</label>

	                      			<div class="attribute_list"> 

	                      				<ul class="attribute_color">

	                      					<li class="active"><a href="#" class="_1"></a></li>

	                      				</ul>

	                      			</div>

	                  			</fieldset>



	                  			<fieldset class="attribute_fieldset"> 

	                      			<label class="attribute_label">Age:</label>

	                      			<div class="attribute_list"> 

	                      				<ul class="attribute_size">

	                      					<li class="active"><a href="#">0 - 3 Months</a></li>

	                      					<li><a href="#">3 - 6 Months</a></li>

	                      					<li><a href="#">6 - 9 Months</a></li>

	                      					<li><a href="#">9 - 12 Months</a></li>

	                      					<li><a href="#">12 - 18 Months</a></li>

	                      					<li><a href="#">18 - 24 Months</a></li>

	                      					<li><a href="#">2 - 4 Years</a></li>

	                      					<li><a href="#">4 - 6 Years</a></li>

	                      					<li><a href="#">6 - 8 Years</a></li>

	                      					<li><a href="#">8 - 10 Years</a></li>

	                      				</ul>

	                      			</div>

	                  			</fieldset>



	                      	</div>



	                      	<div class="add-to-box clearfix">



	                      		<div class="input-content">



					                <label for="qty">QTY:</label>



									<div class="qty-box">

						        		<button class="qty-decrease" id="qty-plus"></button>



						        		<input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty" />



						        		<button class="qty-increase" id="qty-minus"></button>



					        		</div>



				                </div>



				                <div class="add-to-cart">

				                	<a href="cart.php" class="btn btn-3 text-uppercase"><i class="fa fa-cart-plus"></i> <span>Add To Cart</span></a>

				                </div>



				                <div class="add-to-user">

				                	<a href="#" class="btn btn-13"><i class="fa fa-heart-o"></i> <span>Add to WishList</span></a>

				                	<a href="#" class="btn btn-13"><i class="fa fa-refresh"></i> <span>Add to Compare</span></a>

				                </div>

	                      	</div>



                      	</div>



					</div>

				</div>



				<div class="product-collateral" id="tabs-responsive">

					<ul class="nav-tab">



					    <li class="active"><a href="#description" aria-controls="description" data-toggle="tab">Product Description</a></li>



					    <li><a href="#information" aria-controls="information" data-toggle="tab">Brand Information</a></li>



					    <li><a href="#customer" aria-controls="customer" data-toggle="tab">Customer Reviews</a></li>



					    <li><a href="#shipping" aria-controls="shipping" data-toggle="tab">Ratings</a></li>

				  	</ul>



				  	<div class="tab-content">



					    <div class="tab-pane" id="description">

							<div class="text-content">

								<p>

									Beautiful green skirt featuring crossed fabric overlays at front and back. Zip/hook closure at side, fully lined. By Finders Keepers.

								</p>

								<br>

								<p>* Polyester/Elastane; Lining: Polyester</p>

								<p>* 26"/66 waist </p>

								<p>* 17.5"/44.5cm length </p>

								<p>* Model is wearing size small </p>

								<p>* Measurements taken from size small </p>

								<p>* Dry clean only</p>

								<p>* Imported </p>

								<p>* Can’t live without: Love</p>

								<p>* Tell us a secret: I never go anywhere in public without mascara.</p>

							</div>

					    </div>



					    <div class="tab-pane" id="information">

							<div class="text-content">

								<p>

									Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.

								</p>



								<br>



								<p>

									Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi maiestatis, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.

								</p>

								<br>

								<p>

									Eos cu utroque inermis invenire, eu pri alterum antiopam. Nisl erroribus definitiones nec an, ne mutat scripserit est. Eros veri ad pri. An soleat maluisset per. Has eu idque similique, et blandit scriptorem necessitatibus mea. Vis quaeque ocurreret ea.</p>

							</div>

					    </div>



					    <div class="tab-pane" id="customer">

							

							<div class="text-content">

								<p>

									Beautiful green skirt featuring crossed fabric overlays at front and back. Zip/hook closure at side, fully lined. By Finders Keepers.

								</p>

								<br>

								<p>* Polyester/Elastane; Lining: Polyester</p>

								<p>* 26"/66 waist </p>

								<p>* 17.5"/44.5cm length </p>

								<p>* Model is wearing size small </p>

								<p>* Measurements taken from size small </p>

								<p>* Dry clean only</p>

								<p>* Imported </p>

								<p>* Can’t live without: Love</p>

								<p>* Tell us a secret: I never go anywhere in public without mascara.</p>

							</div>



					    </div>



					    <div class="tab-pane" id="shipping">

						

							<div class="text-content">

								<p>

									Beautiful green skirt featuring crossed fabric overlays at front and back. Zip/hook closure at side, fully lined. By Finders Keepers.

								</p>

								<br>

								<p>* Polyester/Elastane; Lining: Polyester</p>

								<p>* 26"/66 waist </p>

								<p>* 17.5"/44.5cm length </p>

								<p>* Model is wearing size small </p>

								<p>* Measurements taken from size small </p>

								<p>* Dry clean only</p>

								<p>* Imported </p>

								<p>* Can’t live without: Love</p>

								<p>* Tell us a secret: I never go anywhere in public without mascara.</p>

							</div>



					    </div>



					    <div class="tab-pane" id="tags">

					    	

					    	<div class="text-content">

								<p>

									Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.

								</p>



								<br>



								<p>

									Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi maiestatis, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.

								</p>

								<br>

								<p>

									Eos cu utroque inermis invenire, eu pri alterum antiopam. Nisl erroribus definitiones nec an, ne mutat scripserit est. Eros veri ad pri. An soleat maluisset per. Has eu idque similique, et blandit scriptorem necessitatibus mea. Vis quaeque ocurreret ea.</p>

							</div>



					    </div>



					    <div class="tab-pane" id="custum">

					    	

					    	<div class="text-content">

								<p>

									Beautiful green skirt featuring crossed fabric overlays at front and back. Zip/hook closure at side, fully lined. By Finders Keepers.

								</p>

								<br>

								<p>* Polyester/Elastane; Lining: Polyester</p>

								<p>* 26"/66 waist </p>

								<p>* 17.5"/44.5cm length </p>

								<p>* Model is wearing size small </p>

								<p>* Measurements taken from size small </p>

								<p>* Dry clean only</p>

								<p>* Imported </p>

								<p>* Can’t live without: Love</p>

								<p>* Tell us a secret: I never go anywhere in public without mascara.</p>

							</div>



					    </div>



				  	</div>



				</div>



			</div>

		</section>

		<!-- END PRODUCT DETAIL -->

		

		<!-- PRODUCT RELATED -->

		<section class="product-related">

			<div class="container">



				<div class="heading _1 text-center">

					<h2 class="text-uppercase">Related Products</h2>

				</div>



				<div class="related-cn _1">

					<div class="row">



						<div id="related-slide" data-custom="0-1,480-2,768-2,992-3,1200-4">

								<?php for($i=0; $i<10; $i++){?>

							<!-- GRID ITEM -->

							<div class="grid-item _1 ">



								<div class="image">



									<a href="detal-1.html">

										<img src="images/product1.jpg" alt="">

									</a>



									<div class="action">



										<div class="group">



											<a href="#"><i class="fa fa-cart-plus"></i></a>



											<a href="#"><i class="fa fa-heart-o"></i></a>



											<a href="#"><i class="fa fa-refresh"></i></a>



											<a href="#"><i class="fa fa-eye"></i></a>

										</div>





									</div>

								</div>



								<div class="text">



									<h2 class="name">

										<a href="#">Sample Item Name</a>	

									</h2>	



									<div class="price-box"> 



		                              	<p class="special-price">

		                               		<span class="price">Rs. 1500</span> 

		                              	</p>   



		                          	</div>



								</div>



							</div>

							<!-- END GRID ITEM -->

							<? } ?>



						</div>



					</div>



				</div>



			</div>

		</section>

		<!-- END PRODUCT RELATED -->



		<!-- PARTNER -->

		<!-- END PARTNER -->

		

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

</body>




</html>