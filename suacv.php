<?php
$macv=$_GET['macv'];
$sql="select * from chucvu where macv ='$macv'";
$query=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if(isset($_POST["suacv"])){
    $ten_cv = $_POST['tencv'];
    if(isset($ten_cv)){
        $sql="update chucvu set tencv ='$ten_cv' where macv = '$macv'";
        $query=mysqli_query($conn,$sql);
        header('location:quantri.php?page_layout=danhsachcv');
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Chức vụ</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-5 col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Sửa chức vụ
            </div>
            <form class="panel-body" method="post">
                <div class="form-group">
                    <label>Tên chức vụ:</label>
                    <input type="text" name="tencv" class="form-control" value="<?php echo $row['tencv']; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="suacv" class="btn btn-primary" value="Sửa">
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.row-->