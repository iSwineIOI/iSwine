<?php
session_start();
include '../../Admin/config.php';
//include 'session.php';
$post_id = $_GET['post_id'];
if(isset($_SESSION['username']))
{
  $name = $_SESSION['username'];
  $getname = "SELECT * FROM customer_table WHERE username = '$name'";
  $resultName = mysqli_query($mysqli,$getname);
  $rowName = mysqli_fetch_assoc($resultName);

  $full_name = $rowName['fname'].' '.$rowName['lname'];
  $cust_id = $rowName['cust_id'];
}
else
{
  $full_name = "Sign Up";
}



$sql = "SELECT * FROM employee_table WHERE emp_type = 'Owner' ";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<!--
Template: Metronic Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
Version: 1.0.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>iSwine | Swine monitoring</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="assets/corporate/img/icons/logo.ico">

  <!-- Fonts START -->
  <link href="assets/font/font.css" rel="stylesheet" type="text/css">
  <link href="assets/font/font1.css" rel="stylesheet" type="text/css">
  <!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="assets/pages/css/animate.css" rel="stylesheet">
  <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <link rel="stylesheet" type="text/css" href="../../Admin/css/custom.css"/>  

  <!-- Theme styles START -->
  <link href="assets/pages/css/components.css" rel="stylesheet">
  <link href="assets/pages/css/slider.css" rel="stylesheet">
  <link href="assets/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="assets/corporate/css/style.css" rel="stylesheet">
  <link href="assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="assets/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->


<!-- Body BEGIN -->
<body onload="cart()" class="ecommerce">

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+63<?php echo $row['number']?></span></li>
                        <!-- BEGIN CURRENCIES -->
                        <li class="shop-currencies">
                            <a href="javascript:void(0);" class="current">&#8369;</a>
                        </li>
                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->
                        <li class="langs-block">
                            <a href="javascript:void(0);" class="current">English </a>
                        </li>
                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="#" onclick="account()" id="account"><?php echo $full_name?></a></li>
                        <li><a href="transaction.php">My Transaction</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a style="cursor: pointer;" id="login" 
                        <?php
                        if(isset($_SESSION['username']))
                        {
                          echo 'href="logout.php">Log Out';
                        }
                        else
                        {
                          echo 'onclick="login()">Log In';
                        }
                        ?>
                        </a></li>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
<form method="post" action="validate.php">
  <div class="container">
    <div class="modal fade" id="loginC" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
          </div>
            <div class="modal-body">
              <h2 style="text-align: center;">LOGIN</h2>
              <hr>
              <label>Username:</label>
                <input type="text" name="usernameLogin" class="form-control" id="cust_user" name="">
              <label>Password:</label>
                <input type="Password" name="passwordLogin" class="form-control" id="cust_user" name=""><br></br>
              <button type="submit" class="btn btn-primary btn-md">LOGIN</button><br></br>
                <p>Dont have an account? <a href="register.php" style="font-style: italic;">Register here!</a></p>
              <hr>
              <label style="text-align: center!important;">OR</label>
                <a href=""><img src="assets/font/google.png" width="268"></a>
            <div class="modal-footer">

            </div>
            <!--<a href="#" data-dismiss="modal" style="float: right;text-decoration: none;font-size: 15px;color: #76818B;margin-bottom: -10px;"><img src="assets/corporate/img/up.png" width="20" style="float: right; margin-top: -15px;"></a>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
  function account(){
    var acc = document.getElementById('account').innerHTML;
    //alert(acc);
    if(acc == "Sign Up")
    {
      window.location="register.php";
    }
    else
    {
      window.location="myAccount.php";
    }
  }
