<title>Quên mật khẩu</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
include("header.php")
?>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 480px;">
            <h3 class="text-center mb-4 fw-bold text-success">Đổi mật khẩu</h3>

            <label class="form-label">Email</label>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Nhập email">
                <button class="btn btn-primary">Gửi OTP</button>
            </div>

            <label class="form-label">Mã OTP</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nhập mã OTP">
                <button class="btn btn-success">Xác minh</button>
            </div>

            <div class="mb-3">
                <label class="form-label">Mật khẩu mới</label>
                <input class="form-control" type="password">
            </div>

            <div class="mb-4">
                <label class="form-label">Nhập lại mật khẩu</label>
                <input class="form-control" type="password">
            </div>

            <button class="btn btn-success w-100 py-2">Lưu</button>

            <a href="dangnh" class="mt-3 d-block text-center">Quay lại</a>
        </div>
    </div>
</body>


<?php
include("footer.php")
?>