<?php

session_start();
include("db/db_config.php");



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Login</title>

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
        <h4><strong>Student Login</strong></h4>

<?php

if(array_key_exists('submit', $_POST)){
	$error = array();

if(empty($_POST['num'])){

	$error[] = "please enter your login number";
	
	}else{
		$num = mysqli_real_escape_string($db, $_POST['num']);
	}


if(empty($_POST['password'])){
	
	$error[]= "please enter password";
	
	}else{

		$password = md5(mysqli_real_escape_string($db, $_POST['password']));
	}

if(empty($error)){

	$query = mysqli_query($db, "SELECT * FROM student WHERE 
														student_num = '".$num."' AND 
														password = '".$password."'") or die(mysqli_error($db));
	if(mysqli_num_rows($query)== 1){
		while($result = mysqli_fetch_array($query)){

			$_SESSION['id'] = $result['student_id'];
			$_SESSION['name'] = $result['fname'].' '.$result['lname'];
			$_SESSION['num'] = $result['student_num'];
			$_SESSION['dept'] = $result['dept'];
			$_SESSION['dob'] = $result['dob'];
			$_SESSION['add'] = $result['add'];
			$_SESSION['guard'] = $result['guardian'];

	$success = "congratulations, u'r logged on";
	header("location:student_home.php");


		}//53

		}else{

			$login_error = "invalid student number/password";
			header("location:student_login.php?login_error=$login_error");

		}//close of else in 57

	}



}//CLOSE OF ARRAY KEY EXIST IN 30

	if(isset($_GET['success'])){
		echo $_GET['success'] ;
	}

	if(isset($_GET['login_error'])){
		echo $_GET['login_error'];
	}


?>











<form action="" method="post">
<P>Student Number: <input type="text" name="num"></P>

<p>Password: <input type="password" name="password"></p>
<input type="submit" name="submit" value="LOGIN">
	


</form>

</body>
</html>