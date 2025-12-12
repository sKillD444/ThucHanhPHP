<title>Xem tài khoản</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php
session_start();
include("header.php");
include("db.php");

if (!isset($_SESSION['user'])) {
    header("Location: dangnhap.php");
    exit;
}

$uid = $_SESSION['uid'];
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['capnhat'])) {
    $ten = $_POST['tennd'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];

    $avatar_sql = "";
    if (!empty($_FILES['hinh']['name'])) {
        $hinh = time() . "_" . basename($_FILES['hinh']['name']);
        $target = "images/avatar/" . $hinh;
        if (!file_exists('images/avatar')) {
            mkdir('images/avatar', 0777, true);
        }
        if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target)) {
            $avatar_sql = ", hinh = '$hinh'";
        }
    }

    $sql = "UPDATE nguoidung SET tennd = '$ten', sdt = '$sdt', diachi = '$diachi' $avatar_sql WHERE ma_nd = '$uid'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['user'] = $ten;
        $msg = "<div class='alert alert-success'>Cập nhật hồ sơ thành công!</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
    }
}

$user = $conn->query("SELECT * FROM nguoidung WHERE ma_nd = '$uid'")->fetch_assoc();
?>

<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <div class="border-bottom mb-4 pb-2">
                    <h4 class="fw-bold">Hồ Sơ Của Tôi</h4>
                    <p class="text-muted small">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                </div>

                <?= $msg ?>

                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8 pe-md-5" style="border-right: 1px solid #eee;">

                            <div class="mb-3 row align-items-center">
                                <label class="col-sm-3 col-form-label text-end text-muted">Họ Tên</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tennd" class="form-control" value="<?= $user['tennd'] ?>" required>
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center">
                                <label class="col-sm-3 col-form-label text-end text-muted">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control-plaintext" value="<?= $user['email'] ?>" readonly>
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center">
                                <label class="col-sm-3 col-form-label text-end text-muted">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sdt" class="form-control" value="<?= $user['sdt'] ?>">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center">
                                <label class="col-sm-3 col-form-label text-end text-muted">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text" name="diachi" class="form-control" value="<?= $user['diachi'] ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" name="capnhat" class="btn btn-primary px-4">Cập nhật</button>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 text-center d-flex flex-column align-items-center justify-content-center">
                            <?php
                            $avatar = !empty($user['hinh']) ? "images/avatar/" . $user['hinh'] : "https://placehold.co/150x150?text=Avatar";
                            ?>
                            <div class="mb-3">
                                <img src="<?= $avatar ?>" class="rounded-circle border" width="150" height="150" style="object-fit: cover;">
                            </div>

                            <label class="btn btn-outline-secondary btn-sm">
                                Chọn Ảnh
                                <input type="file" name="hinh" hidden accept="image/*">
                            </label>

                            <div class="text-muted mt-3 small">
                                Dung lượng file tối đa 1MB<br>Định dạng: .JPEG, .PNG
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

<?php
include("footer.php")
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>