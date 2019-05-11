<div class="container">
<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <!-- row for product name, price, quantity-->
    <div class="row">
	  <div class="form-group col">
	    <label for="exampleFormControlInput1">Product name: </label>
	    <input type="text" name="ttl" class="form-control" id="exampleFormControlInput1" placeholder="name">
	  </div>
	  <div class="form-group col">
	    <label for="exampleFormControlInput1">Product price: </label>
	    <input type="number" name="ksh" class="form-control" id="exampleFormControlInput1" placeholder="e.g 2000">
	  </div>
	  <div class="form-group col">
	    <label for="exampleFormControlInput1">Quantity(no of products): </label>
	    <input type="number" name="qtty" class="form-control" id="exampleFormControlInput1" placeholder="number of products">
	  </div>
	</div>
	<!-- row for category and brand-->
	<div class="row">
	
	  <div class="form-group col">
	    <label for="exampleFormControlSelect1">Category:</label>
	    <select class="form-control" name="cat" id="exampleFormControlSelect1">
	    <?php while ($result_selected_categories = mysqli_fetch_assoc($result_select_categories)) { ?>
	      <option><?php echo $result_selected_categories['category']; ?></option>
	      <option><?php //var_dump($result_selected_categories); ?></option>
	    <?php } ?>
	    </select>
	    
	  </div>
	
	  <div class="form-group col">
	    <label for="exampleFormControlSelect1">Sub-category:</label>
	    <select class="form-control" name="sub_cat" id="exampleFormControlSelect1">
	      <?php while ($result_selected_subcategories = mysqli_fetch_assoc($result_select_subcategories)) { ?>
	      <option><?php echo $result_selected_subcategories['category']; ?></option>
	      <option><?php //var_dump($result_selected_subcategories); ?></option>
	    <?php } ?>
	    </select>
	  </div>
	
	  <div class="form-group col">
	    <label for="exampleFormControlSelect1">Brand:</label>
	    <select class="form-control" name="brd" id="exampleFormControlSelect1">
	      <?php while ($result_selected_brand = mysqli_fetch_assoc($result_select_brand)) { ?>
	      <option><?php echo $result_selected_brand['brand_name']; ?></option>
	      <option><?php //var_dump($result_selected_subcategories); ?></option>
	    <?php } ?>
	    </select>
	  </div>
	  <div class="form-group col">
	  	<label for="exampleFormControlSelect1">Product Condition:</label>
	    <select class="form-control" name="cond" id="exampleFormControlSelect1">
	      <option>Brand New, never used</option>
	      <option>New, slightly used</option>
	      <option>Second-hand in good working condition</option>
	      <option>Second-hand but *cough* still good</option>
	    </select>
	  </div>	  	
	</div>
	<!-- row for images-->
	<div class="form-row">
		<div class="col custom-file">
		  <input type="file" name="pic1" class="form-control custom-file-input" id="customFile">
		  <label class="custom-file-label" for="customFile">Choose an image:</label>
		</div>
		<div class="col custom-file">
		  <input type="file" name="pic2" class="form-control custom-file-input" id="customFile">
		  <label class="custom-file-label" for="customFile">Choose 2nd image:</label>
		</div>
	</div>
	<!-- row for product description-->
	<div class="row">
	  <div class="form-group col">
	    <label for="exampleFormControlTextarea1">Product Description:</label>
	    <textarea class="form-control" name="dspt" id="exampleFormControlTextarea1" rows="3"></textarea>
	  </div>
	</div>

    <input class="btn btn-primary" type="submit" value="Submit The Above Product Details">

</form>
</div>


<?php 
	
	if($_POST){
		$a_quantity = $_POST['qtty'];
		$a_title = $_POST['ttl'];
		$a_price = $_POST['ksh'];
		$a_category = $_POST['cat'];
		$a_subcategory = $_POST['sub_cat'];
		$a_brand = $_POST['brd'];
		$a_description = $_POST['dspt'];
		$a_condition = $_POST['cond'];
		
		//uploading the first image
		
		$target_dir = "p_images/";
		$target_file = $target_dir . basename($_FILES["pic1"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image

		    $check = getimagesize($_FILES["pic1"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }

		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["pic1"]["size"] > 1500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["pic1"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["pic1"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		//uploading the 2nd image
		$target_dir2 = "p_images/";
		$target_file2 = $target_dir2 . basename($_FILES["pic2"]["name"]);
		$uploadOk2 = 1;
		$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image

		    $check2 = getimagesize($_FILES["pic2"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check2["mime"] . ".";
		        $uploadOk2 = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk2 = 0;
		    }

		// Check if file already exists
		if (file_exists($target_file2)) {
		    echo "Sorry, file already exists.";
		    $uploadOk2 = 0;
		}
		// Check file size
		if ($_FILES["pic2"]["size"] > 1500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk2 = 0;
		}
		// Allow certain file formats
		if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
		&& $imageFileType2 != "gif" && $imageFileType2 != "PNG" && $imageFileType2 != "JPG" && $imageFileType2 != "JPEG" && $imageFileType2 != "GIF") {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk2 = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk2 == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["pic2"]["tmp_name"], $target_file2)) {
		        echo "The second file ". basename( $_FILES["pic2"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your second file.";
		    }
		}

		// echo "<br> Title is ".$a_title."<br>";
		// echo "Category is ".$a_category."<br>";
		// echo "Brand is ".$a_brand."<br>";
		// echo "Price is ".$a_price."<br>";
		// echo "Quantity is ".$a_quantity."<br>";
		// echo "Product condition is ".$a_condition."<br>";
		// echo "Product description is ".$a_description."<br>";
		// echo "<br><br>Path for image one is".$target_file." <br> Path for image two is".$target_file2;

		//inserting data to database
		if ($user_id && $user_id > 0){

			$sql = "INSERT INTO `products` (`user_id`, `title`, `price`, `categories`, `subcategories`, `brand`, `description`, `p_condition`, `quantity`, `image_one`, `image_two`) VALUES ('$user_id', '$a_title', '$a_price', '$a_category', '$a_subcategory', '$a_brand', '$a_description', '$a_condition', '$a_quantity', '$target_file', '$target_file2')";
			//checking if insertion was successfull
			if ($dtbs->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $dtbs->error;
			}

		}


	}else{ ?>
		<script type="text/javascript">
			//alert("Error. Fill the form again");
		</script>
	<?php }

?>
