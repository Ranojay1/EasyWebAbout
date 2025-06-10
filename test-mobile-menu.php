<?php
$sitio = [
    'modo_oscuro' => true,
    'titulo' => 'Test de Menú Móvil y Modo Oscuro',
    'descripcion_meta' => 'Página de prueba para verificar el funcionamiento del menú móvil y modo oscuro',
    'palabras_clave' => 'test, menú móvil, modo oscuro',
    'autor' => 'CubeNet',
    'color_primario' => '#3b82f6',
    'favicon' => '/favicon.ico',
    'paginas_activas' => [
        'services' => true,
        'portfolio' => true,
        'contact' => true
    ]
];

$config = [
    'ui' => [
        'tamano_fuente_base' => 16,
        'fuente_titulos' => 'Outfit',
        'fuente_cuerpo' => 'Plus Jakarta Sans'
    ],
    'musica' => [
        'mostrar_seccion' => true
    ]
];

$route = '/test';

include('includes/header.php');
?>

<div class="container" style="padding-top: 100px; min-height: 100vh;">
    <h1>Prueba de Menú Móvil y Modo Oscuro</h1>
    <p>Esta página permite probar el funcionamiento del menú móvil y el modo oscuro.</p>
    <div style="margin: 30px 0;">
        <h2>Estado actual:</h2>
        <ul>
            <li>Modo oscuro: <span id="dark-mode-status">-</span></li>
            <li>Menú móvil: <span id="menu-status">-</span></li>
            <li>Dispositivo: <span id="device-info">-</span></li>
        </ul>
    </div>
    <button onclick="testDarkMode();" style="padding: 10px 20px; background: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; margin-right: 10px;">
        Probar Modo Oscuro
    </button>
    <button onclick="testMobileMenu();" style="padding: 10px 20px; background: var(--secondary, #10b981); color: white; border: none; border-radius: 8px; cursor: pointer;">
        Probar Menú Móvil
    </button>

    <div style="margin-top: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
        <h3>Resultados de la prueba:</h3>
        <pre id="test-results" style="background: #f5f5f5; padding: 15px; border-radius: 5px; max-height: 200px; overflow-y: auto;">Los resultados aparecerán aqu..</pre>
    </div>
</div>

<script>
// Función para actualizar el estado
function updateStatus() {
    // Modo oscuro
    const isDarkMode = document.documentElement.classList.contains('dark-mode');
    document.getElementById('dark-mode-status').textContent = isDarkMode ? 'Activado' : 'Desactivado';
    document.getElementById('dark-mode-status').style.color = isDarkMode ? '#10b981' : '#ef4444';
    
    // Menú móvil
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('simple-mobile-menu');
    const menuDisplay = menuBtn ? (getComputedStyle(menuBtn).display !== 'none' ? 'Visible' : 'Oculto') : 'No encontrado';
    document.getElementById('menu-status').textContent = menuDisplay;
    document.getElementById('menu-status').style.color = menuDisplay === 'Visible' ? '#10b981' : '#ef4444';
    
    // Dispositivo
    const isMobile = window.innerWidth <= 768;
    const deviceType = isMobile ? 'Móvil' : 'Desktop';
    document.getElementById('device-info').textContent = deviceType + ' (' + window.innerWidth + 'px x ' + window.innerHeight + 'px)';
}

// Función para probar el modo oscuro
function testDarkMode() {
    const results = document.getElementById('test-results');
    results.innerHTML = '';
    
    try {
        // Verificar estado inicial
        const initialState = document.documentElement.classList.contains('dark-mode');
        log('Estado inicial del modo oscuro: ' + (initialState ? 'Activado' : 'Desactivado'));
        
        // Verificar botón en menú móvil
        const darkModeBtn = document.getElementById('simple-dark-mode');
        if (darkModeBtn) {
            log('✅ Botón de modo oscuro encontrado en el menú móvil');
            
            // Simular click en el botón
            log('Simulando click en el botón de modo oscuro...');
            darkModeBtn.click();
            
            // Verificar estado después del click
            const newState = document.documentElement.classList.contains('dark-mode');
            log('Estado después del click: ' + (newState ? 'Activado' : 'Desactivado'));
            log(newState !== initialState ? '✅ Modo oscuro cambió correctamente' : '❌ El modo oscuro no cambió');
            
            // Restaurar estado original
            if (newState !== initialState) {
                darkModeBtn.click();
                log('Estado restaurado a: ' + (document.documentElement.classList.contains('dark-mode') ? 'Activado' : 'Desactivado'));
            }
        } else {
            log('❌ Botón de modo oscuro NO encontrado en el menú móvil');
        }
        
        // Verificar cookie y localStorage
        const darkModeCookie = document.cookie.split(';').find(c => c.trim().startsWith('darkMode='));
        const darkModeLocalStorage = localStorage.getItem('darkMode');
        
        log('Cookie darkMode: ' + (darkModeCookie ? darkModeCookie.split('=')[1] : 'No establecida'));
        log('localStorage darkMode: ' + (darkModeLocalStorage !== null ? darkModeLocalStorage : 'No establecido'));
        
        updateStatus();
    } catch(e) {
        log('❌ Error durante la prueba: ' + e.message);
        console.error(e);
    }
}

