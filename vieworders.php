<!DOCTYPE html>
<html lang="en">
<head>
	<title>View Oreders</title>
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
	<!-- Header Fixed--><div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="index.php" class="logo">
			<img src="images/mylogo.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="index.php">Home</a>
					</li>

					<li>
						<a href="buy_books.php">Books</a>
					</li>

					<li>
						<a href="dashboard.php">Recommended Books</a>
					</li>

					<li>
						<a href="editprofile.php">Edit Profile</a>
					</li>

					<li>
						<a href="vieworders.php">View Orders</a>
					</li>

					<li>
						<a href="sale.php">Sale Books</a>
					</li>
				</ul>

			</nav>

		</div>
		<div class="pos-relative bo11 of-hidden" style="position: relative;margin-left: 40px; !important">
			<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Book">

			<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
				<i class="fs-13 fa fa-search" aria-hidden="true"></i>
			</button>
		</div>

		<!-- Header Icon -->
		<?php
				if(isset($_COOKIE["userid"]))
				{
					include "config.php";
					$userid=$_COOKIE["userid"];
					$sql="SELECT user_email from users where user_id='$userid'";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($result);
					$user_email=$row["user_email"];

				?>
		<div class="header-icons">
			<a href="editprofile.php" class="header-wrapicon1 dis-block">
				<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>

			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti">0</span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="images/item-cart-01.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									White Shirt With Pleat Detail Back
								</a>

								<span class="header-cart-item-info">
									1 x $19.00
								</span>
							</div>
						</li>

						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="images/item-cart-02.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									Converse All Star Hi Black Canvas
								</a>

								<span class="header-cart-item-info">
									1 x $39.00
								</span>
							</div>
						</li>

						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="images/item-cart-03.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									Nixon Porter Leather Watch In Tan
								</a>

								<span class="header-cart-item-info">
									1 x $17.00
								</span>
							</div>
						</li>
					</ul>

					<div class="header-cart-total">
						Total: $75.00
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>
	</div>

	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="index.php" class="logo">
		<img src="images/mylogo.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="index.php">Home</a>
					</li>

					<li>
						<a href="buy_books.html">Books</a>
					</li>

					<li>
						<a href="dashboard.php">Recommended Books</a>
					</li>

					<li>
						<a href="editprofile.php">Edit Profile</a>
					</li>

					<li>
						<a href="vieworders.php">View Orders</a>
					</li>

					<li>
						<a href="sale.php">Sale Books</a>
					</li>
				</ul>

			</nav>

		</div>
		<div class="pos-relative bo11 of-hidden" style="position: relative;margin-left: 40px; !important">
			<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Book">

			<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
				<i class="fs-13 fa fa-search" aria-hidden="true"></i>
			</button>
		</div>

		<!-- Header Icon -->
		<?php
				if(isset($_COOKIE["userid"]))
				{
					include "config.php";
					$userid=$_COOKIE["userid"];
					$sql="SELECT user_email from users where user_id='$userid'";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($result);
					$user_email=$row["user_email"];

				?>
		<div class="header-icons">
			<a href="#" class="header-wrapicon1 dis-block">
				<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>

			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti">0</span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="images/item-cart-01.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									White Shirt With Pleat Detail Back
								</a>

								<span class="header-cart-item-info">
									1 x $19.00
								</span>
							</div>
						</li>

						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="images/item-cart-02.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									Converse All Star Hi Black Canvas
								</a>

								<span class="header-cart-item-info">
									1 x $39.00
								</span>
							</div>
						</li>

						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="images/item-cart-03.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									Nixon Porter Leather Watch In Tan
								</a>

								<span class="header-cart-item-info">
									1 x $17.00
								</span>
							</div>
						</li>
					</ul>

					<div class="header-cart-total">
						Total: $75.00
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>
	</div>

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
	<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<!-- Logo2 -->
				<a href="index.html" class="logo2">
				<img src="images/mylogo.png" alt="IMG-LOGO">
				</a>
				<?php
				if(isset($_COOKIE["userid"]))
				{
					include "config.php";
					$userid=$_COOKIE["userid"];
					$sql="SELECT user_email from users where user_id='$userid'";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($result);
					$user_email=$row["user_email"];

				?>
				<div class="topbar-child2">
					<span class="topbar-email">
						<?= $user_email; ?>
					</span>

					<!--  -->
					<a href="#" class="header-wrapicon1 dis-block m-l-30">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2 m-r-13">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
			?>


			</div>

			<div class="wrap_header">
				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
						<a href="index.php">Home</a>
					</li>

					<li>
						<a href="buy_books.html">Books</a>
					</li>

					<li>
						<a href="dashboard.php">Recommended Books</a>
					</li>

					<li>
						<a href="editprofile.php">Edit Profile</a>
					</li>

					<li>
						<a href="vieworders.php">View Orders</a>
					</li>

					<li>
						<a href="sale.php">Sale Books</a>
					</li>
						</ul>
					</nav>
				</div>
		
				<div class="pos-relative bo11 of-hidden" style="position: absolute;margin-left: 480px; !important">
					<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Book">

					<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
						<i class="fs-13 fa fa-search" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile">
		<img src="images/mylogo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<?php
				if(isset($_COOKIE["userid"]))
				{
					include "config.php";
					$userid=$_COOKIE["userid"];
					$sql="SELECT user_email from users where $user_id='$userid'";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($result);
					$user_email=$row["user_email"];

				?>
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
					<?php
					}
				?>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<br>
					<div class="pos-relative bo11 of-hidden" style="margin-left: 10px;margin-right: 10px;">
						<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Book">

						<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
							<i class="fs-13 fa fa-search" aria-hidden="true"></i>
						</button>
					</div>
					<br>

					<li class="item-menu-mobile">
						<a href="index.php">Home</a>
					</li>

					<li class="item-menu-mobile">
						<a href="buy_books.html">Books</a>
					</li>

					<li class="item-menu-mobile">
						<a href="dashboard.php">Recommended Books</a>
					</li>

					<li class="item-menu-mobile">
						<a href="editprofile.php">Edit Profile</a>
					</li>

					<li class="item-menu-mobile">
						<a href="vieworders.php">View Orders</a>
					</li>

					<li class="item-menu-mobile">
						<a href="sale.php">Sale Books</a>
					</li>
				</ul>
			</nav>
		</div>
		
	</header>


	<!-- content page -->
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Available Soon...
				</h3>
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
