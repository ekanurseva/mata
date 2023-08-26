-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2023 pada 05.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `iddiagnosa` int(10) NOT NULL,
  `kode_diagnosa` varchar(10) NOT NULL,
  `nama_diagnosa` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`iddiagnosa`, `kode_diagnosa`, `nama_diagnosa`, `deskripsi`) VALUES
(1, 'P1', 'Katarak', 'Katarak merupakan salah satu penyakit mata yang membuat lensa mata berubah menjadi keruh dan berawan.'),
(2, 'P2', 'Konjungtivitis', 'Konjuntivitis merupakan suatu penyakit mata akibat peradangan pada selaput yang melapisi permukaan bola mata dan kelopak mata bagian dalam (konjungtiva mata), yang dapat menyebabkan mata menjadi merah, bengkak, dan berair.'),
(3, 'P3', 'Miopi', 'Miopi atau Rabun Jauh atau lebih dikenal dengan istilah Mata Minus, merupakan salah satu jenis kelainan refraksi mata, yang menyebabkan penderitanya tidak mampu melihat objek dalam jarak jauh dengan jelas.'),
(4, 'P4', 'Glaukoma', 'Glaukoma merupakan kerusakan pada saraf mata yang disebabkan karena tnggina tekanan pada mata, baik akibat produksi cairan mata yang berlebihan, maupun akibat terhalangnya saluran pembuangan cairan tersebut.'),
(5, 'P5', 'Buta Warna', 'Buta Warna merupakan ketidakmampuan mata dalam melihat warna secara normal. '),
(6, 'P6', 'Presbiopi', 'Presbiopi atau lebih dikenal dengan Mata Tua merupakan suatu keadaan dimana menurunnya kemampuan untuk melihat objek dalam jarak dekat secara bertahap. '),
(7, 'P7', 'Astigmatisme', 'Astigmatisme atau Mata Silinder merupakan gangguan penglihatan yang disebabkan karena cacat pada lengkungan lensa atau kornea.'),
(8, 'P8', 'Hipermetropi', 'Hipermetropi atau Rabun Dekat atau lebih dikenal dengan istilah Mata Plus merupakan gangguan penglihatan jarak dekat. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` int(11) NOT NULL,
  `iddiagnosa` int(10) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` text NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`idgejala`, `iddiagnosa`, `kode_gejala`, `nama_gejala`, `bobot`) VALUES
(1, 1, 'G1', 'Pandangan kabur seperti berkabut', 1),
(2, 1, 'G2', 'Melihat lingkaran disekeliling cahaya (halo)', 0.5),
(3, 1, 'G3', 'Pandangan ganda', 0.2),
(4, 1, 'G4', 'Warna sekitar terlihat memudar', 0.6),
(5, 1, 'G5', 'Rasa silau saat melihat cahaya', 0.4),
(6, 1, 'G6', 'Penurunan penglihatan di malam hari', 0.8),
(7, 2, 'G7', 'Mata merah', 1),
(8, 2, 'G8', 'Mata berair', 0.6),
(9, 2, 'G9', 'Mata belekan atau mengeluarkan kotoran', 0.8),
(10, 2, 'G10', 'Mata bengkak', 0.8),
(11, 3, 'G11', 'Sering memicingkan mata saat melihat benda jarak jauh', 0.6),
(12, 3, 'G12', 'Sakit kepala', 0.4),
(13, 3, 'G13', 'Penglihatan buram saat melihat benda jarah jauh', 1),
(14, 3, 'G14', 'Sering mengucek mata', 0.2),
(15, 4, 'G15', 'Melihat lingkaran disekeliling cahaya (halo)', 0.5),
(16, 4, 'G16', 'Mata merah', 0.7),
(17, 4, 'G17', 'Sakit kepala', 1),
(18, 4, 'G18', 'Mual dan muntah', 0.4),
(19, 5, 'G19', 'Sulit membedakan warna lalu lintas', 0.6),
(20, 5, 'G20', 'Sulit membedakan warna dan kecerahan warna', 0.8),
(21, 5, 'G21', 'Tidak dapat melihat warna dari spektrum solid seperti merah, biru, kuning, hijau dengan jelas', 0.4),
(22, 6, 'G22', 'Sakit kepala', 0.2),
(23, 6, 'G23', 'Berusia diatas 40 tahun', 1),
(24, 6, 'G24', 'Kesulitan membaca dengan huruf kecil', 0.8),
(25, 6, 'G25', 'Membutuhkan pencahayaan yang lebih terang ketika membaca', 0.6),
(26, 7, 'G26', 'Pandangan ganda', 0.6),
(27, 7, 'G27', 'Rasa silau saat melihat cahaya', 0.4),
(28, 7, 'G28', 'Penurunan penglihatan di malam hari', 0.2),
(29, 7, 'G29', 'Sakit kepala', 0.7),
(30, 7, 'G30', 'Penglihatan buram saat melihat benda jarah jauh', 0.7),
(31, 7, 'G31', 'Pandangan buram saat melihat objek jarak dekat', 0.2),
(32, 7, 'G32', 'Benda terlihat berubah bentuk (garis lurus seperti miring atau huruf  C seperti O)', 0.8),
(33, 8, 'G33', 'Sakit kepala', 0.2),
(34, 8, 'G34', 'Pandangan buram saat melihat objek jarak dekat', 1),
(35, 8, 'G35', 'Sering menyipitkan mata saat membaca', 0.6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `idhasil` int(10) NOT NULL,
  `iduser` int(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usia` int(10) NOT NULL,
  `cf_katarak` double NOT NULL,
  `bayes_katarak` double NOT NULL,
  `cf_konjungtivitis` double NOT NULL,
  `bayes_konjungtivitis` double NOT NULL,
  `cf_miopi` double NOT NULL,
  `bayes_miopi` double NOT NULL,
  `cf_glaukoma` double NOT NULL,
  `bayes_glaukoma` double NOT NULL,
  `cf_butawarna` double NOT NULL,
  `bayes_butawarna` double NOT NULL,
  `cf_presbiopi` double NOT NULL,
  `bayes_presbiopi` double NOT NULL,
  `cf_astigmatisme` double NOT NULL,
  `bayes_astigmatisme` double NOT NULL,
  `cf_hipermetropi` double NOT NULL,
  `bayes_hipermetropi` double NOT NULL,
  `cf_buwar` double DEFAULT NULL,
  `bayes_buwar` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`idhasil`, `iduser`, `tanggal`, `usia`, `cf_katarak`, `bayes_katarak`, `cf_konjungtivitis`, `bayes_konjungtivitis`, `cf_miopi`, `bayes_miopi`, `cf_glaukoma`, `bayes_glaukoma`, `cf_butawarna`, `bayes_butawarna`, `cf_presbiopi`, `bayes_presbiopi`, `cf_astigmatisme`, `bayes_astigmatisme`, `cf_hipermetropi`, `bayes_hipermetropi`, `cf_buwar`, `bayes_buwar`) VALUES
