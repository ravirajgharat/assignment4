<?php

	$cname = $cnameErr = "";

	include 'conn.php';

	if(isset($_POST['addCategory'])) {

	  	$cname = $_POST['cname'];

	  	if(empty($cname)) {
	  		$cnameErr = "* Category name is required";
	  	} elseif (!preg_match("/^[a-zA-Z ]*$/",$cname)) {
	  		$cnameErr = "* Category name must contain Alphabets only";
	  	} else {

		 	$q = "INSERT INTO `Categories`(`cname`) VALUES ('$cname')";
		  	$query = mysqli_query($con,$q);		 
		  	header('location:listCategory.php');

		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="invalid.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>
<body>

<div class="col-lg-6 m-auto">
 
	<form method="post">
	 
		<br><br>
		<div class="card border border-0">
	 
			<div class="card-header bg-dark">
	 			<h1 class="text-white text-center">  Add Category </h1>
	 		</div><br>

	  		<label> Category Name: </label>
	 		<input type="text" name="cname" class="form-control">
	 		<span class="invalid"><?php echo $cnameErr ?></span>
	 		<br><br>

	  		<button class="btn btn-success" type="submit" name="addCategory"> Add Category </button><br>

	  	</div>
	</form>
</div>
</body>
</html>