	<div class="col-md-3">
                                            
                          <form action="#" method="POST">                    
                                            
                                            
						

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
                                                                    $bpr=mysql_query("select count(*) as count from  products WHERE  toprated_type='10' and flag = '1' and  brand='$brid'");
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
                                                                    $bpr=mysql_query("select count(*) as count from  products WHERE  toprated_type='10' and flag = '1' and  color='$brid'");
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
                                                                    $apr=mysql_query("select count(*) as count from  products WHERE  toprated_type='10' and flag = '1' and age in ($ageid) ");
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
                                                                       $gendun=mysql_query("select count(*) as count from  products WHERE  toprated_type='10' and flag = '1' and gender='3' ");
                                                                    $uncount=mysql_fetch_assoc($gendun);
                                                                      ?>
									<div class="check-box">
                        
                                                                            <input type="checkbox" class="checkbox" name="pgend[]" id="sizeg-1" value="3">

										<label for="sizeg-1">Unisex<span>(<?=$uncount['count']?>)</span></label>

									</div>

								</li>

								<li>
                                                                    <?php
                                                                     $gendboy=mysql_query("select count(*) as count from  products WHERE  toprated_type='10' and flag = '1' and gender='1' ");
                                                                    $boycount=mysql_fetch_assoc($gendboy);
                                                                      ?>

									<div class="check-box">

										<input type="checkbox" class="checkbox" name="pgend[]" id="sizeg-2" value="1">

										<label for="sizeg-2">Boy<span>(<?=$boycount['count'];?>)</span></label>

									</div>

								</li>

								<li>
                                                                    <?php
                                                                     $gendgl=mysql_query("select count(*) as count from  products WHERE  toprated_type='10' and flag = '1' and gender='2' ");
                                                                    $glcount=mysql_fetch_assoc($gendgl);
                                                                      ?>
									<div class="check-box">

										<input type="checkbox" class="checkbox"  name="pgend[]" id="sizeg-3" value="2">

										<label for="sizeg-3">Girl<span>(<?=$glcount['count'];?>)</span></label>

									</div>

								</li>

                              </ul>  

						</aside>
                                                <form>
                    </div>
                                    
                                    