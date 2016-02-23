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
 
 
 $sqlusus=mysql_fetch_array(mysql_query("select * from  orders  where uid='$uid'"));
 
            $ramount=$sqlusus['amount'];
            $name=$sqlusus['name'];
            $email=$sqlusus['email'];
 
 
            $sqlupdate=mysql_query("UPDATE orders SET `delivery-status` =3  WHERE `txnid` ='$tnxids'");
            if($sqlupdate)
            {
             $sqlus=mysql_query("select * from  users where id='$uid'");
             $unums=  mysql_num_rows($sqlus);
             if($unums > 0)
             {
                $udrtlrows=  mysql_fetch_array($sqlus);
                $subject = "Your Order canceled  in  littlefashions";
		 $emailTo =$udrtlrows['email'];
                $name=$udrtlrows['name'];
		$emailfrom = "info@littlefashions.in"; 
                $phone=$udrtlrows['mobile'];
		$body = "Dear $name, \n\nThank you for placing your Order with Little Fashions for the  Order ID: $tnxids. \n\n\n\nWith Regards,\nLittle Fashions.";
		$headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;

		
		
                
                $adminemail="admin@littlefashions.in"; 
                $adminsubject="canceled  Order";
                $bodyadmin = "Dear Admin, \n\n Mr/Miss".$name." want to canceled  the   Orders ID : $tnxids. \n\n\n\nWith Regards,\nLittle Fashions.";
                
                
                mail($emailTo, $subject, $body, $headers);
                
                mail($adminemail,$adminsubject,$bodyadmin, $headers);
                
		$emailSent = true;
		
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
            
             } 
             
             
             
             header("location:index.php");
             exit();
             
            }



