<?php
include 'config.php';

$emp_id = $_POST['empId'];
$identify = $_POST['action'];

if ($identify == "activate")
{
	$sql = "UPDATE employee_table SET status = 'active' WHERE emp_id = '$emp_id' ";
	if(mysqli_query($mysqli,$sql))
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}
}
else if ($identify == "deactivate")
{
	$sql = "UPDATE employee_table SET status = 'deactivate' WHERE emp_id = '$emp_id' ";
	if(mysqli_query($mysqli,$sql))
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}
}


?>