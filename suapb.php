<?php
$id_pb=$_GET['id_pb'];
$sql="select * from phongban where id_pb ='$id_pb'";
$query=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if(isset($_POST["suapb"])){
    $ten_pb = $_POST['tenpb'];
    if(isset($ten_pb)){
        $sql="update phongban set tenpb ='$ten_pb' where id_pb = '$id_pb'";
        $query=mysqli_query($conn,$sql);
        header('location:quantri.php?page_layout=danhsachpb');
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Phòng ban</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-5 col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Sửa phòng ban
            </div>
            <form class="panel-body" method="post">
                <div class="form-group">
                    <label>Tên phòng ban:</label>
                    <input type="text" name="tenpb" class="form-control" value="<?php echo $row['tenpb']; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="suapb" class="btn btn-primary" value="Sửa">
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.row-->