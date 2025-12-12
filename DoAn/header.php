<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<header>
    <?php
    // Kiểm tra xem session đã start chưa, nếu chưa thì start
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom shadow-sm mb-3">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" style="height:50px;" />
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navContent">

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2"><a class="nav-link fs-5" href="index.php">Trang chủ</a></li>
                    <li class="nav-item mx-2"><a class="nav-link fs-5" href="gioithieu.php">Giới thiệu</a></li>
                    <li class="nav-item mx-2"><a class="nav-link fs-5" href="sanpham.php">Sản phẩm</a></li>
                    <li class="nav-item mx-2"><a class="nav-link fs-5" href="#">Liên hệ</a></li>
                </ul>

                <div class="d-flex align-items-center me-3">
                    <i class="bi bi-telephone fs-4 me-2"></i>
                    <span>Hotline<br><b>0869 347 040</b></span>
                </div>

                <form action="timkiem.php" method="GET" class="search-form me-3">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Tìm kiếm..." required>
                        <button type="submit" class="btn btn-outline-secondary">🔍</button>
                    </div>
                </form>

                <?php
                $total_qty = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        $total_qty += $item['qty'];
                    }
                }
                ?>
                <a href="giohang.php" class="btn btn-outline-dark position-relative me-3">
                    <i class="bi bi-cart3 fs-4"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= $total_qty ?>
                    </span>
                </a>
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> <?= $_SESSION['user'] ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="xemtaikhoan.php">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="xemdonhang.php">Đơn hàng của tôi</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="dangxuat.php">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="d-flex">
                        <a href="dangnhap.php" class="btn btn-outline-success me-2">Đăng nhập</a>
                        <a href="dangky.php" class="btn btn-outline-primary">Đăng ký</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>