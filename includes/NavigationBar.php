
<!-- Menú principal (Desktop) -->
<nav class="desktop-nav">
    <a href="/" class="logo">
        <div class="logo-icon">
            <i class="fas fa-cube" style="color: white;"></i>
        </div>
        <div class="logo-text">CubeNet</div>
    </a>
    
    <ul class="nav-links">
        <li><a href="/" class="<?php echo $route === '/' ? 'active' : ''; ?>">Inicio</a></li>
        <li><a href="/about" class="<?php echo $route === '/about' ? 'active' : ''; ?>">Sobre Mí</a></li>
        <?php if ($sitio['paginas_activas']['services']): ?>
        <li><a href="/services" class="<?php echo $route === '/services' ? 'active' : ''; ?>">Servicios</a></li>
        <?php endif; ?>
        <?php if ($sitio['paginas_activas']['portfolio']): ?>
        <li><a href="/portfolio" class="<?php echo $route === '/portfolio' ? 'active' : ''; ?>">Portfolio</a></li>
        <?php endif; ?>
        <?php if ($config['musica']['mostrar_seccion']): ?>
        <li><a href="/music" class="<?php echo $route === '/music' ? 'active' : ''; ?>">Música</a></li>
        <?php endif; ?>
        <?php if ($sitio['paginas_activas']['contact']): ?>
        <li><a href="/contact" class="<?php echo $route === '/contact' ? 'active' : ''; ?>">Contacto</a></li>
        <?php endif; ?>
    </ul>
</nav>

<!-- Botón de menú móvil - Más compatible y con área clickeable más grande -->
<button id="mobile-menu-btn" class="mobile-menu-btn" aria-label="Abrir menú">
    <i class="fas fa-bars"></i>
</button>

<!-- Menú móvil simple -->
<div id="simple-mobile-menu" class="simple-mobile-menu">
    <div class="simple-mobile-header">
        <span>Menú</span>
        <button id="close-simple-menu" class="close-simple-menu" aria-label="Cerrar menú">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <div class="simple-mobile-content">
        <a href="/" class="simple-nav-item <?php echo $route === '/' ? 'active' : ''; ?>">
            <i class="fas fa-home"></i>
            <span>Inicio</span>
        </a>
        <a href="/about" class="simple-nav-item <?php echo $route === '/about' ? 'active' : ''; ?>">
            <i class="fas fa-user"></i>
            <span>Sobre Mí</span>
        </a>
        <?php if ($sitio['paginas_activas']['services']): ?>
        <a href="/services" class="simple-nav-item <?php echo $route === '/services' ? 'active' : ''; ?>">
            <i class="fas fa-cogs"></i>
            <span>Servicios</span>
        </a>
        <?php endif; ?>
        <?php if ($sitio['paginas_activas']['portfolio']): ?>
        <a href="/portfolio" class="simple-nav-item <?php echo $route === '/portfolio' ? 'active' : ''; ?>">
            <i class="fas fa-briefcase"></i>
            <span>Portfolio</span>
        </a>
        <?php endif; ?>
        <?php if ($config['musica']['mostrar_seccion']): ?>
        <a href="/music" class="simple-nav-item <?php echo $route === '/music' ? 'active' : ''; ?>">
            <i class="fas fa-music"></i>
            <span>Música</span>
        </a>
        <?php endif; ?>
        <?php if ($sitio['paginas_activas']['contact']): ?>
        <a href="/contact" class="simple-nav-item <?php echo $route === '/contact' ? 'active' : ''; ?>">
            <i class="fas fa-envelope"></i>
            <span>Contacto</span>
        </a>
        <?php endif; ?>
        
        <?php if ($sitio['modo_oscuro']): ?>
        <button id="simple-dark-mode" class="simple-nav-button">
            <i class="fas <?php echo isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] === 'true' ? 'fa-sun' : 'fa-moon'; ?>"></i>
            <span><?php echo isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] === 'true' ? 'Modo claro' : 'Modo oscuro'; ?></span>
        </button>
        <?php endif; ?>
        
        <a href="/contact" class="simple-nav-item contact-highlight">
            <i class="fas fa-paper-plane"></i>
            <span>Contactar ahora</span>
        </a>
    </div>
</div>

<!-- Overlay simple con z-index correcto -->
<div id="simple-overlay" class="simple-overlay"></div>

<style>
/* Estilos desktop y móvil mejorados */
.desktop-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

