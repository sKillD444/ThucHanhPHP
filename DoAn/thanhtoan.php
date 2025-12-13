<title>Thanh toán</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
session_start();
include("header.php");
include("config.php");
include("config_vnpay.php");

if (!isset($_SESSION['user']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}

$uid = $_SESSION['uid'];
// [PDO] Lấy thông tin user
$stmt = $conn->query("SELECT * FROM nguoidung WHERE ma_nd = '$uid'");
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$total_money = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_money += $item['price'] * $item['qty'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dathang'])) {
    $ten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $phuongthuc = $_POST['payment_method'];
    $ngaydat = date('Y-m-d H:i:s');

    try {
        $sqlOrder = "INSERT INTO dondathang (ma_nd, nguoinhan, sdt, diachi, ngaydat, tongtien, trangthai, tt_thanhtoan, phuongthuc) 
                     VALUES ('$uid', '$ten', '$sdt', '$diachi', '$ngaydat', '$total_money', 'Đang xử lý', 'Chưa thanh toán', '$phuongthuc')";

        // Dùng exec cho INSERT
        $conn->exec($sqlOrder);

        // [PDO] Lấy ID đơn hàng vừa tạo
        $order_id = $conn->lastInsertId();

        // Insert chi tiết đơn hàng
        foreach ($_SESSION['cart'] as $id => $item) {
            $gia = $item['price'];
            $sl = $item['qty'];
            $thanhtien = $gia * $sl;
            $conn->exec("INSERT INTO chitietdondathang (ma_ddh, ma_sp, soluong, gia, thanhtien) 
                          VALUES ('$order_id', '$id', '$sl', '$gia', '$thanhtien')");
        }

        if ($phuongthuc == 'VNPay') {
            $vnp_TxnRef = $order_id . "_" . rand(10000, 99999);
            $vnp_OrderInfo = "Thanh toan don hang #$order_id";
            $vnp_OrderType = "billpayment";
            $vnp_Amount = $total_money * 100;
            $vnp_Locale = "vn";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            );

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            header("Location: " . $vnp_Url);
            exit();
        } else {
            // NẾU LÀ COD
            unset($_SESSION['cart']);
            echo "<script>alert('Đặt hàng thành công!'); window.location.href='index.php';</script>";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
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
                        <h5 class="fw-bold mb-3">Thông tin giao hàng</h5>
                        <div class="mb-3">
                            <label class="form-label">Họ tên</label>
                            <input type="text" name="hoten" class="form-control" value="<?= $user['tennd'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SĐT</label>
                            <input type="text" name="sdt" class="form-control" value="<?= $user['sdt'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <textarea name="diachi" class="form-control" required><?= $user['diachi'] ?></textarea>
                        </div>
                    </div>

                    <div class="card shadow-sm p-4">
                        <h5 class="fw-bold mb-3">Phương thức thanh toán</h5>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" checked>
                            <label class="form-check-label fw-bold" for="cod">Thanh toán khi nhận hàng (COD)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="vnpay" value="VNPay">
                            <label class="form-check-label fw-bold" for="vnpay">
                                Thanh toán qua VNPay <img src="https://vnpay.vn/assets/images/logo-icon/logo-primary.svg" height="20">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5>Đơn hàng của bạn</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-3">
                                <?php foreach ($_SESSION['cart'] as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><?= $item['name'] ?> (x<?= $item['qty'] ?>)</span>
                                        <span class="fw-bold"><?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?>đ</span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="d-flex justify-content-between fw-bold fs-5 border-top pt-3">
                                <span>Tổng cộng:</span>
                                <span class="text-danger"><?= number_format($total_money, 0, ',', '.') ?>đ</span>
                            </div>
                            <button type="submit" name="dathang" class="btn btn-warning w-100 py-2 mt-4 fw-bold">XÁC NHẬN ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<?php include("footer.php"); ?>