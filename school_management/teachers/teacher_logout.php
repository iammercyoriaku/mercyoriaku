<?php
		session_start();
		
		include('db/db_config.php');
		
		unset($_SESSION['name']);
		unset($_SESSION['num']);
		header('Location:teachers_login.php');




?>