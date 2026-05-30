<?php
/**
 * Ejecutar una vez: http://localhost/diintecagency/v2/dashboard/install-site-schema.php
 * Importa tablas y datos del sitio público en db_diintec.
 */
require_once __DIR__ . '/config/conexion.php';

if (!$conn instanceof PDO) {
    die('No hay conexión MySQL. Verifica que XAMPP esté activo.');
}

$sqlFile = __DIR__ . '/db/schema_diintec_site.sql';
if (!is_file($sqlFile)) {
    die('No se encontró schema_diintec_site.sql');
}

$sql = file_get_contents($sqlFile);
$statements = array_filter(array_map('trim', preg_split('/;\s*\n/', $sql)));

$ok = 0;
$errors = [];

foreach ($statements as $statement) {
    if ($statement === '' || strpos(ltrim($statement), '--') === 0) {
        continue;
    }
    try {
        $conn->exec($statement);
        $ok++;
    } catch (PDOException $e) {
        $errors[] = $e->getMessage();
    }
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>Instalación schema sitio DIINTEC</h1>';
echo '<p>Sentencias ejecutadas: ' . (int) $ok . '</p>';
if ($errors) {
    echo '<h2>Avisos/errores</h2><ul>';
    foreach ($errors as $err) {
        echo '<li>' . htmlspecialchars($err) . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p style="color:green">Listo. Ya puedes recargar el home.</p>';
}
echo '<p><a href="../index.php">Ir al sitio</a></p>';
