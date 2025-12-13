    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
    include("config.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ma = $_POST['ma_sp'];
        $ten = $_POST['tensp'];
        $nsx = $_POST['ma_nsx'];
        $loai = $_POST['ma_loai'];
        $gia = $_POST['giasp'];
        $ton = $_POST['soluongton'];
        $mota = $_POST['mota'];

        // Xử lý upload ảnh
        // Xử lý upload ảnh
        $hinh = "default.png";
        if (!empty($_FILES['hinh']['name'])) {
            $hinh = basename($_FILES['hinh']['name']);
            $path_root = "../images/" . $hinh;
            $path_admin = "images/" . $hinh;
            if (move_uploaded_file($_FILES['hinh']['tmp_name'], $path_root)) {
                copy($path_root, $path_admin);
            }
        }
        $sql = "INSERT INTO sanpham (ma_sp, tensp, ma_nsx, ma_loai, giasp, soluongton, mota, tenhinh) 
            VALUES ('$ma', '$ten', '$nsx', '$loai', '$gia', '$ton', '$mota', '$hinh')";

        if ($conn->query($sql) === TRUE) {
            header("Location: qlsanpham.php");
            exit();
        } else {
            $error = "Lỗi: " . $conn->error;
        }
    }
    ?>

    <body class="bg-light container mt-4">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4>Thêm Sản Phẩm Mới</h4>
            </div>
            <div class="card-body">
                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-4"><label>Mã SP</label><input type="text" name="ma_sp" class="form-control" required></div>
                        <div class="col-md-8"><label>Tên Sản Phẩm</label><input type="text" name="tensp" class="form-control" required></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6"><label>Loại</label>
                            <select name="ma_loai" class="form-select">
                                <?php
                                $l = $conn->query("SELECT * FROM loaisanpham");
                                while ($r = $l->fetch_assoc()) echo "<option value='{$r['ma_loai']}'>{$r['tenloai']}</option>";
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6"><label>Hãng</label>
                            <select name="ma_nsx" class="form-select">
                                <?php
                                $n = $conn->query("SELECT * FROM nhasanxuat");
                                while ($r = $n->fetch_assoc()) echo "<option value='{$r['ma_nsx']}'>{$r['tennsx']}</option>";
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col"><label>Giá bán</label><input type="number" name="giasp" class="form-control"></div>
                        <div class="col"><label>Số lượng</label><input type="number" name="soluongton" class="form-control"></div>
                    </div>
                    <div class="mb-3"><label>Hình ảnh</label><input type="file" name="hinh" class="form-control"></div>
                    <div class="mb-3"><label>Mô tả</label><textarea name="mota" class="form-control" rows="3"></textarea></div>
                    <button class="btn btn-outline-success">Thêm mới</button> <a href="qlsanpham.php" class="btn btn-outline-secondary">Hủy</a>
                </form>
            </div>
        </div>
    </body>