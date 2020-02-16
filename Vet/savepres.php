<?php
include 'config.php';
$healthid = $_POST['presId'];
$des = $_POST['des'];
$ins = $_POST['ins'];

//echo $des;
$try = "SELECT Sow_ID FROM health_table WHERE health_id = '$healthid'";
$run = mysqli_query($mysqli,$try);
$throw = mysqli_fetch_assoc($run);
$Sowid = $throw['Sow_ID'];

$update = "UPDATE sowrecord SET description = '$healthid',health_id = '1' WHERE Sow_ID = '$Sowid' ";
$sql = "UPDATE health_table SET description = '$des', instruction = '$ins' WHERE health_id = '$healthid' ";
if(mysqli_query($mysqli, $sql) && mysqli_query($mysqli,$update))
{
	echo 'Updated';

} else {
	echo mysqli_error($mysqli);
	echo ' Error';
}
?>