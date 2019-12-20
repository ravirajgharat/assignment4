<?php

    include 'conn.php';

    if(isset($_POST['editProduct'])){

        $pid = $_GET['pid'];
        $name = $_POST['name'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $cname = $_POST['cname'];
        echo $name . $price . $image . $cname;
        $q = "UPDATE `products` SET `PID`= '$pid', `name`= '$name', `image`= '$image', `price`= '$price', `cname`= '$cname' WHERE PID=$pid";

        $query = mysqli_query($con,$q);

        header('location:listProduct.php');
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <h1 class="text-white text-center">  Edit Product </h1>
            </div><br>

            <label> Product Name </label>
            <input type="text" name="name" class="form-control"> <br>

            <label> Product Price </label>
            <input type="text" name="price" class="form-control"> <br>

            <label> Upload Iamge </label>
            <input type="file" name="image" class="form-control"> <br>

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
            </select><br><br>

            <button class="btn btn-success" type="submit" name="editProduct"> Update Product </button>
        </div>
    </form>
 </div>
</body>
</html>