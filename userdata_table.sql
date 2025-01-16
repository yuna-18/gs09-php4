-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql3104.db.sakura.ne.jp
-- 生成日時: 2025 年 1 月 17 日 00:35
-- サーバのバージョン： 8.0.40
-- PHP のバージョン: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `snowtapir22_musifo-test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `userdata_table`
--

CREATE TABLE `userdata_table` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `furigana` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pw` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `music_category` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subscribe_mail` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `userdata_table`
--

INSERT INTO `userdata_table` (`id`, `name`, `furigana`, `email`, `pw`, `music_category`, `subscribe_mail`, `date`) VALUES
(51, 'root', 'root', 'root', '$2y$10$mUvHb9ntd23laNuBGYfQVef8tyhRK/r0ph0PSfaS04DGhkhEyGJ2O', 'オーケストラ, 室内楽・アンサンブル, ソロ', 1, '2025-01-17 00:34:21'),
(52, 'user1', 'user1', 'user1', '$2y$10$oaT6k0IDb9CzwpCupl6SFudo49KMXqL4nQV/xZaWenIp2uobRmeEm', 'オーケストラ, 吹奏楽, 室内楽・アンサンブル', 1, '2025-01-17 00:34:42'),
(53, 'user2', 'user2', 'user2', '$2y$10$ADvakvXleYqNHvdijQfrX.OzTnsEwO1orKoI8ofYaFUGmRoA7ijQi', '室内楽・アンサンブル, ジャズ', 1, '2025-01-17 00:34:59');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `userdata_table`
--
ALTER TABLE `userdata_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `userdata_table`
--
ALTER TABLE `userdata_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
