<?php
	
	include 'dpconnection.php';
	session_start();

	if (!isset($_SESSION['users_Login']) && isset($_GET['s']) && $_GET['s'] == 'e'){
		echo '<script>alert("you need to login before viewing the details!")</script>';
		echo '
			<script>
			let q = confirm("do you want to login to view details?");
			if (q){
				window.location = "users_Login.php";
			}
			</script>
		';
	}

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

<!--Banner Section-->	
	<section>
		
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  
		  <div class="carousel-inner">
		  <?php
					        	$sql = mysqli_query($conn,"SELECT * FROM pics order by id desc");
								$result = mysqli_fetch_array($sql);

								$fetchlastimg = $result['pics_body'];

								?>

								
		    <div class="carousel-item active">
		      <img class="d-block w-100" height="680px" src="<?php echo $result['pics_body'];?>" alt="First slide">
		    </div>
			<?php
			$sql_2 = mysqli_query($conn,"SELECT * FROM pics order by id desc");
								while($result_2 = mysqli_fetch_array($sql_2)){
									if($result_2['pics_body']==$fetchlastimg)
									{

									}
									else{

								?>

			<div class="carousel-item">
		      <img class="d-block w-100" height="680px" src="<?php echo $result_2['pics_body'];?>" alt="First slide">
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




		<!--Heading Section-->
	<section>
		<div class="container jumbotron" style=" margin-top: 100px;">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" align="center">
						<h1 class="text-white display-5">AHSAN REALITY COMPANY</h1>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</section>

<!--Search Form-->

<section>

	<div class="container d-flex justify-content-center" style="margin-top: 80px; margin-bottom: 70px;">
	<div class="col-md-12">
		<form method="get" action="usersViewProduct.php">
			<div class="row">
				<div class="col-md-8">
					<input type="text" name="filter_value" class="form-control" placeholder="Search...." required>
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-primary">Search</button>
				</div>			
			</div>
		</form>
	</div>		
	</div>

</section>


	<!--Card Section-->
	<section style="margin-top: 70px;">
		<div class="container-fluid my-5">
			<div class="col-md-12">
				<div class="my-5" style="margin-left: 110px;">
					<?php
					//---Pagination Begin---
						$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
		        		$limit=6;
						$offset=($page-1)*$limit;
		        		?>
				</div>
				<div class="row" style="margin-left: 140px;">
		<!--		<div class="row" style="margin-left: 70px;"> -->
		        	<?php

						if (isset($_GET['filter_value'])){
							$search = $_GET['filter_value'];					
						}else{
							$search = "";
						}

						if (!empty($search)){

							$sql = "SELECT * FROM product WHERE CONCAT(p_name,c_id,p_area,p_prices,p_address) LIKE '%$search%' order by p_id DESC limit $offset, $limit";
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
								<a class="btn btn-primary my-2" href="usersViewPD.php?vpid=<?php echo $row['p_id'];?>">View More</a>
								</div>

								<?php 
								}}

						}else{					

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
			                <a class="btn btn-primary my-2" href="usersViewPD.php?vpid=<?php echo $row['p_id'];?>">View More</a>
				</div>
						

		          <?php }}
						}
						?>
						<!---Pagination Begin--->
						<?php

						if (isset($_GET['filter_value'])){
							$search = $_GET['filter_value'];					
						}else{
							$search = "";
						}

						if (!empty($search)){

							$pagination = "SELECT * FROM product WHERE CONCAT(p_name,c_id,p_area,p_prices,p_address) LIKE '%$search%' order by p_id DESC";
							$run_q= $conn->query($pagination);
							$total_post=$run_q->num_rows;
							$pages=ceil($total_post/$limit);
							if ($total_post > $limit) {
							?>
							<nav aria-label="Page navigation" style="width:100vw;">
						  <ul class="pagination justify-content-center pt-5 mx-5">
						  <?php for ($i=1; $i <=$pages ; $i++) { ?>

							<li class="page-item <?= ($i==$page)? $active="active" :"" ?>">
								<a class="page-link" href="usersViewProduct.php?filter_value=<?= $search ?>&page=<?= $i ?>">
									<?= $i ?>
								</a>
							</li>
							<?php } ?>
							</ul>
						<?php } ?>
					</nav>
							
						<?php }else{

						$pagination="SELECT * FROM product";
						$run_q= $conn->query($pagination);
						$total_post=$run_q->num_rows;
						$pages=ceil($total_post/$limit);
						if ($total_post > $limit) {
						?>
						<nav aria-label="Page navigation" style="width:100vw;">
						  <ul class="pagination justify-content-center pt-5 mx-5">
						  	<?php for ($i=1; $i <=$pages ; $i++) { ?>

						    <li class="page-item <?= ($i==$page)? $active="active" :"" ?>">
							<a class="page-link" href="usersViewProduct.php?page=<?= $i ?>">
						    		<?= $i ?>
						    	</a>
						    </li>
						  	<?php } ?>
						  </ul>
						<?php } ?>
					</nav>
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