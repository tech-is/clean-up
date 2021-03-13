-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 3 月 07 日 07:27
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `data`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL COMMENT 'アイテムid',
  `user_id` int(11) NOT NULL COMMENT 'ユーザid',
  `room_id` int(11) NOT NULL COMMENT '部屋id',
  `place_id` int(11) NOT NULL COMMENT '収納場所id',
  `item_name` text NOT NULL COMMENT 'アイテム名',
  `created_at` datetime NOT NULL COMMENT '登録日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL COMMENT '収納場所id',
  `user_id` int(11) NOT NULL COMMENT 'ユーザid',
  `room_id` int(11) NOT NULL COMMENT '部屋id',
  `name` varchar(32) NOT NULL COMMENT '収納場所名',
  `info` text NOT NULL COMMENT '補足情報'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL COMMENT '部屋id',
  `user_id` int(11) NOT NULL COMMENT 'ユーザid',
  `name` text NOT NULL COMMENT '部屋名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'ユーザid',
  `name` varchar(32) NOT NULL COMMENT '名前',
  `kana` varchar(32) NOT NULL COMMENT 'フリガナ',
  `mail` varchar(32) NOT NULL COMMENT 'メールアドレス',
  `postcode` char(7) NOT NULL COMMENT '郵便番号',
  `prefecture` varchar(32) NOT NULL COMMENT '都道府県',
  `address` varchar(32) NOT NULL COMMENT '住所',
  `phone_number` int(12) NOT NULL COMMENT '電話番号',
  `fax_number` int(12) NOT NULL COMMENT 'FAX番号',
  `update_at` datetime NOT NULL COMMENT '最終更新日',
  `created_at` datetime NOT NULL COMMENT 'サービス開始日',
  `password` char(255) NOT NULL COMMENT 'パスワード'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='利用者の情報を管理する';

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'アイテムid';

--
-- テーブルのAUTO_INCREMENT `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '収納場所id';

--
-- テーブルのAUTO_INCREMENT `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '部屋id';

--
-- テーブルのAUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ユーザid';
