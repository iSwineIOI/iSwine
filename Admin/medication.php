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
     
      <!--main content start-->
      <section id="main-content" >
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
                  SOW TABLE
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
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
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="healthmodal" class="modal fade">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="sow_id1"></h4><br>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        Add health information | <label style="font-weight: bold;" id="nowdate"></label>
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
                            <div class="col-lg-12">
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
                                        <textarea class="form-control" rows="5" id="remark" name="remark"></textarea>
                                        <span id="error_date" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div >
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-primary"  id="form_ation" onclick="addHealth(this)" type="button"><i class=" fa fa-mail-forward"></i> Send</button>
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
  </section>

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
        function viewPres(button){
            var SwineID = button.id;
            var healthID = '';
            //alert(SwineID);
            $.ajax({
                url: 'fetchPres.php',
                method: 'post',
                data:{'SwineID':SwineID,'healthID':healthID},
                success:function(data)
                {
                    $("#medicationForSwine").html(data);
                    $("#viewPrescription").modal("show");
                    load_data();
                }
            })
        }
    </script>
    <script type="text/javascript">
        function next(button){
            var healthID = button.id;
            //var SwineID = '';
            //alert(healthID);
            $.ajax({
                url: 'nextPres.php',
                method: 'post',
                data:{'healthID':healthID},
                success:function(data)
                {
                    //alert(data);
                    $("#medicationForSwine").html(data);
                    $("#viewPrescription").modal("show");
                }
            })
        }
    </script>
    <script type="text/javascript">
        function prev(button){
            var healthID = button.id;
            //var SwineID = '';
            //alert(healthID);
            $.ajax({
                url: 'nextPres.php',
                method: 'post',
                data:{'healthID':healthID},
                success:function(data)
                {
                    //alert(data);
                    $("#medicationForSwine").html(data);
                    $("#viewPrescription").modal("show");
                }
            })
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
        function health(button){
            var SOWid = button.id;
            //alert(SOWid);
            $.ajax({
              url: 'addhealth.php',
                method: 'post',
                success:function(data)
                {
                    $("#health_id").val(data);
                    $("#sow_id").val(SOWid);
                    $("#sow_id1").html("Sow ID "+SOWid);
                    $("#healthmodal").modal("toggle");

                        var date = new Date();
                        const months = ['Jan','feb','Mar','Apr','May','Jun','Jul','Sep','Oct','Nov','Dec'];
                        const days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

                        const monthIndex = date.getMonth();
                        const monthname = months[monthIndex];
                        const dayIndex = date.getDay();
                        const dayname = days[dayIndex];

                        
                        var dd = date.getDate();
                        var mm = date.getMonth()+1;
                        var yy = date.getFullYear();
                        var hh = date.getHours();
                        var mu = date.getMinutes();
                        var ss = date.getSeconds();


                        // alert(hh);

                        var today = monthname + ' '+dd+ ' ' + dayname + ' ' + yy;
                    $("#nowdate").html(today).toDateString;
                }
            })
        }
    </script>

    <script type="text/javascript">
        function addHealth(button){
            //alert("dawd");
            var date = new Date();
            var dd = date.getDate();
            var mm = date.getMonth()+1;
            var yy = date.getFullYear();
            var hh = date.getHours();
            var mu = date.getMinutes();
            var ss = date.getSeconds();

            var thisday = yy + '-' + mm + '-' + dd;

            var sow_id = $("#sow_id").val();
            var health_id = $("#health_id").val();
            var age = $("#age").val();
            var weight = $("#weight").val();
            var remark = $("#remark").val();

            if (sow_id == '' || health_id == '' || age == '' || weight == '' || remark == '')
            {
                toastr.warning("Please fill in all the feild","Missing Information!");
            }
            else
           {
                $.ajax({
                    url: 'insertHealth.php',
                    method: 'post',
                    data:{'sow_id':sow_id,'health_id':health_id,'age':age,'weight':weight,'remark':remark,'thisday':thisday},
                    success:function(data)
                    {
                        //alert(data);
                        if (data == 'success'){
                            toastr.success("Successfully recorded","Successful");
                            load_data();
                            document.getElementById("sow_id").value = "";
                            document.getElementById("health_id").value = "";
                            document.getElementById("weight").value = "";
                            document.getElementById("remark").value = "";
                        }else{
                            toastr.error("Error adding data","Insert Failed!");
                        }
                    }
                })
            }
        }
    </script>


    <!--custom js for fetch data to table-->
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
