<?php
session_start();
include '../../Admin/config.php';

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

  <!--toastr-->
  <link href="assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />



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
<body class="ecommerce">

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
                        <li><a href="shop-account.html">My Account</a></li>
                        <li><a href="shop-wishlist.html">My Wishlist</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="#" onclick="login()">Log In</a></li>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
    <?php
    $count = "SELECT count(cart_id) AS totalCart FROM cart";
    $resultCount = mysqli_query($mysqli,$count);
    $rowCount = mysqli_fetch_assoc($resultCount);

    $plus = "SELECT SUM(price) AS totalPrice FROM cart";
    $resultPlus = mysqli_query($mysqli,$plus);
    $rowPlus = mysqli_fetch_assoc($resultPlus);

    $show = "SELECT * FROM cart";
    $resultShow = mysqli_query($mysqli,$show);

    $total = $rowPlus['totalPrice'];

    $cartCount = $rowCount['totalCart'];
    ?>
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="shop-index.html"><img src="assets/corporate/img/logos/logo.png" width="150"style="margin-top: -60px; margin-bottom: -60px;" alt="Metronic Shop UI"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count"><?php echo $cartCount?> item(s)</a>
            <a href="javascript:void(0);" class="top-cart-info-value">&#8369; <?php echo number_format($total)?></a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content">
              <ul class="scroller" style="height: 250px;">
                <?php
                while ($rowShow = mysqli_fetch_array($resultShow))
                {
                ?>
                <li>
                  <a href="shop-item.html"><img src="../../Admin/img/productImage/<?php echo $rowShow['Frontimage']?>" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x <?php echo $cartCount?></span>
                  <strong><a href="shop-item.html"><?php echo $rowShow['post_name']?></a></strong>
                  <em>&#8369; <?php echo number_format($rowShow['price'])?></em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
                <?php
                }?>
              </ul>
              <div class="text-right">
                <a href="checkout.php" class="btn btn-default">View Cart</a>
                <a href="checkout.php" class="btn btn-primary">Checkout</a>
              </div>
            </div>
          </div>            
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li class="dropdown">
            <li class="active"><a href="home.php">HOME</a></li>
            </li>

            <li><a href="index.php">Product List</a></li>
            <li class="dropdown dropdown100 nav-catalogue">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                New Product
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <?php
                      $getProd = "SELECT * FROM postproduct ORDER BY date_posted DESC LIMIT 4";
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
        <form method="post" action="addcustomer.php">
                <div id="payment-address-content">
                  <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
                      <h3>Your Personal Details</h3>
                      <div class="form-group">
                        <label for="firstname">First Name <span class="require">*</span></label>
                        <input type="text" name="firstname" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Last Name <span class="require">*</span></label>
                        <input type="text" name="lastname" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="email">E-Mail <span class="require">*</span></label>
                        <input type="text" name="email" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="telephone">Telephone | Mobile <span class="require">*</span></label>
                        <input type="number" name="telephone" class="form-control" required>
                      </div>
                      <h3>Your Address</h3>
                      <div class="form-group">
                        <label for="company">Company </label>
                        <input type="text" name="company" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="address1">Address 1<span class="require"> *</span></label>
                        <input type="text" name="address1" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="address2">Address 2</label>
                        <input type="text" name="address2" class="form-control">
                      </div>
                    

                      
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <h3>Your Account Information</h3>
                      <div class="form-group">
                        <label for="fax">Username <span class="require"> *</span></label>
                        <input type="text" name="username" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="password">Password <span class="require">*</span></label>
                        <input type="password" name="password" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="password-confirm">Password Confirm <span class="require">*</span></label>
                        <input type="password" name="password-confirm" class="form-control" required>
                      </div>
                        <input type="checkbox"> I have read and agree to the <a title="Privacy Policy" href="javascript:;">Privacy Policy</a> &nbsp;&nbsp;&nbsp;<br></br>
                      <a href="#" onclick="googleReg();"><img src="assets/font/google.png" width="200"></a>
                      <button class="btn btn-primary btn-lg pull-right" type="submit" data-parent="#checkout-page" style="padding-right: 50px;padding-left: 50px;" >SIGN UP</button>
                    </div>
                    <hr>
                  </div>
                </div>
                </form>
              </div>
            </div>
    <!--register as google-->
    <script type="text/javascript">
      function googleReg(){
        alert("dawd");
        toastr.success("dawdaw","daw");
      }
    </script>
    <!--end reg google-->

                      <!-- Modal -->
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
                <input type="" class="form-control" id="cust_user" name="">
              <label>Password:</label>
                <input type="" class="form-control" id="cust_user" name=""><br></br>
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
  function login(){
    $("#loginC").modal("show");
  }
</script>
          <!--modal start-->
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



    <!--toastr-->
    <script src="assets/toastr-master/toastr.js"></script>
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