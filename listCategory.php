<?php  
    include 'MyUploadImages/top.html';
?>
<!DOCTYPE html>
<html>
<head>
    <title>List Category</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="invalid.css">
    <link rel="stylesheet" type="text/css" href="re.css">
    <link rel="stylesheet" type="text/css" href="MyUploadImages/top.css">
    <link rel="stylesheet" type="text/css" href="MyUploadImages/bottom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

<div class="container-fluid">
    <div class="row" id="r2bi">
        <h1 class="m-auto" id="r2h1">Manage Categories</h1>
    </div>
</div>

    <div class="container">
        <div class="col-lg-12">
            <br><br>
            
            <table class=" table table-striped table-hover table-bordered">
 
                <tr class="bg-dark text-white text-center">
                    <th> Category </th>
                    <th> Action </th>
                </tr >

<?php

    include 'conn.php'; 
    $q = "select * from Categories";

    $query = mysqli_query($con,$q);

    while($res = mysqli_fetch_array($query)){
?>
        <tr class="text-center">
            <td> <?php echo $res['cname'];  ?> </td>
            <td> <button class="btn-danger btn"> <a href="deleteCategory.php?id=<?php echo $res['ID']; ?>" class="text-white"> <img src="images/delete_icon.png"> </a>  </button> 
            <button class="btn-primary btn"> <a href="editCategory.php?id=<?php echo $res['ID']; ?>" class="text-white"> <img src="images/edit_icon.png"> </a> </button> </td>
        </tr>

<?php 
 }
?>
 
    </table>  

    </div>
</div>

</body>
</html>
<?php  
    include 'MyUploadImages/bottom.html';
?>