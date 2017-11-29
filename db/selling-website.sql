-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 03:56 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selling-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `product_detail` varchar(256) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `image` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `image`, `price`) VALUES
(2, 'T-Shirt', 'The future is female\r\n\r\n', 'https://image.spreadshirtmedia.com/image-server/v1/mp/products/T812A2MPA1663PT17X10Y7D1010404635S40/views/1,width=800,height=800,appearanceId=2,backgroundColor=E8E8E8,modelId=115,crop=detail,version=1510588664/the-future-is-female-men-s-premium-t-shirt.webp', 27),
(3, 'Jean Nikki Cutoff', 'Resilient denim with a classic, clean finish.\r\nThe Nikki sports a high-mid rise and a skinny fit.\r\nSoho Vintage is a dark, vintage inspired wash with whiskering and fading.', 'https://m.media-amazon.com/images/I/816fDr0jRSL._SX480_.jpg', 45),
(4, 'Blue Slim Fit Suit', 'Cutting a slim and trim silhouette, this stylish Tommy Hilfiger suit features a mid-blue hue and smooth performance fabric with a touch of stretch for an ideal fit and ease of movement.', 'https://images.menswearhouse.com/is/image/TMW/MW40_38XM_14_TOMMY_HILFIGER_BLUE_POSTMAN_SET?$40MainPDP$', 250),
(5, 'Chiffon Cut-Out Top\r\n', 'Online only! Make a statement in this adorable chiffon top! A scoop neckline tops this look while cute triangle cut-outs sit along the neckline and keyhole cutouts along the sleeves add an edgy touch to this adorable top! Complete the look with a faux leat', 'https://s7d9.scene7.com/is/image/CharlotteRusse/302452372_001?$s7product$&fmt=jpg&fit=constrain,1&wid=1024&hei=1336', 10),
(6, 'Blazer Slim fit', 'Two-button blazer in woven, lightly brushed fabric with narrow stripes. Notched lapels, front pockets, and two inner pockets. Single button at cuff and a vent at back. Lined. Slim fit tapered over chest and waist with slightly narrower sleeves for a tail', 'http://lp.hm.com/hmprod?set=key[source],value[/model/2017/F00%200497362%20001%2055%200060.jpg]&set=key[rotate],value[]&set=key[width],value[]&set=key[height],value[]&set=key[x],value[]&set=key[y],value[]&set=key[type],value[STILL_LIFE_FRONT]&set=key[hmver],value[1]&call=url[file:/product/large]', 80),
(7, 'Wool Blend Jacket', 'Skopes Heritage Collection Copley Wool Blend Jacket. Create a sophisticated and versatile look with this wool blend jacket. Perfect when a smart casual look is called for, wedding reception or a day at the races! Features single breasted two button fasteni', 'https://houseoffraser.scene7.com/is/image/HOF/I_5051956721537_50_20170808?size=1500,2000&wid=1500&hei=2000&qlt=60&ResMode=sharp2&div=1', 87),
(8, 'Forest Midi Dress', 'Lightweight gauzy midi dress featuring beautiful floral embroidery detailing throughout.', 'https://img.fpassets.com/is/image/FreePeople/44301356_001_a?$a15-pdp-detail-shot$&hei=900&fit=constrain', 148),
(9, 'Menswear Pillow Jacket', 'An essential for the season with a fresh update, this menswear-inspired jacket features an ultra warm design with a puffed pillow shape.', 'https://img.fpassets.com/is/image/FreePeople/44196889_009_d?$a15-pdp-detail-shot$&hei=900&fit=constrain', 168);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_id`, `type_id`) VALUES
(3, 1),
(4, 2),
(6, 3),
(8, 4),
(2, 5),
(5, 5),
(7, 6),
(9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(256) NOT NULL,
  `type_detail` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`, `type_detail`) VALUES
(1, 'Jean', 'Jeans are a type of pants, typically made from denim or dungaree cloth.'),
(2, 'Suit', 'A set of clothing with matching pieces, including at least a coat and trousers.'),
(3, 'Blazer', 'A blazer is a type of jacket resembling a suit jacket, but cut more casually.'),
(4, 'Dress', 'A garment consisting of a skirt with an attached bodice.'),
(5, 'T-Shirt', 'A style of unisex fabric shirt named after the T shape of its body and sleeves.'),
(6, 'Jacket', 'A mid-stomach-length garment for the upper body.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `fisrt_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `fisrt_name`, `last_name`, `email`) VALUES
(5, 'h2v96', '$2y$10$NvlX.ojssx17spTqLlM5q.Sys86ALt2KZC6INNXrlNbEphhU5WVGa', 'Hoang', 's', 'h2v@gmail.com'),
(6, '222222', '$2y$10$6a9m2HDGERKY2DhDP2CyzOIQsgvSxPht7gmfYzIC5LIq3RYJ6pmKW', 's', 'dd', 'dd@gmail.com'),
(7, '2222222111', '$2y$10$8uouK7Vna9RXkfCcCG.72uN2lWIQf.EiGGinJwH4dq8iU/aQOolm2', 'ssss', 'sss', 'sss@gmail.com'),
(8, 'h2v96222', '$2y$10$2VvzgLaWeWLckH32Og6noehsoognIUhV68ZRW33sbn.SLpfV5PGVm', 'ssss', 'ss', 'aaa@gmail.com'),
(9, 'h2v9622211s', '$2y$10$rSzxWWgQp4QUIpa/FfEEJ.BOcTBS5GiUdIkKAOPNhZZyQlvh.XfAW', 'sss', 'ss', 'sss@gmail.com'),
(10, '123', '$2y$10$m2IZvEWRTUhpLws6DKaZ8uHBgdF7r4xEPHrzFGPG4G.sdYfo2ky2u', 'ww', 'ww', 'sss@gmail.com'),
(11, '2221123', '$2y$10$57UfsotCrdpi1OULj4YMmuaAUlwX00IFmP1J50Tebnvm2972CUkv2', 's', 'w', '2@gmail.com'),
(12, 'h2v962124rf', '$2y$10$2E/.0LNnNrVdq1bFEl183.DTz03ZeRXS5ORACtS5CAeUxj48Blyey', 'd', 'd', 'w@gmail.com'),
(13, 'h2v9615rf', '$2y$10$4F4rjlJOF6WmGu455I2zJO66J3PdNu0.bYVpH67gUGEZEC/nqGIHa', 'ww', 'q', 'h2v222@gmail.com'),
(14, 'h2v9622124', '$2y$10$oU9xpfT9FOxIadNM6N.aeOWIowWXuvGc6bSqHVS.FxjbPqn/UMIM6', 's', 's', 'h2v@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `product_type_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `product_type_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
