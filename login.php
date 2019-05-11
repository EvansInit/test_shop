<?php 
	require_once("config/config.php");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="external/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="external/login.css">

</head>
<body class="text-center">
	<?php// include('includes/navbar.php') ?>

	 <form class="form-signin" method="POST">
      <img class="mb-4" src="external/test.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">To sell, please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="user_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="user_passwd" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
      <p><strong>Not Registered? <a href="register.php">SIGN UP || REGISTER</a></strong></p>
      <p><strong>Wanna Go Back? <a href="index.php">HOME</a></strong></p> 
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>

	<?php 

		if($_POST){

			$email = $_POST["user_email"];
			$new_security_key = $_POST["user_passwd"];
			$new_security_key = md5($new_security_key);
			//echo $new_security_key;

			$sql = "SELECT * FROM `user_info` WHERE `e_mail` = '$email' AND `security_key`='$new_security_key'";
			$result = $dtbs->query($sql);
			//var_dump($result);

			if ($result->num_rows == 1){
				$_SESSION["se_e_mail"]=$email;
				header('location: users/profile.php');
			}else{
				die("login failed");
			}

		}
		
	?>
</body>
</html>

