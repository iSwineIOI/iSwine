
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab-4/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 10:51:46 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico">

    <title>iSwine | Monitoring</title>
    <!--custom css-->
    <link href="css/custom.css" rel="stylesheet">    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
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

  <body  style="background-color: pink !important;" class="login-body">

    <div class="container">

      <div class="form-signin" method="post"  enctype="multipart/form-data">
        <h2 class="form-signin-heading"><img src="img/iSwine.png" style="width: 40%; margin: none; padding:none;">| <small style="font-size: 10px !important;text-decoration: underline;">Sign Up</small></h2>
        <div class="login-wrap">
            <p>Enter your personal details below</p>
             <div class="form-group">
	            <div class="custom-file text-center">
	            	<img src="img/profilePicture/placeholder.jpg" id="profileDisplay" onclick="triggerDisplay()" />
	                <input type="file" name="picture" onchange="displayImages(this)" id="picture" style="display:none ;" required ><p>Select Profile</p>
	                <p style="color:red !important; font-size: 12px !important;" class="pik" id="pik"></p>
	            </div><br>
	        </div>
            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" required>
            <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>

            <div class="radios">
                <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
                    <input style="cursor: pointer !important;" name="gender" id="gender1" value="male" type="radio"required/> Male
                </label>
                <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
                    <input style="cursor: pointer !important;" name="gender" id="gender2" value="female" type="radio" required /> Female
                </label>
            </div>

            <p>Enter your contact details below</p>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
            <input type="text" name="number" id="number" class="form-control" placeholder="Contact Number" required>
            
            <p> Enter your account details below</p>
           <select  name="employee_type" id="employee_type" class="custom-select mb-3" required>
              <option selected>Choose your employee type</option>
              <option value="helper">Helper</option>
              <option value="veterinarian">Veterinarian</option>
              <option value="owner">Owner</option>
            </select>
            <input type="text" name="username" id="username" class="form-control" placeholder="User Name" required>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Re-type Password" required>

            <label class="checkbox">
                <input style="cursor: pointer !important;"  type="checkbox" onchange="chexs(this)" id="condition" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
            </label>
            <button class="btn btn-lg btn-login btn-block" name="save" onclick="pass(this)" id="tick" disabled>Submit</button>
            <div class="registration">
                Already Registered.
                <a class="" href="index.php">
                    Login
                </a>
            </div>

        </div>

      </div>

    </div>

	      <!-- Modal -->
	  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="owner" class="modal fade">
	      <div class="modal-dialog">
	          <div class="modal-content">
	              <div class="modal-header">
	                  <h4 class="modal-title">Owner Verification</h4>
	                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                      <span aria-hidden="true">&times;</span>
	                  </button>
	              </div>
	              <div class="modal-body">
	                  <p>Please enter the onwer password.</p>
	                  <input type="password" name="email" placeholder="Enter Password" autocomplete="off" class="form-control placeholder-no-fix">

	              </div>
	              <div class="modal-footer">
	                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
	                  <button class="btn btn-success" type="button">Submit</button>
	              </div>
	          </div>
	      </div>
	  </div>
	  <!-- modal -->
        <script>
        function pass(){
            var fullname = $("#fullname").val();
            var address = $("#address").val();
            var gender = $('#gender').val();
            var picture = $("#picture").val();
            var email = $("#email").val();
            var number = $("#number").val();
            var employee_type = $("#employee_type").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var repassword = $("#repassword").val();

            var gender1 = document.getElementById('gender1');
            var gender2 = document.getElementById('gender2');
            var gender;
            if (gender1.checked == true){
                gender = "Male";
            }else if (gender2.checked == true){
                gender = "female";
            }

            if (fullname == '' ||
                address == '' ||
                gender == '' ||
                email == '' ||
                number == '' ||
                employee_type == '' ||
                username == '' ||
                password == '' ||
                repassword == '' ){
                toastr.warning("Please fill up all the field","Missing information");
                
            }else if (picture == ''){
                toastr.warning("Please select your profile picture","Required");
                var pik = document.getElementById('profileDisplay');
                pik.style.border = "1px solid red";
            }else{
                var property = document.getElementById('picture').files[0];
                var image_name = property.name;
                //alert(image_name);
                var delay = 2300;
                $.ajax({
                    url: "addEmployee.php",
                    type: "post",
                    data:{'fullname':fullname, 'address':address, 'gender':gender, 'picture':image_name, 'email':email, 'number':number, 'employee_type':employee_type, 'username':username, 'password':password},
                    success: function(data){
                        alert(data);
                        if(data == )
                        {
                            alert("okay");
                        }
                        else
                        {
                            alert("not");
                        }
                    }
                })
            }
        }
    </script>

    <script type="text/javascript">
        function triggerDisplay(){
            document.querySelector('#picture').click();
        }
        function displayImages(e){ 
            if (e.files[0]){
                    var property = document.getElementById('picture').files[0];
                    var image_name = property.name;
                    var image_size = property.size;
                    var image_extension = image_name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(image_extension,['gif','png','jpg','jpeg']) == -1)
                    {
                        toastr.error("Invalid File Name","Invalid");
                    }
                     else if (image_size == 2000000)
                    {
                        toastr.warning("File too large","Insuficient Memory");
                    }
                    else
                    {
                        //alert(property.name);

                        var reader = new FileReader();

                        reader.onload = function(e){
                        document.querySelector('#profileDisplay').setAttribute('src',e.target.result);

                        var form_data = new FormData();
                        form_data.append("picture", property);
                        $.ajax({
                            url: 'upload.php',
                            method: 'post',
                            data:form_data,
                            contentType:false,
                            processData:false,
                            cache:false,
                            success:function(data){
                                //toastr.success("Image uplaoded","Successful");
                            }
                        })

                    }
                        reader.readAsDataURL(e.files[0]);
                    }
                }
            }
    </script>
 

    
    <script type="text/javascript">
        var chex = document.getElementById('condition');
        var submitbutt = document.getElementById('tick');

        function chexs(){
            if (chex.checked == true){
                submitbutt.disabled = false;
            }else{
                submitbutt.disabled = true;
            }
        }
    </script>

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

</body>

</html>
