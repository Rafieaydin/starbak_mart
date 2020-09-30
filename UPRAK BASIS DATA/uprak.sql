-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2020 pada 14.00
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uprak`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dataobat` (IN `kode_obat` VARCHAR(5), IN `kode_jenis` VARCHAR(3), IN `nama_obat` VARCHAR(20), IN `harga_obat` INT(5), IN `bentuk_obat` VARCHAR(12), IN `kegunaan_obat` VARCHAR(30), IN `aturan_pakai` VARCHAR(10), IN `exp_date` DATE)  BEGIN
INSERT INTO obat VALUES (kode_obat, kode_jenis, nama_obat, harga_obat, bentuk_obat,
kegunaan_obat, aturan_pakai, exp_date);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totaltransaksi` ()  BEGIN 
SELECT id_apoteker,SUM(harga_total)
FROM apoteker GROUP BY id_apoteker;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `apoteker`
--

CREATE TABLE `apoteker` (
  `id_apoteker` varchar(10) NOT NULL,
  `Harga_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `apoteker`
--

INSERT INTO `apoteker` (`id_apoteker`, `Harga_total`) VALUES
('A0001', 17000),
('A0002', 38000),
('A0003', 65000),
('A0004', 45000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `bebasexp`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `bebasexp` (
`kode_obat` varchar(5)
,`kode_jenis` varchar(3)
,`nama_obat` varchar(20)
,`harga_obat` int(5)
,`bentuk_obat` varchar(12)
,`kegunaan_obat` varchar(30)
,`aturan_pakai` varchar(10)
,`exp_date` date
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(2) NOT NULL,
  `judul_buku` varchar(20) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `pengarang` varchar(20) DEFAULT NULL,
  `penerbit` varchar(20) DEFAULT NULL,
  `harga_siswa` int(10) DEFAULT NULL,
  `stat` varchar(10) DEFAULT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `kategori`, `pengarang`, `penerbit`, `harga_siswa`, `stat`, `Stock`) VALUES
('1', 'Pemograman Java', 'Komputer', 'Budi Reharjo', 'Gravindo', 5000, 'Free', 1),
('2', 'Satra Inggris', 'Bahasa', 'Lia Anelia', 'Flex Media', 2000, 'Free', 1),
('3', 'SQL Server', 'Komputer', 'Budi Jotniko', 'Gravindo', 3000, 'Dipinjam', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_obat`
--

CREATE TABLE `data_obat` (
  `kode_obat` varchar(5) NOT NULL,
  `kode_jenis` varchar(3) DEFAULT NULL,
  `nama_obat` varchar(20) DEFAULT NULL,
  `harga_obat` int(5) DEFAULT NULL,
  `bentuk_obat` varchar(12) DEFAULT NULL,
  `kegunaan_obat` varchar(30) DEFAULT NULL,
  `aturan_pakai` varchar(10) DEFAULT NULL,
  `exp_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_obat`
--

INSERT INTO `data_obat` (`kode_obat`, `kode_jenis`, `nama_obat`, `harga_obat`, `bentuk_obat`, `kegunaan_obat`, `aturan_pakai`, `exp_date`) VALUES
('B0001', 'J01', 'sannol', 8500, 'Sirup', 'Obar Demam', 'Diminum', '2017-04-16'),
('B0002', 'J01', 'Betadine', 12000, 'Cair', 'Antisoptik', 'Dioles', '2018-05-09'),
('B0003', 'J02', 'Amoxicillin', 500, 'Tablet', 'Antibiotik', 'Diminum', '2016-08-10'),
('B0004', 'J02', 'Terracortil', 2300, 'Salep', 'Obat kulit', 'Dioles', '2017-03-06'),
('B0005', 'J02', 'Tronbopop', 45000, 'Salep', 'Obat Lebam', 'Diminum', '2017-02-18'),
('B0006', 'J01', 'Mylanta', 9000, 'Sirup', 'Obat maag', 'Diminum', '2017-07-07'),
('B0007', 'J03', 'Ibuprofen', 15000, 'Obat tetes', 'Obat Asam Urat', 'Diusap', '2017-08-15'),
('B0008', 'J01', 'komix', 2500, 'Sirup', 'Batuk', 'Diminum', '0000-00-00'),
('B0009', 'J02', 'Alco', 65000, 'Sirup', 'Flu', 'Dinimun', '2017-07-25'),
('B0010', 'J01', 'Scots Emulsion', 24000, 'Sirup', 'Vitamin', 'Diminum', '2017-08-20'),
('B0011', 'J01', 'Tolak Angin', 2500, 'Sirup', 'Obat Mauk Angin', 'Diminum', '2018-10-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali`
--

CREATE TABLE `kembali` (
  `id_pengembalian` int(11) NOT NULL,
  `kode_buku` varchar(2) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kembali`
--

INSERT INTO `kembali` (`id_pengembalian`, `kode_buku`, `tgl_kembali`, `total_bayar`) VALUES
(1, '1', '2009-01-05', 25000),
(2, '2', '2009-04-20', 15000);

--
-- Trigger `kembali`
--
DELIMITER $$
CREATE TRIGGER `pngembalian` AFTER INSERT ON `kembali` FOR EACH ROW BEGIN
UPDATE buku SET stat='Free', Stock='1' WHERE kode_buku = NEW.kode_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_buku` varchar(2) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_peminjaman`, `kode_buku`, `tgl_pinjam`) VALUES
(1, '1', '2009-01-01'),
(2, '2', '2009-04-06');

--
-- Trigger `pinjam`
--
DELIMITER $$
CREATE TRIGGER `pinjaman` AFTER INSERT ON `pinjam` FOR EACH ROW BEGIN
UPDATE buku SET stat='Dipinjam', Stock='0' WHERE kode_buku = NEW.kode_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur untuk view `bebasexp`
--
DROP TABLE IF EXISTS `bebasexp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bebasexp`  AS  (select `data_obat`.`kode_obat` AS `kode_obat`,`data_obat`.`kode_jenis` AS `kode_jenis`,`data_obat`.`nama_obat` AS `nama_obat`,`data_obat`.`harga_obat` AS `harga_obat`,`data_obat`.`bentuk_obat` AS `bentuk_obat`,`data_obat`.`kegunaan_obat` AS `kegunaan_obat`,`data_obat`.`aturan_pakai` AS `aturan_pakai`,`data_obat`.`exp_date` AS `exp_date` from `data_obat` where `data_obat`.`exp_date` >= '2017-05-19') ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`id_apoteker`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
