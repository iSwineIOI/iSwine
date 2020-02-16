<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM postproduct WHERE sale_status = '' ORDER BY post_id DESC ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll(); 

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th>Product ID</th>
	  		<th>Date Posted</th>
	  		<th>Breed</th>
	  		<th>Estimated Weight</th>
	  		<th>Age</th>
	  		<th>Swine type</th>
	  		<th>Breeding count</th>
	  		<th>Status</th>
	  		<th>Cost</th>
	  		<th>Price</th>
	  		<th>Action</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{
	foreach ($result as $row) 
	{
		$postDate = $row['date_posted'];
		$date = date("M d, Y h:i a", strtotime($postDate));
		$output .= '
			<tr>
				<td>'.$row["post_id"].'</td>
				<td>'.$date.'</td>
				<td>'.$row["post_name"].'</td>
				<td>'.$row["weight"].' - '.$row['endWeight'].' kg</td>
				<td>'.$row["age"].'</td>
				<td>'.$row["swine_type"].'</td>
				<td>'.$row["breedingCount"].'</td>
				<td id="status">'.$row["status"].'</td>
				<td> &#8369; '.number_format($row["swine_cost"],2).'</td>
				<td> &#8369; '.number_format($row["price"],2).'</td>
				<td>
				<button type="button" name="edit" class="btn btn-primary " id="'.$row["post_id"].'" onclick="sellSwine(this)"><i class="fa fa-eye"></i> view</button>
				<button type="button" name="edit" class="btn btn-danger " id="'.$row["post_id"].'" onclick="saleSwine(this)"><i class="fa fa-plus"></i> Add to sale</button></td>
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
<th>Product ID</th>
<th>Date Posted</th>
<th>Breed</th>
<th>Estimated Weight</th>
<th>Age</th>
<th>Swine type</th>
<th>Breeding count</th>
<th>Status</th>
<th>Cost</th>
<th>Price</th>
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