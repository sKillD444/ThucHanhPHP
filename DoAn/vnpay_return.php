<title>Kết quả thanh toán</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php
session_start();
include("config.php");
include("config_vnpay.php");

$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

// Tách mã đơn hàng (vì đã thêm chuỗi random lúc tạo)
$vnp_TxnRef_Full = $_GET['vnp_TxnRef'];
$parts = explode("_", $vnp_TxnRef_Full);
$order_id = $parts[0];

$amount = $_GET['vnp_Amount'] / 100;

if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        $status_msg = "Giao dịch thành công";
        $icon = "bi-check-circle-fill text-success";
        $conn->exec("UPDATE dondathang SET tt_thanhtoan = 'Đã thanh toán' WHERE ma_ddh = '$order_id'");
        unset($_SESSION['cart']);
    } else {
        $status_msg = "Giao dịch thất bại hoặc bị hủy";
        $icon = "bi-x-circle-fill text-danger";
        $conn->exec("UPDATE dondathang SET trangthai = 'Đã hủy' WHERE ma_ddh = '$order_id'");
    }
} else {
    $status_msg = "Chữ ký không hợp lệ";
    $icon = "bi-exclamation-triangle-fill text-warning";
}
?>

<body class="bg-light">
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow text-center p-5">
                    <div class="mb-3">
                        <i class="bi <?= $icon ?> display-1"></i>
                    </div>
                    <h2 class="fw-bold"><?= $status_msg ?></h2>

                    <div class="alert alert-light border mt-4 text-start">
                        <p>Mã đơn hàng: <b>#<?= $order_id ?></b></p>
                        <p>Số tiền: <b><?= number_format($amount, 0, ',', '.') ?> VNĐ</b></p>
                        <p>Nội dung: <?= $_GET['vnp_OrderInfo'] ?? '' ?></p>
                        <p>Mã phản hồi: <?= $_GET['vnp_ResponseCode'] ?></p>
                    </div>

                    <div class="mt-4">
                        <a href="index.php" class="btn btn-primary">Về trang chủ</a>
                        <a href="xemdonhang.php" class="btn btn-outline-secondary">Xem lịch sử đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>