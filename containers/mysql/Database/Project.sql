CREATE DATABASE IF NOT EXISTS ezoom;

USE ezoom;

DROP TABLE IF EXISTS `tbl_cursos`;
CREATE TABLE `tbl_cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `tbl_curso_imagens`;
CREATE TABLE `tbl_curso_imagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_curso` int DEFAULT NULL,
  `src` varchar(100) DEFAULT NULL,
  `principal` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_cursos_imgs_idx` (`id_curso`),
  CONSTRAINT `fk_cursos_imgs` FOREIGN KEY (`id_curso`) REFERENCES `tbl_cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO tbl_users VALUES (0, 'admin', '123456', NULL);