</script>
    <script type="text/javascript">
      function login(){
        $("#loginC").modal("show");
      }
    </script>
    <!-- END TOP BAR -->
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="shop-index.html"><img src="assets/corporate/img/logos/logo.png" width="150"style="margin-top: -60px; margin-bottom: -60px;" alt="Metronic Shop UI"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>


        <!--displaying cart-->
        <script type="text/javascript">
          function cart(){
            var cust_id = document.getElementById('cust_id').value;
            $.ajax({
              url: 'fetchCart.php',
              method: 'post',
              data:{'cust_id':cust_id},
              success:function(data)
              {
                $("#cartDetails").html(data);
              }
            })
          }
        </script>
        <!-- BEGIN CART -->
        <div id="cartDetails">
        
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li class="dropdown">
            <li class="active"><a href="index.php">HOME</a></li>
            </li>

            <li class="dropdown dropdown100 nav-catalogue">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                New Product
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <?php
                      $getProd = "SELECT * FROM postproduct WHERE cust_id = 0  ORDER BY date_posted DESC LIMIT 4";
                      $getResult = mysqli_query($mysqli,$getProd);

                      while ($getRow = mysqli_fetch_array($getResult))
                      {
                      ?>
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="shop-item.html"><img src="../../Admin/img/productImage/<?php echo $getRow['Frontimage']?>" class="img-responsive" alt="Front face" style="height: 300px; width:300px;object-fit: cover;"></a>
                          </div>
                          <h3><a href="shop-item.html"><?php echo $getRow['post_name']?></a></h3>
                          <div class="pi-price">&#8369; <?php echo number_format($getRow['price'])?></div>
                          <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                      </div>
                      <?php
                      };?>
                    </div>
                  </div>
                </li>
              </ul>
            </li> 
            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">

            <div class="sidebar-products clearfix">
              <h2>ON SALES</h2>
              <?php
              $getProd = "SELECT * FROM postproduct WHERE cust_id = 0 AND sale_status = 'On sale' ORDER BY date_posted DESC";
              $getResult = mysqli_query($mysqli,$getProd);

              while ($getRow = mysqli_fetch_array($getResult))
              {
              ?>
              <div class="item">
                <a href="shop-item.html"><img src="../../Admin/img/productImage/<?php echo $getRow['Frontimage']?>" alt="Some Shoes in Animal with Cut Out" style="height: 60px;width: 60px; object-fit: cover;cursor: pointer;"></a>
                <h3><a href="shop-item.html"><?php echo $getRow['post_name']?></a></h3>
                <div class="price">&#8369; <?php echo number_format($getRow['new_price'])?></div>
              </div>
              <?php }?>
            </div>
          </div>
          <!-- END SIDEBAR -->
          <?php
          $det = "SELECT * FROM postproduct WHERE post_id = '$post_id'";
          $res = mysqli_query($mysqli,$det);
          $details = mysqli_fetch_assoc($res);
          ?>
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="product-main-image">
                    <img src="../../Admin/img/productImage/<?php echo $details['Frontimage']?>" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="../../Admin/img/productImage/<?php echo $details['Frontimage']?>">
                  </div>
                  <div class="product-other-images">
                    <a href="../../Admin/img/productImage/<?php echo $details['Frontimage']?>" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="../../Admin/img/productImage/<?php echo $details['Frontimage']?>"></a>

                    <a href="../../Admin/img/productImage/<?php echo $details['Leftimage']?>" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="../../Admin/img/productImage/<?php echo $details['Leftimage']?>"></a>

                    <a href="../../Admin/img/productImage/<?php echo $details['Rightimage']?>" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="../../Admin/img/productImage/<?php echo $details['Rightimage']?>"></a>

                    <a href="../../Admin/img/productImage/<?php echo $details['Backimage']?>" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="../../Admin/img/productImage/<?php echo $details['Backimage']?>"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h1><?php echo $details['post_name']?></h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>&#8369; </span><?php echo number_format($details['price'])?></strong>
                      <em>&#8369; <span><?php echo number_format($details['new_price'])?></span></em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p><?php echo $details['description']?></p>
                    <p><?php echo $details['age']?></p>
                  </div>
                  <h6>Estimated weight</small><h6>
                  <div class="row">
                  <div class="product-page-options">
                    <div class="pull-left">
                      <div class="col-md-4">
                      <label class="control-label">From:</label>
                      <input id="startWeight" value="<?php echo $details['weight']?>" class="form-control input-sm" readonly>
                      </div>
                      <div class="col-md-4">
                      <label class="control-label">To:</label>
                      <input id="endWeight" value="<?php echo $details['endWeight']?>" class="form-control input-sm" readonly>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="product-page-cart">
                    <a href="checkout.php"><button class="btn btn-success" type="submit">Check out</button></a>
                  </div>
                  <div class="review">
                    
                    <a href="javascript:;">7 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;">Write a review</a>
                  </div>
                </div>

                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li><a href="#Description" data-toggle="tab">Description</a></li>
                    <li><a href="#Information" data-toggle="tab">Information</a></li>
                    <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade" id="Description">
                      <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. </p>
                    </div>
                    <div class="tab-pane fade" id="Information">
                      <table class="datasheet">
                        <tr>
                          <th colspan="2">Additional features</th>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 1</td>
                          <td>21 cm</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 2</td>
                          <td>700 gr.</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 3</td>
                          <td>10 person</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 4</td>
                          <td>14 cm</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 5</td>
                          <td>plastic</td>
                        </tr>
                      </table>
                    </div>
                    <div class="tab-pane fade in active" id="Reviews">
                      <!--<p>There are no reviews for this product.</p>-->
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Bob</strong>
                          <em>30/12/2013 - 07:37</em>
                          <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                        </div>
                      </div>
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Mary</strong>
                          <em>13/12/2013 - 17:49</em>
                          <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                        </div>
                      </div>

                      <!-- BEGIN FORM-->
                      <form action="#" class="reviews-form" role="form">
                        <h2>Write a review</h2>
                        <div class="form-group">
                          <label for="name">Name <span class="require">*</span></label>
                          <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                          <label for="review">Review <span class="require">*</span></label>
                          <textarea class="form-control" rows="8" id="review"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="email">Rating</label>
                          <input type="range" value="4" step="0.25" id="backing5">
                          <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                          </div>
                        </div>
                        <div class="padding-top-20">                  
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                      </form>
                      <!-- END FORM--> 
                    </div>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
        <!-- END SIDEBAR & CONTENT -->
