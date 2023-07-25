-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 04:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_karyawan`
--

CREATE TABLE `absen_karyawan` (
  `nama_karyawan` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `nomor_induk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_karyawan`
--

INSERT INTO `absen_karyawan` (`nama_karyawan`, `date`, `jam_masuk`, `jam_keluar`, `nomor_induk`) VALUES
('Masdirah', '2023-05-19', '08:00:00', '05:15:00', 6565),
('lulu', '2023-05-19', '09:00:00', '05:15:00', 7360),
('henri herdiyanto', '2023-05-19', '08:15:00', '05:20:00', 3054),
('irhan mustafa', '2023-05-19', '07:45:00', '05:10:00', 5050),
('denny', '2023-05-19', '08:30:00', '05:05:00', 9271),
('irfan', '2023-05-19', '08:10:00', '05:05:00', 9273),
('fajar', '2023-05-19', '08:00:00', '05:30:00', 5861),
('sakka', '2023-05-19', '08:20:00', '05:45:00', 5078),
('salsa', '2023-05-19', '08:05:00', '05:10:00', 7005),
('Masdirah', '2023-05-19', '08:00:00', '05:15:00', 6565),
('lulu', '2023-05-19', '09:00:00', '05:15:00', 7360),
('henri herdiyanto', '2023-05-19', '08:15:00', '05:20:00', 3054),
('irhan mustafa', '2023-05-19', '07:45:00', '05:10:00', 5050),
('denny', '2023-05-19', '08:30:00', '05:05:00', 9271),
('irfan', '2023-05-19', '08:10:00', '05:05:00', 9273),
('fajar', '2023-05-19', '08:00:00', '05:30:00', 5861),
('sakka', '2023-05-19', '08:20:00', '05:45:00', 5078),
('salsa', '2023-05-19', '08:05:00', '05:10:00', 7005);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_divisi` varchar(10) DEFAULT NULL,
  `nama_divisi` varchar(50) DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `id_user`, `kode_divisi`, `nama_divisi`, `time`) VALUES
