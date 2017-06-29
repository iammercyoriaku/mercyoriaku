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
<title>Teacher adding</title>


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

	<h4>Add Teacher Details</h4>

<?php
if(array_key_exists('submit', $_POST)){
$error = array();

if(empty($_POST['fname'])){
	
	$error[] = "please enter firstname";
	}else{
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
	}
	
if(empty($_POST['lname'])){
	$error[] = "please enter lastname";
		}else{
	$lname = mysqli_real_escape_string($db, $_POST['lname']);
		}
		
if(empty($_POST['email'])){
	$error[] = "please enter email";
		}else{
	$email = mysqli_real_escape_string($db, $_POST['email']);
		}
		
if(empty($_POST['gender'])){
	$error[] = "please enter gender";
		}else{
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
		}
		
if(empty($_POST['marital'])){
	$error[] = "please select marital status";
}else{
	
	$marital = mysqli_real_escape_string($db, $_POST['marital']);
}

if(empty($_POST['add'])){
	$error[] = "please enter address";
}else{
	$add = mysqli_real_escape_string($db, $_POST['add']);
}


if(empty($_POST['phone'])){
	$error[] = "please enter your phone number";
}else{
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
}

if(empty($_POST['day'])){
	$error[] = "please enter day";
}else{
	$day = mysqli_real_escape_string($db, $_POST['day']);
}

if(empty($_POST['month'])){
	$error[] = "please enter month ";
}else{
	$month = mysqli_real_escape_string($db, $_POST['month']);
}

if(empty($_POST['year'])){
	$error[] = "please enter year";
}else{
	$year = mysqli_real_escape_string($db, $_POST['year']);
}

if(empty($_POST['sub'])){
	$error[] = "please enter subject ";
}else{
	$sub = mysqli_real_escape_string($db, $_POST['sub']);
}

if(empty($_POST['employ'])){
	$error[] = "please enter your employment date";
}else{
	$employ = mysqli_real_escape_string($db, $_POST['employ']);
}


if(empty($_POST['salary'])){
	$error[] = "please enter salary";
}else{
	$salary = mysqli_real_escape_string($db, $_POST['salary']);
}


if(empty($_POST['pass'])){
	$error[] = "please enter password ";
}else{
	$pword = md5(mysqli_real_escape_string($db, $_POST['pass']));
}

if(empty($error)){
	
	$insert = mysqli_query($db, "INSERT INTO teacher 
													VALUES(NULL,
													'".rand(10000, 99999)."',
													'".$fname."',
													'".$lname."',
													'".$email."',
													'".$gender."',
													'".$add."',
													'".$phone."',
													'".$year.'-'.$month.'-'.$day."',
													'".$sub."',
													'".$employ."',
													'".$salary."',
													'".$marital."',
													'".$pword."')") or die(mysqli_error($db));
													
	$success = "Teacher has been added successfully";
	header("location:add_teachers.php");	
	
	
	
	
	
	}//close of error in 124
	
	else{
		foreach($error as $error){
			echo '<p>' .$error. '</p>';
		}//close of else 160




	}



}//32

	if(isset($_GET['success'])){
		echo $_GET['success'];
	}

		
	


?>
	<fieldset>
<form action="" method="post">
<p>Firstname: <input type="text" name="fname" 	
				value="<?php if(isset($_POST['fname'])) {echo $_POST['fname'];}?>"/></p>

<p>Lastname: <input type="text" name="lname" 	
				value="<?php if(isset($_POST['lname'])) {echo $_POST['lname'];}?>" /></p>

<p>Email: <input type="text" name="email" 	
				value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>" /></p>

<p>Gender: Male<input type="radio" name="gender" value="m"
				<?php if(isset($_POST['gender']) && $_POST['gender'] == 'm')
					{echo 'checked="checked"';}?> />
                    
		   Female<input type="radio" name="gender" value="f" 
           		<?php if(isset($_POST['gender']) && $_POST['gender'] == 'f')
					{echo 'checked="checked"';}?>/></p>
                    
<p>Marital Status: Single<input type="radio" name="marital" value="single" 
						<?php if(isset($_POST['marital']) && $_POST['marital'] == 'marital')
						{echo 'checked="checked"';}?>/>
                        
				   Married<input type="radio" name="marital" value="mrried"
                   		<?php if(isset($_POST['marital']) && $_POST['marital'] == 'marital')
						{echo 'checked="checked"';}?> /></p>
                        
<p>Address: <textarea cols="25" rows="5" name="add">
					<?php if(isset($_POST['add'])) {echo $_POST['add'];}?></textarea></p>
                    
<p>Phone Number: <input type="text" name="phone" 
					value"<?php if(isset($_POST['phone'])) {echo $_POST['phone'];}?>" /></p>
                    
<p>Date of Birth: <select name="day">
				  <option value="">select day</option>
                  <?php for($dy=1; $dy<=31; $dy++){?>
                  
                  <option value="<?php echo $dy ?>"
                  <?php if(isset($_POST['day']) && $_POST['day'] == '$dy')
				  		{echo 'selected="selected"';}?>>
				  
				  <?php echo $dy ?></option>
                  <?php } ?> 
                  </select>
                  
                  <select name="month">
                  <option value="">select month</option>
                  <?php for($mon=1; $mon<=12; $mon++){?>
                  
                  <option value="<?php echo $mon?>"
                  <?php if(isset($_POST['month']) && $_POST['month'] == '$mon')
				  	{echo 'selected="selected"';}?>>
				  
				  <?php echo $mon?></option>
                  <?php } ?></select>
                  
                  <select name="year">
                  <option value="">select year</option>
                  <?php for($yr=1990; $yr<=2017; $yr++){?>
                  
                  <option value="<?php echo $yr ?>"
                  <?php if(isset($_POST['year']) && $_POST['year'] == '$yr')
				  	{echo 'selected="selected"';}?>>
				  
				  <?php echo $yr ?></option>
                  <?php } ?></select></p>
                  
 <p>Subject: <textarea name="sub" cols="20" rows="5">
 				<?php if(isset($_POST['sub'])) {echo $_POST['sub'];}?></textarea></p>
 
 <p>Date of Employment: <input type="text" name="employ"
 				value="<?php if(isset($_POST['employ'])) {echo $_POST['employ'];}?>" /></p>
                
 <p>Salary: <input type="text" name="salary" 
 				value="<?php if(isset($_POST['salary'])) {echo $_POST['salary'];}?>" /></p>
                
 <p>Password: <input type="password" name="pass"  /></p>
 
 <input type="submit" name="submit" value="add teacher" />
 
                  
</form>

</fieldset>
</body>
</html>