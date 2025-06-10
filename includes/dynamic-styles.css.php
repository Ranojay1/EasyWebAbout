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

// Variables para temas y estilos
$color_primario = $sitio['color_primario'] ?? '#3b82f6';
$color_secundario = $sitio['color_secundario'] ?? '#10b981';
$color_acento = $sitio['color_acento'] ?? '#8b5cf6';
$tamano_fuente = $ui['tamano_fuente_base'] ?? 16;
$estilo_tarjetas = $ui['estilo_tarjetas'] ?? 'glassmorphism';
$bordes_redondeados = $ui['bordes_redondeados'] ?? true;
$sombras = $ui['sombras'] ?? true;

// Convertir colores HEX a RGB para uso en rgba()
function hex2rgb($hex) {
    $hex = str_replace('#', '', $hex);
    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    return "$r, $g, $b";
}

// Colores RGB para uso en variables CSS
$primario_rgb = hex2rgb($color_primario);
$secundario_rgb = hex2rgb($color_secundario);
$acento_rgb = hex2rgb($color_acento);
?>

:root {
    --primary: <?php echo $color_primario; ?>;
    --primary-rgb: <?php echo $primario_rgb; ?>;
    --secondary: <?php echo $color_secundario; ?>;
    --secondary-rgb: <?php echo $secundario_rgb; ?>;
    --accent: <?php echo $color_acento; ?>;
    --accent-rgb: <?php echo $acento_rgb; ?>;
    --dark: #0f172a;
    --light: #f8fafc;
    --gray: #64748b;
    --gray-light: #e2e8f0;
    --font-size-base: <?php echo $tamano_fuente; ?>px;
    --font-family-heading: '<?php echo $ui['fuente_titulos']; ?>', sans-serif;
    --font-family-body: '<?php echo $ui['fuente_cuerpo']; ?>', sans-serif;
    --border-radius: <?php echo $bordes_redondeados ? '12px' : '0'; ?>;
    --transition: all 0.3s ease;
}

/* Estilos generales */
body {
    font-family: var(--font-family-body);
    font-size: var(--font-size-base);
    line-height: 1.6;
    color: var(--dark);
    background-color: var(--light);
    overflow-x: hidden;
}

h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-family-heading);
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 1rem;
}

/* Estilos para las cards según configuración */
<?php if ($estilo_tarjetas === 'glassmorphism'): ?>
.card {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    <?php if ($bordes_redondeados): ?>
    border-radius: var(--border-radius);
    <?php endif; ?>
    <?php if ($sombras): ?>
    box-shadow: 0 10px 25px rgba(var(--primary-rgb), 0.1);
    <?php endif; ?>
}
<?php elseif ($estilo_tarjetas === 'solid'): ?>
.card {
    background: #fff;
    border: 1px solid var(--gray-light);
    <?php if ($bordes_redondeados): ?>
    border-radius: var(--border-radius);
    <?php endif; ?>
    <?php if ($sombras): ?>
    box-shadow: 0 10px 25px rgba(var(--primary-rgb), 0.1);
    <?php endif; ?>
}
<?php else: ?>
.card {
    background: #fff;
    border: 1px solid var(--gray-light);
    <?php if ($bordes_redondeados): ?>
    border-radius: var(--border-radius);
    <?php endif; ?>
    <?php if ($sombras): ?>
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

/* Estilos para música */
.music-container {
    margin: 2rem 0;
    border-radius: var(--border-radius);
    overflow: hidden;
}

.spotify-embed iframe {
    border-radius: var(--border-radius);
    box-shadow: 0 10px 25px rgba(var(--primary-rgb), 0.2);
}

.artists-section {
    margin-top: 3rem;
}

.tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 1rem 0 2rem;
}

.tag {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    color: white;
    padding: 5px 12px;
    border-radius: 50px;
    font-size: 0.9rem;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.btn-spotify {
    background-color: #1DB954;
    color: white;
    padding: 5px 12px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s ease;
}

.btn-spotify:hover {
    background-color: #1aa34a;
}

.text-gradient {
    background-image: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    display: inline-block;
}

/* Navegación mejorada */
.nav-links li a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
    left: 0;
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    transition: width 0.3s ease;
}

.nav-links li a:hover::after {
    width: 100%;
}
