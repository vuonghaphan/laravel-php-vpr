<?php
if (isset($_POST['sbm'])) {
	$name = $_POST['name'];
	$sql = "SELECT * FROM categories WHERE name = '$name'";
	$query = mysqli_query($connect,$sql);
	$num_rows = mysqli_num_rows($query);
	if ($num_rows > 0 ) {
		$error = '
		<div class="alert bg-danger" role="alert">
			<svg class="glyph stroked cancel">
				<use xlink:href="#stroked-cancel"></use>
			</svg>Tên danh mục đã tồn tại!<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
		</div>';
	}else{
		$sql = "INSERT INTO categories (name) VALUE ('$name')";
		mysqli_query($connect,$sql);
		header('location: index.php?layout=category');
	}
}

?>
	<!--/main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh mục</li>
			</ol>
		</div>
		

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div>
		<?php if (isset($error)) {
			echo $error;
		} ?>
		<!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<form method="post">
							<div class="col-md-5">
								<div class="form-group">
									<label for="">Danh mục cha:</label>
									<select class="form-control" name="" id="">
										<option value="0" selected>----ROOT----</option>
										<option>Nam</option>
										<option>---|Áo khoác nam</option>
										<option>---|---|Áo khoác nam</option>
										<option>Nữ</option>
										<option>---|Áo khoác nữ</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Tên Danh mục</label>
									<input type="text" class="form-control" name="name" id="" placeholder="Tên danh mục mới">
								</div>
								<button type="submit" name="sbm" class="btn btn-primary">Thêm danh mục</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--/.col-->


		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
