# 🚀 Guía de Instalación Rápida

## Pasos para configurar tu sitio web personal:

### 1. Crear tu configuración personal
```bash
# Copia el archivo template
cp config-default.php config.php
```

### 2. Personalizar tu información
Edita el archivo `config.php` y modifica:
- ✏️ Tu información personal (nombre, edad, profesión)
- 🔗 Enlaces de redes sociales
- 💼 Tus habilidades y experiencia
- 🎨 Colores y estilos del sitio
- 📝 Todos los textos de la interfaz

### 3. Opcional: Configurar servidor web
- **Apache**: Asegúrate de que mod_rewrite esté habilitado
- **Nginx**: Configura las reglas de reescritura apropiadas

### 4. Configurar sistema de contacto
```bash
# Configura tu webhook en Discord, Slack u otro servicio
# Ejemplo para Discord: Ajustes del Canal > Integraciones > Webhooks > Crear Webhook

# Actualiza tu config.php con la URL del webhook
```

### 5. ¡Prueba tu configuración!
```bash
# Prueba el sistema de contacto
php test-contact.php webhook

# Si usas Discord
php test-contact.php discord
```

### 6. ¡Listo!
Tu sitio web personal estará funcionando con tu configuración personalizada.

---

## 📋 Características incluidas:
- ✅ Modo oscuro/claro
- ✅ Diseño responsive
- ✅ Formulario de contacto con sistema de webhooks
- ✅ Integración optimizada para Discord
- ✅ Sección de habilidades
- ✅ Timeline de experiencia
- ✅ Integración con Spotify (opcional)
- ✅ SEO optimizado
- ✅ Completamente personalizable

## 🔧 Configuración avanzada:
- Modifica colores en la sección `'sitio'`
- Personaliza textos en la sección `'textos'`
- Habilita/deshabilita secciones según necesites

## ⚙️ Configuración del sistema de contacto:
```php
// En config.php
'contacto' => [
    'mostrar_formulario' => true,
    'texto_contacto' => 'Si tienes alguna pregunta o quieres colaborar conmigo...',
    'webhook_url' => 'https://tu-servicio.com/webhook', // URL de tu webhook
    'webhook_secret' => 'clave_secreta',  // Para firmar las solicitudes
    'webhook_timeout' => 10  // Tiempo de espera en segundos
]
```

## 📚 Documentación adicional:
- Consulta [webhook-docs.md](webhook-docs.md) para información general sobre webhooks
- Consulta [discord-webhook-setup.md](discord-webhook-setup.md) para la configuración específica de Discord
