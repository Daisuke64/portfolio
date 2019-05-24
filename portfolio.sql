-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 11:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `album_image` varchar(50) NOT NULL,
  `album_title` varchar(50) NOT NULL,
  `album_date` date NOT NULL,
  `album_contents` text NOT NULL,
  `album_detail` text NOT NULL,
  `album_label` varchar(50) NOT NULL,
  `album_price` decimal(10,2) NOT NULL,
  `album_format` varchar(50) NOT NULL,
  `album_stock` int(11) NOT NULL,
  `album_sold` int(11) NOT NULL,
  `album_sale_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `album_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `album_image`, `album_title`, `album_date`, `album_contents`, `album_detail`, `album_label`, `album_price`, `album_format`, `album_stock`, `album_sold`, `album_sale_id`, `artist_id`, `album_status`) VALUES
(1, 'images_albums/1.jpg', 'Our Own House', '2019-04-10', '<p>1 Our Own House&nbsp;&nbsp; &nbsp;<br />\r\n2 Not Your Way&nbsp;&nbsp; &nbsp;<br />\r\n3 Reflections&nbsp;&nbsp; &nbsp;<br />\r\n4 Oceans&nbsp;&nbsp; &nbsp;<br />\r\n5 Best I Can Do&nbsp;&nbsp; &nbsp;<br />\r\n6 Hurricane&nbsp;&nbsp; &nbsp;<br />\r\n7 Coffins&nbsp;&nbsp; &nbsp;<br />\r\n8 No Need For Dreaming&nbsp;&nbsp; &nbsp;<br />\r\n9 Box Around The Sun&nbsp;&nbsp; &nbsp;<br />\r\n10 Imagination Infatuation&nbsp;&nbsp; &nbsp;<br />\r\n11 Vagabond&nbsp;&nbsp; &nbsp;<br />\r\n12 Queens</p>\r\n', '<p>Cool!</p>\r\n', 'Republic Records', '500.00', 'CD', 997, 3, 1, 1, 'A'),
(2, 'images_albums/3.jpg', 'Connect The Dots', '2019-05-09', '<p>1&nbsp;&nbsp; &nbsp;Machine&nbsp;<br />\r\n2&nbsp;&nbsp; &nbsp;Chasing This<br />\r\n3&nbsp;&nbsp; &nbsp;Only Human<br />\r\n4&nbsp;&nbsp; &nbsp;Drummer Boy<br />\r\n5&nbsp;&nbsp; &nbsp;Revolution<br />\r\n6&nbsp;&nbsp; &nbsp;My Brother<br />\r\n7&nbsp;&nbsp; &nbsp;Out Of Tune Piano<br />\r\n8&nbsp;&nbsp; &nbsp;Coloring Outside The Lines<br />\r\n9&nbsp;&nbsp; &nbsp;Band Camp<br />\r\n10&nbsp;&nbsp; &nbsp;Oh Love<br />\r\n11&nbsp;&nbsp; &nbsp;Let The Light In</p>\r\n', '<p>Awesome!</p>\r\n', 'Photo Finish Records', '500.00', 'CD', 494, 6, 3, 1, 'A'),
(3, 'images_albums/R-12049630-1546651777-4735.jpeg.jpg', 'Love Is Dead', '2019-05-15', '<p><br />\r\n1 Graffiti&nbsp;&nbsp; &nbsp;<br />\r\n2 Get Out&nbsp;&nbsp; &nbsp;<br />\r\n3 Deliverance&nbsp;&nbsp; &nbsp;<br />\r\n4 My Enemy<br />\r\n5 Forever<br />\r\n6 Never Say Die<br />\r\n7 Miracle&nbsp;&nbsp; &nbsp;<br />\r\n8 Graves&nbsp;&nbsp; &nbsp;<br />\r\n9 Heaven / Hell&nbsp;&nbsp; &nbsp;<br />\r\n10 God&#39;s Plan&nbsp;&nbsp; &nbsp;<br />\r\n11 Really Gone<br />\r\n12 II&nbsp;&nbsp; &nbsp;<br />\r\n13 Wonderland</p>\r\n', '<p>New Release</p>\r\n', 'Glassnote', '500.00', 'CD', 5000, 0, 99, 3, 'A'),
(4, 'images_albums/R-7510527-1442964762-7196.jpeg.jpg', 'Every Open Eye', '2019-05-08', '<p>1 Never Ending Circles<br />\r\n2 Leave A Trace<br />\r\n3 Keep You On My Side<br />\r\n4 Make Them Gold<br />\r\n5 Clearest Blue<br />\r\n6 High Enough To Carry You Over<br />\r\n7 Empty Threat<br />\r\n8 Down Side Of Me<br />\r\n9 Playing Dead<br />\r\n10 Bury It<br />\r\n11 Afterglow</p>\r\n', '<p>You are the best!</p>\r\n', 'Virgin EMI Records ', '500.00', 'CD', 297, 3, 99, 3, 'A'),
(5, 'images_albums/R-428476-1307638652.jpeg.jpg', '22-20s', '2019-05-16', '<p>1 Devil In Me<br />\r\n2 Such A Fool<br />\r\n3 Baby Brings Bad News<br />\r\n4 22 Days<br />\r\n5 Friends<br />\r\n6 Why Don&#39;t You Do It For Me?<br />\r\n7 Shoot Your Gun<br />\r\n8 The Things That Lovers Do<br />\r\n9 I&#39;m The One<br />\r\n10 Hold On</p>\r\n', '<p>Blue Rook!</p>\r\n', 'Astralwerks', '500.00', 'LP', 600, 0, 99, 8, 'A'),
(6, 'images_albums/R-378673-1355331945-6071.jpeg.jpg', 'Grace', '2000-05-11', '<p>1 Mojo Pin&nbsp;&nbsp; &nbsp;<br />\r\n2 Grace&nbsp;&nbsp; &nbsp;<br />\r\n3 Last Goodbye<br />\r\n4 Lilac Wine&nbsp;&nbsp; &nbsp;<br />\r\n5 So Real&nbsp;&nbsp; &nbsp;<br />\r\n6 Hallelujah&nbsp;&nbsp; &nbsp;<br />\r\n7 Lover, You Should&#39;ve Come Over&nbsp;&nbsp; &nbsp;<br />\r\n8 Corpus Christi Carol&nbsp;&nbsp; &nbsp;<br />\r\n9 Eternal Life&nbsp;&nbsp; &nbsp;<br />\r\n10 Dream Brother</p>\r\n', '<p>Amazing!</p>\r\n', 'Columbia', '300.00', 'LP', 500, 0, 99, 11, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(50) NOT NULL,
  `artist_genre` varchar(50) NOT NULL,
  `artist_country` varchar(50) NOT NULL,
  `artist_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`, `artist_genre`, `artist_country`, `artist_detail`) VALUES
