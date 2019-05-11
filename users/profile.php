<?php 
	session_start();
	require_once("../config/config.php");
	if (!$_SESSION["se_e_mail"]) {
		//die("login first..stop with them tricks");
		header('location: ../login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User profile</title>

	<link rel="stylesheet" type="text/css" href="../external/bootstrap.min.css">
</head>
<body>
	<?php include('includes/navbar.php'); ?>
	<?php
	$se_e_mail = $_SESSION["se_e_mail"];
	$sql_user_info = "SELECT `user_id`,`name1st`,`name2nd`,`name_user`,`mobile_no` FROM `user_info` WHERE `e_mail` = '$se_e_mail'";
	$result_user_info = $dtbs->query($sql_user_info);
	$data = mysqli_fetch_assoc($result_user_info);
	//var_dump($data);
	$user_id = $data['user_id'];

	?>

	<h4><strong>Business name: <span style="color: rgb(0,0,255);"><?php echo $data['name_user']; ?></span></strong>
	<strong>Contact (phn no): <span style="color: rgb(0,0,255);"><?php echo "+".$data['mobile_no']; ?></span></strong></h4>

	<h3 style="text-align: center; color: rgb(255,0,0);">Add a product</h3><hr>


	<?php
		//trying to select categories
		$sql_select_categories = "SELECT * FROM `categories` WHERE `parent` = '0'";
		$result_select_categories = $dtbs->query($sql_select_categories);

		//trying to select sub-categories
		$sql_select_subcategories = "SELECT * FROM `categories` WHERE `parent` != '0'";
		$result_select_subcategories = $dtbs->query($sql_select_subcategories);

		//trying to select brand
		$sql_select_brand = "SELECT * FROM `brand` WHERE `cat_id` = '2'";
		$result_select_brand = $dtbs->query($sql_select_brand);

		//including add product functionality
		include('includes/addproduct.php');
	 ?>


	<hr><h3 style="text-align: center; color: rgb(255,0,0);">My Products</h3>

	<?php 

	$sql_retrieve_products = "SELECT * FROM `products` WHERE `user_id` = '$user_id'";
	$result= $dtbs->query($sql_retrieve_products);
		
	//$data = mysqli_fetch_assoc($result);
	//$data_array_total = $result->num_rows;

	//echo "Total no of rows ".$data_array_total;

	?>

	<table class="table table-bordered table-hover">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Quantity</th>
	      <th scope="col">Title</th>
	      <th scope="col">Price</th>
	      <th scope="col">Category</th>
	      <th scope="col">Brand</th>
	      <th scope="col">Description</th>
	      <th scope="col">Condition</th>
	      <th scope="col">picture_1</th>
	      <th scope="col">picture_2</th>
	    </tr>
	  </thead>
	  <tbody>
	  <?php while ($data_retrieve_products = mysqli_fetch_assoc($result)) { ?>
	    <tr>
	      <th scope="row">1</th>	      	
	      <td><?php echo $data_retrieve_products['quantity']; ?></td>
	      <td><?php echo $data_retrieve_products['title']; ?></td>
	      <td><?php echo $data_retrieve_products['price']; ?></td>
	      <td><?php echo $data_retrieve_products['categories']; ?></td>
	      <td><?php echo $data_retrieve_products['brand']; ?></td>
	      <td><?php echo $data_retrieve_products['description']; ?></td>
	      <td><?php echo $data_retrieve_products['p_condition']; ?></td>
	      <td><img width="100px" height="100px" src="<?php echo 'http://localhost/test_shop/users/'.$data_retrieve_products['image_one']; ?>"></td>
	      <td><img width="100px" height="100px" src="<?php echo 'http://localhost/test_shop/users/'.$data_retrieve_products['image_two']; ?>"></td>	      
	    </tr>
	<?php } ?>
	  </tbody>
	</table>

	<?php 
	echo $data_retrieve_products['cat_id'];
		//closing the database connection
		$dtbs->close();
	 ?>
</body>
</html>

<?php 
	// echo "<br><br>";
	// var_dump($_SESSION);
	// echo $_SESSION["se_e_mail"];
?>