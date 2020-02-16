<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM pigletrecord ORDER BY far_no DESC ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th>Cage No.</th>
	  		<th>Sire Number</th>
	  		<th>Dam Number</th>
	  		<th>Weaning Date</th>
	  		<th>Litter Size</th>
	  		<th>Action</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{
	foreach ($result as $row) 
	{
		$date = $row["dateWeaning"];
		$newDate = date("M d, Y", strtotime($date));

		$dateOB = $row['dateOfBirth'];
		$DOB = date("M d, Y", strtotime($dateOB));

		$output .= '
			<tr>
				<td>'.$row["cage_no"].'</td>
				<td id="sire_ID">'.$row["sire_ID"].'</td>
				<td id="dam_ID">'.$row["dam_ID"].'</td>
				<td>'.$newDate.'</td>
				<td>'.$row["quantity"].'</td>
				<td align="right">
				<div class="btn-group">
                      <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Transfer to
                      </button>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" id="'.$row["far_no"].'" onclick="Sow(this)" href="#">Sow</a>
                          <a class="dropdown-item" id="'.$row["far_no"].'" onclick="Boar(this)" href="#">Boar</a>
                      </div>
                  </div>
						<button type="button" name="cull" class="btn btn-sm btn-primary Addbreed" id="'.$row["far_no"].'" onclick="(this)" data-toggle="modal" href="#cullswine"><i class="fa fa-shopping-cart"></i> Cull</button>
				  <input type="hidden" id="DOBpiglet" value="'.$row['dateOfBirth'].'">
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
<th>Cage No.</th>
<th>Sire Number</th>
<th>Dam Number</th>
<th>Weaning Date</th>
<th>Litter Size</th>
<th>Action</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>


<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>