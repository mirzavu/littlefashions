<?php
include_once('includes/db.php');
include_once('includes/functions.php'); 
session_start();

if(isset($_REQUEST['pincode'])){
	$pincode = $_REQUEST['pincode'];
	$result = mysql_query("select * from pincodes where pincode = '$pincode' and prepaid='Y' and cash='Y' and cod='Y'");
	$cnt = mysql_num_rows($result);
	echo "$cnt";
}

?>