(1, 'MisterWives ', 'Pop', 'UK', '<p>Great!</p>\r\n'),
(3, 'CHVRCHES', 'Electronic', 'UK', '<p>Good!</p>\r\n'),
(5, 'Hailee Steinfeld', 'Pop', 'US', '<p>Cute!</p>\r\n'),
(6, 'Avicii', 'Electronic', 'US', '<p>Handsome!</p>\r\n'),
(8, '22-20s', 'Blues Rock', 'US', '<p>Cool Blues</p>\r\n'),
(10, 'Aerosmith', 'Rock', 'US', '<p>GOOOOOD!!</p>\r\n'),
(11, 'Jeff Buckley', 'Rock', 'US', '<p>You are so young!</p>\r\n'),
(12, 'Bruno Mars', 'Hip Hop', 'US', '<p>Lazy!</p>\r\n'),
(13, 'John Denver', 'Folk', 'US', '<p>Countory Road!</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_quantity_s` text NOT NULL,
  `order_quantity_a` text NOT NULL,
  `order_list_s` text NOT NULL,
  `order_list_a` text NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_status` char(11) NOT NULL DEFAULT 'Processed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_quantity_s`, `order_quantity_a`, `order_list_s`, `order_list_a`, `order_user_id`, `order_status`) VALUES
