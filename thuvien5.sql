-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2021 lúc 02:01 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thuvien5`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhchitiet`
--

CREATE TABLE `anhchitiet` (
  `MaSach` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `anhchitiet`
--

INSERT INTO `anhchitiet` (`MaSach`, `id`, `Link`) VALUES
(77, 116, 'public/anhchitiet_sach/243313652_547357042993912_8195810026000670955_n.jpg'),
(77, 117, 'public/anhchitiet_sach/244216975_1942924902533365_300119187628338110_n.jpg'),
(77, 118, 'public/anhchitiet_sach/243123372_400041901739903_8727708160448005195_n.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieumuon`
--

CREATE TABLE `chitietphieumuon` (
  `MaPhieuMuon` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieutra`
--

CREATE TABLE `chitietphieutra` (
  `MaPhieuTra` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoachuyennganh`
--

CREATE TABLE `khoachuyennganh` (
  `MaKhoaCN` int(11) NOT NULL,
  `TenCN` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoachuyennganh`
--

INSERT INTO `khoachuyennganh` (`MaKhoaCN`, `TenCN`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Công nghệ thực phẩm'),
(3, 'Công nghệ ô tô'),
(4, 'Thú y');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `MaKhoaHoc` int(11) NOT NULL,
  `TenKhoaHoc` text COLLATE utf8_unicode_ci NOT NULL,
  `NamBatDau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`MaKhoaHoc`, `TenKhoaHoc`, `NamBatDau`) VALUES
(1, 'Khóa 43', 2018),
(2, 'Khóa 44', 2019),
(3, 'Khóa 45', 2020);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisach`
--

CREATE TABLE `loaisach` (
  `TenLoaiSach` text COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiSach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisach`
--

INSERT INTO `loaisach` (`TenLoaiSach`, `MaLoaiSach`) VALUES
('KH-CN', 1),
('Chính trị-pháp luật', 2),
('Thiếu nhi', 3),
('Giáo trình', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `TenNV` text COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` text COLLATE utf8_unicode_ci NOT NULL,
  `Cmnd_gv` int(11) NOT NULL,
  `Matkhau_gv` text COLLATE utf8_unicode_ci NOT NULL,
  `MaQuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `GioiTinh`, `Cmnd_gv`, `Matkhau_gv`, `MaQuyen`) VALUES
(1, 'giao vien 1', 'nam', 123456789, '$2y$10$57sKPZ/PIug8mukiKmSCpeGXu0zfCe9JyHbjvH2/oOF.b5jBO6ExG', 1),
(2, 'giao vien 2', 'nu', 1234, '$2y$10$CcfPaNQ7qvbOTWoUYpD05eZGKA.ovb7HMvVbYL1SJkUdRnPPKYYL.', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`MaQuyen`, `TenQuyen`) VALUES
(1, 'Nhân viên'),
(2, 'Quản lý'),
(3, 'Sinh viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieumuon`
--

CREATE TABLE `phieumuon` (
  `MaPhieuMuon` int(11) NOT NULL,
  `IDSV` int(11) NOT NULL,
  `NgayMuon` date NOT NULL,
  `TrangThai` text COLLATE utf8_unicode_ci NOT NULL,
  `TongSoSachMuon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieumuon`
--

INSERT INTO `phieumuon` (`MaPhieuMuon`, `IDSV`, `NgayMuon`, `TrangThai`, `TongSoSachMuon`) VALUES
(1, 2, '2020-09-01', 'Tốt', 2),
(2, 1, '2021-09-02', 'Tốt', 10),
(3, 3, '2021-09-03', 'Tốt', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieutrasach`
--

CREATE TABLE `phieutrasach` (
  `MaPhieuTra` int(11) NOT NULL,
  `MaPhieuMuon` int(11) NOT NULL,
  `NgayTra` date NOT NULL,
  `TongSoLuong` int(11) NOT NULL,
  `TrangThai` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaSach` int(11) NOT NULL,
  `TenSach` text COLLATE utf8_unicode_ci NOT NULL,
  `Noidungngan` text COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `NgayNhap` date NOT NULL,
  `AnhDaiDien` text COLLATE utf8_unicode_ci NOT NULL,
  `Gia` text COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiSach` int(11) NOT NULL,
  `MaTacGia` int(11) NOT NULL,
  `MakhoaCN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MaSach`, `TenSach`, `Noidungngan`, `SoLuong`, `NgayNhap`, `AnhDaiDien`, `Gia`, `MaLoaiSach`, `MaTacGia`, `MakhoaCN`) VALUES
(1, 'Lập trình căn bản', 'abcdefghijklmnopqrstuvwxyzasdasdasdas asdasd asdasda sdasd asd asdas dasd\r\nasd asdasdasdas adasdasdasdasdsa das dasd\r\n', 10, '2012-09-12', 'public/anhsach/sach_lt_java.jpg', '200000', 4, 1, 4),
(2, 'AV chuyên ngành', 'abcdefghijklmnopqrstuvwxyzasdasdasdas asdasd asdasda sdasd asd asdas dasd\r\nasd asdasdasdas adasdasdasdasdsa das dasd', 100, '2013-09-18', 'public/anhsach/sach_lt_java.jpg', '120000', 4, 1, 4),
(3, 'Tư tưởng HCM', 'abcdefghijklmnopqrstuvwxyz', 50, '2016-08-10', 'public/anhsach/sach_lt_java.jpg', '300000', 2, 3, 4),
(4, 'Toán CC A3', 'abcdefghijklmnopqrstuvwxyz', 120, '2014-09-18', 'public/anhsach/sach_lt_java.jpg', '125000', 4, 1, 4),
(6, 'sach1', 'dhaspfncaspjfasfasfamaslfasfmasasasdasf', 100, '2014-10-17', 'public/anhsach/sach_lt_java.jpg', '20', 1, 1, 4),
(7, 'sach2', 'japsljasfjafasnfaslfasnfaslnfaslnfasnflasnflasnflknas', 5, '2015-10-13', 'public/anhsach/sach_lt_java.jpg', '60', 1, 1, 4),
(8, 'sach3', 'gao ồ gao ồ gaooooooooooooo', 50, '2016-10-10', 'public/anhsach/sach_lt_java.jpg', '20', 1, 1, 4),
(9, 'sach4', 'nsfànlầnlf', 15, '2015-10-17', 'public/anhsach/sach_lt_java.jpg', '30', 1, 1, 4),
(10, 'sach5', 'aaaaa', 30, '2016-10-19', 'public/anhsach/sach_lt_java.jpg', '40', 1, 1, 4),
(11, 'sach6', 'bbbbbbbbbbbbbbbb', 40, '2015-10-13', 'public/anhsach/sach_lt_java.jpg', '55', 2, 1, 4),
(12, 'sach7', 'ccccccccccccccc', 21, '2016-10-18', 'public/anhsach/sach_lt_java.jpg', '30', 2, 1, 4),
(13, 'sach8', 'ddddddddddddddddd', 22, '2015-10-19', 'public/anhsach/sach_lt_java.jpg', '33', 2, 2, 4),
(14, 'sach9', 'eeeeeeeeeeee', 100, '2014-10-15', 'public/anhsach/sach_lt_java.jpg', '22', 2, 2, 4),
(15, 'sach10', 'âđssâsađasssssaa', 0, '0000-00-00', 'public/anhsach/sach_lt_java.jpg', '33', 2, 2, 4),
(16, 'sach11', 'ádnalsálflấlfn', 10, '2021-10-13', 'public/anhsach/sach_lt_java.jpg', '50', 2, 2, 4),
(17, 'sach11', 'ádnálalsfá', 20, '2019-10-16', 'public/anhsach/sach_lt_java.jpg', '20', 3, 2, 4),
(18, 'sach12', 'áđâsđasadầ', 30, '2014-10-07', 'public/anhsach/sach_lt_java.jpg', '55', 3, 3, 4),
(19, 'sach12', 'asfalskfalskfnaslnf', 25, '2015-10-21', 'public/anhsach/sach_lt_java.jpg', '35', 3, 3, 4),
(20, 'sach13', 'asbdlasflasf', 30, '2016-10-25', 'public/anhsach/sach_lt_java.jpg', '10', 3, 3, 4),
(21, 'sach14', 'asggfasdasd', 20, '2015-10-23', 'public/anhsach/sach_lt_java.jpg', '60', 3, 3, 4),
(22, 'sach15', 'asflasflasfna;sfn', 21, '2014-10-20', 'public/anhsach/sach_lt_java.jpg', '80', 3, 3, 4),
(23, 'sach16', 'alsklfasnfansfjasfjas;f', 22, '2017-10-18', 'public/anhsach/sach_lt_java.jpg', '60', 3, 3, 4),
(24, 'sach17', 'asasfasnfas,fmasfasf', 100, '2012-10-16', 'public/anhsach/sach_lt_java.jpg', '40', 3, 3, 4),
(25, 'sach18', 'asasgfasfasdasd', 26, '2018-10-15', 'public/anhsach/sach_lt_java.jpg', '90', 4, 3, 4),
(26, 'sach19', 'asfassafafas', 60, '2018-10-02', 'public/anhsach/sach_lt_java.jpg', '600', 4, 3, 4),
(27, 'sachhh', 'asasfasfasfasf', 60, '2017-10-11', 'public/anhsach/sach_lt_java.jpg', '20', 4, 2, 4),
(28, 'sach211', 'asasfasfsa', 50, '2015-10-19', 'public/anhsach/sach_lt_java.jpg', '12', 4, 2, 4),
(29, 'sach113', 'asasfasfjasfbjaksbf', 40, '2014-10-18', 'public/anhsach/sach_lt_java.jpg', '45', 2, 2, 4),
(30, 'sach34', 'asfasfasfs', 78, '2016-10-27', 'public/anhsach/sach_lt_java.jpg', '6000', 4, 2, 4),
(31, 'sach35', 'asdasfasfas', 50, '2018-10-19', 'public/anhsach/sach_lt_java.jpg', '55', 4, 2, 4),
(32, 'sachaa', 'asbfasbflsfblasf', 15, '2019-10-31', 'public/anhsach/sach_lt_java.jpg', '32', 4, 3, 4),
(33, 'sachss', 'asasfasfasfas', 60, '2018-10-26', 'public/anhsach/sach_lt_java.jpg', '123', 4, 3, 4),
(34, 'sacht', 'âfagagagága', 70, '2020-10-19', 'public/anhsach/sach_lt_java.jpg', '90', 4, 1, 4),
(35, 'sachj', 'asasfasgagas', 55, '2020-10-20', 'public/anhsach/sach_lt_java.jpg', '30', 4, 2, 4),
(36, 'sachck', 'asffafasfagfa', 22, '2017-10-26', 'public/anhsach/sach_lt_java.jpg', '45', 4, 3, 4),
(37, 'sachcuoi', 'asfhalsbasjgba', 150, '2020-10-16', 'public/anhsach/sach_lt_java.jpg', '99', 4, 2, 4),
(38, 'sachcuoi loai 4/1', 'asfhalsbasjgba', 150, '2020-10-16', 'public/anhsach/sach_lt_java.jpg', '99', 4, 2, 4),
(39, 'sachcuoi loai 4/2', 'asfhalsbasjgba', 150, '2020-10-16', 'public/anhsach/sach_lt_java.jpg', '99', 4, 2, 4),
(40, 'sach35 ', 'asdasfasfas', 50, '2018-10-19', 'public/anhsach/sach_lt_java.jpg', '55', 4, 2, 4),
(41, 'sachaa 4/3', 'asbfasbflsfblasf', 15, '2019-10-31', 'public/anhsach/sach_lt_java.jpg', '32', 4, 3, 4),
(42, 'sachss 4/4', 'asasfasfasfas', 60, '2018-10-26', 'public/anhsach/sach_lt_java.jpg', '123', 4, 3, 4),
(43, 'sacht 4/6', 'âfagagagága', 70, '2020-10-19', 'public/anhsach/sach_lt_java.jpg', '90', 4, 1, 4),
(44, 'sachj 4/7', 'asasfasgagas', 55, '2020-10-20', 'public/anhsach/sach_lt_java.jpg', '30', 4, 2, 4),
(45, 'sachck 4/8', 'asffafasfagfa', 22, '2017-10-26', 'public/anhsach/sach_lt_java.jpg', '45', 4, 3, 4),
(46, 'sachcuoi 4/9', 'asfhalsbasjgba', 150, '2020-10-16', 'public/anhsach/sach_lt_java.jpg', '99', 4, 2, 4),
(47, 'sachcuoi loai 4/10', 'asfhalsbasjgba', 150, '2020-10-16', 'public/anhsach/sach_lt_java.jpg', '99', 4, 2, 4),
(48, 'sachcuoi loai 4/11', 'asfhalsbasjgba', 150, '2020-10-16', 'public/anhsach/sach_lt_java.jpg', '99', 4, 2, 4),
(49, 'sachcuoi loai 4/12', 'asfhalsbasjgba', 150, '2020-10-16', 'public/anhsach/sach_lt_java.jpg', '99', 4, 2, 4),
(50, 'sachcuoi loai 4/13', 'asfhalsbasjgba', 150, '2020-10-16', 'public/anhsach/sach_lt_java.jpg', '99', 4, 2, 4),
(69, 'ajax4', '<p>1212</p>\r\n', 12, '2021-10-27', ' public/anhsach/1 (2).jpg', '12', 4, 3, 4),
(70, 'nhatnam', '<p>1212</p>\r\n', 12, '2021-10-29', ' public/anhsach/anh cay 3.jpg', '12', 4, 1, 4),
(71, 'hoangphu', '<p>123</p>\r\n', 123, '2021-10-29', ' public/anhsach/44.jpg', '123', 4, 1, 4),
(72, 'nhatnam2', '<p>121</p>\r\n', 12, '2021-10-30', ' public/anhsach/1 (2)1.jpg', '12', 4, 3, 4),
(73, 'nhatnam3', '<p>1212</p>\r\n', 2, '2021-10-30', ' public/anhsach/441.jpg', '121', 4, 3, 4),
(74, 'nhatnam12', '<p>1212</p>\r\n', 1, '2021-10-30', ' public/anhsach/442.jpg', '1', 4, 1, 4),
(75, 'nhatnam6', '<p>1212</p>\r\n', 2, '2021-10-30', ' public/anhsach/1 (2)2.jpg', '121', 4, 1, 4),
(76, 'nhatnam13', '<p>1212</p>\r\n', 30, '2021-10-30', 'public/anhsach/anh cay 31.jpg', '50', 4, 3, 4),
(77, 'nhatnam5', '<p>12121</p>\r\n', 12, '2021-11-02', 'public/anhsach/244466634_271914518271827_8219314495064344289_n.png', '12', 4, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `IDSV` int(11) NOT NULL,
  `MSSV` int(11) NOT NULL,
  `HoTen` text COLLATE utf8_unicode_ci NOT NULL,
  `CMND` int(11) NOT NULL,
  `GioiTinh` text COLLATE utf8_unicode_ci NOT NULL,
  `MaKhoa` int(11) NOT NULL,
  `MaQuyen` int(11) NOT NULL DEFAULT 3,
  `MatKhau` text COLLATE utf8_unicode_ci NOT NULL,
  `MaKhoaCN` int(11) NOT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`IDSV`, `MSSV`, `HoTen`, `CMND`, `GioiTinh`, `MaKhoa`, `MaQuyen`, `MatKhau`, `MaKhoaCN`) VALUES
(1, 18004107, 'Nguyễn Lê Ngọc Seng', 331123321, 'nu', 1, 3, '$2y$10$P0AcSanj.vkfL9O1NcC2keVcJR0Uc5LZL2MiUV/8moLJY0E6iY8PO', 1),
(2, 18004085, 'Mai Nhật Nem', 331456654, 'Nam', 1, 3, '$2y$10$HzBDIM8zanBWzAGvfPXWKOTSNktyIPygSb.vxnTHaHT0vVG6jMNAG', 1),
(3, 18004099, 'Võ Hoàng Phúu', 331012210, 'Nam', 1, 3, '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `MaTG` int(11) NOT NULL,
  `TenTG` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`MaTG`, `TenTG`) VALUES
(1, 'Nguyễn Lê Ngọc Sang'),
(2, 'Mai Nhật Nam'),
(3, 'Võ Hoàng Phú');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhchitiet`
--
ALTER TABLE `anhchitiet`
  ADD PRIMARY KEY (`id`,`MaSach`) USING BTREE,
  ADD KEY `fk_MaSachCuaAnh` (`MaSach`);

--
-- Chỉ mục cho bảng `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD PRIMARY KEY (`MaPhieuMuon`,`MaSach`) USING BTREE,
  ADD KEY `fk_MaSachMuon` (`MaSach`);

--
-- Chỉ mục cho bảng `chitietphieutra`
--
ALTER TABLE `chitietphieutra`
  ADD PRIMARY KEY (`MaPhieuTra`,`MaSach`) USING BTREE,
  ADD KEY `fk_SachTra` (`MaSach`);

--
-- Chỉ mục cho bảng `khoachuyennganh`
--
ALTER TABLE `khoachuyennganh`
  ADD PRIMARY KEY (`MaKhoaCN`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`MaKhoaHoc`);

--
-- Chỉ mục cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`MaLoaiSach`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD UNIQUE KEY `Cmnd_gv` (`Cmnd_gv`),
  ADD KEY `fk_PhanQuyenNhanVien` (`MaQuyen`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD PRIMARY KEY (`MaPhieuMuon`),
  ADD KEY `fk_IDSV` (`IDSV`);

--
-- Chỉ mục cho bảng `phieutrasach`
--
ALTER TABLE `phieutrasach`
  ADD PRIMARY KEY (`MaPhieuTra`),
  ADD KEY `fk_PhieuMuon` (`MaPhieuMuon`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaSach`),
  ADD KEY `fk_LoaiSach` (`MaLoaiSach`),
  ADD KEY `fk_TG` (`MaTacGia`),
  ADD KEY `MakhoaCN` (`MakhoaCN`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`IDSV`),
  ADD UNIQUE KEY `chimotsinhvien` (`MSSV`),
  ADD KEY `fk_Khoa` (`MaKhoa`),
  ADD KEY `fk_KhoaCN` (`MaKhoaCN`),
  ADD KEY `fk_PhanQuyenSV` (`MaQuyen`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`MaTG`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anhchitiet`
--
ALTER TABLE `anhchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `khoachuyennganh`
--
ALTER TABLE `khoachuyennganh`
  MODIFY `MaKhoaCN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `MaKhoaHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  MODIFY `MaLoaiSach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `MaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phieumuon`
--
ALTER TABLE `phieumuon`
  MODIFY `MaPhieuMuon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `MaSach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `IDSV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `MaTG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anhchitiet`
--
ALTER TABLE `anhchitiet`
  ADD CONSTRAINT `fk_MaSachCuaAnh` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD CONSTRAINT `fk_MaPhieuMuon` FOREIGN KEY (`MaPhieuMuon`) REFERENCES `phieumuon` (`MaPhieuMuon`),
  ADD CONSTRAINT `fk_MaSachMuon` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `chitietphieutra`
--
ALTER TABLE `chitietphieutra`
  ADD CONSTRAINT `fk_MaPhieuTra` FOREIGN KEY (`MaPhieuTra`) REFERENCES `phieutrasach` (`MaPhieuTra`),
  ADD CONSTRAINT `fk_SachTra` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_PhanQuyenNhanVien` FOREIGN KEY (`MaQuyen`) REFERENCES `phanquyen` (`MaQuyen`);

--
-- Các ràng buộc cho bảng `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD CONSTRAINT `fk_IDSV` FOREIGN KEY (`IDSV`) REFERENCES `sinhvien` (`IDSV`);

--
-- Các ràng buộc cho bảng `phieutrasach`
--
ALTER TABLE `phieutrasach`
  ADD CONSTRAINT `fk_PhieuMuon` FOREIGN KEY (`MaPhieuMuon`) REFERENCES `phieumuon` (`MaPhieuMuon`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `fk_LoaiSach` FOREIGN KEY (`MaLoaiSach`) REFERENCES `loaisach` (`MaLoaiSach`),
  ADD CONSTRAINT `fk_TG` FOREIGN KEY (`MaTacGia`) REFERENCES `tacgia` (`MaTG`),
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`MakhoaCN`) REFERENCES `khoachuyennganh` (`MaKhoaCN`);

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `fk_Khoa` FOREIGN KEY (`MaKhoa`) REFERENCES `khoahoc` (`MaKhoaHoc`),
  ADD CONSTRAINT `fk_KhoaCN` FOREIGN KEY (`MaKhoaCN`) REFERENCES `khoachuyennganh` (`MaKhoaCN`),
  ADD CONSTRAINT `fk_PhanQuyenSV` FOREIGN KEY (`MaQuyen`) REFERENCES `phanquyen` (`MaQuyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
