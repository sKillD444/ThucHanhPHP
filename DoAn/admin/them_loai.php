    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
    include("db.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ma = $_POST['ma_loai'];
        $ten = $_POST['tenloai'];
        $mota = $_POST['mota'];

        // Kiểm tra trùng mã
        $check = $conn->query("SELECT * FROM loaisanpham WHERE ma_loai='$ma'");
        if ($check->num_rows > 0) {
            $error = "Mã loại đã tồn tại!";
        } else {
            $sql = "INSERT INTO loaisanpham (ma_loai, tenloai, mota) VALUES ('$ma', '$ten', '$mota')";
            if ($conn->query($sql) === TRUE) {
                header("Location: qlloai.php");
                exit();
            } else {
                $error = "Lỗi: " . $conn->error;
            }
        }
    }
    ?>

    <body class="bg-light container mt-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4>Thêm Loại Mới</h4>
            </div>
            <div class="card-body">
                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <div class="mb-3"><label>Mã Loại</label><input type="text" name="ma_loai" class="form-control" required></div>
                    <div class="mb-3"><label>Tên Loại</label><input type="text" name="tenloai" class="form-control" required></div>
                    <div class="mb-3"><label>Mô Tả</label><textarea name="mota" class="form-control"></textarea></div>
                    <button class="btn btn-outline-success">Thêm mới</button> <a href="qlloai.php" class="btn btn-outline-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </body>