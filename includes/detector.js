/**
 * CubeNet Mobile Compatibility Detector
 * Este script se ejecuta en la carga de la página para detectar y reportar problemas
 * con el menú móvil o el modo oscuro en diferentes dispositivos.
 */

(function() {
    // Ejecutar cuando el DOM está completamente cargado
    document.addEventListener('DOMContentLoaded', function() {
        console.log('%c[CubeNet Detector] %cIniciando diagnóstico de compatibilidad...', 
            'color: #10b981; font-weight: bold;', 'color: inherit');
        
        // Detectar dispositivo
        const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        const isIOS = /iPhone|iPad|iPod/i.test(navigator.userAgent);
        const isAndroid = /Android/i.test(navigator.userAgent);
        const browser = detectBrowser();
        
        console.log('%c[CubeNet Detector] %cDispositivo: ' + 
            (isMobile ? 'Móvil' : 'Desktop') + 
            (isIOS ? ' (iOS)' : '') + 
            (isAndroid ? ' (Android)' : '') +
            ' - Navegador: ' + browser,
            'color: #10b981; font-weight: bold;', 'color: inherit');
        
        // Verificar implementación del menú
        const newMenuImplementation = !!document.getElementById('simple-mobile-menu');
        const oldMenuImplementation = !!document.getElementById('mobile-menu');
        
        console.log('%c[CubeNet Detector] %cImplementación de menú: ' + 
            (newMenuImplementation ? 'Nueva (v2)' : 'No detectada') +
            (oldMenuImplementation ? ' (Antigua también presente)' : ''),
            'color: #10b981; font-weight: bold;', 
            newMenuImplementation ? 'color: green' : 'color: red');
        
        // Verificar botones de menú
        const newMenuButton = document.getElementById('mobile-menu-btn');
        const oldMenuButton = document.getElementById('menu-toggle');
        
        if (newMenuButton && oldMenuButton) {
            console.warn('%c[CubeNet Detector] %cAdvertencia: Ambos botones de menú están presentes',
                'color: #10b981; font-weight: bold;', 'color: orange');
        }
        
        // Verificar implementación del tema
        const darkModeEnabled = document.documentElement.classList.contains('dark-mode');
        const darkModeSaved = localStorage.getItem('darkMode') === 'true';
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        console.log('%c[CubeNet Detector] %cModo oscuro: ' + 
            (darkModeEnabled ? 'Activado' : 'Desactivado') + 
            ' (Preferencia guardada: ' + (darkModeSaved ? 'Sí' : 'No') + 
            ', Sistema: ' + (systemPrefersDark ? 'Oscuro' : 'Claro') + ')',
            'color: #10b981; font-weight: bold;', 'color: inherit');
        
        // Verificar overlay
        const newOverlay = document.getElementById('simple-overlay');
        const oldOverlay = document.getElementById('overlay');
        
        if (newOverlay && oldOverlay) {
            console.warn('%c[CubeNet Detector] %cAdvertencia: Múltiples overlays detectados',
                'color: #10b981; font-weight: bold;', 'color: orange');
        }
        
        // Mostrar resumen
        const issues = [];
        
        if (!newMenuImplementation) {
            issues.push('Menú móvil v2 no detectado');
        }
        
        if (newMenuImplementation && oldMenuImplementation) {
            issues.push('Ambas implementaciones de menú presentes');
        }
        
        if (newMenuButton && oldMenuButton) {
            issues.push('Múltiples botones de menú presentes');
        }
        
        if (newOverlay && oldOverlay) {
            issues.push('Múltiples overlays presentes');
        }
        
        if (isMobile && isIOS && !newMenuImplementation) {
            issues.push('Dispositivo iOS sin la nueva implementación del menú');
        }
        
        // Mostrar resultado
        if (issues.length === 0) {
            console.log('%c[CubeNet Detector] %c✓ Todo parece correcto. No se detectaron problemas.',
                'color: #10b981; font-weight: bold;', 'color: green; font-weight: bold');
        } else {
            console.warn('%c[CubeNet Detector] %c⚠ Se detectaron ' + issues.length + ' posibles problemas:',
                'color: #10b981; font-weight: bold;', 'color: orange; font-weight: bold');
            
            issues.forEach((issue, index) => {
                console.warn('%c[CubeNet Detector] %c  ' + (index + 1) + '. ' + issue,
                    'color: #10b981; font-weight: bold;', 'color: orange');
            });
        }
    });
    
    // Función auxiliar para detectar el navegador
    function detectBrowser() {
        const userAgent = navigator.userAgent;
        let browser = "Desconocido";
        
        if (userAgent.match(/chrome|chromium|crios/i)) {
            browser = "Chrome";
        } else if (userAgent.match(/firefox|fxios/i)) {
            browser = "Firefox";
        } else if (userAgent.match(/safari/i)) {
            browser = "Safari";
        } else if (userAgent.match(/opr\//i)) {
            browser = "Opera";
        } else if (userAgent.match(/edg/i)) {
            browser = "Edge";
        }
        
        return browser;
    }
})();
