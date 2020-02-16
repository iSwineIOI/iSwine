<?php
include '../../Admin/config.php';
session_start();

$post_id = $_POST['post_ID'];
$username = $_POST['usernameLogin'];
$password = $_POST['passwordLogin'];

$sql = "SELECT * FROM customer_table WHERE username = '$username' AND password = '$password' ";
$res = mysqli_query($mysqli,$sql);
$rowCust = mysqli_fetch_assoc($res);

$result = $mysqli->query($sql);
if ($result->num_rows == 1)
{
	$_SESSION['username'] = $username;

	$cust_id = $rowCust['cust_id'];

	$sql = "SELECT * FROM postproduct WHERE post_id = '$post_id'";
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
		echo '
		<script>
		alert("Login Successful");
		window.location = "home.php";
		</script>
		';

	}
	else
	{
		echo mysqli_error($mysqli);
		echo "no";
	}
	
}
else
{
	echo '
	<script>
	alert("Ivalid username or password");
	window.location = "home.php";
	</script>
	';
} 
?>