<?php
include 'config.php';
include 'session.php';
$name = $_SESSION['Username'];
//echo $name;
$s = "SELECT * FROM employee_table WHERE full_name = '$name'";
$result = mysqli_query($mysqli,$s);
$row = mysqli_fetch_array($result);
$image = $row['picture'];

$sqll = "SELECT * FROM employee_table WHERE emp_type = 'helper'";
$result1 = mysqli_query($mysqli,$sqll);
$row1 = mysqli_fetch_array($result1);
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 10:48:44 GMT -->
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
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--custom css-->
    <link rel="stylesheet" type="text/css" href="css/custom.css"/> 
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

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

  <body onload="startTime()">

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

                  <li >
                      <a class="active" href="marketPrice.php" >
                          <i class="fa fa-rub"></i>
                          <span>Market Reference</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
  <link rel="stylesheet" type="text/css" href="">
  <script type="text/javascript">
    window.onload = setInterval(clock,1000);

    function clock()
    {
    var d = new Date();
    
    var date = d.getDate();
    
    var month = d.getMonth();
    var montharr =["January","Febrary","March","April","May","June","July","August","September","October","November","December"];
    month=montharr[month];
    
    var year = d.getFullYear();
    
    var day = d.getDay();
    var dayarr =["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    day=dayarr[day];
    
    var hour =d.getHours();
    var min = d.getMinutes();
    var sec = d.getSeconds();
    var t = d.toLocaleTimeString();
  
    document.getElementById("date").innerHTML=day+", "+month+" "+date+" "+year;
    document.getElementById("time").innerHTML=t;
    }
  </script>



<div ></div>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <!--price start-->
                  <div style="margin-top: -20px;" class="col-12 text-center feature-head my-4">
                    <h1>Philippines Standard Time</h1>
                      <p style="color:black;margin-top: -15px;" id="time"></p>
                      <p style="background-color: white;margin-top: -80px;" id="date"></p>
                  </div>
                  <div style="margin-top: -80px;padding-bottom: 90px;" class="col-12">
                    <img src="img/psa.png"><hr>
                    <div class="row col-12">
                        <div class="col-6" style="background-color: white;padding-left: 20px;padding-bottom: 20px;padding-top: 7px;">
                        <h1>Swine Situation Report</h1>
                        <p>April 2019 to June 2019</p>
                        <hr>
                        <p>The average farmgate price of hogs upgraded for slaughter in April to June 2019 was <b>&#8369; 110.15 per kilogram</b>, liveweight. This was 6.6 percent lower than the average farmgate price level of PhP117.88 per kilogram, liveweight, in 2018.</p><p>

                        During the reference period, the highest average farmgate price was recorded in April at PhP110.89 per kilogram, liveweight while the lowest price was noted in June at <b>&#8369; 108.71 per kilogram</b>, liveweight. (Table 3)</p>
                        </div>
                      <div  class="col-6">
                        <img src="img/chart.png">
                      </div>
                    </div>
                  </div>
                  <br></br>
                  <hr>
                  <div class="col-lg-3 col-sm-3">
                      <div class="pricing-table">
                          <div class="pricing-head">
                              <h1> CHICKEN </h1>
                              <h2>
                                  <span class="note">&#8369;</span>100.00 </h2>
                          </div>
                          <ul class="list-unstyled">
                              <li>As of 01 July 2019, the total inventory of chicken was estimated at 191.70 million birds. The inventory of layer chicken was recorded at 40.24 million birds or 6.5 percent higher than the previous year’s record of 37.77 million birds. Broiler chicken inventory grew by 6.2 percent, from 64.94 million birds in 2018 to 68.97 million birds in 2019. Native/improved chicken inventory at 82.49 million birds declined by 1.5 percent from its previous year’s level of 83.71 million birds.
                              </li>


                              <li>Chicken is mostly raised in the regions of Central Luzon, CALABARZON, Northern Mindanao  and  Western  Visayas. These regions accounted for more than half or 55.5 percent of the total chicken inventory in the country. (Table 2)</li>
                          </ul>
                          <div class="price-actions">
                              <a class="btn" href="javascript:;">Details</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3">
                      <div class="pricing-table">
                          <div class="pricing-head">
                              <h1> DUCK </h1>
                              <h2>
                                  <span class="note">&#8369; </span>61.63 </h2>
                          </div>
                          <ul class="list-unstyled">
                              <li>As of 01 July 2019, the total duck inventory was estimated at 11.83 million birds. This represents an increase of 1.0 percent compared with the previous year’s stocks of 11.71 million birds. Duck population  in backyard farms at 7.91 million birds declined by 2.1 percent from its previous year’s count of 8.08 million birds. Meanwhile, inventory in commercial farms at 3.92 million birds was 8.0 percent higher than its previous year’s count of 3.63 million birds. (Table 2)</li>
                          </ul>
                          <div class="price-actions">
                              <a class="btn" href="javascript:;">Details</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3">
                      <div class="pricing-table most-popular">
                          <div class="pricing-head">
                              <h1> SWINE </h1>
                              <h2>
                                  <span class="note">&#8369; </span>110.15 </h2>
                          </div>
                          <ul class="list-unstyled">
                              <li>The average farmgate price of hogs upgraded for slaughter in April to June 2019 was <b>&#8369; 110.15 per kilogram</b>, liveweight. This was 6.6 percent lower than the average farmgate price level of PhP117.88 per kilogram, liveweight, in 2018.</li>

                              <li>During the reference period, the highest average farmgate price was recorded in April at PhP110.89 per kilogram, liveweight while the lowest price was noted in June at PhP108.71 per kilogram, liveweight. (Table 3)</li>
                              
                          </ul>
                          <div class="price-actions">
                              <a class="btn" href="javascript:;">Details</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-3">
                      <div class="pricing-table">
                          <div class="pricing-head">
                              <h1> GOAT </h1>
                              <h2>
                                  <span class="note">&#8369;</span>150.00 </h2>
                          </div>
                          <ul class="list-unstyled">
                              <li>As of 01 July 2019, the total inventory of goat was estimated at 3.83 million heads. This was 1.4 percent higher than its previous year’s level of 3.77 million heads.</li>

                              <li>Inventory of goat in backyard farms at 3.78 million heads posted an increase of 1.4 percent compared with its previous year’s level of 3.72 million heads.</li>

                              <li>In commercial farms, total inventory of goat was 48.76 thousand heads. This was 0.9 percent higher than its previous year’s level of 48.34 thousand heads. (Table 2)</li>
                          </ul>
                          <div class="price-actions">
                              <a class="btn" href="javascript:;">Details</a>
                          </div>
                      </div>
                  </div>
                  <!--price end-->
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

        

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

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts5e1f.js?v=2"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <?php
        //total swine
        $sql = "SELECT count(Sow_ID) AS Total FROM sowrecord";
        $result = mysqli_query($mysqli,$sql);
        $value = mysqli_fetch_assoc($result);
        $num_rows = $value['Total'];

        $sqlB = "SELECT count(boar_id) AS TotalB FROM boarrecord";
        $resultB = mysqli_query($mysqli,$sqlB);
        $valueB = mysqli_fetch_assoc($resultB);
        $num_rowsB = $valueB['TotalB'];

        $Tnum_rows = $num_rows + $num_rowsB;

        //end

        //total culled swine
        $sqlC = "SELECT count(prod_id) AS TotalC FROM productlist";
        $resultC = mysqli_query($mysqli,$sqlC);
        $valueC = mysqli_fetch_assoc($resultC);
        $num_rowsC = $valueC['TotalC'];
        //end

        //total psot swine

        $sqlP = "SELECT count(post_id) AS totalPost FROM postproduct";
        $resultP = mysqli_query($mysqli,$sqlP);
        $valueP = mysqli_fetch_assoc($resultP);

        $num_rowsP = $valueP['totalPost'];
        //end

        //sum of capital
        $sqlCap = "SELECT SUM(cost) AS capital FROM inventory_table";
        $resultCap = mysqli_query($mysqli,$sqlCap);
        $valueCap = mysqli_fetch_assoc($resultCap);

        //$captital = $valueCap['capital'];
    ?>
    <script type="text/javascript">
        //total swine
        function countUp(count)
        {
            var div_by = 100,
                speed = Math.round(count / div_by),
                $display = $('.count'),
                run_count = 1,
                int_speed = 24;

            var int = setInterval(function() {
                if(run_count < div_by){
                    $display.text(speed * run_count);
                    run_count++;
                } else if(parseInt($display.text()) < count) {
                    var curr_count = parseInt($display.text()) + 1;
                    $display.text(curr_count);
                } else {
                    clearInterval(int);
                }
            }, int_speed);
        }

        countUp(<?php echo $Tnum_rows?>);

        function countUp2(count)
        {
            var div_by = 100,
                speed = Math.round(count / div_by),
                $display = $('.count2'),
                run_count = 1,
                int_speed = 24;

            var int = setInterval(function() {
                if(run_count < div_by){
                    $display.text(speed * run_count);
                    run_count++;
                } else if(parseInt($display.text()) < count) {
                    var curr_count = parseInt($display.text()) + 1;
                    $display.text(curr_count);
                } else {
                    clearInterval(int);
                }
            }, int_speed);
        }

        countUp2(<?php echo $num_rowsC?>);

        function countUp3(count)
        {
            var div_by = 100,
                speed = Math.round(count / div_by),
                $display = $('.count3'),
                run_count = 1,
                int_speed = 24;

            var int = setInterval(function() {
                if(run_count < div_by){
                    $display.text(speed * run_count);
                    run_count++;
                } else if(parseInt($display.text()) < count) {
                    var curr_count = parseInt($display.text()) + 1;
                    $display.text(curr_count);
                } else {
                    clearInterval(int);
                }
            }, int_speed);
        }

        countUp3(<?php echo $num_rowsP;?>);

        function countUp4(count)
        {
            var div_by = 100,
                speed = Math.round(count / div_by),
                $display = $('.count4'),
                run_count = 1,
                int_speed = 24;

            var int = setInterval(function() {
                if(run_count < div_by){
                    $display.text(speed * run_count);
                    run_count++;
                } else if(parseInt($display.text()) < count) {
                    var curr_count = parseInt($display.text()) + 1;
                    $display.text(curr_count);
                } else {
                    clearInterval(int);
                }
            }, int_speed);
        }
        var cap = <?php echo $valueCap['capital']?>;
        countUp4(cap);
    </script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 10:49:16 GMT -->
</html>
