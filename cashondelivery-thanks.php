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

$remainamount=$_SESSION['remainamount'];
$coupid=$_SESSION['giftcardcoup'];
$coupamount=$_SESSION['amount'];

if($remainamount>0)
{
    
  
 $mysql_update=  mysql_query("update wallet set `points`=points+'$remainamount',`txid`='$tnxids' where `user_id`='$uid'");
 
 $sel=  mysql_query("select * from wallet where user_id='$uid'  ");
                $getdata=  mysql_fetch_assoc($sel);
                $currentamount=$getdata['points'];
                $afterupdate=$currentamount+$ramount;
                
                $insert=  mysql_query("insert into wallet_history (wallet_cashbeforeupdate,wallet_txnid,user_id,wallet_cashafterupdate,date) values ('$currentamount','$tnxids','$uid','$afterupdate','$datetime')");
}


    
    
$sqlupdate=mysql_query("UPDATE orders SET `payment-mode` = 4 , `status`='1',`delivery-status`='2',amount='$amou',gift_couponcode='$coupid',giftcard_amount='$coupamount'  WHERE `txnid` ='$tnxids'");
        if($sqlupdate)
        {
             
                                     $qnty= mysql_query("select * from orders WHERE `txnid` = '$tnxids'");
            
            
                                                 $qtrows=mysql_fetch_array($qnty);     
                                                     $quntys=$qtrows['pqunty'];
 
                                                     $pro_info=$qtrows['productinfo'];
 
                                                     $mobile=$qtrows['phone'];
 
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
            
            
            
            
            
            
            
            
            
            
            
            
            
             $sqlus=mysql_query("select * from  users where id='$uid'");
             $unums=  mysql_num_rows($sqlus);
             if($unums > 0)
             {
                $udrtlrows=  mysql_fetch_array($sqlus);
                $subject = "Thankyou for Placing your Order with littlefashions";
		 $emailTo =$udrtlrows['email'];
                $name=$udrtlrows['name'];
		$emailfrom = "info@littlefashions.in"; 
                $phone=$udrtlrows['mobile'];
		$body = "Dear $name, \n\nThank you for placing your Order with Little Fashions with Order ID: $tnxids. \n\n\n\nWith Regards,\nLittle Fashions.";
		$headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;

		mail($emailTo, $subject, $body, $headers);
                
                
                
                $adminemail="littlefashion@littlefashions.in"; 
                $adminsubject="Product Ordered In Littlefashion.in";
                $bodyadmin = "Dear Admin, \n\n Mr/Miss $name have an order with the Orders ID : $tnxids. \n\n\n\nWith Regards,\nLittle Fashions.";
                
                
                mail($adminemail,$adminsubject,$bodyadmin, $headers);
                
		$emailSent = true;
		
                
                
                
                 $msg = "Hello,".$name."Your Product Is Sold with Order ID:".$tnxids."For More Details Check Your Dashboard Account";
								
							
                $request = "";
                $param["user"] = "LFSHNS";
                $param["passwd"] = "lfs12#";
                $param["sid"] = "LFSHNS";
                $param["mobilenumber"] = $mobile;
                $param["message "] = $msg;
                $param["mtype "] = "N";
                $param["DR "] = "Y";
 
 
                foreach($param as $key=>$val){
                                $request.= $key."=".urlencode($val);
                                $request.= "&";
                }
 
                $request = substr($request, 0, strlen($request)-1);
                $url = " https://api.smscountry.com/SMSCwebservice_bulk.aspx?".$request;
        
                
        /*        
                
		
	$msg = "Thank you for placing your Order with Little Fashions with Order ID:".$tnxids;
								
							
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
	$load = file_get_contents("https://202.62.67.34/smpp.sms?".$request);*/
            
             } 
             
             
             unset($_SESSION['cart']);
            header("location:delvery.php?thnks=$tnxids");
             exit();
             
        }

?>


