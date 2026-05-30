<?php
include '../conexion.php';
include '../../class/global.php';


session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $title =  !empty($_POST['title']) ? $_POST['title'] : null;
    $description =  !empty($_POST['description']) ? $_POST['description'] : null;
    $summernote =  !empty($_POST['summernote']) ? $_POST['summernote'] : null;
    $url =  !empty($_POST['url']) ? $_POST['url'] : null;
    $labels_seleccionadas =  !empty($_POST['labels_seleccionadas']) ? $_POST['labels_seleccionadas'] : null;







    // Editar el resto de los campos
    $result = Globales::addBlog($title, $description, $summernote, $url);


    if ($result->execute()) {

        $lastInsertedId = $conn->lastInsertId();

        // Verificar si se envió una nueva imagen
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            // Generar un nombre único para el archivo
            $nombreArchivoUnico = uniqid('image_', true) . '.' . pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
            $rutaDestino = "../../img/blog/" . $nombreArchivoUnico;

            // Guardar la imagen en la ruta especificada
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
                // Editar la imagen solo si se guardó correctamente
                $imagen = $nombreArchivoUnico;
                $result2 = Globales::editImageBlog($lastInsertedId, $imagen);
                $result2->execute();
            }
        }

        // ✅ Guardar etiquetas relacionadas si se enviaron
        if (!empty($labels_seleccionadas)) {
            $labelsArray = explode(",", $labels_seleccionadas);
            foreach ($labelsArray as $labelId) {
                $stmtLabel = $conn->prepare("INSERT INTO tbl_blog_label (blog_id, label_id) VALUES (:blog_id, :label_id)");
                $stmtLabel->bindParam(':blog_id', $lastInsertedId);
                $stmtLabel->bindParam(':label_id', $labelId);
                $stmtLabel->execute();
            }
        }


        // Items registrado correctamente
        $response = array(
            'status' => 'success',
            'message' => 'El blog se publicó correctamente.'
        );
    } else {
        // Error al registrar Items
        $response = array(
            'status' => 'error',
            'message' => 'Error al agregar blog.'
        );
    }
    // Devolver la respuesta como JSON
    echo json_encode($response);
}
