<?php 
	require_once("../config/config.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="../external/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="includes/login.css">
</head>
<body class="text-center">

<p style="text-align: center;"></p>

<form class="form-signin" method="POST">
      <img class="mb-4" src="includes/test.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3"><strong>ADMINISTRATOR'S SIGN IN</strong></h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" nname="admin_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="admin_passwd" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
      <p><strong>Wanna Go Back? <a href="../index.php">HOME</a></strong></p> 
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
	
	<?php 

		if($_POST){

			$email = $_POST["admin_email"];
			$new_security_key = $_POST["admin_passwd"];
			$new_security_key = md5($new_security_key);
			//echo $new_security_key;

			$sql = "SELECT * FROM `control` WHERE `a_email` = '$email' AND `a_passwd`='$new_security_key'";
			$result = $dtbs->query($sql);
			//var_dump($result);

			if ($result->num_rows == 1){
				$_SESSION["set_email"]=$email;
				header('location: control.php');
			}else{
				die("login failed");
			}


		}
		

	?>

</body>
</html>