<?php
	session_start();
	
	include("db/db_config.php");
	
	
	authenticate ();
	
	$id = $_SESSION['id'];
	$name = $_SESSION['name'];



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Staffs</title>

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
        
        
        <?php
		$query = mysqli_query($db, "SELECT * FROM teacher ") or die(mysqli_error());
												
		?>
        
        <h4>Teaching Staff Records</h4>
        
        <table border="1">
			<tr>
  <th>Teacher Number</th><th>Teacher Name</th><th>Marital</th><th>Email</th><th>Gender</th><th>Address</th><th>Phone Number</th>
  <th>Date Of Birth</th><th>Subjects Taught</th><th>Employement Date</th><th>Salary</th>
            </tr>
            
        <?php while($result = mysqli_fetch_array($query)){?>
				
             <tr>
             <td><?php echo $result['teacher_num'];?></td>
             <td><?php echo $result['fname'].' '.$result['lname'];?></td>
             <td><?php echo $result['marital'];?></td>
             <td><?php echo $result['email'];?></td>
             <td><?php echo $result['gender'];?></td>
             <td><?php echo $result['address'];?></td>
             <td><?php echo $result['phone'];?></td>
             <td><?php echo $result['dob'];?></td>
             <td><?php echo $result['subject'];?></td>
             <td><?php echo $result['employment'];?></td>
             <td><?php echo $result['salary'];?></td>
            
             </tr>
                
                <?php } ?>
</table>

		<hr/>
        <h4>Non-teaching Staff records</h4>
        
        <?php
	$query = mysqli_query($db, "SELECT * FROM staff ") or die(mysqli_error());
												
		?>
        
        <table border="1">
			<tr>
  <th>Staff Number</th><th>Staff Name</th><th>Email</th><th>Gender</th><th>Marital</th><th>Address</th><th>Phone Number</th>
  <th>Date Of Birth</th><th>Designation</th><th>Employement Date</th><th>Salary</th>
            </tr>
            
            
           <?php while($result = mysqli_fetch_array($query)){?>
				
             <tr>
             
             <td><?php echo $result['staff_num'];?></td>
             <td><?php echo $result['fname'].' '.$result['lname'];?></td>
             <td><?php echo $result['marital'];?></td>
             <td><?php echo $result['email'];?></td>
             <td><?php echo $result['gender'];?></td>
             <td><?php echo $result['address'];?></td>
             <td><?php echo $result['phone'];?></td>
             <td><?php echo $result['dob'];?></td>
             <td><?php echo $result['desig'];?></td>
             <td><?php echo $result['d_employ'];?></td>
             <td><?php echo $result['salary'];?></td>
            
             </tr>
             <?php 
		   }
			 
			 ?>
            

</table>


</body>
</html>