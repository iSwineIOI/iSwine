<?php
include 'config.php';

$Pname = $_POST['Pname'];
$output='';
if($Pname == '')
{
    $swineid = $_POST['swineid'];
    $sum = "SELECT SUM(total) AS `AllTotal` FROM pricehistory WHERE swine_id = '$swineid'";
    $exe = mysqli_query($mysqli,$sum);
    $allt = mysqli_fetch_assoc($exe);

    //$totalAll = $allt['AllTotal'];

    $all = "SELECT * FROM pricehistory WHERE swine_id = '$swineid'";
    $get = mysqli_query($mysqli,$all);

    $output .=
    '
    <table class="table table-striped">
      <tr>
        <th width="100">Product name</th>
        <th width="100">Quantity</th>
        <th width="100">Measurement</th>
        <th width="200">Price</th>
        <th width="100" align="right">Total</th>
      </tr>
    ';
    while($row = mysqli_fetch_array($get))
    {
      $output .=
      '
      <tr>
          <td>'.$row['product_name'].'</td>
          <td>'.$row['quantity'].'</td>
          <td>'.$row['measurement'].'</td>
          <td>&#8369; '.number_format($row['price'],2).'</td>
          <td align="right">&#8369; '.number_format($row['total'],2).'</td>
        </tr>
      ';
    }
    $output .=
    '
    <tr>
    <tfoot>
       <th colspan="4">Total Cost:</th>
       <td id="totalPrice" align="right">&#8369; '.number_format($allt['AllTotal'],2).'</td>
    </tfoot>
    </tr>
    </table>
    ';
}
else
{
    $result = $_POST['result'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $Pname = $_POST['Pname'];
    $swineid = $_POST['swineid'];
    $day = $_POST['today'];

    $image1 = '';
    $image2 = '';
    $image3 = '';
    $image4 = '';
    $output = '';

    $mess = "SELECT * FROM swine_cost WHERE swine_ID = '$swineid' AND product_name = '$Pname' ";
    $M = mysqli_query($mysqli,$mess);
    $mes = mysqli_fetch_assoc($M);
    $measurement = $mes['measurement'];

    $query = "SELECT * FROM pricehistory WHERE swine_id = '$swineid' AND product_name = '$Pname';";
    $answer = $mysqli->query($query);

    if ($answer->num_rows == 1)
    {
      $output .="Product Already Added";
    }
    else
    {
      $insert = "INSERT INTO pricehistory (product_name,price,measurement,total,quantity,swine_id,date,image1,image2,image3,image4)VALUES('$Pname','$price','$measurement','$result','$quantity','$swineid','$day','$image1','$image2','$image3','$image4')";

            if(mysqli_query($mysqli,$insert))
              {
                $sum = "SELECT SUM(total) AS `AllTotal` FROM pricehistory WHERE swine_id = '$swineid'";
                $exe = mysqli_query($mysqli,$sum);
                $allt = mysqli_fetch_assoc($exe);

                //$totalAll = $allt['AllTotal'];

                $all = "SELECT * FROM pricehistory WHERE swine_id = '$swineid'";
                $get = mysqli_query($mysqli,$all);

                $output .=
                '
                <table class="table table-striped">
                  <tr>
                    <th width="100">Product name</th>
                    <th width="100">Quantity</th>
                    <th width="100">Measurement</th>
                    <th width="200">Price</th>
                    <th width="100" align="right">Total</th>
                  </tr>
                ';
                while($row = mysqli_fetch_array($get))
                {
                  $output .=
                  '
                  <tr>
                      <td>'.$row['product_name'].'</td>
                      <td>'.$row['quantity'].'</td>
                      <td>'.$row['measurement'].'</td>
                      <td>'.$row['price'].'</td>
                      <td align="right">'.$row['total'].'</td>
                    </tr>
                  ';
                }
                $output .=
                '
                <tr>
                <tfoot>
                   <th colspan="4">Total Cost:</th>
                   <td id="totalPrice" align="right">'.$allt['AllTotal'].'</td>
                </tfoot>
                </tr>
                </table>
                ';
            }
            else
            {
            $output .= mysqli_error($mysqli);
            $output .='failed';
            } 
       }
  }
echo $output;

?>