CREATE DATABASE `movie`;
USE `movie`;

CREATE TABLE `titles` (
  `id` int(11) AUTO_INCREMENT,
  `title` varchar(255),
  `year` varchar(255),
  PRIMARY KEY(`id`)
);

INSERT INTO `movie` (`id`, `title`, `year`) VALUES
(1, 'silence of the lambs', '$2y$10$jhSIk2N5BnkEEzgEBWQDw.AUQIEcrH8V0AcNLfW2nkjTAH2WgAAlW');