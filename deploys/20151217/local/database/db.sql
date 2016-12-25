-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2016 at 02:49 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3ng`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit`
--

CREATE TABLE `tbl_audit` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `information` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `params` text COLLATE utf8_unicode_ci,
  `uuid` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `application_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `version` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup`
--

CREATE TABLE `tbl_lookup` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(10) UNSIGNED DEFAULT NULL,
  `uuid` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `application_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `version` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `application_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `version` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`id`, `name`, `description`, `uuid`, `application_key`, `added_at`, `added_by`, `edited_at`, `edited_by`, `is_deleted`, `version`) VALUES
(1, 'Backend.Account', 'Allows you to manage users, roles and permissions.', '40401dee-a439-3d2c-a695-d21cb93fce49', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(2, 'Backend.Account.Permission', 'Allows you to manage permissions.', '1d973eb8-b70f-3198-a3d8-a6c921ba331f', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(3, 'Backend.Account.Role', 'Allows you to manage roles.', 'e5c886b9-0e4d-3cb5-8ea0-a67d55c7a07b', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(4, 'Backend.Account.User', 'Allows you to manage users.', 'f8b08621-bded-331b-8c22-e6cbcd6e3e49', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(5, 'Backend.System', 'Allows you to manage audit trails, lookup values and settings.', '6088308f-a144-3c73-82e3-66884f112669', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(6, 'Backend.System.Audit', 'Allows you to manage audit trails.', 'd2d58bf6-bff8-34c0-8599-4418b528c637', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(7, 'Backend.System.Lookup', 'Allows you to manage lookup values.', '80ca0c3f-f4e3-3e53-aa2a-e1b14bbe4a82', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(8, 'Backend.System.Setting', 'Allows you to manage settings.', '01e736f1-3ae7-3390-af7f-7e81ef310cd1', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `application_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `version` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`, `uuid`, `application_key`, `added_at`, `added_by`, `edited_at`, `edited_by`, `is_deleted`, `version`) VALUES
(1, 'Administrator', 'Members of the Administrator role have the largest amount of default permissions and the ability to change their own permissions.', '27aa92a8-a287-3603-9274-a5804822de98', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(2, 'Guest', NULL, 'c7e71e74-5e7e-33a5-8310-96b018dbcf58', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(3, 'Power User', NULL, '1a0c9040-81a5-3f45-a12d-60c38d15098c', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(4, 'User', NULL, 'f0c9b56f-87cd-3bae-a33d-1af633752a61', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_permission`
--

CREATE TABLE `tbl_role_permission` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role_permission`
--

INSERT INTO `tbl_role_permission` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(3, 1),
(3, 4),
(3, 5),
(3, 6),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `application_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `version` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `name`, `value`, `description`, `uuid`, `application_key`, `added_at`, `added_by`, `edited_at`, `edited_by`, `is_deleted`, `version`) VALUES
(1, 'copyright', 'Copyright (c) 2016 ntd1712', NULL, '367cfb2c-8965-330f-b8ef-a4fbbb3cefcc', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(2, 'title', 'Admin Panel', NULL, '4175f6c3-4ea9-3087-ba2c-375914389c37', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(3, 'defaultRoute', 'setting.index', NULL, 'af079e06-0462-3ba1-8723-f39fd55951da', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(4, 'imageAllowedExt', 'gif,jpeg,jpg,png', NULL, '6d1eecbc-b041-3082-9187-4e37f9da7fbd', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(5, 'imageMaxSize', '2097152', NULL, '7c775d0d-3c7d-3555-bde5-16a3268fd544', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(6, 'dateFormat', 'Y-m-d', NULL, 'dfc7510c-18c0-3d74-bdd6-559d4e3bbd40', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(7, 'timeFormat', 'H:i:s', NULL, '49d40a1b-4405-3b71-973a-5bb934ba903b', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(8, 'itemsPerPage', '10', NULL, '971b93d6-41c4-3b37-999c-7ea3e51cb1f9', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(9, 'maxItemsPerPage', '100', NULL, '332fe5df-b11a-363c-b3b3-e306d8614033', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(10, 'minSearchChars', '4', NULL, '60b0ad5e-e9c2-3009-9f1d-6296ed3e0034', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_expiry_date` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile` text COLLATE utf8_unicode_ci COMMENT '(DC2Type:json_array)',
  `uuid` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `application_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `version` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `password_expiry_date`, `remember_token`, `open_id`, `locale`, `timezone`, `profile`, `uuid`, `application_key`, `added_at`, `added_by`, `edited_at`, `edited_by`, `is_deleted`, `version`) VALUES
(1, 'sysadmin', 'sysadmin@example.com', '$2y$10$cxl/J97B/xk7VOd4rsNzZ.73/3vfy4U3zRKLT0AAPk3vFLcTkNChu', NULL, 'Una7LXpxcL', NULL, NULL, NULL, '{"DisplayName":"Abbigail Orn Jr.","Photo":"\\/uploads\\/no_photo.jpg","About":"Voluptatum nulla fuga similique deserunt. Necessitatibus et molestias repellendus. Et est facere nostrum neque omnis ex."}', 'cb5ae481-f810-3c2b-93c5-fdcf20b8a57a', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1),
(2, 'demo', 'demo@example.com', '$2y$10$hze72cSSxOXV0yJC0cn.1u9IALaxaC0ln.PqKS6F8q6ZIitxiczeS', NULL, 'Y53K5J8TYR', NULL, NULL, NULL, '{"DisplayName":"Tristian Auer II","Photo":"\\/uploads\\/no_photo.jpg","About":"Soluta aperiam ut iure voluptates architecto. Ut impedit accusamus dolorem aut voluptas at. Eveniet aspernatur sint illo vero. Dolorem dolor unde mollitia rerum odit velit omnis."}', 'bda03e91-6da4-3728-8508-7e40355e7dd6', 'uV3tbdxO12KrSJgN7mjbOQvXX69Wn3oL', '2016-12-25 11:46:41', NULL, '2016-12-25 11:46:41', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `is_primary` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`user_id`, `role_id`, `is_primary`) VALUES
(1, 1, 1),
(2, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_audit`
--
ALTER TABLE `tbl_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `IDX_B151AD08D60322AC` (`role_id`),
  ADD KEY `IDX_B151AD08FED90CCA` (`permission_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `IDX_6860A930A76ED395` (`user_id`),
  ADD KEY `IDX_6860A930D60322AC` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_audit`
--
ALTER TABLE `tbl_audit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  ADD CONSTRAINT `FK_B151AD08D60322AC` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`),
  ADD CONSTRAINT `FK_B151AD08FED90CCA` FOREIGN KEY (`permission_id`) REFERENCES `tbl_permission` (`id`);

--
-- Constraints for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD CONSTRAINT `FK_6860A930A76ED395` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `FK_6860A930D60322AC` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
