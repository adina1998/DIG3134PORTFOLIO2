CREATE DATABASE `horror_quiz`;
USE `horror_quiz`;

CREATE TABLE `questions` (
  `id` int(11) AUTO_INCREMENT,
  `question` varchar(255),
  `question2` varchar(255),
  `question3` varchar(255),
  PRIMARY KEY(`id`)
);

INSERT INTO `horror_quiz` (`id`, `question`, `question2`, `question3`) VALUES
(1, 'silenceofthelambs', 'Anthony Hopkins');