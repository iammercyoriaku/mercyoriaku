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
<title>Add Non Teaching Staff</title>

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
      
      <h4>Add Non Teaching Staff</h4>  
      
      <?php 
	  		if(array_key_exists('submit', $_POST)) {
				$error = array();
				
			if(empty($_POST['fname'])) {
				$error[] = 'Enter firstname';
				}else {
					$fname = mysqli_real_escape_string($db, $_POST['fname']);
					}
			if(empty($_POST['lname'])) {
				$error[] = 'Enter lastname';
				}else {
					$lname = mysqli_real_escape_string($db, $_POST['lname']);
					}
			if(empty($_POST['email'])) {
				$error[] = 'Enter email';
				}else {
					$email = mysqli_real_escape_string($db, $_POST['email']);
					}
			if(empty($_POST['gender'])) {
				$error[] = 'Select gender';
				}else {
					$gender = mysqli_real_escape_string($db, $_POST['gender']);
					}
			if(empty($_POST['marital'])){
				$error[] = 'Select marital status';
				}else {
					$marital = mysqli_real_escape_string($db, $_POST['marital']);
					}
			if(empty($_POST['add'])) {
				$error[] = 'Enter address';
				}else {
					$address = mysqli_real_escape_string($db, $_POST['add']);
					}
			if(empty($_POST['phone'])) {
				$error[] = 'Enter phone number';
				}else {
					$phone = mysqli_real_escape_string($db, $_POST['phone']);
					}
			if(empty($_POST['day'])) {
				$error[] = 'Enter day of birth';
				}else {
					$day = mysqli_real_escape_string($db, $_POST['day']);
					}
			if(empty($_POST['month'])) {
				$error[] = 'Enter month of birth';
				}else {
					$month = mysqli_real_escape_string($db, $_POST['month']);
					}
			if(empty($_POST['year'])) {
				$error[] = 'Enter year of birth';
				}else {
					$year = mysqli_real_escape_string($db, $_POST['year']);
					}
			if(empty($_POST['desig'])) {
				$error[] = 'Enter staff designation';
				}else {
					$desig = mysqli_real_escape_string($db, $_POST['desig']);
					}
			if(empty($_POST['employ'])) {
				$error[] = 'Enter date of employment';
				}else {
					$employ = mysqli_real_escape_string($db, $_POST['employ']);
					}
			if(empty($_POST['salary'])) {
				$error[] = 'Enter staff salary';
				}else {
					$salary = mysqli_real_escape_string($db, $_POST['salary']);
					}
			if(empty($_POST['pass'])) {
				$error[] = 'Enter staff password';
				}else {
					$pword = md5(mysqli_real_escape_string($db, $_POST['pass']));
					}
			if(empty($error)) {
				
				
			$insert = mysqli_query($db, "INSERT INTO staff VALUES 
																(NULL,
																'".rand(10000, 99999)."',
																'".$fname."',
																'".$lname."',
																'".$email."',
																'".$gender."',
																'".$marital."',
																'".$address."',
																'".$phone."',
																'".$year.'-'.$month.'-'.$day."',
																'".$desig."',
																'".$employ."',
																'".$salary."',
																'".$pword."'
																)") or die(mysqli_error($db));
																
						$success = 'Non teaching staff has been added successfully';
						header("Location:add_staff.php");	
				
				}else {
					
						foreach($error as $error) {
							echo '<p>'.$error.'</p>';}
					}
				
			}
	  			if(isset($_GET['success'])) {
					echo '<p>'.$_GET['success'].'</p>';}
	  
	  
	  
	  ?>
      
      
        
<form action="" method="post">

	<p>Firstname: <input type="text" name="fname" /></p>
<p>Lastname: <input type="text" name="lname" /></p>
<p>Email: <input type="text" name="email" /></p>
<p>Gender: Male<input type="radio" name="gender" value="m" />
		   Female<input type="radio" name="gender" value="f" /></p>
<p>Marital Status: single<input type="radio" name="marital" value="single" />
				   married<input type="radio" name="marital" value="mrried" /></p>
<p>Address: <textarea cols="25" rows="5" name="add"></textarea></p>
<p>Phone Number: <input type="text" name="phone" /></p>
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
    
   <p>Designation: <input type="text" name="desig"  /></p>             
                  
 <p>Date of Employment: <input type="text" name="employ" /></p>
 <p>Salary: <input type="text" name="salary" /></p>
 <p>Password: <input type="password" name="pass"  /></p>
 <input type="submit" name="submit" value="add staff" />
 



</form>
</body>
</html>