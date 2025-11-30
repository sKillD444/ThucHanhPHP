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
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom shadow-sm mb-3">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    <img src="images/logo.png" style="height:50px;" />
                </a>

                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navContent">

                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mx-2"><a class="nav-link fs-5" href="#">Trang chủ</a></li>
                        <li class="nav-item mx-2"><a class="nav-link fs-5" href="#">Giới thiệu</a></li>
                        <li class="nav-item mx-2"><a class="nav-link fs-5" href="#">Sản phẩm</a></li>
                        <li class="nav-item mx-2"><a class="nav-link fs-5" href="#">Liên hệ</a></li>
                        <li class="nav-item mx-2"><a class="nav-link fs-5" href="#">Đánh giá</a></li>
                    </ul>

                    <div class="d-flex align-items-center me-3">
                        <i class="bi bi-telephone fs-4 me-2"></i>
                        <span>Hotline<br><b>0869 347 040</b></span>
                    </div>

                    <form class="d-flex border rounded">
                        <input type="text" class="form-control border-0" placeholder="Tìm kiếm...">
                        <button class="btn"><i class="bi bi-search"></i></button>
                    </form>

                    <button class="btn ms-3 position-relative">
                        <i class="bi bi-cart fs-4"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                    </button>

                    <a href="#" class="btn btn-outline-info ms-3">
                        <i class="bi bi-person fs-4"></i> Đăng ký
                    </a>
                </div>
            </div>
        </nav>
    </header>

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
    <footer class="bg-dark text-light pt-5 pb-3 mt-auto">
        <div class="container">

            <div class="row">

                <div class="col-md-4">
                    <h5 class="fw-bold">Zyuuki Music Store</h5>
                    <p>Cung cấp nhạc cụ chính hãng: Guitar, Piano, Trống…</p>
                </div>

                <div class="col-md-4">
                    <h5 class="fw-bold">Liên hệ</h5>
                    <p>📍 123 Nguyễn Trãi, TP.HCM</p>
                    <p>📞 0869 347 040</p>
                    <p>📧 contact@zyuuki.com</p>
                </div>

                <div class="col-md-4">
                    <h5 class="fw-bold">Liên kết nhanh</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Trang chủ</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Sản phẩm</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Giới thiệu</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Liên hệ</a></li>
                    </ul>
                </div>

            </div>

            <hr class="border-secondary">

            <div class="text-center">
                © 2025 Zyuuki Music Store - All rights reserved.
            </div>

        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>