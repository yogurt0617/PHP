-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-01-11 11:49:07
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mydb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_date` datetime DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `picurl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `album`
--

INSERT INTO `album` (`album_id`, `album_date`, `location`, `title`, `picurl`) VALUES
(24, '2026-01-11 11:30:00', '台中市', '台中科大門口', 'nutcDoor.jpg'),
(25, '2026-01-11 11:33:00', '台北市', '台北科大門口', 'ntutDoor.jpg'),
(26, '2026-01-11 20:35:00', '雲林縣', '雲林科大門口', 'nyustDoor.jpg'),
(27, '2026-01-11 11:36:00', '台北市', '台灣科大門口', 'ntustDoor.jpg'),
(28, '2026-01-11 11:38:00', '屏東縣', '屏東科大門口', 'npustDoor.jpg'),
(30, '2026-01-11 11:40:00', '雲林縣', '虎尾科大門口', 'nfuDoor.jpg'),
(31, '2026-01-11 11:42:00', '高雄市', '高雄科大門口', 'nkustDoor.jpg'),
(32, '2026-01-11 11:43:00', '澎湖縣', '澎湖科大門口', 'npuDoor.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `sdgs`
--

CREATE TABLE `sdgs` (
  `sdg` int(2) NOT NULL,
  `img` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `detail` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `sdgs`
--

INSERT INTO `sdgs` (`sdg`, `img`, `title`, `detail`) VALUES
(1, 'sdg1.png', 'SDG 1 終結貧窮', '消除各地一切形式的貧窮'),
(2, 'sdg2.png', 'SDG 2 消除飢餓', '確保糧食安全，消除飢餓，促進永續農業'),
(3, 'sdg3.png', 'SDG 3 健康與福祉', '確保及促進各年齡層健康生活與福祉'),
(4, 'sdg4.png', 'SDG 4 優質教育', '確保有教無類、公平以及高品質的教育，及提倡終身學習'),
(5, 'sdg5.png', 'SDG 5 性別平權', '實現性別平等，並賦予婦女權力'),
(6, 'sdg6.png', 'SDG 6 淨水及衛生', '確保所有人都能享有水、衛生及其永續管理'),
(7, 'sdg7.png', 'SDG 7 可負擔的潔淨能源', '確保所有的人都可取得負擔得起、可靠、永續及現代的能源'),
(8, 'sdg8.png', 'SDG 8 合適的工作及經濟成長', '促進包容且永續的經濟成長，讓每個人都有一份好工作'),
(9, 'sdg9.png', 'SDG 9 工業化、創新及基礎建設', '建立具有韌性的基礎建設，促進包容且永續的工業，並加速創新'),
(10, 'sdg10.png', 'SDG 10 減少不平等', '減少國內及國家間的不平等'),
(11, 'sdg11.png', 'SDG 11 永續城鄉', '建構具包容、安全、韌性及永續特質的城市與鄉村'),
(12, 'sdg12.png', 'SDG 12 責任消費及生產', '促進綠色經濟，確保永續消費及生產模式'),
(13, 'sdg13.png', 'SDG 13 氣候行動', '完備減緩調適行動，以因應氣候變遷及其影響'),
(14, 'sdg14.png', 'SDG 14 保育海洋生態', '保育及永續利用海洋生態系，以確保生物多樣性並防止海洋環境劣化'),
(15, 'sdg15.png', 'SDG 15 保育陸域生態', '保育及永續利用陸域生態系，確保生物多樣性並防止土地劣化'),
(16, 'sdg16.png', 'SDG 16 和平、正義及健全制度', '促進和平多元的社會，確保司法平等，建立具公信力且廣納民意的體系'),
(17, 'sdg17.png', 'SDG 17 多元夥伴關係', '建立多元夥伴關係，協力促進永續願景');

-- --------------------------------------------------------

--
-- 資料表結構 `students`
--

CREATE TABLE `students` (
  `sno` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `username` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `students`
--

INSERT INTO `students` (`sno`, `name`, `address`, `birthday`, `username`, `password`) VALUES
('S000', '示範', '示範示範示範', '3000-01-01', 'DEMO-000', 'DEMO0o0o0o'),
('S001', '陳會安', '新北市五股區', '2000-10-05', 'hueyan', '1234'),
('S002', '江小魚', '新北市中和區', '1999-01-02', 'smallfish', '1234'),
('S003', '周傑倫', '台北市松山區', '2001-05-10', 'jay', '1234'),
('S004', '蔡依玲', '台北市大安區', '1998-07-22', 'jolin', '1234'),
('S005', '張會妹', '台北市信義區', '1999-03-01', 'chiang', '1234'),
('S006', '張無忌', '台北市內湖區', '2000-03-01', 'chiang1234', '1234'),
('S044', '劉宥成', '台中市東區', '2007-06-17', 'you___0617', '0617');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- 資料表索引 `sdgs`
--
ALTER TABLE `sdgs`
  ADD PRIMARY KEY (`sdg`);

--
-- 資料表索引 `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sno`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
