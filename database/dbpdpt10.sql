-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Apr 2016 pada 11.27
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpdpt10`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `status_berita` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `slug`, `isi`, `status_berita`, `id_user`, `tanggal`, `nama`) VALUES
(10, 'Info Akademik : Formulir PDPT', 'info-akademik-formulir-pdpt', '<p>Formulir PDPT dapat diunduh langsung. Silakan klik menu Download Dokumen untuk mengunduh formulir PDPT.</p>\r\n<p>Terima Kasih.</p>\r\n<p>-Admin</p>', 'Publish', 1, '2016-01-15 13:41:28', 'admin'),
(11, 'Info Akademik : Pendataan PDPT', 'info-akademik-pendataan-pdpt', '<p>Kepada seluruh mahasiswa, bagi yang belum terdaftar dalam PDPT silahkan mendaftar di menu Pendaftaran. Bagi yang sudah terdaftar, silakan login&nbsp;dan&nbsp;lengkapi data diri masing - masing.</p>\r\n<p>Terima Kasih.</p>\r\n<p>-Bagian Kemahasiswaan</p>', 'Publish', 1, '2016-01-15 13:37:05', 'Bagian Kemahasiswaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_akademik`
--

CREATE TABLE `data_akademik` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `program_studi` enum('Teknik Informatika','Teknik Sipil','Teknik Kimia','Teknik Mesin','Teknik Industri','Pendidikan Olahraga','Pendidikan Bahasa Inggris','Pendidikan Kewarganegaraan','Administrasi Bisnis','Hukum','Akuntansi','lainnya') NOT NULL,
  `kelas` enum('reguler','karyawan') NOT NULL,
  `dosen_wali` varchar(35) NOT NULL,
  `tanggal_awal_kuliah` date NOT NULL,
  `tanggal_sidang_skripsi` date NOT NULL,
  `waktu_tempuh_menyelesaikan_kuliah_dalam_tahun` varchar(4) NOT NULL,
  `waktu_tempuh_menyelesaikan_kuliah_dalam_bulan` varchar(4) NOT NULL,
  `waktu_tempuh_menyelesaikan_kuliah_dalam_hari` varchar(4) NOT NULL,
  `prestasi_akademik` text NOT NULL,
  `prestasi_non_akademik` text NOT NULL,
  `ipk` varchar(3) NOT NULL,
  `asal_sekolah_sebelum_kuliah` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_akademik`
--

INSERT INTO `data_akademik` (`id`, `npm`, `program_studi`, `kelas`, `dosen_wali`, `tanggal_awal_kuliah`, `tanggal_sidang_skripsi`, `waktu_tempuh_menyelesaikan_kuliah_dalam_tahun`, `waktu_tempuh_menyelesaikan_kuliah_dalam_bulan`, `waktu_tempuh_menyelesaikan_kuliah_dalam_hari`, `prestasi_akademik`, `prestasi_non_akademik`, `ipk`, `asal_sekolah_sebelum_kuliah`) VALUES
(1, '14120001', 'Administrasi Bisnis', 'reguler', 'Astri', '2014-09-22', '0000-00-00', '0', '0', '0', '-', '-	', '', 'SMA Negeri 3 Sukabumi'),
(2, '14120013', 'Teknik Informatika', 'reguler', 'Winda', '2011-09-20', '2015-03-20', '3.49', '42.5', '1277', '-						', 'Menguasai Bahasa Pemrograman PHP, C++ dan Java.\r\nMenguasai Framework CodeIgniter, Laravel dan YII.\r\nMenguasai HTML, Javascript, JQUERY dan AJAX									', '400', 'SMK Negeri 1 Kota Sukabumi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ayah`
--

