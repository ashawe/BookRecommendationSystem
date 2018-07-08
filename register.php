<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<header class="header1">
		<!-- Header desktop -->
		<?php include "main/header_desktop.php"; ?>

		<!-- Header Mobile -->
		<?php include "main/header_mobile.php"; ?>
	</header>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 p-b-30">
					<form class="leave-comment">

						<h4 class="m-text26 p-b-36 p-t-15">
							Register
						</h4>

						<h3 id="ans" class="m-text26 p-b-36 p-t-15">
						</h3>

						<div class="bo4 of-hidden size15 m-b-20">
							<input id="user_name" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name" required="">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input id="user_email" class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email Address" required="">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input id="user_pswd" class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Password" required="">
						</div>

						<!-- <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea> -->

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" onclick="return submitdata();">
								Register
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<script>
		function submitdata()
		{
			console.log("in func");
			var user_name = document.getElementById('user_name').value;
			var user_email = document.getElementById('user_email').value;
			var user_pswd = document.getElementById('user_pswd').value;

			if(user_name!=""&&user_email!=""&&user_pswd!="")
			{
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					console.log("in func2");
				    if (this.readyState == 4 && this.status == 200) {
				     	document.getElementById('ans').innerHTML = this.responseText;
				     console.log("in if");
				    }
				  };
				  xhttp.open("POST", "registermember.php", true);
				  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				  xhttp.send("name="+user_name+"&email="+user_email+"&password="+user_pswd);
			}			
			  return false;
		}
	</script>


	<!-- Footer -->
	<?php include "main/footer.php" ?>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
