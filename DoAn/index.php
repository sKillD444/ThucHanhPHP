<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zyuuki Music Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="d-flex flex-column" style="min-height:100vh;">

    <?php
    include("header.php");
    include("config.php");
    $sqlGet6 = "SELECT s.*, n.tennsx 
            FROM sanpham s 
            JOIN nhasanxuat n ON s.ma_nsx = n.ma_nsx 
            ORDER BY s.ma_sp ASC 
            LIMIT 6";

    $stmt = $conn->query($sqlGet6);
    $all_products = [];
    if ($stmt->rowCount() > 0) {
        $all_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $group_noibat = array_slice($all_products, 0, 3);
    $group_moi = array_slice($all_products, 3, 3);
    ?>

    <div id="sliderHome" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#sliderHome" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#sliderHome" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#sliderHome" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/GuitarClassicC40.png" class="d-block w-100" style="max-height:420px; object-fit:cover;" onerror="this.src='https://placehold.co/1200x420?text=Banner+1'">
            </div>
            <div class="carousel-item">
                <img src="images/GuitarDienStrat.png" class="d-block w-100" style="max-height:420px; object-fit:cover;" onerror="this.src='https://placehold.co/1200x420?text=Banner+2'">
            </div>
            <div class="carousel-item">
                <img src="images/PianoDienPX-S1000.png" class="d-block w-100" style="max-height:420px; object-fit:cover;" onerror="this.src='https://placehold.co/1200x420?text=Banner+3'">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#sliderHome" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sliderHome" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="container mb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">🔥 Sản phẩm nổi bật</h2>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            if (!empty($group_noibat)) {
                foreach ($group_noibat as $row) {
                    $gia = number_format($row['giasp'], 0, ',', '.') . 'đ';
                    $img_path = "images/" . $row['tenhinh'];
                    $hinh = (empty($row['tenhinh']) || !file_exists($img_path)) ? "https://placehold.co/300x300?text=No+Image" : $img_path;
            ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= $hinh ?>" class="card-img-top" style="height: 300px; object-fit: contain; padding: 10px;">
                            <div class="card-body d-flex flex-column">
                                <h4 class="fw-bold"><?= $row['tensp'] ?></h4>
                                <p>Thương hiệu: <?= $row['tennsx'] ?></p>
                                <p class="text-danger fs-5 fw-bold mt-auto"><?= $gia ?></p>
                                <a href="xuly_giohang.php?action=add&id=<?= $row['ma_sp'] ?>" class="btn btn-warning w-100 fs-5">Mua ngay</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } else {
                echo "<p class='text-center w-100'>Đang cập nhật dữ liệu...</p>";
            } ?>
        </div>
    </div>

    <div class="container mb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">🆕 Sản phẩm mới</h2>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            if (!empty($group_moi)) {
                foreach ($group_moi as $row) {
                    $gia = number_format($row['giasp'], 0, ',', '.') . 'đ';
                    $img_path = "images/" . $row['tenhinh'];
                    $hinh = (empty($row['tenhinh']) || !file_exists($img_path)) ? "https://placehold.co/300x300?text=No+Image" : $img_path;
            ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= $hinh ?>" class="card-img-top" style="height: 300px; object-fit: contain; padding: 10px;">
                            <div class="card-body d-flex flex-column">
                                <h4 class="fw-bold"><?= $row['tensp'] ?></h4>
                                <p>Thương hiệu: <?= $row['tennsx'] ?></p>
                                <p class="text-danger fs-5 fw-bold mt-auto"><?= $gia ?></p>
                                <button class="btn btn-warning w-100 fs-5">Mua ngay</button>
                            </div>
                        </div>
                    </div>
            <?php }
            } else {
                echo "<p class='text-center w-100'>Chưa có thêm sản phẩm nào...</p>";
            } ?>
        </div>
    </div>

    <?php include("footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>