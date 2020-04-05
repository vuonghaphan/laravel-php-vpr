<?php
if (isset($_POST['sbm'])) {
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $featured = $_POST['featured'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];


    $img = $_FILES['img']['name']; // lấy ra tên file
    $tmp_img = $_FILES['img']['tmp_name']; // lấy thư mục tạm
    $size_file = $_FILES['img']['size'];
    $imageFileType = pathinfo('img/'.$img,PATHINFO_EXTENSION);
    $maxfilesize = 1000000;
    $allowtypes = array('jpg','png');
    $sql = "SELECT * FROM products WHERE avatar = '$img'";
    $query = mysqli_query($connect,$sql);
    $num_rows = mysqli_num_rows($query);
    if ($num_rows > 0 ) {
        $img = uniqid().'.'.$imageFileType;
    }
    if ($size_file > $maxfilesize){
        $error = '<div class="alert alert-danger">Chỉ được up file dưới 300MB!</div>';
    }
    if (!in_array($imageFileType,$allowtypes)) {
        $error = '<div class="alert alert-danger">Chỉ được up file jpg và png!</div>';
    }
    if (!isset($error)) {
        $sql = "INSERT INTO products (name,sku,price,avatar,detail,description,category_id,featured,quantity)
        VALUE ('$name','$sku','$price','$img','$detail','$description','$category_id','$featured',$quantity)";
        $query = mysqli_query($connect,$sql);
    }
    if (mysqli_affected_rows($connect) > 0 ) {
        move_uploaded_file($tmp_img,'img/'.$img);
        header('location: index.php?layout=product');
    }

}
$sql = "SELECT * FROM categories";
$query = mysqli_query($connect,$sql);


?>
<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm sản phẩm</div>
                    <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom:40px">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category_id" class="form-control">
                                                <?php while($row = mysqli_fetch_assoc($query)){ ?>
                                                <option value="<?php echo $row['id'];?>" ><?php echo $row['id']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" name="sku" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input type="number" name="price" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sản phẩm có nổi bật</label>
                                            <select name="featured" class="form-control">
                                                <option value="0">Không</option>
                                                <option value="1">Có</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select name="quantity" class="form-control">
                                                <option value="1">Còn hàng</option>
                                                <option value="0">Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            <?php if (isset($error)) {
                                                echo $error;
                                            } ?>
                                            <input id="img" type="file" name="img" onchange="changeImg(this)">
                                            <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/hi.jpg">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Chi tiết</label>
                                            <textarea name="detail" style="width: 100%;height: 100px;"></textarea>
                                        </div>
                                     </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="description" style="width: 100%;height: 100px;"></textarea>
                                    </div>
                                    <button class="btn btn-success" name="sbm" type="submit">Thêm sản phẩm</button>
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
<!--end main-->
   