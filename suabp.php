<?php
$mabp=$_GET['mabp'];
$sql="select * from bophan where mabp ='$mabp'";
$query=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if(isset($_POST["suabp"])){
    $tenbp = $_POST['tenbp'];
    if(isset($tenbp)){
        $sql="update bophan set tenbp ='$tenbp' where mabp = '$mabp'";
        $query=mysqli_query($conn,$sql);
        header('location:quantri.php?page_layout=danhsachbp');
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Bộ phận</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-5 col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Sửa bộ phận
            </div>
            <form class="panel-body" method="post">
                <div class="form-group">
                    <label>Tên bộ phận:</label>
                    <input type="text" name="tenbp" class="form-control" value="<?php echo $row['tenbp']; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="suabp" class="btn btn-primary" value="Sửa">
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.row-->