<?php
include 'config.php';

$sow_id = $_POST['sow_id'];
$health_id = $_POST['health_id'];
//$age = $_POST['age'];
$weight = $_POST['weight'];
$remark = $_POST['remark'];
$thisday = $_POST['thisday'];

$req = "SELECT * FROM sowrecord WHERE Sow_ID = '$sow_id'";
$run = mysqli_query($mysqli,$req);
$answer = mysqli_fetch_assoc($run);
$day = $answer['DOB'];

//$today = date($dis);
$date1 = strtotime($thisday);
$date2 = strtotime($day);

$diff = abs($date2 - $date1)/60/60/24;

$age = $diff.' Days';

//$years = floor($diff/(365*60*60*24));
//$months = floor(($diff - $years*365*60*60*24)/(30*60*60*24));
//$days = floor(($diff - $years *365*60*60*24 - $months*30*60*60*24)/(60*60*24));

//echo $diff;

//echo $thisday;

$update = "UPDATE sowrecord SET health_id = '$health_id' WHERE Sow_ID = '$sow_id'";

$sql = "INSERT INTO health_table (health_id,sow_id, age, weight, remark, date)VALUES('$health_id','$sow_id', '$age', '$weight', '$remark','$thisday')";
if(mysqli_query($mysqli,$sql) && mysqli_query($mysqli,$update))
{
	echo "success";
}
else
{
	echo msqli_error($mysqli);
	echo "error";
}
?>