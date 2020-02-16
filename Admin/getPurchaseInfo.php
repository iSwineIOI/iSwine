<?php
include 'config.php';

//$cust_id =$_POST['cust_id'];
$purchase_code = $_POST['purchase_code'];

$sql = "SELECT * FROM purchase_table WHERE purchase_code = '$purchase_code'";
$result = mysqli_query($mysqli,$sql);

$output ='';

$output .='
		<table class="table table-borderd">
		<thead>
			<tr>
				<th>Product Image</th>
				<th>Date</th>
				<th>Product Name</th>
				<th>Product Description</th>
				<th>Product Price</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>	
		';
while($row = mysqli_fetch_array($result))
{
	$postDate = $row["date_purchase"];
	$date = date("M d, Y", strtotime($postDate));
	$output.='
			<tr>
				<td><img style="padding: 0;margin:0;margin-right: auto;margin-left: auto;height: 50px; width:50px;object-fit: cover;" src="img/productImage/'.$row["FrontImage"].'"></td>
				<td>'.$date.'</td>
				<td>'.$row["post_name"].'</td>
				<td>'.$row["product_description"].'</td>

				<td align="right">&#8369; '.number_format($row["price"],2).'</td>
				<td align="right">
				';
				if ($row['status'] == "On Hold")
				{
					$output.='<button class="btn btn-primary btn-sm confirm" onclick="confirmPurchase(this)" id="'.$row['post_id'].'"><i class="fa fa-check"></i> </button>
					<input type="hidden" id="purchase_code" value="'.$row['purchase_code'].'">';
				}
				else
				{
					$output.='<span style="color:white;font-size:14px;" class="badge badge-success"> '.$row['status'].'</span>';
				}
				$output.='
				
				</td>
			</tr>
		';
}
$output.='</tbody></table>';
echo $output;
?>