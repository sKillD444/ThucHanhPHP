<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("PHPMailer/Exception.php");
include("PHPMailer/PHPMailer.php");
include("PHPMailer/SMTP.php");
include("config.php");

header('Content-Type: application/json');

$action = $_POST['action'] ?? '';

// 1. GỬI OTP
if ($action == 'send_otp') {
    $email = $_POST['email'];
    $type = $_POST['type']; // 'register' hoặc 'forgot'

    // [PDO] Kiểm tra email
    $stmt = $conn->query("SELECT * FROM nguoidung WHERE email = '$email'");
    $count = $stmt->rowCount();

    if ($type == 'register' && $count > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email đã tồn tại!']);
        exit;
    }
    if ($type == 'forgot' && $count == 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email không tồn tại trong hệ thống!']);
        exit;
    }

    // Tạo mã OTP ngẫu nhiên 6 số
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_email'] = $email;

    // Cấu hình gửi mail (Phần này không liên quan CSDL nên giữ nguyên)
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dangvochungkhanh@gmail.com';
        $mail->Password   = 'xnod tezj xzhp laww';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom('dangvochungkhanh@gmail.com', 'Zyuuki Music Store');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Mã xác thực OTP - Zyuuki Music Store';
        $mail->Body    = "Mã OTP của bạn là: <b style='font-size:20px;color:red'>$otp</b>. Mã này có hiệu lực trong phiên làm việc hiện tại.";

        $mail->send();
        echo json_encode(['status' => 'success', 'message' => 'Đã gửi mã OTP vào email của bạn!']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Không thể gửi mail. Lỗi: ' . $mail->ErrorInfo]);
    }
    exit;
}

// 2. KIỂM TRA OTP
if ($action == 'verify_otp') {
    $otp_user = $_POST['otp_code'];

    if (isset($_SESSION['otp']) && $_SESSION['otp'] == $otp_user) {
        // [QUAN TRỌNG] Đánh dấu là đã xác thực để ngăn chặn việc đổi mật khẩu không qua OTP
        $_SESSION['otp_verified'] = true;
        echo json_encode(['status' => 'success', 'message' => 'Xác thực thành công!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Mã OTP không đúng!']);
    }
    exit;
}
