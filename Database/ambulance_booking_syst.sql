-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:5306
-- Generation Time: Apr 30, 2024 at 01:44 PM
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
-- Database: `ambulance_booking_syst`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phonenumber` varchar(50) NOT NULL,
  `Email` text NOT NULL,
  `Role` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Name`, `Phonenumber`, `Email`, `Role`, `Password`) VALUES
(1, 'Laurier HABIYAREMYE', '+250 780 115 789', 'laurier@admin.abs.com', 'General Admin', 'laurier123'),
(2, 'Kendra Arly MUTESI', '+250 797 545 654', 'kendra@gmail.com', 'Dispatcher', 'kendra123'),
(3, 'Heloise ASIFIWE', '+250 780 765 677', 'heloise@gmail.com', 'General Admin', 'heloise123');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `AmbulanceID` int(11) NOT NULL,
  `VehicleNumber` varchar(20) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `Equipment` text DEFAULT NULL,
  `CurrentLocation` text DEFAULT NULL,
  `DriverName` varchar(255) DEFAULT NULL,
  `DriverContact` varchar(20) DEFAULT NULL,
  `DriverCertification` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`AmbulanceID`, `VehicleNumber`, `Type`, `Capacity`, `Equipment`, `CurrentLocation`, `DriverName`, `DriverContact`, `DriverCertification`) VALUES
(1, 'RAG-678-H', 'Advanced', 4, 'Oxygen, Paramedic, Hydroc+', 'Kigali', 'Aldon MURENZI', '+250 790 453 545', 'Paramedic Certified'),
(2, 'RAH867H', 'Metro', 5, 'All EQS', 'Kigali', 'Jean MURENZI', '+250 780 675 564', 'Basic Life Support (BLS)');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(100) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Mobile` text NOT NULL,
  `Service` text NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `Name`, `Email`, `Mobile`, `Service`, `Message`) VALUES
(1, 'Jane KEZA', 'keza@gmail.com', '+250 7890 456 453', 'email', 'I would like to get some information about your services.'),
(2, 'Jane KEZA', 'keza@gmail.com', '+250 7890 456 453', 'email', 'I would like to get some information about your services.');

-- --------------------------------------------------------

--
-- Table structure for table `bookingrequest`
--

CREATE TABLE `bookingrequest` (
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PickupLocation` varchar(50) DEFAULT NULL,
  `Destination` varchar(50) DEFAULT NULL,
  `HospitalName` varchar(50) DEFAULT NULL,
  `RequestedTime` datetime DEFAULT NULL,
  `PriorityLevel` varchar(20) DEFAULT NULL,
  `Reason` text DEFAULT NULL,
  `AdditionalNotes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookingrequest`
--

INSERT INTO `bookingrequest` (`BookingID`, `UserID`, `PickupLocation`, `Destination`, `HospitalName`, `RequestedTime`, `PriorityLevel`, `Reason`, `AdditionalNotes`) VALUES
(2, 1, 'Kigali', 'Rubavu', 'Laurier Int Hospital', '2024-04-29 18:39:01', 'Medium', 'Inter-Hospital Transfers', 'The transfer is a must'),
(3, 2, 'Huye', 'Rubavu', 'Laurier Int Hospital', '2024-04-29 18:56:18', 'Low', 'Maternity-Related', 'Ready to go'),
(4, 3, 'Huye', 'Muhanga', 'KABGAYI Hospital', '2024-04-30 13:33:19', 'Medium+', 'Maternity-Related', 'Heart attack');

--
-- Triggers `bookingrequest`
--
DELIMITER $$
CREATE TRIGGER `BookingRequestAfterDelete` AFTER DELETE ON `bookingrequest` FOR EACH ROW BEGIN

    UPDATE Trip
    SET Status = 'Canceled'
    WHERE BookingID = OLD.BookingID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bookingrequestAfterInsert` AFTER INSERT ON `bookingrequest` FOR EACH ROW BEGIN
  INSERT INTO Notification (UserID, Content, Timestamp, Status)
   VALUES (NEW.UserID, 'A new booking request has been made.', NOW(), 'New Request');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontacts`
--

