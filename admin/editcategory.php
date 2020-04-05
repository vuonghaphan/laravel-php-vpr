
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div>
		<!--/.row-->

		<?php
		$id = $_GET['id'];
		$sql = "SELECT * FROM categories WHERE id = '$id'";
		$query = mysqli_query($connect,$sql);
		$row = mysqli_fetch_assoc($query);
		if (isset($_POST['sbm'])) {
			$name = $_POST['name'];
			$sql = "SELECT * FROM categories WHERE name = '$name' AND id != '$id' ";
			$query = mysqli_query($connect,$sql);
			$num_rows = mysqli_num_rows($query);
			if($num_rows > 0){
				$error = 
				'<div class="alert bg-danger" role="alert">
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
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" >
						<div class="row">
							<div class="col-md-5">

								<div class="form-group">
									<label for="">Danh mục cha:</label>
									<select class="form-control" name="parent" >
										<option value="0" selected >----ROOT----</option>
										<option>Nam</option>
										<option>---|Áo khoác nam</option>
										<option>---|---|Áo khoác nam</option>
										<option selected>Nữ</option>
										<option>---|Áo khoác nữ</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Tên Danh mục</label>
									<?php if (isset($error)) {
										echo $error;
									} ?>
									<input type="text" class="form-control" name="name"  placeholder="Tên danh mục mới" value="<?php echo $row['name']; ?>">
									
								</div>
								<button type="submit" name="sbm" class="btn btn-primary">Sửa danh mục</button>
							</div>
						</div>
					</form>
						
					</div>
				</div>



			</div>
			<!--/.col-->


		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
