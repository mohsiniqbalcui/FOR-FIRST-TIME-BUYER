-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 07:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_active_log`
--

CREATE TABLE `tbl_active_log` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_active_log`
--

INSERT INTO `tbl_active_log` (`id`, `user_id`, `date_time`) VALUES
(1, 1, '1635568304');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'admin', 'viaviwebtech@gmail.com', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `category_image` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cid`, `category_name`, `category_image`, `status`) VALUES
(3, 'Superior Rooms', '59031_Superior-Room_tiny.jpg', 1),
(4, 'Club Deluxe Room', '70090_Crystal-Club-Deluxe-Room--Twin-Bed-.jpg', 1),
(5, 'Executive Suite', '13367_executive-suite-city-view-living-room-hotel-arts-barcelona_mob.jpg', 1),
(7, 'Banquets & Meetings', '57833_MG_0062-1.jpg', 1),
(8, 'Hotel Tour', '10070_177400959.jpg', 1),
(11, 'Dining', '21265_TO Luxe Victoria Dining Webpage.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_list`
--

CREATE TABLE `tbl_contact_list` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `contact_email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `contact_phone` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `contact_subject` int(5) NOT NULL,
  `contact_msg` text CHARACTER SET utf8mb4 NOT NULL,
  `created_at` varchar(150) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_sub`
--

