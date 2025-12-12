<?php
session_start();
include("db.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($action == 'add' && $id) {
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += 1;
    } else {
        $sql = "SELECT * FROM sanpham WHERE ma_sp = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $_SESSION['cart'][$id] = [
                'name' => $product['tensp'],
                'price' => $product['giasp'],
                'image' => $product['tenhinh'],
                'qty' => 1
            ];
        }
    }
    header("Location: giohang.php");
    exit();
}

if ($action == 'delete' && $id) {
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    header("Location: giohang.php");
    exit();
}

if ($action == 'update' && $id) {
    $type = $_GET['type'];
    if (isset($_SESSION['cart'][$id])) {
        if ($type == 'tang') {
            $_SESSION['cart'][$id]['qty'] += 1;
        } else {
            $_SESSION['cart'][$id]['qty'] -= 1;
            if ($_SESSION['cart'][$id]['qty'] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
    }
    header("Location: giohang.php");
    exit();
}

if ($action == 'clear') {
    unset($_SESSION['cart']);
    header("Location: giohang.php");
    exit();
}
