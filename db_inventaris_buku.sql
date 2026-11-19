-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2026 at 01:48 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `judul_buku` varchar(150) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `tahun_terbit` int NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis`, `tahun_terbit`, `kategori`) VALUES
(3, 'Laskar Pelangi', 'Andrea Hirata', 2005, 'Novel'),
(4, 'Bumi', 'Tere Liye', 2014, 'Fantasi'),
(5, 'Negeri 5 Menara', 'Ahmad Fuadi', 2009, 'Novel'),
(6, 'Filosofi Teras', 'Henry Manampiring', 2018, 'Filsafat'),
(7, 'Laut Bercerita', 'Leila S. Chudori', 2017, 'Sastra'),
(8, 'Atomic Habits', 'James Clear', 2018, 'Pengembangan Diri'),
(9, 'Rich Dad Poor Dad', 'Robert T. Kiyosaki', 1997, 'Bisnis'),
(10, 'The Psychology of Money', 'Morgan Housel', 2020, 'Keuangan'),
(11, 'Bumi Manusia', 'Pramoedya Ananta Toer', 1980, 'Sejarah'),
(12, 'Pemrograman Web dengan PHP dan MySQL', 'Madcoms', 2016, 'Teknologi'),
(13, 'Langit Mengambil', 'Ika Natassa', 2026, 'Novel'),
(14, 'Seporsi Mie Ayam Sebelum Mati', 'Brian Khrisna', 2025, 'Novel'),
(15, 'Putri Cina', 'Sindhunata', 2026, 'Novel'),
(16, 'Kekasih Musim Gugur', 'Laksmi Pamuntjak', 2026, 'Sastra'),
(17, 'O', 'Eka Kurniawan', 2026, 'Sastra'),
(18, '86', 'Okky Madasari', 2025, 'Novel'),
(19, 'Kerumunan Terakhir', 'Okky Madasari', 2025, 'Novel'),
(20, 'Yang Bertahan dan Binasa Perlahan', 'Okky Madasari', 2025, 'Novel'),
(21, 'Entrok', 'Okky Madasari', 2025, 'Novel'),
(22, 'Amba', 'Laksmi Pamuntjak', 2025, 'Novel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
