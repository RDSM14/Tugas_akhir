--
-- Database: `dbschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_menu`
--

INSERT INTO `tabel_menu` (`id`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'DATAbase SISWA', 'siswa', 'fa fa-users', 0),
(2, 'DATAbase GURU', 'guru', 'fa fa-graduation-cap', 0),
(3, 'Database Tata Usaha', 'tu', 'fa fa-building-o', 0),
(4, 'Database Admin', 'admin', 'fa fa-user', 0),
(8, 'data sekolah', 'sekolah', 'fa fa-building', 0),
(9, 'Data master', '#', 'fa fa-bars', 0),
(10, 'Mata Pelajaran', 'mapel', 'fa fa-book', 9),
(11, 'Ruangan Kelas', 'ruangan', 'fa fa-building', 9),
(13, 'Tahun Akademik', 'tahunakademik', 'fa fa-calendar-o', 9),
(14, 'Jadwal pelajaran', 'jadwal', 'fa fa-calendar', 0),
(15, 'Rombongan Belajar', 'rombel', 'fa fa-users', 9),
(16, 'laporan nilai', 'nilai', 'fa fa-file-excel-o', 0),
(17, 'Pengguna sistem', 'users/rule', 'fa fa-cubes', 0),
(19, 'Kurikulum', 'kurikulum', 'fa fa-calendar-o', 9),
(20, 'Wali Kelas', 'walikelas', 'fa fa-users', 0),
(26, 'Lihat Nilai Siswa', 'raport', 'fa fa-graduation-cap', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telepon_admin` varchar(15) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`email`, `nama_lengkap`, `password`, `telepon_admin`, `id_sekolah`) VALUES
('riefqayx@yahoo.com', 'Rifqi Dhiyaulhaq Sami Miru', '6c8dab289527fc0927aa7e6507898bdd', '085692288145', 3),
('rifqi@gmail.com', 'Rifqi', '6c8dab289527fc0927aa7e6507898bdd', '081234567', 2),
('rifqi@mail.com', 'Rifqi Dhiyaulhaq Sami Miru', '6c8dab289527fc0927aa7e6507898bdd', '085692288145', 4),
('rifqisami@if.uai.ac.id', 'Rifqi Dhiyaulhaq', '6c8dab289527fc0927aa7e6507898bdd', '085692288145', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `kd_agama` varchar(2) NOT NULL,
  `nama_agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`kd_agama`, `nama_agama`) VALUES
