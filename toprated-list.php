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
					<li><span>Portfolio Showcase</span></li>
				</ul>

			</div>
		</section>
		<!-- END BREAKCRUMB -->
              
		<!-- portfolio -->
		<section class="portfolio _2">
			<div class="container">
				<div class="row">
				
                                    <?php
                                 include'toprated-aside.php';
                                    
                                    
                                    ?>
                                    
                                    
                                    
                                    
                                    
                                    
                    <div class="col-md-9" id='dataproduct_list'>
                        
                        
                        
                        
                  
					<div id="portfolio" class="portfolio-cn _1 clearfix"  data-theme="3">
						<?php
                                $sql = mysql_query("select * from products WHERE  toprated_type='10' and flag = '1'  ORDER BY id DESC  Limit 0,12 ");
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
                                                                $sqlps=$price;// - (($price*$row_products['offerprice'])/100);
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

					<div class="load-more-pf text-center text-uppercase">
						<a href="#" class="btn btn-9" >Load More</a>
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
        url: "topratedajxdtl.php",
        type: 'POST',
        data: form_data+'&lid='+spanValue+'&lid2='+spanValue2,
        success: function(data) {
            $('#dataproduct_list').html(data);
            //alert(data);
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
        url: "topratedajxdtl.php",
        type: 'POST',
        data: form_data+'&lid='+spanValue+'&lid2='+spanValue2,
        success: function(data) {
            $('#dataproduct_list').html(data);
            //alert(data);
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