/* Botón de menú móvil */
.mobile-menu-btn {
    display: none;
    width: 48px;
    height: 48px;
    border: none;
    background-color: var(--primary);
    color: white;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1.25rem;
    box-shadow: 0px 3px 10px rgba(0,0,0,0.2);
    -webkit-tap-highlight-color: transparent; /* Eliminar efecto de toque en iOS */
    z-index: 9998; /* Alto z-index para asegurarse que sea clickeable */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.mobile-menu-btn:active {
    transform: scale(0.95);
    box-shadow: 0px 1px 5px rgba(0,0,0,0.3);
}

/* Menú móvil simple - Optimizado para aparecer por encima de todo */
.simple-mobile-menu {
    display: none;
    position: fixed;
    top: 0;
    right: 0;
    width: 280px;
    max-width: 85%;
    height: 100%;
    background-color: white;
    z-index: 999999; /* Valor extremadamente alto para asegurar que esté por encima de todo */
    box-shadow: -5px 0 25px rgba(0,0,0,0.15);
    overflow: hidden; /* Para iOS */
    overscroll-behavior: contain; /* Prevenir scroll del fondo */
    transform: translateX(100%); /* Inicialmente fuera de la pantalla para animación */
    transition: transform 0.3s ease-out; /* Animación suave */
}

/* Clase active para animación */
.simple-mobile-menu.active {
    transform: translateX(0); /* Mostrar el menú completamente */
}

.simple-mobile-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: var(--primary);
    color: white;
}

.simple-mobile-header span {
    font-weight: bold;
    font-size: 1.2rem;
}

.close-simple-menu {
    background: none;
    border: none;
    color: white;
    font-size: 1.25rem;
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    -webkit-tap-highlight-color: transparent;
}

.simple-mobile-content {
    padding: 15px 0;
    overflow-y: auto;
    height: calc(100% - 65px);
    -webkit-overflow-scrolling: touch; /* Para scroll suave en iOS */
}

.simple-nav-item, .simple-nav-button {
    display: flex;
    align-items: center;
    padding: 16px 20px; /* Área táctil más grande para mejor accesibilidad */
    color: #333;
    text-decoration: none;
    font-size: 1.1rem;
    border-bottom: 1px solid #eee;
    transition: background-color 0.2s ease;
    width: 100%;
    text-align: left;
    background: none;
    border: none;
    cursor: pointer;
    -webkit-tap-highlight-color: transparent;
}

.simple-nav-item i, .simple-nav-button i {
    margin-right: 15px;
    width: 24px;
    text-align: center;
}

.simple-nav-item:active, .simple-nav-button:active {
    background-color: #f5f5f5;
}

.simple-nav-item.active {
    color: var(--primary);
    font-weight: bold;
}

/* Elemento de contacto destacado */
.contact-highlight {
    margin-top: 15px;
    background-color: rgba(var(--primary-rgb), 0.1);
    border-radius: 8px;
    font-weight: 500;
    color: var(--primary) !important;
    border: none;
    margin: 20px 15px;
    width: calc(100% - 30px);
}

.contact-highlight:active {
    background-color: rgba(var(--primary-rgb), 0.2) !important;
}

/* Overlay rediseñado para mejor rendimiento y mayor z-index */
.simple-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.65);
    z-index: 999998; /* Justo debajo del menú pero por encima de todo lo demás */
    -webkit-tap-highlight-color: transparent;
    opacity: 0; /* Inicialmente transparente para animación */
    transition: opacity 0.3s ease-out; /* Animación suave */
    overscroll-behavior: contain; /* Prevenir scroll del fondo */
}

/* Clase active para animación de overlay */
.simple-overlay.active {
    opacity: 1; /* Mostrar el overlay completamente */
}

/* Modo oscuro mejorado */
.dark-mode .simple-mobile-menu {
    background-color: #121212;
    color: #f1f5f9;
    border-left: 1px solid #333;
}

.dark-mode .simple-nav-item, 
.dark-mode .simple-nav-button {
    color: #f1f5f9;
    border-bottom-color: #333;
}

.dark-mode .simple-nav-item:active,
.dark-mode .simple-nav-button:active {
    background-color: #333;
}

.dark-mode .contact-highlight {
    background-color: rgba(var(--primary-rgb), 0.2);
}

.dark-mode .contact-highlight:active {
    background-color: rgba(var(--primary-rgb), 0.3) !important;
}

/* Responsive */
@media (max-width: 768px) {
    .nav-links {
        display: none;
    }
    
    .mobile-menu-btn {
        display: flex;
        align-items: center;
        justify-content: center;
    }
}
</style>

