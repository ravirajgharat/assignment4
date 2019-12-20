<?php

include 'conn.php';

$id = $_GET['id'];

$q = " DELETE FROM `Categories` WHERE ID = $id ";

mysqli_query($con, $q);

header('location:listCategory.php');

?>