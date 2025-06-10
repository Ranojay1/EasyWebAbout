<?php
// Cargar el archivo de configuración central
$config = include 'config.php';

// Extraer variables de configuración para facilitar su uso en las vistas
$personal = $config['personal'];
$social = $config['social'];
$sitio = $config['sitio'];
$estadisticas = $config['estadisticas'];
$habilidades = $config['habilidades'];
$intereses = $config['intereses']['items'];
$proyectos = $config['proyectos'];

// Variables para compatibilidad con código existente
$nombre = $personal['nombre'];
$edad = $personal['edad'];
$ubicacion = $personal['ubicacion'];
$profesion = $personal['profesion'];
$email = $personal['email'];
$instagram = $social['instagram'];
$discord = $social['discord'];

// Router principal
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Configuración de rutas
$routes = [
    '/' => 'views/home.php',
    '/about' => 'views/about.php',
    '/services' => 'views/services.php',
    '/portfolio' => 'views/portfolio.php',
    '/contact' => 'views/contact.php',
    '/panel' => 'views/panel.php',
    '/music' => 'views/music.php'
];

// Obtener la ruta limpia
$route = rtrim($path, '/');
if (empty($route)) {
    $route = '/';
}

// Incluir el header común
include 'includes/header.php';

// Cargar la vista correspondiente
if (array_key_exists($route, $routes)) {
    include $routes[$route];
} else {
    include 'views/404.php';
}

// Incluir el footer común
include 'includes/footer.php';
?>
