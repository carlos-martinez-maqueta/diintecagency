<?php
require_once __DIR__ . '/config/conexion.php';
if (!$conn instanceof PDO) die('Sin conexión MySQL.');

$files = [
    __DIR__ . '/db/seed_real_projects.sql',
    __DIR__ . '/db/seed_real_clients.sql',
];

$ok = 0;
$errors = [];
foreach ($files as $file) {
    if (!is_file($file)) { $errors[] = "No existe: $file"; continue; }
    $sql = file_get_contents($file);
    $statements = preg_split('/;\s*\n/', $sql);
    foreach ($statements as $stmt) {
        $stmt = trim($stmt);
        if ($stmt === '' || strpos($stmt, '--') === 0) continue;
        try { $conn->exec($stmt); $ok++; }
        catch (PDOException $e) { $errors[] = $e->getMessage(); }
    }
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>Seed proyectos y clientes reales</h1>';
echo '<p>Sentencias ejecutadas: ' . $ok . '</p>';
if ($errors) {
    echo '<h3>Avisos:</h3><ul>';
    foreach ($errors as $e) echo '<li>' . htmlspecialchars($e) . '</li>';
    echo '</ul>';
} else {
    echo '<p style="color:green">Listo. 11 proyectos cargados.</p>';
}
echo '<p><a href="../proyectos">Ver proyectos</a> · <a href="admin-projects">Ir al admin</a></p>';
