-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2020 at 02:58 PM
-- Server version: 10.2.33-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plugin_webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bank_name`, `created_at`, `updated_at`) VALUES
(1, 'State Bank of India (SBI)', NULL, NULL),
(2, 'Punjab National Bank (With Merger of Oriental\r\nBank of Commerce and United Bank of India)\r\n', NULL, NULL),
(5, 'Bank of Baroda\r\n', NULL, NULL),
(6, 'Canara Bank (With Merger of Syndicate Bank)', NULL, NULL),
(7, 'Union Bank of India (With Merger of Andhra Bank\r\nand Corporation Bank)\r\n', NULL, NULL),
(8, 'Bank of India', NULL, NULL),
(9, 'Indian Bank (With Merger of Allahabad Bank)', NULL, NULL),
(10, 'Central Bank of India', NULL, NULL),
(11, 'Indian Overseas Bank', NULL, NULL),
(12, 'UCO Bank', NULL, NULL),
(13, 'Bank of Maharashtra\r\n', NULL, NULL),
(14, 'Punjab & Sindh Bank\r\n', NULL, NULL),
(15, 'Axis Bank\r\n', NULL, NULL),
(16, 'Bandhan Bank', NULL, NULL),
(17, 'Catholic Syrian Bank\r\n', NULL, NULL),
(18, 'City Union Bank', NULL, NULL),
(19, 'DCB Bank\r\n', NULL, NULL),
(20, 'Dhanlaxmi Bank\r\n', NULL, NULL),
(21, 'Federal Bank', NULL, NULL),
(22, 'HDFC Bank\r\n', NULL, NULL),
(23, 'ICICI Bank\r\n', NULL, NULL),
(24, 'IDBI Bank', NULL, NULL),
(25, 'IDFC First Bank\r\n', NULL, NULL),
(26, 'IndusInd Bank', NULL, NULL),
(27, 'Jammu & Kashmir Bank\r\n', NULL, NULL),
(28, 'Karnataka Bank\r\n', NULL, NULL),
(29, 'Karur Vysya Bank\r\n', NULL, NULL),
(30, 'Kotak Mahindra Bank', NULL, NULL),
(31, 'Lakshmi Vilas Bank', NULL, NULL),
(32, 'Nainital Bank', NULL, NULL),
(33, 'RBL Bank', NULL, NULL),
(34, 'South Indian Bank\r\n', NULL, NULL),
(35, 'Tamilnad Mercantile Bank Limited', NULL, NULL),
(36, 'Yes Bank\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`) VALUES
(1, 'Nicobar', 26),
(2, 'South Andaman', 26),
(3, 'Ananthapur', 1),
(4, 'Chittoor', 1),
(5, 'Cuddapah', 1),
(6, 'East Godavari', 1),
(7, 'Guntur', 1),
(8, 'Kadapa', 1),
(9, 'Krishna', 1),
(10, 'Kurnool', 1),
(11, 'Nellore', 1),
(12, 'Prakasam', 1),
(13, 'Srikakulam', 1),
(14, 'Visakhapatnam', 1),
(15, 'Vizianagaram', 1),
(16, 'West Godavari', 1),
(17, 'Anjaw', 2),
(18, 'Changlang', 2),
(19, 'Dibang Valley', 2),
(20, 'East Kameng', 2),
(21, 'East Siang', 2),
(22, 'Kurung Kumey', 2),
(23, 'Lohit', 2),
(24, 'Lower Dibang Valley', 2),
(25, 'Lower Subansiri', 2),
(26, 'Papum Pare', 2),
(27, 'Tawang', 2),
(28, 'Tirap', 2),
(29, 'Upper Siang', 2),
(30, 'Upper Subansiri', 2),
(31, 'West Kameng', 2),
(32, 'West Siang', 2),
(33, 'Baksa', 3),
(34, 'Barpeta', 3),
(35, 'Bongaigaon', 3),
(36, 'Cachar', 3),
(37, 'Darrang', 3),
(38, 'Dhemaji', 3),
(39, 'Dhubri', 3),
(40, 'Dibrugarh', 3),
(41, 'Dima Hasso - North Cachar Hill', 3),
(42, 'Goalpara', 3),
(43, 'Golaghat', 3),
(44, 'Hailakandi', 3),
(45, 'Jorhat', 3),
(46, 'Kamrup', 3),
(47, 'Kamrup Metropolitan', 3),
(48, 'Karbi Anglong', 3),
(49, 'Karimganj', 3),
(50, 'Kokrajhar', 3),
(51, 'Lakhimpur', 3),
(52, 'Marigaon', 3),
(53, 'Nagaon', 3),
(54, 'Nalbari', 3),
(55, 'Ratanpur', 3),
(56, 'Sibsagar', 3),
(57, 'Sonapur', 3),
(58, 'Sonitpur', 3),
(59, 'Tinsukia', 3),
(60, 'Udalguri', 3),
(61, 'Araria', 4),
(62, 'Arwal', 4),
(63, 'Aurangabad', 4),
(64, 'Aurangabad(Bh)', 4),
(65, 'Banka', 4),
(66, 'Begusarai', 4),
(67, 'Bhagalpur', 4),
(68, 'Bhojpur', 4),
(69, 'Biharsharif', 4),
(70, 'Buxar', 4),
(71, 'Darbhanga', 4),
(72, 'East Champaran', 4),
(73, 'Gaya', 4),
(74, 'Gopalganj', 4),
(75, 'Hajipur', 4),
(76, 'Jamui', 4),
(77, 'Jehanabad', 4),
(78, 'Kaimur (Bhabua)', 4),
(79, 'Katihar', 4),
(80, 'Khagaria', 4),
(81, 'Kishanganj', 4),
(82, 'Laheriasarai', 4),
(83, 'Lakhisarai', 4),
(84, 'Madhepura', 4),
(85, 'Madhubani', 4),
(86, 'Motihari', 4),
(87, 'Nalanda', 4),
(88, 'Nanpur', 4),
(89, 'Nawada', 4),
(90, 'Nawadha', 4),
(91, 'Parihar', 4),
(92, 'Patna', 4),
(93, 'Purnea', 4),
(94, 'Purnia', 4),
(95, 'Rohtas', 4),
(96, 'Saharsa', 4),
(97, 'Samastipur', 4),
(98, 'Saran', 4),
(99, 'Sheikhpura', 4),
(100, 'Sheohar', 4),
(101, 'Sitamarhi', 4),
(102, 'Siwan', 4),
(103, 'Supaul', 4),
(104, 'Vaishali', 4),
(105, 'West Champaran', 4),
(106, 'Chandighar', 27),
(107, 'Ambikapur', 33),
(108, 'Balod', 33),
(109, 'Bastar', 33),
(110, 'Bijapur', 33),
(111, 'Bijapur(Cgh)', 33),
(112, 'Bilaspur', 33),
(113, 'Bilaspur(Cgh', 33),
(114, 'Bilaspur(Cgh)', 33),
(115, 'Dantewada', 33),
(116, 'Dhamtari', 33),
(117, '\"1528\">Dipika', 33),
(118, '\"0611\">Durg', 33),
(119, 'Gariaband', 33),
(120, 'Gohrapadar', 33),
(121, 'Jagdalpur', 33),
(122, 'Janjgir-Champa', 33),
(123, 'Jashpur', 33),
(124, 'Jaspur', 33),
(125, 'Kabirdham', 33),
(126, 'Kanker', 33),
(127, 'Kawardha', 33),
(128, 'Kondagaon', 33),
(129, 'Korba', 33),
(130, 'Koriya', 33),
(131, 'Mahasamund', 33),
(132, 'Makdi', 33),
(133, 'Mungeli', 33),
(134, 'Narayanpur', 33),
(135, 'Poudi Uproda', 33),
(136, 'Raigarh', 33),
(137, 'Raipur', 33),
(138, 'Rajnandgaon', 33),
(139, 'Sukma', 33),
(140, 'Surajpur', 33),
(141, 'Surguja', 33),
(142, 'Dadra & Nagar Haveli', 28),
(143, 'Daman', 29),
(144, 'Diu', 29),
(145, 'Central Delhi', 30),
(146, 'Delhi', 30),
(147, 'East Delhi', 30),
(148, 'Indraprastha', 30),
(149, 'New Delhi', 30),
(150, 'North Delhi', 30),
(151, 'North East Delhi', 30),
(152, 'North West Delhi', 30),
(153, 'Shahdara', 30),
(154, 'South Delhi', 30),
(155, 'South West Delhi', 30),
(156, 'West Delhi', 30),
(157, 'North Goa', 5),
(158, 'South Goa', 5),
(159, 'Ahmedabad', 6),
(160, 'Amreli', 6),
(161, 'Anand', 6),
(162, 'Aravalli', 6),
(163, 'Banaskantha', 6),
(164, 'Bharuch', 6),
(165, 'Bhavnagar', 6),
(166, 'Bhuj', 6),
(167, 'Bilimora', 6),
(168, 'Botab', 6),
(169, 'Chhota Udepur', 6),
(170, 'Chhotaudepur', 6),
(171, 'Dahod', 6),
(172, 'Dangs', 6),
(173, 'Devbhoomi Dwerka', 6),
(174, 'Gandhi Nagar', 6),
(175, 'Gandhinagar', 6),
(176, 'Gir Somnath', 6),
(177, 'Jamnagar', 6),
(178, 'Junagadh', 6),
(179, 'Kachchh', 6),
(180, 'Kheda', 6),
(181, 'Mahesana', 6),
(182, 'Mahisagar', 6),
(183, 'Morbi', 6),
(184, 'Nanpura', 6),
(185, 'Narmada', 6),
(186, 'Navsari', 6),
(187, 'Panch Mahals', 6),
(188, 'Patan', 6),
(189, 'Porbandar', 6),
(190, 'Rajkot', 6),
(191, 'Sabarkantha', 6),
(192, 'Surat', 6),
(193, 'Surendra Nagar', 6),
(194, 'Surendranagar', 6),
(195, 'Tapi', 6),
(196, 'The Dangs', 6),
(197, 'Vadodara', 6),
(198, 'Valsad', 6),
(199, 'Ambala', 7),
(200, 'Ambala City', 7),
(201, 'Bahadurgarh', 7),
(202, 'Bhiwani', 7),
(203, 'Faridabad', 7),
(204, 'Fatehabad', 7),
(205, 'Gurgaon', 7),
(206, 'Hisar', 7),
(207, 'Jhajjar', 7),
(208, 'Jind', 7),
(209, 'Kaithal', 7),
(210, 'Karnal', 7),
(211, 'Kurukshetra', 7),
(212, 'Mahendragarh', 7),
(213, 'Mewat', 7),
(214, 'Narnaul', 7),
(215, 'Palwal', 7),
(216, 'Panchkula', 7),
(217, 'Panipat', 7),
(218, 'Rewari', 7),
(219, 'Rohtak', 7),
(220, 'Sirsa', 7),
(221, 'Sonepat', 7),
(222, 'Sonipat', 7),
(223, 'Yamunanagar', 7),
(224, 'Bilaspur', 8),
(225, 'Bilaspur (Hp)', 8),
(226, 'Chamba', 8),
(227, 'Hamirpur', 8),
(228, 'Hamirpur(Hp)', 8),
(229, 'Kangra', 8),
(230, 'Kinnaur', 8),
(231, 'Kullu', 8),
(232, 'Lahul &amp; Spiti', 8),
(233, 'Mandi', 8),
(234, 'Nahan', 8),
(235, 'Shimla', 8),
(236, 'Sirmaur', 8),
(237, 'Solan', 8),
(238, 'Una', 8),
(239, 'Ananthnag', 9),
(240, 'Anantnag', 9),
(241, 'Bandipora', 9),
(242, 'Bandipur', 9),
(243, 'Baramulla', 9),
(244, 'Budgam', 9),
(245, 'Doda', 9),
(246, 'Ganderbal', 9),
(247, 'Jammu', 9),
(248, 'Kargil', 9),
(249, 'Kathua', 9),
(250, 'Kulgam', 9),
(251, 'Kupwara', 9),
(252, 'Leh', 9),
(253, 'Poonch', 9),
(254, 'Pulwama', 9),
(255, 'Rajauri', 9),
(256, 'Rajouri', 9),
(257, 'Ramban', 9),
(258, 'Reasi', 9),
(259, 'Samba', 9),
(260, 'Shopian', 9),
(261, 'Srinagar', 9),
(262, 'Udhampur', 9),
(263, 'B.Deoghar', 34),
(264, 'Bhavnagar', 34),
(265, 'Bokaro', 34),
(266, 'Chaibasa', 34),
(267, 'Chatra', 34),
(268, 'Daltonganj', 34),
(269, 'Deoghar', 34),
(270, 'Dhanbad', 34),
(271, 'Doranda', 34),
(272, 'Dumka', 34),
(273, 'East Singhbhum', 34),
(274, 'Garhwa', 34),
(275, 'Giridh', 34),
(276, 'Godda', 34),
(277, 'Gumla', 34),
(278, 'Hazaribag', 34),
(279, 'Hazaribagh', 34),
(280, 'Jamshedpur', 34),
(281, 'Jamtara', 34),
(282, 'Khunti', 34),
(283, 'Koderma', 34),
(284, 'Latehar', 34),
(285, 'Lohardaga', 34),
(286, 'Pakur', 34),
(287, 'Palamau', 34),
(288, 'Ramgarh', 34),
(289, 'Ranchi', 34),
(290, 'Sahibganj', 34),
(291, 'Seraikela-Kharsawan', 34),
(292, 'Simdega', 34),
(293, 'West Singhbhum', 34),
(294, 'Athani', 10),
(295, 'Bagalkot', 10),
(296, 'Bailhongal', 10),
(297, 'Ballari', 10),
(298, 'Belagavi', 10),
(299, 'Bellary', 10),
(300, 'Bengaluru', 10),
(301, 'Bengaluru Rural', 10),
(302, 'Bhadravati', 10),
(303, 'Bidar', 10),
(304, 'Bijapur(Kar)', 10),
(305, 'Chamarajanagar', 10),
(306, 'Chamrajnagar', 10),
(307, 'Chickmagalur', 10),
(308, 'Chikkaballapur', 10),
(309, 'Chikkamagaluru', 10),
(310, 'Chitradurga', 10),
(311, 'Dakshina Kannada', 10),
(312, 'Davangere', 10),
(313, 'Dharwad', 10),
(314, 'Gadag', 10),
(315, 'H.A.L Ii Stage', 10),
(316, 'Hanagodu', 10),
(317, 'Hassan', 10),
(318, 'Haveri', 10),
(319, 'Hubballi', 10),
(320, 'Hunsur', 10),
(321, 'Jamkhandi', 10),
(322, 'Kalaburagi', 10),
(323, 'Kalghatgi', 10),
(324, 'Kodagu', 10),
(325, 'Kolar', 10),
(326, 'Kollegal', 10),
(327, 'Koppal', 10),
(328, 'Kundgol', 10),
(329, 'Madikeri', 10),
(330, 'Mandya', 10),
(331, 'Mysuru', 10),
(332, 'Nanjangud', 10),
(333, 'R T Nagar', 10),
(334, 'Raichur', 10),
(335, 'Ramanagar', 10),
(336, 'Ramdurg', 10),
(337, 'Sagar', 10),
(338, 'Saraswathipuram', 10),
(339, 'Shivamogga', 10),
(340, 'Tumakuru', 10),
(341, 'Udupi', 10),
(342, 'Uttara Kannada', 10),
(343, 'Vijayapura', 10),
(344, 'Yadgir', 10),
(345, 'Yadgiri', 10),
(346, 'Adur( Kla)', 11),
(347, 'Alappuzha', 11),
(348, 'Alathur', 11),
(349, 'Aluva', 11),
(350, 'Attingal', 11),
(351, 'Calicut', 11),
(352, 'Calicut Civil Station', 11),
(353, 'Chalakudi', 11),
(354, 'Ernakulam', 11),
(355, 'Idukki', 11),
(356, 'Irinjalakuda', 11),
(357, 'Kalpetta', 11),
(358, 'Kanhangad', 11),
(359, 'Kannur', 11),
(360, 'Karunagappaly', 11),
(361, 'Kasaragod', 11),
(362, 'Kasargod', 11),
(363, 'Kochi', 11),
(364, 'Kollam', 11),
(365, 'Kottarakara', 11),
(366, 'Kottayam', 11),
(367, 'Koyilandi', 11),
(368, 'Kozhikode', 11),
(369, 'Malappuram', 11),
(370, 'Manjeri-Kla', 11),
(371, 'Olavakkot', 11),
(372, 'Ottapalam', 11),
(373, 'Palakkad', 11),
(374, 'Pathanamthitta', 11),
(375, 'Ponani', 11),
(376, 'Poojapura', 11),
(377, 'Punalur', 11),
(378, 'Taliparamba', 11),
(379, 'Thalassery', 11),
(380, 'Thiruvananthapuram', 11),
(381, 'Thodupuzha', 11),
(382, 'Thrissur', 11),
(383, 'Tirur', 11),
(384, 'Trivandrum', 11),
(385, 'Vadakara', 11),
(386, 'Wayanad', 11),
(387, 'Lakshadweep', 31),
(388, 'Agar Malwa', 12),
(389, 'Alirajpur', 12),
(390, 'Anuppur', 12),
(391, 'Ashok Nagar', 12),
(392, 'Ashoknagar', 12),
(393, 'Balaghat', 12),
(394, 'Barwani', 12),
(395, 'Betul', 12),
(396, 'Bhind', 12),
(397, 'Bhopal', 12),
(398, 'Burhanpur', 12),
(399, 'Chhatarpur', 12),
(400, 'Chhindwara', 12),
(401, 'Damoh', 12),
(402, 'Datia', 12),
(403, 'Dewas', 12),
(404, 'Dhar', 12),
(405, 'Dindori', 12),
(406, 'Guna', 12),
(407, 'Gwalior', 12),
(408, 'Harda', 12),
(409, 'Hoshangabad', 12),
(410, 'Indore', 12),
(411, 'Jabalpur', 12),
(412, 'Jhabua', 12),
(413, 'Katni', 12),
(414, 'Khandwa', 12),
(415, 'Khargone', 12),
(416, 'Mandla', 12),
(417, 'Mandsaur', 12),
(418, 'Morena', 12),
(419, 'Narsinghpur', 12),
(420, 'Neemuch', 12),
(421, 'Panna', 12),
(422, 'Raisen', 12),
(423, 'Rajgarh', 12),
(424, 'Rajgarh(Bia)', 12),
(425, 'Ratlam', 12),
(426, 'Rewa', 12),
(427, 'Sagar', 12),
(428, 'Sagar Cantt', 12),
(429, 'Satna', 12),
(430, 'Sehore', 12),
(431, 'Seoni', 12),
(432, 'Shahdol', 12),
(433, 'Shajapur', 12),
(434, 'Sheopur', 12),
(435, 'Shivpuri', 12),
(436, 'Sidhi', 12),
(437, 'Singrauli', 12),
(438, 'Tikamgarh', 12),
(439, 'Ujjain', 12),
(440, 'Umaria', 12),
(441, 'Vidisha', 12),
(442, 'Ahmed Nagar', 13),
(443, 'Akola', 13),
(444, 'Alibag', 13),
(445, 'Amravati', 13),
(446, 'Andheri', 13),
(447, 'Aurangabad', 13),
(448, 'Beed', 13),
(449, 'Bhandara', 13),
(450, 'Bhusawal', 13),
(451, 'Bopodi', 13),
(452, 'Borivali', 13),
(453, 'Buldhana', 13),
(454, 'Chandrapur', 13),
(455, 'Dhule', 13),
(456, 'Gadchiroli', 13),
(457, 'Gondia', 13),
(458, 'Hingoli', 13),
(459, 'Jalgaon', 13),
(460, 'Jalna', 13),
(461, 'Kolhapur', 13),
(462, 'Kolhapur City', 13),
(463, 'Latur', 13),
(464, 'Malegaon', 13),
(465, 'Miraj', 13),
(466, 'Mumbai', 13),
(467, 'Mumbai Subueban', 13),
(468, 'Nagpur', 13),
(469, 'Nanded', 13),
(470, 'Nandurbar', 13),
(471, 'Nashik', 13),
(472, 'Osmanabad', 13),
(473, 'Palghar', 13),
(474, 'Panvel', 13),
(475, 'Parbhani', 13),
(476, 'Pune', 13),
(477, 'Pune City', 13),
(478, 'Raigad', 13),
(479, 'Raigarh(Mh)', 13),
(480, 'Ratnagiri', 13),
(481, 'Sangli', 13),
(482, 'Satara', 13),
(483, 'Shivajinagar', 13),
(484, 'Shrirampur', 13),
(485, 'Sindhudurg', 13),
(486, 'Solapur', 13),
(487, 'Thane', 13),
(488, 'Wardha', 13),
(489, 'Washim', 13),
(490, 'Yavatmal', 13),
(491, 'Bishnupur', 14),
(492, 'Chandel', 14),
(493, 'Churachandpur', 14),
(494, 'Imphal East', 14),
(495, 'Imphal West', 14),
(496, 'Senapati', 14),
(497, 'Tamenglong', 14),
(498, 'Thoubal', 14),
(499, 'Ukhrul', 14),
(500, 'East Garo Hills', 15),
(501, 'East Jaintia Hills', 15),
(502, 'East Khasi Hills', 15),
(503, 'North Garo Hills', 15),
(504, 'Ri Bhoi', 15),
(505, 'South Garo Hills', 15),
(506, 'South West Garo Hills', 15),
(507, 'South West Khasi Hills', 15),
(508, 'West Garo Hills', 15),
(509, 'West Jaintia Hills', 15),
(510, 'West Khasi Hills', 15),
(511, 'Aizawl', 16),
(512, 'Champhai', 16),
(513, 'Kolasib', 16),
(514, 'Lawngtlai', 16),
(515, 'Lunglei', 16),
(516, 'Mammit', 16),
(517, 'Saiha', 16),
(518, 'Serchhip', 16),
(519, 'Dimapur', 17),
(520, 'Kiphire', 17),
(521, 'Kohima', 17),
(522, 'Longleng', 17),
(523, 'Mokokchung', 17),
(524, 'Mon', 17),
(525, 'Peren', 17),
(526, 'Phek', 17),
(527, 'Tuensang', 17),
(528, 'Wokha', 17),
(529, 'Zunhebotto', 17),
(530, 'Angul', 18),
(531, 'Balangir', 18),
(532, 'Balasore', 18),
(533, 'Baleswar', 18),
(534, 'Bargarh', 18),
(535, 'Berhampur', 18),
(536, 'Berhampur(Gm)', 18),
(537, 'Bhadrak', 18),
(538, 'Bhubaneswar', 18),
(539, 'Bhubaneswar G.P', 18),
(540, 'Boudh', 18),
(541, 'Chatrapur', 18),
(542, 'Cuttack', 18),
(543, 'Debagarh', 18),
(544, 'Dhenkanal', 18),
(545, 'Gajapati', 18),
(546, 'Ganjam', 18),
(547, 'Jagatsinghapur', 18),
(548, 'Jajapur', 18),
(549, 'Jharsuguda', 18),
(550, 'Kalahandi', 18),
(551, 'Kandhamal', 18),
(552, 'Kendrapara', 18),
(553, 'Kendujhar', 18),
(554, 'Khorda', 18),
(555, 'Koraput', 18),
(556, 'Malkangiri', 18),
(557, 'Mayurbhanj', 18),
(558, 'Nabarangapur', 18),
(559, 'Nayagarh', 18),
(560, 'Nuapada', 18),
(561, 'Parlakhemundi', 18),
(562, 'Puri', 18),
(563, 'Rayagada', 18),
(564, 'Sambalpur', 18),
(565, 'Sonapur', 18),
(566, 'Sundargarh', 18),
(567, 'Sundergarh', 18),
(568, 'Pondicherry', 32),
(569, 'Amritsar', 19),
(570, 'Barnala', 19),
(571, 'Bathinda', 19),
(572, 'Chandigarh', 19),
(573, 'Faridkot', 19),
(574, 'Fatehgarh Sahib', 19),
(575, 'Fazilka', 19),
(576, 'Firozpur', 19),
(577, 'Gurdaspur', 19),
(578, 'Hoshiarpur', 19),
(579, 'Jagraon', 19),
(580, 'Jalandhar', 19),
(581, 'Kapurthala', 19),
(582, 'Khanna', 19),
(583, 'Ludhiana', 19),
(584, 'Mansa', 19),
(585, 'Moga', 19),
(586, 'Mohali', 19),
(587, 'Muktsar', 19),
(588, 'Nawanshahr', 19),
(589, 'Pathankot', 19),
(590, 'Patiala', 19),
(591, 'Ropar', 19),
(592, 'Rupnagar', 19),
(593, 'Sangrur', 19),
(594, 'Tarn Taran', 19),
(595, 'Ajmer', 20),
(596, 'Alwar', 20),
(597, 'Banswara', 20),
(598, 'Baran', 20),
(599, 'Barmer', 20),
(600, 'Bharatpur', 20),
(601, 'Bhilwara', 20),
(602, 'Bikaner', 20),
(603, 'Bundi', 20),
(604, 'Chittorgarh', 20),
(605, 'Churu', 20),
(606, 'Dausa', 20),
(607, 'Dholpur', 20),
(608, 'Dungarpur', 20),
(609, 'Hanumangarh', 20),
(610, 'Jaipur', 20),
(611, 'Jaisalmer', 20),
(612, 'Jalor', 20),
(613, 'Jhalawar', 20),
(614, 'Jhujhunu', 20),
(615, 'Jodhpur', 20),
(616, 'Karauli', 20),
(617, 'Kota', 20),
(618, 'Nagaur', 20),
(619, 'Pali', 20),
(620, 'Pratapghar', 20),
(621, 'Rajsamand', 20),
(622, 'Sawai Madhopur', 20),
(623, 'Sikar', 20),
(624, 'Sirohi', 20),
(625, 'Sri Ganganagar', 20),
(626, 'Sriganganagar', 20),
(627, 'Tonk', 20),
(628, 'Udaipur', 20),
(629, 'East Sikkim', 21),
(630, 'North Sikkim', 21),
(631, 'South Sikkim', 21),
(632, 'West Sikkim', 21),
(633, 'Ambattur', 22),
(634, 'Ariyalur', 22),
(635, 'Avadi Camp', 22),
(636, 'Chengalpattu', 22),
(637, 'Chennai', 22),
(638, 'Coimbatore', 22),
(639, 'Cuddalore', 22),
(640, 'Dharapuram', 22),
(641, 'Dharmapuri', 22),
(642, 'Dindigul', 22),
(643, 'Erode', 22),
(644, 'Kallakurichi', 22),
(645, 'Kanchipuram', 22),
(646, 'Kanyakumari', 22),
(647, 'Karur', 22),
(648, 'Krishnagiri', 22),
(649, 'Madurai', 22),
(650, 'Manamadurai', 22),
(651, 'Mettupalayam', 22),
(652, 'Nagapattinam', 22),
(653, 'Namakkal', 22),
(654, 'Nilgiris', 22),
(655, 'Pattukottai', 22),
(656, 'Perambalur', 22),
(657, 'Pudukkottai', 22),
(658, 'Ramanathapuram', 22),
(659, 'Ranipet', 22),
(660, 'Rathinasabapathy Puram', 22),
(661, 'Salem', 22),
(662, 'Sivaganga', 22),
(663, 'Tambaram', 22),
(664, 'Thanjavur', 22),
(665, 'Theni', 22),
(666, 'Tindivanam', 22),
(667, 'Tiruchirappalli', 22),
(668, 'Tirunelveli', 22),
(669, 'Tirupattur', 22),
(670, 'Tiruppur', 22),
(671, 'Tiruturaipundi', 22),
(672, 'Tiruvallur', 22),
(673, 'Tiruvannamalai', 22),
(674, 'Tiruvarur', 22),
(675, 'Tuticorin', 22),
(676, 'Vellore', 22),
(677, 'Villupuram', 22),
(678, 'Virudhunagar', 22),
(679, 'Adilabad', 36),
(680, 'Bhadrachalam', 36),
(681, 'Bhongir', 36),
(682, 'Gadwal', 36),
(683, 'Hanamkonda', 36),
(684, 'Huzurabad', 36),
(685, 'Hyderabad', 36),
(686, 'Jagtial', 36),
(687, 'Jangaon', 36),
(688, 'K.V.Rangareddy', 36),
(689, 'Kamareddy', 36),
(690, 'Karim Nagar', 36),
(691, 'Khammam', 36),
(692, 'Kothagudem', 36),
(693, 'Kothagudem Colls', 36),
(694, 'Mahabub Nagar', 36),
(695, 'Mahabubabad', 36),
(696, 'Mancherial', 36),
(697, 'Medak', 36),
(698, 'Nagar Kurnool', 36),
(699, 'Nalgonda', 36),
(700, 'Nirmal', 36),
(701, 'Nizamabad', 36),
(702, 'Parkal', 36),
(703, 'Peddapalli', 36),
(704, 'Rangareddy', 36),
(705, 'Sangareddy', 36),
(706, 'Secunderabad', 36),
(707, 'Siddipet', 36),
(708, 'Sircilla', 36),
(709, 'Stn. Jadcherla', 36),
(710, 'Suryapet', 36),
(711, 'Trimulgherry', 36),
(712, 'Vikarabad', 36),
(713, 'Wanaparthy', 36),
(714, 'Warangal', 36),
(715, 'Zaheerabad', 36),
(716, 'Agartala&nbsp;', 23),
(717, 'Dhalai', 23),
(718, 'Gomati', 23),
(719, 'Khowai', 23),
(720, 'North Tripura', 23),
(721, 'Sepahijala', 23),
(722, 'South Tripura', 23),
(723, 'West Tripura', 23),
(724, 'Agra', 24),
(725, 'Agra Fort', 24),
(726, 'Akbarpur', 24),
(727, 'Aligarh', 24),
(728, 'Allahabad', 24),
(729, 'Allahabad Kty.', 24),
(730, 'Ambedkar Nagar', 24),
(731, 'Amethi', 24),
(732, 'Amroha', 24),
(733, 'Auraiya', 24),
(734, 'Azamgarh', 24),
(735, 'Bagpat', 24),
(736, 'Bahraich', 24),
(737, 'Ballia', 24),
(738, 'Balrampur', 24),
(739, 'Banaskantha', 24),
(740, 'Banda', 24),
(741, 'Bansi', 24),
(742, 'Barabanki', 24),
(743, 'Baraut', 24),
(744, 'Bareilly', 24),
(745, 'Basti', 24),
(746, 'Begusarai', 24),
(747, 'Bijnor', 24),
(748, 'Budaun', 24),
(749, 'Bulandshahar', 24),
(750, 'Bulandshahr', 24),
(751, 'Buxar', 24),
(752, 'Chandauli', 24),
(753, 'Chitrakoot', 24),
(754, 'Darbhanga', 24),
(755, 'Datia', 24),
(756, 'Deoria', 24),
(757, 'Dhampur', 24),
(758, 'Etah', 24),
(759, 'Etawah', 24),
(760, 'Faizabad', 24),
(761, 'Farrukhabad', 24),
(762, 'Fatehgarh', 24),
(763, 'Fatehpur', 24),
(764, 'Firozabad', 24),
(765, 'Gautam Buddha Nagar', 24),
(766, 'Ghaziabad', 24),
(767, 'Ghazipur', 24),
(768, 'Goalpara', 24),
(769, 'Godda', 24),
(770, 'Gonda', 24),
(771, 'Gorakhpur', 24),
(772, 'Hapur', 24),
(773, 'Hardoi', 24),
(774, 'Hathras', 24),
(775, 'Jajapur', 24),
(776, 'Jalaun', 24),
(777, 'Jaunpur', 24),
(778, 'Jhansi', 24),
(779, 'Jyotiba Phule Nagar', 24),
(780, 'Kannauj', 24),
(781, 'Kanpur', 24),
(782, 'Kanpur Dehat', 24),
(783, 'Kanpur Nagar', 24),
(784, 'Kaushambi', 24),
(785, 'Khagaria', 24),
(786, 'Kheri', 24),
(787, 'Khurja', 24),
(788, 'Kushinagar', 24),
(789, 'Lalganj (Raebareli)', 24),
(790, 'Lalitpur', 24),
(791, 'Lucknow', 24),
(792, 'Lucknow Chowk', 24),
(793, 'Maharajganj', 24),
(794, 'Mahoba', 24),
(795, 'Mainpuri', 24),
(796, 'Mathura', 24),
(797, 'Mau', 24),
(798, 'Meerut', 24),
(799, 'Meerut Cantt', 24),
(800, 'Meerut City', 24),
(801, 'Mirzapur', 24),
(802, 'Moradabad', 24),
(803, 'Muzaffarnagar', 24),
(804, 'Muzaffarpur', 24),
(805, 'Nanded', 24),
(806, 'Noida', 24),
(807, 'Orai', 24),
(808, 'Panna', 24),
(809, 'Pilibhit', 24),
(810, 'Pratapgarh', 24),
(811, 'Raebareli', 24),
(812, 'Rampur', 24),
(813, 'Rasra', 24),
(814, 'Sagar', 24),
(815, 'Saharanpur', 24),
(816, 'Sant Kabir Nagar', 24),
(817, 'Sant Ravidas Nagar', 24),
(818, 'Saran', 24),
(819, 'Shahjahanpur', 24),
(820, 'Shrawasti', 24),
(821, 'Siddharthnagar', 24),
(822, 'Sitapur', 24),
(823, 'Sonbhadra', 24),
(824, 'Sultanpur', 24),
(825, 'Sultanpur (Avadh)', 24),
(826, 'Unnao', 24),
(827, 'Varanasi', 24),
(828, 'Varanasi Cantt', 24),
(829, 'Yamuna Nagar', 24),
(830, 'Almora', 35),
(831, 'Bageshwar', 35),
(832, 'Chamoli', 35),
(833, 'Champawat', 35),
(834, 'Dehradun', 35),
(835, 'Dehradun Cantt', 35),
(836, 'Dehradun G.P', 35),
(837, 'Gopeshwar', 35),
(838, 'Haldwani', 35),
(839, 'Haridwar', 35),
(840, 'Kotdwara', 35),
(841, 'Nainital', 35),
(842, 'Pauri', 35),
(843, 'Pauri Garhwal', 35),
(844, 'Pithoragarh', 35),
(845, 'Ranikhet', 35),
(846, 'Roorkee', 35),
(847, 'Rudraprayag', 35),
(848, 'Saharanpur', 35),
(849, 'Tehri', 35),
(850, 'Tehri Garhwal', 35),
(851, 'Udham Singh Nagar', 35),
(852, 'Uttarkashi', 35),
(853, 'Alipurduar', 25),
(854, 'Balurghat', 25),
(855, 'Bankura', 25),
(856, 'Barasat', 25),
(857, 'Bardhaman', 25),
(858, 'Barrackpore', 25),
(859, 'Baruipur', 25),
(860, 'Belgharia', 25),
(861, 'Berhampore (Wb)', 25),
(862, 'Birbhum', 25),
(863, 'Burdwan', 25),
(864, 'Cooch Behar', 25),
(865, 'Darjeeling', 25),
(866, 'Darjiling', 25),
(867, 'Diamond Harbour', 25),
(868, 'East Midnapore', 25),
(869, 'Gangtok', 25),
(870, 'Hooghly', 25),
(871, 'Howrah', 25),
(872, 'Jalpaiguri', 25),
(873, 'Jhargram', 25),
(874, 'Kalimpong', 25),
(875, 'Kandi', 25),
(876, 'Kolkata', 25),
(877, 'Krishnanagar', 25),
(878, 'Malda', 25),
(879, 'Medinipur', 25),
(880, 'Midnapore', 25),
(881, 'Murshidabad', 25),
(882, 'Nabadwip', 25),
(883, 'Nadia', 25),
(884, 'North  Parganas', 25),
(885, 'North Dinajpur', 25),
(886, 'Paschim Bardhaman', 25),
(887, 'Port Blair', 25),
(888, 'Purba Bardhaman', 25),
(889, 'Purulia', 25),
(890, 'Puruliya', 25),
(891, 'Raghunathganj', 25),
(892, 'Rampurhat', 25),
(893, 'Ranaghat', 25),
(894, 'Raniganj', 25),
(895, 'Siliguri', 25),
(896, 'South  Parganas', 25),
(897, 'South Dinajpur', 25),
(898, 'Suri', 25),
(899, 'Tamluk', 25),
(900, 'West Midnapore', 25);

