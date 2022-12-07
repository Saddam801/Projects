<?php
	
	include 'dpconnection.php';
	session_start();

	if (!isset($_SESSION['users_Login'])){
		header('Location: usersViewProduct.php?s=e');
	}

	$vpid=$_REQUEST['vpid'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<!--Bootstrap Datatable-->
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--Bootstrap JQuery-->	
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>	
	<!--Bootstrap popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap Js-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<!--Tital of the Page-->
	<title>View Property</title>
<style type="text/css">
	
.jumbotron {
    background-color:#5D4657 !important;
}
</style>
</head>
<body>
	<!--Header Section-->
	<?php include 'userHeader.php'; ?>
	<!------->


<!--Banner Section-->	
	<section>
		
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  
		  <div class="carousel-inner">
		  <?php
		  $connect = mysqli_connect("localhost","root","","ahsanrealty");

				        		
					        	$sql = mysqli_query($connect,"SELECT * FROM images WHERE p_id='$vpid' order by id desc");
								$result = mysqli_fetch_array($sql);

								$fetchlastimg = $result['image'];

								?>

								
		    <div class="carousel-item active">
		      <img class="d-block w-100" height="665px" src="<?php echo $result['image'];?>" alt="First slide">
		    </div>
			<?php
			$sql_2 = mysqli_query($connect,"SELECT * FROM images WHERE p_id='$vpid' order by id desc");
								while($result_2 = mysqli_fetch_array($sql_2)){
									if($result_2['image']==$fetchlastimg)
									{

									}
									else{

								?>

			<div class="carousel-item">
		      <img class="d-block w-100" height="665px" src="<?php echo $result_2['image'];?>" alt="First slide">
		    </div>
		    
			<?php
									}
			}
			?>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>

	</section>


<!--Detail Section-->
	<div class="container-fluid" style="margin-top: 40px; ">

		<div class="card p-5">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<div class="row">
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
		        <?php   }
						 } else {
						   echo "0 results";
						}
		        	?>


			        </tbody>		        
		    	</div>
		    </table>			
		</div>
	</div>

	<!--Footer Section-->
	<?php include 'users_footer.php'; ?>

</body>
</html>