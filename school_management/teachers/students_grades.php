<?php 
		session_start();
		
		include("db/db_config.php");
		
		authenticate ();
		
		$name = $_SESSION['name'];
		$t_num = $_SESSION['num'];
		
		$subject = array('English', 'Mathematics', 'Biology', 'Economics');
		
		$grade = array('A', 'B', 'C','D', 'E', 'F');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student's grade</title>

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
			echo '<p>Teacher Name:'.' '.$name.'</p>';
			echo '<p>Teacher Number:'.' '.$t_num.'</p>';

		?>
        <hr/>
       
       
       <a href="teachers_home.php">Home</a>
        <a href="students_grades.php">Student Grades</a>
        <a href="view_grades.php">View Grades</a>
        <a href="teacher_logout.php">Logout</a>
       
       
       <?php
	   		if(array_key_exists('submit', $_POST)) {
				$error = array();
			
			if(empty($_POST['s_num'])){
				$error[] = "taah, your number joor";
			}else {
				$s_num = mysqli_real_escape_string($db, $_POST['s_num']);
			}
			
			
			if(empty($_POST['s_name'])){
				$error[] = "please input name";
			}else{
				$s_name = mysqli_real_escape_string($db, $_POST['s_name']);
			}
			
			
			if(empty($_POST['ses'])){
				$error[] = "please input session";
			}else{
				$ses = mysqli_real_escape_string($db, $_POST['ses']);
			}
			
			if(empty($_POST['term'])){
				$error[] = "Your term?";
			}else{
				$term = mysqli_real_escape_string($db, $_POST['term']);
			}
			
			
			if(empty($_POST['present'])){
				$error[] = " please input presence rate";
			}else{
				$present = mysqli_real_escape_string($db, $_POST['present']);
			}
			
			
			if(empty($_POST['absent'])){
				$error[] = " please inputabsence rate";
			}else{
				$absent = mysqli_real_escape_string($db, $_POST['absent']);
			}
			
			if(empty($_POST['grade'])){
				$error[] = " please input grade";
			}else{
				$grade = mysqli_real_escape_string($db, $_POST['grade']);
			}
			
			if(empty($_POST['t_remark'])){
				$error[] = " please input remark";
			}else{
				$t_remark = mysqli_real_escape_string($db, $_POST['t_remark']);
			}
			
			if(empty($_POST['t_name'])){
				$error[] = "please input your name";
			}else{
				$t_name = mysqli_real_escape_string($db, $_POST['t_name']);
			}
			
			
			
			if(empty($error)){
				
				$insert = mysqli_query($db, "INSERT INTO grades
																VALUES(NULL,
																'".$s_num."',
																'".$s_name."',
																'".$ses."',
																'".$term."',
																'".$present."',
																'".$absent."',
																'".$grade."',
																'".$t_remark."',
																'".$t_name."',
																NOW()
																)") or die(mysqli_error($db));
				$success = "hi-5, oti wole";
				header("location:students_grades.php");
				
			}//close of empty error in 99
			
				else{
					foreach($error as $error){
						echo '<p>'.$error.'</p>';
						}//close of 117
					
					
					
					}//close of else in 166
			
				
				
				
				
				}//close of array key exist in 42
				
				if(isset($_GET['success'])){
					echo $_GET['success'];
				}
	   
	   
	   
	   
	   
	   ?> 
        
       <h4>Student Grades</h4>
       <form action="" method="post">
       
       <p>Student Number:<input type="text" name="s_num"  /></p>
       <p>Student Name:<input type="text" name="s_name" /></p>
       <p>Session: <input type="text" name="ses" /></p>
       <p>Term: <select name="term">
       			<option value="">Select Term</option>
                <option>First Term</option>
                <option>Second Term</option>
                <option>Third Term</option>
                </select>
                </p>
                
         <p>Number of time present:<input type="text" name="present"  />
         
         	Number of time absent:<input type="text" name="absent" />
         </p>   
         
             
                
        <p>Students Subjects and Grades:<br/>
        <textarea cols="50" rows="10" name="grade"></textarea></p>
                                         
                                         
              
                                         
         <p>Teacher Remarks: <br/>
         					<textarea name="t_remark" cols="50" rows="10"></textarea></p>
                            
          <p>Teacher Name:<input type="text" name="t_name"  /></p>
          
        
                            
               <input type="submit" name="submit" value="Add Grades" />
                            
           
       
       
</form>        
</body>
</html>