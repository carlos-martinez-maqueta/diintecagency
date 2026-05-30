-- DIINTEC v2 — Contenido dinámico del sitio público

CREATE DATABASE IF NOT EXISTS `db_diintec` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_diintec`;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS `tbl_hero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `cta_text` varchar(120) DEFAULT NULL,
  `cta_url` varchar(255) DEFAULT 'contactanos',
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_hero_chip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(120) NOT NULL,
  `color_class` varchar(40) NOT NULL DEFAULT 'pain-chip--sky',
  `pos_x` int(11) NOT NULL DEFAULT 0,
  `pos_y` int(11) NOT NULL DEFAULT 0,
  `rotation` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_feature_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(180) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) DEFAULT 'assets/img/icon_parallax.png',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_cta_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stat_text` varchar(255) DEFAULT NULL,
  `button_text` varchar(120) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT 'contactanos',
  `image` varchar(255) DEFAULT 'assets/img/celular.png',
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(180) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `highlights` text COMMENT 'JSON array of strings',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(180) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(80) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `client_name` varchar(120) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `hover_text` text,
  `tagline` varchar(255) DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_trust_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(80) NOT NULL,
  `region` varchar(80) DEFAULT NULL,
  `label` varchar(120) NOT NULL,
  `description` text,
  `map_x` decimal(5,2) NOT NULL DEFAULT 0,
  `map_y` decimal(5,2) NOT NULL DEFAULT 0,
  `lng` decimal(10,6) DEFAULT NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `projects_count` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `state` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tbl_site_section` (
  `section_key` varchar(50) NOT NULL,
  `kicker` varchar(120) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` text,
  PRIMARY KEY (`section_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Datos iniciales
INSERT INTO `tbl_hero` (`title`, `subtitle`, `cta_text`, `cta_url`) VALUES
('Destaca en el mundo digital', 'Creamos experiencias únicas que conectan, venden y posicionan tu marca. Páginas web a medida, sistemas según tu negocio y SEO que genera resultados.', 'Comienza tu transformación ahora', 'contactanos');

INSERT INTO `tbl_hero_chip` (`label`, `color_class`, `pos_x`, `pos_y`, `rotation`, `sort_order`) VALUES
('Web que convierten', 'pain-chip--violet', -380, 2, -17, 1),
('SEO estratégico', 'pain-chip--sky', -240, 82, -7, 2),
('Automatización útil', 'pain-chip--orange', -86, 154, 9, 3),
('UX/UI de alto impacto', 'pain-chip--blue', -30, 72, -2, 4),
('Tiendas online potentes', 'pain-chip--mint', 178, 70, 8, 5),
('Analítica en tiempo real', 'pain-chip--lilac', 378, 20, -9, 6),
('Escalabilidad real', 'pain-chip--orange', 316, 152, 16, 7),
('Soporte continuo', 'pain-chip--blue', 264, 102, 3, 8),
('Resultados medibles', 'pain-chip--lime', 86, 186, -1, 9);

INSERT INTO `tbl_feature_card` (`title`, `description`, `sort_order`) VALUES
('Páginas web a medida', 'Diseño y desarrollo adaptado a tu marca, con enfoque en conversión, velocidad y experiencia móvil impecable.', 1),
('Sistemas según tu negocio', 'Paneles, CRM, inventarios y flujos internos hechos a la medida de cómo opera tu empresa.', 2),
('SEO y posicionamiento', 'Estrategia técnica y de contenido para aparecer en Google y captar clientes con intención real de compra.', 3);

INSERT INTO `tbl_cta_block` (`title`, `description`, `stat_text`, `button_text`, `button_url`) VALUES
('Tecnología que impulsa ventas, no solo presencia.', 'Integramos diseño, desarrollo y SEO en una sola hoja de ruta. Tu web deja de ser un folleto y se convierte en un canal comercial con métricas claras.', '<span>Más de 50 negocios</span> ya digitalizan sus procesos con DIINTEC. ¿Y tú?', '¡Contáctanos Ya!', 'contactanos');

INSERT INTO `tbl_service` (`title`, `slug`, `short_desc`, `long_desc`, `highlights`, `sort_order`) VALUES
('Diseño y desarrollo web', 'diseno-desarrollo-web', 'Sitios corporativos, landings y e-commerce con UX premium.', 'Creamos experiencias digitales que comunican valor, generan confianza y convierten visitantes en clientes.', '["UX/UI a medida","Responsive real","Integración con WhatsApp y CRM"]', 1),
('Sistemas y software a medida', 'sistemas-medida', 'Automatiza operaciones con plataformas hechas para tu flujo de trabajo.', 'Desde dashboards hasta módulos de gestión: conectamos equipos, datos y procesos en un solo ecosistema.', '["Paneles administrativos","Reportes en tiempo real","Roles y permisos"]', 2),
('SEO y marketing digital', 'seo-posicionamiento', 'Visibilidad orgánica y estrategia de contenidos orientada a negocio.', 'Auditoría técnica, arquitectura SEO, optimización on-page y seguimiento de KPIs mensuales.', '["Auditoría SEO","Palabras clave locales","Contenido estratégico"]', 3),
('Mantenimiento y soporte', 'mantenimiento-soporte', 'Tu sitio siempre actualizado, seguro y funcionando.', 'Monitoreo, backups, mejoras continuas y soporte técnico para que tu equipo no se detenga.', '["Actualizaciones","Seguridad","Soporte dedicado"]', 4);

INSERT INTO `tbl_project` (`title`, `slug`, `description`, `category`, `image`, `client_name`, `city`, `is_featured`, `sort_order`) VALUES
('Hullka Coffee — E-commerce', 'hullka-coffee', 'Tienda online con catálogo dinámico y checkout optimizado.', 'E-commerce', 'assets/img/logo-hullka.png', 'Hullka Coffee', 'Lima', 1, 1),
('Astur Santa Fe — Web corporativa', 'astur-santa-fe', 'Sitio institucional con arquitectura de contenidos y SEO local.', 'Corporativo', 'assets/img/logo-astur.png', 'Astur Santa Fe', 'Lima', 1, 2),
('Aprak — Plataforma digital', 'aprak', 'Desarrollo web con módulos personalizados para operación comercial.', 'Sistema web', 'assets/img/logo-aprak.png', 'Aprak', 'Cajamarca', 1, 3),
('Nuam — Producto digital', 'nuam', 'Interfaz moderna y flujos de usuario orientados a conversión.', 'Producto digital', 'assets/img/logo-nuam.png', 'Nuam', 'Lima', 1, 4);

INSERT INTO `tbl_client` (`name`, `logo`, `hover_text`, `tagline`, `sort_order`) VALUES
('Hullka Coffee', 'assets/img/logo-hullka.png', 'E-commerce | UX/UI | Conversión', 'Tienda online de alto rendimiento', 1),
('Astur Santa Fe', 'assets/img/logo-astur.png', 'Web corporativa | SEO | Branding digital', 'Presencia digital sólida', 2),
('Aprak', 'assets/img/logo-aprak.png', 'Sistema web | Automatización | Panel admin', 'Operación digital centralizada', 3),
('Nuam', 'assets/img/logo-nuam.png', 'Product Design | Estrategia | Desarrollo', 'Producto digital escalable', 4);

INSERT INTO `tbl_trust_brand` (`name`, `image`, `sort_order`) VALUES
('Hullka Coffee', 'assets/img/logo-hullka.png', 1),
('Astur Santa Fe', 'assets/img/logo-astur.png', 2),
('Aprak', 'assets/img/logo-aprak.png', 3),
('Nuam', 'assets/img/logo-nuam.png', 4),
('Hullka Coffee', 'assets/img/logo-hullka.png', 5),
('Astur Santa Fe', 'assets/img/logo-astur.png', 6);

INSERT INTO `tbl_location` (`city`, `region`, `label`, `description`, `lng`, `lat`, `projects_count`, `sort_order`) VALUES
('Lima', 'Costa', 'Sede principal y proyectos enterprise', 'Desarrollo web, sistemas a medida y SEO para empresas en Lima Metropolitana.', -77.042800, -12.046400, 28, 1),
('Cajamarca', 'Sierra Norte', 'Proyectos regionales', 'Implementación de plataformas y webs para negocios en expansión en el norte del Perú.', -78.523000, -7.161700, 6, 2),
('Trujillo', 'La Libertad', 'Presencia en la costa norte', 'Sitios corporativos y tiendas online con enfoque comercial.', -79.029000, -8.111600, 4, 3),
('Arequipa', 'Sur', 'Soluciones para el sur', 'Webs y sistemas para retail y servicios en Arequipa.', -71.537500, -16.409000, 3, 4);

INSERT INTO `tbl_site_section` (`section_key`, `kicker`, `title`, `subtitle`) VALUES
('features', 'Lo que hacemos', 'Soluciones digitales que escalan contigo', 'Páginas web, sistemas y SEO pensados para vender más.'),
('map', 'Presencia en Perú', 'Proyectos que conectan regiones', 'Trabajamos con equipos en Lima, Cajamarca y más ciudades del país.'),
('trust', 'Portafolio', 'Confían en nosotros', 'Marcas que ya transformaron su operación digital con DIINTEC.'),
('clients', 'Casos', 'Nuestros clientes', 'Proyectos reales con impacto medible en negocio.'),
('projects_page', 'Portafolio', 'Proyectos realizados', 'Explora lo que podemos construir para tu marca.'),
('services_page', 'Servicios', 'Diseño digital de otro mundo', 'Estrategia, diseño, desarrollo y posicionamiento en un solo equipo.'),
('blog_page', 'Insights', 'Blog DIINTEC', 'Ideas, tendencias y buenas prácticas para crecer online.');

SET FOREIGN_KEY_CHECKS = 1;
