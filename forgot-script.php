<?php
session_start();
ob_start();
 include_once('includes/db.php');
 include_once('includes/functions.php');
 $loginpage='https://www.littlefashions.in/login.php';
 $email=$_POST['uemail'];
if(isset($_POST['fsubmit']))
{
 $email=$_POST['uemail'];
$data=mysql_query("select * from users where email='$email'");
$nums=  mysql_num_rows($data);
if($nums>0)
{
    $rows=mysql_fetch_array($data);
   $passwords=$rows['password'];
    $from="littlefashions@littlefashions.in"; 
    $subject="forget password";
    $message="Your password is -->".$passwords ;
 $to=$email ;
  $headers ="From: " . $from . "\r\n";
		      $headers .="MIME-Version: 1.0\r\n";
		      $headers .="Content-Type: text/html; charset=ISO-8859-1\r\n";
                      $headers .= "\r\n";    

mail($to,$subject, $message, $headers);
  echo '<script language=javascript>alert("Your Password mailed to your email.. !!")</script>';
		        echo "<script type='text/javascript'>window.location='$loginpage'</script>";
		        exit();
    
}
else
{
    
                        echo '<script language=javascript>alert("Enter correct Email id  !!")</script>';
		        echo "<script type='text/javascript'>window.location='$loginpage'</script>";
		        exit();  
    
}

}
?>