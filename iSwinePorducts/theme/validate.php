<?php
include '../../Admin/config.php';
session_start();

$username = $_POST['usernameLogin'];
$password = $_POST['passwordLogin'];

$sql = "SELECT * FROM customer_table WHERE username = '$username' AND password = '$password' ";
$result = $mysqli->query($sql);
if ($result->num_rows == 1)
{
	$_SESSION['username'] = $username;
	echo '
	<script>
	alert("Login Successful");
	window.location = "home.php";
	</script>
	';
}
else
{
	echo '
	<script>
	alert("Ivalid username or password");
	window.location = "home.php";
	</script>
	';
} 
?>