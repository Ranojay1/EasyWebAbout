/**
 * Funcionalidad JavaScript para el sitio web personal
 */

// Función para inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    console.log('Inicializando funcionalidad de la página');
    
    // Inicializar animaciones AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: false, // Cambiado a false para que las animaciones se repitan al hacer scroll
            offset: 100
        });
    }
    
    // Menú móvil
    setupMobileMenu();
    
    // Inicializar tooltip de Discord si existe
    initDiscordTooltip();
    
    // Header con scroll
    setupScrollHeader();
    
    // Botón volver arriba (solo llamar a una función)
    setupScrollToTop();
    
    // Modo oscuro - llamado una sola vez
    setupDarkMode();
    
    // Reproductor de Spotify
    setupSpotifyPlayer();
    
    // Validación del formulario de contacto
    setupContactForm();
    
    console.log('Inicialización completa');
});

// Configuración del menú móvil - Versión para compatibilidad heredada
// La nueva implementación está en NavigationBar.php
function setupMobileMenu() {
    // Detectamos si estamos usando la nueva navegación
    const newNavigation = document.getElementById('simple-mobile-menu');
    
    // Si la nueva navegación está presente, no necesitamos inicializar la antigua
    if (newNavigation) {
        console.log('%c[CubeNet Menu] %cUsando la nueva navegación v2', 
            'color: #3b82f6; font-weight: bold;', 'color: inherit');
        return;
    }
    
    // Si llegamos aquí, significa que estamos usando la navegación antigua
    // Esto es sólo por compatibilidad con páginas antiguas
    console.warn('%c[CubeNet Menu] %cUsando navegación heredada (legacy)', 
        'color: #3b82f6; font-weight: bold;', 'color: orange');
    
    // Referencias a los elementos del menú móvil antiguo
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenu = document.getElementById('close-menu');
    const overlay = document.getElementById('overlay');
    
    // Si los elementos necesarios no existen, no podemos inicializar el menú
    if (!mobileMenu || !menuToggle || !closeMenu) {
        console.error('%c[CubeNet Menu] %cElementos del menú móvil no encontrados', 
            'color: #3b82f6; font-weight: bold;', 'color: red');
        return;
    }
    
    try {
        // Función simple para abrir el menú
        const openMenu = () => {
            mobileMenu.classList.add('active');
            if (overlay) overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        };
        
        // Función simple para cerrar el menú
        const closeMenu = () => {
            mobileMenu.classList.remove('active');
            if (overlay) overlay.classList.remove('active');
            document.body.style.overflow = '';
        };
        
        // Eventos para el menú antiguo (mínimo pero funcional)
        menuToggle.addEventListener('click', openMenu);
        closeMenu.addEventListener('click', closeMenu);
        if (overlay) overlay.addEventListener('click', closeMenu);
        
        // Enlaces del menú móvil
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => link.addEventListener('click', closeMenu));
        
    } catch(err) {
        console.error('%c[CubeNet Menu] %cError al inicializar el menú móvil heredado:', 
            'color: #3b82f6; font-weight: bold;', 'color: red', err);
    }
}

// Header con cambio en scroll
function setupScrollHeader() {
    const header = document.querySelector('.header');
    
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }
}

