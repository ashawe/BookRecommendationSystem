<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sell Books</title>
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

<style type="text/css">
select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
</style>
</head>
<body class="animsition">

	<?php include "main/header_fixed.php"; ?>
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
					<form class="leave-comment" id="sell_form" method="POST" name="sell_form" role="form" enctype="multipart/form-data">
						<h4 class="m-text26 p-b-36 p-t-15">
							Sell Book
						</h4>

						<h3 id="result"></h3>

						<div class="bo4 of-hidden size15 m-b-20">
							<input  id="name" name="name" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Enter Book Name" required="">

						</div>

						<select id="book_cat" name="book_cat">
							<option value="default">Select Book Category</option>
							<option value="au">fantasy</option>
							<option value="ca">fiction</option>
							<option value="usa">non-fiction</option>
							<option value="au">humor</option>
							<option value="ca">mystery</option>
							<option value="usa">sci-fi</option>
							<option value="au">romance</option>
							<option value="ca">historical fiction</option>
							<option value="usa">mythology</option>
							<option value="au">horror</option>
							<option value="ca">crime and thriller</option>
							<option value="usa">Education</option>
						</select><br>

						<br/>
						<div class="bo4 of-hidden size15 m-b-20">
							<input  id="author" name="author" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="author_name" placeholder="Enter author name" required="">
						</div>

						<select id="book_lang" name="book-lang">
							<option value="default">Select Book Language</option>
							<option value="au">English</option>
							<option value="ca">Hindi</option>
						</select><br>
						<br>
						<div class="bo4 of-hidden size15 m-b-20">
							<input id="year" name="year" height=" " class="sizefull s-text7 p-l-22 p-r-22" type="number" name="year" placeholder="Enter Publist Year" required="">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input id="price" name="price" height=" " class="sizefull s-text7 p-l-22 p-r-22" type="number" name="price" placeholder="Enter Price" required="">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input id="stock" name="stock" height=" " class="sizefull s-text7 p-l-22 p-r-22" type="number" name="stock" placeholder="Enter stock" required="">
						</div>

						<textarea name="description" id="description"  class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" placeholder="Book Description" style="resize: none" required=""></textarea>
					 
						<br>
						<div class="w-size25">
							<!-- Button -->
							<button id="submit" name="submit" type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Sell
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
