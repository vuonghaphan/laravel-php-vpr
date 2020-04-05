<?php
$sql = "SELECT * FROM categories";
$query = mysqli_query($connect,$sql);


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
		<!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-7">
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg> Đã thêm danh mục thành công! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
								<h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
								<div class="vertical-menu">
								<div class="item-menu active">Danh mục </div>
								<?php while ($row = mysqli_fetch_assoc($query)) { ?>
									<div class="item-menu"><span><?php echo $row['name']; ?></span>
									<div class="category-fix">
										<a class="btn-category btn-primary" href="index.php?layout=edit_cat&id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a>
										<a class="btn-category btn-danger" onclick="return delCate('<?php echo $row['name']; ?>')" href="delete_cat.php?id=<?php echo $row['id']; ?>"><i class="fas fa-times"></i></i></a>
									</div>
								</div>
								<?php } ?>
								</div>
								<a href="index.php?layout=add_cat" class="btn btn-primary">Thêm danh mục</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.col-->


		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
<script>
	function delCate(name){
		return confirm('Bạn có muốn xóa '+name+' không?');
	}
</script>
