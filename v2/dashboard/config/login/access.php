<?php
session_start();
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : null;
    $pass = isset($_POST['pass']) ? trim($_POST['pass']) : null;

    // Validar que los campos no estén vacíos
    if (!$correo || !$pass) {
        $response = array(
            'status' => 'error',
            'message' => 'El correo electrónico y la contraseña son obligatorios.'
        );
        echo json_encode($response);
        exit;
    }

    try {
        // Consulta para obtener la información del usuario por correo electrónico
        $stmt = $conn->prepare('SELECT id, name, mail, pass FROM tbl_admin WHERE mail = :mail');
        $stmt->bindParam(':mail', $correo);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verificar la contraseña
            if (password_verify($pass, $user['pass'])) {
                // Contraseña correcta, iniciar sesión
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['mail'];

                $response = array(
                    'status' => 'success',
                    'message' => 'Usuario autenticado exitosamente.'
                );
            } else {
                // Contraseña incorrecta
                $response = array(
                    'status' => 'error',
                    'message' => 'Nombre de usuario o contraseña incorrecta.'
                );
            }
        } else {
            // Usuario no encontrado
            $response = array(
                'status' => 'error',
                'message' => 'Nombre de usuario o contraseña incorrecta.'
            );
        }
    } catch (PDOException $e) {
        $response = array(
            'status' => 'error',
            'message' => 'Hubo un error al procesar la solicitud: ' . $e->getMessage()
        );
    }

    // Devolver la respuesta como JSON
    echo json_encode($response);
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Método de solicitud no permitido'
    );
    echo json_encode($response);
}
?>
