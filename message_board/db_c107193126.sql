-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-07-04 13:41:07
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
-- 資料庫： `db_c107193126`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `message_idx` int(11) NOT NULL,
  `member_id` char(18) NOT NULL,
  `content` text NOT NULL,
  `comment_idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`message_idx`, `member_id`, `content`, `comment_idx`) VALUES
(17, 'C107193187', '123', 9),
(17, 'C107193187', '5789', 10);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_id` char(18) NOT NULL,
  `pswd` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_id`, `pswd`) VALUES
('C107193100', '193100'),
('C107193187', '193187'),
('C107193188', '193188'),
('C107193189', '193189'),
('C107193190', '193190'),
('C107193191', '193191'),
('C107193192', '193192'),
('C107193193', '193193'),
('C107193194', '193194'),
('C107193195', '193195'),
('C107193196', '193196'),
('lastcool0628', '0527');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `message_idx` int(11) NOT NULL,
  `member_id` char(18) NOT NULL,
  `author` char(18) NOT NULL,
  `subject` char(60) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`message_idx`, `member_id`, `author`, `subject`, `content`, `date`) VALUES
(17, 'C107193187', 'C107193187', '456', '456', '2021-07-03 05:31:36'),
(19, 'C107193190', 'C107193190', 'ooo', 'ooooo', '2021-07-03 06:23:15'),
(20, 'C107193187', 'C107193187', '456465465465', '456', '2021-07-04 05:06:05');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_idx`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_idx`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `message_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
