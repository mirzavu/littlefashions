<?php
 session_start();
ob_start();
 include_once('includes/db.php');
 include_once('includes/functions.php');

 
 $uid = $_SESSION['user_id'];
  $tnxids=$_GET['thnks'];
 unset($_SESSION['finalprice']);

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
    <link rel="stylesheet" href="css/library/font-awesome.css">
	<link rel="stylesheet" href="css/library/colio.css">
	<link rel="stylesheet" href="css/library/isotope.css">
	
	<!-- MAIN STYLE -->
	<!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">

	<!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

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
				<h3 class="pull-left">Transaction Is Successful</h3>

			</div>
		</section>
		<!-- END BREAKCRUMB -->
		
		<!-- LOGIN REGISTER -->
		<section class="login-register">
			<div class="container">
				<div class="row">

					<!-- LOGIN -->
                    <div class="col-md-3"></div>
					<div class="col-md-12">

						<div class="heading _two text-left">
							
                    
                	<table class="table table-bordered tbl-cart table-responsive" width='100%'>
                        <thead>
                            <tr>
                                                             
                               
                                <td>Order ID</td>
                             
                                 <td>Product Details </td>
                                <td>Amount </td>
                               
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
							$sql_orders = mysql_query("SELECT *FROM `orders`WHERE `txnid` = '$tnxids'");
							$count = mysql_num_rows($sql_orders);
                                                        
                                                        
                                                        
                                                        
							$i=1;
							
							if($i<=$count)
							{
							$row_orders = mysql_fetch_array($sql_orders);
							  $aswarray=array();
								
                             		                               $uid = $row_orders['uid'];
									$txnid = $row_orders['txnid'];
									$name = $row_orders['name'];
									$email = $row_orders['email'];
									$phone = $row_orders['phone'];
                                                                        $order_itemcode=$row_orders['order_itemcode'];
                                                                      
									$amount = $row_orders['amount'];
                                                                         $productidinfo=$row_orders['productinfo'];
                                                                        
                                                                         $prdqunty=$row_orders['pqunty'];
                                                                         $allsize=$row_orders['dresssize'];
                                                                         $allprice=$row_orders['priceall'];
                                                                        // print_r($prinfo2);
                                                                    
                                                                      
                                                        

											

												$productidinfo_list = explode(',',$productidinfo);
                                                                                                
                                                                                             
                                                                                                
                                                                                                
                                                                                                 $prdqunty_list=explode(",",$prdqunty);
                                                                                                 
                                                                                                $allsize_list=explode(",",$allsize);
                                                                                                
                                                                                                
                                                                                                  $allprice_list=explode(",",$allprice);
                                                                                                  
                                                                                                  
                                                                                                
                                                                                                //  print_r($allprice_list);

									echo  $count25 =count($productidinfo_list);
                                                                                                   
												
                                                                                               //echo"----------------------------";
                                                                                                 
												
                                                                                                            
                                              $sqls3="select * from products where uid='$uidsell' and  id in ($productidinfo) ";
                                                 
                                            echo"<td>$order_itemcode</td>";
                                           
                                          $prdatasl=mysql_query($sqls3);                        
                                                                        
                                            $prslnum=mysql_num_rows($prdatasl);                       
                                                                        
                                                 if( $prslnum > 0)     
                                                 {
                                                  
                                                        
                                                        ?>
                                                        
                                                          <td>
                                                              <?php
                                                                                            for($i=0; $i<$count25; $i++) 

												{

													  $productidinfo_listall =$productidinfo_list[$i];
                                                                                                      
													   $prdqunty_listall = $prdqunty_list[$i];
                                                                                                          
                                                                                                            $allsize_listall=$allsize_list[$i];
                                                                                                            $allprice_listall=$allprice_list[$i];
                                                        $sqla=  mysql_query("select * from products where id='$productidinfo_listall'")   ;                                                 
                                                                                                            
                                                        $rowsel=mysql_fetch_array($sqla);
                                                  
                                                        $product_idimg=$rowsel['product_id'];
                                                      $sql_images = mysql_query("select * from product_images where product_id = '$product_idimg' ");

							


							$count = mysql_num_rows($sql_images);

						

						

							$row_images = mysql_fetch_array($sql_images);
                                                                        
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                           ?>
                                        
                                      <table width='100%' style='border-bottom: 1px solid #d3d3d3 ;'><tr><td>  <div style="float:left;">
                                               <?=$rowsel['product_name'];?> <br/>
                                           Price:&nbsp; <?=$allprice_listall;?>
                                           <br/>
                                            Quntity:&nbsp; <?=$prdqunty_listall;?>
                                           <br/>                                          
                                            size :&nbsp; <?=get_age1($allsize_listall);?>
                                              <br/>
                                             Total amount:&nbsp; <?
                                             
                                           echo   $asdw=$prdqunty_listall*$allprice_listall;
                                             
                                             $aswarray[]=$asdw ;
                                            
                                            ?>
                                         
                                             </div><div style="float:left;width:30%"></td><td>
                                            <img class="etalage_thumb_image" src="images/products/<?=$row_images['image']; ?>" width="75px" height="75" />
                                         </div>
                                      
                                        </div></td></tr></table>
                                        <?php
                                                  }
                                        ?>
                                    </td>
                                                        
                                                        
                                                        
                                                        
                                                        <?php
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    
                                                      }
                       
        
                                                      
                                                      
/*Gift Card Mail SMS COde*/     
                                                      
                                                      
                                                      
 $txnid;
$selorders=  mysql_query("select * from orders WHERE `txnid` ='$tnxids' and `status` ='1' and `delivery-status` = '2'");
$getrow=  mysql_fetch_assoc($selorders);

$order_itemcode_full=$getrow['order_itemcode'];

  $giftcardid= $getrow['gift_card_id'];
 
 $getbuyeremail=$getrow['email'];
  $getbuyername=$getrow['name'];
  $getmob=$getrow['phone'];

$row=  mysql_num_rows($selorders);
                                                      
                                                      
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
    $recpemail=$getdata['recipient_email'];
     $recpname= $getdata['recipient_name'];
    
     $giftcouponcode=$getdata['coup_hint'];
  
  
     $sendername=$getdata['sender_name'];
     $message=$getdata['message'];
     $couponsender=$getdata['sender_name'];
     $amountgift=$getdata['amount'];
    
     
     
     
     
     
     
     /*Code for gift email*/

$subject = "Thankyou for Gifting Giftcard Order with littlefashions";
		$emailTo = $recpemail;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $recpname,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red"> Your Loved One's Mr/Miss: $sendername Has Sended You The Gift Card With Message.<br><br/>Here is the Message From Your Loved Ones..<br><br/>$message </font> <font style="color: Blue"><br><br/> Please Find The Coupon Code With Amount <br><br/>Coupon Code : $giftcouponcode <br><br/> Coupon Amount is :$amountgift   </font> \n<br><br/>With Order Id".$order_itemcode_full."<br><br/> <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

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
                        
                      

                           

        <p><strong><font style="color: red">A Gift Card Order Has Been Placed with Order ID:</font> <font style="color: Blue"> $order_itemcode_full </font> \n<br><br/><font style="color: Blue"> Please Find The Coupon Code With Amount <br><br/>Coupon Code : $giftcouponcode <br><br/> Coupon Amount is :$amountgift   </font> \n<br><br/><br><br/><font style="color: brown"> Check Your Order's In Dashboard   <br><br/></p></strong></font>

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
//$message ="Thank you for placing your Giftcard Order with Little Fashions. Your Order Is In Process with Order ID:".$order_itemcode_full."Once the order is processed the shipment and courier details will be sent on SMS and Email";; //enter Your Message


$message ="We are happy to say that you are Gifted with Littlefashions.in Credits. Necessary details has sent through mail";

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
}
                                                        
                                                      
/*Gift Card Code Ends*/                                                      






       $getproductid=$row_orders['productinfo'];
       
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
                   $name_user=$getemail['name'];
                   
                   
                   /* Mail SCripting Starts*/
                   
                   
                   
                   
                   
                     /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$mob; //enter Mobile numbers comma seperated
