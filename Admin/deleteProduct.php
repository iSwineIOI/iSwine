<?php
include 'config.php';
$del = $_POST['del'];

$sql = "DELETE FROM inventory_table WHERE product_ID ='$del'";
$result = mysqli_query($mysqli,$sql);

if (isset($result)){
	echo "yes";
}
else{
	echo "no";
}
?>