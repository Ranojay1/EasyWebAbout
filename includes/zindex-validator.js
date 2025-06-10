/**
 * Verificador específico de z-index para menú móvil
 * Este script detecta problemas de superposición entre el menú y otros elementos
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('[CubeNet] Iniciando verificador de z-index v1.0');
    
    // Elementos a verificar
    const menuElements = {
        mobileMenu: document.getElementById('simple-mobile-menu'),
        overlay: document.getElementById('simple-overlay'),
        menuBtn: document.getElementById('mobile-menu-btn'),
        header: document.querySelector('.header'),
        mainContent: document.querySelector('main') || document.querySelector('.main-content') || document.querySelector('#content')
    };
    
    // Verificar los valores de z-index
    function checkZIndexValues() {
        // Obtener valores computados
        const zIndexes = {};
        let allOk = true;
        
        for (const [key, element] of Object.entries(menuElements)) {
            if (!element) continue;
            
            const style = window.getComputedStyle(element);
            const zIndex = style.getPropertyValue('z-index');
            const position = style.getPropertyValue('position');
            
            zIndexes[key] = {
                zIndex: zIndex === 'auto' ? 0 : parseInt(zIndex, 10),
                position: position
            };
            
            // Verificar posición para z-index
            if (zIndex !== 'auto' && position === 'static') {
                console.warn(`[CubeNet] Advertencia: Elemento ${key} tiene z-index pero posición static`);
                allOk = false;
            }
        }
        
        // Verificar relaciones importantes de z-index
        if (zIndexes.mobileMenu && zIndexes.header && zIndexes.mobileMenu.zIndex <= zIndexes.header.zIndex) {
            console.error('[CubeNet] ERROR CRÍTICO: El z-index del menú móvil es menor o igual al del header');
            allOk = false;
        }
        
        if (zIndexes.overlay && zIndexes.mainContent && zIndexes.overlay.zIndex <= zIndexes.mainContent.zIndex) {
            console.error('[CubeNet] ERROR CRÍTICO: El overlay tiene z-index menor o igual al contenido principal');
            allOk = false;
        }
        
        console.log('[CubeNet] Valores de z-index:', zIndexes);
        console.log(`[CubeNet] Verificación de z-index: ${allOk ? '✅ Todo correcto' : '❌ Hay problemas'}`);
        
        return {allOk, zIndexes};
    }
    
    // Verificar en carga inicial y después de abrir menú
    setTimeout(checkZIndexValues, 500);
    
    // Verificar cuando se abre el menú
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            // Verificar después de que se complete la animación
            setTimeout(checkZIndexValues, 400);
        });
    }
});
