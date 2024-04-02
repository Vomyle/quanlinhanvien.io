<?php
// Kiểm tra nếu form được gửi đi
if(isset($_POST['thoiviec'])){
    // Lấy dữ liệu từ biến POST
    $id_tv = $_POST['id_tv'];
    $id_nv = $_POST['id_nv'];
    $HoTen = $_POST['HoTen'];
    $ngaynghi = $_POST['ngaynghi'];
    $ghichu = $_POST['ghichu'];

    // Thực hiện kết nối đến CSDL
    require_once 'ketnoi.php';

    // Kiểm tra kết nối
    if (!$conn) {
        die("Lỗi kết nối: " . mysqli_connect_error());
    }

    // Kiểm tra xem id_nv đã tồn tại chưa
    $kiemtrasql = "SELECT * FROM thoiviec WHERE id_nv = '$id_nv'";
    $result = mysqli_query($conn, $kiemtrasql);
    if(mysqli_num_rows($result) > 0) {
        // Nếu id_nv đã tồn tại, có thể cập nhật thông tin của bản ghi đã có
        // Hoặc bạn có thể thông báo lỗi cho người dùng và yêu cầu họ nhập lại id_nv khác
        echo "<h1>Lỗi: id_nv đã tồn tại</h1>";
    } else {
        // Thực hiện truy vấn SQL để thêm nhân viên vào danh sách thôi việc
        $themsql = "INSERT INTO thoiviec(id_tv, id_nv, HoTen, ngaynghi, ghichu) VALUES ('$id_tv', '$id_nv', '$HoTen', '$ngaynghi', '$ghichu')";

        // Thực thi truy vấn và kiểm tra kết quả
        if(mysqli_query($conn, $themsql)){
            echo "<h1>Thêm thành công</h1>";
        } else {
            echo "<h1>Lỗi khi thêm dữ liệu: " . mysqli_error($conn) . "</h1>";
        }
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý nhân viên</title>
</head>
<body>
    <h2>Thêm nhân viên thôi việc</h2>
    <form method="post">
        id nhân viên:<input type="text" name="id_tv"><br><br>
        Mã nhân viên: <input type="text" name="id_nv"><br><br>
        Tên nhân viên: <input type="text" name="HoTen"><br><br>
        Ngày thôi việc: <input type="date" name="ngaynghi"><br><br>
        Ghi chú: <input type="text" name="ghichu"><br><br>
        <input type="submit" name="thoiviec" value="Thêm">
    </form>
</body>
</html>
