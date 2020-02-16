<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM transaction_table ORDER BY date_of_transaction DESC ";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll(); 

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th>Date of transaction</th>
	  		<th>Customer Name</th>
	  		<th>Expected amount to pay</th>
	  		<th>Status</th>
	  		<th>Action</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{
	foreach ($result as $row) 
	{
		$postDate = $row['date_of_transaction'];
		$date = date("M d, Y", strtotime($postDate));
		$output .= '
			<tr>
				<td>'.$date.'</td>
				<td>'.$row["cust_name"].'</td>
				<td align=right> &#8369; '.number_format($row["amount_to_pay"],2).'</td>
				';
				if($row['status'] == "On Hold")
				{
					$output.='<td><span style="color:white; margin-top:0;" class="badge badge-warning">'.$row["status"].'</span></td>';
				}
				else
				{
					$output.='<td><span style="color:white; margin-top:0;" class="badge badge-success">'.$row["status"].'</span></td>';
				}
				$output.='
				<td width="300" align="right">
				';
				if($row['status'] == "On Hold")
				{
					$output.='';
				}
				else if($row['status'] == "Confirmed")
				{
					$output.='<button class="btn btn-success" onclick="confirmAll(this)" id="'.$row['transaction_id'].'" disabled><i class="fa fa-check"></i> Confirm</button>';
				}
				else
				{
					$output.='<button class="btn btn-success" onclick="confirmAll(this)" id="'.$row['transaction_id'].'"><i class="fa fa-check"></i> Confirm</button>';
				}
				$output.='
				<button type="button" name="edit" class="btn btn-primary " id="'.$row["purchase_code"].'" onclick="viewPurchase(this)"><i class="fa fa-eye"></i> view more
				';
				if($row['product_order'] <= 0)
				{
					$output.='';
				}
				else
				{
					$output.='<span style="color:white; margin-top:0;" class="badge badge-warning"> new</span>';
				}
				$output.='</button></td>
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
<th colspan="4">Action</th>
<td></td>
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