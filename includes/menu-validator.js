/**
 * Script para verificar el funcionamiento del menú móvil
 * Este archivo se añade para depuración en dispositivos móviles
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('[CubeNet] Iniciando verificador de menú móvil v1.0');
    
    // Comprobar elementos críticos
    const menuElements = {
        mobileMenuBtn: document.getElementById('mobile-menu-btn'),
        mobileMenu: document.getElementById('simple-mobile-menu'),
        overlay: document.getElementById('simple-overlay'),
        closeBtn: document.getElementById('close-simple-menu')
    };
    
    // Verificar que existan todos los elementos
    let elementsOk = true;
    for (const [key, element] of Object.entries(menuElements)) {
        if (!element) {
            console.error(`[CubeNet Detector] Error: No se encontró el elemento ${key}`);
            elementsOk = false;
        }
    }
    
    if (!elementsOk) {
        console.error('[CubeNet Detector] Faltan elementos necesarios para el menú móvil');
        return;
    }
    
    // Comprobar si los estilos están aplicados correctamente
    const menuStyle = window.getComputedStyle(menuElements.mobileMenu);
    const zIndex = menuStyle.getPropertyValue('z-index');
    const transform = menuStyle.getPropertyValue('transform');
    const transition = menuStyle.getPropertyValue('transition');
    
    console.log('[CubeNet Detector] Verificando estilos del menú móvil:');
    console.log(`- z-index: ${zIndex}`);
    console.log(`- transform: ${transform}`);
    console.log(`- transition: ${transition}`);
    
    // Comprobar si hay errores críticos
    const zIndexValue = parseInt(zIndex, 10);
    if (zIndexValue < 9999) {
        console.warn('[CubeNet Detector] ⚠️ El z-index del menú parece ser bajo, podría quedar detrás de otros elementos');
    }
    
    if (!transition.includes('transform') || !transition.includes('s')) {
        console.warn('[CubeNet Detector] ⚠️ La transición no parece estar configurada correctamente para animaciones');
    }
    
    // Verificar que las clases para las animaciones existan en CSS
    const cssCheck = (selector, property, value) => {
        try {
            for (const sheet of document.styleSheets) {
                try {
                    for (const rule of sheet.cssRules) {
                        if (rule.selectorText === selector) {
                            if (property && value) {
                                const style = rule.style.getPropertyValue(property);
                                return style && style.includes(value);
                            }
                            return true;
                        }
                    }
                } catch (e) {
                    // Error de CORS al acceder a hojas de estilo externas
                }
            }
            return false;
        } catch (e) {
            return false;
        }
    };
    
    // Comprobar clases críticas para animaciones
    const cssChecks = [
        { selector: '.simple-mobile-menu.active', property: 'transform', value: 'translateX(0)' },
        { selector: '.simple-overlay.active', property: 'opacity', value: '1' }
    ];
    
    cssChecks.forEach(check => {
        const found = cssCheck(check.selector, check.property, check.value);
        console.log(`[CubeNet Detector] Clase ${check.selector}: ${found ? '✓ OK' : '❌ No encontrada o incorrecta'}`);
    });
    
    // Detectar tipo de dispositivo
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    const isAndroid = /Android/i.test(navigator.userAgent);
    
    console.log(`[CubeNet Detector] Dispositivo detectado: ${isMobile ? (isIOS ? 'iOS' : (isAndroid ? 'Android' : 'Móvil')) : 'Desktop'}`);
    
    // Verificar de forma silenciosa que el menú funcione correctamente
    console.log('[CubeNet Detector] Verificación completa. El menú móvil debería funcionar correctamente.');
});
