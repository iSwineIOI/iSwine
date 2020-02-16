<?php
include 'config.php';

$output = '';
$emp_id =$_POST['emp'];

$sql = "SELECT * FROM employee_table WHERE emp_id = '$emp_id' ";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($result);
$output .= 
'
<table class="display table table-bordered table-striped" id="dynamic-table">
	<tr>
	<th style="background-color: pink;">
		<img src="img/profilePicture/'.$row['picture'].'" width="170"/><p>
		<p style="text-align:center;"><b>'.$row['full_name'].'</b>';
		if ($row['status'] == '' || $row['status'] == 'deactivate')
		{
			$output .= '<p style="text-align:center;margin-top:-10px;">Offline</p>';
		}
		else
		{
			$output .='<p style="text-align:center;margin-top:-10px;"><i style="color:#00FF00;" class="fa fa-circle"></i> Active';
		}
		$output .='</p>
		
	</th>
	<td>
		<h4 style="color:#F0F1F3">.</h4> 
		<hr>
		<p> <b>Gender:</b> </p>  
		<p> <b>Address:</b> </p>  
		<p> <b>Email:</b> </p>  
		<p> <b>Number:</b> </p>  
		<p> <b>Position:</b> </p>   
	</td>
	<td>
		<h4> Details </h4>
		<hr>
		<p>'.$row['gender'].'</p>
		<p>'.$row['address'].'</p>
		<p>'.$row['email'].'</p>
		<p>'.$row['number'].'</p>
		<p>'.$row['emp_type'].'</p>
		
	</td>
	</tr>
</table>
';
echo $output;
?>