(17, 12, 'MT-01', 'IT-TEKNOLOGI', '2023-07-20 02:15:53'),
(18, 17, 'MT-02', 'accounting', '2023-07-05 03:45:05'),
(19, 16, 'MT-03', 'KURIR / DRIVER', '2023-07-05 03:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `lama_percobaan` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `level_user` enum('staff','manager') NOT NULL,
  `tanggal_kerja` date NOT NULL,
  `status` enum('kontrak','permanen') NOT NULL,
  `faktor_penilaian` text NOT NULL,
  `catatan_atasan` text NOT NULL,
  `catatan_hrd` text NOT NULL,
  `dievaluasi_oleh` varchar(100) NOT NULL,
  `disetujui_oleh` varchar(100) NOT NULL,
  `status_evaluasi` enum('diproses','diterima','ditolak','perlu perbaikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`id_evaluasi`, `id_karyawan`, `id_divisi`, `lama_percobaan`, `nama_lengkap`, `level_user`, `tanggal_kerja`, `status`, `faktor_penilaian`, `catatan_atasan`, `catatan_hrd`, `dievaluasi_oleh`, `disetujui_oleh`, `status_evaluasi`) VALUES
(13, 45, 17, '3 bulan', 'henri herdiyanto', 'staff', '2023-07-12', 'kontrak', 'fqhfiohqfeio', 'jfhqhfhqef', 'gfjqehf', 'koh dev', 'Merry Yaw', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `form_request`
--

CREATE TABLE `form_request` (
  `id_form` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `jenis_item` enum('barang','jasa') NOT NULL,
  `nama_divisi` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `keperluan1` varchar(255) NOT NULL,
  `harga1` int(11) NOT NULL,
  `keperluan2` varchar(255) NOT NULL,
  `harga2` int(11) NOT NULL,
  `keperluan3` varchar(255) NOT NULL,
  `harga3` int(11) NOT NULL,
  `keperluan4` varchar(255) NOT NULL,
  `harga4` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diketahui` varchar(100) NOT NULL,
  `disetujui` varchar(100) NOT NULL,
  `status` enum('diterima','ditolak','diproses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_request`
--

INSERT INTO `form_request` (`id_form`, `id_karyawan`, `nama_lengkap`, `jenis_item`, `nama_divisi`, `tanggal`, `keperluan1`, `harga1`, `keperluan2`, `harga2`, `keperluan3`, `harga3`, `keperluan4`, `harga4`, `total_harga`, `diketahui`, `disetujui`, `status`) VALUES
(6, 45, 'henri herdiyanto', 'barang', 'IT-TEKNOLOGI', '2023-07-18', 'Renewal Tahunan Asuransi Kesehatan Pacific Cross', 200000, 'bulanan', 400000, 'makan', 600000, 'lain-lain', 300000, 1500000, 'indry', 'merry', 'diproses'),
(8, 37, 'Masdirah', 'barang', 'IT-TEKNOLOGI', '2023-07-20', 'beli kursi', 400000, 'beli meja', 300000, '', 0, '', 0, 700000, '', '', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` varchar(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `nomor_induk` int(11) NOT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_ktp` text DEFAULT NULL,
  `alamat_domisili` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `no_ktp` int(20) DEFAULT NULL,
  `no_npwp` int(20) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `gol_darah` varchar(15) DEFAULT NULL,
  `status_pernikahan` varchar(50) DEFAULT NULL,
  `status_karyawan` enum('aktif','nonaktif') DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level_user` enum('staff','manager','teknisi','kurir','supir','GA') DEFAULT NULL,
  `foto_karyawan` varchar(255) DEFAULT NULL,
  `gaji` int(11) NOT NULL,
  `mulai_kerja` date NOT NULL,
  `akhir_kerja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_user`, `id_divisi`, `nomor_induk`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_ktp`, `alamat_domisili`, `no_hp`, `no_ktp`, `no_npwp`, `agama`, `gol_darah`, `status_pernikahan`, `status_karyawan`, `email`, `username`, `password`, `level_user`, `foto_karyawan`, `gaji`, `mulai_kerja`, `akhir_kerja`) VALUES
(37, 12, 17, 6565, 'Masdirah', 'laki-laki', 'palembang', '2023-06-01', 'palembang', 'cikarang', '986298464299', 2147483647, 589072, 'Islam', 'A', 'Kawin', 'aktif', 'dira@gmail.com', 'dira@gmail.com', 'dira123', 'manager', 'Masdirah-5827590273759358.jpg', 10000000, '2022-12-01', '2023-09-01'),
(43, 17, 18, 7360, 'lulu', 'perempuan', 'temanggung', '2023-07-18', 'terserah', 'terserah', '085216359893', 2147483647, 2147483647, 'Islam', 'A', 'Belum Kawin', 'aktif', 'lulu@gmail.com', 'lulu@gmail.com', 'lulu123', 'manager', 'lulu-87656434567968.jpg', 4000000, '2023-07-09', '2023-09-01'),
(45, 12, 17, 3054, 'henri herdiyanto', 'laki-laki', 'sorong', '1997-05-01', 'malibela', 'cikarang', '085216359893', 2147483647, 2431353, 'Islam', 'O', 'Belum Kawin', 'aktif', 'henri@gmail.com', 'henri@gmail.com', 'henri123', 'staff', 'henri herdiyanto-9271030105970003.jpg', 4000000, '2023-01-01', '2023-08-21'),
(46, 12, 17, 5050, 'irhan mustafa', 'laki-laki', 'temanggung', '2023-07-02', 'temanggung jawa tengah', 'cikarang jawa barat', '085216359893', 2147483647, 2147483647, 'Islam', 'A', 'Belum Kawin', 'aktif', 'irhan@gmail.com', 'irhan@gmail.com', 'irhan123', 'staff', 'irhan mustafa-9271030105970006.jpg', 4000000, '2023-02-01', '2023-08-01'),
(49, 0, 18, 9271, 'DENNY', 'laki-laki', 'palembang', '2022-08-09', 'jakarta', 'cikarang', '89642589', 2147483647, 2147483647, 'Protestan', 'B', 'Kawin', 'aktif', 'denny@gmail.com', 'denny@gmail.com', 'denny123', 'staff', 'DENNY-87656434567968.jpg', 4000000, '2023-07-21', '2023-09-20'),
(50, 17, 18, 9273, 'irfan', 'perempuan', 'temanggung', '2023-01-13', 'jakarta', 'jakarta', '89642589', 2147483647, 2147483647, 'Islam', 'A', 'Belum Kawin', 'aktif', 'prada@gmail.com', 'prada@gmail.com', 'prada123', 'staff', 'prada-9271030105970003.jpg', 4000000, '2023-07-20', '2024-05-01'),
(51, 0, 18, 5861, 'fajar', 'laki-laki', 'palembang', '2023-02-15', 'jogja', 'jogja', '7698768968', 2147483647, 2147483647, 'Islam', 'A', 'Belum Kawin', 'aktif', 'fajar@gmail.com', 'fajar@gmail.com', 'fajar123', 'staff', '', 4000000, '2023-07-20', '2024-02-15'),
(52, 17, 18, 5078, 'sakka', 'laki-laki', 'temanggung', '2023-01-18', 'jogja', 'joghja', '7698768968', 2147483647, 2147483647, 'Islam', 'A', 'Belum Kawin', 'aktif', 'sakka@gmail.com', 'sakka@gmail.com', 'sakka123', 'staff', 'sakka-34566678675438.jpg', 4000000, '2023-07-20', '2023-12-07'),
(53, 0, 17, 7005, 'SALSA', 'perempuan', 'temanggung', '2023-07-21', 'ergheagh', 'ahbtaae', '7698768968', 2147483647, 2147483647, 'Islam', 'A', 'Belum Kawin', 'aktif', 'salsa@gmail.com', 'salsa@gmail.com', 'salsa123', 'staff', 'SALSA-87656434567968.jpg', 4000000, '2023-07-20', '2023-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `tanggal_lahir_ayah` date NOT NULL,
  `pendidikan_terakhir_ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `jabatan_ayah` varchar(100) NOT NULL,
  `nama_perusahaan_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `pendidikan_terakhir_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `jabatan_ibu` varchar(100) NOT NULL,
  `nama_perusahaan_ibu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_keluarga`, `id_karyawan`, `nama_ayah`, `tanggal_lahir_ayah`, `pendidikan_terakhir_ayah`, `pekerjaan_ayah`, `jabatan_ayah`, `nama_perusahaan_ayah`, `nama_ibu`, `tanggal_lahir_ibu`, `pendidikan_terakhir_ibu`, `pekerjaan_ibu`, `jabatan_ibu`, `nama_perusahaan_ibu`) VALUES
(3, 37, 'SUYANTO', '2023-07-11', 'SMA', 'TNI-AD', 'BABINSA KORAMIL SORONG BARAT', 'TNI', 'LENNY TUEYEH', '2023-07-12', 'SMA', 'IBU RUMAH TANGGA', 'tidak ada', 'tidak ada'),
(4, 45, 'SUYANTO', '2023-07-04', 'SMA', 'TNI-AD', 'BABINSA KORAMIL SORONG BARAT', 'TNI', 'LENNY TUEYEH', '2023-07-20', 'SMA', 'IBU RUMAH TANGGA', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kpitekno`
--

CREATE TABLE `kpitekno` (
  `id_kpi_it` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `mulai_kerja` date NOT NULL,
  `indikator1` int(11) NOT NULL,
  `indikator2` int(11) NOT NULL,
  `indikator3` int(11) NOT NULL,
  `indikator4` int(11) NOT NULL,
  `indikator5` int(11) NOT NULL,
  `indikator6` int(11) NOT NULL,
  `indikator7` int(11) NOT NULL,
  `indikator8` int(11) NOT NULL,
  `indikator9` int(11) NOT NULL,
  `indikator10` int(11) NOT NULL,
  `indikator11` int(11) NOT NULL,
  `indikator12` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpitekno`
--

INSERT INTO `kpitekno` (`id_kpi_it`, `id_karyawan`, `id_user`, `id_divisi`, `nama_lengkap`, `mulai_kerja`, `indikator1`, `indikator2`, `indikator3`, `indikator4`, `indikator5`, `indikator6`, `indikator7`, `indikator8`, `indikator9`, `indikator10`, `indikator11`, `indikator12`, `total`, `komentar`) VALUES
(36, 45, 12, 17, 'henri herdiyanto', '2023-07-11', 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 1188, 'kinerja yang bagus');

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
--

CREATE TABLE `lembur` (
  `id_lembur` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `level_user` varchar(50) NOT NULL,
  `project` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai_lembur` varchar(50) NOT NULL,
  `akhir_lembur` varchar(50) NOT NULL,
  `total_lembur` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `mengetahui` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lembur`
--

INSERT INTO `lembur` (`id_lembur`, `id_karyawan`, `nama_divisi`, `nama_lengkap`, `level_user`, `project`, `tanggal`, `mulai_lembur`, `akhir_lembur`, `total_lembur`, `keterangan`, `mengetahui`) VALUES
(8, 37, 'IT-TEKNOLOGI', 'Masdirah', 'manager', 'HIPPO', '2023-06-08', '16.00 SORE', '22.00 MALAM', '6 JAM', 'KEJAR TARGET', 'Masdirah'),
(12, 38, 'IT-TEKNOLOGI', 'Henri herdiyanto', 'staff', 'HIPPO', '2023-06-23', '16.00 SORE', '22.00 MALAM', '6 JAM', 'taxtesting', 'Masdirah');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id_payroll` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `level_user` varchar(100) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `status_ptkp` varchar(50) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `group_payroll` varchar(100) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tempat_kerja` varchar(50) NOT NULL,
  `besar_tunjangan` int(11) NOT NULL,
  `tunjangan_pulsa` int(11) NOT NULL,
  `lain_lain` int(11) NOT NULL,
  `tunjangan_pendidikan` int(11) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `uang_transport` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `dinas` int(11) NOT NULL,
  `cuti_tahunan` int(11) NOT NULL,
  `thr` int(11) NOT NULL,
  `total_tunjangan` int(11) NOT NULL,
  `total_gaji_tunjangan` int(11) NOT NULL,
  `referal_client` int(11) NOT NULL,
  `insentif_kk` int(11) NOT NULL,
  `insentif_spv` int(11) NOT NULL,
  `insentif_staff` int(11) NOT NULL,
  `insentif_spt_op` int(11) NOT NULL,
  `insentif_spt_badan` int(11) NOT NULL,
  `insentif_spt` int(11) NOT NULL,
  `komisi_marketing` int(11) NOT NULL,
  `total_insentif` int(11) NOT NULL,
  `total_pendapatan` int(11) NOT NULL,
  `terlambat` int(11) NOT NULL,
  `cuti_bersama` int(11) NOT NULL,
  `cuti` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `pinjaman` int(11) NOT NULL,
  `bpjs_perusahaan` int(11) NOT NULL,
  `bpjs_karyawan` int(11) NOT NULL,
  `jkk` int(11) NOT NULL,
  `jkm` int(11) NOT NULL,
  `jht_37` int(11) NOT NULL,
  `ditanggung_perusahaan` int(11) NOT NULL,
  `ditanggung_karyawan` int(11) NOT NULL,
  `total_pengurangan` int(11) NOT NULL,
  `total_gaji_bersih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `jenjang_pendidikan` varchar(100) DEFAULT NULL,
  `instansi_pendidikan` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_masuk` date DEFAULT NULL,
  `tahun_lulus` date DEFAULT NULL,
  `index_nilai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `id_karyawan`, `jenjang_pendidikan`, `instansi_pendidikan`, `jurusan`, `tahun_masuk`, `tahun_lulus`, `index_nilai`) VALUES
(3, 37, 'sarjana', 'UNIVERSITAS AMIKOM YOGYAKARTA', 'INFORMATIKA', '2023-06-27', '2023-06-29', '3.72'),
(4, 45, 'sarjana', 'UNIVERSITAS AMIKOM YOGYAKARTA', 'INFORMATIKA', '2019-01-01', '2023-01-28', '3.72');

-- --------------------------------------------------------

--
-- Table structure for table `perjalanan_dinas`
--

CREATE TABLE `perjalanan_dinas` (
  `id_dinas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_pengajuan` varchar(255) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `project` varchar(255) NOT NULL,
  `tujuan` text NOT NULL,
  `jumlah_personel` int(11) NOT NULL,
  `nama_personel` text NOT NULL,
  `jenis_perjalanan` enum('Perjalanan Luar Kota','Perjalanan Dalam Kota') NOT NULL,
  `kota_tujuan` varchar(100) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `waktu_berangkat` varchar(20) NOT NULL,
  `kota_pulang` varchar(100) NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `transportasi` enum('Disiapkan user','Disiapkan perusahaan') NOT NULL,
  `hotel` enum('Disiapkan user','Disiapkan perusahaan') NOT NULL,
  `bagasi` varchar(255) NOT NULL,
  `cash_advance` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `diminta_oleh` varchar(100) NOT NULL,
  `diketahui_oleh` varchar(100) NOT NULL,
  `disetujui_oleh` varchar(100) NOT NULL,
  `status` enum('diproses','diterima','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perjalanan_dinas`
--

INSERT INTO `perjalanan_dinas` (`id_dinas`, `id_user`, `id_divisi`, `nama_pengajuan`, `jabatan`, `project`, `tujuan`, `jumlah_personel`, `nama_personel`, `jenis_perjalanan`, `kota_tujuan`, `tanggal_berangkat`, `waktu_berangkat`, `kota_pulang`, `tanggal_pulang`, `transportasi`, `hotel`, `bagasi`, `cash_advance`, `keterangan`, `diminta_oleh`, `diketahui_oleh`, `disetujui_oleh`, `status`) VALUES
(14, 12, 17, 'Masdirah', 'Manager', 'website HRD', 'pengecekan website hippo di bali', 1, 'henri herdiyanto', 'Perjalanan Luar Kota', 'BALI', '2023-07-18', '09.00 AM', 'CIKARANG', '2023-07-29', 'Disiapkan perusahaan', 'Disiapkan perusahaan', '10 KG', '2.000.000 / ORANG', 'permohonana perjalanan dinas', 'Masdirah', 'HRD INDRY', 'Merry Yaw', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_karyawan`
--

CREATE TABLE `pinjam_karyawan` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mulai_kerja` date NOT NULL,
  `pinjaman_terakhir` date NOT NULL,
  `pelunasan_terakhir` date NOT NULL,
  `nik` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `gaji_terakhir` varchar(100) NOT NULL,
  `nilai_loan` varchar(100) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `pelunasan` varchar(100) NOT NULL,
  `pemohon` varchar(100) NOT NULL,
  `disetujui_oleh` varchar(100) NOT NULL,
  `status` enum('diproses','diterima','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_project` varchar(255) NOT NULL,
  `todolist` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `id_user`, `id_karyawan`, `nama_project`, `todolist`) VALUES
(5, 0, 37, 'project pertama', 'testing todolist kordinator'),
(6, 0, 45, 'testing todolist staff', 'testing todolist karyawan'),
(7, 1, 0, 'testing todolist admin', 'testing todolist admin');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `infrastruktur` varchar(255) NOT NULL,
  `ruangan` varchar(100) NOT NULL,
  `jenis_perbaikan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `prepared` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sop_admin`
--

CREATE TABLE `sop_admin` (
  `id_sop` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `aturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sop_admin`
--

INSERT INTO `sop_admin` (`id_sop`, `id_user`, `id_divisi`, `aturan`) VALUES
(11, 1, 17, 'SOP (Standard Operating Procedure) untuk divisi IT dapat bervariasi tergantung pada kebutuhan, ukuran, dan jenis organisasi. Berikut ini adalah beberapa contoh SOP yang umumnya terdapat dalam divisi IT:\r\n\r\n1.Manajemen Aset TI:\r\nPembelian, penerimaan, dan inventarisasi perangkat keras dan perangkat lunak.\r\nPemberian izin penggunaan perangkat keras dan perangkat lunak.\r\nPemeliharaan dan perawatan perangkat keras.\r\nManajemen lisensi perangkat lunak.\r\n2.Pemeliharaan dan Perbaikan:'),
(15, 1, 18, 'ini contoh SOP untuk Accounting\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, quam libero facilis atque incidunt excepturi omnis maiores est distinctio repellat quos magnam eius sapiente minus expedita. Perspiciatis voluptatem molestias vero?\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'admin', 'admin', 0),
(12, 'Masdirah', 'dira@gmail.com', 'dira123', 1),
(17, 'lulu', 'lulu@gmail.com', 'lulu123', 1),
(18, 'henri herdiyanto', 'henri@gmail.com', 'henri123', 2),
(19, 'irhan mustafa', 'irhan@gmail.com', 'irhan123', 2),
(21, 'DENNY', 'denny@gmail.com', 'denny123', 2),
(22, 'DENNY', 'denny@gmail.com', 'denny123', 2),
(23, 'prada', 'prada@gmail.com', 'prada123', 2),
(24, 'fajar', 'fajar@gmail.com', 'fajar123', 2),
(25, 'sakka', 'sakka@gmail.com', 'sakka123', 2),
(26, 'SALSA', 'salsa@gmail.com', 'salsa123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`);

--
-- Indexes for table `form_request`
--
ALTER TABLE `form_request`
  ADD PRIMARY KEY (`id_form`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `kpitekno`
--
ALTER TABLE `kpitekno`
  ADD PRIMARY KEY (`id_kpi_it`);

--
-- Indexes for table `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id_lembur`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id_payroll`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `pinjam_karyawan`
--
ALTER TABLE `pinjam_karyawan`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `sop_admin`
--
ALTER TABLE `sop_admin`
  ADD PRIMARY KEY (`id_sop`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `form_request`
--
ALTER TABLE `form_request`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kpitekno`
--
ALTER TABLE `kpitekno`
  MODIFY `id_kpi_it` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id_payroll` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pinjam_karyawan`
--
ALTER TABLE `pinjam_karyawan`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sop_admin`
--
ALTER TABLE `sop_admin`
  MODIFY `id_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
