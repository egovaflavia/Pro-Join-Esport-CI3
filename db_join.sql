-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 03:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_join`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_achievement`
--

CREATE TABLE IF NOT EXISTS `tb_achievement` (
`achievement_id` int(11) NOT NULL,
  `achievement_idtournament` varchar(255) NOT NULL,
  `achievement_idtim` varchar(255) NOT NULL,
  `achievement_idplayer` varchar(255) NOT NULL,
  `achievement_peringkat` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_achievement`
--

INSERT INTO `tb_achievement` (`achievement_id`, `achievement_idtournament`, `achievement_idtim`, `achievement_idplayer`, `achievement_peringkat`) VALUES
(1, '8994', '77', 'pb_rahma ', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagan`
--

CREATE TABLE IF NOT EXISTS `tb_bagan` (
`bagan_id` int(11) NOT NULL,
  `bagan_tournamentid` varchar(255) NOT NULL,
  `bagan_tima` varchar(255) NOT NULL,
  `bagan_timb` varchar(255) NOT NULL,
  `bagan_waktu` text NOT NULL,
  `bagan_scorea` varchar(11) NOT NULL,
  `bagan_scoreb` varchar(11) NOT NULL,
  `bagan_babak` varchar(255) NOT NULL,
  `bagan_menang` varchar(255) NOT NULL,
  `bagan_keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagan`
--

INSERT INTO `tb_bagan` (`bagan_id`, `bagan_tournamentid`, `bagan_tima`, `bagan_timb`, `bagan_waktu`, `bagan_scorea`, `bagan_scoreb`, `bagan_babak`, `bagan_menang`, `bagan_keterangan`) VALUES
(7, '8991', '77', '78', '2020-04-13 11:49:50', '12', '2', 'semi final', '77', '12'),
(8, '8993', '79', '80', '2020-04-13 11:49:50', '1', '0', 'semi final', '79', ''),
(9, '8991', '78', '79', '2020-04-13 11:49:50', '20', '11', 'final', '78', 'asu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
`berita_id` int(10) NOT NULL,
  `berita_judul` varchar(255) NOT NULL,
  `berita_post` date NOT NULL,
  `berita_isi` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`berita_id`, `berita_judul`, `berita_post`, `berita_isi`, `image`) VALUES
(54, 'Ketahuan Pakai Cheat, Akun PUBG Diblokir Selama 10 Tahun', '2020-03-06', 'Liputan6.com, Jakarta - Sejak gim PlayerUnknown''s Battlegrounds (PUBG) meluncur di platform PC pada 2017, Tencent dan PUBG Corp berusaha keras untuk memberantas gamer yang suka berbuat curang (cheater) di dalam gim kompetitif tersebut.\r\n\r\nTak hanya di PC, cheater--kebanyakan pakai akun Tiongkok--di dalam PUBG versi mobile pun marak bermunculan dan diblokir pengembang setiap harinya.\r\n\r\nIngin memberikan pengalaman terbaik bagi gamer setianya, Tencent Games dan PUBG Corp akhirnya memiliki solusi untuk memberantas cheater. \r\n\r\n    HomeTeknoGame\r\n\r\nKetahuan Pakai Cheat, Akun PUBG Diblokir Selama 10 Tahun\r\nYusliansonYuslianson\r\n\r\n02 Mar 2020, 10:30 WIB\r\nPUBG Mobile\r\nPUBG Mobile x Resident Evil 2. (Doc: PUBG Mobile)\r\n\r\nLiputan6.com, Jakarta - Sejak gim PlayerUnknown''s Battlegrounds (PUBG) meluncur di platform PC pada 2017, Tencent dan PUBG Corp berusaha keras untuk memberantas gamer yang suka berbuat curang (cheater) di dalam gim kompetitif tersebut.\r\n\r\nTak hanya di PC, cheater--kebanyakan pakai akun Tiongkok--di dalam PUBG versi mobile pun marak bermunculan dan diblokir pengembang setiap harinya.\r\n\r\nIngin memberikan pengalaman terbaik bagi gamer setianya, Tencent Games dan PUBG Corp akhirnya memiliki solusi untuk memberantas cheater.\r\n\r\nBaca Juga\r\n\r\n    Penjualan Galaxy S20 di Korea Selatan Ikut Terdampak Virus Corona\r\n    Oppo Find X2 Pro Bocor di Internet\r\n    Warganet Ucapkan Selamat Ulang Tahun kepada Mereka yang Lahir Tanggal 29 Februari\r\n\r\nAdapun solusi kedua perusahaan tersebut adalah sebuah metode baru untuk menangkap cheater, yang diberi nama Project Ban Pan, sebagaimana dikutip dari Gamerant, Senin (2/3/2020).\r\n\r\nDalam sebuah video singkat, pengembang menangkap basah seorang cheater membuat karakter mereka di dalam gim PUBG agar tidak terkalahkan dengan teknik pintar.', '54.jpg'),
(55, 'Timnas Esports Mobile Legends Indonesia Sumbang Perak di SEA Games 2019', '2020-03-06', 'Liputan6.com, Jakarta - Tim nasional (timnas) Mobile Legends yang mewakili Indonesia di cabang olahraga (cabor) eSports harus mengakui keunggulan tim tuan rumah Filipina.\r\n\r\nBerlangsung di Filoil Flying V Centre, San Juan, Metro Manila, Filipina, Minggu (8/12/2019), tim terbaik di Tanah Air ini harus puas dengan perolehan medali perak untuk nomor Mobile Legends ini..  Walau sempat kalah 1-0, timnas esports Indonesia sempat tampil lebih agresif, sehingga mampu comeback dua babak sekaligus dalam menekan pergerakan tim lawan.\r\n\r\nNamun, pada babak keempat dari pertandingan best of five (BO5), tim Merah Putih dipukul mundur, sehingga perolehan skor pun menjadi imbang 2-2.\r\n\r\nDi babak penentuan, kedua tim tampil "beringas" untuk dapat mengakhiri pertandingan terakhir Mobile Legends di SEA Games 2019. Namun apa daya, dewi fortuna saat ini lebih memihak timnas Filipina.', '55.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bracket`
--

CREATE TABLE IF NOT EXISTS `tb_bracket` (
`bracket_id` int(11) NOT NULL,
  `bracket_tournamentid` int(11) NOT NULL,
  `bracket_gambar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bracket`
--

INSERT INTO `tb_bracket` (`bracket_id`, `bracket_tournamentid`, `bracket_gambar`) VALUES
(2, 8991, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftartim`
--

CREATE TABLE IF NOT EXISTS `tb_daftartim` (
`daftartim_id` int(11) NOT NULL,
  `daftartim_idplayer` varchar(255) NOT NULL,
  `daftartim_tgldaftar` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftartim`
--

INSERT INTO `tb_daftartim` (`daftartim_id`, `daftartim_idplayer`, `daftartim_tgldaftar`) VALUES
(1, 'qwerty  ', '2020-04-09'),
(2, 'a', '2020-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftartournament`
--

CREATE TABLE IF NOT EXISTS `tb_daftartournament` (
`daftartournament_id` int(11) NOT NULL,
  `tournamentid` varchar(255) NOT NULL,
  `daftartournament_idtim` varchar(255) NOT NULL,
  `daftartournament_idplayer` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftartournament`
--

INSERT INTO `tb_daftartournament` (`daftartournament_id`, `tournamentid`, `daftartournament_idtim`, `daftartournament_idplayer`) VALUES
(8, '8991', '77', 'qwerty   '),
(9, '8991', '78', 'qwerty   '),
(10, '8991', '79', 'qwerty   '),
(11, '8991', '80', 'qwerty   '),
(12, '8992', '81', 'a'),
(13, '8992', '82', 'a'),
(14, '8992', '83', 'a'),
(15, '8992', '84', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klaim`
--

CREATE TABLE IF NOT EXISTS `tb_klaim` (
`klaim_id` int(11) NOT NULL,
  `klaim_poin` int(11) NOT NULL,
  `klaim_tgl` date NOT NULL,
  `klaim_registrasiid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_klaim`
--

INSERT INTO `tb_klaim` (`klaim_id`, `klaim_poin`, `klaim_tgl`, `klaim_registrasiid`) VALUES
(4, 32, '2020-04-12', '51'),
(5, 20, '2020-04-12', '54'),
(6, 37, '2020-04-12', '53'),
(7, 22, '2020-04-14', '54'),
(8, 38, '2020-04-14', '51'),
(9, 44, '2020-04-14', '53'),
(10, 32, '2020-04-14', '56'),
(11, 43, '2020-04-15', '51'),
(12, 45, '2020-04-17', '53'),
(13, 29, '2020-04-17', '53'),
(14, 47, '2020-04-17', '56'),
(15, 30, '2020-04-18', '51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_koin`
--

CREATE TABLE IF NOT EXISTS `tb_koin` (
`koin_id` int(11) NOT NULL,
  `register_id` int(11) NOT NULL,
  `koin_tgl` date NOT NULL,
  `koin_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_koin`
--

INSERT INTO `tb_koin` (`koin_id`, `register_id`, `koin_tgl`, `koin_total`) VALUES
(45, 45, '2020-04-06', 1),
(46, 44, '2020-04-06', 1),
(47, 46, '2020-04-06', 1),
(48, 47, '2020-04-06', 1),
(49, 48, '2020-04-06', 1),
(50, 50, '2020-04-11', 1),
(51, 51, '2020-04-18', 6),
(52, 54, '2020-04-14', 2),
(53, 53, '2020-04-17', 4),
(54, 52, '2020-04-16', 2),
(55, 56, '2020-04-17', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE IF NOT EXISTS `tb_komentar` (
`komentar_id` int(11) NOT NULL,
  `komentar_idtournament` int(11) NOT NULL,
  `komentar_status` int(11) NOT NULL,
  `komentar_nama` varchar(255) NOT NULL,
  `komentar_isi` text NOT NULL,
  `komentar_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`komentar_id`, `komentar_idtournament`, `komentar_status`, `komentar_nama`, `komentar_isi`, `komentar_waktu`) VALUES
(29, 8989, 0, 'intan', 'succes', '2020-04-06 04:59:40'),
(30, 8989, 1, 'fanny', '<p>llllllllllllllll</p>\r\n', '2020-04-07 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kota`
--

CREATE TABLE IF NOT EXISTS `tb_kota` (
`kota_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kota_nama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kota`
--

INSERT INTO `tb_kota` (`kota_id`, `provinsi_id`, `kota_nama`) VALUES
(1, 1, 'Banda Aceh'),
(2, 1, 'Langsa'),
(3, 1, 'Lhokseumawe'),
(4, 1, 'Sabang'),
(5, 1, 'Meulaboh'),
(6, 1, 'Sabulussalam'),
(7, 2, 'Medan'),
(8, 2, 'Binjai'),
(9, 2, 'Padang Sidempuan'),
(10, 2, 'Pematang Siantar'),
(11, 2, 'Sibolga'),
(12, 2, 'Tanjung Balai'),
(13, 2, 'Tebing Tinggi'),
(14, 3, 'Padang'),
(15, 3, 'Bukittinggi'),
(16, 3, 'Pariaman'),
(17, 3, 'Sawahlunto'),
(18, 3, 'Padang Panjang'),
(19, 3, 'Solok'),
(20, 3, 'Payakumbuh'),
(21, 4, 'Pangkal Pinang'),
(22, 5, 'Bengkulu'),
(23, 6, 'Jambi'),
(24, 6, 'Sungai Penuh'),
(25, 7, 'Batam'),
(26, 7, 'Tanjung Pinang'),
(27, 8, 'Bandar Lampung'),
(28, 8, 'Metro'),
(29, 9, 'Pekan Baru'),
(30, 9, 'Dumai'),
(31, 10, 'Palembang'),
(32, 10, 'Lubuk Linggau'),
(33, 10, 'Prabumulih'),
(34, 10, 'Pagralam'),
(35, 18, 'Gorontalo'),
(36, 19, 'Makassar'),
(37, 19, 'Palopo'),
(38, 19, 'Pare-pare'),
(39, 20, 'Palu'),
(40, 21, 'Baubau'),
(41, 21, 'Kendari'),
(42, 55, 'Bitung'),
(43, 55, 'Manado'),
(44, 55, 'Tomohon'),
(45, 55, 'Kotamobagu'),
(46, 28, 'Maluku'),
(47, 28, 'Tual'),
(50, 29, 'Ternate'),
(51, 29, 'Tidore'),
(52, 32, 'Jayapura'),
(53, 32, 'Sorong'),
(54, 37, 'Pontianak'),
(55, 37, 'Singkawang'),
(56, 35, 'Banjarmasin'),
(57, 35, 'Banjarbaru'),
(58, 36, 'Balikpapan'),
(59, 36, 'Bontang'),
(60, 36, 'Samarinda'),
(61, 38, 'Tarakan'),
(62, 56, 'Cilegon'),
(63, 56, 'Serang'),
(64, 56, 'Tangerang'),
(65, 50, 'Jakarta'),
(66, 51, 'Bandung'),
(67, 51, 'Bekasi'),
(68, 51, 'Bogor'),
(69, 51, 'Cimahi'),
(70, 51, 'Cirebon'),
(71, 51, 'Depok'),
(72, 51, 'Sukabumi'),
(73, 51, 'Tasikmalaya'),
(74, 51, 'Banjar'),
(75, 53, 'Magelang'),
(76, 53, 'Pekalongan'),
(77, 53, 'Purwokerto'),
(78, 53, 'Salatiga'),
(79, 53, 'Semarang'),
(80, 53, 'Surakarta'),
(81, 53, 'Tegal'),
(82, 52, 'Batu'),
(83, 52, 'Blitar'),
(84, 52, 'Kediri'),
(85, 52, 'Madiun'),
(86, 52, 'Malang'),
(87, 52, 'Mojokerto'),
(88, 52, 'Pasuruan'),
(89, 52, 'Probolinggo'),
(90, 52, 'Surabaya'),
(91, 54, 'Yogyakarta'),
(92, 44, 'Denpasar'),
(93, 45, 'Bima'),
(94, 45, 'Mataram'),
(95, 46, 'Kupang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
`login_id` int(64) NOT NULL,
  `login_nama` varchar(255) NOT NULL,
  `login_username` varchar(255) NOT NULL,
  `login_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_player`
--

CREATE TABLE IF NOT EXISTS `tb_player` (
  `player_id` varchar(255) NOT NULL,
  `player_nickname` varchar(255) NOT NULL,
  `player_tglmasuk` date NOT NULL,
  `player_jenis` varchar(200) NOT NULL,
  `player_registrasi` int(11) NOT NULL,
  `player_cek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_player`
--

INSERT INTO `tb_player` (`player_id`, `player_nickname`, `player_tglmasuk`, `player_jenis`, `player_registrasi`, `player_cek`) VALUES
('laylaml', 'laylaml', '2020-04-14', 'ml', 53, 'no'),
('ml_aysha', 'mlaysha', '2020-04-12', 'ml', 54, 'no'),
('ml_fanny', 'mlfanny', '2020-04-12', 'ml', 52, 'no'),
('ml_intan', 'intan', '2020-04-12', 'ml', 51, 'yes'),
('pb_aysha', 'aysha', '2020-04-12', 'pb', 54, 'no'),
('pb_fanny', 'fanny', '2020-04-12', 'pb', 52, 'yes'),
('pb_intan', 'intanpb', '2020-04-12', 'pb', 51, 'no'),
('pb_layla', 'layla', '2020-04-12', 'pb', 53, 'no'),
('pb_rahma ', 'rahma_pb ', '2020-04-17', 'pb', 53, 'no'),
('pubgm_fanny  ', 'pubgm_fanny  ', '2020-04-17', 'pubg', 51, 'yes'),
('pubgm_intan', 'pubgm_intan', '2020-04-15', 'pubgm', 51, 'no'),
('pubgm_layla', 'pubgm_layla', '2020-04-16', 'pubgm', 53, 'no'),
('pubgm_rahma', 'pubgm_rahma', '2020-04-16', 'pubgm', 56, 'no'),
('qwerty   ', 'qwerty   ', '2020-04-11', 'pb', 49, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poin`
--

CREATE TABLE IF NOT EXISTS `tb_poin` (
`poin_id` int(11) NOT NULL,
  `poin_tournament` varchar(255) NOT NULL,
  `poin_playertim` varchar(255) NOT NULL,
  `poin_playernama` varchar(255) NOT NULL,
  `poin_jumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poin`
--

INSERT INTO `tb_poin` (`poin_id`, `poin_tournament`, `poin_playertim`, `poin_playernama`, `poin_jumlah`) VALUES
(2, '8991', '77', 'pb_intan', 12),
(3, '8992', '81', 'pubgm_rahma', 90);

-- --------------------------------------------------------

--
-- Table structure for table `tb_posisi`
--

CREATE TABLE IF NOT EXISTS `tb_posisi` (
`posisi_id` int(11) NOT NULL,
  `posisi_timid` varchar(255) NOT NULL,
  `posisi_playerid` varchar(255) NOT NULL,
  `posisi_nama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_posisi`
--

INSERT INTO `tb_posisi` (`posisi_id`, `posisi_timid`, `posisi_playerid`, `posisi_nama`) VALUES
(39, '77', 'pb_intan', 'Leader'),
(40, '78', 'pb_aysha', 'Leader'),
(41, '79', 'pb_layla', 'Leader'),
(42, '80', 'pb_fanny', 'Leader'),
(43, '85', 'ml_intan', 'Leader'),
(44, '85', 'ml_aysha', 'mid'),
(45, '85', 'ml_fanny', 'center'),
(46, '85', 'laylaml', 'none'),
(47, '77', 'pb_rahma', 'nub'),
(48, '81', 'pubgm_intan', 'Leader'),
(49, '81', 'pubgm_fanny', 'center'),
(50, '81', 'pubgm_layla', ''),
(51, '81', 'pubgm_rahma', 'lala');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE IF NOT EXISTS `tb_provinsi` (
`provinsi_id` int(11) NOT NULL,
  `pulau_id` int(11) NOT NULL,
  `provinsi_nama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`provinsi_id`, `pulau_id`, `provinsi_nama`) VALUES
(1, 1, 'Nanggroe Aceh Darussslam'),
(2, 1, 'Sumatera Utara'),
(3, 1, 'Sumatera Barat'),
(4, 1, 'Bangka Belitung'),
(5, 1, 'Bengkulu'),
(6, 1, 'Jambi'),
(7, 1, 'Kepulauan Riau'),
(8, 1, 'Lampung'),
(9, 1, 'Riau'),
(10, 1, 'Sumatera Selatan'),
(18, 2, 'Gorontalo'),
(19, 2, 'Sulawesi Selatan'),
(20, 2, 'Sulawesi Tengah'),
(21, 2, 'Sulawesi Tenggara'),
(28, 3, 'Maluku'),
(29, 3, 'Maluku Utara'),
(32, 4, 'Papua'),
(34, 5, 'Kalimantan Tengah'),
(35, 5, 'Kalimantan Selatan'),
(36, 5, 'Kalimantan Timur'),
(37, 5, 'Kalimantan Barat'),
(38, 5, 'Kalimantan Utara'),
(44, 7, 'Bali'),
(45, 7, 'Nusa Tenggara Barat'),
(46, 7, 'Nusa Tenggara Timur'),
(50, 6, 'Jakarta'),
(51, 6, 'Jawa Barat'),
(52, 6, 'Jawa Timur'),
(53, 6, 'Jawa Tengah'),
(54, 6, 'Yogyakarta'),
(55, 2, 'Sulawesi Utara'),
(56, 6, 'Banten');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pulau`
--

CREATE TABLE IF NOT EXISTS `tb_pulau` (
`pulau_id` int(11) NOT NULL,
  `pulau_nama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pulau`
--

INSERT INTO `tb_pulau` (`pulau_id`, `pulau_nama`) VALUES
(1, 'Sumatera'),
(2, 'Sulawesi'),
(3, 'Maluku'),
(4, 'Papua'),
(5, 'Kalimantan'),
(6, 'Jawa'),
(7, 'Nusa Tenggara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasi`
--

CREATE TABLE IF NOT EXISTS `tb_registrasi` (
`registrasi_id` int(11) NOT NULL,
  `registrasi_nama` varchar(255) NOT NULL,
  `registrasi_nohp` varchar(20) NOT NULL,
  `registrasi_email` varchar(255) NOT NULL,
  `registrasi_username` varchar(255) NOT NULL,
  `registrasi_password` varchar(255) NOT NULL,
  `registrasi_tgllahir` date NOT NULL,
  `registrasi_alamat` text NOT NULL,
  `registrasi_fb` varchar(255) NOT NULL,
  `registrasi_yt` varchar(255) NOT NULL,
  `registrasi_ig` varchar(255) NOT NULL,
  `registrasi_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_registrasi`
--

INSERT INTO `tb_registrasi` (`registrasi_id`, `registrasi_nama`, `registrasi_nohp`, `registrasi_email`, `registrasi_username`, `registrasi_password`, `registrasi_tgllahir`, `registrasi_alamat`, `registrasi_fb`, `registrasi_yt`, `registrasi_ig`, `registrasi_image`) VALUES
(51, 'intan', '098765434', 'intan@gmail.com', 'intan', 'b1098cab9c2db3eb9f576eb66c33449c', '1999-03-11', 'Banda Aceh', '', '', '', '2.jpg'),
(52, 'fanny laura', '123456786', 'F@gmail.com', 'fanny', 'a871ee4d62a421976031c9145c705bdd', '1996-03-11', 'Lhokseumawe', '', '', '', 'default.jpg'),
(53, 'layla', '0809809', 'tik@gmail.com', 'layla', 'c08a6ee5d602cd7916c8b7d3cef8af98', '1988-03-11', 'Padang', '', '', '', 'default.jpg'),
(54, 'aysha alifa', '0809809', 'intan@gmail.com', 'aysha', '8926b966e1e87842156770a93f329418', '1999-03-09', 'Pangkal', 'intan', '', '', '54.png'),
(55, 'mia', '09384', 'mi@gmail.com', 'mia', '5102ecd3d47f6561de70979017b87a80', '1998-03-12', 'Banda', '', '', '', 'default.jpg'),
(56, 'rahma wati', '0809809', 'intan@gmail.com', 'rahma', 'b007b7d6520a7b3dcccd2a1ec2891009', '2003-02-13', 'Tarakan', '', '', '', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

CREATE TABLE IF NOT EXISTS `tb_request` (
`request_id` int(11) NOT NULL,
  `request_timid` varchar(100) NOT NULL,
  `request_playerid` varchar(500) NOT NULL,
  `request_posisi` varchar(500) NOT NULL,
  `request_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_reward`
--

CREATE TABLE IF NOT EXISTS `tb_reward` (
`reward_id` int(11) NOT NULL,
  `reward_jenis` varchar(255) NOT NULL,
  `reward_nama` varchar(255) NOT NULL,
  `reward_stok` int(11) NOT NULL,
  `reward_koin` int(11) NOT NULL,
  `reward_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sponsor`
--

CREATE TABLE IF NOT EXISTS `tb_sponsor` (
`sponsor_id` int(10) NOT NULL,
  `sponsor_nama` varchar(255) NOT NULL,
  `sponsor_tglmulai` date NOT NULL,
  `sponsor_tglselesai` date NOT NULL,
  `sponsor_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sponsor`
--

INSERT INTO `tb_sponsor` (`sponsor_id`, `sponsor_nama`, `sponsor_tglmulai`, `sponsor_tglselesai`, `sponsor_link`, `image`) VALUES
(10, 'Mediatama Web ', '2020-03-01', '2020-03-14', 'http://mediatamaweb.co.id', '111.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tim`
--

CREATE TABLE IF NOT EXISTS `tb_tim` (
`tim_id` int(11) NOT NULL,
  `tim_registrasi` varchar(100) NOT NULL,
  `tim_about` text NOT NULL,
  `tim_nama` varchar(255) NOT NULL,
  `tim_lokasi` varchar(255) NOT NULL,
  `tim_jenis` varchar(500) NOT NULL,
  `tim_tahunmasuk` date NOT NULL,
  `tim_fb` varchar(255) NOT NULL,
  `tim_yt` varchar(255) NOT NULL,
  `tim_ig` varchar(255) NOT NULL,
  `tim_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `tim_cek` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tim`
--

INSERT INTO `tb_tim` (`tim_id`, `tim_registrasi`, `tim_about`, `tim_nama`, `tim_lokasi`, `tim_jenis`, `tim_tahunmasuk`, `tim_fb`, `tim_yt`, `tim_ig`, `tim_image`, `tim_cek`) VALUES
(77, '51', '<p>ini tim</p>\r\n', 'virtus.pro', 'Banda', 'pb', '2020-04-11', 'virtus', 'virtus', 'virtus', '771.png', 'yes'),
(78, '54', '<p>PSG.LGD</p>\r\n', 'PSG.LGD', 'Tual', 'pb', '2020-04-11', 'PSG.LGD', 'PSG.LGD', 'PSG.LGD', '1.png', 'no'),
(79, '53', '<p>Vici Gaming</p>\r\n', 'Vici Gaming', 'Banjarbaru', 'pb', '2020-04-11', 'Vici Gaming', 'Vici Gaming', 'Vici Gaming', '2.png', 'no'),
(80, '52', '<p>TNC Predator</p>\r\n', 'TNC Predator', 'Sukabumi', 'pb', '2020-04-11', 'TNC Predator', 'TNC Predator', 'TNC Predator', '3.png', 'no'),
(81, '51', '<p>N1</p>\r\n', 'N1', 'Binjai', 'pubgm', '2020-04-11', '', '', '', '4.png', 'yes'),
(82, '', '<p>UoL</p>\r\n', 'UoL', 'Singkawang', 'pubgm', '2020-04-11', '', '', '', '5.png', 'no'),
(83, '', '<p>NGG</p>\r\n', 'NGG', 'Tarakan', 'pubgm', '2020-04-11', '', '', '', '6.png', 'no'),
(84, '', '<p>R1G</p>\r\n', 'R1G', 'Tidore', 'pubgm', '2020-04-11', '', '', '', '7.png', 'no'),
(85, '51', '<p>ini tim</p>\r\n', 'ml lala', 'Langsa', 'ml', '2020-04-12', '', '', '', '8.PNG', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tournament`
--

CREATE TABLE IF NOT EXISTS `tb_tournament` (
`tournament_id` int(11) NOT NULL,
  `tournament_jenis` varchar(255) NOT NULL,
  `tournament_nama` varchar(255) NOT NULL,
  `tournament_status` varchar(255) NOT NULL,
  `tournament_tglmulai` date NOT NULL,
  `tournament_tglakhir` date NOT NULL,
  `tournament_participan` int(10) NOT NULL,
  `tournament_mode` varchar(255) NOT NULL,
  `tournament_lokasi` text NOT NULL,
  `tournament_prize` varchar(255) NOT NULL,
  `tournament_prize1` varchar(100) NOT NULL,
  `tournament_fee` varchar(255) NOT NULL,
  `tournament_detail` text NOT NULL,
  `tournament_region` varchar(255) NOT NULL,
  `tournament_format` varchar(255) NOT NULL,
  `tournament_organizer` varchar(255) NOT NULL,
  `tournament_rules` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8995 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tournament`
--

INSERT INTO `tb_tournament` (`tournament_id`, `tournament_jenis`, `tournament_nama`, `tournament_status`, `tournament_tglmulai`, `tournament_tglakhir`, `tournament_participan`, `tournament_mode`, `tournament_lokasi`, `tournament_prize`, `tournament_prize1`, `tournament_fee`, `tournament_detail`, `tournament_region`, `tournament_format`, `tournament_organizer`, `tournament_rules`) VALUES
(8991, 'pb', 'PB Pro Circuit', 'segera', '2020-04-07', '2020-04-14', 18, 'squad', 'Medan', '1000000', '100', 'free', '<p>ini turnament</p>\r\n', 'Indonesia', 'double elimination', 'valve', '<p>asa</p>\r\n'),
(8992, 'pubg', 'PUBG pro circuit', 'mulai', '2020-04-07', '2020-04-14', 100, 'squad', 'Padang', '1.000.000', '10000', 'free', '<p>ini turnament</p>\r\n', 'Indonesia', 'Single elimination', 'valve', '<p>qqq</p>\r\n'),
(8993, 'ml', 'ML Pro Circuit', 'mulai', '2020-04-07', '2020-04-14', 18, 'squad', 'Medan', '1000000', '100', 'free', '<p>ini turnament</p>\r\n', 'Indonesia', 'double elimination', 'valve', '<p>mnsa</p>\r\n'),
(8994, 'pb', 'pb test', 'selesai', '2020-04-17', '2020-04-24', 11, 'squad', 'Padang', '1000000', '100', 'free', '<p>qq</p>\r\n', 'indonesia', 'single', 'admin', '<p>aa</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_achievement`
--
ALTER TABLE `tb_achievement`
 ADD PRIMARY KEY (`achievement_id`);

--
-- Indexes for table `tb_bagan`
--
ALTER TABLE `tb_bagan`
 ADD PRIMARY KEY (`bagan_id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
 ADD PRIMARY KEY (`berita_id`);

--
-- Indexes for table `tb_bracket`
--
ALTER TABLE `tb_bracket`
 ADD PRIMARY KEY (`bracket_id`);

--
-- Indexes for table `tb_daftartim`
--
ALTER TABLE `tb_daftartim`
 ADD PRIMARY KEY (`daftartim_id`);

--
-- Indexes for table `tb_daftartournament`
--
ALTER TABLE `tb_daftartournament`
 ADD PRIMARY KEY (`daftartournament_id`);

--
-- Indexes for table `tb_klaim`
--
ALTER TABLE `tb_klaim`
 ADD PRIMARY KEY (`klaim_id`);

--
-- Indexes for table `tb_koin`
--
ALTER TABLE `tb_koin`
 ADD PRIMARY KEY (`koin_id`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
 ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `tb_kota`
--
ALTER TABLE `tb_kota`
 ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
 ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tb_player`
--
ALTER TABLE `tb_player`
 ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `tb_poin`
--
ALTER TABLE `tb_poin`
 ADD PRIMARY KEY (`poin_id`);

--
-- Indexes for table `tb_posisi`
--
ALTER TABLE `tb_posisi`
 ADD PRIMARY KEY (`posisi_id`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
 ADD PRIMARY KEY (`provinsi_id`);

--
-- Indexes for table `tb_pulau`
--
ALTER TABLE `tb_pulau`
 ADD PRIMARY KEY (`pulau_id`);

--
-- Indexes for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
 ADD PRIMARY KEY (`registrasi_id`);

--
-- Indexes for table `tb_request`
--
ALTER TABLE `tb_request`
 ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tb_reward`
--
ALTER TABLE `tb_reward`
 ADD PRIMARY KEY (`reward_id`);

--
-- Indexes for table `tb_sponsor`
--
ALTER TABLE `tb_sponsor`
 ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `tb_tim`
--
ALTER TABLE `tb_tim`
 ADD PRIMARY KEY (`tim_id`);

--
-- Indexes for table `tb_tournament`
--
ALTER TABLE `tb_tournament`
 ADD PRIMARY KEY (`tournament_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_achievement`
--
ALTER TABLE `tb_achievement`
MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_bagan`
--
ALTER TABLE `tb_bagan`
MODIFY `bagan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
MODIFY `berita_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tb_bracket`
--
ALTER TABLE `tb_bracket`
MODIFY `bracket_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_daftartim`
--
ALTER TABLE `tb_daftartim`
MODIFY `daftartim_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_daftartournament`
--
ALTER TABLE `tb_daftartournament`
MODIFY `daftartournament_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_klaim`
--
ALTER TABLE `tb_klaim`
MODIFY `klaim_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_koin`
--
ALTER TABLE `tb_koin`
MODIFY `koin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
MODIFY `login_id` int(64) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_poin`
--
ALTER TABLE `tb_poin`
MODIFY `poin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_posisi`
--
ALTER TABLE `tb_posisi`
MODIFY `posisi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
MODIFY `provinsi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tb_pulau`
--
ALTER TABLE `tb_pulau`
MODIFY `pulau_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
MODIFY `registrasi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tb_request`
--
ALTER TABLE `tb_request`
MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_reward`
--
ALTER TABLE `tb_reward`
MODIFY `reward_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_sponsor`
--
ALTER TABLE `tb_sponsor`
MODIFY `sponsor_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_tim`
--
ALTER TABLE `tb_tim`
MODIFY `tim_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `tb_tournament`
--
ALTER TABLE `tb_tournament`
MODIFY `tournament_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8995;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
