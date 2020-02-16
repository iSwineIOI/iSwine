<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$currentdate = $_POST['currentdate'];

$query = "SELECT * FROM sowrecord ORDER BY Sow_ID DESC";
//$result = mysqli_query($mysqli,$query);

//$rem = mysqli_fetch_assoc($result);

//$ExDate = $rem['ExBreedDate'];

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th>Sow ID</th>
	  		<th class="hidden-phone">Cage Number</th>
	  		<th class="hidden-phone">Breed type</th>
	  		<th class="hidden-phone">Date of birth</th>
	  		<th >Breeding result</th>
	  		<th>Action</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{ 	
	foreach ($result as $row)
	{
		$dat = $row['DOB'];
		$DOB = date('M d, Y',strtotime($dat));
		$count = $row['ExBreedDate'];
		$status = $row['status'];

		$date1 = strtotime($currentdate);
		$date2 = strtotime($count);
		$diff ="";
		if($date1 >= $date2)
		{
			$diff = 0;
		}
		else
		{
			$diff = abs($date2 - $date1)/60/60/24;
		}

		$rem ="";

		$rem = $diff.' Days left';
		$output .= '
			<tr>
				<td>'.$row["Sow_ID"].'</td>
				<td class="hidden-phone">'.$row["Cage_No"].'</td>
				<td class="hidden-phone">'.$row["Breed"].'</td>
				<td class="hidden-phone">'.$DOB.'</td>
				<td align="right">
				';

				if($count == '0000-00-00')
				{
					$rem = "No schedule yet";
					$output .=$rem;
					//$disable ="";
				}
				else if($rem =='0 Days left')
				{
					if($status == "Pregnant")
					{
						$rem = "Pregnant";
						$output .=$rem;
					}
					else
					{
						$rem = "Done";
						$output .=$rem;
					}	
				}
				else
				{
					$output .= $rem;
				}
				$output .='</td>
				<td align="right">
					<button type="button" name="edit" class="btn btn-sm btn-default edit" ';
					if($rem =="Done" || $rem=="No schedule yet")
					{
						$output.="onclick='viewBreed(this)'";
					}
					else if( $rem == "Pregnant")
					{
						$output.="onclick='viewPreg(this)'";
					}
					else
					{
						$output.="onclick='viewBreedSched(this)'";
					}
					$output.=' id="'.$row["Sow_ID"].'"><i class="fa fa-eye"></i> View </button>
					<button type="button" name="delete" class="btn btn-sm btn-primary Addbreed" id="'.$row["Sow_ID"].'" onclick="addbreed(this)" data-toggle="modal" href="#addbreed" ';
					if($rem == "No schedule yet" || $rem == "Done" || $rem == "Pregnant")
					{
						$output .= "";
					}
					else
					{
						$output .="disabled";
					};
					$output.='> Breeding Schedule ';
					

					if ($row['used'] == 0)
					{
						$output .='<span style="color:white; margin-top:0;" class="badge badge-warning">New</span>';
					}
					else if ($rem == "Done")
					{
						$output .='<span style="color:white; margin-top:0;" class="badge badge-success">View</span>';
					}
					else
					{
						$output .='<span style="color:white; margin-top:0;" class="badge badge-default">';$output .= $row["used"]; $output.='</span>';
					}
					$output .='</button>
				</td>
			</tr>
		';
	}
}
else
{
	$output .='
	<tr>
		<td colspan="6" align="center">Data not found</td>
	</tr>
	';
}

$output .='
</tbody>
<tfoot>
<tr>
<th>Sow ID</th>
<th class="hidden-phone">Cage Number</th>
<th class="hidden-phone">Breed Type</th>
<th class="hidden-phone">Date of birth</th>
<th>Breeding result</th>
<th>Action</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>


<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>