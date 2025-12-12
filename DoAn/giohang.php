<title>Giỏ hàng</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
session_start();
include("header.php");
?>

<body class="bg-light">

    <div class="container py-4" style="min-height: 600px;">
        <h2 class="fw-bold mb-4"><i class="bi bi-cart3"></i> GIỎ HÀNG CỦA BẠN</h2>

        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-bordered align-middle text-center bg-white shadow-sm">
                        <thead class="table-secondary">
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_money = 0;
                            foreach ($_SESSION['cart'] as $id => $item):
                                $subtotal = $item['price'] * $item['qty'];
                                $total_money += $subtotal;
                                // Xử lý hình ảnh (nếu rỗng thì dùng placeholder)
                                $img = !empty($item['image']) && file_exists("images/" . $item['image']) ? "images/" . $item['image'] : "https://placehold.co/50x50";
                            ?>
                                <tr>
                                    <td><img src="<?= $img ?>" width="60" style="object-fit: contain;"></td>
                                    <td class="text-start fw-bold"><?= $item['name'] ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="xuly_giohang.php?action=update&type=giam&id=<?= $id ?>" class="btn btn-outline-secondary btn-sm">-</a>
                                            <span class="mx-2 fw-bold" style="width:30px;"><?= $item['qty'] ?></span>
                                            <a href="xuly_giohang.php?action=update&type=tang&id=<?= $id ?>" class="btn btn-outline-secondary btn-sm">+</a>
                                        </div>
                                    </td>
                                    <td><?= number_format($item['price'], 0, ',', '.') ?>đ</td>
                                    <td class="text-danger fw-bold"><?= number_format($subtotal, 0, ',', '.') ?>đ</td>
                                    <td>
                                        <a href="xuly_giohang.php?action=delete&id=<?= $id ?>" class="text-danger" onclick="return confirm('Xóa sản phẩm này?')">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="text-end mb-3">
                        <a href="xuly_giohang.php?action=clear" class="btn btn-outline-danger btn-sm" onclick="return confirm('Bạn muốn xóa sạch giỏ hàng?')">Xóa tất cả</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold border-bottom pb-2">Thông tin đơn hàng</h5>
                            <p class="fs-5 d-flex justify-content-between">
                                Tổng tiền: <span class="text-danger fw-bold"><?= number_format($total_money, 0, ',', '.') ?>đ</span>
                            </p>
                            <a href="thanhtoan.php" class="btn btn-success w-100 py-2 fw-bold">TIẾN HÀNH THANH TOÁN</a>
                            <a href="index.php" class="btn btn-outline-secondary w-100 mt-2">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-cart-x fs-1 text-muted"></i>
                <p class="fs-4 mt-3">Giỏ hàng của bạn đang trống!</p>
                <a href="index.php" class="btn btn-primary">Mua sắm ngay</a>
            </div>
        <?php endif; ?>
    </div>
</body>


<?php
include("footer.php")
?>