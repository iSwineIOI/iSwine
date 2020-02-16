<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM sowrecord ORDER BY Sow_ID DESC";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th >Sow ID</th>
	  		<th>Breed Type</th>
	  		<th class="hidden-phone">Date of birth</th>
	  		<th>Action</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{
	foreach ($result as $row) 
	{
		$date = $row["DOB"];
		$nDate = date('M d, Y', strtotime($date));
		$status = $row['status'];
		$output .= '
			<tr>
				<td>'.$row["Sow_ID"].'</td>
				<td>'.$row["Breed"].'</td>
				<td class="hidden-phone">'.$nDate.'</td>
				<td align="right">

					<button type="button" name="edit" class="btn btn-sm btn-default edit" ';
						if($status =="On going")
						{
							$output.="onclick='viewBreedSched(this)'";
						}
						else if( $status == "Pregnant")
						{
							$output.="onclick='viewPreg(this)'";
						}
						else
						{
							$output.="onclick='viewBreed(this)'";
						}
						$output.=' id="'.$row["Sow_ID"].'"><i class="fa fa-eye"></i> View more</button>

					<a href="individualPres.php?Sow_ID='.$row["Sow_ID"].'"><button type="button" name="edit" class="btn btn-sm btn-success " id="'.$row["Sow_ID"].'" ><i class="fa fa-eye"></i> Prescription ';
					if($row['description'] == 'viewed')
					{
						$output .='';
					}
					else if ($row['description'] !='')
					{
						$output .='<span style="color:white; margin-top:0;" class="badge badge-warning">New</span>';
					}
					else
					{
						$output .='';
					}

					$output .='</button></a>
					<button type="button" name="health" class="btn btn-sm btn-primary " id="'.$row["Sow_ID"].'" onclick="health(this)"> Add health status	';
					if ($row['health_id'] == 0) 
					{
						$output .='<span style="color:white; margin-top:0;" class="badge badge-warning">New</span>';
					}
					else
					{
						$output .='';
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
		<td colspan="5" align="center">Data not found</td>
	</tr>
	';
}

$output .='
</tbody>
<tfoot>
<tr>
<th>Sow ID</th>
<th>Breed Type</th>
<th class="hidden-phone">Date of birth</th>
<th>Action</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>

<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>