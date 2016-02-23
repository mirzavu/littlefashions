<?php include_once('includes/db.php');?><?php include_once('includes/functions.php');	session_start();	$id = $_GET['id'];		?>        <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.1.min.js"></script>        <!-- Include Cloud Zoom CSS. -->        <link rel="stylesheet" type="text/css" href="zoom/css/cloudzoom.css" />        <!-- Include Cloud Zoom script. -->        <script type="text/javascript" src="zoom/js/cloudzoom.js?v=59"></script>        <!-- Call quick start function. -->        <script type="text/javascript">            CloudZoom.quickStart();        </script>            <!--        <script language="javascript">		function addtocart(pid){			document.form1.product_id.value=pid;			document.form1.command.value='add';			document.form1.submit();		}	</script>        <form name="form1">            <input type="hidden" name="product_id" />        <input type="hidden" name="command" />    </form>        --><div>	<div class="quick-view-cn">		<div class="row">						<?php                        $sql = mysql_query("select * from products where id = '$id' ");                        $row_products = mysql_fetch_array($sql);						$product_id = $row_products['product_id'];						$sql_images = mysql_query("select * from product_images where product_id = '$product_id' ");												$count = mysql_num_rows($sql_images);																		while($row_images = mysql_fetch_array($sql_images))						{							$images[] =  $row_images['image'];						}						$i=0;						if($i<=$count){						?>	                                        <form action="cart_process.php" method="post">                        <div class="col-sm-5">                        	<div class="col-md-12">                            <img id="zoom1" class = "cloudzoom" src = "images/products/<?=$images[$i]; ?> "                                 data-cloudzoom = "zoomImage: 'images/products/<?=$images[$i]; ?>'" width="300" height="363" />                                 <div style="margin-top:10px">                                                        <a class="thumb-link" href="images/products/<?=$images[$i]; ?>">                                            <img width="64" data-cloudzoom="                                             useZoom:'#zoom1',                                             image:'images/products/<?=$images[$i]; ?>',                                             zoomImage:'images/products/<?=$images[$i]; ?>'" alt="Cloud Zoom thumb image" title="Product Name" src="images/products/<?=$images[$i]; ?>" class="cloudzoom-gallery">                                    </a>                                     <? if(isset($images[$i+1])){?>                                    <a class="thumb-link" href="images/products/<?=$images[$i+1]; ?>">                                            <img width="64" data-cloudzoom="                                             useZoom:'#zoom1',                                             image:'images/products/<?=$images[$i+1]; ?>',                                             zoomImage:'images/products/<?=$images[$i+1]; ?>'" alt="Cloud Zoom thumb image" title="Product Name" src="images/products/<?=$images[$i+1]; ?>" class="cloudzoom-gallery">                                    </a>                                     <? } ?>                                    <? if(isset($images[$i+2])){?>                                    <a class="thumb-link" href="images/products/<?=$images[$i+2]; ?>">                                            <img width="64" data-cloudzoom="                                             useZoom:'#zoom1',                                             image:'images/products/<?=$images[$i+2]; ?>',                                             zoomImage:'images/products/<?=$images[$i+2]; ?>'" alt="Cloud Zoom thumb image" title="Product Name" src="images/products/<?=$images[$i+2]; ?>" class="cloudzoom-gallery">                                    </a>                                    <? } ?>                                    <? if(isset($images[$i+3])){?>                                    <a class="thumb-link" href="images/products/<?=$images[$i+3]; ?>">                                            <img width="64" data-cloudzoom="                                             useZoom:'#zoom1',                                             image:'images/products/<?=$images[$i+3]; ?>',                                             zoomImage:'images/products/<?=$images[$i+3]; ?>'" alt="Cloud Zoom thumb image" title="Product Name" src="images/products/<?=$images[$i+3]; ?>" class="cloudzoom-gallery">                                    </a>                    				<? }?>                                                                    </div>                            </div>                         </div>                                                                                                                                                                                           			<div class="col-sm-7">				<div class="portfolio-info">					<h2>Product  Information</h2>		



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
<span class="product_stock" style="color: #81ca33;font-style: italic;display: block;margin-top: 5px;">Available in stock</span>

							<?php
                                                      }
                                                        ?>
 








			<ul>						<li>							<span class="label-inf"><i class="fa fa-user"></i> Product Name:</span>							<p><a href=""><?=$row_products['product_name']; ?></a></p>						</li>						<li>							<span class="label-inf"><i class="fa fa-rupee"> </i>Price:</span>							<p>								<?php $list = explode(',',$row_products['price']);$price = $list[0];?>                            	<span class="price">Rs.</span> <span class="price" id="price"><? echo $price - (($price*$row_products['offerprice'])/100);?> </span>                                 <input type="hidden" id="hidprice" name='hidpricep' value="<? echo $price; //- (($price*$row_products['offerprice'])/100)?>">                                   <input type="hidden"  name='productid' value="<? echo $row_products['id'];?>">                                                                                                                                      </p>						</li>

						    <li>							<span class="label-inf"><i class="fa fa-file-text-o"></i> Brand:</span>							<p><?=get_brand_name($row_products['brand']); ?></p>						</li>	





 






					<li>							<span class="label-inf"><i class="fa fa-tag"></i> Age:</span>							<p>                            <div class="product-text">	                  			<fieldset class="attribute_fieldset"> 	                      				                      			<div class="attribute_list"> 	                      				<ul class="attribute_size">                                        	<?php 																							$list = explode(',',$row_products['age']);												$price_list = explode(',',$row_products['price']);												$count = count($list);																								for($i=0; $i<$count; $i++) 												{													$age = $list[$i];													$price = $price_list[$i];											?>													<li class="age_detail" style="background:#FCF3B6 none repeat scroll 0% 0%;height:10 !important;"><a id="<?=get_age1($age);?>" rel="<?=$age?>" class="agelink" style='color:#000000;'><?=get_age1($age);?></a></li>                                                                                                                                                    










 <script type="text/javascript">																										document.getElementById('<?=get_age1($age);?>').addEventListener('click', function() {													document.getElementById("price").innerHTML = "<? echo $price - (($price*$row_products['offerprice'])/100);?>";												        document.getElementById("hidprice").value = "<? echo $price;// - (($price*$row_products['offerprice'])/100);?>";}, false);																										</script>                                            <?												}												 											?>	











                      						                      				</ul>	                      			</div>	                  			</fieldset>								                      	</div>                                                        </p>						</li>	



