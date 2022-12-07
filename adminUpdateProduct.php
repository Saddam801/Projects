<?php
	include 'dpconnection.php';
 	session_start();
	$uid=$_REQUEST['upid'];
	if (isset($_POST['update'])) {

	$category= $_POST['category'];
	$pname= $_POST['pname'];
	$parea= $_POST['parea'];
	$pPrices= $_POST['pPrices'];
	$pAddress= $_POST['pAddress'];

// Pick old image data and update
	$img_url=$_POST['img_url'];
	$path= $img_url;
	if ($_FILES['pimage']['error']==0) {

	    $filename = $_FILES['pimage']['name'] ;
		$tempname = $_FILES['pimage']['tmp_name'] ; 
        $filesize = $_FILES['pimage']['size'] ;
        $fileextension = explode('.', $filename) ;
        $fileextension = strtolower(end($fileextension));
        $newfilename = uniqid().'images'.'.'.$fileextension ;
    	$path = "media/".$newfilename ;
    	@$move=move_uploaded_file($tempname, $path);
	}
	$affected = mysqli_query($conn,"UPDATE product SET c_id='$category', p_name='$pname', p_area='$parea', p_prices='$pPrices',p_address='$pAddress', p_thumb_image='$path' WHERE p_id='$uid'");

	if ($affected) {
		if (@$move)
			unlink($img_url);
					echo "<script>alert('Record Updated successfully');</script>";
            		echo "<script>location.href = 'adminViewProduct.php?upid='.$uid;</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Products</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--Bootstrap JQuery-->
	<script src="js/jquery.slim.min.js"></script>
	<!--Bootstrap popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap Js-->
	<script src="js/bootstrap.min.js"></script>
</head>
<body class="bg-secondary">
	<?php include 'headerAdmin.php'; ?>
	<div class="container my-5">
		<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="card text-center">
				<div class="card-header">
					<h3>Update Your Record</h3>
				</div>
				<!--Because category and Select both have same variables, SO i change Variable from select and then form accordingly -->
				<?php
					$uid=$_REQUEST['upid'];
					$sql1 = "SELECT * FROM product WHERE p_id='$uid'";
					$result1 = $conn->query($sql1);
					$row1 = $result1->fetch_assoc();
				?>
				<div class="card-body">						
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Property Type</label>
							<select class="form-control" name="category">
							<!--To show category at 'adminViewProduct.php' i pick this code from there-->
							<?php 
			                $c_id=$row1['c_id'];
			                $sql2 = "SELECT * FROM category WHERE id='$c_id'";
			                $result2 = $conn->query($sql2);
			                $row2 = $result2->fetch_assoc();
			                ?>
			                <option value="<?php echo $row2['id'];?>"><?php echo $row2['cat_name']; ?></option>
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
							<input class="form-control" type="text" name="pname" value="<?php echo $row1['p_name'];?>" >
						</div>

						<div class="form-group">
							<label>Area</label>
							<input class="form-control" type="number" name="parea" value="<?php echo $row1['p_area'];?>">
						</div>

						<div class="form-group">
							<label>Prices</label>
							<input class="form-control" type="number" name="pPrices" value="<?php echo $row1['p_prices'];?>">
						</div>

						<div class="form-group">
							<label>Address</label>
							<input class="form-control" type="text" name="pAddress" value="<?php echo $row1['p_address'];?>">
						</div>

						<div class="form-group">
							<label>Thumb Image</label>
							<input type="file" name="pimage" class="form-control">
							<input  class="form-control" type="hidden" name="img_url" value="<?php echo $row1['p_thumb_image'];?>">
							<img class="float-left" src="<?php echo $row1['p_thumb_image'];?>" width="100px;"><br><br>
						</div>

						<div class="form-group text-center">
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