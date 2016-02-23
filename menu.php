                        <div class="header-cn clearfix">
						<nav class="navigation  main_navig" >
						<ul class="menu">
							<?php
                                $categories = mysql_query("select * from categories");
                                while($row_categories = mysql_fetch_array($categories))
                                { 
								$sub_id =$row_categories['id'];
                                                                $env_catid=$row_categories['id'];
							?>
							<li class="megamenu col-5 menu-parent">
								<a href="product-list.php?id=<?=$row_categories['id']; ?>"><?=$row_categories['category_name']?></a>
								<ul class="sub-menu bg-r">
									<?php
                                    $sub_categories = mysql_query("select * from sub_categories where cat_id = '$sub_id' ");
                                    while($row_sub_categories = mysql_fetch_array($sub_categories))
                                    {
										$menu_id =  $row_sub_categories['id'];
									?>
									<li>

                                                                            
                                                                              <?php
                                                                            if($menu_id=='30')
                                                                                {
                                                                              ?>
						<a href="giftcard.php"><?=$row_sub_categories['subcat_name']?></a>

                                                                                 <?php
                                                                                  }
                                                                                 else
                                                                                  {
                                                                                  ?>
                                                                              <a href="subcategory-productlist.php?subcatid=<?=$row_sub_categories['id']?>&catid=<?=$sub_id;?>"><?=$row_sub_categories['subcat_name']?></a>
										 <?php
                                                                                  }
                                                                                  ?>



<ul>
                                                                                    
											<?php
                                                                                        
                                                                                        
                                                                                        
                                            $menu = mysql_query("select * from products where category ='$sub_id' and subcategory ='$menu_id' group by menu");
                                            while($row_menu = mysql_fetch_array($menu))
                                            { ?>
                                                                                    
                                                <li><a href="item-list.php?menuid=<? echo $row_menu['menu'] ; ?>&catid=<?=$sub_id;?>"><?=get_menu_name($row_menu['menu'])?></a></li>
                                             <? } ?>       
                                                                                   
										</ul>
									</li>
                                                                        
                                                                      
                                                                        
                                                                        
                                    <? } ?>
                                                   <?php
                                                     if($env_catid !='5' && $env_catid !='6' &&  $env_catid !='7' && $env_catid !='8' &&  $env_catid !='9' &&  $env_catid !='10')
                                                     {
                                                     ?>  
                                                                        
                                                                        <li><a href="#"> Age </a>
                                    
                                        <ul>
                                            <?php 
                                             $asd=array();
                                             $menuqq = mysql_query("select * from products where category ='$sub_id' ");
                                             while ($agsd=  mysql_fetch_array($menuqq))
                                             {
                                                 // $arq=array_unique($agsd['age']);
                                               $allsize_list=explode(",",$agsd['age']); 
                                               $count=  count($agsd['age']);
                                              
                                            for($i=0; $i<$count; $i++) 

					     {
                                            $productidinfo_listall =$allsize_list[$i];
                                           $asd[]=$productidinfo_listall;
                                           
                                              }
                                            
                                               }
                                               $datss=array_unique($asd);
                                               foreach ($datss as $val)
                                               {
                                                   ?>
                                                   <li> <a href="item-list.php?ageid=<?=$val;?>&catid=<?=$sub_id;?>">
                                                   <?=get_age1($val);?> 
                                                       </a></li> 
                                                   <?
                                               }
                                              // print_r($$asd);
                                            ?>
                                        </ul>
                                    
                                                                              </li>
                                                 <?php
                                                     }
                                                 ?>
                                                                              
                                                           <?php
                                                     if($env_catid !='5' && $env_catid !='6' &&  $env_catid !='7' &&  $env_catid !='9' &&  $env_catid !='10')
                                                     {
                                                     ?>                    
                                                                              
                                                                       <li> <a href="#">Color  </a>
                                                                       
                                                                       
                                                                       <ul>
                                            <?php 
                                             $asdcolor=array();
                                             $casdd=$sub_id ;
                                             $menuqq = mysql_query("select color  from products where category ='$sub_id' ");
                                             while ($agsd=  mysql_fetch_array($menuqq))
                                             {
                                                 // $arq=array_unique($agsd['age']);
                                               $color_list=$agsd['color']; 
                                              
                                              
                                            
                                           $asdcolor[]=$color_list;
                                           
                                              }
                                            
                                               
                                               $colorss=array_unique($asdcolor);
                                               foreach ($colorss as $val)
                                               {
                                                   ?>
                                                   <li> <a href="item-list.php?colorid=<?=$val;?>&catid=<?=$sub_id;?>">
                                                   <?=get_color_name($val);?> 
                                                       </a></li> 
                                                   <?
                                               }
                                              // print_r($$asd);
                                            ?>
                                        </ul>
                                    
                                                                       
                                                                       
                                                                       
                                                                       
                                                                       
                                                                       
                                                                       </li>
                                                                       
                                                               <?php
                                                     } 
                                                               ?>
                                                     
                                                       <?php
                                                     if($env_catid !='9' &&  $env_catid !='10')
                                                     {
                                                     ?>                  
                                                  <li> <a href="#">Brand </a>
                                            
                                                                       
                                               <ul>
                                            <?php 
                                             $asdbrand=array();
                                             $menuqq = mysql_query("select brand  from products where category ='$env_catid' ");
                                             while ($agsd=  mysql_fetch_array($menuqq))
                                             {
                                                 // $arq=array_unique($agsd['age']);
                                               $brand_list=$agsd['brand']; 
                                              
                                              
                                            
                                           $asdbrand[]=$brand_list;
                                           
                                              }
                                            
                                               
                                                $asdbrandss=array_unique($asdbrand);
                                               foreach ($asdbrandss as $val)
                                               {
                                                   ?>
                                                                        <li> <a href="item-list.php?brandid=<?=$val;?>&catid=<?=$sub_id;?>">
                                                   <?=get_brand_name($val);?> 
                                                       </a></li> 
                                                   <?
                                               }
                                              // print_r($$asd);
                                            ?>
                                        </ul>    
                                       
                                                                       
                                           </li>
                                                                       
                                                 <?php
                                                     }
                                                 ?>
                                                                       
                                                                       
                                                                       
                                                     <?php
                                                     if($env_catid !='5' && $env_catid !='6' &&  $env_catid !='7' && $env_catid !='8' &&  $env_catid !='9' &&  $env_catid !='10')
                                                     {
                                                     ?>   
                                                                       
                                                                       
                                                                       
                                                                       <li> <a href="#">gender </a>
                                                                       
                                                                           <ul>
                                                                               <li>
                                                                                   <?php
                                                                                   $menuqq1 = mysql_query("select * from products where category ='$env_catid' and gender = '1'");
                                                                                
                                                                                   $sqlm1= mysql_num_rows($menuqq1) ;
                                                                                   
                                                                                   
                                                                                    $menuqq2 = mysql_query("select *  from products where category ='$env_catid' and gender = '2'");
                                                                                
                                                                                   $sqlm2= mysql_num_rows($menuqq2) ;
                                                                                   
                                                                                   
                                                                                   ?>
                                                                                   <?if($sqlm1 > 0){?>
                                                                                   <a href="item-list.php?genid=1&catid=<?=$env_catid;?>">boys</a>
                                                                                   <?}?>
                                                                                    <?if($sqlm2 > 0){?>
                                                                                   <a href="item-list.php?genid=2&catid=<?=$env_catid;?>">girl</a>
                                                                                    <?}?>
                                                                               </li>
                                                                           </ul>
                                                                       
                                                                       </li>
                                                                      <?php
                                                                        }
                                                                      ?>
								</ul>
							</li>
                                                                     

							<? } ?>
						</ul>
					</nav>
					<!-- END NAVIGATION -->
				</div>
				<!-- END HEADER CONTENT -->
