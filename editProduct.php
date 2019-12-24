<?php

include 'conn.php';

$nameErr = $priceErr = $imageErr = $cnameErr = "";
$name = $price = $image = $cname = "";

if(isset($_POST['editProduct'])){

  $pid = $_GET['pid'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = $_FILES['file'];
  $cname = $_POST['cname'];
  
// Image
  $fileName = $image['name'];
  $fileError = $image['error'];
  $fileTmp = $image['tmp_name'];

  $fileExt = explode('.', $fileName);
  $fileCheck = strtolower(end($fileExt));
  $fileExtStored = array('png','jpg');

  if (in_array($fileCheck, $fileExtStored)) {
    
    $destinationFile = 'uploads/' . $fileName;
    move_uploaded_file($fileTmp, $destinationFile);
    $imageErr = "";
  } else {
    $imageErr = "* Only JPG and PNG images are allowed";
  }

  if($fileName == "") {
    $imageErr = "";
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

    $q = " UPDATE `products` SET `name`= '$name', `image`= '$destinationFile', `price`= '$price', `cname`= '$cname' WHERE PID=$pid ";
    $query = mysqli_query($con,$q);
    header('location:listProduct.php');
  }
}
?>
<?php  
  include 'MyUploadImages/top.html';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>

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
    <h1 class="m-auto" id="r2h1">Edit Product</h1>
  </div>
</div>

<div class="container border" id="php">
 
  <form method="post" enctype="multipart/form-data">
   
    <br><br>
    <div class="row" id="ip">
      <div class="col-sm-6">
        <label> Product Name </label>
        <input type="text" name="name" class="form-control"> 
        <span class="invalid"><?php echo $nameErr ?></span><br>
      </div>
    </div>

    <div class="row" id="ip">
      <div class="col-sm-6">   
        <label> Product Price </label>
        <input type="text" name="price" class="form-control"> 
        <span class="invalid"><?php echo $priceErr ?></span><br>
      </div>
    </div>

    <div class="row" id="ip">
      <div class="col-sm-6">
        <label> Upload Iamge </label>
        <input type="file" name="file" class="form-control"> 
        <span class="invalid"><?php echo $imageErr; ?></span><br>
      </div>
    </div>

    <div class="row" id="ip">
      <div class="col-sm-6">
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
      </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-sm-12">
        <button class="btn btn-success" id="submit" type="submit" name="editProduct">Submit</button>
      </div>
    </div>

  </form>
</div>
</body>
</html>
<?php  
  include 'MyUploadImages/bottom.html';
?>