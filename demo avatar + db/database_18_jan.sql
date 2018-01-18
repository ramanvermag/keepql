-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2018 at 12:11 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2018-01-11 22:48:01', '2018-01-11 22:48:01'),
(2, NULL, 2, 'Category 2', 'category-2', '2018-01-11 22:48:15', '2018-01-11 22:48:15'),
(3, NULL, 3, 'Category 3', 'category-3', '2018-01-11 22:48:28', '2018-01-11 22:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland Islands'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei Darussalam'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Caribbean Netherlands '),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos (Keeling) Islands'),
(40, 'CD', 'Congo, Democratic Republic of'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Côte D’Ivoire'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curaçao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia, Federated States of'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Lao People’s Democratic Republic'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint-Martin (France)'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macau'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'The Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'St. Pierre and Miquelon'),
(181, 'PN', 'Pitcairn'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestinian Territory, Occupied'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Reunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russian Federation'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen Islands'),
(202, 'SK', 'Slovakia (Slovak Republic)'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'Sao Tome and Principe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Saint-Martin (Pays-Bas)'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'Timor-Leste'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'United States Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna Islands'),
(244, 'WS', 'Samoa'),
(245, 'YE', 'Yemen'),
(246, 'YT', 'Mayotte'),
(247, 'ZA', 'South Africa'),
(248, 'ZM', 'Zambia'),
(249, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(3, 1, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(4, 1, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(5, 1, 'excerpt', 'text_area', 'excerpt', 0, 0, 1, 1, 1, 1, NULL, 5),
(6, 1, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(7, 1, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(8, 1, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}', 8),
(9, 1, 'meta_description', 'text_area', 'meta_description', 0, 0, 1, 1, 1, 1, NULL, 9),
(10, 1, 'meta_keywords', 'text_area', 'meta_keywords', 0, 0, 1, 1, 1, 1, NULL, 10),
(11, 1, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(12, 1, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, NULL, 12),
(13, 1, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, NULL, 13),
(14, 2, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(15, 2, 'author_id', 'text', 'author_id', 1, 0, 0, 0, 0, 0, '', 2),
(16, 2, 'title', 'text', 'title', 1, 1, 1, 1, 1, 1, '', 3),
(17, 2, 'excerpt', 'text_area', 'excerpt', 1, 0, 1, 1, 1, 1, '', 4),
(18, 2, 'body', 'rich_text_box', 'body', 1, 0, 1, 1, 1, 1, '', 5),
(19, 2, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"}}', 6),
(20, 2, 'meta_description', 'text', 'meta_description', 1, 0, 1, 1, 1, 1, '', 7),
(21, 2, 'meta_keywords', 'text', 'meta_keywords', 1, 0, 1, 1, 1, 1, '', 8),
(22, 2, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(23, 2, 'created_at', 'timestamp', 'created_at', 1, 1, 1, 0, 0, 0, '', 10),
(24, 2, 'updated_at', 'timestamp', 'updated_at', 1, 0, 0, 0, 0, 0, '', 11),
(25, 2, 'image', 'image', 'image', 0, 1, 1, 1, 1, 1, '', 12),
(26, 3, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(27, 3, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
(28, 3, 'email', 'text', 'email', 1, 1, 1, 1, 1, 1, '', 3),
(29, 3, 'password', 'password', 'password', 0, 0, 0, 1, 1, 0, '', 4),
(30, 3, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}', 10),
(31, 3, 'remember_token', 'text', 'remember_token', 0, 0, 0, 0, 0, 0, '', 5),
(32, 3, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 6),
(33, 3, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
(34, 3, 'avatar', 'image', 'avatar', 0, 1, 1, 1, 1, 1, '', 8),
(35, 5, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(36, 5, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
(37, 5, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(38, 5, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(39, 4, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(40, 4, 'parent_id', 'select_dropdown', 'parent_id', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(41, 4, 'order', 'text', 'order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(42, 4, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 4),
(43, 4, 'slug', 'text', 'slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(44, 4, 'created_at', 'timestamp', 'created_at', 0, 0, 1, 0, 0, 0, '', 6),
(45, 4, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
(46, 6, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(47, 6, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(48, 6, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(49, 6, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(50, 6, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
(51, 1, 'seo_title', 'text', 'seo_title', 0, 1, 1, 1, 1, 1, NULL, 14),
(52, 1, 'featured', 'checkbox', 'featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(53, 3, 'role_id', 'text', 'role_id', 1, 1, 1, 1, 1, 1, '', 9),
(54, 1, 'tags', 'text', 'Tags', 0, 1, 1, 1, 1, 1, NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `created_at`, `updated_at`) VALUES
(1, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', NULL, NULL, 1, 0, '2018-01-11 22:43:39', '2018-01-11 23:37:30'),
(2, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, '2018-01-11 22:43:39', '2018-01-11 22:43:39'),
(3, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', '', '', 1, 0, '2018-01-11 22:43:39', '2018-01-11 22:43:39'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, '2018-01-11 22:43:39', '2018-01-11 22:43:39'),
(5, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, '2018-01-11 22:43:39', '2018-01-11 22:43:39'),
(6, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, '2018-01-11 22:43:39', '2018-01-11 22:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-01-11 22:43:41', '2018-01-11 22:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2018-01-11 22:43:41', '2018-01-11 22:43:41', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 4, '2018-01-11 22:43:41', '2018-01-11 23:45:16', 'voyager.media.index', NULL),
(3, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 5, '2018-01-11 22:43:41', '2018-01-11 23:45:16', 'voyager.posts.index', NULL),
(4, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2018-01-11 22:43:41', '2018-01-11 22:43:41', 'voyager.users.index', NULL),
(5, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 7, '2018-01-11 22:43:41', '2018-01-11 23:45:16', 'voyager.categories.index', NULL),
(6, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 6, '2018-01-11 22:43:41', '2018-01-11 23:45:16', 'voyager.pages.index', NULL),
(7, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2018-01-11 22:43:41', '2018-01-11 22:43:41', 'voyager.roles.index', NULL),
(8, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 8, '2018-01-11 22:43:41', '2018-01-11 23:45:16', NULL, NULL),
(9, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 8, 1, '2018-01-11 22:43:41', '2018-01-11 23:45:16', 'voyager.menus.index', NULL),
(10, 1, 'Database', '', '_self', 'voyager-data', NULL, 8, 2, '2018-01-11 22:43:41', '2018-01-11 23:45:16', 'voyager.database.index', NULL),
(11, 1, 'Compass', '/admin/compass', '_self', 'voyager-compass', NULL, 8, 3, '2018-01-11 22:43:41', '2018-01-11 23:45:16', NULL, NULL),
(12, 1, 'Hooks', '/admin/hooks', '_self', 'voyager-hook', NULL, 8, 4, '2018-01-11 22:43:41', '2018-01-11 23:45:16', NULL, NULL),
(13, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 9, '2018-01-11 22:43:41', '2018-01-11 23:45:16', 'voyager.settings.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_add_permission_group_id_to_permissions_table', 1),
(17, '2017_01_15_000000_create_permission_groups_table', 1),
(18, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(19, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(20, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(21, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(22, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(23, '2017_08_05_000000_add_group_to_settings_table', 1),
(24, '2017_11_01_100956_social_user', 1),
(25, '2017_11_28_204651_postcatrel_table', 1),
(26, '2018_01_11_110233_create_answers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`, `permission_group_id`) VALUES
(1, 'browse_admin', NULL, '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(2, 'browse_database', NULL, '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(3, 'browse_media', NULL, '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(4, 'browse_compass', NULL, '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(5, 'browse_menus', 'menus', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(6, 'read_menus', 'menus', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(7, 'edit_menus', 'menus', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(8, 'add_menus', 'menus', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(9, 'delete_menus', 'menus', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(10, 'browse_pages', 'pages', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(11, 'read_pages', 'pages', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(12, 'edit_pages', 'pages', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(13, 'add_pages', 'pages', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(14, 'delete_pages', 'pages', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(15, 'browse_roles', 'roles', '2018-01-11 22:43:41', '2018-01-11 22:43:41', NULL),
(16, 'read_roles', 'roles', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(17, 'edit_roles', 'roles', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(18, 'add_roles', 'roles', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(19, 'delete_roles', 'roles', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(20, 'browse_users', 'users', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(21, 'read_users', 'users', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(22, 'edit_users', 'users', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(23, 'add_users', 'users', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(24, 'delete_users', 'users', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(25, 'browse_posts', 'posts', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(26, 'read_posts', 'posts', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(27, 'edit_posts', 'posts', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(28, 'add_posts', 'posts', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(29, 'delete_posts', 'posts', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(30, 'browse_categories', 'categories', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(31, 'read_categories', 'categories', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(32, 'edit_categories', 'categories', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(33, 'add_categories', 'categories', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(34, 'delete_categories', 'categories', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(35, 'browse_settings', 'settings', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(36, 'read_settings', 'settings', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(37, 'edit_settings', 'settings', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(38, 'add_settings', 'settings', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL),
(39, 'delete_settings', 'settings', '2018-01-11 22:43:42', '2018-01-11 22:43:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tags` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `tags`) VALUES
(1, 1, 1, 'My first Post', NULL, NULL, '<h2><strong>This is my first Post.</strong></h2>', 'posts/January2018/EZr41kzIAcy03lTkbEk1.jpg', 'my-first-post', NULL, NULL, 'PUBLISHED', 1, '2018-01-11 22:50:25', '2018-01-11 23:58:32', 'tag1, tag2,tag3,tag4'),
(2, 1, 2, 'Basic Routing in Laravel', NULL, NULL, '<p>All Laravel routes are defined in the <code class=\" language-php\">app<span class=\"token operator\">/</span>Http<span class=\"token operator\">/</span>routes<span class=\"token punctuation\">.</span>php</code> file, which is automatically loaded by the framework. The most basic Laravel routes simply accept a URI and a <code class=\" language-php\">Closure</code>, providing a very simple and expressive method of defining routes:</p>\r\n<pre class=\" language-php\"><code class=\" language-php\"><span class=\"token scope\">Route<span class=\"token punctuation\">::</span></span><span class=\"token function\">get<span class=\"token punctuation\">(</span></span><span class=\"token string\">\'foo\'</span><span class=\"token punctuation\">,</span> <span class=\"token keyword\">function</span> <span class=\"token punctuation\">(</span><span class=\"token punctuation\">)</span> <span class=\"token punctuation\">{</span>\r\n    <span class=\"token keyword\">return</span> <span class=\"token string\">\'Hello World\'</span><span class=\"token punctuation\">;</span>\r\n<span class=\"token punctuation\">}</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span></code></pre>', 'posts/January2018/i0W6vb3AlYQAcbsp1TKD.jpg', 'basic-routing-in-laravel', NULL, NULL, 'PUBLISHED', 0, '2018-01-11 22:52:10', '2018-01-11 23:58:15', 'laravel,codeigniter,php'),
(3, 2, 1, 'testing', NULL, NULL, '<p>testing</p>', 'posts/January2018/s5ecAPRceKZLS512piFa.jpg', 'testing', NULL, NULL, 'PUBLISHED', 0, '2018-01-13 00:07:29', '2018-01-13 01:03:55', 'jquery'),
(4, 1, 1, 'test', 'vb vb', NULL, '<p>description</p>', '', 'test', NULL, NULL, 'DRAFT', 0, '2018-01-16 23:34:00', '2018-01-18 02:18:21', NULL),
(5, 1, 1, 'gvn gfvngf', NULL, NULL, 'vnfgn', '', 'gvn-gfvngf', NULL, NULL, 'DRAFT', 0, '2018-01-16 23:36:06', '2018-01-16 23:36:06', 'gfcnxgf'),
(6, 1, 2, 'fvzfdv', NULL, NULL, 'fvf', '', 'fvzfdv', NULL, NULL, 'PUBLISHED', 0, '2018-01-16 23:37:04', '2018-01-16 23:37:04', 'fdv'),
(7, 1, 2, 'fdhg bvfc', NULL, NULL, 'sfbfd', 'posts/January2018/1516165748.jpg', 'fdhg- bfbvf', NULL, NULL, 'PUBLISHED', 0, '2018-01-16 23:39:08', '2018-01-16 23:39:08', 'fdxvbfd'),
(8, 1, 2, 'lorem ipsum Published', 'lorem ipsum Published', NULL, '<p>lorem ipsum Published</p>', 'posts/January2018/1516260294.jpg', 'lorem-ipsum-published', 'lorem ipsum Published lorem ipsum Publishedlorem ipsum Published', 'lorem ipsum Published', 'PUBLISHED', 0, '2018-01-16 23:43:19', '2018-01-18 01:55:07', 'vfdcdf,sdv,dvd'),
(9, 1, 1, 'Basic Routes in Laravel', NULL, NULL, 'sxzcaASZCFsdvds dfrgrf', 'posts/January2018/1516166064.jpg', 'basic-routes-in-laravel', NULL, NULL, 'PUBLISHED', 0, '2018-01-16 23:44:24', '2018-01-16 23:44:24', 'fgvbhxfg'),
(10, 1, 1, 'fgndfgn', 'gfngcf', NULL, '<p>fbxdfb gvfbd g</p>', 'posts/January2018/1516166628.jpg', 'fgndfgn', 'fgn', 'gfngf', 'PUBLISHED', 0, '2018-01-16 23:53:48', '2018-01-16 23:53:48', 'gfndgf,fgndgf'),
(11, 1, 1, 'db vcf vgf', NULL, NULL, '<p>vbcngh</p>', '', 'db-vcf-vgf', NULL, NULL, 'PUBLISHED', 0, '2018-01-16 23:57:46', '2018-01-16 23:57:46', 'gfnxgfn'),
(12, 1, 3, '123 test', NULL, NULL, '<p>123 test</p>', 'posts/January2018/1516261352.jpg', '123-test', NULL, NULL, 'PENDING', 0, '2018-01-17 05:26:06', '2018-01-18 02:12:32', 'cfvbdfc,dfbvdf,bvdf,bfd,b,fdb');

-- --------------------------------------------------------

--
-- Table structure for table `post_answers`
--

CREATE TABLE `post_answers` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `answer` text,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_answers`
--

INSERT INTO `post_answers` (`id`, `post_id`, `user_id`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '<p>Good One...</p>', 1, '2018-01-11 23:00:02', '2018-01-11 23:00:02'),
(2, 2, 1, '<h4>Available Router Methods</h4>\r\n<p>The router allows you to register routes that respond to any HTTP verb:</p>\r\n<pre class=\" language-php\"><code class=\" language-php\"><span class=\"token scope\">Route<span class=\"token punctuation\">::</span></span><span class=\"token function\">get<span class=\"token punctuation\">(</span></span><span class=\"token variable\">$uri</span><span class=\"token punctuation\">,</span> <span class=\"token variable\">$callback</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span>\r\n<span class=\"token scope\">Route<span class=\"token punctuation\">::</span></span><span class=\"token function\">post<span class=\"token punctuation\">(</span></span><span class=\"token variable\">$uri</span><span class=\"token punctuation\">,</span> <span class=\"token variable\">$callback</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span>\r\n<span class=\"token scope\">Route<span class=\"token punctuation\">::</span></span><span class=\"token function\">put<span class=\"token punctuation\">(</span></span><span class=\"token variable\">$uri</span><span class=\"token punctuation\">,</span> <span class=\"token variable\">$callback</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span>\r\n<span class=\"token scope\">Route<span class=\"token punctuation\">::</span></span><span class=\"token function\">patch<span class=\"token punctuation\">(</span></span><span class=\"token variable\">$uri</span><span class=\"token punctuation\">,</span> <span class=\"token variable\">$callback</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span>\r\n<span class=\"token scope\">Route<span class=\"token punctuation\">::</span></span><span class=\"token function\">delete<span class=\"token punctuation\">(</span></span><span class=\"token variable\">$uri</span><span class=\"token punctuation\">,</span> <span class=\"token variable\">$callback</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span>\r\n<span class=\"token scope\">Route<span class=\"token punctuation\">::</span></span><span class=\"token function\">options<span class=\"token punctuation\">(</span></span><span class=\"token variable\">$uri</span><span class=\"token punctuation\">,</span> <span class=\"token variable\">$callback</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span></code></pre>', 1, '2018-01-11 23:00:57', '2018-01-11 23:00:57'),
(3, 2, 1, '<h3>Redirect Routes</h3>\r\n<pre class=\" language-php\"><code class=\" language-php\"><span class=\"token scope\">Route<span class=\"token punctuation\">::</span></span><span class=\"token function\">redirect<span class=\"token punctuation\">(</span></span><span class=\"token string\">\'/here\'</span><span class=\"token punctuation\">,</span> <span class=\"token string\">\'/there\'</span><span class=\"token punctuation\">,</span> <span class=\"token number\">301</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span></code></pre>', 1, '2018-01-11 23:01:27', '2018-01-11 23:01:27'),
(4, 1, 1, '<p>We mostly required to get sum of amount, salary etc in laravel. We can also get sum of column using mysql SUM(). We have two way to get sum of column value. first we can use laravel sum() of query builder and another one we can use with directly with select statement using DB::raw(). I give you both example you can see and use any one as perfect for you.</p>', 1, '2018-01-12 03:57:38', '2018-01-12 03:57:38'),
(5, 2, 2, '<pre><code class=\"hljs php\"><span class=\"hljs-comment\">//in model</span>\r\n<span class=\"hljs-keyword\">public</span> <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">child</span><span class=\"hljs-params\">()</span></span>{\r\n    <span class=\"hljs-keyword\">return</span> <span class=\"hljs-keyword\">$this</span>-&gt;hasOne(<span class=\"hljs-string\">\'ClildModels\'</span>, <span class=\"hljs-string\">\'foreign_key\'</span>, <span class=\"hljs-string\">\'local_key\'</span>);\r\n}\r\n\r\n<span class=\"hljs-comment\">//in controller</span>\r\n<span class=\"hljs-keyword\">public</span> <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">getAll</span><span class=\"hljs-params\">()</span></span>{\r\n    $data = <span class=\"hljs-keyword\">Parent</span>::has(<span class=\"hljs-string\">\'child\'</span>)-&gt;with([<span class=\"hljs-string\">\'child\'</span> =&gt; <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span><span class=\"hljs-params\">($query)</span></span>{\r\n            $query-&gt;where(); <span class=\"hljs-comment\">//you may use any condition here or manual select operation</span>\r\n            $query-&gt;select(); <span class=\"hljs-comment\">//select operation</span>\r\n        }])\r\n        -&gt;get();\r\n}</code></pre>', 1, '2018-01-12 05:39:24', '2018-01-12 05:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `post_cat_rels`
--

CREATE TABLE `post_cat_rels` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `profile_rated` int(11) NOT NULL,
  `rated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rating`, `profile_rated`, `rated_by`) VALUES
(1, '3', 1, 4),
(3, '4', 1, 2),
(4, '4', 1, 7),
(5, '4', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2018-01-11 22:43:41', '2018-01-11 22:43:41'),
(2, 'user', 'Normal User', '2018-01-11 22:43:41', '2018-01-11 22:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'users/default.jpg',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_logged_in` datetime DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_company` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `designation` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `country`, `state`, `city`, `created_at`, `updated_at`, `last_logged_in`, `social_id`, `account_type`, `skills`, `work_company`, `designation`, `biography`) VALUES
(1, 1, 'gurleen', 'gurleen@uniquecoders.in', 'users/January2018/Gjtxwypf3sBzy941I2fo.jpg', '$2y$10$m7ALYQ38qPsQaw/yctG4pu/oFmuxbyQird0FK6hF8IYJ2hd1/UKmO', '59loxGWGy7xrXFUnLWN5WdgAQFs05Q1C5Si60Brq4YXrpqWCxaco275nsftJ', 'India', '', '', '2018-01-11 22:46:21', '2018-01-17 23:33:21', '2018-01-18 04:51:45', NULL, NULL, 'php,juery,javascript,ajax,joomla', 'Unique Coders', 'Php Developer', '<p><em><strong>I am a full-stack Web Application Developer and Software Developer. I am both driven and self-motivated, and I am constantly experimenting with new technologies and techniques. Always inspired to learn and acomplish new opportunities.</strong></em></p>'),
(2, 2, 'Test', 'test@uniquecoders.in', 'users/default.jpg', '$2y$10$aP8TAhYjSLD5y1fNMe7Bw..Daqi9qEqAyICSLv3e/5/rb2Kjwzzx.', 'AZ8apdqn5kEeYsRYlHjcbdavWVLbr5HadD0dIzu76NhmdiIvki9UbMHXUNQU', '', '', '', '2018-01-12 03:58:27', '2018-01-12 03:58:27', NULL, 'direct-login', 'direct-login', NULL, '', NULL, NULL),
(7, 2, 'Testing', 'testing@uniquecoders.in', 'users/November2017/1516011943.jpg', '$2y$10$xqX0ipdrZ0CG71od04msROHvB1buul1WwzvxZuvon1SJDfvwy.vei', 'j5IP9HL4Iqnbg9OM4oDyuQyz5Naqne57LTj6EDf7JlBRBAVpLrrmm8z7sW6j', 'India', 'Punjab', 'Ludhiana', '2018-01-14 23:45:08', '2018-01-15 04:55:43', '2018-01-15 09:43:38', 'direct-login', 'direct-login', NULL, '', NULL, NULL),
(8, 2, 'Gurleen', 'g_kaur@uniquecoders.in', 'users/default.jpg', '$2y$10$.0U6fOq8byCZXqVGW.b3TuSELRoUrd.ZttnNso8Ao0geDnJiXJrj2', 'FUFt1WmVzKIAemsUAPGeYPI7piWOvpgUput0fSofWC3aFeyAIDckvGqcVvoc', 'India', 'Punjab', 'Ludhiana', '2018-01-15 00:50:20', '2018-01-15 04:13:22', '2018-01-15 09:08:00', 'direct-login', 'direct-login', NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `post_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 1, 2),
(5, 3, 1),
(6, 5, 1),
(7, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_status` int(1) DEFAULT NULL,
  `dislike_status` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `answer_id`, `user_id`, `like_status`, `dislike_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, '2018-01-12 09:03:03', '2018-01-15 05:58:28'),
(2, 4, 1, 1, 0, '2018-01-12 09:27:50', '2018-01-13 04:23:30'),
(3, 3, 2, 1, 0, '2018-01-12 09:28:42', '2018-01-12 09:50:56'),
(4, 3, 2, 1, NULL, '2018-01-12 09:28:43', '2018-01-12 09:28:43'),
(5, 3, 2, 1, 0, '2018-01-12 09:33:15', '2018-01-12 09:33:40'),
(6, 2, 2, 0, 1, '2018-01-12 09:34:09', '2018-01-12 11:12:19'),
(7, 2, 1, 0, 1, '2018-01-12 09:51:26', '2018-01-12 11:12:02'),
(8, 3, 1, 1, 0, '2018-01-12 09:51:32', '2018-01-12 11:11:18'),
(9, 5, 1, 1, NULL, '2018-01-12 11:12:30', '2018-01-12 11:12:30'),
(10, 1, 2, 0, 1, '2018-01-13 08:12:50', '2018-01-13 08:16:47'),
(11, 4, 2, 1, 0, '2018-01-13 08:13:01', '2018-01-13 08:15:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_groups_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_answers`
--
ALTER TABLE `post_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_cat_rels`
--
ALTER TABLE `post_cat_rels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post_answers`
--
ALTER TABLE `post_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_cat_rels`
--
ALTER TABLE `post_cat_rels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
