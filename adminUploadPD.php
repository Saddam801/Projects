<?php
	include 'dpconnection.php';
 	session_start();
 	$Upload_detail=$_REQUEST['up_PD_id'];
	if (isset($_POST['addProductDetail'])) {

	$category= $_POST['category'];
	$country= $_POST['country'];
	$state= $_POST['state'];
	$contact= $_POST['contact'];
	$totalroom= $_POST['totalroom'];
	$bedroom=$_POST['bedroom'];
	$living_rooms = $_POST['living_rooms'];
	$kitchen= $_POST['kitchen'];
	$bathrooms=$_POST['bathrooms'];
	$booked= $_POST['booked'];
	$detail=$_POST['detail'];

$query = "INSERT INTO product_detail (p_id, pd_country,pd_state ,pd_contact,pd_totalrooms,pd_bedrooms,pd_livingrooms,pd_kitchen,pd_bathrooms,pd_booked, pd_description)
VALUES ('$category','$country','$state','$contact','$totalroom','$bedroom','$living_rooms','$kitchen','$bathrooms','$booked','$detail')";

if ($conn->query($query) === TRUE) {
  echo "<script>alert('New record created successfully');</script>";
  echo "<script>location.href = 'adminViewPD.php?vpid=$Upload_detail';</script>";
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Detail</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<!--Bootstrap-->
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
				<h3>Give Datail for Your Property</h3>
			</div>
			<div class="card-body">						
				<form action="" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label>Property Detail</label>
						<select class="form-control" name="category" required>
							<option value="">--Select Category--</option>
							<?php
							// select Category WHERE p_id='$Upload_detail'
							$up_PD_id=$_REQUEST['up_PD_id'];
							$sql = "SELECT * FROM product WHERE p_id='$up_PD_id'";
                           $result = $conn->query($sql);
                           // condition apply from while loop
                              while($row = $result->fetch_assoc()) { ?>
                              	<option value="<?php echo $row['p_id'];?>"><!--To show with Name--><?php echo $row['p_name'];?></option>   
                                                    <?php }	 ?>
						</select>
					</div>

					<div class="form-group">
						<label>Country</label>
						<input class="form-control" type="text" name="country" placeholder="Country Name" required>
					</div>

					<div class="form-group">
						<label>State</label>
						<input class="form-control" type="text" name="state" placeholder="Write State Here!" required>
					</div>

					<div class="form-group">
						<label>Contact</label>
						<input class="form-control" type="number" name="contact" placeholder="Contact?" >
					</div>

					<div class="form-group">
						<label>Total Rooms</label>
						<input class="form-control" type="number" name="totalroom" placeholder="Total Rooms?" >
					</div>

					<div class="form-group">
						<label>BedRooms</label>
						<input class="form-control" type="number" name="bedroom" placeholder="Living Rooms?" >
					</div>

					<div class="form-group">
						<label>Total Living Rooms</label>
						<input class="form-control" type="number" name="living_rooms" placeholder="Living Rooms?" >
					</div>

					<div class="form-group">
						<label>Kitchen</label>
						<input class="form-control" type="number" name="kitchen" placeholder="Kitchen?" >
					</div>


					<div class="form-group">
						<label>Bathrooms</label>
						<input class="form-control" type="number" name="bathrooms" placeholder="Bathrooms?" >
					</div>


					<div class="form-group">
						<label>Booked?</label>
						<input class="form-control" type="text" name="booked" placeholder="Booked or Not?" required>
					</div>


					<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" type="text" rows="5" cols="10" name="detail" placeholder="You can give Property Detail!" ></textarea>
					</div>


					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="addProductDetail" value="Upload">
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