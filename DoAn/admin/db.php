<?php
$conn = new mysqli("localhost", "root", "", "shop_nhaccu");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