(2, 11, '2023-08-26 00:11:00', 12, 82.96, 71.83, 100, 100, 42.4, 31.67, 90.82, 75.66, 48.32, 71.43, 90.02, 67.65, 70.95, 50.4, 80.39, 80.74, NULL, NULL),
(5, 13, '2023-08-26 03:31:29', 22, 67.06, 67.66, 86.8, 91.11, 53.6, 47.1, 56.8, 52.35, 71.6, 60.78, 88.4, 73.11, 82.85, 60, 100, 85, NULL, NULL),
(6, 13, '2023-08-26 03:32:12', 22, 99.19, 69.39, 100, 85.63, 100, 76.18, 93.52, 66.6, 0, 0, 8, 20, 96.84, 58.78, 100, 94.07, NULL, NULL),
(7, 16, '2023-08-26 03:34:18', 12, 83.72, 70, 80.64, 80, 100, 77.84, 85.6, 73.85, 79.94, 62.67, 85.04, 77.78, 98.6, 67.26, 85.04, 77.78, NULL, NULL),
(8, 16, '2023-08-26 03:35:49', 12, 79.65, 54.38, 100, 85.04, 100, 76, 100, 91.72, 42.88, 66.67, 98.08, 75.65, 97.69, 57.92, 100, 79.75, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `idjawaban` int(11) NOT NULL,
  `bobot` double NOT NULL,
  `kode_jawaban` varchar(20) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`idjawaban`, `bobot`, `kode_jawaban`, `jawaban`) VALUES
