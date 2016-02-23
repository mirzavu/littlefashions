<?php
include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: login.php");
	exit();
}
 $tnxids=$_GET['txids'];
 $uid = $_SESSION['user_id'];
 
 $timezone = new DateTimeZone('Asia/Calcutta');
$datetime = new DateTime("now", $timezone);

// result: Thu Oct 24 2013 20:04:14 GMT+0530
$datetime= $datetime->format("d-m-Y H:i:s \G\M\TO");

 
 
 $sada=mysql_query("select * from  orders  where `txnid` ='$tnxids'");
 $sqlusus=mysql_fetch_array($sada);
 
               $getpriceall=$sqlusus['priceall'];

                                                                       $productidinfo=$sqlusus['productinfo'];
                                                                        
                                                                         $prdqunty=$sqlusus['pqunty'];
                                                                         $allsize=$sqlusus['dresssize'];
                                                                         $allprice=$sqlusus['priceall'];
                                                                         
                                                                         $getgitid=$sqlusus['gift_card_id'];


$getgiftids=  explode(',', $getgitid);


//************

$sql_datadats=mysql_query("SELECT  sum(loyalitycash) as sumlot FROM `products` WHERE id in ($productidinfo)");
                                                     $sql_loytss=mysql_fetch_array($sql_datadats);
                                                    $loylitysum11=$sql_loytss['sumlot']; 
                                                    echo $loylitysum11;
                                                     $updateloyalitycash1 = mysql_query("update wallet set  `loyality_cash`=loyality_cash-$loylitysum11,`temp`=temp-$loylitysum11 where user_id='$uid' ");

