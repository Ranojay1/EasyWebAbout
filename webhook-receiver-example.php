<?php
/**
 * Webhook Example - Recibir mensajes del sistema de contacto
 * 
 * Este es un ejemplo de cómo configurar un endpoint para recibir 
 * los mensajes enviados desde el formulario de contacto.
 * 
 * Puedes usar este script como base para crear tu propio webhook
 * o integrar con servicios existentes.
 */

// Configuración
$secretKey = 'tu_clave_secreta'; // Debe coincidir con 'webhook_secret' en config.php
$logFile = 'webhook_received.log';
$notifyEmail = 'tu@email.com'; // Opcional: email para recibir notificaciones

// Obtener datos del webhook
$rawData = file_get_contents('php://input');
$headers = getallheaders();

// Registrar cada solicitud recibida (opcional)
file_put_contents($logFile, date('Y-m-d H:i:s') . " - Webhook recibido\n", FILE_APPEND);

// Verificar que sea una solicitud POST con JSON
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

// Intentar decodificar los datos JSON
$data = json_decode($rawData, true);
if (empty($data) || json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Datos JSON inválidos']);
    exit;
}

// Verificar firma si está configurada
if (!empty($secretKey)) {
    // Extraer la firma de los datos
    $receivedSignature = $data['signature'] ?? '';
    
    // Clonar los datos sin la firma para verificar
    $dataToVerify = $data;
    unset($dataToVerify['signature']);
    
    // Calcular la firma esperada
    $expectedSignature = hash_hmac('sha256', json_encode($dataToVerify), $secretKey);
    
    // Verificar que las firmas coincidan
    if (!hash_equals($expectedSignature, $receivedSignature)) {
        http_response_code(401); // Unauthorized
        echo json_encode(['error' => 'Firma inválida']);
        file_put_contents($logFile, date('Y-m-d H:i:s') . " - ERROR: Firma inválida\n", FILE_APPEND);
        exit;
    }
}

// Si llegamos aquí, los datos son válidos

// Registrar el mensaje recibido
$logMessage = date('Y-m-d H:i:s') . " - Mensaje de: {$data['name']} ({$data['email']}) - Asunto: {$data['subject']}\n";
file_put_contents($logFile, $logMessage, FILE_APPEND);

// Enviar una notificación por email (opcional)
if (!empty($notifyEmail)) {
    $subject = "Nuevo mensaje de contacto: {$data['subject']}";
    $message = "Nombre: {$data['name']}\n";
    $message .= "Email: {$data['email']}\n";
    $message .= "Mensaje: {$data['message']}\n";
    $message .= "\nRecibido el: {$data['timestamp']}";
    
    mail($notifyEmail, $subject, $message);
}

// Realizar otras acciones según necesites
// Por ejemplo: guardar en base de datos, integrar con CRM, etc.

// Responder al webhook con éxito
http_response_code(200);
echo json_encode([
    'success' => true,
    'message' => 'Mensaje recibido correctamente',
    'timestamp' => date('Y-m-d H:i:s')
]);
