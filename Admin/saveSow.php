<?php
include 'config.php';

$Cage_No = $_POST['Cage_No'];
$DOB = $_POST['DOB'];
$Breed = $_POST['Breed'];
$Used = 0;
if(isset($_POST['submit']))
{
	header("location:index.php");
}

$sql = "INSERT INTO sowrecord (Cage_No,DOB,Breed,used) VALUES ('$Cage_No','$DOB','$Breed','$Used')";
if(mysqli_query($mysqli,$sql))
{
	echo "success";
}
else
{
	echo msqli_error($mysqli);
	echo "error";
}

?>