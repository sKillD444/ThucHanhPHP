<title>Đăng ký</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
session_start();
include("header.php");
include("db.php");
// Xử lý khi nhấn nút Đăng ký (Sau khi đã xong OTP)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $tennd = $_POST['tennd'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $pass = $_POST['matkhau'];
    $repass = $_POST['nhaplaimatkhau'];

    // Kiểm tra khớp mật khẩu
    if ($pass != $repass) {
        $error = "Mật khẩu nhập lại không khớp!";
    } else {
        // Kiểm tra email OTP có khớp với email đăng ký không
        if (!isset($_SESSION['otp_email']) || $_SESSION['otp_email'] != $email) {
            $error = "Vui lòng xác thực email trước!";
        } else {
            $sql = "INSERT INTO nguoidung (tennd, email, sdt, matkhau, trangthai) VALUES ('$tennd', '$email', '$sdt', '$pass', 1)";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Đăng ký thành công!'); window.location.href='dangnhap.php';</script>";
            } else {
                $error = "Lỗi: " . $conn->error;
            }
        }
    }
}
?>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 500px;">
            <h3 class="text-center mb-4 fw-bold text-success">Đăng ký tài khoản</h3>

            <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

            <form method="POST">
                <label class="form-label">Email</label>
                <div class="input-group mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email" required>
                    <button type="button" id="btnSendOTP" class="btn btn-primary">Gửi OTP</button>
                </div>

                <label class="form-label">Mã OTP</label>
                <div class="input-group mb-3">
                    <input type="text" id="otpCode" class="form-control" placeholder="Nhập mã OTP">
                    <button type="button" id="btnVerifyOTP" class="btn btn-secondary">Xác minh</button>
                </div>
                <div id="otpMessage" class="mb-2"></div>

                <div class="mb-3">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" name="tennd" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="sdt" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="matkhau" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" name="nhaplaimatkhau" class="form-control" required>
                </div>

                <button type="submit" name="register" id="btnSubmit" class="btn btn-success w-100" disabled>Đăng ký</button>

                <div class="text-center mt-3">
                    <small>Đã có tài khoản? <a href="dangnhap.php" class="text-primary">Đăng nhập ngay</a></small>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Gửi OTP
            $("#btnSendOTP").click(function() {
                var email = $("#email").val();
                if (email == "") {
                    alert("Vui lòng nhập email!");
                    return;
                }

                $(this).text("Đang gửi...").prop('disabled', true);

                $.post("send_mail.php", {
                    action: "send_otp",
                    email: email,
                    type: "register"
                }, function(data) {
                    alert(data.message);
                    $("#btnSendOTP").text("Gửi lại").prop('disabled', false);
                }, "json");
            });

            // Xác minh OTP
            $("#btnVerifyOTP").click(function() {
                var otp = $("#otpCode").val();
                if (otp == "") {
                    alert("Vui lòng nhập mã OTP!");
                    return;
                }

                $.post("send_mail.php", {
                    action: "verify_otp",
                    otp_code: otp
                }, function(data) {
                    if (data.status == "success") {
                        $("#otpMessage").html('<small class="text-success fw-bold">✔ ' + data.message + '</small>');
                        $("#btnSubmit").prop('disabled', false); // Mở khóa nút đăng ký
                        $("#btnVerifyOTP").prop('disabled', true).text("Đã xác minh");
                        $("#email").prop('readonly', true); // Khóa không cho đổi email
                    } else {
                        $("#otpMessage").html('<small class="text-danger fw-bold">✘ ' + data.message + '</small>');
                    }
                }, "json");
            });
        });
    </script>
</body>
<?php
include("footer.php")
?>