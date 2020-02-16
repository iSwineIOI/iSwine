<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM sowrecord ORDER BY Sow_ID DESC ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th width = "175">Sow ID</th>
	  		<th width = "175">Breed</th>
	  		<th width = "175">Date of birth</th>
	  		<th width = "175">Breeding Date</th>
	  		<th width = "175">Breeding Count</th>
	  		<th width = "175">Diagnosis</th>
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
				<td>'.$row["Breed"].'</td>
				<td>'.$row["DOB"].'</td>
				<td>'.$row["BreedingDate"].'</td>
				<td>'.$row["used"].'</td>
				<td id="status">'.$row["status"].'</td>
				<td>
				<button type="button" name="edit" class="btn btn-danger " id="'.$row["Sow_ID"].'" onclick="cullSow(this)"><i class="fa fa-share-square-o"></i> Cull swine</button></td>
			</tr>
		';
	}
}
else
{
	$output .='
	<tr>
		<td colspan="7" align="center">Data not found</td>
	</tr>
	';
}

$output .='
</tbody>
<tfoot>
<tr>
<th>Sow ID</th>
<th>Breed</th>
<th>Date of birth</th>
<th>Breeding Date</th>
<th>Breeding Count</th>
<th>Diagnosis</th>
<th>Action</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>


<!--sweetalert-->
<script src="js/sweetalert2.all.min.js"></script>

<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>