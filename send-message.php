<?php
/**
 * Procesador de formulario de contacto
 * Este archivo maneja el envío de mensajes del formulario de contacto
 */

// Cargar configuración
$config = include __DIR__ . '/config.php';

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contact');
    exit;
}

// Función para limpiar datos de entrada
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Validar campos requeridos
$errors = [];
$name = isset($_POST['name']) ? cleanInput($_POST['name']) : '';
$email = isset($_POST['email']) ? cleanInput($_POST['email']) : '';
$subject = isset($_POST['subject']) ? cleanInput($_POST['subject']) : '';
$message = isset($_POST['message']) ? cleanInput($_POST['message']) : '';

// Validaciones
if (empty($name)) {
    $errors[] = 'El nombre es requerido';
}

if (empty($email)) {
    $errors[] = 'El email es requerido';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'El email no es válido';
}

if (empty($subject)) {
    $errors[] = 'El asunto es requerido';
}

if (empty($message)) {
    $errors[] = 'El mensaje es requerido';
}

// Si hay errores, redirigir de vuelta
if (!empty($errors)) {
    $errorMsg = implode(', ', $errors);
    header('Location: /contact?error=' . urlencode($errorMsg));
    exit;
}

// Preparar los datos del mensaje
$messageData = [
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
    'timestamp' => date('Y-m-d H:i:s'),
    'ip' => $_SERVER['REMOTE_ADDR'],
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'No disponible',
    'site' => $_SERVER['HTTP_HOST']
];

// Función para enviar mensaje a través de email (método legacy)
// La función sendEmail ha sido eliminada ya que solo usamos webhooks

/**
 * Envía un mensaje de contacto a través de un webhook.
 * 
 * Esta función detecta automáticamente el tipo de webhook y formatea los datos 
 * según corresponda. Actualmente soporta webhooks genéricos y webhooks de Discord.
 * 
 * @param array $config La configuración del sitio
 * @param array $messageData Los datos del mensaje a enviar
 * @return bool True si el mensaje se envió correctamente, False en caso contrario
 */
function sendWebhook($config, $messageData) {
    // Verificar si hay URL de webhook configurada
    if (empty($config['contacto']['webhook_url'])) {
        error_log('No hay URL de webhook configurada');
        return false;
    }

    $webhookUrl = $config['contacto']['webhook_url'];

    // Añadir datos adicionales
    $messageData['timestamp'] = date('Y-m-d H:i:s');
    $messageData['site_name'] = $_SERVER['HTTP_HOST'] ?? 'cubenet.fun';
    $messageData['origin'] = 'contact_form';

    // Registrar intento en el log
    $logEntry = date('Y-m-d H:i:s') . " - Enviando mensaje a webhook - De: {$messageData['name']} ({$messageData['email']}) - Asunto: {$messageData['subject']}\n";
    @file_put_contents(__DIR__ . '/contact_messages.log', $logEntry, FILE_APPEND | LOCK_EX);
    
    // Añadir firma de seguridad si hay clave secreta (excepto para Discord que tiene su propio sistema)
    if (!empty($config['contacto']['webhook_secret']) && !strpos($webhookUrl, 'discord.com/api/webhooks')) {
        // Clonar los datos para firmar (sin incluir la firma previa si existe)
        $dataToSign = $messageData;
        if (isset($dataToSign['signature'])) {
            unset($dataToSign['signature']);
        }
        
        $messageData['signature'] = hash_hmac(
            'sha256',
            json_encode($dataToSign),
            $config['contacto']['webhook_secret']
        );
    }
    
    // Detectar si es un webhook de Discord y formatear los datos adecuadamente
    if (strpos($webhookUrl, 'discord.com/api/webhooks') !== false) {
        return sendDiscordWebhook($config, $messageData);
    }
    
    // Para otros webhooks, usar el formato genérico
    if (function_exists('curl_version')) {
        return sendWebhookWithCurl($config, $messageData);
    } else {
        return sendWebhookWithFileGetContents($config, $messageData);
    }
}