<!-- Script for viewing sell products------------------------------------------------------------------------------------------------->
<script type="text/javascript">
  function viewImageSell(a){
      var id = a.id;
      $.ajax({
        url: 'getDetails.php',
        method: 'post',
        data:{'id':id},
        dataType: 'json',
        success:function(data)
        {
          $("#post_id").html(data.post_id);
          $("#breedName").html(data.post_name);
          $("#description").html(data.description);
          $("#startWeight").val(data.weight);
          $("#endWeight").val(data.endWeight);
          $("#age").html("Age: "+data.age);
          var pPrice = data.price;
          var newPrice = new Intl.NumberFormat("en-US",{
            style:"currency",
            currency: "PHP"
          })
          document.getElementById('post_price').innerHTML = newPrice.format(pPrice);
          //$("#post_price").html("&#8369; "+data.price);
          //$("#Frontimage").src(data.Frontimage);
          document.getElementById('1Frontimage').src ="../../Admin/img/productImage/"+data.Frontimage;
          document.getElementById('Frontimage').src ="../../Admin/img/productImage/"+data.Frontimage;
          document.getElementById('Leftimage').src ="../../Admin/img/productImage/"+data.Leftimage;
          document.getElementById('Rightimage').src ="../../Admin/img/productImage/"+data.Rightimage;
          document.getElementById('Backimage').src ="../../Admin/img/productImage/"+data.Backimage;
          
          var date = new Date();
          const months = ['Jas','feb','Mar','Apr','May','Jun','Jul','Sep','Oct','Nov','Dec'];
          const days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

          const monthIndex = date.getMonth()-1;
          const monthname = months[monthIndex];
          const dayIndex = date.getDay();
          const dayname = days[dayIndex];

          var dd = date.getDate()+5;
          var yy = date.getFullYear();

          var untilDay = monthname+' '+dd+' '+yy;
          document.getElementById('untilDay').innerHTML = "Until "+untilDay;
        }
      })
  }
  function front(){
    var viewDis = document.getElementById('Frontimage').src;
    document.getElementById('1Frontimage').src = viewDis;
  }
  function left(){
    var viewDis = document.getElementById('Leftimage').src;
    document.getElementById('1Frontimage').src = viewDis;
  }
  function right(){
    var viewDis = document.getElementById('Rightimage').src;
    document.getElementById('1Frontimage').src = viewDis;
  }
  function back(){
    var viewDis = document.getElementById('Backimage').src;
    document.getElementById('1Frontimage').src = viewDis;
  }
