<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 

 
 
 $uid = $_SESSION['user_id'];
 $id = $_SESSION['id'];
 
 $sql_user = mysql_query("select * from users where id = '$uid' ");
 $row_user = mysql_fetch_array($sql_user);
 
 
 $qnty=mysql_query("select * from orders WHERE uid='$uid'");
 $qtrows=mysql_fetch_array($qnty);     
 $quntys=$qtrows['pqunty'];
 
 $pro_info=$qtrows['productinfo'];
 
 
 
                                                         $quntity_list = explode(',',$quntys);
							$product_list = explode(',',$pro_info);
							
							$count=count($quntity_list);
							for($i=0; $i<$count; $i++) 
							{
								$quntity1 =$quntity_list[$i];
								$productl =$product_list[$i];
															
								
								// $sql_work = mysql_query("INSERT INTO work_details (user_id, current_industry, functional_area, role, company_name, company_designation, salary_lakhs, salary_thousands, from_month, from_year, to_month, to_year, added) VALUES ('$user_id', '$idustries', '$functionalities', '$roles', '$comapnies', '$designations', '$lakhss', '$thousandss', '$fms', '$fys', '$tms', '$tys', '$added')");
						
                                                           $sqlupdatedata=mysql_query("update products set quantity=quantity-$quntity1 where id='$productl'")   ; 
                                                                
                                                  
                                                           
                                                           
                                                           
                                                        }
 
    //************
                                                        
  $sel=  mysql_query("select * from wallet where user_id='$uid' ");
  $row=  mysql_fetch_assoc($sel);
  $wallettot=$row['points'];
  $tempvalue=$row['temp'];
  /*if($wallettot>=$tempvalue)
  {*/
    $prdata21 =mysql_query("select SUM(loyalitycash) as sumall from products where id in ($pro_info)");
     $loyalitycasht1=mysql_fetch_array($prdata21) ;
     $loyalitycashttmp=$loyalitycasht1['sumall'] ;
     
    // echo "<script>alert($loyalitycashttmp);</script>";
     
     
     $update=mysql_query("update wallet set temp=temp+$loyalitycashttmp where user_id='$uid'");
 // }
     //**************
     
     
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="BiRkTa4W";

$sql = mysql_query("UPDATE orders SET `status` ='1' , `delivery-status` = '2' WHERE `txnid` ='$txnid'");

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   }
	   else {
           	   //$_SESSION['success_msg']=1;
         // echo '<script language=javascript>alert("Thank you for placing your order..")</script>';
								//echo "<script type='text/javascript'>window.location='order_history.php'</script>";
								//exit();	
           
		   }         

?>

<?php
 $txnid;
$selorders=  mysql_query("select * from orders WHERE `txnid` ='$txnid' and `status` ='1' and `delivery-status` = '2'");
$getrow=  mysql_fetch_assoc($selorders);

$order_itemcode=$getrow['order_itemcode'];

  $giftcardid= $getrow['gift_card_id'];
 
 $getbuyeremail=$getrow['email'];
  $getbuyername=$getrow['name'];
  $getmob=$getrow['phone'];

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
    
     
     
     
     
     
     
     
     
     /*Code for gift email*/

$subject = "Thankyou for Gifting Giftcard Order with littlefashions";
		$emailTo = $email;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $name,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red"> Your Loved One's Mr/Miss: $sendername Has Sended You The Gift Card With Message.<br><br/>Here is the Message From Your Loved Ones..<br><br/>$message </font> <font style="color: Blue"><br><br/> Please Find The Coupon Code With Amount <br><br/>Coupon Code : $giftcouponcode <br><br/> Coupon Amount is :$amountgift   </font> \n<br><br/> <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

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

                
                 /*Email Code For Admin*/
                $subject = "Order For Little Fashion";
		$emailTo = "orders@littlefashions.in";
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear Admin,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">A Gift Card Order Has Been Placed with Order ID:</font> <font style="color: Blue"> $order_itemcode </font> \n<br><br/><font style="color: Blue"> Please Find The Coupon Code With Amount <br><br/>Coupon Code : $giftcouponcode <br><br/> Coupon Amount is :$amountgift   </font> \n<br><br/><br><br/><font style="color: brown"> Check Your Order's In Dashboard   <br><br/></p></strong></font>

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
	
                
                
                         
         /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$getmob; //enter Mobile numbers comma seperated
//$message ="Thank you for placing your Giftcard Order with Little Fashions. Your Order Is In Process with Order ID:".$order_itemcode."Once the order is processed the shipment and courier details will be sent on SMS and Email";; //enter Your Message

$message ="We are happy to say that you are Gifted with Littlefashions.in Credits. Necessary details has sent through mail.";
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
                
                
                
                
                
}

}






//Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$getmob; //enter Mobile numbers comma seperated
$message="Thank You For Placing Order Number ".$order_itemcode.". Once the order is processed the shipment and courier details will be sent on SMS and Email."; //enter Your Message
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
                        
                      

                           

        <p><strong><font style="color: red"> Thank you for placing your Order with Little Fashions.Your Order Is In Process with Order ID:</font> <font style="color: Blue"> $order_itemcode </font> \n<br><br/> <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

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
$mobilenumbers="91".$mob; //enter Mobile numbers comma seperated
$message ="Your Product Is Sold with Order ID:".$order_itemcode."For More Details Check Your Dashboard Account";; //enter Your Message
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






















