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
        $stmt = $conn->prepare('SELECT id, name, email, password FROM tbl_admin WHERE email = :mail');
        $stmt->bindParam(':mail', $correo);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($pass, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];

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
