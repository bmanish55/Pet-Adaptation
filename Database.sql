-- --------------------------------------------------------
-- Database: `pet_adoption`
-- --------------------------------------------------------

-- ========================================================
-- Table structure for `msgs`
-- ========================================================
DROP TABLE IF EXISTS `msgs`;

CREATE TABLE `msgs` (
  `sno` INT NOT NULL AUTO_INCREMENT,
  `msg` TEXT NOT NULL,
  `room` TEXT NOT NULL,
  `ip` TEXT NOT NULL,
  `stime` DATETIME NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for `msgs`
INSERT INTO `msgs` (`sno`, `msg`, `room`, `ip`, `stime`) VALUES
(19, 'Hi', '01879093418', '::1', '2022-08-12 18:22:59'),
(20, 'Ok, Please Send More Details Info', '01879093418', '::1', '2022-08-12 18:23:44'),
(21, 'ok', '01879093418', '::1', '2022-08-12 18:25:30'),
(22, 'Thnaks', '01879093418', '::1', '2022-08-12 18:25:40');

-- ========================================================
-- Table structure for `tbl_admin`
-- ========================================================
DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(100) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for `tbl_admin`
INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(5, 'Manish', 'manishb', '8459059460');

-- ========================================================
-- Table structure for `tbl_adopt`
-- ========================================================
DROP TABLE IF EXISTS `tbl_adopt`;

CREATE TABLE `tbl_adopt` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pet` VARCHAR(100) NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `adoption_date` DATE NOT NULL,
  `status` VARCHAR(50) NOT NULL,
  `adoptee_name` VARCHAR(100) NOT NULL,
  `adoptee_contact` VARCHAR(20) NOT NULL,
  `adoptee_email` VARCHAR(150) NOT NULL,
  `adoptee_address` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for `tbl_adopt`
INSERT INTO `tbl_adopt` (`id`, `pet`, `location`, `adoption_date`, `status`, `adoptee_name`, `adoptee_contact`, `adoptee_email`, `adoptee_address`) VALUES
(49, 'Bulldog', 'USA', '2022-08-12', 'Done', 'MD.ATAULLHA', '01879093418', 'saimsaimsaimsaim7246@gmail.com', 'House No -107,Road No-6, Lake-city,Sylhet'),
(50, 'White Cat', 'Khulna', '2022-08-12', 'Requested', 'MD.ATAULLHA', '01904192708', 'atasaim081@gmail.com', 'Paradogar,Konapara,Demra,Dhaka;'),
(51, 'Thomas Cat', 'Hollywood', '2024-11-28', 'Approved', 'Prathmesh N S', '9359519620', 'prathmeshns@gmail.com', 'Sambhaji Chauk, Burud Galli, Vinchur');

-- ========================================================
-- Table structure for `tbl_category`
-- ========================================================
DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `image_name` VARCHAR(255) NOT NULL,
  `featured` VARCHAR(10) NOT NULL,
  `active` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for `tbl_category`
INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(10, 'Dog', 'Pet_Category9344.png', 'Yes', 'Yes'),
(11, 'Cat', 'Pet_Category8231.png', 'Yes', 'Yes'),
(12, 'Bird', 'Pet_Category1636.png', 'Yes', 'Yes'),
(13, 'Fish', 'Pet_Category5310.png', 'No', 'Yes'),
(14, 'Turtle', 'Pet_Category8332.png', 'No', 'No');

-- ========================================================
-- Table structure for `tbl_pet`
-- ========================================================
DROP TABLE IF EXISTS `tbl_pet`;

CREATE TABLE `tbl_pet` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `image_name` VARCHAR(255) NOT NULL,
  `category_id` INT UNSIGNED NOT NULL,
  `featured` VARCHAR(10) NOT NULL,
  `active` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for `tbl_pet`
INSERT INTO `tbl_pet` (`id`, `title`, `description`, `location`, `image_name`, `category_id`, `featured`, `active`) VALUES
(10, 'The Barking Dog', 'Barking Dog', 'Dhaka', 'Pet_name41903.png', 10, 'Yes', 'Yes'),
(11, 'Thomas Cat', 'Remember Tom Cat?', 'Hollywood', 'Pet_name71408.png', 11, 'Yes', 'Yes'),
(12, 'Bulldog', 'Crazy Dog', 'USA', 'Pet_name66189.png', 10, 'Yes', 'Yes'),
(13, 'Tota Mia', 'Typical Bengali Parrot', 'Sylhet', 'Pet_name55596.png', 12, 'Yes', 'Yes'),
(14, 'Cute Puppy', 'cute but little', 'Dhaka', 'Pet_name28301.png', 10, 'Yes', 'Yes'),
(15, 'White Cat', 'all white', 'Khulna', 'Pet_name81208.png', 11, 'Yes', 'Yes'),
(16, 'Birdy', 'A Bird', 'Sylhet', 'Pet_name22981.png', 12, 'No', 'No'),
(17, 'Doggy', 'Typical Bengali Breed Dog', 'Dhaka', 'Pet_name60631.png', 10, 'No', 'Yes');

-- ========================================================
-- Table structure for `tbl_vc`
-- ========================================================
DROP TABLE IF EXISTS `tbl_vc`;

CREATE TABLE `tbl_vc` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `phone_number` VARCHAR(15) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `pet_type` VARCHAR(50) NOT NULL,
  `address` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for `tbl_vc`
INSERT INTO `tbl_vc` (`id`, `name`, `phone_number`, `email`, `pet_type`, `address`) VALUES
(15, 'manish_bhavar', '8459059460', 'mbhavar2121@gmail.com', 'Cat', 'My Cat is not eating anything..');
