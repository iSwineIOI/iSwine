<?php
include 'config.php';

$swine_id = $_POST['swine_id'];

$sql = "SELECT * FROM swine_cost WHERE swine_ID = '$swine_id'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($result);

$swine_id = $row['swine_ID'];
echo $swine_id;
?>