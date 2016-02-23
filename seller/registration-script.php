<?php
include_once('../admin/includes/db.php');
include_once('includes/functions.php');

If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['name']=='' || $_REQUEST['email']=='' || $_REQUEST['password']=='')
{
Echo "please fill the empty field.";
}
Else
{
$array = array_merge(range(0,9),range('A','Z'),range('a','z'));
shuffle($array);
$reference_num = implode('',array_slice($array,0,10));
$user_sellercode_id=user_sellercode_id();


$em=$_REQUEST['email'];
$sel=mysql_query("select * from user_registration where email='$em' ");

$count=mysql_num_rows($sel);

if($count>0)
{
echo "<script>alert(Email Is Already Registered)</script>";
}
else
{


$sql="insert into user_registration (user_sellercode,reference_num,name,username,email,password,mobile,flag) 

values('".$user_sellercode_id."','".$reference_num."','".$_REQUEST['name']."','".$_REQUEST['username']."', '".$_REQUEST['email']."', '".$_REQUEST['password']."', '".$_REQUEST['mobile']."','1')";

$res=mysql_query($sql);

}

If($res)
{


                                           $subject = "Welcome to Littlefashions";
						$emailTo =$_REQUEST['email'];
						$emailfrom = "info@littlefashions.in"; 
						$body = "Dear Seller,\n\nThank you for registering with Little Fashion.in \n\n Once admin verify, you will add the products in little fashions.in";
                                               $body .= "\n\nUsername".$_REQUEST['username']."\n\n";
                                               $body .= "Password ".$_REQUEST['password']."\n\n";
                                                
						
						
						$headers = 'From:littlefashions.in <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;
				
						mail($emailTo, $subject, $body, $headers);
						$emailSent = true;
						


	echo '<script language=javascript>alert("Sucessfully  registered..")</script>';
	echo "<script type='text/javascript'>window.location='index.php'</script>";
	exit();					
}
else
{
	echo '<script language=javascript>alert("Something Went Wrong..")</script>';
	echo "<script type='text/javascript'>window.location='register.php'</script>";
	exit();					
}

}
}

?>