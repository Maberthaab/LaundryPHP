-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 08:12 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nik`, `nama`, `telp`, `alamat`, `jenis_kelamin`) VALUES
(3, '000323278', 'Sintia', 'Perempuan', '08585999', 'Jln. Merapi No. 91');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `stok` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `stok`) VALUES
('B0120001', 'Sabun', 195),
('B0120002', 'Deterjen', 100),
('B0120003', 'Pewangi', 120),
('B0120004', 'Minyak Wangi', 20),
('B0120005', 'Plastik', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_trans` int(255) NOT NULL,
  `id_det` int(255) NOT NULL,
  `nama_pelanggan` varchar(225) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `berat` int(255) NOT NULL,
  `total` int(225) NOT NULL,
  `bayar` int(225) NOT NULL,
  `kembalian` int(225) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_trans`, `id_det`, `nama_pelanggan`, `nama_paket`, `harga`, `berat`, `total`, `bayar`, `kembalian`, `status`) VALUES
(27, 25, 'Laili febria', 'Cuci Kering', 6000, 4, 24000, 30000, 6000, 'Lunas'),
(28, 26, 'Ananda sintia', 'Cuci Kering', 6000, 2, 12000, 20000, 8000, 'Lunas'),
(29, 27, 'Richo', 'Cuci Basah', 4000, 3, 12000, 20000, 8000, 'Lunas'),
(31, 32, 'Laili febria', 'Cuci Kering', 6000, 3, 18000, 20000, 2000, 'Lunas'),
(32, 33, 'rere fatasia', 'Cuci Kilat', 10000, 1, 10000, 0, 0, 'Belum Lunas'),
(33, 34, 'Naura indah', 'Cuci Kering', 6000, 4, 24000, 24000, 0, 'Lunas'),
(34, 35, 'Bu lilik', 'Cuci Basah', 4000, 2, 8000, 10000, 2000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(255) NOT NULL,
  `nik` int(255) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `telp` varchar(225) NOT NULL,
  `jk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama`, `alamat`, `telp`, `jk`) VALUES
(2, 22001, 'Pelangi', 'Perempuan', '085777', 'Jln Pahlawan no. 22'),
(3, 3838, 'Siska', 'Perempuan', '0858577', 'Jln Waru No. 45');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `kode_paket` varchar(100) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`kode_paket`, `nama_paket`, `harga_paket`) VALUES
('A0120005', 'Cuci Kilat', 10000),
('A1219001', 'Cuci Basah', 4000),
('A1219002', 'Cuci Kering', 6000),
('A1219003', 'Cuci Setrika', 8000),
('A1219004', 'Setrika', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(3, 'Laili febria', 'Perempuan', '08111111', 'Gebang Malang'),
(7, 'Ananda sintia', 'Perempuan', '087777777', 'Desa indah rt 02 rw 03'),
(8, 'Richo', 'Laki-Laki', '0866666666', 'Jln Pahlawan no. 22'),
(9, 'rere fatasia', 'Perempuan', '0858585857777', 'jln panda no 11'),
(10, 'Naura indah', 'Perempuan', '085858585800', 'jln hayamwuruk'),
(11, 'Bu lilik', 'Perempuan', '0887', 'indah');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian`
--

CREATE TABLE `pemakaian` (
  `kode_pemakaian` varchar(255) NOT NULL,
  `nama_karyawan` varchar(225) NOT NULL,
  `tgl_pemakaian` date NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakaian`
--

INSERT INTO `pemakaian` (`kode_pemakaian`, `nama_karyawan`, `tgl_pemakaian`, `kode_barang`, `nama_barang`, `stok`) VALUES
('P0120001', 'Pelangi', '2020-01-30', 'B0120001', 'Sabun', 5);

--
-- Triggers `pemakaian`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `pemakaian` FOR EACH ROW BEGIN
UPDATE barang SET stok = stok-NEW.stok
WHERE kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` varchar(225) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `stok` int(225) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `harga` int(225) NOT NULL,
  `supplier` varchar(225) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `kode_barang`, `nama_barang`, `stok`, `tgl_pembelian`, `harga`, `supplier`) VALUES
('A0120001', 'B0120001', 'Sabun', 100, '2020-01-30', 500000, 'Pelangi'),
('A0120002', 'B0120003', 'Pewangi', 20, '2020-01-31', 25000, 'Maria');

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN
UPDATE barang SET stok = stok+NEW.stok
WHERE kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(255) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `telp` varchar(225) NOT NULL,
  `jk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `telp`, `jk`) VALUES
(3, 'Maria', 'Jln. Bhayangkara No. 18', '08373377373773', 'Perempuan'),
(4, 'Dio', 'Laki-Laki', '085666', 'desa indah dusun elok rt 2 rw 4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_user` int(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `berat` int(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(100) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `nama_pelanggan`, `tgl_terima`, `tgl_selesai`, `nama_paket`, `berat`, `harga`, `total`, `status`) VALUES
(27, 'Laili febria', '2019-12-20', '2019-12-28', 'Cuci Kering', 4, 6000, 24000, 'Belum Lunas'),
(28, 'Ananda sintia', '2019-12-09', '2019-12-10', 'Cuci Kering', 2, 6000, 12000, 'Belum Lunas'),
(29, 'Richo', '2019-12-10', '2019-02-10', 'Cuci Basah', 3, 4000, 12000, 'Belum Lunas'),
(31, 'Laili febria', '2020-01-24', '2020-01-25', 'Cuci Kering', 3, 6000, 18000, 'Belum Lunas'),
(32, 'rere fatasia', '2020-01-30', '2020-02-04', 'Cuci Kilat', 1, 10000, 10000, 'Belum Lunas'),
(33, 'Naura indah', '2020-01-31', '2020-02-02', 'Cuci Kering', 4, 6000, 24000, 'Belum Lunas'),
(34, 'Bu lilik', '2020-01-31', '2020-01-09', 'Cuci Basah', 2, 4000, 8000, 'Belum Lunas');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `insert_insert` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	INSERT INTO detail(id_trans, nama_pelanggan, nama_paket, harga, berat, total, status)
    VALUES(new.id_trans, new.nama_pelanggan, new.nama_paket, new.harga, new.berat, new.total, new.status);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_det`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kode_paket`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD PRIMARY KEY (`kode_pemakaian`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_det` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_user` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
