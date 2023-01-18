-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2023 pada 14.14
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciremai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(125) NOT NULL,
  `harga_sewa` varchar(15) NOT NULL,
  `stok_alat` int(11) NOT NULL,
  `sisa_alat` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id_alat`, `nama_alat`, `harga_sewa`, `stok_alat`, `sisa_alat`, `gambar`, `deskripsi`) VALUES
(2, 'Carier', '150000', 2, 2, 'carier.jpg', '<p>Carier dengan daya tampung<font color=\"#9c9c94\" style=\"background-color: rgb(255, 255, 0);\"> 1000 liter</font></p>'),
(3, 'Tenda Blue Mic', '45000', 1, 1, 'images.jpeg', '<p>Tenda kapasitas 2-3 orang</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `boking_jasa`
--

CREATE TABLE `boking_jasa` (
  `id_boking` int(11) NOT NULL,
  `id_pendaki` int(11) NOT NULL,
  `tgl_boking` varchar(15) NOT NULL,
  `jml_pendaki` int(11) NOT NULL,
  `total_bayar` varchar(15) NOT NULL,
  `status_pendakian` int(11) NOT NULL,
  `stat_pem_dp` varchar(15) NOT NULL,
  `stat_pem_all` varchar(15) NOT NULL,
  `bukti_pem_dp` text NOT NULL,
  `bukti_pem_all` text NOT NULL,
  `jaminan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_boking`
--

CREATE TABLE `detail_boking` (
  `id_detail` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_jasa` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `tgl_rencana` varchar(20) NOT NULL,
  `tgl_selesai` varchar(20) NOT NULL,
  `time_end` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_boking`
--

INSERT INTO `detail_boking` (`id_detail`, `id_sewa`, `id_jasa`, `jml`, `tgl_rencana`, `tgl_selesai`, `time_end`) VALUES
(1, 1, 2, 1, '2022-12-08', '0', '2022-12-04 13:20:12'),
(2, 1, 3, 1, '2022-12-08', '0', '2022-12-04 13:20:12'),
(3, 2, 2, 1, '2023-02-16', '0', '2023-01-11 12:58:17'),
(4, 2, 3, 1, '2023-02-16', '0', '2023-01-11 12:58:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sewa`
--

CREATE TABLE `detail_sewa` (
  `id_detail_sewa` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `tgl_rencana_sewa` varchar(15) NOT NULL,
  `tgl_selesai_sewa` varchar(15) NOT NULL,
  `time_end_sewa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jml_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_sewa`
--

INSERT INTO `detail_sewa` (`id_detail_sewa`, `id_sewa`, `id_alat`, `tgl_rencana_sewa`, `tgl_selesai_sewa`, `time_end_sewa`, `jml_sewa`) VALUES
(1, 1, 3, '2022-12-08', '0', '2022-12-04 13:20:12', 1),
(2, 1, 2, '2022-12-08', '0', '2022-12-04 13:20:12', 1),
(3, 2, 3, '2023-02-16', '0', '2023-01-11 12:58:24', 1),
(4, 2, 2, '2023-02-16', '0', '2023-01-11 12:58:27', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `nama_jasa` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_jasa` int(11) NOT NULL,
  `type_jasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `nama_jasa`, `deskripsi`, `harga`, `jumlah`, `status_jasa`, `type_jasa`) VALUES
(2, 'Jajang', '<p>Jajang merupakan <font color=\"#ffff00\" style=\"background-color: rgb(107, 173, 222);\">PORTER </font>ahli dalam pendakian gunung, sudah memiliki pengalaman ke 10 Gunung yang ada di Indonesia.</p>', '500000', 1, 0, 1),
(3, 'Iman', 'Dia adalah sorang Guide', '500000', 1, 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaki`
--

CREATE TABLE `pendaki` (
  `id_pendaki` int(11) NOT NULL,
  `nama_pendaki` varchar(125) NOT NULL,
  `no_hp_pendaki` varchar(15) NOT NULL,
  `alamat_pendaki` text NOT NULL,
  `username_pendaki` varchar(50) NOT NULL,
  `password_pendaki` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaki`
--

INSERT INTO `pendaki` (`id_pendaki`, `nama_pendaki`, `no_hp_pendaki`, `alamat_pendaki`, `username_pendaki`, `password_pendaki`, `jk`) VALUES
(1, 'Dahlan Ahmad', '089876545676', 'Gunungkeling, Kuningan Jawa Barat', 'dahlan', 'dahlan', 'Perempuan'),
(2, 'hani', '085156727368', 'Gunungkeling, Kuningan Jawa Barat', 'hani', 'hani', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_alat`
--

CREATE TABLE `sewa_alat` (
  `id_sewa` int(11) NOT NULL,
  `id_pendaki` int(11) NOT NULL,
  `tgl_sewa` varchar(15) NOT NULL,
  `jml_pendaki` int(11) NOT NULL,
  `total_sewa` varchar(15) NOT NULL,
  `status_sewa` int(11) NOT NULL,
  `stat_pem_dp_sewa` varchar(15) NOT NULL,
  `stat_pem_all_sewa` varchar(15) NOT NULL,
  `bukti_pem_dp_sewa` text NOT NULL,
  `bukti_pem_all_sewa` text NOT NULL,
  `jaminan` text NOT NULL,
  `stat_jaminan` int(11) NOT NULL DEFAULT 0,
  `uang_kembali` varchar(15) NOT NULL,
  `norek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa_alat`
--

INSERT INTO `sewa_alat` (`id_sewa`, `id_pendaki`, `tgl_sewa`, `jml_pendaki`, `total_sewa`, `status_sewa`, `stat_pem_dp_sewa`, `stat_pem_all_sewa`, `bukti_pem_dp_sewa`, `bukti_pem_all_sewa`, `jaminan`, `stat_jaminan`, `uang_kembali`, `norek`) VALUES
(1, 1, '2022-12-04', 2, '1295000', 0, '1000000', '295000', 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-13.jpg', 'Screenshot_2022-06-27_120554.png', '11.png', 0, '', ''),
(2, 1, '2023-01-10', 3, '1345000', 9, '0', '1345000', '0', 'Screenshot_2022-06-30_1842025.png', 'Screenshot_2022-06-27_120700.png', 0, '1345000', '099-0012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `no_hp` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_hp`, `alamat`, `jk`, `username`, `password`, `level_user`) VALUES
(3, 'Ahmad', '085156727368', 'Cisantana Kuningan', 'Laki - Laki', 'admin', 'admin', 1),
(4, 'Suherman', '0875698745633', 'Cigugur Kuningan', 'Laki - Laki', 'pengelola', 'pengelola', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `boking_jasa`
--
ALTER TABLE `boking_jasa`
  ADD PRIMARY KEY (`id_boking`);

--
-- Indeks untuk tabel `detail_boking`
--
ALTER TABLE `detail_boking`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD PRIMARY KEY (`id_detail_sewa`);

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indeks untuk tabel `pendaki`
--
ALTER TABLE `pendaki`
  ADD PRIMARY KEY (`id_pendaki`);

--
-- Indeks untuk tabel `sewa_alat`
--
ALTER TABLE `sewa_alat`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `boking_jasa`
--
ALTER TABLE `boking_jasa`
  MODIFY `id_boking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_boking`
--
ALTER TABLE `detail_boking`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_sewa`
--
ALTER TABLE `detail_sewa`
  MODIFY `id_detail_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pendaki`
--
ALTER TABLE `pendaki`
  MODIFY `id_pendaki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sewa_alat`
--
ALTER TABLE `sewa_alat`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
