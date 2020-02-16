<?php
include '../../Admin/config.php';
session_start();
$cust_id = $_POST['cust_id'];

$post_id = $_POST['post_id'];
$post_id_sale = $_POST['post_id_sale'];
$cartID = $_POST['cartID'];
$check = "SELECT * FROM cart WHERE post_id = '$cartID' OR post_id = '$post_id' OR post_id = '$post_id_sale' AND cust_id = '$cust_id'";
$result = $mysqli->query($check);

$checkItem = "SELECT * FROM cart WHERE cust_id = '$cust_id'";
$resultItem = $mysqli->query($checkItem);


if(!isset($_SESSION['username']))
{
	echo $cartID;
}
else
{
	if ($result->num_rows > 0)
	{
		echo "exist";
	}
	else if($resultItem->num_rows == 0)
	{
		
		$sql = "SELECT * FROM postproduct WHERE post_id = '$cartID' OR post_id = '$post_id_sale' OR post_id = '$post_id'";
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_assoc($result);

		$post_id = $row['post_id'];
		$post_name = $row['post_name'];
		$weight = $row['weight'];
		$endWeight = $row['endWeight'];
		$age = $row['age'];
		$price = $row['price'];
		$Frontimage = $row['Frontimage'];
		$description = $row['description'];
		$swine_type = $row['swine_type'];

		//echo $post_name;

		$date = date('Y-m-d h:m');
		$insert = "INSERT INTO cart (cust_id,post_id,post_name,startWeight,endWeight,age,date,price,Frontimage,product_description,swine_type)VALUES('$cust_id','$post_id','$post_name','$weight','$endWeight','$age','$date','$price','$Frontimage','$description','$swine_type')";
		$updatePost = "UPDATE postproduct SET cust_id = '$cust_id', date_added_cart = '$date', purchase_status = 'on cart' WHERE post_id = '$post_id';";
		if(mysqli_query($mysqli,$insert) && mysqli_query($mysqli,$updatePost))
		{
			echo "message";

		}
		else
		{
			echo mysqli_error($mysqli);
			echo "no";
		}
	}
	else
	{
		$sql = "SELECT * FROM postproduct WHERE post_id = '$cartID' OR  post_id = '$post_id' OR post_id = '$post_id_sale'";
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_assoc($result);

		$post_id = $row['post_id'];
		$post_name = $row['post_name'];
		$weight = $row['weight'];
		$endWeight = $row['endWeight'];
		$age = $row['age'];
		$price = $row['price'];
		$Frontimage = $row['Frontimage'];
		$description = $row['description'];
		$swine_type = $row['swine_type'];

		//echo $post_name;

		$date = date('Y-m-d h:m');
		$insert = "INSERT INTO cart (cust_id,post_id,post_name,startWeight,endWeight,age,date,price,Frontimage,product_description,swine_type)VALUES('$cust_id','$post_id','$post_name','$weight','$endWeight','$age','$date','$price','$Frontimage','$description','$swine_type')";
		$updatePost = "UPDATE postproduct SET cust_id = '$cust_id', date_added_cart = '$date', purchase_status = 'on cart' WHERE post_id = '$post_id';";
		if(mysqli_query($mysqli,$insert) && mysqli_query($mysqli,$updatePost))
		{
			echo "added";

		}
		else
		{
			echo mysqli_error($mysqli);
			echo "no";
		}
	}
	
}
?>