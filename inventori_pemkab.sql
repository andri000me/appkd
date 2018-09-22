-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2018 at 08:34 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori_pemkab`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `nopol` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('tersedia','tidak tersedia') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `penanggung_jawab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `nopol`, `merk`, `status`, `penanggung_jawab_id`) VALUES
(1, 'G 3708 Z', 'Avanza', 'tersedia', 5),
(3, 'G 1234 H', 'Alphard', 'tersedia', 5);

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peminjam` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id`, `no_surat`, `alamat`, `no_hp`, `nama_peminjam`, `keperluan`) VALUES
(3, '005 / 102 / PKM.2 / ', 'Wonopringgo                                                                                                ', '085741880658', 'Abdur Rozaq', 'Rapat Penyuluhan'),
(4, '005/726', 'Pekalongan', '085741880658', 'Oik', 'Dinas Luar Kota'),
(5, '660.1/2025', 'XXX', '085741880658', 'Rozaq', 'XXX'),
(6, '660.1/2025', 'XXX', '085741880658', 'Rozaq', 'XXX');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peminjam_id` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jam` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruang_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobil_id` int(11) DEFAULT NULL,
  `foto_kesiapan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('siap','in progress','selesai','verif','bermasalah') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in progress',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `jumlah_peserta` int(11) NOT NULL,
  `acara` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab_id` int(11) DEFAULT NULL,
  `sopir_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `peminjam_id`, `tanggal_peminjaman`, `tanggal_selesai`, `jam`, `ruang_id`, `mobil_id`, `foto_kesiapan`, `status`, `keterangan`, `jumlah_peserta`, `acara`, `tempat`, `penanggung_jawab_id`, `sopir_id`) VALUES
