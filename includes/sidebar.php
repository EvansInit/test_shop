<div class="container-fluid">
  <div class="row">
    <nav class="bg-light sidebar">
      <div class="sidebar-sticky">
        <?php           
          while($data_sel_cat = mysqli_fetch_assoc($result_sel_cat)){ ?>
        <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><?php echo $data_sel_cat['category']; ?></span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h5> 
        <?php
           $cat_name = $data_sel_cat['category'];
          $sql11 = "SELECT `cat_id` FROM `categories` WHERE `category` = '$cat_name'";
          $data11 = mysqli_fetch_assoc($result11= $dtbs->query($sql11));
          $catID = $data11['cat_id'];
          //echo $catID;
          $sql_subcat = "SELECT `cat_id`,`category` FROM `categories` WHERE `parent` = '$catID'";
          $result_subcat = $dtbs->query($sql_subcat);

        ?>
        <ul class="nav flex-column mb-2">
           <?php while($data_subcat = mysqli_fetch_assoc($result_subcat)){ ?>
          <li class="nav-item">
            <a class="nav-link" href="category.php?page=<?php echo $data_subcat['cat_id']; ?>"><span data-feather="file-text"></span><?php echo $data_subcat['category']; ?></a>
          </li>
          <?php } ?>
        </ul>
      <?php } ?>
      </div>
    </nav>
  </div>
</div>