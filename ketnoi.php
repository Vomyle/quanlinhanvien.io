<?php
$conn = new mysqli("localhost","root","","qlnv"); //connect database

// Check connection
if ($conn->connect_errno) {
  echo "Kết nối MYSQLi lỗi" . $conn->connect_error;
  exit();
}
$conn->set_charset("utf8");
?>