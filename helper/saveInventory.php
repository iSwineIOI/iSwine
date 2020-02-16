<?php
include 'config.php';

$product_type = $_POST['product_type'];
$product_name = $_POST['product_name'];
$measurement = $_POST['measurement'];
$quantity = $_POST['quantity'];

$total = $_POST['quantity'];



$sql = "INSERT INTO inventory_table (product_type,product_name,measurement,quantity,total) VALUES ('$product_type','$product_name','$measurement','$quantity','$total')";
if(mysqli_query($mysqli,$sql))
{
	echo "success";
}
else
{
	echo msqli_error($mysqli);
	echo "error";
}
?>