-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-23 16:04:15
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
  `CreateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `kitchen_list_detail`
--

CREATE TABLE `kitchen_list_detail` (
  `sid` int(11) NOT NULL,
  `NumPeople` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `SetMeal` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Price` int(11) NOT NULL,
  `CreateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `kitchen_list_detail`
--

INSERT INTO `kitchen_list_detail` (`sid`, `NumPeople`, `SetMeal`, `Price`, `CreateTime`) VALUES
(12, '1-2人', 'A', 666, '2020-12-23 22:59:39');

-- --------------------------------------------------------

--
-- 資料表結構 `kitchen_times`
--

CREATE TABLE `kitchen_times` (
  `sid` int(11) NOT NULL,
  `ReservationTime` varchar(255) NOT NULL,
  `CreateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `kitchen_times`
--

INSERT INTO `kitchen_times` (`sid`, `ReservationTime`, `CreateTime`) VALUES
(21, '12:00', '2020-12-23 22:59:48');

-- --------------------------------------------------------

--
-- 資料表結構 `lydia_admins`
--

CREATE TABLE `lydia_admins` (
  `sid` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `CreateTime` datetime NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `lydia_admins`
--

INSERT INTO `lydia_admins` (`sid`, `nickname`, `account`, `password`, `CreateTime`, `avatar`) VALUES
(1, 'Qoo', 'Qoo', '51eac6b471a284d3341d8c0c63d0f1a286262a18', '2020-12-17 20:19:12', '5fe35c4551f8c.jpg'),
(2, 'Boo', 'Boo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-12-19 20:16:33', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `reservation`
--

CREATE TABLE `reservation` (
  `sid` int(11) NOT NULL,
  `ReservationDate` date NOT NULL,
  `ReservationTime` varchar(255) NOT NULL,
  `NumMeal` int(11) NOT NULL,
  `NumPeople` int(11) DEFAULT NULL,
  `OrderPrice` int(11) DEFAULT NULL,
  `OrderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `reservation`
--

INSERT INTO `reservation` (`sid`, `ReservationDate`, `ReservationTime`, `NumMeal`, `NumPeople`, `OrderPrice`, `OrderDate`) VALUES
(19, '2020-12-26', '13:00', 1, NULL, NULL, '2020-12-23 23:00:20'),
(21, '2020-12-27', '15:00', 1, NULL, NULL, '2020-12-23 23:01:14');

-- --------------------------------------------------------

--
-- 資料表結構 `surprise_list`
--

CREATE TABLE `surprise_list` (
  `sid` int(11) NOT NULL,
  `member_sid` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `ReservationDate` date NOT NULL,
  `ReservationTime` varchar(255) NOT NULL,
  `NumPeople` int(11) NOT NULL DEFAULT 1,
  `NumMeal` int(11) NOT NULL DEFAULT 1,
  `Meal` varchar(255) NOT NULL,
  `OrderPrice` int(11) NOT NULL DEFAULT 500,
  `TotalPrice` int(11) NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT 1,
  `check_state` tinyint(4) NOT NULL DEFAULT 0,
  `check_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `surprise_list`
--

INSERT INTO `surprise_list` (`sid`, `member_sid`, `img`, `ReservationDate`, `ReservationTime`, `NumPeople`, `NumMeal`, `Meal`, `OrderPrice`, `TotalPrice`, `visible`, `check_state`, `check_date`) VALUES
(1, 1, 'picture01', '2020-12-25', '', 1, 1, '', 500, 500, 1, 0, '0000-00-00 00:00:00'),
(2, 2, 'picture01', '2020-12-26', '', 2, 1, '', 500, 500, 1, 0, '0000-00-00 00:00:00'),
(3, 3, 'picture01', '2020-12-27', '', 3, 1, '', 500, 500, 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `surprise_list_detail`
--

CREATE TABLE `surprise_list_detail` (
  `sid` int(11) NOT NULL,
  `NumPeople` int(11) NOT NULL,
  `NumMeal` int(11) NOT NULL,
  `OrderPrice` int(11) NOT NULL,
  `CreateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `surprise_list_detail`
--

INSERT INTO `surprise_list_detail` (`sid`, `NumPeople`, `NumMeal`, `OrderPrice`, `CreateTime`) VALUES
(1, 1, 1, 500, '2020-12-23 22:17:23'),
(2, 2, 2, 1000, '0000-00-00 00:00:00'),
(3, 3, 3, 1500, '0000-00-00 00:00:00'),
(4, 4, 4, 2000, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `surprise_times`
--

CREATE TABLE `surprise_times` (
  `sid` int(11) NOT NULL,
  `ReservationTime` varchar(255) NOT NULL,
  `CreateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `surprise_times`
--

INSERT INTO `surprise_times` (`sid`, `ReservationTime`, `CreateTime`) VALUES
(21, '15:00', '2020-12-23 22:16:44'),
(22, '18:00', '2020-12-23 22:16:47'),
(23, '19:00', '2020-12-23 22:16:51');

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
-- 資料表索引 `lydia_admins`
--
ALTER TABLE `lydia_admins`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `surprise_list`
--
ALTER TABLE `surprise_list`
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
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `kitchen_times`
--
ALTER TABLE `kitchen_times`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `lydia_admins`
--
ALTER TABLE `lydia_admins`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reservation`
--
ALTER TABLE `reservation`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `surprise_list`
--
ALTER TABLE `surprise_list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `surprise_list_detail`
--
ALTER TABLE `surprise_list_detail`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `surprise_times`
--
ALTER TABLE `surprise_times`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
