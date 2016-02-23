<?php

include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: login.php");
	exit();
}
 $tnxids=$_GET['tnxids'];

  $uid = $_SESSION['user_id'];
 
  
  $getamount=  mysql_query("select * from orders where txnid='$tnxids'");
  $row=  mysql_fetch_assoc($getamount);
  
   $total=$row['amount'];
 //$amou=$_SESSION['amountrupees'];  
 
  
 
//echo "amount";
/*
 $remainamount=$_SESSION['remainamount'];
//echo "remain";
$coupid=$_SESSION['giftcardcoup'];
$coupamount=$_SESSION['amount'];

 $_SESSION['walletcash'];
 
 //$amou=$_SESSION['amountrupees'];  

//$remainamount=$_SESSION['remainamount'];
$coupid=$_SESSION['giftcardcoup'];
$coupamount=$_SESSION['amount'];

 $_SESSION['tot'];


  $metot=$_SESSION['tot'];
 */

        $sqlupdate=mysql_query("UPDATE orders SET `payment-mode` = 2 ,`delivery-status`='2',amount='$total',status='2' WHERE `txnid` ='$tnxids'"); 
                                                     "send remain to wallet";
                                                     
                                                     
                                                     
                                                     $qnty=mysql_query("select * from orders WHERE txnid='$tnxids'");
                                                     $qtrows=mysql_fetch_array($qnty);     
                                                     $quntys=$qtrows['pqunty'];


                       
 
                                                     $pro_info=$qtrows['productinfo'];
                                                     // for loyality cash **********
                                                   
                                                       //********** 
                                                     $quntity_list = explode(',',$quntys);
							$product_list = explode(',',$pro_info);
							$count25=count($quntity_list);
							
							for($i=0; $i<$count25; $i++) 
							{
								$quntity1 =$quntity_list[$i];
								$productl =$product_list[$i];
															
								
								// $sql_work = mysql_query("INSERT INTO work_details (user_id, current_industry, functional_area, role, company_name, company_designation, salary_lakhs, salary_thousands, from_month, from_year, to_month, to_year, added) VALUES ('$user_id', '$idustries', '$functionalities', '$roles', '$comapnies', '$designations', '$lakhss', '$thousandss', '$fms', '$fys', '$tms', '$tys', '$added')");
						
                                                           $sqlupdatedata=mysql_query("update products set quantity=quantity-$quntity1 where id='$productl' and quantity !='0' ")   ; 
                                                          
                                                           
                                                           
                                                           
                                                           
                                                        } 
                                                     
                                                     
                                                     
                                                     
                                                   
                                                    unset($_SESSION['cart']);
                                                   echo "<script>window.location='delvery.php?thnks=$tnxids';</script>";
                                                    
                                              
                                                
                                               
                                                    
                                                    
                                                    
                                                    
                                                    
                                               
                                   
?>