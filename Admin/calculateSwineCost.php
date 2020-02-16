<?php
include 'config.php';

$Pname = $_POST['Pname']; 
$price = $_POST['price'];
$swineid = $_POST['swineid'];


$sql = "SELECT SUM(cost) AS `totalCost` FROM swine_cost WHERE product_name = '$Pname' AND swine_id = '$swineid'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($result);

echo $row['totalCost'];  

?>