<?php  
$connect = mysqli_connect('localhost','root','','vietprok88');
if($connect){
    mysqli_query($connect,"SET NAMES 'utf8' ");
}else{
    echo 'kết nối thất bại';
}

?>