<?php
include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM loaisanpham WHERE ma_loai='$id'");
}
header("Location: qlloai.php");
