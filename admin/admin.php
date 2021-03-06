<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản trị - Store</title>
	<!-- css -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet">
	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>
	<link rel="stylesheet" href="Awesome/css/all.css">
</head>
<body>
	<!-- header -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>vietpro </span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu"><li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Thông tin</a></li>
						<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<!-- header -->
	<!-- sidebar left-->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
		</form>
               		<ul class="nav menu">
			<li class="<?php if(!isset($_GET['layout'])){echo 'active';} ?>"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tổng quan</a></li>
			<li class="<?php if(($_GET['layout'])=='category'){ echo 'active';} ?>" ><a href="index.php?layout=category"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
			<li class="<?php if(($_GET['layout'])=='product'){ echo 'active';} ?>" ><a href="index.php?layout=product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm</a></li>
			<li class="<?php if(($_GET['layout']) == 'processed'){ echo ' active';} ?>" ><a href="index.php?layout=processed"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad" /></svg> Đơn hàng</a></li>
			<li role="presentation" class="divider"></li>
			<li class="<?php if(($_GET['layout'])=='user'){ echo 'active';} ?>" ><a href="index.php?layout=user"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Quản lý thành viên</a></li>
		
		</ul>

	</div>
	<!--/. end sidebar left-->

	<!--main-->
	<?php
	if(isset($_GET['layout'])){
		switch ($_GET['layout']) {
			case 'user': include_once('listuser.php');break;
			case 'edit_user': include_once('edituser.php');break;
			case 'add_user': include_once('adduser.php');break;
			case 'category': include_once('listcate.php');break;
			case 'edit_cat': include_once('editcategory.php');break;
			case 'add_cat': include_once('addcategory.php');break;
			case 'product': include_once('listproduct.php');break;
			case 'edit_product': include_once('editproduct.php');break;
			case 'add_product': include_once('addproduct.php');break;
			case 'order': include_once('order.php');break;
			case 'detailorder': include_once('detailorder.php');break;
			case 'processed': include_once('processed.php');break;
			
			default: include_once('dashboard.php');break;
		}
	}else{
		include_once('dashboard.php');
	}
	?>
	<!--end main-->

	<!-- javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>

</body>

</html>