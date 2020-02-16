<?php
include 'config.php';
include 'session.php';
$name = $_SESSION['Username'];
//echo $name;
$s = "SELECT * FROM employee_table WHERE full_name = '$name'";
$result = mysqli_query($mysqli,$s);
$row = mysqli_fetch_array($result);
$image = $row['picture'];

$vet = "SELECT * FROM employee_table";
$exe = mysqli_query($mysqli,$vet);
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
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge badge-success">6</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 6 pending tasks</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Dashboard v1.3</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Iphone Development</div>
                                        <div class="percent">87%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                            <span class="sr-only">87% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Mobile App</div>
                                        <div class="percent">33%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                            <span class="sr-only">33% Complete (danger)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Dashboard v1.3</div>
                                        <div class="percent">45%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge badge-danger">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jhon Doe</span>
                                    <span class="time">10 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, Jhon Doe Bhai how are you ?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jason Stathum</span>
                                    <span class="time">3 hrs</span>
                                    </span>
                                    <span class="message">
                                        This is awesome dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jondi Rose</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is metrolab
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge badge-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">You have 7 new notifications</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    Server #3 overloaded.
                                    <span class="small italic">34 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                    Server #10 not respoding.
                                    <span class="small italic">1 Hours</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    Database overloaded 24%.
                                    <span class="small italic">4 hrs</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="fa fa-plus"></i></span>
                                    New user registered.
                                    <span class="small italic">Just now</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-info"><i class="fa fa-bullhorn"></i></span>
                                    Application error.
                                    <span class="small italic">10 mins</span>
                                </a>
                            </li>
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
            <?php

            ?>
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
                        <i class="fa  fa-align-righ"></i>
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
                  <li class="sub-menu">
                      <a href="javascript:;" class="active">
                          <i class="fa fa-list-alt"></i>
                          <span>Culling</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="cullingSow.php">Sow</a></li>
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
                  SOW TABLE
              <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
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
       <!-- Modal for mail -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Mail" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="">Sent to : </Label>
                          <p id="gmail"></p>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                            <textarea class="form-control" rows="4" id="msg">Type Here...</textarea>
                      </div >
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-primary"  id="form_ation" onclick="updateSow(this)" type="button"><i class=" fa fa-rocket"></i> Send</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

          <!--modal start-->
                  <!-- Modal -->
              <div class="modal fade" id="reasonCull" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Reason for culling | <small>ID: </small><small id="Sow_IDisplay"></small></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                        <div class="modal-body">
                        <div class="row">
                        <div class="col-lg-6">
                            <input type="hidden" id="Sow_ID" name="">
                            <label><input type="checkbox" value="Not Pregnant"  class="cullReason" id="0" onchange="get()"> Not Pregnant</label></label>
                        </div>
                        <div class="col-lg-6">
                            <label><input type="checkbox" value="Failure to concieve at services"  class="cullReason" id="1" onchange="get()"> Failure to concieve at services</label></label>
                        </div>
                        <div class="col-lg-6">
                            <label><input type="checkbox" value="Do not come on heat"  class="cullReason" id="2" onchange="get()"> Do not come on heat</label></label>
                        </div>
                            <div class="col-lg-6">
                            <label><input type="checkbox" value="Abortions" class="cullReason" id="3" onchange="get()"> Abortions</label></label>
                        </div>
                        <div class="col-lg-6">
                            <label><input type="checkbox" value="Lameness"  class="cullReason" id="4" onchange="get()"> Lameness</label></label>
                        </div>
                        <div class="col-lg-6">
                            <label><input type="checkbox" value="Poor perfomarmance" class="cullReason" id="5" onchange="get()"> Poor perfomarmance</label></label>
                        </div>
                        <div class="col-lg-6">
                            <label><input type="checkbox" value="Disease"  class="cullReason" id="6" onchange="get()"> Disease</label></label>
                        </div>
                        <div class="col-lg-6">
                            <label><input type="checkbox" value="Lack of milk" class="cullReason" id="7" onchange="get()"> Lack of milk</label></label>
                        </div>
                              
                        </div>
                            <label>You can type anything here as your reason</label>
                            <textarea class="form-control" rows="9"  name="Remark_e" id="Remark_e" placeholder=""></textarea>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" onclick="saveCull()" class="btn btn-danger"> Cull swine</button>
                        </div>
                      </div>
                  </div>
              </div>
          </section>
          <!--modal start-->


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

  <!--save cull-->
  <script type="text/javascript">
      function get(){
        var rCull = "";
        var checks = document.getElementsByClassName("cullReason");
        for (i = 0;i<8; i++){
            if(checks[i].checked == true)
            {
                rCull += checks[i].value + ", \n";
            } 
        }
        document.getElementById("Remark_e").innerHTML = rCull;
    }
    function saveCull(){
        var rCullValue = document.getElementById("Remark_e").value;
        var ID = document.getElementById("Sow_ID").value;

        if(rCullValue == '')
        {
            toastr.warning("Culling a swine must have a reason","Choose a reason");
            var valCull = document.getElementById("Remark_e");
            valCull.style.border = "1px solid red";
        }
        else
        {
           Swal.fire({
            title: "Are you sure?",
            text: "Swine will be transfer to product page.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, its fine."
            }).then((result) => {
                if(result.value){
                    var rCullValue = document.getElementById("Remark_e").value;
                    var ID = document.getElementById("Sow_ID").value;
                    $.ajax({
                        url: 'saveCull.php',
                        method: 'post',
                        data:{'rCullValue':rCullValue,'ID':ID},
                        success:function(data)
                        {
                            //alert(data);
                            if (data == "success")
                            {
                                toastr.success("Swine has been culled","Successfully");
                                load_data();
                                document.getElementById("Remark_e").value = "";
                            }
                            else
                            {
                                toastr.error("Error culling the swine","Failed");
                            }
                        }
                    })
                }
            }) 
        }

        
    }
  </script>

  <!--fetch employee -->
  <script type="text/javascript">
      function load_data()
      {
         $.ajax({
          url: "fetchSowSwine.php",
          method: "POST",
          success:function(data){
            $("#user_data").html(data);
            //alert(data);
          }
        })
      } 
  </script>
  <!--permission to cull swine-->
  <script type="text/javascript">
    function cullSow(button){
        var id = button.id;
        //alert(id);
        //$("#reasonCull").modal("show");
        $.ajax({
            url: 'getStatus.php',
            method: 'post',
            data:{'id':id},
            dataType: 'json',
            success:function(data){
                //alert(data);
                if (data.status == "On going")
                {
                    Swal.fire({
                        title: "Breeding Process",
                        text: "Are you sure to cull the swine?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, add to cull"
                    }).then((result) => {
                        if(result.value){
                            $("#Sow_IDisplay").html(data.Sow_ID);
                            $("#Sow_ID").val(data.Sow_ID);
                            $("#reasonCull").modal("show");
                        }
                    })
                }
                else if (data.status == "Pregnant")
                {
                    Swal.fire({
                        title: "This swine is pregnant",
                        text: "Are you sure to cull the swine?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, add to cull"
                    }).then((result) => {
                        if(result.value){
                            $("#Sow_ID").html(data.Sow_ID);
                            $("#reasonCull").modal("show"); 
                        }
                    })
                }
                else
                {
                    $("#Sow_IDisplay").html(data.Sow_ID);
                    $("#reasonCull").modal("show");
                    $("#Sow_ID").val(data.Sow_ID);
                }
            }
        })
    }
