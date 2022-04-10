-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2022 pada 16.58
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `kd_jenis` int(11) NOT NULL,
  `jenis_laundry` varchar(100) NOT NULL,
  `lama_proses` int(11) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`kd_jenis`, `jenis_laundry`, `lama_proses`, `tarif`) VALUES
(1, 'Laundry + Seterika', 3, 7000),
(2, 'Fast Laundry', 1, 10000),
(12, 'Regular', 2, 6000),
(13, 'Cuci Karpet', 3, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `ket_laporan` int(1) NOT NULL,
  `catatan` text NOT NULL,
  `id_laundry` char(10) DEFAULT NULL,
  `pemasukan` int(11) NOT NULL,
  `id_pengeluaran` char(10) DEFAULT NULL,
  `pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `tgl_laporan`, `ket_laporan`, `catatan`, `id_laundry`, `pemasukan`, `id_pengeluaran`, `pengeluaran`) VALUES
(18, '2022-03-02', 2, 'Beli deterjen', NULL, 0, 'PG-0001', 100000),
(27, '2022-03-10', 2, 'service mesin cuci', NULL, 0, 'PG-0003', 200000),
(28, '2022-03-10', 1, '5 baju, 5 celana levis', 'LD-0001', 70000, NULL, 0),
(29, '2022-03-10', 1, '10 kemeja, 2 celana training', 'LD-0002', 100000, NULL, 0),
(30, '2022-03-10', 1, 'Karpet 20kg', 'LD-0003', 200000, NULL, 0),
(31, '2022-03-14', 1, '2 celana, 3 baju, 2 kaus', 'LD-0005', 35000, NULL, 0),
(32, '2022-03-31', 2, 'Membeli pemutih pakaian', NULL, 0, 'PG-0004', 50000),
(33, '2022-03-12', 1, '14 kaus', 'LD-0004', 54000, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laundry`
--

CREATE TABLE `tb_laundry` (
  `id_laundry` char(10) NOT NULL,
  `pelangganid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `kd_jenis` char(6) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jml_kilo` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `status_pembayaran` int(1) NOT NULL,
  `status_pengambilan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_laundry`
--

INSERT INTO `tb_laundry` (`id_laundry`, `pelangganid`, `userid`, `kd_jenis`, `tgl_terima`, `tgl_selesai`, `jml_kilo`, `catatan`, `totalbayar`, `status_pembayaran`, `status_pengambilan`) VALUES
('LD-0001', 5, 27, '1', '2022-03-10', '2022-03-13', 10, '5 baju, 5 celana levis', 70000, 1, 1),
('LD-0002', 3, 27, '2', '2022-03-10', '2022-03-13', 10, '10 kemeja, 2 celana training', 100000, 1, 0),
('LD-0003', 5, 27, '13', '2022-03-10', '2022-03-15', 20, 'Karpet 20kg', 200000, 1, 0),
('LD-0004', 9, 27, '12', '2022-03-12', '2022-03-16', 9, '14 kaus', 54000, 1, 0),
('LD-0005', 9, 27, '1', '2022-03-14', '2022-03-18', 5, '2 celana, 3 baju, 2 kaus', 35000, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `pelangganid` int(11) NOT NULL,
  `pelanggannama` varchar(150) NOT NULL,
  `pelangganjk` varchar(15) NOT NULL,
  `pelangganalamat` text NOT NULL,
  `pelanggantelp` varchar(20) NOT NULL,
  `pelangganfoto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`pelangganid`, `pelanggannama`, `pelangganjk`, `pelangganalamat`, `pelanggantelp`, `pelangganfoto`) VALUES
(3, 'Yuto', 'Laki - laki', 'Jl. kita Masih panjang', '08346232727', '624e984060287.png'),
(5, 'Azhar', 'Laki - laki', 'Jl. doang jadian mah engga', '081273625373', '624e97ccf0f38.png'),
(9, 'novan', 'Laki - laki', 'Jl. sama aku nikahnya sama dia', '08524523532', '624e97793b68e.png'),
(10, 'iffah', 'Perempuan', 'Jl. sama kamu tuh akunya suka malu', '08732195', '624e96be9d026.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` char(10) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `catatan` text NOT NULL,
  `pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `catatan`, `pengeluaran`) VALUES
('PG-0001', '2022-03-02', 'Beli deterjen', 100000),
('PG-0003', '2022-03-10', 'service mesin cuci', 200000),
('PG-0004', '2022-03-31', 'Membeli pemutih pakaian', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userpass` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `usertelp` varchar(20) NOT NULL,
  `userfoto` varchar(50) DEFAULT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`userid`, `username`, `userpass`, `nama`, `jk`, `alamat`, `usertelp`, `userfoto`, `level`) VALUES
(27, 'ramdhan', '$2y$10$3vW7VqHTaSpKnhlKL2Dd4OFzfV1oqGLw.vcqLIcDM7o7R.WADO00K', 'muhammad ramdhan sadiqin', 'Laki - laki', 'Jalanin aja dulu, kalo nyaman kita lanjut', '0813888888', '624e9559ba6bd.jpg', 'admin'),
(28, 'anis', '$2y$10$8.qB9WAi5s9fABYrpeHPlOSzxD2q5n.yfOIO953fGtzNXDnjESA6K', 'Anis Suaya Muradiyah', 'Perempuan', 'Jl. bareng kamu adalah hal terbaik', '083245643453', '624e98afeb2eb.png', 'kasir'),
(31, 'syahril', '$2y$10$wXoQdzkvqRJY6jwsTLHbQOg5Z0k/zPGfWPs42YiIjw244xv8dCJpu', 'Agus Syahril Mubarok', 'Laki - laki', 'Jl. terbaik', '081242643128', '624ea8d0c9688.png', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indeks untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tb_laundry`
--
ALTER TABLE `tb_laundry`
  ADD PRIMARY KEY (`id_laundry`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`pelangganid`);

--
-- Indeks untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `kd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `pelangganid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
