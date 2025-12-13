<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ma = $_POST['ma_nsx'];
    $ten = $_POST['tennsx'];
    $dc = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];

    $sql = "INSERT INTO nhasanxuat (ma_nsx, tennsx, diachi, sdt, email) VALUES ('$ma', '$ten', '$dc', '$sdt', '$email')";
    if ($conn->query($sql) === TRUE) {
        header("Location: qlnsx.php");
        exit();
    } else {
        $error = "Lỗi: " . $conn->error;
    }
}
?>

<body class="bg-light container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4>Thêm Nhà Sản Xuất</h4>
        </div>
        <div class="card-body">
            <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <form method="POST">
                <div class="mb-3"><label>Mã NSX</label><input type="text" name="ma_nsx" class="form-control" required></div>
                <div class="mb-3"><label>Tên NSX</label><input type="text" name="tennsx" class="form-control" required></div>
                <div class="mb-3"><label>Địa chỉ</label><input type="text" name="diachi" class="form-control"></div>
                <div class="row mb-3">
                    <div class="col"><label>SĐT</label><input type="text" name="sdt" class="form-control"></div>
                    <div class="col"><label>Email</label><input type="email" name="email" class="form-control"></div>
                </div>
                <button class="btn btn-outline-success">Thêm mới</button> <a href="qlnsx.php" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
    </div>
</body>