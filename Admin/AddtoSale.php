<?php
include 'config.php';

$postNew_id = $_POST['postNew_id'];
$new_price = $_POST['new_price'];
$sql = "UPDATE postproduct SET new_price = '$new_price', sale_status = 'On sale' WHERE post_id = '$postNew_id' ";
if(mysqli_query($mysqli,$sql))
{
	echo "success";
}
else
{
	echo mysqli_error($mysqli);
	echo "failed";
}
?>