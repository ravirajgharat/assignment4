<?php

include 'conn.php';

$pid = $_GET['pid'];

$q = " DELETE FROM `products` WHERE PID = $pid ";

mysqli_query($con, $q);

header('location:listProduct.php');

?>