<script>
// Menú móvil optimizado para máxima compatibilidad
document.addEventListener('DOMContentLoaded', function() {
    console.log('[CubeNet] Inicializando menú móvil v2');
    
    // Elementos
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const closeSimpleMenu = document.getElementById('close-simple-menu');
    const simpleMenu = document.getElementById('simple-mobile-menu');
    const overlay = document.getElementById('simple-overlay');
    const darkModeBtn = document.getElementById('simple-dark-mode');
    
    // Verificar que elementos existan
    if (!mobileMenuBtn || !closeSimpleMenu || !simpleMenu || !overlay) {
        console.error('[CubeNet] Error: Algunos elementos del menú móvil no se encontraron');
        return;
    }
    
    // Función para abrir el menú - usando eventos táctiles y de click con animación
    function openMenu(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        // Ver si el menú ya está abierto
        if (simpleMenu.classList.contains('active')) return;
        
        // Primero mostrar elementos (display block)
        simpleMenu.style.display = 'block';
        overlay.style.display = 'block';
        
        // Forzar un reflow para que la transición funcione
        void simpleMenu.offsetWidth;
        
        // Luego activar la animación
        simpleMenu.classList.add('active');
        overlay.classList.add('active');
        
        // Aplicar clase al body para mejor control
        document.body.classList.add('menu-open');
        document.body.style.overflow = 'hidden';
        
        // En iOS necesitamos además:
        if (document.body.style.position !== 'fixed') {
            document.body.setAttribute('data-scroll-position', window.pageYOffset);
            document.body.style.position = 'fixed';
            document.body.style.top = -window.pageYOffset + 'px';
            document.body.style.width = '100%';
        }
        
        console.log('[CubeNet] Menú abierto con animación');
    }
    
    // Función para cerrar el menú con optimizaciones para móviles y animación
    function closeMenu(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        // Ver si el menú ya está cerrado
        if (!simpleMenu.classList.contains('active')) return;
        
        // Primero quitar la clase para iniciar la animación
        simpleMenu.classList.remove('active');
        overlay.classList.remove('active');
        
        // Esperar a que termine la animación antes de ocultar completamente
        setTimeout(function() {
            simpleMenu.style.display = 'none';
            overlay.style.display = 'none';
            // Quitar clase del body
            document.body.classList.remove('menu-open');
            document.body.style.overflow = '';
            
            // Restaurar posición de scroll para iOS
            if (document.body.style.position === 'fixed') {
                const scrollY = document.body.getAttribute('data-scroll-position');
                document.body.style.position = '';
                document.body.style.top = '';
                document.body.style.width = '';
                window.scrollTo(0, parseInt(scrollY || 0));
            }
        }, 300); // Esperar el mismo tiempo que dura la transición CSS (0.3s)
        
        console.log('[CubeNet] Menú cerrado con animación');
    }
    
    // Funciones de alternancia del modo oscuro
    function toggleDarkMode(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation(); 
        }
        
        document.documentElement.classList.toggle('dark-mode');
        const isDarkMode = document.documentElement.classList.contains('dark-mode');
        
        // Cambiar icono y texto
        const icon = this.querySelector('i');
        const text = this.querySelector('span');
        
        if (isDarkMode) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            text.textContent = 'Modo claro';
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            text.textContent = 'Modo oscuro';
        }
        
        // Guardar preferencia
        try {
            localStorage.setItem('darkMode', isDarkMode);
            document.cookie = `darkMode=${isDarkMode}; path=/; max-age=31536000`;
            console.log('[CubeNet] Modo oscuro: ' + (isDarkMode ? 'activado' : 'desactivado'));
        } catch (e) {
            console.error('[CubeNet] Error al guardar preferencia de tema:', e);
        }
    }
    
    // === Agregar eventos con opciones para mejorar compatibilidad ===
    
    // Botón de menú móvil - Tanto click como táctil
    mobileMenuBtn.addEventListener('click', openMenu, {passive: false});
    mobileMenuBtn.addEventListener('touchend', openMenu, {passive: false});
    
    // Cerrar menú - Evento tanto click como táctil
    closeSimpleMenu.addEventListener('click', closeMenu, {passive: false});
    closeSimpleMenu.addEventListener('touchend', closeMenu, {passive: false});
    overlay.addEventListener('click', closeMenu, {passive: false});
    overlay.addEventListener('touchend', closeMenu, {passive: false});
    
    // Botón de modo oscuro
    if (darkModeBtn) {
        darkModeBtn.addEventListener('click', toggleDarkMode, {passive: false});
        darkModeBtn.addEventListener('touchend', toggleDarkMode, {passive: false});
    }
    
    // Cerrar menú al seleccionar un elemento del menú
    const navItems = document.querySelectorAll('.simple-nav-item');
    navItems.forEach(function(item) {
        // Al hacer click en un enlace del menú, cerrar el menú después de un breve retraso
        // para permitir que el navegador procese la navegación
        item.addEventListener('click', function() {
            // No cerramos inmediatamente para permitir la navegación
            setTimeout(closeMenu, 100);
        });
        
        // Igual para eventos táctiles
        item.addEventListener('touchend', function() {
            setTimeout(closeMenu, 100);
        });
    });
    
    // Detectar orientación del dispositivo y actualizar menú en cambio
    window.addEventListener('orientationchange', function() {
        // Si el menú está abierto, ajustarlo después de cambiar orientación
        if (simpleMenu.classList.contains('active')) {
            // Pequeño retraso para permitir que termine la transición de orientación
            setTimeout(function() {
                // Forzar layout refresh
                simpleMenu.style.display = 'none';
                void simpleMenu.offsetWidth;
                simpleMenu.style.display = 'block';
                
                // Si está en orientación landscape con pantalla pequeña, cerrar el menú
                if (window.innerWidth < 768 && window.innerWidth > window.innerHeight) {
                    setTimeout(closeMenu, 100);
                }
            }, 300);
        }
    });
    
    console.log('[CubeNet] Menú móvil v2 inicializado correctamente');
});
</script>
