
<?php
session_start();
session_regenerate_id();
include '../dpconnection.php';

$new=$_POST['new'];

$sql = mysqli_query($conn,"update customers set password = '$new' where email = '".$_SESSION['email']."'");

if ($sql) {
	echo "<script>alert('password updated successfully');</script>";
	header('Location: ../users_Login.php');
} else {
	echo "<script>alert('No Email Found!'); window.location.href = 'customersForgottenPassword.php';</script>";
}
?>