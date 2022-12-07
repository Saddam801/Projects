
<?php
session_start();
session_regenerate_id();




if ($_SESSION['otp']=$_POST['otp']) {

	header('location:f4.php');
} else {
	echo "<script>alert('Wrong Code!'); window.location.href = 'customersForgottenPassword.php';</script>";
}
?>