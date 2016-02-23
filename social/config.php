<?php

$config =array(
		"base_url" => "https://littlefashions.in/social/auth/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "739377711754-btom5h50b0hf79qmvduvdocbhntsbaob.apps.googleusercontent.com", "secret" => "vN5UKVkWtBhIn2fc5SJc9USf" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "1035996793132799", "secret" => "a59ab2b60316ab85b09b8928880af59b" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "bq2ZVBH4b3PX2pmOdSQrS6TTc", "secret" => "OXppXfuabmBR7kKaPYQqmuHyDCPNGhdvudtOxX4nvRKzYKxFUR" ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
