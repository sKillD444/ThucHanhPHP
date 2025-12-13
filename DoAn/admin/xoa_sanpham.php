<?php
include("../config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM sanpham WHERE ma_sp=:id");
    $stmt->execute([':id' => $id]);
}
header("Location: qlsanpham.php");
