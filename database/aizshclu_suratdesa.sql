-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2020 at 03:32 PM
-- Server version: 5.7.31-cll-lve
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aizshclu_suratdesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahli_waris`
--

CREATE TABLE `ahli_waris` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) DEFAULT NULL,
  `pemberi_waris` varchar(45) NOT NULL,
  `keterangan_pemberi_waris` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ahli_waris`
--

INSERT INTO `ahli_waris` (`id_sub_surat`, `id_surat`, `pemberi_waris`, `keterangan_pemberi_waris`) VALUES
('SUB001', 'SRT023', 'Zaenal Abidin', 'Telah Meninggal'),
('SUB002', 'SRT024', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_bebas_pajak`
--

CREATE TABLE `keterangan_bebas_pajak` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) NOT NULL,
  `objek_pajak` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_bebas_pajak`
--

INSERT INTO `keterangan_bebas_pajak` (`id_sub_surat`, `id_surat`, `objek_pajak`) VALUES
('SUB001', 'SRT005', 'Tanah');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_beda_nama`
--

CREATE TABLE `keterangan_beda_nama` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) NOT NULL,
  `objek_salah_nama` varchar(45) NOT NULL,
  `nama_objek_salah_nama` varchar(45) NOT NULL,
  `tanggal_lahir_objek_salah_nama` date NOT NULL,
  `tempat_lahir_objek_salah_nama` varchar(25) NOT NULL,
  `jenis_kelamin_objek_salah_nama` char(1) NOT NULL,
  `alamat_objek_salah_nama` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_beda_nama`
--

INSERT INTO `keterangan_beda_nama` (`id_sub_surat`, `id_surat`, `objek_salah_nama`, `nama_objek_salah_nama`, `tanggal_lahir_objek_salah_nama`, `tempat_lahir_objek_salah_nama`, `jenis_kelamin_objek_salah_nama`, `alamat_objek_salah_nama`) VALUES
('SUB001', 'SRT006', 'BPKB', 'Sukma Azani', '1996-07-04', 'Lombok', 'L', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_berpergian`
--

CREATE TABLE `keterangan_berpergian` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) NOT NULL,
  `daerah_keberadaan` varchar(25) NOT NULL,
  `tahun_kepergian` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_berpergian`
--

INSERT INTO `keterangan_berpergian` (`id_sub_surat`, `id_surat`, `daerah_keberadaan`, `tahun_kepergian`) VALUES
('SUB001', 'SRT001', 'Jayapura', 2015),
('SUB002', 'SRT010', 'Jepar', 2015),
('SUB003', 'SRT011', 'Hfgh', 2535),
('SUB004', 'SRT012', 'Vfddcc', 535),
('SUB005', 'SRT016', '54765', 8355),
('SUB006', 'SRT017', 'Dijd', 852),
('SUB007', 'SRT018', 'Mataram', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_cerai`
--

CREATE TABLE `keterangan_cerai` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) NOT NULL,
  `status_cerai` varchar(25) NOT NULL,
  `nama_pasangan` varchar(45) NOT NULL,
  `tahun_cerai` bigint(20) NOT NULL,
  `tempat_cerai` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_cerai`
--

INSERT INTO `keterangan_cerai` (`id_sub_surat`, `id_surat`, `status_cerai`, `nama_pasangan`, `tahun_cerai`, `tempat_cerai`) VALUES
('SUB001', 'SRT003', 'Cerai Mati', 'Euis Kosasih', 2015, 'Bandung'),
('SUB002', 'SRT013', 'Cerai Hidup', 'Zaenab', 2017, 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_kehilangan`
--

CREATE TABLE `keterangan_kehilangan` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) NOT NULL,
  `objek_hilang` varchar(45) NOT NULL,
  `tempat_hilang` char(100) NOT NULL,
  `tanggal_hilang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_kehilangan`
--

INSERT INTO `keterangan_kehilangan` (`id_sub_surat`, `id_surat`, `objek_hilang`, `tempat_hilang`, `tanggal_hilang`) VALUES
('SUB001', 'SRT007', 'Laptop', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', '2019-08-06'),
('SUB002', 'SRT015', 'Kartu Keluarga ( KK )', 'Rumah', '2002-03-18'),
('SUB003', 'SRT019', '5208013112730063', 'KTP', '2002-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_kelakuan`
--

CREATE TABLE `keterangan_kelakuan` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_kelakuan`
--

INSERT INTO `keterangan_kelakuan` (`id_sub_surat`, `id_surat`) VALUES
('SUB001', 'SRT002'),
('SUB002', 'SRT014'),
('SUB003', 'SRT020'),
('SUB004', 'SRT021'),
('SUB005', 'SRT022'),
('SUB006', 'SRT025'),
('SUB007', 'SRT026');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_ksm`
--

CREATE TABLE `keterangan_ksm` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) NOT NULL,
  `nomor_polisi` varchar(11) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `tahun_pembuatan` bigint(20) NOT NULL,
  `tahun_perakitan` bigint(20) NOT NULL,
  `isi_silinder` varchar(15) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `nomor_rangka` varchar(25) NOT NULL,
  `nomor_mesin` varchar(25) NOT NULL,
  `nomor_bpkb` varchar(25) NOT NULL,
  `atas_nama_bpkb` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_ksm`
--

INSERT INTO `keterangan_ksm` (`id_sub_surat`, `id_surat`, `nomor_polisi`, `merk`, `tipe`, `jenis`, `tahun_pembuatan`, `tahun_perakitan`, `isi_silinder`, `warna`, `nomor_rangka`, `nomor_mesin`, `nomor_bpkb`, `atas_nama_bpkb`) VALUES
('SUB001', 'SRT004', 'M 9877 NM', 'Honda', 'Vario', 'Skuter Matic', 2014, 2014, '90 cc', 'Merah dan Hitam', 'HVR 14', 'HND9014', '070814HNDVROIDN380515', 'Suckma Azani');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_telah_menikah`
--

CREATE TABLE `keterangan_telah_menikah` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) NOT NULL,
  `nama_pasangan` varchar(45) NOT NULL,
  `tanggal_lahir_pasangan` date NOT NULL,
  `tempat_lahir_pasangan` varchar(45) NOT NULL,
  `jenis_kelamin_pasangan` char(1) NOT NULL,
  `agama_pasangan` varchar(15) NOT NULL,
  `kebangsaan_pasangan` varchar(15) NOT NULL,
  `pekerjaan_pasangan` varchar(25) NOT NULL,
  `alamat_pasangan` char(100) NOT NULL,
  `tanggal_nikah` date NOT NULL,
  `tempat_nikah` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_telah_menikah`
--

INSERT INTO `keterangan_telah_menikah` (`id_sub_surat`, `id_surat`, `nama_pasangan`, `tanggal_lahir_pasangan`, `tempat_lahir_pasangan`, `jenis_kelamin_pasangan`, `agama_pasangan`, `kebangsaan_pasangan`, `pekerjaan_pasangan`, `alamat_pasangan`, `tanggal_nikah`, `tempat_nikah`) VALUES
('SUB001', 'SRT008', 'Linda Rosmina', '1997-08-09', 'Ciamis', 'P', 'Islam', 'WNI', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', '2018-08-18', 'Ciamis');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` char(7) NOT NULL,
  `id_warga` char(7) NOT NULL,
  `id_surat` char(7) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemotongan_hewan`
--

CREATE TABLE `pemotongan_hewan` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) DEFAULT NULL,
  `hewan` varchar(45) NOT NULL,
  `umur_hewan` varchar(45) NOT NULL,
  `warna_bulu` varchar(45) NOT NULL,
  `warna_ekor` varchar(45) NOT NULL,
  `tipe_tanduk` varchar(45) NOT NULL,
  `warna_kaki` varchar(45) NOT NULL,
  `tanda_lain` varchar(45) NOT NULL,
  `alasan_pemotongan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertanggung_jawaban_ortu`
--

CREATE TABLE `pertanggung_jawaban_ortu` (
  `id_sub_surat` char(7) NOT NULL,
  `id_surat` char(7) DEFAULT NULL,
  `nama_anak` varchar(45) NOT NULL,
  `tanggal_lahir_anak` date NOT NULL,
  `tempat_lahir_anak` varchar(25) NOT NULL,
  `jenis_kelamin_anak` char(1) NOT NULL,
  `agama_anak` varchar(15) NOT NULL,
  `kebangsaan_anak` varchar(25) NOT NULL,
  `pekerjaan_anak` varchar(25) NOT NULL,
  `alamat_anak` char(100) NOT NULL,
  `jenis_kegiatan` varchar(45) NOT NULL,
  `nama_instansi_kegiatan` varchar(25) NOT NULL,
  `alamat_instansi` char(100) NOT NULL,
  `hubungan_ortu_dengan_anak` varchar(25) NOT NULL,
  `nama_kades` varchar(45) NOT NULL,
  `nama_desa` varchar(45) NOT NULL,
  `nama_kadus` varchar(45) NOT NULL,
  `nama_dusun` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanggung_jawaban_ortu`
--

INSERT INTO `pertanggung_jawaban_ortu` (`id_sub_surat`, `id_surat`, `nama_anak`, `tanggal_lahir_anak`, `tempat_lahir_anak`, `jenis_kelamin_anak`, `agama_anak`, `kebangsaan_anak`, `pekerjaan_anak`, `alamat_anak`, `jenis_kegiatan`, `nama_instansi_kegiatan`, `alamat_instansi`, `hubungan_ortu_dengan_anak`, `nama_kades`, `nama_desa`, `nama_kadus`, `nama_dusun`) VALUES
('SUB001', 'SRT009', 'Robert Tantular', '2005-02-02', 'Bandung', 'L', 'Islam', 'WNI', 'Pelajar', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'Pelatihan Paskibra Tingkat Provinsi', 'Dinas Pendidikan', 'Jl Kemayu no 89 Lombok', 'Anak Angkat', 'Asep Surahman', 'Jenggala', 'Jarot Priatna', 'Telugu');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` char(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `nip` char(16) NOT NULL,
  `nik` char(16) NOT NULL,
  `kontak` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama`, `jabatan`, `nip`, `nik`, `kontak`) VALUES
('PTG001', 'rahmansyah', 'e10adc3949ba59abbe56e057f20f883e', 'Adrian Rahmansyah', 'Kaur Administrasi', '131-0-112-87653', '3205250807198700', '081201021996');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` char(7) NOT NULL,
  `id_pemohon` char(7) NOT NULL,
  `id_pencetak` char(7) DEFAULT NULL,
  `status` varchar(225) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tipe_surat` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(25) NOT NULL,
  `kebangsaan` varchar(25) NOT NULL,
  `status_pernikahan` varchar(25) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `alamat` char(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `nik` char(16) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `atas_nama_ttd` varchar(45) NOT NULL,
  `jabatan_ttd` varchar(25) NOT NULL,
  `nip_ttd` char(25) NOT NULL,
  `lamp_ktp` varchar(100) NOT NULL,
  `lamp_kk` varchar(100) NOT NULL,
  `lamp_lain` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `id_pemohon`, `id_pencetak`, `status`, `nomor_surat`, `tipe_surat`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kebangsaan`, `status_pernikahan`, `pekerjaan`, `alamat`, `jenis_kelamin`, `nik`, `tanggal_surat`, `atas_nama_ttd`, `jabatan_ttd`, `nip_ttd`, `lamp_ktp`, `lamp_kk`, `lamp_lain`) VALUES
('SRT001', 'WRG001', NULL, '', '471/Pem/176/JG/', 'Keterangan Berpergian', 'Sukma Azani', 'Lombok', '1996-07-04', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2019-08-12', 'Asep Surahman', 'Kepala Desa', '131-00-89876', '', '', ''),
('SRT002', 'WRG001', NULL, '', '145/Trantib/02/', 'Keterangan Kelakuan Baik', 'Suckma Azani', 'Lombok', '1996-07-04', ' Islam', 'WNI', 'Menikah', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2019-08-12', 'Asep Surahman', 'Kepala Desa', '131-00-89876', '', '', ''),
('SRT003', 'WRG001', NULL, '', '471/Pem./02/JG/', 'Keterangan Cerai', 'Suckma Azani', 'Lombok', '1996-07-04', ' Islam', 'WNI', 'Menikah', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2019-08-12', 'Asep Surahman', 'Kepala Desa', '131-00-89876', '', '', ''),
('SRT004', 'WRG001', NULL, '', 'Umum.1/08/JG/II', 'Keterangan Kepemilikan Sepeda Motor', 'Suckma Azani', 'Lombok', '1996-07-04', 'Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2019-08-12', 'Asep Surahman', 'Kepala Desa', '131-00-89876', '', '', ''),
('SRT005', 'WRG001', NULL, '', '472/Pem /JG/05/', 'Keterangan Bebas Pajak', 'Suckma Azani', 'Lombok', '1996-07-04', 'Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2019-08-12', 'Asep Surahman', 'Kepala Desa', '131-00-89876', '', '', ''),
('SRT006', 'WRG001', NULL, '', '471/Pem/12/JG/V', 'Keterangan Beda Nama', 'Suckma Azani', 'Lombok', '1996-07-04', 'Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2019-08-12', 'Aep Suherman', 'Sekretaris Desa', '131-01-87875', '', '', ''),
('SRT007', 'WRG001', NULL, '', '350/Trantib/08/', 'Keterangan Kehilangan', 'Suckma Azani', 'Lombok', '1996-07-04', 'Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2019-08-12', 'Aep Suherman', 'Sekretaris Desa', '131-01-87875', '', '', ''),
('SRT008', 'WRG001', NULL, '', '350/Trantib/87/JG/XII/2018', 'Keterangan Telah Menikah', 'Suckma Azani', 'Lombok', '1996-07-04', 'Islam', 'WNI', 'Menikah', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2019-08-12', 'Aep Suherman', 'Sekretaris Desa', '131-01-87875', '', '', ''),
('SRT009', 'WRG001', NULL, '', '', 'Pertanggungjawaban Orang Tua', 'Suckma Azani', 'Lombok', '1996-07-04', 'Islam', 'WNI', 'Menikah', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2019-08-12', 'Aep Suherman', 'Sekretaris Desa', '131-01-87875', '', '', ''),
('SRT010', 'WRG001', NULL, '', 'batal', 'Keterangan Berpergian', 'Sukma Azani', 'Lombok', '2002-02-11', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT011', 'WRG001', NULL, '', 'batal', 'Keterangan Berpergian', 'Suckma Azani', 'Lombok', '2002-02-11', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT012', 'WRG001', NULL, '', '-', 'Keterangan Berpergian', 'Suckma Azani', 'Lombok', '2002-02-07', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT013', 'WRG001', NULL, '', 'batal', 'Keterangan Cerai', 'Suckma Azani', 'Lombok', '1996-03-14', ' Islam', 'WNI', 'Duda', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT014', 'WRG001', NULL, '', '-', 'Keterangan Kelakuan Baik', 'Suckma Azani', 'Lombok', '1996-07-04', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT015', 'WRG001', NULL, '', '-', 'Keterangan Kehilangan', 'Suckma Azani', 'Lombok', '2002-03-05', ' Islam', 'WNI', 'Menikah', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT016', 'WRG001', NULL, '', '-', 'Keterangan Berpergian', 'Suckma Azani', 'Lombok', '1996-07-04', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT017', 'WRG001', NULL, '', '-', 'Keterangan Berpergian', 'Suckma Azani', 'Lombok', '1995-03-01', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT018', 'WRG001', NULL, '', '-', 'Keterangan Berpergian', 'Suckma Azani', 'Lombok', '1995-03-01', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT019', 'WRG001', NULL, '', '-', 'Keterangan Kehilangan', 'Suckma Azani', 'Lombok', '2002-08-02', ' Islam', 'WNI', 'Menikah', 'Petani', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT020', 'WRG004', NULL, '', '-', 'Keterangan Kelakuan Baik', 'Permana Azani', 'Mataram', '1990-10-26', 'Islam', 'WNI', 'Menikah', 'Perangkat Desa', 'Dusun Nurul Huda', 'L', '5208063112225000', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT021', 'WRG005', NULL, '', '-', 'Keterangan Kelakuan Baik', 'JOHAN', 'Dusun Tanak Song Daya', '1988-01-18', 'Islam', 'WNI', 'Menikah', 'Karyawan Swasta', 'Dusun Langgar Sari', 'L', '5208011801880003', '0000-00-00', '-', '-', '-', '', '', ''),
('SRT022', 'WRG001', NULL, '', '-', 'Keterangan Kelakuan Baik', 'Suckma Azani', 'Lombok', '1995-03-01', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '0000-00-00', '-', '-', '-', 'https://terraciv.me/lampiran_surat/lampiran_ktp-SRT022.jpg', 'https://terraciv.me/lampiran_surat/lampiran_kk-SRT022.jpg', ''),
('SRT023', 'WRG001', NULL, '', '-', 'Keterangan Ahli Waris', 'Suckma Azani', 'Lombok', '1995-03-01', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2020-09-12', '-', '-', '-', '', '', ''),
('SRT024', 'WRG001', NULL, '', '-', 'Keterangan Ahli Waris', 'Suckma Azani', 'Lombok', '1995-03-01', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2020-09-12', '-', '-', '-', 'https://terraciv.me/lampiran_surat/lampiran_ktp-SRT024.jpg', 'https://terraciv.me/lampiran_surat/lampiran_kk-SRT024.jpg', ''),
('SRT025', 'WRG001', NULL, '', '-', 'Keterangan Kelakuan Baik', 'Suckma Azani', 'Lombok', '1995-03-01', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2020-09-12', '-', '-', '-', '', '', ''),
('SRT026', 'WRG001', NULL, '', '-', 'Keterangan Kelakuan Baik', 'Suckma Azani', 'Lombok', '1995-03-01', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '3205220704960005', '2020-09-13', '-', '-', '-', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id_warga` char(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(25) NOT NULL,
  `kebangsaan` varchar(25) NOT NULL,
  `status_pernikahan` varchar(25) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `alamat` char(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `kontak` varchar(13) DEFAULT NULL,
  `nik` char(16) NOT NULL,
  `ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id_warga`, `username`, `password`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kebangsaan`, `status_pernikahan`, `pekerjaan`, `alamat`, `jenis_kelamin`, `kontak`, `nik`, `ktp`) VALUES
('WRG001', 'cule', '50276c94e56a704f38fc21572a57574c', 'Suckma Azani', 'Lombok', '1995-03-01', ' Islam', 'WNI', 'Lajang', 'Mahasiswa', 'Kp Telugu RT 02 RW 03 Desa Jenggala Kecamatan Jenggala Kabupaten Barat Nusa Tenggara Timur', 'L', '083822127362', '3205220704960005', ''),
('WRG002', 'zaldi19', 'e10adc3949ba59abbe56e057f20f883e', 'Rizaldi Ramdlani Pamungkas', 'Garut', '1996-02-01', 'Islam', 'WNI', 'Lajang', 'Swasta', 'Garut', 'L', '085353140568', '3205120102960009', ''),
('WRG004', 'Permana Azani', 'e10adc3949ba59abbe56e057f20f883e', 'Permana Azani', 'Mataram', '1990-10-26', 'Islam', 'WNI', 'Menikah', 'Perangkat Desa', 'Dusun Nurul Huda', 'L', '082337028036', '5208063112225000', 'https://terraciv.me/ktp_uploads/WRG004.jpeg'),
('WRG005', 'JOHAN', 'e10adc3949ba59abbe56e057f20f883e', 'JOHAN', 'Dusun Tanak Song Daya', '1988-01-18', 'Islam', 'WNI', 'Menikah', 'Karyawan Swasta', 'Dusun Langgar Sari', 'L', '085333923480', '5208011801880003', 'https://terraciv.me/ktp_uploads/WRG005.jpeg'),
('WRG006', 'acah', '50276c94e56a704f38fc21572a57574c', 'Nurpasah', 'Tanak Song Daya', '1984-04-04', 'Islam', 'WNI', 'Menikah', 'Kepala Dusun', 'Jalan Raya Tanjung Bayan Tanak Song Desa Jenggala', 'L', '082340277128', '5208010404840003', 'https://terraciv.me/ktp_uploads/WRG006.jpeg'),
('WRG007', 'permana', '79cddb6568e095c31bc74f7b78499c02', 'Permana Azani', 'Mataram', '1990-10-26', 'Islam', 'WNI', 'Menikah', 'Perangkat Desa', 'Dusun Nurul Huda', 'L', '082341830067', '5208012610900001', 'https://terraciv.me/ktp_uploads/WRG007.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahli_waris`
--
ALTER TABLE `ahli_waris`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `keterangan_bebas_pajak`
--
ALTER TABLE `keterangan_bebas_pajak`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `keterangan_beda_nama`
--
ALTER TABLE `keterangan_beda_nama`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `keterangan_berpergian`
--
ALTER TABLE `keterangan_berpergian`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `keterangan_cerai`
--
ALTER TABLE `keterangan_cerai`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `keterangan_kehilangan`
--
ALTER TABLE `keterangan_kehilangan`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `keterangan_kelakuan`
--
ALTER TABLE `keterangan_kelakuan`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `keterangan_ksm`
--
ALTER TABLE `keterangan_ksm`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD UNIQUE KEY `nomor_polisi` (`nomor_polisi`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `keterangan_telah_menikah`
--
ALTER TABLE `keterangan_telah_menikah`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_surat` (`id_surat`),
  ADD KEY `id_warga` (`id_warga`);

--
-- Indexes for table `pemotongan_hewan`
--
ALTER TABLE `pemotongan_hewan`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `pertanggung_jawaban_ortu`
--
ALTER TABLE `pertanggung_jawaban_ortu`
  ADD PRIMARY KEY (`id_sub_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ahli_waris`
--
ALTER TABLE `ahli_waris`
  ADD CONSTRAINT `ahli_waris_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan_bebas_pajak`
--
ALTER TABLE `keterangan_bebas_pajak`
  ADD CONSTRAINT `keterangan_bebas_pajak_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan_beda_nama`
--
ALTER TABLE `keterangan_beda_nama`
  ADD CONSTRAINT `keterangan_beda_nama_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan_berpergian`
--
ALTER TABLE `keterangan_berpergian`
  ADD CONSTRAINT `keterangan_berpergian_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan_cerai`
--
ALTER TABLE `keterangan_cerai`
  ADD CONSTRAINT `keterangan_cerai_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan_kehilangan`
--
ALTER TABLE `keterangan_kehilangan`
  ADD CONSTRAINT `keterangan_kehilangan_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan_kelakuan`
--
ALTER TABLE `keterangan_kelakuan`
  ADD CONSTRAINT `keterangan_kelakuan_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan_ksm`
--
ALTER TABLE `keterangan_ksm`
  ADD CONSTRAINT `keterangan_ksm_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan_telah_menikah`
--
ALTER TABLE `keterangan_telah_menikah`
  ADD CONSTRAINT `keterangan_telah_menikah_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemotongan_hewan`
--
ALTER TABLE `pemotongan_hewan`
  ADD CONSTRAINT `pemotongan_hewan_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanggung_jawaban_ortu`
--
ALTER TABLE `pertanggung_jawaban_ortu`
  ADD CONSTRAINT `pertanggung_jawaban_ortu_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`id_pemohon`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
