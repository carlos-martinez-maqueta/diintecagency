<?php
/**
 * Una vez: http://localhost/diintecagency/v2/dashboard/install-blog-schema.php
 * Crea tablas tbl_admin, tbl_label, tbl_blog, tbl_blog_label
 */
require_once __DIR__ . '/config/conexion.php';

if (!$conn instanceof PDO) {
    die('Sin conexión MySQL.');
}

$sqlFile = __DIR__ . '/db/schema_blog.sql';
if (!is_file($sqlFile)) {
    die('No se encontró schema_blog.sql');
}

$sql = file_get_contents($sqlFile);
$statements = preg_split('/;\s*\n/', $sql);

$ok = 0;
$errors = [];
foreach ($statements as $stmt) {
    $stmt = trim($stmt);
    if ($stmt === '' || strpos($stmt, '--') === 0) continue;
    try {
        $conn->exec($stmt);
        $ok++;
    } catch (PDOException $e) {
        $errors[] = $e->getMessage();
    }
}

$adminPass = password_hash('admin123', PASSWORD_BCRYPT);
try {
    $update = $conn->prepare("UPDATE tbl_admin SET password = :p WHERE email = 'admin@diintec.com'");
    $update->bindValue(':p', $adminPass);
    $update->execute();
} catch (Throwable $e) {}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>Instalación schema BLOG</h1>';
echo '<p>Sentencias ejecutadas: ' . (int) $ok . '</p>';
if ($errors) {
    echo '<h3>Avisos:</h3><ul>';
    foreach ($errors as $e) echo '<li>' . htmlspecialchars($e) . '</li>';
    echo '</ul>';
} else {
    echo '<p style="color:green">Listo. El blog ya carga.</p>';
}
echo '<p>Login admin: <b>admin@diintec.com</b> / <b>admin123</b></p>';
echo '<p><a href="../blog">Ver blog</a> · <a href="login">Login admin</a></p>';
