-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 06:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halo_doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan`
--

CREATE TABLE `detail_layanan` (
  `id_layanan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_spesialisasi` int(11) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_layanan`
--

INSERT INTO `detail_layanan` (`id_layanan`, `id_kategori`, `id_spesialisasi`, `nama_layanan`, `harga`, `url`) VALUES
(1, 1, 89820, 'Obstetri dan Ginekologi', '63000.00', 'https://lh3.googleusercontent.com/YkH0DY72AdB-KHbcd1IBvh3EvIE-FH-XU28wNDT03h39MlU1jBMnV7S2cXVCJW0EEl0ODV0oWL6A3xLYWtxJrE4n0IaG-hX3Gp8=w91'),
(2, 1, 89822, 'Kulit dan Kelamin', '56000.00', 'https://lh3.googleusercontent.com/lFzr2RBF2dG0ij50h9Vy2A9XfJ72tGr4YVtvYhCyL6e-OlPbtfU_D9n-mQ9WOUly6kG84vtRuuIMCs7WI2f_TmxpCu589E-Adbs=w94'),
(3, 1, 89823, 'Andrologi', '100000.00', 'https://lh3.googleusercontent.com/Do-_LkCnReSDgWQbZjycQf6-9mipnoyfDHSzSalcl1JCQCIB0RzK5isJuA_s6kWVlHi-ei0ohgBAMx1z-FyMzDCJNhI30_QyjuM=s0'),
(4, 1, 89824, 'Urologi', '73000.00', 'https://lh3.googleusercontent.com/U6rZ67jfTK64moZXDLq8JrWD5RWuNVtbFAkCv40yZ3gjEXASPEeoBWqxWsOsmiwPbbXNBB4rlj-8hO9tQFQLAGWXvXx7CkcUqVw=s0'),
(5, 1, 89825, 'Psikolog Klinis', '120000.00', 'https://lh3.googleusercontent.com/qY3Do67dFuCQizREqQc7YkgnQ6RAdj7_wFZRXC6bcFxtL5nrt7BUhp9HxIbJCfXc2E4v4C_7c-VRo1P0bQmaSBNlsc6hC5m0cbU=s0');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_layanan`
--

CREATE TABLE `kategori_layanan` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_layanan`
--

