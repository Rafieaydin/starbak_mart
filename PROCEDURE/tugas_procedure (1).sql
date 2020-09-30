-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2020 pada 10.06
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
-- Database: `tugas_procedure`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `barang` (`pelanggan` VARCHAR(5))  BEGIN 
SELECT MAX(barang.stock)
FROM barang
WHERE id_brng=pelanggan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Jbarang` (`pelanggan` VARCHAR(5))  BEGIN 
SELECT MAX(barang.stock)
FROM barang
WHERE id_brng=pelanggan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlahbarang` (`pelanggan` VARCHAR(5))  BEGIN 
SELECT SUM(beli.stock)
FROM beli
WHERE id_pel=pelanggan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlahbrg` (`pelanggan` VARCHAR(5))  BEGIN 
SELECT MAX(barang.stock)
FROM barang
WHERE id_brng=pelanggan;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_brng` varchar(5) NOT NULL,
  `nama_brng` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_brng`, `nama_brng`, `stock`) VALUES
('B01', 'Mouse', 34),
('B02', 'Headset', 66),
('B03', 'Keboard', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `id_pel` varchar(5) NOT NULL,
  `id_brng` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`id_pel`, `id_brng`, `stock`) VALUES
('P01', 'B01', 8),
('P02', 'B02', 2),
('P03', 'B03', 1);

--
-- Trigger `beli`
--
DELIMITER $$
CREATE TRIGGER `bonus` BEFORE INSERT ON `beli` FOR EACH ROW BEGIN
IF (NEW.stock>=5) THEN
SET NEW.stock=NEW.stock+1;
END IF;
IF (NEW.stock>=10) THEN
SET NEW.stock=NEW.stock+2;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pembonusan` AFTER INSERT ON `beli` FOR EACH ROW BEGIN
UPDATE barang SET
stock = stock - NEW.stock
WHERE
id_brng= NEW.id_brng;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brng`);

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_pel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
