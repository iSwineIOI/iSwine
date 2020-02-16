<?php
include 'config.php';
session_start();

$username = $_POST['Username'];
$password = $_POST['Password'];

//echo $password;

$sql = "SELECT * FROM employee_table WHERE username = '$username'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($result);

$user = $row['username'];
$pass = $row['password'];
$emp_type = $row['emp_type'];
$fullname = $row['full_name'];

//echo $username;
if ($username == $user && $password == $pass)
{
	if ($row['status'] == 'deactivate' || $row['status'] == '')
	{
		echo "User is not activated";
	}
	else
	{
		if ($emp_type == "owner"){
		$_SESSION['Username']=$fullname;
		echo $fullname;
		echo '<script>
		var delay = 2500;
		setTimeout(function(){window.location ="home.php"}, delay);
		</script>';
		}else if ($emp_type == "veterinarian"){
			$_SESSION['Username']=$fullname;
			echo $fullname;
			echo '<script>
			var delay = 2500;
			setTimeout(function(){window.location ="../Vet/vetpage.php"}, delay);
			</script>';
		}else if ($emp_type == "helper"){
			$_SESSION['Username']=$fullname;
			echo $fullname;
			echo '<script>
			var delay = 2500;
			setTimeout(function(){window.location ="../helper/sow.php"}, delay);
			</script>';		
		}else{
			echo "No Assigned";
		}
	}
}
else
{
	echo "Invalid";
}


?>