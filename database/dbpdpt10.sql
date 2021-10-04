-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2021 at 04:32 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

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
-- Table structure for table `berita`
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
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `slug`, `isi`, `status_berita`, `id_user`, `tanggal`, `nama`) VALUES
(10, 'Info Akademik : Formulir PDPT', 'info-akademik-formulir-pdpt', '<p>Formulir PDPT dapat diunduh langsung. Silakan klik menu Download Dokumen untuk mengunduh formulir PDPT.</p>\r\n<p>Terima Kasih.</p>\r\n<p>-Admin</p>', 'Publish', 1, '2016-01-15 13:41:28', 'admin'),
(11, 'Info Akademik : Pendataan PDPT', 'info-akademik-pendataan-pdpt', '<p>Kepada seluruh mahasiswa, bagi yang belum terdaftar dalam PDPT silahkan mendaftar di menu Pendaftaran. Bagi yang sudah terdaftar, silakan login&nbsp;dan&nbsp;lengkapi data diri masing - masing.</p>\r\n<p>Terima Kasih.</p>\r\n<p>-Bagian Kemahasiswaan</p>', 'Publish', 1, '2016-01-15 13:37:05', 'Bagian Kemahasiswaan');

-- --------------------------------------------------------

--
-- Table structure for table `data_akademik`
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

-- --------------------------------------------------------

--
-- Table structure for table `data_ayah`
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

-- --------------------------------------------------------

--
-- Table structure for table `data_foto`
--

CREATE TABLE `data_foto` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `scan_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_ibu`
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

-- --------------------------------------------------------

--
-- Table structure for table `data_kk`
--

CREATE TABLE `data_kk` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `scan_kartu_keluarga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_ktm`
--

CREATE TABLE `data_ktm` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `scan_ktm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_ktp`
--

CREATE TABLE `data_ktp` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `scan_ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_mhs`
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

-- --------------------------------------------------------

--
-- Table structure for table `data_wali`
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
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `nama_dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama_dokumen`) VALUES
(1, 'formulir_pdpt.docx');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `username`, `hak_akses`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `userpassword` varchar(60) NOT NULL,
  `useremail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `userpassword`, `useremail`) VALUES
(1, 'admin', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'admin@pdpt.com');

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

ALTER TABLE `login` CHANGE `userpassword` `userpassword` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

UPDATE `login` SET `userpassword` = '$2y$10$ycK2cLVBDyhhkUK2Ew1ZKOwCLx9gaY3UVMUwi/42tOB2gyxErLPTy' WHERE `login`.`id` = 1;

ALTER TABLE `dokumen`  ADD `upload_path` VARCHAR(255) NOT NULL  AFTER `nama_dokumen`;