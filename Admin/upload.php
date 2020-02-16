<?php
if ($_FILES["picture"]["name"] != '')
{
	//$test = explode(".", $_FILES["picture"]["name"]);
	//$extension = end($test);
	$fallname = $_FILES['picture']['name'];
	//$name = $fallname. '.' . $extension;
	$location = 'img/profilePicture/'.$fallname;

	move_uploaded_file($_FILES['picture']['tmp_name'] , $location);
}
?>