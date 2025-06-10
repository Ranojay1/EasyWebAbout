# Sistema de Contacto con Webhooks

Este documento explica cómo utilizar y configurar el sistema de contacto basado en webhooks para el sitio web `cubenet.fun`.

## Configuración

El sistema de contacto funciona exclusivamente mediante webhooks, un método moderno que envía los mensajes a un servicio web que puede procesarlos de múltiples formas.

### Opciones de configuración en config.php

```php
'contacto' => [
    'mostrar_formulario' => true,
    'texto_contacto' => '...', // Texto descriptivo
    'ubicacion_mapa' => 'España',
    'mostrar_mapa' => true,
    
    // Configuración del webhook (OBLIGATORIO)
    'webhook_url' => 'https://tu-servicio.com/webhook',  // URL donde se enviarán los datos
    'webhook_secret' => 'clave_secreta_para_firmar',  // Clave para firmar la solicitud
    'webhook_timeout' => 10  // Tiempo máximo de espera en segundos
]
```

## Funcionamiento

Cuando un usuario envía un mensaje a través del formulario de contacto:

1. El sistema valida los datos del formulario (nombre, email, asunto, mensaje).
2. Si todos los datos son válidos, prepara un payload JSON con la información.
3. El sistema envía el mensaje al servicio web definido en `webhook_url`.
4. Para webhooks de Discord, el sistema formatea los datos de forma especial para mostrar embeds.
5. El sistema siempre registra los mensajes en el archivo `contact_messages.log`.
6. Si el envío tiene éxito, se muestra un mensaje de confirmación al usuario.

## Formato de los datos enviados al webhook

Los datos se envían al webhook en formato JSON con la siguiente estructura:

```json
{
  "name": "Nombre del usuario",
  "email": "email@example.com",
  "subject": "Asunto del mensaje",
  "message": "Contenido del mensaje",
  "timestamp": "2025-06-10 12:34:56",
  "ip": "dirección.ip.del.usuario",
  "user_agent": "Información del navegador",
  "site_name": "cubenet.fun",
  "origin": "contact_form",
  "signature": "firma_hmac_sha256_para_verificar_autenticidad"
}
```

## Seguridad

Si configuras `webhook_secret`, el sistema firmará cada solicitud con HMAC-SHA256. El servicio receptor puede verificar esta firma para garantizar que los datos provienen de tu formulario de contacto y no han sido alterados.

## Servicios compatibles

Puedes conectar el formulario con diversos servicios como:

1. **Discord**: Para recibir mensajes directamente en un canal de Discord (configuración optimizada)
2. **Zapier**: Para automatizar flujos de trabajo (enviar a Slack, crear tareas en Trello, etc.)
3. **IFTTT**: Para crear automatizaciones personales
4. **Integromat/Make**: Para flujos de trabajo complejos
5. **Google Apps Script**: Para procesamiento personalizado
6. **API propia**: Para integrar con tu sistema de gestión de clientes

### Integración con Discord

Si usas Discord, esta integración tiene una configuración especial optimizada. Consulta el archivo `discord-webhook-setup.md` para instrucciones detalladas.

## Pruebas y depuración

Usa el script `test-contact.php` para probar la funcionalidad:

```bash
# Probar envío por webhook genérico
php test-contact.php webhook

# Probar envío por webhook de Discord
php test-contact.php discord

# Probar según configuración en config.php
php test-contact.php
```

## Solución de problemas

1. **El webhook devuelve error**: Verifica que la URL sea correcta y el servicio esté funcionando.
2. **Error al conectar**: Asegúrate de que tu servidor pueda realizar solicitudes HTTP externas.
3. **Errores en la firma**: Asegúrate de que el `webhook_secret` sea el mismo en tu config.php y en el servicio receptor.
4. **Errores de formato en Discord**: Verifica que estás usando la URL del webhook correcta y que tiene los permisos adecuados.

---

Última actualización: 10/06/2025
