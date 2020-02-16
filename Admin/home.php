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

  <body>

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
                      <a class="active" href="home.php">
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
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="card">
                          <div class="symbol terques">
                              <i class="fa fa-github-alt"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  0
                              </h1>
                              <p>Total swine</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="card">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                  0
                              </h1>
                              <p>Culled Swine</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="card">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3">
                                  0
                              </h1>
                              <p>Posted Swine</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="card">
                          <div class="symbol blue">
                              <i class="fa fa-rub"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">
                                  0
                              </h1>
                              <p>Capital</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->
              <?php
              $date = date('y-m-d');
              $nowdate  = date('M Y',strtotime($date));

              $Cap = "SELECT SUM(cost) AS capital FROM inventory_table";
              $reCap = mysqli_query($mysqli,$Cap);
              $valCap = mysqli_fetch_assoc($reCap);

              $capital = $valCap['capital'];
              ?>

              <div class="row">
                  <div class="col-lg-12">
                      <!--custom chart start-->
                      <div class="border-head">
                          <h3>SWINE COST | <small style="font-style: italic;">This month <?php echo $nowdate?></small></h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>100</span></li>
                              <li><span>80</span></li>
                              <li><span>60</span></li>
                              <li><span>40</span></li>
                              <li><span>20</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $jan = "SELECT SUM(cost) AS `totalCostJan` FROM swine_cost WHERE date LIKE '%Jan%'";
                              $janu = mysqli_query($mysqli,$jan);
                              $janua = mysqli_fetch_assoc($janu);

                              $januar = $janua['totalCostJan'];
                              $january = $januar/$capital;
                              $finalJan = $january*100;

                              echo $finalJan."%";
                              ?>
                              "data-toggle="tooltip" data-placement="top"><?php echo $finalJan?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $feb = "SELECT SUM(cost) AS `totalCostFeb` FROM swine_cost WHERE date LIKE '%Feb%'";
                              $febu = mysqli_query($mysqli,$feb);
                              $febur = mysqli_fetch_assoc($febu);

                              $febrar = $febur['totalCostFeb'];
                              $rec = $febrar/$capital;
                              $finalFeb = $febrary*100;

                              echo $finalFeb."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalFeb?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $ma = "SELECT SUM(cost) AS `totalCostMar` FROM swine_cost WHERE date LIKE '%Mar%'";
                              $mar = mysqli_query($mysqli,$ma);
                              $marc = mysqli_fetch_assoc($mar);

                              $march = $marc['totalCostMar'];
                              $marchh = $march/$capital;
                              $finalMarch = $marchh*100;

                              echo $finalMarch."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalMarch?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $ap = "SELECT SUM(cost) AS `totalCostApr` FROM swine_cost WHERE date LIKE '%Apr%'";
                              $apr = mysqli_query($mysqli,$ap);
                              $apri = mysqli_fetch_assoc($apr);

                              $april = $apri['totalCostApr'];
                              $aprill = $april/$capital;
                              $finalApr = $aprill*100;

                              echo $finalApr."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalApr?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $M = "SELECT SUM(cost) AS `totalCostMay` FROM swine_cost WHERE date LIKE '%May%'";
                              $ma = mysqli_query($mysqli,$M);
                              $May = mysqli_fetch_assoc($ma);

                              $Mayy = $May['totalCostMay'];
                              $Mayyy = $Mayy/$capital;
                              $finalMay = $Mayyy*100;

                              echo $finalMay."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalMay?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $j = "SELECT SUM(cost) AS `totalCostJun` FROM swine_cost WHERE date LIKE '%Jun%'";
                              $ju = mysqli_query($mysqli,$j);
                              $jun = mysqli_fetch_assoc($ju);

                              $june = $jun['totalCostJun'];
                              $junee = $june/$capital;
                              $finalJun = $junee*100;

                              echo $finalJun."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalJun?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $jul = "SELECT SUM(cost) AS `totalCostJul` FROM swine_cost WHERE date LIKE '%Jul%'";
                              $july = mysqli_query($mysqli,$jul);
                              $julyy = mysqli_fetch_assoc($july);

                              $jullyy = $julyy['totalCostJul'];
                              $jullly = $jullyy/$capital;
                              $finalJul = $jullly*100;

                              echo $finalJul."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalJul?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">AUG</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $au = "SELECT SUM(cost) AS `totalCostAug` FROM swine_cost WHERE date LIKE '%Aug%'";
                              $aug = mysqli_query($mysqli,$au);
                              $now = mysqli_fetch_assoc($aug);

                              $augus = $augu['totalCostAug'];
                              $august = $augus/$capital;
                              $finalAug = $august*100;

                              echo $finalAug."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalAug?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">SEP</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $sep = "SELECT SUM(cost) AS `totalCostSep` FROM swine_cost WHERE date LIKE '%Sep%'";
                              $sept = mysqli_query($mysqli,$sep);
                              $septe = mysqli_fetch_assoc($sept);

                              $semtemb = $septe['totalCostSep'];
                              $septem = $semtemb/$capital;
                              $finalSep = $septem*100;

                              echo $finalSep."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalSep?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">OCT</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $sel = "SELECT SUM(cost) AS `totalCost` FROM swine_cost WHERE date LIKE '%Oct%'";
                              $ext = mysqli_query($mysqli,$sel);
                              $now = mysqli_fetch_assoc($ext);

                              $hold = $now['totalCost'];
                              $rec = $hold/$capital;
                              $final = $rec*100;

                              echo $final."%";
                              ?>
                              "
                               data-toggle="tooltip" data-placement="top"><?php echo $final?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">NOV</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $nov = "SELECT SUM(cost) AS `totalCostNov` FROM swine_cost WHERE date LIKE '%Nov%'";
                              $nove = mysqli_query($mysqli,$nov);
                              $novem = mysqli_fetch_assoc($nove);

                              $novemb = $novem['totalCostNov'];
                              $november = $novemb/$capital;
                              $finalNov = $november*100;

                              echo $finalNov."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalNov?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">DEC</div>
                              <div class="value tooltips" data-original-title=
                              "
                              <?php
                              $dec = "SELECT SUM(cost) AS `totalCostDec` FROM swine_cost WHERE date LIKE '%Dec%'";
                              $dece = mysqli_query($mysqli,$dec);
                              $decem = mysqli_fetch_assoc($dece);

                              $decemb = $decem['totalCostDec'];
                              $deccembe = $decemb/$capital;
                              $finalDec = $deccembe*100;

                              echo $finalDec."%";
                              ?>
                              " data-toggle="tooltip" data-placement="top"><?php echo $finalDec?>%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
                  </div>
                
              </div>
              <div class="row">
                  <div class="col-lg-4">
                      <!--user info table start-->
                      <section class="card">
                          <div class="card-body">
                              <a href="#" class="task-thumb">
                                  <img src="img/profilePicture/<?php echo $row1['picture']?>" width = "90" alt="">
                              </a>
                              <div class="task-thumb-details">
                                  <h1><a href="#"><?php echo $row1['full_name'] ?></a></h1>
                                  <p><?php echo $row1['emp_type'] ?></p>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                                <tr>
                                    <td>
                                        <i class=" fa fa-phone"></i>
                                    </td>
                                    <td>Contact</td>
                                    <td> <?php echo $row1['number']?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-envelope"></i>
                                    </td>
                                    <td>Email</td>
                                    <td> <?php echo $row1['email']?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-map-marker"></i>
                                    </td>
                                    <td>Address</td>
                                    <td> <?php echo $row1['address']?></td>
                                </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--user info table end-->
                  </div>
                  <div class="col-lg-8">
                      <!--work progress start-->
                      <section class="card">
                          <div class="card-body progress-card">
                              <div class="task-progress">
                                  <h1>Culled Swine</h1>
                                  <p></p>
                              </div>
                              <div class="task-option">
                                  <select class="styled">
                                      <option>Sow</option>
                                      <option>Boar</option>
                                  </select>
                              </div>
                          </div>
                          <?php
                          $swine = "SELECT * FROM productlist";
                          $getS = mysqli_query($mysqli,$swine);
                          ?>
                          <table class="table table-hover personal-task">
                              <thead>
                              <tr>
                                  <th>Swine ID</th>
                                  <th>Swine Type</th>
                                  <th>Breed</th>
                                  <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>
                          <?php
                          while($swineRow = mysqli_fetch_array($getS))
                          {
                          ?>
                              <tr>
                                <td><?php echo $swineRow['swine_id']?></td>
                                <td><?php echo $swineRow['swine_type']?></td>
                                <td><?php echo $swineRow['breed']?></td>
                                <td><?php echo $swineRow['status']?></td>  
                              </tr>
                           <?php }?>
                              </tbody>
                          </table>
                      </section>
                      <!--work progress end-->
                  </div>
              </div>

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
