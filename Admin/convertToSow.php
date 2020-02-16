<?php
include 'config.php';

$farNo = $_POST['farNo'];
$swine = $_POST['swine'];

$dec = mysqli_query($mysqli,"SELECT * FROM pigletrecord WHERE far_no = '$farNo'");
$res = mysqli_fetch_assoc($dec);
$quantity = $res['quantity'];

$newQuantity = $quantity - 1;

if($swine == "Sow")
{
	$Cage_No = $_POST['Cage_No'];
	$DOB = $_POST['DOB'];
	$Breed = $_POST['Breed'];
	$Used = 0;

	$sql = "INSERT INTO sowrecord (Cage_No,DOB,Breed,used) VALUES ('$Cage_No','$DOB','$Breed','$Used')";
	$updatePiglet = "UPDATE pigletrecord SET quantity = '$newQuantity' WHERE far_no = '$farNo'";
	if(mysqli_query($mysqli,$sql) && mysqli_query($mysqli,$updatePiglet))
	{
		echo "success";
	}
	else
	{
		echo msqli_error($mysqli);
		echo "error";
	}
}
else
{
	$cage_no = $_POST['cage_no'];
	$sire_no = $_POST['sire_no'];
	$dam_no = $_POST['dam_no'];
	$breedB = $_POST['breedB'];
	$dob = $_POST['dob'];

	$sql = "INSERT INTO boarrecord (cage_no,sire_no,dam_no,breed,dob) VALUES ('$cage_no','$sire_no','$dam_no','$breedB','$dob')";
	$updatePiglet = "UPDATE pigletrecord SET quantity = '$newQuantity' WHERE far_no = '$farNo'";
	if(mysqli_query($mysqli,$sql) && mysqli_query($mysqli,$updatePiglet))
	{
		echo "success";
	}
	else
	{
		echo msqli_error($mysqli);
		echo "error";
	}
}


?>