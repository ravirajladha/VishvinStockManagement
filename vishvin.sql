-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 06:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vishvin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `so_pincode` varchar(12) DEFAULT NULL,
  `sd_pincode` varchar(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `project_name`, `user_name`, `password`, `created_by`, `phone`, `so_pincode`, `sd_pincode`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, 'admin', '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', NULL, '1234567890', NULL, NULL, NULL, NULL),
(2, 'Shiva_PH', 'project_head', 'HUGB', NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '1', '9765652399', NULL, NULL, '2023-04-27 01:31:53', '2023-04-27 01:31:53'),
(3, 'Raghu_Inv mana', 'inventory_manager', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '2', '9823009574', NULL, NULL, '2023-04-27 01:33:32', '2023-04-27 01:33:32'),
(4, 'Sumit', 'contractor_manager', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '2', '9008004888', NULL, NULL, '2023-04-27 01:38:14', '2023-04-27 01:38:14'),
(5, 'Ganesh_QCM', 'qc_manager', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '2', '7895584545', NULL, NULL, '2023-04-27 01:39:05', '2023-04-27 01:39:05'),
(6, 'Kaustubh_HESCOMM', 'hescom_manager', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '2', '9874568598', NULL, NULL, '2023-04-27 01:40:01', '2023-04-27 01:40:01'),
(7, 'Raju_BMR', 'bmr', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '2', '9876568256', NULL, NULL, '2023-04-27 01:40:52', '2023-04-27 01:40:52'),
(8, 'Sunil_InvE', 'inventory_executive', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '3', '9876838638', NULL, NULL, '2023-04-27 01:42:19', '2023-04-27 01:42:19'),
(9, 'Hussain_InvR', 'inventory_reporter', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '3', '7887676568', NULL, NULL, '2023-04-27 01:43:12', '2023-04-27 01:43:12'),
(10, 'Guru_FE', 'field_executive', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '4', '9787656756', NULL, NULL, '2023-04-27 01:45:57', '2023-04-27 01:45:57'),
(11, 'Junaid_QCE', 'qc_executive', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '5', '7989839800', NULL, NULL, '2023-04-27 01:47:06', '2023-04-27 01:47:06'),
(12, 'Ruturanjan_AE', 'ae', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '6', '9090909978', '550004', NULL, '2023-04-27 01:57:06', '2023-04-27 01:57:06'),
(13, 'Priya', 'aee', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '6', '8768697870', NULL, '540002', '2023-04-27 02:04:41', '2023-04-27 02:04:41'),
(14, 'Himanshu_AAO', 'aao', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '6', '8778657809', NULL, '540002', '2023-04-27 02:07:45', '2023-04-27 02:07:45'),
(15, 'Guru', 'project_head', 'Hubli', NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '1', '9765652199', NULL, NULL, '2023-04-27 06:21:08', '2023-04-27 06:21:08'),
(16, 'Ramesh_BMR', 'bmr', NULL, NULL, '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '15', '7895588588', NULL, NULL, '2023-04-27 06:25:07', '2023-04-27 06:25:07'),
(17, 'Raghu', 'inventory_manager', NULL, NULL, '$2y$10$jqalr/ntzwc/q99AfET14O/AAuQqNHWSmh1RGlBzFajcPaXWGYy06', '15', '9844402013', NULL, NULL, '2023-04-28 23:04:30', '2023-04-28 23:04:30'),
(18, 'Raju', 'inventory_executive', NULL, NULL, '$2y$10$yLWJ4HszTNY9ZaqdOBObNOFIiAn3TZkR1NG4wJT3WR9v.nmSKVxim', '17', '9900530167', NULL, NULL, '2023-04-28 23:05:54', '2023-04-28 23:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `annexure_1s`
--

CREATE TABLE `annexure_1s` (
  `id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `circle` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `sd_pincode` varchar(255) DEFAULT NULL,
  `so_pincode` varchar(255) DEFAULT NULL,
  `target_to_achieve` varchar(255) DEFAULT NULL,
  `actual_completed` varchar(255) DEFAULT NULL,
  `account_id` varchar(500) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `annexure_3s`
--

CREATE TABLE `annexure_3s` (
  `id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `circle` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `sd_pincode` varchar(255) DEFAULT NULL,
  `so_pincode` varchar(255) DEFAULT NULL,
  `no_of_es_meter_released` varchar(255) DEFAULT NULL,
  `no_of_es_meter_replaced` varchar(255) DEFAULT NULL,
  `account_id` varchar(500) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bmr_downloads`
--

CREATE TABLE `bmr_downloads` (
  `id` int(11) NOT NULL,
  `meter_main_id` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmr_downloads`
--

INSERT INTO `bmr_downloads` (`id`, `meter_main_id`, `created_at`, `updated_at`) VALUES
(4, '1,2', '2023-04-27 06:44:15', '2023-04-27 06:44:15'),
(5, '2', '2023-04-27 06:55:32', '2023-04-27 06:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_details`
--

CREATE TABLE `consumer_details` (
  `id` int(11) NOT NULL,
  `rr_no` varchar(255) DEFAULT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `consumer_name` varchar(255) DEFAULT NULL,
  `consumer_address` text DEFAULT NULL,
  `so_pincode` varchar(10) DEFAULT NULL,
  `sd_pincode` varchar(10) DEFAULT NULL,
  `meter_type` varchar(50) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `tariff` varchar(255) DEFAULT NULL,
  `mrcode` varchar(255) DEFAULT NULL,
  `hescom` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `circle` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `sub_division` varchar(255) DEFAULT NULL,
  `read_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `consumer_details`
--

INSERT INTO `consumer_details` (`id`, `rr_no`, `account_id`, `consumer_name`, `consumer_address`, `so_pincode`, `sd_pincode`, `meter_type`, `latitude`, `longitude`, `tariff`, `mrcode`, `hescom`, `zone`, `circle`, `division`, `section`, `sub_division`, `read_date`) VALUES
(7811, 'KHB.550', '381000', 'D.P.PATIL.', 'P/NO2666 M.M.EXTN BGM. P/NO2666 M.M.EXTN BGM.P/NO2666 M.M.EXTN BGM.', '550007', '540004', '1', '15.8797999', '74.5296661', '5LT2A1-N-SR', '54003901', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-06'),
(7812, 'CLTG5557', '581000', 'SRI.ABDULMAZID.A.MAKANDAR', 'SY.NO.994/A1 SY.NO.994/A1SHIVAJINAGARBGM', '550007', '540004', '1', '15.8657037', '74.5238604', '5LT2A1-N', '54003921', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-02'),
(7813, 'KHB.2782', '1381000', 'ABDULSATTAR.I.KITTUR', 'P/NO.756 CTS.8664/2 SECT5 SHREE NGR BGM P/NO.756 CTS.8664/2 SECT5 SHREENGRBGMP/NO.756 CTS....', '550007', '540004', '1', '0', '0', '5LT2A1-N', '54003902', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7814, 'APMC.584', '1581000', 'ASST EXE ENGR.', 'KSPHC QTRS NO4 KSRP BGM. KSPHCQTRS NO4 KSRP BGM.KSPHCQTRS NO4 KSRP BGM.', '550008', '540004', '1', '15.8948839', '74.5192078', '5LT2A1-N', '54003913', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-01'),
(7815, 'A.1887', '1681000', 'M.R.Birje.', '4856/83 SADASHIV NGR BGM.4856/83 SADASHIV NGR BGM. 4856/83 SadashivNgrBgm.4856/83 SadashivNgrBgm.0', '550008', '540004', '1', '15.8354544', '74.580562', '5LT2A1-N', '54003922', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-06'),
(7816, 'CLTG5278', '2581000', 'PARASHARAM M KANGRALKAR', 'KANBARGI KANBARGIKANBARGI', '550008', '540004', '1', '15.8980807', '74.5487083', '5LT2A1-N', '54003902', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-02'),
(7817, 'AL.4976', '2681000', 'Modin M Killedar', '3985 KAKTIVES GALLI BGM3985 KAKTIVES GALLI BGM 3985KaktivesGalliBgm3985KaktivesGalliBgm0', '550008', '540004', '1', '15.8362065', '74.5761687', '5LT2A1-N', '54003922', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-04'),
(7818, 'ALTG.8817', '3381000', 'DATTATRYA V CHTNIS', 'VITTAL DEV MANDIR VITTALDEVMANDIRPLOT874SC6', '550008', '540004', '1', '15.8826667', '74.534197', '5LT2A1-N', '54003905', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7819, 'ALTG.11866', '3481000', 'SMT.YALLUBAI.S.GONDHALLI', 'CTS.8608 SECT-5 M.M.EXTN BGM CTS.8608 SECT-5 M.M.EXTNBGMCTS.8608 SECT-5 M.M.EXTNBGM', '550008', '540004', '1', '15.8824282', '74.5292432', '5LT2A1-N', '54003902', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7820, '51.559', '3681000', 'E.G.Shahapurkar', '4077 KAKATIVES BGM4077 KAKATIVES BGM 4077 KakativesBgm4077 KakativesBgm0', '550008', '540004', '1', '15.8633921', '74.511452', '5LT2A1-N', '54003919', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-04'),
(7821, '58.608', '4481000', 'K.P.RAYAR', 'CCB.1/2 I ST CROSS VEERBHDRA NGR BGM CCB.1/2 ISTCROSSVEERBHDRANGRBGMCCB.1/2 ISTCROSSVEERBHDR...', '550008', '540004', '1', '15.8689451', '74.5221156', '5LT2A1-N', '54003919', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-01'),
(7822, 'AEH.7103', '4681000', 'Anand.V.Aralikatti', 'P/NO.4886/38 I ST MAIN II ND CROSS SADAHIV NGR BGP/NO.4886/38 I P/No.4886/38IStMainIiNdCrossSa...', '550286', '540004', '1', '15.8671748', '74.5096546', '5LT2A1-N', '54003922', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7823, 'AMP.14943', '4881000', 'SHRI.RIZWAN MUSHTAQAHMED CHANDWALE', 'P/NO.978 WORK SHOP AUTO P/NO.978 WORKSHOPAUTOP/NO.978 WORKSHOPAUTO', '550286', '540004', '1', '15.8020463', '74.4818214', '5LT5A-N', '54003903', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-01'),
(7824, 'CLTG9936', '5481000', 'SAMBHAJI Y HUBLIKAR', 'H NO 2087 HNO2087KAKATI', '550286', '540004', '1', '15.8980541', '74.5483421', '5LT2A1-N', '54003905', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-01'),
(7825, 'AAEH.7988', '5581000', 'SMT.JABINBANU B.SHEKH', 'P.NO.18/A 45/3 SANGAMESH P.NO.18/A45/3SANGAMESHP.NO.18/A45/3SANGAMESH', '550286', '540004', '1', '0', '0', '5LT2A1-N-SR', '54003913', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-03'),
(7826, 'BGM.222A', '5881000', 'Smt. Siddavva S. Talwar', 'H.NO.130 VADDAR CHAVANI BGM.CHILLY MACHINE BGMH.NO.130 VADDAR CH H.No.130VaddarChavaniBgm.Chill...', '550286', '540004', '1', '0', '0', '5LT5A-N', '54003922', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-03'),
(7827, 'KBG.352', '6381000', 'M.K.MALAI', '82/B SHASTRI NGR BGM 82/B SHASTRINGRBGM82/B SHASTRINGRBGM', '550286', '540004', '1', '15.887716', '74.5435819', '5LT2A1-N', '54003901', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-02'),
(7828, '28.923', '6681000', 'Shri Ashok Babu Chavhanh', 'II MAIN CCB.190 10969/19/1A/3 SADASHIVA NAGARBGMII MAIN CCB.190 IiMainCcb.19010969/19/1a/3Sadas...', '550286', '540004', '1', '15.8582978', '74.5168487', '5LT2A1-N', '54003913', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-04'),
(7829, 'CAEH4548', '7381000', 'SMT.SHANTA M DAMBAL', 'PL NO 34/A PLNO34/ARSNO40/2', '550287', '540002', '1', '0', '0', '5LT2A1-N', '54003912', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-01'),
(7830, 'AEH.17303', '7481000', 'P.N.DODDABANANNAVAR', 'PL-796 PL-796BUDALAYOUT', '550287', '540002', '1', '15.8818204', '74.5410186', '5LT2A1-N', '54003903', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-04'),
(7831, 'AAEH.19901', '7581000', 'Smt.Shakuntala.D.Malagi', 'PLNO.3 CTSNO.4857/65/3 SYNO.1367 SADASHIV NAGAR BGPLNO.3 CTSNO.4 Plno.3Ctsno.4857/65/3Syno.1367...', '550287', '540002', '1', '15.8784457', '74.5142851', '5LT2A1-N', '54003909', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7832, '28.2726', '7681000', 'A P Kareppanavar', 'CTS5226 P.NO205 HANUMAN NAGAR BGMCTS5226 P.NO205 HANUMAN NAGAR B Cts5226P.No205HanumanNagarBgmC...', '550287', '540002', '1', '15.8871076', '74.4912104', '5LT2A1-N', '54003910', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7833, 'CAEH2691', '8381000', 'DEEPAK V CHIKORADE', 'PLOT NO .27 PLOTNO.27SY50/B', '550287', '540002', '1', '15.8803714', '74.51412', '5LT2A1-N', '54003909', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-06'),
(7834, 'AAEH.21853', '8581000', 'Dattu Nagappa Hongekar', 'RSNO 1357/A CTSNO 10795/2 NEHRU NAGAR BGM.RSNO 1357/A CTSNO 1079 Rsno1357/ACtsno10795/2NehruNag...', '550287', '540002', '1', '15.8791184', '74.5143289', '5LT2A1-N', '54003917', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7835, '28.2278', '8681000', 'Shyamsundar.S.Pattar', 'IV TH CROSS 4856/105 SADASHIV NGR BGMIV TH CROSS 4856/105 SA IvThCross4856/105 SadashivNgrB...', '550287', '540002', '1', '15.8354544', '74.580562', '5LT2A1-N', '54003922', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-06'),
(7836, 'A.14149', '8781000', 'DASRATH.M.SHINGEGOL', 'P/NO.2688 S.NO.12 M.M.EXTN BGM P/NO.2688 S.NO.12 M.M.EXTNBGMP/NO.2688 S.NO.12 M.M.EXTNBGM', '550287', '540002', '1', '15.8805569', '74.5285679', '5LT3IN', '54003901', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7837, 'CAEH7002', '9381000', 'MANSOORALI S NAIK', 'PL NO 1833 SY NO 570 PLNO1833SYNO570RAMATHIRTHANAGAR', '550004', '540002', '1', '15.889868', '74.5472914', '5LT2A1-N-SR', '54003905', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-03'),
(7838, 'AEH.5142', '9481000', 'SMT.GEETA.K.GUNDAKALLI', 'P/NO.260 SHIVBASAV NAGAR P/NO.260 SHIVBASAVNGRBGMP/NO.260 SHIVBASAV NGR BGM', '550004', '540002', '1', '15.8776906', '74.5230275', '5LT2A1-N', '54003917', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-02'),
(7839, 'CAEH6763', '9581000', 'KAVERI. J. NARASANNAVAR', 'PLNO731 PLNO731SCNO40', '550004', '540002', '1', '15.8763368', '74.4894519', '5LT2A1-N', '54003911', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-06'),
(7840, 'CLTG2407', '9681000', 'THE PRESIDENT K.R.E.TRUST', '7/C 7/CVAIBHAVNAGAR', '550004', '540002', '1', '15.8997942', '74.5210296', '5LT2B1', '54003910', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-01'),
(7841, 'KHB.827', '10381000', 'R A NILAJAGI', 'P.NO2217 P.NO2217P.NO2217', '550004', '540002', '1', '15.8742564', '74.5324576', '5LT2A1-N', '54003903', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-06'),
(7842, 'KBG.942', '10481000', 'SMT SUSHILA G KAREKAR', 'MAHANTESH NAGAR BGM MAHANTESHNAGARBGMMAHANTESHNAGARBGM', '550004', '540002', '1', '15.887716', '74.5435819', '5LT2A1-N', '54003901', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-02'),
(7843, '51.186', '10881000', 'M.G.Madewale', '3965 KAKATIVES ROAD BGM3965 KAKATIVES ROAD BGM 3965KakativesRoadBgm3965KakativesRoadBgm0', '550004', '540002', '1', '15.8946779', '74.5607914', '5LT3IN', '54003921', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-04'),
(7844, '63.508', '11481000', 'SMT.ROSHAN ARA MOHAMMED RAFIQ MULLA', 'P/NO.32 CTS.4814 NEW VEERBHADRA NGR BGM P/NO.32 CTS.4814 NEWVEERBHADRANGRBGMP/NO.32 CTS.48...', '550004', '540002', '1', '15.8728611', '74.5208773', '5LT2A1-N', '54003919', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-02'),
(7845, 'CLTG6239', '11581000', 'MAHAJABEEN K. KHANJADE', 'PL NO.22/A PLNO.22/ASYNO.54/2A', '550004', '540002', '1', '15.8901281', '74.5133816', '5LT2A1-N', '54003911', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-04'),
(7846, 'ACL.24561', '11881000', 'The Chairman', 'LAND RECO.DEPART EMP CO.OP CR SO.COURT BGM.LAND RECO.DEPART EMP LandReco.DepartEmpCo.OpCrSo.Cou...', '550004', '540002', '1', '15.8656533', '74.5143149', '5LT3IN', '54003919', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7847, 'KHB.2533', '12381000', 'VITHAL R. SONNAD', 'P.NO.829 SHREENAGAR S.NO.5 M.M.EXTN BGM P.NO.829SHREENAGARS.NO.5M.M.EXTNBGMP.NO.829SHREENAGARS...', '550004', '540002', '1', '15.8818951', '74.5286646', '5LT2A1-N', '54003903', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05'),
(7848, 'ALTG.12146', '12481000', 'ANSUR.A.SAYYAD', 'H.NO.5 RUKAMINI NGR BGM H.NO.5 RUKAMININGRBGMH.NO.5 RUKAMININGRBGM', '550004', '540002', '1', '15.8767821', '74.5355257', '5LT2A1-N', '54003904', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-07'),
(7849, 'CLTG4115', '12581000', 'PRASHANT G NAIK', 'H NO 839 HNO839KANBARGI', '550004', '540002', '1', '15.8945552', '74.5542007', '5LT2A1-N', '54003902', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-02'),
(7850, 'AEH.4632', '12681000', 'B H MULLUR', 'P.NO170 SYNO226 VIDYA NAGAR P.NO170 SYNO226 BOXITE ROAD BELGAUM', '550004', '540002', '1', '0', '0', '5LT2A1-N', '54003927', '500001', '510002', '520004', '530010', '530010', '540039', '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

CREATE TABLE `contractors` (
  `id` int(11) NOT NULL,
  `auth_id` varchar(255) DEFAULT NULL,
  `contractor_name` varchar(255) DEFAULT NULL,
  `firm_name` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `building_name` varchar(255) DEFAULT NULL,
  `road_name` varchar(255) DEFAULT NULL,
  `cross_name` varchar(255) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `contractor_cell_no` varchar(255) DEFAULT NULL,
  `contractor_email` varchar(255) DEFAULT NULL,
  `pan_no` varchar(255) DEFAULT NULL,
  `gst_no` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`id`, `auth_id`, `contractor_name`, `firm_name`, `house_no`, `building_name`, `road_name`, `cross_name`, `area_name`, `city_name`, `pincode`, `contractor_cell_no`, `contractor_email`, `pan_no`, `gst_no`, `pan`, `gst`, `bank_name`, `bank_branch`, `account_no`, `ifsc_code`, `account_type`, `created_at`) VALUES
(1, '4', 'Rahul_ C', 'Sounce', '3243', 'fdsds', 'fds', 'fds', 'fs', 'fds', '560060', '9099000909', 'C@gmail.com', '1245454844', '23456787653', 'uploads/y8JY1682579294.jpg', 'uploads/0lTb1682579294.jpg', 'ICICI', 'KS', '898326764', 'ICICI0004', 'Current', '2023-04-27 07:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_inventories`
--

CREATE TABLE `contractor_inventories` (
  `id` int(11) NOT NULL,
  `box_id` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `unused_meter_serial_no` varchar(300) DEFAULT NULL,
  `used_meter_serial_no` varchar(300) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `meter_type` varchar(255) DEFAULT NULL,
  `dc_no` varchar(255) DEFAULT NULL,
  `contractor_id` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contractor_inventories`
--

INSERT INTO `contractor_inventories` (`id`, `box_id`, `serial_no`, `unused_meter_serial_no`, `used_meter_serial_no`, `division`, `meter_type`, `dc_no`, `contractor_id`, `created_by`, `created_at`) VALUES
(1, '1', '1212,213', '213', '1212', '530001', '1', '1212', '4', '8', '2023-04-27 08:20:54'),
(2, '1', '213123,123,32', '213123,123', '32', '530001', '1', '232', '4', '8', '2023-04-27 08:21:25'),
(3, '4', '1111', '1111', NULL, '530001', '1', '32', '4', '8', '2023-04-27 13:12:53'),
(4, '7', '34542,45767,656565,545435,54543,454352', '34542,45767,656565,545435,54543,454352', NULL, '530001', '1', '23', '4', '18', '2023-04-29 04:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `error_records`
--

CREATE TABLE `error_records` (
  `id` int(11) NOT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `updated_by_aao` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `error_records`
--

INSERT INTO `error_records` (`id`, `account_id`, `token`, `updated_by_aao`, `created_at`, `updated_at`) VALUES
(2, '12581000', NULL, 1, '2023-04-27 06:49:24', '2023-04-27 06:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `indents`
--

CREATE TABLE `indents` (
  `id` int(11) NOT NULL,
  `box_id` int(11) DEFAULT NULL,
  `so_code` text DEFAULT NULL,
  `meter_quantity` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indents`
--

INSERT INTO `indents` (`id`, `box_id`, `so_code`, `meter_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, '550002', '5', '2023-04-27 02:49:22', '2023-04-27 02:49:22'),
(2, 2, '550013,550014', '1,1', '2023-04-27 02:53:50', '2023-04-27 02:53:50'),
(3, 3, '550007,550008', '2,1', '2023-04-27 07:05:10', '2023-04-27 07:05:10'),
(4, 7, '550007', '6', '2023-04-28 23:08:53', '2023-04-28 23:08:53'),
(5, 9, '550029,550030', '3,2', '2023-04-29 05:07:37', '2023-04-29 05:07:37'),
(6, 10, '550007,550008', '5,3', '2023-04-29 05:23:13', '2023-04-29 05:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(11) NOT NULL,
  `warehouse_id` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT '0',
  `appointed_to` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL,
  `used_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `warehouse_id`, `serial_no`, `status`, `appointed_to`, `created_at`, `created_by`, `used_at`) VALUES
(1, NULL, '32', '0', NULL, '2023-04-27 08:26:20', '10', NULL),
(2, NULL, '1212', '0', NULL, '2023-04-27 09:30:22', '10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inward_genuses`
--

CREATE TABLE `inward_genuses` (
  `id` int(255) NOT NULL,
  `quantity` varchar(250) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `dc_no` varchar(250) DEFAULT NULL,
  `meter_rating` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `box_no` varchar(250) DEFAULT NULL,
  `type_meter` varchar(250) DEFAULT NULL,
  `po_no` varchar(250) DEFAULT NULL,
  `po_date` varchar(250) DEFAULT NULL,
  `invoice` varchar(250) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inward_meter_sl_no_wises`
--

CREATE TABLE `inward_meter_sl_no_wises` (
  `id` int(250) NOT NULL,
  `add_box_no` varchar(250) DEFAULT NULL,
  `from_serial_no` varchar(250) DEFAULT NULL,
  `to_serial_no` varchar(250) DEFAULT NULL,
  `meter_type` varchar(250) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inward_mrt_rejects`
--

CREATE TABLE `inward_mrt_rejects` (
  `id` int(255) NOT NULL,
  `lot_no` varchar(250) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `meter_type` varchar(250) DEFAULT NULL,
  `serial_no` varchar(250) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inward_released_em_meters`
--

CREATE TABLE `inward_released_em_meters` (
  `id` int(255) NOT NULL,
  `sd_pincode` varchar(250) DEFAULT NULL,
  `so_pincode` varchar(250) DEFAULT NULL,
  `contractor_id` varchar(250) DEFAULT NULL,
  `serial_no` varchar(250) DEFAULT NULL,
  `meter_type` varchar(250) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `dc_no` varchar(255) DEFAULT NULL,
  `discharged_at` timestamp NULL DEFAULT NULL,
  `discharged_by` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inward_released_em_meters`
--

INSERT INTO `inward_released_em_meters` (`id`, `sd_pincode`, `so_pincode`, `contractor_id`, `serial_no`, `meter_type`, `division`, `created_by`, `created_at`, `dc_no`, `discharged_at`, `discharged_by`, `status`) VALUES
(1, '540004', 'undefined', '4', '323213', 'Single Phase', NULL, '18', '2023-04-29 04:43:02', NULL, NULL, NULL, '0'),
(2, '540004', 'undefined', '4', '113133', 'Single Phase', NULL, '18', '2023-04-29 04:43:02', NULL, NULL, NULL, '0'),
(3, '540004', 'undefined', '4', '131313', 'Single Phase', NULL, '18', '2023-04-29 04:43:02', NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `meter_mains`
--

CREATE TABLE `meter_mains` (
  `id` int(11) NOT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `image_1_old` varchar(255) DEFAULT NULL,
  `image_2_old` varchar(255) DEFAULT NULL,
  `image_3_old` varchar(255) DEFAULT NULL,
  `meter_make_old` varchar(255) DEFAULT NULL,
  `serial_no_old` varchar(255) DEFAULT NULL,
  `mfd_year_old` varchar(255) DEFAULT NULL,
  `final_reading` varchar(255) DEFAULT NULL,
  `image_1_new` varchar(255) DEFAULT NULL,
  `image_2_new` varchar(255) DEFAULT NULL,
  `meter_make_new` varchar(255) DEFAULT NULL,
  `serial_no_new` varchar(255) DEFAULT NULL,
  `mfd_year_new` varchar(255) DEFAULT NULL,
  `initial_reading_kwh` varchar(255) DEFAULT NULL,
  `initial_reading_kvah` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `qc_remark` varchar(300) DEFAULT NULL,
  `qc_status` varchar(35) NOT NULL DEFAULT '0',
  `qc_updated_by` varchar(255) DEFAULT NULL,
  `qc_updated_at` timestamp NULL DEFAULT NULL,
  `so_status` varchar(10) DEFAULT '0',
  `so_remark` varchar(300) DEFAULT NULL,
  `so_updated_by` varchar(25) DEFAULT NULL,
  `so_updated_at` timestamp NULL DEFAULT NULL,
  `aee_status` varchar(10) DEFAULT '0',
  `aee_remark` varchar(300) DEFAULT NULL,
  `aee_updated_by` varchar(25) DEFAULT NULL,
  `aee_updated_at` timestamp NULL DEFAULT NULL,
  `aao_status` varchar(10) DEFAULT '0',
  `aao_remark` varchar(300) DEFAULT NULL,
  `aao_updated_by` varchar(25) DEFAULT NULL,
  `aao_updated_at` timestamp NULL DEFAULT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `allocation_flag` tinyint(1) NOT NULL DEFAULT 0,
  `download_flag` int(11) DEFAULT 0,
  `error_updated_by_aao` tinyint(1) NOT NULL DEFAULT 0,
  `error_updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `meter_mains`
--

INSERT INTO `meter_mains` (`id`, `account_id`, `image_1_old`, `image_2_old`, `image_3_old`, `meter_make_old`, `serial_no_old`, `mfd_year_old`, `final_reading`, `image_1_new`, `image_2_new`, `meter_make_new`, `serial_no_new`, `mfd_year_new`, `initial_reading_kwh`, `initial_reading_kvah`, `lat`, `lon`, `qc_remark`, `qc_status`, `qc_updated_by`, `qc_updated_at`, `so_status`, `so_remark`, `so_updated_by`, `so_updated_at`, `aee_status`, `aee_remark`, `aee_updated_by`, `aee_updated_at`, `aao_status`, `aao_remark`, `aao_updated_by`, `aao_updated_at`, `delete_flag`, `allocation_flag`, `download_flag`, `error_updated_by_aao`, `error_updated_at`, `created_by`, `created_at`) VALUES
(1, '12681000', 'uploads/w8th1682583256.jpg', 'uploads/FvEO1682583256.jpg', NULL, 'ahjldk', '3214', '2015', '4552', 'uploads/iObq1682583980.jpg', NULL, NULL, '32', '2023', '76798', '798789', '12.9509577', '77.5057861', NULL, '1', '11', '2023-04-27 02:59:08', '1', NULL, '12', '2023-04-27 03:15:19', '1', NULL, '13', '2023-04-27 03:16:05', '1', NULL, '14', '2023-04-27 03:16:14', 0, 0, 1, 0, NULL, '10', '2023-04-27 07:49:41'),
(2, '12581000', 'uploads/qNjh1682587760.jpg', 'uploads/JsOQ1682587760.jpg', NULL, '2015', '12345', '2015', '123456', 'uploads/BLvH1682588321.jpg', 'uploads/C7sl1682588321.jpg', NULL, '1212', '2023', '01', '30', '12.92452004579874', '77.48419630371316', NULL, '1', '11', '2023-04-27 04:09:53', '1', NULL, '12', '2023-04-27 04:10:17', '1', NULL, '13', '2023-04-27 04:10:40', '1', NULL, '14', '2023-04-27 04:11:07', 0, 0, 2, 0, '2023-04-27 06:54:55', '10', '2023-04-27 09:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `outward_installations`
--

CREATE TABLE `outward_installations` (
  `id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `subdivision_name` varchar(255) DEFAULT NULL,
  `section_name` varchar(255) DEFAULT NULL,
  `meter_type` varchar(255) DEFAULT NULL,
  `contractor_name` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `dc_no` varchar(255) DEFAULT NULL,
  `box_no` varchar(255) DEFAULT NULL,
  `from_serial_no` varchar(255) DEFAULT NULL,
  `to_serial_no` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outward_mrts`
--

CREATE TABLE `outward_mrts` (
  `id` int(11) NOT NULL,
  `lot_no` varchar(255) DEFAULT NULL,
  `meter_type` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `dc_no` varchar(255) DEFAULT NULL,
  `dc_date` date DEFAULT NULL,
  `box_no` varchar(255) DEFAULT NULL,
  `from_serial_no` varchar(255) DEFAULT NULL,
  `to_serial_no` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outward_released_em_meters`
--

CREATE TABLE `outward_released_em_meters` (
  `id` int(11) NOT NULL,
  `division_store_name` varchar(255) DEFAULT NULL,
  `vishvin_dc_no` varchar(255) DEFAULT NULL,
  `dc_date` date DEFAULT NULL,
  `sl_no` varchar(255) DEFAULT NULL,
  `meter_type` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `successful_records`
--

CREATE TABLE `successful_records` (
  `id` int(11) NOT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `successful_records`
--

INSERT INTO `successful_records` (`id`, `account_id`, `token`, `created_at`, `updated_at`) VALUES
(3, '12681000', 'qYXLB2rwjs', '2023-04-27 06:45:04', '2023-04-27 06:45:04'),
(5, '12581000', 'EbJVOHBWGY', '2023-04-27 06:56:04', '2023-04-27 06:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_meters`
--

CREATE TABLE `warehouse_meters` (
  `id` int(11) NOT NULL,
  `box_id` varchar(20) DEFAULT NULL,
  `meter_serial_no` varchar(500) DEFAULT NULL,
  `unused_meter_serial_no` varchar(500) DEFAULT NULL,
  `used_meter_serial_no` varchar(500) DEFAULT NULL,
  `meter_type` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `lot_no` varchar(255) DEFAULT NULL,
  `count` varchar(255) DEFAULT NULL,
  `complete_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warehouse_meters`
--

INSERT INTO `warehouse_meters` (`id`, `box_id`, `meter_serial_no`, `unused_meter_serial_no`, `used_meter_serial_no`, `meter_type`, `division`, `lot_no`, `count`, `complete_status`, `created_by`, `created_at`) VALUES
(1, NULL, '1212,213,213123,123,32', NULL, '1212,213,213123,123,32', '1', '530001', '1', NULL, 1, '8', '2023-04-27 08:18:32'),
(2, NULL, '3223,3424', '3223,3424', NULL, '1', '530003', '12', NULL, 1, '8', '2023-04-27 08:23:19'),
(3, NULL, '2332,234,324', '2332,234,324', NULL, '1', '530001', '32', NULL, 1, '8', '2023-04-27 12:34:19'),
(4, NULL, '1111,11223', '11223', '1111', '1', '530001', '121', NULL, 1, '8', '2023-04-27 12:35:45'),
(5, NULL, '121179,4324,34243234', '121179,4324,34243234', NULL, '1', '530001', '4', NULL, 1, '8', '2023-04-27 12:48:45'),
(6, NULL, NULL, NULL, NULL, '1', '530001', '1', NULL, 1, '8', '2023-04-27 13:06:49'),
(7, NULL, '34542,45767,656565,545435,54543,454352', NULL, '34542,45767,656565,545435,54543,454352', '1', '530001', '1', NULL, 1, '18', '2023-04-29 04:36:35'),
(8, NULL, '12333,33444', '12333,33444', NULL, '1', '530001', '1', NULL, 0, '18', '2023-04-29 04:39:09'),
(9, NULL, '123334,87,55,7878,76', '123334,87,55,7878,76', NULL, '1', '530005', '143', NULL, 1, '18', '2023-04-29 10:31:31'),
(10, NULL, '6235308,676,99,9,866,969699,78,086', '6235308,676,99,9,866,969699,78,086', NULL, '1', '530001', '10', NULL, 1, '18', '2023-04-29 10:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `zone_codes`
--

CREATE TABLE `zone_codes` (
  `sl_no` int(255) NOT NULL,
  `package` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `div_code` varchar(255) DEFAULT NULL,
  `sub_division` varchar(255) DEFAULT NULL,
  `sd_code` varchar(255) DEFAULT NULL,
  `section_office` varchar(255) DEFAULT NULL,
  `so_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `zone_codes`
--

INSERT INTO `zone_codes` (`sl_no`, `package`, `division`, `div_code`, `sub_division`, `sd_code`, `section_office`, `so_code`) VALUES
(1, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-1, Hubballi', '540004', 'Unit-1, Keshwapur', '550007'),
(2, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-1, Hubballi', '540004', 'Unit-2, Vishweshvarnagar', '550008'),
(3, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-1, Hubballi', '540004', 'Gopanakoppa', '550286'),
(4, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-2, Hubballi', '540002', 'Unit-1, Chanakyapuri', '550003'),
(5, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-2, Hubballi', '540002', 'Siddarudanagar', '550287'),
(6, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-2, Hubballi', '540002', 'Unit-2, Mantur Road', '550004'),
(7, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-2, Hubballi', '540002', 'Unit-3, Bankapurachouak', '550009'),
(8, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-3, Hubballi', '540001', 'Unit-1, Hosura', '550001'),
(9, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-3, Hubballi', '540001', 'Unit-3, Grid', '550010'),
(10, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-4, Hubballi', '540076', 'Navanagar', '550002'),
(11, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-4, Hubballi', '540076', 'Unkal', '550289'),
(12, 'HDGU', 'Urban Division, Hubballi', '530001', 'City Sub-Division-4, Hubballi', '540076', 'Tarihal', '550288'),
(13, 'HDGU', 'Urban Division, Dharwad', '530003', 'City Sub-Division-1, Dharwad', '540006', 'Sapthapur-1', '550013'),
(14, 'HDGU', 'Urban Division, Dharwad', '530003', 'City Sub-Division-1, Dharwad', '540006', 'Vidhyagiri-2', '550014'),
(15, 'HDGU', 'Urban Division, Dharwad', '530003', 'City Sub-Division-1, Dharwad', '540006', 'Satturu-3', '550015'),
(16, 'HDGU', 'Urban Division, Dharwad', '530003', 'City Sub-Division-2, Dharwad', '540008', 'Saidapur-4', '550020'),
(17, 'HDGU', 'Urban Division, Dharwad', '530003', 'City Sub-Division-2, Dharwad', '540008', 'Vijaya Takies-5', '550019'),
(18, 'HDGU', 'Urban Division, Dharwad', '530003', 'City Sub-Division-2, Dharwad', '540008', 'Sadhanakeri-6', '550018'),
(19, 'HDGU', 'Gadaga', '530005', 'City Sub-Division, Gadaga', '540011', 'Unit-1, Mulgund Naka', '550029'),
(20, 'HDGU', 'Gadaga', '530005', 'City Sub-Division, Gadaga', '540011', 'Unit-2, MASARI-1', '550030'),
(21, 'HDGU', 'Gadaga', '530005', 'City Sub-Division, Gadaga', '540011', 'Unit-3, MASARI-2', '550031'),
(22, 'HDGU', 'Gadaga', '530005', 'City Sub-Division, Gadaga', '540011', 'Unit-4, BETIGERI', '550032'),
(23, 'BVU', 'Urban Division, Belagavi', '530010', 'City Sub-Division-1, Belagavi', '540037', 'Belagavi-2', '550131'),
(24, 'BVU', 'Urban Division, Belagavi', '530010', 'City Sub-Division-1, Belagavi', '540037', 'Belagavi-3', '550132'),
(25, 'BVU', 'Urban Division, Belagavi', '530010', 'City Sub-Division-2, Belagavi', '540038', 'Belagavi-5', '550133'),
(26, 'BVU', 'Urban Division, Belagavi', '530010', 'City Sub-Division-2, Belagavi', '540038', 'Belagavi-6', '550134'),
(27, 'BVU', 'Urban Division, Belagavi', '530010', 'City Sub-Division-2, Belagavi', '540038', 'Belagavi-7', '550135'),
(28, 'BVU', 'Urban Division, Belagavi', '530010', 'City Sub-Division-2, Belagavi', '540038', 'Udyambag', '550295'),
(29, 'BVU', 'Urban Division, Belagavi', '530010', 'City Sub-Division-3, Belagavi', '540039', 'Sangameshwar Nagar', '550294'),
(30, 'BVU', 'Urban Division, Belagavi', '530010', 'City Sub-Division-3, Belagavi', '540039', 'Belagavi-1', '550130'),
(31, 'BVU', 'Urban Division, Belagavi', '530010', 'City Sub-Division-3, Belagavi', '540039', 'Belagavi-4, Mahantesh Nagar', '550136'),
(32, 'BVU', 'Vijayapur', '530016', 'City Sub-Division-1, Vijayapur', '540055', 'Vijayapur-1', '550202'),
(33, 'BVU', 'Vijayapur', '530016', 'City Sub-Division-1, Vijayapur', '540055', 'Bhootnal', '550291'),
(34, 'BVU', 'Vijayapur', '530016', 'City Sub-Division-1, Vijayapur', '540055', 'Shivagiri', '550290'),
(35, 'BVU', 'Vijayapur', '530016', 'City Sub-Division-1, Vijayapur', '540055', 'Vijayapur-2', '550203'),
(36, 'BVU', 'Vijayapur', '530016', 'City Sub-Division-2, Vijayapur', '540056', 'Vijayapur-3', '550204'),
(37, 'BVU', 'Vijayapur', '530016', 'City Sub-Division-2, Vijayapur', '540056', 'Golgumbas', '550292'),
(38, 'BVU', 'Vijayapur', '530016', 'City Sub-Division-2, Vijayapur', '540056', 'Vijayapur-4', '550205'),
(39, 'BVU', 'Vijayapur', '530016', 'City Sub-Division-2, Vijayapur', '540056', 'Navaraspur', '550293');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auths_username_unique` (`user_name`);

--
-- Indexes for table `annexure_1s`
--
ALTER TABLE `annexure_1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annexure_3s`
--
ALTER TABLE `annexure_3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bmr_downloads`
--
ALTER TABLE `bmr_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_details`
--
ALTER TABLE `consumer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_inventories`
--
ALTER TABLE `contractor_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_records`
--
ALTER TABLE `error_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indents`
--
ALTER TABLE `indents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inward_genuses`
--
ALTER TABLE `inward_genuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inward_meter_sl_no_wises`
--
ALTER TABLE `inward_meter_sl_no_wises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inward_mrt_rejects`
--
ALTER TABLE `inward_mrt_rejects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inward_released_em_meters`
--
ALTER TABLE `inward_released_em_meters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meter_mains`
--
ALTER TABLE `meter_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outward_installations`
--
ALTER TABLE `outward_installations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outward_mrts`
--
ALTER TABLE `outward_mrts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outward_released_em_meters`
--
ALTER TABLE `outward_released_em_meters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `successful_records`
--
ALTER TABLE `successful_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_meters`
--
ALTER TABLE `warehouse_meters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone_codes`
--
ALTER TABLE `zone_codes`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `annexure_1s`
--
ALTER TABLE `annexure_1s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annexure_3s`
--
ALTER TABLE `annexure_3s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bmr_downloads`
--
ALTER TABLE `bmr_downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consumer_details`
--
ALTER TABLE `consumer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7851;

--
-- AUTO_INCREMENT for table `contractors`
--
ALTER TABLE `contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contractor_inventories`
--
ALTER TABLE `contractor_inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `error_records`
--
ALTER TABLE `error_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `indents`
--
ALTER TABLE `indents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inward_genuses`
--
ALTER TABLE `inward_genuses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inward_meter_sl_no_wises`
--
ALTER TABLE `inward_meter_sl_no_wises`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inward_mrt_rejects`
--
ALTER TABLE `inward_mrt_rejects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inward_released_em_meters`
--
ALTER TABLE `inward_released_em_meters`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meter_mains`
--
ALTER TABLE `meter_mains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `outward_installations`
--
ALTER TABLE `outward_installations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outward_mrts`
--
ALTER TABLE `outward_mrts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outward_released_em_meters`
--
ALTER TABLE `outward_released_em_meters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `successful_records`
--
ALTER TABLE `successful_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warehouse_meters`
--
ALTER TABLE `warehouse_meters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zone_codes`
--
ALTER TABLE `zone_codes`
  MODIFY `sl_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
