<?php
include('./ketnoi.php');
$tencv = $_POST['tencv'];
$macv = $_POST['macv'];
if(isset($_POST['themchucvu'])){
    $sql_them = "INSERT INTO chucvu(tencv,macv) VALUE('".$tencv."','".$macv."')";
    mysqli_query($conn,$sql_them);
    header('Location:../login.php?action=quanlychucvu&query=them');

}elseif(isset($_POST['suadanhmuc'])){
    $sql_update = "UPDATE chucvu SET tencv='".$tencv."',macv='".$macv."' WHERE macv='$_GET[macv]'";
    mysqli_query($conn,$sql_update);
    header('Location:../login.php?action=quanlychucvu&query=them');
}else{
    $id=$_GET['macv'];
    $sql_xoa = "DELETE FROM chucvu WHERE macv='".$id."'";
    mysqli_query($conn,$sql_xoa);
    header('Location:../login.php?action=quanlychucvu&query=them');
}

?>