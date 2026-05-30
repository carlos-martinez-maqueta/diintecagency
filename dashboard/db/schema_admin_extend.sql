USE `db_diintec`;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS `tbl_project_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_project` ADD COLUMN `long_description` longtext NULL AFTER `description`;
ALTER TABLE `tbl_trust_brand` ADD COLUMN `url` varchar(255) NULL AFTER `image`;

SET FOREIGN_KEY_CHECKS = 1;
