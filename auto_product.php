<?php
include_once("includes/db.php");
include_once("includes/functions.php");

if($_GET['type'] == 'litprod'){

$result10="select product_name as product_type  from products  where product_name LIKE '".strtoupper($_GET['name_startsWith'])."%'";




$result20 = mysql_query($result10);	
	$data = array();
	while ($row = mysql_fetch_array($result20)) 
                {
		array_push($data, $row['product_type']);	
	       }	
	echo json_encode($data);
}

?>