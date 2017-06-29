<?php
session_start();
include("db/db_config.php");


?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>staff login</title>

<style>
	#header {border:1px solid #000;
		height:100px;
		text-align:center;
		background-color:#C00;
		color:#0FF;
		font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
		font-size:20px;
		}


</style>

</head>

<body>
					<div id="header">
        <h3>Ajoke Memorial Secondary School</h3>
        <p><em>Come and be brilliant</em></p>
        				</div>
        
<?php
if(array_key_exists("submit", $_POST)){
	$error = array();

	if(empty($_POST['num'])){

$error[] = "please enter your number";
	} else {
	
	$num = mysqli_real_escape_string($db, $_POST['num']);
	}
	
	if(empty($_POST['password'])){
		
$error[] = "please enter your password";
	}else{
		
	$password = md5(mysqli_real_escape_string($db, $_POST['password']));
	}
	
	if(empty($error)){
		$query = mysqli_query($db, "SELECT * FROM staff WHERE 
													staff_num = '".$num."' AND
													password = '".$password."'") or die(mysqli_error($db));
													
	if(mysqli_num_rows($query)== 1){
		while($ajoke = mysqli_fetch_array($query)){
			
			$_SESION['id'] = $ajoke['staff_id'];
			$_SESSION['name'] = $ajoke['fname'];
			$_SESSION['num'] = $ajoke['staff_num'];
			$success = "you're logged on";
			header("location:staff_home.php");
			
		}
	}else{
		
		$login_error = "INCORRECT STAFF NUMBER OR PASSWORD";
		header("location:staff_login.php?login_error=$login_error");
		
		
		}//close of else in 58
		
	}
}   
	if(isset($_GET['login_error'])){
		echo $_GET['login_error'];
	}
	
	if(isset($_GET['success'])){
		echo $_GET['success'];
	}
	   
	    
		 
	
	
 




?>


<form action="" method="post">
<p>Staff Number: <input type="text" name="num" /></p>
<p>Password: <input type="password" name="password" /></p>
<input type="submit" name="submit" value="click to login" />



</form>




</body>
</html>