CREATE TABLE `tbl_contact_sub` (
  `id` int(5) NOT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_sub`
--

INSERT INTO `tbl_contact_sub` (`id`, `title`, `status`) VALUES
(1, 'Cleaning', 1),
(2, 'Service', 1),
(3, 'Food', 1),
(4, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_banner`
--

CREATE TABLE `tbl_home_banner` (
  `id` int(11) NOT NULL,
  `banner_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `banner_image` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `banner_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_home_banner`
--

INSERT INTO `tbl_home_banner` (`id`, `banner_name`, `banner_image`, `banner_status`) VALUES
(3, 'The Imperial Palace', '30367_2838344-The_imperial_palace_rajkot_Facade_image_0qkdwc.jpg', 1),
(4, 'Hotel Overview', '56958_regal4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `hotel_info` text CHARACTER SET utf8mb4 NOT NULL,
  `hotel_phone` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `hotel_email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `hotel_address` text CHARACTER SET utf8mb4 NOT NULL,
  `hotel_lat` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `hotel_long` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `hotel_amenities` text CHARACTER SET utf8mb4 NOT NULL,
  `facebook_url` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `instagram_url` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `twitter_url` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `whatsapp_url` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `youtube_url` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `website_url` varchar(150) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`id`, `hotel_name`, `hotel_info`, `hotel_phone`, `hotel_email`, `hotel_address`, `hotel_lat`, `hotel_long`, `hotel_amenities`, `facebook_url`, `instagram_url`, `twitter_url`, `whatsapp_url`, `youtube_url`, `website_url`) VALUES
(1, 'The Imperial Palace', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '+91 9227777522', 'info@viaviweb.com', 'Dr Yagnik Rd, Jagnath Plot, Rajkot, Gujarat 360001', '22.293510', '70.800480', 'Gym,Cellar,Wine Cellar, Washer,Dryer,Storage,Fireplace,Front Yard,Deck,Balcony', 'https://www.facebook.com/viaviweb/', 'https://www.instagram.com/viaviwebtech/', 'https://twitter.com/viaviwebtech/', 'https://api.whatsapp.com/send?phone=+919227777522', 'https://www.youtube.com/user/viaviwebtech', 'http://www.viaviweb.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `rate` int(11) NOT NULL,
  `dt_rate` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `room_id`, `user_id`, `ip`, `rate`, `dt_rate`, `message`) VALUES
(1, 6, 1, '', 5, '2021-10-28 22:46:06', 'Nice room');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `room_description` text CHARACTER SET utf8mb4 NOT NULL,
  `room_rules` text CHARACTER SET utf8mb4 NOT NULL,
  `room_amenities` text CHARACTER SET utf8mb4 NOT NULL,
  `room_price` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `room_image` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `total_rate` int(11) NOT NULL DEFAULT 0,
  `rate_avg` float(11,2) NOT NULL DEFAULT 0.00,
  `room_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`id`, `room_name`, `room_description`, `room_rules`, `room_amenities`, `room_price`, `room_image`, `total_rate`, `rate_avg`, `room_status`) VALUES
(3, 'Superior Rooms', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<pre>\r\n<strong>Check-in:-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n<strong>Check-out:-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n<strong>Luggage Storage :-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n<strong>Cancellation/prepayment:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>\r\n\r\n<pre>\r\n<strong>Children and Extra Beads:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>\r\n\r\n<pre>\r\n<strong>Additional Info:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>', 'Queen / Twin Bed,Individually controlled air conditioning,Direct access internet,LCD television,Electronic door locks,Satellite entertainment & new channels,Fully stocked minibar,Direct IDD telephone with voicemail,Laptop compatible digital safe,CD / DVD Player,Marble flooring,Data port on telephone,Power socket on bedside and desk,Separate luggage area with luggage rack,Daily complimentary newspaper', 'INR 3500/-', '29012_Superior-Room_tiny.jpg', 0, 0.00, 1),
(4, 'Club Deluxe Room', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<pre>\r\n<strong>Check-in:-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n<strong>Check-out:-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n<strong>Luggage Storage :-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n<strong>Cancellation/prepayment:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>\r\n\r\n<pre>\r\n<strong>Children and Extra Beads:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>\r\n\r\n<pre>\r\n<strong>Additional Info:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>', 'Double / twin bed,Individually controlled air conditioning,Direct access internet,LCD television,Electronic door locks,Satellite entertainment & news channels,Fully stocked minibar,Direct IDD telephone with voicemail,Laptop compatible digital safe,CD / DVD Player,Tea/Coffee maker,Marble / Carpet flooring,Data port on telephonem,Power socket on,bedside and desk,Separate luggage area with luggage rack,Daily complimentary newspaper,Bathroom:,Ensuite bathroom,Fully stocked bathroom amenities,Bath tubs,Cosmetic,mirror,Telephone,Hair Dryer,Weighing Scale,Power socket', 'INR 6000/-', '70193_Crystal-Club-Deluxe-Room--Twin-Bed-.jpg', 0, 0.00, 1),
(5, 'Executive Suite', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<pre>\r\n<strong>Check-in:-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n<strong>Check-out:-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n<strong>Luggage Storage :-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n<strong>Cancellation/prepayment:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>\r\n\r\n<pre>\r\n<strong>Children and Extra Beads:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>\r\n\r\n<pre>\r\n<strong>Additional Info:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>', 'Bed Room facilities include:,IDouble / twin bed,Individually controlled air conditioning,Direct access internet,LCD television,Electronic door locks,Satellite entertainment & news channels,Fully stocked minibar,Direct IDD telephone with voicemail,Laptop compatible digital safe,CD / DVD Player,Tea/Coffee maker,Marble / Carpet flooring,Data port on telephonem,Power socket on,bedside and desk,Separate luggage area with luggage rack,Daily complimentary newspaper,Living Room facilities include:,Dining &working table,Additional LCD TV,Large executive working desk,Spacious & comfortable seating,Bathroom:,Ensuite bathroom,Fully stocked bathroom amenities,Bath tubs,Cosmetic,mirror,Telephone,Hair Dryer,Weighing Scale,Power socket', 'INR 9000/-', '32963_executive-suite-city-view-living-room-hotel-arts-barcelona_mob.jpg', 0, 0.00, 1),
(6, 'Exclusive the luxury hotel rooms', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<pre>\r\n <strong>Check-in:-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n <strong>Check-out:-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n <strong>Luggage Storage :-</strong>14:00-22:00</pre>\r\n\r\n<pre>\r\n <strong>Cancellation/prepayment:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>\r\n\r\n<pre>\r\n <strong>Children and Extra Beads:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>\r\n\r\n<pre>\r\n <strong>Additional Info:-</strong></pre>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula sem a malesuada rhoncus. Pellentesque ut dolor a dui porttitor porta lacinia non libero. Nunc volutpat arcu quis quam convallis molestie.</p>', 'Bed Room facilities include:,IDouble / twin bed,Individually controlled air conditioning,Direct access internet,LCD television,Electronic door locks,Satellite entertainment & news channels,Fully stocked minibar,Direct IDD telephone with voicemail,Laptop compatible digital safe,CD / DVD Player,Tea/Coffee maker,Marble / Carpet flooring,Data port on telephonem,Power socket on,bedside and desk,Separate luggage area with luggage rack,Daily complimentary newspaper,Living Room facilities include:,Dining &working table,Additional LCD TV,Large executive working desk,Spacious & comfortable seating,Bathroom:,Ensuite bathroom,Fully stocked bathroom amenities,Bath tubs,Cosmetic,mirror,Telephone,Hair Dryer,Weighing Scale,Power socket', 'INR 9000/-', '40685_a.jpg', 1, 5.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_gallery`
--

CREATE TABLE `tbl_room_gallery` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image_name` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_room_gallery`
--

INSERT INTO `tbl_room_gallery` (`id`, `room_id`, `image_name`) VALUES
(23, 5, '76306_tomaintf9d8cpqbnc1op.jpg'),
(26, 4, '6869_Premier-Room_tiny.jpg'),
(71, 3, '41751_10070_177400959.jpg'),
(72, 3, '66584_13367_executive-suite-city-view-living-room-hotel-arts-barcelona_mob.jpg'),
(73, 3, '93982_21265_TO-Luxe-Victoria-Dining-Webpage.jpg'),
(74, 6, '60739_a.jpg'),
(75, 6, '57312_b.jpg'),
(76, 6, '99055_c.jpg'),
(107, 19, '18602_21957_9680_Daily_Motion.jpg'),
(108, 19, '35401_31350_665_abc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `envato_buyer_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `envato_purchase_code` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `envato_buyer_email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `envato_purchased_status` int(1) NOT NULL DEFAULT 0,
  `package_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email_from` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `onesignal_app_id` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `onesignal_rest_key` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `app_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `app_logo` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `app_email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `app_version` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `app_author` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `app_contact` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `app_website` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `app_description` text CHARACTER SET utf8mb4 NOT NULL,
  `app_developed_by` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `app_privacy_policy` text CHARACTER SET utf8mb4 NOT NULL,
  `publisher_id` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `banner_ad_type` varchar(30) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'admob',
  `facebook_banner_ad_id` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `facebook_interstital_ad_id` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `interstital_ad_type` varchar(30) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'admob',
  `interstital_ad` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `interstital_ad_id` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `interstital_ad_click` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `banner_ad` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `banner_ad_id` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `app_faq` text CHARACTER SET utf8mb4 NOT NULL,
  `app_update_status` varchar(10) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'false',
  `app_new_version` double NOT NULL DEFAULT 1,
  `app_update_desc` text CHARACTER SET utf8mb4 NOT NULL,
  `app_redirect_url` text CHARACTER SET utf8mb4 NOT NULL,
  `cancel_update_status` varchar(10) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'false',
  `api_page_limit` int(11) NOT NULL DEFAULT 5,
  `api_cat_order_by` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `api_cat_post_order_by` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `app_terms_conditions` text CHARACTER SET utf8mb4 NOT NULL,
  `account_delete_intruction` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `envato_buyer_name`, `envato_purchase_code`, `envato_buyer_email`, `envato_purchased_status`, `package_name`, `email_from`, `onesignal_app_id`, `onesignal_rest_key`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `publisher_id`, `banner_ad_type`, `facebook_banner_ad_id`, `facebook_interstital_ad_id`, `interstital_ad_type`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `banner_ad`, `banner_ad_id`, `app_faq`, `app_update_status`, `app_new_version`, `app_update_desc`, `app_redirect_url`, `cancel_update_status`, `api_page_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `app_terms_conditions`, `account_delete_intruction`) VALUES
(1, '', '', '-', 0, 'com.example.singlehotel', 'info@viaviweb.in', '', '', 'Single Hotel App', 'round_app_ic96.png', 'user.viaviweb@gmail.com', '1.0.0', 'Viavi Webtech', '+91 9227777522', 'www.viaviweb.com', '<p>As Viavi Webtech is finest offshore IT company which has expertise in the below mentioned all technologies and our professional, dedicated approach towards our work has always satisfied our clients as well as users. We have reached to this level because of the dedication and hard work of our 10+ years experienced team as well as new ideas of freshers, they always provide the best solutions. Here are the promising services served by Viavi Webtech.</p>\r\n\r\n<p>Contact on Skype &amp; Email for more information.</p>\r\n\r\n<p><strong>Skype ID:</strong> support.viaviweb <strong>OR</strong> viaviwebtech<br />\r\n<strong>Email:</strong> info@viaviweb.com <strong>OR</strong> viaviwebtech@gmail.com<br />\r\n<strong>Website:</strong> <a href=\"http://www.viaviweb.com\">http://www.viaviweb.com</a><br />\r\n<br />\r\n<strong>Our Portfolio:&nbsp;</strong><a href=\"https://codecanyon.net/user/viaviwebtech/portfolio?ref=viaviwebtech\">CodeCanyon</a></p>', 'Viavi Webtech', '<p><strong>We are committed to protecting your privacy</strong></p>\r\n\r\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n\r\n<p><strong>Information Collected</strong></p>\r\n\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n\r\n<p><strong>Information Use</strong></p>\r\n\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n\r\n<p><strong>Disclosing Information</strong></p>\r\n\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.</p>\r\n\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n\r\n<p><strong>Changes to this Policy</strong></p>\r\n\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>', 'pub-3940256099942544', 'facebook', 'IMG_16_9_APP_INSTALL#1021926538226185_1021935521558620', 'IMG_16_9_APP_INSTALL#1021926538226185_1021936091558563', 'facebook', 'true', 'ca-app-pub-3940256099942544/1033173712', '5', 'true', 'ca-app-pub-3940256099942544/6300978111', '<p><strong>We are committed to protecting your privacy</strong></p>\r\n\r\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n\r\n<p><strong>Information Collected</strong></p>\r\n\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n\r\n<p><strong>Information Use</strong></p>\r\n\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n\r\n<p><strong>Disclosing Information</strong></p>\r\n\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.</p>\r\n\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n\r\n<p><strong>Changes to this Policy</strong></p>\r\n\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>', 'false', 1, 'kindly you can update new version app', 'https://play.google.com/store/apps/developer?id=Viaan+Parmar', 'false', 5, 'cid', 'DESC', '<p><strong>We are committed to protecting your privacy</strong></p>\r\n\r\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n\r\n<p><strong>Information Collected</strong></p>\r\n\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n\r\n<p><strong>Information Use</strong></p>\r\n\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n\r\n<p><strong>Disclosing Information</strong></p>\r\n\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\r\n\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n\r\n<p><strong>Changes to this Policy</strong></p>\r\n\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>', '<p><strong>Contact&nbsp;</strong></p>\r\n\r\n<p><strong>Email :-&nbsp;&nbsp;</strong><strong>info@viaviweb.com</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_smtp_settings`
--

CREATE TABLE `tbl_smtp_settings` (
  `id` int(5) NOT NULL,
  `smtp_type` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_host` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_password` text CHARACTER SET utf8mb4 NOT NULL,
  `smtp_secure` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `port_no` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_ghost` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_gemail` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_gpassword` text CHARACTER SET utf8mb4 NOT NULL,
  `smtp_gsecure` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `gport_no` varchar(10) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_smtp_settings`
--

INSERT INTO `tbl_smtp_settings` (`id`, `smtp_type`, `smtp_host`, `smtp_email`, `smtp_password`, `smtp_secure`, `port_no`, `smtp_ghost`, `smtp_gemail`, `smtp_gpassword`, `smtp_gsecure`, `gport_no`) VALUES
(1, 'server', '', '', '', 'ssl', '465', 'smtp.gmail.com', '', '', 'ssl', '465');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `user_type` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `user_image` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `device_id` text CHARACTER SET utf8mb4 NOT NULL,
  `auth_id` text CHARACTER SET utf8mb4 NOT NULL,
  `player_id` text CHARACTER SET utf8mb4 NOT NULL,
  `is_duplicate` int(1) NOT NULL DEFAULT 0,
  `registration_on` varchar(200) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_type`, `name`, `email`, `password`, `phone`, `user_image`, `device_id`, `auth_id`, `player_id`, `is_duplicate`, `registration_on`, `status`) VALUES
(1, 'Normal', 'user', 'user.viaviweb@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '123456', NULL, '9dcd6d57b22ec6ad', '', '', 0, '1635503280', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallpaper`
--

CREATE TABLE `tbl_wallpaper` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image_date` date NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `total_views` int(11) NOT NULL DEFAULT 0,
  `wall_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wallpaper`
--

INSERT INTO `tbl_wallpaper` (`id`, `cat_id`, `image_date`, `image`, `total_views`, `wall_status`) VALUES
(11, 3, '2017-08-21', '33182_photo1jpg.jpg', 0, 1),
(12, 3, '2017-08-21', '63046_superior-room.jpg', 0, 1),
(15, 4, '2017-08-21', '97277_Club_Deluxe_Room_01Gajl.jpg', 0, 1),
(16, 4, '2017-08-21', '51340_club-deluxe-room-500x500.png', 0, 1),
(18, 5, '2017-08-21', '93163_the-imperial-palace-rajkot-980-20.jpg', 0, 1),
(19, 5, '2017-08-21', '2584_suites.jpg', 0, 1),
(29, 7, '2017-08-21', '22120_meetings.jpg', 0, 1),
(34, 8, '2017-08-21', '52659_hdefault.jpg', 0, 1),
(39, 11, '2017-08-22', '60285_shamiana.jpg', 0, 1),
(62, 7, '2020-09-17', '23164_property_6.jpg', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_active_log`
--
ALTER TABLE `tbl_active_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_contact_list`
--
ALTER TABLE `tbl_contact_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_sub`
--
ALTER TABLE `tbl_contact_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_home_banner`
--
ALTER TABLE `tbl_home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room_gallery`
--
ALTER TABLE `tbl_room_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_smtp_settings`
--
ALTER TABLE `tbl_smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wallpaper`
--
ALTER TABLE `tbl_wallpaper`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_active_log`
--
ALTER TABLE `tbl_active_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_contact_list`
--
ALTER TABLE `tbl_contact_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact_sub`
--
ALTER TABLE `tbl_contact_sub`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_home_banner`
--
ALTER TABLE `tbl_home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_room_gallery`
--
ALTER TABLE `tbl_room_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_smtp_settings`
--
ALTER TABLE `tbl_smtp_settings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wallpaper`
--
ALTER TABLE `tbl_wallpaper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
