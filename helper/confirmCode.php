<?php
include 'config.php';

$confirmVerCode = $_POST['confirmVerCode'];
$confirmUserCode = $_POST['confirmUserCode'];

$sql = "SELECT confirm_code FROM employee_table WHERE username = '$confirmUserCode' ";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($result);

$code = $row['confirm_code'];

if ($confirmVerCode == $code)
{
	echo 'success';
}
else
{
	echo 'dont match';
}
?>