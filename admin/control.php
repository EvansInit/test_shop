<?php 
	session_start();
	require_once("../config/config.php");
	if (!$_SESSION["set_email"]) {
		//die("login first..stop with them tricks");
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CONTROL</title>
	<link rel="stylesheet" type="text/css" href="../external/bootstrap.min.css">
</head>
<body>
	<?php 
	
	$mail = $_SESSION["set_email"];
	$sql = "SELECT `a_username` FROM `control` WHERE `a_email` = '$mail'";
	$result = mysqli_fetch_assoc($result = $dtbs->query($sql));
	include('includes/navbar.php');

	?>
	<h5 class="text-center">Statistics</h5>
	<div class="container-fluid">
	<table class="table table-bordered table-hover">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Quantity</th>
	      <th scope="col">Quantity</th>
	      
	    </tr>
	  </thead>
	  <tbody>
	  <?php //while ($data_retrieve_products = mysqli_fetch_assoc($result)) { ?>
	    <tr>
	      <th scope="row">1</th>	      	
	      <td>hello<?php //echo $data_retrieve_products['quantity']; ?></td>
	      <td>hey<?php //echo $data_retrieve_products['title']; ?></td>
	      	      
	    </tr>
	<?php //} ?>
	  </tbody>
	</table>
	</div>
	
</body>
</html>