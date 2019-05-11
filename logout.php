<?php 
	session_start();
	if (!$_SESSION["se_e_mail"]) {
		//die("login first..stop with them tricks");
		header('location: ../login.php');
	}else{
		session_unset();
		session_destroy();
		header('location: index.php');
	}
?>