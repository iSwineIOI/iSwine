<?php
include 'config.php';

$h_id = $_POST['h_id'];
$stat = $_POST['stat'];
//echo $stat;
if($stat == "Done")
{
	$update = "UPDATE health_table SET status = 'Achieved' WHERE health_id = '$h_id';";
	if(mysqli_query($mysqli,$update))
	{
		echo "Updated";
	}
	else
	{
		echo "Failed";
	}
}
else
{
	$update = "UPDATE health_table SET status = 'Not achieve' WHERE health_id = '$h_id';";
	if(mysqli_query($mysqli,$update))
	{
		echo "Updated";
	}
	else
	{
		echo "Failed";
	}
}
?>