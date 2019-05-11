	<nav class="navbar navbar-expand-md fixed-top navbar-default bg-dark">
  <a class="navbar-brand" href="#">Test Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ABOUT</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="login.php">SELL A PRODUCT</a>
      </li>
      <li class="nav-item"> <!--
          <?php 
            //$_SESSION["se_e_mail"] = $_SESSION["se_e_mail"] OR "";
            if (!$_SESSION) { 
          ?>
                <a class="nav-link" href="login.php">LOG IN</a>
          <?php  } else { ?>
                <a class="nav-link" href="logout.php">LOG OUT</a>
             <?php }
          ?> --> <a class="nav-link" href="login.php">LOG IN</a>
      </li>
    </ul>
  </div>
</nav>
<div style="margin-bottom:50px; "></div>