$message ="Your Product Has Been Soldout :-". $order_itemcode."With Little Fashion";; //enter Your Message
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
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    $msg = "Thank You For Placing Order Number :-". $order_itemcode. "Once the order is processed the shipment and courier details will be sent on SMS and Email";
								
							
                $request = "";
                $param["user"] = "LFSHNS";
                $param["passwd"] = "lfs12#";
                $param["sid"] = "LFSHNS";
                $param["mobilenumber"] = $mob;
                $param["message "] = $msg;
                $param["mtype "] = "N";
                $param["DR "] = "Y";
 
 
                foreach($param as $key=>$val){
                                $request.= $key."=".urlencode($val);
                                $request.= "&";
                }
 
                $request = substr($request, 0, strlen($request)-1);
                $url = " https://api.smscountry.com/SMSCwebservice_bulk.aspx?".$request;
                
                
                
        $name=$row_orders['name'];
        $txnidemail=$row_orders['txnid'];
        $subject = "Order Details";
		$emailTo = $emails;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$order_itemcode." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $name_user,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">Your Product Has Been Soldout with Order ID:</font> <font style="color: Blue"> $order_itemcode </font>.<br><br/>Please Click This Link To View Your Soldout Product: https://www.littlefashions.in/product-detail.php?id=$provalu. For More Details Please Check Your Orders Dashboard  \n<br><br/> <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

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
      
       
       
       
          /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$phone; //enter Mobile numbers comma seperated
