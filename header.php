

<div class="container">
				<div class="header-cn clearfix">
					<!-- END SEARCH -->

					<!-- LOGO -->
						<a href="index.php"><img src="images/littlefashionlogo1.png" alt=""></a>

					<!-- END LOGO -->
                    <div class="mini-cart ">
                        <!-- HEADER CART -->

					<!-- MINI CART -->
					<div class="mini-cart ">

						<!-- HEADER CART -->
						<div class="cart-head" id="cart-head" >
							<label>My cart <span><?=count($_SESSION['cart']);?></span></label>
							<p><span>Total:</span>
                                                            
                                                            Rs <span class="totlasds">
                                                            <?php
                       echo $totsess=$_SESSION['finalprice'];
                                                      if($totsess<=0)
                                                      {
                                                  $price=get_order_total();
                                                      }  
                                                      if($totsess>0)
                                                     
                                                      {
                                                     $price=  $_SESSION['finalprice'];
                                                      }

                                                            ?>
                                                            
                                                           </span> <small><?=count($_SESSION['cart']);?></small></p>
							<span class="cart-count">1</span>
						</div>
						<!-- END HEADER CART -->

						<!-- CART CONTENT -->
						<div class="cart-cn">
							<ul class="cart-list">
                                                            
                                                            <?php
                                                     $max=count($_SESSION['cart']);
						for($i=0;$i<$max;$i++)
                                                {
                                                
							 $product_id = $_SESSION['cart'][$i]['product_id'];
							$q = $_SESSION['cart'][$i]['qty'];
                                                        $prices=$_SESSION['cart'][$i]['ps'];
							
                                                            
                                                            ?>
                                                            
                                                            
                                                            <?php
$getgiftcoupon=mysql_fetch_array(mysql_query("select * from gift_coupon where gid='$product_id'"));
                                       echo     $giftids=$getgiftcoupon['gid'];
?>
								<li>
                                                                    
                                                                    <?php
                                               
                                                 if($product_id==$giftids)
                                                 {
                                                 ?>
                                                                                
                                        <img src="images/<?php echo 'giftcard1.png';?>" width="50" height="50" alt="">
                                                                 
                                                 <?php } else { ?>
                                                                    
									<a href="#" class="img">
                                                                            
                                                                            
										<img src="images/products/<?=get_product_image($product_id);?>" width="40" height="40" alt="">
									
                                                 
                                                                                
                                                                        
                                                                        </a>
                                                 <?php } ?>
									<div class="text">
										<div class="name">
											<a href="#">
                                                                           <?=get_product_name($product_id);?>
                                                                           
                                                                                            
                                                                                        
                                                                                        </a>
										</div>
										<span class="price">Rs.<?= $prices; ?>&nbsp;&nbsp;Qty:<?=$q;?></span>
									</div>
								</li>
                                                                
                                                                
                                                                
                                                              <?php
                                                              
                                                                }
                                                               ?>      
							</ul>
							<p class="cart-total">Total: <span>Rs <?php 
                                                        
                                                         if($totsess<=0)
                                                      {
                                                  echo $price=get_order_total();
                                                      }
                                                     if($totsess>0)
                                                      {
                                                   echo  $price=  $_SESSION['finalprice'];
                                                      }
                                                        
                                                       // echo $_SESSION['finalprice']; ?></span></p>
							<div class="cart-bt">
								<a href="cart.php" class="btn btn-13  text-uppercase">View Cart</a>
							</div>
						</div>
						<!-- END CART CONTENT -->
					</div>
                    </div>
					<!-- END MINI CART -->
                    <!-- SEARCH -->
                    <div class="search-h">
                        <form action='product_searchdetails.php' method="GET" >
                            <input type="search" id='rpoduct_name'  name='searchqry' class="icon-search" placeholder="Search For a Category, Brand Or Product">
                        </form>
                    </div>
					<!-- MENU BAR -->
					<div id="menu-bar" class="menu-bar ">
						<span class="one"></span>
						<span class="two"></span>
						<span class="three"></span>
					</div>
					<!-- END MENU BAR -->

					<div class="clear"></div>
					
					<!-- NAVIGATION -->
                    </div>
                    </div>






