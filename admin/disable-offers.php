<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 $id = $_GET['id'];
 
 
 
  
 $result = mysql_query("UPDATE offers SET flag = '0' where id = '$id' ")
 or die(mysql_error()); 
 
 
 header("Location: view-offers.php");
 exit();
 }
 else
 {
 header("Location: view-offers.php");
 exit();
 }
 
?>