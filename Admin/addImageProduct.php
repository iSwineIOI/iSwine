<?php
if ($_FILES["Frontimage"]["name"] != '')
{
	//$test = explode(".", $_FILES["picture"]["name"]);
	//$extension = end($test);
	$fallname = $_FILES['Frontimage']['name'];
	//$name = $fallname. '.' . $extension;
	$location = 'img/productImage/'.$fallname;


	move_uploaded_file($_FILES['Frontimage']['tmp_name'] , $location);
}
if ($_FILES["Leftimage"]["name"] != '')
{
	//$test = explode(".", $_FILES["picture"]["name"]);
	//$extension = end($test);
	$fallname = $_FILES['Leftimage']['name'];
	//$name = $fallname. '.' . $extension;
	$location = 'img/productImage/'.$fallname;


	move_uploaded_file($_FILES['Leftimage']['tmp_name'] , $location);
}
if ($_FILES["Rightimage"]["name"] != '')
{
	//$test = explode(".", $_FILES["picture"]["name"]);
	//$extension = end($test);
	$fallname = $_FILES['Rightimage']['name'];
	//$name = $fallname. '.' . $extension;
	$location = 'img/productImage/'.$fallname;


	move_uploaded_file($_FILES['Rightimage']['tmp_name'] , $location);
}
if ($_FILES["Backimage"]["name"] != '')
{
	//$test = explode(".", $_FILES["picture"]["name"]);
	//$extension = end($test);
	$fallname = $_FILES['Backimage']['name'];
	//$name = $fallname. '.' . $extension;
	$location = 'img/productImage/'.$fallname;


	move_uploaded_file($_FILES['Backimage']['tmp_name'] , $location);
}
?>