<?php
include 'config.php';

$output = "";

$searchSwine =$_POST['searchswine'];
$swine_type = $_POST['swineType'];

//LIKE '%$searchSwine%' OR Breed LIKE '%$searchSwine%' OR Cage_No LIKE '%$searchSwine%'
//$searchSwine = preg_replace("#[^0-9a-z]#i","",$searchSwine);
if ($swine_type == "Boar")
{
	$sql = "SELECT * FROM boarrecord WHERE boar_ID = '$searchSwine' ";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_assoc($result);
	//$count = mysql_num_rows($sql);
	if ($result->num_rows == 0)
	{
		$output .= 'ID not found';
	}
	else
	{
		$output .=
		'
		<table class = "table table-bordered">
		<tr>
			<th width="150">Cage Number: </th>
			<td>'.$row['cage_no'].'</td>
		</tr>
		<tr>
			<th width="150">Breed: </th>
			<td>'.$row['breed'].'</td>
		</tr>
		<tr>
			<th width="150"	>DOB: </th>
			<td>'.$row['dob'].'</td>
		</tr>
		</table><p></p>';
	}
}
else if ($swine_type == "Sow")
{
	$sql = "SELECT * FROM sowrecord WHERE sow_ID = '$searchSwine' ";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_assoc($result);
	//$count = mysql_num_rows($sql);
	if ($result->num_rows == 0)
	{
		$output .= 'ID not found';
	}
	else
	{
		$output .=
		'
		<table class = "table table-bordered">
		<tr>
			<th width="150">Cage Number: </th>
			<td>'.$row['Cage_No'].'</td>
		</tr>
		<tr>
			<th width="150">Breed: </th>
			<td>'.$row['Breed'].'</td>
		</tr>
		<tr>
			<th width="150"	>DOB: </th>
			<td>'.$row['DOB'].'</td>
		</tr>
		</table><p></p>';
	}
}
else
{
	$output .='Please select type of swine';
}
echo $output;
?>