</script>
<!-- END Script----------------------------------------------------------------------------------------------------------------------->

<!-- BEGIN view sell product ----------------------------------------------------------------------------------------------------->
<div id="product-pop-up" style="display: none; width: 700px;">
    <div class="product-page product-pop-up">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-3">
          <div class="product-main-image">
            <img id="1Frontimage" alt="Cool green dress with red bell" class="img-responsive" style="height: 350px;width: 350px; object-fit: cover;">
          </div>
          <div class="product-other-images">
            <a><img alt="Berry Lace Dress" onclick="front()" id="Frontimage" style="height: 60px;width: 60px; object-fit: cover;cursor: pointer;"></a>
            <a><img alt="Berry Lace Dress" onclick="left()" id="Leftimage" style="height: 60px;width: 60px; object-fit: cover;cursor: pointer;"></a>
            <a><img alt="Berry Lace Dress" onclick="right()" id="Rightimage" style="height: 60px;width: 60px; object-fit: cover;cursor: pointer;"></a>
            <a><img alt="Berry Lace Dress" onclick="back()" id="Backimage" style="height: 60px;width: 60px; object-fit: cover;cursor: pointer;"></a>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
          <h2 id="breedName"></h2>
          <div class="price-availability-block clearfix">
            <div class="price">
              <strong><span id="post_price"></span></strong>
            </div>
            <div class="availability">
              Availability: <strong>In Stock</strong>
            </div>
          </div>
          <div class="description">
            <p id="description"></p>
            </br>
            <p id="age"></p>
          </div>
          <hr>
          <h6>Estimated weight | <small id="untilDay" style="font-style: italic;font-size: 10px;"></small><h6>
          <div class="row">
          <div class="product-page-options">
            <div class="pull-left">
              <div class="col-md-4">
              <label class="control-label">From:</label>
              <input id="startWeight" class="form-control input-sm" readonly>
              </div>
              <div class="col-md-4">
              <label class="control-label">To:</label>
              <input id="endWeight" class="form-control input-sm" readonly>
              </div>
            </div>
          </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <!--<input type="hidden" id="post_id" name="">-->
              <a style="display: none;" onclick="addToCart(this)" class="btn btn-primary" id="post_id">Add to cart</a>
              <a onclick="AsTrigger()" class="btn btn-primary addToCart">Add to cart</a>
            </div>
            <div class="col-md-6">
              <button href="shop-item.html" class="btn btn-default">More details</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    <div class="sticker sticker-new"></div>
  </div>
    <!-- END fast view of a product -->
<script type="text/javascript">
  function AsTrigger(a){
    document.querySelector('#post_id').click();
  }
</script>
<!--End viewing sell product-------------------------------------------------------------------------------------------->

