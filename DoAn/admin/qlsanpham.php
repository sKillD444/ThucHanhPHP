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

                <div class="d-flex gap-2">
                    <form method="GET" class="d-flex align-items-center">
                        <select name="ma_loai" class="form-select me-2" onchange="this.form.submit()" style="width: 200px;">
                            <option value="">-- Tất cả loại --</option>
                            <?php
                            $sqlLoai = "SELECT * FROM loaisanpham";
                            $resultLoai = $conn->query($sqlLoai);
                            // Lấy mã loại đang chọn từ URL (nếu có)
                            $dang_chon = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : "";
                            while ($rowLoai = $resultLoai->fetch_assoc()) {
                                $selected = ($rowLoai['ma_loai'] == $dang_chon) ? "selected" : "";
                                echo "<option value='{$rowLoai['ma_loai']}' $selected>{$rowLoai['tenloai']}</option>";
                            }
                            ?>
                        </select>
                    </form>
                    <a href="them_sanpham.php" class="btn btn-outline-primary text-nowrap">+ Thêm Sản Phẩm</a>
                </div>
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
                                <th>Loại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // XỬ LÝ SQL LỌC DỮ LIỆU
                            $sql = "SELECT s.*, l.tenloai 
                                    FROM sanpham s 
                                    JOIN loaisanpham l ON s.ma_loai = l.ma_loai";

                            // Nếu có chọn loại thì thêm WHERE
                            if (!empty($dang_chon)) {
                                $sql .= " WHERE s.ma_loai = '$dang_chon'";
                            }

                            $sql .= " ORDER BY s.ma_sp ASC";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $hinh = !empty($row['tenhinh']) ? "images/" . $row['tenhinh'] : "images/default.png";
                                    echo "<tr>
                                        <td>{$row['ma_sp']}</td>
                                        <td><img src='$hinh' width='50'></td>
                                        <td>{$row['tensp']}</td>
                                        <td class='text-danger fw-bold'>" . number_format($row['giasp']) . " đ</td>
                                        <td>{$row['soluongton']}</td>
                                        <td><span class='badge bg-info text-dark'>{$row['tenloai']}</span></td>
                                        <td>
                                            <a href='sua_sanpham.php?id={$row['ma_sp']}' class='btn btn-sm btn-outline-primary'>Sửa</a>
                                            <a href='xoa_sanpham.php?id={$row['ma_sp']}' onclick='return confirm(\"Xóa sản phẩm này?\")' class='btn btn-sm btn-outline-danger'>Xóa</a>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center py-4'>Không tìm thấy sản phẩm nào thuộc loại này!</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>