(1, 1, 'SS', 'Sangat Sering'),
(2, 0.7, 'S', 'Sering'),
(3, 0.4, 'J', 'Jarang'),
(4, 0, 'TP', 'Tidak Pernah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idpertanyaan` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL,
  `kode_pertanyaan` varchar(10) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `solusi`
--

CREATE TABLE `solusi` (
  `idsolusi` int(11) NOT NULL,
  `iddiagnosa` int(11) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`idsolusi`, `iddiagnosa`, `solusi`) VALUES
(1, 1, 'Operasi sayatan kecil (Fakoemulsifikasi)'),
(2, 1, 'Operasi sayatan besar (Ekstralsi Katarak Ekstrakapsular)'),
(3, 1, 'Operasi laser femtosecond'),
(4, 2, 'Konjungtivitis bakteri diatasi dengan antibiotik'),
(5, 2, 'Konjungtuvitis alergi diatasi dengan obat antialergi.'),
(6, 2, 'Konjungtivitis virus akan sembuh dengan sendirinya. Namun, dapat dilakukan dengan pemberian obat tetes mata untuk meredakan gejala.\r\n'),
(7, 3, 'Penggunaan kacamata atau soft lens'),
(8, 3, 'Operasi dengan sinar laser (LASIK)\r\n'),
(9, 3, 'Implan lensa buatan'),
(10, 4, 'Penggunaan obat tetes mata\r\n\r\n'),
(11, 4, 'Obat oral'),
(12, 4, 'Laser'),
(13, 4, 'Operasi'),
(15, 5, 'Penggunaan kacamata atau soft lens khusus'),
(16, 5, 'Menggunakan aplikasi khusus untuk mengidentifikasi warna\r\n'),
(17, 6, 'Penggunaan kacamata atau soft lens\r\n'),
(18, 6, 'Operasi dengan sinar laser (LASIK)\r\n'),
(19, 6, 'Implan lensa buatan'),
(20, 7, 'Penggunaan kacamata atau soft lens\r\n\r\n'),
(21, 7, 'Orthokeratologi\r\n'),
(22, 7, 'Operasi dengan sinar laser (LASIK)'),
(23, 8, 'Penggunaan kacamata atau soft lens\r\n'),
(24, 8, 'Operasi dengan sinar laser (LASIK)\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jk` char(2) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`, `jk`, `tanggal_lahir`, `email`, `level`, `foto`) VALUES
(9, 'bubu', '$2y$10$IUt5E/huR8FrO', 'Bubu', 'P', '1212-12-12', 'bubu@gmail.com', 'admin', 'admin.png'),
(10, 'eka', '$2y$10$4ZaIpcV2E7kbvCTBI9z6o.HPVf1WDx8bbG4Fu2owx6i1F/iiTmSJC', 'Eka Nurseva', 'P', '2010-08-11', 'ekanursevas@gmail.com', 'admin', 'admin.png'),
(11, 'ali', '$2y$10$CPMTNQlf16TGlOwFly.12ORgi/OfOj8kiMHZ7nS97Rm4ti2IHbXbq', 'Ali Asyidiqiansyah', 'L', '2011-11-25', 'aliasss@gmail.com', 'user', 'admin.png'),
(12, 'rara', '$2y$10$KKZdVp9Sp95OBBk11Xc7su0e5930p/98bwvGE2WOvj9DyI982p3PS', 'Ira Khumairotunnisa', 'P', '2001-11-11', 'khumairo21@gmail.com', 'admin', 'propil.png'),
(13, 'ira25', '$2y$10$IZ1PyZMu/A2ZWL3/wnfFjesP/NgtySXezg7IbnOvhFfROcHGTGBd.', 'ira', 'P', '2001-05-25', 'khumairo21@gmail.com', 'user', 'propil.png'),
(16, 'upi', '$2y$10$6kD0Px72g3iqio0XtnMSouAyEEmjuVlWhOvDcj3zjC.9nVoqptWTC', 'Upi', 'L', '2011-07-12', 'upi@gmail.com', 'user', 'propil.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`iddiagnosa`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`),
  ADD KEY `iddiagnosa` (`iddiagnosa`);

--
-- Indeks untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`idhasil`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`idjawaban`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`idpertanyaan`),
  ADD KEY `idgejala` (`idgejala`);

--
-- Indeks untuk tabel `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`idsolusi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `iddiagnosa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `idhasil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `idjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `idpertanyaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `solusi`
--
ALTER TABLE `solusi`
  MODIFY `idsolusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD CONSTRAINT `gejala_ibfk_1` FOREIGN KEY (`iddiagnosa`) REFERENCES `diagnosa` (`iddiagnosa`);

--
-- Ketidakleluasaan untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD CONSTRAINT `hasil_diagnosa_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Ketidakleluasaan untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`idgejala`) REFERENCES `gejala` (`idgejala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
