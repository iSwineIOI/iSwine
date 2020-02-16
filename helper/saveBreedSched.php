<?php
include 'config.php';
$ExBreedDate = $_POST['ExBreedDate'];
$Sow_ID = $_POST['Sow_ID'];
$breedDate = $_POST['breedDate'];
$status = $_POST['status'];
$ExpectedDate = $_POST['ExpectedDate'];
$DateFarrow = $_POST['DateFarrow'];
$litterSize = $_POST['litterSize'];
$DateWeaning = $_POST['DateWeaning'];
$UponWeaning = $_POST['UponWeaning'];
$AverageWW = $_POST['AverageWW'];

$get = "SELECT * FROM sowrecord WHERE Sow_ID = '$Sow_ID'";
$result = mysqli_query($mysqli,$get);
$row =mysqli_fetch_assoc($result);

$currentCount = $row['used'];

$newCount = "";
if ($status == "Pregnant")
{
	$newCount = $currentCount;
}
else
{
	$newCount = $currentCount+1;
}

//echo $Sow_ID;

$sql = "UPDATE sowrecord SET BreedingDate = '$breedDate', ExBreedDate = '$ExBreedDate',status = '$status', used = '$newCount',ExpectedDate = '$ExpectedDate',DateFarrow = '$DateFarrow',litterSize = '$litterSize',DateWeaning = '$DateWeaning',UponWeaning = '$UponWeaning',AverageWW = '$AverageWW' WHERE Sow_ID = '$Sow_ID'";
if(mysqli_query($mysqli,$sql))
{
	echo mysqli_error($mysqli);
	echo "success";
}
else
{
	echo mysqli_error($mysqli);	
	echo "error";
}
?>