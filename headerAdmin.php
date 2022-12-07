<?php
if (!isset($_SESSION)) {
session_start();
}

if(!isset($_SESSION['adminlogin'])) {
    echo "<script>location.href='indexAdminLogin.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
  <link rel="stylesheet" href="css/style2.css">
  <!--Bootstrap JQuery-->
  <script src="js/jquery.slim.min.js"></script>
  <!--Bootstrap popper-->
  <script src="js/popper.min.js"></script>
  <!--Bootstrap Js-->
  <script src="js/bootstrap.min.js"></script>
</head>
<body>    
  <!--Starting Navbar from bootstrap-->
  <section>
    <nav class="p-3 navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand fa fa-home fa-2x" href="adminViewProduct.php"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
              <a class="nav-link" href="adminViewProduct.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminUploadProduct.php">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminUploadBody_images.php">Add Pictures</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminViewBody_images.php">View Pictures</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <?php  if(!isset($_SESSION['adminlogin'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="indexAdminLogin.php">Login</a>
            </li>
          <?php } else{?>
            <li class="nav-item">
              <a class="nav-link" href="adminLogout.php">Logout</a>
            </li>
<?php }             ?>
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <!--Ending Navbar-->