<?php
session_start();
if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    include_once('../config/connect.php');
    $id = $_GET['id'];
    mysqli_query($connect,"DELETE FROM categories WHERE id = '$id'");
    header('location: index.php?layout=category');
}else{
    header('location: index.php');
}

?>