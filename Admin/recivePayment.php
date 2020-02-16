<?php
include 'config.php';

$trans_id = $_POST['trans_id'];

$update = "UPDATE transaction_table SET status = 'Confirmed'";
if(mysqli_query($mysqli,$update))
{
	echo "success";
}
else
{
	echo mysqli_error($mysqli);
}
?>