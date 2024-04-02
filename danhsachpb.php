<script>
function xoaPhongBan(id_pb) {
    var conf = confirm("Bạn có chắc chắn muốn xóa phòng ban này hay không?");
    if (conf) {
        $.ajax({
            type: "POST",
            url: "xoapb.php",
            data: {
                id_pb: id_pb
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
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else $page=1;
$rowsPerPage=5;
$perRow=$page*$rowsPerPage - $rowsPerPage;
$sql="select * from phongban order by id_pb limit $perRow,$rowsPerPage";
$query = mysqli_query($conn,$sql);

$totalRows= mysqli_num_rows(mysqli_query($conn, "select * from phongban"));
$totalPages=ceil($totalRows/$rowsPerPage);
$listPage ="";
for($i=1; $i <= $totalPages;$i++){
       if($page==$i){
           $listPage.='<li class ="active"><a href="quantri.php?page_layout=danhsachpb&page='.$i.'">'.$i.'</a></li>';

       }
       else $listPage .='<li><a href="quantri.php?page_layout=danhsachpb&page='.$i.'">'.$i.'</a></li>';
}



if(isset($_POST["themmoi"])){
    $ten_pb = $_POST['tenpb'];
    if(isset($ten_pb)){
        $sql1="insert into phongban(tenpb) values('$ten_pb')";
        $sql2="ALTER TABLE phongban DROP id_pb"; 
        $sql3="ALTER TABLE phongban AUTO_INCREMENT = 1"; 
        $sql4="ALTER TABLE phongban ADD id_pb int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST"; 
        mysqli_query($conn,$sql1);
        mysqli_query($conn,$sql2);
        mysqli_query($conn,$sql3);
        mysqli_query($conn,$sql4);
        header('location:quantri.php?page_layout=danhsachpb');
    }
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Danh sách phòng ban</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-5 col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Thêm phòng ban
            </div>
            <form class="panel-body" method="post">
                <div class="form-group">
                    <label>Tên phòng ban:</label>
                    <input type="text" name="tenpb" class="form-control" placeholder="Tên phòng ban...">
                </div>
                <div class="form-group">
                    <input type="submit" name="themmoi" class="btn btn-primary" value="Thêm mới">
                </div>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-7 col-lg-7">
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách phòng ban</div>
            <div class="panel-body">
                <div class="bootstrap-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-info">
                                <th>ID</th>
                                <th>Tên phòng ban</th>
                                <th style="width:30%">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        while($row = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $row['id_pb']; ?></td>
                                <td><?php echo $row['tenpb']; ?></td>
                                <td>
                                    <a href="quantri.php?page_layout=suapb&id_pb=<?php echo $row['id_pb']; ?>"
                                        class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                    <a onclick="return xoaPhongBan(<?php echo $row['id_pb']; ?>);"
                                        href="xoapb.php?id_pb=<?php echo $row['id_pb']; ?>" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"></span>
                                        Xóa</a>
                                </td>
                            </tr>
                            <?php
                           }
                        ?>
                        </tbody>
                    </table>
                    <ul class="pagination" style="float: right">
                        <li><a href="#">
                                <<< </a>
                        </li>
                        <?php echo $listPage; ?>
                        <li><a href="#">>></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/.row-->