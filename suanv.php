<?php
$id_nv=$_GET['id_nv'];

$sqlDm="select * from phongban";
$queryDm = mysqli_query($conn,$sqlDm);
$sqlcv = "SELECT * FROM chucvu ";
$querycv = mysqli_query($conn, $sqlcv);
$sqlbp = "SELECT * FROM bophan ";
$querybp = mysqli_query($conn, $sqlbp);
$sqltd = "SELECT * FROM trinhdo ";
$querytd = mysqli_query($conn, $sqltd);

$sql="select * from nhanvien where id_nv ='$id_nv'";
$query=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

if(isset($_POST["submit"])){
    $ten_nv=$_POST["ten_nv"];
    $email=$_POST["email"];
    $cccd=$_POST["cccd"];
    $gioitinh=$_POST["gioitinh"];
    $diachi=$_POST["diachi"];
    $ngaysinh=$_POST["ngaysinh"];
    $id_pb = $_POST['id_pb'];
    $mabp= $_POST['mabp'];
    $macv= $_POST['macv'];
    $matd= $_POST['matd'];


    if(isset($ten_nv) && isset($email)&&isset($cccd) && isset($gioitinh) && isset($diachi) && isset($ngaysinh) &&
      isset($id_pb)&&isset($mabp)&&isset($macv)&&isset($matd)){
    
   $sql = "update nhanvien set ten_nv = '$ten_nv',email = '$email',cccd='$cccd',gioitinh = '$gioitinh',diachi = '$diachi',
   ngaysinh ='$ngaysinh',id_pb ='$id_pb',mabp='$mabp',macv='$macv',matd='$matd'
   where id_nv = $id_nv";
   $query = mysqli_query($conn,$sql);
    header('location: quantri.php?page_layout=danhsachnv');
   }
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Nhân viên</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">Sửa nhân viên</div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label>Tên nhân viên</label>
                                <input required type="text" name="ten_nv"
                                    value="<?php if(isset($_POST['ten_nv'])){echo $_POST['ten_nv'];} else echo $row['ten_nv']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email nhân viên</label>
                                <input required type="text" name="email"
                                    value="<?php if(isset($_POST['email'])){echo $_POST['email'];}else echo $row['email']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Căn cước công dân</label>
                                <input required type="number" name="cccd"
                                    value="<?php if(isset($_POST['cccd'])){echo $_POST['cccd'];}else echo $row['cccd']; ?>"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Giới tính</label>
                                <input required type="text" name="gioitinh"
                                    value="<?php if(isset($_POST['gioitinh'])){echo $_POST['gioitinh'];}else echo $row['gioitinh']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input required type="text" name="diachi"
                                    value="<?php if(isset($_POST['diachi'])){echo $_POST['diachi'];}else echo $row['diachi']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input required type="date" name="ngaysinh"
                                    value="<?php if(isset($_POST['ngaysinh'])){echo $_POST['ngaysinh'];}else echo $row['ngaysinh']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phòng ban</label>
                                <select required name="id_pb" class="form-control">
                                    <?php
						           while($rowDm = mysqli_fetch_array($queryDm)){
						           ?>
                                    <option <?php
                                   if($row['id_pb'] == $rowDm['id_pb']){
                                       echo 'selected="select"';
                                   }
						             ?> value="<?php echo $rowDm['id_pb']; ?>"><?php echo $rowDm['tenpb']; ?> </option>
                                    <?php
                                   }
						             ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bộ phận</label>
                                <select required name="mabp" class="form-control">
                                    <option value="unselect">Lựa chọn bộ phận</option>
                                    <?php
                                    while ($rowbp = mysqli_fetch_array($querybp)) {
                                    ?>
                                    <option value="<?php echo $rowbp['mabp']; ?>"><?php echo $rowbp['tenbp']; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select required name="macv" class="form-control">
                                    <option value="unselect">Lựa chọn chức vụ</option>
                                    <?php
                                    while ($rowcv = mysqli_fetch_array($querycv)) {
                                    ?>
                                    <option value="<?php echo $rowcv['macv']; ?>"><?php echo $rowcv['tencv']; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trình độ</label>
                                <select required name="matd" class="form-control">
                                    <option value="unselect">Lựa chọn trình độ</option>
                                    <?php
                                    while ($rowtd = mysqli_fetch_array($querytd)) {
                                    ?>
                                    <option value="<?php echo $rowtd['matd']; ?>"><?php echo $rowtd['tentd']; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
                        <a href="quantri.php?page_layout=danhsachsp" class="btn btn-danger">Hủy bỏ</a>
                    </div>
            </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<!--/.row-->