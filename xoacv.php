<?php
session_start();

    $macv=$_GET['macv'];
    include_once './ketnoi.php';
    $sql = "delete from chucvu where macv='$macv'";
    $query = mysqli_query($conn,$sql);
    header('location:quantri.php?page_layout=danhsachcv');

?>