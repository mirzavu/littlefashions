<?php

include_once('includes/db.php');

include_once('includes/functions.php');

session_start();



if($_SERVER["REQUEST_METHOD"]=="POST")

{

	$user = $_POST["username"];

	$pass = $_POST["password"];

	

}



$user = mysql_real_escape_string($user);



$query = "SELECT * FROM users WHERE username='$user' and password='$pass'";

$result = mysql_query($query);

$row = mysql_fetch_array($result);



if(is_array($row)) {

$_SESSION['user_id'] = $row['id'];

$_SESSION['username'] = $row['username'];

$_SESSION['type'] = $row['type'];

} 

elseif(isset($_SESSION['email'])){
	$_SESSION['username'] = $_SESSION['email'];
	$_SESSION['user_id'] = $_SESSION['id'];
}

if(isset($_SESSION['username'])) {
	$_SESSION['loggedin'] = 1;
	header("Location:index.php");
}

else {

	echo "<script language=javascript>alert('Entered Username or Password is incorrect!')</script>";

	echo "<script type='text/javascript'>window.location='login.php'</script>";

}





?>

