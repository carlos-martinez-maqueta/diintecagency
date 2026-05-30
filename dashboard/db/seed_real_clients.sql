USE `db_diintec`;
SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM `tbl_client`;
ALTER TABLE `tbl_client` AUTO_INCREMENT = 1;

INSERT INTO `tbl_client` (`name`, `logo`, `hover_text`, `tagline`, `project_url`, `sort_order`, `state`) VALUES
('Hullka Coffee', 'assets/img/logo-hullka.png', 'Sistema integral | Acopio | Facturación SUNAT', 'Digitalización completa del café', 'proyecto/hullka-coffee', 1, 'active'),
('Aprocam', 'assets/img/logo-aprak.png', 'Sistema integral | App offline | Geolocalización', 'Cooperativa cacaotera digital', 'proyecto/aprocam', 2, 'active'),
('Aprak Perú', 'assets/img/logo-aprak.png', 'Landing bilingüe | Exportación | SEO', 'Naranja peruana al mundo', 'proyecto/aprak', 3, 'active'),
('Nuam', 'assets/img/logo-nuam.png', 'Plataforma académica | Exámenes virtuales', 'Educación digital integral', 'proyecto/nuam', 4, 'active'),
('Meddi', 'assets/img/logo-hullka.png', 'Intranet | HubSpot | Pasarela de pago', 'Citas médicas online', 'proyecto/meddi', 5, 'active'),
('Ayllu Eventos', 'assets/img/logo-hullka.png', 'Presupuestador | Landing | Dashboard', 'Eventos a tu medida', 'proyecto/ayllu-eventos', 6, 'active'),
('Astur Santa Fe', 'assets/img/logo-astur.png', 'Hotel | Restaurante | SUNAT', 'Hospitalidad conectada', 'proyecto/astur-santa-fe', 7, 'active'),
('TransporteSafe', 'assets/img/logo-hullka.png', 'Reservas | Pasarela | App conductor', 'Movilidad segura en México', 'proyecto/transportesafe', 8, 'active');

DELETE FROM `tbl_trust_brand`;
ALTER TABLE `tbl_trust_brand` AUTO_INCREMENT = 1;

INSERT INTO `tbl_trust_brand` (`name`, `image`, `url`, `sort_order`, `state`) VALUES
('Hullka Coffee', 'assets/img/logo-hullka.png', 'https://hullkacoffee.pe/', 1, 'active'),
('Aprocam', 'assets/img/logo-aprak.png', NULL, 2, 'active'),
('Aprak Perú', 'assets/img/logo-aprak.png', 'https://aprakperu.com/', 3, 'active'),
('Nuam', 'assets/img/logo-nuam.png', NULL, 4, 'active'),
('Astur Santa Fe', 'assets/img/logo-astur.png', 'https://astursantafe.com/', 5, 'active'),
('Meddi', 'assets/img/logo-hullka.png', 'https://citasenlinea.meddi.pe/', 6, 'active'),
('Ayllu Eventos', 'assets/img/logo-hullka.png', 'https://ayllueventos.com/', 7, 'active'),
('Lamour', 'assets/img/logo-hullka.png', 'https://lamour.pe/', 8, 'active'),
('TransporteSafe', 'assets/img/logo-hullka.png', 'https://transportesafe.com/', 9, 'active'),
('SanValentin.com.pe', 'assets/img/logo-hullka.png', 'https://sanvalentin.com.pe/', 10, 'active'),
('Canastas Corporativas', 'assets/img/logo-hullka.png', 'https://canastascorporativas.pe/', 11, 'active');

SET FOREIGN_KEY_CHECKS = 1;
