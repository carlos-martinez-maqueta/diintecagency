<?php
// URL de la API de HubSpot
$apiUrl = 'https://api.hubapi.com/crm/v3/objects/contacts/';
$apiKey = 'pat-na1-ea96b7b5-f502-447d-8769-c95d74879329'; // Sustituye con tu token de API de HubSpot

// Inicializar cURL
$ch = curl_init($apiUrl);

// Configurar la solicitud cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiKey"
]);

// Ejecutar la solicitud
$response = curl_exec($ch);

// Verificar si hubo un error en la solicitud
if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(['error' => 'Error en la solicitud a la API: ' . curl_error($ch)]);
    curl_close($ch);
    exit();
}

// Verificar el código de respuesta HTTP
if (curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
    http_response_code(500);
    echo json_encode(['error' => 'Error en la respuesta de la API']);
    curl_close($ch);
    exit();
}

// Cerrar cURL
curl_close($ch);

// Devuelve la respuesta en formato JSON
header('Content-Type: application/json');
echo $response;
?>
