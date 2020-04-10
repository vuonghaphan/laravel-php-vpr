<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}else {
	$page = 1;
}
$row_per_page = 3;
$per_row = $page*$row_per_page - $row_per_page;
$total_row = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM categories"));
$total_pages = ceil($total_row/$row_per_page);
$list_pages = '';
$page_prev = $page - 1;
if ($page_prev <= 1) {
	$page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?layout=category&page='.$page_prev.'">Trở lại</a></li>';
for ($i=1; $i <= $total_pages ; $i++) { 
	if ($i == $page) {
		$active = 'active';
	}else {
		$active = '';
	}
	$list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?layout=category&page='.$i.'">'.$i.'</a></li>';
}
$page_next = $page + 1;
if ($page_next >= $total_pages) {
	$page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?layout=category&page='.$page_next.'">tiếp theo</a></li>';




$sql = "SELECT * FROM categories ORDER BY id DESC LIMIT $per_row,$row_per_page";
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
							<a href="index.php?layout=add_cat" class="btn btn-primary">Thêm danh mục</a>
								<div class="alert" role="alert">
									<!-- <svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg> Đã thêm danh mục thành công! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a> -->
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
								<ul class="pagination">
									<?php echo $list_pages; ?>
								</ul>
								</div>
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
