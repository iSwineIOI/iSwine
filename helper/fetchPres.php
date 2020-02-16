
<?php
include 'config.php';
$SwineID = $_POST['SwineID'];
//$health_id = $_POST['healthID'];

//echo $health_id;
$update = "UPDATE sowrecord SET description = 'viewed' WHERE Sow_ID = '$SwineID'";
mysqli_query($mysqli,$update); 

$health = "SELECT health_id FROM health_table WHERE Sow_ID ='$SwineID'";
$run = mysqli_query($mysqli,$health);
$find = mysqli_fetch_assoc($run);
$health_id = $find['health_id'];

$output = '';

$sql = "SELECT * FROM health_table WHERE Sow_ID = '$SwineID' ORDER BY health_id ASC LIMIT 1";
$result = mysqli_query($mysqli,$sql);

$output = '
	  <table class="display table table-bordered table-striped" id="">
	  <thead>
	  	<tr>
	  		<th>Health ID</th>
	  		<th>Age</th>
	  		<th>Weight</th>
	  		<th>Remark</th>
	  		<th>Date of check up</th>
	  		<th>Sow ID</th>
	  	</tr>
	  </thead>
	  <tbody>
';
while($row = mysqli_fetch_array($result))
{

	$query = "SELECT health_id FROM health_table WHERE Sow_ID = '$SwineID' AND health_id > '$health_id' ORDER BY health_id ASC LIMIT 1";
	$exe = mysqli_query($mysqli,$query);
	$show = mysqli_fetch_assoc($exe);

	$query_1 = "SELECT health_id FROM health_table WHERE Sow_ID = '$SwineID' AND health_id < '$health_id' ORDER BY health_id DESC LIMIT 1";
	$exe_1 = mysqli_query($mysqli,$query_1);
	$show_1 = mysqli_fetch_assoc($exe_1);

	$prev_empty = '';
	$next_empty = '';

	if ($show_1['health_id'] == '')
	{
		$prev_empty = 'disabled';
	}
	if ($show['health_id'] == '')
	{
		$next_empty = 'disabled';
	}

	$output .=
	'
	<button type="button" class="btn btn-primary btn-sm prev" onclick="prev(this)" id = "'.$show_1['health_id'].'" '.$prev_empty.' >Prev</button> . 
	<button type="button" class="btn btn-primary btn-sm next" onclick="next(this)" id = "'.$show['health_id'].'" '.$next_empty.' >Next</button><p></p>
		<tr>
			<td>'.$row["health_id"].'</td>
			<td>'.$row["age"].'</td>
			<td>'.$row["weight"].'</td>
			<td>'.$row["remark"].'</td>
			<td>'.$row["date"].'</td>
			<td>'.$row["Sow_ID"].'</td>
		</tr>
		</tbody>
		</table>
		<p></p>
		<table class="display table table-bordered table-striped" id="">
		<thead>
		  	<tr>';
		  		if($row['description'] != '')
		  		{
		  			$output .='<th width = "200">Description</th>
							   <th>Instruction</th>';
		  		}
		  		else if($row['description'] == 'viewed')
		  		{
		  			$output .= '<th width = "200">Description</th>
		  						<th>Instruction<span style="float:right;color:white; margin-top:0;" class="badge badge-warning">New</span></th>';
		  		}
		  		else
		  		{
		  			$output .='<th width = "200">Description</th>
							   <th>Instruction</th>';
		  		}

		  		$output.='
		  	</tr>
		  	</thead>
		  	<tbody>
		  	<tr>
		  		<td>'.$row["description"].'</td>
				<td>'.$row["instruction"].'</td>
			</tr>

	';
}

$output .=
'<p></p>
</tbody>
	
</table>
';
echo $output;
?>