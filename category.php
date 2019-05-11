<?php 
	//session_start();
	require_once("config/config.php");
	include('includes/head.php');

	//selecting main categories for sidebar
	$sql_sel_cat = "SELECT * FROM `categories` WHERE `parent` = '0'";
	$result_sel_cat = $dtbs->query($sql_sel_cat);

	if (isset($_GET["page"])) {
		$number = filter_var($_GET["page"], FILTER_VALIDATE_INT);

		if ($number === false) {
		//echo ('Invalid URL');
		header('Location: http://localhost/test_shop/');
		}
		//selecting sub category name to appear on categories page
		$sql_sel_cat_details = "SELECT `category`,`parent` FROM `categories` WHERE `cat_id`='$number'";
		$result_sel_cat_details =$dtbs->query($sql_sel_cat_details);
		$data_sel_cat_details = mysqli_fetch_assoc($result_sel_cat_details);
		$parentno = $data_sel_cat_details['parent'];

		//selecting main category name to appear on categories page
		$sql_sel_maincat = "SELECT `category` FROM `categories` WHERE `cat_id`='$parentno'";
		$result_sel_maincat =$dtbs->query($sql_sel_maincat);
		$data_sel_maincat = mysqli_fetch_assoc($result_sel_maincat);

		$subcategories = $data_sel_cat_details['category'];
		$sql_sel_prod_catpg = "SELECT `prod_id`, `title`, `price`, `image_one`,`categories` FROM `products` WHERE `subcategories` = '$subcategories'";
		$result_sel_prod_catpg = $dtbs->query($sql_sel_prod_catpg);






	}
?>

<h1 class="text-center"> <?php echo $data_sel_maincat['category']; ?>--><?php echo $data_sel_cat_details['category']; ?></h1>

<div class="container">
<div class="row">

	<div class="col-2">
		<?php include("includes/sidebar.php"); ?>
	</div>

	<div class="col-10">
		

		 <div class="row">
			  <?php while ($data_sel_prod_catpg = mysqli_fetch_assoc($result_sel_prod_catpg)) { ?>
		  <div class="col-3">
			  <div class="card" style="">
			  <img width="150px" height="180px" src="http://localhost/test_shop/users/<?php echo $data_sel_prod_catpg['image_one']; ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $data_sel_prod_catpg['title']; ?></h5>
			    <!--<h6 class="card-subtitle mb-2 text-muted"><?php echo $data_sel_prod_catpg['categories']; ?></h6> -->
			    <h6 class="card-title"><?php echo "Kshs. ".$data_sel_prod_catpg['price']; ?></h6>
			   
			     <button type="button" class="btn btn-sm btn-primary" onclick="detailsmodal(<?php echo $data_sel_prod_catpg['prod_id']; ?>)">Check More Details</button>
			  </div>
			</div>
		  </div>
			 <?php } ?>
		</div>

	</div>
</div>
</div>

<script src="external/3.3.1jquery.min.js"></script>
<script src="external/bootstrap.min.js"></script>
<script src="external/popper.min.js"></script>
		


<?php include("includes/footer.php"); ?>