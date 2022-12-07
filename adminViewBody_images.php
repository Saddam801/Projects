<?php

	include 'dpconnection.php';
 	session_start();
	if (isset($_REQUEST['delitId'])) {
    
		// ab store karna hai
		$ded=$_REQUEST['delitId'];
		$sql2 = "SELECT * FROM pics WHERE id='$ded'";
		$result = $conn->query($sql2);
		$row = $result->fetch_assoc();

		unlink($row['pics_body']);

		// sql to delete a record
		$sql = "DELETE FROM pics WHERE id='$ded'";

	if ($conn->query($sql) === TRUE) {
	  echo "<script>alert('Record Deleted successfully');</script>";
	  echo "<script>location.href='adminViewBody_images.php;</script>";
	} else {
	  echo "Error deleting record: " . $conn->error;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Images</title>
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
		        <thead>
		        	<tr>
		        		<th>Images</th>
		        		<th>Action</th>
		        	</tr>
</thead>
<tbody>
		        	<?php
		        		
			        	$sql = "SELECT * FROM pics";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) { ?>

		            	<tr>
		         
		                <td><img class="img-fluid" src="<?php echo $row['pics_body'];?>"></td>
		                <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="adminViewBody_images.php?delitId=<?php echo $row['id'];?>"><i style='font-size:24px' class='far'>&#xf2ed;</i></a></td>
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
</body>
</html>