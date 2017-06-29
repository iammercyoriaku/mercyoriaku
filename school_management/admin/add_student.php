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
<title>Add Students</title>

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
	 	if(array_key_exists('submit', $_POST)) {
			$error = array();
		
		if(empty($_POST['fname'])) {
			$error[] = 'Enter first name';
			}else {
				$fname = mysqli_real_escape_string($db, $_POST['fname']);
				}
		if(empty($_POST['lname'])){
			$error[] = 'Enter last name';
			}else {
				$lname = mysqli_real_escape_string($db, $_POST['lname']);
				}
		if(empty($_POST['sex'])) {
			$error[] = 'Select gender';
			}else {
				$sex = mysqli_real_escape_string($db, $_POST['sex']);
				}
		if(empty($_POST['day'])) {
			$error[] = 'Select birth day';
			}else {
				$day = mysqli_real_escape_string($db, $_POST['day']);
				}
		if(empty($_POST['month'])) {
			$error[] = 'Select birth month';
			}else {
				$month = mysqli_real_escape_string($db, $_POST['month']);
				 } 
		if(empty($_POST['year'])) {
			$error[] = 'Enter birth year';
			}else {
				$year = mysqli_real_escape_string($db, $_POST['year']);
				}
		if(empty($_POST['dept'])) {
			$error[] = 'Select department';
			}else {
				$dept = mysqli_real_escape_string($db, $_POST['dept']);
				}
		if(empty($_POST['add'])) {
			$error[] = 'Enter address';
			}else {
				$address = mysqli_real_escape_string($db, $_POST['add']);
				}
		if(empty($_POST['guard'])) {
			$error[] = 'Enter guardian\'s name';
			}else {
				$guard = mysqli_real_escape_string($db, $_POST['guard']);
				}
		if(empty($_POST['guard_n'])){
			$error[] = "Enter guardian's number";
			}else {
				$guard_n = mysqli_real_escape_string($db, $_POST['guard_n']);
				}
		if(empty($_POST['pass'])) {
			$error[] = 'Enter password';
			}else {
				$pass = md5(mysqli_real_escape_string($db, $_POST['pass']));
				}
		if(empty($error)) {
			
			
			$insert = mysqli_query($db, "INSERT INTO student VALUES
																	(NULL,
																	'".rand(10000, 99999)."',
																	'".$fname."',
																	'".$lname."',
																	'".$sex."',
																	'".$year.'-'.$month.'-'.$day."',
																	'".$dept."',
																	'".$address."',
																	'".$guard."',
																	'".$guard_n."',
																	'".$pass."'
																	)") or die(mysqli_error($db));
																	
					$success = 'Student has been successfully added';
					header('Location:add_student.php');
					
				}else {
						foreach($error as $error){
							echo '<p>'.$error.'</p>';}
					}
			
			
			}
	 
	 			if(isset($_GET['success'])) {
					echo '<p>'.$_GET['success'];}
	 
	 
	 ?>   
        
        

<form action="" method="post">

	<p>Firstname: <input type="text" name="fname"  /></p>
    <p>Lastname: <input type="text" name="lname" /></p>
    <p>Gender: Male<input type="radio" name="sex"  value="male"/>
    			Female<input type="radio" name="sex" value="female"/>
                </p>
    <p>Date of Birth: <select name="day">
				  <option value="">select day</option>
                  <?php for($dy=1; $dy<=31; $dy++){?>
                  <option value="<?php echo $dy ?>"><?php echo $dy ?></option>
                  <?php } ?> 
                  </select>
                  
                  <select name="month">
                  <option value="">select month</option>
                  <?php for($mon=1; $mon<=12; $mon++){?>
                  <option value="<?php echo $mon?>"><?php echo $mon?></option>
                  <?php } ?></select>
                  
                  <select name="year">
                  <option value="">select year</option>
                  <?php for($yr=1990; $yr<=2017; $yr++){?>
                  <option value="<?php echo $yr ?>"><?php echo $yr ?></option>
                  <?php } ?></select></p>
                  
      <p>Student Departments: <select name="dept">
      						   <option value="">Select Dept</option>
                               <option>Arts</option>
                               <option>Science</option>
                               <option>Commerecial</option>
                               </select></p>
                           
      <p>Address: <textarea name="add" cols="20" rows="5"></textarea></p>
      
      <p>Guardian: <input type="text" name="guard"  /></p>
      
      <p>Guardian Number: <input type="text" name="guard_n"  /></p>
      
      <P>Password: <input type="password" name="pass"  /></P>
      
      <input type="submit" name="submit" value="Add Students" />           
    
		
        
        
	
</form>
</body>
</html>




