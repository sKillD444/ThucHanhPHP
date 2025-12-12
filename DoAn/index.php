<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zyuuki Music Store</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="d-flex flex-column" style="min-height:100vh;">

    <!-- ================= HEADER ================= -->

    <?php
    include("header.php")
    ?>

    <!-- ================= SLIDER ================= -->
    <div id="sliderHome" class="carousel slide mb-5" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#sliderHome" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#sliderHome" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#sliderHome" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="images/GuitarClassicC40.png" class="d-block w-100"
                    style="max-height:420px; object-fit:cover;">
            </div>

            <div class="carousel-item">
                <img src="images/GuitarDienStrat.png" class="d-block w-100"
                    style="max-height:420px; object-fit:cover;">
            </div>

            <div class="carousel-item">
                <img src="images/PianoDienPX-S1000.png" class="d-block w-100"
                    style="max-height:420px; object-fit:cover;">
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#sliderHome" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#sliderHome" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

    <!-- ================= SẢN PHẨM NỔI BẬT ================= -->
    <div class="container mb-5">

        <div class="text-center mb-4">
            <h2 class="fw-bold">🔥 Sản phẩm nổi bật</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">

            <!-- SP 1 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="images/GuitarClassicC40.png" class="card-img-top">
                    <div class="card-body">
                        <h4 class="fw-bold">Đàn Guitar Classic</h4>
                        <p>Thương hiệu: Yamaha</p>
                        <p class="text-danger fs-5 fw-bold">2.500.000đ</p>
                        <button class="btn btn-warning w-100 fs-5">Mua ngay</button>
                    </div>
                </div>
            </div>

            <!-- SP 2 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="images/PianoDienPX-S1000.png" class="card-img-top">
                    <div class="card-body">
                        <h4 class="fw-bold">Piano Điện</h4>
                        <p>Thương hiệu: Kawai</p>
                        <p class="text-danger fs-5 fw-bold">18.900.000đ</p>
                        <button class="btn btn-warning w-100 fs-5">Mua ngay</button>
                    </div>
                </div>
            </div>

            <!-- SP 3 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="images/TrongJazzSet.png" class="card-img-top">
                    <div class="card-body">
                        <h4 class="fw-bold">Trống Jazz</h4>
                        <p>Thương hiệu: Pearl</p>
                        <p class="text-danger fs-5 fw-bold">8.800.000đ</p>
                        <button class="btn btn-warning w-100 fs-5">Mua ngay</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ================= SẢN PHẨM MỚI ================= -->
    <div class="container mb-5">

        <div class="text-center mb-4">
            <h2 class="fw-bold">🆕 Sản phẩm mới</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">

            <!-- SP 1 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="images/SaotrucViet.png" class="card-img-top">
                    <div class="card-body">
                        <h4 class="fw-bold">Sáo Trúc</h4>
                        <p>Thương hiệu: Việt Nam</p>
                        <p class="text-danger fs-5 fw-bold">199.000đ</p>
                        <button class="btn btn-warning w-100 fs-5">Mua ngay</button>
                    </div>
                </div>
            </div>

            <!-- SP 2 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="images/default.png" class="card-img-top">
                    <div class="card-body">
                        <h4 class="fw-bold">Organ Mini</h4>
                        <p>Thương hiệu: Casio</p>
                        <p class="text-danger fs-5 fw-bold">1.290.000đ</p>
                        <button class="btn btn-warning w-100 fs-5">Mua ngay</button>
                    </div>
                </div>
            </div>

            <!-- SP 3 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="images/default.png" class="card-img-top">
                    <div class="card-body">
                        <h4 class="fw-bold">Ukulele</h4>
                        <p>Thương hiệu: Ziko</p>
                        <p class="text-danger fs-5 fw-bold">550.000đ</p>
                        <button class="btn btn-warning w-100 fs-5">Mua ngay</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ================= FOOTER ================= -->

    <?php
    include("footer.php")
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>