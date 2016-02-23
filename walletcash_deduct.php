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
 

 $amou=$_SESSION['amountrupees'];  
//echo "amount";

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
 
 $sqlwalt=mysql_query("SELECT * FROM wallet WHERE `user_id` ='$uid'");
                                        
                                    $row2 =mysql_fetch_assoc($sqlwalt); 
                                          
                                    $sumwallet =$row2['points']; 
                                  $loyalitycash=$row2['loyality_cash'];
                                   $temploysh=$row2['temp'];
                                 // $loyalitycash23=$temploysh+$loyalitycash;
                                    $sum520=$sumwallet;
                                    $sum5201=$sum520+$loyalitycash;
                                    if($sum5201 >= 0)
                                    {
                                                if($metot<=$sum5201)
                                                {
                                                  
                                                    
                                                    
                                                    $amounttowallet=$sum520-$metot;
                                                    $loyality=0;
                                                    
                                              
                                                   
                  
       

 $sqlupdate=mysql_query("UPDATE orders SET `payment-mode` = 3 ,`delivery-status`='2',amount='$metot',status='1',gift_couponcode='$coupid',giftcard_amount='$coupamount'  WHERE `txnid` ='$tnxids'"); 



//**************quantity start****************  





                                                   $qnty=mysql_query("select * from orders WHERE txnid='$tnxids'");
                                                     $qtrows=mysql_fetch_array($qnty);     
                                                     $quntys=$qtrows['pqunty'];
                                                     $order_itemcode=$qtrows['order_itemcode'];

                       
 
                                                     $pro_info=$qtrows['productinfo'];
                                                     
                                                     //***** sum of clcash from txnid 
                                                      $prdata21 =mysql_query("select SUM(loyalitycash) as sumall from products where id in ($pro_info)");
                                                      $loyalitycasht1=mysql_fetch_array($prdata21) ;
                                                     echo  $loyalitycashttmp=$loyalitycasht1['sumall'] ;
                                                     
                                                    // echo "<script>alert($loyalitycashttmp)</script>";
                                                     //*******
                                                  
                                                 $update=  mysql_query("update wallet set points='$amounttowallet',txid='$tnxids',loyality_cash='0',temp=temp+$loyalitycashttmp where user_id='$uid'");
 
                                                         $quntity_list = explode(',',$quntys);
							$product_list = explode(',',$pro_info);
							$count25=count($quntity_list);
							
							for($i=0; $i<$count25; $i++) 
							{
								$quntity1 =$quntity_list[$i];
								$productl =$product_list[$i];
															
								
								
						
                                                           $sqlupdatedata=mysql_query("update products set quantity=quantity-$quntity1 where id='$productl' and quantity !='0' ")   ; 
                                                                
                                                        }






 
 $txnid=$txids;
$selorders=  mysql_query("select * from orders WHERE `txnid` ='$txnid' and `status` ='1' and `delivery-status` = '2'");
$getrow=  mysql_fetch_assoc($selorders);


  $giftcardid= $getrow['gift_card_id'];
 
 $getbuyeremail=$getrow['email'];
 $getmob=$getrow['phone'];
  $getbuyername=$getrow['name'];
  
  $getserialid=$getrow['order_itemcode'];

$row=  mysql_num_rows($selorders);



//$get $_SESSION['finalidgidt'];

if($row!=0)
{
//echo $_SESSION['finalidgidt'];
     $getexplode=  explode(',', $giftcardid);
foreach($getexplode as $getvalues)
{
     $getgiftidvalues= $getvalues;


    $selectgiftcard=  mysql_query("select * from gift_coupon where gid='$getgiftidvalues'");

    while($getdata=  mysql_fetch_assoc($selectgiftcard))
    {
    $email=$getdata['recipient_email'];
     $name= $getdata['recipient_name'];
    
     $giftcouponcode=$getdata['coup_hint'];
  
  
     $sendername=$getdata['sender_name'];
     $message=$getdata['message'];
     $couponsender=$getdata['sender_name'];
     $amountgift=$getdata['amount'];
    

     
$subject = "Thankyou for Gifting Giftcard Order with littlefashions";
		$emailTo = $email;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $name,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red"> Your Loved One's Mr/Miss: $sendername Has Sended You The Gift Card With Message.<br><br/>Here is the Message From Your Loved Ones..<br><br/>$message </font> <font style="color: Blue"> Please Find The Coupon Code With Amount <br><br/>Coupon Code : $giftcouponcode <br><br/> Coupon Amount is :$amountgift   </font> \n<br><br/> <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

<font style="color:darkorchid ">
         Like us on Facebook :  https://www.facebook.com/littlefashions.in?fref=ts <br><br/>       
         Follow us on Twitter : https://twitter.com/littlefashions <br><br/>         
        
                 <br><br/><br><br/>       
        Regards,<br><br/>
            
         Littl Fashions Team \n https://littlefashions.in/ \n<br><br/>
                        </font>

         
                $theResults
EOD;
                
                $headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom."\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
                
                
                
                
                
                
                
                
                  /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="919908763343"; //enter Mobile numbers comma seperated
$message ="Hello,Admin"."An Gift Card Has Been Placed with Gift Card ID:".$giftcouponcode."For More Details Check Your Orders Dashboard Account";; //enter Your Message
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
                
                
                
                
                
                 $subject = "Order For Little Fashion";
		$emailTo = "orders@littlefashions.in";
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear Admin,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">An Gift Card Order Has Been Placed with Order ID:</font> <font style="color: Blue"> $getserialid </font> \n<br><br/><font style="color: Blue"> Please Find The Coupon Code With Amount <br><br/>Coupon Code : $giftcouponcode <br><br/> Coupon Amount is :$amountgift   </font> \n<br><br/><br><br/>Please Click This Link To See The Orderd Product: https://littlefashions.in/product-detail.php?id=$provalu <font style="color: brown"> Check Your Order's In Dashboard   <br><br/></p></strong></font>

<font style="color:darkorchid ">
         Like us on Facebook :  https://www.facebook.com/littlefashions.in?fref=ts <br><br/>       
         Follow us on Twitter : https://twitter.com/littlefashions4 <br><br/>         
        
                 <br><br/><br><br/>       
        Regards,<br><br/>
            
         Little Fashions Team \n https://littlefashions.in/ \n<br><br/>
                        </font>

         




                $theResults
EOD;
                
                $headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom."\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	
                
                

}

}




 /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$getmob; //enter Mobile numbers comma seperated
$message ="Hello,".$getbuyername."Thank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$getserialid;; //enter Your Message
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


/*Email code for Buyer */
$subject = "Thankyou for Placing your Order with littlefashions";
		$emailTo = $getbuyeremail;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $getbuyername,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red"> Thank you for placing your Order with Little Fashions.Your Order Is In Process with Order ID:</font> <font style="color: Blue"> $getserialid </font> \n<br><br/> <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

<font style="color:darkorchid ">
         Like us on Facebook :  https://www.facebook.com/littlefashions.in?fref=ts <br><br/>       
         Follow us on Twitter : https://twitter.com/littlefashions <br><br/>         
        
                 <br><br/><br><br/>       
        Regards,<br><br/>
            
         Littl Fashions Team \n https://littlefashions.in/ \n<br><br/>
                        </font>

         




                $theResults
EOD;
                
                $headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom."\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	


/*Email COde ends for buyer*/


}


/*Email Code for Seller and Customer*/

 $getproductid=$getrow['productinfo'];
       
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
                   $emails=$getemail['email'];
                   $mob=$getemail['mobile'];
                   $names=$getemail['name'];
                  
                   
                   
                   
                   
                   
                   
                   
                   /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$mob; //enter Mobile numbers comma seperated
$message ="Hello,".$names."Thank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$getserialid;; //enter Your Message
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
                   
                   
                   
                   
                   
                   /* Mail SCripting Starts*/
                   
                   
                       $msg = "Hello,".$names."Your Product Is Sold with Order ID:".$getserialid."For More Details Check Your Dashboard Account";
								
							
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
        
        
        
        $name=$row_orders['name'];
        $txnidemail=$row_orders['txnid'];
        $subject = "Order Details";
		$emailTo = $emails;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $names,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">Your Product Has Been Soldout with Order ID:</font> <font style="color: Blue"> $getserialid </font>. please Check Your Orders Dashboard For More Details \n<br><br/> <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

<font style="color:darkorchid ">
         Like us on Facebook :  https://www.facebook.com/littlefashions.in?fref=ts <br><br/>       
         Follow us on Twitter : https://twitter.com/littlefashions <br><br/>         
        
                 <br><br/><br><br/>       
        Regards,<br><br/>
            
         Littl Fashions Team \n https://www.littlefashions.in/ \n<br><br/>
                        </font>

         




                $theResults
EOD;
                
                $headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom."\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	
    
                
                
                
                
                 /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="919908763343"; //enter Mobile numbers comma seperated
$message ="Hello,Admin"."An Order Has Been Placed with Order ID:".$getserialid."For More Details Check Your Orders Dashboard Account";; //enter Your Message
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
                
                
                
                
                /*Email Code For Admin*/
                $subject = "Order For Little Fashion";
		$emailTo = "orders@littlefashions.in";
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear Admin,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">An Order Has Been Placed with Order ID:</font> <font style="color: Blue"> $getserialid </font> \n<br><br/><br><br/>Please Click This Link To See The Orderd Product: https://littlefashions.in/product-detail.php?id=$provalu <font style="color: brown"> Check Your Order's In Dashboard   <br><br/></p></strong></font>

<font style="color:darkorchid ">
         Like us on Facebook :  https://www.facebook.com/littlefashions.in?fref=ts <br><br/>       
         Follow us on Twitter : https://twitter.com/littlefashions4 <br><br/>         
        
                 <br><br/><br><br/>       
        Regards,<br><br/>
            
         Little Fashions Team \n https://littlefashions.in/ \n<br><br/>
                        </font>

         




                $theResults
EOD;
                
                $headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom."\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	
                
                   
                   
                   
                   
                   /* Mail Scripting ends*/
               }
               
               
               
           }
           
                   
       }
      







//************quety2***************

                                                    














                                                  
                                                    unset($_SESSION['cart']);
                                                   echo "<script>window.location='delvery.php?thnks=$tnxids';</script>";
                                                    
                                                }
                                                
                                               
                                                    
                                                    
                                                    
                                                    
                                                    
                                               
                                    }
?>