CREATE TABLE `emergencycontacts` (
  `ContactID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ContactName` varchar(255) DEFAULT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `ContactPhoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergencycontacts`
--

INSERT INTO `emergencycontacts` (`ContactID`, `UserID`, `ContactName`, `Relationship`, `ContactPhoneNumber`) VALUES
(1, 2, 'Blandice MUNEZERO', 'Siblings', '+250 780 678 654'),
(2, 3, 'MUHIRE Brenda', 'Employers or Colleagues', '0789009887');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackandratings`
--

CREATE TABLE `feedbackandratings` (
  `FeedbackID` int(10) NOT NULL,
  `TripID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `Rating_Stars` text NOT NULL,
  `Comments` text NOT NULL,
  `FeedbackDateTime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbackandratings`
--

INSERT INTO `feedbackandratings` (`FeedbackID`, `TripID`, `UserID`, `Rating_Stars`, `Comments`, `FeedbackDateTime`) VALUES
(1, 1, 2, '5', 'We are happy for the service you deriveled to our family.', '2024-04-29'),
(2, 11, 3, '5', 'Very well kbx, \r\nTURABASHIMIYE', '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `insert_emergencycontactsview`
--

CREATE TABLE `insert_emergencycontactsview` (
  `ContactID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ContactName` varchar(255) DEFAULT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `ContactPhoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insert_paymentview`
--

CREATE TABLE `insert_paymentview` (
  `PaymentID` int(11) DEFAULT NULL,
  `TripID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PaymentMethod` varchar(20) DEFAULT NULL,
  `Amount` text DEFAULT NULL,
  `PaymentDateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `NewsletterID` int(10) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`NewsletterID`, `email`) VALUES
(1, 'janekeza@gmail.com'),
(2, 'moisehagenayezu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotificationID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationID`, `UserID`, `Content`, `Timestamp`, `Status`) VALUES
(1, 6, 'A new user has been added.', '2023-09-16 16:44:49', 'New User'),
(3, 7, 'A new user has been added.', '2024-02-02 15:40:14', 'New User'),
(4, 2, 'User information updated: Jane KEZA', '2024-02-02 15:41:40', 'User Updated'),
(5, 8, 'A new user has been added.', '2024-02-02 15:54:57', 'New User'),
(6, 9, 'A new user has been added.', '2024-02-02 16:03:24', 'New User'),
(7, 7, 'User information updated: Lolie HABIYAREMYE', '2024-02-03 15:44:36', 'User Updated'),
(8, 3, 'User information updated: Sam ISHIMWE', '2024-02-03 16:19:05', 'User Updated'),
(9, 1, 'User information updated: John MUGISHA', '2024-02-03 16:40:17', 'User Updated'),
(10, 2, 'A new booking request has been made.', '2024-02-04 10:35:00', 'New Request'),
(11, 3, 'A new booking request has been made.', '2024-02-04 10:35:11', 'New Request'),
(12, 3, 'A new payment is loaded.', '2024-02-04 10:36:30', 'New Payment'),
(13, 2, 'A new payment is loaded.', '2024-02-04 10:36:41', 'New Payment'),
(14, 2, 'User information updated: Jane KEZA', '2024-02-04 14:35:28', 'User Updated'),
(15, 2, 'User information updated: Jane KEZA', '2024-02-04 15:08:13', 'User Updated'),
(16, 2, 'User information updated: Jane KEZA', '2024-02-04 15:08:40', 'User Updated'),
(17, 2, 'User information updated: Jane KEZA', '2024-02-04 15:09:07', 'User Updated'),
(18, 2, 'User information updated: Jane KEZA', '2024-02-04 15:17:03', 'User Updated'),
(19, 5, 'User information updated: John RUREMA', '2024-02-04 15:26:37', 'User Updated'),
(20, 5, 'User information updated: John RUREMA', '2024-02-04 15:26:51', 'User Updated'),
(21, 5, 'User information updated: John RUREMA', '2024-02-04 15:33:09', 'User Updated'),
(22, 5, 'User information updated: John RUREMA', '2024-02-04 15:33:26', 'User Updated'),
(23, 5, 'User information updated: John RUREMA', '2024-02-04 15:48:58', 'User Updated'),
(24, 5, 'User information updated: GREENS AB', '2024-02-04 15:49:13', 'User Updated'),
(25, 5, 'User information updated: John RUREMA', '2024-02-04 15:49:45', 'User Updated'),
(26, 5, 'User information updated: John RUREMA', '2024-02-04 15:50:01', 'User Updated'),
(27, 2, 'User information updated: Jane KEZA', '2024-02-04 15:56:38', 'User Updated'),
(28, 2, 'User information updated: Jane KEZA', '2024-02-04 15:58:16', 'User Updated'),
(29, 2, 'User information updated: Jane KEZA', '2024-02-04 21:05:43', 'User Updated'),
(30, 2, 'User information updated: Jane KEZA', '2024-02-04 21:06:00', 'User Updated'),
(31, 6, 'User information updated: Alain MIKWEGE', '2024-02-05 16:01:09', 'User Updated'),
(32, 6, 'User information updated: Alain MIKWEGE', '2024-02-05 16:01:26', 'User Updated'),
(33, 2, 'A new payment is loaded.', '2024-02-06 21:21:45', 'New Payment'),
(34, 2, 'A new payment is loaded.', '2024-02-06 21:21:49', 'New Payment'),
(35, 1, 'User information updated: John MUGISHA', '2024-02-15 12:44:22', 'User Updated'),
(36, 1, 'User information updated: John MUGISHA', '2024-02-15 12:45:32', 'User Updated'),
(37, 5, 'User information updated: John RUREMA', '2024-02-15 12:45:32', 'User Updated'),
(0, 0, 'A new user has been added.', '2024-04-01 12:42:16', 'New User'),
(0, 0, 'A new user has been added.', '2024-04-01 12:48:18', 'New User'),
(0, 0, 'A new user has been added.', '2024-04-01 12:48:49', 'New User'),
(0, 0, 'A new user has been added.', '2024-04-01 12:50:16', 'New User'),
(0, 3, 'User information updated: Samueli', '2024-04-01 19:12:45', 'User Updated'),
(0, 3, 'User information updated: samm', '2024-04-01 22:35:40', 'User Updated'),
(0, 3, 'User information updated: samm', '2024-04-01 22:39:09', 'User Updated'),
(0, 3, 'User information updated: samm', '2024-04-01 22:39:43', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:40:08', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:40:13', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:46:21', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:47:18', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:49:13', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:49:32', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:49:36', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:49:52', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:49:55', 'User Updated'),
(0, 3, 'User information updated: Sam KAENZI', '2024-04-01 22:51:28', 'User Updated'),
(0, 2, 'User information updated: Jane KEZA', '2024-04-03 11:04:16', 'User Updated'),
(0, 2, 'User information updated: Jane KEZA', '2024-04-03 11:12:53', 'User Updated'),
(0, 2, 'User information updated: Jane KEZA', '2024-04-03 11:55:52', 'User Updated'),
(0, 2, 'User information updated: Jane KEZA', '2024-04-03 12:11:56', 'User Updated'),
(0, 2, 'A new booking request has been made.', '2024-04-03 19:42:16', 'New Request'),
(0, 2, 'A new booking request has been made.', '2024-04-03 20:04:56', 'New Request'),
(0, 2, 'A new booking request has been made.', '2024-04-03 20:12:19', 'New Request'),
(0, 2, 'A new booking request has been made.', '2024-04-03 20:42:41', 'New Request'),
(0, 3, 'A new payment is loaded.', '2024-04-03 22:04:31', 'New Payment'),
(0, 0, 'A new user has been added.', '2024-04-05 00:22:28', 'New User'),
(0, 0, 'A new user has been added.', '2024-04-05 00:52:27', 'New User'),
(0, 0, 'A new user has been added.', '2024-04-05 01:02:49', 'New User'),
(0, 1, 'User deleted: John MUGISHA', '2024-04-05 01:03:12', 'User Deleted'),
(0, 2, 'User deleted: Jane KEZA', '2024-04-05 01:03:12', 'User Deleted'),
(0, 3, 'User deleted: Sam KAENZI', '2024-04-05 01:03:12', 'User Deleted'),
(0, 5, 'User deleted: John RUREMA', '2024-04-05 01:03:12', 'User Deleted'),
(0, 6, 'User deleted: Alain MIKWEGE', '2024-04-05 01:03:12', 'User Deleted'),
(0, 7, 'User deleted: Lolie HABIYAREMYE', '2024-04-05 01:03:12', 'User Deleted'),
(0, 8, 'User deleted: Kashmil RUGIRA', '2024-04-05 01:03:12', 'User Deleted'),
(0, 9, 'User deleted: Kashmil RUGIRA', '2024-04-05 01:03:12', 'User Deleted'),
(0, 0, 'User deleted: ywywe', '2024-04-05 01:03:12', 'User Deleted'),
(0, 0, 'User deleted: ywywe', '2024-04-05 01:03:12', 'User Deleted'),
(0, 0, 'User deleted: ywywe', '2024-04-05 01:03:12', 'User Deleted'),
(0, 0, 'User deleted: ukojvuyv', '2024-04-05 01:03:12', 'User Deleted'),
(0, 0, 'User deleted: lolo', '2024-04-05 01:03:12', 'User Deleted'),
(0, 0, 'User deleted: lolie', '2024-04-05 01:03:12', 'User Deleted'),
(0, 0, 'User deleted: ', '2024-04-05 01:03:12', 'User Deleted'),
(0, 0, 'A new user has been added.', '2024-04-05 01:04:33', 'New User'),
(0, 0, 'A new user has been added.', '2024-04-05 01:09:21', 'New User'),
(0, 0, 'A new user has been added.', '2024-04-08 11:33:45', 'New User'),
(0, 0, 'A new user has been added.', '2024-04-08 11:35:26', 'New User'),
(0, 0, 'A new user has been added.', '2024-04-08 11:53:49', 'New User'),
(0, 1, 'User deleted: ', '2024-04-08 11:55:20', 'User Deleted'),
(0, 2, 'User deleted: ', '2024-04-08 11:55:20', 'User Deleted'),
(0, 3, 'User deleted: oioi', '2024-04-08 11:55:20', 'User Deleted'),
(0, 4, 'User deleted: ', '2024-04-08 11:55:20', 'User Deleted'),
(0, 5, 'User deleted: Jean Lolien MURENZI', '2024-04-08 11:55:20', 'User Deleted'),
(0, 6, 'A new user has been added.', '2024-04-08 11:57:32', 'New User'),
(0, 7, 'A new user has been added.', '2024-04-08 12:03:30', 'New User'),
(0, 7, 'A new booking request has been made.', '2024-04-08 12:07:03', 'New Request'),
(0, 8, 'A new user has been added.', '2024-04-09 15:12:53', 'New User'),
(0, 2, 'A new booking request has been made.', '2024-04-11 16:38:14', 'New Request'),
(0, 7, 'User deleted: Adeline UWERA', '2024-04-14 11:08:00', 'User Deleted'),
(0, 8, 'User deleted: Fiette URUKUNDO', '2024-04-14 11:24:06', 'User Deleted'),
(0, 6, 'User deleted: Belyse Arlande MUSEMA', '2024-04-14 15:09:01', 'User Deleted'),
(0, 9, 'A new user has been added.', '2024-04-14 15:11:20', 'New User'),
(0, 1, 'A new user has been added.', '2024-04-14 15:14:30', 'New User'),
(0, 1, 'A new booking request has been made.', '2024-04-29 08:18:22', 'New Request'),
(0, 1, 'User information updated: Poukette Arly', '2024-04-29 09:16:13', 'User Updated'),
(0, 1, 'A new payment is loaded.', '2024-04-29 09:18:27', 'New Payment'),
(0, 1, 'A new payment is loaded.', '2024-04-29 09:24:12', 'New Payment'),
(0, 1, 'A new booking request has been made.', '2024-04-29 18:39:01', 'New Request'),
(0, 2, 'A new user has been added.', '2024-04-29 18:52:29', 'New User'),
(0, 2, 'User information updated: Maurine IRAKOZE', '2024-04-29 18:53:44', 'User Updated'),
(0, 2, 'A new booking request has been made.', '2024-04-29 18:56:18', 'New Request'),
(0, 2, 'A new payment is loaded.', '2024-04-29 22:23:49', 'New Payment'),
(0, 3, 'A new user has been added.', '2024-04-30 13:31:10', 'New User'),
(0, 3, 'A new booking request has been made.', '2024-04-30 13:33:19', 'New Request'),
(0, 3, 'A new payment is loaded.', '2024-04-30 13:40:21', 'New Payment');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `TripID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PaymentMethod` varchar(20) DEFAULT NULL,
  `Amount` text DEFAULT NULL,
  `PaymentDateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `TripID`, `UserID`, `PaymentMethod`, `Amount`, `PaymentDateTime`) VALUES
(2, 1, 2, 'PayPal', '456', '2024-04-29 20:22:42'),
(4, 11, 3, 'Cash', '67$', '2024-04-30 11:38:53');

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `paymentAfterInsert` AFTER INSERT ON `payment` FOR EACH ROW BEGIN
  INSERT INTO Notification (UserID, Content, Timestamp, Status)
   VALUES (NEW.UserID, 'A new payment is loaded.', NOW(), 'New Payment');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reportsandanalytics`
--

CREATE TABLE `reportsandanalytics` (
  `ReportID` int(11) NOT NULL,
  `ReportType` varchar(50) DEFAULT NULL,
  `DateRange` varchar(50) DEFAULT NULL,
  `GeneratedBy` int(11) DEFAULT NULL,
  `ReportContent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportsandanalytics`
--

INSERT INTO `reportsandanalytics` (`ReportID`, `ReportType`, `DateRange`, `GeneratedBy`, `ReportContent`) VALUES
(1, 'Monthly/Yearly Report', '2024-04-30 11:40:26', 2, 'This month was successful to our company');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `TripID` int(11) NOT NULL,
  `BookingID` int(11) DEFAULT NULL,
  `AmbulanceID` int(11) DEFAULT NULL,
  `PickupTime` datetime DEFAULT NULL,
  `DropoffTime` datetime DEFAULT NULL,
  `DistanceTraveled` text DEFAULT NULL,
  `Fare` text DEFAULT NULL,
  `PaymentStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`TripID`, `BookingID`, `AmbulanceID`, `PickupTime`, `DropoffTime`, `DistanceTraveled`, `Fare`, `PaymentStatus`) VALUES
(1, 2, 1, '2024-04-30 20:03:00', '2024-05-01 20:03:00', '187KM', '765 $', 'Pending'),
(2, 3, 1, '2024-04-09 21:02:00', '2024-04-30 21:02:00', '67kms', '67$', 'Pending'),
(11, 4, 2, '2024-04-23 13:37:00', '2024-04-23 13:38:00', '67Kms', '78$', 'Rebuilt');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `DateOfBirth` text DEFAULT NULL,
  `Gender` text DEFAULT NULL,
  `Password` text NOT NULL,
  `Insurance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `PhoneNumber`, `Email`, `Address`, `DateOfBirth`, `Gender`, `Password`, `Insurance`) VALUES
(1, 'Poukette Arly', '+250 790 277 464', 'belyse@gmail.com', 'RN1', '2002-07-21', 'Female', 'belye123', 'RSS'),
(2, 'Maurine IRAKOZE', '+250 780 116 675', 'maurine@gmail.com', 'Masaka-KH2', '1999-06-21', 'Female', 'maurine123', 'MisUR'),
(3, 'Sharif MUGISHA', '07894433422', 'sharif@gmail.com', 'RN1', '2024-04-30', 'Male', 'sharif123', 'RAMA');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `UserAfterDelete` AFTER DELETE ON `user` FOR EACH ROW BEGIN
    INSERT INTO Notification (UserID, Content, Timestamp, Status)
    VALUES (OLD.UserID, CONCAT('User deleted: ', OLD.Name), NOW(), 'User Deleted');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UserAfterInsert` AFTER INSERT ON `user` FOR EACH ROW BEGIN
  INSERT INTO Notification (UserID, Content, Timestamp, Status)
   VALUES (NEW.UserID, 'A new user has been added.', NOW(), 'New User');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UserAfterUpdate` AFTER UPDATE ON `user` FOR EACH ROW BEGIN

    INSERT INTO Notification (UserID, Content, Timestamp, Status)
    VALUES (NEW.UserID, CONCAT('User information updated: ', NEW.Name), NOW(), 'User Updated');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `userview`
--

CREATE TABLE `userview` (
  `UserID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`AmbulanceID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `bookingrequest`
--
ALTER TABLE `bookingrequest`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  ADD PRIMARY KEY (`ContactID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `feedbackandratings`
--
ALTER TABLE `feedbackandratings`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `TripID` (`TripID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`NewsletterID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `TripID` (`TripID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `reportsandanalytics`
--
ALTER TABLE `reportsandanalytics`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `GeneratedBy` (`GeneratedBy`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`TripID`),
  ADD KEY `AmbulanceID` (`AmbulanceID`),
  ADD KEY `BookingID` (`BookingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `AmbulanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookingrequest`
--
ALTER TABLE `bookingrequest`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbackandratings`
--
ALTER TABLE `feedbackandratings`
  MODIFY `FeedbackID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `NewsletterID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reportsandanalytics`
--
ALTER TABLE `reportsandanalytics`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `TripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingrequest`
--
ALTER TABLE `bookingrequest`
  ADD CONSTRAINT `bookingrequest_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `emergencycontacts`
--
ALTER TABLE `emergencycontacts`
  ADD CONSTRAINT `emergencycontacts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `feedbackandratings`
--
ALTER TABLE `feedbackandratings`
  ADD CONSTRAINT `feedbackandratings_ibfk_1` FOREIGN KEY (`TripID`) REFERENCES `trip` (`TripID`),
  ADD CONSTRAINT `feedbackandratings_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`TripID`) REFERENCES `trip` (`TripID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `reportsandanalytics`
--
ALTER TABLE `reportsandanalytics`
  ADD CONSTRAINT `reportsandanalytics_ibfk_1` FOREIGN KEY (`GeneratedBy`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`AmbulanceID`) REFERENCES `ambulance` (`AmbulanceID`),
  ADD CONSTRAINT `trip_ibfk_2` FOREIGN KEY (`BookingID`) REFERENCES `bookingrequest` (`BookingID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
