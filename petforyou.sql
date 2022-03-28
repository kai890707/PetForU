-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-03-28 19:03:17
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `petforyou`
--

-- --------------------------------------------------------

--
-- 資料表結構 `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, '基隆市'),
(2, '台北市'),
(3, '新北市'),
(4, '桃園縣'),
(5, '桃園市'),
(6, '新竹市'),
(7, '新竹縣'),
(8, '苗栗縣'),
(9, '台中市'),
(10, '彰化縣'),
(11, '彰化市'),
(12, '南投縣'),
(13, '雲林縣'),
(14, '嘉義市'),
(15, '嘉義縣'),
(16, '台南市'),
(17, '高雄市'),
(18, '屏東縣'),
(19, '屏東市'),
(20, '台東縣'),
(21, '花蓮縣'),
(22, '宜蘭縣'),
(23, '澎湖縣'),
(24, '金門縣'),
(25, '連江縣');

-- --------------------------------------------------------

--
-- 資料表結構 `collet`
--

CREATE TABLE `collet` (
  `collet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(11) NOT NULL,
  `pet_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '實際所在地',
  `pet_kind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物類型',
  `pet_variety` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物品種',
  `pet_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物性別',
  `pet_bodytype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物體型',
  `pet_colour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物毛色',
  `pet_age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物年紀',
  `pet_sterilization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '是否絕育',
  `pet_bacterin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '是否施打狂犬病疫苗',
  `pet_foundplace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物尋獲地',
  `pet_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物狀態',
  `pet_remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物備註',
  `pet_caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '其他說明',
  `pet_opendate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '開放認養時間(起)',
  `pet_closeddate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '開放認養時間(迄)',
  `pet_shelter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物收容所名稱',
  `pet_photo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物照片',
  `pet_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '寵物地址',
  `pet_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '連絡電話'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `published`
--

CREATE TABLE `published` (
  `published_id` int(11) NOT NULL,
  `published_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物名稱',
  `published_kind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物類型',
  `published_variet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物品種',
  `published_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物性別',
  `published_bodytype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物體型',
  `published_colour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物毛色',
  `published_age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物年紀',
  `published_sterilization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '是否絕育',
  `published_bacterin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '是否施打狂犬病疫苗',
  `published_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物狀態',
  `published_remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物備註',
  `published_photo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '刊登寵物照片',
  `published_createDate` date NOT NULL COMMENT '資料創立時間',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_photo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_password`, `user_name`, `user_gender`, `user_phone`, `user_photo`) VALUES
(1, 'aa324917', 'asd26455', 'bbb', '男', '091234556', ''),
(2, 'aaa', 'aaa', 'bbb', '女', '0912312312', 'asdasdasd'),
(9, '123123', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- 資料表索引 `collet`
--
ALTER TABLE `collet`
  ADD PRIMARY KEY (`collet_id`);

--
-- 資料表索引 `published`
--
ALTER TABLE `published`
  ADD PRIMARY KEY (`published_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `collet`
--
ALTER TABLE `collet`
  MODIFY `collet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `published`
--
ALTER TABLE `published`
  MODIFY `published_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
