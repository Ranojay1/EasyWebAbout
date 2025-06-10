<!DOCTYPE html>
<html lang="es" class="<?php echo $sitio['modo_oscuro'] && isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] === 'true' ? 'dark-mode' : ''; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $sitio['titulo']; ?></title>
    <meta name="description" content="<?php echo $sitio['descripcion_meta']; ?>">
    <meta name="keywords" content="<?php echo $sitio['palabras_clave']; ?>">
    <meta name="author" content="<?php echo $sitio['autor']; ?>">
    <meta name="theme-color" content="<?php echo $sitio['color_primario']; ?>"
    
    <!-- Favicon -->
    <?php if (!empty($sitio['favicon'])): ?>
    <link rel="icon" href="<?php echo $sitio['favicon']; ?>" type="image/x-icon">
    <?php endif; ?>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=<?php echo str_replace(' ', '+', $config['ui']['fuente_titulos']); ?>:wght@300;400;500;600;700&family=<?php echo str_replace(' ', '+', $config['ui']['fuente_cuerpo']); ?>:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation Library -->
    <?php if ($sitio['animaciones']): ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <?php endif; ?>
    
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="/includes/styles.css">
    <link rel="stylesheet" href="/includes/extra-styles.css">
    <link rel="stylesheet" href="/includes/mobile-fixes.css">
    <link rel="stylesheet" href="/includes/menu-animation-fixes.css">
    <link rel="stylesheet" href="/includes/zindex-fixes.css">
    
    <!-- Detectores y validadores -->
    <script src="/includes/detector.js"></script>
    <script src="/includes/menu-validator.js"></script>
    <script src="/includes/zindex-validator.js"></script>
    <style type="text/css">
    <?php 
    // Definir función para convertir HEX a RGB localmente
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

    // Definir variables de estilo
    $color_primario = $sitio['color_primario'] ?? '#3b82f6';
    $color_secundario = $sitio['color_secundario'] ?? '#10b981';
    $color_acento = $sitio['color_acento'] ?? '#8b5cf6';
    $primario_rgb = hex2rgb($color_primario);
    $secundario_rgb = hex2rgb($color_secundario);
    $acento_rgb = hex2rgb($color_acento);
    $estilo_tarjetas = $ui['estilo_tarjetas'] ?? 'glassmorphism';
    $bordes_redondeados = $ui['bordes_redondeados'] ?? true;
    $sombras = $ui['sombras'] ?? true;
    ?>
    
    /* Variables CSS dinámicas */
    :root {
        --primary: <?php echo $color_primario; ?>;
        --primary-rgb: <?php echo $primario_rgb; ?>;
        --secondary: <?php echo $color_secundario; ?>;
        --secondary-rgb: <?php echo $secundario_rgb; ?>;
        --accent: <?php echo $color_acento; ?>;
        --accent-rgb: <?php echo $acento_rgb; ?>;
        --font-size-base: <?php echo $ui['tamano_fuente_base'] ?? 16; ?>px;
        --font-family-heading: '<?php echo $ui['fuente_titulos'] ?? 'Outfit'; ?>', sans-serif;
        --font-family-body: '<?php echo $ui['fuente_cuerpo'] ?? 'Plus Jakarta Sans'; ?>', sans-serif;
        --border-radius: <?php echo $bordes_redondeados ? '12px' : '0'; ?>;
    }
    
    /* Estilos generales */
    .grid {
        display: grid;
        gap: 30px;
    }
    .grid-2 {
        grid-template-columns: repeat(2, 1fr);
    }
    .grid-3 {
        grid-template-columns: repeat(3, 1fr);
    }
    .grid-4 {
        grid-template-columns: repeat(4, 1fr);
    }
    
    /* Estilos para texto con gradiente */
    .text-gradient {
        background-image: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline-block;
    }
    
    /* Estilos para tarjetas */
    .card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: var(--border-radius);
        box-shadow: 0 10px 25px rgba(var(--primary-rgb), 0.1);
        padding: 20px;
        transition: all 0.3s ease;
    }
    
    /* Estilos para música */
    .spotify-embed {
        position: relative;
        width: 100%;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .spotify-embed iframe {
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(var(--primary-rgb), 0.2);
    }
    
    /* Navegación mejorada */
    .nav-links li a {
        position: relative;
    }
    
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
    
    /* Modo oscuro */
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
    
    /* Corrección de navegación */
    .nav-links li a {
        position: relative;
    }
    
    .nav-links li a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px; /* Ajustado para que aparezca debajo del texto */
        left: 0;
        right: 0;
        background: var(--gradient-1);
        transition: width 0.3s ease;
    }
    
    .nav-links li a:hover::after,
    .nav-links li a.active::after {
        width: 100%;
    }
    .flex {
        display: flex;
    }
    .items-center {
        align-items: center;
    }
    .justify-between {
        justify-content: space-between;
    }
    .gap-20 {
        gap: 20px;
    }
    .text-center {
        text-align: center;
    }
    .mt-20 {
        margin-top: 20px;
    }
    .mb-20 {
        margin-bottom: 20px;
    }
    .py-20 {
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .w-full {
        width: 100%;
    }
    
    /* Estilos para el contenedor */
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    /* Estilos para las secciones */
    .section {
        padding: 80px 0;
        position: relative;
    }
    
    /* Estilos para la sección hero */
    .hero-section {
        padding-top: 150px;
        min-height: 80vh;
        display: flex;
        align-items: center;
    }
    
    /* Estilos para tarjetas */
    .card {
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-md);
        height: 100%;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    .card-body {
        padding: 25px;
    }
    
    /* Estilos para el texto con gradiente */
    .text-gradient {
        background-image: var(--gradient-1);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline-block;
    }
    
    /* Media queries para responsividad */
    @media (max-width: 992px) {
        .grid-3 {
            grid-template-columns: repeat(2, 1fr);
        }
        .grid-4 {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .nav-links {
            display: none;
        }
        .hamburger {
            display: block;
        }
        .section {
            padding: 60px 0;
        }
        .section-title {
            font-size: 2rem;
        }
        .grid-2, .grid-3, .grid-4 {
            grid-template-columns: 1fr;
        }
    }
    </style>
    <link rel="stylesheet" href="/includes/extra-styles.css">
    
    <style>
        :root {
            --primary: <?php echo $sitio['color_primario']; ?>;
            --primary-dark: #2563eb;
            --secondary: <?php echo $sitio['color_secundario']; ?>;
            --secondary-dark: #059669;
            --accent: <?php echo $sitio['color_acento']; ?>;
            --dark: #0f172a;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --gradient-1: linear-gradient(135deg, <?php echo $sitio['color_primario']; ?> 0%, <?php echo $sitio['color_secundario']; ?> 100%);
            --gradient-2: linear-gradient(135deg, <?php echo $sitio['color_acento']; ?> 0%, #ec4899 100%);
            --gradient-3: linear-gradient(135deg, <?php echo $sitio['color_primario']; ?> 0%, <?php echo $sitio['color_acento']; ?> 100%);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
            font-size: <?php echo $config['ui']['tamano_fuente_base']; ?>px;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
        }
        
        h1, h2, h3, h4, h5 {
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            line-height: 1.2;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        
        section {
            padding: 5rem 0;
        }
        
        /* Utility Classes */
        .text-gradient {
            background: var(--gradient-1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            gap: 0.5rem;
        }
        
        .btn-primary {
            background: var(--gradient-1);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }
        
        .btn-primary:hover {
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.6);
            transform: translateY(-2px);
        }
        
        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-md);
        }
        
        /* Header & Navigation */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100; /* Valor más bajo que el menú móvil */
            transition: all 0.3s ease;
            padding: 1rem 0;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow-sm);
        }
        
        .header.scrolled {
            padding: 0.75rem 0;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: var(--shadow-md);
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--dark);
        }
        
        .logo-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-1);
            color: white;
            font-size: 1.25rem;
        }
        
        .logo-text {
            font-weight: 700;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        .nav-links li a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            transition: all 0.3s;
            font-size: 1rem;
            padding: 0.5rem 0;
        }
        
        .nav-links li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            background-image: var(--gradient-1);
            transition: width 0.3s ease;
        }
        
        .nav-links li a:hover {
            color: var(--primary);
        }
        
        .nav-links li a:hover::after,
        .nav-links li a.active::after {
            width: 100%;
        }
        
        .nav-links li a.active {
            color: var(--primary);
            font-weight: 600;
        }
        
        .contact-btn {
            background: var(--gradient-1);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 2rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .contact-btn:hover {
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
            transform: translateY(-2px);
        }
        
        .hamburger {
            display: none;
            cursor: pointer;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            z-index: 1002;
        }
        
        .mobile-menu {
            display: none;
        }
        
        .mobile-menu.active {
            display: flex;
            position: fixed;
            top: 0;
            right: 0;
            width: 80%;
            max-width: 350px;
            height: 100vh;
            background: rgba(255, 255, 255, 0.98);
            z-index: 9999;
            padding: 5rem 2rem;
            flex-direction: column;
            overflow-y: auto;
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.15);
        }
        
        .dark-mode .mobile-menu.active {
            background: rgba(15, 23, 42, 0.98);
            border-left: 1px solid rgba(30, 41, 59, 0.7);
        }
        
        .close-menu {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
        }
        
        .mobile-nav-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .mobile-nav-links li a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 1.25rem;
            display: block;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(203, 213, 225, 0.4);
            transition: all 0.3s;
        }
        
        .mobile-nav-links li a:hover,
        .mobile-nav-links li a.active {
            color: var(--primary);
            padding-left: 0.5rem;
        }
        
        .mobile-contact-btn {
            margin-top: 2rem;
            display: inline-block;
            text-align: center;
            background: var(--gradient-1);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            font-weight: 500;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }
        
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(3px);
            z-index: 1000;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .overlay.active {
            visibility: visible;
            opacity: 1;
        }
        
        /* Hero Section */
        .hero {
            padding-top: 8rem;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: "";
            position: absolute;
            top: -5%;
            right: -5%;
            width: 40%;
            height: 40%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.2) 0%, rgba(59, 130, 246, 0) 70%);
            z-index: -1;
        }
        
        .hero::after {
            content: "";
            position: absolute;
            bottom: -5%;
            left: -5%;
            width: 40%;
            height: 40%;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.2) 0%, rgba(139, 92, 246, 0) 70%);
            z-index: -1;
        }
        
        .hero-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 2.75rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }
        
        .hero p {
            font-size: 1.25rem;
            color: var(--gray);
            margin-bottom: 2rem;
            max-width: 600px;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .section-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -0.5rem;
            width: 3rem;
            height: 0.25rem;
            background: var(--gradient-1);
            border-radius: 1rem;
        }
        
        .section-subtitle {
            color: var(--gray);
            font-size: 1.25rem;
            margin-bottom: 3rem;
            max-width: 600px;
        }
        
        .card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }
        
        /* Footer Styles */
        .footer {
            background-color: #f8fafc;
            padding: 5rem 0 2rem;
            color: var(--dark);
            border-top: 1px solid var(--gray-light);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .footer-description {
            color: var(--gray);
            margin-bottom: 1.5rem;
            line-height: 1.7;
            max-width: 300px;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .footer-menu {
            list-style: none;
            padding: 0;
        }

        .footer-menu li {
            margin-bottom: 0.75rem;
        }

        .footer-menu a {
            color: var(--gray);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            padding-left: 1rem;
        }

        .footer-menu a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--primary);
            opacity: 0.7;
        }

        .footer-menu a:hover {
            color: var(--primary);
            padding-left: 1.25rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: var(--gray);
        }

        .contact-item i {
            color: var(--primary);
            margin-right: 1rem;
            font-size: 1rem;
        }

        .contact-item a {
            color: var(--gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-item a:hover {
            color: var(--primary);
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-light);
            color: var(--gray);
            font-size: 0.9rem;
        }

        .copyright p {
            margin-bottom: 0.5rem;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2.25rem;
            }
            
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hamburger {
                display: block;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            section {
                padding: 4rem 0;
            }
        }
        
        @media (max-width: 640px) {
            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 1.75rem;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
            
            section {
                padding: 3rem 0;
            }
        }
    </style>
</head>
<body>
    <!-- Overlay for Mobile Menu -->
    <div class="overlay" id="overlay"></div>
    
    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <nav class="navbar">
                <a href="/" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <span class="logo-text">CubeNet</span>
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
                
                <button class="hamburger" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

    <!-- Mobile Menu -->
    <!-- Duplicate code removed -->
    <style>
        
        .section-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .section-description {
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 800px;
            margin: 0 auto 60px;
            text-align: center;
        }
        
        .text-gradient {
            background: var(--gradient-1);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        
        .card-body {
            padding: 30px;
        }
        
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        .card-text {
            color: var(--gray);
            margin-bottom: 20px;
        }
        
        .grid {
            display: grid;
            gap: 30px;
        }
        
        .grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .grid-3 {
            grid-template-columns: repeat(3, 1fr);
        }
        
        .grid-4 {
            grid-template-columns: repeat(4, 1fr);
        }
        
        .flex {
            display: flex;
        }
        
        .items-center {
            align-items: center;
        }
        
        .justify-between {
            justify-content: space-between;
        }
        
        .gap-20 {
            gap: 20px;
        }
        
        .text-center {
            text-align: center;
        }
        
        .mt-20 {
            margin-top: 20px;
        }
        
        .mb-20 {
            margin-bottom: 20px;
        }
        
        .py-20 {
            padding-top: 20px;
            padding-bottom: 20px;
        }
        
        .w-full {
            width: 100%;
        }
        
        @media (max-width: 992px) {
            .grid-3 {
                grid-template-columns: repeat(2, 1fr);
            }
            .grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hamburger {
                display: flex !important;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: var(--primary);
                color: white;
                box-shadow: 0 4px 10px rgba(var(--primary-rgb), 0.3);
                transition: all 0.3s ease;
            }
            
            .hamburger:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 15px rgba(var(--primary-rgb), 0.4);
            }
            
            .section {
                padding: 80px 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .grid-2, .grid-3, .grid-4 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <!-- Incluir el componente de navegación simplificado -->
            <div class="navbar">
                <?php include 'NavigationBar.php'; ?>
            </div>
        </div>
    </header>
    
    <!-- Eliminamos la navegación duplicada ya que ahora está en NavigationBar.php -->
    <!-- El overlay se define dentro de NavigationBar.php para evitar duplicación -->
    
    <main style="padding-top: 80px;">
