<?php
$con = mysqli_connect('localhost' , 'root' , '' , 'online' ); 

$ID = $_GET['productID'];
//echo $ID = $_GET['productID'];

mysqli_query($con, "DELETE FROM product WHERE productID = $ID");
header('location: productStore.php');