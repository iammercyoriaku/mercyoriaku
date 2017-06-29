<?php
session_start();
include("db/db_config.php");

  


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teacher Login</title>

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
     
		<h4><strong>Teacher Login</strong></h4>	


<?php

if(array_key_exists('submit', $_POST)){
	$error = array();


if(empty($_POST['num'])){
	$error[] = "Ogbeni insert your number";
} else {
	$num = mysqli_real_escape_string($db, $_POST['num']);
}


if(empty($_POST['password'])){
	$error[] = "insert your password";
}else {

	$password = md5(mysqli_real_escape_string($db, $_POST['password']));
}

if(empty($error)){
	$query = mysqli_query($db, "SELECT * FROM teacher WHERE 
													teacher_num = '".$num."' AND
													password = '".$password."'")or die(mysqli_error($db));

if(mysqli_num_rows($query) == 1){
	while($ajoke = mysqli_fetch_array($query)){

		$_SESSION['id'] =  $ajoke['teacher_id'];
		$_SESSION['name'] = $ajoke['fname'].' '.$ajoke['lname'];
		$_SESSION['num'] = $ajoke['teacher_num'];
		$success = "congrats, your're logged on";
		header("location:teachers_home.php");
		}//CLOSE OF FETCH ARRAY IN 45		

}//CLOSE OF NUMS ROW QUERY IN 44
	else{
		$login_error = "dapada, wrong details";
		header("location:teachers_login.php?login_error=$login_error");



	}//close of else in 55

}//close of empty error in 39 







}//CLOSE OF ARRAY KEY EXIST IN 21

if(isset($_GET['success'])){
		echo $_GET['success'] ;
	}

	if(isset($_GET['login_error'])){
		echo $_GET['login_error'];
	}

?>



<form action="" method="post">

<p>Teacher Number: <input type="text" name="num"></p>
<p>Password: <input type="password" name="password"></p>
<input type="submit" name="submit" value="CLICK TO LOGIN">
	



</form>

</body>
</html>