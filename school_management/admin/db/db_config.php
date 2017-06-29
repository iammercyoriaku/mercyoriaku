<?php
$db = mysqli_connect("localhost", "root", "", "school") or die(mysqli_error());

	
	function authenticate () {
		
		if(!isset($_SESSION['name']) && !isset($_SESSION['num'])) {
			header('Location:admin_login.php');
			}
		
		}




?>