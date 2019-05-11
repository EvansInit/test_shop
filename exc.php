<?php 
session_start();
#just an exercise
?>
<!DOCTYPE html>
<html>
<head>
	<title>exercise</title>
</head>
<body>

<!--
	$_SERVER['PHP_SELF']
	$_SESSION
	$_SERVER['REQUEST_METHOD']
	$_POST


-->

	<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
		<p>Fullname: <input type="text" name="fullname"></p>
		<p>Username: <input type="text" name="username"></p>		
		<p>Email: <input type="text" name="email"></p>
		<p>secretword: <input type="text" name="secretword"></p>
		<p>Age: <input type="text" name="age"></p>
		<p>Address: <input type="text" name="address"></p>
		<p>Customer complaint: <input type="text" name="c_complaint" maxlength="250"></p>
		<p><input type="submit" name=""></p>
	</form>

</body>
</html>

<?php 
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$fullname = htmlspecialchars($_POST['fullname']);
		$username = htmlspecialchars($_POST['username']);
		$email = htmlspecialchars($_POST['email']);
		$age = htmlspecialchars($_POST['age']);
		$address = htmlspecialchars($_POST['address']);
		$c_complaint = htmlspecialchars($_POST['c_complaint']);
		$secretword = htmlspecialchars($_POST['secretword']);


		// Remove all illegal characters from email
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		// Validate e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		    echo("$email is a valid email address<br><br>");
		} else {
		    die("$email is not a valid email address<br><br>");
		}
		

		if (strlen($secretword) < 8) {
			die("your secret word is ".$secretword." It should be longer than 8 characters.<br><br>");
		}else{
			echo "Success. Your secret is ".$secretword." and it's above 8 characters.<br><br>";
		}

		if (!filter_var($age, FILTER_VALIDATE_INT) === false) {
		    echo("Age is an integer and is valid<br><br>");
		} else {
		    die("Age isn't an integer and is not valid<br><br>");
		}

		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;

		$customer = array('fullname' =>$fullname,'username'=>$username,'email'=>$email,'secretword'=>$secretword,'age'=>$age,'address'=>$address,'c_complaint'=>$c_complaint);

		echo "printing the session displays: ";
		print_r($_SESSION);

		//var_dump($customer);
		echo "<br><br><strong>CUSTOMER SUPPORT</strong>";
		echo " <br><br>Customer fullname: ".$customer['fullname']."<br><br>
				Customer username: ".$customer['username']."<br><br>
				Customer email: ".$customer['email']."<br><br>
				Customer age: ".$customer['age']."<br><br>
				Customer address: ".$customer['address']."<br><br>
				Customer secretword: ".$customer['secretword']."<br><br>
				Customer complaint: ".$customer['c_complaint']."<br><br>";

		// foreach ($customer as $customer_solo) {
		// 	# code...
		// 	echo $customer_solo."<br>";
		// }



	}else{
		//echo "error. please refresh the webpage.";
	}

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();
?>