// Configuración del modo oscuro - con mejoras de compatibilidad
function setupDarkMode() {
    console.log('%c[CubeNet Theme] %cInicializando sistema de temas v2', 
        'color: #8b5cf6; font-weight: bold;', 'color: inherit');
    
    // Comprobamos si estamos usando el nuevo sistema (en NavigationBar.php)
    const newDarkModeButton = document.getElementById('simple-dark-mode');
    
    // Si el nuevo botón existe, su JS ya maneja el modo oscuro
    if (newDarkModeButton) {
        console.log('%c[CubeNet Theme] %cUsando el nuevo sistema de temas', 
            'color: #8b5cf6; font-weight: bold;', 'color: inherit');
        
        // Sin embargo, necesitamos asegurarnos de que el tema se aplique correctamente
        // al cargar la página basado en las preferencias guardadas
        const savedPreference = localStorage.getItem('darkMode');
        const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
        
        // Determinar si debemos usar modo oscuro
        const shouldUseDarkMode = savedPreference !== null 
            ? savedPreference === 'true'
            : prefersDarkScheme.matches;
        
        // Asegurar que el modo correcto está establecido
        if (shouldUseDarkMode && !document.documentElement.classList.contains('dark-mode')) {
            document.documentElement.classList.add('dark-mode');
        } else if (!shouldUseDarkMode && document.documentElement.classList.contains('dark-mode')) {
            document.documentElement.classList.remove('dark-mode');
        }
        
        return;
    }
    
    // Sistema antiguo
    console.log('%c[CubeNet Theme] %cUsando el sistema de temas heredado', 
        'color: #8b5cf6; font-weight: bold;', 'color: orange');
        
    // Seleccionar todos los botones de dark mode toggle antiguos
    const darkModeToggles = document.querySelectorAll('.dark-mode-toggle');
    
    if (darkModeToggles.length > 0) {
        // Verificar preferencia guardada o preferencia del sistema
        const savedPreference = localStorage.getItem('darkMode');
        const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
        
        // Determinar si debemos usar modo oscuro
        const shouldUseDarkMode = savedPreference !== null 
            ? savedPreference === 'true'
            : prefersDarkScheme.matches;
        
        // Aplicar modo oscuro si corresponde
        if (shouldUseDarkMode) {
            document.documentElement.classList.add('dark-mode');
            darkModeToggles.forEach(toggle => toggle.classList.add('active'));
            
            // Asegurar que la cookie esté establecida para PHP
            if (savedPreference === null) {
                localStorage.setItem('darkMode', 'true');
                document.cookie = `darkMode=true; path=/; max-age=31536000`;
            }
        }
        
        // Implementación simplificada del toggle para mejor compatibilidad
        const toggleDarkMode = function() {
            try {
                // Alternar la clase dark-mode
                document.documentElement.classList.toggle('dark-mode');
                
                // Determinar el nuevo estado
                const isDarkMode = document.documentElement.classList.contains('dark-mode');
                
                // Actualizar botones
                darkModeToggles.forEach(toggle => {
                    toggle.classList.toggle('active', isDarkMode);
                    toggle.setAttribute('aria-label', isDarkMode ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro');
                    toggle.setAttribute('title', isDarkMode ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro');
                });
                
                // Guardar preferencias
                localStorage.setItem('darkMode', isDarkMode);
                document.cookie = `darkMode=${isDarkMode}; path=/; max-age=31536000`;
                
                console.log('%c[CubeNet Theme] %cModo oscuro: ' + (isDarkMode ? 'Activado' : 'Desactivado'), 
                    'color: #8b5cf6; font-weight: bold;', 'color: inherit');
                    
            } catch (error) {
                console.error('%c[CubeNet Theme] %cError al cambiar el tema:', 
                    'color: #8b5cf6; font-weight: bold;', 'color: red', error);
            }
        };
        
        // Agregar eventos simples a cada botón
        darkModeToggles.forEach(btn => {
            btn.addEventListener('click', toggleDarkMode);
        });
        
        // Escuchar cambios en las preferencias del sistema
        prefersDarkScheme.addEventListener('change', (e) => {
            // Solo aplicar el cambio automático si no hay preferencia guardada
            if (localStorage.getItem('darkMode') === null) {
                document.documentElement.classList.toggle('dark-mode', e.matches);
                darkModeToggles.forEach(toggle => toggle.classList.toggle('active', e.matches));
            }
        });
    }
}

// Configuración del botón volver arriba (versión única y mejorada)
function setupScrollToTop() {
    const scrollTopBtns = document.querySelectorAll('#scroll-top-btn');
    
    if (scrollTopBtns.length > 0) {
        window.addEventListener('scroll', () => {
            const shouldBeActive = window.scrollY > 300;
            
            scrollTopBtns.forEach(btn => {
                if (shouldBeActive) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        });
        
        scrollTopBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    }
}

// Función de compatibilidad (para mantener referencias existentes, pero redirige a la función única)
function setupScrollToTopButton() {
    setupScrollToTop();
}

// Funcionalidad para el reproductor de Spotify
function setupSpotifyPlayer() {
    // Si estamos en la página de música
    const spotifyEmbed = document.querySelector('.spotify-embed');
    if (spotifyEmbed) {
        // Ajustar tamaño según el viewport
        function resizeSpotifyEmbed() {
            if (window.innerWidth < 768) {
                spotifyEmbed.style.height = '300px';
            } else {
                spotifyEmbed.style.height = '380px';
            }
        }
        
        // Llamar inicialmente y en cada resize
        resizeSpotifyEmbed();
        window.addEventListener('resize', resizeSpotifyEmbed);
    }
}

// Validación del formulario de contacto
function setupContactForm() {
    const contactForm = document.getElementById('contactForm');
    
    if (!contactForm) return;
    
    contactForm.addEventListener('submit', function(e) {
        // Limpiar mensajes de error previos
        clearErrors();
        
        let hasErrors = false;
        const errors = [];
        
        // Validar nombre
        const name = document.getElementById('name').value.trim();
        if (name.length < 2) {
            showFieldError('name', 'El nombre debe tener al menos 2 caracteres');
            hasErrors = true;
        }
        
        // Validar email
        const email = document.getElementById('email').value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showFieldError('email', 'Por favor ingresa un email válido');
            hasErrors = true;
        }
        
        // Validar asunto
        const subject = document.getElementById('subject').value.trim();
        if (subject.length < 3) {
            showFieldError('subject', 'El asunto debe tener al menos 3 caracteres');
            hasErrors = true;
        }
        
        // Validar mensaje
        const message = document.getElementById('message').value.trim();
        if (message.length < 10) {
            showFieldError('message', 'El mensaje debe tener al menos 10 caracteres');
            hasErrors = true;
        }
        
        // Si hay errores, prevenir envío
        if (hasErrors) {
            e.preventDefault();
            return false;
        }
        
        // Mostrar indicador de carga
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i>Enviando...';
        submitBtn.disabled = true;
        
        // En caso de error en el servidor, restaurar el botón
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 5000);
    });
}

// Mostrar error en un campo específico
function showFieldError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.style.cssText = 'color: #ef4444; font-size: 0.875rem; margin-top: 5px;';
    errorDiv.textContent = message;
    
    // Agregar clase de error al campo
    field.style.borderColor = '#ef4444';
    
    // Insertar mensaje después del campo
    field.parentNode.appendChild(errorDiv);
}

// Limpiar mensajes de error
function clearErrors() {
    // Remover mensajes de error existentes
    const errors = document.querySelectorAll('.field-error');
    errors.forEach(error => error.remove());
    
    // Restaurar estilos de campos
    const fields = ['name', 'email', 'subject', 'message'];
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.style.borderColor = '#e5e7eb';
        }
    });
}

