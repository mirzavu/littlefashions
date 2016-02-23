<!DOCTYPE html>
<html>
<head>
    	
	<link rel="stylesheet" href="css/library/colio.css">
	
		

</head>
<?php
@session_start();
include("includes/db.php");
include("includes/functions.php");
 @$pbrandname=($_POST['brandname']);
 @$prdctsize=sizeof($_POST['brandname']) ;

 $pricerange1=$_POST['lid'];

$pricerange2=$_POST['lid2'];
 if($prdctsize > 0)
 {
 $chkoid=@$pbrandname;
  $asd= implode(",",$chkoid);
 $sqlpart="and brand in ($asd)";
 }
 
 //for age ******************
 
 
 @$pbrandage=($_POST['proage']);
 @$prdctagesize=sizeof($_POST['proage']) ;
 
 if($prdctagesize > 0)
 {
 $chkoidage=$pbrandage;
  $asdage= implode(",",$chkoidage);
 $sqlpart.="and age in ($asdage)";
 }
 
 //for shop for ******************
 
 
 @$pgend=($_POST['pgend']);
 @$pgendsize=sizeof($_POST['pgend']) ;

 if($pgendsize > 0)
 {
 $chkoidgend=$pgend;
  $asdgend= implode(",",$chkoidgend);
 $sqlpart.="and gender in ($asdgend)";
 }
 

 
 
 @$pmenu=($_POST['menuname']);
 @$pmenusize=sizeof($_POST['menuname']) ;
 
 if($pmenusize> 0)
 {
 $chkoidmenu=$pmenu;
  $asdmenu= implode(",",$chkoidmenu);
 $sqlpart.="and menu in ($asdmenu)";
 }
 
 
 
 
 
 if($pricerange1!='' && $pricerange2!='')
 {
    $pricerange10=substr($pricerange1, 3);
    $pricerange20=substr($pricerange2, 3);
  $sqlpart.="and price > ($pricerange10)  AND  price < ($pricerange20)";    
     
 }
 
  @$pcolor=($_POST['colorname']);
 @$pcolorsize=sizeof($_POST['colorname']) ;
 
 if($pcolorsize> 0)
 {
 $chkoidcolor=@$pcolor;
  $asdcolor= implode(",",$chkoidcolor);
 $sqlpart.="and color in ($asdcolor)";
 }
 
?>
<div id="portfolio" class="portfolio-cn _1 clearfix"  data-theme="3">
    
    <div id='portfolio232' style="display:none;"></div>
						<?php
                                $sql2 = "select * from products WHERE  trending_type='11'  and flag ='1'".$sqlpart;
                                
                                $sql3="ORDER BY id "; 
                                $sql4=$sql2.$sql3 ;
                                        $sql=mysql_query($sql4);
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

									<a   href="product-description.php?id=<?=$row_products['id'];?>" class="quick-view portfolio-link prddesclink"><i class="fa fa-eye">Quick View</i></a>

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

                  <script>
                      $(document).ready(function(){
  $('.prddesclink').click(function(e){
      $('#portfolio232').show();
     e.preventDefault();
     
     $("#portfolio232").load($(this).attr('href'));
  });
});
                      
                      </script>