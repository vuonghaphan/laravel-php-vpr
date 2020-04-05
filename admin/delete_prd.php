<?php
session_start();
if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    include_once('../config/connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = '$id'";
    $query = mysqli_query($connect,$sql);
    header('location: index.php?layout=product');
} else {
    header('location: index.php');
}

?>