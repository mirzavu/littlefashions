<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 
 $uid = $_SESSION['user_id'];
  $tnxids=$_GET['cancel'];
  
  $cancel=  mysql_query("update orders set `delivery-status`='3' where txnid='$tnxids'");
  
 //unset($_SESSION['finalprice']);

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
							$sql_orders = mysql_query("SELECT *FROM `orders`WHERE `delivery-status`='3' and `txnid` = '$tnxids'");
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
                                                                        
                                                                        $orderid=$row_orders['order_itemcode'];
                                                                      
									$amount = $row_orders['amount'];
                                                                         $productidinfo=$row_orders['productinfo'];
                                                                        
                                                                         $prdqunty=$row_orders['pqunty'];
                                                                         $allsize=$row_orders['dresssize'];
                                                                         $allprice=$row_orders['priceall'];

                                                                        $ordstatuss=$row_orders['status'];
                                                                        // print_r($prinfo2);
                                                                    
                                                                      
                                                        

											

												$productidinfo_list = explode(',',$productidinfo);
                                                                                                
                                                                                             
                                                                                                
                                                                                                
                                                                                                 $prdqunty_list=explode(",",$prdqunty);
                                                                                                 
                                                                                                $allsize_list=explode(",",$allsize);
                                                                                                
                                                                                                
                                                                                                  $allprice_list=explode(",",$allprice);
                                                                                                  
                                                                                                  
                                                                                                
                                                                                                //  print_r($allprice_list);

												  $count25 =count($productidinfo_list);
                                                                                                   
												
                                                                                               //echo"----------------------------";
                                                      
					
                                                                                                            
                                              $sqls3="select * from products where id in ($productidinfo) ";
                                                 
                                            echo"<td>$tnxids</td>";
                                           
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
                                                  




// *********** notify ********** end here












                                                                                  
                                                                                                            
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
                   $emailseller=$getemail['email'];
                   $mobseller=$getemail['mobile'];
                   $nameseller=$getemail['name'];
                   
                   
                   /* Mail SCripting Starts*/
                   
                   
                   
                   
                   
                    /*SMS Code For  Seller */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$mobseller; //enter Mobile numbers comma seperated
$message ="Dear ".$name."Your Product Is Cancelled with Order ID:".$orderid;; //enter Your Message
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
                   
                   
                   
                   
                   
                   
                   
                       $msg = "Hello,".$name."Your Product Is Cancelled with Order ID:".$orderid."For More Details Check Your Dashboard Account";
								
							
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
        $txnidemail=$orderid;
        $subject = "Order Cancellation Details";
		$emailTo = $emailseller;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $nameseller,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red">Your Product Has Been Canceled with Order ID:</font> <font style="color: Blue"> $txnidemail </font>. please Check Your Orders Dashboard For More Details \n<br><br/> <font style="color: brown">  We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

<font style="color:darkorchid ">
         Like us on Facebook :  https://www.facebook.com/littlefashions.in?fref=ts <br><br/>       
         Follow us on Twitter : https://twitter.com/littlefashions4 <br><br/>         
        
                 <br><br/><br><br/>       
        Regards,<br><br/>
            
         Littl Fashions Team \n https://littlefashions.in/ \n<br><br/>
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
       
       
       
        /*SMS Code For  User */
                
                //Please Enter Your Details

$user="LFSHNS"; //your username
$password="lfs12#"; //your password
$mobilenumbers="91".$phone; //enter Mobile numbers comma seperated
$message ="Dear ".$row_orders['name']."Order Canceled in  Little Fashions for the  Order ID:".$orderid;; //enter Your Message
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
       
      
       
                        $msg = "Hello,".$row_orders['name']."Your Orders Is Cancelled";
								
							
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
        
        
        
        $name=$row_orders['name'];
        $txnidemail=$row_orders['txnid'];
        $subject = "Order Cancellation Confirmation From Little Fashions";
		$emailTo = $email;
		$emailfrom = "info@littlefashions.in"; 
		//$body = "Hello,".$row_orders['name']."<html><body>  <img align='center' src='images/thank_you_order.png'/> </body>   </html>"."\n\nThank you for placing your Order with Little Fashions. Your Order Is In Process with Order ID:".$row_orders['txnid']." \n\n\n\nWith Regards,\nLittle Fashions.";
		
                $body = <<<EOD


<strong ><font style="color: darkturquoise">Dear $name,</strong></font>
                        
                      

                           

        <p><strong><font style="color: red"> Your Order Is Cancelled with Order ID:</font> <font style="color: Blue"> $orderid </font> \n<br><br/> <font style="color: brown">We Are Deeply Regreted For Your Cancellation .We Are Very Happy To Serve You! And Happy Shopping With Us <br><br/></p></strong></font>

<font style="color:darkorchid ">
         Like us on Facebook :  https://www.facebook.com/littlefashions.in?fref=ts <br><br/>       
         Follow us on Twitter : https://twitter.com/littlefashions4 <br><br/>         
        
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
$message ="Hello,Admin"."Order Is  canceled  With Orders ID :". $orderid."For More Details Check Your Orders Dashboard Account";; //enter Your Message
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
                        
                      

                           

        <p><strong><font style="color: red">An Order Has Been Placed with Order ID:</font> <font style="color: Blue"> $orderid </font> \n<br><br/><br><br/>Please Click This Link To See The Orderd Product: https://littlefashions.in/product-detail.php?id=$provalu <font style="color: brown"> Check Your Order's In Dashboard   <br><br/></p></strong></font>

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
	
                   
                
                
                
       echo "<script> window.location='order-cancel.php'; </script>";
                                           
                
       
       
       
       
       
                         
                                    
                                    ?>
                                    
                                   
                                    
                                    
                                         
                                    <td>
                                         <?
                                    $tatmnt= $row_orders['amount'];
                                    
                                    
                                    
                                     $ccst=array_sum($aswarray);
                                     $totqunt=array_sum($prdqunty_list);
                                     echo "product Cost :&nbsp;&nbsp;Rs.".$ccst ;
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
                                    <td>
                                       
                                        
                                        
                                      <a href="" data-toggle="modal">
                                            Order Canceled
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
							
                                                        } 
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
</body>
</html>