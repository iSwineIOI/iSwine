<?php
include '../../Admin/config.php';

$Frontimage = $_POST['Frontimage'];
$post_name = $_POST['post_name'];
$product_description = $_POST['product_description'];
$swine_type = $_POST['swine_type'];
$startWeight = $_POST['startWeight'];
$endWeight = $_POST['endWeight'];
$age = $_POST['age'];
$price = $_POST['price'];
$cust_id = $_POST['cust_id'];
$custId = $_POST['custId'];
$post_id = $_POST['post_id'];

$purchase_code = rand();
$date_purchase = date("y-m-d");

for($count = 0; $count<count($post_name); $count++)
{
$sql = "INSERT INTO purchase_table(
Frontimage,
post_name,
product_description,
swine_type,
startWeight,
endWeight,
age,
price,
cust_id,
post_id,
date_purchase,
purchase_code,
status)
VALUES(
'$Frontimage[$count]',
'$post_name[$count]',
'$product_description[$count]',
'$swine_type[$count]',
'$startWeight[$count]',
'$endWeight[$count]',
'$age[$count]',
'$price[$count]',
'$cust_id[$count]',
'$post_id[$count]',
'$date_purchase',
'$purchase_code',
'On Hold');";

	if(mysqli_query($mysqli,$sql))
	{
		echo 'Item purchased';
		header("location:transaction_details.php");
	}
	else 
	{
		echo mysqli_error($mysqli);
	}
}
$cust = "SELECT * FROM customer_table WHERE cust_id = '$custId' ";
$res = mysqli_query($mysqli,$cust);
$row = mysqli_fetch_assoc($res);

$countProduct = "SELECT count(purchase_id) AS productCount FROM purchase_table WHERE cust_id='$custId' AND purchase_code='$purchase_code'";
$result = mysqli_query($mysqli,$countProduct);
$product = mysqli_fetch_assoc($result);

$productCount = $product['productCount'];

$cust_name = $row['fname'].' '.$row['lname'];


$insert = "INSERT INTO transaction_table(date_of_transaction,cust_name,cust_id,product_order,status,purchase_code)VALUES('$date_purchase','$cust_name','$custId','$productCount','On Hold','$purchase_code');";
mysqli_query($mysqli,$insert);

$delete = "DELETE FROM cart WHERE cust_id = '$custId'";
	mysqli_query($mysqli,$delete);
?>