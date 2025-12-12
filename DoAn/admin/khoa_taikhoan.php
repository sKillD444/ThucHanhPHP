<?php
include("db.php");

if (isset($_GET['id']) && isset($_GET['tt'])) {
    $id = $_GET['id'];
    $trangthai_moi = $_GET['tt']; // 0 là khóa, 1 là mở

    $sql = "UPDATE nguoidung SET trangthai = '$trangthai_moi' WHERE ma_nd = '$id'";
    $conn->query($sql);
}

// Quay lại trang danh sách
header("Location: qltaikhoan.php");
exit();
