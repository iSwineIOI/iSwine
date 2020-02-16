<?php
include 'config.php';
include 'session.php';
$swine_id = $_GET['swineID'];
$name = $_SESSION['Username'];
//echo $name;
$s = "SELECT * FROM employee_table WHERE full_name = '$name'";
$result = mysqli_query($mysqli,$s);
$row = mysqli_fetch_array($result);
$image = $row['picture'];

$vet = "SELECT * FROM employee_table";
$exe = mysqli_query($mysqli,$vet);


$ask = "SELECT * FROM swine_cost WHERE swine_id = '$swine_id'";
$give = mysqli_query($mysqli,$ask);
$meas = mysqli_fetch_assoc($give);

$med = "SELECT * FROM swine_cost WHERE swine_id = '$swine_id'";
$askmed = mysqli_query($mysqli,$med);

$option = '';

while($medc = mysqli_fetch_array($askmed))
{
    $option = $option."<option>$medc[1]</option>";
}


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
                            <img alt="" width="35" src="../Admin/img/profilePicture/<?php echo $image;?>"/>
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
                      <a href="javascript:;">
                          <i class="fa  fa-github-alt"></i>
                          <span>Swine</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="sow.php">Sow</a></li>
                          <li><a  href="boar.php">Boar</a></li>
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
                      <a href="breeding.php"  >
                          <i class="fa fa-calendar-o"></i>
                          <span>Breeding History </span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-list-alt"></i>
                          <span>Inventory</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="swineCost.php">Swine Cost</a></li>
                          <li><a  href="Inventory.php">Storage</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="employee.php" >
                          <i class="fa fa-user"></i>
                          <span>Employee</span>
                      </a>
                  </li>
                  <hr>
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Product</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="culledSwine.php">Culled Swine</a></li>
                          <li><a  href="onSell.php">On sell</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
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
                      <a href="vetlist.php"  >
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
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
     
           <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
          
                <div class="col-lg-12">
                      <section class="card ">
                          <div class="card-body row">
                              <div class="col-md-4">
                                  <div class="pro-img-details">
                                      <img class="img-fluid" src="img/product-list/pro-thumb-big.jpg" alt=""/>
                                  </div>
                                  <div class="pro-img-list">
                                      <a href="#">
                                          <img src="img/product-list/pro-thumb-1.jpg" alt="">
                                      </a>
                                      <a href="#">
                                          <img src="img/product-list/pro-thumb-2.jpg" alt="">
                                      </a>
                                      <a href="#">
                                          <img src="img/product-list/pro-thumb-3.jpg" alt="">
                                      </a>
                                      <a href="#">
                                          <img src="img/product-list/pro-thumb-1.jpg" alt="">
                                      </a> 
                                  </div>
                              </div>
                                <div class="col-md-8">
                                  <div class="col-lg-12">
                                 
                                  <div class="card-body">
                                  <div style="margin-top: -36px !important;" class="adv-table">
                                  <table class="display table table-bordered table-striped" id="dynamic-table">
                                  <thead>
                                  <tr>
                                      <th>Product Type</th>
                                      <th>Product Name</th>
                                      <th>Measurement</th>
                                      <th>Quantity</th>
                                      <th>Date</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                      $ask = "SELECT * FROM swine_cost WHERE swine_id = '$swine_id'";
                                      $give = mysqli_query($mysqli,$ask);
                                      while($row = mysqli_fetch_array($give))
                                      {
                                      ?>
                                        <tr>
                                          <td><?php echo $row['product_type']?></td>
                                          <td><?php echo $row['product_name']?></td>
                                          <td><?php echo $row['measurement']?></td>
                                          <td><?php echo $row['cost']?></td>
                                          <td><?php echo $row['date']?></td>
                                        </tr>
                                      <?php
                                      }?>
                                  </tbody>
                                  </table>
                                  <div class="row">
                                    <div class="col-lg-3">
                                      <div class="form-group ic-cmp-int">
                                          <div class="form-group">
                                            <label>Product Name:</label>
                                              <select onchange="getVal()" id="product_name" name="product_name" class="form-control" placeholder="Product name" >
                                              <option selected disabled>Choose Product name</option>
                                              <?php echo $option?>
                                              </select> 
                                              <span id="error_sire" class="text-danger"></span>
                                          </div>
                                      </div>
                                    </div>
                                      <div class="col-lg-3">
                                      <div class="form-group ic-cmp-int">
                                          <div class="form-group">
                                            <label>Product Quantity:</label>
                                              <input type="number"  id="quantity" name="quantity" class="form-control" placeholder="Quantity" >
                                              <span id="error_sire" class="text-danger"></span>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group ic-cmp-int">
                                          <div class="form-group">
                                            <label>Product Price:</label>
                                              <input type="number"  id="price" name="price" class="form-control" placeholder="Product price" >
                                              <span id="error_sire" class="text-danger"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <div class="form-group ic-cmp-int">
                                          <div class="form-group">
                                            <label>Add or view last detail</label>
                                              <button style="float: right!important;color: white!important;" onclick="addAll()" class="btn btn-info form-control"><i class="fa fa-plus"></i> ADD /  VIEW</button>
                                              <span id="error_sire" class="text-danger"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="form-group ic-cmp-int">
                                          <div class="form-group">
                                            <label>Details</label>
                                              <div id="productPrice">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <div class="form-group ic-cmp-int">
                                          <div class="form-group">
                                            <label>Put your price</label>
                                              <input type="number"  id="Yourprice" name="Yourprice" onchange="calC()" class="form-control" placeholder="Your price" >
                                              <span id="error_sire" class="text-danger"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-1">
                                      <div class="form-group ic-cmp-int">
                                          <div class="form-group">
                                            <label>.</label>
                                              <button style="float: right!important;color: white!important;" onclick="calC()" class="btn btn-default form-control"><i class="fa fa-exchange"></i> </button>
                                              <span id="error_sire" class="text-danger"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-5">
                                      <div class="form-group ic-cmp-int">
                                          <div class="form-group">
                                            <label>Total benefit</label>
                                              <input type="number"  id="TotalBen" name="TotalBen" class="form-control" placeholder="" >
                                              <span id="error_sire" class="text-danger"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <div class="form-group ic-cmp-int">
                                          <div class="form-group">
                                            <label>Post to selling site</label>
                                              <button style="float: right!important;color: white!important;" onclick="post()" class="btn btn-danger form-control"><i class="fa fa-cloud"></i> POST</button>
                                              <span id="error_sire" class="text-danger"></span>
                                          </div>
                                      </div>
                                  </div>
                                  </div>
                                  <input type="hidden" id="swineid" value="<?php echo $swine_id?>" name=""/>
                                  <input type="hidden" id="measurement" value="<?php echo $meas['measurement']?>" name=""/>
                                  </div>
                                  </div>
                                  </div>
                              </div>
                          </div>
                      </section>
                      </div>
                </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <?php
      $quers = "SELECT * FROM `health_table` WHERE Sow_ID = '$swine_id' ORDER BY `health_table`.`date` DESC LIMIT 1";
      $lets = mysqli_query($mysqli,$quers);
      $show = mysqli_fetch_assoc($lets);

      $name = "SELECT * FROM productlist WHERE swine_id = '$swine_id'";
      $execute = mysqli_query($mysqli,$name);
      $swineN = mysqli_fetch_assoc($execute);
      ?>

      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addinformation" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="inform">Add information</Label>
                      </div>
                      <div class="modal-body">
                        Set between weight.
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group ic-cmp-int">
                              <div class="form-group">
                                <label>From: Current Weight <?php echo $show['weight']?> kg</label>
                                  <input type="hidden" id="swineid" value="<?php echo $swine_id?>" name=""/>
                                  <input type="hidden" id="age" value="<?php echo $show['age']?>" name=""/>
                                  <input type="hidden" id="swine_type" value="<?php echo $meas['swine_type']?>" name=""/>
                                  <input type="hidden" id="breed" value="<?php echo $swineN['breed']?>" name=""/>
                                  <input type="hidden" id="breedCount" value="<?php echo $swineN['breedCount']?>" name=""/>
                                  <input type="hidden" id="status" value="<?php echo $swineN['status']?>" name=""/>
                                  <input type="hidden" id="reasonCull" value="<?php echo $swineN['reasonCull']?>" name=""/>
                                  <input type="hidden" id="price1" name=""/>
                                  <input type="hidden" id="totalCostOfswine" name=""/>
                                  <input type="hidden" id="totalbenefits" name=""/>
                                  <input type="number" class="form-control" value="<?php echo $show['weight']?>" id="startWeight" name=""/>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group ic-cmp-int">
                              <div class="form-group">
                                <label>To:</label>
                                  <input type="number"class="form-control"id="endWeight" name=""/>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group ic-cmp-int">
                              <div class="form-group">
                                <label>Description</label>
                                  <textarea class="form-control" id="description" rows="4" placeholder="Description"></textarea>
                              </div>
                          </div>
                      </div>
                    </div >
                      <div class="modal-footer">
                          <button class="btn btn-default"data-dismiss="modal" type="button"><i class=" fa fa-close"></i> Cancel</button>
                          <button class="btn btn-danger" onclick="postnow()" type="button"><i class=" fa fa-cloud"></i> Post Now</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
          <!-- modal -->


                                  

      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              iSiwne &copy; Swine monitoring.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

  <!--post now-->
  <script type="text/javascript">
    function postnow(){
      var swineid = $("#swineid").val();
      var age = $("#age").val();
      var swine_type = $("#swine_type").val();
      var breed = $("#breed").val();
      var breedCount = $("#breedCount").val();
      var status = $("#status").val();
      var reasonCull = $("#reasonCull").val();
      var price1 = $("#price1").val();
      var totalCostOfswine = $("#totalCostOfswine").val();
      var totalbenefits = $("#totalbenefits").val();
      var startWeight = $("#startWeight").val();
      var endWeight = $("#endWeight").val();
      var description = $("#description").val();

      $.ajax({
        url: 'postProduct.php',
        method: 'post',
        data:{'swineid':swineid,'age':age,'swine_type':swine_type,'breed':breed,'breedCount':breedCount,'status':status,'reasonCull':reasonCull,'price1':price1,'totalCostOfswine':totalCostOfswine,'totalbenefits':totalbenefits,'startWeight':startWeight,'endWeight':endWeight,'description':description},
        success:function(data)
        {
          //alert(data);
            if(data == "success")
            {
              toastr.success("Product successfully posted","Successful");
              setInterval(function(){window.location="culledSwine.php"},2000);
            }
            else
            {
              toastr.error("Failed to post product","Failed");
            }
        }
      })


    }
  </script>

  <!--add infor-->
  <script type="text/javascript">
    function post(){

      var price1 = $("#Yourprice").val();
      var totalbenefits = $("#TotalBen").val();

      if(price1 == '' || totalbenefits == '')
      {
          var redpr = document.getElementById('Yourprice');
          redpr.style.border="1px solid red";
          var redTo = document.getElementById('TotalBen');
          redTo.style.border="1px solid red";
      }
      else
      {

          var totalPrice = document.getElementById('totalPrice').innerHTML;
          $("#price1").val(price1);
          $("#totalbenefits").val(totalbenefits);
          $("#totalCostOfswine").val(totalPrice);
          $("#addinformation").modal("show");
      }
      //alert(price1);
    }
  </script>
  <!--post product-->
  <script type="text/javascript">
      function calC(){
        var benefits = '';
        var totalPrice = document.getElementById('totalPrice').innerHTML;
        //alert(totalPrice);
        var Yourprice = document.getElementById('Yourprice').value;

        benefits = Yourprice - totalPrice;

        $("#TotalBen").val(benefits);

      }
  </script>

  <!--add all cost-->
  <script type="text/javascript">
    function addAll(){
      var result = '';
      var quantity = $("#quantity").val();
      var price = $("#price").val();
      var Pname = $("#product_name").val(); 
      var swineid = $("#swineid").val();
      result = quantity * price;

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
//alert(swineid);
      $.ajax({
        url: 'saveProductPrice.php',
        method: 'post',
        data:{'result':result,'quantity':quantity,'price':price,'Pname':Pname,'swineid':swineid,'today':today},
        success:function(data)
        {
            //alert(data);
            if(data == "Product Already Added")
            {
              toastr.error("Product Already Added","Failed");
            }
            else
            {
              $("#productPrice").html(data);
              $("#quantity").val("");
              $("#price").val("");
              $("#product_name").val("Choose Product name"); 
            }
        }
      })
    }
  </script>

  <!--view datails-->

  <!--calculation-->
  <script type="text/javascript">
    function getVal(){
      var Pname = document.getElementById('product_name').value;
      var price = document.getElementById('price').value;
      var swineid = document.getElementById('swineid').value;
      //alert(Pname);
      $.ajax({
        url: 'calculateSwineCost.php',
        method: 'post',
        data:{'Pname':Pname,'price':price,'swineid':swineid},
        success:function(data)
        {
          //alert(data);
          $("#quantity").val(data);
        }
      })
    }
  </script>

  <!--sell swine-->
  <script type="text/javascript">
      function sellSwine(button){
        var swine_id = button.id;
        //alert(sell_ID);
        $.ajax({
            url: 'sellSwine.php',
            method: 'post',
            data:{'swine_id':swine_id},
            dataType: 'json',
            success:function(data)
            {
                window.location = "product_datails.php?swineID="+data.swine_ID;
            }
        })
      }
  </script>

  <!--fetch employee -->
  <script type="text/javascript">
      function load_data()
      {
         $.ajax({
          url: "fetchProductPrices.php",
          method: "POST",
          success:function(data){
            $("#productPrice").html(data);
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

    <!--dynamic table initialization -->
    <script src="js/dynamic_table_init.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 10:51:06 GMT -->
</html>