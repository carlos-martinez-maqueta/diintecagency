<?php
session_start();
include '../conexion.php';
include '../../class/global.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = !empty($_POST['id']) ? $_POST['id'] : null;
    $status = !empty($_POST['status']) ? $_POST['status'] : null;

   if (!$id || !$status) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Datos incompletos para actualizar el lote.'
        ]);
        exit;
    }

    // Editar el resto de los campos
    $result = Globales::editLoteId($id, $status);

    // Respuesta según éxito
    if ($result->execute()) {
        $response = array(
            'status' => 'success',
            'message' => 'El lote se actualizó correctamente.'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error al actualizar el lote.'
        );
    }

    // Enviar respuesta
    echo json_encode($response);
}
