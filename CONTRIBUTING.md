# Guía de Contribución

¡Gracias por tu interés en contribuir a CubeNet! Este documento te guiará a través del proceso para hacer contribuciones efectivas a este proyecto.

## Flujo de trabajo con Git

1. **Fork** este repositorio.
2. **Clona** tu fork:
   ```bash
   git clone https://github.com/TU-USUARIO/cubenet.git
   cd cubenet
   ```
3. **Crea una nueva rama** para tu funcionalidad:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
4. **Haz tus cambios** y realiza commits con mensajes descriptivos:
   ```bash
   git commit -m "Característica: Añade soporte para WebSockets"
   ```
5. **Envía** tu rama al repositorio:
   ```bash
   git push origin feature/nueva-funcionalidad
   ```
6. **Crea un Pull Request** desde tu fork al repositorio principal.

## Estándares de código

### PHP
- Sigue el estándar [PSR-12](https://www.php-fig.org/psr/psr-12/)
- Usa comentarios PHPDoc para documentar funciones y clases
- Evita el uso de variables globales
- Prefiere funciones pequeñas y específicas

### JavaScript
- Usa ES6+ cuando sea posible
- Pon punto y coma al final de las líneas
- Usa camelCase para nombres de variables y funciones

### CSS
- Organiza las propiedades en grupos lógicos
- Usa nombres de clase descriptivos y en inglés

## Pruebas

Antes de enviar un Pull Request:

1. Asegúrate de que tu código funciona con PHP 7.4+
2. Prueba el formulario de contacto mediante su envío real a un webhook de prueba
3. Verifica la visualización en dispositivos móviles y de escritorio
4. Comprueba que no haya errores en la consola JavaScript

## Documentación

Si añades nuevas funcionalidades:

1. Documenta cómo se usa en el README.md
2. Actualiza la documentación técnica correspondiente
3. Añade ejemplos de uso cuando sea apropiado

## Reportando bugs

Cuando reportes un bug, incluye:

1. Pasos para reproducir el problema
2. Comportamiento esperado vs. comportamiento actual
3. Capturas de pantalla si es posible
4. Versión de PHP y servidor web que estás usando
5. Navegador y sistema operativo

## Proceso de revisión

Todas las contribuciones serán revisadas por los mantenedores del proyecto. Podemos solicitar cambios o aclaraciones. ¡La comunicación es clave!

## Licencia

Al contribuir a este proyecto, aceptas que tus contribuciones estarán bajo la misma licencia MIT que el proyecto original.

---

¡Gracias por mejorar CubeNet! Tus contribuciones hacen que este proyecto sea mejor para todos.
