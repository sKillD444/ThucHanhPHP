 <title>Đơn hàng của tôi</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 <?php
    session_start();
    include("header.php");
    include("db.php");
    if (!isset($_SESSION['user'])) {
        header("Location: dangnhap.php");
        exit;
    }
    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM dondathang WHERE ma_nd = '$uid' ORDER BY ngaydat DESC";
    $result = $conn->query($sql);

    ?>

 <body class="bg-light">
     <div class="container py-5">
         <h4 class="fw-bold mb-4">Lịch Sử Đơn Hàng</h4>

         <div class="card shadow-sm border-0">
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-hover align-middle">
                         <thead class="table-light">
                             <tr>
                                 <th>Mã ĐH</th>
                                 <th>Ngày đặt</th>
                                 <th>Địa chỉ nhận</th>
                                 <th>Tổng tiền</th>
                                 <th>Thanh toán</th>
                                 <th>Trạng thái</th>
                                 <th>Hành động</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $tongtien = number_format($row['tongtien'], 0, ',', '.') . 'đ';
                                        $statusColor = 'bg-secondary';
                                        if ($row['trangthai'] == 'Hoàn thành') $statusColor = 'bg-success';
                                        if ($row['trangthai'] == 'Đang xử lý') $statusColor = 'bg-warning text-dark';
                                        if ($row['trangthai'] == 'Đã hủy') $statusColor = 'bg-danger';

                                        echo "<tr>
                                            <td><span class='fw-bold'>#{$row['ma_ddh']}</span></td>
                                            <td>{$row['ngaydat']}</td>
                                            <td style='max-width: 200px;' class='text-truncate' title='{$row['diachi']}'>{$row['diachi']}</td>
                                            <td class='text-danger fw-bold'>{$tongtien}</td>
                                            <td>{$row['phuongthuc']}</td>
                                            <td><span class='badge $statusColor'>{$row['trangthai']}</span></td>
                                            <td>
                                                <a href='chitiet_donhang.php?id={$row['ma_ddh']}' class='btn btn-sm btn-outline-primary'>
                                                    <i class='bi bi-eye'></i> Xem
                                                </a>
                                            </td>
                                          </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='text-center py-4'>Bạn chưa có đơn hàng nào! <a href='sanpham.php'>Mua sắm ngay</a></td></tr>";
                                }
                                ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </body>
 <?php include("footer.php"); ?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>