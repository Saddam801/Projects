<?php

include 'dpconnection.php';
 	session_start();
if (isset($_POST['Upload_Images'])) {

			for ($i=0; $i < count($_FILES['pd_image']['name']); $i++) { 
				
	            $filename = $_FILES['pd_image']['name'][$i];
                $tempname = $_FILES['pd_image']['tmp_name'][$i]; 
                $filesize = $_FILES['pd_image']['size'][$i];
                $fileextension = explode('.', $filename) ;
                $fileextension = strtolower(end($fileextension));

                $newfilename = uniqid().'images'.'.'.$fileextension ;
                $path = "images/".$newfilename ;
                $sql = mysqli_query($conn,"INSERT INTO pics (pics_body) VALUES ('$path')");
             	
				if (move_uploaded_file($tempname, $path) && $sql)  {
					echo "<script>alert('Record Created successfully');</script>";
            		echo "<script>location.href = 'adminViewBody_images.php</script>";
             	} else {
              		echo "Error updating record: " . $conn->error;
                }
				}

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Upload Images</title>
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
				<h3>Upload Images Here!</h3>
			</div>
			<div class="card-body">						
				<form action="" method="post" enctype="multipart/form-data">
					
					<div class="form-group">
							<label>Images</label>
							<!--For multiple image upload we use Square [] sign-->
							<input  class="form-control" type="file" name="pd_image[]" multiple>
					</div>

					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="Upload_Images" value="Upload">
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