// Agregar validación en tiempo real
function setupRealTimeValidation() {
    const fields = ['name', 'email', 'subject', 'message'];
    
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('blur', function() {
                // Limpiar error previo de este campo
                const existingError = this.parentNode.querySelector('.field-error');
                if (existingError) {
                    existingError.remove();
                    this.style.borderColor = '#e5e7eb';
                }
                
                // Validar campo individual
                const value = this.value.trim();
                let errorMessage = '';
                
                switch(fieldId) {
                    case 'name':
                        if (value.length > 0 && value.length < 2) {
                            errorMessage = 'El nombre debe tener al menos 2 caracteres';
                        }
                        break;
                    case 'email':
                        if (value.length > 0) {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailRegex.test(value)) {
                                errorMessage = 'Por favor ingresa un email válido';
                            }
                        }
                        break;
                    case 'subject':
                        if (value.length > 0 && value.length < 3) {
                            errorMessage = 'El asunto debe tener al menos 3 caracteres';
                        }
                        break;
                    case 'message':
                        if (value.length > 0 && value.length < 10) {
                            errorMessage = 'El mensaje debe tener al menos 10 caracteres';
                        }
                        break;
                }
                
                if (errorMessage) {
                    showFieldError(fieldId, errorMessage);
                }
            });
        }
    });
}

// Función para copiar el ID de Discord al portapapeles
function copyDiscord(discordId) {
    // Crear un elemento de texto temporal
    const tempInput = document.createElement('input');
    tempInput.value = discordId;
    document.body.appendChild(tempInput);
    
    // Seleccionar y copiar el texto
    tempInput.select();
    document.execCommand('copy');
    
    // Eliminar el elemento temporal
    document.body.removeChild(tempInput);
    
    // Identificar todos los posibles tooltips en la página
    const tooltips = [
        document.getElementById('discord-tooltip'),
        document.getElementById('footer-discord-tooltip')
    ];
    
    // Mostrar todos los tooltips disponibles
    tooltips.forEach(tooltip => {
        if (tooltip) {
            tooltip.style.display = 'block';
            
            // Ocultar después de 2 segundos
            setTimeout(() => {
                tooltip.style.display = 'none';
            }, 2000);
        }
    });
}

/**
 * Inicializa los tooltips de Discord para dispositivos móviles
 * Busca todos los tooltips posibles en la página y los configura correctamente
 */
function initDiscordTooltip() {
    // Identificar todos los posibles tooltips en la página
    const tooltips = [
        document.getElementById('discord-tooltip'),
        document.getElementById('footer-discord-tooltip')
    ];
    
    // Configurar cada tooltip encontrado
    tooltips.forEach(tooltip => {
        if (!tooltip) return;
        
        // En dispositivos móviles, asegurar que el tooltip sea visible
        if (window.innerWidth < 768) {
            tooltip.style.position = 'fixed';
            tooltip.style.bottom = '20px';
            tooltip.style.left = '50%';
            tooltip.style.transform = 'translateX(-50%)';
            tooltip.style.zIndex = '1000';
        }
    });
}
