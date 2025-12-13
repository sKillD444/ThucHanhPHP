<title>Quên mật khẩu</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
session_start();
include("header.php");
include("config.php");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['matkhau'];
    $repass = $_POST['nhaplaimatkhau'];

    if ($pass != $repass) {
        $error = "Mật khẩu nhập lại không khớp!";
    } elseif (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true || $_SESSION['otp_email'] !== $email) {
        $error = "Vui lòng xác thực mã OTP trước!";
    } else {
        try {
            $sql = "UPDATE nguoidung SET matkhau = :pass WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                unset($_SESSION['otp']);
                unset($_SESSION['otp_email']);
                unset($_SESSION['otp_verified']);
                echo "<script>alert('Đổi mật khẩu thành công! Vui lòng đăng nhập lại.'); window.location.href='dangnhap.php';</script>";
            } else {
                $error = "Lỗi cập nhật mật khẩu.";
            }
        } catch (PDOException $e) {
            $error = "Lỗi hệ thống: " . $e->getMessage();
        }
    }
}
?>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow p-4" style="width: 500px;">
            <h3 class="text-center mb-4 fw-bold text-danger">Lấy lại mật khẩu</h3>

            <?php if ($error) echo "<div class='alert alert-danger'>$error</div>"; ?>

            <form method="POST">
                <label class="form-label">Email đăng ký</label>
                <div class="input-group mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email của bạn" required>
                    <button type="button" id="btnSendOTP" class="btn btn-danger">Gửi OTP</button>
                </div>

                <label class="form-label">Mã OTP</label>
                <div class="input-group mb-3">
                    <input type="text" id="otpCode" class="form-control" placeholder="Nhập mã 6 số">
                    <button type="button" id="btnVerifyOTP" class="btn btn-secondary">Xác minh</button>
                </div>
                <div id="otpMessage" class="mb-3"></div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu mới</label>
                    <input type="password" name="matkhau" class="form-control" disabled id="newPass" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" name="nhaplaimatkhau" class="form-control" disabled id="reNewPass" required>
                </div>

                <button type="submit" name="reset_pass" id="btnSubmit" class="btn btn-success w-100 py-2" disabled>Lưu mật khẩu mới</button>

                <div class="text-center mt-3">
                    <a href="dangnhap.php" class="text-decoration-none">Quay lại đăng nhập</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#btnSendOTP").click(function() {
                var email = $("#email").val();
                if (email == "") {
                    alert("Vui lòng nhập email!");
                    return;
                }
                var btn = $(this);
                btn.text("Đang gửi...").prop('disabled', true);
                $.post("send_mail.php", {
                    action: "send_otp",
                    email: email,
                    type: "forgot"
                }, function(data) {
                    alert(data.message);
                    if (data.status == 'success') btn.text("Gửi lại").prop('disabled', false);
                    else btn.text("Gửi OTP").prop('disabled', false);
                }, "json").fail(function() {
                    alert("Lỗi kết nối server!");
                    btn.text("Gửi OTP").prop('disabled', false);
                });
            });
            $("#btnVerifyOTP").click(function() {
                var otp = $("#otpCode").val();
                if (otp == "") {
                    alert("Nhập mã OTP!");
                    return;
                }
                $.post("send_mail.php", {
                    action: "verify_otp",
                    otp_code: otp
                }, function(data) {
                    if (data.status == "success") {
                        $("#otpMessage").html('<small class="text-success fw-bold">✔ ' + data.message + '</small>');
                        $("#newPass, #reNewPass").prop('disabled', false);
                        $("#btnSubmit").prop('disabled', false);
                        $("#btnVerifyOTP").prop('disabled', true).text("Đã xác minh");
                        $("#email").prop('readonly', true);
                        $("#btnSendOTP").prop('disabled', true);
                    } else {
                        $("#otpMessage").html('<small class="text-danger fw-bold">✘ ' + data.message + '</small>');
                    }
                }, "json");
            });
        });
    </script>
</body>
<?php include("footer.php") ?>