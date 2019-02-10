-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Şub 2019, 15:20:11
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `securelicense`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sl_admin`
--

CREATE TABLE `sl_admin` (
  `id` int(11) NOT NULL,
  `sl_username` varchar(255) NOT NULL,
  `sl_password` text NOT NULL,
  `sl_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sl_admin`
--

INSERT INTO `sl_admin` (`id`, `sl_username`, `sl_password`, `sl_date`) VALUES
(1, 'Chappie', '$2y$10$2gQwgo1VBuHXZeICERJAfO109.EKC0XMGXS5G6Rp2wJl.ClKBBv1K', '2019-02-09 13:09:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sl_licenses`
--

CREATE TABLE `sl_licenses` (
  `id` int(11) NOT NULL,
  `sl_domain` varchar(255) NOT NULL,
  `sl_start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sl_end_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `sl_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sl_notice`
--

CREATE TABLE `sl_notice` (
  `id` int(11) NOT NULL,
  `sl_domain` varchar(255) DEFAULT NULL,
  `sl_ip` varchar(255) DEFAULT NULL,
  `sl_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sl_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sl_profile`
--

CREATE TABLE `sl_profile` (
  `id` int(11) NOT NULL,
  `sl_firstname` varchar(255) DEFAULT NULL,
  `sl_lastname` varchar(255) DEFAULT NULL,
  `sl_site_name` varchar(255) DEFAULT NULL,
  `sl_user_image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sl_profile`
--

INSERT INTO `sl_profile` (`id`, `sl_firstname`, `sl_lastname`, `sl_site_name`, `sl_user_image`) VALUES
(13, 'Uğur', 'Tosun', 'chappie.com', '1549542401.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sl_setting`
--

CREATE TABLE `sl_setting` (
  `id` int(11) NOT NULL,
  `sl_domain` varchar(255) NOT NULL,
  `sl_license_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `sl_admin`
--
ALTER TABLE `sl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sl_licenses`
--
ALTER TABLE `sl_licenses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sl_notice`
--
ALTER TABLE `sl_notice`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sl_profile`
--
ALTER TABLE `sl_profile`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sl_setting`
--
ALTER TABLE `sl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sl_admin`
--
ALTER TABLE `sl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sl_licenses`
--
ALTER TABLE `sl_licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `sl_notice`
--
ALTER TABLE `sl_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `sl_profile`
--
ALTER TABLE `sl_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `sl_setting`
--
ALTER TABLE `sl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
