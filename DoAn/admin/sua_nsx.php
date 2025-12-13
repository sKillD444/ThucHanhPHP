<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
include("../config.php");
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM nhasanxuat WHERE ma_nsx = :id");
$stmt->execute([':id' => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten = $_POST['tennsx'];
    $dc = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];

    try {
        $sql = "UPDATE nhasanxuat SET tennsx=:ten, diachi=:dc, sdt=:sdt, email=:email WHERE ma_nsx=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':ten' => $ten,
            ':dc' => $dc,
            ':sdt' => $sdt,
            ':email' => $email,
            ':id' => $id
        ]);

        header("Location: qlnsx.php");
        exit();
    } catch (PDOException $e) {
        $error = "Lỗi: " . $e->getMessage();
    }
}
?>

<body class="bg-light container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4>Sửa Nhà Sản Xuất</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3"><label>Mã NSX</label><input type="text" class="form-control" value="<?= $row['ma_nsx'] ?>" disabled></div>
                <div class="mb-3"><label>Tên NSX</label><input type="text" name="tennsx" class="form-control" value="<?= $row['tennsx'] ?>" required></div>
                <div class="mb-3"><label>Địa chỉ</label><input type="text" name="diachi" class="form-control" value="<?= $row['diachi'] ?>"></div>
                <div class="row mb-3">
                    <div class="col"><label>SĐT</label><input type="text" name="sdt" class="form-control" value="<?= $row['sdt'] ?>"></div>
                    <div class="col"><label>Email</label><input type="email" name="email" class="form-control" value="<?= $row['email'] ?>"></div>
                </div>
                <button class="btn btn-outline-primary">Cập nhật</button> <a href="qlnsx.php" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
    </div>
</body>