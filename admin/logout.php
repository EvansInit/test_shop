<?php 
	session_start();
	if (!$_SESSION["set_email"]) {
		//die("login first..stop with them tricks");
		header('location: index.php');
	}else{
		session_unset();
		session_destroy();
		header('location: index.php');
	}
?>