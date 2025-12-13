<?php
include("../config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM nhasanxuat WHERE ma_nsx=:id");
    $stmt->execute([':id' => $id]);
}
header("Location: qlnsx.php");
