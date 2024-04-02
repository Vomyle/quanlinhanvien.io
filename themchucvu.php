<!-- Button trigger modal -->
<div class="text-center mt-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm Phòng Ban
    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Sách Khoa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Thêm Danh Sách Phòng Ban</p>
                <table style="border-collapse: collapse;">
                    <form method="POST" action="quanlydanhmuc/xuly.php" class="dangky">
                        <tr>
                            <td>Tên Phòng Ban</td>
                            <td><input type="text" name="tenpb"></td>
                        </tr>
                        <tr>
                            <td>Thứ tự</td>
                            <td><input type="text" name="thutu"></td>
                        </tr>
                        <tr>
                            <td>Mã phòng ban</td>
                            <td><input type="text" name="mapb"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn-add" name="themdanhmuc"
                                    value="Thêm Phòng Ban"></td>
                        </tr>
                    </form>
                </table>
            </div>

        </div>
    </div>
</div>