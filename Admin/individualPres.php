<?php
include 'config.php';
include 'session.php';
$name = $_SESSION['Username'];
//echo $name;
$s = "SELECT * FROM employee_table WHERE full_name = '$name'";
$result = mysqli_query($mysqli,$s);
$row = mysqli_fetch_array($result);
$image = $row['picture'];

$Sow_ID = $_GET["Sow_ID"];

$update = "UPDATE sowrecord SET description = 'viewed' WHERE Sow_ID = '$Sow_ID'";
mysqli_query($mysqli,$update); 

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

    <!--custom css-->
    <link rel="stylesheet" type="text/css" href="css/custom.css"/> 
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
      .dataTables_length{
        display: none !important;
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
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="active" >
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Report</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="medication.php">Medication</a></li>
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
                  <li class="sub-menu">
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

      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="viewBreed" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="inform"></label></Label>
                          <label style="margin-right:-16px;color:black;float: right; background-color: #E9ECEF;padding: 5px;padding-left:15px;border-bottom-left-radius: 50px;border-top-left-radius: 50px;" id="timeRem"></label>
                          <label style="display:none;margin-right:-16px;color:black;float: right; background-color: #E9ECEF;padding: 5px;padding-left:15px;border-bottom-left-radius: 50px;border-top-left-radius: 50px;" id="NotimeRem"></label>
                          <label style="display:none;margin-right:-16px;color:black;float: right; background-color: #E9ECEF;padding: 5px;padding-left:15px;border-bottom-left-radius: 50px;border-top-left-radius: 50px;" id="PregView"></label>
                      </div>
                      <div class="modal-body">
                      <table class="table table-striped table-bordered">
                          <tr>
                              <th>Sow ID</th>
                              <td id="SwineID"> </td>
                          </tr>
                      </table>
                      <table class="table table-bordered">
                          <tr>
                              <th width="200">Breed Type</th>
                              <td id="breed"></td>
                          </tr>
                          <tr>
                              <th width="200">Breeding Date</th>
                              <td id="breedDate1"></td>
                          </tr>
                          <tr>
                              <th width="200">Expected Breeding Result</th>
                              <td id="ExBreedResult"></td>
                          </tr>
                          <tr>
                              <th width="200">Expected Farrowing Date</th>
                              <td id="ExFarDate"></td>
                          </tr>
                          <tr>
                              <th width="200">Date Farrowed</th>
                              <td id="DateFar"></td>
                          </tr>
                          <tr>
                              <th width="200">Date weaning</th>
                              <td id="dateWean"></td>
                          </tr>
                          <tr>
                              <th width="200">Weight Upon Weaning</th>
                              <td id="WUweaning"></td>
                          </tr>
                          <tr>
                              <th width="200">Average weaning weight</th>
                              <td id="AWweight"></td>
                          </tr>
                          <tr>
                              <th width="200">Litter count</th>
                              <td id="litter"></td>
                          </tr>
                          <tr>
                              <th width="200">Breeding count</th>
                              <td id="breedCount"></td>
                          </tr>
                      </table>
                      </div >
                      <div class="modal-footer">
                          <button class="btn btn-primary"data-dismiss="modal" type="button"><i class=" fa fa-check"></i> Okay</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
          <!-- modal -->
      <?php 
      $Sow_ID = $_GET["Sow_ID"];

      $getInfo = "SELECT * FROM health_table WHERE Sow_ID = '$Sow_ID' ORDER BY date ASC";
      $info = mysqli_query($mysqli,$getInfo);
      if(mysqli_num_rows($info) == 0)
      {
        echo '
          <section id="main-content" >
              <section class="wrapper">
                  <div class="row">
                    <div class="col-sm-12">
                  <section style="background-color:#F1F2F7!important;" class="card">
                  <div class="card-body">
                  <h1 style="padding-top:20%;padding-bottom:20%;" align ="center">No medical record</h1>
                  
                  </div>
                  </div>
                  </div>
                  </section>
                  </div>
                  </div>
              </section>
          </section>';
      }
      else
      {
        
          echo '
          <section id="main-content" >
              <section class="wrapper">
                  <div class="row">
                    <div class="col-sm-12">
                  
                  <section style="background-color:#F1F2F7!important;" class="card">
                  <header class="card-header">
                  <h3>Medical timeline for swine id - '.$Sow_ID.'</h3>
                    </header>
                  <div class="card-body">
                  <div class="adv-table">
                  <table class="display table" id="dynamic-table">
                  <thead>
                    <tr>
                      <th>Information</th>
                    </tr>
                  </thead>
                  <tbody>';
                  while($everyRow = mysqli_fetch_array($info))
                  {
                    $date = $everyRow["date"];
                    $newDate = date("M d, Y h:i a", strtotime($date));
                  
                  echo '
                    <tr>
                      <td>
                      <b>Date: '.$newDate.' </b> | Prescibe by:<hr>
                      <b>ID:</b> '.$everyRow["health_id"].'<br> 
                      <b>Age:</b> '.$everyRow["age"].'<br> 
                      <b>Description:</b> '.$everyRow["description"].' <br> 
                      <b>Instruction:</b><br>'.$everyRow["instruction"].'<br>
                      <b>Status: </b>'.$everyRow["status"].'<hr>';
                      if($everyRow["status"] == "Achieved")
                      {
                        echo '<input type="button" id="'.$everyRow['health_id'].'" onclick="Undone(this)" class="btn btn-primary btn-sm" value="Undone"/><br><br>';
                      }
                      else
                      {
                        echo '<input type="button" id="'.$everyRow['health_id'].'" onclick="done(this)" class="btn btn-primary btn-sm" value="Done"/><br><br>';
                      }
                      echo '
                      </td>
                    </tr>';
                  }
                  echo '
                  </tbody>
                  </table>
                  
                  </div>
                  </div>
                  </div>
                  </section>
                  </div>
                  </div>
              </section>
          </section>';
       } 
     ?>
     <script type="text/javascript">
       function done(button){
          var h_id = button.id;
          var stat = "Done";
          //alert(stat);
          $.ajax({
            method: 'POST',
            url:'updateHealthStat.php',
            data:{'h_id':h_id,'stat':stat},
            success: function(data){
              //alert(data);
              window.location = "individualPres.php?Sow_ID=<?php echo $Sow_ID?>";
            }
          })
       }
       function Undone(button){
          var h_id = button.id;
          var stat = "Undone";
          //alert(stat);
          $.ajax({
            method: 'POST',
            url:'updateHealthStat.php',
            data:{'h_id':h_id,'stat':stat},
            success: function(data){
              //alert(data);
              window.location = "individualPres.php?Sow_ID=<?php echo $Sow_ID?>";
            }
          })
       }
     </script>
      <!--main content end-->
       <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="healthmodal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="Detail">Add health</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <label id="nowdate"></label>
                        <div class="row">
                          <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="sow_id" name="sow_id" class="form-control" placeholder="">
                                        <input type="text" id="health_id" name="health_id" class="form-control" placeholder=" Health ID" readonly>
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                    
                                        <input type="number" id="weight" name="weight" class="form-control" placeholder=" Weight">
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label>Remark:</label>
                                        <textarea class="form-control" rows="3" id="remark" name="remark"></textarea>
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div >
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-primary"  id="form_ation" onclick="addHealth(this)" type="button"><i class=" fa fa-save"></i> Save</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->
                 <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="viewPrescription" class="modal fade">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="Detail">Prescription</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">
                            <div id="">
                              <div class="row">
                              <div class="col-sm-12">
                              <section class="card">
                              <div class="card-body">
                              <div class="adv-table">
                              <div id="medicationForSwine">
                              
                              </div>
                              </div>
                              </div>
                              </section>
                              </div>
                              </div>
                        
                            </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          
                      </div>
                  </div>
              </div>
          </div>
      </div>
          <!-- modal -->


      <<!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              iSwine &copy; Swine monitoring
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->


  <!--pregnant state-->



    <!--custom js for fetch data to table
    <script type="text/javascript">

      function load_data()
      {
         $.ajax({
          url: "fetchMedsow.php",
          method: "POST",
          success:function(data){
            $("#user_data").html(data);
            //alert(data);
          }
        })
      } 

      
    </script>
    -->

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
