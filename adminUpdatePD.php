<?php
	include 'dpconnection.php';
 session_start();

	$uid=$_REQUEST['upid'];
	if (isset($_POST['update'])) {

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

$query = "UPDATE product_detail SET p_id='$category', pd_country='$country', pd_state='$state', pd_contact='$contact', pd_totalrooms='$totalroom', pd_bedrooms='$bedroom', pd_livingrooms='$living_rooms', pd_kitchen='$kitchen', pd_bathrooms='$bathrooms', pd_booked='$booked', pd_description='$detail' WHERE p_id='$uid'";

if ($conn->query($query) === TRUE) {
  echo "<script>alert('New record Updated successfully');</script>";
  echo "<script>location.href = 'adminViewPD.php?vpid=$uid';</script>";
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Product Detail</title>
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
			<!--Because Product and Select both have same variables, SO i change Variable from select and then form accordingly -->
			<?php
					$uid=$_REQUEST['upid'];
					$sql_1 = "SELECT * FROM product_detail WHERE p_id='$uid'";
					$result_1 = $conn->query($sql_1);
					$row_1 = $result_1->fetch_assoc();
				?>
			<div class="card-body">						
				<form action="" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label>Property Detail</label>
						<select class="form-control" name="category">
						<?php 
		                $p_id=$row_1['p_id'];
		                $sql2 = "SELECT * FROM product WHERE p_id='$p_id'";
		                $result2 = $conn->query($sql2);
		                $row2= $result2->fetch_assoc();
		            	?>
						<option value="<?php echo $row2['p_id'];?>"><?php echo $row2['p_name'];?></option>
							<?php

							// select Category
							$sql = "SELECT * FROM product";
                           $result = $conn->query($sql);
                           // condition apply from while loop
                              while($row = $result->fetch_assoc()) { ?>
                              	<option value="<?php echo $row['p_id'];?>"><!--To show with Name--><?php echo $row['p_name'];?></option>   
                                                    <?php }	 ?>
						</select>
					</div>

					<div class="form-group">
						<label>Country</label>
						<input class="form-control" type="text" name="country" value="<?php echo $row_1['pd_country'];?>">
					</div>

					<div class="form-group">
						<label>State</label>
						<input class="form-control" type="text" name="state" value="<?php echo $row_1['pd_state'];?>">
					</div>

					<div class="form-group">
						<label>Contact</label>
						<input class="form-control" type="number" name="contact" value="<?php echo $row_1['pd_contact'];?>">
					</div>

					<div class="form-group">
						<label>Total Rooms</label>
						<input class="form-control" type="number" name="totalroom" value="<?php echo $row_1['pd_totalrooms'];?>">
					</div>

					<div class="form-group">
						<label>BedRooms</label>
						<input class="form-control" type="number" name="bedroom" value="<?php echo $row_1['pd_bedrooms'];?>">
					</div>

					<div class="form-group">
						<label>Total Living Rooms</label>
						<input class="form-control" type="number" name="living_rooms" value="<?php echo $row_1['pd_livingrooms'];?>">
					</div>

					<div class="form-group">
						<label>Kitchen</label>
						<input class="form-control" type="number" name="kitchen" value="<?php echo $row_1['pd_kitchen'];?>">
					</div>


					<div class="form-group">
						<label>Bathrooms</label>
						<input class="form-control" type="number" name="bathrooms" value="<?php echo $row_1['pd_bathrooms'];?>">
					</div>


					<div class="form-group">
						<label>Booked?</label>
						<input class="form-control" type="text" name="booked" value="<?php echo $row_1['pd_booked'];?>">
					</div>


					<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" type="text" rows="5" cols="10" name="detail" value=""><?php echo $row_1['pd_description'];?></textarea>
					</div>


					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="update" value="Update">
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