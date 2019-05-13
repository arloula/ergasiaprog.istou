-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 13 Μάη 2019 στις 18:14:51
-- Έκδοση διακομιστή: 10.1.39-MariaDB
-- Έκδοση PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `cart`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(1, 'Deluxe Box Set', 'eshop-img/album1.png', 35),
(2, '\'APFUTD\' T-Shirt', 'eshop-img/clothing1.jpg', 20),
(3, 'Blue T-Shirt', 'eshop-img/clothing2.png', 20),
(4, 'Black Baseball Tee', 'eshop-img/clothing3.png', 25),
(5, 'White Baseball Tee', 'eshop-img/clothing4.png', 25),
(6, 'Black Hoodie', 'eshop-img/clothing5.jpg', 40),
(7, 'White T-Shirt', 'eshop-img/clothing6.jpg', 20),
(8, 'Black T-Shirt', 'eshop-img/clothing7.jpg', 20),
(9, 'Black Jacket', 'eshop-img/clothing8.jpg', 60),
(10, 'Beanie', 'eshop-img/accessories1.jpg', 5),
(11, 'Back Pack Black', 'eshop-img/accessories2.jpg', 20),
(12, 'Placebo 2 Disc', 'eshop-img/media1.jpg', 5),
(13, 'Jesus\' Son 7\" Vinyl', 'eshop-img/media2.jpg', 5);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