</script>

  <!--view employee information-->
  <script type="text/javascript">
      function viewEmp(button){
        var emp = button.id;
        $.ajax({
            url: 'getEmpInfo.php',
            method: 'post',
            data:{'emp':emp},
            success:function(data){
                $("#employeeDetails").html(data);
                $("#emp_name").html("Employee id: "+emp);
                $("#viewEmpInfo").modal("show");
            }
        })
        //alert(emp);
        //
      }
  </script>

  <!--update employee status-->
  <script type="text/javascript">
    function active(button){
        var empId = button.id;
        var action = "activate";
        //alert(empId);
        $.ajax({
            url:'UdpateStatus.php',
            method: 'post',
            data:{'empId':empId,'action':action},
            success:function(data)
            {
                if(data == 'success')
                {
                    toastr.success("The user is now active","Activated");
                    load_data();
                }
                else
                {
                    toastr.error("Failed to activate user","Failed");
                }
            }
        })
    }
    function Deactive(button){
        var empId = button.id;
        var action = "deactivate";
        //alert(empId);
        $.ajax({
            url:'UdpateStatus.php',
            method: 'post',
            data:{'empId':empId,'action':action},
            success:function(data)
            {
                if(data == 'success')
                {
                    toastr.success("The user is now Deactivate","Dectivated");
                    load_data();
                }
                else
                {
                    toastr.error("Failed to Deactivate user","Failed");
                }
            }
        })
    }
</script>

  <!--Send email-->
  <script type="text/javascript">
      function sendMail(button){
        var id = button.id;
        document.getElementById('gmail').innerHTML= id;
        //$("#gmail").innerHTML = "dawd";
        $("#Mail").modal("show");
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
