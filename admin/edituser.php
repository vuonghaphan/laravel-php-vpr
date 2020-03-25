<?php
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$query = mysqli_query($connect,$sql);
if (isset($_POST['sbm'])) {
    $mail = $_POST['email'];
    $pass = $_POST['password'];
    $res_pass = $_POST['res_password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "SELECT * FROM users WHERE email = '$mail' AND id != '$id'";
    $query = mysqli_query($connect,$sql);
    $num_rows = mysqli_num_rows($query);

    if ($num_rows == 1) {
        $error = '<div class="alert alert-danger">Email đã tồn tại !</div>';
    }else if($pass != $res_pass){
        $error = '<div class="alert alert-danger">Mật khẩu không khớp !</div>';
    }else{
        $sql = "UPDATE users SET name ='$name', email = '$mail', password = '$pass' ,
        phone = '$phone', address = '$address' WHERE id = '$id' ";
        $query = mysqli_query($connect,$sql);
        header('location: index.php?layout=user');
    }
}


?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Sửa thành viên</div>
                    <?php if(isset($error)){ echo $error;} ?>
                    <div class="panel-body">
                    <form role="form" method="POST">
                        <?php
                        while ($row = mysqli_fetch_assoc($query)){
                        
                        ?>
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="text" name="password" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>res_password</label>
                                    <input type="text" name="res_password" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="full" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="address" name="address" class="form-control" value="<?php echo $row['address']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="phone" name="phone" class="form-control" value="<?php echo $row['phone']; ?>">
                                </div>
                              
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control" value="">
                                        <option value="1">admin</option>
                                        <option selected value="2">user</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button class="btn btn-success" name="sbm"  type="submit">Sửa thành viên</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </form>
                        <div class="clearfix"></div>
                    </div>
                </div>

        </div>
    </div>

        <!--/.row-->
</div>
