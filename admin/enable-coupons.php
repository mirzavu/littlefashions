<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 $id = $_GET['id'];
 
 
 
  
 $result = mysql_query("UPDATE coupons SET flag = '1' where id = '$id' ")
 or die(mysql_error()); 
 
 
 header("Location: view-coupons.php");
 exit();
 }
 else
 {
 header("Location: view-coupons.php");
 exit();
 }
 
?>