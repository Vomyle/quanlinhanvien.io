<?php
session_start();

    $id_pb=$_GET['id_pb'];
    include_once './ketnoi.php';
    $sql = "delete from phongban where id_pb='$id_pb'";
    $query = mysqli_query($conn,$sql);
    header('location:quantri.php?page_layout=danhsachbp');

?>