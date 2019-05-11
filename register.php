<?php require_once("config/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="external/bootstrap.min.css">
</head>
<body>
	<?php include('includes/navbar.php') ?>

	<div class="container">
		<br>
		<h2 class="text-center">Please, fill in all the blanks to proceed.</h2>

		<form classs="form" method="POST">
	      	
	      	<div class="row">
	      		<div class="col">
	      			Firstname:<input type="text" name="firstname" class="form-control" placeholder="Ray">
	      		</div>
	      		<div class="col">
	      			Lastname:<input type="text" name="lastname" id="lastName" class="form-control" placeholder="Makazi">
	      		</div>
			</div> <br>
			<div class="row">
	      		<div class="col">
	      			Businessname || username || profilename:<input type="text" name="username" class="form-control" placeholder="Ray Enterprises">
	      		</div>
	      	</div> <br>
	      	<div class="row">
	      		<div class="col">
	      			Email:<input type="email" name="user_email" class="form-control" placeholder="raymakazi@gmail.com">
	      		</div>
	      		<div class="col">
	      			Phone No:<input type="number" name="phn_number" class="form-control" placeholder="254712345678">
	      		</div>
	      	</div> <br>
	      	<div class="row">
	      		<div class="col">
	      			Password:<input type="password" name="passwd" class="form-control">
	      		</div>
	      		<div class="col">
	      			Confirm Password:<input type="password" name="user_passwd" class="form-control">
	      		</div>
	      	</div><br>
	      	<div class="row">
	      		<div class="col-4"></div>
	      		<div class="col-4">
					<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
				</div>
				<div class="col-4"></div>
			</div>
		</form>

	</div>

	<?php 

		if($_POST)
		{

			$name1st = $_POST["firstname"];
			$name2nd = $_POST["lastname"];
			$name_user = $_POST["username"];
			$e_mail = $_POST["user_email"];
			$mobile_no = $_POST["phn_number"];
			$sec_key = $_POST["passwd"];
			$security_key = $_POST["user_passwd"];

			if ($sec_key != $security_key) { 
	?>		<script>
					alert("Your passwords don't much. Try again");
			</script>
	<?php 	} else {

			$security_key = md5($security_key);
			$sql = "INSERT INTO `user_info` (`name1st`, `name2nd`, `name_user`, `e_mail`, `mobile_no`, `security_key`) VALUES ('$name1st', '$name2nd', '$name_user', '$e_mail', '$mobile_no', '$security_key')";
			mysqli_query($dtbs,$sql);

	?>		<script>
					alert("You are now registered.");

			</script>
	<?php
			header('location: users/profile.php');
			} //end of else
		}
	?>
</body>
</html>