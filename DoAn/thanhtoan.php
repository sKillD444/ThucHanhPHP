<title>Thanh toán</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
session_start();
include("header.php");
include("db.php");
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Vui lòng đăng nhập để thanh toán!'); window.location.href='dangnhap.php';</script>";
    exit();
}

if (empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}

$uid = $_SESSION['uid'];
$userRes = $conn->query("SELECT * FROM nguoidung WHERE ma_nd = '$uid'");
$user = $userRes->fetch_assoc();

$total_money = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_money += $item['price'] * $item['qty'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dathang'])) {
    $ten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $phuongthuc = $_POST['payment_method'];
    $ngaydat = date('Y-m-d');
    $sqlOrder = "INSERT INTO dondathang (ma_nd, nguoinhan, sdt, diachi, ngaydat, tongtien, trangthai, tt_thanhtoan, phuongthuc) 
                 VALUES ('$uid', '$ten', '$sdt', '$diachi', '$ngaydat', '$total_money', 'Đang xử lý', 'Chưa thanh toán', '$phuongthuc')";

    if ($conn->query($sqlOrder) === TRUE) {
        $order_id = $conn->insert_id;

        foreach ($_SESSION['cart'] as $id => $item) {
            $gia = $item['price'];
            $sl = $item['qty'];
            $thanhtien = $gia * $sl;
            $conn->query("INSERT INTO chitietdondathang (ma_ddh, ma_sp, soluong, gia, thanhtien) 
                          VALUES ('$order_id', '$id', '$sl', '$gia', '$thanhtien')");
        }

        unset($_SESSION['cart']);

        if ($phuongthuc == 'VNPay') {
            echo "<script>alert('Chức năng thanh toán VNPay đang bảo trì. Đơn hàng đã được lưu với trạng thái chờ thanh toán.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Đặt hàng thành công! Chúng tôi sẽ liên hệ sớm nhất.'); window.location.href='index.php';</script>";
        }
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<body class="bg-light">
    <div class="container py-4">
        <h2 class="fw-bold text-success mb-4 text-center">THANH TOÁN ĐƠN HÀNG</h2>

        <form method="POST">
            <div class="row">
                <div class="col-md-7">
                    <div class="card shadow-sm p-4 mb-3">
                        <h5 class="fw-bold mb-3"><i class="bi bi-person-lines-fill"></i> Thông tin giao hàng</h5>

                        <div class="mb-3">
                            <label class="form-label">Họ và tên người nhận</label>
                            <input type="text" name="hoten" class="form-control" value="<?= $user['tennd'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="sdt" class="form-control" value="<?= $user['sdt'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Địa chỉ nhận hàng</label>
                            <textarea name="diachi" class="form-control" rows="2" required><?= $user['diachi'] ?></textarea>
                        </div>
                    </div>

                    <div class="card shadow-sm p-4">
                        <h5 class="fw-bold mb-3"><i class="bi bi-credit-card"></i> Phương thức thanh toán</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" checked>
                            <label class="form-check-label fw-bold" for="cod">
                                <i class="bi bi-cash-stack text-success"></i> Thanh toán khi nhận hàng (COD)
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="vnpay" value="VNPay">
                            <label class="form-check-label fw-bold" for="vnpay">
                                <i class="bi bi-qr-code text-primary"></i> Thanh toán qua VNPay (QR Code / ATM)
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Đơn hàng của bạn</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-3">
                                <?php foreach ($_SESSION['cart'] as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <?= $item['name'] ?> <small class="text-muted">(x<?= $item['qty'] ?>)</small>
                                        </div>
                                        <span class="fw-bold"><?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?>đ</span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <div class="d-flex justify-content-between fw-bold fs-5 border-top pt-3">
                                <span>Tổng cộng:</span>
                                <span class="text-danger"><?= number_format($total_money, 0, ',', '.') ?>đ</span>
                            </div>

                            <button type="submit" name="dathang" class="btn btn-warning w-100 py-2 mt-4 fw-bold text-uppercase">
                                Xác nhận đặt hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<?php include("footer.php"); ?>