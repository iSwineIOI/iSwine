<?php
include 'config.php';

$post_id = $_POST['post_id'];
$sql = "SELECT * FROM postproduct WHERE post_id = '$post_id'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($result);

echo json_encode($row);
?>