
<?php
session_start();
session_destroy();
header("location:users_Login.php");
?>