<?php
include 'config.php';
$sow_id = $_POST['sow_id'];
$status = $_POST['status'];


$sql = "SELECT * FROM sowrecord WHERE Sow_ID = '$sow_id' ";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($result);

$DOB = $row['DOB'];
$Breed = $row['Breed'];
$breedDate = $row['BreedingDate'];
$ExBreedDate = $row['ExBreedDate'];
$ExpectedDate = $row['ExpectedDate'];
$DateFarrow = $row['DateFarrow'];
$litterSize = $row['litterSize'];
$DateWeaning = $row['DateWeaning'];
$UponWeaning = $row['UponWeaning'];
$AverageWW = $row['AverageWW'];
$used = $row['used'];

$insert = "INSERT INTO breedinghistory 
(Sow_ID,status,breedingDate,ExBreedDate,ExpectedDate,DateFarrow,litterSize,DateWeaning,UponWeaning,AverageWW,used,DOB,Breed)
VALUES
('$sow_id','$status','$breedDate','$ExBreedDate','$ExpectedDate','$DateFarrow','$litterSize','$DateWeaning','$UponWeaning','$AverageWW','$used','$DOB','$Breed')";

if(mysqli_query($mysqli,$insert) && mysqli_query($mysqli,$sql))
{
	echo "success";
}
else
{
	echo mysqli_error($mysqli);
	echo "failed";
}


?>