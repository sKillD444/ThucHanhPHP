<title>Sản Phẩm</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<body class="bg-light">

    <div class="d-flex">
        <?php
        include("db.php");
        include("sidebar.php");
        ?>
        <!-- CONTENT -->
        <div class="flex-grow-1 p-4" style="height: 100vh; overflow-y: auto;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark">Danh Sách Sản Phẩm</h2>
                <a href="them_sanpham.php" class="btn btn-outline-primary">+ Thêm Sản Phẩm</a>
            </div>
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Mã SP</th>
                                <th>Hình</th>
                                <th>Tên SP</th>
                                <th>Giá</th>
                                <th>Kho</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM sanpham ORDER BY ma_sp ASC";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $hinh = !empty($row['tenhinh']) ? "images/" . $row['tenhinh'] : "images/default.png";
                                echo "<tr>
                                    <td>{$row['ma_sp']}</td>
                                    <td><img src='$hinh' width='50'></td>
                                    <td>{$row['tensp']}</td>
                                    <td>" . number_format($row['giasp']) . "</td>
                                    <td>{$row['soluongton']}</td>
                                    <td>
                                        <a href='sua_sanpham.php?id={$row['ma_sp']}' class='btn btn-sm btn-outline-primary'>Sửa</a>
                                        <a href='xoa_sanpham.php?id={$row['ma_sp']}' onclick='return confirm(\"Xóa sản phẩm này?\")' class='btn btn-sm btn-outline-danger'>Xóa</a>
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