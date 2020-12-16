-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-15 16:31:47
-- 伺服器版本： 10.4.16-MariaDB
-- PHP 版本： 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `lydia_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `kitchen_detail_a`
--

CREATE TABLE `kitchen_detail_a` (
  `sid` int(11) NOT NULL,
  `meal_01` varchar(255) NOT NULL,
  `meal_02` varchar(255) NOT NULL,
  `meal_03` varchar(255) NOT NULL,
  `meal_04` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `kitchen_list_detail`
--

CREATE TABLE `kitchen_list_detail` (
  `sid` int(11) NOT NULL,
  `NumPeople` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `SetMeal` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `kitchen_list_detail`
--

INSERT INTO `kitchen_list_detail` (`sid`, `NumPeople`, `SetMeal`, `Price`) VALUES
(1, '1-2人', 'A', 999),
(2, '3-4人', 'B', 1666),
(3, '8-10人', 'C', 2222);

-- --------------------------------------------------------

--
-- 資料表結構 `kitchen_times`
--

CREATE TABLE `kitchen_times` (
  `sid` int(11) NOT NULL,
  `Reservation_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `surprise_list_detail`
--

CREATE TABLE `surprise_list_detail` (
  `sid` int(11) NOT NULL,
  `NumPeople` int(11) NOT NULL,
  `NumMeal` int(11) NOT NULL,
  `OrderPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `surprise_list_detail`
--

INSERT INTO `surprise_list_detail` (`sid`, `NumPeople`, `NumMeal`, `OrderPrice`) VALUES
(1, 1, 1, 500),
(2, 1, 2, 500),
(3, 2, 2, 1000),
(4, 2, 3, 1000);

-- --------------------------------------------------------

--
-- 資料表結構 `surprise_times`
--

CREATE TABLE `surprise_times` (
  `sid` int(11) NOT NULL,
  `Reservation_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `surprise_times`
--

INSERT INTO `surprise_times` (`sid`, `Reservation_time`) VALUES
(1, '11:00'),
(2, '16:30');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `kitchen_detail_a`
--
ALTER TABLE `kitchen_detail_a`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `kitchen_list_detail`
--
ALTER TABLE `kitchen_list_detail`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `kitchen_times`
--
ALTER TABLE `kitchen_times`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `surprise_list_detail`
--
ALTER TABLE `surprise_list_detail`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `surprise_times`
--
ALTER TABLE `surprise_times`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `kitchen_detail_a`
--
ALTER TABLE `kitchen_detail_a`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `kitchen_list_detail`
--
ALTER TABLE `kitchen_list_detail`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `kitchen_times`
--
ALTER TABLE `kitchen_times`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `surprise_list_detail`
--
ALTER TABLE `surprise_list_detail`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `surprise_times`
--
ALTER TABLE `surprise_times`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
