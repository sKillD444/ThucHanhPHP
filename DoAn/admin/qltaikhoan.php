<title>Tài Khoản</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<body class="bg-light">

    <div class="d-flex">
        <?php
        include("config.php");
        include("sidebar.php");
        ?>
        <!-- CONTENT -->
        <div class="flex-grow-1 p-4" style="height: 100vh; overflow-y: auto;">
            <h2 class="fw-bold text-dark mb-4">Danh Sách Người Dùng</h2>

            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Trạng thái</th>
                                <th style="width: 200px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM nguoidung";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Xử lý hiển thị trạng thái
                                    if ($row['trangthai'] == 1) {
                                        $statusText = '<span class="badge bg-success">Hoạt động</span>';
                                        $btnKhoa = '<a href="khoa_taikhoan.php?id=' . $row['ma_nd'] . '&tt=0" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Bạn muốn khóa tài khoản này?\')">Khóa</a>';
                                    } else {
                                        $statusText = '<span class="badge bg-secondary">Đã khóa</span>';
                                        $btnKhoa = '<a href="khoa_taikhoan.php?id=' . $row['ma_nd'] . '&tt=1" class="btn btn-sm btn--outline-success">Mở lại</a>';
                                    }

                                    echo "<tr>";
                                    echo "<td>{$row['ma_nd']}</td>";
                                    echo "<td class='fw-bold'>{$row['tennd']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>{$row['sdt']}</td>";
                                    echo "<td>{$statusText}</td>";
                                    echo "<td>
                                            <a href='doi_email.php?id={$row['ma_nd']}' class='btn btn-sm btn-outline-primary'>Đổi Email</a>
                                            $btnKhoa
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center'>Chưa có tài khoản nào</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>