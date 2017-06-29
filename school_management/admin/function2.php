<?php

function viewstudent($data){

	$show ="";

	while($result = mysqli_fetch_array($data)){
        
        
        
       $show .= '<tr><td>' .$result['student_num']. '</td>';
       $show .= '<td>'.$result['fname'].' '.$result['lname']. '</td>';    
       $show .= '<td>'.$result['gender']. '</td>';   
       $show .= '<td>' .$result['dob']. '</td>';
       $show .=  '<td>'.$result['dept']. '</td>';
       $show .= '<td>'.$result['add']. '</td>';
       $show .= '<td>'.$result['guardian']. '</td>';
       $show .= '<td>'.$result['guardian_n'].'</td></tr>';
         
		









}

return $show;

} 



?>







