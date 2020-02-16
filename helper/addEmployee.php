<?php
	include('config.php');

		$fullname = $_POST['fullname'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$number = $_POST['number'];
		$employee_type = $_POST['employee_type'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$picture = $_POST['picture'];

		//$confirmationCode = rand(100000,999999);


	$scan = "SELECT * FROM employee_table";
	$result = mysqli_query($mysqli,$scan);
	$row = mysqli_fetch_assoc($result);
	$name = $row['full_name'];
	$emailAdd = $row['email'];
	$Cnumber = $row['number'];
	$user = $row['username'];
	$empType = $row['emp_type'];

	if ($fullname == $name){
		echo "Name existed";
	}else if ($email == $emailAdd){
		echo "Email existed";
	}else if ($number == $Cnumber){
		echo "Number existed";
	}else if ($username == $user){
		echo "Username existed";
	}else if ($empType == $employee_type){
		echo "Owner";
	}else{
		$sql = "INSERT INTO employee_table (
			full_name,
			address,
			gender,
			picture,
			email,
			number,
			emp_type,
			username,
			password) VALUES (
			'$fullname',
			'$address',
			'$gender',
			'$picture',
			'$email',
			'$number',
			'$employee_type',
			'$username',
			'$password')";


	if(mysqli_query($mysqli, $sql))
	{
		echo "success";
	}	
	else 
	{
		echo mysqli_error($mysqli);
		echo "failed";
	}
}
?>

