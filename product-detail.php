<?php 

	include_once('includes/db.php');

 	include_once('includes/functions.php');

	session_start();

	$id = $_GET['id'];

	

	 if(isset($_POST['setcart']))
             {

		$product_id =$_POST['product_id'];
                $qunty=$_POST['qty'];
                $avll=$_POST['qty'];
               
                $avlqtys=$_POST['avlqtys'];
                $price=$_POST['hidpricep'];
                $hidage=$_POST['hidage'];
                 if($avlqtys >= $qunty)
                 {   
		 addtocart($product_id,$qunty,$price,$hidage);

		  header("location:cart.php");

		exit();
                
                 }

	 }

	 

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

        

        <script language="javascript">
/*
		function addtocart(pid,q){
                      // myfunc();
			document.form1.product_id.value=pid;
                        
                        document.form1.q.value=q;
                        
			document.form1.command.value='add';
                       
			document.form1.submit();

		
                
                */

	</script>

</head>

<body>
<!--
<form name="form1">    

        <input type="hidden" name="product_id" />
          <input type="hidden" name="q" />
        <input type="hidden" name="command" />
      

    </form>

    -->

	<!-- LOADING 

	<div class="loading-container" id="loading">

		<div class="loading-inner">

			<span class="loading-1"></span>

			<span class="loading-2"></span>

			<span class="loading-3"></span>

		</div>

	</div>-->

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

				

			</div>

		</section>

		<!-- END BREAKCRUMB -->

		

		<!-- PRODUCT DETAIL -->

		<section class="product-detail _1 ">

			<div class="container">



				<div class="row">

						<?php

							$sql = mysql_query("select * from products where id = '$id' ");

							$row_products = mysql_fetch_array($sql);

							

							$product_id = $row_products['product_id'];

							$sql_images = mysql_query("select * from product_images where product_id = '$product_id' ");

							

							$count = mysql_num_rows($sql_images);

						

						

							while($row_images = mysql_fetch_array($sql_images))

							{

								$images[] =  $row_images['image'];

							}

							$i=0;

							

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
                                                       <?php
                                                      $notifyq=$row_products['quantity'];
                                                      if($notifyq==0)
                                                      {
                                                       ?>
                                        		<a href="notify.php?id=<?=$row_products['product_id'];?>" onclick="return confirm('Notify Added To Your Dashboard');">

                                                   NOTIFY ME

                                                </a> &nbsp&nbsp;<span style='color:red'>This product is currently out of stock </span>
                                                      <?php
                                                        }
                                                       ?>

							</div>
                                                   <?php
							
                                                     if($notifyq > 0)
                                                      {
                                                        
                                                     ?>
							<span class="product_stock">Available in stock</span>

							<?php
                                                      }
                                                        ?>




<form action="#" name="form1" method="POST">
							<div class="hr _1"></div>



							<div class="price-box col-lg-12"> 



	                          	<p class="special-price col-lg-3">

	                           		<? //$row_products['price']-(($row_products['price']*$row_products['offerprice'])/100); ?>

                                    <?php 

											

										$list = explode(',',$row_products['price']);

										

										

										

											$price = $list[0];

									?>

											<span class="price"><i class="fa fa-inr"></i>
&nbsp;<? echo $price - (($price*$row_products['offerprice'])/100) ."<p class='price-list-strike'>".$price ."</p>";?> 




