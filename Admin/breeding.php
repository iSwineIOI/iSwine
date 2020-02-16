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
                      <a href="breeding.php" class="active" >
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
                  SOW TABLE
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

          <!-- Modal for employee info -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="viewEmpInfo" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <Label class="modal-title" id="emp_name"></Label>
                          
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                      <div id="employeeDetails">
                      </div>       
                      </div >
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

  <!--fetch employee -->
  <script type="text/javascript">
      function load_data()
      {
         $.ajax({
          url: "fetchBreedHistory.php",
          method: "POST",
          success:function(data){
            $("#user_data").html(data);
            //alert(data);
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
