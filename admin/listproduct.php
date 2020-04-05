<?php
$sql = "SELECT * FROM products order By id desc limit 5";
$query = mysqli_query($connect,$sql);
$sql_cat = "SELECT * FROM categories";
$query_cat = mysqli_query($connect,$sql_cat);
$zia = mysqli_fetch_assoc($query_cat);

?>
<script>
	function delItem(name){
		return confirm('bạn có muốn xóa '+name+' không?')
	}
</script>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg>Đã thêm thành công<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
								<a href="index.php?layout=add_product" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Tình trạng</th>
											<th>Danh mục</th>
											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>					
										<?php
										while ($row = mysqli_fetch_assoc($query)) {
										?>				
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td>
												<div class="row">
													<div class="col-md-3"><img src="img/<?php echo $row['avatar']; ?>" alt="Áo đẹp" width="100px" class="thumbnail"></div>
													<div class="col-md-9">
														<p><strong>Mã sản phẩm : <?php echo $row['sku']; ?></strong></p>
														<p>Tên sản phẩm :<?php echo $row['name']; ?></p>
													</div>
												</div>
											</td>
											<td><?php echo $row['price']; ?> VND</td>
											<td>
												<a class="btn btn-<?php if($row['quantity'] >0 ){ echo 'success';}else{ echo 'danger';} ?>" href="#" role="button"><?php if($row['quantity'] > 0){ echo 'Còn hàng';}else{echo 'Hết hàng';} ?></a>
											</td>
											<td><?php if($row['category_id'] == $zia['id']){ echo $zia['name']; } ?></td>
											<td>
												<a href="index.php?layout=edit_product&id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onclick="return delItem('<?php echo $row['name']; ?>')" href="delete_prd.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>	
										<?php } ?>
									</tbody>
								</table>
								<div align='right'>
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">Trở lại</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">tiếp theo</a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->
			</div>
		</div>
	</div>
			<!--end main-->

			<!-- javascript -->
			<script src="js/jquery-1.11.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/chart.min.js"></script>
			<script src="js/chart-data.js"></script>
			
			
			

