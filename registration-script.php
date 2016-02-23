<?php
include_once('includes/db.php');
include_once('includes/functions.php');
If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['name']=='' || $_REQUEST['email']=='' || $_REQUEST['password']=='')
{
Echo "please fill the empty field.";
}
Else
{
$cutomercode_id=user_cutomercode_id();

$sql="insert into users (cutomercode_id,name,email,username,password,mobile) 

values('".$cutomercode_id."','".$_REQUEST['name']."', '".$_REQUEST['email']."', '".$_REQUEST['username']."', '".$_REQUEST['password']."', '".$_REQUEST['mobile']."')";

$res=mysql_query($sql);

If($res)
{
	echo '<script language=javascript>alert("Sucessfully  registered..")</script>';
	echo "<script type='text/javascript'>window.location='login.php'</script>";
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