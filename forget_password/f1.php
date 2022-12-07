
<?php
session_start();
session_regenerate_id();
include '../dpconnection.php';
$ee=$_POST['em'];

$sql = mysqli_query($conn,"SELECT * FROM customers WHERE email='$ee'");
$result = mysqli_fetch_array($sql);
$email = $result['email'];

if ($email) {
	$otp = rand(100000,999999);

	
    $message = "Forget Password Verification <br> Your Otp is ".$otp;
    //mail($to,$message);  Send otp to mail if you want
    mysqli_query($conn,"update customers set otp = '$otp' where email = '$ee'");
    
    $_SESSION['email']=$email;
	header('location:f2.php');
} else {
	echo "<script>alert('No Email Found!'); window.location.href = 'customersForgottenPassword.php';</script>";
}
?>