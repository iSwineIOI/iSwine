<?php
$emp_id = $_GET['emp_id'];
session_start();

if (session_destroy()) {
	header("location: locks.php?emp_id=".$emp_id);
}
?>