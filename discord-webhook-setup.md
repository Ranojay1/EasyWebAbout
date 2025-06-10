# Configuración del Webhook de Discord para Formulario de Contacto

Este documento explica cómo configurar un webhook de Discord para recibir los mensajes del formulario de contacto de tu sitio web `cubenet.fun`.

## Paso 1: Crear un webhook en Discord

1. Abre Discord y navega al servidor donde quieres recibir las notificaciones.
2. Haz clic derecho en un canal y selecciona **Editar canal**.
3. Ve a **Integraciones** en el menú lateral.
4. Haz clic en **Webhooks** y luego en **Nuevo webhook**.
5. Personaliza el nombre del webhook (por ejemplo, "CubeNet Contact Form").
6. Opcionalmente, cambia el avatar del webhook.
7. Haz clic en **Copiar URL de webhook**.

## Paso 2: Configurar tu sitio web

1. Abre el archivo `config.php` en la raíz de tu sitio web.
2. Localiza la sección `contacto`.
3. Pega la URL del webhook de Discord en `webhook_url`.
4. Configura el resto de opciones según tus preferencias:

```php
'contacto' => [
    'mostrar_formulario' => true,
    'texto_contacto' => 'Si tienes alguna pregunta o quieres contactarme, no dudes en escribirme.',
    'ubicacion_mapa' => 'España',
    'mostrar_mapa' => true,
    'webhook_url' => 'https://discord.com/api/webhooks/tu_id_de_webhook/tu_token',
    'webhook_secret' => 'tu_clave_secreta',
    'webhook_timeout' => 10
],
```

## Paso 3: Probar la configuración

Para verificar que la integración funciona correctamente:

```bash
# Ejecuta el script de prueba desde el terminal
php test-contact.php discord
```

Si todo está configurado correctamente, deberías ver un mensaje de prueba en tu canal de Discord.

## Formato de los mensajes en Discord

Los mensajes del formulario de contacto aparecerán en Discord con el siguiente formato:

- **Título**: "Nuevo mensaje de contacto: [Asunto]"
- **Campos**:
  - **Nombre**: El nombre proporcionado por el usuario
  - **Email**: La dirección de correo del usuario
  - **Mensaje**: El contenido del mensaje
- **Pie de página**: "Enviado desde formulario de contacto · [Fecha y hora]"

## Solución de problemas

### El mensaje no llega a Discord

- **Verifica la URL del webhook**: Asegúrate de que la URL del webhook es correcta y no ha expirado.
- **Comprueba los permisos**: El webhook debe tener permisos para enviar mensajes al canal.
- **Revisa los logs**: Consulta `/var/www/cubenet.fun/contact_messages.log` para ver posibles errores.

### El formato del mensaje es incorrecto

- Esto puede ocurrir si Discord ha cambiado su API. Consulta la [documentación oficial de Discord](https://discord.com/developers/docs/resources/webhook) para verificar el formato correcto.

### Mensajes duplicados

- Si recibes mensajes tanto por email como por Discord, verifica la configuración de fallback en `send-message.php`.

---

*Última actualización: 10/06/2025*
