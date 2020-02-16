
<?php
include 'config.php';
$SwineID = $_POST['SwineID'];
//$health_id = $_POST['healthID'];

//echo $health_id;

$med = "SELECT * FROM inventory_table WHERE product_type = 'Medicine'";
$runMed = mysqli_query($mysqli,$med);
$option = '';
while($row = mysqli_fetch_array($runMed))
      {
        $option = $option."<option>$row[2]</option>"; 
      }

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
	  		<th class="hidden-phone">Health ID</th>
	  		<th>Age</th>
	  		<th>Weight</th>
	  		<th>Date</th>
	  		<th class="hidden-phone">Sow ID</th>
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

	$date = $row["date"];
	$newDate = date("M d, Y", strtotime($date));

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
	<button type="button" class="btn btn-primary btn-sm next" onclick="next(this)" id = "'.$show['health_id'].'" '.$next_empty.' >Next</button>
	<p></p>
		<tr>
			<td class="hidden-phone">'.$row["health_id"].'</td>
			<td>'.$row["age"].'</td>
			<td>'.$row["weight"].'</td>
			<td>'.$newDate.'</td>
			<td class="hidden-phone">'.$row["Sow_ID"].'</td>
		</tr>
	</tbody>
	</table>
	<table class="display table table-bordered table-striped" id="">
	<tr>
		<th>Remark</th>
		<td>'.$row["remark"].'</td>
	</tr>
	</table>
	<p></p>
	<table class="display table table-bordered table-striped" id="">
	<thead>
	  	<tr>
	  		<th>Description</th>
	  		<th>Instruction</th>
	  	</tr>
	  	</thead>
	  	<tbody>
	  	<tr>';
	  		if ($row['description'] == '')
	  		{
	  			$output .='<td><select class="form-control" id="description">
	  						   <option selected disabled>Choose Med</option>
	  						   '.$option.'</select><p></p>
	  					   <button type="button" class="btn btn-success btn-sm" id="'.$row['health_id'].'" onclick="savePres(this)"> send</button></td>
	  					   <td><textarea class ="form-control" rows="4" name = "instruction" id="instruction" placeholder = "Instruction"/></textarea></td>
	  					   
	  					   ';
	  		}
	  		else
	  		{
	  			$output .='<td>'.$row["description"].'</td>
						   <td>'.$row["instruction"].'</td>';
	  		}
	  		$output.='
		</tr>

	';
}

$output .=
'
</tbody>
	
</table>
';
echo $output;
?>
<script type="text/javascript">
	function savePres(button){
		var presId = button.id;
		var des = $("#description").val();
		var ins = $("#instruction").val();

		//alert(presId);
		$.ajax({
			url: 'savepres.php',
			method: 'post',
			data:{'presId':presId,'des':des,'ins':ins},
			success:function(data)
			{
				//alert(data);
				if(data == 'Updated')
				{
					toastr.success("Record successfully added","Successful");
					load_data();
					$("#description").val('');
					$("#instruction").val('');

				}
				else
				{
					toastr.error("Error recording data","Failed");
				}
			}
		}) 
	}
</script>