-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 09:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` varchar(11) NOT NULL,
  `items` text NOT NULL,
  `paid` int(4) DEFAULT '0',
  `shipped` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id`, `items`, `paid`, `shipped`) VALUES
('', '', 0, 0),
('P0001', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512890634694}]', 0, 0),
('P0002', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512890666321}]', 0, 0),
('P0003', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512890920126}]', 0, 0),
('P0004', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512890977132}]', 0, 0),
('P0005', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512891053733}]', 0, 0),
('P0006', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512891145695},{\"product_image\":\"img/product/ProductBundle.jpg\",\"product_name\":\"Paket 2 Jas\",\"product_price\":\"60000\",\"product_id\":\"2\",\"product_quantity\":1,\"unique_key\":1512891146189},{\"product_image\":\"img/product/Shirt_Hanger.jpg\",\"product_name\":\"Kemeja\",\"product_price\":\"15000\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1512891146629}]', 0, 0),
('P0007', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512891182219},{\"product_image\":\"img/product/ProductBundle.jpg\",\"product_name\":\"Paket 2 Jas\",\"product_price\":\"60000\",\"product_id\":\"2\",\"product_quantity\":1,\"unique_key\":1512891182696},{\"product_image\":\"img/product/Shirt_Hanger.jpg\",\"product_name\":\"Kemeja\",\"product_price\":\"15000\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1512891185633}]', 0, 0),
('P0008', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512891256499},{\"product_image\":\"img/product/ProductBundle.jpg\",\"product_name\":\"Paket 2 Jas\",\"product_price\":\"60000\",\"product_id\":\"2\",\"product_quantity\":1,\"unique_key\":1512891256929},{\"product_image\":\"img/product/Shirt_Hanger.jpg\",\"product_name\":\"Kemeja\",\"product_price\":\"15000\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1512891257369}]', 0, 0),
('P0009', '[{\"product_image\":\"img/product/Shirt_Hanger.jpg\",\"product_name\":\"Kemeja\",\"product_price\":\"15000\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1512902036802}]', 0, 0),
('P0010', '[{\"product_image\":\"img/product/Shirt_Hanger.jpg\",\"product_name\":\"Kemeja\",\"product_price\":\"15000\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1512916660884},{\"product_image\":\"img/product/ProductBundle.jpg\",\"product_name\":\"Paket 2 Jas\",\"product_price\":\"60000\",\"product_id\":\"2\",\"product_quantity\":1,\"unique_key\":1512916661241}]', 0, 0),
('P0011', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512924507059}]', 0, 0),
('P0012', '[{\"product_image\":\"img/product/Shirt_Hanger.jpg\",\"product_name\":\"Kemeja\",\"product_price\":\"15000\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1512924606774}]', 0, 0),
('P0013', '[{\"product_image\":\"img/product/Shirt_Hanger.jpg\",\"product_name\":\"Kemeja\",\"product_price\":\"15000\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1512924849920}]', 0, 0),
('P0014', '[{\"product_image\":\"img/product/ProductBundle.jpg\",\"product_name\":\"Paket 2 Jas\",\"product_price\":\"60000\",\"product_id\":\"2\",\"product_quantity\":1,\"unique_key\":1512925110557}]', 0, 0),
('P0015', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512925585033}]', 0, 0),
('P0016', '[{\"product_image\":\"img/product/Productbundle_BedsheetDuvet2Pillow.jpg\",\"product_name\":\"Paket Bed Cover\",\"product_price\":\"50000\",\"product_id\":\"1\",\"product_quantity\":1,\"unique_key\":1512928586554},{\"product_image\":\"img/product/ProductBundle.jpg\",\"product_name\":\"Paket 2 Jas\",\"product_price\":\"60000\",\"product_id\":\"2\",\"product_quantity\":1,\"unique_key\":1512928586976},{\"product_image\":\"img/product/Shirt_Hanger.jpg\",\"product_name\":\"Kemeja\",\"product_price\":\"15000\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1512928587424}]', 0, 0),
('P0017', '[{\"product_image\":\"img/product/Shirt_Hanger.jpg\",\"product_name\":\"Kemeja\",\"product_price\":\"15000\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1512929696667},{\"product_image\":\"img/product/ProductBundle.jpg\",\"product_name\":\"Paket 2 Jas\",\"product_price\":\"60000\",\"product_id\":\"2\",\"product_quantity\":1,\"unique_key\":1512929697073}]', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `id` int(12) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `desc_produk` varchar(255) NOT NULL,
  `harga_produk` int(255) NOT NULL,
  `gambar_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`id`, `nama_produk`, `desc_produk`, `harga_produk`, `gambar_produk`) VALUES
(1, 'Paket Bed Cover', 'Paket Laundry Bed Cover', 50000, 'Productbundle_BedsheetDuvet2Pillow.jpg'),
(2, 'Paket 2 Jas', 'Paket Laundry Jas', 60000, 'ProductBundle.jpg'),
(3, 'Kemeja', 'Laundry Kemeja Putih dengan penanganan khusu', 15000, 'Shirt_Hanger.jpg'),
(4, 'Kiloan', 'Laundry Kiloan dengan harga murah', 3500, 'TShirt_Hanger.jpg'),
(5, 'Kaos Polo', 'Laundry Kaos Polo', 50000, 'PoloShirt.jpg'),
(6, 'Blazer', 'Laundry Blazer', 8000, 'Blazer2.jpg'),
(7, 'Dress', 'Laundry Dress dengan kualitas tinggi', 50000, 'Dress.jpg'),
(8, 'Cardigan', 'Laundry Cardigan', 5000, 'Cardigan.jpg'),
(9, 'Gaun Pesta', 'Laundry Gaun Pesta', 10000, 'EveningDress.jpg'),
(10, 'Mantel', 'Laundry Mantel', 10000, 'Coat_NonLeather.jpg'),
(11, 'Mantel Kulit', 'Laundry Mantel Kulit', 15000, 'Burberry_Coat.jpg'),
(12, 'Setelan Jas', 'Laundry Setelan Jas', 20000, 'Suit_linen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transactions`
--

CREATE TABLE `tb_transactions` (
  `id` varchar(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `sub_total` int(255) NOT NULL,
  `ongkir` int(255) NOT NULL,
  `grand_total` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pengambilan',
  `cart_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transactions`
--

INSERT INTO `tb_transactions` (`id`, `nama_lengkap`, `email`, `nohp`, `alamat`, `sub_total`, `ongkir`, `grand_total`, `status`, `cart_id`) VALUES
('T0009', 'Rifqon Muzakki', 'rimuzakki@gmail.com', '08562711435', 'Jalan Taman Mugas 2 No.5 Semarang', 125000, 12500, 137500, 'selesai', 'P0016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
