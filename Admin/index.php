<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico">

    <title>iSwine | Monitoring System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--toastr-->
    <link href="assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />


</head>

  <body style="background-color: pink !important;" class="login-body">

    <div class="container">

      <div class="form-signin" action="validation.php">
        <h2 class="form-signin-heading"><img src="img/iSwine.png" style="width: 40%; margin: none; padding:none;"> | <small style="font-size: 10px !important;text-decoration: underline;">Sign In</small></h2>
        <div class="login-wrap">
          <p>Account information<p/>
            <input type="text" id="Username" class="form-control" placeholder="Username" autofocus>
            <input type="password" id="Password" class="form-control" placeholder="Password">
            <label class="checkbox">
                <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
            </label>
            <button class="btn btn-success btn-shadow btn-lg btn-block" onclick="login()" type="submit">Sign in</button><br>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.php">
                    Create an account
                </a>
            </div><br>
            <hr>
            
        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Forgot Password ?</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </div>

    </div>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/slidebars.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

   <!--toastr-->
    <script src="assets/toastr-master/toastr.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>   

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        function login(){
            var Username = $('#Username').val();
            var Password = $('#Password').val();
            //var employee_Type = $('#employee_Type').val();
            //alert("da");
            $.ajax({
                url:"validate.php",
                method:"POST",
                data:{'Username':Username,'Password':Password},
                success:function(data)
                {
                    if (data == "Invalid")
                    {
                      toastr.error("Login Failed","User does not exist");
                    }
                    else if (data == "No Assinged")
                    {
                      toastr.warning("User has not been assigned yet","Please wait");
                    }
                    else if (data == "User is not activated")
                    {
                      toastr.warning("User is not active","Please wait for activation mail");
                    }
                    else
                    {
                      toastr.success("Login Successful","Welcome "+data);
                    }
                    
                }
            });
           

        }
    </script>


  </body>
</html>
