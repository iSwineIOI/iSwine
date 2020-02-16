<?php
session_start();

if (session_destroy()) {
	header("location: lock_screen.php");
}
?>