<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("PHPMailer/Exception.php");
include("PHPMailer/PHPMailer.php");
include("PHPMailer/SMTP.php");
include("db.php"); // Kết nối CSDL để kiểm tra email tồn tại

header('Content-Type: application/json');

$action = $_POST['action'] ?? '';

// 1. GỬI OTP
if ($action == 'send_otp') {
    $email = $_POST['email'];
    $type = $_POST['type']; // 'register' hoặc 'forgot'

    // Kiểm tra email trong CSDL
    $sql = "SELECT * FROM nguoidung WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($type == 'register' && $result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email đã tồn tại!']);
        exit;
    }
    if ($type == 'forgot' && $result->num_rows == 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email không tồn tại trong hệ thống!']);
        exit;
    }

    // Tạo mã OTP ngẫu nhiên 6 số
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_email'] = $email;

    // Cấu hình gửi mail
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dangvochungkhanh@gmail.com'; // Email của bạn
        $mail->Password   = 'xnod tezj xzhp laww';        // Mật khẩu ứng dụng của bạn
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
        echo json_encode(['status' => 'success', 'message' => 'Xác thực thành công!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Mã OTP không đúng!']);
    }
    exit;
}
