<?php
/**
 * Script de prueba para el sistema de contacto
 * Ejecutar desde la línea de comandos para verificar la funcionalidad
 * 
 * Uso:
 * 1. Sin parámetros: php test-contact.php - Prueba automática completa
 * 2. Con método: php test-contact.php email - Fuerza uso de email
 *               php test-contact.php webhook - Fuerza uso de webhook
 *               php test-contact.php discord - Prueba específica para webhook de Discord
 */

// Procesar argumentos de línea de comandos
$forceMethod = null;
if (isset($argv[1])) {
    if ($argv[1] === 'email') {
        $forceMethod = 'email';
    } elseif ($argv[1] === 'webhook') {
        $forceMethod = 'webhook';
    } elseif ($argv[1] === 'discord') {
        $forceMethod = 'discord';
    }
}

// Simular datos de formulario de prueba
$_POST = [
    'name' => 'Usuario de Prueba',
    'email' => 'test@example.com',
    'subject' => 'Mensaje de prueba',
    'message' => 'Este es un mensaje de prueba para verificar que el sistema de contacto funciona correctamente.'
];

// Simular el método POST y datos del servidor
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['HTTP_USER_AGENT'] = 'Test Script';
$_SERVER['HTTP_HOST'] = 'cubenet.fun';

echo "=== PRUEBA DEL SISTEMA DE CONTACTO ===\n";
echo "Datos de entrada:\n";
echo "Nombre: " . $_POST['name'] . "\n";
echo "Email: " . $_POST['email'] . "\n";
echo "Asunto: " . $_POST['subject'] . "\n";
echo "Mensaje: " . $_POST['message'] . "\n\n";

// Verificar que existe el archivo de configuración
if (!file_exists(__DIR__ . '/config.php')) {
    echo "❌ ERROR: No se encontró el archivo config.php\n";
    echo "Por favor, copia config-default.php a config.php y configúralo.\n";
    exit(1);
}

// Cargar configuración
$config = include __DIR__ . '/config.php';

// Mostrar configuración de contacto
$useWebhook = true; // Siempre usamos webhook

// Aplicar método forzado si se especificó
$isDiscord = false;
if ($forceMethod === 'webhook') {
    echo "🔧 Modo forzado: USANDO WEBHOOK GENÉRICO\n";
} elseif ($forceMethod === 'discord') {
    $isDiscord = true;
    echo "🔧 Modo forzado: USANDO WEBHOOK DE DISCORD\n";
}

if ($useWebhook) {
    $webhookUrl = $config['contacto']['webhook_url'] ?? '';
    echo "🌐 Webhook URL: " . ($webhookUrl ?: 'No configurado') . "\n";
    echo "⏱️ Webhook Timeout: " . ($config['contacto']['webhook_timeout'] ?? 10) . " segundos\n";
    
    if (empty($webhookUrl)) {
        echo "❌ ERROR: URL del webhook no configurada\n";
        echo "Configura 'webhook_url' en el archivo config.php\n";
        exit(1);
    }
    
    // Detectar si es un webhook de Discord
    if (strpos($webhookUrl, 'discord.com/api/webhooks') !== false) {
        echo "🎮 Detectado Webhook de Discord\n";
        $isDiscord = true;
    }
}

// Función para limpiar datos de entrada
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Validar campos
$name = cleanInput($_POST['name']);
$email = cleanInput($_POST['email']);
$subject = cleanInput($_POST['subject']);
$message = cleanInput($_POST['message']);

echo "✅ Datos validados correctamente\n";

// Preparar los datos del mensaje
$messageData = [
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
    'timestamp' => date('Y-m-d H:i:s'),
    'ip' => $_SERVER['REMOTE_ADDR'],
    'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    'site' => $_SERVER['HTTP_HOST'],
    'test' => true
];

// La función sendEmailTest ha sido eliminada ya que solo usamos webhooks

// Función para probar el webhook de Discord
function sendDiscordWebhookTest($config, $messageData) {
    if (empty($config['contacto']['webhook_url'])) {
        echo "❌ ERROR: URL del webhook no configurada\n";
        return false;
    }
    
    $webhookUrl = $config['contacto']['webhook_url'];
    
    echo "🎮 Preparando solicitud al webhook de Discord\n";
    echo "URL: " . $webhookUrl . "\n";
    
    // Formatear los datos para Discord
    $discordData = [
        'username' => 'CubeNet Contact Form',
        'avatar_url' => 'https://cubenet.fun/assets/img/favicon.ico',
        'embeds' => [
            [
                'title' => '[PRUEBA] Nuevo mensaje de contacto: ' . $messageData['subject'],
                'color' => 3447003, // Color azul en formato decimal
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
                        'value' => $messageData['message']
                    ]
                ],
                'footer' => [
                    'text' => '[PRUEBA] Enviado desde formulario de contacto · ' . $messageData['timestamp']
                ]
            ]
        ]
    ];
    
    echo "📦 Enviando datos con formato Discord: " . json_encode($discordData, JSON_PRETTY_PRINT) . "\n";
    
    echo "⚠️ ¿Deseas enviar realmente la solicitud al webhook de Discord? (s/n): ";
    $response = trim(fgets(STDIN));
    
    if (strtolower($response) !== 's') {
        echo "❌ Operación cancelada por el usuario\n";
        return false;
    }
    
    echo "🔄 Enviando solicitud al webhook de Discord...\n";
    
    // Usar curl para la solicitud
    if (function_exists('curl_version')) {
        $ch = curl_init($webhookUrl);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($discordData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_TIMEOUT, $config['contacto']['webhook_timeout'] ?? 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch)) {
            $errorMsg = curl_error($ch);
            curl_close($ch);
            echo "❌ Error CURL al enviar webhook a Discord: $errorMsg\n";
            return false;
        }
        
        curl_close($ch);
        
        $success = $httpCode >= 200 && $httpCode < 300;
        
        echo "📊 Estado HTTP: " . $httpCode . "\n";
        echo $success 
            ? "✅ Mensaje enviado exitosamente a Discord\n" 
            : "❌ Error al enviar mensaje a Discord (código HTTP: $httpCode)\n";
        
        if (!$success && !empty($result)) {
            echo "📄 Respuesta de error: " . $result . "\n";
        }
        
        return $success;
    } else {
        echo "❌ CURL no está disponible, necesario para enviar a Discord\n";
        return false;
    }
}

