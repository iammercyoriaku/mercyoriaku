<?php
		session_start();
		
		include("db/db_config.php");
		
		unset($_SESSION['id']);
		unset($_SESSION['name']);
		header("Location:admin_login.php");
		





?>