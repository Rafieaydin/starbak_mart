-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2020 pada 10.30
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
-- Database: `tugas_film`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `costumer`
--

CREATE TABLE `costumer` (
  `no_identitas` varchar(10) DEFAULT NULL,
  `jenis_identitas` varchar(10) DEFAULT NULL,
  `nama` varchar(10) DEFAULT NULL,
  `alamat` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `costumer`
--

INSERT INTO `costumer` (`no_identitas`, `jenis_identitas`, `nama`, `alamat`) VALUES
('01', 'SIM', 'Andi', 'Pontianak'),
('02', 'SIM', 'Budi', 'Pontianak');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_plg`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_plg` (
`kode_sewa` varchar(10)
,`No_identitas` varchar(10)
,`tot_hrg` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_newa`
--

CREATE TABLE `detail_newa` (
  `kode_sewa` varchar(10) DEFAULT NULL,
  `kode_film` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_newa`
--

INSERT INTO `detail_newa` (`kode_sewa`, `kode_film`) VALUES
('S0001', 'A01'),
('S0001', 'A02'),
('S0002', 'D01'),
('S0003', 'A02'),
('S0003', 'D01'),
('S0003', 'H01');

--
-- Trigger `detail_newa`
--
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `detail_newa` FOR EACH ROW BEGIN UPDATE 
film SET 
jml_film = jml_film + 1 
WHERE kode_film = OLD.kode_film; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jual_film` AFTER INSERT ON `detail_newa` FOR EACH ROW BEGIN UPDATE 
film SET 
jml_film = jml_film - 1 
WHERE kode_film = NEW.kode_film; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `kode_film` varchar(10) NOT NULL,
  `jenis` varchar(10) DEFAULT NULL,
  `judul` varchar(20) NOT NULL,
  `jml_keping` int(11) DEFAULT NULL,
  `jml_film` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`kode_film`, `jenis`, `judul`, `jml_keping`, `jml_film`) VALUES
('A01', 'action', 'Spiderman', 2, 3),
('A02', 'action', 'Spiderman 2', 2, 5),
('D01', 'drama', 'Love Story', 2, 3),
('H01', 'horor', 'Evil Death', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_film`
--

CREATE TABLE `kelompok_film` (
  `jenis` varchar(10) NOT NULL,
  `harga_sewa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelompok_film`
--

INSERT INTO `kelompok_film` (`jenis`, `harga_sewa`) VALUES
('action', 3000),
('drama', 3500),
('Gore', 3000),
('horor', 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menywa`
--

CREATE TABLE `menywa` (
  `kode_sewa` varchar(10) DEFAULT NULL,
  `no_identitas` varchar(10) NOT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `tot_film` int(11) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tot_hrg` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menywa`
--

INSERT INTO `menywa` (`kode_sewa`, `no_identitas`, `tgl_sewa`, `tot_film`, `tgl_kembali`, `tot_hrg`, `denda`) VALUES
('S0001', '01', '2007-01-01', 2, '2007-01-02', 6000, 0),
('S0002', '02', '2007-01-03', 1, '2007-01-03', 3000, 0),
('S0003', '01', '2007-01-06', 2, '2007-01-08', 9500, 0);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `transaksi` (
`kode_sewa` varchar(10)
,`kode_film` varchar(10)
,`no_identitas` varchar(10)
,`tgl_sewa` date
,`tgl_kembali` date
);

-- --------------------------------------------------------

--
-- Struktur untuk view `data_plg`
--
DROP TABLE IF EXISTS `data_plg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_plg`  AS  (select `menywa`.`kode_sewa` AS `kode_sewa`,`menywa`.`no_identitas` AS `No_identitas`,`menywa`.`tot_hrg` AS `tot_hrg` from `menywa`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `transaksi`
--
DROP TABLE IF EXISTS `transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksi`  AS  (select `menywa`.`kode_sewa` AS `kode_sewa`,`detail_newa`.`kode_film` AS `kode_film`,`costumer`.`no_identitas` AS `no_identitas`,`menywa`.`tgl_sewa` AS `tgl_sewa`,`menywa`.`tgl_kembali` AS `tgl_kembali` from ((`menywa` join `detail_newa`) join `costumer`) where `menywa`.`kode_sewa` = `detail_newa`.`kode_sewa` and `costumer`.`no_identitas` = `menywa`.`no_identitas` group by `menywa`.`kode_sewa`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `costumer`
--
ALTER TABLE `costumer`
  ADD KEY `no_identitas` (`no_identitas`);

--
-- Indeks untuk tabel `detail_newa`
--
ALTER TABLE `detail_newa`
  ADD KEY `kode_sewa` (`kode_sewa`),
  ADD KEY `kode_film` (`kode_film`);

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`kode_film`),
  ADD KEY `jenis` (`jenis`);

--
-- Indeks untuk tabel `kelompok_film`
--
ALTER TABLE `kelompok_film`
  ADD PRIMARY KEY (`jenis`);

--
-- Indeks untuk tabel `menywa`
--
ALTER TABLE `menywa`
  ADD KEY `kode_sewa` (`kode_sewa`),
  ADD KEY `no_identias` (`no_identitas`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `costumer`
--
ALTER TABLE `costumer`
  ADD CONSTRAINT `costumer_ibfk_1` FOREIGN KEY (`no_identitas`) REFERENCES `menywa` (`no_identitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_newa`
--
ALTER TABLE `detail_newa`
  ADD CONSTRAINT `detail_newa_ibfk_1` FOREIGN KEY (`kode_film`) REFERENCES `film` (`kode_film`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`jenis`) REFERENCES `kelompok_film` (`jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menywa`
--
ALTER TABLE `menywa`
  ADD CONSTRAINT `menywa_ibfk_1` FOREIGN KEY (`kode_sewa`) REFERENCES `detail_newa` (`kode_sewa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
