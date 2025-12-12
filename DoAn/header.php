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
                    <li class="nav-item mx-2"><a class="nav-link fs-5" href="index.php">Trang chủ</a></li>
                    <li class="nav-item mx-2"><a class="nav-link fs-5" href="gioithieu.php">Giới thiệu</a></li>
                    <li class="nav-item mx-2"><a class="nav-link fs-5" href="#">Sản phẩm</a></li>
                    <li class="nav-item mx-2"><a class="nav-link fs-5" href="#">Liên hệ</a></li>

                </ul>

                <div class="d-flex align-items-center me-3">
                    <i class="bi bi-telephone fs-4 me-2"></i>
                    <span>Hotline<br><b>0869 347 040</b></span>
                </div>

                <form action="giohang.php" method="GET" class="search-form">
                    <div class="search-box">
                        <input type="text" name="query" class="search-input" placeholder="Tìm kiếm sản phẩm..." required>
                        <button type="submit" class="btn-search">
                            🔍
                        </button>
                    </div>
                </form>

                <button class="btn ms-3 position-relative">
                    <i class="bi bi-cart fs-4"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                </button>

                <a href="dangky.php" class="btn btn-outline-info ms-3">
                    <i class="bi bi-person fs-4"></i> Đăng ký
                </a>
            </div>
        </div>
    </nav>
</header>