<?php
include 'config.php';

$product_type = $_POST['product_type'];
$product_name = $_POST['product_name'];
$measurement = $_POST['measurement'];
$quantity = $_POST['quantity'];
$product_price = $_POST['product_price'];

$cost = $quantity * $product_price;

$total = $_POST['quantity'];

$check = "SELECT * FROM inventory_table WHERE product_name = '$product_name'";
$result = mysqli_query($mysqli,$check);
$row = mysqli_fetch_assoc($result);
$prod_name = $row['product_name'];
//echo $prod_name;

if ($row['product_name'] == $product_name)
{
	echo "existed";
}
else
{
	$sql = "INSERT INTO inventory_table (product_type,product_name,measurement,quantity,total,price,cost) VALUES ('$product_type','$product_name','$measurement','$quantity','$total','$product_price','$cost')";
		if(mysqli_query($mysqli,$sql))
		{
			echo "success";
		}
		else
		{
			echo msqli_error($mysqli);
			echo "error";
		}
}




?>