//**************
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
foreach ($getgiftids as $meuses)
{
    $updategiftcard=  mysql_query("update gift_coupon set status='0' where gid='$meuses'");
}
                                     


             
             $gerprices=  explode(',', $getpriceall);
               $ramountsvalue=array();
               foreach($gerprices as $full)
               {
                  $ramountsvalue[]=$full;
               }
                
                $ramount= array_sum($ramountsvalue);
               
          //   $ramount=$sqlusus['amount'];
           
            $name=$sqlusus['name'];
            $email=$sqlusus['email'];
            $status=$sqlusus['status'];
          
          
          $sqlupdatenum= mysql_num_rows($sada);
        if($sqlupdatenum > 0)
        {
            $sqlupdate=mysql_query("UPDATE orders SET `delivery-status` =3  WHERE `txnid` ='$tnxids'");
            
             $sel=  mysql_query("select * from wallet where user_id='$uid' ");
             $getwalletprice=  mysql_fetch_assoc($sel);
             

    //******************************************************************




                                                                    
                                                                        // print_r($prinfo2);
                                                                    
                                                                      
                                                        

											

												$productidinfo_list = explode(',',$productidinfo);
                                                                                                
                                                                                             
                                                                                                
                                                                                                
                                                                                                 $prdqunty_list=explode(",",$prdqunty);
                                                                                                 
                                                                                                $allsize_list=explode(",",$allsize);
                                                                                                
                                                                                                
                                                                                                  $allprice_list=explode(",",$allprice);
                                                                                                  
                                                                                                  
                                                                                                
                                                                                                //  print_r($allprice_list);

												  $count25 =count($productidinfo_list);
                                                                                                   
												
                                                                                               //echo"----------------------------";
                                                                                                 
												
                                                                                                            
                                              $sqls3="select * from products where  id in ($productidinfo) ";
                                                 
                                          
                                           
                                          $prdatasl=mysql_query($sqls3);                        
                                                                        
                                            $prslnum=mysql_num_rows($prdatasl);                       
                                                                        
                                                 if( $prslnum > 0)     
                                                 {
                                                  
                                                        
                                                        ?>
                                                        
                                                     
                                                              <?php
                                                                                            for($i=0; $i<$count25; $i++) 

												{

													  $productidinfo_listall =$productidinfo_list[$i];
                                                                                                      
													    $prdqunty_listall = $prdqunty_list[$i];
                                                                                                          
                                                                                                            $allsize_listall=$allsize_list[$i];
                                                                                                            $allprice_listall=$allprice_list[$i];
                                                                                                            
                                                                                                            
                                                             $sqlupdatedata=mysql_query("update products set quantity=quantity+$prdqunty_listall where id='$productidinfo_listall'")   ;                                                 
                                                              
                                                             
 // ****** notify                                                                                                           
                          
                                                // for checking qty zero or not
                                               
                                               $sql_qtynum=mysql_query("select * from products where id='$productidinfo_listall'");
                                               $sql_prdzero=mysql_fetch_array($sql_qtynum);
                                                    
                                               $orgqty=$sql_prdzero['quantity']-$prdqunty_listall;
                                               $pdt_mname=$sql_prdzero['product_name'];
                                               $prd_idss=$sql_prdzero['product_id'];     
                                             
                                              
                                                    $sql_ntfy=mysql_query("select * from notify where product_id='$prd_idss'");
                                                       
                                                  $notifynum=mysql_num_rows($sql_ntfy);
                                                    if($notifynum > 0)
                                                     {
                                                      while($notifyrows=mysql_fetch_array($sql_ntfy))
                                                      {
                                                        $user_id=$notifyrows['user_id'];
 
                                                         $sql_usedtl=mysql_query("select * from users where id='$user_id'");
                                                          $sqlu_num=mysql_num_rows( $sql_usedtl);

                                                if($sqlu_num > 0)
                                                 {
                                              
                                               $rows_users=mysql_fetch_array($sql_usedtl);
                                             $uemail=$rows_users['email'];
                                              $uname=ucfirst($rows_users['name']);

                                               $subject = "Your Favourite Product is now available @ littlefashions.in";
						$emailTo =$uemail;
						$emailfrom = "orders@littlefashions.in"; 
						$body = "Dear".$uname.",\n\nThe product  \r\r https://littlefashions.in/product-detail.php?id=".$productidinfo_listall ."\r\r".$pdt_mname."\r\r available Now .Happy shopping  \n\n Thanks Littlefashions ";
                                                
              
						
						$headers = 'From:Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;
				
						mail($emailTo, $subject, $body, $headers);
						$emailSent = true;
                                                
                                    
                                                 }

                                                      }
                                                     

                                                     }
                                                  

                                         }}


// *********** notify ********** end here














//***************************************************************************

$sel=  mysql_query("select * from orders where uid='$uid' and txnid='$tnxids'");
$getdata=  mysql_fetch_assoc($sel);
$phone=$getdata['phone'];
$emailuser=$getdata['email'];
$getname=$getdata['name'];
$order_id=$getdata['order_itemcode'];
                                         
                                         

               if($status=='1')
              {
               
                    $finalwalletamopunt=$getwalletprice['points']+$ramount;

                $sqlupdate=mysql_query("update wallet set `points`= '$finalwalletamopunt' ,`txid` ='$tnxids' where user_id='$uid'");
                
                $sel=  mysql_query("select * from wallet where user_id='$uid'  ");
                $getdata=  mysql_fetch_assoc($sel);
                $currentamount=$getdata['points'];
                $afterupdate=$currentamount+$ramount;
                
                $insert=  mysql_query("insert into wallet_history (wallet_cashbeforeupdate,wallet_txnid,user_id,wallet_cashafterupdate,date) values ('$currentamount','$tnxids','$uid','$afterupdate','$datetime')");
               
                if($insert)
                {
                    //echo "<script>alert('its came');</script>";
                }
              
               
                $udrtlrows=  mysql_fetch_array($sqlus);
                $subject = "Your Order canceled  in  littlefashions";
		 $emailTo =$emailuser;
                $name=$getname;
		$emailfrom = "info@littlefashions.in"; 
                $phone=$phone;
		$body = "Dear $getname, \n\nOrder Has Been Cancelled with Little Fashions for the  Order ID: $order_id. \n\n\n\nWith Regards,\nLittle Fashions.";
		$headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;

		
		
                
                $adminemail="admin@littlefashions.in"; 
                $adminsubject="canceled  Order";
                $bodyadmin = "Dear Admin, \n\n Mr/Miss".$getname." want to canceled  the   Orders ID : $order_id. \n\n\n\nWith Regards,\nLittle Fashions.";
                
                
                mail($emailTo, $subject, $body, $headers);
                
                mail($adminemail,$adminsubject,$bodyadmin, $headers);
                
		$emailSent = true;
                
                
                
                
                 /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="919908763343"; //enter Mobile numbers comma seperated
$message ="Hello,Admin"."Mr/Miss".$getname."want to canceled  the Orders ID :". $order_id."For More Details Check Your Orders Dashboard Account";; //enter Your Message
$senderid="LFSHNS"; //Your senderid
$messagetype="N"; //Type Of Your Message
$DReports="Y"; //Delivery Reports
$url="https://www.smscountry.com/SMSCwebservice_Bulk.aspx";
$message = urlencode($message);
$ch = curl_init();
if (!$ch){die("Couldn't initialize a cURL handle");}
$ret = curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch, CURLOPT_POSTFIELDS,
"User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype&DR=$DReports");
$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//If you are behind proxy then please uncomment below line and provide your proxy ip with port.
// $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
$curlresponse = curl_exec($ch); // execute
if(curl_errno($ch))
echo 'curl error : '. curl_error($ch);
if (empty($ret)) {
// some kind of an error happened
die(curl_error($ch));
curl_close($ch); // close cURL handler
} else {
$info = curl_getinfo($ch);
curl_close($ch); // close cURL handler

//echo $curlresponse; //echo "Message Sent Succesfully" ;
}
                
             


/*Code For Seller*/


/*Email Code for Seller and Customer*/

 $getproductid=$getdata['productinfo'];
       
       $getexplode=  explode(',', $getproductid);
       foreach($getexplode as $provalu)
       {
           $sel=  mysql_query("select * from products where id='$provalu'");
           while($getuploadeduser=  mysql_fetch_assoc($sel))
           {
               $uid= $getuploadeduser['uid'];
               
               
               
               $selectuser=  mysql_query("select * from user_registration where id='$uid'");
               while($getemail=  mysql_fetch_assoc($selectuser))
               {
                   $emailseller=$getemail['email'];
                   $mobseller=$getemail['mobile'];
                   $namesseller=$getemail['name'];
                  
                   
                   
                   /* Mail SCripting Starts*/
   
/*
   
//old code here ****************             
                   
                       $msg = "Hello,".$names."Your Product Is Sold with Order ID:".$order_itemcode."For More Details Check Your Dashboard Account";
								
							
	$request = "";
	$param["username"] = "littlefashions"; 
	$param["password"] = "228800"; 
	$param["from"] = "LTLFHN"; 
	$param["to"] = "91".$mob;
	$param["text"] = $msg;
	
	foreach($param as $key=>$val){
		$request.= $key."=".urlencode($val);
		$request.= "&";
	}
	
	$request = substr($request, 0, strlen($request)-1); 
	$url = "https://202.62.67.34/smpp.sms?".$request;
	$load = file_get_contents("https://202.62.67.34/smpp.sms?".$request);
        
 //****** old code end here       

*/



// ***********new code sms start here **************




//Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$mobseller; //enter Mobile numbers comma seperated
$message ="Hello,".$namesseller."Your Product Is Cancelled with Order ID:".$order_id."For More Details Check Your Dashboard Account";; //enter Your Message
$senderid="LFSHNS"; //Your senderid
$messagetype="N"; //Type Of Your Message
$DReports="Y"; //Delivery Reports
$url="https://www.smscountry.com/SMSCwebservice_Bulk.aspx";
$message = urlencode($message);
$ch = curl_init();
if (!$ch){die("Couldn't initialize a cURL handle");}
$ret = curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch, CURLOPT_POSTFIELDS,
"User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype&DR=$DReports");
$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//If you are behind proxy then please uncomment below line and provide your proxy ip with port.
// $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
$curlresponse = curl_exec($ch); // execute
if(curl_errno($ch))
echo 'curl error : '. curl_error($ch);
if (empty($ret)) {
// some kind of an error happened
die(curl_error($ch));
curl_close($ch); // close cURL handler
} else {
$info = curl_getinfo($ch);
curl_close($ch); // close cURL handler

//echo $curlresponse; //echo "Message Sent Succesfully" ;
}



/*Email Code*/


   //$name=$row_orders['name'];
     //   $txnidemail=$row_orders['txnid'];
        $subject = "Order Cancel Details";
		$emailTo = $emailseller;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $namesseller,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">Your Product Has Been Cancelled with Order ID:</font> <font style="color: Blue"> $order_id </font>. please Check Your Orders Dashboard For More Details \n<br><br/> <br><br/>Please Click This Link To See Your Product: https://littlefashions.in/product-detail.php?id=$provalu <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

<font style="color:darkorchid ">
         Like us on Facebook :  https://www.facebook.com/littlefashions.in?fref=ts <br><br/>       
         Follow us on Twitter : https://twitter.com/littlefashions4 <br><br/>         
        
                 <br><br/><br><br/>       
        Regards,<br><br/>
            
         Little Fashions Team \n https://www.littlefashions.in/ \n<br><br/>
                        </font>

         




                $theResults
EOD;
                
                $headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom."\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	





               }
           }
       }


