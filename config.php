<?php
/**
 * Archivo de configuración central para el sitio web personal
 * Aquí puedes modificar toda la información personal y configuración del sitio
 * 
 * Última actualización: 07/06/2025
 */

return [
    // Información personal
    'personal' => [
        'nombre' => 'Pedro',
        'edad' => 15,
        'ubicacion' => 'España',
        'profesion' => 'Estudiante y Desarrollador',
        'email' => 'contacto@cubenet.fun',
        'telefono' => '', // Dejar vacío si no deseas mostrar un teléfono
        'fecha_nacimiento' => '2010-03-29', // Formato: YYYY-MM-DD
        'idiomas' => ['Español', 'Inglés'], // Idiomas que dominas
        'hobbies' => ['Videojuegos', 'Programación', 'Música'],
    ],
    
    // Redes sociales
    'social' => [
        'instagram' => 'https://www.instagram.com/lokitomiko',
        'discord' => 'mtm_lokito',
        'github' => '',
        'twitter' => '', // Dejar vacío para no mostrar
        'youtube' => '', // Dejar vacío para no mostrar
        'twitch' => '', // Dejar vacío para no mostrar
        'spotify' => 'https://open.spotify.com/user/312z4qf3j2goai2h4p3o32bcfvr4?si=888ac735ae9648c4', // Tu perfil de Spotify
    ],
    
    // Descripción breve para la página de inicio
    'descripcion_breve' => 'Estudiante de 15 años apasionado por la programación y el desarrollo de páginas web.',
    
    // Descripción detallada para la página "Sobre Mí"
    'descripcion_detallada' => 'Soy un joven programador entusiasta con interés en el desarrollo web y la creación de videojuegos. Me gusta experimentar con NodeJS, PHP y otras tecnologías para crear proyectos interesantes.',
    
    // Frase destacada que aparecerá en el banner principal
    'frase_destacada' => 'Transformando ideas en código, un proyecto a la vez.',
    
    // Intereses y especialidades
    'intereses' => [
        'titulo_seccion' => 'Mis Intereses',
        'descripcion' => 'Áreas y tecnologías que me apasionan',
        'mostrar_seccion' => true,
        'items' => [
            [
                'nombre' => 'Jugador de videojuegos',
                'descripcion' => 'Me apasiona jugar y explorar diferentes mundos virtuales y experiencias de juego.',
                'icono' => 'fa-gamepad',
            ],
            [
                'nombre' => 'Programación en NodeJS',
                'descripcion' => 'Me gusta desarrollar aplicaciones rápidas y eficientes con JavaScript del lado del servidor.',
                'icono' => 'fa-node-js',
            ],
            [
                'nombre' => 'Programación en PHP',
                'descripcion' => 'Disfruto creando sitios web dinámicos y aplicaciones web con PHP.',
                'icono' => 'fa-php',
            ],
            [
                'nombre' => 'Desarrollo web backend',
                'descripcion' => 'Me interesa la lógica detrás de las aplicaciones y cómo manejar datos de forma eficiente.',
                'icono' => 'fa-server',
            ],
            [
                'nombre' => 'Diseño de interfaces simples',
                'descripcion' => 'Creo en las interfaces limpias y funcionales que ofrecen una buena experiencia de usuario.',
                'icono' => 'fa-palette',
            ],
        ],
    ],
    

    
    // Habilidades técnicas con porcentajes de dominio (0-100)
    'habilidades' => [
        'HTML/CSS' => 60,
        'JavaScript' => 60,
        'NodeJS' => 65,
        'PHP' => 65,
        'Diseño Web' => 50,
        'MySQL' => 45,
    ],
    
    // Habilidades agrupadas por categoría
    'habilidades_categorias' => [
        'Desarrollo Web' => [
            'HTML/CSS' => 60,
            'JavaScript' => 60,
            'PHP' => 65,
            'Responsive Design' => 70,
        ],
        'Tecnologías Backend' => [
            'NodeJS' => 65,
            'Express' => 50,
            'MySQL' => 45,
            'MongoDB' => 20,
        ],
        'Herramientas' => [
            'Git' => 15,
            'GitHub' => 30,
            'VS Code' => 80,
        ]
    ],
    
    // Proyectos destacados
    'proyectos' => [
        [
            'nombre' => 'Mi Primer Videojuego',
            'descripcion' => 'Un juego 2D creado con JavaScript y la librería Phaser.',
            'imagen' => 'https://via.placeholder.com/300x200?text=Videojuego',
            'enlace' => '#',
            'github' => 'https://github.com/cubenet/primer-videojuego',
            'tecnologias' => ['JavaScript', 'Phaser', 'HTML5'],
            'destacado' => true
        ],
        [
            'nombre' => 'Bot de Discord',
            'descripcion' => 'Bot para gestionar servidores de Discord desarrollado con NodeJS.',
            'imagen' => 'https://via.placeholder.com/300x200?text=Bot+Discord',
            'enlace' => '#',
            'github' => 'https://github.com/cubenet/discord-bot',
            'tecnologias' => ['NodeJS', 'Discord.js'],
            'destacado' => true
        ],
        [
            'nombre' => 'Sitio Web Personal',
            'descripcion' => 'Esta web, desarrollada con PHP y diseño moderno.',
            'imagen' => 'https://via.placeholder.com/300x200?text=Web+Personal',
            'enlace' => '#',
            'github' => 'https://github.com/cubenet/personal-website',
            'tecnologias' => ['PHP', 'HTML/CSS', 'JavaScript'],
            'destacado' => true
        ]
    ],
    
    // Estadísticas personales para mostrar en el home
    'estadisticas' => [
        [
            'numero' => 2,
            'texto' => 'Años programando',
            'simbolo' => '+', // símbolo a mostrar después del número (opcional)
            'icono' => 'fa-code' // clase Font Awesome para el icono
        ],
        [
            'numero' => 3,
            'texto' => 'Proyectos personales',
            'simbolo' => '+',
            'icono' => 'fa-laptop-code'
        ],
        [
            'numero' => 15,
            'texto' => 'Años de edad',
            'simbolo' => '',
            'icono' => 'fa-birthday-cake'
        ],
        [
            'numero' => 2,
            'texto' => 'Lenguajes principales',
            'simbolo' => '',
            'icono' => 'fa-layer-group'
        ]
    ],
    
    // Educación y formación
    'educacion' => [
        [
            'periodo' => '2023 - Presente',
            'institucion' => 'Instituto de Educación Secundaria',
            'titulo' => 'Estudios actuales',
            'descripcion' => 'Estudiante de educación secundaria con enfoque en tecnología.'
        ],
        [
            'periodo' => '2022',
            'institucion' => 'Curso Online - Udemy',
            'titulo' => 'Desarrollo Web Completo',
            'descripcion' => 'Curso completo de HTML, CSS, JavaScript, Node.js y más.'
        ],
        [
            'periodo' => '2021',
            'institucion' => 'Codecademy',
            'titulo' => 'Introducción a la Programación',
            'descripcion' => 'Fundamentos de programación y lógica computacional.'
        ]
    ],
    
    // Timeline y trayectoria personal
    'trayectoria' => [
        'titulo_seccion' => 'Mi Trayectoria',
        'descripcion' => 'Un vistazo a mi formación y experiencia laboral',
        'mostrar_seccion' => true,
        'educacion' => [
            [
                'titulo' => 'Estudiante de Educación Secundaria',
                'institucion' => 'Instituto Actual',
                'periodo' => '2023 - Presente',
                'descripcion' => 'Estudiante de educación secundaria con enfoque en tecnología'
            ],
            [
                'titulo' => 'Aprendizaje avanzado',
                'institucion' => 'Aprendizaje autodidacta',
                'periodo' => '2023',
                'descripcion' => 'Aprendizaje semicompleto de HTML, CSS, JavaScript y Node.js'
            ],
            [
                'titulo' => 'Primeros pasos en programación',
                'institucion' => 'Aprendizaje autodidacta',
                'periodo' => '2022',
                'descripcion' => 'Fundamentos de programación y lógica computacional'
            ]
        ],
        'experiencia' => [
            [
                'titulo' => 'Primer contacto con la programación',
                'lugar' => 'Aprendizaje autodidacta',
                'periodo' => '2021',
                'descripcion' => 'Comencé a aprender HTML y CSS por mi cuenta.'
            ],
            [
                'titulo' => 'Primeros proyectos',
                'lugar' => 'Proyectos personales',
                'periodo' => '2022',
                'descripcion' => 'Desarrollé mis primeras páginas web y aprendí JavaScript.'
            ],
            [
                'titulo' => 'Exploración de backend',
                'lugar' => 'Proyectos personales',
                'periodo' => '2023',
                'descripcion' => 'Comencé a aprender NodeJS y PHP para crear aplicaciones completas.'
            ]
        ]
    ],
    
    // Configuración de contacto
    'contacto' => [
        'mostrar_formulario' => true,
        'email_contacto' => 'contacto@cubenet.fun',
        'texto_contacto' => 'Si tienes alguna pregunta o quieres contactarme para colaborar en algún proyecto, no dudes en escribirme.',
        'ubicacion_mapa' => 'España', // Ubicación general para el mapa (sin especificar dirección exacta)
        'mostrar_mapa' => true
    ],
    
    // Configuración del sitio
    'sitio' => [
        'titulo' => 'CubeNet - Estudiante y Desarrollador',
        'descripcion_meta' => 'Sitio web personal de CubeNet, estudiante y desarrollador NodeJS y PHP.',
        'palabras_clave' => 'desarrollo web, videojuegos, nodejs, php, programación, estudiante',
        'autor' => 'Pedro',
        'color_primario' => '#3b82f6', // Color azul por defecto
        'color_secundario' => '#10b981', // Color verde por defecto
        'color_acento' => '#8b5cf6', // Color púrpura por defecto
        'favicon' => '/assets/img/favicon.ico', // Ruta al favicon
        'logo' => [
            'texto' => 'CubeNet', 
            'icono' => 'fa-cube', 
            'mostrar_icono' => true
        ],
        'mostrar_scroll_top' => true, // Botón para volver arriba
        'animaciones' => true, // Activar animaciones AOS
        'modo_oscuro' => true, // Habilitar opción de modo oscuro
        'paginas_activas' => [
            'home' => true,
            'about' => true,
            'services' => false,
            'portfolio' => true,
            'contact' => true,
            'blog' => false
        ]
    ],
    
    // Opciones de UI y temas
    'ui' => [
        'tema_actual' => 'default', // default, dark, light, neon
        'estilo_tarjetas' => 'glassmorphism', // glassmorphism, solid, minimal
        'estilo_botones' => 'rounded', // rounded, square, pill
        'tamano_fuente_base' => 16, // en px
        'fuente_titulos' => 'Outfit', // Nombre de la fuente para títulos
        'fuente_cuerpo' => 'Plus Jakarta Sans', // Nombre de la fuente para texto general
        'efectos_hover' => true, // Activar efectos al pasar el ratón
        'bordes_redondeados' => true, // Usar bordes redondeados en elementos
        'sombras' => true, // Usar sombras en elementos
    ],
    
    // Configuración de música para la sección de Spotify
    'musica' => [
        'mostrar_seccion' => true,
        'mostrar_actividad_reciente' => true, // Controla la visibilidad de "Lo que estoy escuchando ahora"
        'titulo_seccion' => 'Mi música favorita',
        'descripcion' => 'Estas son algunas de las canciones que me inspiran mientras programo.',
        'titulo_actividad_reciente' => 'Mi selección actual',
        'descripcion_actividad_reciente' => 'Esta es una selección de canciones que representan lo que estoy escuchando más últimamente',
        'playlist_id' => '09XzlNf5il54wPWEf3b5m3', // ID de playlist de Spotify
        'artistas_favoritos' => [
            'EZVIT810',
            '3AM',
            'KYR4',
            '3AM',
            'Beret',
            'Mafalda Cardenal'
        ],
        'canciones_favoritas' => [
            [
                'nombre' => 'Another LV',
                'artista' => 'Nou Nueve',
                'url' => 'https://open.spotify.com/track/4Vy4v1y21wSnzJ5R20PgwZ'
            ],
            [
                'nombre' => 'Mi Problema Favorito',
                'artista' => 'Kadec Santa Anna, Franckvit',
                'url' => 'https://open.spotify.com/track/15BiGTRN58ArkPjHvXlSeE'
            ],
            [
                'nombre' => 'Si te vuelvo a llamar',
                'artista' => 'Beret',
                'url' => 'https://open.spotify.com/track/2tdpP18jNRTREK255JpMo5'
            ],
            [
                'nombre' => 'Hablando de amor',
                'artista' => 'Santos 912',
                'url' => 'https://open.spotify.com/track/17S8sSnb3HTbdEtusJRIyb'
            ],
            [
                'nombre' => 'Me basta con mirarte',
                'artista' => 'Deco Mdz',
                'url' => 'https://open.spotify.com/track/3m0Ax3MM6hR2Kv1XEEJFpz'
            ],
            [
                'nombre' => 'Cada Motivo',
                'artista' => 'EZVIT810, Lu Decker, Calero LDN',
                'url' => 'https://open.spotify.com/track/5RwF8yjTv6LvpCjJL8yjkL'
            ],
            [
                'nombre' => 'Invierno en París',
                'artista' => 'Santos 912, Franckvit',
                'url' => 'https://open.spotify.com/track/68VKf9FKe1alqVnKcH3Z2e'
            ],
            [
                'nombre' => 'Cantándote al Oído',
                'artista' => 'KYR4',
                'url' => 'https://open.spotify.com/track/4ow2oAfYPMqLpY0RRUmBKL'
            ],
            [
                'nombre' => 'Roto',
                'artista' => '3AM',
                'url' => 'https://open.spotify.com/track/3YIU0OFB9ejJxu3eWgb7sU'
            ]
        ]
    ],
];
?>
