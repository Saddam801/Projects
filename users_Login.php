<?php
include 'dpconnection.php';
 session_start();
if (isset($_POST['login'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];

   	$sql = "SELECT * FROM customers WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		// Users Login
		$_SESSION['users_Login'] =$row['id'];
		echo "<script>location.href = 'usersViewProduct.php';</script>";
	}else
	echo "<script>alert('Wrong Username or Password')</script>";
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/abc.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--Bootstrap JQuery-->
	<script src="js/jquery.slim.min.js"></script>
	<!--Bootstrap popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap Js-->
	<script src="js/bootstrap.min.js"></script>

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include 'userHeader.php'; ?>
    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/image.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login</h2>

                        <form action="" method="post">
                            
                            <input type="text" class="name" name="email" placeholder="Email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>

                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            
                            <div class="social-icons">
                                <p>Did You Forget Your Password!<a href="forget_password/customersForgottenPassword.php">Forgotten Password?</a>.</p>
                            </div>
                            <button name="login" value="login" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a  href="users_register.php">Create an Account</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    
    <!-- //form section start -->
    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
</body>
</html>