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
<?php  
	include 'MyUploadImages/top.html';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="invalid.css">
	<link rel="stylesheet" type="text/css" href="re.css">
	<link rel="stylesheet" type="text/css" href="MyUploadImages/top.css">
	<link rel="stylesheet" type="text/css" href="MyUploadImages/bottom.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>
<body>


<div class="container-fluid">
	<div class="row" id="r2bi">
		<h1 class="m-auto" id="r2h1">Create Category</h1>
	</div>
</div>

<div class="container border" id="php">
 
	<form method="post">
	 
		<br><br>
		<div class="row" id="ip">
	 		<div class="col-sm-6">
    			<label for="ex1">Category Name</label>
    			<input type="text" name="cname" class="form-control"><span class="invalid"><?php echo $cnameErr ?></span><br>
  			</div>	
	 	</div>
	 	<hr>

	 	<div class="row">
	 		<div class="col-sm-12">
	  			<button class="btn btn-success" id="submit" type="submit" name="addCategory"> Submit </button><br>
	  		</div>
	  	</div>
	</form>
</div>
</body>
</html>

<?php  
	include 'MyUploadImages/bottom.html';
?>