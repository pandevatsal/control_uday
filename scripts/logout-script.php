<?php
	require '../includes/common.php';
	
	if(!isset($_SESSION["email_id"])){
		header("location: index.php");
	}else{
		session_unset();
		session_destroy();
		header ('location: ../logout.php');
	}
?>