<!-- Script for viewing sell products------------------------------------------------------------------------------------------------->
<script type="text/javascript">
  function viewImageSale(a){
      var id = a.id;
      $.ajax({
        url: 'getDetails.php',
        method: 'post',
        data:{'id':id},
        dataType: 'json',
        success:function(data)
        {
          $("#post_id_sale").html(data.post_id);
          $("#breedName_sale").html(data.post_name);
          $("#description_sale").html(data.description);
          $("#startWeight_sale").val(data.weight);
          $("#endWeight_sale").val(data.endWeight);
          $("#age_sale").html("Age: "+data.age);
          var pPrice = data.price;
          var newPrice = new Intl.NumberFormat("en-US",{
            style:"currency",
            currency: "PHP"
          })
          document.getElementById('post_price_sale').innerHTML = newPrice.format(pPrice);

          var sale_Price = data.new_price;
          var salePrice = new Intl.NumberFormat("en-US",{
            style:"currency",
            currency: "PHP"
          })
          document.getElementById('new_price').innerHTML = salePrice.format(sale_Price);

          //$("#post_price").html("&#8369; "+data.price);
          //$("#Frontimage").src(data.Frontimage);
          document.getElementById('1Frontimage_sale').src ="../../Admin/img/productImage/"+data.Frontimage;
          document.getElementById('Frontimage_sale').src ="../../Admin/img/productImage/"+data.Frontimage;
          document.getElementById('Leftimage_sale').src ="../../Admin/img/productImage/"+data.Leftimage;
          document.getElementById('Rightimage_sale').src ="../../Admin/img/productImage/"+data.Rightimage;
          document.getElementById('Backimage_sale').src ="../../Admin/img/productImage/"+data.Backimage;
          
          var date = new Date();
          const months = ['Jas','feb','Mar','Apr','May','Jun','Jul','Sep','Oct','Nov','Dec'];
          const days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

          const monthIndex = date.getMonth()-1;
          const monthname = months[monthIndex];
          const dayIndex = date.getDay();
          const dayname = days[dayIndex];

          var dd = date.getDate()+5;
          var yy = date.getFullYear();

          var untilDay = monthname+' '+dd+' '+yy;
          document.getElementById('untilDay_sale').innerHTML = "Until "+untilDay;
        }
      })
  }
  function front_sale(){
    var viewDis_sale = document.getElementById('Frontimage_sale').src;
    document.getElementById('1Frontimage_sale').src = viewDis_sale;
  }
  function left_sale(){
    var viewDis_sale = document.getElementById('Leftimage_sale').src;
    document.getElementById('1Frontimage_sale').src = viewDis_sale;
  }
  function right_sale(){
    var viewDis_sale = document.getElementById('Rightimage_sale').src;
    document.getElementById('1Frontimage_sale').src = viewDis_sale;
  }
  function back_sale(){
    var viewDis_sale = document.getElementById('Backimage_sale').src;
    document.getElementById('1Frontimage_sale').src = viewDis_sale;
  }
</script>
<!-- END Script----------------------------------------------------------------------------------------------------------------------->

<!-- BEGIN view sale product ----------------------------------------------------------------------------------------------------->
<div id="product-pop-upSale" style="display: none; width: 700px;">
    <div class="product-page product-pop-up">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-3">
          <div class="product-main-image">
            <img id="1Frontimage_sale" alt="Cool green dress with red bell" class="img-responsive" style="height: 350px;width: 350px; object-fit: cover;">
          </div>
          <div class="product-other-images">
            <a><img alt="Berry Lace Dress" onclick="front_sale()" id="Frontimage_sale" style="height: 60px;width: 60px; object-fit: cover;cursor: pointer;"></a>
            <a><img alt="Berry Lace Dress" onclick="left_sale()" id="Leftimage_sale" style="height: 60px;width: 60px; object-fit: cover;cursor: pointer;"></a>
            <a><img alt="Berry Lace Dress" onclick="right_sale()" id="Rightimage_sale" style="height: 60px;width: 60px; object-fit: cover;cursor: pointer;"></a>
            <a><img alt="Berry Lace Dress" onclick="back_sale()" id="Backimage_sale" style="height: 60px;width: 60px; object-fit: cover;cursor: pointer;"></a>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
          <h2 id="breedName_sale"></h2>
          <div class="price-availability-block clearfix">
            <div class="price">
              <strong><span id="new_price"></span></strong>
              <em><span id="post_price_sale"></span></em>
            </div>
            <div class="availability">
              Availability: <strong>In Stock</strong>
            </div>
          </div>
          <div class="description">
            <p id="description_sale"></p>
            </br>
            <p id="age_sale"></p>
          </div>
          <hr>
          <h6>Estimated weight | <small id="untilDay_sale" style="font-style: italic;font-size: 10px;"></small><h6>
          <div class="row">
          <div class="product-page-options">
            <div class="pull-left">
              <div class="col-md-4">
              <label class="control-label">From:</label>
              <input id="startWeight_sale" class="form-control input-sm" readonly>
              </div>
              <div class="col-md-4">
              <label class="control-label">To:</label>
              <input id="endWeight_sale" class="form-control input-sm" readonly>
              </div>
            </div>
          </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <!--<input type="hidden" id="post_id" name="">-->
              <a style="display:none;" onclick="addToCart(this)" class="btn btn-primary" id="post_id_sale">Add to cart</a>
              <a onclick="AsTrigger_sale()" class="btn btn-primary addToCart">Add to cart</a>
            </div>
            <div class="col-md-6">
              <button href="shop-item.html" class="btn btn-default">More details</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    <div class="sticker sticker-sale"></div>
  </div>
    <!-- END fast view of a product -->
