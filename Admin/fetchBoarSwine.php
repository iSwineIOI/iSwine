<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM boarrecord ORDER BY boar_ID DESC ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th width = "175">Boar ID</th>
	  		<th width = "175">Cage Number</th>
	  		<th width = "175">Date of birth</th>
	  		<th width = "175">Breed</th>
	  		<th width = "175">Sire Number</th>
	  		<th width = "175">Dam Number</th>
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
				<td>'.$row["cage_no"].'</td>
				<td>'.$row["dob"].'</td>
				<td>'.$row["breed"].'</td>
				<td>'.$row["sire_no"].'</td>
				<td>'.$row["dam_no"].'</td>
				<td>
				<button type="button" name="edit" class="btn btn-danger " id="'.$row["boar_ID"].'" onclick="viewPres(this)"><i class="fa fa-share-square-o"></i> Cull swine</button></td>
			</tr>
		';
	}
}
else
{
	$output .='
	<tr>
		<td colspan="4" align="center">Data not found</td>
	</tr>
	';
}

$output .='
</tbody>
<tfoot>
<tr>
<th>Boar ID</th>
<th>Cage Number</th>
<th>Date of birth</th>
<th>Breed</th>
<th>Sire Numbe</th>
<th>Dam Number</th>
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