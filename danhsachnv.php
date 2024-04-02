<script>
function xoaNhanVien(id_nv) {
    var conf = confirm("Bạn có chắc chắn muốn xóa nhân viên này hay không?");
    if (conf) {
        $.ajax({
            type: "POST",
            url: "xoanv.php",
            data: {
                id_nv: id_nv
            },
            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
    return conf;
}
</script>

<?php
// Thanh phân trang
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else $page=1;
$rowsPerPage=5;
$perRow=$page*$rowsPerPage - $rowsPerPage;

$totalRows= mysqli_num_rows(mysqli_query($conn, "select * from nhanvien"));
$totalPages=ceil($totalRows/$rowsPerPage);
$listPage ="";
for($i=1; $i <= $totalPages;$i++){
       if($page==$i){
           $listPage.='<li class ="active"><a href="quantri.php?page_layout=danhsachnv&page='.$i.'">'.$i.'</a></li>';

       }
       else $listPage .='<li><a href="quantri.php?page_layout=danhsachnv&page='.$i.'">'.$i.'</a></li>';
}


$sql="SELECT *
FROM nhanvien nv
JOIN phongban pb ON nv.id_pb = pb.id_pb
JOIN chucvu cv ON nv.macv = cv.macv
JOIN bophan bp ON nv.mabp = bp.mabp
JOIN trinhdo td ON nv.matd=td.matd order by id_nv limit $perRow,$rowsPerPage " ;
$query = mysqli_query($conn,$sql);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách nhân viên</h1>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <a href="quantri.php?page_layout=themnv" class="btn btn-primary">Thêm nhân viên</a>
        <div class="bootstrap-table">
            <div class="table-responsive">

                <table class="table table-bordered" style="margin-top:20px;">
                    <thead>
                        <tr class="bg-info">
                            <th>ID</th>
                            <th width="30%">Tên nhân viên</th>
                            <th>Email nhân viên</th>
                            <th>CCCD</th>
                            <th>Giới tính</th>
                            <th>địa chỉ</th>
                            <th>ngày sinh</th>
                            <th>Phòng ban</th>
                            <th>Bộ phận</th>
                            <th>Chức vụ</th>
                            <th>Trình độ</th>
                            <th> Nhân viên thôi việc </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						while($row = mysqli_fetch_array($query)){
						?>
                        <tr>
                            <td><?php echo $row['id_nv']; ?></td>
                            <td><?php echo $row['ten_nv'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['cccd']?></td>
                            <td><?php echo $row['gioitinh']?></td>
                            <td><?php echo $row['diachi']?></td>
                            <td><?php echo $row['ngaysinh']?></td>
                            <td><?php echo $row['tenpb'];?></td>
                            <td><?php echo $row['tenbp'];?></td>
                            <td><?php echo $row['tencv'];?></td>
                            <td><?php echo $row['tentd'];?></td>
                            <td><?php echo $row['nvthoiviec']?></td>
                            <td>
                                <a href="quantri.php?page_layout=suanv&id_nv=<?php echo $row['id_nv']; ?>"
                                    class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Sửa</a>
                                <a onclick="return xoaNhanVien(<?php echo $row['id_nv']; ?>);"
                                    href="xoanv.php?id_nv=<?php echo $row['id_nv']; ?>" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-trash"></span>Xóa</a>
                            </td>
                        </tr>
                        <?php }
						?>
                    </tbody>
                </table>
                <ul class="pagination" style="float: right">
                    <li><a href="#">
                    </li>
                    <?php echo $listPage; ?>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--/.row-->