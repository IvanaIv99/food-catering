-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2021 at 11:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14054548_catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorID` int(6) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `university` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `universityIndex` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorID`, `fullname`, `university`, `universityIndex`, `city`, `img`, `description`) VALUES
(1, 'Ivana Ivanovic ', 'Visoka ICT', '49/18', 'Cacak', '', 'Hello everyone.\r\nI am a student of internet technologies placed in Belgrade.Since i was younger, i had interests for computers and programming.\r\nSInce i started learning frond-end development i could say it\'s currently my biggest interest.\r\nHave a nice da');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandID` int(6) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandID`, `name`, `img`) VALUES
(1, 'Organic Cafe', '1.png'),
(2, 'Herbal House', '02.png'),
(3, 'Pine&Pouny', '03.png'),
(4, 'Pure Nature ', '04.png'),
(5, 'The Enjoy Seasons', '05.png'),
(6, 'Forestia', '06.png'),
(7, 'BotaniCals', '7.png'),
(8, 'BeautyCare', '8.png'),
(9, 'Yoga', '9.png'),
(10, 'HealthyLife', '10.png'),
(11, 'OrganicCosmetics', '11.png'),
(12, 'BeautyCare', '12.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(6) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `name`) VALUES
(1, 'Salads'),
(2, 'Tortillas'),
(3, 'Pasta'),
(4, 'Breads'),
(5, 'Grilled meat'),
(6, 'Deserts');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityID` int(6) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `countryID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityID`, `name`, `countryID`) VALUES
(1, 'Dhaka', 1),
(2, 'Chittagong', 1),
(3, 'Mumbai', 2),
(4, 'New Delhi', 2),
(5, 'Milano', 3),
(6, 'Rome', 3),
(7, 'Belgrade', 4),
(8, 'Novi Sad', 4),
(9, 'London', 5),
(10, 'Liverpool', 5);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countryID` int(6) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countryID`, `name`) VALUES
(1, 'Bangladesh'),
(2, 'India'),
(3, 'Italy'),
(4, 'Serbia'),
(5, 'England');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredientsID` int(6) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredientsID`, `name`) VALUES
(1, 'Chickpeas'),
(2, 'Tomato'),
(3, 'Olives'),
(4, 'Green Beans'),
(5, 'Tortilla'),
(6, 'Beef fillet'),
(7, 'Persley'),
(8, 'Olive oil'),
(9, 'Fallafel'),
(10, 'Greens'),
(11, 'Lemon tahini'),
(12, 'Carrots'),
(13, 'Salmon'),
(14, 'Lemon'),
(15, 'Zucchini'),
(16, 'Spinach'),
(17, 'Almond Milk'),
(18, 'Mixed Berries'),
(19, 'Bannana'),
(20, 'Vanilla'),
(21, 'Kalamata olives'),
(22, 'Gaeta olives'),
(23, 'Black olives'),
(71, 'Seee'),
(72, 'Wee'),
(73, 'Leba'),
(74, 'Mleka'),
(75, 'Pppp'),
(76, 'Yyyy'),
(77, 'Onion'),
(78, 'bannana'),
(79, 'Almond flour'),
(80, 'blueberries');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuID` int(6) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoryID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuID`, `name`, `price`, `img`, `categoryID`) VALUES
(1, 'Western Salad', '15', 'order-1.png', 1),
(2, 'Chile Grilled Beef', '23', 'order-2.png', 5),
(3, 'Vegan Tortilla with Fallafel', '45', 'order-3.png', 2),
(4, 'Salmon Zucchini Pasta', '30', 'order-4.png', 3),
(5, 'Vegan Berries Icecream', '12', 'order-5.png', 6),
(6, 'Italian Olive Bread', '16', 'order-6.png', 4),
(34, 'Bannana bread', '35', '1591974263_best-banana-bread-thumb.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_ingredients`
--

CREATE TABLE `menu_ingredients` (
  `menuID` int(6) NOT NULL,
  `ingredientsID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_ingredients`
--

INSERT INTO `menu_ingredients` (`menuID`, `ingredientsID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(6, 21),
(6, 22),
(6, 23),
(31, 71),
(31, 71),
(31, 72),
(31, 72),
(32, 73),
(32, 73),
(32, 74),
(32, 74),
(33, 75),
(33, 76),
(1, 77),
(34, 78),
(34, 79),
(34, 80);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(6) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userID` int(6) NOT NULL,
  `sentDate` int(100) NOT NULL,
  `reply` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `message`, `userID`, `sentDate`, `reply`) VALUES
(1, 'How many orders?Thanks', 20, 1589735996, 'Thank u,u welcome! :)'),
(3, 'Great application i am soo happy i find it!', 32, 1592149864, 'You are welcome Bill!'),
(4, 'asdasdasdasd', 33, 1592670606, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `navigationID` int(6) NOT NULL,
  `href` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `roleID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`navigationID`, `href`, `name`, `roleID`) VALUES
(3, 'menu', 'Order meal', NULL),
(5, 'contact', 'Contact', NULL),
(7, 'myprofile', 'My profile', 1),
(9, 'orders', 'Orders', 1),
(14, 'statistics', 'Admin Panel', 2),
(15, 'messages', 'Messages', 2),
(16, 'editmealplan', 'Mealplan', 2),
(19, 'messagesUser', 'Messages', 1),
(20, 'about', 'About us', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(6) NOT NULL,
  `userID` int(6) NOT NULL,
  `date` int(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `date`) VALUES
(31, 20, 1591876897),
(32, 20, 1592235556),
(33, 20, 1592235563),
(34, 20, 1592235641),
(35, 20, 1592235662),
(36, 20, 1592235668),
(37, 20, 1592235678),
(38, 20, 1592235887),
(39, 20, 1592235892),
(40, 20, 1592235972),
(41, 20, 1592235974),
(42, 20, 1592235977),
(43, 20, 1592236023),
(44, 20, 1592236024),
(45, 20, 1592236102),
(46, 20, 1592236144),
(47, 20, 1592236145),
(48, 20, 1592236149),
(49, 20, 1592236436),
(50, 20, 1592236438),
(51, 20, 1592236457),
(52, 20, 1592236547),
(53, 20, 1592236549),
(54, 20, 1592236565),
(55, 20, 1592236566),
(56, 20, 1592236703),
(57, 20, 1592236711),
(58, 20, 1592236712),
(59, 20, 1592237188),
(60, 20, 1592237223),
(61, 20, 1592237226),
(62, 20, 1592237288),
(63, 34, 1592821553);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderDetailsID` int(6) NOT NULL,
  `orderID` int(6) NOT NULL,
  `mealID` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  `total_price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderDetailsID`, `orderID`, `mealID`, `quantity`, `total_price`) VALUES
(27, 31, 1, 5, 75),
(28, 31, 2, 3, 69),
(29, 32, 1, 1, 15),
(30, 33, 1, 1, 15),
(31, 34, 1, 1, 15),
(32, 35, 1, 1, 15),
(33, 35, 2, 1, 23),
(34, 36, 1, 1, 15),
(35, 36, 2, 1, 23),
(36, 37, 1, 1, 15),
(37, 37, 2, 1, 23),
(38, 38, 1, 1, 15),
(39, 38, 2, 1, 23),
(40, 39, 1, 1, 15),
(41, 39, 2, 1, 23),
(42, 40, 1, 1, 15),
(43, 40, 2, 1, 23),
(44, 41, 1, 1, 15),
(45, 41, 2, 1, 23),
(46, 42, 1, 1, 15),
(47, 42, 2, 1, 23),
(48, 43, 1, 1, 15),
(49, 43, 2, 1, 23),
(50, 44, 1, 1, 15),
(51, 44, 2, 1, 23),
(52, 45, 1, 1, 15),
(53, 46, 1, 1, 15),
(54, 47, 1, 1, 15),
(55, 48, 1, 1, 15),
(56, 49, 1, 1, 15),
(57, 50, 1, 1, 15),
(58, 51, 1, 1, 15),
(59, 52, 1, 1, 15),
(60, 53, 1, 1, 15),
(61, 54, 1, 1, 15),
(62, 55, 1, 1, 15),
(63, 56, 1, 1, 15),
(64, 57, 1, 1, 15),
(65, 58, 1, 1, 15),
(66, 59, 1, 1, 15),
(67, 60, 1, 1, 15),
(68, 61, 1, 1, 15),
(69, 62, 1, 1, 15),
(70, 63, 2, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(6) NOT NULL,
  `name` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(6) NOT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `service`, `description`, `icon`) VALUES
(1, 'Birthday Catering\r\n', 'FoodCatering provides full-service birthday catering for your special day. We guide you through curating the perfect menu for you and your guests.', 'flaticon-gift'),
(2, 'Wedding Service\r\n', 'FoodCatering provides full-service wedding catering for your special day. We guide you through curating the perfect menu for you and your guests.', 'flaticon-cake'),
(3, 'Party Catering\r\n', 'FoodCatering provides full-service party catering for your special day. We guide you through curating the perfect menu for you and your guests.', 'flaticon-dance'),
(4, 'Event Catering\r\n', 'FoodCatering provides full-service event catering for your special day. We guide you through curating the perfect menu for you and your guests.', 'flaticon-calendar'),
(5, 'Corporate Service\r\n', 'FoodCatering provides full-service corporate catering for your special day. We guide you through curating the perfect menu for you and your guests.', 'flaticon-businessman'),
(6, 'Catering On Demand\r\n', 'FoodCatering provides full-service catering for your special day. We guide you through curating the perfect menu for you and your guests.', 'flaticon-running-man');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(6) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cityID` int(6) NOT NULL,
  `countryID` int(6) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `roleID` int(6) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `loggedIn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fullname`, `password`, `email`, `gender`, `cityID`, `countryID`, `address`, `roleID`, `img`, `active`, `loggedIn`) VALUES
(9, 'Ivana Ivanovic', 'f0c316eff4011a5947813ddc05f2f201', 'atisdale788@gmail.com', 'male', 8, 4, 'Prvomajska 47', 2, '1588429799_mojaslika.jpg', 1, 1),
(20, 'Ivana Ivanovic', 'f0c316eff4011a5947813ddc05f2f201', 'ivana@gmail.com', 'female', 5, 3, 'Prvomajska 47', 1, '1591973707_admin.jpg', 1, 0),
(21, 'Jocka Jockic', '396a1766754a73bc1099c8a059ecf7f9', 'jocka@gmail.com', 'male', 8, 4, 'Prvomajska 47', 1, '1588623145_94032776_1238984476300877_1691682704728260608_n.jpg', 1, 0),
(22, 'Maka Makic', '03ca600afe976c03344a5bc547c37140', 'maka@gmail.com', 'female', 2, 1, 'Dorcol 12/7', 1, '1589060176_user.png', 1, 0),
(24, 'Dunja Jovanic', 'b20f6dbf4aa8c94517847d89f9289874', 'dunja@gmail.com', 'female', 3, 2, 'Dunjka 123/4', 1, '1591022283_moja3.jpg', 1, 0),
(25, 'Vasi Vasic', 'a43548f72a983a48d0fbc78a67553c08', 'vaso1234@gmail.com', 'male', 6, 3, 'Mike Alasa', 1, '1591122310_dog-photo.jpg', 1, 0),
(26, 'Vaso Vasicic', 'a9690e565ed3feda5d4e1ddc924eb6ec', 'vaso12354@gmail.com', 'female', 3, 2, 'Dorcol 58/8', 1, '1591973170_admin.jpg', 1, 0),
(27, 'Vaso Vasicic', 'a9690e565ed3feda5d4e1ddc924eb6ec', 'vaso12354@gmail.com', 'female', 3, 2, 'Dorcol 58/8', 1, '1591973175_admin.jpg', 1, 0),
(28, 'Ivka Ivkic', 'd48112eeea40ed8c553700803991ac50', 'ivka1235@gmail.com', 'female', 1, 1, 'Ivka Ivkic 558/5', 1, '1591973281_admin.jpg', 1, 0),
(29, 'Janko Jankic', '2fe0ae4a196d342da4c6a3bf599667b4', 'janko22@gmail.com', 'male', 3, 2, 'Beogradska 55', 1, '1591973351_admin.jpg', 1, 0),
(30, 'Sloba Radanovic', 'f102b048b026214c4259c5d353280cfc', 'sloba@gmail.com', 'male', 1, 1, 'Slobodnaska 44', 1, '1591973463_admin.jpg', 1, 0),
(31, 'Kija Kockar', '11af0de5b06ec93054f2651193462528', 'atisdale788@gmail.com', 'female', 1, 1, 'Prvomajska 47', 1, '1591973575_admin.jpg', 1, 0),
(32, 'Bill Smith', '414348ad7e2e65b87a8cba48ad557c84', 'billsmith@gmail.com', 'male', 1, 1, 'Bilss Gates 1225', 1, '1592148837_dog-photo.jpg', 1, 0),
(33, 'Nikola Riorovic', 'c7c3b43a731dd340884d55c2361cf0c6', 'nikolariorovic@hotmail.com', 'male', 7, 4, 'zdravka celara 12', 1, '1592670542_dakislepac.jpg', 1, 1),
(34, 'Milena Vesic', '69cf8a4545dd68594b5e635ce5f2ee56', 'milena.vesic@ict.edu.rs', 'male', 7, 4, 'Krlaja Petra 344', 1, '1592821505_beagle3.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `orderID` int(6) NOT NULL,
  `userID` int(6) NOT NULL,
  `total` int(10) NOT NULL,
  `orderdate` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_orders_menu`
--

CREATE TABLE `user_orders_menu` (
  `orderID` int(6) NOT NULL,
  `menuID` int(6) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityID`),
  ADD KEY `countryID` (`countryID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredientsID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `menu_ingredients`
--
ALTER TABLE `menu_ingredients`
  ADD KEY `menuID` (`menuID`),
  ADD KEY `ingredientsID` (`ingredientsID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`navigationID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderDetailsID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user_orders_menu`
--
ALTER TABLE `user_orders_menu`
  ADD PRIMARY KEY (`orderID`,`menuID`),
  ADD KEY `orderID` (`orderID`,`menuID`),
  ADD KEY `menuID` (`menuID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `countryID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredientsID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `navigationID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderDetailsID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `orderID` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`countryID`) REFERENCES `countries` (`countryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_ingredients`
--
ALTER TABLE `menu_ingredients`
  ADD CONSTRAINT `menu_ingredients_ibfk_2` FOREIGN KEY (`ingredientsID`) REFERENCES `ingredients` (`ingredientsID`);

--
-- Constraints for table `user_orders_menu`
--
ALTER TABLE `user_orders_menu`
  ADD CONSTRAINT `user_orders_menu_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `user_orders` (`orderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
