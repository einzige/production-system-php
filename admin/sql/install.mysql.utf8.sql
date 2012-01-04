-- --------------------------------------------------------

--
-- Table structure for table `rules`
--
DROP TABLE IF EXISTS `quiz_rules`;

CREATE TABLE IF NOT EXISTS `quiz_rules` (
  `name` varchar(255),
  `description` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `signs`
--
DROP TABLE IF EXISTS `quiz_signs`;

CREATE TABLE IF NOT EXISTS `quiz_signs` (
  `name` varchar(255) NOT NULL,
  `description` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--
DROP TABLE IF EXISTS `quiz_conditions`;

CREATE TABLE IF NOT EXISTS `quiz_conditions` (
  `sign_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL,
  `weight` float NOT NULL DEFAULt 0,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `results`
--
DROP TABLE IF EXISTS `quiz_results`;

CREATE TABLE IF NOT EXISTS `quiz_results` (
  `name` varchar(255) NOT NULL,
  `description` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `rules_results`
--
DROP TABLE IF EXISTS `quiz_rules_results`;

CREATE TABLE IF NOT EXISTS `quiz_rules_results` (
  `rule_id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `weight` float NOT NULL DEFAULt 0,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `questions`
--
DROP TABLE IF EXISTS `quiz_questions`;

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `body` text NOT NULL,
  `position` int(11) DEFAULT 0,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `answers`
--
DROP TABLE IF EXISTS `quiz_answers`;

CREATE TABLE IF NOT EXISTS `quiz_answers` (
  `body` varchar(1024),
  `description` text,
  `position` int(11) DEFAULT 0,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `answers_sings`
--
DROP TABLE IF EXISTS `quiz_answers_sings`;

CREATE TABLE IF NOT EXISTS `quiz_answers_sings` (
  `answer_id` int(11) NOT NULL,
  `sing_id` int(11) NOT NULL,
  `weight` float NOT NULL DEFAULt 0,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;