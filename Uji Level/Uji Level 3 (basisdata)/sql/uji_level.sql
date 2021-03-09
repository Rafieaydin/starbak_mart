-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2021 pada 04.32
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
(634, 1, 0, '2021-03-08 21:30:26');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=635;

--
-- AUTO_INCREMENT untuk tabel `orderbarang`
--
ALTER TABLE `orderbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT untuk tabel `stockbarang`
--
ALTER TABLE `stockbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
