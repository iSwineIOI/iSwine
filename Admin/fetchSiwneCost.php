<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM swine_cost ORDER BY date DESC";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th>ID</th>
			<th>Product ID</th>
			<th>Swine ID</th>
			<th>Swine Type</th>
			<th>Product Type</th>
			<th>Product Name</th>
			<th>Measurement</th>
			<th>Used product</th>
			<th>Product Price</th>
			<th>Cost</th>
			<th>Date Added</th>
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
				<td>'.$row["product_ID"].'</td>
				<td>'.$row["swine_ID"].'</td>
				<td>'.$row["swine_type"].'</td>
				<td>'.$row["product_type"].'</td>
				<td>'.$row["product_name"].'</td>
				<td>'.$row["measurement"].'</td>
				<td>'.$row["used"].'</td>
				<td>&#8369; '.number_format($row["product_price"],2).'</td>
				<td>&#8369; '.number_format($row["cost"],2).'</td>
				<td>'.$row["date"].'</td>
			</tr>
		';
	}
}
else
{
	$output .='
	<tr>
		<td colspan="11" align="center">Data not found</td>
	</tr>
	';
}

$output .='
</tbody>
<tfoot>
<tr>
<th>ID</th>
<th>Product ID</th>
<th>Swine ID</th>
<th>Swine Type</th>
<th>Product Type</th>
<th>Product Name</th>
<th>Measurement</th>
<th>Used product</th>
<th>Product Price</th>
<th>Cost</th>
<th>Date Added</th>
<tfoot>
</table>
';

echo $output;
?>


<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>