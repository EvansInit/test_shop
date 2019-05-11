<?php 
require_once '../config/config.php';
//$id = $_POST['id'];
if(isset($_POST["prod_id"])){
  $id = $_POST["prod_id"];
}else{
  $id = NULL;
}
$id = (int)$id;

$sql3 = "SELECT * FROM products WHERE prod_id = '$id'";
$result3 = $dtbs->query($sql3);
$data_sel_prod3 = mysqli_fetch_assoc($result3);
$brand_id = $data_sel_prod3['brand'];
$sql4 = "SELECT brand_name FROM brand WHERE brand_id = '$brand_id'";
$brand_query = $dtbs->query($sql4);
$brand = mysqli_fetch_assoc($brand_query);


 ?>

<!--modal for details when clicked -->
<?php ob_start();
//session_start(); ?> <!-- starts a buffer then read the content and send it to the ajax as the data object-->

<div class="modal fade details-modal" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-modal" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title text-center"><?php echo $data_sel_prod3['title']; ?></h4>
                        <button type="button" class="close" onclick="closeModal()" aria-label="close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
               <!-- start of modal body -->
               <div class="modal-body">
                 <div class="container-fluid">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="center-block">
                           		<!-- carousel for the image-->
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								  <ol class="carousel-indicators">
								    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>					    
								  </ol>
								  <div class="carousel-inner">
								    <div class="carousel-item active" data-interval="4050">
								      <img src="<?php echo "http://localhost/test_shop/users/".$data_sel_prod3['image_one']; ?>" style="width:300px; height: 300px;"alt="<?php echo $data_sel_prod3['title']; ?>" class="d-block details img-responsive">
								    </div>
								    <div class="carousel-item" data-interval="4050">
								      <img src="<?php echo "http://localhost/test_shop/users/".$data_sel_prod3['image_two']; ?>" style="width:300px; height: 300px;"alt="<?php echo $data_sel_prod3['title']; ?>" class="d-block details img-responsive">
								    </div>								   
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								    <span class="carousel-control-prev-icon" aria-hidden="true">Prev</span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								    <span class="carousel-control-next-icon" aria-hidden="true">Next</span>
								    <span class="sr-only">Next</span>
								  </a>
								</div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                          <p style="font-size: 20px;">Main Category: <strong><span style="font-size: 20px;"><?php echo $data_sel_prod3['categories']; ?></span></strong></p>
                          <p style="font-size: 20px;">Sub Category: <strong><span style="font-size: 20px;"><?php echo $data_sel_prod3['subcategories']; ?></span></strong></p>
                          <p style="font-size: 20px;">Brand: <strong><span style="font-size: 20px;"><?php echo $brand['brand_name']; ?></span></strong></p>
                          <h4>Details: </h4>
                          <p><?php echo nl2br($data_sel_prod3['description']); ?></p>
                          <hr>
                          <p style="font-size: 20px;">Price:<strong><span style="font-size: 25px;"><?php echo " Kshs. ".$data_sel_prod3['price'] ?></span></strong></p>                          
                          <p style="font-size: 20px;">Quantity:<strong><span style="font-size: 20px;"><?php echo $data_sel_prod3['quantity'] ?></span></strong></p>
                        </div>
                     </div>
                 </div>
               </div>
               <!--end of modal body -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="closeModal()">Close</button>
                <button type="button" class="btn btn-warning"><span></span> Fetch Seller</button>
              </div>
        </div>
   </div>
</div>

<script type="text/javascript">
  //closing modal and deleting parsed data
  function closeModal(){
    jQuery('#details-modal').modal('hide');
    setTimeout(function(){
      jQuery('#details-modal').removeData();
      jQuery('.modal-backdrop').removeData();
    },20);

  }
  
</script>


<?php echo ob_get_clean(); 
  //session_destroy(); ?><!-- clears the memory of our buffer --> 