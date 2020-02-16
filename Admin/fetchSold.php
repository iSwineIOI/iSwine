<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT postproduct.post_id,postproduct.post_name,postproduct.description,postproduct.price,postproduct.date_purchase,customer_table.cust_id,customer_table.fname,customer_table.fname,customer_table.lname FROM postproduct INNER JOIN customer_table ON postproduct.cust_id = customer_table.cust_id WHERE sale_status = 'Sold' ORDER BY post_id DESC ";

$sum = "SELECT SUM(price) AS Total FROM postproduct WHERE sale_status = 'Sold'";
$state = $mysqli->prepare($sum);
$state->execute();
$res = $state->fetch(PDO::FETCH_ASSOC);

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll(); 

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th>Date Purchase</th>
	  		<th>Product ID</th>
	  		<th>Product Name</th>
	  		<th>Product Description</th>
	  		<th>Customer Name</th>
	  		<th>Product Price</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{
	foreach ($result as $row) 
	{
		$postDate = $row['date_purchase'];
		$date = date("M d, Y", strtotime($postDate));
		$output .= '
			<tr>
				<td>'.$date.'</td>
				<td>'.$row["post_id"].'</td>
				<td>'.$row["post_name"].'</td>
				<td>'.$row["description"].'</td>
				<td>'.$row["fname"].' '.$row['lname'].'</td>
				<td align=right> &#8369; '.number_format($row["price"],2).'</td>
			</tr>
		';
	}
}
else
{
	$output .='
	<tr>
		<td colspan="5" align="center">Data not found</td>
	</tr>
	';
}

$output .='
</tbody>
<tfoot>
<tr>
<th colspan="5">Total:</th>
<td align=right><b>&#8369; '.number_format($res['Total'],2).'</b></td>
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