<?php include_once('includes/db.php');?>
<?php include_once('includes/functions.php');
session_start();?>
<?php 
	$id = $_GET['id'];
?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.1.min.js"></script>

        <!-- Include Cloud Zoom CSS. -->
        <link rel="stylesheet" type="text/css" href="zoom/css/cloudzoom.css" />

        <!-- Include Cloud Zoom script. -->
        <script type="text/javascript" src="zoom/js/cloudzoom.js?v=59"></script>

        <!-- Call quick start function. -->
        <script type="text/javascript">
            CloudZoom.quickStart();
        </script>    
<div>
	<div class="quick-view-cn">
		<div class="row">
						<?php
                        $sql = mysql_query("select * from trending where id = '$id' ");
                        $row_products = mysql_fetch_array($sql);
						?>			
                        <div class="col-sm-5">
                        	<div class="col-md-12">
                            <img id="zoom1" class = "cloudzoom" src = "<?=$row_products['image']; ?> "
                                 data-cloudzoom = "zoomImage: '<?=$row_products['image']; ?>'" width="300" height="363" />
                                 <div style="margin-top:10px">
                    
                                    <a class="thumb-link" href="<?=$row_products['image']; ?>">    
                                        <img width="64" data-cloudzoom="
                                             useZoom:'#zoom1',
                                             image:'<?=$row_products['image']; ?>',
                                             zoomImage:'<?=$row_products['image']; ?>'" alt="Cloud Zoom thumb image" title="Product Name" src="<?=$row_products['image']; ?>" class="cloudzoom-gallery">
                                    </a>
                    
                                    <a class="thumb-link" href="<?=$row_products['image']; ?>">    
                                        <img width="64" data-cloudzoom="
                                             useZoom:'#zoom1',
                                             image:'<?=$row_products['image']; ?>',
                                             zoomImage:'<?=$row_products['image']; ?>'" alt="Cloud Zoom thumb image" title="Product Name" src="<?=$row_products['image']; ?>" class="cloudzoom-gallery">
                                    </a>
                     <a class="thumb-link" href="<?=$row_products['image']; ?>">    
                                        <img width="64" data-cloudzoom="
                                             useZoom:'#zoom1',
                                             image:'<?=$row_products['image']; ?>',
                                             zoomImage:'<?=$row_products['image']; ?>'" alt="Cloud Zoom thumb image" title="Product Name" src="<?=$row_products['image']; ?>" class="cloudzoom-gallery">
                                    </a>
                                </div>
                            </div>
                         </div>

			<div class="col-sm-7">
				<div class="portfolio-info">
					<h2>Product  Information</h2>
					<ul>
						<li>
							<span class="label-inf"><i class="fa fa-user"></i> Product Name:</span>
							<p><a href=""><?=$row_products['product_name']; ?></a></p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-rupee"> </i>Price:</span>
							<p><?=$row_products['price']; ?></p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-file-text-o"></i> Skills:</span>
							<p>HTML5 / CSS3 / PHP</p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-tag"></i> Tags:</span>
							<p>Creative, Mocup, Brading, Web</p>
						</li>
						<li>
							<span class="label-inf"><i class="fa fa-link"></i> Live Demo</span>
							<p><a href="">www.domainname.com</a></p>
						</li>
					</ul>
					<div class="portfolio-social">
						Share on: 
						<a href="#" class="_1"><i class="fa fa-facebook"></i></a>
						<a href="#" class="_2"><i class="fa fa-twitter"></i></a>
						<a href="#" class="_3"><i class="fa fa-youtube"></i></a>
						<a href="#" class="_4"><i class="fa fa-skype"></i></a>
						<a href="#" class="_5"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
