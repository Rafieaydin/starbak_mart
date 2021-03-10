-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2021 pada 07.07
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
-- Database: `uji_level`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CekBarangKejual` (IN `namaBarang` VARCHAR(20))  BEGIN
SELECT 
stockbarang.nama AS nama_barang, 
SUM(orderbarang.stock) AS total_kejual, 
SUM(orderbarang.stock) * stockbarang.harga AS total_harga
FROM orderbarang, stockbarang
WHERE orderbarang.barang_id = stockbarang.id
AND stockbarang.nama = namaBarang;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CekStockBarang` (IN `val` VARCHAR(20))  BEGIN
SELECT nama,stock,harga,created_at FROM stockbarang WHERE nama = val ;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `CekPenjualan` (`barang` VARCHAR(20)) RETURNS VARCHAR(100) CHARSET utf8mb4 BEGIN
DECLARE stock int;
SELECT COUNT(*) INTO stock FROM orderbarang,stockbarang
WHERE orderbarang.barang_id = stockbarang.id 
AND stockbarang.nama = barang; 
IF(stock>1)THEN
RETURN 
CONCAT("Total penjualan ",barang," adalah ",stock," Buah");
ELSE
RETURN "Anda belum menjual satu pun dari barang ini";
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `belibarang`
--

CREATE TABLE `belibarang` (
  `id` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `belibarang`
--

INSERT INTO `belibarang` (`id`, `jumlah_barang`, `total_harga`, `created_at`) VALUES
(507, 9, 68594, '2021-03-08 00:40:43'),
(508, 4, 72000, '2021-03-08 00:42:40'),
(509, 2, 36000, '2021-03-08 01:05:16'),
(510, 5, 18072, '2021-03-08 01:16:34'),
(511, 2, 36000, '2021-03-08 01:23:13'),
(512, 2, 36000, '2021-03-08 01:24:53'),
(513, 1, 18000, '2021-03-08 01:24:57'),
(514, 5, 36054, '2021-03-08 02:06:22'),
(515, 3, 36018, '2021-03-08 03:08:27'),
(516, 0, 0, '0000-00-00 00:00:00'),
(517, 0, 0, '0000-00-00 00:00:00'),
(518, 0, 0, '0000-00-00 00:00:00'),
(519, 0, 0, '0000-00-00 00:00:00'),
(520, 0, 0, '0000-00-00 00:00:00'),
(521, 0, 0, '0000-00-00 00:00:00'),
(522, 0, 0, '0000-00-00 00:00:00'),
(523, 0, 0, '0000-00-00 00:00:00'),
(524, 1, 18000, '2021-03-08 05:14:35'),
(525, 3, 54000, '2021-03-08 05:14:57'),
(526, 3, 54000, '2021-03-08 05:15:06'),
(527, 57, 378000, '2021-03-08 06:31:31'),
(528, 27, 14742000, '2021-03-08 06:51:04'),
(529, 22, 39600000, '2021-03-08 06:56:23'),
(530, 6, 108000, '2021-03-08 07:29:42'),
(531, 3, 54000, '2021-03-08 07:34:42'),
(532, 2, 40000, '2021-03-08 07:40:57'),
(533, 2, 40000, '2021-03-08 07:41:04'),
(534, 3, 60000, '2021-03-08 07:44:17'),
(535, 7, 95000, '2021-03-08 08:31:21'),
(536, 4, 60000, '2021-03-08 08:31:26'),
(537, 4, 60000, '2021-03-08 08:59:49'),
(538, 5, 80000, '2021-03-08 17:07:08'),
(539, 1, 4500, '2021-03-08 17:10:07'),
(540, 0, 0, '2021-03-08 18:06:53'),
(541, 1, 20000, '2021-03-08 18:54:05'),
(542, 1, 20000, '2021-03-08 18:55:09'),
(543, 4, 80000, '2021-03-08 19:01:30'),
(544, 0, 0, '0000-00-00 00:00:00'),
(545, 0, 0, '0000-00-00 00:00:00'),
(546, 0, 0, '0000-00-00 00:00:00'),
(547, 0, 0, '0000-00-00 00:00:00'),
(548, 0, 0, '0000-00-00 00:00:00'),
(549, 0, 0, '0000-00-00 00:00:00'),
(550, 0, 0, '0000-00-00 00:00:00'),
(551, 0, 0, '0000-00-00 00:00:00'),
(552, 0, 0, '0000-00-00 00:00:00'),
(553, 0, 0, '0000-00-00 00:00:00'),
(554, 0, 0, '0000-00-00 00:00:00'),
(555, 0, 0, '0000-00-00 00:00:00'),
(556, 5, 43000, '2021-03-08 19:38:06'),
(557, 3, 15000, '2021-03-08 19:49:03'),
(558, 1, 4500, '2021-03-08 19:55:02'),
(559, 1, 900, '2021-03-08 20:04:51'),
(560, 0, 0, '0000-00-00 00:00:00'),
(561, 1, 20000, '2021-03-08 20:08:32'),
(562, 2, 9000, '2021-03-08 20:08:52'),
(563, 0, 0, '0000-00-00 00:00:00'),
(564, 0, 0, '0000-00-00 00:00:00'),
(565, 0, 0, '0000-00-00 00:00:00'),
(566, 2, 9000, '2021-03-08 20:13:35'),
(567, 1, 900, '2021-03-08 20:25:27'),
(568, 1, 900, '2021-03-08 20:25:32'),
(569, 1, 900, '2021-03-08 20:25:41'),
(570, 1, 900, '2021-03-08 20:25:45'),
(571, 1, 900, '2021-03-08 20:25:48'),
(572, 1, 900, '2021-03-08 20:26:01'),
(573, 1, 900, '2021-03-08 20:26:04'),
(574, 1, 900, '2021-03-08 20:26:46'),
(575, 1, 900, '2021-03-08 20:26:58'),
(576, 1, 900, '2021-03-08 20:27:30'),
(577, 1, 900, '2021-03-08 20:27:35'),
(578, 1, 900, '2021-03-08 20:27:46'),
(579, 1, 900, '2021-03-08 20:27:54'),
(580, 1, 900, '2021-03-08 20:27:58'),
(581, 1, 900, '2021-03-08 20:28:08'),
(582, 0, 0, '0000-00-00 00:00:00'),
(583, 0, 0, '0000-00-00 00:00:00'),
(584, 0, 0, '0000-00-00 00:00:00'),
(585, 0, 0, '0000-00-00 00:00:00'),
(586, 0, 0, '0000-00-00 00:00:00'),
(587, 0, 0, '0000-00-00 00:00:00'),
(588, 0, 0, '0000-00-00 00:00:00'),
(589, 0, 0, '0000-00-00 00:00:00'),
(590, 0, 0, '0000-00-00 00:00:00'),
(591, 0, 0, '0000-00-00 00:00:00'),
(592, 0, 0, '0000-00-00 00:00:00'),
(593, 0, 0, '0000-00-00 00:00:00'),
(594, 0, 0, '0000-00-00 00:00:00'),
(595, 0, 0, '0000-00-00 00:00:00'),
(596, 0, 0, '0000-00-00 00:00:00'),
(597, 0, 0, '0000-00-00 00:00:00'),
(598, 0, 0, '0000-00-00 00:00:00'),
(599, 0, 0, '0000-00-00 00:00:00'),
(600, 0, 0, '0000-00-00 00:00:00'),
(601, 0, 0, '0000-00-00 00:00:00'),
(602, 0, 0, '0000-00-00 00:00:00'),
(603, 0, 0, '0000-00-00 00:00:00'),
(604, 0, 0, '0000-00-00 00:00:00'),
(605, 0, 0, '0000-00-00 00:00:00'),
(606, 0, 0, '0000-00-00 00:00:00'),
(607, 0, 0, '0000-00-00 00:00:00'),
(608, 0, 0, '0000-00-00 00:00:00'),
(609, 0, 0, '0000-00-00 00:00:00'),
(610, 0, 0, '0000-00-00 00:00:00'),
(611, 0, 0, '0000-00-00 00:00:00'),
(612, 1, 900, '2021-03-08 20:29:53'),
(613, 0, 0, '0000-00-00 00:00:00'),
(614, 0, 0, '0000-00-00 00:00:00'),
(615, 1, 20000, '2021-03-08 20:31:34'),
(616, 1, 20000, '2021-03-08 20:35:57'),
(617, 1, 20000, '2021-03-08 20:36:01'),
(618, 1, 20000, '2021-03-08 21:10:06'),
(619, 1, 20000, '2021-03-08 21:10:45'),
(620, 1, 20000, '2021-03-08 21:10:50'),
(621, 0, 0, '0000-00-00 00:00:00'),
(622, 0, 0, '0000-00-00 00:00:00'),
(623, 0, 0, '0000-00-00 00:00:00'),
(624, 2, 40000, '2021-03-08 21:12:41'),
(625, 0, 0, '0000-00-00 00:00:00'),
(626, 1, 20000, '2021-03-08 21:12:50'),
(627, 0, 0, '0000-00-00 00:00:00'),
(628, 1, 20000, '2021-03-08 21:13:08'),
(629, 1, 0, '2021-03-08 21:22:30'),
(630, 1, 0, '2021-03-08 21:22:36'),
(631, 1, 0, '2021-03-08 21:22:38'),
(632, 1, 0, '2021-03-08 21:22:41'),
(633, 1, 0, '2021-03-08 21:22:43'),
(634, 1, 0, '2021-03-08 21:30:26'),
(635, 1, 0, '2021-03-08 21:35:38'),
(636, 4, 60000, '2021-03-08 21:35:56'),
(637, 2, 40000, '2021-03-08 21:36:20'),
(638, 3, 30000, '2021-03-08 21:55:01'),
(639, 1, 9000, '2021-03-08 21:55:11'),
(640, 1, 9000, '2021-03-08 21:55:16'),
(641, 1, 18000, '2021-03-08 22:30:21'),
(642, 1, 18000, '2021-03-08 22:30:31'),
(643, 9, 90000, '2021-03-09 00:22:15'),
(644, 9, 90000, '2021-03-09 01:37:15'),
(645, 3, 30000, '2021-03-09 01:37:37'),
(646, 2, 20000, '2021-03-09 01:37:52'),
(647, 2, 20000, '2021-03-09 01:38:05'),
(648, 3, 30000, '2021-03-09 01:38:14'),
(649, 2, 20000, '2021-03-09 01:38:52'),
(650, 4, 40000, '2021-03-09 01:39:10'),
(651, 8, 80000, '2021-03-09 01:39:52'),
(652, 5, 52000, '2021-03-09 01:45:48'),
(653, 21, 3364000, '2021-03-09 01:51:05'),
(654, 4, 40000, '2021-03-09 19:31:27'),
(655, 4, 54000, '2021-03-09 19:31:43'),
(656, 9, 113000, '2021-03-10 00:01:27'),
(657, 5, 9000, '2021-03-10 00:04:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderbarang`
--

CREATE TABLE `orderbarang` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `belibarang_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orderbarang`
--

INSERT INTO `orderbarang` (`id`, `barang_id`, `belibarang_id`, `stock`, `created_at`) VALUES
(202, 71, 638, 3, '2021-03-08 21:55:01'),
(203, 71, 639, 1, '2021-03-08 21:55:11'),
(204, 71, 640, 1, '2021-03-08 21:55:16'),
(205, 77, 641, 1, '2021-03-08 22:30:21'),
(206, 77, 642, 1, '2021-03-08 22:30:31'),
(207, 71, 643, 5, '2021-03-09 00:22:15'),
(208, 72, 643, 4, '2021-03-09 00:22:15'),
(209, 71, 644, 5, '2021-03-09 01:37:15'),
(210, 75, 644, 4, '2021-03-09 01:37:15'),
(211, 71, 645, 3, '2021-03-09 01:37:37'),
(212, 71, 646, 2, '2021-03-09 01:37:52'),
(213, 72, 647, 2, '2021-03-09 01:38:05'),
(214, 75, 648, 1, '2021-03-09 01:38:14'),
(215, 72, 648, 2, '2021-03-09 01:38:14'),
(216, 72, 649, 2, '2021-03-09 01:38:52'),
(217, 73, 650, 2, '2021-03-09 01:39:10'),
(218, 74, 650, 2, '2021-03-09 01:39:10'),
(219, 73, 651, 4, '2021-03-09 01:39:52'),
(220, 74, 651, 4, '2021-03-09 01:39:52'),
(221, 73, 652, 2, '2021-03-09 01:45:48'),
(222, 78, 652, 3, '2021-03-09 01:45:48'),
(223, 75, 653, 1, '2021-03-09 01:51:05'),
(224, 86, 653, 18, '2021-03-09 01:51:05'),
(225, 78, 653, 2, '2021-03-09 01:51:05'),
(226, 73, 654, 2, '2021-03-09 19:31:27'),
(227, 74, 654, 2, '2021-03-09 19:31:27'),
(228, 74, 655, 2, '2021-03-09 19:31:43'),
(229, 78, 655, 1, '2021-03-09 19:31:43'),
(230, 77, 655, 1, '2021-03-09 19:31:43'),
(231, 75, 656, 5, '2021-03-10 00:01:27'),
(232, 76, 656, 3, '2021-03-10 00:01:27'),
(233, 77, 656, 1, '2021-03-10 00:01:27'),
(234, 85, 657, 5, '2021-03-10 00:04:17');

--
-- Trigger `orderbarang`
--
DELIMITER $$
CREATE TRIGGER `after_insert_databeli` AFTER INSERT ON `orderbarang` FOR EACH ROW BEGIN
	UPDATE stockbarang 
    SET stockbarang.stock = stockbarang.stock - new.stock WHERE stockbarang.id = new.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `apusbarang` AFTER DELETE ON `orderbarang` FOR EACH ROW BEGIN
UPDATE stockbarang
SET
stockbarang.stock = stockbarang.stock + old.stock WHERE stockbarang.id = OLD.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockbarang`
--

CREATE TABLE `stockbarang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stockbarang`
--

INSERT INTO `stockbarang` (`id`, `nama`, `harga`, `stock`, `gambar`, `created_at`) VALUES
(71, 'Sate padang', 10000, 0, 'http://kbu-cdn.com/dk/wp-content/uploads/sate-kakul.jpg', '2021-03-09 07:37:53'),
(72, 'Tempe Goreng', 10000, 0, 'https://asset.kompas.com/crops/iEJb6R_R0VbEDp59hCH4DzgvxxE=/0x41:1000x708/750x500/data/photo/2020/04/01/5e841eccea33c.jpg', '2021-03-09 07:38:52'),
(73, 'Bakso kuah', 8000, 0, 'https://statik.tempo.co/data/2018/06/03/id_709908/709908_720.jpg', '2021-03-10 01:31:27'),
(74, 'Martabak', 12000, 20, 'http://asset-a.grid.id/crop/0x0:0x0/x/photo/2018/06/12/32757420.jpg', '2021-03-10 01:31:43'),
(75, 'Kentang Goreng', 10000, 9, 'https://img.okezone.com/content/2018/07/11/298/1920897/membuat-kentang-goreng-rumahan-serenyah-di-restoran-PzeLEom9j8.jpg', '2021-03-10 06:01:27'),
(76, 'Mie goreng', 15000, 7, 'http://kbu-cdn.com/dk/wp-content/uploads/mie-goreng-saus-tiram.jpg', '2021-03-10 06:01:27'),
(77, 'Kwetiau goreng', 18000, 8, 'https://www.masakapahariini.com/wp-content/uploads/2020/09/kwetiau-goreng-seafood-780x440.jpg', '2021-03-10 06:01:27'),
(78, 'Iga Goreng', 12000, 4, 'https://cdn-2.tstatic.net/jogja/foto/bank/images/iga-bakar-sapi.jpg', '2021-03-10 01:31:43'),
(79, 'Siomay', 6000, 8, 'http://kbu-cdn.com/dk/wp-content/uploads/siomay-praktis.jpg', '2021-03-08 22:33:29'),
(80, 'Siomay Bakar', 18000, 13, 'http://kbu-cdn.com/dk/wp-content/uploads/cilok-bakar.jpg', '2021-03-08 22:34:25'),
(81, 'Burger', 17000, 10, 'https://www.rukita.co/stories/wp-content/uploads/2020/02/byurger.jpg', '2021-03-09 04:45:00'),
(82, 'Pizza', 12000, 10, 'https://www.kabarbisnis.com/images/picture/202010/754-PizzaHut.jpg', '2021-03-08 17:00:00'),
(83, 'Cilok', 5000, 20, 'https://img.inews.co.id/media/822/files/inews_new/2020/03/30/IMG_30032020_182439__822_x_430_piksel_.jpg', '2021-03-08 17:00:00'),
(84, 'Nasi goreng', 10000, 7, 'https://www.denpasarkota.go.id/uploads/datang/datang_192709040901_5WarungNasiGorengLezatdenganHargayangBersahabat.jpg', '2021-03-08 17:00:00'),
(85, 'Kripik Singkong', 2000, 5, 'https://asset.kompas.com/crops/-J7WiKZ7PvZGagZz-F3AJrI_4S8=/0x46:700x513/750x500/data/photo/2020/08/24/5f43a77a3c43e.jpg', '2021-03-10 06:04:17'),
(86, 'Dimsum', 185000, 0, 'https://asset.kompas.com/crops/DEDxeclyBPPZ2miRZhxGFJxhHU0=/0x175:800x708/750x500/data/photo/2021/01/18/60053789dc100.jpg', '2021-03-09 07:51:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `belibarang`
--
ALTER TABLE `belibarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orderbarang`
--
ALTER TABLE `orderbarang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `belibarang_id` (`belibarang_id`);

--
-- Indeks untuk tabel `stockbarang`
--
ALTER TABLE `stockbarang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `belibarang`
--
ALTER TABLE `belibarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658;

--
-- AUTO_INCREMENT untuk tabel `orderbarang`
--
ALTER TABLE `orderbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT untuk tabel `stockbarang`
--
ALTER TABLE `stockbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orderbarang`
--
ALTER TABLE `orderbarang`
  ADD CONSTRAINT `orderbarang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `stockbarang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderbarang_ibfk_2` FOREIGN KEY (`belibarang_id`) REFERENCES `belibarang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