-- --------------------------------------------------------

--
-- Table structure for table `commission_application`
--

CREATE TABLE `commission_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` int(11) NOT NULL,
  `commissioned` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission_application`
--

INSERT INTO `commission_application` (`id`, `id_project`, `commissioned`, `created_at`, `updated_at`) VALUES
(3, 5, 1, '2020-09-15 06:41:51', '2020-09-16 09:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `compliance_application`
--

CREATE TABLE `compliance_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` int(11) NOT NULL,
  `c_date_scheduled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compliance_completed` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compliance_application`
--

INSERT INTO `compliance_application` (`id`, `id_project`, `c_date_scheduled`, `compliance_completed`, `created_at`, `updated_at`) VALUES
(2, 5, '2020-09-26', 1, '2020-09-15 06:41:51', '2020-09-16 09:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `components_application`
--

CREATE TABLE `components_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` int(11) NOT NULL,
  `panels_ordered` int(1) NOT NULL DEFAULT 0,
  `panels_received` int(11) NOT NULL DEFAULT 0,
  `inverter_ordered` int(11) NOT NULL DEFAULT 0,
  `inverter_received` int(11) NOT NULL DEFAULT 0,
  `frame_ordered` int(11) NOT NULL DEFAULT 0,
  `frame_received` int(11) NOT NULL DEFAULT 0,
  `wire_ordered` int(11) NOT NULL DEFAULT 0,
  `wire_received` int(11) NOT NULL DEFAULT 0,
  `accessories_ordered` int(11) NOT NULL DEFAULT 0,
  `accessories_received` int(11) NOT NULL DEFAULT 0,
  `monitoring_system_ordered` int(11) NOT NULL DEFAULT 0,
  `monitoring_system_received` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `components_application`
--

INSERT INTO `components_application` (`id`, `id_project`, `panels_ordered`, `panels_received`, `inverter_ordered`, `inverter_received`, `frame_ordered`, `frame_received`, `wire_ordered`, `wire_received`, `accessories_ordered`, `accessories_received`, `monitoring_system_ordered`, `monitoring_system_received`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-09-15 06:41:51', '2020-09-16 02:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(20) NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_adr_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_adr_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_pincode` int(11) NOT NULL,
  `contact_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_meu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_visit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `id_user`, `contact_name`, `contact_email`, `contact_adr_1`, `contact_adr_2`, `contact_pincode`, `contact_city`, `contact_state`, `contact_phone`, `contact_meu`, `contact_visit`, `status`, `created_at`, `updated_at`) VALUES
(95, 132, 'Text 1', 'test1@demo.com', 'Text 1', 'Text 1', 123456, 'Chickmagalur', 'Karnataka', '9883443344', '125 Month', '2020-10-01', 2, '2020-09-15 02:27:54', '2020-09-15 05:00:38'),
(96, 133, 'Nguyen Tuan Anh', 'nguyenanh.it.4198@gmail.com', 'Coldwater Canyon Dr', 'Coldwater Canyon Dr', 90210, 'Jodhpur', 'Rajasthan', '7986576783', '10 Year', '2020-09-25', 0, '2020-09-15 02:45:28', '2020-09-15 05:30:33'),
(97, 134, 'Nguyen Tuan Anh', 'aloteam@gmail.com', 'Coldwater Canyon Dr', 'Coldwater Canyon Dr', 90210, 'Jodhpur', 'Rajasthan', '7986576783', '0 Year', '2020-09-25', 1, '2020-09-15 02:55:31', '2020-09-15 02:55:31'),
(98, 135, 'testwebsite', 'test_mail@gmail.com', 'Coldwater Canyon Dr', 'Coldwater Canyon Dr', 90210, 'Jodhpur', 'Rajasthan', '7986576783', '15 Year', '2020-09-24', 1, '2020-09-15 02:57:26', '2020-09-15 02:57:26'),
(99, 136, 'Test 2', 'hoanghuan301095@gmail.com', 'Test 2', 'Test 2', 123456, 'Ri Bhoi', 'Megalaya', '9883443344', '212 Year', '2020-09-23', 1, '2020-09-15 03:27:18', '2020-09-15 03:27:18'),
(100, 139, 'Bluesky', 'demo1@demo.com', 'Ha Noi', 'Ha Noi', 124564, 'Jodhpur', 'Rajasthan', '9883443344', '12 Year', '2020-09-18', 1, '2020-09-16 02:14:06', '2020-09-16 02:14:06'),
(101, 142, 'Piyush Jain', 'jain.piyush888+1@gmail.com', '558 NW', 'a', 342005, 'Jodhpur', 'Rajasthan', '9982080402', '1000 Year', '2020-09-16', 1, '2020-09-16 02:38:03', '2020-09-16 02:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `name`) VALUES
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
(15, 'AX', 'Åland'),
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
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
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
(73, 'FM', 'Micronesia'),
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
(96, 'HM', 'Heard Island and McDonald Islands'),
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
(126, 'LA', 'Laos'),
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
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
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
(166, 'NL', 'Netherlands'),
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
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
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
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `data_installer`
--

CREATE TABLE `data_installer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `installer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_contact_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_adr_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_adr_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_city` int(11) DEFAULT NULL,
  `installer_state` int(11) DEFAULT NULL,
  `installer_pincode` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_number_of_project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_total_installer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_maximum_installer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_number_of_employees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installer_maximum_distance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_installer`
--

INSERT INTO `data_installer` (`id`, `id_user`, `installer_name`, `installer_contact_name`, `installer_phone`, `installer_email`, `installer_adr_1`, `installer_adr_2`, `installer_city`, `installer_state`, `installer_pincode`, `installer_number_of_project`, `installer_total_installer`, `installer_maximum_installer`, `installer_number_of_employees`, `installer_maximum_distance`, `created_at`, `updated_at`) VALUES
(4, 138, 'Installer', 'Installer', '7986576783', 'installer@gmail.com', 'Ha Noi', '123123123', 35, 3, '100012', '12', '12', '12', '12', '12', '2020-09-15 07:02:38', '2020-09-15 07:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `discom_application`
--

CREATE TABLE `discom_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` int(11) NOT NULL,
  `d_application_submitted` int(1) NOT NULL DEFAULT 0,
  `d_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Denied',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discom_application`
--

INSERT INTO `discom_application` (`id`, `id_project`, `d_application_submitted`, `d_status`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 'Approved', '2020-09-15 06:41:51', '2020-09-15 07:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `discom_commissioning_application`
--

CREATE TABLE `discom_commissioning_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` int(11) NOT NULL,
  `application_completed` int(11) NOT NULL DEFAULT 0,
  `d_date_scheduled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discom_commissioning_application`
--

INSERT INTO `discom_commissioning_application` (`id`, `id_project`, `application_completed`, `d_date_scheduled`, `created_at`, `updated_at`) VALUES
(2, 5, 1, '2020-09-17', '2020-09-15 06:41:51', '2020-09-16 09:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `finance_application`
--

CREATE TABLE `finance_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` int(11) NOT NULL,
  `f_application_submitted` int(11) NOT NULL DEFAULT 0,
  `f_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Denied',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finance_application`
--

INSERT INTO `finance_application` (`id`, `id_project`, `f_application_submitted`, `f_status`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 'Approved', '2020-09-15 06:41:51', '2020-09-15 07:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `inspection`
--

CREATE TABLE `inspection` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `panel_area` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `inverter_area` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `wiring_path_video` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `panel_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daily_kwh` float DEFAULT NULL,
  `system_size` double(15,2) DEFAULT NULL,
  `tpc` double(15,2) DEFAULT NULL,
  `emi` double(18,0) DEFAULT NULL,
  `average_monthly_usage` double(8,2) DEFAULT NULL,
  `average_sun_hours` double(8,2) DEFAULT NULL,
  `bill_offset` double(8,2) DEFAULT NULL,
  `potential_install_area` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_leg` float DEFAULT NULL,
  `large_leg` int(11) DEFAULT NULL,
  `number_of_rows` int(11) DEFAULT NULL,
  `inverter_length` int(11) DEFAULT NULL,
  `deposit` float DEFAULT NULL,
  `remaining` double(15,2) DEFAULT NULL,
  `down_payment` float DEFAULT NULL,
  `of_months` int(11) DEFAULT 12,
  `interest` float DEFAULT NULL,
  `existing_home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_1` int(11) NOT NULL DEFAULT 0,
  `session_2` int(11) NOT NULL DEFAULT 0,
  `session_3` int(11) NOT NULL DEFAULT 0,
  `session_4` int(11) NOT NULL DEFAULT 0,
  `session_5` int(11) NOT NULL DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inspection`
--

INSERT INTO `inspection` (`id`, `id_user`, `id_contact`, `panel_area`, `inverter_area`, `wiring_path_video`, `panel_image`, `document_1`, `document_2`, `document_3`, `daily_kwh`, `system_size`, `tpc`, `emi`, `average_monthly_usage`, `average_sun_hours`, `bill_offset`, `potential_install_area`, `small_leg`, `large_leg`, `number_of_rows`, `inverter_length`, `deposit`, `remaining`, `down_payment`, `of_months`, `interest`, `existing_home`, `bank_id`, `bank_branch`, `session_1`, `session_2`, `session_3`, `session_4`, `session_5`, `status`, `created_at`, `updated_at`) VALUES
(3, 132, 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '2020-09-15 05:03:21', '2020-09-15 05:03:21'),
(4, 133, 96, '[\"http:\\/\\/plugincheckout.com\\/webapp\\/public\\/dist\\/upload_image_video\\/11600147788.jpg\"]', '[\"http:\\/\\/plugincheckout.com\\/webapp\\/public\\/dist\\/upload_image_video\\/11600147794.jpg\"]', '[\"http:\\/\\/plugincheckout.com\\/webapp\\/public\\/dist\\/upload_image_video\\/20200412_205451_edited1600147806.mp4\"]', 'http://plugincheckout.com/webapp/public/dist/upload/5f6050f5355921600147701.jpeg', 'http://plugincheckout.com/webapp/public/dist/upload_file/Confirm1600147764docx', 'http://plugincheckout.com/webapp/public/dist/upload_file/Confirm1600147769docx', 'http://plugincheckout.com/webapp/public/dist/upload_file/Confirm1600147774docx', 30, 2.42, 144000.00, 3315101, 900.00, 3.00, 22.00, '45', 23, 23, 32, 42, 242, 143758.00, 32, 36, 23, '1', 13, 'Bank Branch', 1, 1, 1, 1, 1, 1, '2020-09-15 05:04:04', '2020-09-15 05:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `installation_application`
--

CREATE TABLE `installation_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` int(11) NOT NULL,
  `assign_installer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `i_date_scheduled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installation_completed` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installation_application`
--

INSERT INTO `installation_application` (`id`, `id_project`, `assign_installer`, `i_date_scheduled`, `installation_completed`, `created_at`, `updated_at`) VALUES
(2, 5, '138', '2020-09-16', 1, '2020-09-15 06:41:51', '2020-09-16 09:11:14');

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
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2020_08_25_083054_create_contact_table', 2),
(8, '2020_08_31_014437_add_user_type', 3),
(9, '2020_08_31_084407_data_installer', 4),
(10, '2020_08_31_093140_id_user1', 4),
(11, '2020_09_01_022651_create_bank_table', 5),
(12, '2020_09_01_170848_installer_contact_name', 6),
(13, '2020_09_04_022013_create_inspection_table', 7),
(14, '2020_09_09_025714_projects', 8),
(15, '2020_09_10_072719_create_discom_application_table', 9),
(16, '2020_09_10_072856_create_finance_application_table', 9),
(17, '2020_09_10_073726_create_installation_application_table', 10),
(18, '2020_09_10_073754_create_components_application_table', 10),
(19, '2020_09_10_073823_create_compliance_application_table', 10),
(20, '2020_09_10_073936_create_discom_commissioning_application_table', 10),
(21, '2020_09_10_074015_create_commission_application_table', 10),
(22, '2020_09_11_015238_add_compare_to_projects', 11),
(23, '2020_09_11_020155_add_compare_to_project', 12),
(24, '2020_09_11_082724_add_compare_projects', 13),
(25, '2020_09_11_094216_add_compare_project', 14),
(26, '2020_09_11_134422_project_tracker', 15);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0c1b379eebe4e43bed235d32983bd4b44e397c78a283fd3a7b8141237013c5bf273d7c86b0139d81', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:44:10', '2020-09-04 01:44:10', '2021-09-04 01:44:10'),
('109b1dfae100dbe875172ec3a47f4ec912cacec089525f06eb8b92dae1103e8c72c2fb96f6f66370', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:28:47', '2020-09-04 01:28:47', '2021-09-04 01:28:47'),
('11fcc4d29e6f0381a4540e16e9baa823c7236c001debfb3f527adf803af341fd0eed7d814826b7d2', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:04:02', '2020-09-04 02:04:02', '2021-09-04 02:04:02'),
('12c9b8896741c8afbcc18d81561e9947bf93b73ca3d1d2d646bafa5b036c923040b5da100384ff49', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:52:17', '2020-09-04 01:52:17', '2021-09-04 01:52:17'),
('164d2c1b20b50b043399958a942e6e161b23a8ded4a401d3fde741ab22dd990a415a4d8ec8f3b2af', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:48:08', '2020-09-04 01:48:08', '2021-09-04 01:48:08'),
('200b7b584b03abdef4b4acbf0627dcfd099b56d7063bcb37f92b6a31386cfe0989e240cc19f9e2e7', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:26:57', '2020-09-04 01:26:57', '2021-09-04 01:26:57'),
('30e62f4e2487fa7e995bf47fd4c7c57389e0410c67646918ff68d810a6d7919f8e20476912c2388e', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:51:36', '2020-09-04 01:51:36', '2021-09-04 01:51:36'),
('343278ee1c55d05be31b01cdf782695cdbbe6ab1d670c5d03d07caad38add8fc54f826ec790dfb8c', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:50:40', '2020-09-04 01:50:40', '2020-09-11 01:50:41'),
('3ae034135d7fbff2a0690622d14383aeebe25b7099a67ce98a7f6e5d4fb11f90e42df188f1fcb921', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:07:56', '2020-09-04 02:07:56', '2021-09-04 02:07:56'),
('3ca0cf9517273d637cb6ae93bf0072616679ae2275855ec9bf272c258006dea78d664d29eccb03de', 123, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:52:10', '2020-09-04 01:52:10', '2021-09-04 01:52:10'),
('3e68cfb42bb8b98f14a8bd9e9f66df75c1f8d74e88fa23faf8d83a838525870aa65f1988070a58b1', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:33:11', '2020-09-04 01:33:11', '2021-09-04 01:33:11'),
('41781f703a01826eed71608b09dd90e34f98c93d47e01764866bbade40d5160209635eb85f61758e', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:27:25', '2020-09-04 01:27:25', '2021-09-04 01:27:25'),
('4222b58afed26cfc8e20a12fdaae21b30beb434cc0bb09596109702c526c0f5dc14504c54b94734d', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:18:05', '2020-09-04 02:18:05', '2021-09-04 02:18:05'),
('42d16caad186dc88239d3b6e60d838a11bb59434713d2bded4188687a30f69cf739be138e44c692a', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:37:00', '2020-09-04 01:37:00', '2021-09-04 01:37:00'),
('48b47d91c207fbc2924f42ebd25919b73a087d0b717d4359bd93e6e1e7fac7b9e9dbc8579f5c8d0a', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:47:31', '2020-09-04 01:47:31', '2021-09-04 01:47:31'),
('4e0375411848865e13f6260b22e479e22d031c1af9be5d7a705d30c78373d4f31c84e2bae40014bd', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:59:14', '2020-09-04 02:59:14', '2021-09-04 02:59:14'),
('569bf2e4bd90753df995210a2ff9f00edaa7b25e6ae98d1bf2c7fceb28857df2e779cf334b53b53d', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:57:42', '2020-09-04 01:57:42', '2021-09-04 01:57:42'),
('5d3fc873a7a8d5e1e74fc9353b79f891b34116425f91beed4676e3b11530ef163567f93126b6f498', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:00:00', '2020-09-04 02:00:00', '2021-09-04 02:00:00'),
('703b47aa29703ed56269c94a9d222cc61e9844c9253f676e7b1cf72a20dc6d62546b83497c271dc8', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:00:15', '2020-09-04 02:00:15', '2021-09-04 02:00:15'),
('7458e785769b6425188109fcb306d932e24592cdc1eb1666a4ad857ad7cc9eb65aabe7c43caf4522', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 03:38:00', '2020-09-04 03:38:00', '2020-09-11 03:38:00'),
('779d1eb9d330c69fb1f998e1bde7da8080ad2a7de5ed008be676c54c368cfc7d95d1623f0c65cef4', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:21:21', '2020-09-04 02:21:21', '2021-09-04 02:21:21'),
('7c55261d4a6d68f8a35dbc109000b78a88668cad59ab66e41b9a593c933040558f7e42bf7cfaf4be', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:51:19', '2020-09-04 01:51:19', '2021-09-04 01:51:19'),
('7e63f09acf91d40d6a9421932f05c12e8fe3036dd21bc4e8fbb4bc4f8a3a0ccaa8ce283c563f09f2', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:47:42', '2020-09-04 01:47:42', '2021-09-04 01:47:42'),
('84427b869098d6eecce95a2e067838806d3504512a6030776e354435ed7740429799c9f94b473cfa', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:03:35', '2020-09-04 02:03:35', '2021-09-04 02:03:35'),
('8775273a24d571c61116d6bf94e12ccd35f794768839aa954f80c63b2c8c08c484c75820d9b626a1', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:56:25', '2020-09-04 01:56:25', '2021-09-04 01:56:25'),
('8aeff203a79cbb64fd9f60836cedc6960e0936b1cce0739eb578f31133deb6f60bb361220981bf6d', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:10:35', '2020-09-04 02:10:35', '2021-09-04 02:10:35'),
('8e5d16a74d91dac18d70d359af7b43489475548e84af1cf3e9b68cdc2450d99317891987ac27e7d6', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:55:54', '2020-09-04 01:55:54', '2021-09-04 01:55:54'),
('91a61a2211e2362837517f16e72c95fcf436ec2d143d34de893cf72a0769dd0070b18a2c0d145a0a', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:10:26', '2020-09-04 02:10:26', '2021-09-04 02:10:26'),
('97be328c788a5faa8706f188de55a566ba1ff2bd8e6cbb021c41f9b9869b4af2047d6d09a72fd364', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:53:03', '2020-09-04 01:53:03', '2021-09-04 01:53:03'),
('9dd8a93874ce2542629d009430c551f74df05d4726b37cb00b28901cb7bb05887de0f1acc0596fc4', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:07:11', '2020-09-04 02:07:11', '2021-09-04 02:07:11'),
('a04899b4372abdbefa2c23de9761250a85617741453994c0aa08f7f8eda1b9c7c784a46b97fa36b9', 87, 3, 'Personal Access Token', '[]', 0, '2020-09-01 03:29:55', '2020-09-01 03:29:55', '2020-09-08 03:29:55'),
('a7e20e35f7f10c9e4351d247f806835b14020f0b7fc3933b1bdd8444ff7461d36f1147382e3f3aa5', 87, 3, 'Personal Access Token', '[]', 0, '2020-09-01 03:30:05', '2020-09-01 03:30:05', '2020-09-08 03:30:05'),
('aa152e3d3d49ae2846987f7f508c1a0dfc702e25ec86eb6a441d3471bef378e5526f0e9fdba47b34', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:43:13', '2020-09-04 02:43:13', '2021-09-04 02:43:13'),
('ade3a1af7244728c62da137cd1ab4525db121d8703269e84d6a27d96943150191033518fbe9e2da5', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:18:32', '2020-09-04 02:18:32', '2021-09-04 02:18:32'),
('ae2c2de51714706dee919c72c065bb1c6274ee49dbc5d6694726d70997b6f83d75ae46d29b075b49', 87, 3, 'Personal Access Token', '[]', 0, '2020-09-01 03:57:40', '2020-09-01 03:57:40', '2020-09-08 03:57:40'),
('b6c735c6f28d177a46ff4735b7fa96583a1ef3d92b4adde7be8ebf406b0ec0197b56c43e03952870', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:42:28', '2020-09-04 02:42:28', '2021-09-04 02:42:28'),
('bcfecb5578e8a077940b84d75ccadfa769262547be89059645bdef1b1c9e4e9711a76a3a06e07cb8', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:55:36', '2020-09-04 01:55:36', '2021-09-04 01:55:36'),
('bf22ede031d2de706377010971e248913ff910bf978aa89f5de684ec5999c79aef16fa2a6392da0a', 132, 3, 'Personal Access Token', '[]', 0, '2020-09-15 02:45:10', '2020-09-15 02:45:10', '2021-09-15 02:45:10'),
('c265319b58ce7c6e363ad52851ac2cf4889d8edbb7c84557f8ddc928301254211d6e096237016c31', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:23:41', '2020-09-04 01:23:41', '2020-09-11 01:23:41'),
('c3ce3d608744c34190bbfd745fa7bc75280ac0bb5370627fcfc86dbc791f458bf9db79ee46ee2a88', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:42:33', '2020-09-04 02:42:33', '2021-09-04 02:42:33'),
('c72a56a3089872acf50e69700df9db25f73a63c96b1bc703cbf592338cc9331d06be23f980f12a41', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:59:42', '2020-09-04 02:59:42', '2021-09-04 02:59:42'),
('cc26f6780c48ee56b314d9d0850149578ab2cf491aaf4566a70de0fb0923af98b30cac15a313e697', 87, 3, 'Personal Access Token', '[]', 1, '2020-09-01 03:38:39', '2020-09-01 03:38:39', '2020-09-08 03:38:39'),
('cd299e5cdc4c89a8367b36a995871bf81e50a8a0b55030ecda17a973484eac527c5dda88ee954724', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:06:14', '2020-09-04 02:06:14', '2020-09-11 02:06:14'),
('d0219a048bb923ed892f97804963d568bdc6fc7319de3099761d7a9ad6c3ab54a6e60b2d9aa9ab3e', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:47:56', '2020-09-04 01:47:56', '2021-09-04 01:47:56'),
('d03fa0bea66f7ece5ade92676cf657cb1b3eb0a6d08ad5f5c114bd598071a6e0cdb591ec76772605', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:03:58', '2020-09-04 02:03:58', '2021-09-04 02:03:58'),
('d56e4824ad6005701b50f99e1a7a3dbee60c08f9cf3fb8d20daf1cab58207adecdfd5ff58d203bd2', 87, 3, 'Personal Access Token', '[]', 0, '2020-09-01 03:13:43', '2020-09-01 03:13:43', '2020-09-08 03:13:43'),
('d95ebdce0fe96b75e6d391c39868e092b6682da356e1ca5e7e7cb39c8730015f480d854ee6e6f3ba', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:52:56', '2020-09-04 01:52:56', '2021-09-04 01:52:56'),
('dcddc3b08fed92977217cd5d5cf85db2270faffc63fec43789f808079f5d78da7dcd6b8a96534178', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:23:53', '2020-09-04 01:23:53', '2021-09-04 01:23:53'),
('dfe602414b8362e6d6d5a8d8582e28978f0ea1ba264254f3189c20d7bc7cfe5ce4eb7d0baee9b68d', 88, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:21:00', '2020-09-04 02:21:00', '2021-09-04 02:21:00'),
('e01fede5502f1ffa02c5357413aa63c7ce10eb6f5a9be5b80a7eb188cd96a96ed1aae995768b0e4e', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:27:06', '2020-09-04 01:27:06', '2021-09-04 01:27:06'),
('ec0701deeaef0a3249f894ee8dd04f49bfdcf13e2788f7a326260dc97a200ae9b1e73b7008988ce9', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 03:38:08', '2020-09-04 03:38:08', '2020-09-11 03:38:08'),
('ee40f5e71d3d0bf1a030cba40a64ac4b3abd4c0e2242cdcd0788e351852361f73db2dd800601de8e', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:57:46', '2020-09-04 01:57:46', '2021-09-04 01:57:46'),
('f187fb80fd45a766c807af76afae290172a98e617d04d69f8e0803f1a68cae41db5669a70009845b', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:22:42', '2020-09-04 02:22:42', '2020-09-11 02:22:42'),
('fa9efccd0502b32d8f5ad5f2ecb3280bc1125b52635c0da580ad39e387d841a706197ed43d4443d7', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:56:12', '2020-09-04 01:56:12', '2021-09-04 01:56:12'),
('fb9b9f921f219925f2b1b535331cc72b9c069dd9c671e727073dee37208fe61a6eb24c4791ae6a5c', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 01:39:11', '2020-09-04 01:39:11', '2021-09-04 01:39:11'),
('ff70c140ea0348b45c730e0e543d66d1fc286b60492b315ea3d6b5b14e621b099cbaf9aee690384b', 80, 3, 'Personal Access Token', '[]', 0, '2020-09-04 02:20:38', '2020-09-04 02:20:38', '2021-09-04 02:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Laravel Personal Access Client', 'PI9EscqsuqNmeQTlcWQ5IRuHWb7DT7pZKe2cNfsT', NULL, 'http://localhost', 1, 0, 0, '2020-09-01 03:13:11', '2020-09-01 03:13:11'),
(4, NULL, 'Laravel Password Grant Client', 'YIlemhVqrLO9iSJ0FPYhAcGWtYH48xGNtv8M0AwJ', 'users', 'http://localhost', 0, 1, 0, '2020-09-01 03:13:11', '2020-09-01 03:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-08-28 03:19:12', '2020-08-28 03:19:12'),
(2, 3, '2020-09-01 03:13:11', '2020-09-01 03:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `potentials`
--

CREATE TABLE `potentials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `site_inspection_id` int(11) NOT NULL,
  `effective_system_size` decimal(15,2) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `potentials`
--

INSERT INTO `potentials` (`id`, `user_id`, `site_inspection_id`, `effective_system_size`, `reason`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(2, 133, 4, '2.42', '', '', 2, '2020-09-15 05:30:33', '2020-09-15 06:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `site_inspection_id` int(11) NOT NULL,
  `effective_system_size` decimal(15,2) NOT NULL,
  `discom_application` int(11) NOT NULL DEFAULT 0,
  `finance_application` int(11) NOT NULL DEFAULT 0,
  `components` int(11) NOT NULL DEFAULT 0,
  `installation` int(11) NOT NULL DEFAULT 0,
  `compliance` int(11) NOT NULL DEFAULT 0,
  `discom_commissioning_application` int(11) NOT NULL DEFAULT 0,
  `commissioned` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `id_user`, `site_inspection_id`, `effective_system_size`, `discom_application`, `finance_application`, `components`, `installation`, `compliance`, `discom_commissioning_application`, `commissioned`, `created_at`, `updated_at`) VALUES
(5, 133, 4, '2.42', 1, 1, 1, 1, 1, 1, 1, '2020-09-15 06:41:51', '2020-09-16 09:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `project_tracker`
--

CREATE TABLE `project_tracker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `site_inspection_scheduled` int(11) NOT NULL DEFAULT 0,
  `site_inspection_completed` int(11) NOT NULL DEFAULT 0,
  `project_accepted` int(11) NOT NULL DEFAULT 0,
  `discom_application` int(11) NOT NULL DEFAULT 0,
  `finance_application` int(11) NOT NULL DEFAULT 0,
  `components_received` int(11) NOT NULL DEFAULT 0,
  `installation` int(11) NOT NULL DEFAULT 0,
  `compliance` int(11) NOT NULL DEFAULT 0,
  `discom_commissioning_application` int(11) NOT NULL DEFAULT 0,
  `commissioned` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_tracker`
--

INSERT INTO `project_tracker` (`id`, `id_user`, `site_inspection_scheduled`, `site_inspection_completed`, `project_accepted`, `discom_application`, `finance_application`, `components_received`, `installation`, `compliance`, `discom_commissioning_application`, `commissioned`, `created_at`, `updated_at`) VALUES
(2, 132, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2020-09-15 05:03:21'),
(3, 133, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-09-15 02:47:07', '2020-09-16 09:14:39'),
(11, 136, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020-09-15 03:38:37', '2020-09-15 03:38:37'),
(13, 134, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(14, 135, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(15, 142, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(16, 141, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020-09-16 02:48:59', '2020-09-16 02:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Goa'),
(6, 'Gujarat'),
(7, 'Haryana'),
(8, 'Himachal Pradesh'),
(9, 'Jammu and Kashmir'),
(10, 'Karnataka'),
(11, 'Kerala'),
(12, 'Madhya Pradesh'),
(13, 'Maharashtra'),
(14, 'Manipur'),
(15, 'Megalaya'),
(16, 'Mizoram'),
(17, 'Nagaland'),
(18, 'Odisha'),
(19, 'Punjab'),
(20, 'Rajasthan'),
(21, 'Sikkim'),
(22, 'Tamil Nadu'),
(23, 'Tripura'),
(24, 'Uttar Pradesh'),
(25, 'West Bengal'),
(26, 'Andaman and Nico.In.'),
(27, 'Chandigarh'),
(28, 'Dadra and Nagar Hav.'),
(29, 'Daman and Diu'),
(30, 'Delhi'),
(31, 'Lakshadweep'),
(32, 'Pondicherry'),
(33, 'Chattisgarh'),
(34, 'Jharkhand'),
(35, 'Uttarakhand'),
(36, 'Telangana');

-- --------------------------------------------------------

--
-- Table structure for table `status_potentials`
--

CREATE TABLE `status_potentials` (
  `id` int(11) NOT NULL,
  `name_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_potentials`
--

INSERT INTO `status_potentials` (`id`, `name_status`) VALUES
(1, 'Negotiation/Review'),
(2, 'Closed Won'),
(3, 'Closed Lost'),
(4, 'Closed Lost to Competition');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `active`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(88, 'Admin', 'admin@gmail.com', '123456789', 1, NULL, '$2y$10$sf0XjPXz9X8lWQ7vvFG7pebmg9HAb96uoAINwhP8olCqRfHgBziTG', 1, NULL, '2020-08-31 01:21:45', '2020-08-31 01:21:45'),
(132, 'Test 1', 'test1@demo.com', '9883443344', 1, NULL, '$2y$10$3DYWtM9BIimeq66mYiPJuejdAmM2zHA0QPaBpcA0L0p5jVxj6xoPq', 4, NULL, '2020-09-15 02:27:54', '2020-09-15 02:27:54'),
(133, 'Nguyen Tuan Anh', 'nguyenanh.it.4198@gmail.com', '7986576783', 1, NULL, '$2y$10$67bXCgQ6rOEVw6FVEuQ8a.1RTVxbLA4TbogbnQ3YaHKYcP3MNJoyC', 4, NULL, '2020-09-15 02:45:28', '2020-09-15 02:47:07'),
(134, 'Nguyen Tuan Anh', 'aloteam@gmail.com', '7986576783', 1, NULL, '$2y$10$qyH8iyBgqPmtHDqeogN6m.U9obfUJfk1KdYLwtnDijZHzQA/7lHPa', 4, NULL, '2020-09-15 02:55:31', '2020-09-15 02:55:31'),
(135, 'testwebsite', 'test_mail@gmail.com', '7986576783', 1, NULL, '$2y$10$lzw1JmAYbNv0YgnmD0.QMeNCcfP9CxFKMLUF1ENSylERGhleyv/.e', 4, NULL, '2020-09-15 02:57:26', '2020-09-15 02:57:26'),
(136, 'Test 2', 'hoanghuan3010955@gmail.com', '9883443344', 1, NULL, '$2y$10$sU7d/j7f31ODqBaigFM/uOgjpVnnGRG0OeayewQLaYKoF70IXQ.D2', 4, NULL, '2020-09-15 03:27:18', '2020-09-15 03:27:40'),
(138, 'Installer', 'installer@gmail.com', '7986576783', 1, NULL, '$2y$10$65fkMHG/nggiKQ87D8BzI.8nbMZc4AYiYJIodlmm64R0nV.lcKGw.', 3, NULL, '2020-09-15 07:02:38', '2020-09-15 07:02:38'),
(139, 'Bluesky', 'demo1@demo.com', '9883443344', 0, NULL, '$2y$10$KMrzTl/3pV4BkFfI/8DGV.8/J/68C0aN87p0AbmUV5Mk8RPd.rIFu', 4, NULL, '2020-09-16 02:14:06', '2020-09-16 02:14:06'),
(140, 'Bluesky', 'hoanghuan021@gmail.com', '9883443344', 0, NULL, '$2y$10$fJuPPGA/HkdJ.sJED2GCd.NJKles7LbfjkHpAXHxiRiqoUx.NOoH6', 4, NULL, '2020-09-16 02:21:55', '2020-09-16 02:21:55'),
(141, 'Bluesky', 'hoanghuan301095@gmail.com', '9883443344', 1, NULL, '$2y$10$sf0XjPXz9X8lWQ7vvFG7pebmg9HAb96uoAINwhP8olCqRfHgBziTG', 4, NULL, '2020-09-16 02:24:11', '2020-09-16 02:48:59'),
(142, 'Piyush Jain', 'jain.piyush888+1@gmail.com', '9982080402', 1, NULL, '$2y$10$npBa.tT3VoYJrpoHEkQ6iumHOMehkDSdZjNFuS1LLpicbalK3Fd3O', 4, NULL, '2020-09-16 02:38:03', '2020-09-16 02:39:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_application`
--
ALTER TABLE `commission_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compliance_application`
--
ALTER TABLE `compliance_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components_application`
--
ALTER TABLE `components_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_installer`
--
ALTER TABLE `data_installer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discom_application`
--
ALTER TABLE `discom_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discom_commissioning_application`
--
ALTER TABLE `discom_commissioning_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_application`
--
ALTER TABLE `finance_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection`
--
ALTER TABLE `inspection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installation_application`
--
ALTER TABLE `installation_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `potentials`
--
ALTER TABLE `potentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tracker`
--
ALTER TABLE `project_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_potentials`
--
ALTER TABLE `status_potentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;

--
-- AUTO_INCREMENT for table `commission_application`
--
ALTER TABLE `commission_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `compliance_application`
--
ALTER TABLE `compliance_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `components_application`
--
ALTER TABLE `components_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `data_installer`
--
ALTER TABLE `data_installer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discom_application`
--
ALTER TABLE `discom_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discom_commissioning_application`
--
ALTER TABLE `discom_commissioning_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finance_application`
--
ALTER TABLE `finance_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inspection`
--
ALTER TABLE `inspection`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `installation_application`
--
ALTER TABLE `installation_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `potentials`
--
ALTER TABLE `potentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_tracker`
--
ALTER TABLE `project_tracker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `status_potentials`
--
ALTER TABLE `status_potentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
