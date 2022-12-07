<?php
	
	include 'dpconnection.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>

    <!-- Meta tag Keywords -->
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="css/abc.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--Bootstrap JQuery-->
	<script src="js/jquery.slim.min.js"></script>
	<!--Bootstrap popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap Js-->
	<script src="js/bootstrap.min.js"></script>

	<title>View Property</title>
	<!--Bootstrap JQuery-->	
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>	
	<!--Bootstrap Js-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<style type="text/css">
		
	.jumbotron {
	    background-color:#375BCB !important;
	}
	strong{
		background-color: #099222;
		width: 70px;
		border: 1px solid none;
		padding: 0px;
}
	</style>
</head>
<body>
	<!--Header Section-->
	<?php include 'userHeader.php'; ?>


	<!--Card Section-->
	<section style="margin-top: 70px;">
		<div class="container-fluid my-5">
			<div class="col-md-12">
				<div class="row" style="margin-left: 110px;">
		<!--		<div class="row" style="margin-left: 70px;"> -->
		        	<?php
						//---Pagination Begin---
		        		if (!isset($_REQUEST['page'])) {
		        			$page=1;
		        		}
		        		else
		        		{
		        			$page=$_REQUEST['page'];
		        		}

		        		$limit=6;
						$offset=($page-1)*$limit;
						//----------------------
			        	$sql = "SELECT * FROM product order by p_id DESC limit $offset, $limit";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) { ?>
				<div class="col-md-4">

			                <img class="img-fluid" src="<?php echo $row['p_thumb_image'];?>" style="width:295px; height: 295px;"><br>
			            	<strong style="position: absolute;left: 240px;top: -1.5px;z-index: 3;color: white;">
			            	<?php
			                $c_id=$row['c_id'];
			                $sql1 = "SELECT * FROM category WHERE id='$c_id'";
			                $result1 = $conn->query($sql1);
			                $row1 = $result1->fetch_assoc();
			                echo $row1['cat_name'];
			                ?></strong><br>
				            <b style="position: absolute;left: 15.2px;top: 246.8px;z-index: 3;color: white;">
				            <?php echo $row['p_area'];?>Sqft.<br>
				            $<?php echo $row['p_prices'];?><br></b>
			                <?php echo $row['p_name'];?><br>
				            <?php echo $row['p_address'];?><br>
			                <a class="btn btn-primary" href="usersViewPD.php?vpid=<?php echo $row['p_id'];?>">View More</a>
				</div>
						

		          <?php }
						}
						?>
						<!---Pagination Begin--->
						<?php
						$pagination="SELECT * FROM product";
						$run_q= $conn->query($pagination);
						$total_post=$run_q->num_rows;
						$pages=ceil($total_post/$limit);
						if ($total_post>$limit) {
						?>
						<ul class="pagination pt-4 pb-5">

						<!---Pagination Begin--->
<!-- // <?= ($i==$page)? $active="active" :"" ?>-->
							<?php for ($i=1; $i <=$pages ; $i++) { ?>								
							<li class="page-item  

								<?php	if ($i==$page) {
										echo $active="active";
									}
									else
									{
										echo "";
									}
									?>
							 ">
								<a class="page-link" href="users_pagination.php?page=<?= $i ?>">
									<?= $i ?>
								</a>
							</li>

						<?php	} ?>
						</ul>
					<?php } ?>
						<!---------------------->
			<!--	</div> -->

			</div>
		</div>
	</section>
	<!--Footer Section-->
	<?php include 'users_footer.php'; ?>
</body>
</html>