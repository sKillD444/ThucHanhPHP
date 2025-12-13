<title>Sản phẩm</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php
include("header.php");
include("config.php");

$sql = "SELECT * FROM sanpham WHERE 1=1";

if (isset($_GET['ma_loai'])) {
    $ma_loai = $_GET['ma_loai'];
    $sql .= " AND ma_loai = '$ma_loai'";
}

if (isset($_GET['ma_nsx'])) {
    $ma_nsx = $_GET['ma_nsx'];
    $sql .= " AND ma_nsx = '$ma_nsx'";
}

if (isset($_GET['query'])) {
    $tu_khoa = $_GET['query'];
    $sql .= " AND tensp LIKE '%$tu_khoa%'";
}

$sql .= " ORDER BY ma_sp DESC";

$stmt = $conn->query($sql);
?>

<body class="bg-light">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-3 col-lg-2 mb-4">
                <h5 class="fw-bold text-uppercase mb-3">Danh mục</h5>
                <div class="list-group mb-4 shadow-sm">
                    <a href="sanpham.php" class="list-group-item list-group-item-action fw-bold bg-primary text-white">
                        Tất cả loại
                    </a>
                    <?php
                    $stmt_loai = $conn->query("SELECT * FROM loaisanpham");
                    while ($l = $stmt_loai->fetch(PDO::FETCH_ASSOC)) {
                        $active = (isset($_GET['ma_loai']) && $_GET['ma_loai'] == $l['ma_loai']) ? 'active' : '';
                        echo "<a href='sanpham.php?ma_loai={$l['ma_loai']}' class='list-group-item list-group-item-action $active'>{$l['tenloai']}</a>";
                    }
                    ?>
                </div>

                <h5 class="fw-bold text-uppercase mb-3">Nhà sản xuất</h5>
                <div class="list-group shadow-sm">
                    <?php
                    // [PDO] Lấy nhà sản xuất
                    $stmt_nsx = $conn->query("SELECT * FROM nhasanxuat");
                    while ($n = $stmt_nsx->fetch(PDO::FETCH_ASSOC)) {
                        $active = (isset($_GET['ma_nsx']) && $_GET['ma_nsx'] == $n['ma_nsx']) ? 'active' : '';
                        echo "<a href='sanpham.php?ma_nsx={$n['ma_nsx']}' class='list-group-item list-group-item-action $active'>{$n['tennsx']}</a>";
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-9 col-lg-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-body py-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                    <?php
                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $gia = number_format($row['giasp'], 0, ',', '.') . ' đ';
                            $img_path = "images/" . $row['tenhinh'];
                            $hinh = (!empty($row['tenhinh']) && file_exists($img_path)) ? $img_path : "https://placehold.co/300x300?text=No+Image";
                    ?>
                            <div class="col">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="p-3 text-center" style="height: 200px;">
                                        <img src="<?= $hinh ?>" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                                    </div>

                                    <div class="card-body d-flex flex-column text-center pt-0">
                                        <h6 class="card-title fw-bold text-truncate" title="<?= $row['tensp'] ?>">
                                            <?= $row['tensp'] ?>
                                        </h6>
                                        <p class="text-danger fw-bold fs-5 my-2"><?= $gia ?></p>
                                        <a href="xuly_giohang.php?action=add&id=<?= $row['ma_sp'] ?>" class="btn btn-warning w-100 mt-auto fw-bold">
                                            Mua ngay
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<div class='col-12 text-center py-5'>
                                <p class='fs-4 text-muted'>Không tìm thấy sản phẩm nào!</p>
                                <a href='sanpham.php' class='btn btn-primary'>Xem tất cả</a>
                              </div>";
                    }
                    ?>
                </div>

                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
<?php include("footer.php"); ?>