<?php
	include_once('includes/db.php');
	include_once('includes/functions.php');
	session_start();
	if(session_destroy())
	{
		header("location:index.php");
	}
?>