<?php
$sqlDm = "SELECT * FROM phongban ";
$queryDm = mysqli_query($conn, $sqlDm);
$sqlcv = "SELECT * FROM chucvu ";
$querycv = mysqli_query($conn, $sqlcv);
$sqlbp = "SELECT * FROM bophan ";
$querybp = mysqli_query($conn, $sqlbp);
$sqltd = "SELECT * FROM trinhdo ";
$querytd = mysqli_query($conn, $sqltd);

if (isset($_POST["submit"])) {
    $ten_nv = $_POST["ten_nv"];
    $email = $_POST["email"];
    $cccd = $_FILES['cccd'];
    $gioitinh = $_POST["gioitinh"];
    $diachi = $_POST["diachi"];
    $ngaysinh = $_POST["ngaysinh"];
    $id_pb = $_POST['id_pb'];
    $mabp= $_POST['mabp'];
    $macv= $_POST['macv'];
    $matd= $_POST['matd'];


    if ($_POST["id_pb"] == "unselect") {
        $error_id_pb = '<span style="color: red;">(*)</span>';
    } else {
        $id_pb = $_POST["id_pb"];
    }

    $sql = "INSERT INTO nhanvien (ten_nv, email,id_pb,mabp,macv,matd, cccd, gioitinh, diachi, ngaysinh ) 
        VALUES ('$ten_nv', '$email','$id_pb','$mabp','$macv', '$matd', '$cccd', '$gioitinh', '$diachi', '$ngaysinh') ";
    $query = mysqli_query($conn, $sql);
    header('location: quantri.php?page_layout=danhsachnv');
}

$id_nv = isset($_GET['id_nv']) ? $_GET['id_nv'] : null;

if ($id_nv) {
    $sql = "SELECT * FROM nhanvien WHERE id_nv = $id_nv";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo " :< ";
        exit();
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
            <div class="panel-heading">Thêm nhân viên</div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label>Tên nhân viên</label>
                                <input required type="text" name="ten_nv" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email nhân viên</label>
                                <input required type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Căn cước công dân</label>
                                <input required type="number" name="cccd" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select required name="gioitinh" class="form-control">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Không biết">Không biết</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input required type="text" name="diachi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input required type="date" name="ngaysinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phòng ban</label>
                                <select required name="id_pb" class="form-control">
                                    <option value="unselect">Lựa chọn phòng ban</option>
                                    <?php
                                    while ($rowDm = mysqli_fetch_array($queryDm)) {
                                    ?>
                                    <option value="<?php echo $rowDm['id_pb']; ?>"><?php echo $rowDm['tenpb']; ?>
                                    </option>
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
                            <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                            <a href="quantri.php?page_layout=danhsachnv" class="btn btn-danger">Hủy bỏ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/.row-->