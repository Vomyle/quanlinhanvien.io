<?php
session_start();

    $mabp=$_GET['mabp'];
    include_once './ketnoi.php';
    $sql = "delete from bophan where mabp='$mabp'";
    $query = mysqli_query($conn,$sql);
    header('location:quantri.php?page_layout=danhsachbp');

?>