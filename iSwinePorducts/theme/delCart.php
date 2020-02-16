<?php
include '../../Admin/config.php';

$cust_id = $_POST['cust_id'];
$post_id = $_POST['postid'];

$del = "DELETE FROM cart WHERE post_id = '$post_id' AND cust_id = '$cust_id' ";
$updatePost = "UPDATE postproduct SET cust_id = '0', date_added_cart = '', purchase_status = '' WHERE post_id = '$post_id';";
if(mysqli_query($mysqli,$del) && mysqli_query($mysqli,$updatePost))
{
	echo "deleted";
}
else
{
	echo "failed";
}
?>