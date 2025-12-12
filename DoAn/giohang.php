<title>Giỏ hàng</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
include("header.php")
?>

<body class="bg-light">

    <div class="container py-4">
        <h2 class="fw-bold mb-4">
            <i class="bi bi-cart3"></i> GIỎ HÀNG CỦA BẠN
        </h2>

        <div class="row">
            <div class="col-lg-8">

                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="piano.jpg" width="60"></td>
                            <td class="text-start">Piano Điện PX-S1000</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-outline-secondary btn-sm">-</button>
                                    <input type="text" value="1" class="form-control form-control-sm text-center mx-2" style="width:50px;">
                                    <button class="btn btn-outline-secondary btn-sm">+</button>
                                </div>
                            </td>
                            <td>18,000,000đ</td>
                            <td class="text-danger fw-bold">18,000,000đ</td>
                            <td><i class="bi bi-trash text-danger" role="button"></i></td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="fw-bold border-bottom pb-2">Thông tin đơn hàng</h5>

                        <p>Số sản phẩm: <span class="fw-bold">1</span></p>
                        <p class="fs-5">
                            Tổng tiền:
                            <span class="text-danger fw-bold">18,000,000đ</span>
                        </p>

                        <div class="alert alert-secondary small">
                            Nhấn <b>"Thanh toán"</b> đồng nghĩa với việc bạn đồng ý tuân theo
                            <a href="#">Điều khoản & Chính sách</a>
                        </div>

                        <button class="btn btn-outline-success w-100 py-2">Thanh toán</button>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>


<?php
include("footer.php")
?>