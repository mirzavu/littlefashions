	<div class="col-md-3">
                                            
                          <form action="#" method="POST">                    
                                            
                                            <div style='border:1px solid #d3d3d3;'>
						<aside class="sidebar sidebar-cat _1"  >

							<h3 class="sidebar-title" style='border:1px solid #d3d3d3;'><span>Browse By:</span> <?php echo get_category_name($id);?></h3>

							<ul class="nav-cat " style="border-bottom:1px solid #000000;">
                                                              <?php
     $menusql= mysql_query("select * from menu where cat_id='$id' and subcat_name NOT IN('3','4','6') order by menu_name");
                                                                while($menurows=mysql_fetch_array($menusql))
                                                                {
                                                                    $menuid=$menurows['id'];
                                                                    $menupr=mysql_query("select count(*) as count from products where menu='$menuid' and category = '$id' ");
                                                                    $menupnum=mysql_fetch_assoc($menupr);
                                                                    
                                                                ?>
                            	                               <h4></h4>

								<li>

									<div class="check-box">

                                                                            <input type="checkbox" class="checkbox" id="cat-cat<?=$menurows['id'];?>" value="<?=$menurows['id'];?>" name="menuname[]">

										<label for="cat-cat<?=$menurows['id'];?>"><?=$menurows['menu_name'];?>  <span>(<?=$menupnum['count'];?>)</span></label>

									</div>

								</li>

								
                                                       <?php
                                                                }
                                                       ?>
							</ul>

						</aside>

						<!-- END SIDEBAR CATEGORIES -->

						

						<!-- SIDEBAR MANUFACTURE -->

						<aside class="sidebar sidebar-fac _1">

							<h2 class="sidebar-title"><span>By</span> Brands</h2>

							<ul class="nav-cat ">
                                                                <?php
                                                                $bsql= mysql_query("select * from brands order by brand_name");
                                                                while($brows=  mysql_fetch_array($bsql))
                                                                {
                                                                    $brid=$brows['id'];
                                                                    $bpr=mysql_query("select count(*) as count from products where brand='$brid' and category = '$id' ");
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

						<aside class="sidebar sidebar-color _1">

							<h2 class="sidebar-title"><span>By</span> Colors</h2>

							<ul class="nav-color"> 
                                                            <?php
                                                                $bsql= mysql_query("select * from colors order by color");
                                                                while($brows=  mysql_fetch_array($bsql))
                                                                {
                                                                    $brid=$brows['id'];
                                                                    $bpr=mysql_query("select count(*) as count from products where color='$brid' and category = '$id'");
                                                                    $pnum=mysql_fetch_assoc($bpr);
                                                                    
                                                                ?>
                                                                      <li style="disply:block;float:left">

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

						<!-- END SIDEBAR COLOR -->

						

						<!-- SIDEBAR SIZE -->

						<aside class="sidebar sidebar-size _1">

							<h2 class="sidebar-title"><span>By</span> Age</h2>

							<ul class="nav-cat ">
                                                                
							
                                                             <?php
                                                                $asql= mysql_query("select * from age order by age");
                                                                while($arows=  mysql_fetch_array($asql))
                                                                {
                                                                    $ageid=$arows['id'];
                                                                    $apr=mysql_query("select count(*) as count from products where age in ($ageid) and category = '$id' ");
                                                                    $anum=mysql_fetch_assoc($apr);
                                                                    
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

						

						<!-- SIDEBAR TAG -->

						<aside class="sidebar sidebar-tags  _1">

							<h2 class="sidebar-title"><span>Shop</span> For</h2>

							<ul class="nav-cat ">

								<li>
                                                                      <?php
                                                                       $gendun=mysql_query("select count(*) as count from products where gender='3' and category = '$id'");
                                                                    $uncount=mysql_fetch_assoc($gendun);
                                                                      ?>
									<div class="check-box">
                        
                                                                            <input type="checkbox" class="checkbox" name="pgend[]" id="sizeg-1" value="3">

										<label for="sizeg-1">Unisex<span>(<?=$uncount['count']?>)</span></label>

									</div>

								</li>

								<li>
                                                                    <?php
                                                                     $gendboy=mysql_query("select count(*) as count from products where gender='1' and category = '$id'");
                                                                    $boycount=mysql_fetch_assoc($gendboy);
                                                                      ?>

									<div class="check-box">

										<input type="checkbox" class="checkbox" name="pgend[]" id="sizeg-2" value="1">

										<label for="sizeg-2">Boy<span>(<?=$boycount['count'];?>)</span></label>

									</div>

								</li>

								<li>
                                                                    <?php
                                                                     $gendgl=mysql_query("select count(*) as count from products where gender='2' and category = '$id'");
                                                                    $glcount=mysql_fetch_assoc($gendgl);
                                                                      ?>
									<div class="check-box">
<input type="hidden" name="categoryids" value="<?=$id?>">
										<input type="checkbox" class="checkbox"  name="pgend[]" id="sizeg-3" value="2">

										<label for="sizeg-3">Girl<span>(<?=$glcount['count'];?>)</span></label>

									</div>

								</li>

                              </ul>  

						</aside>
                                                <form>
                    </div></div>
                                    
                                    