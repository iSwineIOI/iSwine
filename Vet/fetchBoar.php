<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM boarRecord ORDER BY boar_ID DESC ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th width="100">Boar ID</th>
	  		<th width="150">Sire Number</th>
	  		<th width="240">Dam Number</th>
	  		<th width="240">Breed Type</th>
	  		<th width="240">date of birth</th>
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
				<td>'.$row["boar_ID"].'</td>
				<td>'.$row["sire_no"].'</td>
				<td>'.$row["dam_no"].'</td>
				<td>'.$row["breed"].'</td>
				<td>'.$row["dob"].'</td>
				<td>
					<button type="button" name="edit" class="btn btn-sm btn-default edit" id="'.$row["boar_ID"].'"><i class="fa fa-pencil"></i> Edit</button>
					<button type="button" name="delete" class="btn btn-sm btn-danger Addbreed" id="'.$row["boar_ID"].'" onclick="(this)" data-toggle="modal" href="#acullswine"><i class="fa fa-trash-o"></i> Delete</button>	
					<button type="button" name="cull" class="btn btn-sm btn-primary Addbreed" id="'.$row["boar_ID"].'" onclick="(this)" data-toggle="modal" href="#cullswine"><i class="fa fa-shopping-cart"></i> Cull</button>	
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
<th width="100">Boar ID</th>
<th width="150">Sire Number</th>
<th width="240">Dam Number</th>
<th width="240">Breed Type</th>
<th width="240">date of birth</th>
<th>Action</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>


<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>