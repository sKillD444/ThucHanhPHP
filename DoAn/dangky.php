<title>Đăng ký</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
include("header.php")
?>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 500px;">
            <h3 class="text-center mb-4 fw-bold text-success">Đăng ký</h3>

            <form>
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
                    <label class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" placeholder="Nhập họ tên">
                </div>

                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" placeholder="Nhập số điện thoại">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Nhập mật khẩu">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                </div>

                <button type="submit" class="btn btn-success w-100">Đăng ký</button>

                <div class="text-center mt-3">
                    <small>Đã có tài khoản? <a href="dangnhap.php" class="text-primary">Đăng nhập ngay</a></small>
                </div>
            </form>
        </div>
    </div>

</body>

<?php
include("footer.php")
?>