<script type="text/javascript">
  function AsTrigger_sale(a){
    document.querySelector('#post_id').click();
  }
</script>
<!--End viewing sell product-------------------------------------------------------------------------------------------->
<!-- Modal  for login b4 order-------------------------------------------------------------------------------------------->
<form method="post" action="validate.php">
  <div class="container">
    <div class="modal fade" id="custom_login" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
          </div>
            <div class="modal-body">
              <h2 style="text-align: center;">You must login first</h2>
              <hr>
              <label>Username:</label>
                <input type="text" name="usernameLogin" class="form-control" id="cust_user" name="">
              <label>Password:</label>
                <input type="Password" name="passwordLogin" class="form-control" id="cust_user" name=""><br></br>
              <button type="submit" class="btn btn-primary btn-md">LOGIN</button><br></br>
                <p>Dont have an account? <a href="register.php" style="font-style: italic;">Register here!</a></p>
              <hr>
              <label style="text-align: center!important;">OR</label>
                <a href=""><img src="assets/font/google.png" width="268"></a>
            <div class="modal-footer">

            </div>
            <!--<a href="#" data-dismiss="modal" style="float: right;text-decoration: none;font-size: 15px;color: #76818B;margin-bottom: -10px;"><img src="assets/corporate/img/up.png" width="20" style="float: right; margin-top: -15px;"></a>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Modal end for login b4 order-------------------------------------------------------------------------------------------->

<!-- Modal  for login b4 order-------------------------------------------------------------------------------------------->
  <div class="container">
    <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
          </div>
            <div class="modal-body">
              <h2 style="text-align: center;">EXPIRED NOTICE</h2>
              <hr>
              <label>Dear <?php echo $full_name?></label>
              <p>The item that you have added to your cart has a <b>limitted time</b>.</br>
              <hr>
              If the item has not been confirm for check out within <i>24 hours.</i> The item will automatically remove from your cart. </p><br>Please corfirm your checkout before logging out.</p>
            <div class="modal-footer">
            <a href="home.php" class="btn btn-success">Ok, I Understand</a>
            </div> 
            <!--<a href="#" data-dismiss="modal" style="float: right;text-decoration: none;font-size: 15px;color: #76818B;margin-bottom: -10px;"><img src="assets/corporate/img/up.png" width="20" style="float: right; margin-top: -15px;"></a>-->
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Modal end for login b4 order-------------------------------------------------------------------------------------------->

<!--del cart-------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
  function delCart(a){
    var cust_id = document.getElementById('cust_id').value;
    var postid = a.id;
    //alert(cartid);
    $.ajax({
      url: 'delCart.php',
      method: 'post',
      data:{'postid':postid,'cust_id':cust_id},
      success:function(data)
      {
        //alert(data);
        cart();
        window.location="home.php";
      }
    })
  }
</script>
<!-- End del cart-------------------------------------------------------------------------------------------->
<input type="hidden" id="cust_id" value="<?php echo $cust_id?>" name="">

<!--add to cart script------------------------------------------------------------------------------------------->
<script type="text/javascript">
  function addToCart(a){
    //var post_id = document.getElementById('post_id').value;
    var post_id = document.getElementById('post_id').innerHTML;
    var post_id = document.getElementById('post_id_sale').innerHTML;
    var cust_id = document.getElementById('cust_id').value;
    var cartID = a.id;
    //alert(post_id);
    $.ajax({
      url: 'addToCart.php',
      method: 'post',
      data:{'cartID':cartID,'cust_id':cust_id,'post_id':post_id},
      success:function(data)
      {
        //alert(data);
        if (data == "not registered")
        {
          //alert("Please register first");
          //setInterval(function(){window.location="../../Admin/registration.php"},2000);
          //document.querySelector('#login').click();
          $("#custom_login").modal("show");
        }
        else if(data == "message")
        {
          $("#message").modal("show");
        }
        else if (data == "added")
        {
          alert("Added to cart");
          window.location="home.php";
          cart();
        }
        else if(data == 'exist')
        {
          alert("Item already in the cart");
          cart();
        }
        else
        {
          alert("failed add to cart");
          cart();
        }
      }
    })
  }
