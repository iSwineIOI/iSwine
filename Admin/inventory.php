<?php
include 'config.php';
include 'session.php';
$name = $_SESSION['Username'];
//echo $name;
$s = "SELECT * FROM employee_table WHERE full_name = '$name'";
$result = mysqli_query($mysqli,$s);
$row = mysqli_fetch_array($result);
$image = $row['picture'];
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab-4/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 10:51:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico">

    <title>iSwine | Monitoring</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!--toastr-->
    <link href="assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />

    <!--custom css-->
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>


  </head>

  <style type="text/css">
      span.i{
        font-family: Simple tfb;
        text-transform: lowercase;
        color:black !important;
      }
      span.s{
        font-family: Simple tfb;
        text-transform: lowercase;
      }
      span.w{
         font-family: Simple tfb;
      }
  </style>

  <body onload="load_data()">

  <section id="container">
       <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <i class="fa fa-bars"></i>
              </div>
            <!--logo start-->
            <a href="home.php" class="logo"><img src="img/logo.ico" width="30" style="padding:0;margin-top: -4%;"><span class="i"> i</span><span class="w">S</span><span class="s">wine</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    
                    <!-- notification dropdown start-->
                    <?php
                    $em = "SELECT count(emp_id) as notactive FROM employee_table WHERE status = 'deactivate'";
                    $let = mysqli_query($mysqli,$em);
                    $no = mysqli_fetch_assoc($let);

                    $getEm = "SELECT * FROM employee_table WHERE status = 'deactivate'";
                    $teh = mysqli_query($mysqli,$getEm);
                    
                    ?>
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge badge-warning"><?php echo $no['notactive']?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">You have <?php echo $no['notactive']?> new notifications</p>
                            </li>
                        <?php
                        while($notac = mysqli_fetch_array($teh))
                        {
                            echo'<li>
                                <a href="employee.php">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    '.$notac["full_name"].'
                                    | <span class="small italic">'.$notac["emp_type"].'</span>
                                </a>
                            </li>';
                        }
                        ?>
                            <li>
                                <a href="#">See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
    
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" width="35" src="img/profilePicture/<?php echo $image;?>"/>
                            <span class="username"><?php echo $name;?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout dropdown-menu-right">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                            <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <li class="sb-toggle-right">
                        <i class="fa  fa-align-right"></i>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="home.php">
                          <i class="fa fa-home"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa  fa-github-alt"></i>
                          <span>Swine</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="sow.php">Sow</a></li>
                          <li><a  href="boar.php">Boar</a></li>
                          <li><a href="piglet.php">Piglet</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Report</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="medication.php">Medication</a></li>
                          <li><a  href="vaccination.php">Vaccination</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="breeding.php" >
                          <i class="fa fa-calendar-o"></i>
                          <span>Breeding History </span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="active" >
                          <i class="fa fa-list-alt"></i>
                          <span>Inventory</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="swineCost.php">Swine Cost</a></li>
                          <li class="active"><a  href="Inventory.php">Storage</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="employee.php" >
                          <i class="fa fa-user"></i>
                          <span>Employee</span>
                      </a>
                  </li>
                  <hr>
                  <li id="content-desktop" class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Product</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="culledSwine.php">Culled Swine</a></li>
                          <li><a  href="onSell.php">On sell</a></li>
                          <li><a  href="sale.php">Sales</a></li>
                          <li><a  href="transaction.php">Transaction</a></li>
                          <li ><a  href="sold.php">Sold</a></li>
                      </ul>
                  </li>
                  <li id="content-desktop" class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-list-alt"></i>
                          <span>Culling</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="cullingSow.php">Sow</a></li>
                          <li><a  href="cullingBoar.php">Boar</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="vetlist.php" >
                          <i class="fa fa-user"></i>
                          <span>Vet List</span>
                      </a>
                  </li>
                  <li>
                      <a href="FAQ.php" >
                          <i class="fa fa-question"></i>
                          <span>FAQ</span>
                      </a>
                  </li>
                  <li>
                      <a href="lock_screen.php?emp_id=<?php echo $row['emp_id']?>" >
                          <i class="fa fa-lock"></i>
                          <span>Lock Screen</span>
                      </a>
                  </li>
                  <li>
                      <a href="marketPrice.php" >
                          <i class="fa fa-rub"></i>
                          <span>Market Reference</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
     
      <!--main desktop content start-->
      <div>
      <section id="main-content" >
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
                  INVENTORY
             <span class="tools pull-right">
              <div id="content-desktop" class="row">
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control round-input" id="product_type" name="product_type">
                                        <option selected disabled>Product Type</option>
                                        <option>Medicine</option>
                                        <option>Vitamin</option>
                                        <option>Feeds</option>
                                        <option>Other Product</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="text-align: center;" id="product_name" name="product_name" class="form-control round-input" placeholder="Product Name" >
                                        <span id="error_sire" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control round-input" id="measurement" name="measurement">
                                        <option selected disabled>Measurement</option>
                                        <option>PCS</option>
                                        <option>KILO</option>
                                        <option>SACK</option>
                                        <option>PACK</option>
                                        <option>BOX</option>
                                        </select>   
                                        <span id="error_dam" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                  </div>
                                  <div class="form-group">
                                      <input style="text-align: center;" type="number" id="quantity" name="quantity" class="form-control round-input" placeholder="Quantity" >
                                      <span id="error_breedB" class="text-danger"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" style="text-align: center;" id="product_price" name="product_price" class="form-control round-input" placeholder="Product Price" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group ">
                                    <button type="button" class="btn btn-round btn-primary" id="form_ation" onclick="saveProduct(this)"><i class="fa fa-plus"></i> Add to table</button> 
                                    </div>
                                </div>
                            </div>
                        </div>  
               
              </header>
              <div class="card-body">
              <div class="adv-table">
              <div id="user_data">
              
              </div>
              </div>
              </div>
              </section>
              </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      </div>
      <!--main content end-->

      <!--main phone content start-->
      
      <!--main content end-->


       <!-- Modal addProduct -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="Details">
                              Add Product
                          </Label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-9">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="product_ID" name="product_ID" class="form-control" placeholder="Enter amount">
                                        <input type="number" id="addProduct" name="addProduct" class="form-control" placeholder="Enter amount">
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                          <div class="col-lg-3">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" onclick="ADDproduct(this)"><i class="fa fa-plus"></i> Add</button> 
                                    </div>
                                </div>
                            </div>
                      </div>
                      </div >
                  </div>
              </div>
          </div>
          <!-- modal -->
          <!-- Modal deductProduct -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="deduct" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="Details">
                              Deduct Product
                          </Label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-9">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="product_ID" name="product_ID" class="form-control" placeholder="Enter amount">
                                        <input type="number" id="decProduct" name="decProduct" class="form-control" placeholder="Enter amount">
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                          <div class="col-lg-3">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger" onclick="DEDUCTproduct(this)"><i class="fa fa-minus"></i> deduct</button> 
                                    </div>
                                </div>
                            </div>
                      </div>
                      </div >
                  </div>
              </div>
          </div>
          <!-- modal -->
          <!-- Modal useProduct -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="use" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="Details">
                              USE PRODUCT TO:
                          </Label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group full-right">
                                        <label>Product name:</label>
                                        <input type="text" id="prod_name" name="prod_name" class="form-control" placeholder="Product Name" readonly>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group full-right">
                                      <label>Measurement:</label>
                                        <input type="text" id="measure" name="measure" class="form-control" placeholder="Measurement" readonly>
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                          <div class="col-lg-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group full-right">
                                        <label>Product Price:</label>
                                        <input type="number" id="prod_price" name="prod_price" class="form-control" placeholder="Product Price" readonly>
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group full-right">
                                      <label>Current Quantity:</label>
                                        <input type="text" id="quant" name="quant" class="form-control" placeholder="Quantity" readonly>
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="product_ID" name="product_ID" class="form-control" placeholder="Enter amount">
                                        <label>How many?</label>
                                        <input type="number" id="useProduct" name="useProduct" class="form-control" placeholder="Enter amount" onchange="deductCurQuan();">
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group full-right">
                                        <select class="form-control" id="swine_type" onchange="searchswine()"  name="swine_type">
                                        <option selected disabled>Swine Type</option>
                                        <option>Boar</option>
                                        <option>Sow</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                          <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group full-right">
                                        <input type="number" id="searchSwine" name="searchSwine" onchange="searchswine()" class="form-control" placeholder="Enter Swine ID">
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div id="swineDetails" class="col-lg-12">
                                
                            </div>
                          <div class="col-lg-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" style="width: 100%;" class="btn btn-primary" onclick="USEproduct(this)"><i class="fa fa-check"></i> Use</button> 
                                    </div>
                                </div>
                            </div>
                      </div>
                        <div class="row">
                          
                      </div>
                      </div >
                  </div>
              </div>
          </div>
          <!-- modal -->

           <!-- Modal EditProduct -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="Details">
                              Edit Product
                          </Label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Product Type:</label>
                                        <select class="form-control" id="product_type_e" name="product_type">
                                        <option selected disabled>Product Type</option>
                                        <option>Medicine</option>
                                        <option>Vitamin</option>
                                        <option>Feeds</option>
                                        <option>Other Product</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Product Name:</label>
                                        <input type="text" style="text-align: center;" id="product_name_e" name="product_name" class="form-control" placeholder="Product name" >
                                        <input type="hidden" style="text-align: center;" id="product_id_e" name="product_name" class="form-control" placeholder="Product name" >
                                        <span id="error_sire" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Measurement:</label>
                                        <select class="form-control" id="measurement_e" name="measurement" >
                                        <option selected disabled>Measurement</option>
                                        <option>PCS</option>
                                        <option>KILO</option>
                                        <option>SACK</option>
                                        <option>PACK</option>
                                        <option>BOX</option>
                                        </select>   
                                        <span id="error_dam" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                  </div>
                                  <div class="form-group">
                                    <label> Quantity:</label>
                                      <input style="text-align: center;" type="number" id="quantity_e" name="quantity" class="form-control" placeholder="Quantity" >
                                      <span id="error_breedB" class="text-danger"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Product Price:</label>
                                        <input type="number" style="text-align: center;" id="product_price_e" name="product_price" class="form-control" placeholder="Product Price" >
                                    </div>
                                </div>
                            </div>
                        </div>  
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-primary"  id="form_ation" onclick="updatePrduct(this)" type="button"><i class=" fa fa-save"></i> Save Change</button>
                      </div>
                      </div>
                      </div >
                  </div>
              </div>
          </div>
          <!-- modal -->

      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              iSwine &copy; Swine monitoring
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!--search swine-->
    <script type="text/javascript">
        function searchswine(){
            //alert("dawd");
            var swineType = $("#swine_type").val();
            var searchswine = $("#searchSwine").val();
            $.ajax({
                url: 'searchSwine.php',
                method: 'post',
                data:{'searchswine':searchswine,'swineType':swineType},
                success:function(data){
                    $("#swineDetails").html(data);  
                }
            })
        }
    </script>

    <!--update product-->
    <script type="text/javascript">
        function editproduct(button){
            var product_ID = button.id;
            //alert(product_ID);
            var geveID = "edit";
            $.ajax({
                url: 'getproduct_ID.php',
                method: 'post',
                data:{'geveID':geveID,'product_ID':product_ID},
                dataType: 'json',
                success:function(data){
                    $("#product_id_e").val(data.product_ID);
                    $("#product_type_e").val(data.product_type);
                    $("#product_name_e").val(data.product_name);
                    $("#measurement_e").val(data.measurement);
                    $("#quantity_e").val(data.quantity);
                    $("#product_price_e").val(data.product_price);
                    $("#edit").modal("show");
                }
            })
            
        }
        function updatePrduct(){
            var product_ID = $("#product_id_e").val();
            var product_type_e = $("#product_type_e").val();
            var product_name_e = $("#product_name_e").val();
            var measurement_e = $("#measurement_e").val();
            var quantity_e = $("#quantity_e").val();
            var product_price_e = $("#product_price_e").val();
            var geveID = "update";
            $.ajax({
                url: 'getproduct_ID.php',
                method: 'post',
                data:{'geveID':geveID,'product_ID':product_ID,'product_type_e':product_type_e,'product_name_e':product_name_e,'measurement_e':measurement_e,'quantity_e':quantity_e,'product_price_e':product_price_e},
                success:function(data){
                    if (data == 'updated')
                    {
                        toastr.success("Product Successfully Updated","Successful");
                        $("#product_id_e").val("");
                        $("#product_type_e").val("Product Type");
                        $("#product_name_e").val("");
                        $("#measurement_e").val("Measurement");
                        $("#quantity_e").val("");
                        $("#product_price_e").val("");
                        load_data();
                    }
                    else
                    {
                         toastr.error("Error Updating Product","failed");
                    }
                }
            })
        }

    </script>

    <!--addproduct-->
    <script type="text/javascript">
        function addproduct(button){
            var geveID = "geveID";
            var product_ID = button.id;
            //alert(product_ID);

            $.ajax({
                url: 'getproduct_ID.php',
                method: 'post',
                data:{'geveID':geveID,'product_ID':product_ID},
                dataType: 'json',
                success:function(data){
                    //alert(data.product_ID);
                    $("#product_ID").val(data.product_ID);
                    $("#add").modal("show");
                }
            })
        }

        function ADDproduct(){
            var geveID = "add";
            var product_ID = $("#product_ID").val(); 
            var amount = $("#addProduct").val();
            //alert(amount);
            $.ajax({
                url: 'getproduct_ID.php',
                method: 'post',
                data:{'geveID':geveID,'product_ID':product_ID,'amount':amount},
                success:function(data){
                  //alert(data);
                    if (data == "add")
                    {
                        toastr.success("Successfully Added","Successful");
                        load_data();
                        $("#addProduct").val("");
                    }
                    else
                    {
                        alert(data);
                        toastr.error("Failed to add new value","Failed");
                    }
                }
            })

        }
    </script>
    <!--End addproduct-->

    <!--deduct-->
    <script type="text/javascript">
        function deductproduct(button){
            var geveID = "geveID";
            var product_ID = button.id;
            //alert(product_ID);

            $.ajax({
                url: 'getproduct_ID.php',
                method: 'post',
                data:{'geveID':geveID,'product_ID':product_ID},
                success:function(data){
                    $("#product_ID").val(data);
                    $("#deduct").modal("show");
                }
            })
        }

        function DEDUCTproduct(){
            var geveID = "dec";
            var product_ID = $("#product_ID").val();
            var amount = $("#decProduct").val();
            //alert(productID);
            $.ajax({
                url: 'getproduct_ID.php',
                method: 'post',
                data:{'geveID':geveID,'product_ID':product_ID,'amount':amount},
                success:function(data){
                    //alert(data);
                    if (data == "dec")
                    {
                        toastr.success("Successfully Deducted","Successful");
                        load_data();
                        $("#decProduct").val("");
                    }
                    else
                    {
                        alert(data);
                        toastr.error("Failed to deduct value","Failed");
                    }
                }
            })
        }
    </script>

    <!--use-->
    <script type="text/javascript">
        function useproduct(button){
            var geveID = "geveID";
            var product_ID = button.id;
            //alert(product_ID);

            $.ajax({
                url: 'getproduct_ID.php',
                method: 'post',
                data:{'geveID':geveID,'product_ID':product_ID},
                dataType: 'json',
                success:function(data){
                    $("#product_ID").val(data.product_ID);
                    $("#prod_name").val(data.product_name);
                    $("#prod_price").val(data.price);
                    $("#measure").val(data.measurement);
                    $("#quant").val(data.quantity);
                    $("#use").modal("show");
                }
            })
        }

        function deductCurQuan(){
          var curAmount = $("#quant").val();
          var nowAmount = $("#useProduct").val();

          var tot = curAmount - nowAmount;

          document.getElementById('quant').value = tot;
        }


        function USEproduct(){
            var geveID = "use";
            var product_ID = $("#product_ID").val();
            var amount = $("#useProduct").val();
            var Sow_ID = $("#searchSwine").val();
            var pri = $("#prod_price").val();
            var swine_type = $("#swine_type").val();
            //alert(productID);
            if (amount == '')
            {
                var usePro = document.getElementById('useProduct');
                usePro.style.border = '1px solid red';
            }
            else
            {
                var date = new Date();
                const months = ['Jas','feb','Mar','Apr','May','Jun','Jul','Sep','Oct','Nov','Dec'];
                const days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

                const monthIndex = date.getMonth()-1;
                const monthname = months[monthIndex];
                const dayIndex = date.getDay();
                const dayname = days[dayIndex];

                
                var dd = date.getDate();
                var mm = date.getMonth()+1;
                var yy = date.getFullYear();
                var hh = date.getHours();
                var mu = date.getMinutes();
                var ss = date.getSeconds();
                var today = monthname + ' '+dd+ ' ' + dayname + ' ' + yy;
                //alert(dayname);

                $.ajax({
                url: 'getproduct_ID.php',
                method: 'post',
                data:{'geveID':geveID,'product_ID':product_ID,'amount':amount,'Sow_ID':Sow_ID,'swine_type':swine_type,'today':today,'pri':pri},
                success:function(data){
                    //alert(data);
                        if (data == "use")
                        {
                            toastr.success("Successfully Deducted","Successful");
                            load_data();
                            $("#useProduct").val("");
                            $("#product_ID").val("");
                            $("#searchSwine").val("");
                            $("#swine_type").val("Swine Type");
                            setInterval(function(){window.location="inventory.php"},2000);
                        }
                        else
                        {
                            alert(data);
                            toastr.error("Failed to deduct value","Failed");
                        }
                    }
                })
            }    
        }
    </script>

    <script type="text/javascript">
      function addbreed(button){
            var SowId = button.id;
            $.ajax({
                    type: 'POST',
                    url:'addBreed.php',
                    data:{'SowId':SowId},
                    success: function(data){
                      $('#Details').html(data);
                      //alert(data);
                    //$('#Sow_ID').val(data.Sow_ID);
                    //$('#CageNo').val(data.Cage_No);
                    //$('#BreedType').val(data.Breed);

                    } 
                });
        
      }
    </script>

    <!--custom js for adding swine-->
    <script type="text/javascript">

    </script>

    <script type="text/javascript">
          function saveProduct(button){

              var product_type = $('#product_type').val();
              var product_name = $('#product_name').val();
              var measurement = $('#measurement').val();
              var quantity = $('#quantity').val();
              var product_price = $("#product_price").val();

              //alert (product_type);
              if (product_type == 'Product Type')
              {
                var cageEr = document.getElementById('product_type');
                cageEr.style.border = "1px solid #cc0000";
              }
              else
              {
                var cageEr = document.getElementById('product_type');
                cageEr.style.border = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if (product_name == '')
              {
                var cageEr1 = document.getElementById('product_name');
                cageEr1.style.border = "1px solid #cc0000";
              }
              else
              {
                var cageEr1 = document.getElementById('product_name');
                cageEr1.style.border = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if (measurement == 'Measurement')
              {
                var cageEr2 = document.getElementById('measurement');
                cageEr2.style.border = "1px solid #cc0000";
              }
              else
              {
                var cageEr2 = document.getElementById('measurement');
                cageEr2.style.border = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if (quantity == '')
              {
                var cageEr3 = document.getElementById('quantity');
                cageEr3.style.border = "1px solid #cc0000";
              }
              else
              {
                var cageEr3 = document.getElementById('quantity');
                cageEr3.style.border = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if (product_price == '')
              {
                var cageEr4 = document.getElementById('product_price');
                cageEr4.style.border = "1px solid #cc0000";
              }
              else
              {
                var cageEr4 = document.getElementById('product_price');
                cageEr4.style.border = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if ( product_name != '' || quantity != '')
              {
                 $.ajax({
                  url: 'saveInventory.php',
                  method: 'POST',
                  data: {'product_name': product_name,'measurement':measurement,'quantity':quantity,'product_type':product_type,'product_price':product_price},
                  success:function(data)
                  {
                    //alert(data);
                    if(data == 'success')
                    {
                      toastr.success("Record successfully added","Successful");
                      load_data();
                      document.getElementById('product_name').value = "";
                      document.getElementById('measurement').value = "Measurement";
                      document.getElementById('quantity').value = "";
                      document.getElementById('product_type').value = "Product Type";
                      document.getElementById('product_price').value = "";

                    }
                    else if (data == 'existed')
                    {
                      toastr.warning("Product already existed","Failed to add");
                    }
                    else
                    {
                      toastr.error("Error adding data","Error");
                    }
                  }
                })
              }
              else
              {
                
                return false;
               
              }
            }

    </script>

    <script>
    function delproduct(button){
        var del = button.id;
        Swal.fire({
            title: 'Are you sure?',
            text: 'You wont be able to revert this!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if(result.value){
                 $.ajax({
                url: 'deleteProduct.php',
                method: 'post',
                data:{'del':del},
                success:function(data){
                    Swal.fire(
                        'Deleted!',
                        'Data has been deleted',
                        'success'
                    )
                    load_data();
                }
            })
            }
           
            }
        )
    }
</script>

    <!--custom js for fetch data to table-->
    <script type="text/javascript">

      function load_data()
      {
         $.ajax({
          url: "fetchInventory.php",
          method: "POST",
          success:function(data){
            $("#user_data").html(data);
            //alert(data);
          }
        })
      } 

      
    </script>

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--toastr-->
    <script src="assets/toastr-master/toastr.js"></script>

    <!--sweetalert-->
    <script src="js/sweetalert2.all.min.js"></script>

    <!--dynamic table initialization -->
    <script src="js/dynamic_table_init.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 10:51:06 GMT -->
</html>
