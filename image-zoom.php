
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Etalage demo</title>
		<link rel="stylesheet" href="zoom/css/demo.css">
		<link rel="stylesheet" href="zoom/css/etalage.css">
		<link rel="stylesheet" href="zoom/css/example2.css">
		<link rel="stylesheet" href="zoom/css/example3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="zoom/js/jquery.etalage.min.js"></script>
		<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

				$('#example2').etalage({
					thumb_image_width: 312,
					thumb_image_height: 234,
					source_image_width: 900,
					source_image_height: 675,
					zoom_area_height: 500,
					magnifier_invert: false,
					hide_cursor: true,
					icon_offset: 15,
					speed: 400
				});

				$('#example3').etalage({
					thumb_image_width: 250,
					thumb_image_height: 250,
					source_image_width: 900,
					source_image_height: 900,
					zoom_area_width: 500,
					zoom_area_height: 500,
					zoom_area_distance: 5,
					small_thumbs: 4,
					smallthumb_inactive_opacity: 0.3,
					smallthumbs_position: 'left',
					show_icon: false,
					autoplay: false,
					keyboard: false,
					zoom_easing: false
				});

				// This is for the dropdown list example:
				$('.dropdownlist').change(function(){
					etalage_show( $(this).find('option:selected').attr('class') );
				});

			});
		</script>
	</head>
	<body>
		<div id="examples">

			<ul id="etalage">
				<li>
					<a href="optionallink.html">
						<img class="etalage_thumb_image" src="images/products/2product1.jpg" />
						<img class="etalage_source_image" src="images/products/2product1.jpg" title="This is an optional description." />
					</a>
				</li>
				<li>
						<img class="etalage_thumb_image" src="images/products/5img-1.jpg" />
						<img class="etalage_source_image" src="images/products/5img-1.jpg" title="This is an optional description." />
				</li>
				<li>
						<img class="etalage_thumb_image" src="images/products/2product1.jpg" />
						<img class="etalage_source_image" src="images/products/2product1.jpg" title="This is an optional description." />
				</li>
				<li>
						<img class="etalage_thumb_image" src="images/products/2product1.jpg" />
						<img class="etalage_source_image" src="images/products/2product1.jpg" title="This is an optional description." />
				</li>
			</ul>

			<hr>

		</div>


	</body>
</html>