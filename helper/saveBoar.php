<?php
include 'config.php';

$cage_no = $_POST['cage_no'];
$sire_no = $_POST['sire_no'];
$dam_no = $_POST['dam_no'];
$breedB = $_POST['breedB'];
$dob = $_POST['dob'];


$sql = "INSERT INTO boarRecord (cage_no,sire_no,dam_no,breed,dob) VALUES ('$cage_no','$sire_no','$dam_no','$breedB','$dob')";
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