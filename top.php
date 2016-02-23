 
<?php
/*  ************* Code for cutoff price  */
    $sel=  mysql_query("select * from cutoff_priceshipping");
    $get_cutoff= mysql_fetch_array($sel);
    $cutoff_pricing=$get_cutoff['cutoff_price'];
    
     /*  ************* Code for cutoff price  Ends */
    
    ?>
    
<ul class="menu">
							<li><a href="#"><i class="fa fa-truck"></i>Free Shipping above Rs. <?php echo $cutoff_pricing; ?><abbr>*</abbr></a></li>
							<li><a href="#"><i class="fa fa-rupee"></i>Cash on Delivery<abbr>*</abbr></a></li>
							<li><a href="#"><i class="fa fa-refresh"></i>Easy Returns</a></li>
                            <?php if(isset($_SESSION['loggedin'])){?>
                                 <li class="pull-right"><a href="dashboard.php"><i class="fa fa-user"></i>Welcome &nbsp;<?=$_SESSION['username'] ;?></a></li>    
                                 <li class="pull-right"><a href="dashboard.php"><i class="fa fa-user"></i>MyAccount</a></li>
                                <? }else{?>
                               <li class="pull-right"><a href="login.php"><i class="fa fa-user"></i>Login</a></li>
                           <? }?>
							
							<li class="pull-right"><a href="contact-us.php"><i class="fa fa-phone"></i>Contact Us</a></li>
							<li class="pull-right"><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
						</ul>
