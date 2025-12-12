<title>Đăng nhập</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
include("header.php")
?>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 450px;">
            <h3 class="text-center mb-4 fw-bold text-primary">Đăng nhập</h3>

            <form>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Nhập email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Nhập mật khẩu">
                </div>

                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>

                <div class="d-flex justify-content-between mt-3">
                    <small>Bạn chưa có tài khoản? <a href="dangky.php" class="text-primary">Đăng ký ngay</a></small>
                    <small><a href="quenmatkhau.php" class="text-primary">Quên mật khẩu</a></small>
                </div>
            </form>
        </div>
    </div>

</body>


<?php
include("footer.php")
?>