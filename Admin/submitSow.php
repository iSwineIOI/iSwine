<?php
include 'config.php';

$Cage_No = $_POST['Cage_No'];
$DOB = $_POST['DOB'];
$Breed = $_POST['Breed'];
$Used = 0;

$sql = "INSERT INTO sowrecord (Cage_No,DOB,Breed,used) VALUES ('$Cage_No','$DOB','$Breed','$Used')";
if(mysqli_query($mysqli,$sql))
{
	header("location:sow.php");
}
else
{
	echo msqli_error($mysqli);
	echo "error";
}

?>