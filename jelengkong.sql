-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 05:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jelengkong`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acara`
--

CREATE TABLE `tbl_acara` (
  `id` int(11) NOT NULL,
  `namaAcara` varchar(150) NOT NULL,
  `deskripsiAcara` text NOT NULL,
  `posterAcara` varchar(100) NOT NULL,
  `waktuAcara` datetime NOT NULL,
  `lokasiAcara` varchar(100) NOT NULL,
  `namaPenyelenggara` varchar(100) NOT NULL,
  `hargaTiket` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_acara`
--

INSERT INTO `tbl_acara` (`id`, `namaAcara`, `deskripsiAcara`, `posterAcara`, `waktuAcara`, `lokasiAcara`, `namaPenyelenggara`, `hargaTiket`, `status`) VALUES
(2, 'Garis Waktu', 'Garis Waktu', '261.jpg', '2020-05-16 10:10:00', 'Baleendah', 'Bandung Art', 50000, 'Y'),
(3, 'Pameran Karya Mahasiswa UPI', 'Pameran Karya Mahasiswa UPI', '242.png', '2020-05-12 14:00:00', 'UPI Bandung', 'UPI Bandung ', 0, 'Y'),
(4, 'Pameran Bergilir', 'Pameran Bergilir', '223.jpg', '2020-05-15 14:00:00', 'Jawa Barat', 'Jawa Barat', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portofolio`
--

CREATE TABLE `tbl_portofolio` (
  `id` int(11) NOT NULL,
  `namaLukisan` varchar(100) NOT NULL,
  `temaLukisan` varchar(100) NOT NULL,
  `gambarLukisan` varchar(100) NOT NULL,
  `deskripsiLukisan` text NOT NULL,
  `ukuranLukisan` varchar(100) NOT NULL,
  `mediaLukisan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `namaPenjual` varchar(100) NOT NULL,
  `idPelukis` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profil_desa`
--

CREATE TABLE `tbl_profil_desa` (
  `id` int(11) NOT NULL,
  `namaDesa` varchar(100) NOT NULL,
  `alamatDesa` varchar(150) NOT NULL,
  `emailDesa` varchar(100) NOT NULL,
  `noTelp` varchar(100) NOT NULL,
  `deskripsiDesa` text NOT NULL,
  `namaKepalaDesa` varchar(100) NOT NULL,
  `sambutanKades` text NOT NULL,
  `fotoKades` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_profil_desa`
--

INSERT INTO `tbl_profil_desa` (`id`, `namaDesa`, `alamatDesa`, `emailDesa`, `noTelp`, `deskripsiDesa`, `namaKepalaDesa`, `sambutanKades`, `fotoKades`) VALUES
(2, 'Jelengkong', '<div style=\"\"><font color=\"#939393\" face=\"opensans\"><span style=\"font-size: 16px;\">Jl Laswi Cangkring No 230, Kelurahan Jelengkong Kecamatan Baleendah', 'desawisatajelengkong@gmail.com', '081213654789', '<div>Desa Jelengkong merupakan sebuah kawasan di Kabupaten Bandung yang dikenal sebagai penghasil kerajinan lukisan dan wayang golek terkenal hingga mancanegara.</div><div><div><br></div><div>Adapun tema lukisan biasanya bertemakan :</div><div>Panorama Pedesaan</div><div>Pacuan Kuda, Ikan Koi &amp; hewan lain</div><div>Buah-buahan &amp; Sayuran</div><div>Kereta Kencana</div></div><div><br></div><div><div>Mayoritas warga Jelekong bermata pencaharian pelukis. Adapun lukisan yang terlihat di Jalan Braga merupakan karya lukisan seniman Jelekong. Namun, kukisan ini bukan hanya dipasarkan di Bandung melainkan juga ke luar pulau hingga mancanegara. Harga lukisannya pun terhitung terjangkau.</div></div><div><br></div>', 'Odin', '<span style=\"color: rgb(147, 147, 147); font-family: opensans; font-size: 16px;\">Assalamualaikum Wr.Wb&nbsp;</span><div><span style=\"color: rgb(147, 147, 147); font-family: opensans; font-size: 16px;\">Kampung Seni Jelekong Bandung ini dihuni oleh pelukis yang mendapat keahlian secara turun-temurun. Bermula sejak 1970 warga di kampung ini mulai dikenalkan dengan lukisan. Pelukis-pelukis di Kampung Seni Jelekong dikenal loyal. Seni melukis yang ditekuni, diturunkan dari generasi ke generasi.</span><br></div><div><span style=\"color: rgb(147, 147, 147); font-family: opensans; font-size: 16px;\">Saat ini, setidaknya ada sekitar dua ratus kepala keluarga di Kampung Jelekong yang menekuni bidang lukis. Mereka melukis sekaligus menjualnya. Harga lukisan karya warga Jelekong cukup terjangkau, tetapi kualitasnya tidak kalah dengan lukisan mahal karya pelukis terkenal.</span><span style=\"color: rgb(147, 147, 147); font-family: opensans; font-size: 16px;\"><br></span></div><div><font color=\"#939393\" face=\"opensans\"><span style=\"font-size: 16px;\">Maka dari itu, mari kita bersama lestarikan budaya bangsa dan cintai produk lokal dengan membeli lukisan karya anak bangsa melalui Website Jelengkong.&nbsp;</span></font></div><div><font color=\"#939393\" face=\"opensans\"><span style=\"font-size: 16px;\">Terimakasih,</span></font></div><div><font color=\"#939393\" face=\"opensans\"><span style=\"font-size: 16px;\">Wassalamualaikum Wr.Wb</span></font></div><div><span style=\"color: rgb(147, 147, 147); font-family: opensans; font-size: 16px;\"><br></span></div>', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tema`
--

CREATE TABLE `tbl_tema` (
  `id_tema` int(11) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tema`
--

INSERT INTO `tbl_tema` (`id_tema`, `tema`, `date_added`) VALUES
(9, 'Panorama Pedesaan', '2020-06-05 14:15:55'),
(10, 'Pacuan Kuda', '2020-06-05 14:16:12'),
(11, 'Ikan Koi & hewan lain', '2020-06-05 14:16:41'),
(12, 'Buah-buahan & Sayuran', '2020-06-05 14:16:53'),
(13, 'Kereta Kencana', '2020-06-05 14:18:10'),
(14, 'Abstrak', '2020-06-05 14:18:36'),
(15, 'Lainnya', '2020-06-05 14:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `idUser` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namaLengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `tentang` text NOT NULL,
  `fotoProfil` varchar(100) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`idUser`, `username`, `password`, `namaLengkap`, `email`, `nohp`, `tentang`, `fotoProfil`, `jk`, `role`) VALUES
('5ebf9d942e239', 'Admin', 'admin123', 'Admin', 'admin@gmail.com', '085692016693', 'Admin', '', 'Laki-Laki', 'admin'),
('5eda5bff82f9c', 'sutisna23', 'tisna', 'Sutisna', 'sutisna23@gmail.com', '081123456789', 'Pelukis', '', 'Laki-Laki', 'pelukis'),
('5edb04f1e0ef0', 'kendryayu', 'kendryayu', 'Kendry Ayu', 'kendryayu98@gmail.com', '0812319309103', 'Aku seorang pelukis', '', 'Perempuan', 'pelukis'),
('ae13190190810981iodias', 'sutisna', 'sutisna123', 'Sutisna', 'sutisna@gmail.com', '08671217361873', 'aku adalah pelukis', '', 'Laki-Laki', 'pelukis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acara`
--
ALTER TABLE `tbl_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_portofolio`
--
ALTER TABLE `tbl_portofolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPenjual` (`idPelukis`);

--
-- Indexes for table `tbl_profil_desa`
--
ALTER TABLE `tbl_profil_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tema`
--
ALTER TABLE `tbl_tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_acara`
--
ALTER TABLE `tbl_acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_portofolio`
--
ALTER TABLE `tbl_portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_profil_desa`
--
ALTER TABLE `tbl_profil_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tema`
--
ALTER TABLE `tbl_tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_portofolio`
--
ALTER TABLE `tbl_portofolio`
  ADD CONSTRAINT `tbl_portofolio_ibfk_1` FOREIGN KEY (`idPelukis`) REFERENCES `tbl_user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
