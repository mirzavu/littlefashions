<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 
 $coupons = $_GET['val'];
 
 $sql_promo = mysql_query("select * from coupons where coupon = '$coupons' ");
 $row_promo = mysql_fetch_array($sql_promo);
 
 $percent = $row_promo['percentage'];
 
//echo $percent;
//echo json_encode(array("a" =>$row_promo['discount_method'], "b" => $row_promo['discount_amt'])); 

echo json_encode(array($row_promo['percentage']));

?>