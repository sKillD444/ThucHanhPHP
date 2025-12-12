<?php
include("db.php");
if (isset($_GET['id'])) $conn->query("DELETE FROM nhasanxuat WHERE ma_nsx='{$_GET['id']}'");
header("Location: qlnsx.php");
