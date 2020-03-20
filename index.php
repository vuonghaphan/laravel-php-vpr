<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>VIEPRO STORE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custome.css">



</head>

<body>
	<!--header -->
		<?php
		include_once('modules/layouts/header.php');
		include_once('modules/layouts/banner.php');
		?>
	<!-- End header -->

		<!-- main -->
		<?php 
		if(isset($_GET['layout'])){
			switch ($_GET['layout']) {
				case 'about': include_once('modules/about/about.php'); break;
				case 'cart': include_once('modules/cart/cart.php'); break;
				case 'checkout': include_once('modules/checkout/checkout.php'); break;
				case 'complete': include_once('modules/complete/complete.php'); break;
				case 'contact': include_once('modules/contact/contact.php'); break;
				case 'detail': include_once('modules/detail/detail.php'); break;
				case 'shop': include_once('modules/shop/shop.php'); break;
			}
		}else{
			include_once('modules/form/form.php');
			include_once('modules/sale/sale.php');
			include_once('modules/product/feature.php');
			include_once('modules/product/latest.php');
		}
		?>
		<!-- end main -->

		<!-- subscribe -->
		<?php include_once('modules/subscribe/subscribe.php'); ?>
		<!--end  subscribe -->
		<!-- footer -->
		<?php include_once('modules/footer/footer.php'); ?>
		<!--end  footer -->



	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

</body>

</html>