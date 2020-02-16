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
                          <li><a  href="sow.php">Sow</a></li>
                          <li><a  href="boar.php">Boar</a></li>
                          <li  class="active"><a href="piglet.php">Piglet</a></li>
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
              <header class="card-header">
                  PIGLET TABLE
              <span class="tools pull-right">
              
               
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
      <!--main content end-->

       <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addToSow" class="modal fade">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="modal-header">
                        ADD SOW INFORMATION
                          <Label class="modal-title" id="Details"></Label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                  </div>
                                  <div class="form-group">
                                      <input type="hidden" id="far_no" name="">
                                      <input type="text"  id="Breed" name="Breed" class="form-control input-sm" placeholder="Breed type"  required>
                                      <span id="error_breed" class="text-danger"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="form-group">
                                    <input  type="number" id="Cage_No" name="Cage_No" class="form-control " placeholder="Cage Number"  required>
                                    <span id="error_breed" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                  </div>
                                  <div class="form-group">
                                      <input type="date"  id="DOB" name="DOB" class="form-control " placeholder="" required >
                                      <span id="error_date" class="text-danger"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-12 right">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                  </div>
                                  <div class="form-group ">
                                  <button type="submit" class="btn btn-primary" style="padding-right: 35px !important;padding-left: 35px !important;width: 100%;" id="form_ation" onclick="saveSow(this)"><i class="fa fa-plus"></i> Add to Sow</button> 
                                  </div>
                              </div>
                          </div>
                      </div>
                      </div >
                  </div>
              </div>
          </div>
          <!-- modal -->

                 <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addToBoar" class="modal fade">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="modal-header">
                        ADD SOW INFORMATION
                          <Label class="modal-title" id="Details"></Label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                      <input type="hidden" id="far_No" name="">
                                        <input type="number" id="cage_no" name="cage_no" class="form-control" placeholder="Cage Number" >
                                        <span id="error_cageB" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" id="sire_no" name="sire_no" class="form-control" placeholder="Sire Number" >
                                        <span id="error_sire" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" id="dam_no" name="dam_no" class="form-control" placeholder="Dam Number" >
                                        <span id="error_dam" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" id="breedB" name="breedB" class="form-control" placeholder="Breed Type" >
                                      <span id="error_breedB" class="text-danger"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" id="dob" name="dob" class="form-control" placeholder="" >
                                        <span id="error_dateB" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group ">
                                    <button type="submit" class="btn btn-primary" style="padding-right: 35px !important;padding-left: 35px !important;width: 100%;" id="form_ation" onclick="saveboar(this)"><i class="fa fa-plus"></i> Add to Boar</button> 
                                    </div>
                                </div>
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

  <script type="text/javascript">
    function Sow(button){
      var far_no = button.id;
      var DOB = $("#DOBpiglet").val();
      //alert(DOB);
      $("#DOB").val(DOB);
      $("#far_no").val(far_no);
      $("#addToSow").modal("show");
    }
    function Boar(button){
      var far_no = button.id;
      var dob = $("#DOBpiglet").val();
      var sire_ID = $("#sire_ID").html();
      var dam_ID = $("#dam_ID").html();
      //alert(sire_ID);

      $("#sire_no").val(sire_ID);
      $("#dam_no").val(dam_ID);
      $("#dob").val(dob);
      $("#far_No").val(far_no);
      $("#addToBoar").modal("show");
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
    <!--Add sow in piglet page-->
    <script type="text/javascript">
          function saveSow(button){
              var farNo = $("#far_no").val();
              var swine = "Sow";
              var Cage_No = $('#Cage_No').val();
              var DOB = $('#DOB').val();
              var Breed = $('#Breed').val();

              //alert (Cage_No);
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
                  url: 'convertToSow.php',
                  method: 'POST',
                  data: {'Cage_No': Cage_No,'DOB':DOB,'Breed':Breed,'swine':swine,'farNo':farNo},
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
                      $("#addToSow").modal("hide");
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
    <!--end-->

    <!--custom js for adding swine-->
    <script type="text/javascript">

    </script>

    <script type="text/javascript">
          function saveboar(button){

              var farNo = $("#far_No").val();
              var swine = "Boar";
              //alert(farNo);
              var cage_no = $('#cage_no').val();
              var sire_no = $('#sire_no').val();
              var dam_no = $('#dam_no').val();
              var breedB = $('#breedB').val();
              var dob = $('#dob').val();

              //  alert (Cage_No);
              if (cage_no == '')
              {
                var cageEr = document.getElementById('cage_no');
                cageEr.style.border = "1px solid #cc0000";
              }
              else
              {
                var cageEr = document.getElementById('cage_no');
                cageEr.style.border = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if (sire_no == '')
              {
                var cageEr = document.getElementById('sire_no');
                cageEr.style.border = "1px solid #cc0000";
              }
              else
              {
                var cageEr = document.getElementById('sire_no');
                cageEr.style.border = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if (dam_no == '')
              {
                var cageEr = document.getElementById('dam_no');
                cageEr.style.border = "1px solid #cc0000";
              }
              else
              {
                var cageEr = document.getElementById('dam_no');
                cageEr.style.border = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if(breedB == '')
              {
                var dateEr = document.getElementById('breedB');
                dateEr.style.border = "1px solid #cc0000";
              }
              else
              {
                var dateEr = document.getElementById('breedB');
                dateEr.style.border = "";
                error_date.innerHTML = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if(dob == '')
              {
                var breedEr = document.getElementById('dob');
                breedEr.style.border = "1px solid #cc0000";
              }
              else
              {
                var breedEr = document.getElementById('dob');
                breedEr.style.border = "";
              }
//--------------------------------------------------------------------------------------------------------------------------
              if ( cage_no != '' || sire_no != '' || dam_no != '' || breedB != '' || dob != '')
              {
                 $.ajax({
                  url: 'convertToSow.php',
                  method: 'POST',
                  data: {'cage_no': cage_no,'sire_no':sire_no,'dam_no':dam_no,'breedB':breedB,'dob':dob,'farNo':farNo,'swine':swine},
                  success:function(data)
                  {
                    //alert(data);
                    if(data == 'success')
                    {
                      toastr.success("Record successfully added","Successful");
                      load_data();
                      document.getElementById('cage_no').value = "";
                      document.getElementById('sire_no').value = "";
                      document.getElementById('dam_no').value = "";
                      document.getElementById('breedB').value = "";
                      document.getElementById('dob').value = "";
                      $("#addToBoar").modal("hide");
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
         $.ajax({
          url: "fetchpgilet.php",
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

    <!--dynamic table initialization -->
    <script src="js/dynamic_table_init.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 10:51:06 GMT -->
</html>
