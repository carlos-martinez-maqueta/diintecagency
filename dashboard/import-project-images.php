<?php
/**
 * Una vez: http://localhost/diintecagency/v2/dashboard/import-project-images.php
 * Importa las capturas de C:\Users\cmart\Documents\proyectos\<slug>\*
 * → dashboard/img/projects/<slug>_N.png
 * Actualiza tbl_project.image (principal = primera) y rellena tbl_project_image.
 */
require_once __DIR__ . '/config/conexion.php';
require_once __DIR__ . '/class/Admin.php';

if (!$conn instanceof PDO) die('Sin conexión MySQL.');

$source = 'C:\\Users\\cmart\\Documents\\proyectos';
$destRel = 'dashboard/img/projects';
$destAbs = __DIR__ . '/img/projects';
if (!is_dir($destAbs)) @mkdir($destAbs, 0775, true);

$slugMap = [
    'hullka' => 'hullka-coffee',
    'aprak' => 'aprak',
    'ayllu' => 'ayllu-eventos',
    'meddi' => 'meddi',
    'transportesafe' => 'transportesafe',
    'lamour' => 'lamour',
    'sanvalentin' => 'san-valentin',
    'canastascorporativas' => 'canastas-corporativas',
];

$log = [];
foreach ($slugMap as $folder => $dbSlug) {
    $dir = $source . DIRECTORY_SEPARATOR . $folder;
    if (!is_dir($dir)) { $log[] = "SKIP folder: $dir"; continue; }

    $files = glob($dir . DIRECTORY_SEPARATOR . '*.{png,jpg,jpeg,webp,PNG,JPG,JPEG,WEBP}', GLOB_BRACE) ?: [];
    sort($files);
    if (!$files) { $log[] = "SKIP empty: $dir"; continue; }

    $stmt = $conn->prepare("SELECT id FROM tbl_project WHERE slug = :s LIMIT 1");
    $stmt->execute([':s' => $dbSlug]);
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    if (!$row) { $log[] = "PROJECT NOT FOUND: $dbSlug"; continue; }
    $projectId = (int) $row->id;

    $conn->prepare("DELETE FROM tbl_project_image WHERE project_id = :id")->execute([':id' => $projectId]);

    $count = 0;
    $firstRelPath = null;
    foreach ($files as $i => $src) {
        $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
        if (!in_array($ext, ['png', 'jpg', 'jpeg', 'webp'])) continue;
        $count++;
        $name = $folder . '_' . $count . '.' . $ext;
        $destFile = $destAbs . '/' . $name;
        $relPath = $destRel . '/' . $name;
        if (copy($src, $destFile)) {
            if ($firstRelPath === null) $firstRelPath = $relPath;
            $ins = $conn->prepare("INSERT INTO tbl_project_image (project_id, image, caption, sort_order) VALUES (:p, :i, :c, :s)");
            $ins->execute([
                ':p' => $projectId,
                ':i' => $relPath,
                ':c' => '',
                ':s' => $count,
            ]);
            $log[] = "OK $name → $dbSlug";
        } else {
            $log[] = "FAIL copy $src";
        }
    }

    if ($firstRelPath) {
        $up = $conn->prepare("UPDATE tbl_project SET image = :img WHERE id = :id");
        $up->execute([':img' => $firstRelPath, ':id' => $projectId]);
        $log[] = "MAIN IMG $dbSlug = $firstRelPath";
    }
}

header('Content-Type: text/html; charset=utf-8');
echo '<h1>Importar imágenes de proyectos</h1><pre style="background:#f5f5f5;padding:10px;font-size:12px">';
foreach ($log as $l) echo htmlspecialchars($l) . "\n";
echo '</pre><p><a href="../proyectos">Ver proyectos</a></p>';
