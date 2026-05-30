-- Ejecutar si ya instalaste el schema antes (añade coordenadas GPS al mapa)
ALTER TABLE `tbl_location`
  ADD COLUMN IF NOT EXISTS `lng` decimal(10,6) DEFAULT NULL AFTER `map_y`,
  ADD COLUMN IF NOT EXISTS `lat` decimal(10,6) DEFAULT NULL AFTER `lng`;

UPDATE `tbl_location` SET `lng` = -77.042800, `lat` = -12.046400 WHERE `city` = 'Lima' AND (`lng` IS NULL OR `lng` = 0);
UPDATE `tbl_location` SET `lng` = -78.523000, `lat` = -7.161700 WHERE `city` = 'Cajamarca' AND (`lng` IS NULL OR `lng` = 0);
UPDATE `tbl_location` SET `lng` = -79.029000, `lat` = -8.111600 WHERE `city` = 'Trujillo' AND (`lng` IS NULL OR `lng` = 0);
UPDATE `tbl_location` SET `lng` = -71.537500, `lat` = -16.409000 WHERE `city` = 'Arequipa' AND (`lng` IS NULL OR `lng` = 0);
