-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2020 at 02:19 PM
-- Server version: 5.7.29
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cypherso_cpxglobal`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `contact1` text COLLATE utf8_unicode_ci NOT NULL,
  `contact2` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about`, `contact1`, `contact2`) VALUES
(1, 'About Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.', 'contact us Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.', 'contact us 2 Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.Lorem ipsum is simply a dummy text.');

-- --------------------------------------------------------

--
-- Table structure for table `app_routes`
--

CREATE TABLE `app_routes` (
  `id` bigint(20) NOT NULL,
  `slug` varchar(192) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'blogpost',
  `resource_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_routes`
--

INSERT INTO `app_routes` (`id`, `slug`, `controller`, `type`, `resource_id`) VALUES
(1, 'work', 'portfolio', 'blogpost', 0),
(2, 'privacy-policy', 'page/cms/1', 'blogpost', 0),
(6, 'waranty-desclaimer', 'page/cms/1', 'blogpost', 0),
(5, 'Top-5-Raid-Dulla-Bagga-at-Kabaddi-Tournament', 'blog/detail/1', 'blogpost', 0),
(7, 'certifications', 'page/cms/9', 'cms', 9),
(8, 'why', 'page/cms/10', 'cms', 10),
(9, 'mission', 'page/cms/11', 'cms', 11),
(10, 'global_presence', 'page/cms/12', 'cms', 12),
(11, 'business-development', 'page/cms/13', 'cms', 13),
(12, 'product-development', 'page/cms/14', 'cms', 14),
(13, 'business-innovation', 'page/cms/15', 'cms', 15),
(14, 'process-optimization', 'page/cms/16', 'cms', 16),
(15, 'markete-analysis', 'page/cms/17', 'cms', 17),
(16, 'why-membership', 'page/cms/18', 'cms', 18),
(17, 'membership-categories', 'page/cms/19', 'cms', 19),
(18, 'membership-benefits', 'page/cms/20', 'cms', 20),
(19, 'cylinder-quality-management', 'page/cms/21', 'cms', 21),
(20, 'doctor-blade-print-management', 'page/cms/22', 'cms', 22),
(21, 'eco-printing-by-pollution-prevention', 'page/cms/23', 'cms', 23),
(22, 'effective-colors-management', 'page/cms/24', 'cms', 24),
(23, 'excellence-in-lean-print-manufacturing', 'page/cms/25', 'cms', 25),
(24, 'excellence-in-flexographic-printing', 'page/cms/26', 'cms', 26),
(25, 'excellence-in-gravure-printing', 'page/cms/27', 'cms', 27),
(26, 'excellence-in-offset-printing', 'page/cms/28', 'cms', 28),
(27, 'flexoplate-quality-management', 'page/cms/29', 'cms', 29),
(28, 'food-safety-packaging-materials', 'page/cms/30', 'cms', 30),
(29, 'graphic-design-for-non-designer', 'page/cms/31', 'cms', 31),
(30, 'hazardous-chemicals-management', 'page/cms/32', 'cms', 32),
(31, 'paper-quality-management', 'page/cms/33', 'cms', 33),
(32, 'prepress-and-packaging-design', 'page/cms/34', 'cms', 34),
(33, 'print-automation-and-digitalization', 'page/cms/35', 'cms', 35),
(34, 'print-quality-management', 'page/cms/36', 'cms', 36),
(35, 'printing-process-equipment-validation', 'page/cms/37', 'cms', 37),
(36, 'uht-processing-and-aseptic-packaging', 'page/cms/38', 'cms', 38),
(37, 'certifications-overview', 'page/cms/39', 'cms', 39),
(38, 'certification-process', 'page/cms/40', 'cms', 40),
(39, 'certifications-benefits', 'page/cms/41', 'cms', 41),
(40, 'eligibility-requirments', 'page/cms/42', 'cms', 42),
(41, 'application-payment', 'page/cms/43', 'cms', 43),
(42, 'complaint-process', 'page/cms/44', 'cms', 44),
(43, 'best-machine-operator-award', 'page/cms/45', 'cms', 45),
(44, 'award-eligibility', 'page/cms/46', 'cms', 46),
(45, 'selection-criteria', 'page/cms/47', 'cms', 47),
(46, 'benefits-of-awards', 'page/cms/48', 'cms', 48),
(47, 'application-process', 'page/cms/49', 'cms', 49),
(48, 'Bisphenol-A-and-Consumer-Safety', 'blog/detail/2', 'blogpost', 0),
(49, 'Bisphenol-A-and-European-Legislation', 'blog/detail/3', 'blogpost', 0),
(50, 'DOCTOR-BLADE-AND-UNIFORM-INK-METERING', 'blog/detail/4', 'blogpost', 0),
(51, 'Food-Contact-Materials-Guidelines', 'blog/detail/5', 'blogpost', 0),
(52, 'INTRODUCTION-TO-CYNLINDER-ENGRAVING', 'blog/detail/6', 'blogpost', 0),
(53, 'historyb', 'page/cms/52', 'cms', 52),
(54, 'BISPHENOL-A-AND-CONSUMER-SAFETY', 'eblog/detail/7', 'blogpost', 0),
(55, 'Sun-Chemical-owner-to-buy-BASF-pigments-business', 'blog/detail/1', 'blogpost', 0),
(56, 'SILCO---COATING-ADDITIVES', 'blog/detail/2', 'blogpost', 0),
(57, 'Industrial-Wax-Market-Worth-$12,556.8-Million-by-2026:-PMR', 'blog/detail/3', 'blogpost', 0),
(58, 'EuPIA-Updates-Suitability-List-of-Photoinitiators,-Photosynergists-for-Food-Contact-Materials', 'blog/detail/4', 'blogpost', 0),
(59, 'Digital-vs.-Offset-Printing', 'eblog/detail/8', 'blogpost', 0),
(60, '-Digital-vs.-Offset-Printing', 'eblog/detail/9', 'blogpost', 0),
(61, 'Digital-vs.-Offset-Printing', 'eblog/detail/10', 'blogpost', 0),
(62, 'k', 'eblog/detail/11', 'blogpost', 0),
(63, 'Learn-English-in-50-mins', 'eblog/detail/12', 'blogpost', 0),
(64, 'Digital-vs.-Offset-Printing10', 'eblog/detail/13', 'blogpost', 0),
(65, 'DIGITALIZATION', 'eblog/detail/14', 'blogpost', 0),
(66, 'Printing-Techniques', 'eblog/detail/15', 'blogpost', 0),
(67, 'Intake-of-Dairy-Milk-Is-Associated-With-a-Greater-Risk-of-Breast-Cancer-in-Women', 'blog/detail/5', 'blogpost', 0),
(68, 'Coronavirus:-New-York-reaches-highest-death-toll-in-single-day-|-Nine-News-Australia', 'blog/detail/6', 'blogpost', 0),
(69, 'New-York-City-Has-Nearly-1-In-4-Of-All-COVID-19-Cases-in-US-|-NBC-Nightly-News', 'blog/detail/7', 'blogpost', 0),
(70, 'New-York-City-Has-Nearly-1-In-4-Of-All-COVID-19-Cases-in-US-|-NBC-Nightly-News', 'blog/detail/8', 'blogpost', 0),
(71, 'The-future-of-packaging', 'blog/detail/9', 'blogpost', 0),
(72, 'Bosch-Packaging-Technology,-Inc.', 'blog/detail/10', 'blogpost', 0),
(73, 'Nestle-CEO:-We\'re-committed-to-recyclable-packaging-by-2025', 'blog/detail/11', 'blogpost', 0),
(74, 'The-market-has-not-reached-a-bottom-yet-but-we\'re-going-down-at-a-slower-rate:-Economist-El-Erian', 'blog/detail/12', 'blogpost', 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_session`
--

CREATE TABLE `app_user_session` (
  `id` int(11) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_users`
--

CREATE TABLE `archive_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(1) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL COMMENT 'direct office no',
  `lang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_users`
--

INSERT INTO `archive_users` (`id`, `user_id`, `user_type`, `name`, `email`, `address`, `phone`, `lang`) VALUES
(8, 15, 2, 'Gracia C', 'graciachannel@gmail.com', '2411 molton way, windsor mill. MD 21244', '4107629676', 'AF'),
(9, 17, 2, 'Olayiwola Iyanuoluwa', 'ayomideolayiwola00@gmail.com', '', '08146928165', 'EN'),
(10, 16, 2, 'Aloednut Williams', 'olatundeokikiola010@gmail.com', '', '08155001427', 'EN'),
(11, 7, 2, 'waseem afzal', 'ceo.cyphersol@gmail.com', '2 house 62b model colony', '3417090031', 'AR'),
(12, 24, 2, 'Kenneth smoss', 'kennethsmoss2@gmail.com', '', '08057810036', 'EN'),
(13, 6, 2, 'Ebenezer Olarewaju', 'olebint001__@gmail.com', '3602 Yennar lane, 3A', '4438548762', 'AF');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'noimg.png',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `resource_type` varchar(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `url`, `start_date`, `end_date`, `image`, `created_on`, `status`, `resource_type`, `resource_id`, `cat_id`) VALUES
(2, 'Test title', '<p>this test descrtion for our bnaner</p>', '', '', '', 'aeef650573b95adda3e90c62d0a38c84.jpg', '2019-02-12 19:00:18', 1, '', 0, 0),
(3, 'Gro user business', '<p>Life is like a race</p>', '', '', '', '665277304b120ae90fd8c416171c9a48.jpg', '2019-03-02 12:57:32', 1, '', 0, 0),
(4, 'Adds extra time', '<p>nice people nice work</p>', '', '', '', 'b388c284b7632df155e98dff77cc2986.png', '2019-03-02 12:59:47', 1, '', 0, 0),
(5, 'WelcomeTo skill squared', '<p>We always welcome you</p>', '', '', '', 'f707b3d3e8a6f0452fd8d66d85fa8a4f.jpg', '2019-03-02 13:11:52', 1, '', 0, 0),
(6, 'Welcome To Social Meida Experts', '<p>We have social media experts</p>', '', '', '', 'eaffe3c27d56b80d23e3b8dcbd9b7215.jpg', '2019-03-04 11:24:47', 1, '', 0, 0),
(7, 'social media', '<p>More than 1000 social media experts are available on skill squared</p>', '', '', '', 'fcf7fc7a07e4f135cbf018e0723a0cca.jpg', '2019-03-04 11:37:03', 1, '', 0, 0),
(10, 'social media', '<p>social media marketing</p>', '', '', '', '9aeddcc73e59aa2b6e44a96e1944d175.png', '2019-12-12 13:34:53', 1, '', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_description` text COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image',
  `video_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.mp4',
  `thumbnail` varchar(244) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`id`, `post_title`, `post_description`, `post_date`, `post_type`, `video_url`, `thumbnail`, `user_id`, `slug_id`, `created_on`, `category`, `author`) VALUES
(3, 'Bisphenol A and European Legislation', '<p>Food packaging has been used since ancient time to transport, production, processing, storage, preparation and serving before its eventual consumption in safer way but due to technological development and addition of more and more materials in the manufacturing of packaging materials, it is essential to ensure that the materials using during the packaging materials and articles production, processing , storage, preparation and serving are not contacting with the food being packed in this packaging materials or before its eventual consumption. When food comes into contact with many materials and articles in direct or indirect way during its production, processing or storage, such materials and articles are called food contact materials (FCM).</p>\n\n<p>Bisphenol A is also an important substance that often using in the varnishes and coating in the plastic food contact materials under European Regulation (EU) No 2018/213 and amending Regulation (EU) No 10/2011 that has been in force since 6 March 2018 and applies from 6 September 2018.</p>\n\n<p style=\"text-align:center;\"><img alt=\"\" src=\"http://project.cyphersol.com/cpxglobal/uploads/37484819fa3501f491d9c368679a7c5c.png\" style=\"width: 500px; height: 211px;\" /></p>\n\n<p>European Regulation (EU) No 2018/213, articles 6 states that &ldquo;varnished or coated materials and articles or plastic materials and articles that were lawfully placed on the market before 6 September 2018 may remain on the market until the exhaustion of stocks.&rdquo; Based on the discussion and understanding of the expert working group on food contact materials of the &ldquo; Standing Committee on Plants, Animals , Food and Feed ( PAFF), recommended that;</p>\n\n<ol style=\"text-align:justify;\">\n	<li>Regulation (EU) No 2018/213 concerns a restriction on the amount of BPA which is allowed to migrate from coating or varnish which has been manufactured using BPA, applied to food contact materials or articles. The articles 6 also describe the requirements on verification, declaration of compliance as well as supporting documentation.</li>\n	<li>Regulation (EU) No 2018/213, articles 2 laid down the specific migration limit (SML) in in the finished state and intended to be brought into contact with food or already in contact with food in order to verify compliance, while of Article 1(2) of Regulation (EC) No 1935/2004 included the intermediate materials and articles.</li>\n	<li>If a coating of food contact materials is unfinished, it may not be possible to verify compliance as the finishing of that layer can affect the migration of BPA or it might simply not be possible to perform a migration test. In addition to this, this regulation should not be considered to apply to the placing on the market of unfinished varnished or coated materials or to unfinished plastics. Therefore the Regulation including Article 6 only applies to varnishes and coatings in their finished state.</li>\n	<li>As a consequence of the reasoning developed above, once the varnish or coating has been applied to a secondary layer and no further processing is carried out that affects the physico-chemical properties of the varnish or coating itself and moreover the migration of BPA into food, the varnish or coating can be considered in its final state for the purposes of compliance with Regulation (EU) No 2018/213, including Article 6.</li>\n	<li>Further processing may be carried out in order to complete the manufacturing of the final materials and articles but which again, does not affect the physico-chemical properties of the varnish or coating itself or the migration of BPA into food.</li>\n	<li>The varnish or coating in its finished state may be considered as falling within the scope of &quot;placing on the market&quot; provided that it falls within the definition laid down in Article 2(1) (b) of Regulation (EC) No 1935/2004.</li>\n</ol>\n\n<h4>By</h4>\n\n<p>Dr. John David Nelson.</p>\n', '', 'image', '', '', 0, 49, '2020-02-28 14:21:39', 'Technology', ''),
(4, 'Doctor blade and uniform ink Metering', '<p>Doctor blade is an integral part of the printing process that provides the uniform metering. In order to achieve uniform metering, the correct doctor blade needs to be used for the job and it needs to be installed and set properly. This articles will provide details guidelines on how to achieve uniform metering throughout the run. There are many options in doctor blades and blade material you choose will have an effect on the metering quality and life of the blade. Typically metal carbon, stainless doctor blades will provide the best metering, followed by composites and then plastic blades. While the shape of the doctor blade tip rounded tip, lamella or either beveled edge also effect on the metering of ink.</p>\r\n\r\n<p>Doctor blade angle adjustment in ink chamber also play a key role to control the ink metering during the printing process on machine. A generally acceptable flexo doctor blade contact angle range is 25 to 42 degrees, depending on the system. A doctor blade contact angle of 30 degrees is a nominal good angle for preventing print defects. If the doctor blade angle is less than 25 degrees then it will not provide the proper doctoring and require more force to doctor blade clearly and cause the dot gain and inconsistent print, possibly load dry ink or blade material into the cylinder and damage it. If the doctor blade contact angle is more than 42 degrees cause catching of the blade in the anilox cells resulting in lines across the web or vibration and other related print defects.</p>\r\n\r\n<p>The next important factor that affect the ink metering in the flexographic printing is the doctor blade installation. If your doctor blade installation is not proper, doctor blade can&rsquo;t meter the ink properly and cause the various print defect such as dirty print. Before the installation of the doctor blade, inspect the components and repair any damage found if possible. Minor things can usually be corrected by filing the damaged area smooth. When installing the doctor blade, be sure the back side of the blade is firmly resting on the ledge of pins that are built into the chamber in order to ensure that doctor blade is installed parallel to the chamber. Finally after the doctor blades are installed, look down the length of the blade to see if it is wrinkle free. During the installation also need to make sure that chamber is in alignment with the anilox roller or chamber centerlines are aligned with the anilox centerline and that it is not skewed to the anilox roll. Be sure that both blades touch the anilox roll at the same time and any misalignment between doctor blade and anilox roll will reduce the quality of the wipe that is delivered by the blade. Now question is arise how to check the alignment of chamber with anilox roll? The best way is to check the alignment with a plastic feeler gage that sliding between blade and anilox roll with slight tension and check the gap between rest of the blade and anilox roll that should be same everywhere on the blade and on the containment blade. If there is gap then adjust the chamber position as necessary until there is uniform gap on both blades. Be sure to follow any and all plant safety rules while checking the chamber alignment.</p>\r\n\r\n<p>End seal also has the influence on the print defects as well as doctor blade ink metering and resulted into ink leakage from chamber instead of prevent the ink from flowing out of the chamber. On most presses with chamber and end seal, doctor blade also must be replaced and less pressure enhance the life of the end seal as well doctor blade, when setting for the printing. The performance of the end seal also based on the ink pump as well as flow rate. A greater flow rate of ink with the increase of machine speed add the pressure toward the end seal that cause leakage, slinging ink and waste substrate. Besides of all above, excessive application pressure is a significant cause of inconsistent blade metering due to deflecting of the doctor blade, flatten the doctor blade angle that prevent the uniform metering. Extreme pressures can deflect the blade to the extent that the blade tip will lift. This lifted blade tip can trap hard particles under with and lead to anilox scoring as well as critical print defects. So, uniform metering of ink by doctor blade ensure the defect less print, more customer retention and satisfaction.</p>\r\n', '', 'image', '', '', 0, 50, '2020-02-28 14:37:11', 'Technology', 'Ricardo Edward'),
(5, 'Food Contact Materials Guidelines', '<p>Paper and board is an important packaging materials use in a wide range of food contact applications such as tea bags, baking papers, filters, beverage cartons, sacks, packaging for dry and frozen foods, including transport and distribution packaging, and tissue products. Paper and board packaging longstanding commitment to the protection of human health, interests and protection of consumers through the provision of safe and functionality effective materials. So paper and board, food, inks, varnishes and adhesive producers have cooperating over the past decades with governmental both national and supra- national level as well as other regulator in order to ensure necessary measures for consumer protection.</p>\n\n<h4>COMPLIANCE REQUIRMENTS</h4>\n\n<p>The meeting of the following requirement of the Framework Regulation is important before placing paper and board materials and articles on the market. The method of achieving these requirements may be tailored according to factors such as the scale of foreseeable risks and the size and nature of a particular manufacturing process.</p>\n\n<ul>\n	<li>All materials and articles intended for food contact shall be manufactured in accordance with Good Manufacturing practices (GMP).</li>\n	<li>Risk management should be used as essential tools for achieving the food safety.</li>\n	<li>All materials and articles must consist of the substances or use during production that are risk assessed or included in positive lists in national regulations and recommendations.</li>\n	<li>The paper and board manufacturer must assess and control any relevant risks related to non-intentionally added substances (NIAS).</li>\n	<li>All the business operator related paper and board must meet the traceability requirements of the Framework Regulation throughout the supply chain.</li>\n	<li>Paper &amp; board materials as well as articles destined for food contact uses to be accompanied by labelling or documentation which indicates it suitability for that use.</li>\n	<li>The framework regulation ensure that food contact materials and articles must be accompanied by a written declaration stating that they comply with the rules which apply to them.</li>\n</ul>\n\n<h4>By</h4>\n\n<p>Dr. Ambreen Khan</p>\n\n<p>&nbsp;</p>\n', '', 'image', '', '', 0, 51, '2020-02-28 14:40:42', 'Technology', ''),
(6, 'Introduction to Cylinder Engraving', '<p>Rotogravure is the premier, cost effective printing method for higher volume, high resolution packaging and displays. The principles of rotogravure printing underlines the fact that image areas are in a sunken area and the non-image areas are in relief that is why this is also known as intaglio printing. One of the most important feature of the gravure printing is the steel cylinder that is used as an image carrier. Gravure cylinders are usually made of steel and plated with the copper and then images are engraved on this cylinder by chemical etching or with a diamond tool and laser beam.</p>\r\n\r\n<p>In general gravure cylinders are plated in chrome as a protective surface for the cells formed into the copper plated surface. These cells on the cylinder control the amount of the ink transfer on the substrate. In order to achieve more intensity of color on to the substrate deeper cells are required and smaller cells produces less ink density of color. The handling of chrome plating requires strict control, however so there has been a strong demand in the gravure cylinder making industry for a hard replacement material. The basic steps involve in the cylinder engraving are as follows;</p>\r\n\r\n<ul>\r\n	<li>Removing the used gravure cylinders from the gravure printing press</li>\r\n	<li>Washing the gravure cylinders to remove residual ink</li>\r\n	<li>De-chroming or removing the chrome layer from steel cylinders</li>\r\n	<li>Removing the copper image-carrying layer, either chemically, by means of electroplating, or mechanically</li>\r\n	<li>Preparing the copper plating process (degreasing and deoxidizing, applying the barrier layer if the Ballard skin method was employed);</li>\r\n	<li>Electroplating</li>\r\n	<li>Surface finishing with a high-speed rotary diamond milling head and/or with a burnishing stone or a</li>\r\n	<li>Polishing band</li>\r\n	<li>Etching or engraving (producing the image on the gravure cylinder</li>\r\n	<li>Test printing (proof print);</li>\r\n	<li>Correcting the cylinder, minus or plus (i.e., reducing or increasing the volume of cells);</li>\r\n	<li>Preparing the chrome-plating process (degreasing and deoxidizing, preheating, and &ndash; if necessary &ndash; sometimes polishing</li>\r\n	<li>Chrome plating</li>\r\n	<li>surface-finishing with a fine burnishing stone or abrasive paper</li>\r\n	<li>Storing the finished cylinder or installing it directly in the gravure printing press.</li>\r\n</ul>\r\n\r\n<p>The process control is very important during electromechanical engraving of gravure cylinders many problems arise like pin holes, stylus broken, shoe lines, cell depth variation, cell missing, thundering, centre out, pin holes, bludges, machine hang out. Patches, improper dots and depth variation and all these should be removed. The engraved cylinders has five major specification stylus, angle, that accuracy in also inevitable during the cylinder engraving and variation in these specification cause the various defects during the printing process. Engraved cylinder handling and storage is also very critical for the printer to maintain quality perfection and long lasting for optimum performance. The cylinder should be stored in racks to use for future jobs, automatically transported from one step to the next-from imaging to the press room and back to storage and during make ready, the press operator carefully loads the printing cylinders into the press.</p>\r\n\r\n<h4>By</h4>\r\n\r\n<p>Muhammad Sajid Khan</p>\r\n', '', 'image', '', '', 0, 52, '2020-02-28 14:45:00', 'Technology', 'Faisal William'),
(8, 'Digital vs. Offset Printing', '<p style=\"text-align:justify\"><span style=\"font-size:10.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Do you know, some people are still confused to make the final decision to see which printing technology is more commonly using globally or which printing method is better? In short, offset printing is a more traditional printing method, also commonly known as printing press method as compare to the digital printing method.</span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Offset Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is a kind of printing that is commonly using for high volume commercial jobs; think likes of newspaper, magazines and book printing. This is printing process whereby ink is rolled onto paper to allow it to rest on the surface as well as being absorbed into the paper. The design is transferred from the plates onto rubber rolls and colors of ink are spread on the rubber and paper will run between them and layered on the paper in order to get the final image.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Better colour fidelity, which refers to accuracy and balance of the colours in the design.&nbsp;</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Works equally well on almost any kind of material</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large amount of copies can be reproduced with extreme speediness</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Superior image quality which is clean, distinct type and spotless without any streaks or spots.</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Suitable for large volume jobs</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Allows the widest range of colour re-production. Pantones, metallic, foils, bright florescence and varnishes can be produced with this printing.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">While offset printing is not suitable for low volume jobs, required more attention to ensure acceptable quality of results, color drying time, creation of plates etc.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Digital Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is method of printing as compared to offset printing, where proofs, plates and rubber bed are not required and design directly print on the paper with liquid ink or powdered toner. This printing method provide faster and more precise printing quality as compare to the offset printing process. <span style=\"background:white\"><span style=\"color:#252525\">This is an alternate printing solution designed to emulate the final printing press results to give customers an idea of what their final printing press project would look like. Due to the familiarity with the process, many will favour digital printing.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Faster turnaround time as there is no dying time for inks</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Lower cost for low volume jobs (less than 500 copies).</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large format printing can be done (exceeding 10 feet in diameter)</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Can be printed on a variety of mediums which include paper, glass, metal and marble.</span></span></span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">So in comparison, this printing process possesses less color fidelity due to use of standard inks, higher cost for high volume jobs, lower print quality, sharpness, crispness. On the basis of the above discussion, you can make a right decision on the best printing method for your project.</span></span></span></span></p>\r\n', '', 'image', '', '', 0, 59, '2020-04-04 08:41:59', 'Technology', 'Muhammad Sajid'),
(9, 'Digital vs. Offset Printing', '<p style=\"text-align:justify\"><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Do you know, some people are still confused to make the final decision to see which printing technology is more commonly using globally or which printing method is better? In short, offset printing is a more traditional printing method, also commonly known as printing press method as compare to the digital printing method.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Offset Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is a kind of printing that is commonly using for high volume commercial jobs; think likes of newspaper, magazines and book printing. This is printing process whereby ink is rolled onto paper to allow it to rest on the surface as well as being absorbed into the paper. The design is transferred from the plates onto rubber rolls and colors of ink are spread on the rubber and paper will run between them and layered on the paper in order to get the final image.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Better colour fidelity, which refers to accuracy and balance of the colours in the design.&nbsp;</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Works equally well on almost any kind of material</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large amount of copies can be reproduced with extreme speediness</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Superior image quality which is clean, distinct type and spotless without any streaks or spots.</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Suitable for large volume jobs</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Allows the widest range of colour re-production. Pantones, metallic, foils, bright florescence and varnishes can be produced with this printing.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">While offset printing is not suitable for low volume jobs, required more attention to ensure acceptable quality of results, color drying time, creation of plates etc.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Digital Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is method of printing as compared to offset printing, where proofs, plates and rubber bed are not required and design directly print on the paper with liquid ink or powdered toner. This printing method provide faster and more precise printing quality as compare to the offset printing process. <span style=\"background:white\"><span style=\"color:#252525\">This is an alternate printing solution designed to emulate the final printing press results to give customers an idea of what their final printing press project would look like. Due to the familiarity with the process, many will favour digital printing.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Faster turnaround time as there is no dying time for inks</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Lower cost for low volume jobs (less than 500 copies).</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large format printing can be done (exceeding 10 feet in diameter)</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Can be printed on a variety of mediums which include paper, glass, metal and marble.</span></span></span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">So in comparison, this printing process possesses less color fidelity due to use of standard inks, higher cost for high volume jobs, lower print quality, sharpness, crispness. On the basis of the above discussion, you can make a right decision on the best printing method for your project.</span></span></span></span></p>\r\n', '', 'image', '', '', 0, 60, '2020-04-04 08:48:27', 'Technology', 'Faisal William'),
(10, 'Digital vs. Offset Printing', '<p style=\"text-align:justify\"><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Do you know, some people are still confused to make the final decision to see which printing technology is more commonly using globally or which printing method is better? In short, offset printing is a more traditional printing method, also commonly known as printing press method as compare to the digital printing method.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Offset Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is a kind of printing that is commonly using for high volume commercial jobs; think likes of newspaper, magazines and book printing. This is printing process whereby ink is rolled onto paper to allow it to rest on the surface as well as being absorbed into the paper. The design is transferred from the plates onto rubber rolls and colors of ink are spread on the rubber and paper will run between them and layered on the paper in order to get the final image.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Better colour fidelity, which refers to accuracy and balance of the colours in the design.&nbsp;</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Works equally well on almost any kind of material</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large amount of copies can be reproduced with extreme speediness</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Superior image quality which is clean, distinct type and spotless without any streaks or spots.</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Suitable for large volume jobs</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Allows the widest range of colour re-production. Pantones, metallic, foils, bright florescence and varnishes can be produced with this printing.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">While offset printing is not suitable for low volume jobs, required more attention to ensure acceptable quality of results, color drying time, creation of plates etc.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Digital Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is method of printing as compared to offset printing, where proofs, plates and rubber bed are not required and design directly print on the paper with liquid ink or powdered toner. This printing method provide faster and more precise printing quality as compare to the offset printing process. <span style=\"background:white\"><span style=\"color:#252525\">This is an alternate printing solution designed to emulate the final printing press results to give customers an idea of what their final printing press project would look like. Due to the familiarity with the process, many will favour digital printing.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Faster turnaround time as there is no dying time for inks</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Lower cost for low volume jobs (less than 500 copies).</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large format printing can be done (exceeding 10 feet in diameter)</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Can be printed on a variety of mediums which include paper, glass, metal and marble.</span></span></span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">So in comparison, this printing process possesses less color fidelity due to use of standard inks, higher cost for high volume jobs, lower print quality, sharpness, crispness. On the basis of the above discussion, you can make a right decision on the best printing method for your project.</span></span></span></span></p>\r\n', '', 'image', '', '', 0, 61, '2020-04-04 08:49:21', 'Social Media', 'Ricardo Edward'),
(11, 'k', '<p style=\"text-align:justify\"><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Do you know, some people are still confused to make the final decision to see which printing technology is more commonly using globally or which printing method is better? In short, offset printing is a more traditional printing method, also commonly known as printing press method as compare to the digital printing method.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Offset Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is a kind of printing that is commonly using for high volume commercial jobs; think likes of newspaper, magazines and book printing. This is printing process whereby ink is rolled onto paper to allow it to rest on the surface as well as being absorbed into the paper. The design is transferred from the plates onto rubber rolls and colors of ink are spread on the rubber and paper will run between them and layered on the paper in order to get the final image.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Better colour fidelity, which refers to accuracy and balance of the colours in the design.&nbsp;</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Works equally well on almost any kind of material</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large amount of copies can be reproduced with extreme speediness</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Superior image quality which is clean, distinct type and spotless without any streaks or spots.</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Suitable for large volume jobs</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Allows the widest range of colour re-production. Pantones, metallic, foils, bright florescence and varnishes can be produced with this printing.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">While offset printing is not suitable for low volume jobs, required more attention to ensure acceptable quality of results, color drying time, creation of plates etc.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Digital Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is method of printing as compared to offset printing, where proofs, plates and rubber bed are not required and design directly print on the paper with liquid ink or powdered toner. This printing method provide faster and more precise printing quality as compare to the offset printing process. <span style=\"background:white\"><span style=\"color:#252525\">This is an alternate printing solution designed to emulate the final printing press results to give customers an idea of what their final printing press project would look like. Due to the familiarity with the process, many will favour digital printing.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Faster turnaround time as there is no dying time for inks</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Lower cost for low volume jobs (less than 500 copies).</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large format printing can be done (exceeding 10 feet in diameter)</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Can be printed on a variety of mediums which include paper, glass, metal and marble.</span></span></span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">So in comparison, this printing process possesses less color fidelity due to use of standard inks, higher cost for high volume jobs, lower print quality, sharpness, crispness. On the basis of the above discussion, you can make a right decision on the best printing method for your project.</span></span></span></span></p>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=5LMU-zB8Sro', 'http://i3.ytimg.com/vi/5LMU-zB8Sro/default.jpg', 0, 62, '2020-04-04 08:50:49', 'Technology', 'Ricardo Edward');
INSERT INTO `blogpost` (`id`, `post_title`, `post_description`, `post_date`, `post_type`, `video_url`, `thumbnail`, `user_id`, `slug_id`, `created_on`, `category`, `author`) VALUES
(12, 'Learn English in 50 mins', '<p style=\"text-align:justify\"><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Do you know, some people are still confused to make the final decision to see which printing technology is more commonly using globally or which printing method is better? In short, offset printing is a more traditional printing method, also commonly known as printing press method as compare to the digital printing method.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Offset Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is a kind of printing that is commonly using for high volume commercial jobs; think likes of newspaper, magazines and book printing. This is printing process whereby ink is rolled onto paper to allow it to rest on the surface as well as being absorbed into the paper. The design is transferred from the plates onto rubber rolls and colors of ink are spread on the rubber and paper will run between them and layered on the paper in order to get the final image.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Better colour fidelity, which refers to accuracy and balance of the colours in the design.&nbsp;</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Works equally well on almost any kind of material</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large amount of copies can be reproduced with extreme speediness</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Superior image quality which is clean, distinct type and spotless without any streaks or spots.</span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Suitable for large volume jobs</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Allows the widest range of colour re-production. Pantones, metallic, foils, bright florescence and varnishes can be produced with this printing.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:10.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">While offset printing is not suitable for low volume jobs, required more attention to ensure acceptable quality of results, color drying time, creation of plates etc.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:14.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Digital Printing</span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">This is method of printing as compared to offset printing, where proofs, plates and rubber bed are not required and design directly print on the paper with liquid ink or powdered toner. This printing method provide faster and more precise printing quality as compare to the offset printing process. <span style=\"background:white\"><span style=\"color:#252525\">This is an alternate printing solution designed to emulate the final printing press results to give customers an idea of what their final printing press project would look like. Due to the familiarity with the process, many will favour digital printing.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"line-height:107%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Benefits of offset printing</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Faster turnaround time as there is no dying time for inks</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Lower cost for low volume jobs (less than 500 copies).</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Large format printing can be done (exceeding 10 feet in diameter)</span></span></span></span></span></span></span></span></li>\r\n	<li style=\"margin-top:0cm; margin-right:0cm; margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"tab-stops:list 25.8pt\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#252525\">Can be printed on a variety of mediums which include paper, glass, metal and marble.</span></span></span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">So in comparison, this printing process possesses less color fidelity due to use of standard inks, higher cost for high volume jobs, lower print quality, sharpness, crispness. On the basis of the above discussion, you can make a right decision on the best printing method for your project.</span></span></span></span></p>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=SOmrHXjze7Y', 'http://i3.ytimg.com/vi/SOmrHXjze7Y/default.jpg', 0, 63, '2020-04-04 08:53:08', 'Social Media', 'Faisal'),
(13, 'Digital vs. Offset Printing10', '<p>DLKALKHL</p>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=SOmrHXjze7Y', 'http://i3.ytimg.com/vi/SOmrHXjze7Y/default.jpg', 0, 64, '2020-04-04 09:52:36', 'Technology', 'QASIM'),
(14, 'Digitalization', '<p>GNDASLJ;LJDL</p>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=0UKA1H2xpWY', 'http://i3.ytimg.com/vi/0UKA1H2xpWY/default.jpg', 0, 65, '2020-04-04 09:58:34', 'Technology', 'Mufti'),
(15, 'Printing Techniques', '<p>Face book page</p>\r\n', '', 'image', '', '', 0, 66, '2020-04-04 13:23:10', 'Social Media', 'Mayo');

-- --------------------------------------------------------

--
-- Table structure for table `blogpost_comments`
--

CREATE TABLE `blogpost_comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `body` varchar(255) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'noimg.png',
  `status` int(11) NOT NULL DEFAULT '1',
  `type_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `description`, `image`, `status`, `type_id`, `parent_id`) VALUES
(1, 'information technology', '', 'noimg.png', 1, '1', 0),
(2, 'Graphics and design', '', 'noimg.png', 1, '1', 0),
(3, 'profrssional skills', '', 'noimg.png', 1, '1', 2),
(4, 'Digital Marketing', '', 'noimg.png', 1, '1', 1),
(5, 'xyz', '', 'noimg.png', 1, '2', 0),
(7, 'SEO ans markineting', '', 'noimg.png', 1, '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cat_types`
--

CREATE TABLE `cat_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_types`
--

INSERT INTO `cat_types` (`id`, `type`) VALUES
(1, 'Freelancers'),
(2, 'Ngo and fundraising '),
(3, 'Companies'),
(4, 'job seekers'),
(5, 'inventions and ideas'),
(6, 'investors'),
(7, 'contributors'),
(8, 'courses');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `cat_name`) VALUES
(2, 'karachi'),
(3, 'istanbol'),
(4, 'Loss angless'),
(8, 'London'),
(9, 'Mons'),
(10, 'Leuwan');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'defaultbanner.png',
  `post_description` text COLLATE utf8_unicode_ci NOT NULL,
  `displaysidebar` int(1) NOT NULL,
  `sidebar` int(1) NOT NULL,
  `meta_keyword` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `post_title`, `short_heading`, `post_banner`, `post_description`, `displaysidebar`, `sidebar`, `meta_keyword`, `meta_title`, `meta_description`, `created_on`) VALUES
(2, 'Privacy Policy', 'Privacy Policy', '4497768073239.jpg', '<h2><strong>&nbsp;Privacy Policy</strong></h2>\r\n\r\n<h2 style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Please read this privacy policy (the&nbsp;<span style=\"border:none windowtext 1.0pt; padding:0in\">&ldquo;Policy&rdquo;</span>) carefully to understand how we use your personal information. If you do not agree with this Policy, your choice is not to use skillsquared.com (the&nbsp;<span style=\"border:none windowtext 1.0pt; padding:0in\">&ldquo;Site&rdquo;</span>). By accessing or using this Site, you agree to this Policy. This Policy may change from time to time. If there are any material changes to how your personal information is used, we will notify you. Your continued use of the Site after we make changes is deemed to be acceptance of those changes, so please check the Policy periodically for update.</span></span></span></span></span></span></span></strong></h2>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">At Skillsquared we care about users&rsquo; privacy. We do not sell or rent your personal information to third parties for their direct marketing purposes without your explicit consent. We do not disclose it to others except as disclosed in this Policy or required to provide you with the services of the Site and mobile applications, meaning - to allow you to buy, sell, share the information you want to share on the Site; to contribute on the forum; pay for products; post reviews and so on; or where we have a legal obligation to do so.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">We collect information that you provide us or voluntarily share with other users, and also some general technical information that is automatically gathered by our systems, such as IP address, browser information and cookies to enable you to have a better user experience and a more personalized browsing experience.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">We will not share information that you provide us in the process of the registration - including your contact information - except as described in this Policy.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Information that you choose to publish on the Site (photos, videos, text, music, reviews, deliveries) - is no longer private, just like any information you publish online.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Technical information that is gathered by our systems, or third party systems, automatically may be used for Site operation, optimization, analytics, content promotion and enhancement of user experience. We may use your information to contact you - to provide notices related to your activities, or offer you promotions and general updates, but we will not let any other person, including sellers and buyers, contact you, other than through your user profile on the Site.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Your personal information may be stored in systems based around the world, and may be processed by third party service providers acting on our behalf. These providers may be based in countries that do not provide an equivalent level of protection for privacy as that enjoyed in the country in which you live. In that case, we will provide for adequate safeguards to protect your personal information.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">You can exercise your rights over your personal information by contacting us at <a href=\"mailto:support@skillsquared.com\" style=\"color:blue; text-decoration:underline\">support@skillsquared.com</a>. .</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:18.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:15.0pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#0e0e0f\">Cookies</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">When you visit the Site, we may use industry-wide technologies such as &quot;cookies&quot; (or similar technologies), which store certain information on your computer and which will allow us, among other things, to enable automatic sign-in to the Site, make your browsing much more convenient and effortless and allow us to test user experience and offer you personalized browsing or promotions. By continuing to use this Site, you are agreeing to our placing cookies on your computer or device in accordance with the terms of this Policy.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">The Site uses cookies to collect statistical data about its use, to tailor the Site&#39;s functionality to suit personal preferences and to assist with various aspects of Site operation. These files contain a variety of information such as information about Skillsquared webpages visited by you, the length of time you visited the Site, data about how you came to visit the Site, areas viewed by you within the Site, and additional information. Cookies remain on your device for the period described below.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">The following is a more detailed explanation of the types of cookies we use:</span></span></span></span></span></span></span></strong></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li style=\"margin-top:0in; margin-right:0in; margin-bottom:.0001pt; margin:0in 0in 10pt\">\r\n	<p><strong><span style=\"font-size:11pt\"><span style=\"line-height:13.5pt\"><span style=\"tab-stops:list .5in\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"border:none windowtext 1.0pt; font-size:10.5pt; padding:0in\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Necessary cookies</span></span></span><br />\r\n	<span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Necessary cookies are essential and help you navigate the Site. This helps to support security and basic functionality and is necessary for the proper operation of the Site, so if you block these cookies we can&#39;t guarantee your use or the security during your visit.</span></span></span></span></span></span></span></span></strong></p>\r\n	</li>\r\n	<li style=\"margin-top:0in; margin-right:0in; margin-bottom:.0001pt; margin:0in 0in 10pt\">\r\n	<p><strong><span style=\"font-size:11pt\"><span style=\"line-height:13.5pt\"><span style=\"tab-stops:list .5in\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"border:none windowtext 1.0pt; font-size:10.5pt; padding:0in\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Functionality cookies</span></span></span><br />\r\n	<span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Functionality cookies are used to provide you the best user experience. These cookies are, for instance, used to personalize content for you in line with your location. It also allows the Site to remember choices made (like turning off use of cookies or which location you have previously selected) to provide more personal features.</span></span></span></span></span></span></span></span></strong></p>\r\n	</li>\r\n	<li style=\"margin-top:0in; margin-right:0in; margin-bottom:.0001pt; margin:0in 0in 10pt\">\r\n	<p><strong><span style=\"font-size:11pt\"><span style=\"line-height:13.5pt\"><span style=\"tab-stops:list .5in\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"border:none windowtext 1.0pt; font-size:10.5pt; padding:0in\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Performance cookies</span></span></span><br />\r\n	<span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Performance cookies help us to understand the behavior of users of the Site. This allows us to continuously improve the Site to provide the best information in support of our project aims. These cookies are also used to help us understand how effective our Site is; for instance these cookies tell us which pages visitors go to most often and if they get error messages from web pages. All of the information that these cookies collect is aggregated, to assist us to improve how the Site works. Some of these cookies are managed by third parties, and you may refer to the third parties&#39; own website privacy notifications for further information. In particular, we use Google Analytics cookies to obtain an overall view of user habits and volumes, and to help improve the overall experience on the Site. Google Analytics is a third-party web analysis service provided by Google Inc., which uses performance cookies and targeting cookies. The information generated by these cookies about your use of the Site (including your IP address) will be transmitted to and stored by Google Inc. on servers in the United States.</span></span></span></span></span></span></span></span></strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Google will use the information collected for the purpose of evaluating your use of our Site on our behalf, compiling reports on website activity and providing other services relating to activity and internet usage to us. Google will not associate your IP address with any other data held by Google. You may refuse the use of cookies by selecting the appropriate settings on your browser as described below. Furthermore you can prevent Google&rsquo;s collection and use of data (cookies and IP address) by downloading and installing the&nbsp;<a href=\"https://tools.google.com/dlpage/gaoptout?hl=en-GB\" style=\"color:blue; text-decoration:underline\"><span style=\"color:#1dbf73\">browser plug-in</span></a>. This creates an opt-out cookie which prevents the further processing of your data. For more information about Google Analytics cookies, please see Google&#39;s help pages and privacy policy.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">If you prevent these cookies, we cannot guarantee how the Site will perform for you.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:18.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:15.0pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#0e0e0f\">Blocking or Deleting Cookies</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Once you have given us your agreement to the use of cookies, we shall store a cookie on your computer or device to remember this for next time, so that we can store your preferences and save you time on subsequent visits by eliminating the need to repeatedly enter the same data. You may set your browser to block all cookies, including cookies associated with our services, or to indicate when a cookie is being set by us. You should do this through the browser settings for each browser you use. Please be aware that some of our services will not function if your browser does not accept cookies. However, you can allow cookies from specific websites by making them &quot;trusted websites&quot; in your internet browser.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">The following links may assist you in managing your cookies settings, or you can use the &#39;help&#39; option in your internet browser for more details:</span></span></span></span></span></span></span></strong></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li style=\"margin-top:0in; margin-right:0in; margin-bottom:.0001pt; margin:0in 0in 10pt\">\r\n	<p><strong><span style=\"font-size:11pt\"><span style=\"line-height:13.5pt\"><span style=\"tab-stops:list .5in\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\"><a href=\"https://support.microsoft.com/en-us/help/17442/windows-internet-explorer-delete-manage-cookies\" style=\"color:blue; text-decoration:underline\"><span style=\"color:#1dbf73\">Internet Explorer</span></a></span></span></span></span></span></span></span></span></strong></p>\r\n	</li>\r\n	<li style=\"margin-top:0in; margin-right:0in; margin-bottom:.0001pt; margin:0in 0in 10pt\">\r\n	<p><strong><span style=\"font-size:11pt\"><span style=\"line-height:13.5pt\"><span style=\"tab-stops:list .5in\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\"><a href=\"http://www.google.com/support/chrome/bin/answer.py?hl=en&amp;answer=95647\" style=\"color:blue; text-decoration:underline\"><span style=\"color:#1dbf73\">Google Chrome</span></a></span></span></span></span></span></span></span></span></strong></p>\r\n	</li>\r\n	<li style=\"margin-top:0in; margin-right:0in; margin-bottom:.0001pt; margin:0in 0in 10pt\">\r\n	<p><strong><span style=\"font-size:11pt\"><span style=\"line-height:13.5pt\"><span style=\"tab-stops:list .5in\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\"><a href=\"http://support.apple.com/kb/PH5042\" style=\"color:blue; text-decoration:underline\"><span style=\"color:#1dbf73\">Safari</span></a></span></span></span></span></span></span></span></span></strong></p>\r\n	</li>\r\n	<li style=\"margin-top:0in; margin-right:0in; margin-bottom:.0001pt; margin:0in 0in 10pt\">\r\n	<p><strong><span style=\"font-size:11pt\"><span style=\"line-height:13.5pt\"><span style=\"tab-stops:list .5in\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\"><a href=\"https://helpx.adobe.com/flash-player/kb/disable-local-shared-objects-flash.html\" style=\"color:blue; text-decoration:underline\"><span style=\"color:#1dbf73\">Adobe (flash cookies)</span></a></span></span></span></span></span></span></span></span></strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">If you share the use of a computer or device, accepting or rejecting the use of cookies may affect all users of that computer or device.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:18.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:15.0pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#0e0e0f\">External Links</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Please note that the Site may contain links to third party sites and if you link to a third party site from the Site, any data you provide to that site and any use of that data by the third party are not under the control of Skillsquared and are not subject to this Policy. You should consult the privacy policies of each site you visit. This Policy applies solely to personal information collected by our Site. If you upload content, including your personal information, to a social network and then tag the Site, your submission will be subject to that social network&#39;s terms of use and privacy policy, even where you post on an official Skillsquared page on the social network. We do not have control over these terms of use and privacy policies, and have not reviewed their adequacy. You should therefore review these before submitting any personal information.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:18.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:15.0pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#0e0e0f\">Security</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">We take great care in maintaining the security of the Site and your information and in preventing unauthorized access, loss, misuse, alteration, destruction or damage to it through industry standard technologies and internal procedures. Among other things, we regularly maintain a PCI DSS (Payment Card Industry Data Security Standards) certification (with respect to payment by credit cards). In addition, we contractually ensure that any third party processing your personal information equally provide for confidentiality and integrity of your data in a secure way. However, the transmission of data via the internet is not completely secure, and although we will do our best to protect your personal information, we cannot guarantee the security of your data transmitted to the Site; any transmission is at your own risk. Once we have received your data, we will use strict procedures and security features to try to prevent unauthorized access.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Users who have registered to the Site agree to keep their password in strict confidence and not disclose such password to any third party.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Further information about our data security practices can be provided on request.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:18.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:15.0pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#0e0e0f\">Your California Privacy Rights</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">California Civil Code Section &sect; 1798.83 permits California residents that are users of our Site to request certain information regarding our disclosure of personal information to third parties for their direct marketing purposes. To make such a request, please send an email to </span></span></span><u><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#1dbf73\">support@skillsquared.com</span></span></span></u></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:18.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:15.0pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#0e0e0f\">Updating Your Information</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">We take steps to ensure that the personal information we collect is accurate and up to date, and we provide you with the opportunity to update your information through your account profile settings. In the event that you believe your information is in any way incorrect or inaccurate, please let us know immediately. We will make sure we investigate the matter and correct any inaccuracies as quickly as possible where necessary or give you ways to update it quickly or to delete it - unless we have to keep that information for legitimate business or legal purposes. When updating your personal information, we may ask you to verify your identity before we can act on your request. If for any reason you have a problem with deleting your personal information please contact Skillsquared&rsquo;s Customer Support and we will make reasonable efforts to delete any such information pursuant to any applicable privacy laws.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">You can review and change your personal information by logging into the Site and visiting your account profile page.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\">&nbsp;</p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:18.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:15.0pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#0e0e0f\">Changes to the Privacy Policy</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">We reserve the right to change this Policy at any time, so please re-visit this page frequently.</span></span></span></span></span></span></span></strong></p>\r\n\r\n<p style=\"margin: 0in 0in 10pt;\"><strong><span style=\"font-size:11pt\"><span style=\"line-height:15.0pt\"><span style=\"vertical-align:baseline\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span helvetica=\"\" style=\"font-family:\"><span style=\"color:#555555\">Changes to this Policy are effective as of the stated &quot;Last Update&quot; and your continued use of the Site on or after the Last Update date will constitute acceptance of, and agreement to be bound by, those changes.</span></span></span></span></span></span></span></strong></p>\r\n', 0, 0, 'Meta Keyword Meta Keyword', 'Meta Title Meta Title', 'Meta Description Meta Description Meta Description Meta Description', '2018-06-08 03:18:07');
INSERT INTO `cms` (`id`, `post_title`, `short_heading`, `post_banner`, `post_description`, `displaysidebar`, `sidebar`, `meta_keyword`, `meta_title`, `meta_description`, `created_on`) VALUES
(3, 'Terms & Conditions', 'Please read carefully the following terms & Conditions', '3920068770720.jpg', '<p><br />\n<strong>1. SKILLSQUARED PROPERTIES: DESCRIPTION OF PLATFORM AND&nbsp;<br />\nMATCHING SERVICE.</strong>&nbsp;</p>\n\n<p><br />\nSkillsquared , LLC (&ldquo;Skillsquared &rdquo; or &ldquo;we&rdquo;) рrоvіdеѕ a nеtwоrk (&ldquo;Network&rdquo;) оf іndереndеnt&nbsp;<br />\ncontractors whо рrоvіdе ѕоftwаrе еngіnееrіng оr оthеr рrоfеѕѕіоnаl ѕеrvісеѕ (each a &ldquo;Tаlеnt&rdquo; аnd&nbsp;<br />\nthе ѕеrvісеѕ they рrоvіdе, thе &ldquo;Talent Sеrvісеѕ&rdquo;). Thе &ldquo;Plаtfоrm&rdquo; includes (а) Skіllѕԛuаrеd &rsquo;s&nbsp;<br />\nwеb site located аt httр://www.Skіllѕԛuаrеd .соm (thе &ldquo;Sіtе&rdquo;), (b) Skіllѕԛuаrеd &rsquo;ѕ technology&nbsp;<br />\nplatform designed to fіnd and соnnесt Tаlеnt tо those іn need of dеvеlорmеnt, еngіnееrіng, аnd&nbsp;<br />\nоthеr рrоfеѕѕіоnаl ѕеrvісеѕ offered bу оr thrоugh Skіllѕԛuаrеd (thе &ldquo;Platform&rdquo;), аnd (c) аll&nbsp;<br />\nѕоftwаrе, data, reports, tеxt, іmаgеѕ, sounds, vіdео, аnd content mаdе аvаіlаblе thrоugh аnу оf&nbsp;<br />\nthe fоrеgоіng (соllесtіvеlу, thе &ldquo;Cоntеnt&rdquo;). Any nеw fеаturеѕ added to or аugmеntіng thе&nbsp;<br />\nPlаtfоrm аrе аlѕо ѕubjесt tо thіѕ Client Plаtfоrm Aссеѕѕ Agrееmеnt (&ldquo;CPAA&rdquo;). The &ldquo;Mаtсhіng&nbsp;<br />\nServices&rdquo; іnvоlvе uѕіng any аnd аll fеаturеѕ, funсtіоnѕ, аnd Cоntеnt оf thе Plаtfоrm thаt еnаblе&nbsp;<br />\nсlіеntѕ tо іdеntіfу, rеvіеw, соntасt, and оthеrwіѕе tаkе ѕtерѕ tо engage Tаlеnt, аѕ wеll аѕ&nbsp;<br />\nSkіllѕԛuаrеd I ѕ wоrk in assisting уоu (&ldquo;you&rdquo; оr &ldquo;Clіеnt&rdquo;) іn identifying, rеvіеwіng, соntасtіng,&nbsp;<br />\nand taking ѕtерѕ to еngаgе Talent. The Matching Services do not іnсludе аnу work реrfоrmеd by&nbsp;<br />\nTаlеnt. Fоr еаѕе оf rеfеrеnсе, the Sіtе, Nеtwоrk, Plаtfоrm, identities оr dеѕсrірtіоnѕ оf Talent аnd&nbsp;<br />\nTаlеnt services, the Mаtсhіng Sеrvісеѕ, Other Content, Skіllѕԛuаrеd &rsquo;s Proprietary Information,&nbsp;<br />\nаnd аnу other Skіllѕԛuаrеd products or services are collectively rеfеrrеd tо іn thіѕ CPAA аѕ&nbsp;<br />\n&ldquo;Skіllѕԛuаrеd Properties.&rdquo; &ldquo;Skіllѕԛuаrеd Prореrtіеѕ&rdquo; іnсludе аll such elements аѕ a whоlе, аѕ&nbsp;<br />\nwеll аѕ individual elements аnd роrtіоnѕ thereof. Nоthіng in thіѕ CPAA оblіgаtеѕ: (1) уоu to&nbsp;<br />\nengage any particular Tаlеnt for any wоrk, (2) Skillsquared tо рrоvіdе you оr аnу Clіеnt wіth&nbsp;<br />\nMatching Sеrvісеѕ, or (3) Skillsquared tо identify Tаlеnt for уоur particular needs.&nbsp;</p>\n\n<h3><br />\n2. ACCEPTANCE OF TERMS.&nbsp;</h3>\n\n<p><br />\n<strong>2.1. ACCEPTANCE AND LEGALLY BINDING AGREEMENT</strong>. Skillsquared рrоvіdеѕ thе&nbsp;<br />\nSkіllѕԛuаrеd Prореrtіеѕ tо уоu thrоugh thе Site and the Plаtfоrm, subject tо thіѕ CPAA. Bу&nbsp;<br />\naccepting thіѕ CPAA or by ассеѕѕіng оr uѕіng аnу portion оf thе Skіllѕԛuаrеd Prореrtіеѕ, уоu&nbsp;<br />\nacknowledge that уоu hаvе rеаd, understood, аnd аgrее to be bоund bу this CPAA. Yоu furthеr&nbsp;<br />\nасknоwlеdgе thаt this CPAA іѕ a contract bеtwееn уоu and Skіllѕԛuаrеd , еvеn though іt іѕ&nbsp;<br />\nelectronic аnd is nоt рhуѕісаllу ѕіgnеd bу уоu and Skіllѕԛuаrеd , аnd іt gоvеrnѕ уоur use оf thе<br />\nSkillsquared Properties. If уоu аrе entering іntо thіѕ CPAA on behalf оf a company, business оr&nbsp;<br />\nother lеgаl entity (&ldquo;Clіеnt Entіtу&rdquo;), you rерrеѕеnt thаt you have thе аuthоrіtу tо соntrасtuаllу&nbsp;<br />\nbind ѕuсh Clіеnt Entіtу tо this CPAA, in which case the terms &ldquo;уоu&rdquo; or &ldquo;уоur&rdquo; оr &ldquo;Client&rdquo; will&nbsp;<br />\nrеfеr tо ѕuсh Clіеnt Entity. IF YOU DO NOT HAVE SUCH AUTHORITY TO&nbsp;<br />\nCONTRACTUALLY BIND SUCH CLIENT ENTITY TO THIS CPAA, OR IF YOU DO NOT&nbsp;<br />\nAGREE WITH THIS CPAA, YOU MUST NOT ACCEPT THIS CPAA AND YOU MAY NOT&nbsp;<br />\nACCESS OR USE THE SKILLSQUARED PROPERTIES.&nbsp;</p>\n\n<p><br />\n<strong>2.2. CPAA UPDATES.</strong> Skillsquared reserves thе right, аt іtѕ ѕоlе discretion, tо сhаngе оr&nbsp;<br />\nmodify portions оf thіѕ CPAA аt аnу time. Skіllѕԛuаrеd will роѕt thе сhаngеѕ tо thіѕ CPAA on&nbsp;<br />\nthе Sіtе and wіll іndісаtе аt the top оf thіѕ раgе thе date these tеrmѕ wеrе last revised. It іѕ your&nbsp;<br />\nresponsibility tо check thе CPAA periodically fоr сhаngеѕ. Yоur соntіnuеd uѕе оf any of the&nbsp;<br />\nSkіllѕԛuаrеd Prореrtіеѕ аftеr thе date аnу ѕuсh сhаngеѕ bесоmе еffесtіvе constitutes your&nbsp;<br />\nассерtаnсе оf thе new оr rеvіѕеd CPAA.&nbsp;<br />\n<strong>2.3. REGISTERING YOUR ACCOUNT.</strong> As раrt оf the rеgіѕtrаtіоn process, уоu wіll identify a&nbsp;<br />\nuser nаmе аnd раѕѕwоrd fоr уоur Aссоunt (&ldquo;Aссоunt&rdquo;). Yоu are solely rеѕроnѕіblе fоr&nbsp;<br />\nmаіntаіnіng thе confidentiality of your uѕеr nаmе and раѕѕwоrd and fоr any аuthоrіzеd оr&nbsp;<br />\nunаuthоrіzеd use of the ѕаmе. Yоu also agree tо provide Skіllѕԛuаrеd truthful, ассurаtе, аnd&nbsp;<br />\nсоmрlеtе information in аll interactions wіth Skillsquared via any оf thе Skillsquared&nbsp;<br />\nPrореrtіеѕ.&nbsp;</p>\n\n<h3><br />\n3. RESTRICTIONS ON YOUR USE OF SKILLSQUARED PROPRIETARY&nbsp;<br />\nINFORMATION.&nbsp;</h3>\n\n<p><br />\n<strong>3.1. CONFIDENTIALITY</strong>. All buѕіnеѕѕ, tесhnісаl оr fіnаnсіаl іnfоrmаtіоn dіѕсlоѕеd by&nbsp;<br />\nSkіllѕԛuаrеd via thе Skillsquared Prореrtіеѕ, including wіthоut lіmіtаtіоn, thе Sіtе, Plаtfоrm,&nbsp;<br />\nоr Mаtсhіng Sеrvісе, іѕ the &ldquo;Prорrіеtаrу Information&rdquo; оf Skіllѕԛuаrеd . Prорrіеtаrу Infоrmаtіоn&nbsp;<br />\nаlѕо includes, but іѕ nоt lіmіtеd to, thе rаtеѕ оf еасh Tаlеnt in thе Nеtwоrk. Yоu wіll hold іn&nbsp;<br />\nсоnfіdеnсе аnd nоt dіѕсlоѕе tо others any Prорrіеtаrу Infоrmаtіоn. Yоu wіll аlѕо nоt uѕе&nbsp;<br />\nPrорrіеtаrу Infоrmаtіоn fоr any рurроѕеѕ оthеr than еvаluаtіоn оf Skillsquared , Tаlеnt аnd&nbsp;<br />\nTаlеnt Services as аn еxіѕtіng оr prospective client of Skіllѕԛuаrеd . However, уоu wіll nоt bе&nbsp;<br />\nobligated undеr thіѕ Sесtіоn 3.1 wіth respect to іnfоrmаtіоn that уоu саn dосumеnt is or bесоmеѕ&nbsp;<br />\nreadily publicly аvаіlаblе wіthоut restriction аnd thrоugh no fаult оf уоu (і.е., іnfоrmаtіоn that&nbsp;<br />\nSkіllѕԛuаrеd mаkеѕ generally available tо the public on the Sіtе wіthоut requiring ассерtаnсе of&nbsp;<br />\nthіѕ CPAA оr a ѕіmіlаr obligation оf confidentiality). Yоu may mаkе dіѕсlоѕurеѕ of Prорrіеtаrу&nbsp;<br />\nInfоrmаtіоn rеԛuіrеd bу lаw or court оrdеr рrоvіdеd thаt уоu give Skillsquared аdvаnсе wrіttеn&nbsp;<br />\nnоtісе. When you have соmрlеtеd уоur uѕе of thе Platform оr Mаtсhіng Service, or іf you hаvе&nbsp;<br />\nnоt uѕеd the Plаtfоrm оr Matching Service іn 12 mоnthѕ, you wіll destroy аll іtеmѕ and соріеѕ&nbsp;<br />\nсоntаіnіng or еmbоdуіng Prорrіеtаrу Information.&nbsp;<br />\n<strong>3.2. NON-SOLICIT.</strong> Durіng аll реrіоdѕ оf уоur ассеѕѕ to оr uѕе of the Plаtfоrm оr Matching&nbsp;<br />\nService and fоr twеlvе (12) mоnthѕ аftеr еасh ѕuсh access оr uѕе (collectively, аll such реrіоdѕ&nbsp;<br />\nаrе rеfеrrеd tо аѕ the &ldquo;Nоn-Sоlісіt Pеrіоd&rdquo;), you wіll nоt, directly or indirectly, еnсоurаgе or&nbsp;<br />\nsolicit tо hire, or оthеrwіѕе hіrе or engage fоr performance оf services (еxсludіng ѕеrvісеѕ&nbsp;<br />\nреrfоrmеd рurѕuаnt tо a Sourced Tаlеnt Agrееmеnt signed bу bоth уоu аnd Skіllѕԛuаrеd ) аnу&nbsp;<br />\nTalent whоm уоu become аwаrе оf іn connection with уоur іntеrасtіоn wіth Skіllѕԛuаrеd . You&nbsp;<br />\nаlѕо agree that уоu wіll nоt refer ѕuсh Talent dіrесtlу tо раrеnt, ѕіblіng, оr оthеr аffіlіаtеd&nbsp;<br />\ncompanies.&nbsp;</p>\n\n<h3><br />\n4. GENERAL CONDITIONS/ACCESS AND USE.&nbsp;</h3>\n\n<p><br />\n4.1. AUTHORIZATION TO ACCESS AND USE SKILLSQUARED PROPERTIES. (a)&nbsp;<br />\nSubjесt tо уоur соmрlіаnсе wіth thіѕ CPAA and thе рrоvіѕіоnѕ hereof, уоu may access or use the&nbsp;<br />\nSkillsquared Properties ѕоlеlу for thе рurроѕе of уоur evaluation оf Skіllѕԛuаrеd , Tаlеnt аnd&nbsp;<br />\nSkіllѕԛuаrеd &rsquo;ѕ products and ѕеrvісеѕ аѕ аn еxіѕtіng or prospective Client of Skіllѕԛuаrеd . (b)&nbsp;<br />\nYоu will not: (i) allow any competitor of Skillsquared tо uѕе оr access thе Skіllѕԛuаrеd&nbsp;<br />\nProperties, (іі) uѕе оr ассеѕѕ thе Skillsquared Prореrtіеѕ tо dеvеlор оr enhance аnу рrоduсt or&nbsp;<br />\nservice, оr (ііі) copy аnу ideas, fеаturеѕ, funсtіоnѕ or grарhісѕ оf thе Skіllѕԛuаrеd Properties.&nbsp;<br />\nYou are not permitted to access оr uѕе the Skіllѕԛuаrеd Properties fоr public соmmеnt unlеѕѕ&nbsp;<br />\nauthorized in wrіtіng bу Skillsquared . Yоu аrе аlѕо not реrmіttеd tо сору, modify, frame,&nbsp;<br />\nrероѕt, publicly perform оr dіѕрlау, sell, reproduce, distribute, оr сrеаtе dеrіvаtіvе works of the&nbsp;<br />\nSkillsquared Prореrtіеѕ. Yоu may оnlу link tо the Sіtе оr Platform, оr аnу роrtіоn thеrеоf, as&nbsp;<br />\nеxрrеѕѕlу реrmіttеd bу Skіllѕԛuаrеd . Yоu аgrее not tо access the Sіtе, Platform, or Mаtсhіng&nbsp;<br />\nSеrvісе by аnу mеаnѕ other thаn thrоugh thе іntеrfасе thаt іѕ рrоvіdеd bу Skіllѕԛuаrеd tо ассеѕѕ&nbsp;<br />\nthе ѕаmе, еxсерt thаt уоu mау dоwnlоаd, dіѕрlау, аnd print portions оf thе Cоntеnt оthеr thаn&nbsp;<br />\nаnу software, but оnlу to the mіnіmum extent nесеѕѕаrу and consistent with thе рurроѕе of уоur&nbsp;<br />\naccess аnd use оf thе Skіllѕԛuаrеd Properties under this CPAA, and provided further thаt уоu&nbsp;<br />\ndо not mоdіfу ѕuсh Cоntеnt in any wау аnd you kеер іntасt аll соруrіght, trаdеmаrk, and оthеr&nbsp;<br />\nрrорrіеtаrу nоtісеѕ.&nbsp;<br />\n4.2. OWNERSHIP AND RESTRICTIONS. All rights, title аnd interest in аnd tо the&nbsp;<br />\nSkillsquared Prореrtіеѕ wіll rеmаіn wіth аnd belong еxсluѕіvеlу tо Skіllѕԛuаrеd . Yоu wіll not&nbsp;<br />\n(а) ѕublісеnѕе, resell, rent, lеаѕе, transfer, assign, time ѕhаrе оr оthеrwіѕе commercially еxрlоіt&nbsp;<br />\nоr make the Skіllѕԛuаrеd Prореrtіеѕ аvаіlаblе tо аnу thіrd party, (b) uѕе the Skіllѕԛuаrеd&nbsp;<br />\nProperties іn аnу unlawful manner (іnсludіng wіthоut lіmіtаtіоn in violation оf any dаtа, рrіvасу&nbsp;<br />\nоr еxроrt control laws) оr іn аnу manner thаt іntеrfеrеѕ with оr dіѕruрtѕ thе integrity or&nbsp;<br />\nреrfоrmаnсе оf the Skіllѕԛuаrеd Prореrtіеѕ оr thеіr related соmроnеntѕ, оr (c) mоdіfу, аdарt оr&nbsp;<br />\nhack thе Skillsquared Prореrtіеѕ tо, оr try tо, gаіn unаuthоrіzеd ассеѕѕ tо thе Skillsquared&nbsp;<br />\nPrореrtіеѕ оr rеlаtеd ѕуѕtеmѕ or nеtwоrkѕ (і.е., circumvent аnу еnсrурtіоn оr оthеr ѕесurіtу&nbsp;<br />\nmeasures, gаіn access to аnу ѕоurсе соdе оr аnу other undеrlуіng form оf technology оr&nbsp;<br />\nіnfоrmаtіоn, and gаіn ассеѕѕ tо any part оf thе Skіllѕԛuаrеd Prореrtіеѕ, or any оthеr рrоduсtѕ оr&nbsp;<br />\nѕеrvісеѕ of Skіllѕԛuаrеd that аrе not rеаdіlу mаdе аvаіlаblе tо the gеnеrаl рublіс оr to уоu uѕіng&nbsp;<br />\nуоur own account name аnd раѕѕwоrd аѕ instructed bу Skіllѕԛuаrеd ).&nbsp;<br />\n4.3. RESPONSIBILITY FOR YOUR DATA. You аrе ѕоlеlу rеѕроnѕіblе fоr аll dаtа, іnfоrmаtіоn&nbsp;<br />\nаnd оthеr соntеnt, that уоu uрlоаd, post, or otherwise рrоvіdе оr ѕtоrе (hereafter &ldquo;роѕt(іng)&rdquo;) іn&nbsp;<br />\nсоnnесtіоn with оr rеlаtіng tо the Site, Nеtwоrk, Platform, оr Matching Sеrvісе.&nbsp;<br />\n4.4. LIMITING ACCESS TO YOUR ACCOUNT. Skіllѕԛuаrеd mау access your Aссоunt іn&nbsp;<br />\nоrdеr to rеѕроnd tо your rеԛuеѕtѕ fоr tесhnісаl ѕuрроrt оr tо vеrіfу compliance wіth уоur&nbsp;<br />\nоblіgаtіоnѕ tо Skіllѕԛuаrеd , соmрlу wіth lаw, оr tо maintain and improve its own ѕуѕtеmѕ.&nbsp;<br />\nSkіllѕԛuаrеd mау, аt іtѕ орtіоn, provide еmаіl оr оthеr оnlіnе account support.&nbsp;<br />\n4.5. RESERVATION OF RIGHTS. Skіllѕԛuаrеd and іtѕ licensors еасh own аnd rеtаіn thеіr&nbsp;<br />\nrespective rights іn аnd tо all lоgоѕ, соmраnу names, mаrkѕ, trаdеmаrkѕ, соруrіghtѕ, trаdе&nbsp;<br />\nѕесrеtѕ, know-how, раtеntѕ and раtеnt applications thаt are used оr еmbоdіеd іn or оthеrwіѕе&nbsp;<br />\nrelated tо the Skіllѕԛuаrеd Properties. Skіllѕԛuаrеd grants no other rіghtѕ оr lісеnѕеѕ (іmрlіеd,&nbsp;<br />\nbу estoppel, or оthеrwіѕе) whatsoever to уоu under thіѕ CPAA.&nbsp;</p>\n\n<h3><br />\n5. USE OF INTELLECTUAL PROPERTY.</h3>\n\n<p>&nbsp;<br />\n5.1. RIGHTS IN USER CONTENT. Bу роѕtіng your іnfоrmаtіоn and оthеr соntеnt (&ldquo;User&nbsp;<br />\nCоntеnt&rdquo;) on оr thrоugh the Skіllѕԛuаrеd Properties, уоu grаnt Skіllѕԛuаrеd a worldwide, nоn-еxсluѕіvе, реrреtuаl, іrrеvосаblе, rоуаltу-frее, fullу paid, ѕublісеnѕаblе аnd trаnѕfеrаblе lісеnѕе&nbsp;<br />\ntо use, modify, rерrоduсе, dіѕtrіbutе, display, рublіѕh аnd реrfоrm User Content іn connection&nbsp;<br />\nwіth thе Skіllѕԛuаrеd Prореrtіеѕ. Skіllѕԛuаrеd hаѕ thе rіght, but nоt thе оblіgаtіоn, to mоnіtоr&nbsp;<br />\nthе Skillsquared Prореrtіеѕ аnd Uѕеr Content. Skіllѕԛuаrеd mау remove or disable аnу User&nbsp;<br />\nCоntеnt at аnу time fоr аnу reason, оr for no reason аt аll.&nbsp;<br />\n5.2. UNSECURED TRANSMISSION OF USER CONTENT. Yоu undеrѕtаnd thаt thе ореrаtіоn&nbsp;<br />\nоf thе Sіtе аnd Plаtfоrm, іnсludіng Uѕеr Cоntеnt, may bе unеnсrурtеd аnd іnvоlvе (а)&nbsp;<br />\ntransmissions оvеr vаrіоuѕ nеtwоrkѕ; (b) сhаngеѕ to соnfоrm and аdарt tо tесhnісаl rеԛuіrеmеntѕ&nbsp;<br />\nof connecting nеtwоrkѕ оr devices and (c) trаnѕmіѕѕіоn tо Skіllѕԛuаrеd &rsquo;ѕ third party vеndоrѕ&nbsp;<br />\nаnd hоѕtіng partners tо рrоvіdе thе necessary hardware, ѕоftwаrе, networking, ѕtоrаgе, аnd&nbsp;<br />\nrеlаtеd tесhnоlоgу rеԛuіrеd tо ореrаtе аnd mаіntаіn thе Skillsquared Prореrtіеѕ. Aссоrdіnglу,&nbsp;<br />\nуоu асknоwlеdgе thаt you bеаr ѕоlе responsibility fоr аdеԛuаtе ѕесurіtу, protection аnd backup&nbsp;<br />\nоf User Cоntеnt. Skillsquared wіll hаvе no lіаbіlіtу tо you fоr any unаuthоrіzеd access or uѕе оf&nbsp;<br />\nаnу оf Uѕеr Cоntеnt, оr аnу соrruрtіоn, dеlеtіоn, destruction оr lоѕѕ оf any оf User Cоntеnt.&nbsp;<br />\n5.3. FEEDBACK. Yоu mау ѕubmіt іdеаѕ, ѕuggеѕtіоnѕ, оr соmmеntѕ (&ldquo;Fееdbасk&rdquo;) rеgаrdіng thе&nbsp;<br />\nSkіllѕԛuаrеd Prореrtіеѕ or Skillsquared &rsquo;ѕ buѕіnеѕѕ, рrоduсtѕ оr ѕеrvісеѕ. Bу submitting аnу&nbsp;<br />\nFeedback, уоu acknowledge аnd аgrее thаt (а) уоur Fееdbасk is рrоvіdеd bу you voluntarily аnd&nbsp;<br />\nSkіllѕԛuаrеd mау, wіthоut аnу obligations or lіmіtаtіоn, uѕе and exploit ѕuсh Feedback іn аnу&nbsp;<br />\nmаnnеr аnd fоr any рurроѕе, (b) you wіll nоt ѕееk and аrе nоt еntіtlеd tо аnу mоnеу оr оthеr&nbsp;<br />\nfоrm of compensation, соnѕіdеrаtіоn, оr аttrіbutіоn with rеѕресt tо уоur Fееdbасk regardless оf&nbsp;<br />\nwhether Skіllѕԛuаrеd considered оr uѕеd уоur Fееdbасk іn аnу mаnnеr, and (с) your Fееdbасk&nbsp;<br />\nіѕ nоt thе соnfіdеntіаl оr proprietary information оf уоu оr any thіrd party.&nbsp;</p>\n\n<h3><br />\n6. YOUR REPRESENTATIONS AND WARRANTIES.&nbsp;</h3>\n\n<p>You rерrеѕеnt аnd wаrrаnt to Skillsquared thаt (а) you own аll Uѕеr Cоntеnt оr hаvе&nbsp;<br />\nоbtаіnеd аll реrmіѕѕіоnѕ, releases, rіghtѕ оr lісеnѕеѕ rеԛuіrеd to еngаgе іn your роѕtіng аnd other&nbsp;<br />\nасtіvіtіеѕ (аnd аllоw Skіllѕԛuаrеd to uѕе the ѕаmе аѕ реrmіttеd in thіѕ Agrееmеnt) in connection&nbsp;<br />\nwіth the Skіllѕԛuаrеd Properties; (b) Uѕеr Content аnd оthеr activities іn connection wіth the&nbsp;<br />\nSkіllѕԛuаrеd Properties, аnd Skillsquared &rsquo;ѕ exercise оf аll rіghtѕ аnd lісеnѕеѕ grаntеd bу уоu&nbsp;<br />\nhеrеіn, do nоt аnd wіll nоt vіоlаtе, іnfrіngе, оr mіѕаррrорrіаtе аnу thіrd party&rsquo;s copyright,&nbsp;<br />\ntrаdеmаrk, right оf рrіvасу оr рublісіtу, оr other реrѕоnаl or рrорrіеtаrу rіght, nor does User&nbsp;<br />\nCоntеnt соntаіn any mаttеr thаt іѕ dеfаmаtоrу, obscene, unlаwful, thrеаtеnіng, аbuѕіvе, tortious,&nbsp;<br />\nоffеnѕіvе оr hаrаѕѕіng; and (с) уоu аrе eighteen (18) уеаrѕ оf аgе оr оldеr.&nbsp;</p>\n\n<h3><br />\n7. PAYMENT.</h3>\n\n<p>By signing up with skillsquared you understand that all payment transaction must be&nbsp;<br />\nprocessed on skillsqured platform and failure to do comply may result in fine, suspension, or&nbsp;<br />\ntermination of agreement between you and skillsqured. Skillsquared hold the absolute right to&nbsp;<br />\nexact fines and punishment for non-compliant with CPAA as it sees fit.</p>\n\n<h3><br />\n7. TERMINATION.&nbsp;</h3>\n\n<p>Thе CPAA applies and rеmаіnѕ іn еffесt until уоu no lоngеr are uѕіng оr ассеѕѕіng the&nbsp;<br />\nSkіllѕԛuаrеd Properties, рrоvіdеd however thаt all рrоvіѕіоnѕ of a continuing nature іnсludіng,&nbsp;<br />\nwіthоut limitation, thоѕе ѕеt fоrth іn thе following ѕесtіоnѕ wіll ѕurvіvе the termination of this&nbsp;<br />\nCPAA: 2.3, 3, 4.1(b), 4.2, 4.4, 4.5, аnd 5 - 12. By signing up with Skillsquared you agree that&nbsp;<br />\nskillsqured possess the absolute right to terminate your services at its sole discretion and no&nbsp;<br />\nobligation to reverse action unless it pleases to.</p>\n\n<h3><br />\n8. NO WARRANTIES AND DISCLAIMER BY SKILLSQUARED &nbsp;.&nbsp;</h3>\n\n<p>THE SKILLSQUARED PROPERTIES, AND PARTICULARLY THE SITE, PLATFORM,&nbsp;<br />\nMATCHING SERVICES, CONTENT, PROPRIETARY INFORMATION AND ALL SERVER&nbsp;<br />\nAND NETWORK COMPONENTS, ARE PROVIDED ON AN &ldquo;AS IS&rdquo; AND &ldquo;AS&nbsp;<br />\nAVAILABLE&rdquo; BASIS WITHOUT ANY WARRANTIES OF ANY KIND, AND&nbsp;<br />\nSKILLSQUARED EXPRESSLY DISCLAIMS ALL OTHER REPRESENTATIONS AND&nbsp;<br />\nWARRANTIES, INCLUDING ANY IMPLIED WARRANTIES OF MERCHANTABILITY,&nbsp;<br />\nFITNESS FOR A PARTICULAR PURPOSE OR NON-INFRINGEMENT, AND ANY&nbsp;<br />\nREPRESENTATIONS OR WARRANTIES ARISING FROM COURSE OF DEALING,&nbsp;<br />\nCOURSE OF PERFORMANCE OR USAGE OF TRADE. YOU ACKNOWLEDGE THAT&nbsp;<br />\nSKILLSQUARED DOES NOT WARRANT THAT YOUR ACCESS OR USE OR BOTH OF&nbsp;<br />\nTHE SKILLSQUARED PROPERTIES WILL BE UNINTERRUPTED, TIMELY, SECURE,&nbsp;<br />\nERROR-FREE OR VIRUS-FREE, AND SKILLSQUARED DOES NOT MAKE ANY&nbsp;<br />\nWARRANTY AS TO THE RESULTS THAT MAY BE OBTAINED FROM USE OF THE&nbsp;<br />\nSKILLSQUARED &nbsp;&nbsp;PROPERTIES, AND NO INFORMATION, ADVICE OR SERVICES&nbsp;<br />\nOBTAINED BY YOU FROM SKILLSQUARED OR THROUGH THE SKILLSQUARED&nbsp;<br />\nPROPERTIES WILL CREATE ANY WARRANTY NOT EXPRESSLY STATED IN THIS&nbsp;<br />\nCPAA.&nbsp;</p>\n\n<h3><br />\n9. LIMITED LIABILITY.&nbsp;</h3>\n\n<p>9.1 EXCLUSION OF DAMAGES AND LIMITATION OF LIABILITY. Skіllѕԛuаrеd does nоt&nbsp;<br />\nсhаrgе fees for уоu tо access and use thе Skіllѕԛuаrеd Properties pursuant tо this CPAA. As&nbsp;<br />\nconsideration fоr уоur frее ассеѕѕ and use оf thе Skillsquared Properties рurѕuаnt tо thіѕ CPAA,&nbsp;<br />\nуоu further agree that SKILLSQUARED WILL NOT BE LIABLE TO YOU FOR ANY&nbsp;<br />\nINCIDENTAL, CONSEQUENTIAL, INDIRECT, SPECIAL, PUNITIVE OR EXEMPLARY&nbsp;<br />\nDAMAGES (INCLUDING DAMAGES FOR LOSS OF BUSINESS, LOSS OF&nbsp;<br />\nPROFITS,EMOTIONAL DISCOMFORT, &nbsp;BODILIY INJURY, DAMAGE TO PROPERTIES,<br />\nOR THE LIKE) ARISING OUT OF OR RELATING TO THIS CPAA, INCLUDING&nbsp;<br />\nWITHOUT LIMITATION, YOUR USE OR INABILITY TO USE THE SITE, PLATFORM,&nbsp;<br />\nMATCHING SERVICES, CONTENT, PROPRIETARY INFORMATION, OR ANY&nbsp;<br />\nINTERRUPTION OR DISRUPTION OF SUCH USE, EVEN IF SKILLSQUARED HAS&nbsp;<br />\nBEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES AND REGARDLESS OF&nbsp;<br />\nTHE CAUSE OF ACTION (WHETHER IN CONTRACT, TORT, BREACH OF WARRANTY&nbsp;<br />\nOR OTHERWISE). THE AGGREGATE LIABILITY OF SKILLSQUARED WITH REGARD&nbsp;<br />\nTO THIS CPAA WILL IN NO EVENT EXCEED USD$1.00.&nbsp;<br />\n10. DISPUTE RESOLUTION; JURY WAIVER.&nbsp;<br />\nTHIS CPAA IS MADE UNDER, AND WILL BE CONSTRUED AND ENFORCED IN&nbsp;<br />\nACCORDANCE WITH, THE LAWS APPLICABLE TO AGREEMENTS MADE AND TO BE&nbsp;<br />\nPERFORMED SOLELY THEREIN, WITHOUT GIVING EFFECT TO PRINCIPLES OF&nbsp;<br />\nCONFLICTS OF LAW. In аnу асtіоn bеtwееn or among any оf the parties, whether аrіѕіng оut&nbsp;<br />\nоf thіѕ CPAA оr оthеrwіѕе, еасh of the раrtіеѕ irrevocably аnd unсоndіtіоnаllу (а) соnѕеntѕ аnd&nbsp;<br />\nѕubmіtѕ tо thе exclusive jurіѕdісtіоn аnd vеnuе of thе ѕtаtе аnd fеdеrаl courts lосаtеd іn,&nbsp;<br />\nMaryland; (b) WAIVES ANY AND ALL RIGHT TO TRIAL BY JURY IN ANY LEGAL&nbsp;<br />\nPROCEEDING ARISING OUT OF OR RELATED TO THIS AGREEMENT OR ANY&nbsp;<br />\nTRANSACTIONS CONTEMPLATED HEREBY; аnd (c) consents tо service of рrосеѕѕ bу fіrѕt&nbsp;<br />\nсlаѕѕ certified mаіl, rеturn rесеірt rеԛuеѕtеd, postage prepared, tо thе address at which ѕuсh раrtу&nbsp;<br />\nіѕ tо rесеіvе nоtісе іn ассоrdаnсе wіth Section 11.&nbsp;</p>\n\n<h3><br />\n11. APPLICABLE AGREEMENTS.&nbsp;</h3>\n\n<p>Skіllѕԛuаrеd Tаlеnt реrfоrm ѕеrvісеѕ pursuant to Tаlеnt Services аgrееmеntѕ thаt Clients and&nbsp;<br />\nSkillsquared enter into ѕераrаtе frоm thіѕ CPAA. Yоur ассеѕѕ оr use оf thе Skillsquared&nbsp;<br />\nPrореrtіеѕ other than Mаtсhіng Sеrvісеѕ аlwауѕ will bе governed bу thе thеn-сurrеnt CPAA.&nbsp;<br />\nYоur ассеѕѕ аnd uѕе of Matching Sеrvісеѕ аlѕо will bе gоvеrnеd by the then-current CPAA,&nbsp;<br />\nunless you аrе ассеѕѕіng аnd uѕіng thе Mаtсhіng Sеrvісеѕ whіlе you are a раrtу tо аn active&nbsp;<br />\nAgrееmеnt, in which саѕе уоur ассеѕѕ аnd uѕе оf the Mаtсhіng Sеrvісеѕ will bе gоvеrnеd ѕоlеlу&nbsp;<br />\nbу thе Agrееmеnt in соnnесtіоn wіth whісh you are ассеѕѕіng аnd uѕіng thе Mаtсhіng Sеrvісеѕ.&nbsp;</p>\n', 0, 0, '', '', '', '2018-06-08 03:18:43'),
(4, 'About Us', 'Getting To Know More About SkillSquared', '1116443303844.jpeg', '<h1>Under Revision.</h1>\n', 0, 0, '', '', '', '2018-06-08 03:19:07'),
(9, 'certification', 'Certifications', 'defaultbanner.png', '<h2>CERTIFICATION&rsquo;S OVERVIEW:</h2>\n\n<p>CPPEx Global offers a comprehensive certification program for professional associated with printing, packaging and associated industries. This certification program is well recognized and highly demanded that demonstrates to employers, clients and colleagues that a certified employee possesses sound knowledge, experience, skills and competencies in the printing and packaging field. Our certification program recognizes the competence of an individual to perform his duties as a prepress, press machine operator, supervisor and manager. The certifications are developed and maintained through a vigorous process. The certification program includes;</p>\n\n<ul>\n	<li dir=\"ltr\">Certified Press Operator &ndash; CPO</li>\n	<li dir=\"ltr\">Certified Print Supervisor &ndash; CPS</li>\n	<li dir=\"ltr\">Certified Design &amp; Prepress Operator- CDPO</li>\n	<li dir=\"ltr\">Certified color Management Technician &ndash; CCMT</li>\n</ul>\n\n<p dir=\"ltr\">The CPPEx Global certification program is accredited by the American National Standard Institute (ANSI) against the international organization for standardization (ISO) 12647. Our certifications are distinguished by their global development and application which makes them transferable across printing and packaging industries and geographic borders. This certification program is designed to testify and ensure that all certification holders have demonstrated their competence though fair and valid measure as well as have the qualifications, skill, knowledge, abilities, expertise, experience, training, and education to officially and with authorization practice his/her chosen profession. The professional certification program based on following 10 modules and with consecutive 10 days, eight hours each day in total 80 contact hours.</p>\n\n<ol>\n	<li dir=\"ltr\">Machine Variables and Setting</li>\n	<li dir=\"ltr\">Design &amp; File Preparation</li>\n	<li dir=\"ltr\">Fingerprint Trial</li>\n	<li dir=\"ltr\">Flexoplate and Anilox</li>\n	<li dir=\"ltr\">Engraved Cylinder</li>\n	<li dir=\"ltr\">Color Management</li>\n	<li dir=\"ltr\">Film &amp; Paper Board</li>\n	<li dir=\"ltr\">Doctor Blade and Chamber</li>\n	<li dir=\"ltr\">Process and Product Validation</li>\n	<li dir=\"ltr\">Print and OSHA / Environmental Standards</li>\n</ol>\n\n<p>&nbsp;</p>\n\n<p dir=\"ltr\">CPPEx Global understands the importance of impartiality in carrying out its certification activities, manage conflict of interest and ensures the objectivity of its certification activities and entire certification program is supervised by the Certification Governance Panel (CGP).</p>\n\n<p>&nbsp;</p>\n\n<h2>CERTIFICATIONS BENEFITS</h2>\n\n<p>Education, validation and recognition - just a few characteristics of a quality professional certification that distinguish individuals who have demonstrated particular knowledge or skills required for a specific role or profession. CPPEx Global&rsquo;s professional certifications provide the following benefits to the printing and packaging professionals.&nbsp;<br />\nHelp to advance and ensure qualifications and serve as indicators of diligence, perseverance and competence in certified professionals.<br />\nProvide a way for individuals to identify and recognize the skills, knowledge and competence levels that they need to master in the printing and packaging field.</p>\n\n<ul>\n	<li>Our Certification programs add value both early in a profession and later in a professional&rsquo;s career to the individual working in the industrial sector.</li>\n	<li>Professional certification also functions as a &ldquo;career escalator&rdquo; for mid-career professionals.</li>\n	<li>Our certification program develop people, helping them to maintain required knowledge, skills, competencies and abilities throughout his job career.</li>\n	<li>Certification programs differentiate people with different levels of professional proficiency or specialty in the printing and packaging field.</li>\n	<li>Certification programs recognize people, acknowledging or rewarding those who consistently perform to a standard.</li>\n	<li>Our certification programs promote responsible conduct through the establishment of ethics and disciplinary codes, continuing education requirements, and assessments of core competencies.</li>\n	<li>Our professional programs regularly update certification examinations and requirements to reflect current knowledge, evolving skills and help to drive innovation and professional proficiency in the printing and packaging field.</li>\n	<li>Professional certification gives individuals confidence, motivation that they can be successful working for themselves.</li>\n	<li>Our certifications create entry-level access to skilled jobs that do not typically have degree or stringent prior experience requirements, with employers seeking certified candidates and willing to pay a premium for the demonstration of competency that certification provides.</li>\n	<li>Certified professionals also tend to experience greater job satisfaction&mdash;a perhaps unsurprising finding given the related evidence that certified professionals exhibit improved job performance.</li>\n	<li>Thus, for the certified professional, the credential provides credibility, recognition, job satisfaction, and often increased earning power and/or enhanced prospects for employment.</li>\n	<li>The certification testifies to the fact that this operator has the qualifications, skill, knowledge, abilities, expertise, experience, training, and education to officially and with authorization practice his/her chosen profession.</li>\n</ul>\n\n<p dir=\"ltr\"><b>ELIGIBILITY REQUIRMENTS</b></p>\n\n<p dir=\"ltr\">To be eligible for the CPPEx Global certification, you must meet certain educational and professional experience requirements. All print and packaging related experience must have been accrued within the last five consecutive years prior to your application submission.</p>\n\n<table>\n	<tbody>\n		<tr>\n			<th>Educational Background</th>\n			<th>Printing &amp; Packaging experience</th>\n			<th>Course Contact hours Completion</th>\n			<th>Employer&rsquo;s Status</th>\n		</tr>\n		<tr>\n			<td>High school diploma</td>\n			<td>Minimum five years/60 months</td>\n			<td>90% Contact hours interaction with trainer</td>\n			<td>Must Associate/corporate Member of CPPEx GLOBAL</td>\n		</tr>\n		<tr>\n			<td colspan=\"4\">OR</td>\n		</tr>\n		<tr>\n			<td>Bachelor&rsquo;s degree or global equivalent</td>\n			<td>Minimum three years/48 months</td>\n			<td>90% Contact hours interaction with trainer</td>\n			<td>Must Associate/corporate Member of CPPEx GLOBAL</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<p>In case of the failure to meet the above eligibility for our certification program, the applicant must complete the 150 contact hour&rsquo;s pre-certification course.</p>\n\n<p>&nbsp;</p>\n\n<p>APPLICATION &amp; PAYMENT</p>\n\n<p>CPPEx Global encourage you to use the online application system to apply all certifications. A printed version of the application is available on a case by case basis and for more details or in case of any question contact our any corporate office or any regional office. Please ensure the following points before submission your application for CPPEx Global certification program.</p>\n\n<ul>\n	<li>\n	<p role=\"presentation\">Before you begin, check to make sure you meet the certification eligibility requirements and can record the necessary information on the application.</p>\n	</li>\n	<li>\n	<p role=\"presentation\">Once you start an online application, you will have to complete all your information and cannot cancel it.</p>\n	</li>\n	<li>\n	<p role=\"presentation\">Ensure that the application includes your valid, unique email address and phone number as these will be the primary mode of communication from CPPEx Global throughout the certification process.</p>\n	</li>\n	<li>\n	<p role=\"presentation\">You will be required to read and agree to the CPPEx Global code of ethics and professional conduct and the certification application/ renewal agreement.</p>\n	</li>\n	<li>\n	<p role=\"presentation\">Incomplete application for certifications will not be processed or returned.</p>\n	</li>\n</ul>\n\n<p>CPPEx Global strives to process applications for certification in a timely manner. The application timeline depends on how you submit your application- either online using the certification system or on paper sent by postal mail to CPPEx Global.</p>\n\n<p>APPLICATION FEES:</p>\n\n<p>The proper fees for payment are determined by your personal or employer membership status as well as your geographical location. Use the following chart to determine the CPPEx Global certification fee.</p>\n\n<table border=\"1\">\n	<tbody>\n		<tr>\n			<th>Certification Exams</th>\n			<th>Member Status</th>\n			<th>Fees</th>\n			<th>Certification Exams</th>\n			<th>Member Status</th>\n			<th>Fees</th>\n		</tr>\n		<tr>\n			<td>&nbsp; Certified Press Operator &ndash; CPO</td>\n			<td>&nbsp; Member</td>\n			<td>$500</td>\n			<td>&nbsp; Certified Press Operator &ndash; CPMO</td>\n			<td>Non-Memeber</td>\n			<td>$1000</td>\n		</tr>\n		<tr>\n			<td>&nbsp; Certified Print Supervisor &ndash; CPS</td>\n			<td>Member</td>\n			<td>$500</td>\n			<td>&nbsp; Certified Print Supervisor &ndash; CPS</td>\n			<td>Non-Memeber</td>\n			<td>$1000</td>\n		</tr>\n		<tr>\n			<td>&nbsp; Certified Design &amp; Prepress Supervisor- CDPS</td>\n			<td>Member</td>\n			<td>$500</td>\n			<td>&nbsp; Certified Design &amp; Prepress Supervisor- CDPS</td>\n			<td>Non-Memeber</td>\n			<td>$1000</td>\n		</tr>\n		<tr>\n			<td>&nbsp; Certified color Management Technician &ndash; CCMT</td>\n			<td>Member</td>\n			<td>$500</td>\n			<td>&nbsp; Certified color Management Technician &ndash; CCMT</td>\n			<td>Non-Memeber</td>\n			<td>$1000</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>The membership rate will apply only if you or your organization is a corporate or associate member of CPPEx Global at the time you submit payment for the certification. If you apply for membership right before you apply for the certification, make sure you receive confirmation of your membership before you pay for the certification. If your membership has not been completely processed before you pay for the certification, you will be charged the non-member fees. The membership is obtained after you submit payment for the certification, CPPEx Global will not refund the difference back to the applicant.</p>\n\n<p>Once application review process will complete, CPPEx Global team will inform the applicant by phone or email about his/her application final status. In case of approval, the next step is to submit the certification payment through online system. The payment $500 or below will be acceptable online system, while higher than this amount, payment will be direct transfer to our any regional office or corporate&rsquo;s office.</p>\n\n<p>CANCELLATION OR REFUND POLICY</p>\n\n<p>To obtain a refund for the professional certification, you must make a request to CPPEx Global at least 30 days before the training session. After 30 days, paid fees will not be aligned to refund, but the applicant can use this fee within a year for any certification or our training session.</p>\n\n<p>COMPLAINT PROCESS</p>\n\n<p>All complaints regarding training session, professional certifications or &ldquo;Best operator awards&rdquo; are governed by the CPPEx Global complaints process that must be received within 30 days of the event/ incident cited, made in filling our&nbsp;online complaint form&nbsp;or writing via email at&nbsp;<a href=\"mailto:complaint@cppexglobal.org\">complaint@cppexglobal.org</a>.</p>\n\n<p>All complaints should include evidence supporting the reason for the complaint and nature of the request, including all reasons why the action or decision should be changed. A complaint must include;</p>\n\n<ul>\n	<li>Name and email address of the complainant</li>\n	<li>Date, event name and location of the training session.</li>\n	<li>Name against whom the complaint is made, if applicable</li>\n	<li>Reference to the CPPEx Global training session, certifications that was violated as per policy.</li>\n	<li>A description of how the policy or procedure of training session or certifications was violated.</li>\n	<li>Any applicable evidence that support the complaint.</li>\n</ul>\n\n<p>We will acknowledge, in writing, your complaint within 5 days of receipt. If a complaint is missing any necessary information, you will be informed and allowed an additional 15 days to supply the missing information. If the required information is not submitted within that time, the request shall be closed.</p>\n\n<p>&nbsp;</p>\n\n<p>The review and validation of the complaint will occur in a constructive, impartial and timely manner. You will be notified of the outcome within 10 business days of the decision being made. A record of the complaint, including any subsequent action(s) taken, and decision made will be maintained by CPPEx Global. All information pertaining to the complaint will remain confidential.</p>\n\n<p>You have the right to escalate your complaint within 10 calendar days of the notification of the decision rendered. The escalation request should be submitted in writing and can be sent via email or mail to our concerning regional representative or our main office. A decision around the escalation will be communicated to you within 10 days of CPPEx Global&rsquo;s receipt of the escalation request, unless circumstances warrant a delay and if delay is expected, you will be notified.</p>\n', 1, 0, 'certifications , packaging , printing', 'CPPEx offers various certifications', 'CPPEx Global offers a comprehensive certification program for professional associated with printing, packaging and associated industries', '2020-02-22 11:15:58'),
(10, 'Why CPPex Global', '', 'defaultbanner.png', '<h4>DISTINGUISHED REFERENCES</h4>\n\n<p>Our outstanding record in catering to the operational excellence needs of the top players in all printing, packaging and associated industries we work with, armed with years of experience and extensive know-how, allows us to offer, not just training and consultancy, but customized comprehensive solutions that suites your company&rsquo;s current and future needs.</p>\n\n<h4>FOSTERING RELATIONSHIPS</h4>\n\n<p>We understand that impactful business relations are the foundation of mutual success, and that&rsquo;s why our priority is to build strong long-lasting relations with our customers, national and our international partners. We see our client&rsquo;s business as ours, and we work continuously on enhancing and fostering global partnerships, to be able to provide the optimum know-how and support to our customers.</p>\n\n<h4>KNOW-HOW</h4>\n\n<p>NOT PRODUCTS BUT SOLUTIONS We enable our customers to maximize the utilization of their existing equipment and human capital resources, by our expert&rsquo;s team through tailored training services and solutions that maximize equipment uptime, reduce your cost and help you to improve your company&rsquo;s profitability by developing highly productive and reliable solutions to reach and sustain your desired performance levels.</p>\n\n<h4>LEVEL UP THE SKILLS</h4>\n\n<p>Your people are your most valuable asset. Group training will ensure that knowledge levels are consistent and will allow teams to discuss how subjects affect their roles and tasks.</p>\n\n<h4>ADVANCED INTELLECTUAL PROPERTY</h4>\n\n<p>Our 15 years&rsquo; experience and extensive work in the field of printing, packaging and its associated industries enabled us to build a massive problem statements and its related solutions library to provide the latest training methods, technologies and tools to help you increase productivity, effectiveness, uncover hidden capacity, generate more revenue and ensure product quality thorough trained operator, maintenance, quality and management personnel.</p>\n', 0, 0, 'printing', 'Why cppex global', 'Our outstanding record in catering to the operational excellence needs of the top players in all printing', '2020-02-25 09:59:07'),
(11, 'MISSION & VISION', '', '4871350012896.jpg', '<h4>VISION</h4>\r\n\r\n<ul>\r\n	<li class=\"MsoNoSpacing\" style=\"text-align: justify; margin: 0in 0in 0.0001pt;\">To become a leading training &amp; consultancy organization of printing &amp; packaging industries in the world.</li>\r\n</ul>\r\n\r\n<p class=\"MsoNoSpacing\" style=\"text-align:justify; margin:0in 0in 0.0001pt\">&nbsp;</p>\r\n\r\n<h4>MISSION</h4>\r\n\r\n<ul>\r\n	<li>To empower professionals through training, consultancy and development in a powerful way to achieve business objectives.</li>\r\n	<li>To provide reliable, high quality and affordable trainings &amp; consultancy services&nbsp;to fulfill customer needs, goals and market challenges.</li>\r\n	<li>To deliver cost effective learning that advances the knowledge, sharpen the skills and qualification of professionals within printing &amp; packaging and its relevant sectors.</li>\r\n	<li>To work in partnership with our global clients to ensure our international presence in the training and consultancy world.</li>\r\n	<li>To be flexible in our approach to ensure we create advanced solutions to meet the needs of the valued clients.</li>\r\n	<li>To define objectives, plan a strategy to deliver appropriate training and consultancy to achieve business goals.</li>\r\n</ul>\r\n\r\n<p class=\"MsoNoSpacing\" style=\"text-align:justify; margin:0in 0in 0.0001pt\">&nbsp;</p>\r\n\r\n<h4>OUR CORE VALUES</h4>\r\n\r\n<p class=\"MsoNoSpacing\" style=\"text-align:justify; margin:0in 0in 0.0001pt\">Our core values are based on six principles;</p>\r\n\r\n<ul>\r\n	<li>Integrity.&nbsp;All our training &amp; consultancy approaches are based on honesty, authenticity, accountability and trust.&nbsp;</li>\r\n	<li>Technical Awareness:&nbsp;Achieving diversity within our trainers &amp; experts and program participants helps increase mutual understanding of technical aspects of process.</li>\r\n	<li>Collaboration:&nbsp;Working together creates a better result by tapping into our collective wisdom.</li>\r\n	<li>Professionalism:&nbsp;All our training materials reflect on ourselves and our customers. We act and communicate with courtesy, respect and discretion.</li>\r\n	<li>Excellence:&nbsp;Passion, innovation and a commitment to serve drive us to deliver the highest quality work.</li>\r\n	<li>Service:&nbsp;We care deeply about our beneficiaries, sponsors and colleagues and respond to their needs with flexibility, reliability and dedication.</li>\r\n</ul>\r\n', 0, 0, 'To empower professionals through training', 'To empower professionals through training', 'To empower professionals through training', '2020-02-25 10:01:17'),
(12, 'OUR GLOBAL PRESENCE', '', 'defaultbanner.png', '<h4>OUR GLOBAL PRESENCE</h4>\n\n<p>Our outstanding record in catering to the operational excellence needs of the top players in all printing, packaging and associated industries we work with, armed with years of experience and extensive know-how, allows us to offer, not just training and consultancy, but customized comprehensive solutions that suites your company&rsquo;s current and future needs.</p>\n\n<h4>FOSTERING RELATIONSHIPS</h4>\n\n<p>We understand that impactful business relations are the foundation of mutual success, and that&rsquo;s why our priority is to build strong long-lasting relations with our customers, national and our international partners. We see our client&rsquo;s business as ours, and we work continuously on enhancing and fostering global partnerships, to be able to provide the optimum know-how and support to our customers.</p>\n\n<h4>KNOW-HOW</h4>\n\n<p>NOT PRODUCTS BUT SOLUTIONS We enable our customers to maximize the utilization of their existing equipment and human capital resources, by our expert&rsquo;s team through tailored training services and solutions that maximize equipment uptime, reduce your cost and help you to improve your company&rsquo;s profitability by developing highly productive and reliable solutions to reach and sustain your desired performance levels.</p>\n\n<h4>LEVEL UP THE SKILLS</h4>\n\n<p>Your people are your most valuable asset. Group training will ensure that knowledge levels are consistent and will allow teams to discuss how subjects affect their roles and tasks.</p>\n\n<h4>ADVANCED INTELLECTUAL PROPERTY</h4>\n\n<p>Our 15 years&rsquo; experience and extensive work in the field of printing, packaging and its associated industries enabled us to build a massive problem statements and its related solutions library to provide the latest training methods, technologies and tools to help you increase productivity, effectiveness, uncover hidden capacity, generate more revenue and ensure product quality thorough trained operator, maintenance, quality and management personnel.</p>\n', 0, 0, 'packaging,printing,training', 'OUR GLOBAL PRESENCE', 'Our outstanding record in catering to the operational excellence needs of the top players in all printing, packaging and associated industries', '2020-02-25 10:15:23'),
(13, 'BUSINESS DEVELOPMENT', '', '5405517298570.jpg', '<p>Every business needs a plan, a strategy that defines your vision, your goals and how you are going to reach them.&nbsp;Whether you are a new business owner, or already have a small business,&nbsp;a simple business strategy can take your business to the next level. Does a business strategy have to be complicated?&nbsp;No. Some business plans can fit on three sheets of paper.&nbsp;Don&#39;t let business planning and strategy fall by the wayside; plan today and reap the benefits for years to come. CPPEx Global has connections to business mentors and advisors who can help you devise the right business plan for&nbsp;the right product and for the right market. Our expert&rsquo;s provide customize improvements and solutions&nbsp;to integrate into current processes and improve your company&rsquo;s overall efficiency, business performance and profitability. We are flexible in working on a specific one time project or as an integral member of your team. We will consider working on the basis of various options such as fee basis, retainer, lump sum, commission, equity or combination thereof, depending on the particular situation and we are flexible in working with you in the most appropriate method that meets your requirements&nbsp;by working with clients, partners, representatives, manufacturers, suppliers and distributors or by providing advice and assistance on a consulting basis.</p>\n\n<p>CPPEx Global&rsquo;s expert&rsquo;s panel helps your organisation to;</p>\n\n<ul>\n	<li>Clarify your Vision.</li>\n	<li>Explore right business model for your business.</li>\n	<li>Craft long-term and short-term goals with strategic marketing actions plan.</li>\n	<li>Set your revenue and expense model.</li>\n	<li>Scope out the competition and developing export potential.</li>\n	<li>Brainstorm on new products development and services.</li>\n	<li>Product development &amp; diversification.</li>\n	<li>Vertical business development with defining performance indicators.</li>\n	<li>Competitor research &amp; analysis and strategic business planning.</li>\n	<li>Capitalising on and protecting Intellectual property.</li>\n	<li>Enhancement of e-business capability and Identifying win strategies and themes.</li>\n	<li>Business restructuring, staff development and win work&rsquo; training programme.</li>\n</ul>\n\n<p>We also provide the consultancy in;</p>\n\n<ul>\n	<li>Marketing and Sales support in developing and expanding the markets for your products and services.</li>\n	<li>Marketing and Sales strategy, &nbsp;potential Analysis, SWOT, Business Plan, Mailshots, Defining Key Objectives, Business Action Plans.</li>\n	<li>Assistance with contract negotiations, project implementation and other business transactions.</li>\n	<li>Assistance in evaluating, negotiating and structuring transactions.</li>\n	<li>Train your personnel to understand and effectively compete in the global marketplace.</li>\n	<li>Assist companies with their international business activities at all levels. Whether you are initially evaluating international opportunities or striving to increase the effectiveness of your existing program, we can help you reap the benefits of the global economy and achieve success.</li>\n</ul>\n\n<p>We work with our clients in providing valuable strategic advice coupled with practical hands-on operational support that create long-term value for an organisation from customers, markets, and relationships, assisting them in strategizing how their interaction can create opportunities for growth and business sustainability.</p>\n\n<p>If you have any question, please&nbsp;<a href=\"contact/index\">CONTACT</a>&nbsp;the CPPEx Global Head office, or send email to&nbsp;<a href=\"mailto:info@cppexglobal.org\">info@cppexglobal.org</a>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 col-sm-offset-1 text-center\"><a href=\"business-development\">BUSINESS DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"product-development\">PRODUCT DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"business-innovation\">BUSINESS INNOVATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"process-optimization\">PROCESS OPTIMIZATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"markete-analysis\">MARKET ANALYSIS</a></div>\n', 0, 0, 'certifications , packaging , printing', 'CPPEx Global has connections to business mentors', 'Every business needs a plan, a strategy that defines your vision', '2020-02-25 10:28:22');
INSERT INTO `cms` (`id`, `post_title`, `short_heading`, `post_banner`, `post_description`, `displaysidebar`, `sidebar`, `meta_keyword`, `meta_title`, `meta_description`, `created_on`) VALUES
(14, 'Product Development', '', '5232984148308.jpg', '<p>An integral part of a business growth strategy involves the creation of innovative products and services to achieve competitive market advantages and better address customer needs.&nbsp;&nbsp;New products can make a profound contribution to competitiveness and this is particularly acute in an era of accelerating technological change, general shortening of the product life cycle, and increasingly intense competition.&nbsp;New product development is a challenging, complex undertaking that involves critical interdependent activities and considerations, including, but not limited to: &nbsp;marketing, research, development, risk assessment, cost analysis, quality,&nbsp;regulatory&nbsp;compliance, launch preparation, commercialization, cross-functional collaboration, corporate strategy,&nbsp;portfolio management&nbsp;and resource allocation.&nbsp;CPPEx Global addresses product development complexities by applying professional project management to your initiatives. &nbsp;We create the innovation framework that will enable you to translate your ideas into new products and services and get them to printing &amp; packaging market faster, better, and cheaper.&nbsp;Product development is a multistage process that includes ideation, concept/prototype development, consumer testing, shelf life testing, labeling, production scale up and launch. We are highly experienced in all stages of product development and have worked for largest group of food, printing and packaging industries worldwide. We are able to manage whole projects or work on specific problems or stages of your project.&nbsp;We work with organization to transform new product development capabilities for improved development effectiveness, reduction in time to market and increased R&amp;D productivity.&nbsp;&nbsp;Our approach includes assessing, benchmarking, designing, piloting and implementing key elements in the areas of governance and decision making, process structure, and project excellence.</p>\n\n<p>CPPEx Global team assist the companies by;</p>\n\n<ul>\n	<li>Developing new cost effective and innovative, market competitive product.</li>\n	<li>Existing product evaluation, re-structuring and reformulation after market analysis.</li>\n	<li>Shelf life extension on the basis of evaluation in lieu of international regulations and standards.</li>\n	<li>Product and process optimising.</li>\n	<li id=\"h.gjdgxs\">Product formulations to meet specific food safety international regulations and standards.</li>\n	<li>Participation from idea generation, screening, evaluation, development to launching of the product.</li>\n	<li>Reformulation new product after depth analysis of cost, time, market size, positioning and market competition.</li>\n</ul>\n\n<p>If you have any question, please&nbsp;<a href=\"contact/index\">CONTACT</a>&nbsp;the CPPEx Global Head office, or send email to&nbsp;<a href=\"mailto:info@cppexglobal.org\">info@cppexglobal.org</a>&nbsp;</p>\n\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 col-sm-offset-1 text-center\"><a href=\"business-development\">BUSINESS DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"product-development\">PRODUCT DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"business-innovation\">BUSINESS INNOVATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"process-optimization\">PROCESS OPTIMIZATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"markete-analysis\">MARKET ANALYSIS</a></div>', 0, 0, 'certifications , packaging , printing', 'Product Development', 'Product Development', '2020-02-25 10:32:45'),
(15, 'Business innovation', '', '5177582198381.jpg', '<p>To be competitive in the global marketplace, organizations need to be driving more innovation in their products and services. They need to innovate rapidly and they need to do it cost-effectively.&nbsp;Organizations today have to work very hard&nbsp;to stay competitive and survive in the marketplace,&nbsp;but just surviving is not good enough. Companies want to grow in size and ultimately grow in value to their shareholders,&nbsp;but the ways of doing that are pretty limited.&nbsp;The only true, sustainable and virtually unlimited source&nbsp;of new growth for any organization is innovation because innovation is about making the world a better place and&nbsp;vital for long-term productivity growth.&nbsp;It is important to have a clear vision of where the company is going, as it will define and set the context for the role innovation will play in enabling profitable growth, help determine the type of innovation you want to drive and the way you need to organize to effect change.</p>\n\n<p>CPPEx Global has a group of business mentors who can advise on designing the right business model for your project. Often entrepreneurs and project managers don&#39;t see the business operation from an overall perspective so having&nbsp;<a href=\"https://www.google.com/url?q=http://www.betterbydesign.org.nz/&amp;sa=D&amp;ust=1581886833535000\">better by our design</a>&nbsp;consultants can often help make things more efficient and effective. Analyze&nbsp;assessment findings, comparing them to industry benchmarks, best practices and SOPs and manufacturer specifications. In addition to these, our experts offer to;</p>\n\n<ul>\n	<li>Improving or replacing existing business processes to increase efficiency and productivity, or to enable the business to extend the range or quality of existing products and/or services through the innovation.</li>\n	<li>Developing entirely new and improved products and services - often to meet rapidly changing customer or consumer demands or needs.</li>\n	<li>Adding value to existing products, services or markets to differentiate the business from its competitors and increase the perceived value to the customers and markets.</li>\n	<li>Developing an Innovation Strategy for your business.</li>\n	<li>Developing an Innovation Culture and environment.</li>\n	<li>Organizational Assessment and effective analysis.</li>\n	<li>Cultural Assessment.</li>\n	<li>Developing an Innovation business process with market leading approach.</li>\n	<li>Identification of gaps in the process and areas of Opportunity.</li>\n	<li>Communities of Innovation</li>\n	<li>Ideation and brainstorming within the organization</li>\n	<li>Innovation tools implementation for the process optimization.</li>\n	<li>Innovation metrics in your organization.</li>\n</ul>\n\n<p>If you have any question, please&nbsp;<a href=\"contact/index\">CONTACT</a>&nbsp;the CPPEx Global Head office, or send email to&nbsp;<a href=\"mailto:info@cppexglobal.org\">info@cppexglobal.org</a>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 col-sm-offset-1 text-center\"><a href=\"business-development\">BUSINESS DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"product-development\">PRODUCT DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"business-innovation\">BUSINESS INNOVATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"process-optimization\">PROCESS OPTIMIZATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"markete-analysis\">MARKET ANALYSIS</a></div>\n', 0, 0, 'certifications , packaging , printing', 'Business innovation', 'business innovation', '2020-02-25 10:40:16'),
(16, 'Process Optimization', '', '3001130975352.jpg', '<p>To be competitive in the global marketplace, organizations need to be driving more innovation in their products and services. They need to innovate rapidly and they need to do it cost-effectively.&nbsp;Organizations today have to work very hard&nbsp;to stay competitive and survive in the marketplace,&nbsp;but just surviving is not good enough. Companies want to grow in size and ultimately grow in value to their shareholders,&nbsp;but the ways of doing that are pretty limited.&nbsp;The only true, sustainable and virtually unlimited source&nbsp;of new growth for any organization is innovation because innovation is about making the world a better place and&nbsp;vital for long-term productivity growth.&nbsp;It is important to have a clear vision of where the company is going, as it will define and set the context for the role innovation will play in enabling profitable growth, help determine the type of innovation you want to drive and the way you need to organize to effect change.</p>\n\n<p>CPPEx Global has a group of business mentors who can advise on designing the right business model for your project. Often entrepreneurs and project managers don&#39;t see the business operation from an overall perspective so having&nbsp;better by our design&nbsp;consultants can often help make things more efficient and effective. Analyze&nbsp;assessment findings, comparing them to industry benchmarks, best practices and SOPs and manufacturer specifications. In addition to these, our experts offer to;</p>\n\n<ul>\n	<li>Improving or replacing existing business processes to increase efficiency and productivity, or to enable the business to extend the range or quality of existing products and/or services through the innovation.</li>\n	<li>Developing entirely new and improved products and services - often to meet rapidly changing customer or consumer demands or needs.</li>\n	<li>Adding value to existing products, services or markets to differentiate the business from its competitors and increase the perceived value to the customers and markets.</li>\n	<li>Developing an Innovation Strategy for your business.</li>\n	<li>Developing an Innovation Culture and environment.</li>\n	<li>Organizational Assessment and effective analysis.</li>\n	<li>Cultural Assessment.</li>\n	<li>Developing an Innovation business process with market leading approach.</li>\n	<li>Identification of gaps in the process and areas of Opportunity.</li>\n	<li>Communities of Innovation</li>\n	<li>Ideation and brainstorming within the organization</li>\n	<li>Innovation tools implementation for the process optimization.</li>\n	<li>Innovation metrics in your organization.</li>\n</ul>\n\n<p>If you have any question, please&nbsp;<a href=\"contact/index\">CONTACT</a>&nbsp;the CPPEx Global Head office, or send email to&nbsp;<a href=\"mailto:info@cppexglobal.org\">info@cppexglobal.org</a>&nbsp;</p>\n\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 col-sm-offset-1 text-center\"><a href=\"business-development\">BUSINESS DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"product-development\">PRODUCT DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"business-innovation\">BUSINESS INNOVATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"process-optimization\">PROCESS OPTIMIZATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"markete-analysis\">MARKET ANALYSIS</a></div>', 0, 0, 'certifications , packaging , printing', 'Process Optimization', 'Process Optimization', '2020-02-25 10:41:24'),
(17, 'market analysis', '', '5058868749288.jpg', '<p id=\"h.gjdgxs\">A strong business plan requires going beyond intuition and experience, and supporting your idea with fact-based market research. Investors need to have confidence in your understanding of the market, so don&rsquo;t let yourself down by skimping on research. CPPEx Global&nbsp;can undertake market analysis and feasibility studies to evaluate a new product idea or identify new market opportunities for existing product offerings, assess, confirm current situation by analyzing metrics,&nbsp;personal observations and examining process performance. This includes market research, innovation analysis, competitive advantage analysis, path to market and supply/value chain analysis. We provides consultancy to companies requiring research expertise. Our extensive experience as both a buyer and supplier of research data ensures that we are ideally placed to offer our expertise to companies who require occasional, regular or even continuous assistance in providing market research to their own internal clients. Our consultancy plans with customers are based on the following tools;</p>\n\n<ul style=\"text-align:justify;\">\n	<li><strong>Industry Analysis:</strong>&nbsp;We help you identify just how big your industry is in terms of revenue and numbers of players. Keeping up with trends (technological, cultural, demographics) is also important for this section of your business plan and we scour industry and news sources to identify those trends.</li>\n	<li><strong>Competitive Analysis:</strong>&nbsp;You know you have competitors, but what do you know about them? This section of your plan needs to include an analysis of your key competitors, how they market their services/products, how they differentiate themselves in their marketing efforts, and what kind of market share they possess. We can help you with competitive intelligence for both national and international companies.</li>\n	<li><strong>Target Market Analysis:</strong>&nbsp;We help you to Identifying and prioritizing specific target markets are another key part of your business plan where research is crucial. You need to think about such questions as: What are the demographics and psychographics of your target customers? How can you best reach them? What kinds of concerns do they have? How do they like to be marketed and sold to?</li>\n	<li><strong>Statistical Analysis:</strong>&nbsp;We also offer consultancy on all aspects of&nbsp;<a href=\"https://www.google.com/url?q=http://www.pcpmarketresearch.com/services/statistical-analysis&amp;sa=D&amp;ust=1581886844146000\">statistical analysis</a>, from simple tests of significance to advanced segmentation techniques and model building. We ensure that full justice is done to the data gathered by the market research process by ensuring that relationships are uncovered which may be hidden when results are presented at the aggregated level.</li>\n	<li><strong>Staff Training:</strong>&nbsp;Our on-site training courses make use of the wealth of experience our staff have accumulated as both buyers and suppliers of research. All training is tailored to the specific needs of the client and typically uses a mixture of case studies based on relevant previous research and custom produced examples based around the client&#39;s own data. Training is held in locations convenient for the client and can range from a few hours to several days in length depending on requirements, customer and process needs.</li>\n</ul>\n\n<p>If you have any question, please&nbsp;<a href=\"contact/index\">CONTACT</a>&nbsp;the CPPEx Global Head office, or send email to&nbsp;<a href=\"mailto:info@cppexglobal.org\">info@cppexglobal.org</a>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 col-sm-offset-1 text-center\"><a href=\"business-development\">BUSINESS DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"product-development\">PRODUCT DEVELOPMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"business-innovation\">BUSINESS INNOVATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"process-optimization\">PROCESS OPTIMIZATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"markete-analysis\">MARKET ANALYSIS</a></div>\n', 0, 0, 'certifications , packaging , printing', 'Markete analysis', 'markete analysis', '2020-02-25 10:43:36'),
(18, 'WHY CPPEX MEMBERSHIP', '', '4048999409486.jpg', '<p>Would you like to network with like-minded printing &amp; packaging technologists, designers, colorists and print and packaging experts? &nbsp;Are you a member of the CPPEx Global? Join the CPPEx Global today and become a part of the printing and packaging expert international community.</p>\n\n<p>Membership of CPPEx Global is open to printing, packaging and associated industry personnel or individual professional interested in printing &amp; packaging industry. CPPEx Global membership typically has a particular purpose which involves connecting related professionals together around a particular profession, industry, activity, interest, mission in different geographical location and encourage or facilitate interaction and collaboration.</p>\n\n<p>Membership levels are graded by a committee of Fellows and peers in industry. Membership is personal and can be invaluable when seeking employment or promotion, as the qualification standards are a clear indication of the level of academic achievement and printing &amp; packaging industrial experience.</p>\n\n<h4>MEMBERSHIP BENEFITS:</h4>\n\n<p>CPPEx Global organises national conferences, training courses, consultancy services and technical seminars with strong support of the international printing &amp; packaging associations and associated industries throughout the year. These meetings provide excellent opportunities for networking as well as for informed discussion on current topics of interest to printing, packaging technologists and color professionals, and the industry as a whole. Guests are welcome at most functions, but the full benefits of the CPPEx Global are best achieved through membership. CPPEx Global Members are eligible for concessional cost savings for all meetings and functions, first preference to attend site visits and will also receive complimentary print &amp; packaging related books, blogs, magazines and other publications.</p>\n\n<p>CPPEx Global Members have access to a range of exclusive benefits given bellow:</p>\n\n<ul style=\"text-align:justify;\">\n	<li><strong>Professionalism:</strong> CPPEx Global membership is seen as a plus by a prospective employer. Your association with our brand sends the message you are serious about your profession and you are willing to improve your professional skills.</li>\n	<li><strong>Education:</strong>&nbsp;We typically run professional development events such as workshops, webinars, training, conferences and publish periodically articles, books and magazines, all of which are designed to raise awareness of important printing and packaging related issues facing by professionals.</li>\n	<li><strong>Perks:</strong>&nbsp;We offer a substantial discount to our member&rsquo;s / member organizations for annual conferences, exhibitions, workshops, trainings and also provide an opportunity to lien with global industrial leaders that helps you to brainstorm new ideas and innovations in your professional field. &nbsp;</li>\n	<li><strong>Networking:</strong>&nbsp;Our membership provides networking opportunities with printing and packaging professionals and global experts. &nbsp;</li>\n	<li><strong>Recognition:</strong>&nbsp;CCPEx Global recognize the superior contribution of printing, packaging and associated industrial professionals and present award in recognition of their outstanding contribution for this industry.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 col-sm-offset-1 text-center\"><a href=\"why-membership\">WHY OUR MEMBERSHIP</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership-categories\">MEMBERSHIP CATEGORIES</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership-benefits\">MEMBERSHIP BENEFITS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership/form\">MEMBERSHIP APPLICATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership_List\">MEMBERSHIP LIST</a></div>\n', 0, 0, 'certifications , packaging , printing', 'Why membership', 'why-membership', '2020-02-25 10:46:29'),
(19, 'Membership Categories', '', '3705515199801.jpg', '<h4 id=\"h.gjdgxs\">MEMBERSHIP CATEGORIES:</h4>\n\n<p>CPPEx Global membership levels are graded into four categories by a committee of fellows and peers on the basis of contributions and experience in the printing &amp; packaging and associated industrial fields.</p>\n\n<ul style=\"text-align:justify;\">\n	<li><strong>Corporate Membership:</strong>&nbsp;Corporate membership is granted for those printing, packaging, chemicals, foods and associated industries who are working at least for last five years in the market and has more than 1,000 employees. To proceed further and check the&nbsp;eligibility criteria and benefits&nbsp;of this category, visit the&nbsp;<a href=\"corporate_membership\" target=\"_blank\">Corporate membership</a>&nbsp;webpage and submit the&nbsp;membership application form&nbsp;through our online system.</li>\n	<li><strong>Associate Membership:</strong>&nbsp;Those organizations generally with less than five years working within printing, packaging and associated sectors and have less than 1,000 employees in the market. To proceed further and check the&nbsp;eligibility criteria and benefits&nbsp;of this category, visit the&nbsp;<a href=\"associate_membership\" target=\"_blank\">Associate membership</a>&nbsp;webpage and submit the&nbsp;membership application form&nbsp;through our online system.</li>\n	<li><strong>Individual Membership:</strong>&nbsp;Those people that have made significant contributions to the printing and packaging industry over many years and have considerable knowledge and experience of various aspects of printing and packaging technology or have some form of relevant academic qualification. To proceed further and check the&nbsp;eligibility criteria and benefits&nbsp;of this category, visit the&nbsp;<a href=\"individual_membership\" target=\"_blank\">Individual membership</a>&nbsp;webpage and submit the&nbsp;<a href=\"membership/form\" target=\"_blank\">membership application form</a>&nbsp;through our online system.</li>\n	<li><strong>Students:&nbsp;</strong>Those students who are studying the colors, printing and packaging courses in the technical colleges or universities. To proceed further and check the&nbsp;eligibility criteria and benefits&nbsp;of this category, visit the&nbsp;<a href=\"student_membership\" target=\"_blank\">Student membership</a>&nbsp;webpage and submit the&nbsp;membership application form&nbsp;through our online system.</li>\n</ul>\n\n<p>Note:&nbsp;Membership application decision is based on the review report submitted to CPPEX Global Management by the qualified and experienced expert&rsquo;s team.&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 col-sm-offset-1 text-center\"><a href=\"why-membership\">WHY OUR MEMBERSHIP</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership-categories\">MEMBERSHIP CATEGORIES</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership-benefits\">MEMBERSHIP BENEFITS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership/form\">MEMBERSHIP APPLICATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership_List\">MEMBERSHIP LIST</a></div>\n', 0, 0, 'certifications , packaging , printing', 'CPPEx Global membership categroies', 'CPPEx Global membership', '2020-02-25 10:48:08'),
(20, 'Membership Benefits', '', '506520670080.jpg', '<div class=\"container\">\n<p><strong>CPPEx</strong> Global organises national conferences, training courses, consultancy services and technical seminars with strong support of the international printing &amp; packaging associations and associated industries throughout the year. These meetings provide excellent opportunities for networking as well as for informed discussion on current topics of interest to printing, packaging technologists and color professionals, and the industry as a whole. Guests are welcome at most functions, but the full benefits of the CPPEx Global are best achieved through membership. CPPEx Global Members are eligible for concessional cost savings for all meetings and functions, first preference to attend site visits and will also receive complimentary print &amp; packaging related books, blogs, magazines and other publications.</p>\n\n<p>CPPEx Global Members have access to a range of exclusive benefits given bellow:</p>\n\n<ul style=\"text-align:justify;\">\n	<li><strong>Professionalism</strong>: CPPEx Global membership is seen as a plus by a prospective employer. Your association with our brand sends the message you are serious about your profession and you are willing to improve your professional skills.</li>\n	<li><strong>Education</strong>:&nbsp;We typically run professional development events such as workshops, webinars, training, conferences and publish periodically articles, books and magazines, all of which are designed to raise awareness of important printing and packaging related issues facing by professionals.</li>\n	<li><strong>Perks</strong>:&nbsp;We offer a substantial discount to our member&rsquo;s / member organizations for annual conferences, exhibitions, workshops, trainings and also provide an opportunity to lien with global industrial leaders that helps you to brainstorm new ideas and innovations in your professional field. &nbsp;</li>\n	<li><strong>Networking</strong>:&nbsp;Our membership provides networking opportunities with printing and packaging professionals and global experts. &nbsp;</li>\n	<li id=\"h.gjdgxs\"><strong>Recognition</strong>:&nbsp;CPPEx Global recognize the superior contribution of printing, packaging and associated industrial professionals and present award in recognition of their outstanding contribution for this industry.</li>\n</ul>\n\n<p>Note:&nbsp;Membership application decision is based on the report review submitted to CPPEX Global Management by the qualified and experienced expert&rsquo;s team.&nbsp;</p>\n\n<p>&nbsp;</p>\n\n\n<div class=\"col-md-2 col-sm-offset-1 text-center\"><a href=\"why-membership\">WHY OUR MEMBERSHIP</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership-categories\">MEMBERSHIP CATEGORIES</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership-benefits\">MEMBERSHIP BENEFITS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership/form\">MEMBERSHIP APPLICATION</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"membership_List\">MEMBERSHIP LIST</a></div>\n</div>', 0, 0, 'certifications , packaging , printing', 'CPPEx Global membersip benifits', 'CPPEx Global organises national conferences', '2020-02-25 10:49:55'),
(21, 'CYLINDER QUALITY MANAGEMENT', '', '1217114027757.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Achieving predictable print results with high accuracy, full automation, cost efficiency and accomplish consistent colour reproduction are the challenging expectations of clients in the rotogravure printing industry. This increasing demands of customer only attainable when print manufacturer has superlative accuracy of engraved cylinders that are vulnerable to defects such as stylus broken, shoe lines, cell depth variation, cell missing, thundering, centre out, pin holes, bludges, patches, during the engraving process resulted into degradation of quality as well as rejection of cylinders. This one day training session addresses various topics on cylinder engraving and quality management through hands-on activities accompanied with case studies, presentations and discussion suitable anyone in operations, quality, sales, customer service and marketing etc. associate with gravure printing industry and at the end participants will leave the class with a strong understanding of the advance learning skills of cylinder quality management and be able to troubleshoot a variety of cylinder related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Gravure printing, impact of engraved cylinder on print performance, cylinder structure, category, composition and properties.</li>\n	<li>Steps involve in preparation of best quality engraved cylinders, critical process parameters, variables and engraving patterns.</li>\n	<li>Cylinders engraving workflow, chemical etching, electromechanical engraving and direct ablation of Gravure cylinders.</li>\n	<li>Engraving cylinder axis, shaft, diameter, circumference, face length and electroplating to engrave high quality cylinders.</li>\n	<li>Measurement of the actual engrave cell opening, depth and cell volume on copper, and subsequently chrome cells, to control quality and consistency during the manufacturing process.</li>\n	<li>Effects of engraving cell depth, cell wall, opening, bridge, cell angle and composition of cylinder and process Specifications.</li>\n	<li>Relation of cell size to dot size, ink transfer from cell, Moir&eacute; Effect and cell specifications impact on print quality and production</li>\n	<li>Engraved cylinders defects visualizing and measuring in detail the performance of the engraving process to further improve quality consistency</li>\n	<li>Gravure ink formulation, substrate selection, doctor blades angle and composition on the performance of engraved cylinders.</li>\n	<li>Best safe practices and techniques for handling, transportation and storage of engraved cylinders in workplace.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the prepress and gravure printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Effective understanding of cylinder quality management, better planning and inventory management of cylinders for refurbishment.</li>\n	<li>Evaluate the increase brand owner satisfaction and loyalty resulted to Increase converter competitiveness and profitability</li>\n	<li>Able to identify and eliminate or replace defected engraved cylinders that would require unnecessary ink adjustment and enhance cost saving.</li>\n	<li>Able to effectively monitoring of the engraved cylinder for condition and effectiveness of the cleaning system at workplace.</li>\n	<li>Apply his knowledge and skills to reduce ink and substrate waste through reduce ink matching and press set up time.</li>\n	<li>Able to identify the engraving critical parameters and variables to increase job profitability and Increase press productivity.</li>\n	<li>Standardize the engraving cylinders quality variables, ink formulations and press parameters for consistent gravure printing.</li>\n	<li>Implement the SOPs and standards as per ISO requirements and machine centerlines effectively in gravure printing industry.</li>\n</ul>\n', 0, 0, 'Gravure printing', '', '', '2020-02-26 12:57:36'),
(22, 'DOCTOR BLADE & PRINT MANAGEMENT', '', '601434994220.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Today, the doctor blade is recognized as an integral process element of the printing press. Investing a few minutes in proper positioning, installation, chamber alignment, orientation, angle and pressure of doctor blade chamber set-up will be more worth deal than hauling the anilox scoring, poor safety record, short blade life, UV ink spitting, in-consistent print. Blade positioning, orientation, angle and pressure will affect the delivery of a precise amount of ink to the plate and proper installation will give the printer control over consistent, repeatable print quality, metering more precisely, eliminating print defects, extending your blade life, printing cleaner dots longer, avoiding mid-run press stops, reducing annual doctor blade spend, preventing premature anilox roll/cylinder wear and triming customer complaints from print defects. This one day training session is designed as &ldquo;doctor blade &amp; print management&rdquo;, suitable for anyone involved in the printing and packaging industry and provides a structured learning environment to explore advanced concepts of doctor blade materials, selection, installation, handling, troubleshooting and addresses various topics through hands-on activities, exercises, case studies accompanied with presentations and discussion.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify\">\n	<li>Doctor blade, composition, categories, key process elements, materials makeup, evolution and doctor blade retrospectives.</li>\n	<li>Doctor blade types, selections, Installation, positioning, orientation, angle, pressure and doctor blade-chamber alignment.</li>\n	<li>Doctor blade shape, size, width, edge profiles &amp; thickness, contact angle, pre-set angle, contact area manipulation and how to inspect the doctor blade quality.</li>\n	<li>Blade edge configuration, setting procedures, tip configuration, Nip distance and blade holder configuration.</li>\n	<li>Impact of doctor blade on ink metering, dot gain, ink film thickness, and relationship with anilox line screen &amp; volume for print optimization.</li>\n	<li>Back doctoring, effects of back doctoring on print quality, practices to prevent back doctoring and tree barking.</li>\n	<li>Chamber end seal types, composition, selection, corrective installation, impact on the print quality and how to increase life of end seal during processing.</li>\n	<li>Doctor blade problems, different ink systems, impact on print quality, doctor blade related print defects, causes and remedies.</li>\n	<li>Correct procedure and best practices for using, cleaning, safe handling, inventory, risk management of doctor blade.</li>\n	<li>Doctor blade environmental impact during production, transportation, storage and utilization during printing process.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul>\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>NPD supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the prepress, graphic and printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul>\n	<li>Understanding of doctor blade role in printing, its materials, categories, composition and retrospectives.</li>\n	<li>Understand how to select and install the doctor blade at proper position, orientation, angle, doctor blade-chamber alignment.</li>\n	<li>Identify the potential causes, possible remedies for some well know doctor blade patterns using in the printing industry.</li>\n	<li>Able to identify the doctor blade safety hazards, effects and consideration when working around printing and paper machine.</li>\n	<li>Identify the proper correlation between doctor blades, anilox screen, chamber adjustment to improve print consistency and blade/ anilox longitivity.</li>\n	<li>Able to reduce the blade related defects, machine downtime by achieving higher print quality from job to job and improving customer retention as well as gaining new customers.</li>\n	<li>Identify the correct edge, angle, tip, holder configuration and nip pressure in order to print the job with perfect dot gain, ink film thickness and preventing back doctoring.</li>\n	<li>Implement the SOPs, checklists and standards as per ISO requirements and machine centerlines effectively in the graphic and printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-26 13:27:49'),
(23, 'ECO-PRINTING BY POLLUTION PREVENTION', '', '5295794865368.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>A rapid economic development, significant growth in scientific and technological development in printing processing industries are experiencing dramatic work environment degradation by generating air and water hazardous waste as a by-product posing a significant threat to human health and environment. The printing industry consistently facing pressures to increase efficiency, reduce cost due to global overcapacity and rising costs of raw material with increasing legislative and customer demands to lower the environmental impact of industry activities has created a need for printers to better their sustainable practices. So this is urgent need for printing companies to reduce environmental risks, reduce waste, increasing their operational efficiency, improve energy and material consumption in order to maintain their market position in an increasingly competitive environment. This one day training is designed as an eco-printing and pollution prevention, suitable for anyone involved in the printing and packaging industry and provides hands-on activities, a structured learning environment to explore advanced concepts of eco-printing by pollution prevention and addresses various topics through hands-on activities, exercises, case studies accompanied with presentations and discussion.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Printing processes rotogravure, flexographic, offset lithographic, letterpress, wide web, Screen, digital and plateless printing.</li>\n	<li>Pollution, source of pollutants, types of pollutants, HAPs threshold, PBR, workflows, checklist and Pollution Prevention Strategies.</li>\n	<li>VOCs emission, categories, VOC standards, Steps to reduce VOC emission, VOC material handling requirement, LEL, (OSHA, NIOSH, EPA regulations).</li>\n	<li>Emission methods, Material balance, Source sampling, emission factor, Emission factors, calculation of e emissions, EET. Factors Influencing Emissions, Emission Factor Rating. Emission control technologies.</li>\n	<li>Effluents from Printing Plants, physicochemical parameters, raw materials inputs and pollutants outputs and control measures.</li>\n	<li>Printing industrial hazardous waste, classification, characteristic, BMPs, BATs, hazardous waste codes, hazardous waste management and self-waste audit checklist and The EUs Waste Management Hierarchy (EU, 2008).</li>\n	<li>Waste Minimization, Pollution Prevention and Cleaner production. Waste reduction techniques, Barriers to waste reduction efforts, Waste Reduction Audits and integrated environmental management.</li>\n	<li>Pollution prevention program steps, good operating practices, strategies for hazardous printing wastes treatment and disposal. &nbsp;</li>\n	<li>Eco-printing, attributes, benefits, Indicators, Barriers to eco-printing and possible measures, Ottman&rsquo;s Five Strategy Framework, PESTEL Framework.</li>\n	<li>Pollution prevention international legislative EPA Act 1970), IPPC Directive EU 61/96, Solvent emission Directive 1999/13/EU.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant management</li>\n	<li>Pressroom supervisors</li>\n	<li>QHSE manager and personnel</li>\n	<li>Prepress and graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Printers/laminators/ slitters Operators</li>\n	<li>Warehouse and logistics personnel</li>\n	<li>Environmental agency representatives</li>\n	<li>Ink, chemicals &amp; film and paper suppliers</li>\n	<li>Sales and Customer Service Representative</li>\n	<li>Those who are new to graphics and printing industry.</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understanding of different printing processes, input raw materials and pollutants generation as an output during process.</li>\n	<li>Depth familiarity with printing industrial hazardous solids &amp; liquids effluents, emissions, classifications and control measures.</li>\n	<li>Understanding of source of pollutants, types of pollutants, HAPs threshold, PBR, workflows and effective implementation of Strategies.</li>\n	<li>Effectively Implementation of good operating practices and strategies for hazardous printing wastes treatment and disposal.</li>\n	<li>Able to apply the waste reduction techniques and integrated environmental management system in order to minimize hazardous waste, remove barriers and proceed hazardous waste audits.</li>\n	<li>Able to implement possible measures and the Ottman&rsquo;s Five Strategy Framework, PESTEL Framework for removing the barriers in eco-printing and to enhance its environmental benefits.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-26 13:35:08'),
(24, 'EFFECTIVE COLORS MANAGEMENT', '', '2978687719784.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>An effective color management is an integral part of printing and packaging industry that not only enhances the customer satisfaction but also assures the good profitability for an organization. The ability of a print provider to match image color and quality across multiple devices or substrates, and to hit brand identity colors consistently will help them gain and retain the most profitable business. Correct print color reproduction to remain consistent throughout a run or job to job, it is primarily dependent on ink formulation, ink film thickness, registration, ink viscosity, resin-pigment ratio, ink trapping, color perception and color equipment performance. This two days training session is designed as an advance level of color management suitable for anyone involved in the colors, printing and packaging industry including operations, quality, sales, customer service, administration, marketing, etc. This training provides hands-on activities accompanied with case studies, presentations and discussion and a structured learning environment to explore advanced concepts in color management, ink formulation, printing inks handling and at the end participants will leave the class with a strong understanding and advance levels skills of effective color management and be able to troubleshoot a variety of color related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Printing inks, history, nature, composition, types, and components including pigments &amp; dyes, resins, additives and solvents.</li>\n	<li>Steps involve in printing inks preparation, control of critical parameters &amp; variables as well as quality control of printing inks.</li>\n	<li>Printing inks formulations for rotogravure, lithographic, UV, flexographic process based on solvency and printed materials.</li>\n	<li>Ink quality testing procedures of solid contents, viscosity, and viscosity vs. temperature, ink density, pH, gloss, adhesion, heat resistance, tinting strength, light fastness, reduction factors, ink filtration and ink mileage.</li>\n	<li>In-plant management, lab equipment &amp; quality tests, lab equipment and press correlation, and ink lab equipment calibration.</li>\n	<li>Printing inks MSDS, safety precautions, firefighting measures, transportation, handling, inventory, and storage.</li>\n	<li>Science of color theories, pigment, light theory, wave frequency, wavelength &amp; color perception and UV/ Visible spectrum.</li>\n	<li>Young Helmholtz theory &amp; Albert H. Mansell&#39;s scale, color perception by human eye &amp; colorblindness and factors influence the color perception.</li>\n	<li>Light effects opaque, translucent, transparent, luminosity, scattering, indirect light /color and science of color perception.</li>\n	<li>Additives and subtractive colors, primary, secondary and tertiary colors, color blindness factors, causes and effects and tests.</li>\n	<li>Duotone, halftone, achromatic, analogues, complimentary, monochromatic, polychromatic, triadic, tetradic and color temperature.</li>\n	<li>Color lightness, HSV, HSL, CIE color system, Illuminants A, B, C, D, E, and F, L*C*H, X*Y*Z, L*a*b color models and metamerism.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>NPD supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives &nbsp;</li>\n	<li>Printers/laminators/ slitters Operators &amp; Helpers</li>\n	<li>Those new to the prepress, graphics and printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understand colors/ printing inks, composition and their chemistry and quality control of printing inks by process team.</li>\n	<li>Understand impacts of temperature, heat, viscosity, humidity, and solvency, pH on printing ink quality and performance.</li>\n	<li>Able to determine the solid contents, light fastness, reduction factors, pH, tinting strength, heat resistance and ink mileage.</li>\n	<li>Able to manage and control the cost, inventory, press returned inks, ink room and reduce customer complaints for color variation.</li>\n	<li>Able to apply his skills to formulate correct color matching, equipment calibration resulted into reduce machine downtime and materials waste.</li>\n	<li>Able to apply of colourimeter &amp; spectrodensitometer in the printing industry for the color accuracy measurement of print.</li>\n	<li>Apply and select the perfect CIE color system, illuminates and devices to produce accurate and consistent color during production run.</li>\n	<li>Standardize the ink formulation, implement the SOPs, safety measures, checklists, and ISO and ASTM standards in the printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-26 13:43:32');
INSERT INTO `cms` (`id`, `post_title`, `short_heading`, `post_banner`, `post_description`, `displaysidebar`, `sidebar`, `meta_keyword`, `meta_title`, `meta_description`, `created_on`) VALUES
(25, 'EXCELLENCE IN LEAN PRINT MANUFACTURING', '', '229495143270.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Lean production is one of the most important approaches to the effective print manufacturing. Companies are now starting to heavily rely on lean manufacturing principles and methodologies for their better profitability as well as sustainability in the competitiative market to create waste-free, optimized product flow across the value stream, which is defined as all the activities, value-adding and non-value adding, required to bring a product from concept to launch and from order to delivery. This two days training session addresses various topics on basics principles of lean manufacturing, preparing to implement lean manufacturing in the printing &amp; packaging industries in order to eliminating waste, minimizing inventory, maximizing flow, drive production from customer demand, meeting customer requirements, do it right the first time, empowering workers, and creating a culture of continuous improvement through hands-on activities accompanied with case studies, presentations and discussion and at the end participants will leave the class with a strong understanding of advance concepts of lean manufacturing in the printing and packaging operation and be able to troubleshoot a variety of operation losses, waste, machine downtime related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Fundamental lean concepts, basic elements, principles, module objectives, manufacturing systems, lean metrics, lean organization and potential challenges.</li>\n	<li>Lean manufacturing tools &amp; techniques implementation, elements of lean management and lean tools &amp; techniques, PCT, PCE, SMV, takt time, FIFO, AQCO, OFL and bottleneck analysis.</li>\n	<li>Manufacturing operations and hidden costs, VA &amp; NVA, scheduling, data deployment, benchmarking, benchmarking process map, change productivity, productivity measurement, OEE &amp; equipment losses, calculation, 6W-2H and 5 why Analysis.</li>\n	<li>Kaizen concepts, elements, levels, levels of problems, kaizen QC story, PDCA cycle &amp; kaizen, innovation and kaizen, kaizen 12 steps story, Deming cycle and advantages of kaizen implementation.</li>\n	<li>8D-problem solving, historical background, scope and implementation steps, narrowing process, road map, barriers and implementation steps and impact on plant productivity.</li>\n	<li>Process and defective wastes, classification, source, control measures, value stream map, VSM Metrics, VA/NVA ratio, push &amp; pull system and pre-requisites to creating lean environment for quality production. &nbsp;</li>\n	<li>Total productive maintenance, objectives, TPM deployment stages, components, JIT philosophy, JIT-pillar, principles of JIT-system, elements of JIT, 5S, effects and losses and breakdown counter measures.</li>\n	<li>FMEA concepts, purpose, silent feature, types, variables, benefits, limitations and pitfalls, implementation steps, RPN, probability of occurrence, Identifying Critical Requirements Using FMEA</li>\n	<li>Gemba Kanri, Kaikaku, SMED, EPEI, POKA YOKA, OPFP KANBAN, PDSA, 6 Sigma and their effective utilization to drive lean manufacturing in the printing and associated industries.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>NPD supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the prepress, graphics and printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understand fundamental concepts, basic elements, pillars and principles of lean manufacturing in printing and packaging industry.</li>\n	<li>Apply lean principles, tools and techniques in the identification, formulation and implementation of lean manufacturing strategy.</li>\n	<li>Improve materials flow, lead time, customer satisfaction, relationship with supplier, productivity, employee morale and commitment in order to enhance flexibility and profitability.</li>\n	<li>Reduce machine downtime, wastes, bottle necks, inventory, space requirement, on-shelf rejection of product by client/brand in order to ensure 100% quality product assurance.</li>\n	<li>Improve constantly and forever system of production, service to improve quality, workplace organization, safety conditions, productivity and increase visual management that helps to add the values to customers.</li>\n	<li>Apply tools and techniques to reduce lead time, work in process, finished good inventory, rework percentage, backorders, machine downtime, speed time to market, operation costs, exceed customer expectations and improving business performance.</li>\n	<li>Standardize process accuracy, speeds up time-to-market, streamlines production processes and effective implementation of SOPs, checklists, centerlines and standards as per ISO requirements in the industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-26 13:52:06'),
(26, 'EXCELLENCE IN FLEXOGRAPHIC PRINTING', '', '2364592062834.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Flexographic is a dynamic, advancing printing process as future is approaching with remarkable speed, bringing with it new challenges in the way the flexographic industry conducts its business. New advancements in presses and press componentry, ever evolving best practices for process control, innovations in color management, and the need for a well-trained, highly skilled workforce are just some of the challenges facing the flexographic printing industry today. Meanwhile, supermarket landscape has changed, keeps changing and printers are looking for ways for their product to create a better impact while using fewer materials and minimising waste. This two days training session addresses various topics on flexography, an overview of the flexographic market, advance concepts of flexographic printing process, machine setting, photopolymer plate, anilox, doctor blades, substrate and ink options, color and design considerations, and more through hands-on activities accompanied with presentations and discussion and at the end participants will leave the class with a strong understanding of advance concepts of flexographic printing and be able to troubleshoot a variety of flexo related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Flexographic printing, basics background, principle, components and advance development of flexographic printing process.</li>\n	<li>Flexographic print attributes, print density, sharpness halftone, dot gains, color trapping &amp; match, print gloss and ink setting.</li>\n	<li>Important factors (density, print sharpness, gray balance, dot gain, dot loss, print contrast, ink trapping, pH, humidity, viscosity, temperature) in the printing process.</li>\n	<li>Aniloxs composition, structure, selection, line screen, cell specification, and important parameters, common defects with cause and remedies, handling precaution and cleaning.</li>\n	<li>Flexo plate, composition, developing, critical parameters and variables, common defects, causes and possible solutions, mounting and chemicals used for its processing, instruments used for plate measurement and control, UGRA &amp; KKS&rsquo;s scale.</li>\n	<li>Doctor blades, role, categories, angle, configuration, and possible problems due to doctor blades with its cause and remedies including handling &amp; storage of doctor blades.</li>\n	<li>Printing inks variables viscosity, pH, humidity, temperature, pigment-resins ratio, solvency, composition, nature, and ink parameters that influence flexoprint and ink room management.</li>\n	<li>Flexo substrate &amp; nature of substrate and properties, PPS, roughness, density, opacity, stiffness, surface tension, acidity, moisture contents, pH etc&hellip; that affect printing quality.</li>\n	<li>Problems appeared in flexographic printing during production run, identification, with possible causes and online solutions.</li>\n	<li>Environmental impacts of flexographic printing, inputs &amp; outputs, materials waste, possible pollutants and their treatment.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>NPD supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the prepress and gravure printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understand the basics as well as advance concepts of flexographic process, components and its impact on printing process.</li>\n	<li>Better troubleshooting to online printing problems after understanding its root cause and influence on print as well as business.</li>\n	<li>Standardize machine setting, anilox, doctor blades, flexo plate, substrate and printing inks &amp; quality control standards &amp; SOPs.</li>\n	<li>Identify and troubleshoot the common defects of anilox, plate, inks formulation, impression roller, and substrate in order to improve print performance.</li>\n	<li>Standardize the flexoplate, its variable and parameters, mounting quality, waste, handling, storage and stacking in printing house.</li>\n	<li>Able to eliminate materials waste, print defects as well as downtime to boost process efficiency resulted into profitability.</li>\n	<li>Standardize the printing inks variables, color measurement, ink formulations and press parameters for consistent flexographic printing. &nbsp;</li>\n	<li>Apply his skills to enhance printing quality &amp; efficient productivity that increase job to job profitability with customer retention.</li>\n	<li>Implement the SOPs, checklists, machine centerlines, ISO and OSHA standards in flexographic printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-26 14:00:11'),
(27, 'EXCELLENCE IN GRAVURE PRINTING', '', '3972783269290.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Increasing demands of flexible packaging, more intense competition, launching new products, renovation of old technology, several technological innovations, the market of gravure printing is facing the challenges such as accurate print production, Infeed, unwinder, rewinder, outfeed, chilling roller, dryer, impression roller, printing cylinder in addition to overlap the gap of advance level of rotogravure printing operator skills. This two days based training session addresses various topics on rotogravure market, printing process, critical parameters and machine variables, engraved cylinders, impression, doctor blades, substrate and ink options, color and design considerations, and more suitable for anyone involved in the printing industry including operations, quality, new product development, sales, customer service, administration, marketing, etc... through hands-on activities accompanied with case studies, presentations and discussion and at the end participants will leave the class with a strong understanding of advance concepts of rotogravure printing and be able to troubleshoot a variety of gravure related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Gravure printing concepts, basics background, principle, components and advance development of gravure printing process.</li>\n	<li>Gravure print attributes, print density, sharpness halftone, dot gains, color trapping &amp; match, print gloss and ink setting.</li>\n	<li>Important factors (density, print sharpness, gray balance, dot loss, print contrast, pH, humidity, viscosity, temperature) involve in the printing process.</li>\n	<li>Engraved cylinder composition, structure, preparation, selection, cell specification, and important parameters, common defects with causes and remedies, handling precaution and cleaning.</li>\n	<li>Doctor blades, role, categories, angle, configuration, and possible problems due to doctor blades with its cause and remedies including handling &amp; storage of doctor blades.</li>\n	<li>Printing inks variables viscosity, pH, humidity, temperature, pigment-resins ratio, solvency, composition, nature, and ink parameters that influence gravure print during production-run and ink room management.</li>\n	<li>Gravure substrate &amp; nature of substrate, composition, properties, PPS, roughness, density, opacity, stiffness, surface tension, acidity, moisture contents, pH etc&hellip; that affect printing quality.</li>\n	<li>Problems appeared in gravure printing during production run, proper identification, with possible causes and online solutions.</li>\n	<li>Environmental impacts of gravure printing, inputs &amp; outputs, materials waste, possible pollutants and their treatment strategy.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>NPD supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers &nbsp;</li>\n	<li>Those new to the prepress and gravure printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understand the basics as well as advance concepts of gravure process, components and its impact on printing process.</li>\n	<li>Better troubleshooting to online printing problems after understanding its root cause and influence on print as well as business.</li>\n	<li>Standardize machine setting &amp; variables, engraved cylinder, doctor blades, substrate and printing inks and implement quality control standards &amp; SOPs.</li>\n	<li>Identify and troubleshoot the common defects of engraved cylinder, doctor blades, inks formulation, impression roller, and substrate in order to improve print performance.</li>\n	<li>Standardize the engraved cylinder, its variable and parameters, cell specifications, waste, handling, storage and stacking in the printing house. .</li>\n	<li>Able to eliminate materials waste, print defects as well as downtime to boost process efficiency resulted job to job profitability.</li>\n	<li>Standardize the printing inks variables, color measurement, ink formulations and press parameters for consistent gravure printing.</li>\n	<li>Apply his skills to enhance printing quality &amp; efficient productivity, customer retention and decrease customer complaints.</li>\n	<li>Implement the SOPs, checklists, machine centerlines, ISO and OSHA standards in rotogravure &amp; graphics printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 05:42:59'),
(28, 'EXCELLENCE IN OFFSET PRINTING', '', '360874471788.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Offset printing offers exceptional quality, efficiency and versatility with more affordable and environmentally friendly, high demands of products such as cards, stationery, leaflets, brochures, books, magazines, and product packaging but with today&rsquo;s changing market conditions and demands, retaining customers and achieving overall success is more difficult than ever. The standardization of offset printing press and its variables, ink room, papers, prepress as well as enhancing the operator skills gap is important that will not only secure the business opportunities in competitive market but also interfaces a decisive factor in winning orders in future. This two days training session addresses various topics offset machine setting, printing conditions, standardizing parameters &amp; variables, ink system, fountain solution, paper, print quality variables, environmental impact and more suitable for anyone involved in the offset printing industry including operation, quality, sales, customer service, administration, marketing, etc. through hands-on activities accompanied with presentations and discussion and at the end participants will leave the class with a strong understanding of advance concepts of offset printing and be able to troubleshoot a variety of offset related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Offset printing background, principle, basic steps, components, configuration and overview heat web &amp; waterless offset printing.</li>\n	<li>Blanket cylinder, impression cylinder, ductor roller, Oscillator or Vibrators, Intermediate rollers, dampening system, and ink roller setting and process parameters that effects on accurate print production.</li>\n	<li>Print attributes such as density, print sharpness, gray balance, dot gain, dot loss, print contrast, ink trapping, pH, humidity, viscosity, temperature involve in the printing process.</li>\n	<li>Configuration of Offset Machine, variables, ink, paper, fountain solution, plate, speed, ink- water balance, temperature, printing pressure. Offset plate, CTP plates, its composition, surface roughness, capillary action, surface tension ink accepting,</li>\n	<li>developing, mounting and chemicals used for its processing, instruments used for plate measurement and control, UGRA &amp; KKS&rsquo;s scale.</li>\n	<li>Offset substrate &amp; nature of substrate, optical, absorption and chemical properties, paper thickness, porosity PPS, roughness, opacity, stiffness, acidity, moisture contents, pH etc. that affect offset printing quality.  Opacity, brightness and gloss mottling, back trap and water repellence mottling, and factors affecting and techniques how to reduce mottling during print-run on machine?</li>\n	<li>Offset ink composition, nature of inks, formulation, fountain solution, effective color matching with best practices of ink room management.</li>\n	<li>Offset printing environmental impacts, possible pollutants &amp; treatment, occupational hazards and compliance to OSHA, ISO 12647 standards.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the prepress, graphics and offset printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understand offset printing process, critical parameters and variables, machine components and its accurate configuration.</li>\n	<li>Ensure product quality and product versatility through machine and process efficiency by reducing machine make ready time.</li>\n	<li>Standardize the ink system, press roller system, fountain solution, and prepress workflow, offset materials and print attributes.</li>\n	<li>Increase process reliability, repeatability due to systematic quality control and improve productivity throughout the entire added value chain.</li>\n	<li>Identify the print related defects in offset printing, their causes and troubleshoot online during the production run on machine.</li>\n	<li>Implement his skills to reduce customer print related complaints, internal non-conformance, materials waste, defects as well as downtime for efficient productivity to increase job profitability.</li>\n	<li>Proficient in color management, process control, troubleshooting and implementing corrective action procedures to bring systems into control for repeatable, predictable results.</li>\n	<li>Apply his approach with more confidence, pride, knowledge, as team result into consistency, repeatability, profitability, success with customer confidence.</li>\n	<li>Implement the SOPs, checklists, machine centerlines and compliance to OSHA and ISO standards in offset printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 05:52:51'),
(29, 'FLEXOPLATE QUALITY MANAGEMENT', '', '723332026596.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Flexographic plate is apprehended as a heart of the flexographic printing process that influence the print result and production efficiency. Unacceptable color matching to proof, insufficient density, uneven ink laydown, narrow color gamut, lack of print brilliance, inconsistency in process, Unpredictability of results job-to-job, and run-to-run are the emerging challenges to printers in order to meet the demands of brand owners and customer in the competitive market. This two day training session addresses various topics on flexo plate process from prepress to final plate production and to print production at customer end by standardizing the process parameters to variables, back exposing to finishing, quality testing to mounting, cleaning to storage and staging through hands-on activities accompanied with case studies, presentations and discussion and at the end participants will leave the class with a strong understanding of the fundamentals and advance levels of flexo plate quality management skills and be able to troubleshoot a variety of plate related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Flexographic printing, photopolymer plate, composition, structure and footprint on print consistency during production run.</li>\n	<li>Flex plate processing steps, back exposure, main exposure, washout &amp; thermal drying, post exposure and impacts on print.Important factors (Relief depth, imaging quality, exposure conditions, polymer saturations, drying, mounting and plate handling).</li>\n	<li>Flexographic plate digital Imaging, laser plate imaging, Imaging resolution, high definition Imaging and SEM analysis.</li>\n	<li>Flexo plate dot shapes, dot gain analysis, area cover analysis, Shore A, Swelling properties, hasen swelling paramters, swelling degree, plate &amp; solvent compaibility.</li>\n	<li>Impact of pH, solvent compatibility, temperature, ozone, oxygen saturation during plate processing and reflection on final print quality.</li>\n	<li>Flexoplate processing steps and physicochemical properties, Elastic deformation, Roughness, Surface free energy, Surface properties, durability.</li>\n	<li>Measurment of surface frr energy, Roughness, topography, Coverage values, Optical density, plate thickness, hardness, effect of various wash out conditions, bump curve.</li>\n	<li>Important photopolymer plate issues (swelling, waviness, shrinking or cracking, premature wearing, tackiness, relief variations, delamination, irregular polymerization, pinholes and shorten the run length etc&hellip;&hellip;</li>\n	<li>Generic approved set-ups, labels, flexible Packaging, corrugated preprint and post print for water base and solvent based inks.</li>\n	<li>Best practices and tips for photopolymer plate mounting, tape application, edge sealing, plate de-mounting, cutting, handling, cleaning, storage and stacking to maintain high plate performance.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management Print Supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>NPD supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the prepress and flexographic printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understanding of flexographic printing, elements, importance of flexoplate, composition, structure and influence on print run.</li>\n	<li>Better understanding of flexographic plate processing steps, critical parameters, and how to standardize these variables.</li>\n	<li>Identify the various factors that affect the flexographic plate during and after processing to maintain it performance.</li>\n	<li>Able to measure and standardizes the surface frr energy, Roughness, topography, Coverage values, Optical density, plate thickness, hardness, effect of various wash out conditions, bump curve.</li>\n	<li>Able to eliminate of flexographic plate after recognizing the defects that influence the print quality during the production run</li>\n	<li>Able to standardize the flexographic plate specifications with anilox as well as doctor blade specification for print production.</li>\n	<li>Increasing brand owner satisfaction and loyalty resulted to increase printer competitiveness, profitability and press productivity.</li>\n	<li>Able to implement the best practices and tips for flexographic plate mounting, de-mounting, cleaning, handling, storage and stacking in order to maintain it quality at workplace.</li>\n	<li>Implement the SOPs, checklists, machine centerlines, ISO and OSHA standards in prepress &amp; flexographic printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 06:03:48'),
(30, 'FOOD SAFETY & PACKAGING MATERIALS', '', '1001902654965.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>A safe food supply of adequate quality is essential for sustaining humanity and quality of human life. The food supply must not endanger consumer health through physical, biological, and chemical contaminants and it must be presented in the markets honestly. Controls for food safety and quality ensure that the desirable characteristics of food are retained throughout the production, transportation, handling, processing, packaging, and distribution and packaging materials. This course emphasizes clear communication of food safety concepts, hazards, preventive measures, food packaging materials, international standards, auditing, effective use of corrective action, and follow-up to ensure toward successful attainment of company business and food safety objectives and also help to focus on design, sanitation, operation, and monitoring of food handling and manufacturing areas to reduce the risk of contamination of foods from pathogens. This two day training addresses various topics accompanied with case studies, presentations and discussion with latest scientific and technical information to effectively control pathogens and ensure food safety in the plant environment as per international food standards and regulations.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Basics of food safety, safety sequence, food spoilage, operation and control, hazards, preventive controls and overview of a food safety plan, steps in developing a food safety plan and resources for preparing food safety plans.</li>\n	<li>Good Manufacturing Practices, prerequisite programs and its impacts on food processing at workplace.</li>\n	<li>Process preventive controls, allergens, allergen awareness, allergen preventive controls, sanitation preventive controls and supplier preventive controls.</li>\n	<li>Food hazards, types of hazards (biological, chemical and physical), hazard identification, hazard analysis, hazard characterization, risk characterization and control measures.</li>\n	<li>HACCP concepts, principles, plan, key terms, HACCP implementation, Steps in implementing HACCP principles, storage, temperatures and procedures.</li>\n	<li>Food-borne illness, causes of foodborne illness, risk, potentially hazardous foods, temperature danger zone, foodborne illness and symptoms, impacts of foodborne illness and prevention of foodborne illnesses.</li>\n	<li>Good personal hygiene, prevent contamination, physical, chemical and biological, temperature control &amp; pest control and keys to safe food, no-touch techniques, cleaning and Sanitizing.</li>\n	<li>Pest control, major workplace pests, monitoring and detection, prevention and control, verification and validation procedures record-keeping procedures recall plan and pest management system.</li>\n	<li>GAP, GHP, ISO 22000, relationship between ISO 22000 and HACCP, steps in implementing ISO 22000, costs and benefits of ISO 22000.</li>\n	<li>Brief overview on Food Safety Legislation, FAO, FDA, WHO and CAC international regulations for food and food packaging industries.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Food Supervisor | Manager</li>\n	<li>NPD supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Food raw materials suppliers</li>\n	<li>Packaging Graphic Designers</li>\n	<li>Food &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Food researchers, engineers, chemists and auditors.</li>\n	<li>Those new to the packaging, dairy and food industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understand food safety, food safety sequence, food hazards, risk to food during manufacturing &amp; how to minimize these risks.</li>\n	<li>Identify food hazard, perform analysis, hazards characterization and practice creating a prevention-focused food safety plan.</li>\n	<li>Able to implement the good manufacturing practices, pre-requests and implementation in the manufacturing workplace.</li>\n	<li>Recognize how food can be made unsafe from biological, chemical, physical, food allergen hazards by maintaining workplace sanitation and personal hygiene.</li>\n	<li>Follow step by step instructions on the development and application of risk-based preventive controls as defined by FDA, FAO, WHO and CAC.</li>\n	<li>Enhance participants&rsquo; understanding of process and risk-based metric driven auditing designed to meet internal, and customer requirements.</li>\n	<li>Implement the HACCP principles, ISO 22000 in order to ensure safe food supply chain from manufacturing to consumer end.</li>\n	<li>Develop or sharpen practical audit skills such as interviewing, documenting objective evidence, re-call and record keeping and implementing corrective &amp; preventive action programs to reduce risk and drive improvement.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 06:23:25'),
(31, 'GRAPHIC DESIGN FOR NON-DESIGNER', '', '1468824678592.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Graphic Design is a complex art, popular field and many people from all over the world take up this field and become graphic designers. To become a graphic designer, you need to master many different skills and tools including high-level concepts like layout, typography, elements of design, shape, texture, photographic images, color systems, interactive design and color. This two days based training session addresses various topics on design essentials with specific training elements built into each print job and individuals will practice concepts to maximize print quality and productivity with the least number of steps through hands-on activities accompanied with presentations and discussion and at the end participants will leave the class with a strong understanding of the fundamentals of graphics design and be able to troubleshoot a variety of design related issues upon return to their respective facility. In addition, participants will also have a better grasp of what graphic designers with specific training elements built into each print job and individuals will practice concepts to maximize print quality and productivity with the least number of steps.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Overview of graphic design and historical perspective, essentials, elements of design including line, shape, color, texture, value and basic design principles: legibility, alignment, repetition, proximity and contrast use in printing industry.</li>\n	<li>Principles of design including, unity, harmony, proportion, balance, contrast, emphasis, direction, rhythm, pattern, repetition and variety.</li>\n	<li>Color system, primary, secondary, tertiary and complementary, subtractive, additives colors, Mansell&rsquo;s scale, RGB and CMYK, and L*A*B, LCH color system.</li>\n	<li>Typography, anatomy of type and their applications, classifications and their applications, typographical solutions.</li>\n	<li>Place of design layout, composition in the graphic design process, how principles of design are applied in layout and composition.</li>\n	<li>Photographic images, photography in graphic design, photographic manipulation, use of basic photographic manipulation techniques.</li>\n	<li>Interactive design. Define interactive design, static and dynamic interactive design, interactive web page, app, game, e-publication, etc.</li>\n	<li>File preparation for intended media and important variables, DPI, PPI, JPEG, PDF, PICT, TIFF, JPG, EPS, BMP and resolution, DPI etc.).</li>\n	<li>Print related issues, trapping, color separation, screening, halftones, barcodes and legal, prepress automation and proofing, Working with CAD Dielines.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>Prepress| Post press Manager</li>\n	<li>Prepress operators | Technicians</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Print Quality Control Technicians</li>\n	<li>Ink chemists &amp; chemicals suppliers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the prepress, graphic and printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understanding the design essentials, basic principles, color system, anatomy and typography and design layout etc.</li>\n	<li>Help to gain a good skills of using elements such as lines, shapes, forms, tones, textures, letters and colors in graphic design.</li>\n	<li>Proficient in graphics designs and design print as per market demands to increase job profitability and press productivity.</li>\n	<li>Increasing customer satisfaction, retention and loyalty resulted to increase printer competitiveness and profitability</li>\n	<li>Demonstrate design layout, composition in the graphic design process and how principles of design are applied in layout and composition.</li>\n	<li>Design, develop and create a variety of media products using relevant, current and/or emerging design related technologies.</li>\n	<li>Plan, implement and evaluate graphic design projects using project management skills to deliver quality work to clients according to schedule and within budget.</li>\n	<li>Plan, create and use photography, illustration and typography in design layouts to meet the brand requirements of the customer in the graphic and printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 06:33:34'),
(32, 'HAZARDOUS CHEMICALS MANAGEMENT', '', '927512573146.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Chemicals are an integral part of our life and play a substantial role in economic growth and human well-being but improper management of hazardous chemicals are potentially dangerous and pose a serious threat to health and economic development. Hazardous chemicals in air, water, food, consumer products and occupational environment cause the range of disease including cancers, fetal malformations, endocrine, cardiovascular, neurodevelopment and immune disorders. A safe and sound management of hazardous chemicals during manufacturing, handling, transportation, and storage will support the attainment of sustainable environment as well as also provide the healthy life style to the industrial workforce. This two days training session addresses various topics on hazardous chemicals, theory of hazards, fire &amp; health hazards, classifications, hazards identification, hazards warnings, color coding, risk assessment and management, safety data sheet, best handling practices, international regulations and standards through hands-on activities accompanied with case studies, presentations and discussion and at the end participants will leave the class with a strong understanding of advance concepts of hazardous chemicals management and be able to plan and respond to incidents in own organization upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Hazardous chemicals concepts, classifications, forms, categories and far-reaching health, environmental and physiochemical effects of hazardous chemicals and magnitudes (OSHA, NIOSH).</li>\n	<li>Hazardous Chemicals chemistry, CAS and CASRN, physical states, characteristics, routes of exposure of hazardous chemicals and hazards communication 1910-1200 standards.</li>\n	<li>Critical parameters, flash point, boiling point, fire point, auto ignition temperature, SML, PEL, REL,STEL, IDLH, evaporation point, acute toxins and chronic toxins of hazardous chemicals including objective of MSDS and SDS for hazardous Chemicals with important sections.</li>\n	<li>The hazardous chemical identification and effects on health, environment, like heptotoxins, nephrotoxins, neurotoxins, reproductive toxins, cutaneous effects, and eye hazards, route of exposure, category of exposure.</li>\n	<li>Chemical Safety, synergism and matter of hazards zones, safety pre-cautions and equipment used for hazardous identification, PPE and hazardous chemicals safe handling best practices.</li>\n	<li>Hazardous chemicals risk factors, risk assessment process, levels of risk, physiochemical risk &amp; actions plan and risk management and control measures to minimize risk at workplace.</li>\n	<li>Depth understanding to guidelines for ordering, preparing, color coding, hazardous signs use for hazardous substances.</li>\n	<li>Globally Harmonized System, objectives, components, classes, NFPA diamond, GHS symbols, label elements, GHS label statements, non-GHS statements, pictograms and GHS black listed hazardous chemicals.</li>\n	<li>Hazardous chemicals compliance to WHS, RoHs, POPs, PIC, CPL, REACH, COSHH international regulations and standards.</li>\n	<li>Basel, Rotterdam and Stockholm conventions and agencies IPCS, ILO, OSHA, ICCSS, IFCS and IOMC that regulate hazardous chemical safety and storage.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>QHSE personnel</li>\n	<li>Production plant operators</li>\n	<li>NPD &amp; Warehouse staffs</li>\n	<li>Logistics &amp; facilities manager</li>\n	<li>Ink chemist and QA executives.</li>\n	<li>Environment agency personnel</li>\n	<li>Dangerous goods safety advisors</li>\n	<li>Chemicals Laboratory personnel</li>\n	<li>Researchers, faculty and Students</li>\n	<li>Person who handle chemicals in their work, including hauliers</li>\n	<li>Who guide and educate others in the handling and use of chemicals.</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Depth knowledge, how to recognize hazardous substances, their hazards at the workplace, source of exposure and impact on health and environment.</li>\n	<li>Able to develop skills and manage the safe and proper handling, transportation, storage and disposal of hazardous chemicals.</li>\n	<li>Better Understand to know the chemistry of hazardous chemicals, physical states, critical properties of hazardous chemicals, signs, label statements and color coding.</li>\n	<li>Understand how to minimize the risk of hazards during manufacturing, handling, transportation, storing, and disposing of hazardous chemicals and control ignition sources and accumulation of flammable and combustible substances.</li>\n	<li>Apply skills to components necessary to comply with the loss prevention audit questions at hazardous chemicals workplace.</li>\n	<li>Enhancement of the competence skills of staff to reduce fire and health risk for safe, healthy and environmentally friendly workplace.</li>\n	<li>Establish of procedures to ensure maintenance of health, safety and environment standards during manufacturing, transport and disposal of hazardous chemicals.</li>\n	<li>Able to develop the strategic approach for hazardous chemicals management with international standards and regulations.</li>\n	<li>Effective implementation of SOPs, checklists, centerlines and standards as per ISO as well as OSHA requirements in the chemicals and associated industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 06:46:01'),
(33, 'PAPER QUALITY MANAGEMENT', '', '3581846356412.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Paper and paperboard are the most widely used packaging materials in the world. No matter what you&#39;re printing or how great your design is, if you have a bad print job your investment will be wasted. How terrible it would be to spend time and money developing an incredible marketing piece, only to have it ruined by a poor print job! If you want your print marketing materials to lead the pack, you&#39;ve got to look better than the rest. Choosing the best paper type for your project doesn&#39;t have to be difficult. It starts with understanding why paper is such a crucial element. Your customers equate the quality of your marketing with the quality of your products and services, so to have a high-quality promotional package suggests you have a high-quality business. People want to purchase from high-quality businesses. So, this two days training session addresses various topics on advance concepts of paper production, paper characteristics, paper properties, quality variables, critical defects and more through hands-on activities accompanied with case studies, presentations and discussion and at the end participants will leave the class with a strong understanding of advance concepts of paper quality management and be able to troubleshoot a variety of paper related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Paper &amp; paperboard structure, paper formation, wood pulp, pulpwood, and important variables used in the production of paper.</li>\n	<li>Paperboard types, solid bleached board, unbleached board, folding box board, white lined chipboard, duplex paperboard.</li>\n	<li>Paper grain direction, layer construction, fibers grammage, MP, CP, TM, CTMP, TCF process, bulk, thickness, tearing resistance, shear resistance, shape ability, strength dimension stability, creasability &amp; foldability, taint &amp; odour and various methods involves in ink drying on paper.</li>\n	<li>Paper quality variables, basics weight, brightness, surface toughness, ink penetration, air permeability or porosity gloss, PPS roughness, opacity, relative humidity, moisture, pH, volume and impact of these variables on print performance.</li>\n	<li>Paper properties, tensile, effect of test specimen size on tensile strength, units, breaking length, paper stiffness, McKee formula, water drop contact angle, angle change rate, cobb water absorption test. caliper and basis weight.</li>\n	<li>Paperboard and food contact materials, fillers, sizing agents, parchmentisation agents and retention agents, flotation agents, defoamers, slimicides, Preservatives, Humectants, colorants and optical brighteners, surface refining and coating agents.</li>\n	<li>Reel length calculation, outside diameter of reel, net weight of reel, converting, varnishing, die-cutting and creasing, creasibility, good &amp; bad creasing, embossing, stamping, laminating and Glue application.</li>\n	<li>Paper common defects, cigarette roll, irregular edge cut, edge debris, picking, hickeys, blade lines, coating impurities, stains, mottling, surface cracks, delamination, blistering, size variation, slack edges, wrinkles, moisture welt, splice or joint, wrapping glue, core related problems with dimensional instability and best recommendations.</li>\n	<li>Paper standards 21 CFR 176.170, ISO 534, 2471, 11475, 2470-1, 8791-4 and recommendations for conditioning and storage.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>NPD supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the graphic, paper and printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understand paperboard structure, composition, productions process and important variables involve in the paper production.</li>\n	<li>Standardize the paperboard critical quality variables during production-run in order to optimize the quality of paperboard.</li>\n	<li>Maintain the paper properties accurately and compliance to food contact materials global standards and regulation in order to enhance the food safety culture as well as consumer protection.</li>\n	<li>Determine the reel length, outside diameter, net weight of the reel and eliminate the common defects of paperboard.</li>\n	<li>Increase accuracy, decrease waste &amp; cost, customer complaints, speed up time-to-market and streamlines the processes.</li>\n	<li>Troubleshoot paperboard related problems during paper production and printing with effective root cause analysis that avoid materials rejection.</li>\n	<li>Able to eliminate materials waste, paperboard defects as well as machine downtime to boost process efficiency leading to high profitability.</li>\n	<li>Apply his skills to enhance paper quality &amp; efficient productivity that increase job to job profitability with customer retention.</li>\n	<li>Implement the SOPs, checklists, machine centerlines, ISO and OSHA standards in paperboard, graphics and printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 06:58:44');
INSERT INTO `cms` (`id`, `post_title`, `short_heading`, `post_banner`, `post_description`, `displaysidebar`, `sidebar`, `meta_keyword`, `meta_title`, `meta_description`, `created_on`) VALUES
(34, 'PREPRESS AND PACKAGING DESIGN', '', '49066407230.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Pre-press process plays key role from image selection to file supply- whether that&rsquo;s for print or digital distribution and printers are always looking to maximize their printing capabilities in flexographic, offset and gravure printing. Poor image selection and mistakes at pre-press can be very expensive in case of any minor mistake from creation of a print layout to final printing and files press ready covering all the common issues that cause delays, cost time and produce unsatisfactory results. This two days based training session addresses various topics on overview of prepress workflow, prepress capabilities, color trapping, color management, image editing, cropping, retouching, correction, file exporting, proofing, common mistakes with pre-press checklists suitable for individual in the prepress, printing industries through hands-on activities accompanied with case studies, presentations and discussion and at the end participants will leave the class with a strong understanding of advance concepts of pre-press &amp; packaging design management and be able to troubleshoot a variety of design related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Overview of the pre-press workflow, file formats, relationship between layout, drawing and image editing applications, pixels vs vectors, font substitution, font management software.</li>\n	<li>Actual ppi vs effective ppi, Scanning artwork, determining the right resolution, screen angles, fixing moire patterns, working with bleeds, slug, setting crop marks, spreads and imposing pages.</li>\n	<li>Spot colour artwork, tints, mixed inks, trapping, duotones, spot varnish, compression techniques, Clipping paths and transparency.</li>\n	<li>Image editing, cropping an image, changing image size, tonal correction, image retouching, colour correction, image sharpening, when to convert to CMYK and using a non-destructive workflow.</li>\n	<li>Colour in print, Colour management, Colour profiles, colour settings, and colour managed workflow, Munsell&rsquo;s scale, CMYK &amp; RGB colors and L*A*B, L*C*H color system.</li>\n	<li>Preparing print-ready PDFs, exporting from InDesign, using acrobat distiller, using PDF export presets, preflighting and packaging and Fixing broken links.</li>\n	<li>Over view of the different types of Proof available, Digital proofs, Wet proofs, Plotter proofs, Soft proofs, their pros and cons.</li>\n	<li>High end image retouching and manipulation, colour trapping, file correction, file composition, and file output, pagination and imposition, file conversion.</li>\n	<li>Releasing files, hard copy, color mark-up, hard copy, ink drawdown, artwork, Instructions, Disk Directory, Label Your Disks.</li>\n	<li>Prepress checklist, file release checklist, information for the printer, print specifications checklists, ISO 16760:2014, ISO 15311-2: 2018 and ISO 12647.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>Prepress| Post press Manager</li>\n	<li>Prepress operators | Technicians</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Print Quality Control Technicians</li>\n	<li>Ink chemists &amp; chemicals suppliers</li>\n	<li>Ink room technicians / Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the prepress, graphic and printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understanding the essentials and workflow of prepress, press and post press in the printing &amp; graphic industry.</li>\n	<li>Reduce the number of reworks, visual inconsistency and waste caused by the ineffective management of the prepress area.</li>\n	<li>Optimize color separation, image characteristics, color trapping, transparency, overprint, consistent color reproduction and recognize potential pitfalls.</li>\n	<li>Control of the appearance of brand assets reproduced with different printers and substrates to achieve optimum printing results.</li>\n	<li>Reduce and cut packaging design and prepress, hardware and specialized software cost and expenses dramatically.</li>\n	<li>Able to increase customer satisfaction, retention, new customer and loyalty resulted to job profitability and press productivity.</li>\n	<li>Standardize of ink formulations, prepress parameters &amp; variables, substrate and prepress equipment calibration &amp; validation.</li>\n	<li>Demonstrate effective leadership skills to lead prepress team, solve prepress problems, evaluate prepress conditions to achieve optimal printing results.</li>\n	<li>Implement the SOPs, checklists, machine centerlines, ISO and OSHA standards in prepress, graphics and of printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 07:08:50'),
(35, 'PRINT AUTOMATION AND DIGITALIZATION', '', '3610339165685.jpg', '<h4>COURSE OVERVIEW</h4>\n\n<p>Rapid changes in digitalization and automation of printing and packaging industries create opportunities for new businesses, resulting in enormous opportunities to develop a new, smarter and more sustainable industrial sector as well as possibility to deliver high quality offers through new business models and more efficient production. Digitalization and technological development is not cope the challenges due to globalization but also generate enormous opportunities for printing companies to increase customer value by streamlining processes, increasing quality, creating new revenue streams, and reducing production costs due to systematical approach, changes in leadership style, and a completely new mind-set in the production chain. This two days based training session provides insightful skills on digitalization concepts, techniques, strategies to address challenges and opportunities of digitalization, and lays a foundation for sustainability, competence, innovation ability, strategic decisions and will support supports development of production that is smart, flexible and resource efficient, thereby also contributing to the attractiveness of the company as a work place.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Basic concepts of the digitalized printing industry</li>\n	<li>Development of the industry 4.0 concept</li>\n	<li>Basics of print digitalization, big Data and Internet of Things and Services</li>\n	<li>Printing Industry 4.0 Matrix, Production 4.0, Logistics 4.0 and Maintenance 4.0</li>\n	<li>Horizontal and vertical integration, Research &amp; Development 4.0</li>\n	<li>Print quality management 4.0, Aftersales services 4.0</li>\n	<li>Business analytics and data mining and ecosystems 4.0</li>\n	<li>Horizontal and vertical integration II, Robotics 4.0 and Autonomous Systems used in the printing industry.</li>\n	<li>Employment and workplace 4.0 and Advanced concepts of the digitalized printing industry</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant management</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>IT Technician and supervisor</li>\n	<li>Supply chain personnel</li>\n	<li>Machine operators and supervisor</li>\n	<li>Maintenance supervisor | Manager</li>\n	<li>Digital industry researchers and students</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Stimulating the development, spread and use of the digital technologies that have the greatest potential to lead the printing industrial sector&rsquo;s transformation.</li>\n	<li>Encouraging new business models and organizational models in order to tap the potential of the new technology.</li>\n	<li>Increased resource efficiency, environmental considerations and more sustainable production</li>\n	<li>Identify the potential of technological innovations and determine the revenue-generating possibilities of pursuing them.</li>\n	<li>Learn how digital transformation is helpful in managing the organizational transformations in the form of people and processes</li>\n	<li>Utilize the concepts of data analytics, design thinking, operations as well as create business strategies and models.</li>\n	<li>Explore crucial technologies like AI, IoT, robotics, quantum computing, and Blockchain to name a few in printing industry.</li>\n	<li>Understand the range of ways that digital technologies can be leveraged internally to enhance communication, collaboration and streamline operations.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 07:16:08'),
(36, 'PRINT QUALITY MANAGEMENT', '', '4512531179559.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Accuracy and consistency of print is vital to empower the decision making of brand owners, premedia partners and printers. Have you ever wondered how printing suppliers achieve consistency across print runs and across multiple presses? Everyone sees color slightly differently, and certain hues may appear differently depending on the type of substrate, ink system used in printing or even the press on which a job is printed on. So how can print managers ensure their print or packaging project looks consistent and 100% on brand? Maintaining high print quality has become necessary to effectively compete in the today&rsquo;s growing and challenging global marketplace. This two days training session addresses various topics on print variables, an overview of the print market, machine setting, photopolymer plate, anilox, doctor blades, cylinders, substrate and ink options, color and design considerations and more through hands-on activities accompanied with case studies, presentation and discussion and at the end participants will leave the class with a strong understanding of advance concepts of print quality management and be able to troubleshoot a variety of print related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Overview flexographic, gravure &amp; offset printing process and best practices to print quality management during the press run.</li>\n	<li>Print quality attributes, print density, dot gain, print contrast, color trapping, screen percentage, color match, color bar, halftones, ink film thickness, print gloss, ink setting, surface tension and print color registration.</li>\n	<li>Depth analysis of expanded color gamut, accurate expanded gamut proof, device link profiles, ICC pairs, print gamut, gamut color separations, press characterizations &amp; variables.</li>\n	<li>Engraved cylinders, chrome thickness, hardness, roughness, copper thickness, cell volume, depth, count screen, opening &amp; height, cell wall width, cell angles, engraved angles, channel width impact on print quality and cylinder defect analysis.</li>\n	<li>Doctor blade contact area, edge, contact point, blade pressure, thickness, contact angles, doctor blade materials, blade defects analysis and end seal effects.</li>\n	<li>Flexo plate structure, UVA &amp; UVC exposure, dot shape, plate screen count, relief depth, compression simulation, angles, halftones, elastic deformation, SFE, optical density, plate defects, best mounting practices, cleaning, storage and handling.</li>\n	<li>Anilox core construction, cell shape &amp; impact on print, moire effect, anilox specifications, engraving angles, cell volume, cell wall &amp; depth, cell opening &amp; ink retention, anilox maintenance, anilox-press correlation, anilox cleaning &amp; handling.</li>\n	<li>Paper opacity, volume, thickness, pH, humidity, weight, moisture, roughness, brightness, gloss, stiffness, surface tension impact on print quality during press run.</li>\n	<li>Ink composition, UV/Visible spectrum, pH + Viscosity, temperature, solid contents, solid laydown, Color fastness, ink room management, color system RGB, CMYK, HSB, CIE LCH, LAB, metamerism, colorblindness, cost effective ink formulation etc.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>Print Supervisor | Manager</li>\n	<li>NPD supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>Quality Control Technicians</li>\n	<li>Ink and chemicals suppliers</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Ink room technicians | Ink matchers</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Printers/laminators/ slitters Operators and Helpers</li>\n	<li>Those new to the prepress, graphic &amp; printing industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understand different printing process, basic principles, components and effect on print variables and quality management.</li>\n	<li>Identify the print quality attributes and standardize them to attain accurate print consistency throughout the production run.</li>\n	<li>Able to maintain brand equity, quality standards and consistence quality products delivery as per brand owner requirement.</li>\n	<li>Standardize the printing process elements, anilox, flexoplate, cylinders, unwinder, and rewinder, dryers, chiller and impression roller in order to attain high print quality results during production run.</li>\n	<li>Standardize the printing inks variables, color measurement, ink formulations and press parameters for consistent quality print.</li>\n	<li>Increase accuracy, decrease print approval time, speed up time-to-market, and streamlines the proof reading processes.</li>\n	<li>Improve constantly and forever the system of print production and service to improve quality, productivity and job-to-job profitability.</li>\n	<li>Reduce print related defects, machine downtime, color inconsistency and achieve high quality with press room efficiencies.</li>\n	<li>Implement the SOPs, checklists, machine centerlines, ISO and OSHA standards in the paper, graphic and printing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 07:35:09'),
(37, 'PRINTING PROCESS & EQUIPMENT VALIDATION', '', '2369435745273.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Validation and qualification of product as well as equipment are nowadays an integral part of the day by day routine work in the packaging industry and manufacturers are legally obligated to meet the requirements of global standards for product and equipment validation &amp; qualification from raw materials to consumer end. Variation in the equipment or process parameters especially during packaging materials production may have a significant impact on the integrity and correct functioning of the pack, therefore packaging product process and equipment for finished and bulk products should be validated and qualified. This two days based training session addresses various topics on validation and qualification activities, validation chain, stages of qualifications, process validation, re-validation, risk management including validation global regulations and standards etc. through hands-on activities accompanied with case studies, presentations and discussion and at the end participants will leave the class with a strong understanding of advance concepts of packaging product processing and equipment validation and be able to troubleshoot a variety of product, process and equipment related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Validation and qualification overview, principles of validation, types of validation, validation timeline, validation lifecycle, approaches in qualification and validation, V-model and importance of validation and qualification in the packaging industry.</li>\n	<li>Equipment validation, stages of qualification, URS, FAT, SAT, DQ, IQ, OQ, PQ, AQL, RQL and SOPs on operation, cleaning, maintenance, calibration, test method validation, equipment criticality and risk Assessment.</li>\n	<li>Validation master plan (VMP), validation summary report (VSR), validation master list (VML) difference b/w validation master plan and validation master list stages of validation, protocols, reports and inclusions.</li>\n	<li>Process validation, elements of process validation, process validation parameters, temperature, pressure, pH, time, criteria and limits, validation effects and issues.</li>\n	<li>Qualification and validation protocols, objectives, site, responsible personnel, SOPs, equipment, criteria, parameters, sampling, testing, monitoring requirements and calibration requirements.</li>\n	<li>Responsibility and the responsibilities of different stakeholders i.e. quality, production, project, supply chain and maintenance.</li>\n	<li>Qualification and validation reports, specifications, process flow charts, operator manual, sampling and testing plan, methods, statistical methods and results.</li>\n	<li>Revalidation, validation type, requirement of revalidation, revalidation frequency, basic categories of re-validation, change management, deviation management, calibration and verification, validation schedule and documentation.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Plant Management</li>\n	<li>NPD supervisor | Manager</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>Quality Control team members</li>\n	<li>Product Design Team Members</li>\n	<li>Production Supervisor | Manager</li>\n	<li>Plant Maintenance Personnel</li>\n	<li>Prepress and Graphic Designers</li>\n	<li>Initiatives and Project team members</li>\n	<li>Printing &amp; Packaging Technologists.</li>\n	<li>Sales and Customer Service Representatives</li>\n	<li>Those new to the equipment and packaging industry</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Understand of product / equipment validation and qualification, categories, timeline, lifecycle in the packaging industry and why validation is essential for any process industry.</li>\n	<li>Demonstrate the requirements and prepare VMP and VML CQV (Commissioning, Qualification and Verification) phases for any industry.</li>\n	<li>Organize and plan process and equipment validation in a manner that will ensure product quality, safety and efficacy through-out its life cycle.</li>\n	<li>Able to prepare validation protocols and perform qualification and validation of new premises, equipment, utilities, systems, process and procedures.</li>\n	<li>Identify the roles of QA, production and project teams during installation, operational and performance qualification in manufacturing plant.</li>\n	<li>Determine process control limits, materials specifications, parameters, potential failures modes, actions levels and worst scenario in order to produce acceptable product under normal operating conditions.</li>\n	<li>Establish and maintain procedures for monitoring and controlling of process parameters for validated processes to ensure that the specified requirements continue to be met according to global requirement and standards.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 07:43:29'),
(38, 'UHT PROCESSING AND ASEPTIC PACKAGING', '', '631533168504.jpg', '<h4>COURSE OVERVIEW:</h4>\n\n<p>Thermal processing and aseptic packaging is the utmost important for dairy production, consumer safety and operational efficiency. A dairy plant with calibrated, validated, verified and controlled equipment for thermal processing and aseptic packaging reveals long self-life, good flavor, high retention of nutrients in addition to ensuring high quality dairy processing with accurate process control that optimize the dairy products processing quality in order to boost the profitability as well as sustainability in the competitive market with global standards. This two days training session addresses various topics on UHT processing, pasteurization, canning, sterilization, equipment validation, verification and calibration, operational and regulatory procedures, critical parameters, microbiology of UHT operations, reaction kinetics, homogenation, enzymology, cleaning, inspection, sanitization, F,B &amp; C value, LTLT, HTST, HHST and more suitable for those involved with development, verification, maintenance and operation of UHT processing and aseptic packaging through hands-on activities accompanied with case studies, presentations and discussion and at the end participants will leave the class with a strong understanding of advance concepts of UHT processing and aseptic packaging and be able to troubleshoot a variety of UHT processing related issues upon return to their respective facility.</p>\n\n<h4>TRAINING CONTENTS:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>UHT processing concept, historical background, theory &amp; chemistry, thermal processing principles, critical parameters &amp; variables and UHT processing conditions.</li>\n	<li>Heat stability, TDT, sediment formation and fouling, thermo resistant spore, thermisation, possibility of contamination, source and technical solution.</li>\n	<li>Dairy products composition and microbiology to set the stage for the conditions needed for pasteurization and cleaning and sanitizing.</li>\n	<li>Microbiology of UHT operations, microbial analysis and microbiological approaches to determine F, B and C values during processing also including D &amp; Z values and reaction kinetics.</li>\n	<li>Blanching, pasteurization concepts, pasteurization principles, critical variables and parameters, LTLT, HTST, HHST and pasteurization.</li>\n	<li>Filling operations, canning system, sanitization, sterilization and in container sterilization, TTI and ISI, heat transfer and methods including aseptic homogenation.</li>\n	<li>Low and high acid dairy products, source of contamination of raw materials, pasteurized and milk, UHT flavoured milk, creams, soya milk, juices UHT processing.</li>\n	<li>Thermal processing and aseptic packaging systems calibration, verification, validation, cleaning, inspection, sanitization and storage.</li>\n	<li>Aseptic packaging materials, composition, sterilization, barrier properties, critical variables and global standards &amp; regulations.</li>\n</ul>\n\n<h4>WHO SHOULD ATTEND?</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>UHT Plant management</li>\n	<li>NPD supervisor | Manager&nbsp;</li>\n	<li>UHT &amp; Food technologists</li>\n	<li>QHSE supervisor | Manager</li>\n	<li>UHT QA &amp; QC Technicians</li>\n	<li>Research &amp; Development Executive</li>\n	<li>Dairy product retailers and distributors.</li>\n	<li>Dairy products sales executive and Manager</li>\n	<li>UHT processing plant maintenance technicians</li>\n	<li>UHT &amp; aseptic processing equipment operators and supervisors.</li>\n	<li>Dairy students, product analyst, researchers and food safety officers.</li>\n</ul>\n\n<h4>LEARNING OUTCOMES:</h4>\n\n<ul style=\"text-align:justify;\">\n	<li>Enhance understanding of UHT processing concepts, food chemistry, microbiology, enzymology and physical processes taking place when dairy based products are heated and stored.</li>\n	<li>Able to determine the F0, B*, C*, D and Z values during product thermal processing in order to maintain product quality, production safety and plant efficiency.</li>\n	<li>Able to resolve problems and prevention of microbiological contamination of food and to develop actions plans to increasing performance and minimizing HRS risk.</li>\n	<li>Ensure product quality and food safety by reducing UHT equipment downtime, maintenance and product storage cost.  Exposure to latest development in nutritional dairy product formulation, lower plant running costs, improve performance and higher sustainability.</li>\n	<li>Able to demonstrate, select aseptic packaging materials, its composition, defects causes and solution in order to optimize thermal processing plant performance, reliability and global legislative compliance.</li>\n	<li>Able to perform the tasks of UHT equipment calibration, verification, cleaning, inspection, validation for keeping UHT processing plant at optimum efficiency.</li>\n	<li>Implement the SOPs, checklists, machine centerlines, food safety and dairy global standards in UHT processing industry.</li>\n</ul>\n', 0, 0, '', '', '', '2020-02-27 07:51:36'),
(39, 'CERTIFICATION’S OVERVIEW', '', '1112701874754.jpg', '<p>A CERTIFIED INDIVIDUAL EARNS SALARIES 25% HIGHER THAN THEIR NON-CERTIFIED CO-WORKERS.</p>\n\n<p>CPPEx Global offers a comprehensive certification program for professional associated with printing, packaging and associated industries. This certification program is well recognized and highly demanded that demonstrates to employers, clients and colleagues that a certified employee possesses sound knowledge, experience, skills and competencies in the printing and packaging field. Our certification program recognizes the competence of an individual to perform his duties as a prepress, press machine operator, supervisor and manager. The certifications are developed and maintained through a vigorous process. The certification program includes;</p>\n\n<ul>\n	<li>Certified Press Operator &ndash; <strong>CPO</strong></li>\n	<li>Certified Print Supervisor &ndash; <strong>CPS </strong></li>\n	<li>Certified Design &amp; Prepress Operator- <strong>CDPO </strong></li>\n	<li>Certified color Management Technician &ndash; <strong>CCMT</strong></li>\n</ul>\n\n<p>The CPPEx Global certification program is accredited by the American National Standard Institute (ANSI) against the international organization for standardization (ISO) 12647. Our certifications are distinguished by their global development and application which makes them transferable across printing and packaging industries and geographic borders. This certification program is designed to testify and ensure that all certification holders have demonstrated their competence though fair and valid measure as well as have the qualifications, skill, knowledge, abilities, expertise, experience, training, and education to officially and with authorization practice his/her chosen profession. The professional certification program based on following 10 modules and with consecutive 10 days, eight hours each day in total 80 contact hours.</p>\n\n<ol>\n	<li>Machine Variables and Setting</li>\n	<li>Design &amp; File Preparation</li>\n	<li>Fingerprint Trial</li>\n	<li>Flexoplate and Anilox</li>\n	<li>Engraved Cylinder</li>\n	<li>Color Management</li>\n	<li>Film &amp; Paper Board</li>\n	<li>Doctor Blade and Chamber</li>\n	<li>Process and Product Validation</li>\n	<li>Print and OSHA / Environmental</li>\n</ol>\n\n<p>Standards CPPEx Global understands the importance of impartiality in carrying out its certification activities, manage conflict of interest and ensures the objectivity of its certification activities and entire certification program is supervised by the Certification Governance Panel (CGP).</p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-overview\">CERTIFICATION&rsquo;S OVERVIEW</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certification-process\">CERTIFICATION PROCESS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-benefits\">CERTIFICATIONS BENEFITS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"eligibility-requirments\">ELIGIBILITY REQUIRMENTS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"application-payment\">APPLICATION &amp; PAYMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"complaint-process\">COMPLAINT PROCESS</a></div>\n', 0, 0, '', '', '', '2020-02-27 08:03:26'),
(40, 'CERTIFICATION PROCESS', '', '2375771485462.jpg', '<h4 style=\"text-align:center;\">CERTIFICATION PROCESS</h4>\n\n<p style=\"text-align:center;\"><img alt=\"\" src=\"http://project.cyphersol.com/cpxglobal/uploads/cmsimage/3225209858532.jpg\" style=\"width: 100%;\" /></p>\n\n<p style=\"text-align:center;\">Each certification is valid for three years and after expiration, each individual must take the MCQs based exams for re-certification for next three years.</p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-overview\">CERTIFICATION&rsquo;S OVERVIEW</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certification-process\">CERTIFICATION PROCESS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-benefits\">CERTIFICATIONS BENEFITS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"eligibility-requirments\">ELIGIBILITY REQUIRMENTS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"application-payment\">APPLICATION &amp; PAYMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"complaint-process\">COMPLAINT PROCESS</a></div>\n', 0, 0, '', '', '', '2020-02-27 08:11:14'),
(41, 'CERTIFICATIONS BENEFITS', '', '4761040814592.jpg', '<p>Education, validation and recognition - just a few characteristics of a quality professional certification that distinguish individuals who have demonstrated particular knowledge or skills required for a specific role or profession. CPPEx Global&rsquo;s professional certifications provide the following benefits to the printing and packaging professionals.</p>\n\n<ul style=\"text-align:justify;\">\n	<li>Help to advance and ensure qualifications and serve as indicators of diligence, perseverance and competence in certified professionals.</li>\n	<li>Provide a way for individuals to identify and recognize the skills, knowledge and competence levels that they need to master in the printing and packaging field.</li>\n	<li>Our Certification programs add value both early in a profession and later in a professional&rsquo;s career to the individual working in the industrial sector.</li>\n	<li>Professional certification also functions as a &ldquo;career escalator&rdquo; for mid-career professionals.</li>\n	<li>Our certification program develop people, helping them to maintain required knowledge, skills, competencies and abilities throughout his job career.</li>\n	<li>Certification programs differentiate people with different levels of professional proficiency or specialty in the printing and packaging field.</li>\n	<li>Certification programs recognize people, acknowledging or rewarding those who consistently perform to a standard.</li>\n	<li>Our certification programs promote responsible conduct through the establishment of ethics and disciplinary codes, continuing education requirements, and assessments of core competencies.</li>\n	<li>Our professional programs regularly update certification examinations and requirements to reflect current knowledge, evolving skills and help to drive innovation and professional proficiency in the printing and packaging field.</li>\n	<li>Professional certification gives individuals confidence, motivation that they can be successful working for themselves.</li>\n	<li>Our certifications create entry-level access to skilled jobs that do not typically have degree or stringent prior experience requirements, with employers seeking certified candidates and willing to pay a premium for the demonstration of competency that certification provides.</li>\n	<li>Certified professionals also tend to experience greater job satisfaction&mdash;a perhaps unsurprising finding given the related evidence that certified professionals exhibit improved job performance.</li>\n	<li>Thus, for the certified professional, the credential provides credibility, recognition, job satisfaction, and often increased earning power and/or enhanced prospects for employment.</li>\n	<li>The certification testifies to the fact that this operator has the qualifications, skill, knowledge, abilities, expertise, experience, training, and education to officially and with authorization practice his/her chosen profession.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-overview\">CERTIFICATION&rsquo;S OVERVIEW</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certification-process\">CERTIFICATION PROCESS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-benefits\">CERTIFICATIONS BENEFITS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"eligibility-requirments\">ELIGIBILITY REQUIRMENTS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"application-payment\">APPLICATION &amp; PAYMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"complaint-process\">COMPLAINT PROCESS</a></div>', 0, 0, '', '', '', '2020-02-27 08:40:24'),
(42, 'ELIGIBILITY REQUIRMENTS', '', '3417250104272.jpg', '<p>To be eligible for the CPPEx Global certification, you must meet certain educational and professional experience requirements. All print and packaging related experience must have been accrued within the last five consecutive years prior to your application submission.</p>\n<style>\ntable th{\n	    background: #3f4045 !important;\n    color: #fff;\n    text-align: center;\n    padding: 5px 0!important;\n	 }\n</style>\n<table class=\"MsoTableGrid table table-striped\" style=\"width:100%; border-collapse:collapse; border:solid windowtext 1.0pt\" width=\"0\">\n	<tbody>\n		<tr >\n			<th >\n			Educational Background\n			</th>\n			<th>\n			Printing &amp; Packaging experience	</td>\n			<th >\n			Course Contact hours Completion\n			</th>\n			<th >\n			Employer’s Status</th>\n		</tr>\n		<tr >\n			<td>\n			High school diploma\n			</td>\n			<td>\n		Minimum five years/60 months\n			</td>\n			<td>\n			90% Contact hours interaction with trainer\n			</td>\n			<td >\n			Must Associate/corporate Member of CPPEx GLOBAL\n			</td>\n		</tr>\n		<tr >\n			<th colspan=\"4\" >\n			OR</th>\n		</tr>\n		<tr >\n			<td >\n			Bachelor’s degree or global equivalent\n			</td>\n			<td >\n			Minimum three years/48 months\n			</td>\n			<td>\n			90% Contact hours interaction with trainer\n			</td>\n			<td >\n			Must Associate/corporate Member of CPPEx GLOBAL\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>In case of the failure to meet the above eligibility for our certification program, the applicant must complete the 150 contact hour&rsquo;s pre-certification course.</p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-overview\">CERTIFICATION&rsquo;S OVERVIEW</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certification-process\">CERTIFICATION PROCESS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-benefits\">CERTIFICATIONS BENEFITS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"eligibility-requirments\">ELIGIBILITY REQUIRMENTS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"application-payment\">APPLICATION &amp; PAYMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"complaint-process\">COMPLAINT PROCESS</a></div>\n', 0, 0, '', '', '', '2020-02-27 08:43:28'),
(43, 'APPLICATION & PAYMENT', '', '387785391665.jpg', '<p>CPPEx Global encourage you to use the online application system to apply all certifications. A printed version of the application is available on a case by case basis and for more details or in case of any question contact our any corporate office or any regional office. Please ensure the following points before submission your application for CPPEx Global certification program.</p>\n\n<ul style=\"text-align:justify;\">\n	<li>Before you begin, check to make sure you meet the certification eligibility requirements and can record the necessary information on the application.</li>\n	<li>Once you start an online application, you will have to complete all your information and cannot cancel it.</li>\n	<li>Ensure that the application includes your valid, unique email address and phone number as these will be the primary mode of communication from CPPEx Global throughout the certification process.</li>\n	<li>You will be required to read and agree to the CPPEx Global code of ethics and professional conduct and the certification application/ renewal agreement.</li>\n	<li>Incomplete application for certifications will not be processed or returned. CPPEx Global strives to process applications for certification in a timely manner.</li>\n</ul>\n\n<p>The application timeline depends on how you submit your application- either online using the certification system or on paper sent by postal mail to CPPEx Global.</p>\n\n<h4>APPLICATION FEES:</h4>\n\n<p>The proper fees for payment are determined by your personal or employer membership status as well as your geographical location. Use the following chart to determine the CPPEx Global certification fee.</p>\n\n<table border=\"1\" width=\"100%\">\n	<tbody>\n		<tr style=\"background-color:#000098; color:#FFF;\">\n			<th scope=\"col\" style=\"background-color:#3f4045\">Certification Exams</th>\n			<th scope=\"col\" style=\"background-color:#3f4045\">Member Status</th>\n			<th scope=\"col\" style=\"background-color:#3f4045\">Fees</th>\n			<th scope=\"col\" style=\"background-color:#3f4045\">Certification Exams</th>\n			<th scope=\"col\" style=\"background-color:#3f4045\">Member Status</th>\n			<th scope=\"col\" style=\"background-color:#3f4045\">Fees</th>\n		</tr>\n		<tr>\n			<td>Certified Press Operator &ndash; CPO</td>\n			<td>Member</td>\n			<td>$500</td>\n			<td>Certified Press Operator &ndash; CPMO</td>\n			<td>Non-Memeber</td>\n			<td>$1000</td>\n		</tr>\n		<tr>\n			<td>Certified Print Supervisor &ndash; CPS</td>\n			<td>Member</td>\n			<td>$500</td>\n			<td>Certified Print Supervisor &ndash; CPS</td>\n			<td>Non-Memeber</td>\n			<td>$1000</td>\n		</tr>\n		<tr>\n			<td>Certified Design &amp; Prepress Supervisor- CDPS</td>\n			<td>Member</td>\n			<td>$500</td>\n			<td>Certified Design &amp; Prepress Supervisor- CDPS</td>\n			<td>Non-Memeber</td>\n			<td>$1000</td>\n		</tr>\n		<tr>\n			<td>Certified color Management Technician &ndash; CCMT</td>\n			<td>Member</td>\n			<td>$500</td>\n			<td>Certified color Management Technician &ndash; CCMT</td>\n			<td>Non-Memeber</td>\n			<td>$1000</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>The membership rate will apply only if you or your organization is a corporate or associate member of CPPEx Global at the time you submit payment for the certification. If you apply for membership right before you apply for the certification, make sure you receive confirmation of your membership before you pay for the certification. If your membership has not been completely processed before you pay for the certification, you will be charged the non-member fees. The membership is obtained after you submit payment for the certification, CPPEx Global will not refund the difference back to the applicant. Once application review process will complete, CPPEx Global team will inform the applicant by phone or email about his/her application final status. In case of approval, the next step is to submit the certification payment through online system. The payment $500 or below will be acceptable online system, while higher than this amount, payment will be direct transfer to our any regional office or corporate&rsquo;s office.</p>\n\n<h4>CANCELLATION OR REFUND POLICY</h4>\n\n<p>To obtain a refund for the professional certification, you must make a request to CPPEx Global at least 30 days before the training session. After 30 days, paid fees will not be aligned to refund, but the applicant can use this fee within a year for any certification or our training session.</p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-overview\">CERTIFICATION&rsquo;S OVERVIEW</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certification-process\">CERTIFICATION PROCESS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-benefits\">CERTIFICATIONS BENEFITS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"eligibility-requirments\">ELIGIBILITY REQUIRMENTS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"application-payment\">APPLICATION &amp; PAYMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"complaint-process\">COMPLAINT PROCESS</a></div>\n', 0, 0, '', '', '', '2020-02-27 09:58:37'),
(44, 'COMPLAINT PROCESS', '', '2223834018265.jpg', '<p>All complaints regarding training session, professional certifications or &ldquo;Best operator awards&rdquo; are governed by the CPPEx Global complaints process that must be received within 30 days of the event/ incident cited, made in filling our <a href=\"http://project.cyphersol.com/cpxglobal/contact/complaint\">online complaint form</a> or writing via email at <a href=\"mailto:complaint@cppexglobal.org\">complaint@cppexglobal.org</a>. All complaints should include evidence supporting the reason for the complaint and nature of the request, including all reasons why the action or decision should be changed. A complaint must include;</p>\n\n<ul style=\"text-align:justify;\">\n	<li>Name and email address of the complainant</li>\n	<li>Date, event name and location of the training session.</li>\n	<li>Name against whom the complaint is made, if applicable</li>\n	<li>Reference to the CPPEx Global training session, certifications that was violated as per policy.</li>\n	<li>A description of how the policy or procedure of training session or certifications was violated.</li>\n	<li>Any applicable evidence that support the complaint.</li>\n</ul>\n\n<p>We will acknowledge, in writing, your complaint within 5 days of receipt. If a complaint is missing any necessary information, you will be informed and allowed an additional 15 days to supply the missing information. If the required information is not submitted within that time, the request shall be closed.</p>\n\n<p>The review and validation of the complaint will occur in a constructive, impartial and timely manner. You will be notified of the outcome within 10 business days of the decision being made. A record of the complaint, including any subsequent action(s) taken, and decision made will be maintained by CPPEx Global. All information pertaining to the complaint will remain confidential.</p>\n\n<p>You have the right to escalate your complaint within 10 calendar days of the notification of the decision rendered. The escalation request should be submitted in writing and can be sent via email or mail to our concerning regional representative or our main office. A decision around the escalation will be communicated to you within 10 days of CPPEx Global&rsquo;s receipt of the escalation request, unless circumstances warrant a delay and if delay is expected, you will be notified.</p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-overview\">CERTIFICATION&rsquo;S OVERVIEW</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certification-process\">CERTIFICATION PROCESS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"certifications-benefits\">CERTIFICATIONS BENEFITS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"eligibility-requirments\">ELIGIBILITY REQUIRMENTS</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"application-payment\">APPLICATION &amp; PAYMENT</a></div>\n\n<div class=\"col-md-2 text-center\"><a href=\"complaint-process\">COMPLAINT PROCESS</a></div>', 0, 0, '', '', '', '2020-02-27 10:40:13'),
(45, 'BEST OPERATOR AWARD', '', '796150785729.jpg', '<p>Do you think you are the best machine operator associated with printing and packaging industries? How effectively you play role to reduce operational losses in the printing and packaging? Can you demonstrate how you can reduce machine downtime, job approval, materials waste and product defects?</p>\n\n<p>CPPEx Global encourage all the machine operators within the printing and packaging field to nominate themselves and colleagues for this prestigious recognition.</p>\n\n<p>We presents &ldquo;Best Machine Operator Awards&rdquo; to the skilled and competent operator in the printing, packaging and associated industries every year. This award is presented to operators in recognition of their performance in their respective fields and also to encourage healthy competition to enhance productivity and operational excellence because matching of jobs and skills is the most important issue for employers and individuals. The selection of awardees is made by a committee of experts.</p>\n\n<p>The &ldquo;Best Machine Operator Award&rdquo; honors the most successful machine operator who are working in the printing and packaging industries. The machine operator is chosen based on the individual&rsquo;s machine understanding ability, process aptitude, how operator embrace to innovative technologies and how the individual perform his job and play key role to improve productivity, reduce losses and enhance the operational excellence in extraordinary way.</p>\n\n<p>Skills recognition helps an individual to find a job or gain more responsibility at the workplace in the short-term, will it also help him or her enjoy long-term benefits, such as career progress and substantial wage gains.</p>\n\n<p>This award helps to reduce the skills shortage, improve productivity, efficiency, safety, staff motivation, identify training needs and promote the staff skills in order to increase the competitiveness and profitability of the company.</p>\n\n<p>The list of the award winner published annually in the end of the each year as well as our quarterly newsletter and CPPEx Global reserves the right to change the criteria, parameters for consideration and all other relevant provision for selection of Award from time to time.</p>\n\n<h4>AWARD CERMONY AND PUBLICITY</h4>\n\n<p>This &ldquo;Best Machine Operator Award&rdquo; is targeted to be awarded during a formal ceremony at the end of the each year. A press release or newsletter will be prepared for each Award. CPPEx Global reserves the right to change the date and location of the award ceremony, as circumstances require.</p>\n\n<h4>GENERAL CONDITIONS</h4>\n\n<p>By participating in the &ldquo;Best Machine Operator Award&rdquo; each applicant fully and unconditionally agrees to and accepts these official rules and the decisions participating in the award. For more details <a href=\"contact/index\">CONTACT US</a></p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-3 text-center\"><a href=\"award-eligibility\">AWARD ELIGIBITY</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"selection-criteria\">SELECTION CRITERIA</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"benefits-of-awards\">BENEFITS OF AWARDS</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"application-process\">APPLICATION PROCESS</a></div>\n', 0, 0, '', '', '', '2020-02-27 11:59:03'),
(46, 'AWARD ELIGIBILITY', '', '2570476593216.jpg', '<hp>The &ldquo;Best Machine Operator Award&rdquo; is open to all machine operators associated with the printing, packaging and associated industries with the following basic requirements.\n<ul>\n	<li>The participant operator must have minimum high school or technical education.</li>\n	<li>Must have an experience five years as an operator in printing, packaging and associated industries.</li>\n	<li>Must be employee of current employers for last two years and working on printing or packaging machine.</li>\n	<li>The Age limit should not be less than 25 years at the time of evaluation.</li>\n	<li>The operator&rsquo;s employer should be a corporate or associate member of the CPPEx Global.</li>\n	<li>Same candidates are eligible for this award only once in life.</li>\n</ul>\n\n<h4>CREDENTIAL</h4>\n\n<p>After the successful qualifying in the theoretical exams as well as on-site practical, machine operator will be granted an award &ldquo;Best Machine Operator Award&rdquo; plaque with certificate and cash in addition to free registration to come in the award conference and providing them opportunity to speak.</p>\n\n<h4>AWARD CERMONY AND PUBLICITY</h4>\n\n<p>This &ldquo;Best Machine Operator Award&rdquo; is targeted to be awarded during a formal ceremony at the end of the each year. A press release or newsletter will be prepared for each Award. CPPEx Global reserves the right to change the date and location of the award ceremony, as circumstances require.</p>\n\n<h4>GENERAL CONDITIONS</h4>\n\n<p>By participating in the &ldquo;Best Machine Operator Award&rdquo; each applicant fully and unconditionally agrees to and accepts these official rules and the decisions participating in the award. For more details <a href=\"contact/index\">CONTACT US</a></p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-3 text-center\"><a href=\"award-eligibility\">AWARD ELIGIBITY</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"selection-criteria\">SELECTION CRITERIA</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"benefits-of-awards\">BENEFITS OF AWARDS</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"application-process\">APPLICATION PROCESS</a></div>\n</hp>', 0, 0, '', '', '', '2020-02-27 12:16:24');
INSERT INTO `cms` (`id`, `post_title`, `short_heading`, `post_banner`, `post_description`, `displaysidebar`, `sidebar`, `meta_keyword`, `meta_title`, `meta_description`, `created_on`) VALUES
(47, 'SELECTION CRITERIA', '', '4498512038272.jpg', '<p>The selection of the awardees for &ldquo;Best Machine Operator Award&rdquo; based on two steps that proceeds under the supervision of CPPEx Global experts.</p>\n\n<ol style=\"text-align:justify;\">\n	<li>Theoretical Assessment: this is understood as a process of identifying the extent to which an awardees possesses particular knowledge, skills and competence relating to job or work area. This assessment is based on the 100 points multiple choice questions that will be according to organization manufacturing process. One or more of the following areas should be discussed in the nomination form to serve as a basis for selection of the award recipient;&nbsp;\n	<ul>\n		<li>Prepress (20 points)</li>\n		<li>Press (20 points)</li>\n		<li>Printing inks (20 points)</li>\n		<li>Printing Materials (20 points)</li>\n		<li>Health and Safety (20 points)</li>\n	</ul>\n	</li>\n	<li>On-site practical skills Assessment based on above five areas that the operator will performed in the presence of our experts on machine.</li>\n</ol>\n\n<h4>CREDENTIAL</h4>\n\n<p>After the successful qualifying in the theoretical exams as well as on-site practical, machine operator will be granted an award &ldquo;Best Machine Operator Award&rdquo; plaque with certificate and cash in addition to free registration to come in the award conference and providing them opportunity to speak.</p>\n\n<h4>AWARD CERMONY AND PUBLICITY</h4>\n\n<p>This &ldquo;Best Machine Operator Award&rdquo; is targeted to be awarded during a formal ceremony at the end of the each year. A press release or newsletter will be prepared for each Award. CPPEx Global reserves the right to change the date and location of the award ceremony, as circumstances require.</p>\n\n<h4>GENERAL CONDITIONS</h4>\n\n<p>By participating in the &ldquo;Best Machine Operator Award&rdquo; each applicant fully and unconditionally agrees to and accepts these official rules and the decisions participating in the award. For more details <a href=\"contact/index\">CONTACT US</a></p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-3 text-center\"><a href=\"award-eligibility\">AWARD ELIGIBITY</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"selection-criteria\">SELECTION CRITERIA</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"benefits-of-awards\">BENEFITS OF AWARDS</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"application-process\">APPLICATION PROCESS</a></div>\n</hp>', 0, 0, '', '', '', '2020-02-28 05:40:16'),
(48, 'BENEFITS OF AWARDS', '', '4375049432300.jpg', '<ul style=\"text-align:justify;\">\n	<li>Acknowledgement of excellence by their own organization through their support of the application.</li>\n	<li>Recognition and reward at national, regional and international levels.</li>\n	<li>Provide benchmarking support of human capitals skills matrixes to the employer with other organization.</li>\n	<li>Award winners are provided with a unique opportunity to attend the international awards celebrations each year and network with other applicants from across the globe.</li>\n	<li>Local, national, regional and global publicity of award winners as well as concerning employers in the magazines, CPPEx Global website and annual report.</li>\n	<li>Enhance motivation of employee to be better and strive for higher achievements, enhance productivity, loyalty for the employer.</li>\n	<li>Happy employees are more productive. Being recognized gives your staff the feeling of job mastery and that they are a great fit for their role and valuable resource for the company.</li>\n	<li>Another benefit of employee recognition in the workplace is that it can be the foundation of cultivating a culture of self-improvement.</li>\n	<li>One of the best ways for staff recognition is to provide them with opportunities to learn and make themselves better at what they do.</li>\n	<li>Same candidates are eligible for this award only once in life.</li>\n</ul>\n\n<h4>CREDENTIAL</h4>\n\n<p>After the successful qualifying in the theoretical exams as well as on-site practical, machine operator will be granted an award &ldquo;Best Machine Operator Award&rdquo; plaque with certificate and cash in addition to free registration to come in the award conference and providing them opportunity to speak.</p>\n\n<h4>AWARD CERMONY AND PUBLICITY</h4>\n\n<p>This &ldquo;Best Machine Operator Award&rdquo; is targeted to be awarded during a formal ceremony at the end of the each year. A press release or newsletter will be prepared for each Award. CPPEx Global reserves the right to change the date and location of the award ceremony, as circumstances require.</p>\n\n<h4>GENERAL CONDITIONS</h4>\n\n<p>By participating in the &ldquo;Best Machine Operator Award&rdquo; each applicant fully and unconditionally agrees to and accepts these official rules and the decisions participating in the award. For more details <a href=\"contact/index\">CONTACT US</a></p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-3 text-center\"><a href=\"award-eligibility\">AWARD ELIGIBITY</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"selection-criteria\">SELECTION CRITERIA</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"benefits-of-awards\">BENEFITS OF AWARDS</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"application-process\">APPLICATION PROCESS</a></div>\n</hp>', 0, 0, '', '', '', '2020-02-28 05:47:05'),
(49, 'APPLICATION PROCESS', '', '3555125840320.jpg', '<p>The applicant must meet the following requirements before submission of the application.</p>\n\n<ul>\n	<li>Corporate/Associate membership to the CPPEx Global</li>\n	<li>Online application submission with correct information</li>\n	<li>Letter of approval from employer executives or HR managements.</li>\n</ul>\n\n<p>Application to nomination of the awardees for &ldquo;Best Machine Operator Award&rdquo; proceed as per below schedule that subjected to be change at discretion of the CPPEx Global Management.</p>\n\n<p><img alt=\"Application process\" src=\"http://project.cyphersol.com/cpxglobal/uploads/cmsimage/1530403484855.png\" /></p>\n\n<h4>AWARD CERMONY AND PUBLICITY</h4>\n\n<p>This &ldquo;Best Machine Operator Award&rdquo; is targeted to be awarded during a formal ceremony at the end of the each year. A press release or newsletter will be prepared for each Award. CPPEx Global reserves the right to change the date and location of the award ceremony, as circumstances require.</p>\n\n<h4>GENERAL CONDITIONS</h4>\n\n<p>By participating in the &ldquo;Best Machine Operator Award&rdquo; each applicant fully and unconditionally agrees to and accepts these official rules and the decisions participating in the award.<br />\nFor more details <a href=\"contact/index\">CONTACT US</a></p>\n\n<p>&nbsp;</p>\n\n<div class=\"col-md-3 text-center\"><a href=\"award-eligibility\">AWARD ELIGIBITY</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"selection-criteria\">SELECTION CRITERIA</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"benefits-of-awards\">BENEFITS OF AWARDS</a></div>\n\n<div class=\"col-md-3 text-center\"><a href=\"application-process\">APPLICATION PROCESS</a></div>\n', 0, 0, '', '', '', '2020-02-28 06:03:53'),
(50, 'DONATE', 'I LOVE IT', '2804241626494.jpg', '<p>PLEASE DONATE FOR THE ORG</p>\n', 0, 0, '', '', '', '2020-03-05 15:38:34'),
(51, 'DONATE', 'I LOVE IT', '2455888668189.jpg', '<p>PLEASE DONATE FOR THE ORG</p>\n', 0, 0, '', '', '', '2020-03-05 15:38:59'),
(52, 'History', '', '583615416912.jpg', '<h4 style=\"text-align:center;\">CPPEX GLOBAL IN THE COURSE OF TIME<img alt=\"\" src=\"http://project.cyphersol.com/cpxglobal/uploads/cmsimage/1239976819674.jpg\" style=\"width: 100%;\" /></h4>\n', 0, 0, '', '', '', '2020-03-31 09:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `amount`, `status`, `created_on`) VALUES
(1, '5963', 50, 0, '2018-11-27 23:21:33'),
(2, 'BOOKNOW', 40, 1, '2018-11-27 23:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `customerdata`
--

CREATE TABLE `customerdata` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `participants_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recomended` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customerdata`
--

INSERT INTO `customerdata` (`id`, `company_name`, `business`, `participants_name`, `designation`, `phone`, `mobile`, `email`, `city`, `country`, `recomended`, `description`, `created_on`) VALUES
(1, 'cyphersol', 'Software development', 'Waseem', 'ceo', '03417090031', '03417090031', 'farrukh.firstwebsol@gmail.com', 'lahore', 'pakistan', 'imran ', '<p>Lorem ipsum dummy text</p>', '2020-03-11 15:35:42'),
(9, 'ABC', 'Training', 'Ashfaq', 'PR', '966551619623', '966551619623', 'ashfaqstar2008@hotmail.com', 'Riyadh', 'KSA', 'Linkedin', '<p>This is contact number from old list</p>', '2020-04-05 17:44:50'),
(10, 'CPPEx Global', 'trainign', 'Sajid', 'leader', '03008464155', '03008464155', 'mashfaqstar2008@hotmail.com', 'Lahore', 'Pakistan', 'Linkedin', '<p>This is contact number from old list</p>', '2020-04-05 17:46:07'),
(11, 'abcd', 'printing', 'Zeinab', 'Office Manager', '03008464155', '03008464155', 'z.hayek@cppexglobal.org', 'Riyadh', 'KSA', 'Linkedin', '<p>This is contact number from old list</p>', '2020-04-05 17:53:43'),
(12, 'XYZ', 'BOOK', 'SAJID', 'Sales Manager', '551619623', '551619623', 'm.sajid@cppexglobal.org', 'Riyadh', 'Pakistan', 'Linkedin', '<p>This is contact number from old list</p>', '2020-04-05 17:54:15'),
(13, 'xyz', 'CPPEx GLOBAL', 'Sajjad Anwar', 'sales', '923008464155', '923008464155', 'm.sajid@cppexglobal.org', 'Lahore', 'Pakistan', 'Linkedin', '<p>This is contact number from old list</p>', '2020-04-05 17:54:54'),
(14, 'yyyyqz', 'packaging', 'Arshad', 'aa', 'aa', 'aa', 'info@cppexglobal.org', 'Riyadh', 'Pakistan', 'Linkedin', '<p>This is contact number from old list</p>', '2020-04-05 17:56:48'),
(15, 'test email', 'test businuss', 'arslan khan', 'Dev', '3242342342', '432424324', 'arslan.dev231@gmail.com', 'dasdasda', 'dasdsad', 'asdsadas', '<p>hello g jsag jhg jtest data data</p>', '2020-04-10 11:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `title`, `price`, `group_id`, `status`) VALUES
(1, 'Clean Inside Cabinet', 20, 1, 1),
(2, 'clean inside the fridge', 20, 1, 1),
(3, 'clean inside the oven', 20, 1, 1),
(4, 'clean interior', 20, 1, 1),
(5, 'Finished Basement', 60, 1, 1),
(6, 'Green Cleaning', 30, 1, 1),
(7, 'One hour of organisation', 40, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `extras_group`
--

CREATE TABLE `extras_group` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'selectbox,checkbox',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `extras_group`
--

INSERT INTO `extras_group` (`id`, `title`, `type`, `status`) VALUES
(1, 'Adds extra time', 'checkbox', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq_cat`
--

CREATE TABLE `faq_cat` (
  `id` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `homeboxes`
--

CREATE TABLE `homeboxes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'noimg.png',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeboxes`
--

INSERT INTO `homeboxes` (`id`, `title`, `description`, `url`, `image`, `created_on`, `status`, `category`) VALUES
(1, 'Why CPPEx Global', 'WHY JOIN LEARN', 'why', 'd28cbe87f26d080d7eb7e63bf892e642.png', '2020-02-22 16:50:50', 1, 'WHO WE ARE?'),
(3, 'Mission & Vision', '<p>MISSION & VISION</p>', 'mission', '867119f1cdda73afc55f50daf9945718.jpg', '2020-03-16 11:16:13', 1, 'WHO WE ARE?'),
(4, 'History', '<p>HISTORY</p>', 'history', 'd5f75cdbba304ff36937afeee85948ef.jpg', '2020-03-16 11:19:38', 1, 'WHO WE ARE?'),
(5, 'Our Team', '<section id=\"sub-header\">\r\n<h1>OUR TEAM</h1>\r\n</section>', 'team', 'c734a0ebff1d3d0fb6780bafa7050b17.jpg', '2020-03-16 11:23:12', 1, 'WHO WE ARE?'),
(6, 'Our Global Presence', '<p>OUR GLOBAL PRESENCE </p>', 'contact', '155e7f56f2f52ad71c18ff7a25563f75.jpg', '2020-03-16 11:28:30', 1, 'WHO WE ARE?'),
(8, 'Cylinder Quality Management', '<section id=\"sub-header\">\r\n<h1 id=\"title\">CYLINDER QUALITY MANAGEMENT</h1>\r\n</section>', 'cylinder-quality-management', '85bdf6158e2b50fc32fd270d1bc9f762.jpg', '2020-03-16 11:52:49', 1, 'TRAINING'),
(9, 'Doctor Blade Print Management', '<p>Doctor Blade Print Management</p>', 'doctor-blade-print-management', '9ac8c338197ac9af649a21f0b2b6d663.jpg', '2020-03-16 12:00:57', 1, 'TRAINING'),
(10, 'Eco-Printing', '<p>Eco-Printing by Pollution Prevention</p>', 'eco-printing-by-pollution-prevention', '9a704d14c75c036eae58282a8ad66906.jpg', '2020-03-16 12:04:24', 1, 'TRAINING'),
(11, 'Effective Colors Management', '<p>Effective Colors Management</p>', 'effective-colors-management', '4a7ec43320070171816c77c37b3551ca.jpg', '2020-03-16 12:09:42', 1, 'TRAINING'),
(12, 'Effective Lean Manufacturing', '<p>Effective Lean Manufacturing</p>', 'excellence-in-lean-print-manufacturing', 'b1f9e5f2432c67d91e4ec61a8a260315.jpg', '2020-03-16 12:12:07', 1, 'TRAINING'),
(13, 'Excellence Flexographic Printing', '<p>Excellence Flexographic Printing</p>', 'excellence-in-flexographic-printing', 'ff11577813a298c63049e65da3fcbd73.jpg', '2020-03-16 12:14:14', 1, 'TRAINING'),
(14, 'Excellence in offset Printing', '<p>Excellence in offset Printing</p>', 'excellence-in-offset-printing', 'd9cca0ed859bfaf233a55f3aadcd2d0f.jpg', '2020-03-16 12:18:46', 1, 'TRAINING'),
(15, 'Excellence Rotogravure Printing', '<p>Excellence Rotogravure Printing</p>', 'excellence-in-gravure-printing', 'c6a8dd85572a78b15476ede4e40d815c.jpg', '2020-03-16 12:20:21', 1, 'TRAINING'),
(16, 'Flexo Plate Quality Management', '<p>Flexo Plate Quality Management</p>', 'flexoplate-quality-management', '2c4c9cd2dca7c878cb6cc85ce77c42d6.jpg', '2020-03-16 12:23:14', 1, 'TRAINING'),
(17, 'Food Safety & Packaging Materials', '<p>Food Safety &amp; Packaging Materials</p>', 'food-safety-packaging-materials', 'deecce8a8a2b02b4cd432837ca25b781.jpg', '2020-03-16 12:24:55', 1, 'TRAINING'),
(18, 'Graphic Design for non-Designer', '<p>Graphic Desig for non-Designer</p>', 'graphic-design-for-non-designer', '40d4146fac8603015e81c2375b58e54a.jpg', '2020-03-16 12:27:44', 1, 'TRAINING'),
(19, 'Hazardous Chemicals Management', '<p>Hazardous Chemicals Management</p>', 'hazardous-chemicals-management', '307fdc79dbb14e2f3e838013c02ac6dc.jpg', '2020-03-16 12:42:20', 1, 'TRAINING'),
(20, 'Paper Quality Management', '<p>Paper Quality Management</p>', 'paper-quality-management', '86af9d16b0b6626fb34fa7d9a9746996.jpg', '2020-03-16 12:44:21', 1, 'TRAINING'),
(21, 'Prepress & Packaging Design', '<p>Prepress &amp; Packaging Design</p>', 'prepress-and-packaging-design', 'f5a4289377f224946e80b8a4667034c9.jpg', '2020-03-16 12:45:53', 1, 'TRAINING'),
(22, 'Print Automation and Digitalization', '<p>Print Automation and Digitalization</p>', 'print-automation-and-digitalization', 'ac5b1b4a04e0f3bd3c685320dc95f8f2.jpg', '2020-03-16 12:47:32', 1, 'TRAINING'),
(23, 'Print Quality Management', '<p>Print Quality Management</p>', 'print-quality-management', '8b0f94b969ed9b2bb2616d21d057a8b3.jpg', '2020-03-16 12:49:34', 1, 'TRAINING'),
(24, 'Process & Equipment Validation', '<p>Printing Process &amp; Equipment Validation</p>', 'printing-process-equipment-validation', '5679bc216c370bb077b7f8d2bc9e5d1d.jpg', '2020-03-16 12:51:49', 1, 'TRAINING'),
(25, 'UHT Processing & Packaging', '<p>UHT Processing and Aseptic Packaging</p>', 'uht-processing-and-aseptic-packaging', '553b573d7ef0a402252c510c9878bc56.jpg', '2020-03-16 12:53:30', 1, 'TRAINING'),
(26, 'Business Development', '<p>Business Development</p>', 'business-development', '6f53d5dc6c9117f3d99059befbec19c1.jpg', '2020-03-16 13:00:49', 1, 'CONSULTING'),
(27, 'New Product Development', '<p>New product development</p>', 'product-development', '023eddf1a2537ef59dbc555072297ee9.jpg', '2020-03-16 13:04:19', 1, 'CONSULTING'),
(28, 'Business Innovation', '<p>Business innovation..</p>', 'business-innovation', '51218978a3d9c296c5d875b4728909d1.jpg', '2020-03-16 13:06:30', 1, 'CONSULTING'),
(29, 'Process Optimization', '<p>process optimization</p>', 'process-optimization', '17fce8f86d25f00c97c72d41dbbc0b9d.jpg', '2020-03-16 13:09:57', 1, 'CONSULTING'),
(30, 'Market Analysis', '<p>Market analysis</p>', 'markete-analysis', '8c1d2365a6811d4b8bf890afa099dbfe.jpg', '2020-03-16 13:11:46', 1, 'CONSULTING'),
(31, 'Certification Overview', '<p>CERTIFICATION OVERVIEW</p>', 'certifications-overview', '1acc0c0e99697ba6cb72545122856a97.jpg', '2020-03-16 13:18:53', 1, 'CERTIFICATIONS'),
(32, 'Certification Process', '<section id=\"sub-header\">\r\n<h1 id=\"title\">CERTIFICATION PROCESS</h1>\r\n</section>', 'certification-process', '29e963acf61bf7bb7f9a64affa9457e3.jpg', '2020-03-16 13:19:42', 1, 'CERTIFICATIONS'),
(33, 'Certifications Benefits', '<p>Certifications Benefits</p>', 'certifications-benefits', 'd5c27b42e4644a62e6003aabe09a58f7.jpg', '2020-03-16 13:21:27', 1, 'CERTIFICATIONS'),
(34, 'Eligibility Requirements', '<p>eligibility-requirments</p>', 'eligibility-requirments', 'f286e992db48b2ddd2bea8dd99538bfd.jpg', '2020-03-16 13:28:27', 1, 'CERTIFICATIONS'),
(35, 'Application Payment', '<p>application-payment</p>', 'application-payment', 'af10d5317c61eacda3cbf3f7401bbce6.jpg', '2020-03-16 13:36:55', 1, 'CERTIFICATIONS'),
(36, 'Complaint Process', '<p>complaint-process</p>', 'complaint-process', '9aa4c931e3d5edb804c46e9e7f5ce50f.jpg', '2020-03-16 13:40:30', 1, 'CERTIFICATIONS'),
(37, 'Best Machine Operator Award', '<p>Best Machine Operator Award</p>', 'best-machine-operator-award', '129766ae8601ae4ef4782a9321b5eb82.jpg', '2020-03-17 05:31:39', 1, 'AWARDS'),
(38, 'Award Eligibility', '<p>award-eligibility</p>', 'award-eligibility', 'd57e99291572f36825c4bfdd90dbacbc.jpg', '2020-03-17 05:36:34', 1, 'AWARDS'),
(39, 'Selection Criteria', '<p>selection-criteria</p>', 'selection-criteria', '3a1856ec2e742a3ea7ecb6f730765f42.jpg', '2020-03-17 05:39:08', 1, 'AWARDS'),
(41, 'Application Process', '<p>application-process</p>', 'application-process', '264587e4a8a9f110f88b677d49e8e2ca.jpg', '2020-03-17 05:45:57', 1, 'AWARDS'),
(42, 'Gallery 2018', '<p>Gallery 2018</p>', 'GalleryYear/view/2018', '1188db3e093aa4a04111b01c0b2093c7.jpg', '2020-03-17 05:49:57', 1, 'GALLARY'),
(43, 'Gallery 2019', '<p>Gallery 2019</p>', 'GalleryYear/view/2019', '3d2b7a1e5ed18d7b06bf9605bb224427.jpg', '2020-03-17 05:50:42', 1, 'GALLARY'),
(45, 'Membership List', '<p>Bisphenol A and European Legislation</p>', 'membership_List', 'bbac0414a234f407862e714827845f66.jpg', '2020-03-17 05:57:45', 1, 'MEMBERSHIP'),
(46, 'Membership categories', '<p>Doctor Blade and Uniform Ink Metering</p>', 'membership-categories', 'd284121cfdb43b91bc0f48c040a4f844.jpg', '2020-03-17 06:00:05', 1, 'MEMBERSHIP'),
(47, 'Membership benefits', '<p>Food Contact Materials Guidelines</p>', 'membership-benefits', 'd480c8de424d73b0adc94afe18f385f6.png', '2020-03-17 06:02:53', 1, 'MEMBERSHIP'),
(48, 'Why CPPex membership', '<p>Introduction to Cylinder Engraving</p>', 'why-membership', '77274fdce30e7c3216aaf01fc3b9a6de.jpg', '2020-03-17 06:05:32', 1, 'MEMBERSHIP'),
(49, 'Faqs', '<p>s</p>', 'faq', 'fbc07fb184f72e0d1e95f7a69b6e286b.jpg', '2020-04-13 17:43:49', 1, 'WHO WE ARE?');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suite_apt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8_unicode_ci,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `formatted_address` text COLLATE utf8_unicode_ci,
  `zoom` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) UNSIGNED NOT NULL,
  `from_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `from_uname` varchar(225) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to_uname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `message_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `message_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` tinyint(1) NOT NULL DEFAULT '0',
  `message_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_description` text COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image',
  `video_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.mp4',
  `thumbnail` varchar(244) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `post_title`, `post_description`, `post_date`, `post_type`, `video_url`, `thumbnail`, `user_id`, `slug_id`, `created_on`, `category`) VALUES
(1, 'Sun Chemical owner to buy BASF pigments business', '<p><strong>DIC Corporation is to acquire BASF&rsquo;s global pigments business and integrate it into subsidiary<br />\r\nSun Chemical in a deal worth &euro;1.15bn (&pound;1.04bn).</strong></p>\r\n\r\n<p>The deal follows conversations that began when German chemical giant BASF declared its intent to sell BASF Colors &amp; Effects (BCE) and has now been officially&nbsp; agreed with the Japanese conglomerate. It is<br />\r\nexpected to be completed in Q4.<br />\r\nIn taking on BCE, DIC will grow its portfolio of pigments, which at the moment are largely produced by<br />\r\nSun Chemical, with a range of products for electronic displays, cosmetics, coatings, plastics, inks and<br />\r\nspeciality applications. The deal will put DIC in charge of more than 30 pigment production facilities<br />\r\naround the world.<br />\r\nA spokesperson for Sun Chemical told PrintWeek: &ldquo;The acquisition of BCE brings together the<br />\r\ncomplementary resources and expertise of two recognised leaders in innovation, product stewardship,<br />\r\nregulatory leadership, application support and manufacturing.<br />\r\n&ldquo;The move improves DIC&rsquo;s pigment footprint in Europe and underscores our commitment to delivering<br />\r\nsolutions tailored to meet the needs of our customers. It also allows us to compete in the global<br />\r\nmarketplace more effectively going forward.<br />\r\n&ldquo;Sun Chemical is committed to ensuring a smooth transition, with limited to no impact on customers. In<br />\r\nthe immediate future, business for customers will remain the same as usual. A transition team will be put<br />\r\nin place to ensure a smooth transition for customers and employees by the expected closing date.&rdquo;<br />\r\nAcquiring BCE is part of an ongoing drive at DIC to increase its sales to the &euro;8bn (&pound;7.25bn) mark by 2025.<br />\r\nWith its Sun Chemical business, based out of New Jersey, US, the group currently turns over around<br />\r\n$7.5bn (&pound;6.16bn) and employs more than 20,000 people worldwide.<br />\r\nThe acquisition remains subject to regulatory approval, with White &amp; Case serving as legal counsel and<br />\r\nMorgan Stanley as financial advisor to</p>\r\n', '', 'image', '', '', 0, 55, '2020-04-02 13:15:05', 'World'),
(2, 'SILCO- Coating Additives', '<p>Dispersants, flow-leveling and wetting additives, slip and antifoam additives</p>\r\n\r\n<p><strong>ILCO additives for optimised coating systems</strong></p>\r\n\r\n<p>Silcona GmbH &amp; Co. KG is focused on the development, production and marketing of innovative high<br />\r\nperformance additives for environmentally friendly coating systems. Silcona is serving the coatings<br />\r\nand graphic arts industries with a cornucopia of tailor made and highly efficient additives by the<br />\r\nfollowing brands:</p>\r\n\r\n<p><strong>SILCO SPERSE</strong></p>\r\n\r\n<p>APEO-free high performance dispersants for water based and solvent based coating systems</p>\r\n\r\n<p><strong>SILCO FLW</strong></p>\r\n\r\n<p>flow and levelling additives for various coating systems</p>\r\n\r\n<p><strong>SILCO GLIDE</strong></p>\r\n\r\n<p>high molecular silicone based slip additives</p>\r\n\r\n<p><strong>SILCO WET</strong></p>\r\n\r\n<p>wetting additives for pigment and substrate wetting</p>\r\n\r\n<p><strong>SILCO PHOBE</strong></p>\r\n\r\n<p>hydrophobing additives for construction materials</p>\r\n\r\n<p><strong>SILCO AF</strong></p>\r\n\r\n<p>antifoam additives for pigment grinding, inks and coating systems</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'image', '', '', 0, 56, '2020-04-02 13:20:26', 'Technology'),
(3, 'Industrial Wax Market Worth $12,556.8 Million by 2026: PMR', '<p>The estimated value of the industrial wax market in 2018 was $8,860.8 million.</p>\r\n\r\n<p>According to a study analysis by Persistence Market Research, ever-expanding end-use industries will give a push to the industrial<br />\r\nwax market. Further, strategic developments across regions will influence the global market between 2018 and 2026.<br />\r\nThe estimated value of the industrial wax market in 2018 is $8,860.8 million, which is expected to expand at a CAGR of 4.5% and reach<br />\r\n$12,556.8 million by the end of 2026. Also, the industrial wax market is projected to create incremental monetary opportunity worth<br />\r\n$3,696 million during the forecast period.<br />\r\nHuge demand from end-use sectors will create favorable macroeconomic environment for the global industrial wax market. In the last<br />\r\ncouple of years, there is a significant growth in the end use industries such as, in petrochemical industry, including pharmaceuticals,<br />\r\ncosmetics and plastics industries across the world, this growth is expected to create key driver for the industrial wax market in the<br />\r\ncoming future.</p>\r\n\r\n<p>Significant growth in the global economy, acquisitions and joint ventures are likely to become a more frequent industry phenomenon in</p>\r\n\r\n<p>the region. Key players from end use industries are looking forward to gain increasing incremental monetary opportunity from the</p>\r\n\r\n<p>business portfolios and also to gain market share in terms of volume and value by entering into strategic partnerships. As a result, the<br />\r\nglobal industrial wax market is estimated to witness healthy growth over the forecast period.<br />\r\nThe global industrial wax market is estimated to grow and become 1.4X during the forecast period due to the expected growth in<br />\r\npackaging, adhesive &amp; sealant sectors.<br />\r\nBy region, Western Europe, followed by North America, is projected to dominate the global industrial wax market over the forecast<br />\r\nperiod. Moreover, China is estimated to remain the most opportunistic region in South East Asia industrial wax market. In terms of<br />\r\nvalue, China is projected to create incremental monetary opportunity worth $800 million in the global industrial wax market during the<br />\r\nforecast period.</p>\r\n\r\n<p>By application, the packaging segment is expected to dominate the industrial wax market, with a value of $1,500 million in 2018.<br />\r\nThe adhesive &amp; sealant segment is projected to account for 15.4% of the market value share in the global industrial wax market during<br />\r\nthe forecast period. In terms of growth, the pharmaceutical segment is projected to grow at a sluggish growth rate as compared to the<br />\r\npackaging segment in the global industrial wax market during the latter half of the forecast period.<br />\r\nBy type, the fossil based segment is projected to dominate the global industrial wax market over the forecast period. In terms of volume,<br />\r\nthe fossil based segment is expected to hold approximately two-third of the market share in 2018 and is expected to dominate the<br />\r\nindustrial wax market throughout the forecast period. In terms of incremental monetary opportunity, the segment is expected to create<br />\r\nopportunity worth $2,200 million between 2018 and 2026. Also, synthetic based segment, is estimated to hold more than one tenth of<br />\r\nmarket share in terms of value and volume in the global industrial wax market.</p>\r\n', '', 'image', '', '', 0, 57, '2020-04-02 14:11:13', 'Technology'),
(4, 'EuPIA Updates Suitability List of Photoinitiators, Photosynergists for Food Contact Materials', '<p>The European Printing Ink Association ( <strong style=\"color:#2eb2ff;\">EuPIA</strong> ) updated its <strong style=\"color:#2eb2ff;\">Suitability List of Photoinitiators and<br />\r\nPhotosynergists for Food Contact Materials</strong> which identifies the suitability of photoinitiators and<br />\r\nphotosynergists for use in printed food contact materials, such as coatings, inks and varnishes for the<br />\r\nnon-contact side of food packaging.</p>\r\n\r\n<p>The list acts as part of EuPIA&rsquo;s industry product stewardship program for brand owners and printers<br />\r\nand provides a guideline of recommended raw materials that are deemed suitable for printing on<br />\r\nsensitive product packaging, including food-safe products.<br />\r\nThe Suitability List has been revised and adjusted to reflect changes in permitted migration limits and<br />\r\nto remove previously listed materials which have become subject to EuPIA&rsquo;s Exclusion Policy<br />\r\nfollowing their hazard reclassification as part of the REACH registration process. The list, which<br />\r\npreviously featured three tables, now has a simplified format and has been reduced to just one table,<br />\r\nwith more succinct definitions and descriptions.<br />\r\nEuPIA advises that in all cases the recommended materials should only be considered as suitable for<br />\r\nuse if their performance in inks and varnishes meets the migration limits defined in Annex 10 of the<br />\r\nSwiss Packaging Inks Ordinance (SR 817.023.21) 01.05.2017 and that any Non-Intentionally Added<br />\r\nSubstances (NIAS) present can be proven to migrate below the level deemed to be acceptable for<br />\r\nthat material, based on EuPIA Guidance for Risk Assessment of Non-Intentionally Added Substances<br />\r\n(NIAS) and Non-Listed Substances (NLS) in printing inks for food contact materials. Furthermore, the<br />\r\nfinal measurement of migration compliance is the responsibility of the printer, in line with recognized<br />\r\nconverters&rsquo; good manufacturing practices, and the end-user.<br />\r\n&ldquo;&#39;Suitability List of Photoinitiators and Photosynergists for Food Contact Materials&#39;&rdquo; forms part of<br />\r\nEuPIA&rsquo;s product stewardship approach as an industry,&quot; said Dr. Martin Kanert, EuPIA&rsquo;s executive<br />\r\nmanager. &quot;By providing this updated, standardized set of guidelines, our intention is to support brand<br />\r\nowners and printers by giving them peace of mind that they are complying with industry standards<br />\r\nand ensuring that their packaging is ultimately safe for end-users.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'image', '', '', 0, 58, '2020-04-02 14:17:27', 'World'),
(5, 'Intake of Dairy Milk Is Associated With a Greater Risk of Breast Cancer in Women', '<p align=\"center\" style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;\r\nmargin-left:0cm;text-align:center;line-height:115%;background:white\"><b><span arial=\"\" style=\"font-family:\">Intake of Dairy Milk Is Associated With a Greater Risk of Breast Cancer in Women</span></b></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">Dairy, soy and risk of breast cancer: Those confounded milks, published in the&nbsp;<em><span helvetica=\"\" style=\"font-family:\r\n\">International Journal of Epidemiology</span></em>, found that even relatively moderate amounts of dairy milk consumption can increase women&#39;s risk of breast cancer -- up to 80% depending on the amount consumed.</span></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">First author of the paper, Gary E. Fraser, MBChB, PhD, said the observational study gives &quot;fairly strong evidence that either dairy milk or some other factor closely related to drinking dairy milk is a cause of breast cancer in women.</span></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">&quot;Consuming as little as 1/4 to 1/3 cup of dairy milk per day was associated with an increased risk of breast cancer of 30%,&quot; Fraser said. &quot;By drinking up to one cup per day, the associated risk went up to 50%, and for those drinking two to three cups per day, the risk increased further to 70% to 80%.&quot;</span></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">Current U.S. Dietary guidelines recommend three cups of milk per day. &quot;Evidence from this study suggests that people should view that recommendation with caution,&quot; Fraser said.</span></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">Dietary intakes of nearly 53,000 North American women were evaluated for the study, all of whom were initially free of cancer and were followed for nearly eight years. Dietary intakes were estimated from food frequency questionnaires (FFQ), also repeated 24 hour recalls, and a baseline questionnaire had questions about demographics, family history of breast cancer, physical activity, alcohol consumption, hormonal and other medication use, breast cancer screening, and reproductive and gynecological history.</span></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">By the end of the study period, there were 1,057 new breast cancer cases during follow-up. No clear associations were found between soy products and breast cancer, independent of dairy. But, when compared to low or no milk consumption, higher intakes of dairy calories and dairy milk were associated with greater risk of breast cancer, independent of soy intake. Fraser noted that the results had minimal variation when comparing intake of full fat versus reduced or nonfat milks; there were no important associations noted with cheese and yogurt.</span></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">&quot;However,&quot; he said, &quot;dairy foods, especially milk, were associated with increased risk, and the data predicted a marked reduction in risk associated with substituting soymilk for dairy milk. This raises the possibility that dairy-alternate milks may be an optimal choice.&quot;</span></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">A hazardous effect of dairy is consistent with the recent AHS-2 report suggesting that vegans but not lacto-ovo-vegetarians experienced less breast cancer than non-vegetarians.</span></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">Fraser said the possible reasons for these associations between breast cancer and dairy milk may be the sex hormone content of dairy milk, as the cows are of course lactating, and often about 75% of the dairy herd is pregnant. Breast cancer in women is a hormone-responsive cancer. Further, intake of dairy and other animal proteins in some reports is also associated with higher blood levels of a hormone, insulin-like growth factor-1 (IGF-1), which is thought to promote certain cancers.</span></p>\r\n\r\n<p style=\"margin-top:0cm;margin-right:0cm;margin-bottom:7.5pt;margin-left:0cm;\r\ntext-align:justify;background:white\"><span helvetica=\"\" style=\"font-size:10.5pt;font-family:\r\n\">&quot;Dairy milk does have some positive nutritional qualities,&quot; Fraser said, &quot;but these need to be balanced against other possible, less helpful effects.&nbsp;</span></p>\r\n', '', 'image', '', '', 0, 67, '2020-04-04 13:38:26', 'Technology'),
(6, 'Coronavirus: New York reaches highest death toll in single day | Nine News Australia', '', '', 'embed url', 'https://www.youtube.com/watch?v=Gdg24_HHXrA', 'http://i3.ytimg.com/vi/Gdg24_HHXrA/default.jpg', 0, 68, '2020-04-04 13:43:35', 'World'),
(7, 'New York City Has Nearly 1 In 4 Of All COVID-19 Cases in US | NBC Nightly News', '<h1 class=\"title style-scope ytd-video-primary-info-renderer\" style=\"margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); display: block; max-height: 4.8rem; overflow: hidden; font-weight: 400; line-height: 2.4rem; color: var(--ytd-video-primary-info-renderer-title-color, var(--yt-spec-text-primary)); font-family: Roboto, Arial, sans-serif; font-size: var(--ytd-video-primary-info-renderer-title-font-size, var(--yt-navbar-title-font-size, inherit)); font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: ; font-variant-east-asian: ; transform: var(--ytd-video-primary-info-renderer-title-transform, none); text-shadow: var(--ytd-video-primary-info-renderer-title-text-shadow, none); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><yt-formatted-string class=\"style-scope ytd-video-primary-info-renderer\" force-default-style=\"\" style=\"word-break: break-word;\">New York City Has Nearly 1 In 4 Of All COVID-19 Cases in US | NBC Nightly News</yt-formatted-string></h1>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=Xxqq8nLYqdY', 'http://i3.ytimg.com/vi/Xxqq8nLYqdY/default.jpg', 0, 69, '2020-04-04 13:45:00', 'Science'),
(8, 'New York City Has Nearly 1 In 4 Of All COVID-19 Cases in US | NBC Nightly News', '<h1 class=\"title style-scope ytd-video-primary-info-renderer\" style=\"margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); display: block; max-height: 4.8rem; overflow: hidden; font-weight: 400; line-height: 2.4rem; color: var(--ytd-video-primary-info-renderer-title-color, var(--yt-spec-text-primary)); font-family: Roboto, Arial, sans-serif; font-size: var(--ytd-video-primary-info-renderer-title-font-size, var(--yt-navbar-title-font-size, inherit)); font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: ; font-variant-east-asian: ; transform: var(--ytd-video-primary-info-renderer-title-transform, none); text-shadow: var(--ytd-video-primary-info-renderer-title-text-shadow, none); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><yt-formatted-string class=\"style-scope ytd-video-primary-info-renderer\" force-default-style=\"\" style=\"word-break: break-word;\">New York City Has Nearly 1 In 4 Of All COVID-19 Cases in US | NBC Nightly News</yt-formatted-string></h1>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=Xxqq8nLYqdY', 'http://i3.ytimg.com/vi/Xxqq8nLYqdY/default.jpg', 0, 70, '2020-04-04 13:45:04', 'Science'),
(9, 'The future of packaging', '<h1 class=\"title style-scope ytd-video-primary-info-renderer\" style=\"margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); display: block; max-height: 4.8rem; overflow: hidden; font-weight: 400; line-height: 2.4rem; color: var(--ytd-video-primary-info-renderer-title-color, var(--yt-spec-text-primary)); font-family: Roboto, Arial, sans-serif; font-size: var(--ytd-video-primary-info-renderer-title-font-size, var(--yt-navbar-title-font-size, inherit)); font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: ; font-variant-east-asian: ; transform: var(--ytd-video-primary-info-renderer-title-transform, none); text-shadow: var(--ytd-video-primary-info-renderer-title-text-shadow, none); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><yt-formatted-string class=\"style-scope ytd-video-primary-info-renderer\" force-default-style=\"\" style=\"word-break: break-word;\">The future of packaging</yt-formatted-string></h1>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=KVVnKozGWuo', 'http://i3.ytimg.com/vi/KVVnKozGWuo/default.jpg', 0, 71, '2020-04-04 13:49:55', 'Science'),
(10, 'Bosch Packaging Technology, Inc.', '<h1 class=\"title style-scope ytd-video-primary-info-renderer\" style=\"margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); display: block; max-height: 4.8rem; overflow: hidden; font-weight: 400; line-height: 2.4rem; color: var(--ytd-video-primary-info-renderer-title-color, var(--yt-spec-text-primary)); font-family: Roboto, Arial, sans-serif; font-size: var(--ytd-video-primary-info-renderer-title-font-size, var(--yt-navbar-title-font-size, inherit)); font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: ; font-variant-east-asian: ; transform: var(--ytd-video-primary-info-renderer-title-transform, none); text-shadow: var(--ytd-video-primary-info-renderer-title-text-shadow, none); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><yt-formatted-string class=\"style-scope ytd-video-primary-info-renderer\" force-default-style=\"\" style=\"word-break: break-word;\"></yt-formatted-string><font face=\"Roboto,Arial,sans-serif\"><font size=\"6\"><font style=\"background-color: rgb(249, 249, 249);\">Bosch Packaging Technology, Inc.</font></font></font></h1>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=LbxXpP9ysjo', 'http://i3.ytimg.com/vi/LbxXpP9ysjo/default.jpg', 0, 72, '2020-04-04 13:51:52', 'World'),
(11, 'Nestle CEO: We\'re committed to recyclable packaging by 2025', '<p><font style=\"background-color:#ffffff\">Nestle CEO: We&#39;re committed to recyclable packaging by 2025</font></p>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=PUZhL-9xWwE', 'http://i3.ytimg.com/vi/PUZhL-9xWwE/default.jpg', 0, 73, '2020-04-04 14:14:28', 'Science'),
(12, 'The market has not reached a bottom yet but we\'re going down at a slower rate: Economist El-Erian', '<h1 class=\"title style-scope ytd-video-primary-info-renderer\" style=\"margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); display: block; max-height: 4.8rem; overflow: hidden; font-weight: 400; line-height: 2.4rem; color: var(--ytd-video-primary-info-renderer-title-color, var(--yt-spec-text-primary)); font-family: Roboto, Arial, sans-serif; font-size: var(--ytd-video-primary-info-renderer-title-font-size, var(--yt-navbar-title-font-size, inherit)); font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: ; font-variant-east-asian: ; transform: var(--ytd-video-primary-info-renderer-title-transform, none); text-shadow: var(--ytd-video-primary-info-renderer-title-text-shadow, none); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><yt-formatted-string class=\"style-scope ytd-video-primary-info-renderer\" force-default-style=\"\" style=\"word-break: break-word;\">The market has not reached a bottom yet but we&#39;re going down at a slower rate: Economist El-Erian</yt-formatted-string></h1>\r\n', '', 'embed url', 'https://www.youtube.com/watch?v=4SpWWACypxM', 'http://i3.ytimg.com/vi/4SpWWACypxM/default.jpg', 0, 74, '2020-04-04 14:15:45', 'World');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `refund_to_id` int(11) NOT NULL,
  `orderNo` varchar(255) NOT NULL,
  `memship_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'normal',
  `payment_id` int(11) NOT NULL COMMENT 'primary key of order_card_detail',
  `payment_method` varchar(20) NOT NULL,
  `payment_type` int(1) NOT NULL DEFAULT '1',
  `watched` int(11) NOT NULL,
  `notes` text NOT NULL,
  `started` tinyint(1) NOT NULL DEFAULT '0',
  `delivery_note` text NOT NULL,
  `delivered_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `created_on`, `amount`, `status`, `refund_to_id`, `orderNo`, `memship_id`, `type`, `payment_id`, `payment_method`, `payment_type`, `watched`, `notes`, `started`, `delivery_note`, `delivered_file`) VALUES
(1, 99, '2020-02-24 14:03:26', 250, 1, 0, '5e53d7fdd5d9c', 3, 'normal', 4, 'paypal', 1, 0, '', 0, '', ''),
(2, 99, '2020-02-24 14:10:55', 250, 1, 0, '5e53d982478bd', 4, 'normal', 5, 'paypal', 1, 0, '', 0, '', ''),
(3, 99, '2020-02-24 14:16:48', 750, 1, 0, '5e53dae4c81a6', 5, 'normal', 6, 'paypal', 1, 0, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatustitles`
--

CREATE TABLE `orderstatustitles` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderstatustitles`
--

INSERT INTO `orderstatustitles` (`id`, `title`) VALUES
(1, 'Active'),
(2, 'delivered'),
(3, 'job completed'),
(5, 'revision'),
(7, 'Disputed'),
(8, 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `order_card_detail`
--

CREATE TABLE `order_card_detail` (
  `id` int(11) NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_zip_check` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exp_month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exp_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fingerprint` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `funding` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paid` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seller_offer_request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_chat`
--

CREATE TABLE `order_chat` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_files`
--

CREATE TABLE `order_files` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `order_id` double NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `delivered_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_product_detail`
--

CREATE TABLE `order_product_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_description` text COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image',
  `video_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.mp4',
  `thumbnail` varchar(244) COLLATE utf8_unicode_ci NOT NULL,
  `posted_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postal_code`
--

CREATE TABLE `postal_code` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `min_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `postal_code`
--

INSERT INTO `postal_code` (`id`, `city_id`, `postal_code`, `min_order`, `status`) VALUES
(9, 2, 90001, 200, 1),
(10, 2, 90001, 200, 1),
(11, 3, 90002, 200, 1),
(12, 2, 122002, 222, 1),
(13, 3, 122003, 20, 1),
(14, 9, 4556, 50, 1),
(15, 9, 4644, 50, 1),
(16, 10, 3333, 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `file`, `post_id`) VALUES
(14, '61eece3cdbc336ec810c6b9126bf12be.jpg', 6),
(15, 'd1bb76a1f9768cabecec6c07ec6d2d38.jpg', 7),
(16, '7f665a1f2a8028d6b2707495877278f5.png', 37),
(17, '342fdcbd2af85920656f2646399ebdbc.png', 1),
(18, '98ec83385a8d173e500acb6c0a6820f8.png', 2),
(19, '6962bb65d8d143ee2355ad29747b3eba.png', 3),
(20, 'ffa091847c90b6db9d710b7cb3b38113.png', 4),
(21, '99dc371e9b4746a94720432abacfe3bd.png', 8),
(22, '76c47dc9bfcd2e9bfbf083e9b3ca48fe.png', 9),
(23, '037afbe10f36669e35083a7d934a1ddb.png', 10),
(24, 'aafe66c4d74aa2abfbd991ca18897455.jpg', 15),
(25, 'b90ac608af15de45cfc0ee905879e61a.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `package_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_extra_group`
--

CREATE TABLE `product_extra_group` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timings` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `asocial_links` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `videohhome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terms` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_fee` float NOT NULL,
  `processing_fee_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=fixed, 0=percentage',
  `paypal_mode_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=sandbox,1=live',
  `paypal_mode_front` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=sandbox,1=live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `description`, `image`, `banner`, `phone`, `status`, `timings`, `asocial_links`, `videohhome`, `address`, `terms`, `email`, `service_fee`, `processing_fee_type`, `paypal_mode_admin`, `paypal_mode_front`) VALUES
(1, '<p>10451 Mill Run Circle,</p>\r\n\r\n<p>Owings Mills MD 21117</p>\r\n\r\n<p><strong>Email:</strong>&nbsp;Support@skillsquared.com</p>\r\n\r\n<p><strong>Call:</strong> +1 (443) 854 8762</p>', '829883426462.png', '4523896078094.png', '+1 (443) 854 8762', '1', '9:00 am - 05:00 PM', '{\"fb\":\"\",\"tw\":\"\",\"go\":\"\",\"li\":\"\",\"yo\":\"\"}', '195173348862.mp4', 'Vineland, 08360 New JERSEY-USA', '<p>Hello this is test messageHello this is test messageHello this is tes</p>\n\n<p>t messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is tes</p>\n\n<p>t messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHello this is test messageHell</p>\n\n<p>o this is test message</p>\n', 'info@cppexglobal.org', 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'noimg.png',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `resource_type` varchar(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `btn_text` varchar(255) NOT NULL DEFAULT 'Read More'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `url`, `start_date`, `end_date`, `image`, `created_on`, `status`, `resource_type`, `resource_id`, `link`, `btn_text`) VALUES
(1, 'Here to help our clients to achieve PROFITABLE SUSTAINABLE GROWTH!', '<p>&nbsp;To Achieve Profitable&nbsp;Sustainable Growth!</p>', '', '', '', 'e8faf0797e5ecc0c07430262925818ff.jpeg', '2020-02-22 16:50:50', 1, '', 0, '', ''),
(2, 'Let’s do something great, TOGETHER for positive impact TODAY ... for TOMORROW!', '<p>Together for positive impact TODAY ... for TOMORROW!</p>', '', '', '', '6338b69c7862a1e0f52a0258cc79041e.jpeg', '2020-02-22 16:55:01', 1, '', 0, '', ''),
(3, 'Here to help our clients to achieve their goal', '', '', '', '', 'a107f59b430dffedfcf30fb80f477b50.jpeg', '2020-04-13 14:55:10', 1, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `status`) VALUES
(1, 'Customer', 1),
(11, 'Partner', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `image`, `post_id`) VALUES
(37, 'dc53f63fd855e5bebc94944853d20ef3.jpg', 1),
(38, '530e08ac4f9f51043f999fadbd3dd80b.jpg', 1),
(39, '9e5e92ade5da85607021896aa610b747.jpg', 1),
(40, '8cfe8e2ceb039acef96b0f152f87f816.jpg', 1),
(41, 'b664d759f4cf6bd2f0a98500e28e430b.jpg', 1),
(42, '112b64d69538779958ef376490de3835.jpg', 1),
(43, '417652675c70a8af67b2c9e9aac83d47.jpg', 1),
(44, '6d2eb146e870bf2b166deaf1ec2b5c21.jpg', 1),
(45, '3e1d3d9af91385b719fb491199163991.jpg', 1),
(46, 'a69fbf1bc822d8a4400dd85b2294294c.jpg', 1),
(47, '5a29525a338f197f5104460a61c71e41.jpg', 1),
(48, 'a5b156768b440b5d723b004efa938fa6.jpg', 1),
(49, '1c62f2b221352501e3dc6ca731d49afb.jpg', 1),
(50, 'f0e1bbcece5416fc78a6e94a5a8a1763.jpg', 1),
(51, 'bd47379588870963e89c0386196465c6.jpg', 1),
(52, 'bd0efc60b703f8f9fbb8607c5643e1a1.jpg', 1),
(53, '40477f58da794ceaa369577ea0be28b8.jpg', 1),
(54, '51defecacc3fa103e9e7b4427776aa2e.jpg', 1),
(55, '3cb56046d6b788266857de657b6013ea.jpg', 1),
(56, '998f5433a048748071373762327605fc.jpg', 1),
(57, 'e026fb9949f835d81e6d1decfc6180c6.jpg', 1),
(58, '1a1334c51121a4743f5c7279471c24ec.jpg', 1),
(59, '550beb151a7b4938c4a7625d14da887c.jpg', 1),
(60, '19b55796fdea312a54c61ef8ebe2ca83.jpg', 1),
(63, '58c89b81c684c059d9a2c7e557a79b4b.jpg', 1),
(65, 'fd26810ccd84678c8251c05f91782bd1.jpg', 11),
(67, '837240e86fe21b55f3d2263028cc26e4.jpg', 11),
(74, '849e09512381f6820226a0da4fe1eb23.png', 1),
(76, '2bfde1586e69ab43ced6764cea90df9f.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `text` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`text`, `description`, `image`, `id`) VALUES
('waseem afzal', 'Recommended company in my area for giving services ', 'dbf565a57371c84b2676b83017fb529b.png', 1),
('William', 'Nice platform to  recruit and to show best experience', '6547c1f272b30f43504408221a6fbd08.png', 2),
('Shanley', 'A certified website for all services. You will find every type of freelancer here', '205d3b782134d56118c56f035d61b007.png', 3),
('Mr Ben', 'An incredibly creative entrepreneurial company', '3651b13cae076308d2aec6c3f64e414f.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_awarddata`
--

CREATE TABLE `tbl_awarddata` (
  `id` int(11) NOT NULL,
  `application_no` varchar(10) NOT NULL,
  `certificate_name` varchar(50) NOT NULL,
  `applicant_name` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `membership` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `trainer` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_awarddata`
--

INSERT INTO `tbl_awarddata` (`id`, `application_no`, `certificate_name`, `applicant_name`, `customer_id`, `company_name`, `membership`, `mobile`, `email`, `trainer`, `city`, `country`, `year`) VALUES
(2, '333222dd', 'Diploma CBN Deeedddd', 'KHna khan Naeeme sdsd', 3, 'facebook', 'gjhgjgjg', '03417090031', 'ceo.cyphersol@gmail.com', 'dsadada', 'lahore', 'pakistan', 0000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificate_data`
--

CREATE TABLE `tbl_certificate_data` (
  `id` int(11) NOT NULL,
  `certificate_id` varchar(20) NOT NULL,
  `certificate_name` varchar(50) NOT NULL,
  `applicant_name` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `trainer` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `fees` varchar(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `issuance_date` date NOT NULL,
  `expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_certificate_data`
--

INSERT INTO `tbl_certificate_data` (`id`, `certificate_id`, `certificate_name`, `applicant_name`, `customer_id`, `company_name`, `mobile`, `email`, `trainer`, `city`, `country`, `fees`, `duration`, `issuance_date`, `expiration_date`) VALUES
(1, 'GCD00003333332222222', 'Diploma CBN Deeedddd', 'KHna khan Naeeme sdsd', 3, 'facebook', '03417090031', 'ceo.cyphersol@gmail.com', 'dsadada', 'lahore', 'pakistan', 'dadad', 'adsad', '0000-00-00', '0000-00-00'),
(2, 'cg001', 'Certified technician', 'Farhan Zafar', 0, 'CPPEx Global', '551619623', 'info@cppexglobal.org', 'James Davis', 'Riyadh', 'Pakistan', '$ 500.00', '2020-04-08', '2020-04-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_childmenu`
--

CREATE TABLE `tbl_childmenu` (
  `id` int(11) NOT NULL,
  `menu_id` bigint(11) NOT NULL,
  `sub_menu_id` bigint(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_banner` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_detail`
--

CREATE TABLE `tbl_company_detail` (
  `id` int(11) NOT NULL,
  `memship_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `principle_bussniss` varchar(100) NOT NULL,
  `number_of_employees` int(2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company_detail`
--

INSERT INTO `tbl_company_detail` (`id`, `memship_id`, `company_name`, `principle_bussniss`, `number_of_employees`, `address`, `country`, `zip`) VALUES
(1, 1, 'asdas', 'dasd', 0, 'dasdas', 'dasdsad', 0),
(2, 2, 'das', 'das', 0, 'asd', 'asdasd', 0),
(3, 3, 'dasd', 'asda', 0, 'asdasdasd', 'asdasd', 0),
(4, 4, 'dsa', 'dasd', 0, 'dsadasd', 'asdasdasd', 0),
(5, 5, 'dasd', 'asd', 0, 'asdas', 'das', 0),
(6, 6, 'First Web Solutions', 'First Web Solutions', 1, 'Office # 9, Second Floor, Al Hafiz Trade Center, Model Town Link Road', 'Pakistan', 54000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `userfile` varchar(255) NOT NULL,
  `other_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`id`, `title`, `first_name`, `last_name`, `email`, `phone`, `userfile`, `other_address`) VALUES
(1, 'Mr', 'Ashfaq', 'Sajid', 'm.sajid@cppexglobal.org', '+923008464155', '3884396433374.pdf', '{\"address\":\"Pakistan\",\"city\":\"lahore\",\"state\":\"punjab\",\"zipcode\":\"54000\",\"product_service_involved\":\"Training\",\"dob\":\"2020-12-31\",\"contacted\":\"YES\",\"think\":\"Need more training\",\"summary\":\"tRAINING WAS NOT GOOD\"}'),
(2, 'Mr', 'Ashfaq', 'Sajid', 'm.sajid@cppexglobal.org', '+923008464155', '45997344686.pdf', '{\"address\":\"Pakistan\",\"city\":\"lahore\",\"state\":\"punjab\",\"zipcode\":\"54000\",\"product_service_involved\":\"Training\",\"dob\":\"2020-12-31\",\"contacted\":\"YES\",\"think\":\"Need more training\",\"summary\":\"tRAINING WAS NOT GOOD\"}'),
(3, 'Mr', 'Ashfaq', 'Sajid', 'm.sajid@cppexglobal.org', '+923008464155', '1632112690005.pdf', '{\"address\":\"Pakistan\",\"city\":\"lahore\",\"state\":\"punjab\",\"zipcode\":\"54000\",\"product_service_involved\":\"Training\",\"dob\":\"2020-12-31\",\"contacted\":\"YES\",\"think\":\"Need more training\",\"summary\":\"tRAINING WAS NOT GOOD\"}'),
(4, 'Mr', 'Ashfaq', 'Sajid', 'm.sajid@cppexglobal.org', '+923008464155', '4913785351202.pdf', '{\"address\":\"Pakistan\",\"city\":\"lahore\",\"state\":\"punjab\",\"zipcode\":\"54000\",\"product_service_involved\":\"Training\",\"dob\":\"2020-12-31\",\"contacted\":\"YES\",\"think\":\"Need more training\",\"summary\":\"tRAINING WAS NOT GOOD\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(500) NOT NULL,
  `otherinfo` text NOT NULL,
  `userfile` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`id`, `firstname`, `lastname`, `email`, `otherinfo`, `userfile`, `message`, `created_date`) VALUES
(1, 'waseem', 'afzal', 'waseemafzal31@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"03417090031\",\"industry\":\"Printing Industry\",\"jobrole\":\"Cheif Executive\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '', 'Tarey bina zindagi sey koi shikwa to nahi', '0000-00-00 00:00:00'),
(2, 'waseem', 'afzal', 'waseemafzal31@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"03417090031\",\"industry\":\"Printing Industry\",\"jobrole\":\"Cheif Executive\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '', 'Connect, follow and have a conversation with us for latest News, articles, blogs, customer service, industry insight, career opportunities, working life, education, expert advice and corporate values on social medial.', '0000-00-00 00:00:00'),
(3, 'waseem', 'afzal', 'waseemafzal31@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"03417090031\",\"industry\":\"Printing Industry\",\"jobrole\":\"Cheif Executive\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '', 'Connect, follow and have a conversation with us for latest News, articles, blogs, customer service, industry insight, career opportunities, working life, education, expert advice and corporate values on social medial.', '0000-00-00 00:00:00'),
(4, 'waseem', 'afzal', 'waseemafzal31@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"03417090031\",\"industry\":\"Printing Industry\",\"jobrole\":\"Cheif Executive\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '', 'Connect, follow and have a conversation with us for latest News, articles, blogs, customer service, industry insight, career opportunities, working life, education, expert advice and corporate values on social medial.', '0000-00-00 00:00:00'),
(5, 'Muhammad', 'ASHFAQ', 'mashfaq.dic@gmail.com', '{\"company_name\":\"RPI\",\"bussinuss_phone\":\"966551619623\",\"industry\":\"Printing Industry\",\"jobrole\":\"R & D Manager\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"Online Training\"}', '466230799524.pdf', 'Dear sir,\r\nHope this email will finds you well! I want to register myself for the training you are providing in the Middle East.', '0000-00-00 00:00:00'),
(6, 'Muhammad', 'ASHFAQ', 'mashfaq.dic@gmail.com', '{\"company_name\":\"RPI\",\"bussinuss_phone\":\"966551619623\",\"industry\":\"Printing Industry\",\"jobrole\":\"R & D Manager\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"Online Training\"}', '4844677509360.pdf', 'Dear sir,\r\nHope this email will finds you well! I want to register myself for the training you are providing in the Middle East.', '0000-00-00 00:00:00'),
(7, 'Muhammad', 'ASHFAQ', 'mashfaq.dic@gmail.com', '{\"company_name\":\"RPI\",\"bussinuss_phone\":\"966551619623\",\"industry\":\"Printing Industry\",\"jobrole\":\"R & D Manager\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"Online Training\"}', '4571916655578.pdf', 'Dear sir,\r\nHope this email will finds you well! I want to register myself for the training you are providing in the Middle East.', '0000-00-00 00:00:00'),
(8, 'waseem', 'afzal', 'ceo.cyphersol@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"042123456\",\"industry\":\"Paper Industry\",\"jobrole\":\"Owner\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '1859700590656.png', 'i am testing this website', '0000-00-00 00:00:00'),
(9, 'waseem', 'afzal', 'ceo.cyphersol@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"042123456\",\"industry\":\"Paper Industry\",\"jobrole\":\"Owner\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '4682574128674.png', 'i am testing this website', '0000-00-00 00:00:00'),
(10, 'waseem', 'afzal', 'ceo.cyphersol@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"042123456\",\"industry\":\"Paper Industry\",\"jobrole\":\"Owner\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '395107117179.png', 'i am testing this website', '0000-00-00 00:00:00'),
(11, 'waseem', 'afzal', 'ceo.cyphersol@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"042123456\",\"industry\":\"Paper Industry\",\"jobrole\":\"Owner\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '4763500657404.png', 'i am testing this website', '0000-00-00 00:00:00'),
(12, 'waseem', 'afzal', 'ceo.cyphersol@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"042123456\",\"industry\":\"Paper Industry\",\"jobrole\":\"Owner\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '5164955300610.png', 'i am testing this website', '0000-00-00 00:00:00'),
(13, 'waseem', 'afzal', 'ceo.cyphersol@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"042123456\",\"industry\":\"Paper Industry\",\"jobrole\":\"Owner\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '4236692181660.png', 'i am testing this website', '0000-00-00 00:00:00'),
(14, 'waseem', 'afzal', 'ceo.cyphersol@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"042123456\",\"industry\":\"Paper Industry\",\"jobrole\":\"Owner\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '2326214003024.png', 'i am testing this website', '0000-00-00 00:00:00'),
(15, 'waseem', 'afzal', 'ceo.cyphersol@gmail.com', '{\"company_name\":\"cyphersol\",\"bussinuss_phone\":\"042123456\",\"industry\":\"Paper Industry\",\"jobrole\":\"Owner\",\"prdoduct_services\":\"Training\",\"prdoduct_mode\":\"On-site Training\"}', '4736527521165.png', 'i am testing this website', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `currency_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `event_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'random id',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'defaultbanner.png',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_at` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end_at` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `all_day` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `on_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id`, `event_id`, `title`, `short_heading`, `post_banner`, `description`, `start_at`, `end_at`, `all_day`, `location`, `on_date`, `created_on`) VALUES
(1, 'GC0091', 'Print automation and Digitization', 'dsadasdasdasdsad', '2312444885376.jpg', '<p>dsadsadadadsa locatin gd sagdash gdashgdhas ghd agsjdas dsadsadadadsa locatin gd sagdash gdashgdhas ghd agsjdas dsadsadadadsa locatin gd sagdash gdashgdhas ghd agsjdas dsadsadadadsa locatin gd sagdash gdashgdhas ghd agsjdas dsadsadadadsa locatin gd sagdash gdashgdhas ghd agsjdas</p>', '33:33 PM', '10:33 PM', 'All day', 'dsadsadadadsa locatin gd sagdash gdashgdhas ghd agsjdas', '12-2-2019', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `particpient_detail` text NOT NULL,
  `product_detail` text NOT NULL,
  `instruction_training` text NOT NULL,
  `instruction_department` text NOT NULL,
  `instruction_venue_procedure` text NOT NULL,
  `like_and_suggestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `particpient_detail`, `product_detail`, `instruction_training`, `instruction_department`, `instruction_venue_procedure`, `like_and_suggestion`) VALUES
(4, '{\"date\":\"2020-02-28\",\"start\":\"03:03\",\"end\":\"02:02\",\"email\":\"a@yahoo.com\",\"employee_name\":\"dasd\",\"job_title\":\"asd\",\"mobile\":\"31231231231\",\"company_name\":\"dsadasdsadasdasdadas sadasdsadasd\"}', '{\"product_service\":\"Certification\",\"trainer_name\":\"dasdasdsad sd\",\"subject\":\"addasdasd\"}', '{\"expectations\":\"1\",\"learned\":\"2\",\"identified\":\"3\",\"content\":\"4\",\"useful\":\"1\"}', '{\"knowledgeable\":\"4\",\"presentations\":\"3\",\"concerns\":\"2\",\"encouraged\":\"3\",\"adequatetime\":\"2\"}', '{\"timelyinformation\":\"4\",\"timeforbreaks\":\"2\",\"roomfacilities\":\"3\",\"regulartraining\":\"2\"}', '{\"mostlike\":\"dasdasdasdas\",\"improvementneeded\":\"dasdasdasd\",\"futuretraining\":\"dsadasdad\"}'),
(5, '{\"date\":\"2020-12-31\",\"start\":\"08:00\",\"end\":\"17:00\",\"email\":\"m.sajid@cppexglobal.org\",\"employee_name\":\"Ashfaq\",\"job_title\":\"Supervisor\",\"mobile\":\"+923008464155\",\"company_name\":\"cppex global\"}', '{\"product_service\":\"Training\",\"trainer_name\":\"Dr. Andreaz\",\"subject\":\"Food Packaging Standards\"}', '{\"expectations\":\"2\",\"learned\":\"3\",\"identified\":\"4\",\"content\":\"5\",\"useful\":\"5\"}', '{\"knowledgeable\":\"4\",\"presentations\":\"3\",\"concerns\":\"3\",\"encouraged\":\"4\",\"adequatetime\":\"4\"}', '{\"timelyinformation\":\"1\",\"training\":\"3\",\"timeforbreaks\":\"3\",\"roomfacilities\":\"4\",\"regulartraining\":\"4\"}', '{\"mostlike\":\"Good explaination\",\"improvementneeded\":\"More practical part\",\"futuretraining\":\"In Flexographic printing, Color management\"}'),
(6, '{\"date\":\"2020-12-31\",\"start\":\"23:59\",\"end\":\"23:00\",\"email\":\"m.sajid@cppexglobal.org\",\"employee_name\":\"Ashfaq\",\"job_title\":\"Supervisor\",\"mobile\":\"+923008464155\",\"company_name\":\"cppex global\"}', '{\"product_service\":\"Training\",\"trainer_name\":\"Dr. Andreaz\",\"subject\":\"Food Packaging Standards\"}', '{\"expectations\":\"4\",\"learned\":\"4\",\"identified\":\"4\",\"content\":\"4\",\"useful\":\"4\"}', '{\"knowledgeable\":\"4\",\"presentations\":\"4\",\"concerns\":\"4\",\"encouraged\":\"4\",\"adequatetime\":\"4\"}', '{\"timelyinformation\":\"4\",\"training\":\"4\",\"timeforbreaks\":\"4\",\"roomfacilities\":\"4\",\"regulartraining\":\"4\"}', '{\"mostlike\":\"Good explaination\",\"improvementneeded\":\"More practical part\",\"futuretraining\":\"In Flexographic printing, Color management\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `url` varchar(255) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'noimg.png',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `resource_type` varchar(11) NOT NULL,
  `resource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `title`, `year`, `url`, `start_date`, `end_date`, `image`, `created_on`, `status`, `resource_type`, `resource_id`) VALUES
(12, '2018', 2018, '', '', '', '73f1d0744d57c941dfb226b350c490ad.JPG', '2020-02-28 13:45:29', 1, '', 0),
(13, '2018', 2018, '', '', '', '8ca67f4f12c5f5b2f073412b27a6ea72.JPG', '2020-02-28 13:46:15', 1, '', 0),
(14, '2018', 2018, '', '', '', 'f927ea0313c3a2fa67a9c1998d790613.JPG', '2020-02-28 13:48:11', 1, '', 0),
(15, '2018', 2018, '', '', '', '485d8e73d2d74a3114e656c0dcb9e862.JPG', '2020-02-28 13:48:39', 1, '', 0),
(16, '2018', 2018, '', '', '', '8f6cf927f385c7f5defd3c18eb6f6cda.JPG', '2020-02-28 13:49:04', 1, '', 0),
(17, '2018', 2018, '', '', '', 'fecde5b68d06bb6524a486b80b557035.JPG', '2020-02-28 13:49:45', 1, '', 0),
(18, '2018', 2018, '', '', '', 'debfd2167a0b26d76d7c91ca6be21684.JPG', '2020-02-28 13:50:27', 1, '', 0),
(19, '2018', 2018, '', '', '', 'c8c974ba9364e160645e05339c03011c.JPG', '2020-02-28 13:52:28', 1, '', 0),
(20, '2018', 2018, '', '', '', '29efd8caff4f36a0f7c3bc4a832a6abd.JPG', '2020-02-28 13:53:09', 1, '', 0),
(21, '2018', 2018, '', '', '', 'dfda7e738c8f1592ef1a5f09c5b33627.JPG', '2020-02-28 13:55:23', 1, '', 0),
(22, '2018', 2018, '', '', '', '116b5f482edb98ab51510b0bbf8dc483.jpg', '2020-02-28 13:55:46', 1, '', 0),
(23, '2018', 2018, '', '', '', '65b3f9a446678391a33a70ebe5967429.JPG', '2020-02-28 13:56:39', 1, '', 0),
(24, '2018', 2018, '', '', '', '27675d830c6719119f6fd6b1ff349f83.JPG', '2020-02-28 13:57:43', 1, '', 0),
(25, '2018', 2018, '', '', '', '67b4ce14087fef855b235c26a4761f4b.jpg', '2020-02-28 14:05:36', 1, '', 0),
(27, '2018', 2018, '', '', '', 'c489f16e505ae4c4e85ff63bf960704b.jpg', '2020-02-29 06:24:27', 1, '', 0),
(28, '2018', 2018, '', '', '', '9239fc05fe7fbcc0d02b47167218cebb.jpg', '2020-02-29 06:24:58', 1, '', 0),
(29, '2018', 2018, '', '', '', '4ed50c4521b61c233a94db48973c878d.jpg', '2020-02-29 06:25:22', 1, '', 0),
(30, '2018', 2018, '', '', '', '143c13d26fc1828d1dd4903273945b22.jpg', '2020-02-29 06:26:03', 1, '', 0),
(31, '2018', 2018, '', '', '', 'e09838b8cda2b1ded09da2c51b213bcb.jpg', '2020-02-29 06:26:38', 1, '', 0),
(32, '2018', 2018, '', '', '', '3c85eeb6bd48835f178de2f5488f7b2f.JPG', '2020-02-29 06:27:23', 1, '', 0),
(33, '2018', 2018, '', '', '', 'd18ce40ee8c6d65116d62349ab43c546.jpg', '2020-02-29 06:29:19', 1, '', 0),
(34, '2018', 2018, '', '', '', 'cda27536e29670d5b774b543c3806633.jpg', '2020-02-29 06:30:01', 1, '', 0),
(35, '2018', 2018, '', '', '', 'd0c4a3d9a7ca6d808955bd72ec2bd9ab.jpg', '2020-02-29 06:30:38', 1, '', 0),
(36, '2018', 2018, '', '', '', 'b5ad26ab8dfc2bb1e716096954f1ded0.jpg', '2020-02-29 06:31:45', 1, '', 0),
(37, '2018', 2018, '', '', '', '4006c2f8acea41d11da0fe4abb538ffd.jpg', '2020-02-29 06:32:14', 1, '', 0),
(38, '2018', 2018, '', '', '', 'bdf75c7c99c5876ffa46ab4721f129fd.JPG', '2020-02-29 06:32:44', 1, '', 0),
(39, '2018', 2018, '', '', '', '0fc228b1eb514797ebdf12e5c861195b.JPG', '2020-02-29 06:33:53', 1, '', 0),
(40, '2018', 2018, '', '', '', '9445af21a4d784cf7d888727cceb9f23.JPG', '2020-02-29 06:34:19', 1, '', 0),
(41, '2018', 2018, '', '', '', 'c900d710f97b5ea7ef3756df290dcb37.JPG', '2020-02-29 06:34:44', 1, '', 0),
(42, '2018', 2018, '', '', '', '746ea1abb9b8eff68ca0f835be36e13d.JPG', '2020-02-29 06:35:14', 1, '', 0),
(43, '2018', 2018, '', '', '', '8601ea339d9daa34828e55b84523dd20.JPG', '2020-02-29 06:35:38', 1, '', 0),
(44, '2018', 2018, '', '', '', '681cdc3f936f3e7a3a22fd15abb7fede.JPG', '2020-02-29 06:38:13', 1, '', 0),
(45, '2018', 2018, '', '', '', 'ab33fae21970b6195be7c804b5ba77d7.JPG', '2020-02-29 06:39:01', 1, '', 0),
(46, '2018', 2018, '', '', '', '036fdbf3d0845271c3ccc1a90d5772b9.JPG', '2020-02-29 06:43:41', 1, '', 0),
(47, '2018', 2018, '', '', '', '54c586b4540143e78cf6e15065d89e3b.JPG', '2020-02-29 06:44:08', 1, '', 0),
(48, '2018', 2018, '', '', '', '8ce46e732310e181bbd9e877cc6f5187.JPG', '2020-02-29 06:44:28', 1, '', 0),
(49, '2018', 2018, '', '', '', 'e4aed63c735aaf0b8c7b03402dff09ee.JPG', '2020-02-29 06:44:55', 1, '', 0),
(51, '2018', 2018, '', '', '', '6c9971c73872381078fe7d474e344e99.JPG', '2020-02-29 06:49:19', 1, '', 0),
(52, '2018', 2018, '', '', '', '496f116452bc247b36934f2f66c73209.JPG', '2020-02-29 06:49:59', 1, '', 0),
(53, '2018', 2018, '', '', '', 'c2171bcad41c627759f87f59a5003bee.JPG', '2020-02-29 06:50:38', 1, '', 0),
(54, '2018', 2018, '', '', '', '6c6ab2d72016fad80c80cb7fd3b49bea.JPG', '2020-02-29 06:51:02', 1, '', 0),
(55, '2018', 2018, '', '', '', '815c18ca4579510fc178c80eb3b74969.JPG', '2020-02-29 06:51:36', 1, '', 0),
(56, '2018', 2018, '', '', '', '6fe704b8100dfae2f6f1c8ec6a4f782f.JPG', '2020-02-29 06:52:02', 1, '', 0),
(57, '2018', 2018, '', '', '', 'f81754f230fb413667acc40a4c02c26a.JPG', '2020-02-29 06:52:22', 1, '', 0),
(58, '2018', 2018, '', '', '', '05525da762c06c7b3ba4b4af7871fb56.JPG', '2020-02-29 06:52:46', 1, '', 0),
(59, '2018', 2018, '', '', '', '22df1a49ca1964eacdd48c2abea3679b.JPG', '2020-02-29 06:53:14', 1, '', 0),
(60, '2018', 2018, '', '', '', '796af577423c6f8a0178a28ba87b44cb.JPG', '2020-02-29 06:57:06', 1, '', 0),
(61, '2018', 2018, '', '', '', '39e9504c1cee5baea366e2318cf7146e.JPG', '2020-02-29 06:57:52', 1, '', 0),
(62, '2018', 2018, '', '', '', '9950de0307d1f82295cf968800b7125c.JPG', '2020-02-29 06:58:19', 1, '', 0),
(63, '2018', 2018, '', '', '', '167af50dde838ca8921f57f95fc73214.JPG', '2020-02-29 06:59:36', 1, '', 0),
(64, '2018', 2018, '', '', '', 'abf3bc1a0b1646bcf142257f17697eb9.JPG', '2020-02-29 07:00:08', 1, '', 0),
(65, '2019', 2019, '', '', '', '3b447bfcfa5023959e55cb6dacadd628.JPG', '2020-02-29 07:02:38', 1, '', 0),
(66, '2019', 2019, '', '', '', '985261b562cf324b066224c148508240.JPG', '2020-02-29 07:03:04', 1, '', 0),
(67, '2019', 2019, '', '', '', '7b6e66002e7dfbf6e15a0d879c7cd578.JPG', '2020-02-29 07:03:31', 1, '', 0),
(68, '2019', 2019, '', '', '', 'a587e60fcd859412fe5017bd1a0ee643.JPG', '2020-02-29 07:03:53', 1, '', 0),
(69, '2019', 2019, '', '', '', '184970613870531c07ec0d771ebfcc70.JPG', '2020-02-29 07:04:44', 1, '', 0),
(70, '2019', 2019, '', '', '', '49ee69d43a913252866c7ce2718ed61e.JPG', '2020-02-29 07:05:16', 1, '', 0),
(71, '2019', 2019, '', '', '', 'f66b227e27578cfe2fcf7ef903bac475.JPG', '2020-02-29 07:05:58', 1, '', 0),
(72, '2019', 2019, '', '', '', '3cabfdef614395af890f757824cf5e8f.JPG', '2020-02-29 07:06:22', 1, '', 0),
(73, '2019', 2019, '', '', '', '580cbc70355d85c31db71388352b5f90.JPG', '2020-02-29 07:07:11', 1, '', 0),
(74, '2019', 2019, '', '', '', 'cc010ee58c20c59b23218d311c8fd132.JPG', '2020-02-29 07:07:51', 1, '', 0),
(75, '2019', 2019, '', '', '', '39d18428f8354fd7564d368f4fc566c4.jpg', '2020-02-29 07:08:18', 1, '', 0),
(76, '2019', 2019, '', '', '', '30a17fa6ab2a5a9ce77600d30d0d3f82.JPG', '2020-02-29 07:08:55', 1, '', 0),
(77, '2019', 2019, '', '', '', '9c5719d82defddcfb1e3d9aac701b1e6.JPG', '2020-02-29 07:09:50', 1, '', 0),
(78, '2019', 2019, '', '', '', '4689b6625c26c7f6622ba89488193df8.jpg', '2020-02-29 07:12:00', 1, '', 0),
(82, '2019', 2019, '', '', '', 'cc7a31205f1074a0faf3aab04cbbc1d4.jpg', '2020-02-29 07:25:11', 1, '', 0),
(83, '2019', 2019, '', '', '', '802e52aa21008a167787c971160e8aca.jpg', '2020-02-29 07:25:39', 1, '', 0),
(84, '2019', 2019, '', '', '', '2ab27d15c1812acbe0765a4c11ed2932.jpg', '2020-02-29 07:26:35', 1, '', 0),
(85, '2019', 2019, '', '', '', 'ff469391d21f362756d0be529461535a.jpg', '2020-02-29 07:27:14', 1, '', 0),
(86, '2019', 2019, '', '', '', '2b46616af6617158400f44205b0daa0a.jpg', '2020-02-29 07:27:55', 1, '', 0),
(87, '2019', 2019, '', '', '', '04b5ce74be1c1340aaf2692357c05c2e.JPG', '2020-02-29 07:28:13', 1, '', 0),
(88, '2019', 2019, '', '', '', '02a04d874e47f875de2ee735ada2697e.jpg', '2020-02-29 07:34:10', 1, '', 0),
(89, '2019', 2019, '', '', '', 'e73fb5395008a137ee5c8a9d35f415ce.jpg', '2020-02-29 07:34:43', 1, '', 0),
(90, '2019', 2019, '', '', '', 'ebaf05c8c2573e9ebcd2e58108347abd.jpg', '2020-02-29 07:35:53', 1, '', 0),
(91, '2019', 2019, '', '', '', 'a0cf1f63ad6af8826733f7c69c78c0e3.jpg', '2020-02-29 07:37:34', 1, '', 0),
(92, '2019', 2019, '', '', '', '511a3d0241cef3bc02ff435b5fa28fa1.jpg', '2020-02-29 07:40:00', 1, '', 0),
(93, '2019', 2019, '', '', '', 'cd52905f03ba2bba23b3a9dd2484aea5.JPG', '2020-02-29 07:46:28', 1, '', 0),
(94, '2019', 2019, '', '', '', '4aaa2f6deed77f6d13fe66d5eb3bf371.JPG', '2020-02-29 07:54:25', 1, '', 0),
(95, '2019', 2019, '', '', '', '557774d17f9dc706e929879c9f28ebaf.JPG', '2020-02-29 07:54:56', 1, '', 0),
(96, '2019', 2019, '', '', '', '6ae2bafa4221a399a5389d5a27daabad.JPG', '2020-02-29 07:57:50', 1, '', 0),
(97, '2019', 2019, '', '', '', 'f16385ccc7bbdd7572cc9d685b588121.JPG', '2020-02-29 08:05:13', 1, '', 0),
(99, '2019', 2019, '', '', '', '2d8945ab3367f03495bfc16f68c2b9b4.JPG', '2020-02-29 08:13:15', 1, '', 0),
(100, '2019', 2019, '', '', '', 'a89d39175956e41f9dde6b0fb0f8348b.JPG', '2020-02-29 08:13:59', 1, '', 0),
(101, '2019', 2019, '', '', '', '9d24bea019bbe9b107faf69a5a70b64a.JPG', '2020-02-29 08:15:01', 1, '', 0),
(102, '2019', 2019, '', '', '', '85ef387d85b266cb7cbdac3e631b1ca1.JPG', '2020-02-29 08:15:45', 1, '', 0),
(103, '2019', 2019, '', '', '', '657fd868fca51976b919f444e61de164.JPG', '2020-02-29 08:17:01', 1, '', 0),
(104, '2019', 2019, '', '', '', 'be7075913e4a840713af5616a37eac8a.JPG', '2020-02-29 08:20:40', 1, '', 0),
(105, '2019', 2019, '', '', '', '46a3d5450405bce01a806fb1a0a00368.JPG', '2020-02-29 08:21:05', 1, '', 0),
(106, '2019', 2019, '', '', '', '48bbadb1aaf4a92181f81321500efb94.JPG', '2020-02-29 08:23:07', 1, '', 0),
(107, '2019', 2019, '', '', '', '284578b06ca7e4bdba2c36c25a7618df.JPG', '2020-02-29 08:25:08', 1, '', 0),
(108, '2019', 2019, '', '', '', '47f819930078514bb4e2d6f1b4acad1e.JPG', '2020-02-29 08:29:14', 1, '', 0),
(110, '2019', 2019, '', '', '', '3658e25813a8c2970e8a9d1f4e02085e.JPG', '2020-02-29 08:33:02', 1, '', 0),
(111, '2019', 2019, '', '', '', 'c36091d0d09111cd41079283aecc9635.JPG', '2020-02-29 08:35:23', 1, '', 0),
(112, '2019', 2019, '', '', '', 'f46b101f9e135c590f6f62bffc98b023.JPG', '2020-02-29 08:36:12', 1, '', 0),
(113, '2019', 2019, '', '', '', '80a4bdc913408ae0acf2d001a41d9111.JPG', '2020-02-29 08:36:43', 1, '', 0),
(114, '2019', 2019, '', '', '', '8a71a2482306856bb956dea62780e3f1.JPG', '2020-02-29 08:37:09', 1, '', 0),
(115, '2019', 2019, '', '', '', 'ebe60c1526f42b645c05d914f86e2126.JPG', '2020-02-29 08:38:10', 1, '', 0),
(116, '2019', 2019, '', '', '', 'e53df081a4cbfd769b0019925a258f6a.JPG', '2020-02-29 08:38:43', 1, '', 0),
(117, '2019', 2019, '', '', '', '2a8ae42e7ca3a4cd5e140c59a0c7816b.JPG', '2020-02-29 08:39:28', 1, '', 0),
(118, 'Marketing', 2021, '', '', '', 'd98f679627d4351833c6179b66621646.jpg', '2020-04-09 08:45:23', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'defaultbanner.png',
  `post_description` text COLLATE utf8_unicode_ci NOT NULL,
  `company_location` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `post_title`, `short_heading`, `post_banner`, `post_description`, `company_location`, `created_on`, `last_date`, `status`) VALUES
(1, 'Program Development & Evaluation Analyst', 'Regional Training & Development Director', '3744556912824.png', '<p>CPPEx Global (Global Center of Printing &amp; Packaging Excellence)&nbsp;strives for excellence because a training &amp; consultancy provider is only as good as the training and consultancy services it offers. CPPEx Global endeavors to be known as a leader in technical training and consultancy services as an institution of excellence in vocational education throughout USA, operating with regional offices in Europe, South America, Middle East, and South Asia and planning to expand to other countries and continents in near future.&nbsp;</p>\n\n<p>CPPEx Global managed by a core team of professional trainers and experts who enable over 5,000 printing industrial professionals to enhance their technical skills in the field of manufacturing printing and packaging materials. We proudly bear the name of the preeminent from the institute&#39;s inception and today our experts helps to our global&lsquo;s clients to enhance their productivity and business performance by providing latest innovative solutions to keep clients plant at optimum efficiency.&nbsp;We offer a complete range of tailored training services and solutions that maximize your uptime, reduce your costs and help you reach and sustain your desired performance levels.</p>\n\n<p>CPPEx Global also organizes international conferences, training workshops, consultancy services and technical seminars with strong support of the global printing &amp; packaging Associations and industries. These technical events provide excellent opportunities for networking as well as informed discussion to industrial professionals on latest topics of colors, printing, packaging, digitalization and associated industries.</p>\n\n<p>Job Description</p>\n\n<ul>\n	<li>To provide color training and on-site consultancy service to customers.</li>\n	<li>Pre/Post-sales support for color related products of production service business.</li>\n	<li>Ensure color consistency during production run and good color matching.</li>\n	<li>Convince customer about advantages of color Management solution against competitors.</li>\n	<li>Must have knowledge in handling files with different formats used for printing.</li>\n	<li>Able to open design files to identify and correct problems &amp; depth knowledge of all color system.</li>\n	<li>Product knowledge on color management solution- experienced using some color Management application</li>\n	<li>Experience of color experience in Graphics Communication industry. Past experience can include color separation, color pre-press...etc. - Able to know a difficult color to reproduce and color chemistry.</li>\n	<li>Other tasks will assigned by Line Manager</li>\n</ul>\n\n<p>Expectation</p>\n\n<ul>\n	<li>MS/ Master Degree- Graduated at Printing Industry major is preferred</li>\n	<li id=\"h.gjdgxs\">At least 10 years&rsquo; experience in colors / printing industry.</li>\n	<li>Have experience in quick print industry is an advantage.</li>\n	<li>Knowledge on color theory, printing process adequate customer management skills. Understand color of offset, flexo and rotogravure printing and traditional printing.</li>\n	<li>Strong communication skills &ndash; spoken, written and presentation.</li>\n	<li>Strong analytical and problem solving skills.</li>\n	<li>Color knowledge of printing industry is required.</li>\n	<li>High responsibility, Can do attitude &amp; Strong teamwork</li>\n	<li>Willing to travel domestic &amp; overseas to deliver training and consultancy to printing customers.</li>\n	<li>English fluently &ndash; spoken, listening and written</li>\n</ul>\n', 'Multan, Pakistan', '2020-02-15 13:01:17', '', 1),
(2, 'Business Development Executive', 'Regional Training & Development Director', '1857123444500.png', '<h3><strong>Business Development Executive</strong></h3>\r\n\r\n<p style=\"margin-top:0cm; margin-right:0cm; margin-bottom:7.5pt; margin-left:0cm\"><span style=\"background:white\"><span style=\"line-height:115%\"><b><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Date:</span></span></span> </b>03<span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">-April </span></span></span></span></span><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">-2020</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-top:0cm; margin-right:0cm; margin-bottom:7.5pt; margin-left:0cm\"><span style=\"background:white\"><span style=\"line-height:115%\"><b><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Location:</span></span></span> </b>New York<span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">, USA</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-top:0cm; margin-right:0cm; margin-bottom:7.5pt; margin-left:0cm\"><span style=\"background:white\"><span style=\"line-height:115%\"><strong><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Company:</span></span></span></strong><b>&nbsp;</b><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">CPPEx Global</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-top:0cm; margin-right:0cm; margin-bottom:7.5pt; margin-left:0cm\"><span style=\"background:white\"><span style=\"line-height:115%\"><b><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Reporting:</span></span></span></b><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">&nbsp; Regional Training &amp; Development Director</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><em><span style=\"font-size:9.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">CPPEx Global (Global Center of Printing &amp; Packaging Excellence)</span></span></span></span></em> <span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"><span style=\"color:black\">strives for excellence because a training &amp; consultancy provider is only as good as the training and consultancy services it offers. </span></span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"><span style=\"color:black\">CPPEx Global endeavors to be known as a leader in technical training and consultancy services as an institution of excellence in vocational education throughout USA, operating with regional offices in Europe, South America, Middle East, and South Asia and</span></span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"> planning to expand to other countries and continents in near future.<em>&nbsp;</em></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><em><span style=\"font-size:9.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">CPPEx Global m</span></span></span></span></em><span style=\"font-size:9.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">anaged by a core team of professional </span></span></span></span><span style=\"font-size:9.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"><span style=\"color:black\">trainers and experts who enable over 5,000 printing industrial professionals to enhance their technical skills in the field of manufacturing printing and packaging materials.</span></span></span></span></span><span style=\"font-size:9.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"> We proudly <span style=\"color:black\">bear the name of the preeminent from the institute&#39;s inception and today our experts helps to our global&lsquo;s clients to enhance their productivity and business performance by providing latest innovative solutions to keep clients plant at optimum efficiency.</span></span></span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"> We offer a complete range of tailored training services and solutions that maximize your uptime, reduce your costs and help you reach and sustain your desired performance levels.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">CPPEx Global also organizes international conferences, training workshops, consultancy services and technical seminars with strong support of the global printing &amp; packaging Associations and industries. These technical events provide excellent opportunities for networking as well as informed discussion to industrial professionals on latest topics of colors, printing, packaging, digitalization and associated industries.</span></span></span></span></p>\r\n\r\n<p style=\"margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:normal\"><b><span style=\"font-size:9.5pt\"><span arial=\"\" style=\"font-family:\">Job Description</span></span></b></span></span></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li style=\"margin-bottom:.0001pt; text-align:justify\"><span style=\"background:white\"><span style=\"line-height:150%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">The selected candidate will be responsible to conduct research to identify leads and reach business targets through telephone, email, webinar and in person. </span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt; text-align:justify\"><span style=\"background:white\"><span style=\"line-height:150%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">This individual will also actively participate in the planning and execution of company marketing activities providing vital input based on his/her interactions with prospects.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt; text-align:justify\"><span style=\"background:white\"><span style=\"line-height:150%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Develop sales opportunities by researching and identifying potential accounts.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt; text-align:justify\"><span style=\"background:white\"><span style=\"line-height:150%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Set up and deliver sales presentations, product/service demonstrations, and other sales actions.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt; text-align:justify\"><span style=\"background:white\"><span style=\"line-height:150%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Where necessary, support marketing efforts such as trade shows, exhibits, and other events.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt; text-align:justify\"><span style=\"background:white\"><span style=\"line-height:150%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Enter new customer data and update changes to existing accounts in the corporate database.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt; text-align:justify\"><span style=\"background:white\"><span style=\"line-height:150%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Females are encourage to apply.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:normal\"><b><span style=\"font-size:9.5pt\"><span arial=\"\" style=\"font-family:\"><span style=\"color:#333333\">Requirement</span></span></span></b></span></span></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"line-height:150%\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">University or college degree in Communications, Marketing or science, or an acceptable combination of education and experience. </span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"line-height:150%\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Able to build and maintain lasting relationships with customers.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"line-height:150%\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Exceptional verbal communication and presentation skills.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"line-height:150%\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Ability to travel and attend sales events or exhibits.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"line-height:150%\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Ability to work individually and as part of a team.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"line-height:150%\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Self-motivated, with high energy and an engaging level of enthusiasm.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"line-height:150%\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Able to demonstrate skills in MS Office, social media marketing.</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:3.75pt\"><span style=\"line-height:150%\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">Excellent English written and verbal communication skills</span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:150%\"><span arial=\"\" style=\"font-family:\">.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-top:6.0pt; margin-right:0cm; margin-bottom:6.0pt; margin-left:0cm\"><span style=\"background:white\"><span style=\"line-height:18.0pt\"><b><span style=\"font-size:9.5pt\"><span arial=\"\" style=\"font-family:\"><span style=\"color:#333333\">Application</span></span></span></b><br />\r\n<span style=\"font-size:9.0pt\"><span arial=\"\" style=\"font-family:\"><span style=\"color:#333333\">Interested candidates can apply online or should submit a cover Letter with (<i>expected salary</i>) in English, an updated curriculum vita by Friday, 02-May-2020 at</span></span></span> <a><span style=\"font-size:9.0pt\"><span arial=\"\" style=\"font-family:\">career@cppexglobal.org</span></span></a><u> </u></span></span></p>\r\n', 'New York- USA', '2020-04-03 15:46:33', '', 1),
(3, 'Color Consultant', 'Regional Training & Development Director', 'defaultbanner.png', '<h3><span style=\"line-height:115%\"><em><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">CPPEx Global (Global Center of Printing &amp; Packaging Excellence)</span></span></span></span></em> <span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"><span style=\"color:black\">strives for excellence because a training &amp; consultancy provider is only as good as the training and consultancy services it offers. </span></span></span></span><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"><span style=\"color:black\">CPPEx Global endeavors to be known as a leader in technical training and consultancy services as an institution of excellence in vocational education throughout USA, operating with regional offices in Europe, South America, Middle East, and South Asia and</span></span></span></span><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"> planning to expand to other countries and continents in near future.<em>&nbsp;</em></span></span></span></span></h3>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><em><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">CPPEx Global m</span></span></span></span></em><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">anaged by a core team of professional </span></span></span></span><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"><span style=\"color:black\">trainers and experts who enable over 5,000 printing industrial professionals to enhance their technical skills in the field of manufacturing printing and packaging materials.</span></span></span></span></span><span style=\"font-size:10.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"> We proudly <span style=\"color:black\">bear the name of the preeminent from the institute&#39;s inception and today our experts helps to our global&lsquo;s clients to enhance their productivity and business performance by providing latest innovative solutions to keep clients plant at optimum efficiency.</span></span></span></span></span><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\"> We offer a complete range of tailored training services and solutions that maximize your uptime, reduce your costs and help you reach and sustain your desired performance levels.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">CPPEx Global also organizes international conferences, training workshops, consultancy services and technical seminars with strong support of the global printing &amp; packaging Associations and industries. These technical events provide excellent opportunities for networking as well as informed discussion to industrial professionals on latest topics of colors, printing, packaging, digitalization and associated industries.</span></span></span></span></p>\r\n\r\n<p style=\"margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:normal\"><b><span style=\"font-size:10.0pt\"><span arial=\"\" style=\"font-family:\">Job Description</span></span></b></span></span></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">To provide color training and on-site consultancy service to customers.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Pre/Post-sales support for color related products of production service business.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Ensure color consistency during production run and good color matching. </span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Convince customer about advantages of color Management solution against competitors.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Must have knowledge in handling files with different formats used for printing.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Able to open design files to identify and correct problems &amp; depth knowledge of all color system.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Product knowledge on color management solution- experienced using some color Management application</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Experience of color experience in Graphics Communication industry. Past experience can include color separation, color pre-press...etc. - Able to know a difficult color to reproduce and color chemistry.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Other tasks will assigned by Line Manager</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"line-height:normal\"><b><span style=\"font-size:10.0pt\"><span arial=\"\" style=\"font-family:\"><span style=\"color:#333333\">Expectation</span></span></span></b></span></span></p>\r\n\r\n<ul style=\"list-style-type:square\">\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">MS/ Master Degree- Graduated at Printing Industry major is preferred</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">At least 10 years&rsquo; experience in colors / printing industry.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Have experience in quick print industry is an advantage.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Knowledge on color theory, printing process adequate customer management skills. Understand color of offset, flexo and rotogravure printing and traditional printing.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Strong communication skills &ndash; spoken, written and presentation.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Strong analytical and problem solving skills.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Color knowledge of printing industry is required.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">High responsibility, Can do attitude &amp; Strong teamwork</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">Willing to travel domestic &amp; overseas to deliver training and consultancy to printing customers.</span></span></span></span></li>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span arial=\"\" style=\"font-family:\">English fluently &ndash; spoken, listening and written</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-top:6.0pt; margin-right:0cm; margin-bottom:6.0pt; margin-left:0cm\"><span style=\"background:white\"><span style=\"line-height:18.0pt\"><b><span style=\"font-size:10.0pt\"><span arial=\"\" style=\"font-family:\"><span style=\"color:#333333\">Application</span></span></span></b><br />\r\n<span style=\"font-size:10.0pt\"><span arial=\"\" style=\"font-family:\"><span style=\"color:#333333\">Interested candidates should submit a cover Letter in English, an updated curriculum vita to: </span></span></span><span style=\"font-size:10.0pt\"><a><span arial=\"\" style=\"font-family:\">career@cppexglobal.org</span></a></span> <span style=\"font-size:10.0pt\"><span arial=\"\" style=\"font-family:\">or apply online by Sunday, 03-May-2020.</span></span></span></span><u><span roman=\"\" style=\"font-size:9.0pt;font-family:\">&nbsp;</span></u></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Sao Paulo- Brazil', '2020-04-03 15:52:48', '', 1),
(4, 'a', 'b', 'defaultbanner.png', '<p>e</p>\r\n', 'a', '2020-04-03 16:26:06', '', 1),
(5, 'b', 'b', 'defaultbanner.png', '<p>b</p>\r\n', 'b', '2020-04-03 16:26:29', '', 1),
(6, 'C', 'C', 'defaultbanner.png', '<p>C</p>\r\n', 'C', '2020-04-03 16:26:45', '', 1),
(7, 'D', 'D', 'defaultbanner.png', '<p>D</p>\r\n', 'D', '2020-04-03 16:27:10', '', 1),
(8, 'E', 'E', 'defaultbanner.png', '<p>E</p>\r\n', 'E', '2020-04-03 16:27:24', '', 1),
(9, 'F', 'F', 'defaultbanner.png', '<p>F</p>\r\n', 'F', '2020-04-03 16:27:44', '', 1),
(10, 'G', 'G', 'defaultbanner.png', '<p>G</p>\r\n', 'G', '2020-04-03 16:28:07', '', 1),
(11, 'H', 'H', 'defaultbanner.png', '<p>H</p>\r\n', 'H', '2020-04-03 16:28:26', '', 1),
(12, 'I', 'I', 'defaultbanner.png', '<p>I</p>\r\n', 'I', '2020-04-03 16:41:06', '', 1),
(13, 'J', 'J', 'defaultbanner.png', '<p>IJ</p>\r\n', 'J', '2020-04-03 16:41:22', '', 1),
(14, 'K', 'K', 'defaultbanner.png', '<p>IJK</p>\r\n', 'K', '2020-04-03 16:41:33', '', 1),
(15, 'L', 'L', 'defaultbanner.png', '<p>IJKL</p>\r\n', 'L', '2020-04-03 16:41:44', '', 1),
(16, 'M', 'M', 'defaultbanner.png', '<p>IJKLM</p>\r\n', 'M', '2020-04-03 16:41:54', '', 1),
(17, 'L', 'L', 'defaultbanner.png', '<p>IJKLM</p>\r\n', 'L', '2020-04-03 16:45:00', '', 1),
(18, 'M', 'M', 'defaultbanner.png', '<p>IJKLMM</p>\r\n', 'M', '2020-04-03 16:45:15', '', 1),
(19, 'N', 'N', 'defaultbanner.png', '<p>IJKLMMN</p>\r\n', 'N', '2020-04-03 16:45:27', '', 1),
(20, 'K', 'K', 'defaultbanner.png', '<p>IJKLMMNK</p>\r\n', 'K', '2020-04-03 16:45:40', '', 1),
(21, 'O', 'O', 'defaultbanner.png', '<p>IJKLMMNKO</p>\r\n', 'O', '2020-04-03 16:45:53', '', 1),
(22, 'P', 'P', 'defaultbanner.png', '<p>IJKLMMNKOP</p>\r\n', 'P', '2020-04-03 16:46:03', '', 1),
(23, 'Q', 'Q', 'defaultbanner.png', '<p>IJKLMMNKOPQ</p>\r\n', 'Q', '2020-04-03 16:46:16', '', 1),
(24, 'R', 'R', 'defaultbanner.png', '<p>IJKLMMNKOPQR</p>\r\n', 'QR', '2020-04-03 16:47:49', '', 1),
(25, 'New Testing', 'Testing', '4119694636652.jpg', '<p>Testing</p>\n', 'asdf', '2020-04-08 06:45:16', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_applicant`
--

CREATE TABLE `tbl_jobs_applicant` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `purposal` text COLLATE utf8_unicode_ci,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `applytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_jobs_applicant`
--

INSERT INTO `tbl_jobs_applicant` (`id`, `job_id`, `user_id`, `purposal`, `file`, `applytime`, `name`, `email`) VALUES
(1, 0, NULL, 'hello from me', '2811478971625.jpg', '2020-03-11 13:03:35', '', ''),
(2, 0, NULL, 'sjdksj', '4268696931345.jpg', '2020-03-11 13:07:51', '', ''),
(3, 1, NULL, 'sanson ki maala pa', '2363227031884.jpg', '2020-03-11 13:12:07', '', ''),
(4, 3, NULL, 'I want to apply for the position', '2716699364472.docx', '2020-04-03 16:19:04', '', ''),
(5, 1, NULL, 'iN NEED THIS JOB', '5048023720440.docx', '2020-04-03 16:51:20', '', ''),
(6, 2, NULL, 'i WANT THIS JOB', '1168832473600.docx', '2020-04-03 16:53:20', '', ''),
(7, 3, NULL, 'i WANT TO JOIN YOUR COMPANY', '3890293276144.docx', '2020-04-03 16:54:08', '', ''),
(8, 1, 1, 'i am website deveeloper', '1099637735427.png', '2020-04-13 11:53:59', 'waseem afzal', ''),
(9, 1, 1, 'i am software dev in php', '', '2020-04-13 11:58:13', 'waseem afzal', 'ceo.cyphersol@gmail.com'),
(10, 1, 1, 'Please give me job', '4224006265006.gif', '2020-04-13 12:00:13', 'waseem afzal', 'ceo.cyphersol@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jseeker`
--

CREATE TABLE `tbl_jseeker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `desiredsalary` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `careerlevel` varchar(100) NOT NULL,
  `totalexperience` varchar(10) NOT NULL,
  `about_you` tinytext NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `social` text NOT NULL,
  `eductaion` text NOT NULL,
  `experience` text NOT NULL,
  `skills` text NOT NULL,
  `cv_file` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jseeker`
--

INSERT INTO `tbl_jseeker` (`id`, `user_id`, `user_name`, `title`, `category_id`, `desiredsalary`, `gender`, `careerlevel`, `totalexperience`, `about_you`, `email`, `phone_no`, `dob`, `address`, `country`, `state`, `city`, `social`, `eductaion`, `experience`, `skills`, `cv_file`, `status`, `created_date`) VALUES
(2, 3, 'arsal231', 'Web devleoper89', 49, 450000, 0, 'Entry Level', '11', 'I have 6 years of experince  777        ', 'arslan.dev231@gmail.com', '79798789', '2019-05-17', 'huse no jh dkjash145 cs', 166, 2723, 31310, '{\"facebook\":\"Facebook.com\",\"google_plus\":\"Gooleplus.com\",\"twitter\":\"twiiter.com\",\"instagram\":\"instagram.com\",\"linkedin\":\"Linkiend.com\",\"dribbble\":\"Dribble.com\",\"web_url\":\"www.mywebc.omc\"}', '{\"institute\":[\"IUB\",\"BISE\"],\"degreetype\":[\"MCom\",\"BCom\"],\"from_date\":[\"05\\/17\\/2019\",\"\"],\"to_date\":[\"05\\/17\\/2019\",\"\"]}', '{\"employer_name\":[\"Oracle it solution\",\"Magic mayo\"],\"designation\":[\"Web developer\",\"\"],\"from_date\":[\"05\\/17\\/2019\",\"\"],\"to_date\":[\"05\\/17\\/2019\",\"\"],\"short_detail_role\":[\" i worked here as senioer php devleoper\",\"I devloper several web gere\"]}', '{\"skill_name\":[\"PHP\",\"CSS\",\"ROR\"],\"skills_percentage\":[\"88\",\"99\",\"45\"]}', '', 1, '2019-05-16 21:16:58'),
(7, 4, 'arslan-khan-dev', 'Other', 32, 18000, 2, 'Experienced Professional', '8', ' sadasdasdsadsa ', 'waseemddd@yahoo.com', '423423432423', '2019-05-17', 'dasdasdsadsad', 231, 3965, 48212, '{\"facebook\":\"\",\"google_plus\":\"\",\"twitter\":\"\",\"instagram\":\"\",\"linkedin\":\"\",\"dribbble\":\"\",\"web_url\":\"\"}', '{\"institute\":[\"\"],\"degreetype\":[\"\"],\"from_date\":[\"05\\/17\\/2019\"],\"to_date\":[\"05\\/17\\/2019\"]}', '{\"employer_name\":[\"\"],\"designation\":[\"\"],\"from_date\":[\"05\\/17\\/2019\"],\"to_date\":[\"05\\/17\\/2019\"],\"short_detail_role\":[\"\"]}', '{\"skill_name\":[\"\"],\"skills_percentage\":[\"\"]}', '', 1, '2019-05-16 22:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membershippackage`
--

CREATE TABLE `tbl_membershippackage` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `membership_id` varchar(10) NOT NULL,
  `hear_about` varchar(300) NOT NULL,
  `membership_type` int(2) NOT NULL,
  `package_info_admin` text NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_membershippackage`
--

INSERT INTO `tbl_membershippackage` (`id`, `user_id`, `membership_id`, `hear_about`, `membership_type`, `package_info_admin`, `payment_status`, `created_date`) VALUES
(1, 90, '', '{\"Friend\":\"on\",\"Emails\":\"on\"}', 1, '', 0, '2020-02-24 14:49:55'),
(2, 90, '', '{\"Friend\":\"on\",\"Emails\":\"on\"}', 1, '', 0, '2020-02-24 14:53:57'),
(3, 90, '', '{\"Website\":\"on\",\"Friend\":\"on\",\"Events\":\"on\"}', 1, '', 1, '2020-02-24 15:03:15'),
(4, 90, '', '{\"Website\":\"on\",\"Emails\":\"on\",\"Events\":\"on\"}', 1, '', 1, '2020-02-24 15:10:48'),
(5, 90, '', '{\"SocialMedia\":\"on\",\"Emails\":\"on\"}', 3, 'its our pleasure', 1, '2020-02-24 15:15:33'),
(6, 1, '360259408', '{\"Website\":\"on\"}', 4, '', 0, '2020-04-08 03:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_banner` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `title`, `page_banner`, `status`, `created_on`) VALUES
(1, 'Information technology', '3125489383734.png', 1, '0000-00-00 00:00:00'),
(8, 'Graphics & Design', '2493456821184.png', 1, '0000-00-00 00:00:00'),
(9, 'Professional SKills', '275824907225.jpg', 1, '0000-00-00 00:00:00'),
(10, 'Business', '2606939509752.jpg', 1, '0000-00-00 00:00:00'),
(11, 'Music and audio', '2003295980411.jpg', 1, '0000-00-00 00:00:00'),
(12, 'Video & Animation', '4570856126500.gif', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notify`
--

CREATE TABLE `tbl_notify` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read` int(11) NOT NULL,
  `type` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_notify`
--

INSERT INTO `tbl_notify` (`id`, `user_id`, `body`, `redirect_link`, `created_on`, `read`, `type`) VALUES
(0, 23918, 'You have New Order Now.', '', '2020-01-28 08:29:13', 0, b'0'),
(13, 1504, 'Hi, you have new Message.', '', '2019-12-18 11:43:12', 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_payments`
--

CREATE TABLE `tbl_order_payments` (
  `id` int(11) NOT NULL,
  `memship_id` int(10) NOT NULL COMMENT 'id of Table membership table',
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payer_country` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_payments`
--

INSERT INTO `tbl_order_payments` (`id`, `memship_id`, `txn_id`, `payment_gross`, `currency_code`, `payer_id`, `payer_name`, `payer_email`, `payer_country`, `payment_status`, `created`) VALUES
(5, 4, 'PAYID-LZJ5S3Y2UJ4086445945891F', 250.00, 'USD', 'L95YP7LT9R5V6', 'paypal busnissus', 'unsa.saleem.php@gmail.com', 'US', 'approved', '2020-02-24 14:10:55'),
(6, 5, 'PAYID-LZJ5VUA36949797XW7424612', 750.00, 'USD', 'L95YP7LT9R5V6', 'paypal busnissus', 'unsa.saleem.php@gmail.com', 'US', 'approved', '2020-02-24 14:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paypal_transactions`
--

CREATE TABLE `tbl_paypal_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trasaction_id` varchar(100) NOT NULL,
  `pay_key` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paystack_user_info`
--

CREATE TABLE `tbl_paystack_user_info` (
  `id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `account_name` varchar(200) NOT NULL,
  `recepient_no` varchar(200) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account_no` varchar(100) NOT NULL,
  `bank_code` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paystack_user_info`
--

INSERT INTO `tbl_paystack_user_info` (`id`, `user_id`, `account_name`, `recepient_no`, `bank_name`, `bank_account_no`, `bank_code`, `status`, `created_date`) VALUES
(1, 5, 'test 1', 'RCP_db342dvqvz9qcrn', 'Bank of Nigeria', '0000000000', '089', 1, '2019-11-14 00:00:00'),
(2, 4, 'test 2', 'RCP_iixyr9vnw07c8cf', 'Access Bank', '0000000000', '080', 1, '2019-11-30 00:00:00'),
(4, 3, 'Olbeee khan', 'RCP_uxbh2m3p932fil0', 'first bank of nigeria', '0024954456', '221', 1, '2019-11-22 10:03:23'),
(5, 333, 'Tolulope Aluko Abimbola', 'RCP_7z2vvy9hsasmxzt', 'first bank of nigeria', '2022215440', '011', 1, '2019-11-27 23:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_detail`
--

CREATE TABLE `tbl_personal_detail` (
  `id` int(11) NOT NULL,
  `memship_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_personal_detail`
--

INSERT INTO `tbl_personal_detail` (`id`, `memship_id`, `name`, `middle_name`, `last_name`, `email`, `mobile`, `fax`) VALUES
(1, 1, 'dasd', 'dasdasd', 'asdasd', 'addsadamin@admin.com', 'asdsa', 'dasdas'),
(2, 2, 'dasd', 'das', 'asdasdas', 'dsasaSAsd@admin.com', 'dsa', 'dasdas'),
(3, 3, 'perosnal name', 'asdas', 'last name', 'dasddddasdas@admin.com', '00889898989', 'dasdas'),
(4, 4, 'dasd', 'asdasdsa', 'dasda', 'sarasameen@yahoo.com', 'dasda', 'sdasdasd'),
(5, 5, 'dasdasd', 'dasdasd', 'dsfsdfs', 'herts991@gmail.com', 'dasda', 'sdasdasd'),
(6, 6, 'Imran', 'Hassan', 'Manzoor', 'imran.firstwebsol@gmail.com', '03464819017', 'hh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_professional_education_detail`
--

CREATE TABLE `tbl_professional_education_detail` (
  `id` int(11) NOT NULL,
  `memship_id` int(11) NOT NULL,
  `university` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `diploma` varchar(100) NOT NULL,
  `other` varchar(100) NOT NULL,
  `job_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_professional_education_detail`
--

INSERT INTO `tbl_professional_education_detail` (`id`, `memship_id`, `university`, `degree`, `diploma`, `other`, `job_detail`) VALUES
(1, 1, 'ewqeqwe', 'dasdas', 'fsdfsd', 'dasdasd', '{\"cname\":[\"das\",\"das\",\"sdas\"],\"position\":[\"das\",\"das\",\"das\"],\"period\":[\"dasd\",\"dada\",\"dasdasd\"]}'),
(2, 2, 'dsad', 'asd', 'asdas', 'dsadas', '{\"cname\":[\"dsada\",\"dasdas\",\"ChimpsStudio\"],\"position\":[\"web dev\",\"web dev3\",\"web dev\"],\"period\":[\"dasdsa\",\"dasdasd\",\"dad\"]}'),
(3, 3, 'dasd', 'asd', 'asdas', 'dasdasd', '{\"cname\":[\"ChimpsStudio\",\"dasd\",\"ChimpsStudio\"],\"position\":[\"SE\",\"web dev\",\"web dev\"],\"period\":[\"dasdasd\",\"1years\",\"1years\"]}'),
(4, 4, 'ewqeqwe', 'sdfs', 'fsdfsd', 'dasdasd', '{\"cname\":[\"dsa\",\"dasdas\",\"das\"],\"position\":[\"dasdasd\",\"dsad\",\"asdas\"],\"period\":[\"asdd\",\"asdasd\",\"d\"]}'),
(5, 5, 'dasdas', 'dsa', 'dasd', 'sadad', '{\"cname\":[\"das\",\"das\",\"sdasd\"],\"position\":[\"\",\"das\",\"as\"],\"period\":[\"dasdas\",\"dasdas\",\"dasdasdasd\"]}'),
(6, 6, 'qwwqqwqwqwwqw', 'asa', 'sss', 'sss', '{\"cname\":[\"First Web Solutions\"],\"position\":[\"ceo\"],\"period\":[\"2 years\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reffered_by`
--

CREATE TABLE `tbl_reffered_by` (
  `id` int(11) NOT NULL,
  `memship_id` int(11) NOT NULL,
  `refferby_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reffered_by`
--

INSERT INTO `tbl_reffered_by` (`id`, `memship_id`, `refferby_detail`) VALUES
(1, 1, '{\"reffredName\":\"dasdasd\",\"reffredCompanyName\":\"asd\",\"reffredaddress\":\"asdasd\",\"Suburb\":\"asdas\",\"reffredPhone\":\"dasd\",\"reffredEmail\":\"asdas\",\"State\":\"dasdas\",\"reffredZip\":\"dasd\",\"reffredWebsite\":\"asdasdas\"}'),
(2, 2, '{\"reffredName\":\"dasd\",\"reffredCompanyName\":\"asd\",\"reffredaddress\":\"sdasdas\",\"Suburb\":\"dasd\",\"reffredPhone\":\"asd\",\"reffredEmail\":\"adasdsa\",\"State\":\"dsa\",\"reffredZip\":\"da\",\"reffredWebsite\":\"dadada\"}'),
(3, 3, '{\"reffredName\":\"das\",\"reffredCompanyName\":\"eqweq\",\"reffredaddress\":\"dasdasda\",\"Suburb\":\"dasd\",\"reffredPhone\":\"asdasd\",\"reffredEmail\":\"adasdasd\",\"State\":\"dasdas\",\"reffredZip\":\"das\",\"reffredWebsite\":\"dasdasda\"}'),
(4, 4, '{\"reffredName\":\"dasdsad\",\"reffredCompanyName\":\"dasdsad\",\"reffredaddress\":\"asdasdsa\",\"Suburb\":\"asdasdasdasd\",\"reffredPhone\":\"asdas\",\"reffredEmail\":\"dasd\",\"State\":\"asd\",\"reffredZip\":\"asdasdsad\",\"reffredWebsite\":\"ss.com\"}'),
(5, 5, '{\"reffredName\":\"dasdsad\",\"reffredCompanyName\":\"asd\",\"reffredaddress\":\"asdasdas\",\"Suburb\":\"dasd\",\"reffredPhone\":\"3123131\",\"reffredEmail\":\"asdasdasd\",\"State\":\"zc\",\"reffredZip\":\"zxc\",\"reffredWebsite\":\"xzczxczxc\"}'),
(6, 6, '{\"reffredName\":\"Imran Manzoor\",\"reffredCompanyName\":\"First Web Solutions\",\"reffredaddress\":\"Office # 9, Second Floor, Al Hafiz Trade Center, Model Town Link Road\",\"Suburb\":\"Lahore\",\"reffredPhone\":\"03464819017\",\"reffredEmail\":\"imran.firstwebsol@gmail.com\",\"State\":\"Punjab\",\"reffredZip\":\"54000\",\"reffredWebsite\":\"ffff\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `id` int(11) NOT NULL,
  `no_of_persons` int(3) NOT NULL,
  `payment_total` double(10,2) NOT NULL,
  `discounted_price` double(10,2) NOT NULL,
  `price_now` double(10,2) NOT NULL,
  `personal_detail` text NOT NULL,
  `company_detail` text NOT NULL,
  `finanace_detail` text NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`id`, `no_of_persons`, `payment_total`, `discounted_price`, `price_now`, `personal_detail`, `company_detail`, `finanace_detail`, `payment_status`, `created_on`) VALUES
(19, 1, 0.00, 0.00, 0.00, '{\"name\":[\"Muhammad Ashfaq Sajid\"],\"email\":[\"m.sajid@cppexglobal.org\"],\"job_title\":[\"Director\"],\"phone\":[\"+923008464155\"],\"id_no\":[\"127174\"],\"nationality\":[\"Pakistani\"]}', '{\"name\":\"cppex global\",\"phone\":\"+923008464155\",\"address\":\"Pakistan\",\"country\":\"Pakistan\"}', '{\"name\":\"Abdullah Khan\",\"phone\":\"03008464555\",\"email\":\"mashfaq.dic@gmail.com\",\"position\":\"Finance Director\"}', 0, '2020-04-02 05:05:52'),
(20, 1, 0.00, 0.00, 0.00, '{\"name\":[\"Ashfaq\"],\"email\":[\"mashfaq.dic@gmail.com\"],\"job_title\":[\"Director\"],\"phone\":[\"+923008464155\"],\"id_no\":[\"127174\"],\"nationality\":[\"Pakistani\"]}', '{\"name\":\"cppex global\",\"phone\":\"03008464155\",\"address\":\"Pakistan\",\"country\":\"Pakistan\"}', '{\"name\":\"Ashfaq\",\"phone\":\"03008464555\",\"email\":\"m.sajid@cppexglobal.org\",\"position\":\"Finance Director\"}', 0, '2020-04-02 12:12:26'),
(21, 1, 0.00, 0.00, 0.00, '{\"name\":[\"Ashfaq\"],\"email\":[\"m.sajid@cppexglobal.org\"],\"job_title\":[\"Director\"],\"phone\":[\"+923008464155\"],\"id_no\":[\"127174\"],\"nationality\":[\"Pakistani\"]}', '{\"name\":\"cppex global\",\"phone\":\"+923008464155\",\"address\":\"Pakistan\",\"country\":\"Pakistan\"}', '{\"name\":\"Ashfaq\",\"phone\":\"+923008464155\",\"email\":\"m.sajid@cppexglobal.org\",\"position\":\"Finance Director\"}', 0, '2020-04-02 12:32:09'),
(22, 1, 0.00, 0.00, 0.00, '{\"name\":[\"Ashfaq\"],\"email\":[\"m.sajid@cppexglobal.org\"],\"job_title\":[\"Director\"],\"phone\":[\"+923008464155\"],\"id_no\":[\"127174\"],\"nationality\":[\"Pakistani\"]}', '{\"name\":\"cppex global\",\"phone\":\"+923008464155\",\"address\":\"Pakistan\",\"country\":\"Pakistan\"}', '{\"name\":\"Ashfaq\",\"phone\":\"+923008464155\",\"email\":\"m.sajid@cppexglobal.org\",\"position\":\"Finance Director\"}', 0, '2020-04-05 15:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review_rating`
--

CREATE TABLE `tbl_review_rating` (
  `id` bigint(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `service_id` bigint(11) NOT NULL,
  `review` mediumtext NOT NULL,
  `rating` int(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_review_rating`
--

INSERT INTO `tbl_review_rating` (`id`, `order_id`, `user_id`, `service_id`, `review`, `rating`, `created_date`) VALUES
(1, 78, 142, 33, 'good work..........................', 5, '2019-08-05 17:27:42'),
(2, 70, 3, 8, 'will hire you again.', 5, '2019-08-07 17:27:42'),
(3, 79, 3, 3, 'perfect work i will hir you again', 5, '2019-08-07 12:34:03'),
(4, 80, 142, 33, 'Good work will contact again if i need .', 5, '2019-08-30 05:38:08'),
(5, 85, 3, 76, 'trtrtrtrtrgb good', 4, '2019-09-02 05:48:21'),
(6, 86, 142, 33, 'ok good work', 4, '2019-09-02 15:34:49'),
(12, 88, 142, 1, 'you really did a great job will hire you again.', 5, '2019-09-04 05:42:35'),
(13, 89, 3, 76, 'well done', 4, '2019-09-05 16:56:51'),
(14, 96, 142, 19, 'well done boy', 5, '2019-09-15 01:50:41'),
(15, 97, 3, 457, 'Good work waseem', 5, '2019-11-19 20:47:21'),
(16, 98, 3, 457, 'nice work men, I will hire again.', 5, '2019-11-19 21:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller_balance`
--

CREATE TABLE `tbl_seller_balance` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `available_bal` float(10,2) NOT NULL,
  `total_withdrwal` float(10,2) NOT NULL,
  `total_bonus` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller_offer_to_request`
--

CREATE TABLE `tbl_seller_offer_to_request` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller_payment_account`
--

CREATE TABLE `tbl_seller_payment_account` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `order_type` int(1) NOT NULL COMMENT '1=normal,2=custom',
  `payment_method` int(1) NOT NULL COMMENT '1=paypal,2=stripe',
  `task_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=uncomplete, 1=complete',
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seller_payment_account`
--

INSERT INTO `tbl_seller_payment_account` (`id`, `order_id`, `buyer_id`, `seller_id`, `amount`, `order_type`, `payment_method`, `task_status`, `status`, `created_date`) VALUES
(0, 103, 23929, 23918, 20.00, 2, 1, 0, 1, '2020-01-28 13:29:13'),
(72, 95, 142, 3, 700.00, 2, 1, 0, 1, '2019-09-13 05:20:00'),
(73, 96, 142, 3, 18.00, 2, 1, 1, 1, '2019-09-14 13:42:29'),
(74, 97, 3, 7, 15.00, 2, 1, 1, 1, '2019-11-19 09:32:17'),
(75, 98, 3, 7, 10.00, 2, 1, 1, 1, '2019-11-19 10:01:34'),
(76, 99, 3, 7, 13.00, 2, 1, 0, 1, '2019-11-19 10:21:54'),
(77, 100, 3, 7, 18.00, 2, 1, 0, 1, '2019-11-19 10:33:02'),
(78, 101, 3, 7, 5.00, 2, 1, 0, 1, '2019-11-19 10:54:32'),
(79, 102, 3, 7, 9.00, 2, 1, 0, 1, '2019-11-19 10:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` bigint(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `service_keyword` varchar(1000) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `service_banner_pic` varchar(555) NOT NULL,
  `description` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `actualprice` double(10,2) NOT NULL,
  `delivery_time` varchar(100) NOT NULL,
  `additional_info` mediumtext NOT NULL,
  `status_by_admin` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '2',
  `rating` int(1) NOT NULL,
  `cat_level` int(1) NOT NULL DEFAULT '0',
  `featured` int(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_media`
--

CREATE TABLE `tbl_services_media` (
  `id` bigint(11) NOT NULL,
  `service_id` bigint(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `media` varchar(500) NOT NULL,
  `media_video` varchar(500) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_stats`
--

CREATE TABLE `tbl_services_stats` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `total_clicks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sidebarcontent`
--

CREATE TABLE `tbl_sidebarcontent` (
  `id` int(11) NOT NULL,
  `cms_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'noimg.png',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `resource_type` varchar(11) NOT NULL,
  `resource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sidebarcontent`
--

INSERT INTO `tbl_sidebarcontent` (`id`, `cms_id`, `title`, `description`, `url`, `start_date`, `end_date`, `image`, `created_on`, `status`, `resource_type`, `resource_id`) VALUES
(3, 7, 'Hello test dgs hdaks hdksajdh kas hdjsad', '', 'https://www.youtube.com/watch?v=anTzPInhewI&list=RDtDCLbuUpURM&index=2', '', '', '98341e0f13a64466fa60e2e315fb3a37.jpg', '2020-02-18 15:37:51', 1, '', 0),
(4, 7, 'Heddddddddddddddddddddd', '', 'http://locntent/edit/4/?cms_id=7', '', '', '1ebda7aedfac603646480566702d6c93.jpg', '2020-02-18 15:43:14', 1, '', 0),
(5, 7, 'dddd', '', 'https://www.skillsquared.com/freelancers', '', '', 'b86e8b5c74d0936141a1260eed28d78e.jpg', '2020-02-18 15:47:24', 1, '', 0),
(6, 7, 'Heddddddddddddddddddddd', '', 'view-source:http://localhost/cpxglobal/sidebarcontent/edit/4/?cms_id=7', '', '', '84e4b0c50b6bc18d5c058bde879b2e53.jpg', '2020-02-18 15:49:22', 1, '', 0),
(7, 1, 'fffffffffffffffffff', '', 'ww.google.com/search?sxsrf=ACYBGNQKhtaNyXhEKmH-Wbt', '', '', 'a025b6009ed4a5b17bbf7190d12c91fa.jpg', '2020-02-18 15:51:23', 1, '', 0),
(8, 1, 'dasdasdas', '', 'https://www.skillsquared.com/stagingss/freelancers', '', '', '25d5f31a69b9fc047d18d8d90598f29d.jpg', '2020-02-18 18:26:01', 1, '', 0),
(9, 3, 'fdsfsfsdfsdf', '', 'https://www.skillsquared.com/stagingss/freelancers', '', '', '241b27f5b367cb38045f773921eda7ae.jpg', '2020-02-18 18:27:02', 1, '', 0),
(10, 9, 'award', '', '', '', '', 'cfff4568781af8f7f8c9843d2ae55bb7.jpg', '2020-02-25 11:39:01', 1, '', 0),
(11, 9, 'Advertising & PR', '', '', '', '', '973780f0abb3337b79e23b37295ae078.jpg', '2020-02-25 11:39:22', 1, '', 0),
(12, 21, 'CYLINDER QUALITY MANAGEMENT', '', '', '', '', '731afcab5ca00c1e85aebe251a9f0f3e.jpg', '2020-02-26 13:02:08', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` bigint(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`id`, `menu_id`, `title`, `status`, `created_on`) VALUES
(4, 1, 'Digital Marketing', 1, '0000-00-00 00:00:00'),
(5, 1, 'Writing and Translation', 1, '0000-00-00 00:00:00'),
(6, 1, 'Programing and tech', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`email`, `status`, `hash`, `created_at`, `id`) VALUES
('muhammad.ashfaq@rpi.rdu.sa', 0, '', '2020-03-07 14:51:54', 1),
('ceo.cyphersol@gmail.com', 0, '', '2020-04-09 08:29:43', 2),
('imran.firstwebsol@gmail.com', 0, '', '2020-04-13 14:42:13', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'defaultbanner.png',
  `post_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `title`, `designation`, `post_banner`, `post_description`, `created_on`) VALUES
(1, 'Eng. Rami Joudeh Alzaro', 'Print Automation Expert', '4775d5be3c509cbeccc6e0591d80b721.png', '<p>Color Management Expert Color Management Expert</p>\n', '2020-03-30 10:16:44'),
(6, 'Ms. Marina Lauisana', 'Communication Manager', 'e713cae201d371999ce3f092b5af3292.jpg', '<p>Communication Manager Communication Manager</p>\n', '2020-04-02 12:22:26'),
(7, 'Mrs. Anne Jorget', 'Flexo Printing Expert', 'bd52cd7b6d416dac3fa134dbf13e8f41.png', '<p>Flexo Printing Expert Flexo Printing Expert</p>\n', '2020-04-02 12:27:55'),
(8, 'Ms. Anastazja Jaworska', 'Prepress Expert', '506e7f9c4447e6c19185d65023a2cd73.jpg', '<p>Prepress Expert Prepress Expert Prepress Expert</p>\n', '2020-04-02 12:29:08'),
(9, 'Mr. John Williams', 'Flexo printing Expert', '2075852265872.jpg', '<p>Flexo printing Expert Flexo printing Expert Flexo printing Expert</p>\r\n', '2020-04-02 12:30:08'),
(10, 'Mr. James David Harris', 'Rotogravure Print Expert', 'e1b1e4ccf545e79fcfa1936b57fcf1ee.png', '<p>Rotogravure Print Expert Rotogravure Print Expert Rotogravure Print Expert Rotogravure Print Expert</p>\n', '2020-04-02 12:33:20'),
(11, 'Dr. Ambreen Khan', 'Packaging Law’s expert', '434517661942.jfif', '<p>Packaging Law&rsquo;s expert Packaging Law&rsquo;s expert</p>\r\n', '2020-04-02 12:34:43'),
(12, 'Dr. Sylvia Benjamin', 'Packaging Materials Expert', '943569408110.jpg', '<p>Packaging Materials Expert Packaging Materials Expert Packaging Materials Expert Packaging Materials Expert</p>\r\n', '2020-04-02 12:35:38'),
(13, 'Dr. Michael J. Lewis', 'UHT & Aseptic Packaging Expert', '859581791630.png', '<p>UHT &amp; Aseptic Packaging Expert UHT &amp; Aseptic Packaging Expert UHT &amp; Aseptic Packaging Expert</p>\r\n', '2020-04-02 12:36:38'),
(14, 'Dr. Henna Mufti', 'Print Digitalization expert', '4822512171353.jpg', '<p>Print Digitalization expert Print Digitalization expert Print Digitalization expert</p>\r\n', '2020-04-02 12:37:13'),
(15, 'Dr. David R. Nelson', 'Paperboard Expert', 'e004f04110d03f39fa3021487a5573a2.jpg', '<p>Paperboard Expert Paperboard Expert Paperboard Expert</p>\n', '2020-04-02 12:38:19'),
(16, 'Dr. Andreas Grabitz', 'Consumer Packaging Expert', '810359732469.png', '<p>Consumer Packaging Expert Consumer Packaging Expert Consumer Packaging Expert</p>\r\n', '2020-04-02 12:39:39'),
(17, 'Mr. Atif Rasheed', 'Color Management Expert', '4640142219944.jpg', '<p>Color Management Expert Color Management Expert Color Management Expert</p>\r\n', '2020-04-02 12:40:44'),
(18, 'Alixhan Ahmed (ACA)', 'Finance Director', '4424469527880.jfif', '<p>Finance Director Finance Director Finance Director</p>\r\n', '2020-04-02 12:42:52'),
(19, 'Ms. Zeinab Hayek', 'Office Manager', '3747586808603.jpg', '<p>Office Manager&nbsp;</p>\r\n', '2020-04-03 20:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `amount`, `created_date`) VALUES
(1, 10, '2019-04-02 00:00:00'),
(2, 20, '2019-04-18 00:00:00'),
(3, 30, '2019-04-06 00:00:00'),
(4, 50, '2019-03-09 00:00:00'),
(5, 10, '2019-02-09 00:00:00'),
(6, 100, '2019-02-02 00:00:00'),
(7, 20, '2019-01-09 00:00:00'),
(8, 40, '2019-01-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainer`
--

CREATE TABLE `tbl_trainer` (
  `id` int(11) NOT NULL,
  `trainer_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `recommended_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trainer`
--

INSERT INTO `tbl_trainer` (`id`, `trainer_id`, `name`, `speciality`, `phone`, `mobile`, `email`, `city`, `country`, `recommended_by`, `created_at`) VALUES
(2, 'TRID191983', 'Ashfaq', 'Color consultant', '551619623', '551619623', 'm.sajid@cppexglobal.org', 'Riyadh', 'ksa', 'Linkedin', '2020-04-05 18:31:07'),
(3, 'TRID761176', 'Zeinab', 'flexo', '923008464155', '923008464155', 'z.hayek@cppexglobal.org', 'Lahore', 'Pakistan', 'Linkedin', '2020-04-05 18:32:01'),
(4, 'TRID190408', 'Sajjad', 'Roto', '923008464155', '923008464155', 's.anwer@cppexglobal.org', 'Lahore', 'Pakistan', 'Linkedin', '2020-04-05 18:32:39'),
(5, 'TRID180987', 'Sajid', 'packaging', '923008464155', '923008464155', 'info@cppexglobal.org', 'Lahore', 'Pakistan', 'Linkedin', '2020-04-05 18:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `id` int(11) NOT NULL,
  `course_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'random id',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'defaultbanner.png',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_at` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end_at` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `all_day` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `on_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_on` datetime NOT NULL,
  `fees` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_training`
--

INSERT INTO `tbl_training` (`id`, `course_id`, `title`, `short_heading`, `post_banner`, `description`, `start_at`, `end_at`, `all_day`, `location`, `on_date`, `end_date`, `created_on`, `fees`) VALUES
(1, 'GC0092', 'Print automation and Digitalization', 'dsadasdasdasdsad', '2474254188203.jpg', '<p>dAL;JFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFAAAAAAAAAAAA</p>\n\n<p>AKKKKKKKKKKKKKKK</p>\n\n<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', '08:00', '05:00', 'All day', 'USD $ 375', '2020-03-24', '0000-00-00', '2020-03-26 08:06:24', ''),
(2, 'CG0201', 'Cylinder Quality Management', '', '156998493135.jpg', '<p style=\"margin-bottom:.0001pt\"><span style=\"line-height:normal\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">COURSE OVERVIEW:</span></span></span></p>\r\n\r\n<p style=\"margin-bottom:10.5pt; text-align:justify\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Achieving predictable print results with high accuracy, full automation, cost efficiency and accomplish consistent colour reproduction are the challenging expectations of clients in the rotogravure printing industry. This increasing demands of customer only attainable when print manufacturer has superlative accuracy of engraved cylinders that are vulnerable to defects such as stylus broken, shoe lines, cell depth variation, cell missing, thundering, centre out, pin holes, bludges, patches, during the engraving process resulted into degradation of quality as well as rejection of cylinders.</span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"> This one day training session addresses various topics on cylinder engraving and quality management through hands-on activities</span></span></span> <span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">accompanied with case studies, presentations and discussion suitable anyone in operations, quality, sales, customer service and marketing etc. associate with gravure printing industry</span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"> and at the end participants will leave the class with a strong understanding of the advance learning skills of cylinder quality management and be able to troubleshoot a variety of cylinder related issues upon return to their respective facility.</span></span></span></span></span></p>\r\n\r\n<p><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">TRAINING CONTENTS:</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Gravure printing, impact of engraved cylinder on print performance, cylinder structure, category, composition and properties.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Steps involve in preparation of best quality engraved cylinders, critical process parameters, variables and engraving patterns.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Cylinders engraving workflow, chemical etching, electromechanical engraving and direct ablation of Gravure cylinders.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Engraving cylinder axis, shaft, diameter, circumference, face length </span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">and electroplating to engrave high quality cylinders.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Measurement of the actual engrave cell opening, depth and cell volume on copper, and subsequently chrome cells, to control quality and consistency during the manufacturing process</span></span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"line-height:115%\"><strong><span style=\"font-size:9.0pt\"><span style=\"background:white\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Effects of engraving cell depth, cell wall, opening, bridge, cell angle and composition of cylinder and process Specifications.</span></span></span></span></strong></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Relation of cell size to dot size, ink transfer from cell, </span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Moir&eacute; Effect and cell specifications impact on print quality and production</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Engraved cylinders defects <span style=\"background:white\">visualizing and measuring in detail the performance of the engraving process to further improve quality consistency</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Gravure ink formulation, substrate selection, doctor blades angle and composition on the performance of engraved cylinders.</span></span></span> </span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Best safe practices and techniques for handling, transportation and storage of engraved cylinders in workplace.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\">&nbsp;</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">WHO SHOULD ATTEND?</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Plant Management</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Print Supervisor | Manager</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">QHSE supervisor | Manager</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Quality Control Technicians</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Ink and chemicals suppliers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Prepress and Graphic Designers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Ink room technicians / Ink matchers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Printing &amp; Packaging Technologists.</span></span></span> </span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Sales and Customer Service Representatives</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Printers/laminators/ slitters Operators and Helpers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Those new to the prepress and gravure printing &nbsp;industry </span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-bottom:10.5pt\"><span style=\"background:white\"><span style=\"vertical-align:baseline\">&nbsp;</span></span></p>\r\n\r\n<p style=\"margin-bottom:10.5pt\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">LEARNING OUTCOMES:</span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Effective understanding of cylinder quality management, </span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">better planning and inventory management of cylinders for refurbishment.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Evaluate the increase brand owner satisfaction and loyalty resulted to Increase converter competitiveness and profitability</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Able to identify and eliminate or replace defected engraved cylinders that would require unnecessary ink adjustment and enhance cost saving.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Able to effectively monitoring of the engraved cylinder for condition and effectiveness of the cleaning system at workplace</span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Apply his knowledge and skills to reduce ink and substrate waste through reduce ink matching and press set up time.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Able to identify the engraving critical parameters and variables to increase job profitability and Increase press productivity</span></span></span><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Standardize the engraving cylinders quality variables, ink formulations and press parameters for consistent gravure printing.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Implement the SOPs and standards as per ISO requirements and machine centerlines effectively in gravure printing industry.</span></span></span></span></li>\r\n</ul>', '08:00', '05:00', '', 'Dubai- UAE', '2020-06-15', '2020-06-16', '2020-04-02 12:02:44', '...'),
(3, 'CG0202', 'Doctor Blade Quality Management', '', '3155830282370.jpg', '<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">COURSE OVERVIEW: </span></span></span></span></p>\r\n\r\n<p style=\"margin-bottom:.0001pt; text-align:justify\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Today, the doctor blade is recognized as an integral process element of the printing press. Investing a few minutes in proper positioning, installation, chamber alignment, orientation, angle and pressure of doctor blade chamber set-up will be more worth deal than hauling the anilox scoring, poor safety record, short blade life, UV ink spitting, in-consistent print. <span style=\"border:none windowtext 1.0pt; font-family:&quot;Arial&quot;,&quot;sans-serif&quot;; padding:0cm\">Blade positioning, orientation, angle and pressure&nbsp;will&nbsp;affect the delivery of a precise amount of ink to the plate and proper installation will give the printer control over consistent, repeatable print quality, <span style=\"color:#333333\">metering more precisely, eliminating print defects, extending your blade life, printing cleaner dots longer, avoiding mid-run press stops, reducing annual doctor blade spend, preventing premature anilox roll/cylinder wear and triming customer complaints from print defects. </span></span>This one day training session is designed as &ldquo;doctor blade &amp; print management&rdquo;, suitable for anyone involved in the printing and packaging industry and provides a structured learning environment to explore advanced concepts of doctor blade materials, selection, installation, handling, troubleshooting and addresses various topics through hands-on activities, exercises, case studies accompanied with presentations and discussion.</span></span></span></p>\r\n\r\n<p><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">TRAINING CONTENTS:</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade, composition, categories, key process elements, materials makeup, evolution and doctor blade retrospectives.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade types, selections, Installation, positioning, orientation, angle, pressure and doctor blade-chamber alignment.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade shape, size, width, edge profiles &amp; thickness, contact angle, pre-set angle, contact area manipulation and how to inspect the doctor blade quality. &nbsp;</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Blade edge configuration, setting procedures, tip configuration, Nip distance and blade holder configuration.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Impact of doctor blade on ink metering, dot gain, ink film thickness, and relationship with anilox line screen &amp; volume for print optimization.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Back doctoring, effects of back doctoring on print quality, practices to prevent back doctoring and tree barking.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Chamber end seal types, composition, selection, corrective installation, impact on the print quality and how to increase life of end seal during processing.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade problems, different ink systems, impact on print quality, doctor blade related print defects, causes and remedies.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Correct procedure and best practices for using, cleaning, safe handling, inventory, risk management of doctor blade.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade environmental impact during production, transportation, storage and utilization during printing process.</span></span></span></span><span style=\"line-height:115%\">&nbsp;</span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">WHO SHOULD ATTEND?</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Plant Management</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Print Supervisor | Manager</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">QHSE supervisor | Manager</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">NPD supervisor | Manager</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Quality Control Technicians</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Ink and chemicals suppliers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Prepress and Graphic Designers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Ink room technicians / Ink matchers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Printing &amp; Packaging Technologists.</span></span></span> </span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Sales and Customer Service Representatives</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Printers/laminators/ slitters Operators and Helpers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Those new to the prepress, graphic and printing&nbsp; industry </span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-bottom:10.5pt\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">LEARNING OUTCOMES:</span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Understanding of doctor blade role in printing, its materials, categories, composition and retrospectives.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Understand how to select and install the doctor blade at proper position, orientation, angle, doctor blade-chamber alignment. </span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Identify the potential causes, possible remedies for some well know doctor blade patterns using in the printing industry.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Able to identify the doctor blade safety hazards, effects and consideration when working around printing and paper machine. </span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Identify the proper correlation between doctor blades, anilox screen, chamber adjustment to improve print consistency and blade/ anilox longitivity. </span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Able to reduce the blade related defects, machine downtime by achieving higher print quality from job to job and improving customer retention as well as gaining new customers.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Identify the correct edge, angle, tip, holder configuration and nip pressure in order to print the job with perfect dot gain, ink film thickness and preventing back doctoring.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Implement the SOPs, checklists and standards as per ISO requirements and machine centerlines effectively in the graphic and printing industry.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"line-height:115%\">&nbsp;</span></p>', '08:00', '05:00', '', 'Lahore- Pakistan', '2020-06-26', '2020-06-27', '2020-04-02 12:19:23', ''),
(4, 'CG0202', 'Doctor Blade Quality Management', '', 'defaultbanner.png', '<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">COURSE OVERVIEW: </span></span></span></span></p>\r\n\r\n<p style=\"margin-bottom:.0001pt; text-align:justify\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Today, the doctor blade is recognized as an integral process element of the printing press. Investing a few minutes in proper positioning, installation, chamber alignment, orientation, angle and pressure of doctor blade chamber set-up will be more worth deal than hauling the anilox scoring, poor safety record, short blade life, UV ink spitting, in-consistent print. <span style=\"border:none windowtext 1.0pt; font-family:&quot;Arial&quot;,&quot;sans-serif&quot;; padding:0cm\">Blade positioning, orientation, angle and pressure&nbsp;will&nbsp;affect the delivery of a precise amount of ink to the plate and proper installation will give the printer control over consistent, repeatable print quality, <span style=\"color:#333333\">metering more precisely, eliminating print defects, extending your blade life, printing cleaner dots longer, avoiding mid-run press stops, reducing annual doctor blade spend, preventing premature anilox roll/cylinder wear and triming customer complaints from print defects. </span></span>This one day training session is designed as &ldquo;doctor blade &amp; print management&rdquo;, suitable for anyone involved in the printing and packaging industry and provides a structured learning environment to explore advanced concepts of doctor blade materials, selection, installation, handling, troubleshooting and addresses various topics through hands-on activities, exercises, case studies accompanied with presentations and discussion.</span></span></span></p>\r\n\r\n<p><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">TRAINING CONTENTS:</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade, composition, categories, key process elements, materials makeup, evolution and doctor blade retrospectives.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade types, selections, Installation, positioning, orientation, angle, pressure and doctor blade-chamber alignment.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade shape, size, width, edge profiles &amp; thickness, contact angle, pre-set angle, contact area manipulation and how to inspect the doctor blade quality. &nbsp;</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Blade edge configuration, setting procedures, tip configuration, Nip distance and blade holder configuration.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Impact of doctor blade on ink metering, dot gain, ink film thickness, and relationship with anilox line screen &amp; volume for print optimization.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Back doctoring, effects of back doctoring on print quality, practices to prevent back doctoring and tree barking.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Chamber end seal types, composition, selection, corrective installation, impact on the print quality and how to increase life of end seal during processing.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade problems, different ink systems, impact on print quality, doctor blade related print defects, causes and remedies.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Correct procedure and best practices for using, cleaning, safe handling, inventory, risk management of doctor blade.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Doctor blade environmental impact during production, transportation, storage and utilization during printing process.</span></span></span></span><span style=\"line-height:115%\">&nbsp;</span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"line-height:115%\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">WHO SHOULD ATTEND?</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"margin-bottom:.0001pt\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Plant Management</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Print Supervisor | Manager</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">QHSE supervisor | Manager</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">NPD supervisor | Manager</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Quality Control Technicians</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Ink and chemicals suppliers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Prepress and Graphic Designers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Ink room technicians / Ink matchers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Printing &amp; Packaging Technologists.</span></span></span> </span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Sales and Customer Service Representatives</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Printers/laminators/ slitters Operators and Helpers</span></span></span></span></span></li>\r\n	<li style=\"margin-bottom:.0001pt\" value=\"5\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Those new to the prepress, graphic and printing&nbsp; industry </span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-bottom:10.5pt\"><span style=\"background:white\"><span style=\"vertical-align:baseline\"><span style=\"font-size:10.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">LEARNING OUTCOMES:</span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Understanding of doctor blade role in printing, its materials, categories, composition and retrospectives.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Understand how to select and install the doctor blade at proper position, orientation, angle, doctor blade-chamber alignment. </span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Identify the potential causes, possible remedies for some well know doctor blade patterns using in the printing industry.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Able to identify the doctor blade safety hazards, effects and consideration when working around printing and paper machine. </span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Identify the proper correlation between doctor blades, anilox screen, chamber adjustment to improve print consistency and blade/ anilox longitivity. </span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Able to reduce the blade related defects, machine downtime by achieving higher print quality from job to job and improving customer retention as well as gaining new customers.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\" value=\"5\"><span style=\"background:white\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Identify the correct edge, angle, tip, holder configuration and nip pressure in order to print the job with perfect dot gain, ink film thickness and preventing back doctoring.</span></span></span></span></li>\r\n	<li value=\"5\"><span style=\"line-height:115%\"><span style=\"font-size:9.0pt\"><span style=\"line-height:115%\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Implement the SOPs, checklists and standards as per ISO requirements and machine centerlines effectively in the graphic and printing industry.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"line-height:115%\">&nbsp;</span></p>', '08:00', '05:00', '', 'Lahore- Pakistan', '2020-07-14', '2020-07-15', '2020-04-02 12:23:32', ''),
(5, 'CG0203', 'a', '', '5122819002250.png', '<p>aaaaaaaaaaaaaaaaaaaaaaa</p>', '13:51', '15:54', '', 'Lahore- Pakistan', '2020-04-04', '2020-05-08', '2020-04-04 10:54:35', '$ 500.00'),
(6, 'CG0205', 'B', '', '1029322050845.jpg', '<p>B</p>', '14:59', '14:59', '', 'Multan-Pakistan', '2020-04-04', '2020-04-07', '2020-04-04 11:00:05', '$ 600'),
(7, 'CG0206', 'C', '', 'defaultbanner.png', '<p>c</p>', '15:00', '15:00', '', 'Karachi', '2020-04-04', '2020-04-04', '2020-04-04 11:00:48', '$ 700'),
(8, 'CG0207', 'D', '', '1094348625690.jpg', '<p>D</p>', '15:01', '15:01', '', 'Pattoki', '2020-04-04', '2020-04-04', '2020-04-04 11:01:41', '$ 800'),
(9, 'CG0209', 'F', '', '4651776087938.jfif', '<p>F</p>', '15:08', '15:08', '', 'Quetta- Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:09:46', '$ 500.00'),
(10, 'CG0208', 'G', '', '4580405699952.jfif', '<p>G</p>', '15:10', '15:10', '', 'Jehlam-Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:10:54', '$ 500.00'),
(11, 'CG0210', 'H', '', '4378982505942.jpg', '<p>H</p>', '15:12', '15:12', '', 'Multan-Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:13:41', '$ 500.00'),
(12, 'CG0211', 'J', '', '1787436958671.jpg', '<p>J</p>', '15:13', '15:13', '', 'Malir- Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:14:33', '$ 500.00'),
(13, 'CG0212', 'K', '', '5290944148488.png', '<p>K</p>', '15:33', '15:33', '', 'Pattoki- Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:33:53', '$ 500.00'),
(14, 'CG0212', 'L', '', '3990412459356.png', '<p>L</p>', '15:34', '15:34', '', 'Quetta- Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:34:51', '$ 500.00'),
(15, 'CG0213', 'M', '', '4448771020320.png', '<p>M</p>', '15:35', '15:36', '', 'Riyadh- KSA', '2020-04-04', '2020-04-04', '2020-04-04 11:37:04', '$ 500.00'),
(16, 'CG0214', 'N', '', '1662143447520.jpg', '<p>N</p>', '15:38', '15:38', '', 'Jeddah- KSA', '2020-04-04', '2020-04-04', '2020-04-04 11:39:00', '$ 500.00'),
(17, 'CG0215', 'P', '', '5140273979764.jpg', '<p>P</p>', '15:39', '15:39', '', 'Dammam- KSA', '2020-04-04', '2020-04-04', '2020-04-04 11:40:04', '$ 500.00'),
(18, 'CG0215', 'Q', '', '3658936277406.jfif', '<p>Q</p>', '15:40', '15:40', '', 'Alkharj- KSA', '2020-04-04', '2020-04-04', '2020-04-04 11:40:58', '$ 500.00'),
(19, 'CG0216', 'R', '', '1316392370320.jfif', '<p>R</p>', '15:41', '15:41', '', 'Alqateef-KSA', '2020-04-04', '2020-04-04', '2020-04-04 11:41:43', '$ 500.00'),
(20, 'CG0216', 'S', '', '4098262816848.jpg', '<p>RS</p>', '15:43', '15:43', '', 'Qaseem-KSA', '2020-04-04', '2020-04-04', '2020-04-04 11:43:42', '$ 500.00'),
(21, 'CG0217', 'T', '', '2191872825358.jfif', '<p>RST</p>', '15:43', '15:43', '', 'Multan-Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:44:29', '$ 500.00'),
(22, 'CG0218', 'U', '', '4545519376910.jfif', '<p>U</p>', '15:45', '15:45', '', 'Dammam- KSA', '2020-04-04', '2020-04-04', '2020-04-04 11:45:35', '$ 500.00'),
(23, 'CG0219', 'V', '', '3486061363442.jfif', '<p>UV</p>', '15:44', '15:45', '', 'Quetta- Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:46:18', '$ 500.00'),
(24, 'CG0220', 'W', '', '3051493314064.png', '<p>UVW</p>', '15:46', '15:46', '', 'Lahore- Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:47:15', '$ 500.00'),
(25, 'CG0221', 'X', '', '3865119225175.jfif', '<p>UVWX</p>', '15:47', '15:47', '', 'Lahore- Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:47:55', '$ 800'),
(26, 'CG0222', 'Y', '', '2748564544361.jfif', '<p>UVWXY</p>', '15:48', '15:48', '', 'Quetta- Pakistan', '2020-04-04', '2020-04-04', '2020-04-04 11:48:37', '$ 800'),
(27, 'CG0223', 'Z', '', '3129208305280.jfif', '<p>UVWXYZ</p>', '15:48', '15:48', '', 'Dammam- KSA', '2020-04-04', '2020-04-04', '2020-04-04 11:49:19', '$ 500.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `user_id`, `service_id`, `created_date`) VALUES
(3, 3, 3, '2019-07-20 13:11:51'),
(4, 142, 1, '2019-07-20 18:58:08'),
(6, 142, 6, '2019-07-27 13:28:55'),
(9, 3, 2, '2019-07-27 19:09:37'),
(10, 142, 57, '2019-07-31 14:41:34'),
(11, 6, 7, '2019-08-15 19:01:27'),
(12, 4, 37, '2019-08-15 19:30:08'),
(13, 3, 5206, '2019-11-21 13:31:57'),
(14, 3, 5202, '2019-11-21 13:33:00'),
(15, 3, 5203, '2019-11-21 13:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `text` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `text`, `description`, `image`) VALUES
(1, 'Alvin R. Fuentes - Elopak', 'We extremely pleased with the services CPPEx Global has provided. They are professional, personable, resourceful, and always willing to help meet our training needs. ', 'd3948a91d273746016f5db897e1fd112.png'),
(2, 'John David - DIC Group Asia Pacific', 'I am quite impressed with the CPPEx Global’s team technical expertise. All of the trainers were excellent, extremely professional and knowledgeable and created positive learning environments. \r\n\r\n', '97acfa06249dd38725e38c7935cf56b9.png'),
(3, 'William', 'Nice platform to  recruit and to show best experience', '3480e24504ec73ffe64b1b16389b61e5.jpg'),
(4, 'Shanley', 'A certified website for all services', 'c1ce06fb85047bfc64fc77e2adc4f5a5.jpg'),
(5, 'Shabeer Ali- Nadec Foods', 'I found the course “Packaging Materials & Global Standards” extremely useful, I got a lot from it, the trainer was very good and there were a number of areas I found very beneficial.', '5bc564506219610503b73371c3b0d58c.png'),
(6, 'waseem afzal', 'Good website good services good quality', '91c1cdbb425eab12c9996d46db65110b.jpg'),
(7, 'waseem afzal', 'cppex global  changed my life', '40afe43136cdee0a3620bf46682726ce.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'noimg.png',
  `address` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `devicetype` varchar(255) NOT NULL,
  `social_id` varchar(255) NOT NULL,
  `social_type` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL COMMENT 'direct office no',
  `lang` varchar(100) NOT NULL,
  `cnic` varchar(200) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL COMMENT 'mobile or cell number',
  `freelancer_address` text NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT '0',
  `ip_address` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `viewpw` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `upw_hash` varchar(255) DEFAULT NULL,
  `currency_id` int(6) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `online` int(11) NOT NULL,
  `referal_code` varchar(300) NOT NULL,
  `last_active_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timezone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `image`, `address`, `latitude`, `longitude`, `city`, `postal_code`, `user_type`, `device_id`, `devicetype`, `social_id`, `social_type`, `added_by`, `phone`, `lang`, `cnic`, `mobile`, `freelancer_address`, `active`, `ip_address`, `password`, `viewpw`, `country`, `upw_hash`, `currency_id`, `salt`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `online`, `referal_code`, `last_active_timestamp`, `timezone`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'aa15619fa75aa1d5a6365abe084b1e0b.jpg', 'gdfgfdgd', 0, 0, '', '', 1, '', '', '', '', 1, '432423424', '', '', NULL, '', 1, '127.0.0.1', '$2y$08$o9XFDISHmj6WplNgr8mJMO9qNWR6PeNSqkKkEQrALsENjSD/WhxZy', '', '', NULL, 0, NULL, '5cad950f70d26', NULL, NULL, NULL, 1554879759, 1586789743, 0, '1561378476MTU2MTM3ODQ3Ng108861088009d10beac73c57', '2019-12-02 09:12:12', ''),
(5, 'arslan khan', 'arsal231-1379', 'arsal231@hotmail.com', 'noimg.png', '', 0, 0, '', '', 2, '', '', '', '', 0, '234234234', '', '', NULL, '', 1, '127.0.0.1', '$2y$08$q.Q1PD/XMQuqwoJJAFoO6e/kNGPe2sHWu3H83cdLccZSBxDoCtEAW', '', '', NULL, 0, NULL, '5e541e9190df1', NULL, NULL, NULL, 1582571153, 1582573046, 0, '1582571153MTU4MjU3MTE1Mw18717187175e541e9190df1', '2020-02-24 19:05:53', ''),
(6, 'arslan khan', 'arslandev231-16780', 'arslan.dev231@gmail.com', 'noimg.png', '', 0, 0, '', '', 2, '', '', '', '', 0, '234234234', '', '', NULL, '', 1, '127.0.0.1', '$2y$08$U0FX2bcC.YwOvCix/kMvZeArvRvTjZR2O6j1DjyR9lbl13l4/7beu', '', 'Pakistan', NULL, 0, NULL, '5e541f8945e01', NULL, NULL, NULL, 1582571401, NULL, 0, '1582571401MTU4MjU3MTQwMQ943894385e541f8945e01', '2020-02-24 19:10:01', ''),
(7, 'waseem afzal', 'ceocyphersol-1654687948', 'ceo.cyphersol@gmail.com', 'noimg.png', '', 0, 0, '', '', 2, '', '', '', '', 0, '03417090031', '', '', NULL, '', 1, '::1', '$2y$08$.iqPvRYG5jwVzb34nAcOoePAvwqo7fgkmZBXH8.u05JPM3TN609hK', '', 'Pakistan', NULL, 0, NULL, '5e55024508917', NULL, NULL, NULL, 1582629445, 1582629455, 1, '1582629445MTU4MjYyOTQ0NQ10414844104148445e55024508cff', '2020-02-25 11:17:25', ''),
(8, 'Ashfaq', 'msajid-1412745052', 'm.sajid@cppexglobal.org', 'noimg.png', '', 0, 0, '', '', 2, '', '', '', '', 0, '923008464155', '', '', NULL, '', 1, '78.95.136.153', '$2y$08$P8i/Z.VnFr4iBEf9J54fyOaK4NuWzTKJu/Yw4UsjVi40ckNH9TH0W', '', 'Pakistan', NULL, 0, NULL, '5e94a12e7b825', NULL, NULL, NULL, 1586798894, 1586798927, 1, '1586798894MTU4Njc5ODg5NA1012902801012902805e94a12e7b86b', '2020-04-13 17:28:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_routes`
--
ALTER TABLE `app_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_user_session`
--
ALTER TABLE `app_user_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_users`
--
ALTER TABLE `archive_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogpost_comments`
--
ALTER TABLE `blogpost_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_types`
--
ALTER TABLE `cat_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdata`
--
ALTER TABLE `customerdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_cat`
--
ALTER TABLE `faq_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeboxes`
--
ALTER TABLE `homeboxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstatustitles`
--
ALTER TABLE `orderstatustitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_card_detail`
--
ALTER TABLE `order_card_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_chat`
--
ALTER TABLE `order_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_files`
--
ALTER TABLE `order_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product_detail`
--
ALTER TABLE `order_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postal_code`
--
ALTER TABLE `postal_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_extra_group`
--
ALTER TABLE `product_extra_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_awarddata`
--
ALTER TABLE `tbl_awarddata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_certificate_data`
--
ALTER TABLE `tbl_certificate_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_childmenu`
--
ALTER TABLE `tbl_childmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_detail`
--
ALTER TABLE `tbl_company_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobs_applicant`
--
ALTER TABLE `tbl_jobs_applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_membershippackage`
--
ALTER TABLE `tbl_membershippackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_payments`
--
ALTER TABLE `tbl_order_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paypal_transactions`
--
ALTER TABLE `tbl_paypal_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paystack_user_info`
--
ALTER TABLE `tbl_paystack_user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_personal_detail`
--
ALTER TABLE `tbl_personal_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_professional_education_detail`
--
ALTER TABLE `tbl_professional_education_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reffered_by`
--
ALTER TABLE `tbl_reffered_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_review_rating`
--
ALTER TABLE `tbl_review_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seller_balance`
--
ALTER TABLE `tbl_seller_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seller_offer_to_request`
--
ALTER TABLE `tbl_seller_offer_to_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seller_payment_account`
--
ALTER TABLE `tbl_seller_payment_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services_media`
--
ALTER TABLE `tbl_services_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services_stats`
--
ALTER TABLE `tbl_services_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sidebarcontent`
--
ALTER TABLE `tbl_sidebarcontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trainer`
--
ALTER TABLE `tbl_trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_routes`
--
ALTER TABLE `app_routes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `app_user_session`
--
ALTER TABLE `app_user_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_users`
--
ALTER TABLE `archive_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blogpost_comments`
--
ALTER TABLE `blogpost_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cat_types`
--
ALTER TABLE `cat_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customerdata`
--
ALTER TABLE `customerdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_cat`
--
ALTER TABLE `faq_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homeboxes`
--
ALTER TABLE `homeboxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderstatustitles`
--
ALTER TABLE `orderstatustitles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_card_detail`
--
ALTER TABLE `order_card_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_chat`
--
ALTER TABLE `order_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_files`
--
ALTER TABLE `order_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product_detail`
--
ALTER TABLE `order_product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postal_code`
--
ALTER TABLE `postal_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_awarddata`
--
ALTER TABLE `tbl_awarddata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_certificate_data`
--
ALTER TABLE `tbl_certificate_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_company_detail`
--
ALTER TABLE `tbl_company_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_jobs_applicant`
--
ALTER TABLE `tbl_jobs_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_membershippackage`
--
ALTER TABLE `tbl_membershippackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order_payments`
--
ALTER TABLE `tbl_order_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_personal_detail`
--
ALTER TABLE `tbl_personal_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_professional_education_detail`
--
ALTER TABLE `tbl_professional_education_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_reffered_by`
--
ALTER TABLE `tbl_reffered_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_sidebarcontent`
--
ALTER TABLE `tbl_sidebarcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_trainer`
--
ALTER TABLE `tbl_trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
