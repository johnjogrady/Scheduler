-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2017 at 11:56 PM
-- Server version: 5.7.11-log
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduler`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `assignedemployeedetails`
-- (See below for the actual view)
--
CREATE TABLE `assignedemployeedetails` (
`id` int(11) unsigned
,`staffNumber` varchar(8)
,`firstName` varchar(20)
,`lastName` varchar(20)
,`serviceUserId` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `counties`
-- (See below for the actual view)
--
CREATE TABLE `counties` (
`refID` int(11)
,`refValue` varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `customerdetails`
-- (See below for the actual view)
--
CREATE TABLE `customerdetails` (
`id` int(11)
,`customerName` varchar(20)
,`addressLine1` varchar(50)
,`addressLine2` varchar(50)
,`addressLine3` varchar(50)
,`mobileTelephone` varchar(12)
,`landlineTelephone` varchar(12)
,`officeName` varchar(20)
,`countyPostcodeName` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customerName` varchar(20) NOT NULL,
  `addressLine1` varchar(50) DEFAULT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `addressLine3` varchar(50) DEFAULT NULL,
  `countyPostcode` int(11) DEFAULT NULL,
  `eirCode` varchar(8) DEFAULT NULL,
  `landlineTelephone` varchar(12) DEFAULT NULL,
  `mobileTelephone` varchar(12) DEFAULT NULL,
  `managingOffice` int(11) NOT NULL,
  `mainContact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerName`, `addressLine1`, `addressLine2`, `addressLine3`, `countyPostcode`, `eirCode`, `landlineTelephone`, `mobileTelephone`, `managingOffice`, `mainContact`) VALUES
(2, 'Codec DSS', ' 1 Hyde House', 'Adelaide Road', 'Hyde Road', 1001031, 'D05W9X8', '018186400666', '0871234576', 1, 'Shane Lilly'),
(3, 'Bimbos Burgers', '92 Foxfield Grove', '', 'Raheny', 1001003, 'D05W9X8', '1234', '9876', 2, 'Joe Little'),
(4, 'blah', 'Blackheath Drivwe', '', 'Raheny', 1001003, 'D05W9X8', '1234', '9876', 1, 'Joe Little'),
(5, 'Sam Heighton', '770 Atlantic Ave', '', 'Raheny', 1001004, '', '', '', 1, ''),
(8, 'Bobs Burgers', 'Main Street', 'Caherciveen', '', 1001004, 'C05lkjl', '021 9876544', '087 1234567', 3, 'Bob de Burgh');

-- --------------------------------------------------------

