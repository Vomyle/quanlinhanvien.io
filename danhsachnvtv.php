<?php
// Thanh phân trang
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else $page=1;
$rowsPerPage=5;
$perRow=$page*$rowsPerPage - $rowsPerPage;

$totalRows= mysqli_num_rows(mysqli_query($conn, "select * from thoiviec"));
$totalPages=ceil($totalRows/$rowsPerPage);
$listPage ="";
for($i=1; $i <= $totalPages;$i++){
       if($page==$i){
           $listPage.='<li class ="active"><a href="quantri.php?page_layout=danhsachnvtv&page='.$i.'">'.$i.'</a></li>';

       }
       else $listPage .='<li><a href="quantri.php?page_layout=danhsachnvtv&page='.$i.'">'.$i.'</a></li>';
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách nhân viên thôi việc</h1>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <a href="quantri.php?page_layout=themnvtv" class="btn btn-primary">Thêm nhân viên thôi việc</a>
        <div class="bootstrap-table">
            <div class="table-responsive">

                <table class="table table-bordered" style="margin-top:20px;">
                    <thead>
                        <tr class="bg-info">
                            <th>ID</th>
                            <th width="30%">Tên nhân viên</th>
                            <th>Ngày nghỉ</th>
                            <th>Ghi chú</th>
                        
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM thoiviec LIMIT $perRow, $rowsPerPage");
						while($row = mysqli_fetch_array($query)){
						?>
                        <tr>
                            <td><?php echo $row['id_tv']; ?></td>
                            <td><?php echo $row['HoTen'];?></td>
                            <td><?php echo $row['ngaynghi'];?></td>
                            <td><?php echo $row['ghichu']?></td>
                            
                            <td>
                                <a onclick="return xoaNhanVienthoiviec(<?php echo $row['id_tv']; ?>);"
                                    href="xoanvtv.php?id_tv=<?php echo $row['id_tv']; ?>" class="btn btn-danger"><span
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