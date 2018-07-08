
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
				<a href="index.php" class="logo2">
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
					<a href="editprofile.php" class="header-wrapicon1 dis-block m-l-30">
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
								<a href="buy_books.php">Books</a>
							</li>

							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>

							<li>
								<a href="sale.php">sell Books</a>
							</li>

							<?php
							if(!isset($_COOKIE["userid"]))
							{

							?>

							<li>
								<a href="login.php">Login</a>
							</li>

							<li>
								<a href="register.php">Register</a>
							</li>

							<?php
							}
							else
							{
							?>
								<li>
								<a href="logout.php">Logout</a>
								</li>
							<?php	
							}
							?>
						</ul>
					</nav>
				</div>
		
				<div class="pos-relative bo11 of-hidden" style="position: absolute;margin-left: 450px; !important">
			<form action="buy_books.php" method="GET">
			<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Book">

			<button type="submit" class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
				<i class="fs-13 fa fa-search" aria-hidden="true"></i>
			</button>
		</form>
				</div>
			</div>
		</div>