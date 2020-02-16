<!--dynamic table-->
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<?php
include 'connect.php';

$query = "SELECT * FROM employee_table WHERE emp_type = 'veterinarian' ORDER BY emp_id DESC";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="display table table-bordered table-striped" id="dynamic-table">
	  <thead>
	  	<tr>
	  		<th>ID</th>
	  		<th class="hidden-phone"width="220">Name</th>
	  		<th class="hidden-phone"width="220">Address</th>
	  		<th class="hidden-phone"width="220">Number</th>
	  		<th width="240">Email</th>
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
				<td>'.$row["emp_id"].'</td>
				<td class="hidden-phone">'.$row["full_name"].'</td>
				<td class="hidden-phone">'.$row["address"].'</td>
				<td class="hidden-phone">'.$row["number"].'</td>
				<td >'.$row["email"].'</td>
				<td>';
					$output .='
					<button type="button" name="active" class="btn btn-sm ';
				
					if ($row['status'] == 'deactivate' || $row['status'] == '')
					{
						$output .='btn-default" id="'.$row["emp_id"].'" onclick="active(this)"><i class="fa fa-power-off"></i> Activate';
					}
					else
					{
						$output .='btn-danger" id="'.$row["emp_id"].'" onclick="Deactive(this)"><i class="fa fa-power-off"></i> Deactivate';
					}
					$output .='</button>

					<button type="button" name="msg" onclick="viewEmp(this)" class="btn btn-sm btn-success msg" id="'.$row["emp_id"].'" ><i class="fa fa-eye"></i> View more</button>
					
                    <button type="button" name="email" class="btn btn-sm btn-primary email" id="'.$row["email"].'" onclick="sendMail(this)"><i class="fa fa-envelope"></i> Email</button>
				</td>
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
<th>ID</th>
<th class="hidden-phone">Name</th>
<th class="hidden-phone">Address</th>
<th class="hidden-phone">Number</th>
<th>Email 	</th>
<th>Action</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>

<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>