<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM breedinghistory ORDER BY BreedingDate DESC ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th>Sow ID</th>
	  		<th class="hidden-phone">Breed</th>
	  		<th class="hidden-phone">Date of birth</th>
	  		<th class="hidden-phone">Breeding Date</th>
	  		<th>Breeding Count</th>
	  		<th>Diagnosis</th>
	  		<th class="hidden-phone">Action</th>
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
				<td class="hidden-phone">'.$row["BreedingDate"].'</td>
				<td>'.$row["used"].'</td>
				<td>'.$row["status"].'</td>
				<td class="hidden-phone">
				<button type="button" name="edit" class="btn btn-danger " id="'.$row["Sow_ID"].'" onclick="viewPres(this)"><i class="fa fa-share-square-o"></i> Cull swine</button>
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
<th class="hidden-phone">Breed</th>
<th class="hidden-phone">Date of birth</th>
<th class="hidden-phone">Breeding Date</th>
<th>Breeding Count</th>
<th>Diagnosis</th>
<th class="hidden-phone">Action</th>
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