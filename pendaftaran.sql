-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2019 pada 17.00
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_pendaftaran`
--

CREATE TABLE `biaya_pendaftaran` (
  `id_biaya` int(11) NOT NULL,
  `kode_bank` varchar(10) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `biaya_daftar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_pendaftaran`
--

INSERT INTO `biaya_pendaftaran` (`id_biaya`, `kode_bank`, `nama_bank`, `no_rekening`, `biaya_daftar`) VALUES
(8, '002', 'BANK BRI', '0912545690', 'RP. 100.000'),
(10, '008', 'BANK PANIN', '903846575', 'RP. 400.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pendaftaran`
--

CREATE TABLE `jadwal_pendaftaran` (
  `id_jadwal` int(11) NOT NULL,
  `nama_jalur` varchar(30) NOT NULL,
  `tgl_pendaftaran` varchar(50) NOT NULL,
  `pengumuman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_pendaftaran`
--

INSERT INTO `jadwal_pendaftaran` (`id_jadwal`, `nama_jalur`, `tgl_pendaftaran`, `pengumuman`) VALUES
(7, 'JALUR REGULER', '22 Agustus 2109 sampai 17 September 2019', '28 September 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id_jadwal_ujian` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `kegiatan` varchar(30) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tempat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id_jadwal_ujian`, `hari`, `kegiatan`, `waktu`, `tempat`) VALUES
(1, 'MINGGU', 'UJIAN JALUR BEASISWA', 'PUKUL 12.00 PM', 'AULA KAMPUS STIH DAMARICA'),
(3, 'SABTU', 'UJIAN JALUR BEASISWA', 'PUKUL 08:45 AM', 'RUANGAN 202, STIH DAMARICA PAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `nis` varchar(12) NOT NULL,
  `nm_pendaftar` varchar(30) NOT NULL,
  `foto_bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`nis`, `nm_pendaftar`, `foto_bukti`) VALUES
('222222222222', 'INDRA WIJAYA', 'ABJM0207.JPG'),
('777777777777', 'INDRA WIJAYA', 'ABJM0207.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id_user` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nm_lengkap` varchar(30) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `asal_prov` varchar(20) NOT NULL,
  `kota_asal` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `kwr` varchar(10) NOT NULL,
  `jenjang` varchar(20) NOT NULL,
  `tahun_lulus_sma` varchar(5) NOT NULL,
  `kode_pos` varchar(12) NOT NULL,
  `nm_ayah` varchar(30) NOT NULL,
  `nm_ibu` varchar(30) NOT NULL,
  `alamat_ortu` varchar(25) NOT NULL,
  `no_hp_ortu` varchar(12) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `sumber_informasi` varchar(15) NOT NULL,
  `nm_jurusan` varchar(15) NOT NULL,
  `konsentrasi` varchar(15) NOT NULL,
  `foto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id_user`, `nis`, `password`, `nm_lengkap`, `jk`, `tempat_lahir`, `tgl_lahir`, `asal_prov`, `kota_asal`, `alamat`, `agama`, `kwr`, `jenjang`, `tahun_lulus_sma`, `kode_pos`, `nm_ayah`, `nm_ibu`, `alamat_ortu`, `no_hp_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `sumber_informasi`, `nm_jurusan`, `konsentrasi`, `foto`) VALUES
(2, '222222222222', '$2y$10$GybIA6e0QBeVZ3yPuTRuce4StkGJ7C4ULSUB2TkxglkHyj5snqKPa', 'Nancy Loloarung', 'Perempuan', 'MENGKENDEK', '1998-05-15', 'SULAWESI SELATAN', 'Palopo', 'JL. PERINTIS KM 13', 'Kristen', 'Indonesia', 'sma ipa', '2016', '90124', 'BUDI', 'BECCE', 'MENGKENDEK KM 12', '087352173927', 'PETANI', 'pns', 'Keluarga', 'Ilmu Hukum', 'Hukum Perdata', 'ATLC3909.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_pendaftar` varchar(30) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `nis`, `nama_pendaftar`, `prodi`, `keterangan`) VALUES
(4, '9971235857', 'INDRA WIJAYA', 'Managemen Informatika', 'LULUS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indeks untuk tabel `jadwal_pendaftaran`
--
ALTER TABLE `jadwal_pendaftaran`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal_ujian`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pendaftaran`
--
ALTER TABLE `jadwal_pendaftaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id_jadwal_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
