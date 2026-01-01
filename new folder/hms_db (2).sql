-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 09:15 AM
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
-- Database: `hms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `admin_level` int(10) NOT NULL DEFAULT 2,
  `email` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `username`, `password`, `admin_level`, `email`, `section`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '1'),
(7, 'ammar', 'fed5de04cbba88aae4fa4b1d370dde5c', 2, 'ammar_ali@gmail.com', ''),
(8, 'ali', '86318e52f5ed4801abe1d13d509443de', 3, 'ali_ali@gmail.com', '1'),
(9, 'malek', '13d78dac7eea692d57ba98d1858cb5a9', 2, 'malek_ali@gmail.com', ''),
(10, 'maher', '25cc7feba935c54fcfc05a79609abfba', 3, 'maher_robe@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sessions`
--

CREATE TABLE `admin_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logged_in` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `login_time` varchar(255) DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_sessions`
--

INSERT INTO `admin_sessions` (`id`, `logged_in`, `username`, `session`, `login_time`, `admin_id`) VALUES
(1, '42a9ba1a810d55ae2e0aeca17ffacaa3', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'dde974d66a46e51a4b7ded3a2a4c195d', 1),
(2, '0038a821b9d89c78a84608088097d4e6', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '17fb74eb002e33257cfb2d9b2aab83df', 1),
(3, 'b55eb846b58eec7d2da6d075ddd4f895', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '7baa28d376c0edf9289d763a7c8deca5', 1),
(4, 'e6ec5ddb97d3b572436ac5bf90ecfc82', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '2f67729ab370040e7f4155b540bfba2f', 1),
(5, '5bda9187162ad30b7de7ecb5d5b36f3a', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '89ff0138d3ae3f774cb0ed8d2a8d0df8', 1),
(6, 'd2f1c99cedff683902d881afa293edb3', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'b2ed9b7cc34ffa0a0650716bcd0e0c43', 1),
(7, 'b6c7b359139316901c50dc9a8198e241', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'f1a656c64ebc9967d7a473daea0b0c29', 1),
(8, '37059ab3cf46573d61a0c861ee4970e6', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '12ea6df1dca8759d3b5a866ee8175d63', 1),
(9, 'deaf25a520e13468d4cd84d6ea6256f1', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '7d3257bdf1f832226a2fffebf50b8324', 1),
(10, '6ec75284b0944d65279c39d50844870b', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'a6c400e36190a1b415cd69fb19e375bc', 1),
(11, '9ff7b0293497073c6bdd7c6855161436', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'e52d747f3fbb46129ccc5b9a708005d4', 1),
(12, '1d3c1d8f63ad24d0a95f93ff35a0fa93', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '499da7cc7b99d115d003e471c01a4241', 1),
(13, 'a41235eb8f52e20391b68d71b9619d35', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '20e75038f6a749aeb2e1a209a58d6459', 1),
(14, '0c8a64b5dceac2fc1790116d08bb6be3', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '2102c1a9903d6332b23d86b196efc027', 1),
(15, 'b4668f6c51700ffce43ae5d45b1acda7', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '32d7f31efea9c7c5fae5eaa04ce8fe8d', 1),
(16, '39145ea47029c5504e91c1c82d2d4a41', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '845ef2aa1b485a87f953c26d5e28f4d3', 1),
(17, '1d2c9ac0e45b97db204e446f683591a2', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'c092bd6590bc977daf8d3df5b95e22b2', 1),
(18, 'b8801e21a7eca950c4654ac948ab77c1', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '486fd759f7ab0ea0983165f8b60c8e5a', 1),
(19, '84113965f49e3bec3436703c5bd81d22', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '09a40d4429c71563bc2c3db719c83a75', 1),
(20, '55960dfc98a0c1969b5a40eefb036c70', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '9514b14136d544b3f08d9a23d96ac5bd', 1),
(21, '6f985531bb6b2f8d8908bcdfb97ca4b5', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'b4ad8a30e03a8fc4be2d89ea77279e65', 1),
(22, 'd29509ea24a4733d33410610a671998a', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'f8fa8ccf7bf8a15a985b1609ae9aeb62', 1),
(23, 'bbf6b1783aa61ececdfddadbdbc4288f', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '9cdd6a46f15d49ccab5d477257910134', 1),
(24, '5d11cc1e154b9169c90b2406b69766da', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '9d7ba8667e1696f007e4a5b80f99b153', 1),
(25, '3e587a3183f753c11368a7bc24fa5df9', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'd0fe6ff714e5053f1a7e562e1357b48d', 1),
(26, '44f9f3b1f406cf2674ce892eff07484b', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'bb660b93a084d5346e88bff2b3684d41', 1),
(27, 'f442abddc8aa64d5b7ef06b5f44ca635', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '2c446864102927d8c84b870150820e8f', 1),
(28, '7508979ee8aa7778c37ff79d7d9a3f95', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '65bf5e874a6124158c0569f55b4138a9', 1),
(29, '1b06e86c93a5730e25b3977d2afd9d3c', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '3ed87994c9c8a0492b31f5f3ab0d0bbb', 1),
(30, 'b00f4aea085b24ceabf1c5860966df13', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '1caee4e9f6eede4381ff648f32ac7c64', 1),
(31, '903082bf6bb2eb0ef52afc05c291c2c3', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '381964c2925c6e7aaa286d3bbad16330', 1),
(32, 'f3461b3931497c7235668b0aef842ace', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '4de4d13d4c4e16d7d4d843470bf56462', 1),
(33, '5e2eb82bedd494b8414f35f52642b08c', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'c17a9561e9a36dceaf604569e1bdcf79', 1),
(34, '9e2f33ede81706db4acaaf5f762b4204', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '42dfa6fdee9c396800673fadd2acf410', 1),
(35, '0b63054a7ca4f14a426b83d94219cabd', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '04b39c26402cb5c2f81f9e3f65ac230b', 1),
(36, 'dc174172de1508caaf25fb65ad28c618', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '2269a503ac74d06134eb7c9ac6115f8e', 1),
(37, '7c5a28d2e4e55eacb66e3b58f63a6e3b', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '80643333fc0fa31342b0ebfc6bb03d37', 1),
(38, 'cfae778d77fc0a3590e8996d14c56076', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'fd6ffcfb946d5b87cfc9bf22c39a80e7', 1),
(39, '99976869684d3979a0846d199d6c09a3', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '5e8c0bc29a0064fc715fed7e12084170', 1),
(40, '11f894dd76e367af836582e85de507b3', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '8a912649870b6fc7508ee447d6177e60', 1),
(41, 'c81f5c4acff3dd4d371ba08e84aa81ad', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'faa0a189b14e6b6d4644d24ffcb9d68f', 1),
(42, '5aa535c32dc6a5773dbaa90ee6c13273', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '640fc7dab0102099e0077505aaecd249', 1),
(43, 'eda2b832b449ec85e7806847aaa8278a', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'dbcaaee9c56bfc1510355975c39b5b82', 1),
(44, '477a26b926e57b208972f341b7851821', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '7771a3dbce860bd058542aea4815b49c', 1),
(45, 'bf4cc67a820780d19f76c82dd867d6bd', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '0c9cf6936ad0dee76b57d47938236827', 1),
(46, '20275fe94b553dff64262bafa4a90814', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'ff0e4beefd78a6a0014bd7d2368f7857', 1),
(47, 'de8c127b945b9f50c30cc4ea5ecfd8e9', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '6c1fe25c08b79411024904552c6effa9', 1),
(48, 'f7f700d9d157d4e220732a88cc047f05', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '381b5db6eede8227d62f53daa4f2885a', 1),
(49, 'c4c129a1c5dc426efe14d377949aae5d', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'de2d5738365f202ca8d66729590dafaf', 1),
(50, '5626873060212a30983d7d47817e5563', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '4766455ab04aad8b771c80d6a85d29b1', 1),
(51, '0671ef4b108fd79b275deca3542e864d', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '42ccb53628944e040f1f7a92ac8a2dc6', 1),
(52, 'e53ce6b327f1a451a0f518ca33dd5d64', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '47ff27587eee775d9b30da4a0e554351', 1),
(53, 'bc55cef52aab221b548be3cba3a6a636', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '50b9eaf5eb7b79fce8c1e0bd345c8ad7', 1),
(54, 'd9b853aa483bb5b1b12728c5e19fe1a5', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '38d51d120747063911b84f980c7ef22b', 1),
(55, '13b9493f05c7276e6fccfa4fb5f0dca2', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'f5ad2cb462ecf14eeaea5e6603ee2454', 1),
(56, '12f83841a1a665b67c4026f4d297f7ff', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '102094c47f95873d453475f7d1b8d05c', 1),
(57, 'fe47ed4a26a4f8b2a3381b3e78bbac9b', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '648c04cf779cd555dd54578672eed96e', 1),
(58, '5f09ebe59abd12e2276759e0393c4586', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'e0bf94ccd848b239a4ed7cbaf185fb1f', 1),
(59, 'ed18b3561a53ed0236c6478433669580', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'a33e415e82b4c0cdd0658390c4ccf238', 1),
(60, 'bd316e32817f0365cbc3887f38f55b7c', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '039984be307af909771eb98343f22d84', 1),
(61, '6038bd2503222650dd0f05d1bba99984', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'fa3ba77ce47a1544f4ae7edd7ba46e84', 1),
(62, 'f7a93c75e185035623e9361c742da75b', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'b2a659776a9882a89a4d7584a3f15ac0', 1),
(63, 'cb1d9e79049fd7b645edbe4ae287a690', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '16723ee46fc91b39c738ff6af98aa60f', 1),
(64, '94204deaf848a8aee80ac2b4672d4df2', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '1403aa94e9ba37466f4439dad628660e', 1),
(65, '17fc3ae425e2f5597fadd0a48393e08d', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '4af62905252a2b767db8b5b8cf40e714', 1),
(66, '34c3003955a463aec7243ae717b14fbd', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'b58cb89181b5d51b0382752f08d97bea', 1),
(67, '1dc70b6b56cb3c67d1857cd66610f289', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'd8bebe6910eec9d4ab0ae49ed46a105f', 1),
(68, 'f9a2e0928c9f8a8d312843ebbdcd60ae', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '0898edc8a220e6a63b5ab36c79dd96ed', 1),
(69, '1febb3fc07e88b7438518f4bce79bebe', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'e5ed567e464a5543dd653fd55c24f54d', 1),
(70, '74574962969f2ed242b24b757fc86bd6', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'b41763057e44c1737a049329706c3e88', 1),
(71, '309aa80048997937bb1b5a36ff34903a', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '83776651d33f5285c080bffa3b16df32', 1),
(72, '1e47360be6b8cc37e9cd57905e1773d1', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'a8e8f6eaa60359823ce22c68cfefc37c', 1),
(73, 'f7938ca04b7e047928ca6cd09b9322c4', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'eee0aa7e962bdf4db22ca1b162cabe9e', 1),
(74, '0d58484c36b2d46d67f5dd5a95c4ea3a', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'f4c797e126d52ab32ec3296c8f0267db', 1),
(75, '8a16c72bf4cc20c70399a246b5a0c416', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'cfd795403c868c0345f6cdf16276d957', 1),
(76, '15b974ba3771d3fe5acad8db631efb39', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '83020602ecc36809f303d586f2b30784', 1),
(77, '9672fa84302f1444ffd1f8bcd577af61', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '1640952a99dd18e01c1c759136e27967', 1),
(78, 'f0af41c796cba1a09f3835246f8d16ca', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '3a95b140ff688987f961eed9810c1fb0', 1),
(79, '0a9f021f7b31004d538b9e6705e058d4', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '07019bc9912ff304e8bb3ff7ab6fb775', 1),
(80, '2f8f7987cbac7cb53d276353a98fdff7', 'ali', 'ca9d2001c6ac82b244e0b8e1554bf26a', '037cfa0ce2d3869b9ee31a5a5e4262f7', 8),
(81, '88a0eef0852cd2125a3142006af0c17b', 'ammar', 'cf152cc3b69f48e142a75f027dcfd997', '3f92c9eb96cec079af17096a6c2773ce', 7),
(82, 'e03eaf22515ca336e417fcca4085c521', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '5d33678cde41ee34e831a0b35922c6d0', 1),
(83, '8fcbffb5d2e7393b4b9050f639e5abaa', 'ammar', 'cf152cc3b69f48e142a75f027dcfd997', 'e98c404cc4ca2963c15b1a32ffd3f1aa', 7),
(84, 'c17db92660fadd130f035dda984b5f59', 'ali', 'ca9d2001c6ac82b244e0b8e1554bf26a', '8bd3ae755265ecde439323dcb3e19042', 8),
(85, '80fa1f95511b603e99a0dde5dbbd64cc', 'ali', 'ca9d2001c6ac82b244e0b8e1554bf26a', 'd765b73cc5e27609e7f4664b663f3952', 8),
(86, '8206da4da0d632faf8afd4511b94690c', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '69531cf9dac6250477b8cba175cf5d84', 1),
(87, 'e0c369fc0680179341880fcf62243608', 'ali', 'ca9d2001c6ac82b244e0b8e1554bf26a', 'f678dc091ac50ea6a2a62aa2f3bfaa91', 8),
(88, '3819686667c3b4f963ac5368482a1e38', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '8e714ec0461854f0f890270553c21c25', 1),
(89, 'fcb9a0c821a81fb4255185c357d08a20', 'ammar', 'cf152cc3b69f48e142a75f027dcfd997', '44db9c496ad3928a244035c26a9367f8', 7),
(90, '6e9fd5855b5710654b2b56b9a1a275c9', 'ali', 'ca9d2001c6ac82b244e0b8e1554bf26a', 'bd40c9b5d927056c01ac2976d77dc47c', 8),
(91, '6b03e10608a19f012db186916c044531', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '8ea115485410a3cad358c59a13fe8c72', 1),
(92, '807562b507b45fb19a0ff956b6305ebf', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '5cc6019a0c86e5279e5110bed2b9621a', 1),
(93, '37b4c4d52507791d38310f29f2820796', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '72f850fd1f44b73515146511d1ea0b7c', 1),
(94, 'b66e2ae26e85ecc98dfbe4b67839af86', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '72717cb45a4908a3f9106fbb0dcca5aa', 1),
(95, '1725394ef16fb8fb06206a6d6722328d', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'bffb5b59bdf453580f0876f0ef0f8ae5', 1),
(96, '64a765921368606eec5b29f7a472673b', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'a0d80ced3e10611db7b36408f9d694f2', 1),
(97, 'a26dfccb433a6337f36411a44a6355f1', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '1cdaed36a46bb1662798aa28f7a4fc00', 1),
(98, 'f4ff3b4a4068a93f1aec8180eaefdbe1', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'a3212d42b36281e712b14406c4f4b2e3', 1),
(99, '795d145a4ab2d27bb029014e2694c08c', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '0270d48e61914584966692d7d86f16fb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `creation_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `doctor_id`, `date`, `time`, `section`, `cost`, `status`, `creation_date`) VALUES
(1, 1, 8, '2025-12-15', '13:27', '1', 70.00, 'accepted', '19999999'),
(2, 3, 0, '2025-12-15', '13:46', '1', 53.90, '', '19999999999'),
(3, 3, 0, '2025-12-15', '13:42', '1', 0.00, '', '1765795350');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `age` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `creation_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `firstname`, `lastname`, `gender`, `email`, `phone`, `note`, `age`, `status`, `address`, `creation_date`) VALUES
(1, 'khaled', 'mhana', 'male', 'kha@gmail.com', '098888676', NULL, '32', 'checked out', 'jaramana', '1655705930'),
(2, 'shakeel', 'oneel', 'male', 'sha@gmail.com', '090900', NULL, '43', 'checked out', 'jaramana', '1655705930'),
(3, 'karlos', 'noura', 'male', 'jaj@mail.com', '09333333333', 'far at the first floor', '18', 'checked out', 'damascus', '1655705930');

-- --------------------------------------------------------

--
-- Table structure for table `patient_photos`
--

CREATE TABLE `patient_photos` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `creation_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_photos`
--

INSERT INTO `patient_photos` (`id`, `patient_id`, `image`, `section`, `creation_date`) VALUES
(5, 1, '176584378041.jpg', '1', '1765843747'),
(6, 2, '176587018231.jpg', '1', '1765870182');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `medicine_fee` decimal(10,0) NOT NULL,
  `reservation_fee` decimal(10,0) NOT NULL,
  `status` varchar(255) NOT NULL,
  `illness` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `creation_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `patient_id`, `admin_id`, `room_id`, `medicine_id`, `medicine_fee`, `reservation_fee`, `status`, `illness`, `note`, `creation_date`) VALUES
(1, 3, 1, 1, 4, 0, 0, '', '11', '11', '155555555');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `creation_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `status`, `creation_date`) VALUES
(1, 'Radiography', 'open', '1765791968');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_sessions`
--
ALTER TABLE `admin_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_photos`
--
ALTER TABLE `patient_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_sessions`
--
ALTER TABLE `admin_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patient_photos`
--
ALTER TABLE `patient_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