$message="Thank You For Placing Order Number ".$order_itemcode.". Once the order is processed the shipment and courier details will be sent on SMS and Email.";
//$message ="Thank you for placing your Giftcard Order with Little Fashions. Your Order Is In Process with Order Number:- ".$order_itemcode.". Once the order is processed the shipment and courier details will be sent on SMS and Email";; //enter Your Message
//$message ="Thank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$order_itemcode."Once the order is processed the shipment and courier details will be sent on SMS and Email";; //enter Your Message
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
       
       

$selectadmin=  mysql_query("select * from admin");
$getrow=  mysql_fetch_assoc($selectadmin);
       
$adminemail=$getrow['email'];
$adminmobile=$getrow['mobile'];
        
       
       
       
                       $message="Thank You For Placing Order Number ".$order_itemcode.". Once the order is processed the shipment and courier details will be sent on SMS and Email.";

								
							
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
        
        
        
        $names=$row_orders['name'];
        $txnidemail=$row_orders['txnid'];
        $subject = "Thankyou for Placing your Order with littlefashions";
		$emailTo = $email;
		$emailfrom = "info@littlefashions.in" ; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$order_itemcode." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD
<strong ><font style="color: darkturquoise">Dear $names,</strong></font>
                        
        <p><strong><font style="color: red"> Thank you for placing your Order with Little Fashions.Your Order Is In Process with Order ID:</font> <font style="color: Blue"> $order_itemcode </font> \n<br><br/><br><br/>Please Click This Link To View Your Purchased Product: https://www.littlefashions.in/product-detail.php?id=$provalu <font style="color: brown">.<br><br/>  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

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
	                               
                
                
                
                
                //SMS CODE FOR ADMIN
                
                
                
                 /*SMS Code For  Admin */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$adminmobile; //enter Mobile numbers comma seperated
$message="Thank You For Placing Order Number ".$order_itemcode.". Once the order is processed the shipment and courier details will be sent on SMS and Email.";

//$message="Thank You For Placing Order Number * LF*. Once the order is processed the shipment and courier details will be sent on SMS and Email.";

//$message ="An Order Has Been Placed with Order ID:".$order_itemcode."For More Details Check Your Orders Dashboard Account";; //enter Your Message
$senderid="LFSHNS"; //Your senderid
$messagetype="N"; //Type Of Your Message
$DReports="Y"; //Delivery Reports
$url="http://www.smscountry.com/SMSCwebservice_Bulk.aspx";
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
                
                
                
                
                
                /**/
                /*Email Code For Admin*/
                $subject = "Order For Little Fashion";
		$emailTo = "$adminemail";
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear Admin,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">An Order Has Been Placed with Order ID:</font> <font style="color: Blue"> $order_itemcode </font> \n<br><br/><br><br/>Please Click This Link To See The Orderd Product: http://littlefashions.in/product-detail.php?id=$provalu <font style="color: brown"> Check Your Order's In Dashboard   <br><br/></p></strong></font>

