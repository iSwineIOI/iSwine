<?php
include'config.php';

$identify = $_POST['geveID'];
$product_ID = $_POST['product_ID'];

$getRow = "SELECT * FROM inventory_table WHERE product_ID = '$product_ID'";
$rowAmount = mysqli_query($mysqli,$getRow);
$allRow = mysqli_fetch_array($rowAmount);


if($identify == "geveID")
{
	echo json_encode($allRow);
}
else if ($identify == "add")
{
	$amount = $_POST['amount'];
	//echo $product_ID;
	//echo $amount;
	$askAmount = "SELECT * FROM inventory_table WHERE product_ID = '$product_ID'";
	$runAmount = mysqli_query($mysqli,$askAmount);
	$GiveAmount = mysqli_fetch_assoc($runAmount);

	$price = $GiveAmount['price'];

	$currentAmount = $GiveAmount['quantity'];
	$currentTotal = $GiveAmount['total'];

	$newTotal = $currentTotal+$amount;

	$cost = $newTotal * $price;
	
	$newAmount = $currentAmount+$amount;
	//echo $newAmount;
	$add = "UPDATE inventory_table SET quantity = '$newAmount', total = '$newTotal', cost = '$cost' WHERE product_ID = '$product_ID' ";
	if (mysqli_query($mysqli,$add))
	{
		echo "add";
	}
	else
	{
		echo mysqli_error($mysqli);
		echo "No";
	}
	
}
else if ($identify == "dec")
{
	$amount = $_POST['amount'];
	//echo $amount;
	$askAmount = "SELECT * FROM inventory_table WHERE product_ID = '$product_ID'";
	$runAmount = mysqli_query($mysqli,$askAmount);
	$GiveAmount = mysqli_fetch_assoc($runAmount);

	$currentAmount = $GiveAmount['quantity'];

	$UnusedProduct = $UnuseAmount-$amount;
	$newAmount = $currentAmount-$amount;
	//echo $newAmount;
	$add = "UPDATE inventory_table SET quantity = '$newAmount', unused = '$UnusedProduct' WHERE product_ID = '$product_ID' ";
	if (mysqli_query($mysqli,$add))
	{
		echo "dec";
	}
	else
	{
		echo "No";
	}
}
else if ($identify == "use")
{
	$amount = $_POST['amount'];
	$Sow_ID = $_POST['Sow_ID'];
	$swine_type = $_POST['swine_type'];
	$today =$_POST['today'];
	$pri = $_POST['pri'];

	$cost = $pri * $amount;
	//echo $amount;
	$askAmount = "SELECT * FROM inventory_table WHERE product_ID = '$product_ID'";
	$runAmount = mysqli_query($mysqli,$askAmount);
	$GiveAmount = mysqli_fetch_assoc($runAmount);

	$product_name = $GiveAmount['product_name'];
	$product_type = $GiveAmount['product_type'];
	$measurement = $GiveAmount['measurement'];
 
	$currentAmount = $GiveAmount['quantity'];
	$useAmount = $GiveAmount['used'];

	$quantity =$currentAmount-$amount;

	$useProduct = $amount+$useAmount;

	
	//$newAmount = $currentAmount-$amount;
	//echo $newAmount;
	$insert ="INSERT INTO swine_cost(product_name,product_type,measurement,used,product_price,cost,date,product_ID,swine_ID,swine_type) VALUES ('$product_name','$product_type','$measurement','$amount','$pri','$cost','$today','$product_ID','$Sow_ID','$swine_type')";

	$add = "UPDATE inventory_table SET used = '$useProduct', quantity = '$quantity' WHERE product_ID = '$product_ID' ";
	if (mysqli_query($mysqli,$add) && mysqli_query($mysqli,$insert))
	{
		echo "use";
	}
	else
	{
		echo "No";
	}
}
else if ($identify == 'edit')
{
	$sql = "SELECT * FROM inventory_table WHERE product_ID = '$product_ID' ";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result);

	echo json_encode($row);
}
else if ($identify == 'update')
{
	$product_ID = $_POST['product_ID'];
	$product_type_e = $_POST['product_type_e'];
	$product_name_e = $_POST['product_name_e'];
	$measurement_e = $_POST['measurement_e'];
	$quantity_e = $_POST['quantity_e'];
	$product_price_e = $_POST['product_price_e'];

	$cost = $product_price_e * $quantity_e;

	$update = "UPDATE inventory_table SET product_type = '$product_type_e' , product_name = '$product_name_e' ,measurement = '$measurement_e' ,quantity = '$quantity_e', total = '$quantity_e', cost = '$cost' WHERE product_ID = '$product_ID' ";
	if (mysqli_query($mysqli,$update))
	{
		echo "updated";
	}
	else
	{
		echo mysqli_error($mysqli);
		echo "No";
	}
}


?>