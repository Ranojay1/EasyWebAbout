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
    
    // Header con scroll
    setupScrollHeader();
    
    // Botón volver arriba (solo llamar a una función)
    setupScrollToTop();
    
    // Modo oscuro - llamado una sola vez
    setupDarkMode();
    
    // Reproductor de Spotify
    setupSpotifyPlayer();
    
    console.log('Inicialización completa');
});

// Configuración del menú móvil
function setupMobileMenu() {
    // Soportar múltiples IDs para el botón hamburguesa (para mayor compatibilidad)
    const hamburgerButtons = document.querySelectorAll('#hamburger, #menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenu = document.getElementById('close-menu');
    const overlay = document.getElementById('overlay');
    
    // Solo proceder si encontramos el menú móvil y uno de los botones
    if (mobileMenu && (hamburgerButtons.length > 0) && closeMenu) {
        // Agregar evento a todos los posibles botones de menú
        hamburgerButtons.forEach(hamburger => {
            hamburger.addEventListener('click', () => {
                mobileMenu.classList.add('active');
                
                // Activar overlay si existe
                if (overlay) overlay.classList.add('active');
                
                // Prevenir scroll
                document.body.style.overflow = 'hidden';
                
                console.log('Menu móvil abierto');
            });
        });
        
        // Cerrar menú al hacer click en botón cerrar
        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            
            // Desactivar overlay si existe
            if (overlay) overlay.classList.remove('active');
            
            // Restaurar scroll
            document.body.style.overflow = '';
            
            console.log('Menu móvil cerrado');
        });
        
        // Cerrar menú al hacer click en overlay si existe
        if (overlay) {
            overlay.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
        
        // Agregar eventos a los enlaces del menú móvil para cerrar automáticamente
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                if (overlay) overlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
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

// Configuración del modo oscuro
function setupDarkMode() {
    // Seleccionar todos los botones de dark mode toggle (para evitar duplicados)
    const darkModeToggles = document.querySelectorAll('.dark-mode-toggle');
    
    if (darkModeToggles.length > 0) {
        // Verificar preferencia guardada
        const isDarkMode = localStorage.getItem('darkMode') === 'true';
        
        // Aplicar modo oscuro si estaba activo
        if (isDarkMode) {
            document.documentElement.classList.add('dark-mode');
            darkModeToggles.forEach(toggle => toggle.classList.add('active'));
        }
        
        // Añadir listener a cada botón (por si hay más de uno)
        darkModeToggles.forEach(darkModeToggle => {
            // Toggle del modo oscuro
            darkModeToggle.addEventListener('click', () => {
                document.documentElement.classList.toggle('dark-mode');
                
                // Actualizar estado de todos los botones
                const isDarkModeActive = document.documentElement.classList.contains('dark-mode');
                darkModeToggles.forEach(toggle => {
                    if (isDarkModeActive) {
                        toggle.classList.add('active');
                    } else {
                        toggle.classList.remove('active');
                    }
                });
                
                // Guardar preferencia
                localStorage.setItem('darkMode', isDarkModeActive);
                
                // Guardar en cookie para PHP
                document.cookie = `darkMode=${isDarkModeActive}; path=/; max-age=31536000`;
                
                console.log('Dark mode toggled:', isDarkModeActive);
            });
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
