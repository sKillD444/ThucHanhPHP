    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <?php
    include("config.php");

    $id = $_GET['id'];
    $row = $conn->query("SELECT * FROM nguoidung WHERE ma_nd = '$id'")->fetch_assoc();
    $error = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_email = $_POST['email'];

        // Kiểm tra xem email mới có trùng với tài khoản KHÁC không
        $check = $conn->query("SELECT * FROM nguoidung WHERE email = '$new_email' AND ma_nd != '$id'");

        if ($check->num_rows > 0) {
            $error = "Email này đã được sử dụng bởi người khác!";
        } else {
            $sql = "UPDATE nguoidung SET email = '$new_email' WHERE ma_nd = '$id'";
            if ($conn->query($sql) === TRUE) {
                header("Location: qltaikhoan.php");
                exit();
            } else {
                $error = "Lỗi: " . $conn->error;
            }
        }
    }
    ?>

    <body class="bg-light container mt-5">
        <div class="card shadow" style="max-width: 600px; margin: 0 auto;">
            <div class="card-header bg-dark text-white">
                <h4>Đổi Email Khách Hàng</h4>
            </div>
            <div class="card-body">
                <?php if ($error) echo "<div class='alert alert-danger'>$error</div>"; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên khách hàng:</label>
                        <input type="text" class="form-control" value="<?= $row['tennd'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email hiện tại:</label>
                        <input type="text" class="form-control" value="<?= $row['email'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-primary">Email mới:</label>
                        <input type="email" name="email" class="form-control" required placeholder="Nhập email mới...">
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="qltaikhoan.php" class="btn btn-outline-secondary me-2">Hủy bỏ</a>
                        <button type="submit" class="btn btn-outline-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </body>