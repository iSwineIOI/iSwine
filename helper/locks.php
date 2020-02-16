<?php
include 'config.php';
$emp_id = $_GET['emp_id'];

$s = "SELECT * FROM employee_table WHERE emp_id = '$emp_id'";
$result = mysqli_query($mysqli,$s);
$row = mysqli_fetch_array($result);
$image = $row['picture'];
$F_name = $row['full_name'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab-4/lock_screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 10:51:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico">

    <title>Lock Screen</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!--toastr-->
    <link href="assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />


</head>

<body class="lock-screen" onload="startTime()">

    <div class="lock-wrapper">

        <div id="time"></div>


        <div class="lock-box text-center">
            <img width="100" style="margin-left: -16px!important;margin-top: -12px!important;" src="img/profilePicture/<?php echo $image;?>" alt="lock avatar"/>
            <h1><?php echo $row['full_name'];?></h1>
            <span class="locked">Locked</span>
            <form role="form" method="post" class="form-inline" action="locksOpen.php">
                <div class="form-group col-lg-12">
                    <input type="hidden" name="emp_id" value="<?php echo $row['emp_id']?>">
                    <input type="password" placeholder="Password" name="password" id="exampleInputPassword2" class="form-control lock-input">
                    <button class="btn btn-lock" type="submit" name="submit">
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function startTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('time').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){startTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>
    <!--toastr-->
    <script src="assets/toastr-master/toastr.js"></script>
</body>
</html>
