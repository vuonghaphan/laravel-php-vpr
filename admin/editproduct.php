<?php
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = '$id' ";
$row = mysqli_fetch_assoc(mysqli_query($connect,$sql));
$sql_cat = "SELECT * FROM categories ";
$query = mysqli_query($connect,$sql_cat);

if (isset($_POST['sbm'])) {
    $cate_id = $_POST['category_id'];
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $featured = $_POST['featured'];
    $quantity = $_POST['quantity'];
    $detail = $_POST['detail'];
    $description = $_POST['description'];

    if ($_FILES['img']['type'] == '') {
        $img = $row['avatar'];
    } else {
        $img = $_FILES['img']['name'];
        $tmp_name_img = $_FILES['img']['tmp_name'];
        move_uploaded_file($tmp_name_img, 'img/' . $img);
    }
    $sql = "UPDATE products SET name = '$name', sku = '$sku', quantity = '$quantity', price = '$price', 
            featured = '$featured', detail = '$detail', description = '$description', avatar = '$img', category_id = '$cate_id' WHERE id = '$id'";
    mysqli_query($connect,$sql);
    header('location: index.php?layout=product');

}

?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm</div>
                    <div class="panel-body">           
                        <form method="post" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:40px">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category_id" class="form-control">
                                            <?php while($row_cat = mysqli_fetch_assoc($query)){ ?>
                                                <option value="<?php echo $row_cat['id']; ?>" <?php if($row['category_id']==$row_cat['id']){ echo 'selected';} ?>><?php echo $row_cat['name']; ?></option>       
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input  type="text" name="sku" class="form-control" value="<?php echo $row['sku']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input  type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input  type="number" name="price" class="form-control" value="<?php echo $row['price']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Sản phẩm có nổi bật</label>
                                            <select  name="featured" class="form-control">
                                                <option <?php if($row['featured'] == 0){ echo 'selected';}?> value=0 >Không</option>
                                                <option <?php if($row['featured'] == 1){ echo 'selected';}?> value=1 >Có</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select  name="quantity" class="form-control">
                                                <option <?php if($row['quantity'] > 0 ){ echo 'selected';}?> value=1 >Còn hàng</option>
                                                <option <?php if($row['quantity'] == 0 ){ echo 'selected';}?> value=0 >Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            <input id="img" type="file" name="img"
                                                onchange="changeImg(this)">
                                            <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/<?php echo $row['avatar']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Chi tiết</label>
                                            <textarea  name="detail" style="width: 100%;height: 100px;"><?php echo $row['detail']; ?></textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor"  name="description" style="width: 100%;height: 100px;"><?php echo $row['description']; ?></textarea>
                                    </div>
                                    <button class="btn btn-success" name="sbm" type="submit">Sửa sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        </form>     
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>
  