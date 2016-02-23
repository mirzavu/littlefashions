<?php 
   @session_start();
   include_once("includes/db.php");
   include_once("includes/functions.php");
   //adding to cart
   if($_REQUEST['command'] == 'add'  && $_REQUEST['product_id']>0 ){
   $product_id = $_REQUEST['product_id'];
   $product_ps=$_REQUEST['product_ps'];
   $product_age=$_REQUEST['product_age'];
   addtocart($product_id,1,$product_ps,$product_age);
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
      <title>Little Fashion : Fashion Redefined</title>
      <link rel="shortcut icon" href="images/littlefashionlogo1.png" type="image/png">
      <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/library/font-awesome.min.css">
      <link rel="stylesheet" href="css/library/font-awesome.css">
      <link rel="stylesheet" href="css/library/bootstrap.min1.css">
      <link rel="stylesheet" href="css/library/owl.carousel.css">
      <link rel="stylesheet" href="css/library/jquery-ui.min.css">
      <link rel="stylesheet" href="css/library/jquery.fancybox.css">
      <!-- MAIN STYLE -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
      <link rel="stylesheet" href="css/color-pink.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>
      <link href="caurosel/custom.css" rel="stylesheet">
      <!-- Owl Carousel Assets -->
      <link href="caurosel/owl.carousel.css" rel="stylesheet">
      <link href="caurosel/owl.theme.css" rel="stylesheet">
      <!-- Prettify -->
      <link href="caurosel/prettify.css" rel="stylesheet">
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
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
      <?php include_once('includes/analytics.php');?>
      <script language="javascript">
         function addtocart(pid,ps,age)
         {
         document.form1.product_id.value=pid;
         document.form1.product_ps.value=ps;
         document.form1.product_age.value=age;
         document.form1.command.value='add';
         document.form1.submit();
         }
      </script>
   </head>
   <body>
      <div class='compare_container row' style="display:none;"></div>
      <form name="form1">
         <input type="hidden" name="product_id" />
         <input type="hidden" name="product_ps" />
         <input type="hidden" name="product_age" />
         <input type="hidden" name="command" />
      </form>
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
         <!-- END HEADER -->
         <!-- SLIDER -->
         <section class="slide-watch">
            <div class="slide-watch-cn" id="slide-watch">
               <?php
               
                  $sql_banners = mysql_query("select * from banners WHERE flag = '1' Limit 0,5");
                  while($row_banners = mysql_fetch_array($sql_banners))
                  {
                  ?>
               <!-- SLIDE ITEM -->
               <div class="item">
                  <a href="banner-pdlist.php?bannerid=<?=$row_banners['id'];?>">
                  <img src="<?=$row_banners['image'];?>" alt="">
                  </a>
               </div>
               <? } ?>
               <!-- SLIDE ITEM -->
            </div>
         </section>
         <!-- END SLIDER -->
         <!-- HOME SHIPPING -->
         <section class="shipping-top" style="margin-top:50px;">
            <div id="demo">
               <div class="container">
                  <div class="row">
                     <div class="span12">
                        <div id="owl-demo" class="owl-carousel">
                           <?php
                              $sql_offers = mysql_query("select * from offers WHERE flag = '1'");
                              while($row_offers = mysql_fetch_array($sql_offers))
                              {
                              ?>
                           <a href="offer-list.php?offerid=<?=$row_offers['id'];?>">
                              <div class="item"><img src="<?=$row_offers['image'];?>"></div>
                           </a>
                           <? } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- END HOME SHIPPING -->
         <!-- NEW ARRIVALS -->
         <section class="new-arrivals _3">
            <div class="container">
               <div class="heading _1 text-center">
                  <h2 class="text-uppercase">New Arrivals</h2>
               </div>
               <div class="new-arrivals-cn _3">
                  <div class="row">
                     <?php
                        $sql_products = mysql_query("select * from products WHERE flag = '1'  and product_type='1'  ORDER BY id DESC limit 0,6");
                        while($row_products = mysql_fetch_array($sql_products))
                        {
                        $product_id = $row_products['product_id'];
                        $sql_images = mysql_query("select * from product_images WHERE product_id = '$product_id'");
                        $row_images = mysql_fetch_array($sql_images);
                        ?>
                     <div class="col-xs-6 col-md-4 col-lg-2">
                        <!-- GRID ITEM -->
                        <div class="grid-item _3 ">
                           <div class="image">
                              <a href="product-detail.php?id=<?=$row_products['id'];?>">
                              <img src="images/products/<?=$row_images['image'];?>"  alt="" style="height:206px !important;">
                              </a>
                              <div class="rating-view">
                                 <div class="view-r">
                                    <a href="product-detail.php?id=<?=$row_products['id'];?>" class="btn btn-16"><i class="fa fa-eye"></i>Quick View</a>
                                 </div>
                              </div>
                           </div>
                           <div class="text">
                              <h2 class="name">
                                 <a href="product-detail.php?id=<?=$row_products['id'];?>"><?=$row_products['product_name'];?></a>
                              </h2>
                              <div class="price-box">
                                 <?php $list = explode(',',$row_products['price']);$price = $list[0];?>
                                 <p class="special-price">
                                    <span class="price">Rs.<? echo $price - (($price*$row_products['offerprice'])/100);?></span>
                                    <?
                                       $totqut=$row_products['quantity'];
                                       // $sqlps=$price - (($price*$row_products['offerprice'])/100);
                                       $sqlps=$price;
                                       //  $sqlps for price to addcatr and pfirstage for size
                                       $pfirstage= $row_products['age'][0];
                                       ?>
                                 </p>
                                 <p class="old-price">
                                    <span class="price">Rs. <? echo  $price; ?></span>
                                 </p>
                              </div>
                              <div class="action">
                                 <a href="wishlist-details.php?wlist=<?=$row_products['id']?>" class="btn btn-12 round" title="add to wishlist"><i class="fa fa-heart-o"></i></a>
                                 <?php
                                    if($totqut > 0 )
                                    {
                                    ?>
                                 <a href="#" class="btn btn-16 add-cart text-uppercase" onclick="addtocart(<?=$row_products['id']?>,<?=$sqlps?>,<?=$pfirstage?>)" title="add to cart"><i class="fa fa-cart-plus"></i> </a>
                                 <?php
                                    }
                                    ?>
                                 <a href="#" class="btn btn-12 round adcm" title="compare" rel="<?=$row_products['id']?>"><i class="fa fa-refresh"></i></a>
                              </div>
                           </div>
                        </div>
                        <!-- END GRID ITEM -->
                     </div>
                     <? } ?>
                  </div>
               </div>
            </div>
         </section>
         <!-- END TOP PRODUCT -->
         <div class="heading _1 text-center margin_t_15">
            <h2 class="text-uppercase">Collections</h2>
         </div>
         <?php
            $sql_collections = mysql_query("select * from collections WHERE Flag = '1' and type = '1' ORDER BY id DESC");
            $row_collections = mysql_fetch_array($sql_collections)
            ?>		<!-- BANNER -->
         <section class="banner">
            <div class="container">
               <div class="row" style="background:#fff !important;">
                  <div class="col-xs-6 col-md-4">
                     <div class="banner-item">
                        <a href="collections-list.php?id=<?=$row_collections['id'];?>"><img src="<?=$row_collections['image'];?>" alt=""></a>
                     </div>
                  </div>
                  <?php
                     $sql_collections1 = mysql_query("select * from collections WHERE Flag = '1' and type = '2' ORDER BY id DESC");
                     $row_collections1 = mysql_fetch_array($sql_collections1)
                     ?>
                  <div class="col-xs-6 col-md-4">
                     <div class="banner-item">
                        <a href="collections-list.php?id=<?=$row_collections1['id'];?>"><img src="<?=$row_collections1['image'];?>" alt=""></a>
                     </div>
                  </div>
                  <?php
                     $sql_collections2 = mysql_query("select * from collections WHERE Flag = '1' and type = '3' ORDER BY id DESC");
                     $row_collections2 = mysql_fetch_array($sql_collections2)
                     ?>
                  <div class="col-xs-6 col-md-4">
                     <div class="banner-item">
                        <a href="collections-list.php?id=<?=$row_collections2['id'];?>"><img src="<?=$row_collections2['image'];?>" alt=""></a>
                     </div>
                  </div>
                  <?php
                     $sql_collections3 = mysql_query("select * from collections WHERE Flag = '1' and type = '4' ORDER BY id DESC");
                     $row_collections3 = mysql_fetch_array($sql_collections3)
                     ?>
                  <div class="col-xs-12 col-md-8">
                     <div class="banner-item">
                        <a href="collections-list.php?id=<?=$row_collections3['id'];?>"><img src="<?=$row_collections3['image'];?>" alt=""></a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- BANNER -->
         <!-- TRENDING TOPRATED ACCESSORIES -->
         <section class="trending-toprated">
            <div class="container">
               <div class="row">
                  <!-- TRENDING -->
                  <div class="col-sm-6 col-lg-4">
                     <div class="trend-rated-cn">
                        <div class="title-trend-rated">
                           <h2>Trending</h2>
                           <a href="trending-list.php">
                              <p>The Latest Trending 2015</p>
                           </a>
                        </div>
                        <div id="tranding">
                           <?php
                              $sql_trending = mysql_query("select * from products WHERE flag = '1'  and trending_type !=''  ORDER BY id DESC limit 0,6");
                              while($row_trending = mysql_fetch_array($sql_trending))
                              {
                              $product_id =$row_trending['product_id'];
                              $sql_images = mysql_query("select * from product_images WHERE product_id = '$product_id'");
                              $row_images =mysql_fetch_array($sql_images);
                              ?>
                           <div class="group">
                              <!-- ITEM -->
                              <div class="trend-rated-item ">
                                 <div class="img">
                                    <a href="trending-list.php?id=<?=$row_trending['id'];?>"><img src="images/products/<?=$row_images['image'];?>" alt="" width="120" height="120"></a>
                                 </div>
                                 <div class="text text-right">
                                    <h2><a href="trending-list.php?id=<?=$row_trending['id'];?>"><?=$row_trending['product_name'];?></a></h2>
                                    <div class="price-box">
                                       <p>
                                          <b style="font-size:16px;"><i class="fa fa-inr"></i>
                                          :<span class="price"><?=$row_trending['offerprice'];?></span><span class="price old-price"><?="Rs.".$row_trending['price'];?></span></b>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <!-- END ITEM -->
                           </div>
                           <!-- END GROUP -->
                           <? } ?>
                        </div>
                     </div>
                  </div>
                  <!-- END TRENDING -->
                  <!-- TOP RATED -->
                  <div class="col-sm-6 col-lg-4">
                     <div class="trend-rated-cn">
                        <div class="title-trend-rated">
                           <h2>Top Rated</h2>
                           <a href="toprated-list.php">
                              <p>These Products are Highest Rated</p>
                           </a>
                        </div>
                        <div id="top-rated">
                           <?php
                              $sql_toprated = mysql_query("select * from products WHERE  Flag = '1' and toprated_type !=''  ORDER BY id DESC");
                              while($row_toprated = mysql_fetch_array($sql_toprated))
                              {
                              $product_id =$row_toprated['product_id'];
                              $sql_images = mysql_query("select * from product_images WHERE product_id = '$product_id' Limit 0,2 ");
                              $row_images =mysql_fetch_array($sql_images);
                              $row_images['image'];
                              ?>
                           <div class="group">
                              <!-- ITEM -->
                              <div class="trend-rated-item ">
                                 <div class="img">
                                    <a href="toprated-list.php?id=<?=$row_toprated['id'];?>"><img src="images/products/<?= $row_images['image'];?>" alt="" width="120" height="120"></a>
                                 </div>
                                 <div class="text text-right">
                                    <h2><a href="toprated-list.php?id=<?=$row_toprated['id'];?>"><?=$row_toprated['product_name'];?></a></h2>
                                    <div class="price-box">
                                       <p>
                                          <b style="font-size:16px;"><i class="fa fa-inr"></i>
                                          :<span class="price"><?=$row_toprated['offerprice'];?></span>&nbsp; <span class="price old-price" ><?="Rs.".$row_toprated['price'];?></span></b>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <!-- END ITEM -->
                           </div>
                           <!-- END GROUP -->
                           <? } ?>
                        </div>
                     </div>
                  </div>
                  <!-- END TOP RATED -->
                  <!-- ACCESSORIES -->
                  <div class="col-lg-4 col-sm-6 ">
                     <div class="accessories" id="accessories">
                        <!-- ITEM -->
                        <div class="accessories-item">
                           <img src="images/circle4.png" alt="">
                           <div class="text">
                              <p><span class="kid1">wanna become </span><br><span class="kid2">a littlefashioner</span><br>
                                 <span class="kid3">like me</span>
                              </p>
                              <div><a href="know-more.php" class="btn btn-10">Know More</a></div>
                           </div>
                        </div>
                        <!-- END ITEM -->
                     </div>
                  </div>
                  <!-- END ACCESSORIES -->
               </div>
            </div>
         </section>
         <!-- END TRENDING TOPRATED ACCESSORIES -->
         <!-- PARTNER -->
         <section class="partner partner-list">
            <?php include_once('partners.php');?>
         </section>
         <!-- END PARTNER -->
         <section class="shipping-top">
            <div class="container">
               <div class="row">
                  <div class="col-xs-4">
                     <div class="item">
                        <div class="img">
                           <img src="images/10off3.png" alt="" />
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-4">
                     <div class="item">
                        <div class="img">
                           <img src="images/10opayment1.png" alt="" />
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-4">
                     <div class="item">
                        <div class="img">
                           <img src="images/100satisfation.png" alt="" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- FOOTER -->
         <footer class="dark">
            <?php include_once('footer.php');?>
         </footer>
         <!-- END FOOTER -->
         <!-- SCROLL TOP -->
         <div id="scroll-top" class="_1">Scroll Top</div>
         <!-- END SCROLL TOP -->
      </div>
      <script src="caurosel/jquery-1.9.1.min.js"></script>
      <script src="caurosel/owl.carousel.js"></script>
      <!-- Demo -->
      <script>
         $(document).ready(function() {
         $("#owl-demo").owlCarousel({
         autoPlay: 3000,
         items : 6,
         itemsDesktop : [1199,3],
         itemsDesktopSmall : [979,3]
         });
         });
      </script>
      <script src="caurosel/bootstrap-collapse.js"></script>
      <script src="caurosel/bootstrap-transition.js"></script>
      <script src="caurosel/bootstrap-tab.js"></script>
      <script src="caurosel/prettify.js"></script>
      <script src="caurosel/application.js"></script>
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
      <!--
         script for add to compare start
         -->
      <script type="text/javascript">
         $(document).ready(function(){
         x = [];
         $('.adcm').click(function(){
         var y=$(this).attr('rel');
         x.push($.trim(y))
         //  alert(x);
         $.ajax({
         type: "POST",
         data: {x:x},
         url: "compare_ajax.php",
         success: function(data) {
         $('.compare_container').show();
         $('.compare_container').html(data);
         }
         });
         return false;
         });
         });
      </script>
      <!--
         add cmp end here *********
         -->
      <style>
         .compare_container
         {
         border:1px solid #d3d3d3;
         background-color: #d3d3d3;
         position: fixed;
         left: 150px;
         z-index: 1000;
         width:400px;
         margin-top:25px;
         }
      </style>
      <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="js/auto-product.js"></script>
   </body>
</html>