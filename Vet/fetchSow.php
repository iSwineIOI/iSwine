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
	  		<th width="100">Sow ID</th>
	  		<th class="hidden-phone"width="150">Cage Number</th>
	  		<th class="hidden-phone"width="240">Breed type</th>
	  		<th class="hidden-phone"width="240">Date of birth</th>
	  		<th width="240">Expected breeding result</th>
	  		<th>Action</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{
	foreach ($result as $row) 
	{
		$output .= '
			<tr>
				<td>'.$row["Sow_ID"].'</td>
				<td class="hidden-phone">'.$row["Cage_No"].'</td>
				<td class="hidden-phone">'.$row["Breed"].'</td>
				<td class="hidden-phone">'.$row["DOB"].'</td>
				<td >'.$row["ExBreedDate"].'</td>
				<td>
					<button type="button" name="edit" class="btn btn-sm btn-default edit" id="'.$row["Sow_ID"].'"><i class="fa fa-pencil"></i> Edit</button>
					<button type="button" name="delete" class="btn btn-sm btn-primary Addbreed" id="'.$row["Sow_ID"].'" onclick="addbreed(this)" data-toggle="modal" href="#addswine"> Breeding Schedule 	';
					if ($row['used'] == 0)
					{
						$output .='<span style="color:white; margin-top:0;" class="badge badge-warning">New</span>';
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
		<td colspan="5" align="center">Data not found</td>
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
<th class="hidden-phone">Breed</th>
<th>Expected breeding result</th>
<th>Action</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>


<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>