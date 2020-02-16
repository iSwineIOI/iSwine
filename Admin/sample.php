<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico">

    <title>iSwine | Monitoring System</title>

    <!-- Bootstrap core CSS -->

</head>


	<form>
		<button class="btn btn-primary" onclick="show()">click me</button>
	</form>


	<script type="text/javascript">
		function show(){
			$.ajax({
				url: 'insertemployee.php',
				method: 'post',
				success:function(data)
				{
					alert(data);
					if (data == 'fullname')
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
	</script>

    <!-- js placed at the end of the document so the pages load faster -->






   <!--toastr-->


    <!--common script for all pages-->
  

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>