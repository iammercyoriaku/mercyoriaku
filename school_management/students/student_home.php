<?php
session_start();
include("db/db_config.php");

authenticate ();

$name = $_SESSION['name'];
$id = $_SESSION['id'];
$num = $_SESSION['num'];


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Home</title>

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
			
			echo '<p>Student Name:'.' '.$name.'</p>';
			echo '<p>Student Number:'.' '.$num.'</p>';
				
		?>
        
        <hr/>
        
        <a href="student_home.php">Home</a>
        <a href="student_details.php">Student Info</a>
         <a href="view_grades.php">Student Grades</a>
        <a href="student_logout.php">Logout</a>
        