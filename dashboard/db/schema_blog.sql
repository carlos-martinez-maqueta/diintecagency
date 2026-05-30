-- Tablas de blog y administrador (DIINTEC v2)
USE `db_diintec`;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `state` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `banner` varchar(255) DEFAULT NULL,
  `summer` longtext,
  `friendly_url` varchar(255) NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `friendly_url` (`friendly_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_blog_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_id`),
  KEY `label_id` (`label_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `tbl_admin` (`id`, `name`, `email`, `password`, `state`) VALUES
(1, 'Admin DIINTEC', 'admin@diintec.com', '$2y$10$Rh9Q.Yy1cYjlxnZx0xZ8ZuYxlqYkF7Z3GpQz5Cw8VfHpJqLwzU2k.', 'active');

INSERT IGNORE INTO `tbl_label` (`name`) VALUES
('Diseño Web'), ('SEO'), ('Sistemas'), ('UX/UI'), ('Marketing Digital');

INSERT IGNORE INTO `tbl_blog` (`title`, `description`, `summer`, `friendly_url`, `state`) VALUES
('Por qué tu web debe vender, no solo informar',
  'Aprende cómo una web bien diseñada puede convertirse en tu mejor vendedor 24/7.',
  '<p>Una página web moderna debe estar diseñada para <strong>convertir visitas en clientes</strong>. En este artículo te contamos las claves: UX clara, CTA visibles, contenido orientado a beneficios y velocidad de carga óptima.</p><p>Si tu sitio actual solo informa pero no vende, es momento de rediseñarlo con estrategia.</p>',
  'web-que-vende',
  'active'),
('SEO local en Perú: cómo aparecer primero en Google',
  'Estrategias prácticas para posicionar tu negocio en Lima, Cajamarca y todo el país.',
  '<p>El <strong>SEO local</strong> es clave para captar clientes de tu zona. Optimiza tu Google Business Profile, consigue reseñas, genera contenido con keywords locales y trabaja la autoridad del dominio.</p>',
  'seo-local-peru',
  'active'),
('Sistemas a medida vs. plantillas: ¿qué elegir?',
  'Comparamos pros y contras para que tomes la mejor decisión para tu negocio.',
  '<p>Las plantillas son rápidas y baratas, pero limitan tu crecimiento. Un <strong>sistema a medida</strong> escala contigo, automatiza procesos reales y se adapta a tu operación.</p>',
  'sistemas-vs-plantillas',
  'active');

SET FOREIGN_KEY_CHECKS = 1;
