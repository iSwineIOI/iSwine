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
                  <li class="sub-menu">
                      <a href="javascript:;" class="active">
                          <i class="fa  fa-github-alt"></i>
                          <span>Swine</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="sow.php">Sow</a></li>
                          <li class="active"><a  href="boar.php">Boar</a></li>
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
                      <a href="breeding.php">
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
                          <li><a  href="Inventory.php">Storage</a></li>
                      </ul>
                  </li>
                  <hr>
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
                      <a href="lock_screen.html" >
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
      <section id="main-content" >
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
                  BOAR TABLE
             <span class="tools pull-right">
              <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" style="text-align: center;" id="cage_no" name="cage_no" class="form-control round-input" placeholder="Cage Number" >
                                        <span id="error_cageB" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" style="text-align: center;" id="sire_no" name="sire_no" class="form-control round-input" placeholder="Sire Number" >
                                        <span id="error_sire" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" style="text-align: center;" id="dam_no" name="dam_no" class="form-control round-input" placeholder="Dam Number" >
                                        <span id="error_dam" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                  </div>
                                  <div class="form-group">
                                      <input style="text-align: center;" type="text" id="breedB" name="breedB" class="form-control round-input" placeholder="Breed Type" >
                                      <span id="error_breedB" class="text-danger"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" style="text-align: center;" id="dob" name="dob" class="form-control round-input" placeholder="" >
                                        <span id="error_dateB" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group ">
                                    <button type="button" class="btn btn-round btn-primary" style="padding-right: 35px !important;padding-left: 35px !important" id="form_ation" onclick="saveboar(this)"><i class="fa fa-plus"></i> Add to table</button> 
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
      <!--main content end-->
       <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addswine" class="modal fade">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="Details"></Label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-3">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Today:</label>
                                        <button type="button" class="btn btn-primary" onclick="today(this)"><i class="fa fa-android"></i> Set breeding date</button> 
                                    </div>
                                </div>
                            </div>
                          <div class="col-lg-3">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Breeding date:</label>
                                        <input type="date" id="DOB_e" name="DOB_e" class="form-control" placeholder="Date of birth">
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="form-group">
                                        <label> Expected(Breeding date):</label>
                                        <input type="date" id="DOB_e" name="DOB_e" class="form-control" placeholder="Date of birth">
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
                                        <input type="date" id="DOB_e" name="DOB_e" class="form-control" placeholder="Date of birth">
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                      </div>
                      </div >
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-primary"  id="form_ation" onclick="updateSow(this)" type="button"><i class=" fa fa-save"></i> Save</button>
                      </div>
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
          function saveboar(button){

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
                  url: 'saveBoar.php',
                  method: 'POST',
                  data: {'cage_no': cage_no,'sire_no':sire_no,'dam_no':dam_no,'breedB':breedB,'dob':dob},
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
          url: "fetchBoar.php",
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
