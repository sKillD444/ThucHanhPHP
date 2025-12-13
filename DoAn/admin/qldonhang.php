<title>Đơn hàng</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<body class="bg-light">

    <div class="d-flex">
        <?php
        include("config.php");
        include("sidebar.php");
        ?>
        <!-- CONTENT -->
        <div class="flex-grow-1 p-4" style="height: 100vh; overflow-y: auto;">
            <h2 class="fw-bold text-dark mb-4">Quản Lý Đơn Hàng</h2>

            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Mã ĐH</th>
                                <th>Người nhận</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Hình thức</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM dondathang ORDER BY ngaydat DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $tongtien = number_format($row['tongtien'], 0, ',', '.') . ' đ';

                                    $badgeColor = 'bg-secondary';
                                    if ($row['trangthai'] == 'Hoàn thành') $badgeColor = 'bg-success';
                                    elseif ($row['trangthai'] == 'Đang xử lý') $badgeColor = 'bg-primary';
                                    elseif ($row['trangthai'] == 'Đã hủy') $badgeColor = 'bg-danger';

                                    echo "<tr>";
                                    echo "<td>#{$row['ma_ddh']}</td>";
                                    echo "<td>{$row['nguoinhan']}<br><small class='text-muted'>{$row['sdt']}</small></td>";
                                    echo "<td>{$row['ngaydat']}</td>";
                                    echo "<td class='fw-bold text-danger'>{$tongtien}</td>";
                                    echo "<td>{$row['phuongthuc']}</td>";
                                    echo "<td>{$row['tt_thanhtoan']}</td>";
                                    echo "<td><span class='badge $badgeColor'>{$row['trangthai']}</span></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center'>Chưa có đơn hàng nào</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>