<font style="color:darkorchid ">
         Like us on Facebook :  https://www.facebook.com/littlefashions.in?fref=ts <br><br/>       
         Follow us on Twitter : https://twitter.com/littlefashions4 <br><br/>         
        
                 <br><br/><br><br/>       
        Regards,<br><br/>
            
         Little Fashions Team \n http://www.littlefashions.in/ \n<br><br/>
                        </font>

         




                $theResults
EOD;
                
                $headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom."\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	
                
                
                
                
                
                
                
                

                                    
                                    ?>
                                    
                                   
                                    
                                    
                                         
                                    <td>
                                         <?
                                    $tatmnt= $row_orders['amount'];
                                    
                                    
                                    
                                     $ccst=array_sum($aswarray);
                                     $totqunt=array_sum($prdqunty_list);
                                     echo "Total product Cost :&nbsp;&nbsp;Rs.".$ccst ;
                                       if($row_orders['payment-mode']==2)
                                       {
                                    $add60=60;
                                   $amount250= $row_orders['amount'];
                                  
                                   echo"<br/>";
                                   echo "Shipping Charges:&nbsp;&nbsp;Rs. 60" ;
                                       }
                                       
                                       $countype=$row_orders['coupontype'];
                                         if($countype !='' &&  $countype !='0')
                                         {
                                               echo "<br/>Discount:";
                                               $discountam=array_sum($allprice_list);
                                               echo $discount=$ccst-$tatmnt+$add60 ;
                                             
                                         }
                                   
                                    if($row_orders['delivery-status']==2)
                                       {
                                    $shipping=60;
                                    
                                       }
                                       else
                                       {
                                        $shipping=0;   
                                           
                                       }
                                 
                                     $allmntsa=$allmntsa + $tatmnt ;
                                     ?>
                                    
                                    
                                    
                                    </td>
                                    <td valign="center">
                                       
                                        <?php
                                        if($row_orders['payment-mode']==2)
                                        {
                                            ?>
                                        <a href="cancelcod.php?cancel=<?=$tnxids?>" data-toggle="modal">
                                            cancel Order 
                                        </a> 
                                          <a  href="invoice.php?id=<?=$row_orders['id'];?>" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a> 
                                        <?php
                                        } else{
                                        ?>
                                        
                                      <a href="#cancel<?=$i?>" data-toggle="modal">
                                            cancel Order 
                                        </a> 
                                               
                                                 <div id="cancel<?=$i?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Cancel Amounts</h4>
                                            </div>
                                            <div class="modal-body">
                                           		<div class="container-fluid">
                                                    
                                                    
                                               
                                               <div class="row">
                                                      <div class="col-md-7">Amount Return to My wallet's</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-4"><a href="walet-store.php?txids=<?=$row_orders['txnid'];?>">click here</a></div>
                                                    </div>
                                                       <br/>     
                                                        <br/> 
                                             <div class="row">
                                                      <div class="col-md-7">Amount Return To My accounts</div>
                                                      <div class="col-md-1">:</div>
                                                      <div class="col-md-4"><a href="amount-refund.php?txids=<?=$row_orders['txnid'];?>">click here</a></div>
                                                    </div>                
                                                            
                                                            
                                                </div>
                                            	
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                              
                                       <a  href="invoice.php?id=<?=$row_orders['id'];?>" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a> 
                                        
                                    </td>
                                </tr>
                                
                              
                        <? 	
								
							$i++;
							
                                                        } }
						?>    
                                <tr><td style="border:0px;"></td><td style="border:0px;"></td><td style="border:0px;">&nbsp;Total Amount</td><td style="border:0px;">Rs.&nbsp;<?=$allmntsa ;?></td></tr>
                        </tbody>
                    </table>
                                                    
                                                    
                                                    
                                                    
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
        
        
        <script type="text/javascript">
window.history.forward(1);
function noBack(){
    
window.history.forward();
}
</script>

<?php

echo "<script>window.location='trans_success.php'</script>";
?>


</body>
</html>