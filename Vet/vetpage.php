<?php
include 'config.php';
include 'sessionVet.php';
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

  <body onload="load_data()" class="is-sidebar-nav-open">

  <section id="container">
      <!--header start-->
      <header class="header white-bg">
              
            <!--logo start-->
            <a href="home.php" class="logo"><img src="img/logo.ico" width="30" style="padding:0;margin-top: -4%;"><span class="i"> i</span><span class="w">S</span><span class="s">wine</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
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
              <div class="modal-dialog modal-lg modal-dialog-centered">
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


      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2018 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
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
                    $("#healthmodal").modal("toggle");

                        var date = new Date();
                        const months = ['Jas','feb','Mar','Apr','May','Jun','Jul','Sep','Oct','Nov','Dec'];
                        const days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

                        const monthIndex = date.getMonth()-1;
                        const monthname = months[monthIndex];
                        const dayIndex = date.getDate();
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
          url: "fetchPresVet.php",
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
