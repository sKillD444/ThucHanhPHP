<title>Nhà Sản Xuất</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<body class="bg-light">

    <div class="d-flex">
        <?php
        include("db.php");
        include("sidebar.php");
        ?>
        <!-- CONTENT -->
        <div class="flex-grow-1 p-4" style="height: 100vh; overflow-y: auto;">
            <h2 class="fw-bold text-dark mb-4">Nhà Sản Xuất</h2>

            <div class="flex-grow-1 p-4" style="height: 100vh; overflow-y: auto;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark">Nhà Sản Xuất</h2>
                    <a href="them_nsx.php" class="btn btn-outline-primary">+ Thêm mới</a>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mã NSX</th>
                                    <th>Tên NSX</th>
                                    <th>Địa Chỉ</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = $conn->query("SELECT * FROM nhasanxuat");
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                    <td>{$row['ma_nsx']}</td>
                                    <td>{$row['tennsx']}</td>
                                    <td>{$row['diachi']}</td>
                                    <td>{$row['sdt']}</td>
                                    <td>{$row['email']}</td>
                                    <td>
                                        <a href='sua_nsx.php?id={$row['ma_nsx']}' class='btn btn-sm btn-outline-primary'>Sửa</a>
                                        <a href='xoa_nsx.php?id={$row['ma_nsx']}' onclick='return confirm(\"Xóa?\")' class='btn btn-sm btn-outline-danger'>Xóa</a>
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
    </div>

</body>