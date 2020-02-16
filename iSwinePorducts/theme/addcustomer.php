<?php
include '../../Admin/config.php';
session_start();


	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$number = $_POST['telephone'];
	$company = $_POST['company'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	//echo $fname;
	$insert = "INSERT INTO customer_table (fname,lname,email,number,company,address1,address2,username,password)VALUES('$fname','$lname','$email','$number','$company','$address1','$address2','$username','$password')";

	if(mysqli_query($mysqli,$insert))
	{
		$_SESSION['username'] = $username;
		echo '<script>alert("Successfully Registered");
			  window.location = "home.php";	
			  </script>';
		
	}
	else
	{
		echo mysqli_error($mysqli);
		echo "failed";
	}


?>