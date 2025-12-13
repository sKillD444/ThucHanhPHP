<?php
include("config.php");
if (isset($_GET['id'])) $conn->query("DELETE FROM sanpham WHERE ma_sp='{$_GET['id']}'");
header("Location: qlsanpham.php");
