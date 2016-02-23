<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();


 ?>
			<div class="container">

				<div class="heading _1 text-center">
					<h2 class="text-uppercase">Our Brands</h2>
				</div>

				<div style="margin-top:20px;">
                    <marquee direction="left" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 6, 0);">
                        <div>
							<?php
                                $brands = mysql_query("select * from brands WHERE flag = '1' and image !=''");
                           
                                while($row_brands = mysql_fetch_array($brands))
                                { 
                                    
                                    //echo row_brands['image'];
                                    ?>
                            
                            
                            <a href="brand-list.php?brid=<?=$row_brands['id'];?>" style="padding:8px;">
                                    <img src="<?=$row_brands['image'];?>" alt="" width="75px" height="75px">
                                </a>
							<? } ?>
                        </div>
                    </marquee>
				</div>

			</div>
