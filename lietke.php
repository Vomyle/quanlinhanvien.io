<?php
$sql_lietke_danhmucsp = "SELECT * FROM chucvu ORDER BY thutu DESC";
$query_lietke_danhmucsp = mysqli_query($conn, $sql_lietke_danhmucsp);
?>


<table style="width:100%" style="border-collapse: collapse; 
">
    <tr>

        <th>Mã Chức Vụ</th>
        <th>Tên Chức Vụ</th>

    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
        $i++;
    ?>
    <tr>

        <td><?php echo $row['macv'] ?></td>
        <td><?php echo $row['tencv'] ?></td>

        <td>
            <a class="btn btn-danger" href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['macv']; ?>)">
                <i class="fa-solid fa-trash-can"></i>
            </a>

            <a class="btn btn-primary" href="?action=quanlychucvu&query=sua&iddanhmuc=<?php echo $row['macv'] ?>">
                <i class="fa-solid fa-edit"></i>
            </a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
function confirmDelete(macv) {
    var r = confirm("Bạn có chắc chắn muốn xóa?");
    if (r == true) {
        window.location.href = "./xuly.php?macv=" + macv;
    }
}
</script>