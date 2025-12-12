    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
    include("db.php");

    $id = $_GET['id'];
    $row = $conn->query("SELECT * FROM loaisanpham WHERE ma_loai = '$id'")->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten = $_POST['tenloai'];
        $mota = $_POST['mota'];

        $sql = "UPDATE loaisanpham SET tenloai='$ten', mota='$mota' WHERE ma_loai='$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: qlloai.php");
            exit();
        } else {
            $error = "Lỗi: " . $conn->error;
        }
    }
    ?>

    <body class="bg-light container mt-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4>Cập Nhật Loại</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3"><label>Mã Loại</label><input type="text" class="form-control" value="<?= $row['ma_loai'] ?>" disabled></div>
                    <div class="mb-3"><label>Tên Loại</label><input type="text" name="tenloai" class="form-control" value="<?= $row['tenloai'] ?>" required></div>
                    <div class="mb-3"><label>Mô Tả</label><textarea name="mota" class="form-control"><?= $row['mota'] ?></textarea></div>
                    <button class="btn btn-outline-primary">Cập nhật</button> <a href="qlloai.php" class="btn btn-outline-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </body>