('1528029771', 3, '2018-06-04', '1970-01-01', '', '2', NULL, '1528029771.jpg', 'siap', '1asdasd', 300, 'penyuluhan', '', 1, 0),
('1528030189', 3, '2018-06-05', '1970-01-01', '08.00', '3', NULL, '1528030189.jpg', 'siap', 'xxx', 122, 'tessxsaxsd', '', 1, 0),
('1528030273', 4, '2018-06-05', '2018-06-12', '', NULL, 3, NULL, 'in progress', 'asdasda', 4, 'Penerimaan Mahasiswa KKN', 'Pekalongan', 5, 0),
('1528030296', 5, '2018-06-05', '1970-01-01', '08.00', NULL, NULL, NULL, 'in progress', '', 5, 'penyuluhan', NULL, 3, 0),
('1528031318', 5, '2018-06-04', '1970-01-01', '', '18', NULL, NULL, 'in progress', '', 100, '22', '', 1, 0),
('1528032108', 4, '2018-06-03', '1970-01-01', '', '18', NULL, '1528032108.jpg', 'in progress', '', 1, 'Penerimaan Mahasiswa KKN', '', 1, 0),
('1528032461', 4, '2018-06-03', '2018-06-05', '', NULL, 1, NULL, 'in progress', '', 5, 'xxxxx', 'Pekalongan', 5, 0),
('1528106011', 3, '2018-06-04', '1970-01-01', '09.00', '2', NULL, NULL, '', 'asdas', 230, 'penyuluhan', '', 1, 0),
('1528108394', 4, '2018-06-03', '2018-06-05', '', NULL, 3, NULL, 'in progress', '', 5, 'xxxxx', 'Pekalonganxxxx', 1, 0),
('1528109467', 5, '2018-06-05', '0000-00-00', '', NULL, NULL, NULL, 'in progress', '', 5, 'penyuluhan', NULL, 3, 0),
('1528109577', 3, '2018-06-04', '1970-01-01', '', '2', NULL, NULL, '', 'asdas', 230, 'penyuluhan', '', 1, 0),
('1528109616', 4, '2018-06-03', '1970-01-01', '', '18', NULL, '1528032108.jpg', 'in progress', '', 1, 'Penerimaan Mahasiswa KKN', '', 1, 0),
('1530753232', 5, '2018-07-06', '2018-07-05', '', NULL, 1, 'default', 'in progress', 'gdd', 65, 'jgfjggj', 'hhfg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `id` int(11) NOT NULL,
  `perlengkapan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `peminjaman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman_detail`
--

INSERT INTO `peminjaman_detail` (`id`, `perlengkapan_id`, `jumlah`, `peminjaman_id`) VALUES
(11, 4, 100, 1528030189),
(12, 5, 1, 1528030189),
(13, 6, 10, 1528030189),
(14, 7, 1, 1528030189),
(15, 4, 50, 1528030296),
(16, 5, 2, 1528030296),
(17, 4, 100, 1528106011),
(23, 4, 50, 1528109467),
(24, 5, 2, 1528109467),
(25, 4, 100, 1528109577),
(26, 4, 100, 1528109618);

-- --------------------------------------------------------

--
-- Table structure for table `penanggung_jawab`
--

CREATE TABLE `penanggung_jawab` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penanggung_jawab`
--

INSERT INTO `penanggung_jawab` (`id`, `nama`, `jabatan`, `alamat`, `no_hp`, `password`) VALUES
(1, 'nurul', 'ruang', 'Pekalongan', '085741880658', '6968a2c57c3a4fee8fadc79a80355e4d'),
(3, 'agus', 'perlengkapan', 'Pekalongan', '085741880658', 'fdf169558242ee051cca1479770ebac3'),
(5, 'haryono', 'kendaraan', 'Pekalongan', '085741880658', 'ee5b3474951af5b378ecf57bdfd5a859'),
(6, 'rini', 'ketua', 'pekalongan', '085741880658', 'b86872751de1e13c142d050acfd09842'),
(7, 'admin', 'ketua', '', '', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `id` int(20) NOT NULL,
  `nama_perlengkapan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penanggung_jawab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perlengkapan`
--

INSERT INTO `perlengkapan` (`id`, `nama_perlengkapan`, `jumlah`, `penanggung_jawab_id`) VALUES
(4, 'Kursi Lipat', 300, 3),
(5, 'Layos', 4, 3),
(6, 'Kursi Meja VIP', 10, 3),
(7, 'Sound', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `nama_ruang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('dipakai','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tidak',
  `fasilitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab_id` int(11) NOT NULL,
  `kapasitas` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`, `status`, `fasilitas`, `penanggung_jawab_id`, `kapasitas`) VALUES
(2, 'Pendopo Rumdin Bupati', 'tidak', 'Sound system rapat 1 set, LCD Proyektor 2 buah, meja vip 4 kursi vip 12 buah,meja penerima tamu 2 buah, meja snek 4 buah, kursi lipat 150, lampu sorot 2 buah, gong dan pemukul 1 buah', 1, '500'),
(3, 'Halaman Pendopo Rumdin Bupati', 'tidak', 'Sound system senam, panggung instruktur 1, tiang bendera utama 1, tiang bendera tambahan 6', 1, '1500'),
(4, 'Ruang Pringgitan', 'tidak', 'Kursi tamu 24, meja tamu 4, meja untuk topi 1', 1, '24'),
(5, 'Ruang Yasin', 'tidak', '14 meja bundar, 76 kursi, 2 meja snek', 1, '100'),
(6, 'Halaman Belakang Rumdin Bupati', 'tidak', 'Lapangan Tenis 2, bangku beton untuk penonton 10 buah,  Lap Badminton 1, halaman parkir', 1, '1000'),
(7, 'Pendopo Rumdin Wakil Bupati', 'tidak', 'Kursi lipat 250, meja absensi 2, meja snack 1 buah', 1, '250'),
(8, 'Halaman Pendopo Wakil Bupati', 'tidak', 'Tiang bendera 1', 1, '1000'),
(9, 'Rumdis Setda ', 'tidak', 'Kamar Induk 1 buah, kamar anak 2 buah, 1  set kursi tamu, 1 set kursi makan, 1 set sofa, 2 buah TV, 4 buah AC, 1 buah lemari es, 1 ruang dapur, 2 kamar mandi', 1, '10'),
(10, 'Rumdis Asisten I', 'tidak', 'Kamar Induk 1 buah, kamar anak 2 buah, 1  set kursi tamu, 1 set kursi makan, 1 set sofa, 1 buah TV, 4 buah AC, 1 buah lemari es, 1 ruang dapur, 2 kamar mandi', 1, '4'),
(11, 'Rumdis Asisten II', 'tidak', 'Kamar Induk 1 buah, kamar anak 2 buah, 1  set kursi tamu, 1 set kursi makan, 1 set sofa, 1 buah TV, 4 buah AC, 1 buah lemari es, 1 ruang dapur, 2 kamar mandi', 1, '4'),
(12, 'Rumdis Asisten III', 'tidak', 'Kamar Induk 1 buah, kamar anak 2 buah, 1  set kursi tamu, 1 set kursi makan, 1 set sofa, 1 buah TV, 4 buah AC, 1 buah lemari es, 1 ruang dapur, 2 kamar mandi', 1, '4'),
(13, 'Halaman Setda', 'tidak', 'Sound sistem apel 1 set, tiang bendera 1', 1, '1000'),
(14, 'Aula setda Lantai 1', 'tidak', 'Kursi lipat 200 buah, sound sistem rapat 1 set, meja vip 4, kursi vip 12 buah, meja rapat 6,meja absen 2 buah, meja snek 2 buah, lcd 3 set', 1, '350'),
(15, 'Aula Setda lantai 3', 'tidak', 'Kursi lipat 100, sound sistem 1 set, meja rapat 5 buah, meja absen 1, meja snack 1', 1, '350'),
(16, 'Ruang Rapat Bupati', 'tidak', 'Kursi rapat 50, meja rapat 10, sound sistem rapat 1 set, lcd 1 set, ', 1, '50'),
(17, 'Ruang Rapat Ass I', 'tidak', 'Kursi lipat 30, \r\nMic ,Wireless,', 1, '30'),
(18, 'Ruang Rapat Ass II', 'tidak', 'Kursi lipat 30, Mic,Wireless,', 1, '30'),
(19, 'Ruang Rapat Ass III', 'tidak', 'Kursi lipat 30, Mic,Wireless,', 1, '30'),
(20, 'Ruang Pool', 'tidak', 'Meja bundar 20, Kursi lipat 400, Umbul santri 100, Umbul-umbul merah putih 100, Bendera merah putih 100, Karpet 20 gulung, Layos 6 set', 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `app_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `app_name`, `short_name`, `logo`) VALUES
(1, 'Aplikasi pengaturan ruang dan kendaraan dinas', 'APP & KD', 'Logo_kota_pekalongan1.png');

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`id`, `nama`, `no_hp`) VALUES
(1, 'Testing', '085868817658');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `hak_akses`, `penanggung_jawab_id`) VALUES
(1, 'l.toni2007@gmail.com', '$2y$10$wVwPky5pgpT8fkIPGbgCo.9VRV7LK18V1zXIQojMU0i1gcvmf7M.S', 'ketua', 1),
(2, 'admin@gmail.com', '$2y$10$LItUfj0lekEkCGlhJl5zLOs4FD3diwMM5yV33GL218U0b8yECxP7i', 'ketua', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