</span>
                                                                                        <input type="hidden" id="hidprice" name='hidpricep' value="<? echo $price; //- (($price*$row_products['offerprice'])/100)?>">
                                                                                  
									
                                                                                            
                                                                                            <?

										

										 

									?>

	                          	</p> 

	                          	<p class="col-lg-3"> 

	                            	<a href="#" class="btn btn-13"><?=$row_products['offerprice']."% OFF";?></a>

	                          	</p>     



	                      	</div>

							<br>

	                      	


	                      	<div class="hr _1"></div>



	                      	<div id="attribute" class="attribute clearfix">



	                      		<fieldset class="attribute_fieldset"> 

	                      			<label class="attribute_label">Color:</label>

	                      			<div class="attribute_list"> 

	                      				<ul>

                                                            <li class="active" style="background:<?=get_color_name($row_products['color']); ?>;width:20px;height:20px;border-botto:1px solid #ffffff"> &nbsp; <!-- <?=get_color_name($row_products['color']); ?> --></li>

	                      				</ul>

	                      			</div>

	                  			</fieldset>

								<div class="clearfix"></div>

	                  			<fieldset class="attribute_fieldset"> 

	                      			<label class="attribute_label">Age:</label>

	                      			<div class="attribute_list"> 

	                      				<ul class="attribute_size">

                                        	<?php 

											

												$list = explode(',',$row_products['age']);

												$price_list = explode(',',$row_products['price']);

												$count = count($list);

												

												for($i=0; $i<$count; $i++) 

												{

													$age = $list[$i];

													$price = $price_list[$i];

											?>

													<li><a id="<?=get_age1($age);?>" rel="<?=$age?>" class="agelink"><?=get_age1($age);?></a></li>

                                                    

                                                                                                       <script type="text/javascript">

													

													document.getElementById('<?=get_age1($age);?>').addEventListener('click', function() {
                                                                                                        
													document.getElementById("price").innerHTML = "<? echo $price;// - (($price*$row_products['offerprice'])/100);?>";
                                                                                                        document.getElementById("hidprice").value = "<? echo $price; //- (($price*$row_products['offerprice'])/100);?>";
                                                                                                        
    
    
    
													}, false);

													

													</script>

                                            <?

												}

												 

											?>

	                      					

	                      				</ul>

	                      			</div>

	                  			</fieldset>



	                      	</div>



	                      	<div class="add-to-box clearfix">



	                      		<div class="input-content">


                                                           
					                <label for="qty">QTY:</label>

                                                        <input type="hidden" name="product_id" value="<?=$row_products['id']?>"/>
                                                      
                                                           <input type="hidden" id="hidage" name='hidage' value="<?=$list[0]; ?>" />

									<div class="qty-box">

						        		<button class="qty-decrease" id="qty-plus"></button>



						        		<input type="text" name="qty" id="qty"   maxlength="12" value="1" title="Qty" class="input-text qty" />

                                                                        <input type="hidden" name="avlqtys" value="<?=$row_products['quantity']?>" id="avlqnty">

						        		<button class="qty-increase" id="qty-minus"></button>



					        		</div>



				                </div>

                                                 <?php
                                             if($notifyq > 0)
                                                 {
                                                 ?>

				                <div class="add-to-cart">

                                                    <input  type="submit"   id="addcartsb"  name="setcart" class="btn btn-3 text-uppercase" value="Add To Cart">

				                </div>
                                                <?php
                                                 }
                                                 ?>
                                          </form>


				                <div class="add-to-user">

				                	<a href="wishlist-details.php?wlist=<?=$row_products['id']?>" class="btn btn-13"><i class="fa fa-heart-o"></i> <span>Add to WishList</span></a>

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

									<?=$row_products['description']; ?>

								</p>

							</div>

					    </div>



					    <div class="tab-pane" id="information">

							<div class="text-content">

								<p>

									<?=$row_products['brandinf']; ?>

								</p>



								

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

                                                           <?php
                                                           $sqla=mysql_query("select * from products where flag='1' order by id  limit 0,30");
                                                           while($row_products=mysql_fetch_array($sqla)) 
                                                             {  

                                                           $product_id =$row_products['product_id'];

				$sql_images = mysql_query("select * from product_images where product_id = '$product_id' ");

							

							$count = mysql_num_rows($sql_images); 
                                                            $sql_img=mysql_fetch_array($sql_images);
                                                           ?>  

								

							<!-- GRID ITEM -->

							<div class="grid-item _1 ">



								<div class="image">



									<a href="product-detail.php?id=<?=$row_products['id'];?>">

										<img src="images/products/<?=$sql_img['image'];?>" alt="">

									</a>

                                                                     <div class="action">



										<div class="group">



											


											<a href="product-detail.php?id=<?=$row_products['id'];?>"><i class="fa fa-eye"></i></a>

										</div>





									</div>

								</div>



								<div class="text">



									<h2 class="name">

										<a href="product-detail.php?id=<?=$row_products['id'];?>"><?=$row_products['product_name'];?></a>	

									</h2>	






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
        <script>
         function assudha()
         {
             var jobValue = document.getElementById('#avlqnty').value
             alert(jobValue);
           
                          return false ;

         }
                </script>
         <script>
        $(document).ready(function(){
 $('#addcartsb').click(function(e) 
              {
            
               
           var avls=$('#avlqnty').val();
           var entrqnty=$("#qty").val();
             
           if(Math.abs(avls) < Math.abs(entrqnty))
           {
               
            alert("Only "+avls+" available pieces available");
            //$("#qty").val(avls);
            ('#addcartsb').unbind('click.addtocart');
           e.preventDefault();
        }
       
      
        });
        
       
        
       $("#qty-plus").click(function() {
       var avls=$('#avlqnty').val();
           var entrqnty=$("#qty").val();
             
           if(Math.abs(avls) < Math.abs(entrqnty))
           {
               
            alert("Only "+avls+" Pisces available ");
            //$("#qty").val(avls);
            
            return false ;
        }
      
      
       });
       
      
      $('.agelink').click(function(){
          var agelinkval=$(this).attr('rel');
          $('#hidage').val(agelinkval);
          
      });
      
        });
        </script>
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <script src="js/auto-product.js"></script>
</body>



</html>