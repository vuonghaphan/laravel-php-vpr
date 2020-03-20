<?php  
$connect = mysqli_connect('localhost','root','','vietpro_k88');
if($connect){
    mysqli_query($connect,"SET NAMES 'utf8' ");
}else{
    echo 'kết nối thất bại';
}

?>