('01', 'ISLAM'),
('02', 'KRISTEN/ PROTESTAN'),
('03', 'KATHOLIK'),
('04', 'HINDU'),
('05', 'BUDHA'),
('06', 'KHONG HU CHU'),
('99', 'LAIN LAIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_sekolah`
--

CREATE TABLE `tbl_biaya_sekolah` (
  `id_biaya` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `jumlah_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_biaya_sekolah`
--

INSERT INTO `tbl_biaya_sekolah` (`id_biaya`, `id_jenis_pembayaran`, `id_tahun_akademik`, `jumlah_biaya`) VALUES
(3, 1, 1, 600000),
(4, 2, 1, 900000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deskripsi_nilai`
--

CREATE TABLE `tbl_deskripsi_nilai` (
  `id_deskripsi` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `deskripsi_pengetahuan` text NOT NULL,
  `deskripsi_keterampilan` text NOT NULL,
  `deskripsi_spiritual` text NOT NULL,
  `deskripsi_sosial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_deskripsi_nilai`
--

INSERT INTO `tbl_deskripsi_nilai` (`id_deskripsi`, `nisn`, `id_mapel`, `deskripsi_pengetahuan`, `deskripsi_keterampilan`, `deskripsi_spiritual`, `deskripsi_sosial`) VALUES
(1, '2130123013', 5, 'MantabAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa      ', 'Mantap                         \n                                         \n                ', 'Mantap 32                         \n                                         \n                ', 'Mantapasd                         \n                                         \n                '),
(2, '2130123013', 3, 'Mantabe', 'Oke', 'HASIL BAGUS', 'Memuaskan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `username` varchar(50) NOT NULL,
  `nuptk` varchar(16) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `gender` enum('p','w') NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`username`, `nuptk`, `nama_guru`, `gender`, `password`, `id_sekolah`) VALUES
('awan@email.com', '12345678910', 'drs diawan S.T', 'p', '3af4c9341e31bce1f4262a326285170d', 1),
('irma@yahoo.com', '345678910', 'irma muliana sst mpd', 'w', '3af4c9341e31bce1f4262a326285170d', 1),
('nuris@yahoo.com', '012345678910', 'nuris akbar mkom', 'p', '3af4c9341e31bce1f4262a326285170d', 1),
('rifqi@email.com', '45678910', 'Rifqi', 'p', '3af4c9341e31bce1f4262a326285170d', 1),
('rifqi@mail.co.id', '123456789010101', 'Rifqi', 'p', '6c8dab289527fc0927aa7e6507898bdd', 4),
('udin@gmail.com', '2345678910', 'syamsuddin', 'p', '3af4c9341e31bce1f4262a326285170d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history_kelas`
--

CREATE TABLE `tbl_history_kelas` (
  `id_history` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_history_kelas`
--

INSERT INTO `tbl_history_kelas` (`id_history`, `id_rombel`, `nisn`, `id_tahun_akademik`) VALUES
(7, 6, '456789011', 1),
(8, 7, '2130123013', 1),
(18, 6, '2130123013', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `username_guru` varchar(50) NOT NULL,
  `jam_mulai` varchar(14) NOT NULL,
  `jam_selesai` varchar(14) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_tahun_akademik`, `id_mapel`, `username_guru`, `jam_mulai`, `jam_selesai`, `id_ruangan`, `semester`, `hari`, `id_rombel`, `id_sekolah`) VALUES
(13, 1, 5, 'rifqi@email.com', '08:00', '10:00', 2, 1, 'SELASA', 6, 1),
(17, 1, 4, 'irma@yahoo.com', '10:00', '10:45', 4, 1, 'JUMAT', 7, 1),
(21, 1, 3, 'udin@gmail.com', '11:00', '12:00', 4, 1, 'KAMIS', 6, 1),
(22, 10, 8, 'rifqi@mail.co.id', '07:10', '10:10', 7, 1, 'SELASA', 8, 4),
(24, 10, 8, 'rifqi@mail.co.id', '07:10', '10:10', 7, 1, 'SENIN', 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_nilai`
--

CREATE TABLE `tbl_jenis_nilai` (
  `id_jenis_nilai` int(11) NOT NULL,
  `nama_jenis_nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_nilai`
--

INSERT INTO `tbl_jenis_nilai` (`id_jenis_nilai`, `nama_jenis_nilai`) VALUES
(1, 'Nilai Spiritual'),
(2, 'Nilai Sosial'),
(3, 'Nilai Pengetahuan'),
(4, 'Nilai Keterampilan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pembayaran`
--

CREATE TABLE `tbl_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL,
  `nama_jenis_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_pembayaran`
--

INSERT INTO `tbl_jenis_pembayaran` (`id_jenis_pembayaran`, `nama_jenis_pembayaran`) VALUES
(1, 'SPP SEMESTER 1'),
(2, 'DANA SUMBANGAN POKOK'),
(3, 'SPP SEMESTER 2'),
(4, 'SPP SEMESTER 3'),
(5, 'SPP SEMESTER 4'),
(6, 'SPP SEMESTER 5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenjang_sekolah`
--

CREATE TABLE `tbl_jenjang_sekolah` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(10) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenjang_sekolah`
--

INSERT INTO `tbl_jenjang_sekolah` (`id_jenjang`, `nama_jenjang`, `jumlah_kelas`) VALUES
(1, 'SD/ MI', 6),
(2, 'SMP/ MTS', 3),
(3, 'SMA/ SMK', 3),
(4, 'TK', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelompok_mapel`
--

CREATE TABLE `tbl_kelompok_mapel` (
  `id_kelompok_mapel` int(11) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelompok_mapel`
--

INSERT INTO `tbl_kelompok_mapel` (`id_kelompok_mapel`, `nama_kelompok`) VALUES
(1, 'Kelompok Wajib A'),
(2, 'Kelompok Wajib B'),
(3, 'Kelompok Wajib C'),
(4, 'Permintaan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komponen_nilai`
--

CREATE TABLE `tbl_komponen_nilai` (
  `id_komponen` int(11) NOT NULL,
  `nama_komponen` varchar(50) NOT NULL,
  `id_jenis_nilai` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `porsi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komponen_nilai`
--

INSERT INTO `tbl_komponen_nilai` (`id_komponen`, `nama_komponen`, `id_jenis_nilai`, `id_mapel`, `porsi`) VALUES
(1, 'Ulangan Tengah Semester', 1, 5, 25),
(2, 'Ulangan Akhir Semester', 1, 5, 50),
(3, 'Ulangan Harian 1', 3, 5, 100),
(6, 'Ulangan Harian 1', 3, 4, 50),
(7, 'Ulangan Harian 2', 3, 4, 50),
(8, 'Ulangan Harian 1', 3, 3, 50),
(9, 'Ulangan Harian 2', 3, 3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum`
--

CREATE TABLE `tbl_kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(30) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurikulum`
--

INSERT INTO `tbl_kurikulum` (`id_kurikulum`, `nama_kurikulum`, `is_aktif`, `id_sekolah`) VALUES
(1, 'KURIKULUM 2016', 'n', 1),
(2, 'KURIKULUM 2013', 'n', 1),
(3, 'KURIKULUM 2016', 'y', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum_detail`
--

CREATE TABLE `tbl_kurikulum_detail` (
  `id_kurikulum_detail` int(11) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `kd_mapel` varchar(11) NOT NULL,
  `kd_jurusan` varchar(4) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurikulum_detail`
--

INSERT INTO `tbl_kurikulum_detail` (`id_kurikulum_detail`, `id_kurikulum`, `kd_mapel`, `kd_jurusan`, `kelas`) VALUES
(9, 1, 'MTK', 'IPA', 1),
(10, 1, 'BID', 'IPA', 1),
(12, 1, 'IPA', 'IPA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id_level_user`, `nama_level`) VALUES
(2, 'Admin'),
(3, 'Tata Usaha'),
(4, 'Guru'),
(5, 'Wali Kelas'),
(6, 'Siswa'),
(7, 'Orangtua Siswa / Wali');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kd_mapel` varchar(4) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `min_a` float NOT NULL,
  `min_b` float NOT NULL,
  `min_c` float NOT NULL,
  `min_d` float NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `kkm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `kd_mapel`, `nama_mapel`, `min_a`, `min_b`, `min_c`, `min_d`, `id_sekolah`, `kkm`) VALUES
(2, 'FIS', 'FISIKA', 3.25, 2.5, 2, 0, 1, 0),
(3, 'IPA', 'ILMU PENGETAHUAN ALAM', 3.25, 2.5, 2, 0, 1, 0),
(4, 'IPS', 'ILMU PENGETAHUAN SOSIAL', 3.25, 2.5, 2, 0, 1, 0),
(5, 'MTK', 'MATEMATIKA', 3.25, 2.5, 2, 0, 1, 0),
(6, 'TIK', 'TEKNOLOGI INFORMASI KOMPUTER', 3.25, 2.5, 2, 0, 1, 0),
(8, 'BID', 'BAHASA INDONESIAS', 4, 3, 2, 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `id_komponen` int(11) NOT NULL,
  `skor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_jadwal`, `id_mapel`, `nisn`, `id_komponen`, `skor`) VALUES
(22, 21, 3, '2130123013', 9, 1),
(23, 13, 0, '0123456789', 6, 0),
(36, 13, 5, '2130123013', 1, 3.1),
(37, 13, 5, '2130123013', 2, 3.2),
(38, 13, 5, '2130123013', 3, 3.5),
(39, 21, 3, '2130123013', 8, 2.8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orang_tua`
--

CREATE TABLE `tbl_orang_tua` (
  `nisn` varchar(20) NOT NULL,
  `nama_ayah` varchar(200) NOT NULL,
  `nama_ibu` varchar(200) NOT NULL,
  `password_orangtua` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orang_tua`
--

INSERT INTO `tbl_orang_tua` (`nisn`, `nama_ayah`, `nama_ibu`, `password_orangtua`) VALUES
('2130123013', 'Agus', 'Ani', '6c8dab289527fc0927aa7e6507898bdd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nim` varchar(13) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `tanggal`, `nim`, `id_jenis_pembayaran`, `jumlah`, `keterangan`) VALUES
(1, '2017-03-02', 'ti102132', 1, 100000, 'tidak ada'),
(2, '2017-03-02', 'ti102132', 1, 100000, 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phonebook`
--

CREATE TABLE `tbl_phonebook` (
  `id_phonebook` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_phonebook`
--

INSERT INTO `tbl_phonebook` (`id_phonebook`, `id_group`, `no_hp`) VALUES
(1, 7, '089699935552'),
(2, 7, '085310204081');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rombel`
--

CREATE TABLE `tbl_rombel` (
  `id_rombel` int(11) NOT NULL,
  `nama_rombel` varchar(30) NOT NULL,
  `kelas` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rombel`
--

INSERT INTO `tbl_rombel` (`id_rombel`, `nama_rombel`, `kelas`, `id_sekolah`) VALUES
(6, 'X IPA 1', 1, 1),
(7, 'X IPS 1', 1, 1),
(8, 'Kelas 5', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `kd_ruangan` varchar(4) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`kd_ruangan`, `nama_ruangan`, `id_ruangan`, `id_sekolah`) VALUES
('011', 'DEFAULT', 1, 1),
('01A', 'RUANGAN KELAS 1 A', 2, 1),
('01B', 'RUANGAN KELAS 1B', 3, 1),
('01C', 'RUANGAN KELAS 1 C', 4, 1),
('010', 'Ruang 10', 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah_info`
--

CREATE TABLE `tbl_sekolah_info` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `id_jenjang_sekolah` int(11) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `nilai_max` float NOT NULL,
  `nilai_min` float NOT NULL,
  `min_a` float NOT NULL,
  `min_b` float NOT NULL,
  `min_c` float NOT NULL,
  `min_d` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sekolah_info`
--

INSERT INTO `tbl_sekolah_info` (`id_sekolah`, `nama_sekolah`, `id_jenjang_sekolah`, `alamat_sekolah`, `email`, `telpon`, `nilai_max`, `nilai_min`, `min_a`, `min_b`, `min_c`, `min_d`) VALUES
(1, 'MA Ummul Qura', 2, 'Pondok Cabe', 'ummulquro@sch.id', '02134235', 4, 0, 3.25, 2.5, 2, 0),
(2, 'MA Ummul Quro', 3, 'Pondok Cabe', 'ummulquro@sch.id', '081234567', 4, 0, 3.25, 3, 2.5, 0),
(3, 'TKIT Ummul Quro', 4, 'Pondok Cabe', 'ummulquro@sch.id', '0217912345', 5, 0, 4, 3, 2.5, 0),
(4, 'SD Al-Azhar', 1, 'Kebayoran', 'info@alazhar.com', '021', 5, 0, 3.5, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nisn` varchar(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gender` enum('P','W') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `kd_agama` varchar(2) NOT NULL,
  `foto` text NOT NULL,
  `alamat_siswa` varchar(1000) NOT NULL,
  `status_keluarga` varchar(50) NOT NULL,
  `telepon_siswa` varchar(15) NOT NULL,
  `asal_sekolah` varchar(200) NOT NULL,
  `kelas_terima` varchar(32) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nisn`, `nim`, `nama`, `gender`, `tanggal_lahir`, `tempat_lahir`, `kd_agama`, `foto`, `alamat_siswa`, `status_keluarga`, `telepon_siswa`, `asal_sekolah`, `kelas_terima`, `tanggal_terima`, `id_rombel`, `password`, `id_sekolah`) VALUES
('2130123013', '2130123013', 'Rifqi Dhiyaulhaq Sami Miru', 'P', '1999-02-05', 'Jakarta Selatan', '01', '', 'JAKARTA', 'Anak Kandung', '085692288145', 'SMPN 43', '6', '2018-07-02', 6, '6c8dab289527fc0927aa7e6507898bdd', 1),
('456789011', '456789011', 'JONO', 'P', '2017-02-18', 'BANDUNG', '01', 'Yaya_yah10.png', '', '', '', '', '', '0000-00-00', 6, '6c8dab289527fc0927aa7e6507898bdd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_group`
--

CREATE TABLE `tbl_sms_group` (
  `id` int(11) NOT NULL,
  `nama_group` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sms_group`
--

INSERT INTO `tbl_sms_group` (`id`, `nama_group`) VALUES
(1, 'group 1'),
(2, 'group 2'),
(4, 'asasas'),
(5, 'testing'),
(7, 'walimurid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun_akademik`
--

CREATE TABLE `tbl_tahun_akademik` (
  `id_tahun_akademik` int(4) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  `semester_aktif` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahun_akademik`
--

INSERT INTO `tbl_tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `is_aktif`, `semester_aktif`, `id_sekolah`) VALUES
(1, '2016/ 2017', 'y', 2, 1),
(2, '2015/2016', 'n', 1, 1),
(6, '2017/2018', 'n', 1, 1),
(10, '2018/2019', 'y', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tu`
--

CREATE TABLE `tbl_tu` (
  `username` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telepon_TU` varchar(15) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tu`
--

INSERT INTO `tbl_tu` (`username`, `nip`, `nama_lengkap`, `password`, `telepon_TU`, `id_sekolah`) VALUES
('rifqi@gmail.com', '0123456789', 'rifqi', '6c8dab289527fc0927aa7e6507898bdd', '021234567', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `foto` text NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `id_level_user`, `foto`, `id_sekolah`) VALUES
(1, 'Rifqi Dhiyaulhaq', 'rifqi123', '6c8dab289527fc0927aa7e6507898bdd', 1, 'dsdsdsds', 1),
(2, 'HAFIDZ MUZAKI', 'zaki', '85a3281bee28b39d2c0cb14ff86a55cd', 1, 'Angin.jpeg', 1),
(5, 'fang sui', 'fang', '85a3281bee28b39d2c0cb14ff86a55cd', 2, 'Gopal_Render.png', 1),
(7, 'desi handayani', 'desi123', '14ddc434109d6e8df730d4ea4eefc06c', 5, 'Yaya_yah1.png', 1),
(8, 'Rifqi', 'RDSM', '85a3281bee28b39d2c0cb14ff86a55cd', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_rule`
--

CREATE TABLE `tbl_user_rule` (
  `id_rule` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_rule`
--

INSERT INTO `tbl_user_rule` (`id_rule`, `id_menu`, `id_level_user`, `id_sekolah`) VALUES
(4, 2, 1, 1),
(5, 8, 1, 1),
(6, 14, 2, 1),
(7, 1, 2, 1),
(11, 9, 1, 1),
(12, 10, 1, 1),
(13, 11, 1, 1),
(14, 12, 1, 1),
(15, 13, 1, 1),
(16, 14, 1, 1),
(17, 17, 1, 1),
(18, 19, 1, 1),
(19, 20, 1, 1),
(20, 14, 3, 1),
(32, 15, 1, 1),
(44, 1, 1, 1),
(47, 14, 4, 1),
(49, 2, 2, 1),
(50, 8, 2, 1),
(51, 9, 2, 1),
(52, 10, 2, 1),
(53, 11, 2, 1),
(54, 12, 2, 1),
(55, 13, 2, 1),
(56, 15, 2, 1),
(58, 17, 2, 1),
(59, 19, 2, 1),
(70, 1, 3, 1),
(71, 2, 3, 1),
(72, 8, 3, 1),
(73, 9, 3, 1),
(74, 10, 3, 1),
(75, 11, 3, 1),
(76, 12, 3, 1),
(77, 15, 3, 1),
(78, 19, 3, 1),
(85, 14, 6, 1),
(88, 14, 5, 1),
(89, 16, 5, 1),
(90, 22, 5, 1),
(91, 16, 4, 1),
(92, 25, 5, 1),
(94, 14, 7, 1),
(96, 13, 3, 1),
(97, 1, 2, 2),
(98, 2, 2, 2),
(99, 8, 2, 2),
(100, 1, 3, 2),
(101, 2, 3, 2),
(102, 8, 3, 2),
(103, 9, 3, 2),
(104, 10, 3, 2),
(105, 11, 3, 2),
(106, 13, 3, 2),
(107, 14, 3, 2),
(108, 9, 2, 2),
(109, 10, 2, 2),
(110, 11, 2, 2),
(111, 13, 2, 2),
(112, 14, 2, 2),
(113, 15, 2, 2),
(114, 16, 2, 2),
(115, 17, 2, 2),
(116, 19, 2, 2),
(117, 20, 2, 2),
(118, 21, 2, 2),
(119, 14, 4, 2),
(120, 3, 2, 1),
(121, 1, 3, 4),
(122, 2, 3, 4),
(123, 16, 6, 1),
(124, 16, 7, 1),
(125, 26, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_walikelas`
--

CREATE TABLE `tbl_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `username_guru` varchar(50) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_walikelas`
--

INSERT INTO `tbl_walikelas` (`id_walikelas`, `username_guru`, `id_tahun_akademik`, `id_rombel`) VALUES
(7, 'rifqi@email.com', 1, 6),
(16, 'irma@yahoo.com', 1, 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_master_rombel`
--
CREATE TABLE `v_master_rombel` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_tbl_user`
--
CREATE TABLE `v_tbl_user` (
`id_user` int(11)
,`nama_lengkap` varchar(50)
,`username` varchar(40)
,`password` varchar(32)
,`id_level_user` int(11)
,`foto` text
,`nama_level` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_walikelas`
--
CREATE TABLE `v_walikelas` (
`id_walikelas` int(11)
,`nama_guru` varchar(30)
,`nama_rombel` varchar(30)
,`id_tahun_akademik` int(11)
,`tahun_akademik` varchar(10)
,`kelas` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_master_rombel`
--
DROP TABLE IF EXISTS `v_master_rombel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_master_rombel`  AS  select `tr`.`id_rombel` AS `id_rombel`,`tr`.`nama_rombel` AS `nama_rombel`,`tr`.`kelas` AS `kelas`,`tr`.`kd_jurusan` AS `kd_jurusan`,`tj`.`nama_jurusan` AS `nama_jurusan` from (`tbl_rombel` `tr` join `tbl_jurusan` `tj`) where (`tj`.`kd_jurusan` = `tr`.`kd_jurusan`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_tbl_user`
--
DROP TABLE IF EXISTS `v_tbl_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tbl_user`  AS  select `tu`.`id_user` AS `id_user`,`tu`.`nama_lengkap` AS `nama_lengkap`,`tu`.`username` AS `username`,`tu`.`password` AS `password`,`tu`.`id_level_user` AS `id_level_user`,`tu`.`foto` AS `foto`,`tlu`.`nama_level` AS `nama_level` from (`tbl_user` `tu` join `tbl_level_user` `tlu`) where (`tu`.`id_level_user` = `tlu`.`id_level_user`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_walikelas`
--
DROP TABLE IF EXISTS `v_walikelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_walikelas`  AS  select `tbl_walikelas`.`id_walikelas` AS `id_walikelas`,`tbl_guru`.`nama_guru` AS `nama_guru`,`tbl_rombel`.`nama_rombel` AS `nama_rombel`,`tbl_walikelas`.`id_tahun_akademik` AS `id_tahun_akademik`,`tbl_tahun_akademik`.`tahun_akademik` AS `tahun_akademik`,`tbl_rombel`.`kelas` AS `kelas` from (((`tbl_walikelas` join `tbl_rombel`) join `tbl_guru`) join `tbl_tahun_akademik`) where ((`tbl_walikelas`.`id_rombel` = `tbl_rombel`.`id_rombel`) and (`tbl_walikelas`.`id_tahun_akademik` = `tbl_tahun_akademik`.`id_tahun_akademik`) and (`tbl_walikelas`.`username_guru` = `tbl_guru`.`username`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`kd_agama`);

--
-- Indexes for table `tbl_biaya_sekolah`
--
ALTER TABLE `tbl_biaya_sekolah`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tbl_deskripsi_nilai`
--
ALTER TABLE `tbl_deskripsi_nilai`
  ADD PRIMARY KEY (`id_deskripsi`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_history_kelas`
--
ALTER TABLE `tbl_history_kelas`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_jenis_nilai`
--
ALTER TABLE `tbl_jenis_nilai`
  ADD PRIMARY KEY (`id_jenis_nilai`);

--
-- Indexes for table `tbl_jenis_pembayaran`
--
ALTER TABLE `tbl_jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `tbl_jenjang_sekolah`
--
ALTER TABLE `tbl_jenjang_sekolah`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `tbl_kelompok_mapel`
--
ALTER TABLE `tbl_kelompok_mapel`
  ADD PRIMARY KEY (`id_kelompok_mapel`);

--
-- Indexes for table `tbl_komponen_nilai`
--
ALTER TABLE `tbl_komponen_nilai`
  ADD PRIMARY KEY (`id_komponen`);

--
-- Indexes for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `tbl_kurikulum_detail`
--
ALTER TABLE `tbl_kurikulum_detail`
  ADD PRIMARY KEY (`id_kurikulum_detail`);

--
-- Indexes for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_orang_tua`
--
ALTER TABLE `tbl_orang_tua`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_phonebook`
--
ALTER TABLE `tbl_phonebook`
  ADD PRIMARY KEY (`id_phonebook`);

--
-- Indexes for table `tbl_rombel`
--
ALTER TABLE `tbl_rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tbl_sekolah_info`
--
ALTER TABLE `tbl_sekolah_info`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tbl_sms_group`
--
ALTER TABLE `tbl_sms_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `tbl_tu`
--
ALTER TABLE `tbl_tu`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  ADD PRIMARY KEY (`id_walikelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_biaya_sekolah`
--
ALTER TABLE `tbl_biaya_sekolah`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_deskripsi_nilai`
--
ALTER TABLE `tbl_deskripsi_nilai`
  MODIFY `id_deskripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_history_kelas`
--
ALTER TABLE `tbl_history_kelas`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_jenis_nilai`
--
ALTER TABLE `tbl_jenis_nilai`
  MODIFY `id_jenis_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_jenis_pembayaran`
--
ALTER TABLE `tbl_jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_jenjang_sekolah`
--
ALTER TABLE `tbl_jenjang_sekolah`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_kelompok_mapel`
--
ALTER TABLE `tbl_kelompok_mapel`
  MODIFY `id_kelompok_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_komponen_nilai`
--
ALTER TABLE `tbl_komponen_nilai`
  MODIFY `id_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kurikulum_detail`
--
ALTER TABLE `tbl_kurikulum_detail`
  MODIFY `id_kurikulum_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_phonebook`
--
ALTER TABLE `tbl_phonebook`
  MODIFY `id_phonebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_rombel`
--
ALTER TABLE `tbl_rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_sms_group`
--
ALTER TABLE `tbl_sms_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  MODIFY `id_tahun_akademik` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
