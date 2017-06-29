<?php
		session_start();
		
		include('db/db_config.php');
		
		authenticate ();
		
		$num = $_SESSION['num'];
		$name = $_SESSION['name'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Asset</title>



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
            
        	<hr/>
        
        <?php
			echo '<p>Staff Name:'.' '.$name.'</p>';
			echo '<p>Staff Number:'.' '.$num.'</p>';
		
		?>
		
         <a href="staff_home.php">Home</a>
       <a href="school_asset.php">Add Assests</a>
       <a href="view_asset.php">View Assets</a>
       <a href="staff_logout.php">Logout</a>
        
        <p><strong>View Assets</strong></p>
		
       <?php $query = mysqli_query($db, "SELECT * FROM asset") or die(mysqli_error($db))?>
       
       <table border="1" bordercolor="#3300FF">
       	
        <tr>
        
        <th>Asset ID</th><th>Staff ID</th><th>Staff Name</th><th>Date</th><th>Assets</th>
        
        </tr>
        
        <?php while ($result = mysqli_fetch_array($query)) {?>
        
        <tr>
        
        <td><?php echo $result['asset_id'];?></td>
        <td><?php echo $result['staff_id'];?></td>
        <td><?php echo $result['staff_name'];?></td>
        <td><?php echo $result['date'];?></td>
        <td><?php echo $result['asset'];?></td>
        </tr>
        
        <?php }?>
        
 </table>       
</body>
</html>