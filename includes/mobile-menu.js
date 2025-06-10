/**
 * Script simplificado para el menú móvil
 * Este archivo reemplaza la funcionalidad del menú móvil para máxima compatibilidad
 */

// Esperar a que el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Elementos del menú móvil
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenu = document.getElementById('close-menu');
    const overlay = document.getElementById('overlay');
    const mobileLinks = document.querySelectorAll('.mobile-nav-links a');
    
    // Solo continuar si tenemos los elementos necesarios
    if (!menuToggle || !mobileMenu || !closeMenu) {
        console.error('Elementos del menú móvil no encontrados');
        return;
    }
    
    // Función para abrir el menú
    function openMobileMenu() {
        // Mostrar el menú y el overlay
        mobileMenu.classList.add('active');
        if (overlay) overlay.classList.add('active');
        
        // Prevenir scroll del body
        document.body.style.overflow = 'hidden';
        
        console.log('Menú móvil abierto');
    }
    
    // Función para cerrar el menú
    function closeMobileMenu() {
        // Ocultar el menú y el overlay
        mobileMenu.classList.remove('active');
        if (overlay) overlay.classList.remove('active');
        
        // Restaurar scroll
        document.body.style.overflow = '';
        
        console.log('Menú móvil cerrado');
    }
    
    // Eventos para abrir/cerrar menú
    menuToggle.onclick = openMobileMenu;
    closeMenu.onclick = closeMobileMenu;
    
    // Cerrar al hacer click en el overlay
    if (overlay) {
        overlay.onclick = closeMobileMenu;
    }
    
    // Cerrar al hacer click en enlaces del menú
    mobileLinks.forEach(function(link) {
        link.onclick = closeMobileMenu;
    });
    
    // Modo oscuro simplificado
    const darkModeToggles = document.querySelectorAll('.dark-mode-toggle');
    
    if (darkModeToggles.length > 0) {
        darkModeToggles.forEach(function(toggle) {
            toggle.onclick = function() {
                document.documentElement.classList.toggle('dark-mode');
                
                // Guardar preferencia
                const isDarkMode = document.documentElement.classList.contains('dark-mode');
                localStorage.setItem('darkMode', isDarkMode);
                document.cookie = `darkMode=${isDarkMode}; path=/; max-age=31536000`;
                
                console.log('Modo oscuro:', isDarkMode ? 'activado' : 'desactivado');
            };
        });
    }
});
