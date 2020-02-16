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
	  		<th class="hidden-phone">Product ID</th>
	  		<th class="hidden-phone">Product Type</th>
	  		<th>Product Name</th>
	  		<th class="hidden-phone">Measuremnent</th>
	  		<th class="hidden-phone">Used</th>
	  		<th>Quantity</th>
	  		<th class="hidden-phone">Total</th>
	  		<th class="hidden-phone">Price</th>
	  		<th class="hidden-phone">Cost</th>
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
				<td class="hidden-phone">'.$row["product_ID"].'</td>
				<td class="hidden-phone">'.$row["product_type"].'</td>
				<td>'.$row["product_name"].'</td>
				<td class="hidden-phone">'.$row["measurement"].'</td>
				<td class="hidden-phone">'.$row["used"].'</td>
				<td>'.$row["quantity"].'</td>
				<td class="hidden-phone">'.$row["total"].'</td>
				<td class="hidden-phone">&#8369; '.number_format($row["price"],2).'</td>
				<td class="hidden-phone">&#8369; '.number_format($row["cost"],2).'</td>  
				<td align="right">
					<button type="button" name="add" class="btn btn-sm btn-success" id="'.$row["product_ID"].'" onclick="addproduct(this)"><i class="fa fa-plus" ></i> Add</button>

					<button type="button" name="use" class="btn btn-sm btn-info " id="'.$row["product_ID"].'" onclick="useproduct(this)"><i class="fa fa-check"></i> Use</button>	

					<button type="button" name="use" class="btn btn-sm btn-primary hidden-phone" id="'.$row["product_ID"].'" onclick="editproduct(this)"><i class="fa fa-edit"></i> Edit</button>

					<button type="button" name="use" class="btn btn-sm btn-danger hidden-phone" id="'.$row["product_ID"].'" onclick="delproduct(this)"><i class="fa fa-trash-o"></i> </button>
				</td>
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
<th class="hidden-phone">Product ID</th>
<th class="hidden-phone">Product Type</th>
<th>Product Name</th>
<th class="hidden-phone">Measuremnent</th>
<th class="hidden-phone">Used</th>
<th>Quantity</th>
<th class="hidden-phone">Total</th>
<th class="hidden-phone">Price</th>
<th class="hidden-phone">Cost</th>
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