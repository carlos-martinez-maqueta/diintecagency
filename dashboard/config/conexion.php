<?php
$host = 'localhost';
$database = 'db_diintec';
$user = 'root';
$pass = '';

$conn = null;
$pdoOptions = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::ATTR_TIMEOUT => '1',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $pdoOptions);
} catch (PDOException $e) {
    try {
        $bootstrap = new PDO("mysql:host=$host", $user, $pass, $pdoOptions);
        $bootstrap->exec("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $conn = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $pdoOptions);
    } catch (PDOException $e2) {
        $conn = null;
    }
}
?>