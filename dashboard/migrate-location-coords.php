<?php
/**
 * Una vez: http://localhost/diintecagency/v2/dashboard/migrate-location-coords.php
 */
require_once __DIR__ . '/config/conexion.php';

if (!$conn instanceof PDO) {
    die('Sin conexión MySQL.');
}

$steps = [
    "ALTER TABLE `tbl_location` ADD COLUMN `lng` decimal(10,6) DEFAULT NULL AFTER `map_y`",
    "ALTER TABLE `tbl_location` ADD COLUMN `lat` decimal(10,6) DEFAULT NULL AFTER `lng`",
    "UPDATE `tbl_location` SET `lng` = -77.042800, `lat` = -12.046400 WHERE `city` = 'Lima'",
    "UPDATE `tbl_location` SET `lng` = -78.523000, `lat` = -7.161700 WHERE `city` = 'Cajamarca'",
    "UPDATE `tbl_location` SET `lng` = -79.029000, `lat` = -8.111600 WHERE `city` = 'Trujillo'",
    "UPDATE `tbl_location` SET `lng` = -71.537500, `lat` = -16.409000 WHERE `city` = 'Arequipa'",
];

$log = [];
foreach ($steps as $sql) {
    try {
        $conn->exec($sql);
        $log[] = ['ok' => $sql];
    } catch (PDOException $e) {
        $log[] = ['skip' => $sql, 'msg' => $e->getMessage()];
    }
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>Migración coordenadas mapa</h1><ul>';
foreach ($log as $row) {
    echo '<li>' . htmlspecialchars(json_encode($row, JSON_UNESCAPED_UNICODE)) . '</li>';
}
echo '</ul><p><a href="../index.php">Ver home</a></p>';
