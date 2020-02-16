<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM inventory_table ORDER BY product_ID DESC ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th width = "140">Product ID</th>
	  		<th width = "140">Product Type</th>
	  		<th width = "140">Product Name</th>
	  		<th width = "140">Measuremnent</th>
	  		<th width = "140">Used</th>
	  		<th width = "140">Quantity</th>
	  		<th width = "140">Total</th>
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
				<td>'.$row["product_ID"].'</td>
				<td>'.$row["product_type"].'</td>
				<td>'.$row["product_name"].'</td>
				<td>'.$row["measurement"].'</td>
				<td>'.$row["used"].'</td>
				<td>'.$row["quantity"].'</td>
				<td>'.$row["total"].'</td> 
				<td>
					<button type="button" name="add" class="btn btn-sm btn-success" id="'.$row["product_ID"].'" onclick="addproduct(this)"><i class="fa fa-plus" ></i> Add</button>

					<button type="button" name="use" class="btn btn-sm btn-info " id="'.$row["product_ID"].'" onclick="useproduct(this)"><i class="fa fa-check"></i> Use</button>	

					<button type="button" name="use" class="btn btn-sm btn-primary " id="'.$row["product_ID"].'" onclick="editproduct(this)"><i class="fa fa-edit"></i> Edit</button>

					<button type="button" name="use" class="btn btn-sm btn-danger " id="'.$row["product_ID"].'" onclick="delproduct(this)"><i class="fa fa-trash-o"></i> </button>
				</td>
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
<th>Product Type</th>
<th>Product Name</th>
<th>Measuremnent</th>
<th>Used</th>
<th>Quantity</th>
<th>Total</th>
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