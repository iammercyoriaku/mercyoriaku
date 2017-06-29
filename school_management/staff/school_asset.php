<?php

session_start();
include("db/db_config.php");

authenticate ();

$num = $_SESSION['num'];
$name = $_SESSION['name'];


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>school asset</title>


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
			echo '<p>Staff Name:'.' '.$name.'</p>';
			echo '<p>Staff Number:'.' '.$num.'</p>';
		
		?>
        		
                <hr/>
        
        	 <a href="staff_home.php">Home</a>
       <a href="school_asset.php">Add Assests</a>
       <a href="view_asset.php">View Assets</a>
       <a href="staff_logout.php">Logout</a>

		

			<p><strong>Add Assets</strong></p>
<?php
if(array_key_exists("submit", $_POST)){
	$error = array();
	
	//if(empty($_POST['id'])){
		//$error[] = "please enter staff id";
	//}else{
		//$id = mysqli_real_escape_string($db, $_POST['id']);
		
		//}//close of empty in 25
		
		
	if(empty($_POST['name'])){
		$error[] = " JOWO FI ORUKO E SI";
	}else{
		$name = mysqli_real_escape_string($db, $_POST['name']);
	}
	
	if(empty($_POST['date'])){
		$error[] = "please enter date";
	} else {
		$date = mysqli_real_escape_string($db, $_POST['date']);
	}
	
	if(empty($_POST['mon'])){
		$error[] = "please select month";
	}else{
		$mon = mysqli_real_escape_string($db, $_POST['mon']);
	}
	
	
	if(empty($_POST['year'])){
		$error[] = "please select year";
	}else{
		$year = mysqli_real_escape_string($db, $_POST['year']);
	}
	
	if(empty($_POST['asset'])){
		$error[] = "please enter deatails of assets";
	}else{
		$asset = mysqli_real_escape_string($db, $_POST['asset']);
	}
	
	if(empty($error)){
		
		$insert = mysqli_query($db, "INSERT INTO asset VALUES(NULL,
															'".$num."',
															'".$name."',
															'".$year.'-'.$mon.'-'.$date."',
															'".$asset."')
															") or die(mysqli_error($db));
															
		$success = "ASSETS ADDED SUCCESSFULLY";
		header("location:school_asset.php?success=$success");
																
		
		
		
		
	
		}//close of empty error in 64
		
			foreach($error as $error){
				echo '<p>'.$error.'</p>';
			}
	
	
		



}//close of array 
		
		if(isset($_GET['success'])){
			echo $_GET['success'];
		}
			

		


?>

<form action="" method="post">

<!--<p>Staff ID: <input type="text" name="id" /></p>-->
<p>Name: <input type="text" name="name" /></p>
<P>Date: <select name="date">
		 <option value="">DAY</option>
         <?php for($day=1; $day <= 31; $day++){ ?>
         <option value="<?php echo $day?>"><?php echo $day?></option>
         <?php } ?></select>
         
         <select name="mon">
         <option value="">MONTH</option>
         <?php for($mon=1; $mon<=12; $mon++){?>
         <option value="<?php echo $mon?>"><?php echo $mon?></option>
         <?php } ?></select>
         
         <select name="year">
         <option value="">year</option>
         <?php for($yr=2015; $yr<=2050; $yr++){?>
         <option value="<?php echo $yr?>"><?php echo $yr?></option>
         <?php } ?></select></P>
         
<p>DETAILS OF ASSETS:<br/> <textarea name="asset">ASSET NAME - PRICES</textarea></p>

<input type="submit" name="submit" value="CLICK TO ADD ASSETS" />

</form>
</body>
</html>