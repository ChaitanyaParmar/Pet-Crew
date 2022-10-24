-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 07:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `img` varchar(50) NOT NULL,
  `doj` date DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `fullname`, `email`, `password`, `address`, `contactno`, `gender`, `img`, `doj`, `role`) VALUES
(1, 'adminChaitanya', 'Chaitanya Parmar', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', '7990424285', 'Male', '1.jpeg', '2022-01-08', 1),
(2, 'deliveryManager', 'Chaitanya Parmar', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', '7990424285', 'Male', '', '2022-03-12', 7);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `aid` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `bid` int(11) NOT NULL,
  `petname` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `appdate` date NOT NULL,
  `apvdate` datetime DEFAULT NULL,
  `details` varchar(100) NOT NULL,
  `did` int(5) DEFAULT NULL,
  `tid` int(5) DEFAULT NULL,
  `gid` int(5) DEFAULT NULL,
  `msID` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`aid`, `uid`, `fullname`, `contactno`, `address`, `bid`, `petname`, `age`, `appdate`, `apvdate`, `details`, `did`, `tid`, `gid`, `msID`, `status`) VALUES
(1, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 2, 'Frieza', '2', '2022-02-24', '2022-03-22 16:15:44', 'He is getting weaker and weaker everyday.', 1, NULL, NULL, NULL, 3),
(3, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 17, 'John', '0', '2022-02-20', NULL, 'He is acting weird.', 2, NULL, NULL, NULL, 1),
(4, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 12, 'Coco', '0', '2022-02-21', '2022-03-24 17:15:57', 'I need my dog to look clean and smart.', NULL, NULL, 1, NULL, 3),
(5, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 20, 'Goldie', '0', '2022-02-25', NULL, 'I need my dog to use spa and have a nice hair grooming.', NULL, NULL, 3, NULL, 0),
(6, 2, 'Vraj Patel', '9106562546', '21, Vatsalyam-1, On Shilaj to Suramya-7 Road, Shil', 17, 'Joe', '0', '2022-02-20', NULL, 'He has illness since past 2 days.', 7, NULL, NULL, NULL, 0),
(7, 2, 'Vraj Patel', '9106562546', '21, Vatsalyam-1, On Shilaj to Suramya-7 Road, Shil', 19, 'Jiggy', '2', '2022-02-19', NULL, 'I want to make my dog friendly and disciplined', NULL, 2, NULL, NULL, 0),
(8, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 1, 'John', '3', '2022-02-24', '2022-03-24 18:17:43', 'This is a test.', NULL, 1, NULL, NULL, 1),
(9, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 20, 'Rio', '0', '2022-02-27', '2022-03-22 16:10:58', 'I want to do a regular checkup.', 1, NULL, NULL, NULL, 1),
(10, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 39, '', '0', '0000-00-00', '2022-03-24 18:18:22', '', NULL, 1, NULL, NULL, 2),
(11, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 18, 'jonny', '1', '2022-03-15', NULL, 'hello', NULL, 1, NULL, NULL, 0),
(12, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 16, 'jerry', '0', '2022-03-27', '2022-03-22 16:27:14', 'lol', 1, NULL, NULL, NULL, 1),
(13, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 3, 'Frieza', '0', '2022-03-26', NULL, 'hsadlfhasdahfhjalf', 2, NULL, NULL, NULL, 0),
(14, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 20, 'Cookie', '0', '2022-03-25', '2022-03-22 23:20:11', 'I want to do a regular checkup\r\n', 4, NULL, NULL, NULL, 2),
(15, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 3, 'Bhuro', 'Puppy', '2022-03-24', '2022-03-22 23:28:29', 'Hello', 4, NULL, NULL, NULL, 2),
(16, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 17, 'Julie', 'Adult', '2022-03-24', '2022-03-22 23:54:15', 'Hello', 4, NULL, NULL, NULL, 3),
(17, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 17, 'Mickey', '3', '2022-03-26', '2022-03-24 16:35:44', 'Hello', NULL, NULL, 1, NULL, 2),
(18, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 12, 'Bhuro', '3', '2022-03-25', '2022-03-24 16:52:38', 'hello', NULL, NULL, 1, NULL, 2),
(19, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 12, 'Julie', 'Adult', '2022-03-25', '2022-03-24 16:54:08', 'hello', 1, NULL, NULL, NULL, 2),
(20, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 16, 'Cookie', '2', '2022-03-26', '2022-03-24 16:57:59', ',.bnbk.jb', NULL, NULL, 1, NULL, 2),
(21, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 14, 'Bhuro', '1', '2022-03-26', '2022-03-24 17:05:03', 'qwsfvdjkwfgk', NULL, NULL, 1, NULL, 2),
(22, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 18, 'jerry', '4', '2022-03-26', '2022-03-24 17:45:14', 'kb,kb', NULL, NULL, 1, NULL, 1),
(23, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 18, 'Julie', '3', '2022-03-26', NULL, 'ghjkadg', NULL, 1, NULL, NULL, 0),
(24, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 2, 'Test', 'Junior', '2022-04-30', '2022-04-01 12:08:23', 'Hello', 1, NULL, NULL, NULL, 1),
(25, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 6, 'tommy', 'Senior', '2022-04-22', NULL, 'hello', 1, NULL, NULL, NULL, 0),
(26, 3, 'Kevin Patel ', '9327288935', 'Government Polytechnic Ahmedabad', 18, 'tommy', '2', '2022-04-21', NULL, 'hello', NULL, NULL, 1, NULL, 0),
(27, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 14, 'Test', 'Puppy', '2022-04-02', NULL, 'Hello', 1, NULL, NULL, NULL, 0),
(28, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 14, 'Test', 'Puppy', '2022-04-02', '2022-04-01 13:07:25', 'Hello', 1, NULL, NULL, NULL, 1),
(29, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 1, 'Julie', 'Junior', '2022-04-03', '2022-04-01 14:11:39', 'hello', 1, NULL, NULL, NULL, 1),
(30, 1, 'Chaitanya Parmar', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Mane', 15, 'Test', 'Adult', '2022-04-15', '2022-04-01 14:30:38', 'hello', 1, NULL, NULL, NULL, 1),
(31, 3, 'Kevin Patel ', '9327288935', 'Government Polytechnic Ahmedabad', 16, 'Test', 'Mature', '2022-04-24', '2022-04-01 15:16:35', 'helo', 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `bid` int(11) NOT NULL,
  `bname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`bid`, `bname`) VALUES
(1, 'German Shepherds'),
(2, 'Boxer'),
(3, 'Labrador Retriever'),
(4, 'Bulldog'),
(5, 'Golden Retriever'),
(6, 'Poodle'),
(7, 'Shih Tzu'),
(8, 'Pug Dog'),
(9, 'English Mastiff'),
(10, 'Maltese Dog'),
(11, 'Border Collie'),
(12, 'English Cocker Spaniel'),
(13, 'Bull Terrier'),
(14, 'Pomeranian'),
(15, 'Australian Cattle Dog'),
(16, 'Boston Terrier'),
(17, 'Chow Chow'),
(18, 'Newfoundland'),
(19, 'Basset Hound'),
(20, 'English Springer Spaniel'),
(21, 'Alaskan Malamute'),
(22, 'St. Bernard'),
(23, 'Miniature Schnauzer'),
(24, 'German Short haired Pointer'),
(25, 'American Eskimo Dog'),
(26, 'Bernese Mountain Dog'),
(27, 'Airedale Terrier'),
(28, 'Affenpinscher'),
(29, 'Beagle'),
(30, 'Dachshund'),
(31, 'Rottweiler'),
(32, 'Azawakh'),
(33, 'Afghan Hound'),
(34, 'Mixed Breed'),
(35, 'Great Dane'),
(36, 'Siberian Husky'),
(37, 'Indian Spitz'),
(38, 'Rajapalayam'),
(39, 'Not Specified');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `cuid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `msg` mediumtext NOT NULL,
  `dop` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`cuid`, `uid`, `name`, `email`, `contact`, `msg`, `dop`, `status`) VALUES
(1, 1, 'Chaitanya Parmar', 'chaitanya1164m@gmail.com', '7990424285', 'This site is very nice.', '2022-03-12', 1),
(2, 1, 'Chaitanya Parmar', 'chaitanya1164m@gmail.com', '7990424285', 'This site has almost everything a pet owner needs. Loved it!', '2022-03-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy`
--

CREATE TABLE `deliveryboy` (
  `dbid` int(5) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryboy`
--

INSERT INTO `deliveryboy` (`dbid`, `fullname`, `contactno`, `email`, `address`) VALUES
(1, 'Jignesh Mawani', '9816177103', 'jignesh153@gmail.com', '88, Giridhar Nagar Society, Shyamal Four Cross Road, Satellite, 380015.'),
(2, 'Manish Patel', '9467004565', 'manishpatel@gmail.com', '801,shivam flats,jodhpur cross road,stellite,380015'),
(3, 'Mayur Dave', '8867884566', 'md241331@gmail.com', '34,kamal park society , vastral-382418');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `doj` date DEFAULT NULL,
  `occupation` varchar(45) NOT NULL,
  `experience` int(11) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `gvc_no` int(11) NOT NULL,
  `dimg` varchar(100) DEFAULT NULL,
  `cname` varchar(255) NOT NULL,
  `caddress` varchar(150) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `isapprove` tinyint(1) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `uname`, `fullname`, `contactno`, `gender`, `email`, `pwd`, `doj`, `occupation`, `experience`, `qualification`, `gvc_no`, `dimg`, `cname`, `caddress`, `img`, `isapprove`, `rate`, `role`) VALUES
(1, 'drgautam', 'Dr. Gautam Patel', '47068823', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Physician', 5, 'BVSc & AH', 1580, NULL, 'Dr. Gautams Dog Clinic And Hospital', '26, Swastik Park Society, B/H Nirma University I.O.C, Tragad Rd, Chandkheda, Ahmedabad, Gujarat - 382470.', '1.jpg', 2, NULL, 2),
(2, 'drkishor', 'Dr. Kishor Transadiya', '26580361', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Physician & Surgeon', 13, 'BVSc & AH', 1385, NULL, 'Pet Plus Hospital', '1st Floor, Gold Coin Complex, Nr. Jodhpur Cross Roads, Satellite Road, Satelite,  Ahmedabad, Gujarat-380015.', '2.jpg', 2, NULL, 2),
(3, 'drtina', 'Dr. Tina Giri', '9624036599', 'Female', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Physician', 19, 'BVSc & AH, MVSc(Med.)', 3621, NULL, 'Pet Set Go Clinic', '206, Akshar Complex, Near Harit Zaveri Jewellers, Shivranjini Cross Road, Satellite, Ahmedabad - 380015.', '3.jpg', 2, NULL, 2),
(4, 'drchirag', 'Dr. Chirag Dave', '40059855', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Physician & Surgeon', 26, 'BVSc & AH', 2572, NULL, 'Dr. Chirag Daves Pets Clinic', 'GF-1 Ravija Plaza, Beside Times Square Arcade, Thaltej - Shilaj Rd, Thaltej, Ahmedabad, Gujarat - 380054.', '4.jpeg', 2, NULL, 2),
(5, 'drdeepika', 'Dr. Deepika Rishi', '8487806668', 'Female', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Physician & Surgeon', 17, 'BVSc & AH', 7361, NULL, 'Avs Pet Clinic & Pet Shop', 'Shop No 27/28 60, Nalanda Complex, Judges Bunglow Road, Near Mansi Circle, Vastrapur, Ahmedabad, Gujarat - 380015.', '5.jpeg', 2, NULL, 2),
(6, 'drritesh', 'Dr. Ritesh Patel', '9913143333', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Physician', 17, 'BVSc & AH, MVSc', 6283, NULL, 'Bluecross Pet Clinic', 'Shop No R/11, Kenyug Shopping Center, Shyamal to Manek Baug Road, Near Shyamal Cross Road, Satellite, Ahmedabad, Gujarat - 380015.', '6.jpg', 2, NULL, 2),
(7, 'drhiren', 'Dr. Hiren Thakkar', '47069543', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Surgeon', 20, 'BVSc & AH, MVSc(Surgery)', 9256, NULL, 'Sneh Pet Clinic', '1st Floor, Shop No 101, Signature Complex, Zydus Hospital Road, Opposite Maruti Nandan Hotel, Thaltej, Ahmedabad, Gujarat - 380059.', '7.jpg', 2, NULL, 2),
(8, 'drjanak', 'Dr. Janak Raval', '8469269592', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Physician & Surgeon', 10, 'BVSc & AH', 1276, NULL, 'Dr. Janak Raval (Pet Clinic & Spa) ', 'Shop No 2 Shreenath Bunglow -2 Shopping Center, Visat Ahmedabad Gandhinagar Highway, Near Ashok Vihar Circle, Opposite Havemore Restaurent, Chandkheda', '8.jpeg', 2, NULL, 2),
(9, 'drrahul', 'Dr. Rahul Bathani', '9978900538', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Physician & Surgeon', 8, 'BVSc & AH ', 8784, NULL, 'Pet Vet Veterinary Clinic', 'Shop No -2, Nandanvan Complex, Bhairavnath Road, Behind Dr. Batras Clinic, Near Vallabhwadi Bus Stand, Maninagar, Ahmedabad, Gujarat - 380008.', '9.png', 2, NULL, 2),
(10, 'drashish', 'Dr. Ashish Patel', '9825179251', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Vet. Physician & Surgeon', 16, 'BVSc & AH ', 5235, NULL, 'Dr. APs Pet Clinic & Shop', '35/36 Highway Mall, Near Chandkheda Bus Stand, Near Chandkheda Highway, Chandkheda, Ahmedabad, Gujarat - 382424.', '10.jpeg', 2, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `dnid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `dod` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`dnid`, `uid`, `email`, `name`, `contactno`, `amount`, `dod`) VALUES
(1, 1, 'chaitanya1164m@gmail.com', 'Chaitanya Parmar', '7990424285', 1000, '2022-03-12'),
(2, 1, 'chaitanya1164m@gmail.com', 'Chaitanya Parmar', '7990424285', 1000, '2022-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `dplan`
--

CREATE TABLE `dplan` (
  `dplanID` int(11) UNSIGNED NOT NULL,
  `did` int(11) NOT NULL,
  `dos` date NOT NULL,
  `doe` date NOT NULL,
  `uid` int(11) NOT NULL,
  `planID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dplan`
--

INSERT INTO `dplan` (`dplanID`, `did`, `dos`, `doe`, `uid`, `planID`) VALUES
(1, 1, '2021-12-17', '2022-12-17', 1, 2),
(2, 6, '2021-12-17', '2022-12-17', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gplan`
--

CREATE TABLE `gplan` (
  `gplanID` int(10) NOT NULL,
  `groomerID` int(10) NOT NULL,
  `dop` date DEFAULT NULL,
  `doe` date DEFAULT NULL,
  `userID` int(5) UNSIGNED NOT NULL,
  `planID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gplan`
--

INSERT INTO `gplan` (`gplanID`, `groomerID`, `dop`, `doe`, `userID`, `planID`) VALUES
(1, 1, '2021-09-17', '2022-09-16', 0, 0),
(2, 1, '2021-09-17', '2022-09-16', 0, 0),
(3, 1, '2021-09-17', '2022-09-16', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groomer`
--

CREATE TABLE `groomer` (
  `gid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `doj` date DEFAULT NULL,
  `shopname` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `isapprove` tinyint(1) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groomer`
--

INSERT INTO `groomer` (`gid`, `uname`, `fullname`, `contactno`, `gender`, `email`, `pwd`, `doj`, `shopname`, `address`, `img`, `isapprove`, `rate`, `role`) VALUES
(1, 'grmanthan', 'Manthan Lalani', '9537801481', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-08', 'Mann Pets Care', 'B - 22, Sarvoday Society, Sattadhar Road, Opposite Kalupur Co Operative Bank, Sattadhar, Ahmedabad, Gujarat - 380063.', '1.png', NULL, NULL, 4),
(2, 'grsneh', 'Sneh Shah', '47072224', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-08', 'Sneh Pet Store & Grooming Station', '103, Trinity Complex Opposite Signature Complex, Thaltej, Ahmedabad, Gujarat - 380059.', '2.jpg', NULL, NULL, 4),
(3, 'grrashi', 'Rashi Narang', '8160441199', 'Female', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-08', 'Heads Up for Tails Pet Store & Spa', 'Shop No. 3 Shilp Epitome, Rajpath Rangoli Rd, behind Infostretch, Ahmedabad, Gujarat - 380054.', '3.jpg', NULL, NULL, 4),
(4, 'grrohan', 'Rohan Joshi', '9099142421', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-08', 'Smart Doggys', 'Premchand Nagar Row Houses, Beside Maruti Courier, Opp. Akash Tower, Bodakdev, Ahmedabad, Gujarat - 380054.', '4.png', NULL, NULL, 4),
(5, 'grmitali', 'Mitali Chauhan', ' 989886848', 'Female', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-08', 'Pet Inn', 'GF-2, Block A,Near Timber Bazar,Below LIC Branch,Amrapali Shopping Mall, Ambli-Bopal Cross Roads, Sardar Patel Ring Rd, Ambli, Ahmedabad, Gujarat - 380058', '5.jpg', NULL, NULL, 4),
(6, 'grswati', 'Swati Rajput', '7490045245', 'Female', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-08', 'Petplus Grooming Spa', '1st floor, Gold coin complex, Jodhpur Char Rasta, Satellite, Ahmedabad, Gujarat - 380015.', '', NULL, NULL, 4),
(7, 'grjagdish', 'Jagdish Patel', '7486980101', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-08', 'The Pet Co.', '35A Advait Complex, Sandesh Press Turning, Opposite Belgian Waffle, Vastrapur, Ahmedabad, Gujarat - 380015.', '7.jpg', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `lid` int(11) NOT NULL,
  `lnm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`lid`, `lnm`) VALUES
(1, 'Bopal'),
(2, 'Jivrajpark'),
(3, 'Jodhpur'),
(4, 'Shyamal'),
(5, 'Satellite'),
(6, 'Nehrunagar'),
(7, 'Bodakdev'),
(8, 'Sola'),
(9, 'Rakhiyal'),
(10, 'Nikol'),
(11, 'Ambli'),
(12, 'Vastrapur'),
(13, 'Gota'),
(14, 'Odhav'),
(15, 'Chandkheda'),
(16, 'Ghatlodiya'),
(17, 'Vastral'),
(18, 'Ashram Road'),
(19, 'Ambawadi'),
(20, 'Amraiwadi'),
(21, 'Adinath Nagar'),
(22, 'Ashok Vatika'),
(23, 'Ayojan Nagar'),
(24, 'Bhatta'),
(25, 'Behrampura'),
(26, 'Bhavna Colony'),
(27, 'Bapunagar'),
(28, 'Chandlodia'),
(29, 'CG Road'),
(30, 'C.T.M'),
(31, 'Dhalgarwad'),
(32, 'Dariyapur'),
(33, 'Ellisbridge'),
(34, 'Fatehpura'),
(35, 'GIDC Area'),
(36, 'Gurukul'),
(37, 'Gita Mandir'),
(38, 'Gulbai Tekra'),
(39, 'Gupta Nagar'),
(40, 'Hatkeshwar'),
(41, 'Isanpur'),
(42, 'Jasodanagr'),
(43, 'Janta Nagar'),
(44, 'Jamalpur'),
(45, 'Kuber Nagar'),
(46, 'Khanpur'),
(47, 'Kalupur'),
(48, 'Khadia'),
(49, 'Kankaria'),
(50, 'Khokhra'),
(51, 'Kathwada GIDC'),
(52, 'Lal darwaja'),
(53, 'Lambha'),
(54, 'Mirzapur'),
(55, 'Motera'),
(56, 'Mithakhali'),
(57, 'Maninagar'),
(58, 'Memnagar'),
(59, 'Makarba'),
(60, 'Near Nehru Bridge'),
(61, 'Nava Vadaj'),
(62, 'Naranpura'),
(63, 'Navrangpura'),
(64, 'Naroda'),
(65, 'Paldi'),
(66, 'Prahlad Nagar'),
(67, 'Raipur'),
(68, 'Ranip'),
(69, 'Ramol'),
(70, 'Rabari Colony'),
(71, 'Ramdevnagar'),
(72, 'Rakhial'),
(73, 'Sabarmati'),
(74, 'Sastri Nagar'),
(75, 'Saraspur'),
(76, 'Shahibuag'),
(77, 'SG Highway'),
(78, 'Sarangpur'),
(79, 'Science City'),
(80, 'Sarkhej'),
(81, 'Shivranjani'),
(82, 'Thaltej'),
(83, 'Vishala'),
(84, 'Vasna'),
(85, 'Vatva'),
(86, 'Vejalpur');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_type`
--

CREATE TABLE `measurement_type` (
  `mid` int(11) NOT NULL,
  `mname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `measurement_type`
--

INSERT INTO `measurement_type` (`mid`, `mname`) VALUES
(1, 'Gram'),
(2, 'Kilogram'),
(3, 'Liter'),
(4, 'Mililiter'),
(5, 'Bunch'),
(6, 'Pieces'),
(7, 'Packets');

-- --------------------------------------------------------

--
-- Table structure for table `mplan`
--

CREATE TABLE `mplan` (
  `mpid` int(5) NOT NULL,
  `mptid` int(11) NOT NULL,
  `dop` date NOT NULL,
  `did` int(11) DEFAULT NULL,
  `tid` int(5) DEFAULT NULL,
  `gid` int(5) DEFAULT NULL,
  `ispaid` tinyint(1) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mplan`
--

INSERT INTO `mplan` (`mpid`, `mptid`, `dop`, `did`, `tid`, `gid`, `ispaid`, `status`) VALUES
(1, 1, '2021-12-17', 1, NULL, NULL, 1, ''),
(2, 3, '2021-12-17', NULL, 1, NULL, 1, ''),
(3, 3, '2021-12-17', 2, NULL, NULL, 1, ''),
(4, 3, '2021-12-17', NULL, 2, NULL, 1, ''),
(5, 1, '2021-12-17', 3, NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `mplantype`
--

CREATE TABLE `mplantype` (
  `mptid` int(11) NOT NULL,
  `mpprice` int(11) NOT NULL,
  `mplimit` int(11) NOT NULL,
  `mname` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mplantype`
--

INSERT INTO `mplantype` (`mptid`, `mpprice`, `mplimit`, `mname`) VALUES
(1, 5000, 30, 'BRONZE'),
(2, 10000, 50, 'SILVER'),
(3, 15000, 85, 'GOLD');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `odid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pqty` int(11) NOT NULL,
  `shid` int(11) NOT NULL,
  `dod` datetime NOT NULL,
  `dbid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`odid`, `oid`, `pid`, `qty`, `pqty`, `shid`, `dod`, `dbid`) VALUES
(1, 1, 2, 4, 40, 1, '2022-03-12 12:56:34', 1),
(2, 2, 2, 1, 10, 1, '0000-00-00 00:00:00', 0),
(3, 2, 10, 1, 320, 3, '0000-00-00 00:00:00', 0),
(4, 3, 2, 1, 10, 1, '0000-00-00 00:00:00', 0),
(5, 4, 2, 3, 1047, 1, '0000-00-00 00:00:00', 0),
(6, 4, 10, 4, 1280, 3, '0000-00-00 00:00:00', 0),
(7, 5, 2, 2, 698, 1, '0000-00-00 00:00:00', 0),
(8, 5, 10, 1, 320, 3, '0000-00-00 00:00:00', 0),
(9, 6, 2, 1, 349, 1, '0000-00-00 00:00:00', 0),
(10, 6, 3, 1, 360, 1, '0000-00-00 00:00:00', 0),
(11, 6, 4, 1, 450, 1, '0000-00-00 00:00:00', 0),
(12, 7, 2, 1, 349, 1, '0000-00-00 00:00:00', 0),
(13, 8, 2, 3, 1047, 1, '0000-00-00 00:00:00', 0),
(14, 9, 2, 1, 349, 1, '0000-00-00 00:00:00', 0),
(15, 9, 10, 3, 960, 3, '0000-00-00 00:00:00', 0),
(16, 10, 4, 1, 450, 1, '0000-00-00 00:00:00', 0),
(17, 10, 3, 1, 360, 1, '0000-00-00 00:00:00', 0),
(18, 10, 2, 1, 349, 1, '0000-00-00 00:00:00', 0),
(19, 11, 8, 2, 898, 1, '0000-00-00 00:00:00', 0),
(20, 12, 9, 4, 1876, 2, '0000-00-00 00:00:00', 0),
(21, 13, 22, 6, 1794, 6, '0000-00-00 00:00:00', 0),
(22, 14, 10, 5, 2145, 3, '0000-00-00 00:00:00', 0),
(23, 15, 1, 2, 1138, 1, '0000-00-00 00:00:00', 0),
(24, 16, 4, 1, 299, 1, '0000-00-00 00:00:00', 0),
(25, 17, 12, 1, 459, 5, '0000-00-00 00:00:00', 0),
(26, 18, 17, 5, 1895, 5, '0000-00-00 00:00:00', 0),
(27, 19, 5, 1, 249, 3, '0000-00-00 00:00:00', 0),
(28, 20, 1, 1, 569, 1, '0000-00-00 00:00:00', 0),
(29, 21, 1, 3, 1707, 1, '0000-00-00 00:00:00', 0),
(30, 22, 4, 1, 299, 1, '0000-00-00 00:00:00', 0),
(31, 23, 1, 4, 2276, 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `addr` varchar(150) NOT NULL,
  `city` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ozip` int(11) NOT NULL,
  `doo` datetime NOT NULL,
  `order_id` varchar(8) NOT NULL,
  `pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `uid`, `fullname`, `addr`, `city`, `contact`, `email`, `ozip`, `doo`, `order_id`, `pay`) VALUES
(1, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-10 15:06:59', '89621680', 40),
(2, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-10 15:43:02', '12742576', 330),
(3, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-10 15:46:01', '29603594', 10),
(4, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-10 16:32:54', '15523902', 2327),
(5, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-10 16:49:37', '72145036', 1018),
(6, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-10 17:45:28', '36554656', 1159),
(7, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-10 22:16:53', '34103539', 349),
(8, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-11 18:42:35', '18188358', 1047),
(9, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-11 20:21:17', '92823763', 1309),
(10, 1, 'Chaitanya Parmar', 'Government Polytechnic Ahmedabad', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-13 20:23:38', '35879365', 1159),
(11, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '0000-00-00 00:00:00', '', 0),
(12, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-03-14 11:53:53', '64020258', 1876),
(13, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 382417, '2022-03-14 12:37:37', '72602202', 1794),
(14, 3, 'Kevin Patel ', 'Government Polytechnic Ahmedabad', 'ahmedabad', '9327288935', 'kevin.gca2004@gmail.com', 382418, '2022-04-01 10:48:45', '21124953', 2145),
(15, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-04-01 11:48:13', '18183060', 1138),
(16, 1, 'Chaitanya Parmar', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Ahmedabad', '7990424285', 'chaitanya1164m@gmail.com', 380015, '2022-04-01 12:06:32', '24319784', 299),
(17, 1, 'Chaitanya Parmar', 'Government Polytechnic Ahmedabad', 'ahmedabad', '9327288935', 'chaitanya1164m@gmail.com', 382418, '2022-04-01 12:17:44', '39092230', 459),
(18, 3, 'tommy', 'Government Polytechnic Ahmedabad', 'ahmedabad', '9327288935', 'kevin.gca2004@gmail.com', 382418, '2022-04-01 12:44:06', '42036608', 1895),
(19, 3, 'tommy', 'Government Polytechnic Ahmedabad', 'ahmedabad', '9327288935', 'kevin.gca2004@gmail.com', 382418, '2022-04-01 12:46:42', '36834778', 249),
(20, 1, 'tommy', 'Government Polytechnic Ahmedabad', 'ahmedabad', '9327288935', 'chaitanya1164m@gmail.com', 382418, '2022-04-01 12:55:43', '75008135', 569),
(21, 1, 'tommy', 'Government Polytechnic Ahmedabad', 'ahmedabad', '9327288935', 'chaitanya1164m@gmail.com', 382418, '2022-04-01 14:10:58', '59060539', 1707),
(22, 3, 'tommy', 'Government Polytechnic Ahmedabad', 'ahmedabad', '9327288935', 'kevin.gca2004@gmail.com', 382418, '2022-04-01 15:13:01', '64480104', 299),
(23, 1, 'tommy', 'Government Polytechnic Ahmedabad', 'ahmedabad', '9327288935', 'chaitanya1164m@gmail.com', 382418, '2022-04-01 15:17:46', '87942324', 2276);

-- --------------------------------------------------------

--
-- Table structure for table `pcart`
--

CREATE TABLE `pcart` (
  `pcid` int(11) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pqty` int(11) NOT NULL,
  `doa` date NOT NULL,
  `uid` int(11) NOT NULL,
  `shid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcart`
--

INSERT INTO `pcart` (`pcid`, `pid`, `qty`, `pqty`, `doa`, `uid`, `shid`) VALUES
(36, 22, 5, 1495, '2022-03-14', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pcategory`
--

CREATE TABLE `pcategory` (
  `pcatid` int(11) NOT NULL,
  `pcname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcategory`
--

INSERT INTO `pcategory` (`pcatid`, `pcname`) VALUES
(1, 'Food'),
(2, 'Toy'),
(3, 'Grooming'),
(4, 'Health'),
(5, 'Clothes'),
(6, 'Accessories'),
(7, 'Treats');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `petsid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` varchar(20) NOT NULL,
  `colour` varchar(25) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `temperament` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `details` varchar(100) NOT NULL,
  `isavailable` tinyint(1) NOT NULL,
  `shid` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`petsid`, `bid`, `name`, `gender`, `age`, `colour`, `height`, `weight`, `temperament`, `price`, `details`, `isavailable`, `shid`, `img`) VALUES
(1, 14, 'Jerry', 'Female', '5 years, 9 months', 'brown', 20, 2.4, 'Sociable', 15000, 'She is friendly, lively and playful. ', 1, 4, 'pomeranian.jpg'),
(2, 1, 'Bruno', 'Female', '5 years 6 months', 'white', 50, 38, 'Intelligent', 45000, 'She was rescued by a kind hearted person from GK forest area.', 1, 1, 'ger3.jpg'),
(3, 7, 'Bob', 'Female', '9 years', 'Light Brown', 22, 4, 'loving,playfull', 29000, 'She is lively and friendly.', 1, 3, 'shihtzu1.jpg'),
(4, 1, 'Popo', 'Male', '7 years 2 months', 'black-red', 55, 39, 'loving', 52400, 'He is sociable and friendly.', 1, 2, '1.jpg'),
(5, 1, 'Frieza', 'Male', '9 years 1 months', 'brown', 55, 39, 'affectionate', 63500, 'He is a very friendly dog and easily trained.', 1, 3, '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `planID` int(11) UNSIGNED NOT NULL,
  `pname` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `plimit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`planID`, `pname`, `amount`, `plimit`) VALUES
(1, 'Bronze', 3000, 20),
(2, 'Silver', 5000, 40),
(3, 'Gold', 9000, 80);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `oprice` int(11) NOT NULL,
  `aprice` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `pvalue` double NOT NULL,
  `pcatid` int(11) NOT NULL,
  `shid` int(11) NOT NULL,
  `dopost` date DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `oprice`, `aprice`, `mid`, `pvalue`, `pcatid`, `shid`, `dopost`, `img`, `rate`) VALUES
(1, 'Pedigree Meat & Rice Adult Dog Food', 569, 599, 2, 3, 1, 1, '2022-03-13', '1.jpg', NULL),
(2, 'Pedigree Meat & Rice Adult Dog Food', 549, 599, 2, 3, 1, 2, '2022-03-13', '1.jpg', NULL),
(3, 'Pedigree Meat & Rice Adult Dog Food', 589, 599, 2, 3, 1, 4, '2022-03-13', '1.jpg', NULL),
(4, 'PetSutra LED Squeaky Ball Toy for Dogs, Cats & Puppies', 299, 399, 7, 3, 2, 1, '2022-03-13', '2.jpg', NULL),
(5, 'PetSutra LED Squeaky Ball Toy for Dogs, Cats & Puppies', 249, 399, 7, 3, 2, 3, '2022-03-13', '2.jpg', NULL),
(6, 'PetSutra LED Squeaky Ball Toy for Dogs, Cats & Puppies', 299, 399, 7, 3, 2, 4, '2022-03-13', '2.jpg', NULL),
(7, 'PetSutra LED Squeaky Ball Toy for Dogs, Cats & Puppies', 299, 399, 7, 3, 2, 5, '2022-03-13', '2.jpg', NULL),
(8, 'Pedigree Puppy Wet Food(Chicken-Gravy with Vegetables)', 449, 499, 7, 15, 1, 1, '2022-03-13', '3.jpg', NULL),
(9, 'Pedigree Puppy Wet Food(Chicken-Gravy with Vegetables)', 469, 499, 7, 15, 1, 2, '2022-03-13', '3.jpg', NULL),
(10, 'Pedigree Puppy Wet Food(Chicken-Gravy with Vegetables)', 429, 499, 7, 15, 1, 3, '2022-03-13', '3.jpg', NULL),
(11, 'Pedigree Puppy Wet Food(Chicken-Gravy with Vegetables)', 479, 499, 7, 15, 1, 4, '2022-03-13', '3.jpg', NULL),
(12, 'Pedigree Puppy Wet Food(Chicken-Gravy with Vegetables)', 459, 499, 7, 15, 1, 5, '2022-03-13', '3.jpg', NULL),
(13, 'KONG AirDog Squeaker Birthday Balls Dog Toy', 399, 479, 6, 1, 2, 1, '2022-03-13', '4.jpg', NULL),
(14, 'KONG AirDog Squeaker Birthday Balls Dog Toy', 489, 499, 6, 1, 2, 2, '2022-03-13', '4.jpg', NULL),
(15, 'KONG AirDog Squeaker Birthday Balls Dog Toy', 399, 479, 6, 1, 2, 3, '2022-03-13', '4.jpg', NULL),
(16, 'KONG AirDog Squeaker Birthday Balls Dog Toy', 429, 479, 6, 1, 2, 4, '2022-03-13', '4.jpg', NULL),
(17, 'KONG AirDog Squeaker Birthday Balls Dog Toy', 379, 479, 6, 1, 2, 5, '2022-03-13', '4.jpg', NULL),
(18, 'All4Pets Aloevera Shampoo ', 299, 329, 4, 500, 3, 1, '2022-03-13', '5.jpg', NULL),
(19, 'All4Pets Aloevera Shampoo', 329, 279, 4, 500, 3, 3, '2022-03-13', '5.jpg', NULL),
(20, 'All4Pets Non Slip Handled Comb', 199, 249, 6, 1, 3, 1, '2022-03-13', '6.jpg', NULL),
(21, 'All4Pets Non Slip Handled Comb', 219, 249, 6, 1, 3, 5, '2022-03-13', '6.jpg', NULL),
(22, 'test', 299, 499, 2, 4, 3, 6, '2022-03-14', '1.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `rid` int(11) NOT NULL,
  `rname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rid`, `rname`) VALUES
(1, 'admin'),
(2, 'doctor'),
(3, 'trainer'),
(4, 'groomer'),
(5, 'shop'),
(6, 'user'),
(7, 'deliveryAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shid` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `lid` int(11) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `ownername` varchar(20) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `img` varchar(50) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `isapprove` tinyint(1) NOT NULL,
  `role` int(11) NOT NULL,
  `doj` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shid`, `uname`, `sname`, `lid`, `address`, `ownername`, `contactno`, `email`, `pwd`, `img`, `website`, `isapprove`, `role`, `doj`) VALUES
(1, 'shashish', 'Just Dogs', NULL, '1st Floor, S. R. House, Nehrunagar, Surendra Mangaldas Rd, Near Bikanerwala, Acharya Narendradev Nagar, Ambawadi, Ahmedabad, Gujarat 380015.', 'Ashish Anthony', '9809113111', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '1.jpg', 'www.justdogsstore.com', 0, 5, '2022-01-08'),
(2, 'shmahima', 'Mahima Pets Mart', NULL, 'Cellar No 1, Shantidayal Complex, Gurukul Road, Near H B Kapadia School, Memnagar, Ahmedabad, Gujarat - 380052.', 'Mahima Patel', '9825093578', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2.jpg', '', 0, 5, '2022-01-08'),
(3, 'shdarshan', 'Pandya Pets', NULL, 'D.No.G39, New CG Rd, Kalpana Nagar, Chandkheda, Ahmedabad, Gujarat - 382424.', 'Darshan Pandya', '9898620338', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '3.jpg', 'https://pandyapets.business.site', 0, 5, '2022-01-08'),
(4, 'shrinku', 'Little Buddies', NULL, 'G5, Tirthjal Complex, Opp.HDFC Bank,Shyamal, Shivranjani Flyover, Satellite, Ahmedabad, Gujarat - 380015.', 'Rinku Patel', '7096163167', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '4.jpg', 'https://littlebuddies.business.site', 0, 5, '2022-01-08'),
(5, 'shaman', 'Pet Inn', NULL, 'GF-2, Block A,Near Timber Bazar,Below LIC Branch,Amrapali Shopping Mall, Ambli-Bopal Cross Roads, Sardar Patel Ring Rd, Ambli, Ahmedabad, Gujarat - 38', 'Aman Rao', '9898868486', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '5.jpg', '', 0, 5, '2022-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `tplan`
--

CREATE TABLE `tplan` (
  `tplanID` int(10) NOT NULL,
  `trainerID` int(10) NOT NULL,
  `dop` date DEFAULT NULL,
  `doe` date DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `planID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tplan`
--

INSERT INTO `tplan` (`tplanID`, `trainerID`, `dop`, `doe`, `userID`, `planID`) VALUES
(1, 2, '2021-12-17', '2022-12-17', 3, 1),
(2, 5, '2021-12-17', '2022-12-17', 7, 3),
(3, 1, '2021-12-17', '2022-12-17', 5, 1),
(4, 8, '2021-12-17', '2022-12-17', 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `tid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `shop` varchar(255) NOT NULL,
  `address` varchar(150) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `isapprove` tinyint(1) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`tid`, `uname`, `fullname`, `contactno`, `gender`, `email`, `pwd`, `doj`, `shop`, `address`, `img`, `isapprove`, `rate`, `role`) VALUES
(1, 'trmahesh', 'Mahesh Makwana', '47077475', 'Male', 'chaitanya11644@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Mahesh Makwana Dog Trainer', 'E-308 Sanmuk, Bakeri City, , Near Vejalpur Police Station, Near Shrinand Nagar Vejalpur, Ahmedabad, Gujarat - 380051.', '1.jpeg', NULL, NULL, 3),
(2, 'trrutva', 'Rutva Modi', '47068493', 'Female', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Pet Hostel & Training Centre', '569, Green City, Bopal Ghuma Road, Near Krishna Shalby Hospital, Ghuma, Ahmedabad, Gujarat - 380058.', '2.jpg', NULL, NULL, 3),
(3, 'trpradeep', 'Pradeep Kadiya', '7878871788', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Pradeep Dog Training Center', 'Jain Colony, Shahibagh, Baluram Gupta Marg, Shahibaug, Ahmedabad, Gujarat - 380004.', '3.jpg', NULL, NULL, 3),
(4, 'trjitendra', 'Jitendra Raval', '9924449924', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Dog Training Point', 'Shop No 27/28 60, Nalanda Complex, Judges Bunglow Road, Near Mansi Circle, Vastrapur, Ahmedabad, Gujarat - 380015.', '4.jpg', NULL, NULL, 3),
(5, 'trrahul', 'Rahul Roy', '8045791117', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'Roy Dog Trainers', '7, Tithal Raw House, Manmandir Soc, Near Patidar Chowk K K Nagar, Ghatlodiya, Ahmedabad, Gujarat - 380061.', '5.jpg', NULL, NULL, 3),
(6, 'trdivyang', 'Divyang Thakkar', '7069500596', 'Male', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '2022-01-07', 'The Dog Land', 'Sur Sagar Tower, Saradha Road, Opposite Kala Sagar Mall Opposite Saibaba Temple, Sattadhar, Ahmedabad, Gujarat - 380063.', '6.jpg', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `doj` date NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `uname`, `email`, `pass`, `contact`, `address`, `gender`, `img`, `doj`, `role`) VALUES
(1, 'Chaitanya Parmar', 'chaitanya11', 'chaitanya1164m@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '7990424285', '11, Tatsat Society, Bhudarpura, Ambawadi, Nr. Manekbaug Hall, Ahmedabad, Gujarat - 380015.', 'Male', '1.jpeg', '2022-01-07', 6),
(2, 'Vraj Patel', 'vraj00', 'thevrajinc@gmail.com', 'e9e8cc3b99932babf9bc7fa91fc0198b', '9106562546', '21, Vatsalyam-1, On Shilaj to Suramya-7 Road, Shilaj, Ahmedabad, Gujarat - 380059', 'Male', '2.jpeg', '2022-02-17', 6),
(3, 'Kevin Patel ', 'kvn.098', 'kevin.gca2004@gmail.com', 'db430733605250fb66be568eeec27821', NULL, NULL, NULL, NULL, '2022-04-01', 6),
(4, 'Kevin Patel ', 'kvn.098', 'kevin.gca2004@gmail.com', 'db430733605250fb66be568eeec27821', NULL, NULL, NULL, NULL, '2022-04-01', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `userID` (`uid`),
  ADD KEY `doctorID` (`did`),
  ADD KEY `trainerID` (`tid`),
  ADD KEY `groomerID` (`gid`),
  ADD KEY `msID` (`msID`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`cuid`);

--
-- Indexes for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  ADD PRIMARY KEY (`dbid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`dnid`);

--
-- Indexes for table `dplan`
--
ALTER TABLE `dplan`
  ADD PRIMARY KEY (`dplanID`),
  ADD KEY `doctorID` (`did`),
  ADD KEY `userID` (`uid`),
  ADD KEY `planID` (`planID`);

--
-- Indexes for table `gplan`
--
ALTER TABLE `gplan`
  ADD PRIMARY KEY (`gplanID`),
  ADD KEY `groomerID` (`groomerID`);

--
-- Indexes for table `groomer`
--
ALTER TABLE `groomer`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `measurement_type`
--
ALTER TABLE `measurement_type`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `mplan`
--
ALTER TABLE `mplan`
  ADD PRIMARY KEY (`mpid`);

--
-- Indexes for table `mplantype`
--
ALTER TABLE `mplantype`
  ADD PRIMARY KEY (`mptid`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`odid`),
  ADD KEY `oid` (`oid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `shid` (`shid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `pcart`
--
ALTER TABLE `pcart`
  ADD PRIMARY KEY (`pcid`),
  ADD KEY `pcatid` (`pid`),
  ADD KEY `shid` (`shid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `pcategory`
--
ALTER TABLE `pcategory`
  ADD PRIMARY KEY (`pcatid`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petsid`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`planID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shid`),
  ADD KEY `lid` (`lid`);

--
-- Indexes for table `tplan`
--
ALTER TABLE `tplan`
  ADD PRIMARY KEY (`tplanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `planID` (`planID`),
  ADD KEY `trainerID` (`trainerID`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `cuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  MODIFY `dbid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `dnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dplan`
--
ALTER TABLE `dplan`
  MODIFY `dplanID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gplan`
--
ALTER TABLE `gplan`
  MODIFY `gplanID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groomer`
--
ALTER TABLE `groomer`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `measurement_type`
--
ALTER TABLE `measurement_type`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mplan`
--
ALTER TABLE `mplan`
  MODIFY `mpid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mplantype`
--
ALTER TABLE `mplantype`
  MODIFY `mptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `odid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pcart`
--
ALTER TABLE `pcart`
  MODIFY `pcid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pcategory`
--
ALTER TABLE `pcategory`
  MODIFY `pcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `petsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `planID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tplan`
--
ALTER TABLE `tplan`
  MODIFY `tplanID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
