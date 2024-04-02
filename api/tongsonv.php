<?php

// chuan bi cau lenh
$sql="SELECT COUNT(*) as manv FROM nhanvien;";

//thuc thu cau lenh
$result = mysqli_query($conn, $sql);

//phan tich du lieu
$data = mysqli_fetch_array($result, MYSQLI_ASSOC);

//var_dump($data);

//chuyen thanh chuan json tra ve
//arrar --> json
$json = json_encode($data);
echo $data['manv']

?>