</script>
<!--end add to cart script----------------------------------------------------------------------------------------------------------->


<!-- for mobile--------------------------------------------------------------------------------------------------------------->
  <div id="content-phone">
    <div class="main">
      <div class="container">
        <div class="row margin-bottom-35 ">
          <!-- BEGIN TWO PRODUCTS -->
          <div class="col-md-6 two-items-bottom-items">
            <h2>New Post</h2>
            <div class="owl-carousel owl-carousel2">
              <?php
              $getProd = "SELECT * FROM postproduct ORDER BY date_posted DESC";
              $getResult = mysqli_query($mysqli,$getProd);

              while ($getRow = mysqli_fetch_array($getResult))
              {
              ?>
               <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <a href="shop-item.html"><img src="../../Admin/img/productImage/<?php echo $getRow['Frontimage']?>" class="img-responsive" alt="Front face" style="height: 250px; width:250px;object-fit: cover;"></a>
                    <div>
                      <a href="../../Admin/img/productImage/<?php echo $getRow['Frontimage']?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view" id="<?php echo $getRow['post_id']?>" onclick="viewImage(this)">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html"><?php echo $getRow['post_name']?></a></h3>
                  <div class="pi-price">&#8369; <?php echo number_format($getRow['price'])?></div>
                  <a href="javascript:;" id="<?php echo $getRow['post_id']?>" onclick="addToCart(this)" class="btn btn-default add2cart">Add to cart</a>
                  <div class="sticker sticker-new"></div>
                </div>
              </div>
              <?php
              };?>
            </div>
          </div>
          <!-- END TWO PRODUCTS -->
        <!-- END TWO PRODUCTS & PROMO -->
      </div>
    </div>
  </div>
</div>

    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>About us</h2>
            <p>We the iSwine group create the system base on every related literature and studies. We came up with the idea of creating swine monitoring system was becuase we found out about the life of every farmer on swine industry. </p>
            <p>So far almost all of them are not aware on how much benifits they have recieve. They are not aware because they had no back tracking transaction to record they daily report.</p>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->

          <!-- BEGIN TWITTER BLOCK --> 
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Owner Info</h2>
            <ul class="list-unstyled">
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;"><?php echo $row['full_name']?></a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;"><?php echo $row['email']?></a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;"><?php echo $row['address']?></a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;"><?php echo $row['email']?></a></li>
            </ul>
          </div>
          <!-- END TWITTER BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Our Contacts</h2>
            <address class="margin-bottom-40">
              Eden Toril Davao City<br>
              Phone: +63<?php echo $row['number']?><br>
              Email: <a href="mailto:info@metronic.com">iSwine@gmail.com</a><br>
              Skype: <a href="skype:metronic">Reishaq.skype</a>
            </address>
          </div>
          <!-- END BOTTOM CONTACTS -->

          <!-- BEGIN BOTTOM INFO BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Information</h2>
            <ul class="list-unstyled">
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Delivery Information</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Customer Service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Order Tracking</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Cancellation &amp; Returns</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="contacts.html">Contact Us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Careers</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Payment Methods</a></li>
            </ul>
          </div>
          <!-- END INFO BLOCK -->
        </div>
        <hr>
        <div class="row">
          <!-- BEGIN SOCIAL ICONS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-icons">
              <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
              <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
            </ul>
          </div>
          <!-- END SOCIAL ICONS -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-4 col-sm-4 padding-top-10">
            iSwine © Swine Monitor. ALL Rights Reserved. 
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN POWERED -->
          <div class="col-md-4 col-sm-4 text-right">
            <p class="powered">iSwine: <a href="http://www.keenthemes.com/">iSwine.com</a></p>
          </div>
          <!-- END POWERED -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

   

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->
    <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
            
            Layout.initFixHeaderWithPreHeader();
            Layout.initNavScrolling();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>