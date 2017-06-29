<?php
session_start();
include("db/db_config.php");



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin login</title>

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
        
        <h4><strong>Admin Login</strong></h4>
        
        <?php
		
		if(array_key_exists("submit", $_POST)) {
			
			$error = array();
			
			if(empty($_POST['uname'])) {
				
			$error[ ] = "please enter user name";
			
			} else {
			$username = mysqli_real_escape_string($db, $_POST['uname']);
	
			}
			
			if(empty($_POST['pword'])) {
				
				$error [] = "please enter your password";
			}else{
			$password = mysqli_real_escape_string($db, $_POST['pword']);
			
			}
			
			
			if(empty($error)) {
				
				
				$query = mysqli_query($db, "SELECT * FROM admin WHERE 
														username = '".$username."' AND
														password = '".$password."'
														") or die(mysqli_error());
														
														
					if (mysqli_num_rows($query) == 1) {
						
						while ($result = mysqli_fetch_array($query)){
							
							$_SESSION['id'] = $result['admin_id'];
							$_SESSION['name'] = $result['username'];
							header("Location:admin_home.php");
							
							}
						} else { 
							$login_error = 'Invalid username and/or password';
							header("Location:admin_login.php?login_error=$login_error");
							
							}				
				}
		}
				
				if(isset($_GET['login_error'])) {
					
					echo '<p>'.$_GET['login_error'].'</p>';
					
					}
		
		
		
		
		
		?>        
        
        
        
        
	
	<form action="" method="post">
	<p>Admmin Username:<input type="text" name="uname" size="30" /></p>
    
    <p>Password:<input type="password" name="pword" size="30" /></p>
    
    <input type="submit" name="submit" value="Click to Login" />

</form>
</body>
</html>