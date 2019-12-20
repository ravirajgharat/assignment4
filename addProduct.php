<?php

include 'conn.php';

$nameErr = $priceErr = $imageErr = $cnameErr = "";
$name = $price = $image = $cname = "";

if(isset($_POST['addProduct'])){

  $name = $_POST['name'];
  $price = $_POST['price'];
  $im = $_FILES['uploadImage'];
  $cname = $_POST['cname'];
  
  if($im!='') {
    $upload_directory = "MyUploadImages/";
    $TargetPath=time().$im;
    if(move_uploaded_file($_FILES['files']['tmp_name'], $upload_directory.$TargetPath)){    
      $image="$TargetPath";                 
    }
  }

// Validations

  if(empty($name)) {    
      $nameErr = "* Product name is required";
  } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/",$name)) {
      $nameErr = "* Product name must contain Alphabets or numbers only";
  }

  if(empty($price)) {    
      $priceErr = "* Product price is required";
  } elseif (!preg_match("/^[0-9.]*$/",$price)) {
      $priceErr = "* Product price must contain Decimal value only";
  }

  if($nameErr == "" && $priceErr == "" && $imageErr == "" && $cnameErr == "") {

    $q = "INSERT INTO `products`(`name`, `price`, `image`, `cname`) VALUES ('$name', '$price', '$image', '$cname')";
    $query = mysqli_query($con,$q);
    header('location:listProduct.php');

  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="invalid.css">
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
        <h1 class="text-white text-center">  Add Product </h1>
      </div><br>

      <label> Product Name </label>
      <input type="text" name="name" class="form-control"> 
      <span class="invalid"><?php echo $nameErr ?></span><br>

      <label> Product Price </label>
      <input type="text" name="price" class="form-control"> 
      <span class="invalid"><?php echo $priceErr ?></span><br>

      <label> Upload Iamge </label>
      <input type="file" name="uploadImage" class="form-control"> 
      <span class="invalid"><?php echo $imageErr ?></span><br>

      <label> Select Category </label>
      <select name="cname" class="form-control">
<?php

    include 'conn.php'; 
    $q = "select * from Categories";

    $query = mysqli_query($con,$q);

    while($res = mysqli_fetch_array($query)) {
?>
        <option value="<?php echo $res['cname']; ?>"><?php echo $res['cname']; ?></option>     
<?php 
}
?>
      </select>
      <span class="invalid"><?php echo $cnameErr ?></span><br><br>

      <button class="btn btn-success" type="submit" name="addProduct"> Add Product </button>

    </div>
  </form>
</div>
</body>
</html>