<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="animsition">

	<!-- Header -->
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
				
				<div class="col-md-6 p-b-30" style="width:100%;margin: auto;">
					<form class="leave-comment" id="contact_form" method="POST" action="mail.php" name="contact_form" role="form" enctype="multipart/form-data">
						<h4 class="m-text26 p-b-36 p-t-15">
							Send us your message
						</h4>

						<h3 id="result"></h3>

						<div class="bo4 of-hidden size15 m-b-20">
							<input  id="name" name="name" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name" required="">

						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input  id="phone" name="phone" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Phone Number" required="">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input id="email" name="email"height=" " class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address" required="">
							
						</div>

						<textarea name="message" id="message"  class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message" required=""></textarea>
					 

						<br>
						<div class="w-size25">
							<!-- Button -->
							<button id="submit" name="submit" type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Send
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<?php include "main/footer.php"; ?>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

<script>
    $('#contact_form').submit(function(event) {
      event.preventDefault();
    
      $.ajax({
        type: "POST",
        url: "mail.php",
        data: $(this).serialize(),    
        success: function(data){
          $('#result').html(data);

          // Clear the form
          $('#name').val('');
          $('#email').val('');
          $('#phone').val('');
          $('#message').val('');
        }         
      });
   
    });
  </script>
<!--===============================================================================================-->
	<!-- <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
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
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
