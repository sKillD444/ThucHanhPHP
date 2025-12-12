<title>Thanh toán</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
include("header.php")
?>

<body class="bg-light">

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold text-success">THANH TOÁN</h2>
            <a href="#" class="btn btn-outline-primary btn-sm">Quay lại</a>
        </div>

        <hr>

        <!-- Thông tin tài khoản -->
        <h5 class="fw-bold">Thông tin tài khoản</h5>
        <div class="ps-3 mb-4">
            <p class="fw-bold">Lê Minh Hoàng</p>
            <p>Email: customer1@zyuuki.vn</p>
            <p>SDT: 0988252751</p>
            <p>Địa chỉ: 56 Cách Mạng Tháng 8, Phường Xuân Hòa, TP HCM</p>
        </div>

        <hr>

        <!-- Sản phẩm -->
        <h5 class="fw-bold">Sản phẩm</h5>
        <table class="table">
            <tbody>
                <tr>
                    <td>Piano Điện PX-S1000</td>
                    <td>18,000,000 đ</td>
                    <td>1</td>
                    <td class="text-danger fw-bold">18,000,000 đ</td>
                </tr>
            </tbody>
        </table>

        <p class="text-end fs-5">
            Tổng thanh toán (1 sản phẩm): <span class="fw-bold text-danger">18,000,000 đ</span>
        </p>

        <hr>

        <h5 class="fw-bold">Phương thức thanh toán</h5>

        <h6 class="fw-bold mt-3">
            <i class="bi bi-person-vcard"></i> Thông tin người nhận
        </h6>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tên người nhận</label>
                <input type="text" class="form-control" value="Lê Minh Hoàng">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">SDT</label>
                <input type="text" class="form-control" value="0988252751">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Tỉnh / Thành phố</label>
                <select class="form-select">
                    <option>Thành phố Hồ Chí Minh</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Phường / Xã</label>
                <select class="form-select">
                    <option>Phường Xuân Hòa</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Địa chỉ</label>
                <input class="form-control" value="56 Cách Mạng Tháng 8">
            </div>
        </div>

        <button class="btn btn-success px-4 py-2">Thanh toán khi nhận hàng</button>

    </div>

</body>


<?php
include("footer.php")
?>