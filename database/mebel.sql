-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2021 pada 01.54
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mebel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email_admin` varchar(225) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL,
  `gambar_admin` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `username_admin`, `password_admin`, `gambar_admin`) VALUES
(1, 'Nizar Rahman Syahab', 'nizarsyahab2121@gmail.com', 'admin', 'admin', 'avatar04.png'),
(2, 'Aku', 'aku@gmail.com', 'aku', 'aku', 'download.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE `biaya` (
  `id_b` int(11) NOT NULL,
  `kode_pesan` char(10) NOT NULL,
  `id_p` int(11) NOT NULL,
  `harga_satuan` double NOT NULL,
  `jumlah_harga` double NOT NULL,
  `dp` double NOT NULL,
  `sisa_biaya` double NOT NULL,
  `lama_pengerjaan` varchar(10) NOT NULL,
  `ket_biaya` longtext NOT NULL,
  `bukti` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`id_b`, `kode_pesan`, `id_p`, `harga_satuan`, `jumlah_harga`, `dp`, `sisa_biaya`, `lama_pengerjaan`, `ket_biaya`, `bukti`) VALUES
(1, 'B4yU6sQzqY', 11, 500000, 500000, 0, 0, '8 Hari', '<p>sdasdasdasdasdasdas</p>', ''),
(2, '3gZboLsjKf', 11, 1500000, 3000000, 500000, 2500000, '9 Hari', '<p><b>Pengerjaan dilakukan setelah pengerjaan orderan sebelum nya dan anda telah melakukan pembayaran DP</b></p><p>Terimakasi</p><p><i><u></u></i><u>Tertanda&nbsp;</u><i><u></u></i></p><p><i>Admin Mebel</i></p>', 'download.jpg'),
(3, 'E4vlBdNg8J', 12, 20000, 40000, 40000, 0, '14', '<p>dpnya</p>', ''),
(4, 'QonOPC9Rmk', 13, 4545445, 9090890, 9090890, 0, '22', '', ''),
(5, 'wRNE8ognrL', 12, 6767, 6767, 6767, 0, '2', '', 'Gambar-Keramik-Dapur-Minimalis-6 (1).jpg'),
(6, 'Wn8x6TKFfg', 12, 90000000, 90000000, 90000000, 0, '1 hari', '<p>kjiuhiu</p>', ''),
(7, 'd4kpPAwHT7', 13, 200000, 2000000, 2000000, 0, '10 Hari', '<p>wkadkawda</p>', '22144.jpg'),
(8, 'WsTD8UFiXh', 13, 1000, 1000, 1000, 0, '7 hari', '<p>sefsefs</p>', '1cJVIoq.jpg'),
(9, '6cIMaGPEgC', 13, 1000, 5000, 5000, 0, '10 hari', '<p>jancok</p>', '165031.jpg'),
(10, '6WQs7aGelh', 13, 5000, 5000, 5000, 0, '40 hari', '<p>dawdaw</p>', 'deviantART More Like Chucky and Tiffany by.jpg'),
(11, 'hgszDCfFcr', 13, 100000, 10000000, 10000000, 0, '5 hari', '<p>dawdawda</p>', '444110a66afe92486f9f3d9e2a98073b.jpg'),
(12, 'IMWcbf1VG6', 14, 200000, 10000000, 10000000, 0, '30 Hari', '<p>MANTAP</p>', 'black-1072366_960_720.jpg'),
(13, 'eoUbrHBdk7', 14, 10000, 120000, 120000, 0, '7 hari', '<p>dawdaw</p>', 'Gambar-Keramik-Dapur-Minimalis-6.jpg'),
(14, 'dG32gZCjwU', 14, 1000, 12000, 12000, 0, '1 hari', '<p>wadaw</p>', 'Gambar-Keramik-Dapur-Minimalis-6.jpg'),
(15, 'CiEJGbcyo4', 14, 900, 900, 900, 0, '1 hari', '<p>jknkno</p>', 'Gambar-Keramik-Dapur-Minimalis-6.jpg'),
(16, 'mo8PgaixLF', 14, 12, 12, 12, 0, '1 hari', '<p>xdvse</p>', 'jendela2.jpg'),
(17, '4Q8Nyxwnij', 14, 100, 1000, 1000, 0, '1 hari', '<p></p><blockquote><p>dawda</p></blockquote><p></p>', 'jendela2.jpg'),
(18, 'CikNYsSPGa', 14, 0, 0, 0, 0, '10', '<p>wdawda</p>', 'Gambar-Keramik-Dapur-Minimalis-6.jpg'),
(19, 'dHaDr9p21E', 14, 1000, 10000, 10000, 0, '2 hari', '<p>wadawdaw</p>', 'jendela2.jpg'),
(20, 'Wrfc63mX5V', 14, 500000, 5000000, 5000000, 0, '10 hari', '<p>awdawdaw</p>', 'Gambar-Keramik-Dapur-Minimalis-6.jpg'),
(21, 'Volch8wynM', 14, 300000, 1500000, 1500000, 0, '5 hari', '<p>dawdaw</p>', 'jendela2.jpg'),
(22, '7s3q4oMF8Q', 14, 100000, 200000, 200000, 0, '5 hari', '<p>efsefsefs</p>', 'Gambar-Keramik-Dapur-Minimalis-6.jpg'),
(23, 'aPX7Z8H3Ft', 14, 100000, 500000, 500000, 0, '5 hari', '<p>gygygy</p>', 'Gambar-Keramik-Dapur-Minimalis-6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `isi_faq` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id_faq`, `isi_faq`) VALUES
(1, '<h6><u>Untuk melakukan pemesanan di dalam aplikasi tahap-tahapnya adalah sebagai berikut.</u></h6><p><br></p><p>1. Pertama pelanggan harus login terlebih dahulu, jika belum mempunyai akun, pelanggan diarahkan untuk melakukan registrasi atau mendaftar agar bisa masuk ke aplikasi.</p><p>2. pelanggan melakukan registrasi, akun akan di aktifkan oleh admin, jika belum diaktifkan oleh admin, pelanggan belum bisa melakukan login dengan akun tersebut yang belum di aktifkan.</p><p>3. setelah akun diaktifkan, palanggan bisa login dan bisa melakukan pemesanan.</p><p>4. jika ingin memesan dengan desain sendiri, pelanggan harus mengklik tombol pesan furniture custom yang berwarna biru dan melakukan proses pemesanan, mohon data dilengkapi dengan benar dan rinci.</p><p>5. Apabila pelanggan ingin memesan furniture yang pernah dibuat di Mebel, pelanggan memilih furniture yang ini dipesan dan&nbsp; mengklik tombol order furniture ini, jika ingin mengedit data furniture tersebut pelanggan dipersilahkan mengedit terlebih dahulu sebelum mengklik tombol kirim, jika&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; pelanggan ingin memesan dengan data yang sudah ada, pelanggan diharuskan mengklik tombol download gambar design ini dan memasukkan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ulang gambar tersebut dan mengklik tombol kirim.</p><p>6. setelah melakukan pemesanan, pesanan akan masuk di histori pesanan, dan akan di konfirmasi oleh admin jika pesanannya disetujui.</p><p>7. Jika pesanan disetujui, pelanggan harus mengecek di histori pesanan dan melakukan pembayaran uang muka, dengan cara mengklik tombol konfirmasi pembayaran kemudian melengkapi data dan mengirimkan bukti pembayaran kemudian mengklik tombol kirim.</p><p>8. Setelah melakukan proses pembayaran, admin akan mengecek dan pesanan akan dikerjakan.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `furniture`
--

CREATE TABLE `furniture` (
  `id_f` int(11) NOT NULL,
  `nama_f` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `bahan` varchar(225) NOT NULL,
  `warna` varchar(225) NOT NULL,
  `ukuran` varchar(225) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `ket_f` longtext NOT NULL,
  `gambar_f` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `furniture`
--

INSERT INTO `furniture` (`id_f`, `nama_f`, `jenis`, `bahan`, `warna`, `ukuran`, `harga`, `ket_f`, `gambar_f`) VALUES
(4, 'Kursi Tamu', 'kursi tamu', 'Kayu Lokal', 'coklat tua ', 'tinggi kaki 45 cm - tinggi senderan 45 cm', '2000000', '', 'kursi-tamu-minimalis-kebutuhan-rumah-tangga-furniture-23667235.jpg'),
(5, 'Lemari Pakaian', 'Lemari Pakaian', 'Kayu Lokal', 'Coklat dan putih', 'P = 210 cm L = 200 cm luas didalam lemari 60 cm', '3000000', '', 'download (1).jpg'),
(6, 'Meja Dapur', 'Meja Dapur', 'Kayu Ulin', 'coklat muda dan coklat tua', '-', '5000000', '', 'Gambar-Keramik-Dapur-Minimalis-6.jpg'),
(7, 'Jendela', 'jendela', 'Kayu Lokal', 'coklat muda', '-', '1000000', '', 'jendela2.jpg'),
(12, 'Jendela 2', 'Jendela', 'Kayu Lokal', '-', '120x60', '700000', '<p>contoh</p>', 'WhatsApp Image 2021-01-10 at 22.05.34.jpeg'),
(13, 'Meja Simpel', 'meja', 'Kayu Lokal', 'coklat kayu', '-', '700000', '<p>contoh</p>', 'WhatsApp Image 2021-01-10 at 22.05.35.jpeg'),
(15, 'Kursi Simpel', 'kursi', 'Kayu Lokal', 'Coklat Kayu', '-', '700000', '<p>contoh</p>', 'WhatsApp Image 2021-01-10 at 22.18.48.jpeg'),
(16, 'Kursi Sederhana', 'Kursi', 'Kayu Lokal', 'hijau muda', '-', '700000', '<p>contoh</p>', 'WhatsApp Image 2021-01-10 at 22.23.01.jpeg'),
(18, 'Pintu Double', 'pintu', 'Kayu Ulin', 'Coklat Kayu', '-', '3000000', '<p>contoh</p>', '55bbf209d228b1d2ebfde9e5ad786ea2 (1).jpg'),
(20, 'Pintu 2', 'pintu', 'Kayu Ulin', 'Coklat Kayu', '120 x 60', '850000', '<p>contoh</p>', '444110a66afe92486f9f3d9e2a98073b.jpg'),
(21, 'Pintu 3', 'pintu', 'Kayu Ulin', 'Coklat Kayu', '-', '950000', '<p>contoh</p>', 'eb42e396036ad6d670900c37e4b036dd.jpg'),
(22, 'Pintu Rumah', 'Pintu', 'Kayu Ulin', 'Coklat Kayu', '210x120', '4700000', '<p>contoh</p>', 'Pintu-Rumah-Minimalis-Jati-2 (1).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_p` int(11) NOT NULL,
  `nama_p` varchar(50) NOT NULL,
  `hp_p` varchar(13) NOT NULL,
  `alamat_p` longtext NOT NULL,
  `email_p` varchar(225) NOT NULL,
  `password_p` varchar(50) NOT NULL,
  `stts_daftar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_p`, `nama_p`, `hp_p`, `alamat_p`, `email_p`, `password_p`, `stts_daftar`) VALUES
(10, 'Arya Bramasta', '085752049976', 'Jl.M.T.Haryono, Block M', 'aryabramasta345@gmail.com', '123', 'Aktif'),
(12, 'Nizar Rahman Syahab', '089668417111', 'padang', 'nizarsyahab2121@gmail.com', '2121', 'Aktif'),
(13, 'fardhan', '878786565', 'padang', 'fardhan12@gmail.com', '2121', 'Aktif'),
(14, 'Eren Yearger', '08989898', 'Eldia', 'eren@gmail.com', '123', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `kode_pesan` char(10) NOT NULL,
  `id_p` int(11) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `bahan` varchar(225) NOT NULL,
  `warna` varchar(225) NOT NULL,
  `ukuran` varchar(225) NOT NULL,
  `ket_pesan` longtext NOT NULL,
  `design_pesan` varchar(225) NOT NULL,
  `banyak_pesan` double NOT NULL,
  `tgl_pesan` date NOT NULL,
  `status_pesan` enum('Terkirim','Diproses','Selesai','Bayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `kode_pesan`, `id_p`, `jenis`, `bahan`, `warna`, `ukuran`, `ket_pesan`, `design_pesan`, `banyak_pesan`, `tgl_pesan`, `status_pesan`) VALUES
(3, 'E4vlBdNg8J', 12, 'jendela', 'Kayu Lokal', 'coklat muda', '-', '<p>2</p>', 'jendela2.jpg', 2, '2021-01-18', 'Selesai'),
(4, 'QonOPC9Rmk', 13, 'Meja Dapur', 'Kayu Ulin', 'coklat muda dan coklat tua', '676', '', 'jendela2.jpg', 2, '2021-01-18', 'Selesai'),
(5, 'wRNE8ognrL', 12, 'Meja Dapur', 'Kayu Ulin', 'coklat muda dan coklat tua', '-', '', 'Gambar-Keramik-Dapur-Minimalis-6 (1).jpg', 1, '2021-03-15', 'Selesai'),
(6, 'Wn8x6TKFfg', 12, 'jendela', 'Kayu Lokal', 'coklat muda', '-', '', 'Gambar-Keramik-Dapur-Minimalis-6.jpg', 1, '2021-03-15', 'Selesai'),
(7, 'd4kpPAwHT7', 13, 'kursi tamu', 'Kayu Lokal', 'coklat tua ', 'tinggi kaki 45 cm - tinggi senderan 45 cm', '<p>motif batik</p>', '63d634bff9c94e093f52183c867f34ad.1000x1000x1.jpg', 10, '2021-03-15', 'Selesai'),
(8, 'WsTD8UFiXh', 13, 'Pintu', 'Kayu Ulin', 'Coklat Kayu', '210x120', '<p>dwada</p>', '611085.jpg', 1, '2021-03-15', 'Selesai'),
(9, '6cIMaGPEgC', 13, 'pintu', 'Kayu Ulin', 'Coklat Kayu', '120 x 60', '<p>hitam</p>', '589333.jpg', 5, '2021-03-16', 'Selesai'),
(10, '6WQs7aGelh', 13, 'jendela', 'Kayu Lokal', 'coklat muda', '-', '<p>dawda</p>', 'images(2).jpg', 1, '2021-03-16', 'Selesai'),
(21, 'Volch8wynM', 14, 'Lemari Pakaian', 'Kayu Lokal', 'Coklat dan putih', 'P = 210 cm L = 200 cm luas didalam lemari 60 cm', '<p>wadawda</p>', 'jendela2.jpg', 5, '2021-03-16', 'Selesai'),
(22, '7s3q4oMF8Q', 14, 'Meja Dapur', 'Kayu Ulin', 'coklat muda dan coklat tua', '-', '<p>qqqqq</p>', 'Gambar-Keramik-Dapur-Minimalis-6.jpg', 2, '2021-03-16', 'Selesai'),
(23, 'aPX7Z8H3Ft', 14, 'Meja Dapur', 'Kayu Ulin', 'coklat muda dan coklat tua', '-', '<p>hhhhh</p>', 'Gambar-Keramik-Dapur-Minimalis-6.jpg', 5, '2021-03-17', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_pemesanan`
--

CREATE TABLE `proses_pemesanan` (
  `kode_pesan` char(10) NOT NULL,
  `proses_pesanan` text NOT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `id_proses` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses_pemesanan`
--

INSERT INTO `proses_pemesanan` (`kode_pesan`, `proses_pesanan`, `time`, `id_proses`) VALUES
('IMWcbf1VG6', 'MEMOTONG BAHAN', '2021-03-16 10:47:40', 12),
('IMWcbf1VG6', 'MENGUKIR KAYU', '2021-03-16 10:53:13', 13),
('IMWcbf1VG6', 'MENDEKOR DESAIN', '2021-03-16 10:54:27', 14),
('IMWcbf1VG6', 'MENYATUKAN BAHAN', '2021-03-16 10:55:11', 15),
('IMWcbf1VG6', 'MENGECAT KAYU', '2021-03-16 11:00:21', 16),
('Volch8wynM', 'JOJO', '2021-03-16 12:49:17', 32),
('Volch8wynM', 'YOYO', '2021-03-16 12:49:22', 33),
('7s3q4oMF8Q', 'POPOP', '2021-03-16 12:51:02', 34),
('7s3q4oMF8Q', 'LOLOK', '2021-03-16 12:51:46', 35),
('aPX7Z8H3Ft', 'MEMOTONG', '2021-03-17 07:27:04', 36),
('aPX7Z8H3Ft', 'MENGUKIR', '2021-03-17 07:27:27', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_selesai`
--

CREATE TABLE `proses_selesai` (
  `id_selesai` int(10) NOT NULL,
  `kode_pesan` char(20) NOT NULL,
  `status` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses_selesai`
--

INSERT INTO `proses_selesai` (`id_selesai`, `kode_pesan`, `status`, `time`) VALUES
(4, 'Volch8wynM', 'SELESAI', '2021-03-16 12:49:28'),
(5, '7s3q4oMF8Q', 'SELESAI', '2021-03-16 13:05:32'),
(6, 'aPX7Z8H3Ft', 'SELESAI', '2021-03-17 07:27:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_b`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indeks untuk tabel `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id_f`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_p`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `proses_pemesanan`
--
ALTER TABLE `proses_pemesanan`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indeks untuk tabel `proses_selesai`
--
ALTER TABLE `proses_selesai`
  ADD PRIMARY KEY (`id_selesai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `proses_pemesanan`
--
ALTER TABLE `proses_pemesanan`
  MODIFY `id_proses` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `proses_selesai`
--
ALTER TABLE `proses_selesai`
  MODIFY `id_selesai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
