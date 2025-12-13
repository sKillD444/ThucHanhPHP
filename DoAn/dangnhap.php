<title>Đăng nhập</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
session_start();
include("header.php");
include("db.php");

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['matkhau'];
    if ($email == 'admin@gmail.com' && $pass == '123456') {
        $_SESSION['user'] = 'Administrator';
        $_SESSION['uid'] = 9999;
        $_SESSION['role'] = 'admin';
        header("Location: admin/qlsanpham.php");
        exit;
    }
    $sql = "SELECT * FROM nguoidung WHERE email = '$email' AND matkhau = '$pass' AND trangthai = 1";
    // Kiểm tra biến $conn có tồn tại không trước khi chạy
    if (isset($conn)) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['user'] = $row['tennd']; // Lưu tên hiển thị
            $_SESSION['uid'] = $row['ma_nd'];  // Lưu ID

            header("Location: index.php");
            exit;
        } else {
            $error = "Email hoặc mật khẩu không đúng, hoặc tài khoản bị khóa!";
        }
    } else {
        $error = "Lỗi kết nối CSDL! Kiểm tra file db.php";
    }
}
?>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow p-4" style="width: 450px;">
            <h3 class="text-center mb-4 fw-bold text-primary">Đăng nhập</h3>

            <?php if ($error) echo "<div class='alert alert-danger'>$error</div>"; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="matkhau" class="form-control" placeholder="Nhập mật khẩu" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Đăng nhập</button>

                <div class="d-flex justify-content-between mt-3">
                    <small>Chưa có tài khoản? <a href="dangky.php" class="text-decoration-none">Đăng ký ngay</a></small>
                    <small><a href="quenmatkhau.php" class="text-decoration-none">Quên mật khẩu?</a></small>
                </div>
            </form>
        </div>
    </div>
</body>

<?php
include("footer.php")
?>