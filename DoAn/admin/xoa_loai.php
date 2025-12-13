<?php
include("../config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // [PDO] Xóa
    $stmt = $conn->prepare("DELETE FROM loaisanpham WHERE ma_loai = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
header("Location: qlloai.php");
