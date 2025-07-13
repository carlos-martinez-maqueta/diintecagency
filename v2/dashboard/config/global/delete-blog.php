<?php
include '../conexion.php';

if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];

    try {
        // Eliminar etiquetas relacionadas
        $stmt1 = $conn->prepare("DELETE FROM tbl_blog_label WHERE blog_id = :id");
        $stmt1->bindParam(':id', $blog_id);
        $stmt1->execute();

        // Eliminar el blog
        $stmt2 = $conn->prepare("DELETE FROM tbl_blog WHERE id = :id");
        $stmt2->bindParam(':id', $blog_id);
        $stmt2->execute();

        header("Location: ../../blog"); // redirige con mensaje
        exit;
    } catch (Exception $e) {
        echo "Error al eliminar: " . $e->getMessage();
    }
} else {
    echo "ID no proporcionado.";
}
