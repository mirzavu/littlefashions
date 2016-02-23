<?php
@session_start();
require 'dbconfig.php';
include("includes/functions.php");
function checkuser($fuid,$ffname,$femail,$first_name)
{
    	$check = mysql_query("select * from users where Fuid='$fuid'");
	$check = mysql_num_rows($check);
       
      $password = rand(00000,99999);
     // $pass = md5($password);
				      
      $flag = 0;
      $timezone = "Asia/Calcutta";
      $cutomercode_id=user_cutomercode_id();
      date_default_timezone_set($timezone);
      $added = date("Y-m-d H:i:s");
        if (empty($check)) { // if new user . Insert a new record		
$query = "INSERT INTO users (Fuid,name,email,username,password,added,flag,cutomercode_id)VALUES ('$fuid','$first_name','$femail','$first_name','$password','$added','$flag','$cutomercode_id')";
	mysql_query($query);	
                    $_SESSION['user_id']=mysql_insert_id();
         
          $subject = "Welcome to littlefashions.in";
	  $emailTo =$femail;
	$emailfrom = "info@littlefashions.in"; 
$body = "Dear $first_name , \n\nWelcome to Littlefashions, \n\nYour Account Details: \n\nUsername: $first_name \nPassword: $password \n\nAbout Littlefashions.in is designed to provide an opportunity to modern Indian parents to get products from most of the top brands at lower prices.";
$headers = 'From: Littlefashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;
								
mail($emailTo, $subject, $body, $headers);
$emailSent =true;

} else {   // If Returned user . update the user record		
	$query = "UPDATE users SET name='$ffname',email='$femail' where Fuid='$fuid'";
	mysql_query($query);
	}
}?>
