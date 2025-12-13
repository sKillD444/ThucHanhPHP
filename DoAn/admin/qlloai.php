<title>Loại Sản Phẩm</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<body class="bg-light">

    <div class="d-flex">
        <?php
        include("../config.php"); // Lùi ra ngoài lấy file config
        include("sidebar.php");
        ?>
        <div class="flex-grow-1 p-4" style="height: 100vh; overflow-y: auto;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark">Danh Mục Loại Sản Phẩm</h2>
                <a href="them_loai.php" class="btn btn-outline-primary">+ Thêm mới</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Mã Loại</th>
                                <th>Tên Loại</th>
                                <th>Mô Tả</th>
                                <th style="width: 150px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // [PDO] Query lấy dữ liệu
                            $stmt = $conn->query("SELECT * FROM loaisanpham");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>
                                    <td>{$row['ma_loai']}</td>
                                    <td>{$row['tenloai']}</td>
                                    <td>{$row['mota']}</td>
                                    <td>
                                        <a href='sua_loai.php?id={$row['ma_loai']}' class='btn btn-sm btn-outline-primary'>Sửa</a>
                                        <a href='xoa_loai.php?id={$row['ma_loai']}' onclick='return confirm(\"Xóa loại này?\")' class='btn btn-sm btn-outline-danger'>Xóa</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>