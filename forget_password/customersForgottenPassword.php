<!DOCTYPE html>
<html>
<head>
	<title>abc</title>

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!--Bootstrap JQuery-->
	<script src="..js/jquery.slim.min.js"></script>
	<!--Bootstrap popper-->
	<script src="..js/popper.min.js"></script>
	<!--Bootstrap Js-->
	<script src="..js/bootstrap.min.js"></script>
</head>
<body class="bg-secondary">
	<div class="container" style="padding-top: 10%; padding-bottom: auto;">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div class="card text-center">
					<div class="card-header">
						<h4>We will send you a varification code through your email</h4>
					</div>
					<div class="card-body">						
						<form action="f1.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input class="form-control" type="text" name="em" placeholder="Email address" required>
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="email" value="Send Code">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
</body>
</html>