/*Code For Seller*/









                
                
                
                 /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$phone; //enter Mobile numbers comma seperated
$message ="Order Canceled in  Little Fashions for the  Order ID:".$order_id;; //enter Your Message
$senderid="LFSHNS"; //Your senderid
$messagetype="N"; //Type Of Your Message
$DReports="Y"; //Delivery Reports
$url="https://www.smscountry.com/SMSCwebservice_Bulk.aspx";
$message = urlencode($message);
$ch = curl_init();
if (!$ch){die("Couldn't initialize a cURL handle");}
$ret = curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch, CURLOPT_POSTFIELDS,
"User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype&DR=$DReports");
$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//If you are behind proxy then please uncomment below line and provide your proxy ip with port.
// $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
$curlresponse = curl_exec($ch); // execute
if(curl_errno($ch))
echo 'curl error : '. curl_error($ch);
if (empty($ret)) {
// some kind of an error happened
die(curl_error($ch));
curl_close($ch); // close cURL handler
} else {
$info = curl_getinfo($ch);
curl_close($ch); // close cURL handler

//echo $curlresponse; //echo "Message Sent Succesfully" ;
}
                
                
                
		
	$msg = "Order Canceled in  Little Fashions for the  Order ID:".$tnxids;
								
							
	$request = "";
	$param["username"] = "littlefashions"; 
	$param["password"] = "228800"; 
	$param["from"] = "LTLFHN"; 
	$param["to"] = "91".$phone;
	$param["text"] = $msg;
	
	foreach($param as $key=>$val){
		$request.= $key."=".urlencode($val);
		$request.= "&";
	}
	
	$request = substr($request, 0, strlen($request)-1); 
	$url = "https://202.62.67.34/smpp.sms?".$request;
	$load = file_get_contents("https://202.62.67.34/smpp.sms?".$request);
            
             
             
             
             
            // header("location:order-cancel.php");
           echo "<script> window.location='order-cancel.php'; </script>";
             exit();
              }
             
        }



