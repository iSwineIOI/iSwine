<?php
include 'config.php';
$S_id = $_POST['S_id'];
$B_id = $_POST['B_id'];

//echo $B_id . $S_id;

$query = "SELECT sire_ID,dam_ID FROM pigletrecord WHERE sire_ID = '$S_id' AND dam_ID = '$B_id';";
$result = $mysqli->query($query);

if ($result->num_rows == 1)
{
	echo 'existed';
}
else
{
	echo "okay";
}
?>