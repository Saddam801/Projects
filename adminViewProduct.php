<?php

	include 'dpconnection.php';
 	session_start();
	if (isset($_REQUEST['delitId'])) {

		// ab store karna hai
		$ded=$_REQUEST['delitId'];

		$sql2 = "SELECT * FROM product WHERE p_id='$ded'";
		$result = $conn->query($sql2);
		$row = $result->fetch_assoc();
		unlink($row['p_thumb_image']);
		// sql to delete a record
		$sql = "DELETE FROM product WHERE p_id='$ded'";

	if ($conn->query($sql) === TRUE) {
	  echo "<script>alert('Record Deleted successfully');</script>";
	  echo "<script>location.href='adminViewProduct.php';</script>";;
	} else {
	  echo "Error deleting record: " . $conn->error;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Property</title>
	<!--Bootstrap Datatable-->
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--Bootstrap JQuery-->
	<script src="js/jquery.slim.min.js"></script>
	<!--Bootstrap popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap Js-->
	<script src="js/bootstrap.min.js"></script>

</head>
<body>
	<?php include 'headerAdmin.php'; ?>
	<div class="container-fluid mt-4">
		<div class="card p-5">
			<table id="example" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		            	<th>#</th>
		                <th>Category</th>
		                <th>Property Name</th>
		                <th>Area</th>
		                <th>Prices</th>
		                <th>Address</th>
		                <th>Image</th>
		                <th>View More</th>
		                <th>View Image</th>
		                <th>Add Detail</th>
		                <th>Add Images</th>
		                <th>Update</th>
		                <th>Delete</th>
		            </tr>
		        </thead>
		        <tbody>

		        	<?php
			        	$k=0;
			        	$sql = "SELECT * FROM product order by p_id DESC";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) { ?>

		            <tr>
		            	<td><?php echo ++$k; ?></td>
    			        <td><?php 
		                $c_id=$row['c_id'];
		                $sql1 = "SELECT * FROM category WHERE id='$c_id'";
		                $result1 = $conn->query($sql1);
		                $row1 = $result1->fetch_assoc();
		                echo $row1['cat_name'];
		                ?></td>
		                <td><?php echo $row['p_name'];?></td>
			            <td><?php echo $row['p_area'];?>Sqft.</td>
			            <td>$<?php echo $row['p_prices'];?></td>
			            <td><?php echo $row['p_address'];?></td>
		                <td><img class="img-fluid" src="<?php echo $row['p_thumb_image'];?>"></td>
		                <td><a class="btn btn-primary" href="adminViewPD.php?vpid=<?php echo $row['p_id'];?>">View More</a></td>
		                <td><a class="btn btn-primary" href="adminViewImages.php?apid=<?php echo $row['p_id'];?>">View Images</a></td>
		                <td><a class="btn btn-info" href="adminUploadPD.php?up_PD_id=<?php echo $row['p_id'];?>">Upload Detail</a></td>
		                <!----> 
		                <td><a class="btn btn-info" href="adminUploadImages.php?up_images_id=<?php echo $row['p_id'];?>">Upload Images</a></td>
		                <td><a class="btn btn-warning" href="adminUpdateProduct.php?upid=<?php echo $row['p_id'];?>">Edit</a></td>

		                <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="adminViewProduct.php?delitId=<?php echo $row['p_id'];?>">Delete</a></td>
		            </tr>
		        <?php   }
						 } else {
						   echo "0 results";
						}
		        	?>

		        </tbody>
		        
		    </table>			
		</div>
	</div>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
    	$(document).ready(function () {
    		$('#example').DataTable();
		});
    </script>
</body>
</html>