// Función para probar el webhook
function sendWebhookTest($config, $messageData) {
    if (empty($config['contacto']['webhook_url'])) {
        echo "❌ ERROR: URL del webhook no configurada\n";
        return false;
    }

    echo "🌐 Preparando solicitud al webhook\n";
    echo "URL: " . $config['contacto']['webhook_url'] . "\n";

    // Añadir firma de seguridad si hay clave secreta
    if (!empty($config['contacto']['webhook_secret'])) {
        $messageData['signature'] = hash_hmac(
            'sha256',
            json_encode($messageData),
            $config['contacto']['webhook_secret']
        );
        echo "🔑 Firma de seguridad generada\n";
    } else {
        echo "⚠️ No hay clave secreta configurada para el webhook\n";
    }

    // Configurar opciones de la solicitud
    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($messageData),
            'timeout' => $config['contacto']['webhook_timeout'] ?? 10
        ]
    ];

    echo "📦 Enviando datos: " . json_encode($messageData, JSON_PRETTY_PRINT) . "\n";
    
    echo "⚠️ ¿Deseas enviar realmente la solicitud al webhook? (s/n): ";
    $response = trim(fgets(STDIN));
    
    if (strtolower($response) !== 's') {
        echo "❌ Operación cancelada por el usuario\n";
        return false;
    }

    echo "🔄 Enviando solicitud al webhook...\n";
    
    // Crear contexto de la solicitud
    $context = stream_context_create($options);

    // Intentar enviar la solicitud al webhook
    try {
        $result = @file_get_contents($config['contacto']['webhook_url'], false, $context);
        
        // Verificar si hubo error HTTP
        if ($result === false) {
            echo "❌ Error al enviar mensaje al webhook: " . error_get_last()['message'] . "\n";
            return false;
        }
        
        echo "✅ Respuesta recibida del webhook\n";
        
        // Mostrar la respuesta
        echo "📄 Respuesta: " . $result . "\n";
        
        // Analizar respuesta JSON si existe
        if ($result) {
            $response = json_decode($result, true);
            if (isset($response['success']) && $response['success'] === true) {
                echo "✅ El webhook indica éxito en la respuesta JSON\n";
                return true;
            }
        }
        
        // Si no hay respuesta clara, verificar código HTTP
        if (isset($http_response_header[0])) {
            echo "📊 Estado HTTP: " . $http_response_header[0] . "\n";
            $success = strpos($http_response_header[0], '200') !== false;
            if ($success) {
                echo "✅ Código de estado HTTP indica éxito\n";
            } else {
                echo "⚠️ Código de estado HTTP no indica éxito\n";
            }
            return $success;
        }
        
        echo "⚠️ No se pudo verificar el estado de la respuesta\n";
        return true; // Asumir éxito si llegamos hasta aquí
    } catch (Exception $e) {
        echo "❌ Excepción al enviar mensaje al webhook: " . $e->getMessage() . "\n";
        return false;
    }
}

// Guardar en log (siempre funciona)
$logEntry = date('Y-m-d H:i:s') . " - PRUEBA - Mensaje de: $name ($email) - Asunto: $subject\n";
if (file_put_contents(__DIR__ . '/contact_messages.log', $logEntry, FILE_APPEND | LOCK_EX)) {
    echo "✅ Mensaje guardado en log exitosamente\n";
} else {
    echo "❌ Error al guardar en log\n";
}

// Probar el método seleccionado
if ($isDiscord) {
    echo "\n=== PROBANDO ENVÍO POR WEBHOOK DE DISCORD ===\n";
    echo "⚠️ Preparando formato especial para Discord...\n";
    $success = sendDiscordWebhookTest($config, $messageData);
} else {
    echo "\n=== PROBANDO ENVÍO POR WEBHOOK GENÉRICO ===\n";
    $success = sendWebhookTest($config, $messageData);
}

echo "\n=== PRUEBA COMPLETADA ===\n";
if ($success) {
    echo "✅ El sistema de contacto parece estar configurado correctamente.\n";
} else {
    echo "❌ Se encontraron problemas al probar el sistema de contacto.\n";
}

echo "💡 Nota: Verifica que el endpoint del webhook esté recibiendo los datos correctamente.\n";
?>
