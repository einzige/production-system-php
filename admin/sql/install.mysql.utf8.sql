DROP TABLE IF EXISTS `#__rules`;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `#__rules` (
  `sign_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `body` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `#__signs`;

-- --------------------------------------------------------

--
-- Table structure for table `signs`
--

CREATE TABLE IF NOT EXISTS `#__signs` (
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `#__conditions`;

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE IF NOT EXISTS `#__conditions` (
  `sign_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;