(1, '2019-05-24', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"3\";}', 'N;', 'a:2:{i:0;s:1:\"6\";i:1;s:1:\"8\";}', 'N;', 2, 'Completed'),
(2, '2019-05-24', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:1:\"4\";}', 2, 'Processed'),
(3, '2019-05-24', 'N;', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"3\";}', 'N;', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}', 5, 'Processed'),
(4, '2019-05-24', 'a:1:{i:0;s:1:\"4\";}', 'N;', 'a:1:{i:0;s:1:\"9\";}', 'N;', 7, 'Processed'),
(5, '2019-05-24', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:1:\"6\";}', 'a:1:{i:0;s:1:\"2\";}', 15, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `sale_name` varchar(50) NOT NULL,
  `sale_percentage` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_name`, `sale_percentage`) VALUES
(1, 'Summer Sale(50%)', '0.50'),
(2, 'Winter Sale(30%)', '0.30'),
(3, 'Autumn Sale(10%)', '0.10'),
(4, 'Spring Sale(20%)', '0.20'),
(99, 'No Sale', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `song_image` varchar(50) NOT NULL,
  `song_title` varchar(50) NOT NULL,
  `song_date` date NOT NULL,
  `song_detail` text NOT NULL,
  `song_label` varchar(50) NOT NULL,
  `song_price` decimal(10,2) NOT NULL,
  `song_format` varchar(11) NOT NULL,
  `song_stock` int(11) NOT NULL,
  `song_sold` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `song_album_id` int(11) NOT NULL,
  `song_sale_id` int(11) NOT NULL,
  `song_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_image`, `song_title`, `song_date`, `song_detail`, `song_label`, `song_price`, `song_format`, `song_stock`, `song_sold`, `artist_id`, `song_album_id`, `song_sale_id`, `song_status`) VALUES
(1, 'images_songs/R-11322100-1514198749-7723.jpeg.jpg', 'Reflections', '2019-02-13', '<p>Wonderful!</p>\r\n', ' Photo Finish Records', '300.00', 'CD', 10000, 0, 1, 1, 2, 'A'),
(4, 'images_songs/R-12049630-1546651777-4735.jpeg.jpg', 'Love Myself', '2019-02-14', '<p>YESSSSSS!</p>\r\n', 'Republic Records', '200.00', 'CD', 496, 4, 5, 0, 4, 'A'),
(5, 'images_songs/R-4661121-1371408176-1624.jpeg.jpg', 'Wake Me Up', '2019-05-15', '<p>YEAHHHHH!</p>\r\n', 'Def Jam Recordings ', '400.00', 'LP', 300, 0, 6, 0, 3, 'A'),
(6, 'images_songs/2.jpg', 'I Dont Want To Miss A Thing', '2019-05-14', '<p>GOOOD</p>\r\n', 'Columbia', '400.00', 'MP3', 9994, 6, 10, 0, 1, 'A'),
(7, 'images_songs/R-2903876-1306524993.jpeg.jpg', 'The Lazy Song', '2019-05-10', '<p>Lazy! Lazy!</p>\r\n', 'Elektra', '200.00', 'MP3', 5000, 0, 12, 0, 3, 'A'),
(8, 'images_songs/R-378673-1355331945-6071.jpeg.jpg', 'Last Goodbye', '2000-03-11', '<p>Genious</p>\r\n', 'Columbia', '50.00', 'MP3', 1997, 3, 11, 6, 99, 'A'),
(9, 'images_songs/R-5053841-1383239154-4551.jpeg.jpg', 'Take Me Home, Country Roads', '1980-04-04', '<p>Home!</p>\r\n', 'RCA Victor', '50.00', 'MP3', 896, 4, 13, 0, 99, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'U',
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_address` text NOT NULL,
  `user_phone` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_date` date NOT NULL,
  `user_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `user_fname`, `user_lname`, `user_address`, `user_phone`, `user_email`, `user_password`, `user_date`, `user_status`) VALUES
(1, 'A', 'Daisuke', 'Nakamura', 'address1', '111-111-111', '111@111.com', '698d51a19d8a121ce581499d7b701668', '2019-05-24', 'A'),
(2, 'U', 'John', 'Lennon', 'address2', '222-222-222', '222@222.com', 'bcbe3365e6ac95ea2c0343a2395834dd', '2019-05-24', 'A'),
(3, 'U', 'Paul', ' McCartney', 'address3', '333-333-333', '333@333.com', 'bcbe3365e6ac95ea2c0343a2395834dd', '2019-05-24', 'A'),
(4, 'U', 'George', 'Harrison', 'address4', '444-444-444', '444@444.com', '550a141f12de6341fba65b0ad0433500', '2019-05-24', 'A'),
(5, 'U', 'Ring', 'Starr', 'address5', '555-555-555', '555@555.com', '15de21c670ae7c3f6f3f1f37029303c9', '2019-05-24', 'A'),
(6, 'A', 'Freddie', 'Mercury', 'address6', '666-666-666', '666@666.com', 'fae0b27c451c728867a567e8c1bb4e53', '2019-05-24', 'A'),
(7, 'U', 'Brian', 'May', 'address7', '777-777-777', '777@777.com', 'f1c1592588411002af340cbaedd6fc33', '2019-05-24', 'A'),
(8, 'U', 'Roger', 'Taylor', 'address8', '888-888-888', '888@888.com', '0a113ef6b61820daa5611c870ed8d5ee', '2019-05-24', 'A'),
(9, 'U', 'John', 'Deacon', 'address9', '999-999-999', '999@999.com', 'b706835de79a2b4e80506f582af3676a', '2019-05-24', 'A'),
(10, 'U', 'Nick', 'Mason', 'address10', '1010-1010-1010', '1010@1010.com', '1e48c4420b7073bc11916c6c1de226bb', '2019-05-24', 'A'),
(11, 'U', 'Roger', 'Waters', 'address11', '1111-1111-1111', '1111@1111.com', 'b59c67bf196a4758191e42f76670ceba', '2019-05-24', 'A'),
(12, 'U', 'Richard', 'Wright', 'address12', '1212-1212-1212', '1212@1212.com', 'a01610228fe998f515a72dd730294d87', '2019-05-24', 'A'),
(13, 'U', 'Syd', ' Barrett', 'address13', '1313-1313-1313', '1313@1313.com', 'f09696910bdd874a99cd74c8f05b5c44', '2019-05-24', 'A'),
(14, 'U', 'David', 'Gilmour', 'address14', '1414-1414-1414', '1414@1414.com', '7a674153c63cff1ad7f0e261c369ab2c', '2019-05-24', 'A'),
(15, 'U', 'Tarou', 'Tanaka', 'addresstanaka', '999-999-999', 'tanaka@tanaka.com', '0292e031195ca50fed149b421c7df329', '2019-05-24', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
