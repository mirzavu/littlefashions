<?php
ini_set('display_errors','E_ALL & ~E_NOTICE');
 // Database Variables (edit with your own server information)
 $server = 'localhost';
 $user = 'root';
 $pass = '';
 $db = 'littlefashiondb';
 
 // Connect to Database
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());


?>