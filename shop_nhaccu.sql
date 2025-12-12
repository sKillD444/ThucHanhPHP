-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2025 at 07:33 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_nhaccu`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdondathang`
--

DROP TABLE IF EXISTS `chitietdondathang`;
CREATE TABLE IF NOT EXISTS `chitietdondathang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ma_ddh` int DEFAULT NULL,
  `ma_sp` varchar(10) DEFAULT NULL,
  `soluong` int DEFAULT NULL,
  `gia` decimal(18,2) DEFAULT NULL,
  `thanhtien` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ma_ddh` (`ma_ddh`),
  KEY `ma_sp` (`ma_sp`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chitietdondathang`
--

INSERT INTO `chitietdondathang` (`id`, `ma_ddh`, `ma_sp`, `soluong`, `gia`, `thanhtien`) VALUES
(1, 1, 'SP01', 2, 2500000.00, 4500000.00),
(2, 2, 'SP02', 1, 18000000.00, 17100000.00),
(3, 3, 'SP01', 1, 2500000.00, 2500000.00),
(4, 3, 'SP03', 9, 300000.00, 2700000.00),
(5, 3, 'SP05', 4, 120000.00, 480000.00),
(6, 3, 'SP08', 3, 450000.00, 1350000.00),
(7, 4, 'SP07', 1, 120000000.00, 120000000.00),
(8, 5, 'SP04', 1, 12500000.00, 12500000.00),
(9, 6, 'SP06', 1, 15000000.00, 15000000.00),
(10, 7, 'SP09', 1, 19000000.00, 19000000.00),
(11, 8, 'SP02', 1, 18000000.00, 18000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

DROP TABLE IF EXISTS `dondathang`;
CREATE TABLE IF NOT EXISTS `dondathang` (
  `ma_ddh` int NOT NULL AUTO_INCREMENT,
  `ma_nd` int DEFAULT NULL,
  `nguoinhan` varchar(100) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `phuongxa` varchar(255) DEFAULT NULL,
  `tinhthanh` varchar(255) DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `tongtien` decimal(18,2) DEFAULT NULL,
  `trangthai` varchar(50) DEFAULT NULL,
  `tt_thanhtoan` varchar(50) DEFAULT NULL,
  `phuongthuc` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ma_ddh`),
  KEY `ma_nd` (`ma_nd`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`ma_ddh`, `ma_nd`, `nguoinhan`, `sdt`, `diachi`, `phuongxa`, `tinhthanh`, `ngaydat`, `tongtien`, `trangthai`, `tt_thanhtoan`, `phuongthuc`) VALUES
(1, 1, 'Lê Minh Hoàng', '0988252751', '56 Cách Mạng Tháng 8', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', '2025-11-12', 4500000.00, 'Hoàn thành', 'Đã thanh toán', 'VNPay'),
(2, 2, 'Nguyễn Thu Trang', '0985263321', '129 Nguyễn Đình Chiểu', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', '2025-11-06', 17100000.00, 'Đang xử lý', 'Chưa thanh toán', 'COD'),
(3, 1, 'Lê Minh Hoàng', '0988252751', '56 Cách Mạng Tháng 8', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', '2025-09-05', 5250000.00, 'Hoàn thành', 'Đã thanh toán', 'VNPay'),
(4, 2, 'Nguyễn Thu Trang', '0985263321', '129 Nguyễn Đình Chiểu', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', '2025-09-20', 120000000.00, 'Đã hủy', 'Chưa thanh toán', 'COD'),
(5, 1, 'Lê Minh Hoàng', '0988252751', '56 Cách Mạng Tháng 8', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', '2025-10-10', 12500000.00, 'Hoàn thành', 'Đã thanh toán', 'COD'),
(6, 2, 'Nguyễn Thu Trang', '0985263321', '129 Nguyễn Đình Chiểu', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', '2025-10-28', 15000000.00, 'Đang xử lý', 'Chưa thanh toán', 'COD'),
(7, 1, 'Lê Minh Hoàng', '0988252751', '56 Cách Mạng Tháng 8', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', '2025-11-01', 19000000.00, 'Hoàn thành', 'Đã thanh toán', 'COD'),
(8, 2, 'Nguyễn Thu Trang', '0985263321', '129 Nguyễn Đình Chiểu', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', '2025-11-25', 18000000.00, 'Đang xử lý', 'Đã thanh toán', 'VNPay');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `ma_loai` varchar(20) NOT NULL,
  `tenloai` varchar(100) NOT NULL,
  `mota` text,
  PRIMARY KEY (`ma_loai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`ma_loai`, `tenloai`, `mota`) VALUES
('accessory', 'Phụ kiện', 'Dây đàn, bao đàn, chân đàn...'),
('drum', 'Trống', 'Trống điện tử, trống jazz'),
('flute', 'Sáo', 'Sáo trúc, sáo mèo và các loại sáo khác'),
('guitar', 'Guitar', 'Các loại đàn guitar'),
('piano', 'Piano', 'Đàn piano điện và cơ');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `ma_nd` int NOT NULL AUTO_INCREMENT,
  `tennd` varchar(100) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `phuongxa` varchar(255) DEFAULT NULL,
  `tinhthanh` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `trangthai` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ma_nd`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`ma_nd`, `tennd`, `matkhau`, `sdt`, `diachi`, `phuongxa`, `tinhthanh`, `email`, `hinh`, `trangthai`) VALUES
(1, 'Lê Minh Hoàng', '123456', '0988252751', '56 Cách Mạng Tháng 8', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', 'customer1@zyuuki.vn', NULL, 1),
(2, 'Nguyễn Thu Trang', '123456', '0985263321', '129 Nguyễn Đình Chiểu', 'Phường Xuân Hòa', 'Thành phố Hồ Chí Minh', 'customer2@zyuuki.vn', NULL, 1),
(3, 'Trần Đức Hiếu', '123456', '0982422774', '22 Pasteur', 'Phường Bến Thành', 'Thành phố Hồ Chí Minh', 'customer3@zyuuki.vn', NULL, 1),
(4, 'Ngô Hoàng Khang', '123456', '0932635865', '233 Lê Văn Sỹ', 'Phường Phú Nhuận', 'Thành phố Hồ Chí Minh', 'customer4@zyuuki.vn', NULL, 1),
(5, 'Nguyễn Văn An', '123456', '0927321176', '25 Đ. Điện Biên Phủ', 'Phường Thạnh Mỹ Tây', 'Thành phố Hồ Chí Minh', 'customer5@zyuuki.vn', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

DROP TABLE IF EXISTS `nhasanxuat`;
CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `ma_nsx` varchar(20) NOT NULL,
  `tennsx` varchar(100) NOT NULL,
  `diachi` text,
  `sdt` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ma_nsx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`ma_nsx`, `tennsx`, `diachi`, `sdt`, `email`) VALUES
('casio', 'Casio', '6-2 Hon-machi, Shibuya-ku, Tokyo, Nhật Bản', '+81 3-5566-7788', 'support@casio.jp'),
('fender', 'Fender', '17600 North Perimeter Drive, Arizona, Hoa Kỳ', '+1 480-555-2376', 'info@fender.com'),
('meilan', 'MeiLan', 'Longhua District, Shenzhen, Trung Quốc', '+86 755-8899-1122', 'info@meilan.cn'),
('vicfirth', 'Vic Firth', '147 Norwood Street, Boston, Hoa Kỳ', '+1 617-555-9044', 'contact@vicfirth.com'),
('yamaha', 'Yamaha', '10-1 Nakazawa-cho, Hamamatsu, Nhật Bản', '+81 53-123-4567', 'contact@yamaha.jp');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `ma_sp` varchar(10) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `ma_nsx` varchar(20) DEFAULT NULL,
  `ma_loai` varchar(20) DEFAULT NULL,
  `giasp` decimal(18,2) DEFAULT NULL,
  `soluongton` int DEFAULT NULL,
  `mota` text,
  `tenhinh` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`ma_sp`),
  KEY `ma_nsx` (`ma_nsx`),
  KEY `ma_loai` (`ma_loai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ma_sp`, `tensp`, `ma_nsx`, `ma_loai`, `giasp`, `soluongton`, `mota`, `tenhinh`) VALUES
('SP01', 'Guitar Classic C40', 'yamaha', 'guitar', 2500000.00, 20, 'Guitar gỗ phù hợp cho người mới học', 'SP1_12112025.jpg'),
('SP02', 'Piano Điện PX-S1000', 'casio', 'piano', 18000000.00, 5, 'Dòng piano điện cao cấp của Casio', 'PianoDienPX-S1000.png'),
('SP03', 'Sáo trúc Việt', 'meilan', 'flute', 300000.00, 50, 'Sáo trúc truyền thống âm thanh ấm áp', 'SaotrucViet.png'),
('SP04', 'Trống Jazz Set', 'fender', 'drum', 12500000.00, 3, 'Bộ trống dành cho biểu diễn sân khấu', 'TrongJazzSet.png'),
('SP05', 'Dây đàn DAddario', 'fender', 'accessory', 120000.00, 100, 'Dây đàn thay thế chất lượng cao', 'DaydanDAddario.png'),
('SP06', 'Guitar Điện Strat', 'fender', 'guitar', 15000000.00, 15, 'Guitar điện Fender nổi tiếng', 'GuitarDienStrat.png'),
('SP07', 'Piano Cơ U1', 'yamaha', 'piano', 120000000.00, 2, 'Piano cơ Yamaha cao cấp', 'default.png'),
('SP08', 'Bao Đàn Guitar Dày', 'yamaha', 'accessory', 450000.00, 40, 'Bao đàn chất lượng cao, chống sốc', 'default.png'),
('SP09', 'Trống Điện DTX', 'yamaha', 'drum', 19000000.00, 7, 'Bộ trống điện tử Yamaha', 'default.png'),
('SP10', 'Dùi Trống 5A', 'vicfirth', 'accessory', 250000.00, 0, 'Dùi trống Vic Firth phổ thông', 'default.png'),
('SP11', 'Guitar Acoustic FG800M', 'yamaha', 'guitar', 5800000.00, 10, 'Guitar Acoustic Yamaha tầm trung', 'default.png'),
('SP12', 'Đàn Ukulele Soprano', 'meilan', 'guitar', 650000.00, 23, 'Ukulele gỗ tự nhiên', 'default.png'),
('SP13', 'Keyboard CT-S300', 'casio', 'piano', 4200000.00, 45, 'Keyboard điện tử Casio', 'default.png'),
('SP14', 'Metronome cơ học', 'vicfirth', 'accessory', 750000.00, 65, 'Máy đập nhịp cơ học hỗ trợ luyện tập', 'default.png'),
('SP15', 'Harmonica Diatonic', 'yamaha', 'flute', 400000.00, 23, 'Kèn Harmonica 10 lỗ Diatonic', 'default.png'),
('SP16', 'Amplifier Guitar 10W', 'fender', 'accessory', 2800000.00, 22, 'Amply Fender 10W', 'default.png'),
('SP17', 'Piano Điện CDP-S150', 'casio', 'piano', 14500000.00, 11, 'Piano điện mỏng nhẹ của Casio', 'default.png'),
('SP18', 'Sáo Recorder Baroque', 'meilan', 'flute', 180000.00, 53, 'Sáo nhựa Recorder', 'default.png'),
('SP19', 'Trống Cajun box', 'fender', 'drum', 3500000.00, 15, 'Trống Cajon gỗ bạch dương', 'default.png'),
('SP20', 'Dây Micro Canon', 'vicfirth', 'accessory', 300000.00, 53, 'Dây micro XLR 3m', 'default.png'),
('SP21', 'Guitar Acoustic F310', 'yamaha', 'guitar', 3200000.00, 22, 'Mẫu đàn Acoustic phổ biến', 'default.png'),
('SP22', 'Piano Điện P-125', 'yamaha', 'piano', 19500000.00, 1, 'Piano điện Yamaha P-Series', 'default.png'),
('SP23', 'Trống Lắc Tambourine', 'meilan', 'accessory', 150000.00, 3, 'Tambourine vỏ nhựa', 'default.png'),
('SP24', 'Bộ Dây Đàn Piano', 'yamaha', 'accessory', 1200000.00, 6, 'Dây piano cơ thay thế', 'default.png'),
('SP25', 'Sáo Flute Bạc', 'yamaha', 'flute', 8500000.00, 7, 'Flute mạ bạc', 'default.png'),
('SP26', 'Giá Đỡ Nhạc Đa Năng', 'vicfirth', 'accessory', 550000.00, 0, 'Chân đỡ nhạc thép', 'default.png'),
('SP27', 'Guitar Điện Telecaster', 'fender', 'guitar', 17000000.00, 34, 'Fender Telecaster', 'default.png'),
('SP28', 'Piano Cơ B1', 'yamaha', 'piano', 80000000.00, 38, 'Piano cơ Yamaha B-series', 'default.png'),
('SP29', 'Pad Luyện Tập Trống', 'vicfirth', 'accessory', 600000.00, 65, 'Pad tập trống cao su', 'default.png'),
('SP30', 'Trống Đồng Latin', 'meilan', 'drum', 4800000.00, 16, 'Trống Conga/Bongo Latin', 'default.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD CONSTRAINT `chitietdondathang_ibfk_1` FOREIGN KEY (`ma_ddh`) REFERENCES `dondathang` (`ma_ddh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdondathang_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `dondathang_ibfk_1` FOREIGN KEY (`ma_nd`) REFERENCES `nguoidung` (`ma_nd`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ma_nsx`) REFERENCES `nhasanxuat` (`ma_nsx`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`ma_loai`) REFERENCES `loaisanpham` (`ma_loai`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
