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
      .dataTables_length{
        display: none;
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
                      <a href="javascript:;" class="active" >
                          <i class="fa  fa-github-alt"></i>
                          <span>Swine</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="sow.php">Sow</a></li>
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
      
      <section id="main-content" >
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header id="content-phone" class="card-header">
                  ADD SOW
              <span class="tools pull-right">
                <a class="fa fa-chevron-down" href="javascript:;"></a>
              </header>
              <div id="addSwineMobile" class="card-body" style="display:none;">
              <form id="content-phone" action="submitSow.php" method="POST">
                <div class="row">
                  <div class="col-lg-12">
                      <div class="form-group ic-cmp-int">
                          <div class="form-ic-cmp">
                          </div>
                          <div class="form-group">
                              <input type="text" style="text-align: center;"  name="Breed" class="form-control input-sm" placeholder="Breed type"  required>
                              <span id="error_breed" class="text-danger"></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                        </div>
                        <div class="form-group">
                            <input style="text-align: center;" type="number"  name="Cage_No" class="form-control " placeholder="Cage Number"  required>
                            <span id="error_breed" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                      <div class="form-group ic-cmp-int">
                          <div class="form-ic-cmp">
                          </div>
                          <div class="form-group">
                              <input type="date" style="text-align: center;"  name="DOB" class="form-control " placeholder="" required >
                              <span id="error_date" class="text-danger"></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-12 right">
                      <div class="form-group ic-cmp-int">
                          <div class="form-ic-cmp">
                          </div>
                          <div class="form-group ">
                          <button type="submit" class="btn btn-primary" style="padding-right: 35px !important;padding-left: 35px !important;width: 100%;" id="form_ation" ><i class="fa fa-plus"></i> Add to table</button> 
                          </div>
                      </div>
                  </div>
              </div>
              </form>
              </div>
              </section>
              </div>
              </div>
              <!-- page end-->
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
                  SOW TABLE
             <span class="tools pull-right">
             <div id="content-desktop">
              <div class="row">
                  <div class="col-lg-3">
                      <div class="form-group ic-cmp-int">
                          <div class="form-ic-cmp">
                          </div>
                          <div class="form-group">
                              <input type="text" style="text-align: center;" id="Breed" name="Breed" class="form-control round-input" placeholder="Breed type" >
                              <span id="error_breed" class="text-danger"></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                        </div>
                        <div class="form-group">
                            <input style="text-align: center;" type="number" id="Cage_No" name="Cage_No" class="form-control round-input" placeholder="Cage Number" >
                            <span id="error_breed" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                      <div class="form-group ic-cmp-int">
                          <div class="form-ic-cmp">
                          </div>
                          <div class="form-group">
                              <input type="date" style="text-align: center;" id="DOB" name="DOB" class="form-control round-input" placeholder="" >
                              <span id="error_date" class="text-danger"></span>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 right">
                      <div class="form-group ic-cmp-int">
                          <div class="form-ic-cmp">
                          </div>
                          <div class="form-group ">
                          <button type="button" class="btn btn-round btn-primary"  id="form_ation" onclick="saveSow(this)"><i class="fa fa-plus"></i> Add to table</button> 
                          </div>
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
<script type="text/javascript">
    function showAddSwine(){
      document.getElementById("addSwineMobile").style.display="block";
    }
</script>
     
      <!--main content end-->
       <!--add breed Modal -->
       <?php
        $boar = "SELECT * FROM boarrecord";
        $runMed = mysqli_query($mysqli,$boar);
        $option = '';
        while($row = mysqli_fetch_array($runMed))
              {
                $option = $option."<option>$row[0]</option>"; 
              }
       ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addbreed" class="modal fade">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="ID"></Label><p></p>
                          <label id="Breed"></label><label id="CageNo"></label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <i style="font-size: 20px;" class="fa fa-times"></i>
                          </button> 
                          <button style="display:none;" class="btn btn-warning btn-sm" id="newset" type="button" onclick="setNew(this);"><i class=" fa fa-android"></i> Set new schedule</button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-3">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Breeding with:</label>
                                        <input type="hidden" id="Boar_ID"/>
                                        <select class="form-control" id="boar_id">
                                          <option selected disabled>Choose Boar ID</option>
                                          <?php
                                          echo $option;
                                          ?>
                                        </select>
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                          <div class="col-lg-3">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Breeding date:</label>
                                        <input type="hidden" id="sow_id"/>
                                        <input type="date" id="breedDate" onchange="addtoExbreedDate()" name="breedDate" class="form-control" placeholder="Date of birth">
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Expected:</label>
                                        <input type="date" id="ExBreedDate" name="ExBreedDate" class="form-control" placeholder="Breeding result" readonly>
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Status:</label>
                                        <select type="text" id="status" name="status" onchange="decide()" class="form-control" placeholder="Date of birth">
                                        <option selected disabled>Diagnosis</option>
                                        <option>On going</option>
                                        <option>Pregnant</option>
                                        <option>Failed</option>
                                        </select>
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        <div id="content-desktop">
                        <label style=" background-color: #E9ECEF;padding: 5px;padding-right:15px;border-bottom-right-radius: 50px;border-top-right-radius: 50px;">Farrowing Information. </label></div>
                        <hr>
                        </div>  
                        <div class="row" id="addFarrowed" style="">
                            <div class="col-lg-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Expected date</label>
                                        <input type="date" id="ExpectedDate" name="ExpectedDate" class="form-control" readonly >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Date farrowed</label>
                                        <input type="date" id="DateFarrow" name="DateFarrow" class="form-control" onchange="setdateFar()" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Litter Size</label>
                                        <input type="number" id="litterSize" value="" name="litterSize" class="form-control" placeholder="Litter Size">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Farrowing Cage:</label>
                                        <button class="btn btn-warning " onclick="insertToFar(this)" type="button"><i class=" fa fa-save"></i> Insert</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Date weaning</label>
                                        <input type="date" id="DateWeaning" name="DateWeaning" class="form-control" readonly >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Weight</label>
                                        <input type="number" id="UponWeaning" value="" name="UponWeaning" class="form-control" onchange="getValue()" placeholder="Upon weaning" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Average </label>
                                        <input type="number" onchange="sign()" id="AverageWW" name="AverageWW" class="form-control" placeholder="Weaning weight" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div >
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-primary" onclick="saveBreed(this)" type="button"><i class=" fa fa-save"></i> Save Change</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="viewBreed" class="modal fade">
              <div class="modal-dialog modal-dialog-centered">
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
                              <th width="200" id="SwineID"></th>
                              <th id="boarID"></th>
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

      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="chooseFarCage" class="modal fade">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title">Choose a farrowing cage.</label></Label>
                          <label style="display:none;margin-right:-16px;color:black;float: right; background-color: #E9ECEF;padding: 5px;padding-left:15px;border-bottom-left-radius: 50px;border-top-left-radius: 50px;" id="NotimeRem"></label>
                          <label style="display:none;margin-right:-16px;color:black;float: right; background-color: #E9ECEF;padding: 5px;padding-left:15px;border-bottom-left-radius: 50px;border-top-left-radius: 50px;" id="PregView"></label>
                      </div>
                      <div class="modal-body">
                      <input type="number" id="cage_no" class="form-control">
                      </div >
                      <div class="modal-footer">
                          <button class="btn btn-primary"data-dismiss="modal" onclick="insertFarCage()" type="button"><i class=" fa fa-check"></i> Insert</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>

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
  <!--decide result-->

  <script type="text/javascript">
      function decide(){
        var decide = document.getElementById('status').value;
        var newSet = document.getElementById('newset');

            //newset.style.display="block";
        //alert(decide);
        if (decide == "Failed")
        {
            newset.style.display="block";
        }
        else
        {
            newset.style.display="none";
        }
        
      }
      function setNew(button){
        var sow_id = $("#sow_id").val();
        var status = $('#status').val();

        //alert(sow_id);
        $.ajax({
            url: 'addbreedingHistory.php',
            method: 'post',
            data:{'sow_id':sow_id,'status':status},
            success:function(data){
                //alert(data);
                if(data == 'success')
                {
                    toastr.success("Data has been transfered to breeding history","Successful");
                    $('#breedDate').val("");
                    $('#ExBreedDate').val("");
                    $('#status').val("Diagnosis");
                    $('#ExpectedDate').val("");
                    $('#DateFarrow').val("");
                    $('#litterSize').val("");
                    $('#DateWeaning').val("");
                    $('#UponWeaning').val("");
                    $('#AverageWW').val("");
                }
                else
                {
                    toastr.error("Failed to transfer data","Error accured");
                }
            }
        })


                
            }
  </script>

  <!--pregnant state-->
  <script type="text/javascript">
      function viewPreg(button){
            var show = document.getElementById("NotimeRem");
            var hide = document.getElementById("timeRem");
            var preg = document.getElementById("PregView");
            document.getElementById('inform').innerHTML="Time remaining for pregnant result";
            preg.style.display = "block";
            show.style.display = "none";
            hide.style.display = "none";

            var SowId = button.id;
            //alert(SowId);
            $.ajax({
            method: 'POST',
            url:'viewBreedSow.php',
            data:{'SowId':SowId},
            dataType:"json",
            success: function(data){

            function countDown()
            {
                var count = data.ExpectedDate;
                if(count != "0000-00-00")
                {
                    var today = new Date();
                    var evenDate = new Date(count);

                    var currentTime = today.getTime();
                    var evenTime = evenDate.getTime();

                    var remTime = evenTime - currentTime;

                    var sec = Math.floor(remTime/1000);
                    var min = Math.floor(sec/60);
                    var hrs = Math.floor(min/60);
                    var days = Math.floor(hrs/24);

                    hrs = hrs % 34;
                    min%=60;
                    sec%=60;

                    hrs =(hrs<10) ? "0"+hrs : hrs;
                    min =(min<10) ? "0"+min : min;
                    sec =(sec<10) ? "0"+sec : sec;

                    var countTime = days+" Days "+" "+hrs+" hours "+min+" minutes "+sec+" seconds";
                    setInterval(countDown,1000);
                    if(remTime == 0)
                    {
                        $("#PregView").html("Please check the sow");
                    }
                    else
                    { 
                        $("#PregView").html(countTime);
                    }
                }   
                else
                {
                    window.clearInterval(countDown);
                    countDown();
                } 
            }
                    //interval = setInterval(countDown,1000);
                    $('#SwineID').html("Sow ID : "+data.Sow_ID);
                    $('#boarID').html("Boar ID : "+data.Boar_ID);
                    $('#breed').html(data.Breed);
                    $('#breedDate1').html(data.BreedingDate);
                    $('#ExBreedResult').html(data.ExBreedDate);
                    $('#ExFarDate').html(data.ExpectedDate);
                    $('#DateFar').html(data.DateFarrow);
                    $('#dateWean').html(data.DateWeaning);
                    $('#WUweaning').html(data.UponWeaning);
                    $('#AWweight').html(data.AverageWW);
                    $('#litter').html(data.litterSize);
                    $('#breedCount').html(data.used);
                    $("#viewBreed").modal("show");
                    countDown();
                    
                }
            })
      }
  </script>

  <!--view Breed result-->
  <script type="text/javascript">
      function viewBreed(button){
        var SowId = button.id;
        var show = document.getElementById("NotimeRem");
        var hide = document.getElementById("timeRem");
        var preg = document.getElementById("PregView");
        document.getElementById('inform').innerHTML="Set a new sched";
        preg.style.display = "none";
        show.style.display = "block";
        hide.style.display = "none";
        //alert(SowId);
        $.ajax({
        method: 'POST',
        url:'viewBreedSow.php',
        data:{'SowId':SowId},
        dataType:"json",
        success: function(data){
            var status = data.status;
            if (status == "Pregnant")
            {
               //$("#NotimeRem").html("This sow is pregnant"); 
            }
            else
            {
                $("#NotimeRem").html("No schedule has been set.");
            }   
            $('#SwineID').html("Sow ID : "+data.Sow_ID);
            $('#boarID').html("Boar ID : "+data.Boar_ID);
            $('#breed').html(data.Breed);
            $('#breedDate1').html(data.BreedingDate);
            $('#ExBreedResult').html(data.ExBreedDate);
            $('#ExFarDate').html(data.ExpectedDate);
            $('#DateFar').html(data.DateFarrow);
            $('#dateWean').html(data.DateWeaning);
            $('#WUweaning').html(data.UponWeaning);
            $('#AWweight').html(data.AverageWW);
            $('#litter').html(data.litterSize);
            $('#breedCount').html(data.used);
            $("#viewBreed").modal("show");
        }
      })
    }
  </script>

  <!-- view breed sched-->
  <script type="text/javascript">
      function viewBreedSched(button){

            var show = document.getElementById("NotimeRem");
            var hide = document.getElementById("timeRem");
            var preg = document.getElementById("PregView");
            document.getElementById('inform').innerHTML="Time remaining for breeding result";
            preg.style.display = "none";
            show.style.display = "none";
            hide.style.display = "block";

            var SowId = button.id;
            //alert(SowId);
            $.ajax({
            method: 'POST',
            url:'viewBreedSow.php',
            data:{'SowId':SowId},
            dataType:"json",
            success: function(data){

            function countDown()
            {
                var count = data.ExBreedDate;
                if(count != "0000-00-00")
                {
                    var today = new Date();
                    var evenDate = new Date(count);

                    var currentTime = today.getTime();
                    var evenTime = evenDate.getTime();

                    var remTime = evenTime - currentTime;

                    var sec = Math.floor(remTime/1000);
                    var min = Math.floor(sec/60);
                    var hrs = Math.floor(min/60);
                    var days = Math.floor(hrs/24);

                    hrs = hrs % 34;
                    min%=60;
                    sec%=60;

                    hrs =(hrs<10) ? "0"+hrs : hrs;
                    min =(min<10) ? "0"+min : min;
                    sec =(sec<10) ? "0"+sec : sec;

                    var countTime = days+" Days "+" "+hrs+" hours "+min+" minutes "+sec+" seconds";
                    setInterval(countDown,1000);
                    $("#timeRem").html(countTime);
                }   
                else
                {
                    window.clearInterval(countDown);
                    countDown();
                } 
            }
                    //interval = setInterval(countDown,1000);
                    $('#SwineID').html("Sow ID : "+data.Sow_ID);
                    $('#boarID').html("Boar ID : "+data.Boar_ID);
                    $('#breed').html(data.Breed);
                    $('#breedDate1').html(data.BreedingDate);
                    $('#ExBreedResult').html(data.ExBreedDate);
                    $('#ExFarDate').html(data.ExpectedDate);
                    $('#DateFar').html(data.DateFarrow);
                    $('#dateWean').html(data.DateWeaning);
                    $('#WUweaning').html(data.UponWeaning);
                    $('#AWweight').html(data.AverageWW);
                    $('#litter').html(data.litterSize);
                    $('#breedCount').html(data.used);
                    $("#viewBreed").modal("show");
                    countDown();
                    
                }
            })
        }
  </script>
  <script type="text/javascript">
      function insertToFar(button){
        var lS = $("#litterSize").val()
        var S_id = $("#sow_id").val()
        var B_id = $("#Boar_ID").val();
        var d_far = $("#DateFarrow").val();
        //alert(d_far);
        //alert(B_id);
        if (lS == 0)
        {
          toastr.error("No breeding schedule.","No schedule");
        }
        else
        {
            $.ajax({
            url: 'getfarrow.php',
            method: 'post',
            data:{'S_id':S_id,'B_id':B_id},
            success:function(data){
              //alert(data);
              if (data == 'existed')
              {
                toastr.error("Already in the farrowing cage","Existed");
              }
              else
              {
                $("#chooseFarCage").modal("show");
              }
            }
          })
        }
        
        //alert(lS + S_id + B_id);
        
      }

      function insertFarCage(){
        var lS = $("#litterSize").val()
        var S_id = $("#sow_id").val()
        var B_id = $("#Boar_ID").val();
        var c_no = $("#cage_no").val();
        var d_wean = $("#DateWeaning").val();
        var d_far = $("#DateFarrow").val();
        //alert(d_far);
        $.ajax({
          url: 'farrowInsert.php',
          method: 'post',
          data:{'lS':lS,'S_id':S_id,'B_id':B_id,'c_no':c_no,'d_wean':d_wean,'d_far':d_far},
          success:function(data){
            //alert(data);
            if(data == 'existed')
            {
              toastr.error("Already in the farrowing cage","Existed");
            }
            else
            {
              toastr.success("Added to farrowing cage.","Successful");
              $("#chooseFarCage").modal("hide"); 
            }
          }
        })

      }
  </script>

  <!--save breed-->
  <script type="text/javascript">
      function saveBreed(button){
        var Boar_ID = $("#boar_id").val();
        var breedDate = $("#breedDate").val();
        var ExBreedDate = $("#ExBreedDate").val();
        var ExpectedDate = $('#ExpectedDate').val();
        var DateFarrow = $('#DateFarrow').val();
        var litterSize = $('#litterSize').val();
        var DateWeaning = $('#DateWeaning').val();
        var UponWeaning = $('#UponWeaning').val();
        var AverageWW = $('#AverageWW').val();
        var status = $("#status").val();
        var Sow_ID = $("#sow_id").val();
        //alert(Boar_ID);
        $.ajax({
            url: 'saveBreedSched.php',
            method: 'post',
            data:{'Boar_ID':Boar_ID,'breedDate':breedDate,'ExBreedDate':ExBreedDate,'status':status,'Sow_ID':Sow_ID,'ExpectedDate':ExpectedDate,'DateFarrow':DateFarrow,'litterSize':litterSize,'DateWeaning':DateWeaning,'UponWeaning':UponWeaning,'AverageWW':AverageWW},
            success:function(data){
                //alert(data);
                if(data == 'success')
                {
                    toastr.success("Breeding Schedule Added","Successful");
                    load_data();
                    $("#breedDate").val("");
                    $("#ExBreedDate").val("");
                    $("#status").val("Diagnosis");
                    $("#ID").val("");
                    $("#boar_ID").val("Choose Boar ID");
                }
                else
                {
                    toastr.error("Error adding sched","Failed");
                }
            }
        })
      }
  </script>

  <!--countdown-->
  <script type="text/javascript">
    function getValue(){
      var litterSize = $("#litterSize").val();
      var UponWeaning = $("#UponWeaning").val();

      var res = UponWeaning / litterSize;
      $("#AverageWW").val(res);
     
      var av = $("#AverageWW").val();
      //alert(av);
      if(av < 4){
        document.getElementById("AverageWW").style.border="1px solid red";
      }
      else
      {
        document.getElementById("AverageWW").style.border="1px solid lightgreen";
      }
    }
  </script>

  <!--date farrowed setup-->
  <script type="text/javascript">
      function setdateFar(){
        var fardate = $("#DateFarrow").val();

        var date = new Date(fardate);
        var weanDate = new Date(date);

        weanDate.setDate(weanDate.getDate()+18);
        //alert(weanDate);
        var dd = weanDate.getDate();
        var mm = weanDate.getMonth()+1;
        var yy = weanDate.getFullYear();

        var weanTargetdate =yy+"-"+("0"+mm).slice(-2)+"-"+("0"+dd).slice(-2);
        $("#DateWeaning").val(weanTargetdate);
      }
  </script>

  <!--set today date-->
<script type="text/javascript">
    function addtoExbreedDate(){
        var nowdate = $("#breedDate").val();
        
        var date = new Date(nowdate);
        var newdate = new Date(date);
        var expDate = new Date(date);

        newdate.setDate(newdate.getDate()+25);
        expDate.setDate(expDate.getDate()+113);

        var dd = newdate.getDate();
        var mm = newdate.getMonth()+1;
        var yy = newdate.getFullYear();

        var d = expDate.getDate();
        var m = expDate.getMonth()+1;
        var y = expDate.getFullYear();

        var expectedresult =y+"-"+("0"+m).slice(-2)+"-"+("0"+d).slice(-2);
        $("#ExpectedDate").val(expectedresult);

        var targetdate =yy+"-"+("0"+mm).slice(-2)+"-"+("0"+dd).slice(-2);
        $("#ExBreedDate").val(targetdate);
        $("#status").val("On going");

        var decide = document.getElementById('status').value;
        //alert(decide);
        if(decide == "On going")
        {
            $("#status").prop('disabled',true);
        }
        else
        {
            $("#status").prop('disabled',false);
        }
        //alert(newdate);
    }
</script>

    <script type="text/javascript">
      function addbreed(button){
            var SowId = button.id;
            $.ajax({
                    type: 'POST',
                    url:'addBreed.php',
                    data:{'SowId':SowId},
                    dataType: 'json',
                    success: function(data){
                      $('#ID').html("ID :"+data.Sow_ID+" ");
                      $('#CageNo').html(" | Cage No : "+data.Cage_No);
                      $("#sow_id").val(data.Sow_ID);
                      $("#Boar_ID").val(data.Boar_ID);
                      //alert(data.Boar_ID);
                      //$('#sow_id').val(data.Sow_ID);
                      $('#breedDate').val(data.BreedingDate);
                      $('#ExBreedDate').val(data.ExBreedDate);
                      var stat = data.status;
                      if(stat == '')
                      {
                        $("#status").val("Diagnosis");
                      }
                      else
                      {
                        $('#status').val(data.status);
                      }
                      $('#ExpectedDate').val(data.ExpectedDate);
                      $('#DateFarrow').val(data.DateFarrow);
                      $('#litterSize').val(data.litterSize);
                      $('#DateWeaning').val(data.DateWeaning);
                      $('#UponWeaning').val(data.UponWeaning);
                      $('#AverageWW').val(data.AverageWW);

                    } 
                });
        
      }
    </script>

    <!--custom js for adding swine-->
    <script type="text/javascript">

    </script>

    <script type="text/javascript">
          function saveSow(button){

              var Cage_No = $('#Cage_No').val();
              var DOB = $('#DOB').val();
              var Breed = $('#Breed').val();

              //  alert (Cage_No);
              if (Cage_No == '')
              {
                var cageEr = document.getElementById('Cage_No');
                cageEr.style.border = "1px solid #cc0000";
              }
              else
              {
                var cageEr = document.getElementById('Cage_No');
                cageEr.style.border = "";
              }
              if(DOB == '')
              {
                var dateEr = document.getElementById('DOB');
                dateEr.style.border = "1px solid #cc0000";
              }
              else
              {
                var dateEr = document.getElementById('DOB');
                dateEr.style.border = "";
                error_date.innerHTML = "";
              }
              if(Breed == '')
              {
                var breedEr = document.getElementById('Breed');
                breedEr.style.border = "1px solid #cc0000";
              }
              else
              {
                var breedEr = document.getElementById('Breed');
                breedEr.style.border = "";
              }
              if ( Breed != '' || Cage_No != '' || DOB != '')
              {
                 $.ajax({
                  url: 'saveSow.php',
                  method: 'POST',
                  data: {'Cage_No': Cage_No,'DOB':DOB,'Breed':Breed},
                  success:function(data)
                  {
                    //alert(data);
                    if(data == 'success')
                    {
                      toastr.success("Record successfully added","Successful");
                      load_data();
                      document.getElementById('Breed').value = "";
                      document.getElementById('DOB').value = "";
                      document.getElementById('Cage_No').value = "";
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

    <!--custom js for fetch data to table-->
    <script type="text/javascript">

      function load_data()
      {
        var decide = document.getElementById('status').value;
        //alert(decide);
        if(decide == "On going")
        {
            $("#status").prop('disabled',true);
        }
        else
        {
            $("#status").prop('disabled',false);
        }
        var nowdate = new Date();
        var day = nowdate.getDate();
        var moz = nowdate.getMonth()+1;
        var year = nowdate.getFullYear();
        var addDay = nowdate.getDate()+25;

        var currentdate =year+"-"+("0"+moz).slice(-2)+"-"+("0"+day).slice(-2);

        //alert(currentdate);
         //stopWatch();

         $.ajax({
          url: "fetchSow.php",
          method: "POST",
          data:{'currentdate':currentdate},
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

    <!--dynamic table initialization -->
    <script src="js/dynamic_table_init.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 10:51:06 GMT -->
</html>
