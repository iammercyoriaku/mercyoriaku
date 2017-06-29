<?php
		session_start();
	
	include("db/db_config.php");
	include 'function2.php';
	authenticate ();


	
	$id = $_SESSION['id'];
	$name = $_SESSION['name'];





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Students</title>

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
		echo '<p>Admin ID;'.' '.$id.'</p>';
		echo '<p>Username;'.' '.$name.'</p>';
		
		?>
        
        <hr/>
        
         <a href="admin_home.php">Home</a>
      <a href="add_teachers.php">Add Teachers</a>
      <a href="add_student.php">Add Students</a>
      <a href="add_staff.php">Add Staff</a>
      <a href="view_teachers.php">View Staff</a>
      <a href="view_students.php">View Students</a>
      <a href="admin_logout.php">Logout</a>
        
        <h4>Student Records</h4>
        
        <?php $query = mysqli_query($db, "SELECT * FROM student") ?>
        
        <table border="1">
        
        <tr>
        <th>Student Number</th><th>Student Name</th><th>Gender</th><th>Date of Birth</th><th>Department</th>
        <th>Address</th><th>Guardian's Name</th><th>Guardian Number</th>
       
        </tr>

        <?php

        $bubu = viewstudent($query);
        echo $bubu;

        ?>
		
        
</table>
</body>
</html>