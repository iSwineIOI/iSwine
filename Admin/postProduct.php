<?php
include 'config.php';

$swineid = $_POST['swineid'];
$age = $_POST['age'];
$swine_type = $_POST['swine_type'];
$breed = $_POST['breed'];
$breedCount = $_POST['breedCount'];
$status = $_POST['status'];
$reasonCull = $_POST['reasonCull'];
$totalswineprice = $_POST['totalswineprice'];
$totalCostOfswine = $_POST['totalCostOfswine'];
$startWeight = $_POST['startWeight'];
$endWeight = $_POST['endWeight'];
$description = $_POST['description'];
$date_post = date('y-m-d');
$Frontimage = $_POST['Frontimage'];
$Leftimage = $_POST['Leftimage'];
$Rightimage = $_POST['Rightimage'];
$Backimage = $_POST['Backimage'];

$sql = "INSERT INTO postproduct 
(
	swine_id,
	date_posted,
	age,
	swine_type,
	post_name,
	breedingCount,
	status,
	reasonCull,
	price,
	swine_cost,
	weight,
	endWeight,
	description,
	Frontimage,
	Leftimage,
	Rightimage,
	Backimage,
	totalBenefits,
	sale_status,
	new_price,
	cust_id,
	date_added_cart,
	purchase_status,
	date_purchase
)
VALUES
(
	'$swineid',
	'$date_post',
	'$age',
	'$swine_type',
	'$breed',
	'$breedCount',
	'$status',
	'$reasonCull',
	'$totalswineprice',
	'$totalCostOfswine',
	'$startWeight',
	'$endWeight',
	'$description',
	'$Frontimage',
	'$Leftimage',
	'$Rightimage',
	'$Backimage',
	'',
	'',
	'',
	'',
	'',
	'',
	''
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