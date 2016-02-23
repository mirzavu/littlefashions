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

$query = "SELECT * FROM user_registration WHERE username='$user' and password='$pass' and flag='1'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

if(is_array($row)) {
$_SESSION['user_id'] = $row['id'];
$_SESSION['username'] = $row['username'];
$_SESSION['type'] = $row['type'];
} 

else {
	echo "<script language=javascript>alert('Entered Username or Password is incorrect!')</script>";
	echo "<script type='text/javascript'>window.location='index.php'</script>";
}

if(isset($_SESSION["username"])) {
	header("Location:dashboard.php");
}


?>
