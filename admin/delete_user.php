<?php
session_start();
include_once('../config/connect.php');
if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = '$id'";
    mysqli_query($connect,$sql);
    header('location: index.php?layout=user');
}else{
    header('location: index.php');
}

?>