<?php
include 'config.php';
$Sow_ID = $_POST['id'];

$sql = "SELECT * FROM sowrecord WHERE Sow_ID = '$Sow_ID'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);
?>