<li>							<span class="label-inf"><i class="fa fa-file-text-o"></i> Product Description :</span>							<p><?=$row_products['description']; ?></p>						</li>	






										</ul>					<div class="portfolio-social">						Share on: 						



<?php

 $title =urlencode($row_products['product_name']);
$weburl =urlencode("https://$_SERVER[HTTP_HOST]".$_SERVER["REQUEST_URI"]);;
$summary =urlencode($row_products['description']);
$imageshare =urlencode($row_images['image']);

 ?>





<a onClick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>
&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $weburl; ?>
&amp;&p[images][0]=<?php $imageshare ; ?>','sharer', 'toolbar=0,status=0,width=548,height=325');"
target="_parent" href="javascript: void(0)" class="_1">




<i class="fa fa-facebook"></i>

</a>						

<a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,
resizable=yes,centerscreen =yes,scrollbars=yes,height=300,width=600,left=400,top=150');
return false;" href="https://twitter.com/share?text=<? echo $title; ?>
%0a&url=<? echo $weburl; ?>" class="_2">





<i class="fa fa-twitter"></i></a>						


<a href="https://plus.google.com/share?url={<? echo $weburl; ?>}" onclick="javascript:window.open(this.href,
'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">





<i class="fa fa-google-plus"></i></a>	




										</div>                   				</div>                                 <div class="clearfix"></div>                <div class="add-to-cart pull-right">    <br/>                <input type="hidden" id="hidage" name='hidage' value="<?=$list[0]; ?>" />                                 
<?php 
if($row_products['quantity'] > 0)
{
?>
<input type="submit" name="setcart50"  style="border: 1px solid #D76E01;background:#F67D00 none repeat scroll 0%;border-radius:10px; " class="btn btn-3 text-uppercase" value="Add To Cart"> 
<?php
}
?>



                               </div>			</div>                                                                                                                                                                </form>			<? }?>		</div>	</div></div>          <script>        $(document).ready(function(){                $('.agelink').click(function(){          var agelinkval=$(this).attr('rel');          $('#hidage').val(agelinkval);                });              });        </script>