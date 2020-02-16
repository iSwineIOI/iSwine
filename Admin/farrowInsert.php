<?php
include 'config.php';
$lS = $_POST['lS'];
$S_id = $_POST['S_id'];
$B_id = $_POST['B_id'];
$c_no = $_POST['c_no'];
$d_wean = $_POST['d_wean'];
$d_far = $_POST['d_far'];

$get = "SELECT * FROM pigletrecord";
$res = mysqli_query($mysqli,$get);
$show = mysqli_fetch_assoc($res);
$sire_ID = $show['sire_ID'];
$dam_ID = $show['dam_ID'];

if($sire_ID == $S_id && $dam_ID == $B_id)
{
	echo 'existed';
}
else
{
	$insert = "INSERT INTO pigletrecord (cage_no,sire_ID,dam_ID,dateWeaning,dateOfBirth,quantity)VALUES('$c_no','$S_id','$B_id','$d_wean','$d_far','$lS')";
	if(mysqli_query($mysqli,$insert))
	{
		echo 'success';
	}
	else
	{
		echo mysqli_error($mysqli);
	}
}


?>