<?php
session_start();

    $id_nv=$_GET['id_nv'];
    include_once './ketnoi.php';
    $sql = "delete from thoiviec where id_tv='$id_tv'";
    $query = mysqli_query($conn,$sql);
    header('location:quantri.php?page_layout=danhsachnvtv');

?>