-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2024 pada 17.55
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_ku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kopi Hot'),
(2, 'Snack'),
(3, 'Non Kopi Hot'),
(4, 'Kopi Cold'),
(5, 'Food'),
(6, 'Non Kopi Cold');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `nama_cafe` varchar(255) NOT NULL,
  `tgl_menu` date NOT NULL,
  `isi_menu` text NOT NULL,
  `gambar_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori`, `nama_menu`, `nama_cafe`, `tgl_menu`, `isi_menu`, `gambar_menu`) VALUES
(69, 4, 'Americano', 'thesis', '2024-01-05', 'terbuat dari kopi asli', 'americano ice.jpg'),
(70, 1, 'Americano', 'thesis', '2024-01-05', 'Terbuat Dari Kopi toraja', 'americano.jpeg'),
(71, 3, 'Avocado', 'Bujang', '2024-01-06', 'terbuat dari bubuk avocado', 'avocado hot.jpg'),
(72, 6, 'Avocado Cold', 'Bujang', '2024-01-06', 'Terbuat dari bubuk avokado', 'avocado ice.jpeg'),
(73, 5, 'Ayam Geprek', 'thesis', '2024-01-06', 'ayam pilihan', 'ayamgeprek.jpg'),
(74, 6, 'Brown Sugar', 'Bujang', '2024-01-06', 'dd', 'brownsugar.jpg'),
(75, 1, 'Cappucino', 'Bujang', '2024-01-06', 'sss', 'cappucino hot.jpg'),
(77, 6, 'Caramel', 'Bujang', '2024-01-06', 'ddd', 'caramel hot.jpg'),
(78, 1, 'Hazelnut', 'bujang', '2024-01-07', 'aaa', 'hazelnut hot.jpg'),
(79, 4, 'Hazelnut Ice', 'Bujang', '2024-01-07', 'menggunakan sirup hazelnut', 'hazelnut ice.jpg'),
(80, 5, 'Kentang Goreng', 'Thesis', '2024-01-07', 'Kentang pres', 'kentanggoreng.jpg'),
(81, 1, 'Kopi Susu', 'Thesis', '2024-01-07', 'Menggunakan Kopi Bland ', 'kopisusu hot.jpg'),
(82, 4, 'Kopi Susu ', 'Bujang', '2024-01-07', 'Terbuat dari kopi bland', 'kopisusu ice.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `judul_ulasan` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_user`, `judul_ulasan`, `content`) VALUES
(9, '60900121050', '', 'terlalu dingin'),
(10, '123', '', 'qqqqqq'),
(11, '60900121050', 'KOPI', 'ASA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jeniskelamin` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `level_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `jeniskelamin`, `pekerjaan`, `password_user`, `thumbnail`, `level_user`) VALUES
('123', '123', '123@123', 'Laki-Laki', '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'vietnam.jpg', 'user'),
('60900121050', 'Muh. Arsy Mawardi. Mz', 'mawardiarsy@gmail.com', 'Laki-Laki', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'arsy.png', 'admin'),
('60900121053', 'Nur Fadillah Nur', 'dillah@gmail.com', 'Perempuan', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'WhatsApp Image 2024-01-06 at 19.02.52_9d58f32a.jpg', 'admin'),
('60900121057', 'Muflih Ramadhan', 'muflih@gmail.com', 'Laki-Laki', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'WhatsApp Image 2023-12-19 at 21.59 3 (1).png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `berita_ibfk_1` (`id_kategori`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