/**
 * Envía un mensaje de contacto específicamente a un webhook de Discord.
 * 
 * Discord requiere un formato de datos específico que incluye embeds, campos y formato visual.
 * Esta función formatea los datos del mensaje para que sean compatibles con Discord.
 * 
 * @param array $config La configuración del sitio
 * @param array $messageData Los datos del mensaje a enviar
 * @return bool True si el mensaje se envió correctamente, False en caso contrario
 */
function sendDiscordWebhook($config, $messageData) {
    $webhookUrl = $config['contacto']['webhook_url'];
    $timeout = $config['contacto']['webhook_timeout'] ?? 10;
    
    // Formatear los datos para Discord siguiendo la estructura de la API de Discord
    // https://discord.com/developers/docs/resources/webhook#execute-webhook
    $discordData = [
        'username' => 'CubeNet Contact Form',
        'avatar_url' => 'https://cubenet.fun/assets/img/favicon.ico',
        'embeds' => [
            [
                'title' => 'Nuevo mensaje de contacto: ' . $messageData['subject'],
                'color' => 3447003, // Color azul en formato decimal (#3366ff)
                'fields' => [
                    [
                        'name' => 'Nombre',
                        'value' => $messageData['name'],
                        'inline' => true
                    ],
                    [
                        'name' => 'Email',
                        'value' => $messageData['email'],
                        'inline' => true
                    ],
                    [
                        'name' => 'Mensaje',
                        'value' => strlen($messageData['message']) > 1000 ? 
                            substr($messageData['message'], 0, 997) . '...' : 
                            $messageData['message']
                    ]
                ],
                'footer' => [
                    'text' => 'Enviado desde formulario de contacto · ' . $messageData['timestamp']
                ]
            ]
        ]
    ];
    
    try {
        // Inicializar curl
        $ch = curl_init($webhookUrl);
        
        // Configurar opciones
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($discordData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Considerar cambiar a true en producción
        
        // Ejecutar la solicitud
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        // Verificar si hubo error
        if (curl_errno($ch)) {
            $errorMsg = curl_error($ch);
            curl_close($ch);
            $logError = date('Y-m-d H:i:s') . " - Error Discord CURL: $errorMsg\n";
            @file_put_contents(__DIR__ . '/contact_messages.log', $logError, FILE_APPEND | LOCK_EX);
            error_log("Error CURL al enviar webhook a Discord: $errorMsg");
            return false;
        }
        
        curl_close($ch);
        
        // Verificar código de estado HTTP
        $success = $httpCode >= 200 && $httpCode < 300;
        
        // Registrar resultado en el log
        $resultLog = date('Y-m-d H:i:s') . " - Resultado webhook Discord: " . 
                    ($success ? "ÉXITO" : "ERROR") . 
                    " - Código HTTP: $httpCode\n";
        if (!$success && !empty($result)) {
            $resultLog .= date('Y-m-d H:i:s') . " - Respuesta error Discord: " . $result . "\n";
        }
        @file_put_contents(__DIR__ . '/contact_messages.log', $resultLog, FILE_APPEND | LOCK_EX);
        
        return $success;
    } catch (Exception $e) {
        $errorMsg = $e->getMessage();
        $logError = date('Y-m-d H:i:s') . " - Excepción Discord: $errorMsg\n";
        @file_put_contents(__DIR__ . '/contact_messages.log', $logError, FILE_APPEND | LOCK_EX);
        error_log('Excepción al enviar webhook a Discord: ' . $errorMsg);
        return false;
    }
}

/**
 * Envía datos a un webhook usando la extensión cURL.
 * 
 * Esta función es la método preferido para enviar datos a webhooks genéricos.
 * Utiliza cURL que ofrece mayor control y mejor manejo de errores.
 *
 * @param array $config La configuración del sitio
 * @param array $messageData Los datos del mensaje a enviar
 * @return bool True si el mensaje se envió correctamente, False en caso contrario
 */
function sendWebhookWithCurl($config, $messageData) {
    $webhookUrl = $config['contacto']['webhook_url'];
    $timeout = $config['contacto']['webhook_timeout'] ?? 10;
    
    try {
        // Inicializar curl
        $ch = curl_init($webhookUrl);
        
        // Configurar opciones
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Devuelve el resultado en lugar de mostrarlo
        curl_setopt($ch, CURLOPT_POST, true); // Método POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData)); // Datos a enviar
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); // Cabecera JSON
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); // Tiempo máximo de espera
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // En producción cambiar a true para seguridad
        
        // Ejecutar la solicitud
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        // Verificar si hubo error
        if (curl_errno($ch)) {
            $errorMsg = curl_error($ch);
            curl_close($ch);
            error_log("Error CURL al enviar webhook: $errorMsg");
            return false;
        }
        
        curl_close($ch);
        
        // Verificar código de estado HTTP
        $success = $httpCode >= 200 && $httpCode < 300;
        
        // Registrar resultado en el log
        $resultLog = date('Y-m-d H:i:s') . " - Resultado webhook: " . 
                    ($success ? "ÉXITO" : "ERROR") . 
                    " - Código HTTP: $httpCode\n";
        @file_put_contents(__DIR__ . '/contact_messages.log', $resultLog, FILE_APPEND | LOCK_EX);
        
        return $success;
    } catch (Exception $e) {
        error_log('Excepción CURL al enviar webhook: ' . $e->getMessage());
        return false;
    }
}

