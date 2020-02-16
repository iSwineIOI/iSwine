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
	  		<th >Boar ID</th>
	  		<th >Sire Number</th>
	  		<th >Dam Number</th>
	  		<th >Breed Type</th>
	  		<th >date of birth</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{
	foreach ($result as $row) 
	{
		$date = $row["dob"];
		$ndate = date("M ,d Y", strtotime($date));
		$output .= '
			<tr>
				<td>'.$row["boar_ID"].'</td>
				<td>'.$row["sire_no"].'</td>
				<td>'.$row["dam_no"].'</td>
				<td>'.$row["breed"].'</td>
				<td>'.$ndate.'</td>
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
<th >Boar ID</th>
<th >Sire Number</th>
<th >Dam Number</th>
<th >Breed Type</th>
<th >date of birth</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>


<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>