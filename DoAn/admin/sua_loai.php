<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
include("../config.php");

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM loaisanpham WHERE ma_loai = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten = $_POST['tenloai'];
    $mota = $_POST['mota'];

    try {
        $sql = "UPDATE loaisanpham SET tenloai = :ten, mota = :mota WHERE ma_loai = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':mota', $mota);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: qlloai.php");
            exit();
        }
    } catch (PDOException $e) {
        $error = "Lỗi: " . $e->getMessage();
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