CREATE DATABASE IF NOT EXISTS `myblog`;
USE `myblog`;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `topics`;
DROP TABLE IF EXISTS `posts`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`username` VARCHAR(255) NOT NULL UNIQUE,
	`email` VARCHAR(255) NOT NULL UNIQUE,
	`role` ENUM('admin', 'user') DEFAULT 'user',
	`password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=LATIN1;

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`) 
VALUES (1, 'Thao', 'thao@thao.com', 'admin', 'thaothao');

-- ---------------------------------------------------------------

CREATE TABLE `topics` (
	`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`topic` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=LATIN1;

INSERT INTO `topics` (`id`, `topic`) 
VALUES (1, 'dunno');
INSERT INTO `topics` (`id`, `topic`) 
VALUES (2, 'noidea');
INSERT INTO `topics` (`id`, `topic`) 
VALUES (3, 'whatever');

-- -- ---------------------------------------------------------------

CREATE TABLE `posts`(
	`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`uid` INTEGER NOT NULL,
	`tid` INTEGER NOT NULL,
	`title` VARCHAR(255) NOT NULL,
	`views` INT(11) NOT NULL DEFAULT '0',
	`content` TEXT NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (`uid`) REFERENCES `users`(`id`)
		ON DELETE CASCADE
		ON UPDATE RESTRICT,
	FOREIGN KEY (`tid`) REFERENCES `topics`(`id`)
		ON DELETE CASCADE
		ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=LATIN1;

INSERT INTO `posts` (`id`, `uid`, `tid`, `title`, `views`, `content`, `created_at`, `updated_at`) 
VALUES (1, 1, 2, 'POST 1', 0, 'content', '2019-13-11 00:00:00', '2019-13-11 00:00:00');