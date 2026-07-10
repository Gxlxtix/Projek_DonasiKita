-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2026 at 04:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasikita`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_campaign` int(11) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_campaign`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(1, 1, 'Operasi Tahap Pertama', 'Dana telah digunakan untuk operasi tahap pertama.', 'berita1.jpg', '2026-07-03 03:37:38'),
(2, 2, 'Penerima Beasiswa Bertambah', 'Program kini membantu lebih banyak siswa.', 'berita2.jpg', '2026-07-03 03:37:38'),
(3, 3, 'Distribusi Bantuan', 'Relawan telah menyalurkan bantuan ke lokasi banjir.', 'berita3.jpg', '2026-07-03 03:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id_campaign` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `target_dana` bigint(20) NOT NULL,
  `dana_terkumpul` bigint(20) DEFAULT 0,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Selesai') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id_campaign`, `id_user`, `id_kategori`, `judul`, `deskripsi`, `target_dana`, `dana_terkumpul`, `tanggal_mulai`, `tanggal_selesai`, `gambar`, `status`) VALUES
(1, 1, 1, 'Bantu Pengobatan Adik Fajar', 'Dana digunakan untuk operasi jantung.', 150000000, 85000000, '2026-07-01', '2026-08-30', 'fajar.jpg', 'Aktif'),
(2, 1, 2, 'Beasiswa Anak Yatim', 'Program bantuan pendidikan.', 250000000, 180528775, '2026-07-05', '2026-10-10', 'beasiswa.jpg', 'Aktif'),
(3, 1, 3, 'Korban Banjir Sumatera', 'Bantuan logistik dan sembako.', 500000000, 386015240, '2026-07-02', '2026-09-20', 'banjir.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `id_campaign` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nominal` bigint(20) NOT NULL,
  `pesan` text DEFAULT NULL,
  `anonim` enum('Ya','Tidak') DEFAULT 'Tidak',
  `tanggal` datetime DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_campaign`, `id_user`, `nominal`, `pesan`, `anonim`, `tanggal`, `status`) VALUES
(23, 3, 2, 30000000, 'Semoga cepat selesai masalahnya dan tuhan berkati', 'Tidak', '2026-07-10 21:05:22', 'Pending'),
(24, 2, 2, 100000, 'Semoga menjadi lebih baik kedepannya', 'Ya', '2026-07-10 21:06:52', 'Pending'),
(25, 2, 3, 500000, 'Semmoga ini mejadi berkah', 'Tidak', '2026-07-10 21:11:36', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kesehatan'),
(2, 'Pendidikan'),
(3, 'Bencana Alam'),
(4, 'Rumah Ibadah'),
(5, 'Lingkungan'),
(6, 'Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subjek` varchar(200) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_donasi` int(11) DEFAULT NULL,
  `metode` varchar(50) DEFAULT NULL,
  `status` enum('Pending','Berhasil','Gagal') DEFAULT 'Pending',
  `bukti_transfer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_donasi`, `metode`, `status`, `bukti_transfer`) VALUES
(27, 23, 'Transfer Bank', 'Berhasil', 'bukti_1783692322_1386.png'),
(28, 24, 'QRIS', 'Pending', 'bukti_1783692412_4584.png'),
(29, 25, 'E-Wallet', 'Berhasil', 'bukti_1783692696_7491.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `no_hp`, `alamat`, `foto`, `created_at`) VALUES
(1, 'Administrator', 'admin@donasikita.com', 'admin123', 'admin', '081234567890', 'Palembang', NULL, '2026-07-03 03:37:38'),
(2, 'Budi Santoso', 'budi@gmail.com', '123456', 'user', '081111111111', 'Palembang', NULL, '2026-07-03 03:37:38'),
(3, 'Siti Aisyah', 'siti@gmail.com', '123456', 'user', '082222222222', 'Jakarta', NULL, '2026-07-03 03:37:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_campaign` (`id_campaign`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id_campaign`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `id_campaign` (`id_campaign`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_donasi` (`id_donasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id_campaign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id_campaign`);

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `campaign_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id_campaign`),
  ADD CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_donasi`) REFERENCES `donasi` (`id_donasi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
