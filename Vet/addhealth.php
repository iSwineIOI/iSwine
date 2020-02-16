<?php
include 'config.php';

    $sql = "SELECT count(health_id) AS Total FROM health_table";
    $result = mysqli_query($mysqli,$sql);
    $value = mysqli_fetch_assoc($result);
    $Rows = $value['Total'];

	echo $Rows+1;
?>