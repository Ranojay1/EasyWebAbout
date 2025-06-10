# CubeNet - Personal Website with Webhook Contact System

## Descripción
CubeNet es un sistema moderno para sitios web personales con un sistema de contacto basado completamente en webhooks. Diseñado para desarrolladores, diseñadores y profesionales que buscan una presencia web elegante y funcional que integre fácilmente con servicios modernos como Discord, Slack, o cualquier servicio que acepte webhooks.

## ✨ Características principales
- **🌓 Modo oscuro/claro**: Toggle automático entre temas
- **📱 Diseño responsive**: Funciona perfectamente en todos los dispositivos y menú móvil mejorado
- **⚡ Carga rápida**: Optimizado para rendimiento
- **🎨 Completamente personalizable**: Colores, textos, contenido
- **🔧 Fácil configuración**: Un solo archivo de configuración
- **📨 Sistema de contacto por webhook**: Integración avanzada con Discord y otros servicios
- **🔒 Seguridad**: Firma de solicitudes con HMAC para validación de autenticidad
- **🎵 Integración Spotify**: Muestra tu música favorita (opcional)
- **🔖 Integración Discord**: Manejo inteligente de links vs IDs con sistema de copia al portapapeles
- **🚀 SEO optimizado**: Meta tags y estructura optimizada

## 🚀 Instalación rápida

### 1. Clona el repositorio
```bash
git clone https://github.com/tuusuario/cubenet.git
cd cubenet
```

### 2. Configura tu información
```bash
# Copia el template de configuración
cp config-default.php config.php

# Edita con tu información personal
nano config.php  # o tu editor favorito
```

### 3. ¡Listo!
Configura tu servidor web para apuntar al directorio del proyecto y ¡ya tienes tu sitio personal funcionando!

📖 **[Ver guía de instalación detallada](INSTALL.md)**

## 📨 Sistema de contacto con webhooks

Esta implementación elimina completamente la dependencia de las funciones de correo electrónico de PHP y utiliza webhooks para enviar mensajes de contacto.

### Ventajas del sistema de webhooks:
- **Fiabilidad**: No depende de la configuración de email del servidor
- **Flexibilidad**: Integra con cualquier servicio que acepte webhooks
- **Modernidad**: Usa tecnologías actuales de comunicación
- **Seguridad**: Incluye firmas HMAC para verificar la autenticidad de los mensajes

### Servicios soportados:
- **Discord**: Integración especializada con formato optimizado
- **Slack**: Envía mensajes directamente a canales de Slack
- **Zapier/Make**: Conecta con cualquier flujo de trabajo
- **API personalizada**: Integra con tus propios servicios

📝 **[Ver documentación sobre webhooks](webhook-docs.md)**

## Estructura del Proyecto
La estructura del proyecto incluye los siguientes directorios y archivos principales:

```
cubenet.fun/
├── config-default.php          # Template de configuración
├── config.php                  # Configuración personal (no incluido en repo)
├── index.php                   # Punto de entrada principal
├── send-message.php            # Procesador del formulario de contacto
├── webhook-docs.md             # Documentación general de webhooks
├── discord-webhook-setup.md    # Guía para configuración en Discord
├── CONTRIBUTING.md             # Guía para contribuir al proyecto
├── CHANGELOG.md                # Historial de cambios
├── LICENSE                     # Licencia MIT
├── INSTALL.md                  # Guía de instalación
├── .gitignore                  # Archivos ignorados en Git
├── includes/                   # Archivos incluidos (JS, CSS, etc.)
│   ├── scripts.js              # JavaScript del sitio
│   ├── styles.css              # Estilos base
│   ├── extra-styles.css        # Estilos adicionales
│   ├── header.php              # Encabezado común
│   ├── footer.php              # Pie de página común
└── views/                      # Plantillas de páginas
    ├── 404.php                 # Página de error 404
    ├── about.php               # Página "Sobre mí"
    ├── contact.php             # Formulario de contacto
    ├── home.php                # Página principal
    ├── music.php               # Página de música (opcional)
    └── portfolio.php           # Portafolio de proyectos
│   ├── styles.css
│   └── ... 
└── views/                      # Plantillas de las páginas
    ├── contact.php
    ├── home.php
    └── ...
```

## Uso del sistema de contacto

1. **Configura tu webhook**: Crea un webhook en Discord, Slack u otro servicio compatible.
2. **Actualiza config.php**: Añade la URL del webhook y el token secreto.
3. **Prueba el sistema**: Utiliza `test-contact.php` para verificar el funcionamiento.

```php
// Ejemplo de configuración en config.php
'contacto' => [
    'webhook_url' => 'https://tu-servicio.com/webhook', 
    'webhook_secret' => 'tu_clave_secreta',
    'webhook_timeout' => 10
]
```

## Testeo

El script `test-contact.php` permite probar el sistema de contacto:

```bash
# Probar envío de contacto por webhook
php test-contact.php webhook

# Probar webhook de Discord específicamente
php test-contact.php discord
```

## Contribución
Si deseas contribuir al proyecto:
1. Haz un fork del repositorio.
2. Crea una nueva rama para tus cambios:
   ```bash
   git checkout -b feature/nueva-caracteristica
   ```
3. Realiza tus cambios y haz un commit:
   ```bash
   git commit -m "Añadir nueva característica"
   ```
4. Envía un pull request.

## Licencia
Este proyecto está licenciado bajo la [MIT License](LICENSE).

## Contacto
Para preguntas o comentarios, puedes contactar al desarrollador en [tuemail@dominio.com](mailto:tuemail@dominio.com).