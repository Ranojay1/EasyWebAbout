<?php
// Establecer el tipo de contenido como CSS y evitar caché para desarrollo
header('Content-Type: text/css');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Cargar configuración
$config = include dirname(__DIR__) . '/config.php';

// Extraer variables de configuración
$sitio = $config['sitio'];
$ui = isset($config['ui']) ? $config['ui'] : [
    'tema_actual' => 'default',
    'estilo_tarjetas' => 'glassmorphism',
    'estilo_botones' => 'rounded',
    'tamano_fuente_base' => 16,
    'fuente_titulos' => 'Outfit',
    'fuente_cuerpo' => 'Plus Jakarta Sans',
    'efectos_hover' => true,
    'bordes_redondeados' => true,
    'sombras' => true,
];

// Colores principales
$colorPrimario = $sitio['color_primario'];
$colorSecundario = $sitio['color_secundario'];
$colorAcento = $sitio['color_acento'];

// Convertir HEX a RGB para poder usar transparencia
function hexToRgb($hex) {
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    return array($r, $g, $b);
}

// Obtener valores RGB para los colores
list($primaryR, $primaryG, $primaryB) = hexToRgb($colorPrimario);
list($secondaryR, $secondaryG, $secondaryB) = hexToRgb($colorSecundario);
list($accentR, $accentG, $accentB) = hexToRgb($colorAcento);

// Definir estilos para bordes redondeados
$borderRadius = $ui['bordes_redondeados'] ? '1rem' : '0';
$buttonBorderRadius = $ui['estilo_botones'] === 'rounded' ? '0.5rem' : ($ui['estilo_botones'] === 'pill' ? '50px' : '0');
$cardStyle = $ui['estilo_tarjetas']; // glassmorphism, solid, minimal
$hoverEffects = $ui['efectos_hover']; // true/false
$shadows = $ui['sombras']; // true/false

// Generar el CSS dinámicamente
?>
:root {
    /* Colores personalizados */
    --primary: <?php echo $colorPrimario; ?>;
    --primary-dark: <?php echo adjustBrightness($colorPrimario, -20); ?>;
    --secondary: <?php echo $colorSecundario; ?>;
    --secondary-dark: <?php echo adjustBrightness($colorSecundario, -20); ?>;
    --accent: <?php echo $colorAcento; ?>;
    --primary-rgb: <?php echo "$primaryR, $primaryG, $primaryB"; ?>;
    --secondary-rgb: <?php echo "$secondaryR, $secondaryG, $secondaryB"; ?>;
    --accent-rgb: <?php echo "$accentR, $accentG, $accentB"; ?>;
    
    /* Gradientes */
    --gradient-1: linear-gradient(135deg, <?php echo $colorPrimario; ?> 0%, <?php echo $colorSecundario; ?> 100%);
    --gradient-2: linear-gradient(135deg, <?php echo $colorAcento; ?> 0%, <?php echo '#ec4899'; ?> 100%);
    --gradient-3: linear-gradient(135deg, <?php echo $colorPrimario; ?> 0%, <?php echo $colorAcento; ?> 100%);
    
    /* Configuraciones de UI */
    --font-base: <?php echo $ui['tamano_fuente_base']; ?>px;
    --font-title: '<?php echo $ui['fuente_titulos']; ?>', sans-serif;
    --font-body: '<?php echo $ui['fuente_cuerpo']; ?>', sans-serif;
}

<?php if ($cardStyle === 'glassmorphism'): ?>
/* Estilo de tarjetas con efecto glassmorphism */
.card {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    border-radius: <?php echo $borderRadius; ?>;
    border: 1px solid rgba(255, 255, 255, 0.2);
    <?php if ($shadows): ?>
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    <?php endif; ?>
}
<?php elseif ($cardStyle === 'solid'): ?>
/* Estilo de tarjetas sólidas */
.card {
    background: #ffffff;
    border-radius: <?php echo $borderRadius; ?>;
    <?php if ($shadows): ?>
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    <?php endif; ?>
}
<?php else: ?> 
/* Estilo de tarjetas minimal */
.card {
    background: #ffffff;
    border-radius: <?php echo $borderRadius; ?>;
    border: 1px solid #e5e7eb;
    <?php if ($shadows): ?>
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    <?php endif; ?>
}
<?php endif; ?>

/* Botones */
.btn {
    border-radius: <?php echo $buttonBorderRadius; ?>;
    <?php if ($hoverEffects): ?>
    transition: all 0.3s ease;
    <?php endif; ?>
}

<?php if ($hoverEffects): ?>
.btn:hover {
    transform: translateY(-3px);
    <?php if ($shadows): ?>
    box-shadow: 0 10px 25px rgba(var(--primary-rgb), 0.4);
    <?php endif; ?>
}
<?php endif; ?>

/* Modo oscuro si está habilitado */
<?php if ($sitio['modo_oscuro']): ?>
.dark-mode {
    --dark: #f8fafc;
    --light: #0f172a;
    --gray: #94a3b8;
    --gray-light: #1e293b;
}

.dark-mode .card {
    background: rgba(15, 23, 42, 0.7);
    border-color: rgba(30, 41, 59, 0.4);
}

.dark-mode .header {
    background: rgba(15, 23, 42, 0.8);
}
<?php endif; ?>

<?php
// Función para ajustar el brillo de un color HEX
function adjustBrightness($hex, $steps) {
    $steps = max(-255, min(255, $steps));
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    $r = max(0, min(255, $r + $steps));
    $g = max(0, min(255, $g + $steps));
    $b = max(0, min(255, $b + $steps));
    return '#' . sprintf('%02x', $r) . sprintf('%02x', $g) . sprintf('%02x', $b);
}
?>
