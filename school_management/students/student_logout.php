<?php 
	
	session_start();
	
	include('db/db_config.php');

	unset($_SESSION['name']);
	unset($_SESSION['num']);	
	header('Location:student_login.php');

?>