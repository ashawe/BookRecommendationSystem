<?php
include "config.php";
if($_SERVER["REQUEST_METHOD"]=="GET")
{
	if(isset($_GET['id']))
	{$book_id=$_GET["id"];}

	$sql="SELECT book_name,author_name,publish_year,book_language,image_url,book_description,rating_id,cat_id from books where book_id='$book_id'";

	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	$cat_id=$row["cat_id"];
	$rat_id=$row["rating_id"];
	$book_name=$row["book_name"];
	$author_name=$row["author_name"];
	$publish_year=$row["publish_year"];
	$book_language=$row["book_language"];
	$image_url=$row["image_url"];
	$book_description=$row["book_description"];

	$sql1="SELECT cat_id,cat_name from category where cat_id='$cat_id'";
	$sql2="SELECT avg_rating from ratings where rating_id='$rat_id'";

	$res1=mysqli_query($conn,$sql1);
	$res2=mysqli_query($conn,$sql2);

	$row1=mysqli_fetch_assoc($res1);
	$row2=mysqli_fetch_assoc($res2);

	$cat_name=$row1["cat_name"];
	$avg_rat=$row2["avg_rating"];


	$price = "SELECT price,stock FROM books_on_sale WHERE book_id='$book_id'";
	$result = mysqli_query($conn,$price);
	$pricearr = array();
	while($row = mysqli_fetch_assoc($result))
	{
		array_push($pricearr,$row);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
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
<style type="text/css">
	div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
</style>
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<?php include "main/header_desktop.php"; ?>

		<!-- Header Mobile -->
		<?php include "main/header_mobile.php"; ?>
	</header>
	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="slick3">
						<div class="item-slick3" data-thumb="images/thumb-item-01.jpg">
							<div class="wrap-pic-w">
								<img src="<?= $image_url; ?>" alt="IMG-PRODUCT" style="height: 500px; width: 300px !important; margin-left: 80px;">
							</div>
						</div>
					</div>
				</div>
			</div>	

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?= $book_name; ?>
				</h4>

				<span class="m-text17">
					<?php 
						if(!empty($pricearr))
						{
							echo "<h4 class='product-detail-name m-text16 p-b-13'>AVAILABLE PRICES:</h4>";
							foreach ($pricearr as $key) {
								echo $key['price'] . " RS. <h6>(stock:". $key['stock'] .")</h6><br/>";
							}
						}
						else
						{
							echo "<h4 class='product-detail-name m-text16 p-b-13'>No Sellers Available at The moment</h4>";
						}
						?>
				</span>
				<br><br>
				<div class="p-b-0">
					<span class="s-text8 m-r-35">Author: <?= $author_name; ?></span>
					<span class="s-text8 m-r-35">Publish year: <?= $publish_year; ?></span>
				</div>
				<div class="p-b-0">
					<span class="s-text8 m-r-20">Category: <?= $cat_name; ?></span>
				</div>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Type
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Choose an option</option>
								<option>Old</option>
								<option>New</option>
							</select>
						</div>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">Language: <?= $book_language; ?></span>
					<span class="s-text8 m-r-35">Rating: <?= $avg_rat; ?></span>
				</div>
				<div class="p-b-45">
					Rate This Product:<br/>
					  <div class="stars">
					    <form action="" onsubmit="return false">
					      <input class="star star-5" id="star-5" type="radio" name="star"/>
					      <label class="star star-5" for="star-5"></label>
					      <input class="star star-4" id="star-4" type="radio" name="star"/>
					      <label class="star star-4" for="star-4"></label>
					      <input class="star star-3" id="star-3" type="radio" name="star"/>
					      <label class="star star-3" for="star-3"></label>
					      <input class="star star-2" id="star-2" type="radio" name="star"/>
					      <label class="star star-2" for="star-2"></label>
					      <input class="star star-1" id="star-1" type="radio" name="star"/>
					      <label class="star star-1" for="star-1"></label>
					      <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Rate
							</button>
					    </form>
					  </div>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?= $book_description; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php

						$query = "SELECT b.cat_id,b.book_id,b.book_name,b.image_url,r.number_of_users,bos.price, r.avg_rating FROM books AS b JOIN ratings AS r ON b.rating_id=r.rating_id JOIN books_on_sale AS bos ON bos.book_id=b.book_id WHERE b.cat_id=".$cat_id;
						//echo $query;
						$resultt = mysqli_query($conn,$query);
						if(mysqli_num_rows($resultt)>0)
						{
							while($roow=mysqli_fetch_assoc($resultt))
							{
						?>
							<div class="item-slick2 p-l-15 p-r-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="<?php echo $roow['image_url'];?>" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="book_detail.php?id=<?php echo $roow['book_id'];?>" class="block2-name dis-block s-text3 p-b-5">
											<?php echo $roow['book_name'];?>
										</a>

										<span class="block2-price m-text6 p-r-5">
											<?php echo $roow['price'];?> &nbsp;RS.
										</span>
									</div>
								</div>
							</div>
						<?php
							}
						}
					?>

				</div>
			</div>

		</div>
	</section>


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
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
