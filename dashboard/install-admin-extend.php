<?php
require_once __DIR__ . '/config/conexion.php';
if (!$conn instanceof PDO) die('Sin conexión MySQL.');

$steps = [
    "CREATE TABLE IF NOT EXISTS `tbl_project_image` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `project_id` int(11) NOT NULL,
        `image` varchar(255) NOT NULL,
        `caption` varchar(255) DEFAULT NULL,
        `sort_order` int(11) DEFAULT 0,
        PRIMARY KEY (`id`),
        KEY `project_id` (`project_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
    "ALTER TABLE `tbl_project` ADD COLUMN `long_description` longtext NULL AFTER `description`",
    "ALTER TABLE `tbl_trust_brand` ADD COLUMN `url` varchar(255) NULL AFTER `image`",
];

$log = [];
foreach ($steps as $sql) {
    try { $conn->exec($sql); $log[] = ['ok' => substr($sql, 0, 90)]; }
    catch (PDOException $e) { $log[] = ['skip' => substr($sql, 0, 90), 'm' => $e->getMessage()]; }
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>Extender schema admin</h1><ul>';
foreach ($log as $r) echo '<li>' . htmlspecialchars(json_encode($r, JSON_UNESCAPED_UNICODE)) . '</li>';
echo '</ul><p><a href="admin-projects">Ir a Proyectos</a></p>';
