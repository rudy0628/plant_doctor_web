-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-07-04 13:46:40
-- 伺服器版本： 10.4.19-MariaDB
-- PHP 版本： 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `plant`
--

-- --------------------------------------------------------

--
-- 資料表結構 `plantcontent`
--

CREATE TABLE `plantcontent` (
  `plant_type` varchar(25) NOT NULL,
  `plant_state` varchar(25) NOT NULL,
  `plant_img` varchar(25) NOT NULL,
  `plant_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `plantcontent`
--

INSERT INTO `plantcontent` (`plant_type`, `plant_state`, `plant_img`, `plant_text`) VALUES
('SnakePlant', 'anthrax', 'SnakePlant_anthrax', '炭疽病：病徵:種植太密.通風不良.水分失調或受傷的傷口病原容易侵入發生。患病初期葉片產生褐色凹陷小點,以後擴大成圓形或不規則病斑,嚴重時病斑中央有壞疽現象。此病嘉德麗雅蘭及蝴蝶蘭最明顯。東亞蘭此病,葉片會形成褐色細長之壞疽斑。秋石斛葉片會有明顯的暈環。\r\n\r\n炭疽病防治方法:\r\n\r\n1.種植勿太密,光照.排水.通風需良好。\r\n\r\n2.養成健壯植株,勿曬傷.寒害.藥害.肥害。\r\n\r\n3.切除患部,每二週用500倍大生45(Mancozeb).蓋普丹(好速殺Captan)500~600倍,作為平時預防。\r\n\r\n4.治療時可用大富丹500倍.普克拉(包你好)3000倍,每週噴灑一次。\r\n');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `plantcontent`
--
ALTER TABLE `plantcontent`
  ADD PRIMARY KEY (`plant_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
