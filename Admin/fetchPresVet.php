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
	  		<th width="293">Sow ID</th>
	  		<th class="hidden-phone"width="293">Breed Type</th>
	  		<th class="hidden-phone"width="293">Date of birth</th>
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
				<td class="hidden-phone">'.$row["Breed"].'</td>
				<td class="hidden-phone">'.$row["DOB"].'</td>
				<td>
					<button type="button" name="edit" class="btn btn-sm btn-primary " id="'.$row["Sow_ID"].'" onclick="viewPres(this)"><i class="fa fa-plus"></i> Add Prescription ';
					if($row['description'] == '')
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
<th>Date of birth</th>
<th>Action</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>

<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>