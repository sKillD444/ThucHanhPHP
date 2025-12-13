<?php
include("../config.php");

if (isset($_GET['id']) && isset($_GET['tt'])) {
    $id = $_GET['id'];
    $trangthai_moi = $_GET['tt'];

    // [PDO] Prepare Statement cho an toàn
    $sql = "UPDATE nguoidung SET trangthai = :tt WHERE ma_nd = :id";
    $stmt = $conn->prepare($sql);

    // Gán tham số và thực thi
    $stmt->bindParam(':tt', $trangthai_moi);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Quay lại trang danh sách
header("Location: qltaikhoan.php");
exit();