/**
 * Envía datos a un webhook usando file_get_contents como método alternativo.
 * 
 * Esta función se utiliza como fallback cuando cURL no está disponible en el sistema.
 * Aunque es menos potente que cURL, funciona en la mayoría de servidores PHP.
 *
 * @param array $config La configuración del sitio
 * @param array $messageData Los datos del mensaje a enviar
 * @return bool True si el mensaje se envió correctamente, False en caso contrario
 */
function sendWebhookWithFileGetContents($config, $messageData) {
    // Configurar opciones de la solicitud
    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($messageData),
            'timeout' => $config['contacto']['webhook_timeout'] ?? 10,
            'ignore_errors' => true // Para capturar el código HTTP incluso en errores
        ]
    ];

    // Crear contexto de la solicitud
    $context = stream_context_create($options);

    // Intentar enviar la solicitud al webhook
    try {
        $result = @file_get_contents($config['contacto']['webhook_url'], false, $context);
        
        // Obtener el código de respuesta
        $status_line = $http_response_header[0] ?? '';
        preg_match('{HTTP/\S*\s(\d{3})}', $status_line, $match);
        $httpCode = $match[1] ?? 500;
        
        // Verificar si hubo error HTTP
        if ($result === false) {
            $errorMsg = error_get_last()['message'] ?? 'Error desconocido';
            error_log("Error al enviar mensaje al webhook: $errorMsg");
            
            // Registrar error en el log
            $errorLog = date('Y-m-d H:i:s') . " - Error webhook: $errorMsg\n";
            @file_put_contents(__DIR__ . '/contact_messages.log', $errorLog, FILE_APPEND | LOCK_EX);
            
            return false;
        }
        
        // Verificar código de estado HTTP
        $success = $httpCode >= 200 && $httpCode < 300;
        
        // Registrar resultado en el log
        $resultLog = date('Y-m-d H:i:s') . " - Resultado webhook: " . 
                    ($success ? "ÉXITO" : "ERROR") . 
                    " - Código HTTP: $httpCode\n";
        @file_put_contents(__DIR__ . '/contact_messages.log', $resultLog, FILE_APPEND | LOCK_EX);
        
        return $success;
    } catch (Exception $e) {
        error_log('Excepción al enviar mensaje al webhook: ' . $e->getMessage());
        return false;
    }
}

// Enviar el mensaje mediante webhook - ahora solo usamos webhooks, sin fallback a email
$success = sendWebhook($config, $messageData);

if ($success) {
    // Guardar mensaje en archivo de log (opcional)
    $logEntry = date('Y-m-d H:i:s') . " - Mensaje de: $name ($email) - Asunto: $subject\n";
    file_put_contents(__DIR__ . '/contact_messages.log', $logEntry, FILE_APPEND | LOCK_EX);
    
    // Redirigir con mensaje de éxito
    header('Location: /contact?success=1');
} else {
    // Error al enviar
    header('Location: /contact?error=' . urlencode('Error al enviar el mensaje. Inténtalo de nuevo.'));
}

exit;
?>
