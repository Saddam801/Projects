<?php

	include 'dpconnection.php';
 	session_start();
	if (isset($_REQUEST['delete_Id'])) {
		// ab store karna hai
		$ded=$_REQUEST['delete_Id'];
		// sql to delete a record
		$sql5 = "DELETE FROM product_detail WHERE pd_id='$ded'";

	if ($conn->query($sql5) === TRUE) {
	  echo "<script>alert('Record Deleted successfully');</script>";
	  echo "<script>location.href='adminViewPD.php';</script>";;
	} else {
	  echo "Error deleting record: " . $conn->error;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Property Detail</title>
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
<body class="">
	<?php include 'headerAdmin.php'; ?>
	
	<div class="container-fluid">

		<div class="card p-5">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
		        <tbody>

		        	<?php
		        		$vpid=$_REQUEST['vpid'];
			        	$sql = "SELECT * FROM product_detail WHERE p_id='$vpid'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) { ?>

		            <tr>
		            	<th>Property Owner</th>
		            	<td>
    			        <?php 
		                $p_id=$row['p_id'];
		                $sql1 = "SELECT * FROM product WHERE p_id='$p_id'";
		                $result1 = $conn->query($sql1);
		                $row1= $result1->fetch_assoc();
		                echo $row1['p_name'];
		                ?></td>
		                <th>Country</th>
		                <td><?php echo $row['pd_country'];?></td>
		                <th>State</th>
			            <td><?php echo $row['pd_state'];?></td>
			        </tr>
			        <tr>
		                <th>Contact</th>
			            <td><?php echo $row['pd_contact'];?></td>
		                <th>Total Rooms</th>
			            <td><?php echo $row['pd_totalrooms'];?></td>
		                <th>Bedrooms</th>
			            <td><?php echo $row['pd_bedrooms'];?></td>
			        </tr>
			        <tr>
		                <th>Living Rooms</th>
			            <td><?php echo $row['pd_livingrooms'];?></td>
		                <th>Kitchen</th>
			            <td><?php echo $row['pd_kitchen'];?></td>
		                <th>Bathrooms</th>
			            <td><?php echo $row['pd_bathrooms'];?></td>
			        </tr>
			        <div style="width: 100%;">
		                <th>Booked</th>
			            <td><?php echo $row['pd_booked'];?></td>
		                <th>Description</th>
			            <td><?php echo $row['pd_description'];?></td>
			        </div>
			<div class="row">
				<div class="">
		                	<td><a class="btn btn-info" href="adminUpdatePD.php?upid=<?php echo $vpid;?>"><i style='font-size:20px' class='far'>&#xf044;</i></a></td>
			                <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="adminViewProduct.php?delete_Id=<?php echo $row['pd_id'];?>"><i style='font-size:24px' class='far'>&#xf2ed;</i></a></td>
			</div>
		        <?php   }
						 } else {
						   echo "0 results";
						}
		        	?>

		        </tbody>
		        
		    </table>			
		</div>
	</div>
</body>
</html>
