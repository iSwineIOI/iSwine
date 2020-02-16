<?php
include 'config.php';

$swineid = $_POST['swineid'];
$age = $_POST['age'];
$swine_type = $_POST['swine_type'];
$breed = $_POST['breed'];
$breedCount = $_POST['breedCount'];
$status = $_POST['status'];
$reasonCull = $_POST['reasonCull'];
$price1 = $_POST['price1'];
$totalCostOfswine = $_POST['totalCostOfswine'];
$totalbenefits = $_POST['totalbenefits'];
$startWeight = $_POST['startWeight'];
$endWeight = $_POST['endWeight'];
$description = $_POST['description'];

$sql = "INSERT INTO postproduct 
(
	swine_id,
	age,
	swine_type,
	post_name,
	breedingCount,
	status,
	reasonCull,
	price,
	swine_cost,
	totalBenefits,
	weight,
	endWeight,
	description
)
VALUES
(
	'$swineid',
	'$age',
	'$swine_type',
	'$breed',
	'$breedCount',
	'$status',
	'$reasonCull',
	'$price1',
	'$totalCostOfswine',
	'$totalbenefits',
	'$startWeight',
	'$endWeight',
	'$description'
)
";
if(mysqli_query($mysqli,$sql))
{
	$update = "UPDATE productlist SET onSale = 'On sale' WHERE swine_id = '$swineid'";
	if(mysqli_query($mysqli,$update))
	{
		echo "success";
	}
	else
	{
		echo mysqli_error($mysqli);
		echo "failed";
	}
	
}
else
{
	
}
?>