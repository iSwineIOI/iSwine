<?php
include 'config.php';

$post_id = $_POST['post_id'];
$purchase_code = $_POST['purchase_code'];

$product = "SELECT *FROM postproduct WHERE post_id = '$post_id'";
$result = mysqli_query($mysqli,$product);
$row = mysqli_fetch_assoc($result);

$indivAmount = $row['price'];
$date_purchase = date("y-m-d");
 
$updateProduct = "UPDATE postproduct SET sale_status = 'Sold', date_purchase = '$date_purchase' WHERE post_id ='$post_id'";

//$sold = "INSERT INTO sold_product(cust_id,cust_name)VALUES();";

$update ="UPDATE purchase_table SET status = 'Confirmed' WHERE post_id = '$post_id' AND purchase_code = '$purchase_code' ";

$product = "SELECT * FROM transaction_table WHERE purchase_code = '$purchase_code'";
$prodRes = mysqli_query($mysqli,$product);
$rowPro = mysqli_fetch_assoc($prodRes);

$amount_to_pay = $rowPro['amount_to_pay']+$indivAmount;

$productCount = $rowPro['product_order']-1;

$tansactionUpdate = "UPDATE transaction_table SET status = 'Waiting for payment',product_order = '$productCount', amount_to_pay = '$amount_to_pay' WHERE purchase_code = '$purchase_code' ";
if(mysqli_query($mysqli,$update) && mysqli_query($mysqli,$tansactionUpdate) && mysqli_query($mysqli,$updateProduct))
{
	echo "success";
}
else
{
	echo mysqli_error($mysqli);
}
?>