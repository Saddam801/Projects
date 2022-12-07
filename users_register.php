<!-- Code by Brave Coder - https://youtube.com/BraveCoder -->
<!-- class= 'alert alert-info' or class= 'alert alert-danger' -->
<?php

include 'dpconnection.php';

if (isset($_POST['register'])){

$name= $_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$password=$_POST['password'];

// This Query and 'if Statement' varify that email already exist or not
$sql = "SELECT * FROM customers WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<script>alert('This Email already exists');</script>";
}
else {

$query = "INSERT INTO customers (name, email, contact,password)
VALUES ('$name','$email', '$contact' ,'$password')";

if ($conn->query($query) === TRUE) {
  echo "<script>alert('New record created successfully');</script>";
  echo "<script>location.href = 'users_Login.php';</script>";
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Register Form - Brave Coder</title>
    <!-- Meta tag Keywords -->
    
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
                            <img src="images/image2.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Register Now</h2>

                        <form action="" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['register'])) { echo $name; } ?>" required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['register'])) { echo $email; } ?>" required>
                            <input type="tel" name="contact" placeholder="Enter Your Contact" value="<?php if (isset($_POST['register'])) { echo $contact; } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <button name="register" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="users_Login.php">Login</a>.</p>
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