<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
include("db.php");
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM sanpham WHERE ma_sp = '$id'")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten = $_POST['tensp'];
    $nsx = $_POST['ma_nsx'];
    $loai = $_POST['ma_loai'];
    $gia = $_POST['giasp'];
    $ton = $_POST['soluongton'];
    $mota = $_POST['mota'];

    $hinh = $row['tenhinh'];
    if (!empty($_FILES['hinh']['name'])) {
        $hinh = basename($_FILES['hinh']['name']);
        move_uploaded_file($_FILES['hinh']['tmp_name'], "images/" . $hinh);
    }

    $sql = "UPDATE sanpham SET tensp='$ten', ma_nsx='$nsx', ma_loai='$loai', 
            giasp='$gia', soluongton='$ton', mota='$mota', tenhinh='$hinh' 
            WHERE ma_sp='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: qlsanpham.php");
        exit();
    }
}
?>

<body class="bg-light container mt-4">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4>Cập Nhật Sản Phẩm</h4>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-4"><label>Mã SP</label><input type="text" class="form-control" value="<?= $row['ma_sp'] ?>" disabled></div>
                    <div class="col-md-8"><label>Tên Sản Phẩm</label><input type="text" name="tensp" class="form-control" value="<?= $row['tensp'] ?>" required></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Loại</label>
                        <select name="ma_loai" class="form-select">
                            <?php
                            $l = $conn->query("SELECT * FROM loaisanpham");
                            while ($r = $l->fetch_assoc()) {
                                $sel = ($r['ma_loai'] == $row['ma_loai']) ? 'selected' : '';
                                echo "<option value='{$r['ma_loai']}' $sel>{$r['tenloai']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6"><label>Hãng</label>
                        <select name="ma_nsx" class="form-select">
                            <?php
                            $n = $conn->query("SELECT * FROM nhasanxuat");
                            while ($r = $n->fetch_assoc()) {
                                $sel = ($r['ma_nsx'] == $row['ma_nsx']) ? 'selected' : '';
                                echo "<option value='{$r['ma_nsx']}' $sel>{$r['tennsx']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col"><label>Giá bán</label><input type="number" name="giasp" class="form-control" value="<?= $row['giasp'] ?>"></div>
                    <div class="col"><label>Số lượng</label><input type="number" name="soluongton" class="form-control" value="<?= $row['soluongton'] ?>"></div>
                </div>
                <div class="mb-3"><label>Hình ảnh</label><input type="file" name="hinh" class="form-control">
                    <br><img src="images/<?= $row['tenhinh'] ?>" width="100" class="mt-2 border">
                </div>
                <div class="mb-3"><label>Mô tả</label><textarea name="mota" class="form-control" rows="3"><?= $row['mota'] ?></textarea></div>
                <button class="btn btn-outline-primary">Cập nhật</button> <a href="qlsanpham.php" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
    </div>
</body>