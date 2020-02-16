<?php
include('config.php');

if(isset($_POST["SowId"])){
	$query = "SELECT * FROM sowrecord WHERE Sow_ID = '".$_POST["SowId"]."'";
	$result = mysqli_query($mysqli,$query);
	$row = mysqli_fetch_array($result);

	//echo json_encode($row);
	/*$ID = $row['Sow_ID'];
	$Cage = $row['Cage_No'];
	$Breed = $row['Breed'];
	echo 'ID: '.$ID.' | Cage No: '.$Cage.' | Breed: '.$Breed;*/

	echo json_encode($row);
}
?>