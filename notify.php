<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {

	header("location: login.php");

	exit();

}
$user_id = $_SESSION['user_id'];
 
 $product_id = $_REQUEST['id'];
	$timezone = "Asia/Calcutta";
	date_default_timezone_set($timezone);
	$added = date("d-m-Y H:i:s");
	
 $result = mysql_query("INSERT INTO notify (product_id, user_id, added) VALUES ('$product_id', '$user_id', '$added')")
 or die(mysql_error()); 
 

 header("Location: index.php");
 exit();

?>