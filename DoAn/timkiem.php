<title>Tìm kiếm</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
include("header.php");
include("config.php");

$tukhoa = "";
$count = 0; // Biến đếm số kết quả

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $tukhoa = $_GET['query'];

    try {
        // [PDO] Sử dụng Prepared Statement để tìm kiếm an toàn
        $sql = "SELECT s.*, n.tennsx 
                FROM sanpham s 
                LEFT JOIN nhasanxuat n ON s.ma_nsx = n.ma_nsx 
                WHERE s.tensp LIKE :tukhoa 
                ORDER BY s.ma_sp DESC";

        $stmt = $conn->prepare($sql);

        // Thêm dấu % vào từ khóa để tìm kiếm gần đúng (LIKE)
        $searchParam = "%$tukhoa%";
        $stmt->bindParam(':tukhoa', $searchParam);
        $stmt->execute();

        // [PDO] Đếm số dòng tìm thấy
        $count = $stmt->rowCount();
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
    }
} else {
    // Nếu không có từ khóa thì về trang chủ
    header("Location: index.php");
    exit();
}
?>

<body class="bg-light">
    <div class="container py-5">

        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tìm kiếm</li>
                    </ol>
                </nav>

                <h3>Kết quả tìm kiếm cho từ khóa: <span class="text-danger fw-bold">"<?= htmlspecialchars($tukhoa) ?>"</span></h3>
                <p class="text-muted">Tìm thấy <?= $count ?> sản phẩm phù hợp</p>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php
            if ($count > 0) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $gia = number_format($row['giasp'], 0, ',', '.') . ' đ';
                    $img_path = "images/" . $row['tenhinh'];
                    $hinh = (!empty($row['tenhinh']) && file_exists($img_path)) ? $img_path : "https://placehold.co/300x300?text=No+Image";
            ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="position-relative text-center p-3 bg-white" style="height: 220px;">
                                <img src="<?= $hinh ?>" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                <span class="position-absolute top-0 end-0 badge bg-danger m-2">Hot</span>
                            </div>

                            <div class="card-body text-center d-flex flex-column">
                                <small class="text-muted text-uppercase"><?= $row['tennsx'] ?></small>
                                <h5 class="card-title fw-bold text-truncate my-2" title="<?= $row['tensp'] ?>">
                                    <?= $row['tensp'] ?>
                                </h5>

                                <p class="text-danger fw-bold fs-5"><?= $gia ?></p>

                                <div class="mt-auto">
                                    <a href="xuly_giohang.php?action=add&id=<?= $row['ma_sp'] ?>" class="btn btn-primary w-100">
                                        <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '
                <div class="col-12 text-center py-5">
                    <div class="mb-3">
                        <i class="bi bi-emoji-frown display-1 text-muted"></i>
                    </div>
                    <h4>Rất tiếc, không tìm thấy sản phẩm nào!</h4>
                    <p class="text-muted">Hãy thử tìm kiếm với từ khóa khác hoặc xem các danh mục sản phẩm.</p>
                    <a href="index.php" class="btn btn-outline-primary mt-2">Về trang chủ</a>
                    <a href="sanpham.php" class="btn btn-primary mt-2">Xem tất cả sản phẩm</a>
                </div>
                ';
            }
            ?>
        </div>
    </div>
</body>
<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>