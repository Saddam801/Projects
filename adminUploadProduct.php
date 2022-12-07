<?php
	include 'dpconnection.php';
 	session_start();
	if (isset($_POST['addProduct'])) {
	$category= $_POST['category'];

	$pname= $_POST['pname'];
	$parea= $_POST['parea'];
	$pPrices= $_POST['pPrices'];
	$pAddress= $_POST['pAddress'];	

	            $filename = $_FILES['pimage']['name'] ;
                $tempname = $_FILES['pimage']['tmp_name'] ;
                $filesize = $_FILES['pimage']['size'] ;
                $fileextension = explode('.', $filename) ;
                $fileextension = strtolower(end($fileextension));

                $newfilename = uniqid().'images'.'.'.$fileextension ;
                $path = "media/".$newfilename ;
                mysqli_query($conn,"INSERT INTO product (c_id, p_name, p_area, p_prices, p_address, p_thumb_image) VALUES ('$category', '$pname', '$parea', '$pPrices','$pAddress','$path')");
             	
				if (move_uploaded_file($tempname, $path))  {
					echo "<script>alert('Record Created successfully');</script>";
            		echo "<script>location.href = 'adminViewProduct.php';</script>";
             	} else {
              		echo "Error updating record: " . $conn->error;
                }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Products</title>

	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--Bootstrap JQuery-->
	<script src="js/jquery.slim.min.js"></script>
	<!--Bootstrap popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap Js-->
	<script src="js/bootstrap.min.js"></script>
</head>
<body class="img-bg">
	<?php include 'headerAdmin.php'; ?>
	<div class="container-fluid my-5">
		<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="card text-center">
				<div class="card-header">
					<h3>Add Your Property</h3>
				</div>
				<div class="card-body">						
					<form action="" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label>Property Type</label>
							<select class="form-control" name="category" required>
								<option value="">--Select Category--</option>
								<?php
								// select Category
								
								$sql = "SELECT * FROM category";
	                           $result = $conn->query($sql);
	                           // condition apply from while loop
	                              while($row = $result->fetch_assoc()) { ?>
	                              	<option value="<?php echo $row['id'];?>"><!--To show with Name--><?php echo $row['cat_name'];?></option>   
	                                                    <?php }	 ?>
							</select>
						</div>

						<div class="form-group">
							<label>Property Name</label>
							<input class="form-control" type="text" name="pname" placeholder="Enter Owner's Name" required>
						</div>

						<div class="form-group">
							<label>Area</label>
							<input class="form-control" type="number" name="parea" placeholder="Give Total Area" required>
						</div>

						<div class="form-group">


							<label>Prices</label>
							<input class="form-control" type="number" name="pPrices" placeholder="Estimated Price?" required>
						</div>

						<div class="form-group">
							<label>Address</label>
							<input class="form-control" type="text" name="pAddress" placeholder="Address?" required>
						</div>

						<div class="form-group">
							<label>Thumb Image</label>
							<input  class="form-control" type="file" name="pimage">
						</div>

						<div class="form-group">
							<input class="btn btn-primary" type="submit" name="addProduct" value="Upload">
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