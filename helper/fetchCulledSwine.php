<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM productlist ORDER BY prod_id DESC ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th width = "139">Product ID</th>
	  		<th width = "139">Breed</th>
	  		<th width = "139">Date of birth</th>
	  		<th width = "139">Breeding Count</th>
	  		<th width = "139">Swine Type</th>
	  		<th width = "139">Reason for culling</th>
	  		<th width = "139">Swine ID</th>
	  		<th width = "139">Status</th>
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
				<td>'.$row["prod_id"].'</td>
				<td>'.$row["breed"].'</td>
				<td>'.$row["dob"].'</td>
				<td>'.$row["breedCount"].'</td>
				<td>'.$row["swine_type"].'</td>
				<td>'.$row["reasonCull"].'</td>
				<td>'.$row["swine_id"].'</td>
				<td id="status">'.$row["status"].'</td>
				<td>
				<button type="button" name="edit"';
				if($row['onSale'] != '')
				{
					$output .='class="btn btn-primary " id="'.$row["swine_id"].'" onclick="viewDetails(this)"><i class="fa fa-shopping-cart"></i> On sale';
				} 
				else
				{
					$output .='class="btn btn-danger " id="'.$row["swine_id"].'" onclick="sellSwine(this)"><i class="fa fa-shopping-cart"></i> Sell';
				}
				$output .='</button></td>
			</tr>
		';
	}
}
else
{
	$output .='
	<tr>
		<td colspan="10" align="center">Data not found</td>
	</tr>
	';
}

$output .='
</tbody>
<tfoot>
<tr>
<th>Product 40</th>
<th>Breed</th>
<th>Date of birth</th>
<th>Breeding Count</th>
<th>Swine Type</th>
<th>Reason for culling</th>
<th>Swine ID</th>
<th>Status</th>
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