//  ******* new code sms start here *************

        
        $name=$row_orders['name'];
        $txnidemail=$row_orders['txnid'];
        $subject = "Order Details";
		$emailTo = $emails;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $names,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">Your Product Has Been Soldout with Order ID:</font> <font style="color: Blue"> $order_itemcode </font>. please Check Your Orders Dashboard For More Details \n<br><br/> <br><br/>Please Click This Link To See Your Product: https://www.littlefashions.in/product-detail.php?id=$provalu <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

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
	
    
                $selectadmin=  mysql_query("select * from admin");
$getrow=  mysql_fetch_assoc($selectadmin);
       
$adminemail=$getrow['email'];
$adminmobile=$getrow['mobile'];
                
                /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$adminmobile; //enter Mobile numbers comma seperated

$message="Thank You For Placing Order Number ".$order_itemcode.". Once the order is processed the shipment and courier details will be sent on SMS and Email.";

//$message ="An Order Has Been Placed with Order ID:".$order_itemcode."For More Details Check Your Orders Dashboard Account";; //enter Your Message
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

                
                
                /*SMS CODE ENDS*/
                
                
                
                
                
                
                
                
                
                
                /*Email Code For Admin*/
                $subject = "Order For Little Fashion";
		$emailTo = $adminemail;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear Admin,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">An Order Has Been Placed with Order ID:</font> <font style="color: Blue"> $order_itemcode </font> \n<br><br/><br><br/>Please Click This Link To See The Orderd Product: https://www.littlefashions.in/product-detail.php?id=$provalu <font style="color: brown"> Check Your Order's In Dashboard   <br><br/></p></strong></font>

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
	
                   
                   
                   
                   
                   /* Mail Scripting ends*/
               }
               
               
               
           }
           
                   
       }
      



/*Code Ends*/

echo "<script type='text/javascript'>window.location='trans_success.php'</script>";

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Login or Register</title>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>

	<!-- Library CSS -->
	<link rel="stylesheet" href="css/library/font-awesome.min.css">
	<link rel="stylesheet" href="css/library/bootstrap.min.css">
	<link rel="stylesheet" href="css/library/owl.carousel.css">
	<link rel="stylesheet" href="css/library/jquery-ui.min.css">
	<link rel="stylesheet" href="css/library/jquery.fancybox.css">
	
	<!-- MAIN STYLE -->
	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="http://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">

	<!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body>

	<!-- LOADING 
	<div class="loading-container" id="loading">
		<div class="loading-inner">
			<span class="loading-1"></span>
			<span class="loading-2"></span>
			<span class="loading-3"></span>
		</div>
	</div>-->
	<!-- END LOADING -->

	<div class="wrap-page">

		<!-- HEADER -->
        <nav class="navigation_top ">
            <?php include_once('top.php');?>
        </nav>		
        <header class="header _1">
            <?php include_once('header.php');?>
        </header>
        <header class="header _1">
            <?php include_once('menu.php');?>
        </header>
		
		<!-- BREAKCRUMB -->
		<section class="breakcrumb bg-grey">
			<div class="container">
				<h3 class="pull-left">Success</h3>
                                
                               
			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- LOGIN REGISTER -->
		<section class="login-register">
			<div class="container">
				<div class="row">

					<!-- LOGIN -->
                    <div class="col-md-3"></div>
					<div class="col-md-6">

						<div class="heading _two text-left">
							<h2>Success!! </h2>
                                                        

						</div>

						

					</div>
					<!-- END LOGIN -->
                     <div class="col-md-3"></div>
				</div>
			</div>
		</section>
		<!-- END LOGIN REGISTER -->

		<!-- PARTNER -->
		<section class="partner partner-list">
        	<?php include_once('partners.php');?>
		</section>
		<!-- END PARTNER -->
		
		<!-- FOOTER -->
		<footer class="dark">
        	<?php include_once('footer.php');?>
		</footer>
		<!-- END FOOTER -->

		<!-- SCROLL TOP -->
		<div id="scroll-top" class="_1">Scroll Top</div>
		<!-- END SCROLL TOP -->

	</div>

	<!-- Library JS -->
	<script src="js/library/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="js/library/jquery-ui.min.js" type="text/javascript"></script>
	<script src="js/library/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/library/owl.carousel.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
	<script src="js/library/parallax.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.countdown.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.mb.YTPlayer.js" type="text/javascript"></script>
	<script src="js/library/jquery.responsiveTabs.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.fancybox.js" type="text/javascript"></script>
	<script src="js/library/SmoothScroll.js" type="text/javascript"></script>
	<script src="js/library/isotope.min.js" type="text/javascript"></script>
	<script src="js/library/jquery.colio.min.js" type="text/javascript"></script>

	<!-- Main Js -->
	<script src="js/script.js" type="text/javascript"></script>
</body>
</html>