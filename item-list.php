<?
	include("includes/db.php");
	include("includes/functions.php");
	session_start();
        $id = $_GET['id'];
        
	if($_REQUEST['command'] == 'add'  && $_REQUEST['product_id']>0 ){
		$product_id = $_REQUEST['product_id'];
                $product_ps=$_REQUEST['product_ps'];
		addtocart($product_id,1,$product_ps);
		
		header("location:cart.php");
		exit();
	 }
         
         $catidmain=$_GET['catid'];
        
        $menuid=$_GET['menuid'];
         $menu180=$_GET['menuid'];
         $ageid25=$_GET['ageid'];
        
         $colorid=$_GET['colorid'];
        
         $brandid=$_GET['brandid'];
        $genid=$_GET['genid'];
      
        
         
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
	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
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
               <script language="javascript">
                   
		function addtocart(pid,ps){
			document.form1.product_id.value=pid;
                        document.form1.product_ps.value=ps;
			document.form1.command.value='add';
			document.form1.submit();
		}
                
	</script>
</head>
<body>
    
<form name="form1">    
        <input type="hidden" name="product_id" />
          <input type="hidden" name="product_ps" />
        <input type="hidden" name="command" />
    </form>
    
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
					
				</ul>

			</div>
		</section>
		<!-- END BREAKCRUMB -->
                <form action="#" method="POST">
		<!-- portfolio -->
		<section class="portfolio _2">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
                                            
                                            <?php
                                            if($_GET['menuid'] !='')
                                             {
                                            ?>
                                           <input type="hidden" class="checkbox" id="menuidss" value="<?=$_GET['menuid'];?>" name="menuname[]">
                                            <?php
                                             }
                                            ?>

                                              <?php
                                            if($_GET['colorid'] !='')
                                             {
                                            ?>
                                       <input type="hidden" class="checkbox" id="mfsfs" value="<?=$_GET['colorid'];?>" name="colorname[]">
                                            <?php
                                             }
                                            ?>

                                          <?php
                                            if($_GET['genid'] !='')
                                             {
                                            ?>
                                       <input type="hidden" class="checkbox" id="menufsdfsidss" value="<?=$_GET['genid'];?>" name="pgend[]">
                                            <?php
                                             }
                                            ?>
                                           <?php
                                            if($_GET['ageid'] !='')
                                             {
                                            ?>
                                      <input type="hidden" class="checkbox" id="menuifsdfsdss" value="<?=$_GET['ageid'];?>" name="proage[]">

                                            <?php
                                             }
                                            ?>











                                          
                                            
					    <input type="hidden" class="checkbox" id="menuidss" value="<?=$_GET['catid'];?>" name="categoryids">




						<!-- END SIDEBAR CATEGORIES -->

						

						<!-- SIDEBAR MANUFACTURE -->
                                             <?php 
                                            if($brandid=='')
                                               
                                                 {
                                                ?> 
						<aside class="sidebar sidebar-fac _1">

							<h2 class="sidebar-title"><span>By</span> Brands</h2>

							<ul class="nav-cat ">
                                                                <?php
                                                                $bsql= mysql_query("select * from brands order by brand_name");
                                                                while($brows=  mysql_fetch_array($bsql))
                                                                {

                                                            $brid=$brows['id'];
                                                          
                                                             $menu180=$_GET['menuid'];
                                                             $ageid25=$_GET['ageid'];
        
                                                            $colorid=$_GET['colorid'];
        
                                                          
                                                           $genid=$_GET['genid'];
                                                           

   

                               if($menuid !='')
                              {
                              
                          
                             $bpr=mysql_query("select count(*) as count from products where brand='$brid' and category='$catidmain' and menu='$menuid' ");
                              
                              }

                            if($colorid !='') 
                              {

                            $bpr=mysql_query("select count(*) as count from products where brand='$brid' and category='$catidmain' and color='$colorid' ");
                              }                                   

                               if($ageid25 !='') 
                              {

                            $bpr=mysql_query("select count(*) as count from products where brand='$brid' and category='$catidmain' and age in ($ageid25)");

                              } 

                             if($genid !='') 
                              {

                            $bpr=mysql_query("select count(*) as count from products where brand='$brid' and category='$catidmain' and gender='$genid'");

                              } 




  $pnum=mysql_fetch_assoc($bpr);
                                                                    
                                                                ?>
								<li>

									<div class="check-box">

                                                                            <input type="checkbox" class="checkbox" id="factoryb-<?=$brid?>" name="brandname[]" value="<?=$brid?>">

										<label for="factoryb-<?=$brid?>"><?=$brows['brand_name'];?><span>(<?=$pnum['count'];?>)</span></label>

									</div>

								</li>

								<?php
                                                                }
                                                                ?>

							</ul>
							</ul>

						</aside>
                                            <?php
                                              }
                                            ?>
						<!-- END SIDEBAR MANUFACTURE -->

						

						<!-- SIDEBAR SLIDER -->

						<aside class="sidebar sidebar-slider  _1">

							<h2 class="sidebar-title"><span>By</span> Prices</h2>

							<div class="slider">

								<div id="slider"></div>

								<div class="slider-g">

									<span class="price-value" id="price-f"></span>
                                                                        
									<span class="price-value" id="price-t"></span>

                                                                        <button class="btn-filter" id="prdfilbtn">Filter</button>

								</div>

							</div>

						</aside>

						<!-- END SIDEBAR SLIDER -->

						

						<!-- SIDEBAR COLOR -->
                                                  <?php
                          
                                                   if($_GET['colorid']=='')
                                                    {
                                                  ?>
						<aside class="sidebar sidebar-color _1">

							<h2 class="sidebar-title"><span>By</span> Colors</h2>

							<ul class="nav-color"> 
                                                            <?php
                                                                $bsql= mysql_query("select * from colors order by color");
                                                               





                                                             while($brows=  mysql_fetch_array($bsql))
                                                                {
                                                                    $brid=$brows['id'];



                                                                  
                                                     
                                                          
                                                             $menu180=$_GET['menuid'];
                                                             $ageid25=$_GET['ageid'];
        
                                                            $colorid=$_GET['colorid'];
        
                                                          
                                                           $genid=$_GET['genid'];            
                               $brandid=$_GET['brandid'];
                                      
                              if($brandid !='')
                              {
                              
                          
                             $bpr=mysql_query("select count(*) as count from products where brand='$brandid' and category='$catidmain' and color='$brid' ");
                              
                              }         
                                    
                              if($menuid !='')
                              {
                              
                          
                             $bpr=mysql_query("select count(*) as count from products where color='$brid' and category='$catidmain' and menu='$menuid' ");
                              
                              }

                            if($colorid !='') 
                              {

                            $bpr=mysql_query("select count(*) as count from products where color='$brid' and category='$catidmain' and color='$colorid' ");
                              }                                   

                               if($ageid25 !='') 
                              {

                            $bpr=mysql_query("select count(*) as count from products where color='$brid' and category='$catidmain' and age in ($ageid25)");

                              } 

                             if($genid !='') 
                              {

                            $bpr=mysql_query("select count(*) as count from products where color='$brid' and category='$catidmain' and gender='$genid'");

                              }   










                                                                 $pnum=mysql_fetch_assoc($bpr);
                                                                    
                                                                ?>
                                                                      <li>

									<div class="check-box" >

                                                                            <input type="checkbox" class="checkbox" id="fsizeacol-<?=$brid?>" name="colorname[]" value="<?=$brid?>">

										<label for="fsizeacol-<?=$brid?>"><a style="background-color:<?=$brows['color'];?>"></a><span >(<?=$pnum['count'];?>)</span></label>

									</div>

								</li>
                                                            <?php
                                                                }
                                                            ?>

							</ul>

						</aside>

                                            <?php
                                             }
                                            ?>

						<!-- END SIDEBAR COLOR -->

						

						<!-- SIDEBAR SIZE -->
                                               
                                              <?php
                                             if($_GET['ageid']=='')
                                               {
                                              ?>
						<aside class="sidebar sidebar-size _1">

							<h2 class="sidebar-title"><span>By</span> Age</h2>

							<ul class="nav-cat ">
                                                                
							
                                                             <?php
                                                                $asql= mysql_query("select * from age order by age");
                                                                while($arows=  mysql_fetch_array($asql))
                                                                {
                                                               $ageid=$arows['id'];
                                                                  
                                                              $brid=$brows['id'];
                                                          
                                                             $menu180=$_GET['menuid'];
                                                             $ageid25=$_GET['ageid'];
        
                                                            $colorid=$_GET['colorid'];
        
                                                          
                                                            $genid=$_GET['genid'];

                        $brandid=$_GET['brandid'];
                                      
                              if($brandid !='')
                              {
                              
                          
                          $bpr=mysql_query("select count(*) as count from products where brand='$brandid' and category='$catidmain' and age in ($ageid) ");
                              
                              }  

 
                        if($menuid !='')
                              {
                              
                          
                             $bpr=mysql_query("select count(*) as count from products where age in ($ageid) and category='$catidmain' and menu='$menuid' ");
                              
                              }

                            if($colorid !='') 
                              {

                            $bpr=mysql_query("select count(*) as count from products where age in ($ageid) and category='$catidmain' and color='$colorid' ");
                              }                                   

                               if($ageid25 !='') 
                              {

                            $bpr=mysql_query("select count(*) as count from products where age in ($ageid) and category='$catidmain' and age in ($ageid25)");

                              } 

                             if($genid !='') 
                              {

                            $bpr=mysql_query("select count(*) as count from products where age in ($ageid) and category='$catidmain' and gender='$genid'");

                              }   








                                           $anum=mysql_fetch_assoc($bpr);
                                                                    
                                                                ?>
                                                            
                                                            
                                                            <li>

									<div class="check-box">

                                                                            <input type="checkbox" class="checkbox" id="sizea-<?=$ageid?>" name="proage[]" value="<?=$ageid?>">

										<label for="sizea-<?=$ageid?>"><?=$arows['age'];?><span>(<?=$anum['count']?>)</span></label>

									</div>

								</li>

								<?php
                                                                }
                                                                ?>

							</ul>

						</aside>
                                      
						<!-- END SIDEBAR SIZE -->
                                                 <?php
                                                   }
                                                  ?>
						
                                                  <?php
                                                   if($_GET['genid']=='')
                                                      {
                                                  ?>
						<!-- SIDEBAR TAG -->

						<aside class="sidebar sidebar-tags  _1">

							<h2 class="sidebar-title"><span>Shop</span> For</h2>

							<ul class="nav-cat ">

								<li>
                                                                      <?php
                                                                                               
                                $ageid=$arows['id'];
                                                                  
                                $brid=$brows['id'];
                                                          
                               $menu180=$_GET['menuid'];
                              $ageid25=$_GET['ageid'];
        
                             $colorid=$_GET['colorid'];
        
                                                          
                            $genid=$_GET['genid'];

                           $brandid=$_GET['brandid'];
                                      
                              if($brandid !='')
                              {
                              
                          
                         $gendun=mysql_query("select count(*) as count from products where brand='$brandid' and category='$catidmain' and gender='3'");
                              
                              } 
                           if($menuid !='')
                              {
                              
                          
                             $gendun=mysql_query("select count(*) as count from products where gender='3' and category='$catidmain' and menu='$menuid' ");
                              
                              }

                            if($colorid !='') 
                              {

                           $gendun=mysql_query("select count(*) as count from products where gender='3' and category='$catidmain' and color='$colorid' ");
                              }                                   

                               if($ageid25 !='') 
                              {

                           $gendun=mysql_query("select count(*) as count from products where gender='3' and category='$catidmain' and age in ($ageid25)");

                              } 

                             if($genid !='') 
                              {

                           $gendun=mysql_query("select count(*) as count from products where gender='3' and category='$catidmain' and gender='$genid'");

                              }   






                                                                   $uncount=mysql_fetch_assoc($gendun);
                                                                      ?>
									<div class="check-box">
                        
                                                                            <input type="checkbox" class="checkbox" name="pgend[]" id="sizeg-1" value="3">

										<label for="sizeg-1">Unisex<span>(<?=$uncount['count']?>)</span></label>

									</div>

								</li>

								<li>
                                                                    <?php







 $ageid=$arows['id'];
                                                                  
                                $brid=$brows['id'];
                                                          
                               $menu180=$_GET['menuid'];
                              $ageid25=$_GET['ageid'];
        
                             $colorid=$_GET['colorid'];
        
                                                          
                            $genid=$_GET['genid'];
                          
                            $brandid=$_GET['brandid'];
                                      
                              if($brandid !='')
                              {
                              
                          
                         $gendboy=mysql_query("select count(*) as count from products where brand='$brandid' and category='$catidmain' and gender='1'");
                              
                              } 

                           if($menuid !='')
                              {
                              
                          
                             $gendboy=mysql_query("select count(*) as count from products where gender='1' and category='$catidmain' and menu='$menuid' ");
                              
                              }

                            if($colorid !='') 
                              {

                           $gendboy=mysql_query("select count(*) as count from products where gender='1' and category='$catidmain' and color='$colorid' ");
                              }                                   

                               if($ageid25 !='') 
                              {

                            $gendboy=mysql_query("select count(*) as count from products where gender='1' and category='$catidmain' and age in ($ageid25)");

                              } 

                             if($genid !='') 
                              {

                            $gendboy=mysql_query("select count(*) as count from products where gender='1' and category='$catidmain' and gender='$genid'");

                              }   



                                                             $boycount=mysql_fetch_assoc($gendboy);
                                                                      ?>

									<div class="check-box">

										<input type="checkbox" class="checkbox" name="pgend[]" id="sizeg-2" value="1">

										<label for="sizeg-2">Boy<span>(<?=$boycount['count'];?>)</span></label>

									</div>

								</li>

								<li>
                                                                    <?php
                                                                    


                                                               $ageid=$arows['id'];
                                                                  
                                $brid=$brows['id'];
                                                          
                               $menu180=$_GET['menuid'];
                              $ageid25=$_GET['ageid'];
        
                             $colorid=$_GET['colorid'];
        
                                                          
                            $genid=$_GET['genid'];

                          
                           $brandid=$_GET['brandid'];
                                      
                              if($brandid !='')
                              {
                              
                          
                         $gendboy=mysql_query("select count(*) as count from products where brand='$brandid' and category='$catidmain' and gender='2'");
                              
                              } 
                           if($menuid !='')
                              {
                              
                          
                             $gendgl=mysql_query("select count(*) as count from products where gender='2' and category='$catidmain' and menu='$menuid' ");
                              
                              }

                            if($colorid !='') 
                              {

                           $gendgl=mysql_query("select count(*) as count from products where gender='2' and category='$catidmain' and color='$colorid' ");
                              }                                   

                               if($ageid25 !='') 
                              {

                            $gendgl=mysql_query("select count(*) as count from products where gender='2' and category='$catidmain' and age in ($ageid25)");

                              } 

                             if($genid !='') 
                              {

                            $gendgl=mysql_query("select count(*) as count from products where gender='2' and category='$catidmain' and gender='$genid'");

                              }   





                                                                    $glcount=mysql_fetch_assoc($gendgl);
                                                                      ?>
									<div class="check-box">

										<input type="checkbox" class="checkbox"  name="pgend[]" id="sizeg-3" value="2">

										<label for="sizeg-3">Girl<span>(<?=$glcount['count'];?>)</span></label>

									</div>

								</li>

                              </ul>  

						</aside>
                                              <?php
                                               }
                                              ?>  

                                         
                                                <form>
                    </div>
                    <div class="col-md-9" id='dataproduct_list'>
                        
                        
                        
                        
                  
					<div id="portfolio" class="portfolio-cn _1 clearfix"  data-theme="3">
						<?php
                                                
                                if($catidmain !='' && $menu180 !='' )
                                                             
                                {    
                                  // echo $menu180 ; 
                                $sql =mysql_query("select * from products WHERE category ='$catidmain' and menu ='$menu180' and flag = '1'  ORDER BY id DESC  Limit 0,12 ");
                               
                      $sql_num=mysql_num_rows($sql);

                                }
                                 if($catidmain !='' && $ageid25 !='' )
                                                             
                                {       
                                     
				
                                     
                                     $sql = mysql_query("SELECT *
FROM products
WHERE category = '$catidmain'
AND age
IN ( $ageid25 )
AND flag = '1'
ORDER BY id DESC
LIMIT 0 , 12");
                               
                                }
                                
                                 if($catidmain !='' && $colorid !='' )
                                                             
                                {            
                                $sql = mysql_query("select * from products WHERE category = '$catidmain'  and color = '$colorid' and flag = '1'  ORDER BY id DESC  Limit 0,12 ");
                               
                                }
                                
                                 if($catidmain !='' && $brandid !='' )
                                                             
                                {            
                                $sql = mysql_query("select * from products WHERE category = '$catidmain'  and brand = '$brandid' and flag = '1'  ORDER BY id DESC  Limit 0,12 ");
                               
                                }
                                
                                if($catidmain !='' && $genid !='' )
                                                             
                                {       
                                  
                                    
                                $sql = mysql_query("select * from products WHERE category = '$catidmain'  and gender = '$genid' and flag = '1'  ORDER BY id DESC  Limit 0,12 ");
                               
                                }
                                
                                
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
		                                  	          <? 
                                                                $sqlps=$price; //- (($price*$row_products['offerprice'])/100);
                                                              //  echo $sqlps ;
                                                                ?>
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

					<div class="load-more-pf text-center text-uppercase" style='display:none;'>
						<a href="#" class="btn btn-9">Load More</a>
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
        <script type="text/javascript">

      
        $(document).ready(function(){

            $('input[type="checkbox"]').click(function(){
              
       var form_data = $('form').serialize();
        form_data['ajax'] = 1 ;
        spanValue  =$('#price-f').text() ;
         spanValue2  =$('#price-t').text();
    $.ajax({
        url: "item-ajaxlist.php",
        type: 'POST',
        data: form_data+'&lid='+spanValue+'&lid2='+spanValue2,
        success: function(data) {
            $('#dataproduct_list').html(data);
           // alert(data);
        }
    });

    

               

            });
            
    $('#prdfilbtn').click(function()
       {
          
         var form_data = $('form').serialize();
        form_data['ajax'] = 1 ;
        spanValue  =$('#price-f').text() ;
         spanValue2  =$('#price-t').text();
    $.ajax({
        url: "item-ajaxlist.php",
        type: 'POST',
        data: form_data+'&lid='+spanValue+'&lid2='+spanValue2,
        success: function(data) {
            $('#dataproduct_list').html(data);
          
        }
    });
  
          return false ; 
           
       });
            
            
        
});

        

    </script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <script src="js/auto-product.js"></script>
</body>
</html>