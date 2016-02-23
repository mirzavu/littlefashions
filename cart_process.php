<?php
session_start();
ob_start();
 include_once('includes/db.php');
 include_once('includes/functions.php');
if(isset($_REQUEST['setcart50']))
             {
             
	      $pda =$_REQUEST['productid'];
               $price=$_REQUEST['hidpricep'];
                $qunty=1;
               $avll=$_REQUEST['qty'];       
                $hidage=$_REQUEST['hidage'];
		addtocart($pda,1,$price,$hidage);

		  header("location:cart.php");

		exit();
                        

	 }
         ?>