CREATE TABLE `data_ayah` (
  `id` int(11) NOT NULL,
  `nama_ayah` varchar(35) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` enum('SD','SMP','SMA','S1','S2','S3') NOT NULL,
  `pekerjaan` enum('buruh','tani','pedagang','TNI','Polri','Guru','Dosen','PNS','swasta','lainnya') NOT NULL,
  `penghasilan_per_bulan` int(11) NOT NULL,
  `alamat_rumah` varchar(60) NOT NULL,
  `alamat_desa` varchar(35) NOT NULL,
  `alamat_kelurahan` varchar(35) NOT NULL,
  `alamat_kecamatan` varchar(35) NOT NULL,
  `alamat_kabupaten` varchar(35) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `telepon_rumah` varchar(12) NOT NULL,
  `telepon_genggam` varchar(12) NOT NULL,
  `npm` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_ayah`
--

INSERT INTO `data_ayah` (`id`, `nama_ayah`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `pekerjaan`, `penghasilan_per_bulan`, `alamat_rumah`, `alamat_desa`, `alamat_kelurahan`, `alamat_kecamatan`, `alamat_kabupaten`, `kode_pos`, `telepon_rumah`, `telepon_genggam`, `npm`) VALUES
(1, 'Achmad Taufiqoerrochman', 'Sukabumi', '1961-10-18', 'S1', 'TNI', 50000000, 'Jalan Bhayangkara No 137 A', '-', 'Karamat', 'Gunungpuyuh', 'Sukabumi', '43122', '-', '-', '14120001'),
(2, 'Agus Supriatna', 'Ciamis', '1955-08-23', 'SD', 'pedagang', 500000, 'Jalan Ciaul Pasir No 10 RT 01 RW 12', 'Cisarua', '-', 'Cikole', 'Sukabumi', '43115', '-', '-', '14120013');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_foto`
--

CREATE TABLE `data_foto` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `scan_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_foto`
--

INSERT INTO `data_foto` (`id`, `npm`, `scan_foto`) VALUES
(1, '14120001', 'foto_14120001.jpg'),
(2, '14120002', 'foto_14120002.jpg'),
(3, '14120013', 'foto_141200131.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ibu`
--

CREATE TABLE `data_ibu` (
  `id` int(11) NOT NULL,
  `nama_ibu` varchar(35) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` enum('SD','SMP','SMA','S1','S2','S3') NOT NULL,
  `pekerjaan` enum('buruh','tani','pedagang','TNI','Polri','Guru','Dosen','PNS','swasta','lainnya') NOT NULL,
  `penghasilan_per_bulan` int(11) NOT NULL,
  `alamat_rumah` varchar(60) NOT NULL,
  `alamat_desa` varchar(35) NOT NULL,
  `alamat_kelurahan` varchar(35) NOT NULL,
  `alamat_kecamatan` varchar(35) NOT NULL,
  `alamat_kabupaten` varchar(35) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `telepon_rumah` varchar(12) NOT NULL,
  `telepon_genggam` varchar(12) NOT NULL,
  `npm` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_ibu`
--

INSERT INTO `data_ibu` (`id`, `nama_ibu`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `pekerjaan`, `penghasilan_per_bulan`, `alamat_rumah`, `alamat_desa`, `alamat_kelurahan`, `alamat_kecamatan`, `alamat_kabupaten`, `kode_pos`, `telepon_rumah`, `telepon_genggam`, `npm`) VALUES
(1, 'Ina Dwianasari', 'Sukabumi', '1966-10-21', 'S1', 'Guru', 10000000, 'Jalan Bhayangkara No 137 A', '-', 'Karamat', 'Gunungpuyuh', 'Sukabumi', '43122', '-', '-', '14120001'),
(2, 'Surtini', 'Sukabumi', '1958-09-23', 'SD', 'lainnya', 0, 'Jalan Ciaul Pasir No 10 RT 01 RW 12', 'Cisarua', '-', 'Cikole', 'Sukabumi', '43115', '-', '-', '14120013');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kk`
--

CREATE TABLE `data_kk` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `scan_kartu_keluarga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kk`
--

INSERT INTO `data_kk` (`id`, `npm`, `scan_kartu_keluarga`) VALUES
(1, '14120001', 'kk_14120001.jpg'),
(2, '14120013', 'kk_14120013.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ktm`
--

CREATE TABLE `data_ktm` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `scan_ktm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_ktm`
--

INSERT INTO `data_ktm` (`id`, `npm`, `scan_ktm`) VALUES
(1, '14120001', 'ktm_14120001.jpg'),
(2, '14120013', 'ktm_14120013.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ktp`
--

CREATE TABLE `data_ktp` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `scan_ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_ktp`
--

INSERT INTO `data_ktp` (`id`, `npm`, `scan_ktp`) VALUES
(1, '14120001', 'ktp_14120001.jpg'),
(2, '14120013', 'ktp_14120013.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mhs`
--

CREATE TABLE `data_mhs` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `nama_mahasiswa` varchar(35) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` enum('Islam','Hindu','Budha','Katolik','Protestan') NOT NULL,
  `nomor_ktp` varchar(25) NOT NULL,
  `alamat_rumah` varchar(60) NOT NULL,
  `alamat_desa` varchar(35) NOT NULL,
  `alamat_kelurahan` varchar(35) NOT NULL,
  `alamat_kecamatan` varchar(35) NOT NULL,
  `alamat_kabupaten` varchar(35) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `telepon_rumah` varchar(12) NOT NULL,
  `telepon_genggam` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nama_penerima_kps` varchar(35) NOT NULL,
  `nomor_penerima_kps` varchar(35) NOT NULL,
  `tipe_tempat_tinggal` enum('rumah orang tua','kost','wali','asrama','lainnya') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_mhs`
--

INSERT INTO `data_mhs` (`id`, `npm`, `nama_mahasiswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `nomor_ktp`, `alamat_rumah`, `alamat_desa`, `alamat_kelurahan`, `alamat_kecamatan`, `alamat_kabupaten`, `kode_pos`, `telepon_rumah`, `telepon_genggam`, `email`, `nama_penerima_kps`, `nomor_penerima_kps`, `tipe_tempat_tinggal`) VALUES
(1, '14120001', 'Nadia Rizky', 'Sukabumi', '1996-06-09', 'P', 'Islam', '32900019910609', 'Jalan Bhayangkara No 137 A', '-', 'Karamat', 'Gunungpuyuh', 'Sukabumi', '43122', '-', '-', 'nadiaadik@gmail.com', '-', '-', 'rumah orang tua'),
(2, '14120002', 'Erna Mariana Dewi', 'Bandung', '1996-02-19', 'P', 'Islam', '32900019960219', 'Jalan Ciganitri No 41 RT 06 RW 05', 'Cipagolo', '-', 'Bojongsoang', 'Bandung', '43122', '-', '085659593939', 'mariana_dewi@gmail.com', '-', '-', 'kost'),
(3, '14120003', 'Budi Kusuma', 'Sukabumi', '1996-08-06', 'L', 'Islam', '32900019960806', 'Perum Griya serpong asri blok d2 no 20', '-', 'Suradita', 'Cisauk', 'Tangerang', '15343', '-', '085694007823', 'aboedi_kusuma@gmail.com', '-', '-', 'rumah orang tua'),
(4, '14120004', 'Sonya Luvita', 'Sukabumi', '1996-03-23', 'P', 'Islam', '32900019960323', 'Jalan Bhayangkara No 136 A', '-', 'Karamat', 'Gunungpuyuh', 'Sukabumi', '43122', '-', '-', 'luvita.sonya@gmail.com', '-', '-', 'rumah orang tua'),
(5, '14120005', 'Ayu Lestari Saputri', 'Sukabumi', '1996-09-03', 'P', 'Islam', '32900019960903', 'Jalan Bhayangkara No 130 A', '-', 'Karamat', 'Gunungpuyuh', 'Sukabumi', '43122', '-', '-', 'ayu.lestari@gmail.com', '-', '-', 'rumah orang tua'),
(6, '14120006', 'Khresna Bima Saputra', 'Sukabumi', '1996-06-29', 'L', 'Islam', '32900019960629', 'Jalan Ciaul Pasir No 23', 'Cisarua', '-', 'Cikole', 'Sukabumi', '43115', '-', '085659480584', 'khresna.bima@gmail.com', '-', '-', 'rumah orang tua'),
(7, '14120007', 'Ernawan Supriadi', 'Sukabumi', '1996-06-18', 'L', 'Islam', '32900019960618', 'Jalan Samsi No 12', 'Cisarua', '-', 'Cikole', 'Sukabumi', '43115', '-', '08568967569', 'ernawan.supriadi@gmail.com', '-', '-', 'rumah orang tua'),
(8, '14120008', 'Aa Solihin Dolar', 'Sukabumi', '1996-09-19', 'L', 'Islam', '32900019910919', 'Jalan Bhayangkara No 130 A', '-', 'Karamat', 'Gunungpuyuh', 'Sukabumi', '43122', '-', '085793985877', 'aa.solihin@gmail.com', '-', '-', 'kost'),
(9, '14120009', 'Nadia Debbie Pratiwi', 'Sukabumi', '1996-02-28', 'P', 'Islam', '32900019910228', 'Jalan Bhayangkara No 132', '-', 'Karamat', 'Gunungpuyuh', 'Sukabumi', '43122', '-', '085627278273', 'nadia.debbie@gmail.com', '-', '-', 'kost'),
(10, '14120010', 'Linda Nurma Shinta', 'Bekasi', '1996-08-26', 'P', 'Islam', '32900019960826', 'Jalan Ciaul Pasir No 24', 'Cisarua', 'Karamat', 'Gunungpuyuh', 'Sukabumi', '43115', '-', '-', 'linda.nurma@gmail.com', '-', '-', 'rumah orang tua'),
(11, '14120011', 'Puteri Prehatini Pamungkas', 'Sukabumi', '1996-12-18', 'P', 'Islam', '32900019961218', 'Jalan Ciaul Pasir No 25', 'Cisarua', '-', 'Cikole', 'Sukabumi', '43115', '-', '-', 'puteri.prehatini@gmail.com', '-', '-', 'rumah orang tua'),
(12, '14120012', 'Robby Janiar Ibnu Sholeh', 'Sukabumi', '1996-06-14', 'L', 'Islam', '32900019960614', 'Jalan Ciaul Pasir No 26', 'Cisarua', '-', 'Cikole', 'Sukabumi', '43115', '-', '-', 'robby.janiar@gmail.com', '-', '-', 'rumah orang tua'),
(13, '14120013', 'Gun Gun Priatna', 'Sukabumi', '1992-02-29', 'L', 'Islam', '32900019920229', 'Jalan Ciaul Pasir No 10 RT 01 RW 12', 'Cisarua', '-', 'Cikole', 'Sukabumi', '43115', '-', '-', 'gungunpriatna@gmail.com', '-', '-', 'rumah orang tua'),
(14, '11111111', 'Nadia Luffy Khaerunnisa', 'Sukabumi', '1992-02-29', 'P', 'Islam', '1122345', 'jalan ciaul', 'Cisarua', '-', 'Cikole', 'Sukabumi', '43115', '0266222272', '-', 'nadialuffy@gmail.com', '-', '-', 'rumah orang tua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_wali`
--

CREATE TABLE `data_wali` (
  `id` int(11) NOT NULL,
  `nama_wali` varchar(35) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` enum('SD','SMP','SMA','S1','S2','S3') NOT NULL,
  `pekerjaan` enum('buruh','tani','pedagang','TNI','Polri','Guru','Dosen','PNS','swasta','lainnya') NOT NULL,
  `penghasilan_per_bulan` int(11) NOT NULL,
  `alamat_rumah` varchar(60) NOT NULL,
  `alamat_desa` varchar(35) NOT NULL,
  `alamat_kelurahan` varchar(35) NOT NULL,
  `alamat_kecamatan` varchar(35) NOT NULL,
  `alamat_kabupaten` varchar(35) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `telepon_rumah` varchar(12) NOT NULL,
  `telepon_genggam` varchar(12) NOT NULL,
  `npm` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `nama_dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama_dokumen`) VALUES
(1, 'formulir_pdpt.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `username`, `hak_akses`) VALUES
(1, 'admin', 'admin'),
(2, '14120001', 'user'),
(3, '14120002', 'user'),
(4, '14120003', 'user'),
(5, '14120004', 'user'),
(6, '14120005', 'user'),
(7, '14120006', 'user'),
(8, '14120007', 'user'),
(9, '14120008', 'user'),
(10, '14120009', 'user'),
(11, '14120010', 'user'),
(12, '14120011', 'user'),
(13, '14120012', 'user'),
(14, '14120013', 'user'),
(15, '11111111', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `userpassword` varchar(60) NOT NULL,
  `useremail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `userpassword`, `useremail`) VALUES
(1, 'admin', 'e172dd95f4feb21412a692e73929961e', 'admin@pdpt.com'),
(2, '14120001', 'ef344be5a8ece059edc2bd8a63d0092f', 'nadiaadik@gmail.com'),
(3, '14120002', 'ef344be5a8ece059edc2bd8a63d0092f', 'mariana_dewi@gmail.com'),
(4, '14120003', '653a6aaa2c5d92ce323187d7764dc112', 'aboedi_kusuma@gmail.com'),
(5, '14120004', 'ef344be5a8ece059edc2bd8a63d0092f', 'luvita.sonya@gmail.com'),
(6, '14120005', 'ef344be5a8ece059edc2bd8a63d0092f', 'ayu.lestari@gmail.com'),
(7, '14120006', '653a6aaa2c5d92ce323187d7764dc112', 'khresna.bima@gmail.com'),
(8, '14120007', '653a6aaa2c5d92ce323187d7764dc112', 'ernawan.supriadi@gmail.com'),
(9, '14120008', '653a6aaa2c5d92ce323187d7764dc112', 'aa.solihin@gmail.com'),
(10, '14120009', 'ef344be5a8ece059edc2bd8a63d0092f', 'nadia.debbie@gmail.com'),
(11, '14120010', 'ef344be5a8ece059edc2bd8a63d0092f', 'linda.nurma@gmail.com'),
(12, '14120011', 'ef344be5a8ece059edc2bd8a63d0092f', 'puteri.prehatini@gmail.com'),
(13, '14120012', '653a6aaa2c5d92ce323187d7764dc112', 'robby.janiar@gmail.com'),
(14, '14120013', '653a6aaa2c5d92ce323187d7764dc112', 'gungunpriatna@gmail.com'),
(15, '11111111', 'e172dd95f4feb21412a692e73929961e', 'nadialuffy@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `data_akademik`
--
ALTER TABLE `data_akademik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `data_ayah`
--
ALTER TABLE `data_ayah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `data_foto`
--
ALTER TABLE `data_foto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `data_ibu`
--
ALTER TABLE `data_ibu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `data_kk`
--
ALTER TABLE `data_kk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `data_ktm`
--
ALTER TABLE `data_ktm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `data_ktp`
--
ALTER TABLE `data_ktp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `data_mhs`
--
ALTER TABLE `data_mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `data_wali`
--
ALTER TABLE `data_wali`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`useremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `data_akademik`
--
ALTER TABLE `data_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_ayah`
--
ALTER TABLE `data_ayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_foto`
--
ALTER TABLE `data_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_ibu`
--
ALTER TABLE `data_ibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_kk`
--
ALTER TABLE `data_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_ktm`
--
ALTER TABLE `data_ktm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_ktp`
--
ALTER TABLE `data_ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_mhs`
--
ALTER TABLE `data_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `data_wali`
--
ALTER TABLE `data_wali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