--
-- Stand-in structure for view `donotsenddetails`
-- (See below for the actual view)
--
CREATE TABLE `donotsenddetails` (
`id` int(11)
,`staffNumber` varchar(8)
,`firstName` varchar(20)
,`lastName` varchar(20)
,`serviceUserId` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeeabsencedetails`
-- (See below for the actual view)
--
CREATE TABLE `employeeabsencedetails` (
`id` int(11)
,`absenceReason` int(11)
,`employeeid` int(11)
,`startTime` datetime
,`endTime` datetime
,`staffNumber` varchar(8)
,`firstName` varchar(20)
,`lastName` varchar(20)
,`reason` varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeeabsencereasons`
-- (See below for the actual view)
--
CREATE TABLE `employeeabsencereasons` (
`refID` int(11)
,`refValue` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `employeeabsences`
--

CREATE TABLE `employeeabsences` (
  `id` int(11) NOT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `approvalStatus` int(11) DEFAULT NULL,
  `absenceReason` int(11) DEFAULT NULL,
  `employeeId` int(11) NOT NULL,
  `approvedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeabsences`
--

INSERT INTO `employeeabsences` (`id`, `startTime`, `endTime`, `approvalStatus`, `absenceReason`, `employeeId`, `approvedBy`) VALUES
(2, '2017-03-01 00:00:00', '2017-03-17 00:00:00', NULL, 1004003, 2, NULL),
(4, '2017-03-01 00:00:00', '2017-03-25 00:00:00', NULL, 1004001, 1, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeedetails`
-- (See below for the actual view)
--
CREATE TABLE `employeedetails` (
`id` int(11)
,`firstName` varchar(20)
,`lastName` varchar(20)
,`staffNumber` varchar(8)
,`isActive` tinyint(1)
,`addressLine1` varchar(50)
,`eirCode` varchar(8)
,`startDate` date
,`finishDate` date
,`addressLine2` varchar(50)
,`addressLine3` varchar(50)
,`mobileTelephone` varchar(12)
,`landlineTelephone` varchar(12)
,`officeName` varchar(20)
,`countyPostcodeName` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `staffNumber` varchar(8) DEFAULT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `addressLine1` varchar(50) DEFAULT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `addressLine3` varchar(50) DEFAULT NULL,
  `countyPostcode` int(8) DEFAULT NULL,
  `eirCode` varchar(8) DEFAULT NULL,
  `landlineTelephone` varchar(12) DEFAULT NULL,
  `mobileTelephone` varchar(12) DEFAULT NULL,
  `managingOffice` int(5) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `finishDate` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `staffNumber`, `firstName`, `lastName`, `addressLine1`, `addressLine2`, `addressLine3`, `countyPostcode`, `eirCode`, `landlineTelephone`, `mobileTelephone`, `managingOffice`, `startDate`, `finishDate`, `isActive`) VALUES
(1, 'IWA00704', 'John', 'O\Grady', '92 Foxfield Grove', 'Raheny', 'Fairview', 1001030, 'D05W9X8', '014410456', '0871234576', 1, '2017-01-01', NULL, 0),
(2, 'IWA00705', 'Sam', 'Heighton', '770 Atlantic Ave', '', 'Raheny', 1001032, 'D05W9X8', '1234', '9876', 1, '2017-03-02', NULL, 1),
(3, 'IWA00706', 'Mervyn', 'Minto', '25 Crestfield Close', 'Larkhill', 'Santry', 1001036, 'D05W9X8', '018390129', '087 9654666', 1, NULL, NULL, 0),
(4, 'IWA00707', 'Julio', 'Doubleglazing', '2 Marino Mart', '', 'Marino', 1001030, 'D05W9X8', '018186400666', '9876', 1, '2017-03-01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeeunavailabilitytimes`
--

CREATE TABLE `employeeunavailabilitytimes` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `dayOfWeek` int(11) DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `unavailabilityReason` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeunavailabilitytimes`
--

INSERT INTO `employeeunavailabilitytimes` (`id`, `employeeId`, `dayOfWeek`, `startTime`, `endTime`, `unavailabilityReason`) VALUES
(11, 1, 1, '00:00:00', '16:00:00', 1003001);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeeunavailablereasons`
-- (See below for the actual view)
--
CREATE TABLE `employeeunavailablereasons` (
`refID` int(11)
,`refValue` varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeeunavailabletimesdetails`
-- (See below for the actual view)
--
CREATE TABLE `employeeunavailabletimesdetails` (
`id` int(11)
,`unavailabilityReason` int(11)
,`employeeid` int(11)
,`dayOfWeek` int(11)
,`weekday` varchar(9)
,`startTime` time
,`endTime` time
,`staffNumber` varchar(8)
,`firstName` varchar(20)
,`lastName` varchar(20)
,`reason` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `lookupitems`
--

CREATE TABLE `lookupitems` (
  `refItemId` int(11) NOT NULL,
  `refItem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lookupitems`
--

INSERT INTO `lookupitems` (`refItemId`, `refItem`) VALUES
(1001, 'countyPostCodes'),
(1002, 'rosterStatus'),
(1003, 'EmployeeUnavailabilityReasons'),
(1004, 'Employee Absence Reasons');

-- --------------------------------------------------------

--
-- Table structure for table `lookupreferences`
--

CREATE TABLE `lookupreferences` (
  `refId` int(11) NOT NULL,
  `refValue` varchar(60) NOT NULL,
  `refItemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lookupreferences`
--

INSERT INTO `lookupreferences` (`refId`, `refValue`, `refItemId`) VALUES
(1001001, 'Co. Carlow', 1001),
(1001002, 'Co. Cavan', 1001),
(1001003, 'Co. Clare', 1001),
(1001004, 'Co. Cork', 1001),
(1001005, 'Co. Donegal', 1001),
(1001006, 'Co. Dublin', 1001),
(1001007, 'Co. Galway', 1001),
(1001008, 'Co. Kerry', 1001),
(1001009, 'Co. Kildare', 1001),
(1001010, 'Co. Kilkenny', 1001),
(1001011, 'Co. Laois', 1001),
(1001012, 'Co. Leitrim', 1001),
(1001013, 'Co. Limerick', 1001),
(1001014, 'Co. Longford', 1001),
(1001015, 'Co. Louth', 1001),
(1001016, 'Co. Mayo', 1001),
(1001017, 'Co. Meath', 1001),
(1001018, 'Co. Monaghan', 1001),
(1001019, 'Co. Offaly', 1001),
(1001020, 'Co. Roscommon', 1001),
(1001021, 'Co. Sligo', 1001),
(1001022, 'Co. Tipperary', 1001),
(1001023, 'Co. Waterford', 1001),
(1001024, 'Co. Westmeath', 1001),
(1001025, 'Co. Wexford', 1001),
(1001026, 'Co. Wicklow', 1001),
(1001027, 'Cork City', 1001),
(1001028, 'Dublin 1', 1001),
(1001029, 'Dublin 2', 1001),
(1001030, 'Dublin 3', 1001),
(1001031, 'Dublin 4', 1001),
(1001032, 'Dublin 5', 1001),
(1001033, 'Dublin 6', 1001),
(1001034, 'Dublin 7', 1001),
(1001035, 'Dublin 8', 1001),
(1001036, 'Dublin 9', 1001),
(1001037, 'Dublin 10', 1001),
(1001038, 'Dublin 11', 1001),
(1001039, 'Dublin 12', 1001),
(1001040, 'Dublin 13', 1001),
(1001041, 'Dublin 14', 1001),
(1001042, 'Dublin 15', 1001),
(1001043, 'Dublin 16', 1001),
(1001044, 'Dublin 17', 1001),
(1001045, 'Dublin 18', 1001),
(1001046, 'Dublin 20', 1001),
(1001047, 'Dublin 22', 1001),
(1001048, 'Dublin 24', 1001),
(1002001, 'Pending', 1002),
(1002002, 'Cancelled', 1002),
(1002003, 'In Progress', 1002),
(1002004, 'Completed', 1002),
(1002005, 'Unassigned', 1002),
(1003001, 'Family Reasons', 1003),
(1003002, 'Other Job', 1003),
(1003003, 'School/College', 1003),
(1003004, 'Other Reason', 1003),
(1004001, 'Annual Leave', 1004),
(1004002, 'Sick Leave-Uncertified', 1004),
(1004003, 'Sick Leave-Certified', 1004),
(1004004, 'Training', 1004),
(1004005, 'Jury Service', 1004),
(1004006, 'Force Majeure', 1004),
(1004007, 'Other', 1004);

-- --------------------------------------------------------

--
-- Stand-in structure for view `officedetails`
-- (See below for the actual view)
--
CREATE TABLE `officedetails` (
`id` int(11)
,`officeName` varchar(20)
,`addressLine1` varchar(50)
,`eirCode` varchar(8)
,`addressLine2` varchar(50)
,`addressLine3` varchar(50)
,`mobileTelephone` varchar(12)
,`landlineTelephone` varchar(12)
,`countyPostcodeName` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `officeName` varchar(20) NOT NULL,
  `addressLine1` varchar(50) DEFAULT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `addressLine3` varchar(50) DEFAULT NULL,
  `countyPostcode` int(11) DEFAULT NULL,
  `eirCode` varchar(8) DEFAULT NULL,
  `landlineTelephone` varchar(12) DEFAULT NULL,
  `mobileTelephone` varchar(12) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `officeName`, `addressLine1`, `addressLine2`, `addressLine3`, `countyPostcode`, `eirCode`, `landlineTelephone`, `mobileTelephone`, `isActive`) VALUES
(1, 'North Dublin Office', 'Aras Chuchulainn', 'Blackheath Drive', 'Clontarf', 1001030, 'D05W9x8', '018186400', '0876695730', NULL),
(2, 'Carlow Office', 'Teach Failte', 'Kilkenny Road', 'Carlow', 1001001, '', '059321666', '0875154666', NULL),
(3, 'Kerry', 'Main Street', 'Tralee', '', 1001008, 'K024244', '028 123456', '087 9654666', NULL),
(8, 'Cork office ', 'Blackpool Road', '', 'Cork City', 1001004, 'C05lkjl', '1234', '', NULL),
(9, 'Navan Office', '12 Kells Road', '', 'Navan', 1001017, 'kkkk', '046 987666', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{"angular_direct":"direct","snap_to_grid":"off","relation_lines":"true"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"scheduler","table":"rosterassignedemployeedetails"},{"db":"scheduler","table":"rosterassignedemployees"},{"db":"scheduler","table":"assignedemployeedetails"},{"db":"scheduler","table":"employeeabsencedetails"},{"db":"scheduler","table":"employeeabsences"},{"db":"scheduler","table":"lookupitems"},{"db":"scheduler","table":"lookupreferences"},{"db":"scheduler","table":"employeeunavailabilitytimes"},{"db":"scheduler","table":"employeeunavailabletimesdetails"},{"db":"scheduler","table":"employeeunavailablereasons"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'scheduler', 'rosterdetails', '{"sorted_col":"`rosterdetails`.`serviceuserid` ASC"}', '2017-03-08 23:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

--
-- Dumping data for table `pma__tracking`
--

INSERT INTO `pma__tracking` (`db_name`, `table_name`, `version`, `date_created`, `date_updated`, `schema_snapshot`, `schema_sql`, `data_sql`, `tracking`, `tracking_active`) VALUES
('scheduler', 'customers', 1, '2017-02-19 13:14:08', '2017-02-21 22:00:29', 'a:2:{s:7:"COLUMNS";a:10:{i:0;a:8:{s:5:"Field";s:2:"id";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:3:"PRI";s:7:"Default";N;s:5:"Extra";s:14:"auto_increment";s:7:"Comment";s:0:"";}i:1;a:8:{s:5:"Field";s:12:"customerName";s:4:"Type";s:11:"varchar(20)";s:9:"Collation";s:15:"utf8_general_ci";s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:2;a:8:{s:5:"Field";s:12:"addressLine1";s:4:"Type";s:11:"varchar(50)";s:9:"Collation";s:15:"utf8_general_ci";s:4:"Null";s:3:"YES";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:3;a:8:{s:5:"Field";s:12:"addressLine2";s:4:"Type";s:11:"varchar(50)";s:9:"Collation";s:15:"utf8_general_ci";s:4:"Null";s:3:"YES";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:4;a:8:{s:5:"Field";s:12:"addressLine3";s:4:"Type";s:11:"varchar(50)";s:9:"Collation";s:15:"utf8_general_ci";s:4:"Null";s:3:"YES";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:5;a:8:{s:5:"Field";s:14:"countyPostcode";s:4:"Type";s:6:"int(5)";s:9:"Collation";N;s:4:"Null";s:3:"YES";s:3:"Key";s:3:"MUL";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:6;a:8:{s:5:"Field";s:7:"eirCode";s:4:"Type";s:10:"varchar(8)";s:9:"Collation";s:15:"utf8_general_ci";s:4:"Null";s:3:"YES";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:7;a:8:{s:5:"Field";s:17:"landlineTelephone";s:4:"Type";s:11:"varchar(12)";s:9:"Collation";s:15:"utf8_general_ci";s:4:"Null";s:3:"YES";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:8;a:8:{s:5:"Field";s:15:"mobileTelephone";s:4:"Type";s:11:"varchar(12)";s:9:"Collation";s:15:"utf8_general_ci";s:4:"Null";s:3:"YES";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:9;a:8:{s:5:"Field";s:14:"managingOffice";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:3:"MUL";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}}s:7:"INDEXES";a:4:{i:0;a:13:{s:5:"Table";s:9:"customers";s:10:"Non_unique";s:1:"0";s:8:"Key_name";s:7:"PRIMARY";s:12:"Seq_in_index";s:1:"1";s:11:"Column_name";s:2:"id";s:9:"Collation";s:1:"A";s:11:"Cardinality";s:1:"0";s:8:"Sub_part";N;s:6:"Packed";N;s:4:"Null";s:0:"";s:10:"Index_type";s:5:"BTREE";s:7:"Comment";s:0:"";s:13:"Index_comment";s:0:"";}i:1;a:13:{s:5:"Table";s:9:"customers";s:10:"Non_unique";s:1:"1";s:8:"Key_name";s:14:"managingOffice";s:12:"Seq_in_index";s:1:"1";s:11:"Column_name";s:14:"managingOffice";s:9:"Collation";s:1:"A";s:11:"Cardinality";s:1:"0";s:8:"Sub_part";N;s:6:"Packed";N;s:4:"Null";s:0:"";s:10:"Index_type";s:5:"BTREE";s:7:"Comment";s:0:"";s:13:"Index_comment";s:0:"";}i:2;a:13:{s:5:"Table";s:9:"customers";s:10:"Non_unique";s:1:"1";s:8:"Key_name";s:18:"customercounty_idx";s:12:"Seq_in_index";s:1:"1";s:11:"Column_name";s:14:"countyPostcode";s:9:"Collation";s:1:"A";s:11:"Cardinality";s:1:"0";s:8:"Sub_part";N;s:6:"Packed";N;s:4:"Null";s:3:"YES";s:10:"Index_type";s:5:"BTREE";s:7:"Comment";s:0:"";s:13:"Index_comment";s:0:"";}i:3;a:13:{s:5:"Table";s:9:"customers";s:10:"Non_unique";s:1:"1";s:8:"Key_name";s:20:"customercounties_idx";s:12:"Seq_in_index";s:1:"1";s:11:"Column_name";s:14:"countyPostcode";s:9:"Collation";s:1:"A";s:11:"Cardinality";s:1:"0";s:8:"Sub_part";N;s:6:"Packed";N;s:4:"Null";s:3:"YES";s:10:"Index_type";s:5:"BTREE";s:7:"Comment";s:0:"";s:13:"Index_comment";s:0:"";}}}', '# log 2017-02-19 13:14:08 root\nDROP TABLE IF EXISTS `customers`;\n# log 2017-02-19 13:14:08 root\n\nCREATE TABLE `customers` (\n  `id` int(11) NOT NULL,\n  `customerName` varchar(20) NOT NULL,\n  `addressLine1` varchar(50) DEFAULT NULL,\n  `addressLine2` varchar(50) DEFAULT NULL,\n  `addressLine3` varchar(50) DEFAULT NULL,\n  `countyPostcode` int(5) DEFAULT NULL,\n  `eirCode` varchar(8) DEFAULT NULL,\n  `landlineTelephone` varchar(12) DEFAULT NULL,\n  `mobileTelephone` varchar(12) DEFAULT NULL,\n  `managingOffice` int(11) NOT NULL\n) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n\n# log 2017-02-19 13:15:05 root\nALTER TABLE `customers` CHANGE `countyPostcode` `countyPostcode` INT(11) NULL DEFAULT NULL;\n# log 2017-02-19 13:15:58 root\nALTER TABLE `customers` DROP FOREIGN KEY `customers_ibfk_1`;\n# log 2017-02-19 13:18:22 root\nALTER TABLE `customers`\r\n  ADD CONSTRAINT `counties_ibfk_1` FOREIGN KEY (`countyPostcode`) REFERENCES `lookupreferences` (`refId`);\n\n# log 2017-02-19 13:20:46 root\nALTER TABLE `customers`\r\n  ADD CONSTRAINT `offices_ibfk_1` FOREIGN KEY (`managingOffice`) REFERENCES `offices` (`id`);\n\n# log 2017-02-20 23:42:50 root\nALTER TABLE `customers`  ADD `mainContact` VARCHAR(50) NOT NULL  AFTER `managingOffice`;', '\n\n# log 2017-02-19 13:16:21 root\nUPDATE `customers` SET `countyPostcode` = \'1001001\' WHERE `customers`.`id` = 2;\n\n# log 2017-02-19 14:01:57 root\nUPDATE `customers` SET `countyPostcode` = \'1001025\' WHERE `customers`.`id` = 2;\n\n# log 2017-02-20 23:43:07 root\nUPDATE `customers` SET `mainContact` = \'Shane Lilly\' WHERE `customers`.`id` = 2;\n\n# log 2017-02-21 00:08:06 root\nDELETE FROM `customers` WHERE `customers`.`id` = 6;\n\n# log 2017-02-21 00:08:17 root\nDELETE FROM `customers` WHERE `customers`.`id` = 3;\n\n# log 2017-02-21 00:08:21 root\nDELETE FROM `customers` WHERE `customers`.`id` = 5;\n\n# log 2017-02-21 22:00:29 root\nUPDATE `customers` SET `countyPostcode` = \'1001016\' WHERE `customers`.`id` = 4;\n', 'UPDATE,INSERT,DELETE,TRUNCATE,CREATE TABLE,ALTER TABLE,RENAME TABLE,DROP TABLE,CREATE INDEX,DROP INDEX', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Stand-in structure for view `rosterassignedemployeedetails`
-- (See below for the actual view)
--
CREATE TABLE `rosterassignedemployeedetails` (
`id` int(11)
,`staffNumber` varchar(8)
,`firstName` varchar(20)
,`lastName` varchar(20)
,`rosterid` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `rosterassignedemployees`
--

CREATE TABLE `rosterassignedemployees` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `rosterId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rosterassignedemployees`
--

INSERT INTO `rosterassignedemployees` (`id`, `employeeId`, `rosterId`) VALUES
(1, 2, 17),
(2, 3, 17),
(4, 2, 17),
(6, 3, 4),
(7, 3, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rosterdetails`
-- (See below for the actual view)
--
CREATE TABLE `rosterdetails` (
`id` int(11)
,`serviceuserid` int(11)
,`sufirstname` varchar(20)
,`sulastname` varchar(20)
,`rosterStartTime` datetime
,`day` varchar(9)
,`starttime` time
,`rosterEndTime` datetime
,`endtime` time
,`duration` bigint(21)
,`rosterStatus` int(11)
,`numberResourcesNeeded` int(11)
,`customername` varchar(20)
,`roster_status` varchar(60)
,`customerid` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `rosters`
--

CREATE TABLE `rosters` (
  `id` int(11) NOT NULL,
  `serviceUserId` int(11) NOT NULL,
  `rosterStartTime` datetime DEFAULT NULL,
  `rosterEndTime` datetime DEFAULT NULL,
  `rosterStatus` int(11) DEFAULT NULL,
  `numberResourcesNeeded` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rosters`
--

INSERT INTO `rosters` (`id`, `serviceUserId`, `rosterStartTime`, `rosterEndTime`, `rosterStatus`, `numberResourcesNeeded`, `customerid`) VALUES
(4, 2, '2017-03-07 01:45:00', '2017-03-07 07:15:00', 1002004, 1, 3),
(6, 1, '2017-03-16 02:15:00', '2017-03-16 09:30:00', 1002003, 2, 2),
(8, 2, '2017-03-25 01:00:00', '2017-03-25 03:00:00', 1002001, 0, 2),
(9, 2, '2017-03-23 01:30:00', '2017-03-23 02:30:00', 1002001, 0, 2),
(10, 1, '2017-03-11 06:15:00', '2017-03-11 09:45:00', 1002001, 0, 2),
(11, 2, '2017-03-11 00:00:00', '2017-03-11 01:45:00', 1002001, 0, 2),
(12, 2, '2017-03-11 00:00:00', '2017-03-11 00:00:00', 1002001, 0, 2),
(13, 2, '2017-03-08 00:00:00', '2017-03-08 00:00:00', 1002001, 0, 2),
(14, 2, '2017-03-09 00:00:00', '2017-03-09 00:00:00', 1002001, 0, 2),
(15, 1, '2017-03-15 02:00:00', '2017-03-15 07:00:00', 1002001, 1, 2),
(16, 18, '2017-03-15 02:15:00', '2017-03-15 03:15:00', 1002001, 1, 2),
(17, 16, '2017-03-09 10:45:00', '2017-03-09 12:30:00', 1002003, 1, 2),
(18, 16, '2017-03-16 02:15:00', '2017-03-16 20:45:00', 1002003, 0, 2),
(19, 19, '2017-03-16 10:00:00', '2017-03-16 13:00:00', 1002001, 1, 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rosterstatus`
-- (See below for the actual view)
--
CREATE TABLE `rosterstatus` (
`refID` int(11)
,`refValue` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `serviceuserassignedemployees`
--

CREATE TABLE `serviceuserassignedemployees` (
  `id` int(11) UNSIGNED NOT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `serviceUserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serviceuserassignedemployees`
--

INSERT INTO `serviceuserassignedemployees` (`id`, `employeeId`, `serviceUserId`) VALUES
(17, 1, 1),
(19, 3, 16),
(20, 1, 19),
(21, 4, 19);

-- --------------------------------------------------------

--
-- Stand-in structure for view `serviceuserdetails`
-- (See below for the actual view)
--
CREATE TABLE `serviceuserdetails` (
`id` int(11)
,`firstName` varchar(20)
,`lastName` varchar(20)
,`isActive` tinyint(1)
,`addressLine1` varchar(50)
,`eirCode` varchar(8)
,`startDate` date
,`finishDate` date
,`addressLine2` varchar(50)
,`addressLine3` varchar(50)
,`mobileTelephone` varchar(12)
,`landlineTelephone` varchar(12)
,`officeName` varchar(20)
,`countyPostcodeName` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `serviceuserdonotsendemployees`
--

CREATE TABLE `serviceuserdonotsendemployees` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `serviceUserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serviceuserdonotsendemployees`
--

INSERT INTO `serviceuserdonotsendemployees` (`id`, `employeeId`, `serviceUserId`) VALUES
(21, 1, 2),
(48, 1, 16),
(49, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `serviceusers`
--

CREATE TABLE `serviceusers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `addressLine3` varchar(50) DEFAULT NULL,
  `countyPostcode` int(11) NOT NULL,
  `eirCode` varchar(8) DEFAULT NULL,
  `landlineTelephone` varchar(12) DEFAULT NULL,
  `mobileTelephone` varchar(12) DEFAULT NULL,
  `managingOffice` int(5) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `finishDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serviceusers`
--

INSERT INTO `serviceusers` (`id`, `firstName`, `lastName`, `addressLine1`, `addressLine2`, `addressLine3`, `countyPostcode`, `eirCode`, `landlineTelephone`, `mobileTelephone`, `managingOffice`, `isActive`, `startDate`, `finishDate`) VALUES
(1, 'Jonathan', 'Mitchell', '129 Philipsburgh Avenue', 'Fairview', 'Marino', 1001030, 'D0312345', '01 8364759', '0879876543', 3, 0, NULL, NULL),
(2, 'Robert', 'Zimmerman', '92 Foxfield Grove', 'Raheny', '', 1001031, 'D05W9X8', '014410456', '0879876543', 3, 1, '2017-03-23', NULL),
(3, 'joe', 'O\Grady', '92 Foxfield Grove', 'Adelaide Road', '', 1001001, 'D05W9X8', '1', '2', NULL, 1, '2017-03-23', '2017-03-24'),
(6, 'Paul', 'Pogba', '2 Camden Market ', 'Camden Market', 'Raheny', 1001029, 'D05W9X8', '1234', '9876', NULL, 1, '2017-03-23', '2017-03-25'),
(7, 'Paul', 'Pogba', '2 Camden Market ', 'Camden Market', 'Raheny', 1001029, 'D05W9X8', '1234', '9876', NULL, NULL, NULL, NULL),
(8, 'Paul', 'Pogba', '2 Camden Market ', 'Camden Market', 'Raheny', 1001029, 'D05W9X8', '1234', '9876', NULL, NULL, NULL, NULL),
(9, 'Roberto', 'Baggio', 'Kilmyshall', 'Bunclody', '', 1001025, 'D05W9X8', '1234', '9876', 3, NULL, NULL, NULL),
(10, 'Roberto', 'Baggio', 'Kilmyshall', 'Bunclody', '', 1001025, 'D05W9X8', '1234', '9876', 2, 1, '2017-03-04', NULL),
(11, 'Robin', 'Van Persie', 'Ballinagappa Road', '', 'Clane', 1001009, 'D05W9X8', '1234', '9876', 2, 0, NULL, NULL),
(12, 'Roberto', 'Firmino', 'Claddagh Court', 'Kikenny City', 'Raheny', 1001010, 'kkkk', '1234', '9876', 2, NULL, NULL, NULL),
(13, 'Diego', 'Maradona', '12 The Pines', 'Ballinasloe', '', 1001007, 'D05W9X8', '1234', '9876', 3, NULL, NULL, NULL),
(14, 'Will', 'Gregg', '13 Church Street', 'Creagh', 'Ballinasloe', 1001007, 'D05W9X8', '1234', '9876', NULL, 1, '2017-03-17', '2017-03-25'),
(15, 'Angel', 'Di Maria', '13 Church Street', 'Creagh post', 'Ballinasloe', 1001007, 'D05W9X8', '1234', '9876', 2, 1, '2017-03-23', NULL),
(16, 'Wayne', 'Rooney', '13 Warren Street', 'Portobello', 'Dublin', 1001035, 'D05W9X8', '1234', '6544', 1, 1, '2017-03-17', '2017-03-24'),
(18, 'Roy', 'Keane', '12 Mayfield Close', 'Cork', '', 1001004, '', '', '', 3, 1, '2017-03-03', NULL),
(19, 'Sergio', 'Kun Aguero', 'Millhouse', 'Mill Road', 'Bunclody', 1001025, 'kkkk', '059 3526666', '', 1, 1, '2017-03-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lastLogIntime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `assignedemployeedetails`
--
DROP TABLE IF EXISTS `assignedemployeedetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `assignedemployeedetails`  AS  select `ae`.`id` AS `id`,`e`.`staffNumber` AS `staffNumber`,`e`.`firstName` AS `firstName`,`e`.`lastName` AS `lastName`,`ae`.`serviceUserId` AS `serviceUserId` from (`serviceuserassignedemployees` `ae` left join `employees` `e` on((`ae`.`employeeId` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `counties`
--
DROP TABLE IF EXISTS `counties`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `counties`  AS  (select `lookupreferences`.`refId` AS `refID`,`lookupreferences`.`refValue` AS `refValue` from `lookupreferences` where (`lookupreferences`.`refItemId` = 1001)) ;

-- --------------------------------------------------------

--
-- Structure for view `customerdetails`
--
DROP TABLE IF EXISTS `customerdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customerdetails`  AS  select `c`.`id` AS `id`,`c`.`customerName` AS `customerName`,`c`.`addressLine1` AS `addressLine1`,`c`.`addressLine2` AS `addressLine2`,`c`.`addressLine3` AS `addressLine3`,`c`.`mobileTelephone` AS `mobileTelephone`,`c`.`landlineTelephone` AS `landlineTelephone`,`offices`.`officeName` AS `officeName`,`lookupreferences`.`refValue` AS `countyPostcodeName` from ((`customers` `c` join `offices` on((`offices`.`id` = `c`.`managingOffice`))) join `lookupreferences` on((`lookupreferences`.`refId` = `c`.`countyPostcode`))) ;

-- --------------------------------------------------------

--
-- Structure for view `donotsenddetails`
--
DROP TABLE IF EXISTS `donotsenddetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `donotsenddetails`  AS  select `dns`.`id` AS `id`,`e`.`staffNumber` AS `staffNumber`,`e`.`firstName` AS `firstName`,`e`.`lastName` AS `lastName`,`dns`.`serviceUserId` AS `serviceUserId` from (`serviceuserdonotsendemployees` `dns` left join `employees` `e` on((`dns`.`employeeId` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `employeeabsencedetails`
--
DROP TABLE IF EXISTS `employeeabsencedetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeabsencedetails`  AS  select `employeeabsences`.`id` AS `id`,`employeeabsences`.`absenceReason` AS `absenceReason`,`employeeabsences`.`employeeId` AS `employeeid`,`employeeabsences`.`startTime` AS `startTime`,`employeeabsences`.`endTime` AS `endTime`,`e`.`staffNumber` AS `staffNumber`,`e`.`firstName` AS `firstName`,`e`.`lastName` AS `lastName`,`reason`.`refValue` AS `reason` from ((`employeeabsences` join `employeeabsencereasons` `reason` on((`reason`.`refID` = `employeeabsences`.`absenceReason`))) join `employees` `e` on((`e`.`id` = `employeeabsences`.`employeeId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `employeeabsencereasons`
--
DROP TABLE IF EXISTS `employeeabsencereasons`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeabsencereasons`  AS  (select `lookupreferences`.`refId` AS `refID`,`lookupreferences`.`refValue` AS `refValue` from `lookupreferences` where (`lookupreferences`.`refItemId` = 1004)) ;

-- --------------------------------------------------------

--
-- Structure for view `employeedetails`
--
DROP TABLE IF EXISTS `employeedetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeedetails`  AS  select `c`.`id` AS `id`,`c`.`firstName` AS `firstName`,`c`.`lastName` AS `lastName`,`c`.`staffNumber` AS `staffNumber`,`c`.`isActive` AS `isActive`,`c`.`addressLine1` AS `addressLine1`,`c`.`eirCode` AS `eirCode`,`c`.`startDate` AS `startDate`,`c`.`finishDate` AS `finishDate`,`c`.`addressLine2` AS `addressLine2`,`c`.`addressLine3` AS `addressLine3`,`c`.`mobileTelephone` AS `mobileTelephone`,`c`.`landlineTelephone` AS `landlineTelephone`,`offices`.`officeName` AS `officeName`,`lookupreferences`.`refValue` AS `countyPostcodeName` from ((`employees` `c` join `offices` on((`offices`.`id` = `c`.`managingOffice`))) join `lookupreferences` on((`lookupreferences`.`refId` = `c`.`countyPostcode`))) ;

-- --------------------------------------------------------

--
-- Structure for view `employeeunavailablereasons`
--
DROP TABLE IF EXISTS `employeeunavailablereasons`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeunavailablereasons`  AS  (select `lookupreferences`.`refId` AS `refID`,`lookupreferences`.`refValue` AS `refValue` from `lookupreferences` where (`lookupreferences`.`refItemId` = 1003)) ;

-- --------------------------------------------------------

--
-- Structure for view `employeeunavailabletimesdetails`
--
DROP TABLE IF EXISTS `employeeunavailabletimesdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeunavailabletimesdetails`  AS  select `employeeunavailabilitytimes`.`id` AS `id`,`employeeunavailabilitytimes`.`unavailabilityReason` AS `unavailabilityReason`,`employeeunavailabilitytimes`.`employeeId` AS `employeeid`,`employeeunavailabilitytimes`.`dayOfWeek` AS `dayOfWeek`,(case when (`employeeunavailabilitytimes`.`dayOfWeek` = 1) then 'Sunday' when (`employeeunavailabilitytimes`.`dayOfWeek` = 2) then 'Monday' when (`employeeunavailabilitytimes`.`dayOfWeek` = 3) then 'Tuesday' when (`employeeunavailabilitytimes`.`dayOfWeek` = 4) then 'Wednesday' when (`employeeunavailabilitytimes`.`dayOfWeek` = 5) then 'Thursday' when (`employeeunavailabilitytimes`.`dayOfWeek` = 6) then 'Friday' when (`employeeunavailabilitytimes`.`dayOfWeek` = 7) then 'Saturday' end) AS `weekday`,`employeeunavailabilitytimes`.`startTime` AS `startTime`,`employeeunavailabilitytimes`.`endTime` AS `endTime`,`e`.`staffNumber` AS `staffNumber`,`e`.`firstName` AS `firstName`,`e`.`lastName` AS `lastName`,`reason`.`refValue` AS `reason` from ((`employeeunavailabilitytimes` join `employeeunavailablereasons` `reason` on((`reason`.`refID` = `employeeunavailabilitytimes`.`unavailabilityReason`))) join `employees` `e` on((`e`.`id` = `employeeunavailabilitytimes`.`employeeId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `officedetails`
--
DROP TABLE IF EXISTS `officedetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `officedetails`  AS  select `c`.`id` AS `id`,`c`.`officeName` AS `officeName`,`c`.`addressLine1` AS `addressLine1`,`c`.`eirCode` AS `eirCode`,`c`.`addressLine2` AS `addressLine2`,`c`.`addressLine3` AS `addressLine3`,`c`.`mobileTelephone` AS `mobileTelephone`,`c`.`landlineTelephone` AS `landlineTelephone`,`lookupreferences`.`refValue` AS `countyPostcodeName` from (`offices` `c` join `lookupreferences` on((`lookupreferences`.`refId` = `c`.`countyPostcode`))) ;

-- --------------------------------------------------------

--
-- Structure for view `rosterassignedemployeedetails`
--
DROP TABLE IF EXISTS `rosterassignedemployeedetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rosterassignedemployeedetails`  AS  select `rae`.`id` AS `id`,`e`.`staffNumber` AS `staffNumber`,`e`.`firstName` AS `firstName`,`e`.`lastName` AS `lastName`,`rae`.`rosterId` AS `rosterid` from (`rosterassignedemployees` `rae` left join `employees` `e` on((`rae`.`employeeId` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `rosterdetails`
--
DROP TABLE IF EXISTS `rosterdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rosterdetails`  AS  select `r`.`id` AS `id`,`r`.`serviceUserId` AS `serviceuserid`,`su`.`firstName` AS `sufirstname`,`su`.`lastName` AS `sulastname`,`r`.`rosterStartTime` AS `rosterStartTime`,dayname(`r`.`rosterStartTime`) AS `day`,cast(`r`.`rosterStartTime` as time) AS `starttime`,`r`.`rosterEndTime` AS `rosterEndTime`,cast(`r`.`rosterEndTime` as time) AS `endtime`,timestampdiff(HOUR,`r`.`rosterStartTime`,`r`.`rosterEndTime`) AS `duration`,`r`.`rosterStatus` AS `rosterStatus`,`r`.`numberResourcesNeeded` AS `numberResourcesNeeded`,`c`.`customerName` AS `customername`,`rs`.`refValue` AS `roster_status`,`r`.`customerid` AS `customerid` from (((`rosters` `r` join `serviceusers` `su` on((`r`.`serviceUserId` = `su`.`id`))) join `customers` `c` on((`r`.`customerid` = `c`.`id`))) join `rosterstatus` `rs` on((`rs`.`refID` = `r`.`rosterStatus`))) ;

-- --------------------------------------------------------

--
-- Structure for view `rosterstatus`
--
DROP TABLE IF EXISTS `rosterstatus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rosterstatus`  AS  (select `lookupreferences`.`refId` AS `refID`,`lookupreferences`.`refValue` AS `refValue` from `lookupreferences` where (`lookupreferences`.`refItemId` = 1002)) ;

-- --------------------------------------------------------

--
-- Structure for view `serviceuserdetails`
--
DROP TABLE IF EXISTS `serviceuserdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `serviceuserdetails`  AS  select `c`.`id` AS `id`,`c`.`firstName` AS `firstName`,`c`.`lastName` AS `lastName`,`c`.`isActive` AS `isActive`,`c`.`addressLine1` AS `addressLine1`,`c`.`eirCode` AS `eirCode`,`c`.`startDate` AS `startDate`,`c`.`finishDate` AS `finishDate`,`c`.`addressLine2` AS `addressLine2`,`c`.`addressLine3` AS `addressLine3`,`c`.`mobileTelephone` AS `mobileTelephone`,`c`.`landlineTelephone` AS `landlineTelephone`,`offices`.`officeName` AS `officeName`,`lookupreferences`.`refValue` AS `countyPostcodeName` from ((`serviceusers` `c` join `offices` on((`offices`.`id` = `c`.`managingOffice`))) join `lookupreferences` on((`lookupreferences`.`refId` = `c`.`countyPostcode`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `managingOffice` (`managingOffice`),
  ADD KEY `customercounty_idx` (`countyPostcode`),
  ADD KEY `customercounties_idx` (`countyPostcode`);

--
-- Indexes for table `employeeabsences`
--
ALTER TABLE `employeeabsences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approvedBy` (`approvedBy`),
  ADD KEY `employeeabsences_ibfk_1` (`employeeId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_ibfk_1` (`managingOffice`),
  ADD KEY `emplcounties_ibfk_1` (`countyPostcode`);

--
-- Indexes for table `employeeunavailabilitytimes`
--
ALTER TABLE `employeeunavailabilitytimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeunavailabilitytimes_ibfk_1` (`employeeId`);

--
-- Indexes for table `lookupitems`
--
ALTER TABLE `lookupitems`
  ADD KEY `lookup_idx` (`refItemId`);

--
-- Indexes for table `lookupreferences`
--
ALTER TABLE `lookupreferences`
  ADD PRIMARY KEY (`refId`),
  ADD KEY `lookupref_ibfk_1` (`refItemId`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officecounties_ibfk_1` (`countyPostcode`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `rosterassignedemployees`
--
ALTER TABLE `rosterassignedemployees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rosterId` (`rosterId`),
  ADD KEY `rosterassignedemployees_ibfk_1` (`employeeId`);

--
-- Indexes for table `rosters`
--
ALTER TABLE `rosters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roster_ibfk_1` (`serviceUserId`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `serviceuserassignedemployees`
--
ALTER TABLE `serviceuserassignedemployees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceUserId` (`serviceUserId`),
  ADD KEY `serviceuserassignedemployees_ibfk_1` (`employeeId`);

--
-- Indexes for table `serviceuserdonotsendemployees`
--
ALTER TABLE `serviceuserdonotsendemployees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donotsendemployees_ibfk_2` (`serviceUserId`),
  ADD KEY `serviceuserdonotsendemployees_ibfk_1` (`employeeId`);

--
-- Indexes for table `serviceusers`
--
ALTER TABLE `serviceusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceuser_ibfk_1` (`managingOffice`),
  ADD KEY `serviceuserscounties_ibfk_1` (`countyPostcode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employeeabsences`
--
ALTER TABLE `employeeabsences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employeeunavailabilitytimes`
--
ALTER TABLE `employeeunavailabilitytimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rosterassignedemployees`
--
ALTER TABLE `rosterassignedemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rosters`
--
ALTER TABLE `rosters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `serviceuserassignedemployees`
--
ALTER TABLE `serviceuserassignedemployees`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `serviceuserdonotsendemployees`
--
ALTER TABLE `serviceuserdonotsendemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `serviceusers`
--
ALTER TABLE `serviceusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `counties_ibfk_1` FOREIGN KEY (`countyPostcode`) REFERENCES `lookupreferences` (`refId`),
  ADD CONSTRAINT `offices_ibfk_1` FOREIGN KEY (`managingOffice`) REFERENCES `offices` (`id`);

--
-- Constraints for table `employeeabsences`
--
ALTER TABLE `employeeabsences`
  ADD CONSTRAINT `employeeabsences_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `employeeabsences_ibfk_2` FOREIGN KEY (`approvedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `emplcounties_ibfk_1` FOREIGN KEY (`countyPostcode`) REFERENCES `lookupreferences` (`refId`),
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`managingOffice`) REFERENCES `offices` (`id`);

--
-- Constraints for table `employeeunavailabilitytimes`
--
ALTER TABLE `employeeunavailabilitytimes`
  ADD CONSTRAINT `employeeunavailabilitytimes_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employees` (`id`);

--
-- Constraints for table `lookupreferences`
--
ALTER TABLE `lookupreferences`
  ADD CONSTRAINT `lookupref_ibfk_1` FOREIGN KEY (`refItemId`) REFERENCES `lookupitems` (`refItemId`);

--
-- Constraints for table `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `officecounties_ibfk_1` FOREIGN KEY (`countyPostcode`) REFERENCES `lookupreferences` (`refId`);

--
-- Constraints for table `rosterassignedemployees`
--
ALTER TABLE `rosterassignedemployees`
  ADD CONSTRAINT `rosterassignedemployees_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `rosterassignedemployees_ibfk_2` FOREIGN KEY (`rosterId`) REFERENCES `rosters` (`id`);

--
-- Constraints for table `rosters`
--
ALTER TABLE `rosters`
  ADD CONSTRAINT `rosters_ibfk_1` FOREIGN KEY (`serviceUserId`) REFERENCES `serviceusers` (`id`),
  ADD CONSTRAINT `rosters_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customers` (`id`);

--
-- Constraints for table `serviceuserassignedemployees`
--
ALTER TABLE `serviceuserassignedemployees`
  ADD CONSTRAINT `serviceuserassignedemployees_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `serviceuserassignedemployees_ibfk_2` FOREIGN KEY (`serviceUserId`) REFERENCES `serviceusers` (`id`);

--
-- Constraints for table `serviceuserdonotsendemployees`
--
ALTER TABLE `serviceuserdonotsendemployees`
  ADD CONSTRAINT `serviceuserdonotsendemployees_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `serviceuserdonotsendemployees_ibfk_2` FOREIGN KEY (`serviceUserId`) REFERENCES `serviceusers` (`id`);

--
-- Constraints for table `serviceusers`
--
ALTER TABLE `serviceusers`
  ADD CONSTRAINT `serviceusers_ibfk_1` FOREIGN KEY (`managingOffice`) REFERENCES `offices` (`id`),
  ADD CONSTRAINT `serviceuserscounties_ibfk_1` FOREIGN KEY (`countyPostcode`) REFERENCES `lookupreferences` (`refId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
