<?php

include 'dpconnection.php';

if (isset($_POST['add_category'])){

$cat_name= $_POST['cat_name'];

$query = "INSERT INTO category (cat_name)
VALUES ('$cat_name')";

if ($conn->query($query) === TRUE) {
  echo "<script>alert('New record created successfully');</script>";
  echo "<script>location.href = 'adminUploadProduct.php';</script>";
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--Bootstrap JQuery-->
	<script src="js/jquery.slim.min.js"></script>
	<!--Bootstrap popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap Js-->
	<script src="js/bootstrap.min.js"></script>
</head>
<body class="img-bg1">
	<div class="container pad-top">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="card text-center">
					<div class="card-header">
						<h3>Upload Category</h3>
					</div>
					<div class="card-body">						
						<form action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Category Name</label>
								<input class="form-control" type="text" name="cat_name" required>
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="add_category" value="Upload Category">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</body>
</html>