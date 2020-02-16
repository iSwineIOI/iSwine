<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM swine_cost ORDER BY swineCost_id DESC";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th width="90">ID</th>
	  		<th width="130">Product Type</th>
	  		<th width="130">Product Name</th>
	  		<th width="130">Measurement</th>
	  		<th width="130">Cost</th>
	  		<th width="130">Product ID</th>
	  		<th width="130">Swine ID</th>
	  		<th width="130">Swine Type</th>
			<th width="130">Date Added</th>
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
				<td>'.$row["swineCost_id"].'</td>
				<td>'.$row["product_type"].'</td>
				<td>'.$row["product_name"].'</td>
				<td>'.$row["measurement"].'</td>
				<td>'.$row["cost"].'</td>
				<td>'.$row["product_ID"].'</td>
				<td>'.$row["swine_ID"].'</td>
				<td>'.$row["swine_type"].'</td>
				<td>'.$row["date"].'</td>
			</tr>
		';
	}
}
else
{
	$output .='
	<tr>
		<td colspan="8" align="center">Data not found</td>
	</tr>
	';
}

$output .='
</tbody>
<tfoot>
<tr>
<th>ID</th>
<th>Product Type</th>
<th>Product Name</th>
<th>Measurement</th>
<th>Cost</th>
<th>Product ID</th>
<th>Swine ID</th>
<th>Swine Type</th>
<th>Date Added</th>
<tfoot>
</table>
';

echo $output;
?>


<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>