-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 09.35
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopwise`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `added_to`
--

CREATE TABLE `added_to` (
  `id_added` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_shopping` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `price_of_goods` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin1', '$2y$10$EscBNFQfOQb655nDs8/DUOnxbliSMBjQsbuDWLIZs11gq9wHHMw6W');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `date_added`, `id_admin`) VALUES
(2, 'Buah-buahan', '2023-12-02 19:05:17', 1),
(8, 'Sayuran', '2023-12-07 09:53:29', 1),
(9, 'Bumbu Masak', '2023-12-07 09:53:53', 1),
(10, 'Kebutuhan Pokok', '2023-12-07 09:54:01', 1),
(11, 'Bahan Kue', '2023-12-07 09:54:13', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `photo_item` varchar(90) DEFAULT NULL,
  `name_item` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `id_category` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id_item`, `photo_item`, `name_item`, `date_added`, `id_category`, `id_admin`) VALUES
(8, 'product-6.jpg', 'Mangga', '2023-12-06 19:58:25', 2, 1),
(10, 'product-2.jpg', 'Pisang', '2023-12-06 19:59:07', 2, 1),
(11, 'product-4.jpg', 'Anggur', '2023-12-06 19:59:16', 2, 1),
(12, 'product-8.jpg', 'Apel', '2023-12-06 19:59:49', 2, 1),
(14, 'product-7.jpg', 'Semangka', '2023-12-07 09:45:01', 2, 1),
(15, 'product-details-3.jpg', 'Bayam', '2023-12-07 10:25:02', 8, 1),
(16, 'sawi.jpg', 'Sawi', '2023-12-07 10:25:15', 8, 1),
(18, 'brokoli.jpg', 'Brokoli', '2023-12-07 10:34:44', 8, 1),
(19, 'slada.jpg', 'Selada', '2023-12-10 12:15:11', 8, 1),
(20, 'jamur.jpg', 'Jamur', '2023-12-10 12:19:53', 8, 1),
(21, 'product-details-2.jpg', 'Paprika', '2023-12-10 12:20:10', 9, 1),
(22, 'cabai-merah.jpg', 'Cabai Merah', '2023-12-10 12:27:09', 9, 1),
(23, 'Bawang-merah.jpg', 'Bawang Merah', '2023-12-10 12:28:40', 9, 1),
(24, 'garlic.jpg', 'Bawang Putih', '2023-12-10 13:10:14', 9, 1),
(25, 'cabai-hijau.jpg', 'Cabai Hijau', '2023-12-10 13:11:27', 9, 1),
(26, 'beras.jpg', 'Beras', '2023-12-10 13:13:03', 10, 1),
(27, 'gula.jpg', 'Gula Pasir', '2023-12-10 13:29:16', 10, 1),
(28, 'telur.jpg', 'Telur', '2023-12-10 13:29:43', 10, 1),
(29, 'minyak.jpg', 'Minyak Goreng', '2023-12-10 13:30:10', 10, 1),
(30, 'roti.jpg', 'roti', '2023-12-10 13:32:27', 10, 1),
(31, 'mentega.jpg', 'Mentega', '2023-12-10 14:37:05', 11, 1),
(32, 'tepung.jpg', 'Tepung Terigu', '2023-12-10 14:38:33', 11, 1),
(33, 'Keju.jpg', 'Keju', '2023-12-10 14:49:42', 11, 1),
(34, 'soda-kue.jpg', 'Soda Kue', '2023-12-10 14:51:48', 11, 1),
(35, 'coklat-bubuk.jpg', 'Coklat Bubuk', '2023-12-10 14:54:48', 11, 1),
(36, 'peyambung-nyawa.jpg', 'Surya 12\'s', '2023-12-10 16:10:52', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shopping_list`
--

CREATE TABLE `shopping_list` (
  `id_shopping` int(11) NOT NULL,
  `shopping_name` varchar(30) NOT NULL,
  `shopping_date` datetime DEFAULT NULL,
  `status` enum('Sudah belanja','Belum belanja') DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'sambo', 'sambo@gmail.com', '$2y$10$aX6QsDl7sD7mwgpbGgwT0uXvzDTFqe8FotSm1qNvaKZe3squu4vZe'),
(7, 'ali', 'ali@gmail.com', '$2y$10$zumV5kvHs/ZykvYX9zkhj.DYGUwLSDF/jLrXRPhfhsGseqLk/oM7K'),
(15, 'Aldo', 'aldorizkimukhtar@gma', '$2y$10$13ucwDHIS/1OMkDomqCCf.qBmizT0bhJZRaKBlZznFNiuRUs8EAaK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `added_to`
--
ALTER TABLE `added_to`
  ADD PRIMARY KEY (`id_added`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_belanja` (`id_shopping`),
  ADD KEY `id_shopping` (`id_shopping`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`id_shopping`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `added_to`
--
ALTER TABLE `added_to`
  MODIFY `id_added` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `shopping_list`
--
ALTER TABLE `shopping_list`
  MODIFY `id_shopping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `added_to`
--
ALTER TABLE `added_to`
  ADD CONSTRAINT `added_to_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `added_to_ibfk_2` FOREIGN KEY (`id_shopping`) REFERENCES `shopping_list` (`id_shopping`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD CONSTRAINT `shopping_list_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
