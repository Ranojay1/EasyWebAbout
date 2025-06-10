<?php
/**
 * Archivo de configuración por defecto para el sitio web personal
 * Este archivo sirve como plantilla base que puedes usar para crear tu propia configuración
 * 
 * Instrucciones:
 * 1. Copia este archivo como 'config.php'
 * 2. Modifica todos los valores con tu información personal
 * 3. Personaliza los textos según tu idioma/preferencias
 * 
 * Última actualización: 10/06/2025
 */

return [
    // Información personal - PERSONALIZA ESTOS DATOS
    'personal' => [
        'nombre' => 'Tu Nombre',
        'edad' => 25,
        'ubicacion' => 'Tu Ciudad, País',
        'profesion' => 'Tu Profesión',
        'email' => 'tu@email.com',
        'telefono' => '', // Opcional - dejar vacío si no deseas mostrarlo
        'fecha_nacimiento' => '1999-01-01', // Formato: YYYY-MM-DD
        'idiomas' => ['Español', 'Inglés'], // Idiomas que dominas
        'hobbies' => ['Programación', 'Lectura', 'Música'], // Tus hobbies
    ],
    
    // Redes sociales - AGREGA TUS ENLACES
    'social' => [
        'instagram' => '', // https://www.instagram.com/tu_usuario
        'discord' => '', // Puede ser un ID/username como "usuario#1234" o una URL completa como "https://discord.gg/invitacion"
        'github' => '', // https://github.com/tu_usuario
        'twitter' => '', // https://twitter.com/tu_usuario
        'youtube' => '',
        'twitch' => '',
        'linkedin' => '', // https://linkedin.com/in/tu_usuario
        'spotify' => '', // Tu perfil de Spotify
    ],
    
    // Descripciones principales
    'descripcion_breve' => 'Una breve descripción sobre ti que aparecerá en la página principal.',
    
    'descripcion_detallada' => 'Una descripción más detallada sobre tu experiencia, intereses y objetivos profesionales. Esta aparecerá en la página "Sobre Mí".',
    
    'frase_destacada' => 'Tu frase inspiradora o lema personal.',
    
    // Intereses y especialidades
    'intereses' => [
        'titulo_seccion' => 'Mis Intereses',
        'descripcion' => 'Áreas y tecnologías que me apasionan',
        'mostrar_seccion' => true,
        'items' => [
            [
                'nombre' => 'Desarrollo Web',
                'descripcion' => 'Descripción de tu interés en desarrollo web.',
                'icono' => 'fa-code',
            ],
            [
                'nombre' => 'Programación Backend',
                'descripcion' => 'Tu experiencia y pasión por el backend.',
                'icono' => 'fa-server',
            ],
            [
                'nombre' => 'Diseño UI/UX',
                'descripcion' => 'Tu interés en el diseño de interfaces.',
                'icono' => 'fa-palette',
            ],
            // Agrega más intereses según necesites
        ],
    ],
    
    // Habilidades técnicas con porcentajes de dominio (0-100)
    'habilidades' => [
        'HTML/CSS' => 80,
        'JavaScript' => 75,
        'PHP' => 70,
        'Python' => 65,
        'MySQL' => 60,
        'Git' => 70,
        // Agrega o modifica según tus habilidades
    ],
    
    // Habilidades agrupadas por categoría
    'habilidades_categorias' => [
        'Frontend' => [
            'HTML/CSS' => 80,
            'JavaScript' => 75,
            'React' => 65,
            'Vue.js' => 50,
        ],
        'Backend' => [
            'PHP' => 70,
            'Python' => 65,
            'Node.js' => 60,
            'MySQL' => 60,
        ],
        'Herramientas' => [
            'Git' => 70,
            'Docker' => 40,
            'Linux' => 60,
        ]
    ],
    
    // Textos personalizables de la interfaz
    'textos' => [
        // Navegación
        'menu_inicio' => 'Inicio',
        'menu_sobre_mi' => 'Sobre Mí',
        'menu_contacto' => 'Contacto',
        'menu_musica' => 'Música',
        
        // Página de inicio
        'saludo_principal' => 'Hola, soy',
        'boton_contactame' => 'Contáctame',
        'boton_sobre_mi' => 'Sobre Mí',
        'boton_ver_mas' => 'Ver más',
        'seccion_estadisticas_titulo' => 'En números',
        'seccion_estadisticas_subtitulo' => 'Algunos datos sobre mi trayectoria',
        
        // Página sobre mí
        'sobre_mi_titulo' => 'Sobre mí',
        'sobre_mi_saludo' => 'Hola, soy',
        'habilidades_titulo' => 'Mis Habilidades',
        'habilidades_subtitulo' => 'Tecnologías y herramientas con las que trabajo',
        'trayectoria_titulo' => 'Mi Trayectoria',
        'trayectoria_subtitulo' => 'Un vistazo a mi formación y experiencia',
        'educacion_titulo' => 'Educación',
        'experiencia_titulo' => 'Experiencia',
        'cta_titulo' => '¿Quieres conectar conmigo?',
        'cta_descripcion' => 'Si te interesan mis servicios o quieres colaborar en algún proyecto, no dudes en contactarme.',
        'cta_boton' => 'Envíame un mensaje',
        
        // Página de contacto
        'contacto_titulo' => 'Contacto',
        'contacto_subtitulo' => 'Hablemos sobre tu proyecto',
        'form_nombre' => 'Nombre',
        'form_email' => 'Email',
        'form_asunto' => 'Asunto',
        'form_mensaje' => 'Mensaje',
        'form_enviar' => 'Enviar mensaje',
        'form_placeholder_nombre' => 'Tu nombre completo',
        'form_placeholder_email' => 'tu@email.com',
        'form_placeholder_asunto' => 'Asunto del mensaje',
        'form_placeholder_mensaje' => 'Escribe tu mensaje aquí...',
        
        // Página de música (opcional)
        'musica_titulo' => 'Mi Música',
        'musica_subtitulo' => 'Las canciones que me inspiran',
        'musica_escuchando_ahora' => 'Lo que estoy escuchando ahora',
        'musica_favoritas' => 'Mis favoritas',
        'spotify_escuchar' => 'Escuchar en Spotify',
        
        // Footer
        'footer_derechos' => 'Todos los derechos reservados',
        'footer_hecho_con' => 'Hecho con',
        'footer_desarrollado_por' => 'Desarrollado por',
        
        // Botones generales
        'boton_volver' => 'Volver',
        'boton_siguiente' => 'Siguiente',
        'boton_anterior' => 'Anterior',
        'boton_cerrar' => 'Cerrar',
        'boton_abrir_menu' => 'Abrir menú',
        'boton_modo_oscuro' => 'Cambiar tema',
        
        // Mensajes de estado
        'cargando' => 'Cargando...',
        'error_generico' => 'Ha ocurrido un error. Inténtalo de nuevo.',
        'mensaje_enviado' => 'Mensaje enviado correctamente',
        'campos_requeridos' => 'Por favor, completa todos los campos requeridos',
        
        // SEO y metadatos
        'meta_descripcion_inicio' => 'Sitio web personal de {nombre}, {profesion}. Conoce más sobre mis proyectos y experiencia.',
        'meta_descripcion_sobre_mi' => 'Conoce más sobre {nombre}, sus habilidades y su trayectoria profesional.',
        'meta_descripcion_contacto' => 'Ponte en contacto con {nombre} para colaboraciones, proyectos o consultas.',
        'meta_descripcion_musica' => 'Descubre la música que inspira a {nombre} mientras trabaja.',
        
        // Textos de accesibilidad
        'alt_foto_perfil' => 'Foto de perfil de {nombre}',
        'alt_logo_empresa' => 'Logo de {nombre}',
        'alt_icono_red_social' => 'Ir a {red_social}',
        
        // Errores específicos
        'error_404_titulo' => 'Página no encontrada',
        'error_404_descripcion' => 'La página que buscas no existe o ha sido movida.',
        'error_404_boton' => 'Volver al inicio',
        'error_500_titulo' => 'Error del servidor',
        'error_500_descripcion' => 'Ha ocurrido un error interno. Inténtalo más tarde.',
        
        // Tiempo y fechas
        'hace_tiempo' => 'Hace {tiempo}',
        'minutos' => 'minutos',
        'horas' => 'horas',
        'dias' => 'días',
        'meses' => 'meses',
        'años' => 'años',
        
        // Redes sociales
        'seguir_en' => 'Seguir en',
        'conectar_en' => 'Conectar en',
        'ver_perfil_en' => 'Ver perfil en',
    ],
    
    // Estadísticas personales para mostrar en el home
    'estadisticas' => [
        [
            'numero' => 5,
            'texto' => 'Años de experiencia',
            'simbolo' => '+',
            'icono' => 'fa-code'
        ],
        [
            'numero' => 10,
            'texto' => 'Proyectos completados',
            'simbolo' => '+',
            'icono' => 'fa-laptop-code'
        ],
        [
            'numero' => 50,
            'texto' => 'Clientes satisfechos',
            'simbolo' => '+',
            'icono' => 'fa-users'
        ],
        [
            'numero' => 3,
            'texto' => 'Tecnologías principales',
            'simbolo' => '',
            'icono' => 'fa-layer-group'
        ]
    ],
    
    // Educación y formación
    'educacion' => [
        [
            'periodo' => '2020 - 2024',
            'institucion' => 'Tu Universidad',
            'titulo' => 'Grado en Ingeniería Informática',
            'descripcion' => 'Descripción de tus estudios universitarios.'
        ],
        [
            'periodo' => '2023',
            'institucion' => 'Plataforma Online',
            'titulo' => 'Curso de Desarrollo Full Stack',
            'descripcion' => 'Descripción del curso y tecnologías aprendidas.'
        ],
        // Agrega más educación según necesites
    ],
    
    // Timeline de historia personal/profesional
    'timeline' => [
        [
            'año' => 2020,
            'titulo' => 'Inicio en la programación',
            'descripcion' => 'Comenzaste a aprender programación.'
        ],
        [
            'año' => 2021,
            'titulo' => 'Primeros proyectos',
            'descripcion' => 'Desarrollaste tus primeros proyectos web.'
        ],
        [
            'año' => 2022,
            'titulo' => 'Especialización',
            'descripcion' => 'Te especializaste en tecnologías específicas.'
        ],
        [
            'año' => 2023,
            'titulo' => 'Freelance',
            'descripcion' => 'Comenzaste a trabajar como freelancer.'
        ]
    ],
    
    // Configuración de contacto
    'contacto' => [
        'mostrar_formulario' => true,
        'texto_contacto' => 'Si tienes alguna pregunta o quieres contactarme para colaborar en algún proyecto, no dudes en escribirme.',
        'ubicacion_mapa' => 'Tu Ciudad, País', // Ubicación general para el mapa
        'mostrar_mapa' => false, // Cambiar a true si quieres mostrar un mapa
        'webhook_url' => 'https://tu-servicio.com/webhook', // URL del webhook para recibir los mensajes (OBLIGATORIO)
        'webhook_secret' => 'tu_clave_secreta', // Clave secreta para autenticar las solicitudes al webhook
        'webhook_timeout' => 10, // Tiempo máximo de espera para la respuesta del webhook (en segundos)
    ],
    
    // Configuración del sitio
    'sitio' => [
        'titulo' => 'Tu Nombre - Tu Profesión',
        'descripcion_meta' => 'Sitio web personal de Tu Nombre, descripción breve de tu profesión.',
        'palabras_clave' => 'desarrollo web, programación, tu especialidad, freelancer',
        'autor' => 'Tu Nombre',
        'color_primario' => '#3b82f6', // Color azul - personalízalo
        'color_secundario' => '#10b981', // Color verde - personalízalo
        'color_acento' => '#8b5cf6', // Color púrpura - personalízalo
        'favicon' => '/assets/img/favicon.ico',
        'logo' => [
            'texto' => 'TuLogo', 
            'icono' => 'fa-user', // Icono de Font Awesome
            'mostrar_icono' => true
        ],
        'mostrar_scroll_top' => true,
        'animaciones' => true,
        'modo_oscuro' => true,
        'paginas_activas' => [
            'home' => true,
            'about' => true,
            'services' => false,
            'portfolio' => false,
            'contact' => true,
            'blog' => false
        ]
    ],
    
    // Opciones de UI y temas
    'ui' => [
        'tema_actual' => 'default', // default, dark, light, neon
        'estilo_tarjetas' => 'glassmorphism', // glassmorphism, solid, minimal
        'estilo_botones' => 'rounded', // rounded, square, pill
        'tamano_fuente_base' => 16,
        'fuente_titulos' => 'Outfit',
        'fuente_cuerpo' => 'Plus Jakarta Sans',
        'efectos_hover' => true,
        'bordes_redondeados' => true,
        'sombras' => true,
    ],
    
    // Configuración de música (OPCIONAL - eliminar si no usas)
    'musica' => [
        'mostrar_seccion' => false, // Cambiar a true si quieres mostrar música
        'mostrar_actividad_reciente' => false,
        'titulo_seccion' => 'Mi música favorita',
        'descripcion' => 'Estas son algunas de las canciones que me inspiran mientras trabajo.',
        'titulo_actividad_reciente' => 'Lo que estoy escuchando',
        'descripcion_actividad_reciente' => 'Mi selección musical actual',
        'playlist_id' => '', // ID de playlist de Spotify (opcional)
        'artistas_favoritos' => [
            // Lista de tus artistas favoritos
        ],
        'canciones_favoritas' => [
            // Lista de tus canciones favoritas con enlaces de Spotify
        ]
    ],
    
    // Proyectos para mostrar en el portafolio y la página principal
    'proyectos' => [
        [
            'nombre' => 'Sistema de Webhooks',
            'descripcion' => 'Implementación de un sistema de contacto mediante webhooks para integración con múltiples servicios.',
            'imagen' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
            'enlace' => 'https://github.com/tu-usuario/cubenet'
        ],
        [
            'nombre' => 'Sitio Web Personal',
            'descripcion' => 'Diseño y desarrollo de un sitio web personal con modo oscuro y responsive design.',
            'imagen' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80',
            'enlace' => 'https://cubenet.fun'
        ],
        [
            'nombre' => 'API REST para gestión de tareas',
            'descripcion' => 'Desarrollo de una API REST para gestionar tareas y proyectos con autenticación JWT.',
            'imagen' => 'https://images.unsplash.com/photo-1484417894907-623942c8ee29?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1332&q=80',
            'enlace' => '#'
        ]
    ],
];
?>
