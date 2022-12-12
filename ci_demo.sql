-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 07:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Automobile'),
(2, 'Chemicals'),
(5, 'Machinery'),
(6, 'Transport'),
(7, 'Computer'),
(8, 'Food'),
(9, 'Electronics'),
(10, 'Milk');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `chat_messages_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `chat_messages_text` text NOT NULL,
  `chat_messages_status` enum('no','yes') NOT NULL,
  `chat_messages_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat_request`
--

CREATE TABLE `chat_request` (
  `chat_request_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `chat_request_status` enum('Accept','Reject') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat_user`
--

CREATE TABLE `chat_user` (
  `user_id` int(11) NOT NULL,
  `login_oauth_uid` varchar(100) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email_address` varchar(250) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_posts`
--

CREATE TABLE `event_posts` (
  `id` int(11) NOT NULL,
  `event_id` varchar(100) NOT NULL,
  `post_type` enum('video','image') NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `login_data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL,
  `is_type` enum('no','yes') NOT NULL,
  `receiver_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `post_title` text DEFAULT NULL,
  `post_description` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_description`, `author`) VALUES
(1, 'tristique senectus', 'ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec', 'author'),
(2, 'eget odio. Aliquam vulputate ullamcorper magna. Sed eu', 'Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est.', 'author'),
(3, 'cursus et, magna. Praesent interdum ligula', 'semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede,', 'author'),
(4, 'Duis risus odio, auctor vitae, aliquet nec, imperdiet', 'arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin', 'author'),
(5, 'fermentum vel, mauris. Integer sem elit, pharetra', 'Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique', 'author'),
(6, 'arcu. Curabitur ut odio vel est tempor bibendum. Donec felis', 'ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo.', 'author'),
(7, 'malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna.', 'parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor.', 'author'),
(8, 'nunc. Quisque ornare', 'mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec', 'author'),
(9, 'est ac facilisis facilisis, magna tellus faucibus', 'convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris.', 'author'),
(10, 'felis, adipiscing fringilla, porttitor', 'vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus', 'author'),
(11, 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin', 'dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque,', 'author'),
(12, 'in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus', 'vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper', 'author'),
(13, 'sodales nisi magna sed dui.', 'diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis', 'author'),
(14, 'eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula.', 'ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris,', 'author'),
(15, 'neque', 'Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac', 'author'),
(16, 'et', 'fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus', 'author');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Title1', 'Description1', '2020-11-24 15:47:49', NULL),
(2, 'Title2', 'Description2', '2020-11-24 15:48:00', NULL),
(3, 'Title3', 'Description3', '2020-11-24 15:48:10', NULL),
(4, 'Title4', 'Description4', '2020-11-24 15:48:16', NULL),
(5, 'Title5', 'Description5', '2020-11-24 15:48:23', NULL),
(6, 'Title6', 'Description1', '2020-11-24 15:47:49', NULL),
(7, 'Title7', 'Description2', '2020-11-24 15:48:00', NULL),
(8, 'Title8', 'Description3', '2020-11-24 15:48:10', NULL),
(9, 'Title9', 'Description4', '2020-11-24 15:48:16', NULL),
(10, 'Title10', 'Description5', '2020-11-24 15:48:23', NULL),
(11, 'Title11', 'Description11', '2020-11-24 15:47:49', NULL),
(12, 'Title12', 'Description12', '2020-11-24 15:48:00', NULL),
(13, 'Title13', 'Description13', '2020-11-24 15:48:10', NULL),
(14, 'Title14', 'Description14', '2020-11-24 15:48:16', NULL),
(15, 'Title15', 'Description15', '2020-11-24 15:48:23', NULL),
(16, 'Title16', 'Description16', '2020-11-24 15:47:49', NULL),
(17, 'Title17', 'Description17', '2020-11-24 15:48:00', NULL),
(18, 'Title18', 'Description18', '2020-11-24 15:48:10', NULL),
(19, 'Title19', 'Description19', '2020-11-24 15:48:16', NULL),
(20, 'Title20', 'Description20', '2020-11-24 15:48:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_ram` char(5) NOT NULL,
  `product_storage` varchar(50) NOT NULL,
  `product_camera` varchar(20) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_brand`, `product_price`, `product_ram`, `product_storage`, `product_camera`, `product_image`, `product_quantity`, `product_status`) VALUES
(1, 1, 'Honor 9 Lite (Sapphire Blue, 64 GB)  (4 GB RAM)', 'Honor', '14499.00', '4', '64', '13', 'image-1.jpeg', 10, '1'),
(2, 1, '\r\nInfinix Hot S3 (Sandstone Black, 32 GB)  (3 GB RAM)', 'Infinix', '8999.00', '3', '32', '13', 'image-2.jpeg', 10, '1'),
(3, 1, 'VIVO V9 Youth (Gold, 32 GB)  (4 GB RAM)', 'VIVO', '16990.00', '4', '32', '16', 'image-3.jpeg', 10, '1'),
(4, 1, 'Moto E4 Plus (Fine Gold, 32 GB)  (3 GB RAM)', 'Moto', '11499.00', '3', '32', '8', 'image-4.jpeg', 10, '1'),
(5, 1, 'Lenovo K8 Plus (Venom Black, 32 GB)  (3 GB RAM)', 'Lenevo', '9999.00', '3', '32', '13', 'image-5.jpg', 10, '1'),
(6, 2, 'Samsung Galaxy On Nxt (Gold, 16 GB)  (3 GB RAM)', 'Samsung', '10990.00', '3', '16', '13', 'image-6.jpeg', 10, '1'),
(7, 2, 'Moto C Plus (Pearl White, 16 GB)  (2 GB RAM)', 'Moto', '7799.00', '2', '16', '8', 'image-7.jpeg', 10, '1'),
(8, 2, 'Panasonic P77 (White, 16 GB)  (1 GB RAM)', 'Panasonic', '5999.00', '1', '16', '8', 'image-8.jpeg', 10, '1'),
(9, 2, 'OPPO F5 (Black, 64 GB)  (6 GB RAM)', 'OPPO', '19990.00', '6', '64', '16', 'image-9.jpeg', 10, '1'),
(10, 2, 'Honor 7A (Gold, 32 GB)  (3 GB RAM)', 'Honor', '8999.00', '3', '32', '13', 'image-10.jpeg', 10, '1'),
(11, 3, 'Asus ZenFone 5Z (Midnight Blue, 64 GB)  (6 GB RAM)', 'Asus', '29999.00', '6', '128', '12', 'image-12.jpeg', 10, '1'),
(12, 3, 'Redmi 5A (Gold, 32 GB)  (3 GB RAM)', 'MI', '5999.00', '3', '32', '13', 'image-12.jpeg', 10, '1'),
(13, 3, 'Intex Indie 5 (Black, 16 GB)  (2 GB RAM)', 'Intex', '4999.00', '2', '16', '8', 'image-13.jpeg', 10, '1'),
(14, 3, 'Google Pixel 2 XL (18:9 Display, 64 GB) White', 'Google', '61990.00', '4', '64', '12', 'image-14.jpeg', 10, '1'),
(15, 3, 'Samsung Galaxy A9', 'Samsung', '36000.00', '8', '128', '24', 'image-15.jpeg', 10, '1'),
(16, 4, 'Lenovo A5', 'Lenovo', '5999.00', '2', '16', '13', 'image-16.jpeg', 10, '1'),
(17, 4, 'Asus Zenfone Lite L1', 'Asus', '5999.00', '2', '16', '13', 'image-17.jpeg', 10, '1'),
(18, 4, 'Lenovo K9', 'Lenovo', '8999.00', '3', '32', '13', 'image-18.jpeg', 10, '1'),
(19, 4, 'Infinix Hot S3x', 'Infinix', '9999.00', '3', '32', '13', 'image-19.jpeg', 10, '1'),
(20, 4, 'Realme 2', 'Realme', '8990.00', '4', '64', '13', 'image-20.jpeg', 10, '1'),
(21, 5, 'Redmi Note 6 Pro', 'Redmi', '13999.00', '4', '64', '20', 'image-21.jpeg', 10, '1'),
(22, 5, 'Realme C1', 'Realme', '7999.00', '2', '16', '15', 'image-22.jpeg', 10, '1'),
(23, 5, 'Vivo V11', 'Vivo', '22900.00', '6', '64', '21', 'image-23.jpeg', 10, '1'),
(24, 5, 'Oppo F9 Pro', 'Oppo', '23990.00', '6', '64', '18', 'image-24.jpg', 10, '1'),
(25, 5, 'Honor 9N', 'Honor', '11999.00', '4', '64', '15', 'image-25.jpg', 10, '1'),
(26, 0, 'Redmi 6A', 'Redmi', '6599.00', '2', '16', '13', 'image-26.jpeg', 10, '1'),
(27, 0, 'InFocus Vision 3', 'InFocus', '7399.00', '2', '16', '13', 'image-27.jpeg', 10, '1'),
(28, 0, 'Vivo Y69', 'Vivo', '11390.00', '3', '32', '16', 'image-28.jpeg', 10, '1'),
(29, 0, 'Honor 7x', 'Honor', '12721.00', '4', '32', '18', 'image-29.jpeg', 10, '1'),
(30, 0, 'Nokia 2.1', 'Nokia', '6580.00', '2', '1', '8', 'image-30.jpeg', 10, '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `sku`, `price`, `is_active`, `created_at`) VALUES
(1, 'Mobile', 'mobile', '60000.00', 1, '2020-11-18 14:09:05'),
(2, 'Laptop', 'laptop', '40000.00', 1, '2020-11-18 14:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `sample_data`
--

CREATE TABLE `sample_data` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_data`
--

INSERT INTO `sample_data` (`id`, `first_name`, `last_name`, `age`) VALUES
(1, 'John', 'Doe', 35),
(2, 'Mike', 'Hussy', 40);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL COMMENT 'staff name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `mobile` varchar(16) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `salary` float(10,2) NOT NULL COMMENT 'staff salary'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `mobile`, `address`, `salary`) VALUES
(1, 'Samson', 'samson@webdamn.com', '1234567890', 'London', 457002.00),
(2, 'Jhon', 'jhon@webdamn.com', '1234567890', 'Paris', 456003.00),
(3, 'Carl', 'Carl@webdamn.com', '1234567890', 'Newyork', 678002.00),
(4, 'Boriss', 'Boriss@webdamn.com', '1234567890', 'Washington', 345003.00),
(5, 'Ryan', 'Ryan@webdamn.com', '1234567890', 'Toronto', 876002.00),
(6, 'Hokins', 'Hokins@webdamn.com', '1234567890', 'Sydney', 316003.00),
(7, 'Marsh', 'Marsh@webdamn.com', '1234567890', 'Melbourne', 456002.00),
(8, 'Jack', 'Jack@webdamn.com', '1234567890', 'Captown', 876003.00),
(9, 'Iyan', 'Iyan@webdamn.com', '1234567890', 'Wellington', 345003.00),
(10, 'Tare', 'tare@webdamn.com', '1234567890', 'Bankok', 654001.00),
(11, 'Oley', 'ole@webdamn.com', '1234567890', 'Tokyo', 543001.00),
(12, 'Ash', 'ash@webdamn.com', '1234567890', 'Delhi', 538001.00),
(13, 'Haddin', 'Haddin@webdamn.com', '1234567890', 'Mumbai', 653001.00),
(14, 'Graham', 'Graham@webdamn.com', '1234567890', 'New York', 941001.00),
(15, 'Sam', 'Sam@webdamn.com', '1234567890', 'London', 453001.00),
(16, 'Seal', 'Seal@webdamn.com', '1234567890', 'Sydney', 568002.00),
(17, 'Ervine', 'Ervine@webdamn.com', '1234567890', 'Wellington', 169003.00),
(18, 'Mark', 'Mark@webdamn.com', '1234567890', 'Washington DC', 216002.00),
(19, 'Tim', 'tim@webdamn.com', '1234567890', 'Amsterdam', 563003.00),
(20, 'Chaplin', 'Chaplin@webdamn.com', '1234567890', 'Madrid', 509002.00),
(21, 'Charley', 'Charley@webdamn.com', '1234567890', 'Newyork', 768003.00);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `name`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'codeigniter', 'Codeigniter', 'ci', 'ci', '2020-11-20 15:34:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagslist`
--

CREATE TABLE `tagslist` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tagslist`
--

INSERT INTO `tagslist` (`id`, `name`) VALUES
(1, 'a1'),
(2, 'a2'),
(3, 'a3'),
(4, 'a4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(250) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(250) NOT NULL,
  `PostalCode` varchar(30) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`CustomerID`, `CustomerName`, `Address`, `City`, `PostalCode`, `Country`) VALUES
(1, 'Maria Anders', 'Obere Str. 57', 'Berlin', '12209', 'Germany'),
(2, 'Ana Trujillo', 'Avda. de la Construction 2222', 'Mexico D.F.', '5021', 'Mexico'),
(3, 'Antonio Moreno', 'Mataderos 2312', 'Mexico D.F.', '5023', 'Mexico'),
(4, 'Thomas Hardy', '120 Hanover Sq.', 'London', 'WA1 1DP', 'UK'),
(5, 'Paula Parente', 'Rua do Mercado, 12', 'Resende', '08737-363', 'Brazil'),
(6, 'Wolski Zbyszek', 'ul. Filtrowa 68', 'Walla', '01-012', 'Poland'),
(7, 'Matti Karttunen', 'Keskuskatu 45', 'Helsinki', '21240', 'Finland'),
(8, 'Karl Jablonski', '305 - 14th Ave. S. Suite 3B', 'Seattle', '98128', 'USA'),
(9, 'Paula Parente', 'Rua do Mercado, 12', 'Resende', '08737-363', 'Brazil'),
(10, 'Pirkko Koskitalo', 'Torikatu 38', 'Oulu', '90110', 'Finland'),
(11, 'Ronald Bowne', '2343 Shadowmar Drive', 'New Orleans', '70112', 'United States'),
(12, 'Joyce Rosenberry', 'Norra Esplanaden 56', 'HELSINKI', '00380', 'Finland'),
(13, 'Jeff Putnam', 'Industrieweg 56', 'Bouvignies', '7803', 'Belgium'),
(14, 'Trina Davidson', '1049 Lockhart Drive', 'Barrie', 'ON L4M 3B1', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `first_name`, `last_name`, `created_at`) VALUES
(1, 'a1', 'b1', '2021-04-09 16:17:50'),
(2, 'a2', 'b2', '2021-04-09 16:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `student_phone` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `student_phone`, `image`) VALUES
(1, 'Pauline S. Rich', '412-735-0224', 'image_1.jpg'),
(2, 'Sarah C. White', '320-552-9961', 'image_2.jpg'),
(3, 'Samuel L. Leslie', '201-324-8264', 'image_3.jpg'),
(4, 'Norma R. Manly', '478-322-4715', 'image_4.jpg'),
(5, 'Kimberly R. Castro', '479-966-6788', 'image_5.jpg'),
(6, 'Elaine R. Davis', '701-685-8912', 'image_6.jpg'),
(7, 'Concepcion S. Gardner', '607-829-8758', 'image_7.jpg'),
(8, 'Patricia J. White', '803-789-0429', 'image_8.jpg'),
(9, 'Michael M. Bothwell', '214-585-0737', 'image_9.jpg'),
(10, 'Ronald C. Vansickle', '630-571-4107', 'image_10.jpg'),
(11, 'Clarence A. Rich', '904-459-3747', 'image_11.jpg'),
(12, 'Elizabeth W. Peterson', '404-380-9481', 'image_12.jpg'),
(13, 'Renee R. Hewitt', '323-350-4973', 'image_13.jpg'),
(14, 'John K. Love', '337-229-1983', 'image_14.jpg'),
(15, 'Teresa J. Rincon', '216-394-6894', 'image_15.jpg'),
(16, 'Erin S. Huckaby', '503-284-8652', 'image_16.jpg'),
(17, 'Brian A. Handley', '989-304-7122', 'image_17.jpg'),
(18, 'Michelle A. Polk', '540-232-0351', 'image_18.jpg'),
(19, 'Wanda M. Brown', '718-262-7466', 'image_19.jpg'),
(20, 'Phillip A. Hatcher', '407-492-5727', 'image_20.jpg'),
(21, 'Dennis J. Terrell', '903-863-5810', 'image_21.jpg'),
(22, 'Britney F. Johnson', '972-421-6933', 'image_22.jpg'),
(23, 'Rachelle J. Martin', '920-397-4224', 'image_23.jpg'),
(24, 'Leila E. Ledoux', '615-425-9930', 'image_24.jpg'),
(25, 'Darrell A. Fields', '708-887-1913', 'image_25.jpg'),
(26, 'Linda D. Carter', '909-386-7998', 'image_26.jpg'),
(27, 'Melva J. Palmisano', '630-643-8763', 'image_27.jpg'),
(28, 'Jessica V. Windham', '513-807-9224', 'image_28.jpg'),
(29, 'Karen T. Martin', '847-385-1621', 'image_29.jpg'),
(30, 'Jack K. McDonough', '561-641-4509', 'image_30.jpg'),
(31, 'John M. Williams', '508-269-9346', 'image_31.jpg'),
(32, 'Amelia W. Davis', '347-537-8052', 'image_32.jpg'),
(33, 'Gertrude W. Lawrence', '510-702-7415', 'image_33.jpg'),
(34, 'Michael L. Harris', '252-219-4076', 'image_34.jpg'),
(35, 'Casey A. Groves', '810-334-9674', 'image_35.jpg'),
(36, 'James H. Wilson', '865-259-6772', 'image_36.jpg'),
(37, 'James A. Wesley', '443-217-1859', 'image_37.jpg'),
(38, 'Armando C. Gay', '716-252-9230', 'image_38.jpg'),
(39, 'James M. Duarte', '402-840-0541', 'image_39.jpg'),
(40, 'Jason E. West', '360-610-7730', 'image_40.jpg'),
(41, 'Gloria H. Saucedo', '205-861-3306', 'image_41.jpg'),
(42, 'Paul T. Moody', '914-683-4994', 'image_42.jpg'),
(43, 'Sandra L. Williams', '310-335-1336', 'image_43.jpg'),
(44, 'Elaine T. Deville', '626-513-8306', 'image_44.jpg'),
(45, 'Robyn L. Spangler', '754-224-7023', 'image_45.jpg'),
(46, 'Sam A. Pino', '806-823-5344', 'image_46.jpg'),
(47, 'Joseph H. Marble', '201-917-2804', 'image_47.jpg'),
(48, 'Mark M. Bassett', '206-592-4665', 'image_48.jpg'),
(49, 'Edgar M. Billy', '978-365-0324', 'image_49.jpg'),
(50, 'Connie M. Yang', '815-288-5435', 'image_50.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'password'),
(2, 'user', 'user@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Panel', '1229800972.jpg', '2020-11-19 14:45:37', NULL),
(2, 'User', 'Panel', '2113756729.jpg', '2020-11-19 15:00:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`chat_messages_id`);

--
-- Indexes for table `chat_request`
--
ALTER TABLE `chat_request`
  ADD PRIMARY KEY (`chat_request_id`);

--
-- Indexes for table `chat_user`
--
ALTER TABLE `chat_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_posts`
--
ALTER TABLE `event_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`login_data_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_data`
--
ALTER TABLE `sample_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagslist`
--
ALTER TABLE `tagslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `chat_messages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_request`
--
ALTER TABLE `chat_request`
  MODIFY `chat_request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_user`
--
ALTER TABLE `chat_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_posts`
--
ALTER TABLE `event_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `login_data_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sample_data`
--
ALTER TABLE `sample_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tagslist`
--
ALTER TABLE `tagslist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
