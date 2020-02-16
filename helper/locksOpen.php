<?php
include 'config.php';
session_start();

$emp_id = $_POST['emp_id'];
$password = $_POST['password'];

$s = "SELECT * FROM employee_table WHERE emp_id = '$emp_id'";
$result = mysqli_query($mysqli,$s);
$row = mysqli_fetch_assoc($result);
$F_name = $row['full_name'];

if(isset($_POST['submit']))
{
    $sql = "SELECT * FROM employee_table WHERE emp_id = '$emp_id' ";
    $get = mysqli_query($mysqli,$sql);
    $value = mysqli_fetch_assoc($get);

    $full_name = $value['full_name'];

    if($full_name == $F_name)
    {
        $query = "SELECT * FROM employee_table WHERE password = '$password' AND full_name = '$full_name';";
        $result = $mysqli->query($query);

        if ($result->num_rows == 1)
        {   
            $_SESSION['Username']=$full_name;
            echo header("location: home.php");
        }
        else
        {
            echo header("location: lock_screen.php?emp_id=$emp_id");
        }
    }
}
?>