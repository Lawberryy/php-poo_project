/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `pet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pet_name` varchar(255) DEFAULT NULL,
  `pet_type` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO `pet` (`id`, `pet_name`, `pet_type`, `user_id`) VALUES
(23, 'Baghera', 'Meow-meow', 17);
INSERT INTO `pet` (`id`, `pet_name`, `pet_type`, `user_id`) VALUES
(24, 'Bahm', 'Doggo', 16);
INSERT INTO `pet` (`id`, `pet_name`, `pet_type`, `user_id`) VALUES
(25, 'Yeontan', 'Doggo', 16);
INSERT INTO `pet` (`id`, `pet_name`, `pet_type`, `user_id`) VALUES
(27, 'Kennyyyyy (SNK S3 E1)', 'Furet', 18),
(29, 'Kyo', 'Meow-meow', 18),
(31, 'Panpan', 'Lapinou', 18);

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(16, 'jjk@bts.kr', '$2y$10$nwvkkVCj7dj1nPkcGoFmmu8COMSY24B5707kGURgbuQo2LU/wh0jm', 'Jungkook', 'Jeon', 0);
INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(17, 'sixtine.delvallee@edu.devinci.fr', '$2y$10$PCPMsiv6RzrwmBT1jhX5fe8qWTZjLBNXHAEVC2PHGhoieN7sOS9oO', 'Sixtine', 'Delvallée', 1);
INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(18, 'pierre.grimaud@devinci.fr', '$2y$10$O6T0/laQn1NAGXcXs.OkCeOpMoxDLxdSvMOmpxZHUask1A/XdTm26', 'Pierre', 'Grimaud', 0);
INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(19, 'kth@bts.kr', '$2y$10$ki2puVcfLHzBYnXYM8s47eRO0xjR8qdIBbYErEhhI1HnRYxp1sMK.', 'Taehyung', 'Kim', 0);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;