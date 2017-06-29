<?php
		session_start();
		
		include('db/db_config.php');
		
		authenticate ();

		$name = $_SESSION['name'];
		$num = $_SESSION['num'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Grades</title>

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
			
            <br/>
            <br/>
        		
            
		<?php $query = mysqli_query($db, "SELECT * FROM grades
														WHERE student_num = '".$num."'
														") or die(mysqli_error($db))?>
		
        
        <table border="1" bordercolor="#3300FF">
        
        <tr>
        
        <th>Grade ID</th><th>Student Number</th><th>Student Name</th><th>Session</th><th>Term</th><th>No of times Present</th>
        <th>No of times Absent</th><th>Grades</th><th>Teacher Remarks</th><th>Teacher Name</th><th>Date</th>
               
        </tr>
        
        <?php while ($result = mysqli_fetch_array($query)) {?>

		<tr>
			<td><?php echo $result['grade_id'];?></td>
			<td><?php echo $result['student_num'];?></td>
            <td><?php echo $result['student_name'];?></td>
            <td><?php echo $result['session'];?></td>
            <td><?php echo $result['term'];?></td>
            <td><?php echo $result['present'];?></td>
			<td><?php echo $result['absent'];?></td>
			<td><?php echo $result['grades'];?></td>
            <td><?php echo $result['t_remarks'];?></td>
            <td><?php echo $result['t_name'];?></td>
            <td><?php echo $result['date'];?></td>
            
		</tr>
		<?php }?>
 </table>       
</body>
</html>