INSERT INTO `kategori_layanan` (`id_kategori`, `nama_kategori`, `deskripsi`, `url`) VALUES
(1, 'Kesehatan Seksual', 'Dapatkan jawaban dari ahlinya', 'https://www.halodoc.com/assets/img/home-v2/specialised-care/sexual-health.png'),
(2, 'Kesehatan Mental', 'Dapatkan pertolongan dari ahlinya', 'https://www.halodoc.com/assets/img/home-v2/png/mental-health-v2.png'),
(3, 'Perawatan Kanker', 'Pahami gejala & pilihan pengobatannya', 'https://d1e8la4lqf1h28.cloudfront.net/images/542502_13-5-2022_13-4-29.jpeg'),
(4, 'Layanan Bidan', 'Temui bidan terpercaya pilihanmu', 'https://www.halodoc.com/assets/img/home-v2/png/tc-mw-home.png'),
(5, 'Kesehatan Jantung', 'KIat menjaga kesehatan jantung', 'https://d1e8la4lqf1h28.cloudfront.net/images/860564e1-9fce-4f43-a564-c6239814f712_category_image_url.webp'),
(6, 'Perawatan Diabetes', 'Panduan untuk mengelola diabetes', 'https://www.halodoc.com/assets/img/home-v2/png/diabetes-care.png'),
(7, 'Parenting', 'Panduan menjaga kesehatan buah hati', 'https://www.halodoc.com/assets/img/app-page/specialised-care/icons/parenting.png'),
(8, 'Kesehatan Kulit', 'Kenali kondisi kulitmu & perawatannya', 'https://www.halodoc.com/assets/img/app-page/specialised-care/icons/skin-health.png'),
(9, 'Imunisasi', 'Panduan vaksin anak-anak', 'https://d1e8la4lqf1h28.cloudfront.net/images/8a8a6d4a-5595-474f-a7e8-9ab78c431397_category_image_url.webp'),
(10, 'Perawatan THT', 'Pahami gejala & pilihan pengobatann', 'https://d1e8la4lqf1h28.cloudfront.net/images/270533_16-4-2020_22-31-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `spesialisasi`
--

CREATE TABLE `spesialisasi` (
  `id_spesialisasi` int(11) NOT NULL,
  `nama_spesialisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spesialisasi`
--

INSERT INTO `spesialisasi` (`id_spesialisasi`, `nama_spesialisasi`) VALUES
(0, ''),
(89820, 'Spesialisasi Obstertri dan Ginekologi'),
(89821, 'Spesialisasi Kesehatan Mental'),
(89822, 'Spesialisasi Kulit dan Kelamin'),
(89823, 'Spesialis Andrologi'),
(89824, 'Spesialis Urologi'),
(89825, 'Psikolog Klinis'),
(89826, 'Spesialisasi Gigi'),
(89828, 'Spesialis Jantung & Pembulu Darah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trx` int(11) NOT NULL,
  `tgl_trx` datetime NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `id_userr` int(11) NOT NULL,
  `tgl_janjian` datetime NOT NULL,
  `total_hrg` decimal(10,2) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trx`, `tgl_trx`, `id_layanan`, `id_user`, `username`, `id_userr`, `tgl_janjian`, `total_hrg`, `updated_at`, `created_at`) VALUES
(7, '2024-07-11 09:47:00', 4, NULL, 'Pasien', 9, '2024-07-29 02:47:00', '73000.00', '2024-07-10 19:47:21', '2024-07-10 19:47:21'),
(8, '2024-07-11 10:08:00', 5, NULL, 'ardi', 8, '2024-07-30 10:08:00', '120000.00', '2024-07-10 20:08:52', '2024-07-10 20:08:52'),
(9, '2024-07-11 14:28:00', 3, NULL, 'Pasien', 8, '2024-07-22 19:30:00', '100000.00', '2024-07-11 00:28:49', '2024-07-11 00:28:49'),
(10, '2024-07-11 15:01:00', 4, NULL, 'Pasien', 14, '2024-07-30 21:01:00', '73000.00', '2024-07-11 01:01:55', '2024-07-11 01:01:55'),
(11, '2024-07-23 19:56:00', 3, NULL, 'ardi', 14, '2024-07-22 19:56:00', '100000.00', '2024-07-11 05:57:05', '2024-07-11 05:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('doctor','user','admin') NOT NULL,
  `id_spesialisasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`, `id_spesialisasi`) VALUES
(3, 'admin', 'admin@gmail.com', 'admin', 'admin', 0),
(7, 'Dr. Mbatukam', 'mbatukam@dummy.com', 'ff', 'user', 0),
(8, 'A.D. Andriyanti, S.Psi., Psi', 'andynti23@dummy.com', 'ff', 'doctor', 89822),
(9, 'Dr. Abdul Azizi Sp.U', 'abd.aziz65@gmail.com', '123', 'doctor', 89821),
(11, 'Pasien', 'paaien1@gmail.com', '123', 'user', 0),
(12, 'satrio', 'satrio@hotmail.com', '123', 'admin', 0),
(13, 'tes', 'Ytf', '12', 'user', 0),
(14, 'dr. Abdul Halim Raynaldo, Sp.JP', 'halimray65@gmail.com', '123', 'doctor', 89828),
(15, 'ardi', 'ardi@gmail.com', '123', 'user', 0),
(16, 'drg.  Achmad Fanfani', 'fanfani.ach@dummy.com', 'fanfani', 'doctor', 89826);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_layanan`
--
ALTER TABLE `detail_layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `kategori_id` (`id_kategori`),
  ADD KEY `sip` (`id_spesialisasi`),
  ADD KEY `id_spesialisasi` (`id_spesialisasi`);

--
-- Indexes for table `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  ADD PRIMARY KEY (`id_spesialisasi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `layanan_id` (`id_layanan`,`id_user`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `userr_id` (`id_userr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_spesialisasi` (`id_spesialisasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_layanan`
--
ALTER TABLE `detail_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  MODIFY `id_spesialisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89829;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_layanan`
--
ALTER TABLE `detail_layanan`
  ADD CONSTRAINT `detail_layanan_ibfk_4` FOREIGN KEY (`id_spesialisasi`) REFERENCES `spesialisasi` (`id_spesialisasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_layanan_ibfk_5` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_layanan` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_userr`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_layanan`) REFERENCES `detail_layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_spesialisasi`) REFERENCES `spesialisasi` (`id_spesialisasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
