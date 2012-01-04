DROP TABLE IF EXISTS `quiz_rules`;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `quiz_rules` (
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `quiz_signs`;

-- --------------------------------------------------------

--
-- Table structure for table `signs`
--

CREATE TABLE IF NOT EXISTS `quiz_signs` (
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `quiz_conditions`;

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE IF NOT EXISTS `quiz_conditions` (
  `sign_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;