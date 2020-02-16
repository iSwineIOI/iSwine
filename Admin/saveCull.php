<?php
include 'config.php';

$Sow_ID = $_POST['ID'];
$rCullValue = $_POST['rCullValue'];

$sql = "SELECT * FROM sowrecord WHERE Sow_ID = '$Sow_ID'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($result);

$breed = $row['Breed'];
$dob = $row['DOB'];
$breedCount = $row['used'];

$status = "";
if ($status == '')
{
	$status = "None";
}
else
{
	$status = $row['status'];
}


//echo $breed;

$insert = "INSERT INTO productlist (breed,dob,breedCount,swine_type,reasonCull,swine_id,status)VALUES('$breed','$dob','$breedCount','Sow','$rCullValue','$Sow_ID','$status')";

if (mysqli_query($mysqli,$insert))
{
	$delete = "DELETE FROM sowrecord WHERE Sow_ID = '$Sow_ID'";
	if(mysqli_query($mysqli,$delete))
	{
		echo "success";
	}
}
else
{
	echo mysqli_error($mysqli);
}
?>