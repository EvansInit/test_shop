<?php 
	session_start();
	require_once("config/config.php");
	include('includes/head.php');
?>
	<h3 class="text-center">Trending Items</h3>

	<?php
		$sql_sel_prod = "SELECT `prod_id`, `title`, `price`, `image_one`, `categories` FROM `products`";
		$result_sel_prod = $dtbs->query($sql_sel_prod);
		//var_dump($result_sel_prod);

		//selecting main categories for sidebar
		$sql_sel_cat = "SELECT * FROM `categories` WHERE `parent` = '0'";
		$result_sel_cat = $dtbs->query($sql_sel_cat);

	?>

	<div class="container">
		
	  <div class="row">
	    <div class="col-2">
	        <?php include("includes/sidebar.php"); ?>
	    </div>
	    <div class="col-10">
	    	
	    <div class="row">
			  <?php while ($data_sel_prod = mysqli_fetch_assoc($result_sel_prod)) { ?>
		  <div class="col-3">
			  <div class="card" style="">
			  <img width="150px" height="180px" src="http://localhost/test_shop/users/<?php echo $data_sel_prod['image_one']; ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $data_sel_prod['title']; ?></h5>
			    <!--<h6 class="card-subtitle mb-2 text-muted"><?php echo $data_sel_prod['categories']; ?></h6> -->
			    <h6 class="card-title"><?php echo "Kshs. ".$data_sel_prod['price']; ?></h6>
			   
			     <button type="button" class="btn btn-sm btn-primary" onclick="detailsmodal(<?php echo $data_sel_prod['prod_id']; ?>)">Check More Details</button>
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