// Función para probar el menú móvil
function testMobileMenu() {
    const results = document.getElementById('test-results');
    results.innerHTML = '';
    
    try {
        // Verificar elementos necesarios
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('simple-mobile-menu');
        const overlay = document.getElementById('simple-overlay');
        const closeBtn = document.getElementById('close-simple-menu');
        
        log('Botón de menú: ' + (menuBtn ? '✅ Encontrado' : '❌ No encontrado'));
        log('Menú móvil: ' + (mobileMenu ? '✅ Encontrado' : '❌ No encontrado'));
        log('Overlay: ' + (overlay ? '✅ Encontrado' : '❌ No encontrado'));
        log('Botón cerrar: ' + (closeBtn ? '✅ Encontrado' : '❌ No encontrado'));
        
        if (menuBtn && mobileMenu && overlay && closeBtn) {
            // Estado inicial
            const initialMenuState = mobileMenu.classList.contains('active');
            const initialDisplay = getComputedStyle(mobileMenu).display;
            log('Estado inicial del menú: ' + (initialMenuState ? 'Abierto' : 'Cerrado'));
            log('Display inicial: ' + initialDisplay);
            
            // Simular apertura del menú
            log('Simulando click en botón de menú...');
            menuBtn.click();
            
            // Verificar cambio
            setTimeout(() => {
                const newMenuState = mobileMenu.classList.contains('active');
                const newDisplay = getComputedStyle(mobileMenu).display;
                log('Estado después del click: ' + (newMenuState ? 'Abierto' : 'Cerrado'));
                log('Display después del click: ' + newDisplay);
                log(newMenuState !== initialMenuState ? '✅ Estado del menú cambió correctamente' : '❌ Estado del menú no cambió');
                
                // Probar z-index
                const menuZIndex = getComputedStyle(mobileMenu).zIndex;
                const overlayZIndex = getComputedStyle(overlay).zIndex;
                const bodyZIndex = getComputedStyle(document.body).zIndex;
                
                log('z-index del menú: ' + menuZIndex);
                log('z-index del overlay: ' + overlayZIndex);
                
                // Si el menú está abierto, probar cerrado
                if (newMenuState) {
                    log('Simulando click en botón de cerrar...');
                    
                    // Cerrar después de 1 segundo
                    setTimeout(() => {
                        closeBtn.click();
                        
                        // Verificar estado cerrado
                        setTimeout(() => {
                            const finalMenuState = mobileMenu.classList.contains('active');
                            log('Estado final: ' + (finalMenuState ? 'Abierto' : 'Cerrado'));
                            log(finalMenuState === false ? '✅ Menú cerrado correctamente' : '❌ Menú no se cerró');
                            updateStatus();
                        }, 500);
                    }, 1000);
                }
            }, 500);
        }
        
        updateStatus();
    } catch(e) {
        log('❌ Error durante la prueba: ' + e.message);
        console.error(e);
    }
}

// Funcinnn para añadir logs
function log(message) {
    const results = document.getElementById('test-results');
    const time = new Date().toLocaleTimeString();
    results.innerHTML += `[${time}] ${message}<br>`;
    results.scrollTop = results.scrollHeight;
}

// Actualizar estado inicial
window.addEventListener('DOMContentLoaded', updateStatus);
window.addEventListener('resize', updateStatus);
</script>

<?php include('includes/footer.php'); ?>
