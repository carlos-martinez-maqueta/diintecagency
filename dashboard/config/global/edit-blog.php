<?php
include '../conexion.php';
include '../../class/global.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_id = $_POST['blog_id'] ?? null;
    $title = $_POST['title'] ?? null;
    $description = $_POST['description'] ?? null;
    $summernote = $_POST['summernote'] ?? null;
    $url = $_POST['url'] ?? null;
    $labels_seleccionadas = $_POST['labels_seleccionadas'] ?? null;

    if (!$blog_id) {
        echo json_encode([
            'status' => 'error',
            'message' => 'ID del blog no proporcionado.'
        ]);
        exit;
    }

    // Actualizar datos principales del blog
    $stmt = $conn->prepare("UPDATE tbl_blog 
        SET title = :title, description = :description, summer = :summer, friendly_url = :url 
        WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':summer', $summernote);
    $stmt->bindParam(':url', $url);
    $stmt->bindParam(':id', $blog_id);

    if ($stmt->execute()) {
        // Si hay nueva imagen
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $nombreArchivoUnico = uniqid('image_', true) . '.' . pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
            $rutaDestino = "../../img/blog/" . $nombreArchivoUnico;

            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
                $imagen = $nombreArchivoUnico;
                $stmt2 = $conn->prepare("UPDATE tbl_blog SET banner = :banner WHERE id = :id");
                $stmt2->bindParam(':banner', $imagen);
                $stmt2->bindParam(':id', $blog_id);
                $stmt2->execute();
            }
        }

        // Actualizar etiquetas
        if (!empty($labels_seleccionadas)) {
            $labelsArray = explode(",", $labels_seleccionadas);

            // Eliminar etiquetas anteriores
            $conn->prepare("DELETE FROM tbl_blog_label WHERE blog_id = :blog_id")
                 ->execute([':blog_id' => $blog_id]);

            // Insertar nuevas etiquetas
            foreach ($labelsArray as $labelId) {
                $stmtLabel = $conn->prepare("INSERT INTO tbl_blog_label (blog_id, label_id) VALUES (:blog_id, :label_id)");
                $stmtLabel->bindParam(':blog_id', $blog_id);
                $stmtLabel->bindParam(':label_id', $labelId);
                $stmtLabel->execute();
            }
        }

        echo json_encode([
            'status' => 'success',
            'message' => 'El blog fue actualizado correctamente.'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Ocurrió un error al actualizar el blog.'
        ]);
    }
}
