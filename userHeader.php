<?php
if (!isset($_SESSION)) {
session_start();
if(!isset($_SESSION['users_Login'])) { //
  echo "<script>location.href='users_Login.php';</script>";
  }
}
?>
  <!--Starting Navbar from bootstrap-->
    <nav class="p-2x navbar navbar-expand-lg navbar-dark" style="background: #005b8f;">
          <div class="container">
            <a class="navbar-brand" href="usersViewProduct.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
            <a href=""><i class="fa-duotone fa-house"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                  <a class="nav-link" href="usersViewProduct.php"><h5>Home</h5><span class="sr-only">(current)</span></a>
                </li>
              </ul>
    	          <ul class="navbar-nav ms-auto">
                <?php  if(!isset($_SESSION['users_Login'])) { ?>
    	            <li class="nav-item">
    	              <a class="nav-link " href="users_Login.php"><h6>Login</h6></a>
    	            </li>
                <?php } else{?>

    	            <li class="nav-item">
    	              <a class="nav-link" href="users_Logout.php"><h6>Logout</h6></a>
    	            </li>
                <?php }   ?>
    	          </ul>
            </div>
          </div>
        </nav>
  <!--Ending Navbar-->