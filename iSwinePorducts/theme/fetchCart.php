<?php
include '../../Admin/config.php';

$cust_id = $_POST['cust_id'];

$count = "SELECT count(cart_id) AS totalCart FROM cart WHERE cust_id = '$cust_id'";
$resultCount = mysqli_query($mysqli,$count);
$rowCount = mysqli_fetch_assoc($resultCount);

$plus = "SELECT SUM(price) AS totalPrice FROM cart WHERE cust_id = '$cust_id'";
$resultPlus = mysqli_query($mysqli,$plus);
$rowPlus = mysqli_fetch_assoc($resultPlus);

$show = "SELECT * FROM cart WHERE cust_id = '$cust_id'";
$resultShow = mysqli_query($mysqli,$show);

$total = $rowPlus['totalPrice'];

$cartCount = $rowCount['totalCart'];

$output = 
'
<div class="top-cart-block">
<div class="top-cart-info">
  <a href="javascript:void(0);" class="top-cart-info-count">'.$cartCount.' item(s)</a>
  <a href="javascript:void(0);" class="top-cart-info-value">&#8369; '.number_format($total).'</a>
</div>
<i class="fa fa-shopping-cart"></i>
              
<div class="top-cart-content-wrapper">
  <div class="top-cart-content">
    <ul class="scroller" style="height: 250px;">';
      while ($rowShow = mysqli_fetch_array($resultShow))
      {
      $output .='
      <li id="listCart">
        <a href="shop-item.html"><img src="../../Admin/img/productImage/'.$rowShow['Frontimage'].'" alt="Rolex Classic Watch" width="37" height="34"></a>
        <span class="cart-content-count">x <?php echo $cartCount?></span>
        <strong><a href="viewItem.php?post_id='.$rowShow['post_id'].'">'.$rowShow['post_name'].'</a></strong>
        <em>&#8369; '.number_format($rowShow['price']).'</em>
        <a href="javascript:void(0);" id="'.$rowShow['post_id'].'" onclick="delCart(this)" class="del-goods">&nbsp;</a>
      </li>';
      }
      $output .='
    </ul>
    <div class="text-right">
      <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </div>
  </div>
</div>            
</div>
';

echo $output;

?>