<?php
// Verificar si la sección de música está activada
if (!$config['musica']['mostrar_seccion']) {
    header("Location: /");
    exit;
}
?>

<section class="section" style="padding-top: 150px;">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Mi <span class="text-gradient">Música Favorita</span></h2>
        <p class="section-description" data-aos="fade-up"><?php echo $config['musica']['descripcion']; ?></p>
        
        <!-- Spotify Playlist Embed -->
        <div class="music-container" data-aos="fade-up">
            <div class="spotify-embed">

            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/<?php echo $config['musica']['playlist_id']; ?>" 
            width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
            loading="lazy"></iframe>

            </div>
        </div>

        <!-- Artistas Favoritos -->
        <div class="artists-section" data-aos="fade-up">
            <h3 class="subsection-title">Artistas Favoritos</h3>
            <div class="tags-container">
                <?php foreach ($config['musica']['artistas_favoritos'] as $artista): ?>
                <div class="tag">
                    <i class="fas fa-music"></i> <?php echo $artista; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Canciones Favoritas -->
        <h3 class="subsection-title" data-aos="fade-up">Top Canciones</h3>
        <div class="grid grid-3" style="gap: 30px;" data-aos="fade-up">
            <?php foreach ($config['musica']['canciones_favoritas'] as $cancion): ?>
            <div class="card">
                <div class="card-body">
                    <div class="song-info">
                        <h4><?php echo $cancion['nombre']; ?></h4>
                        <p><?php echo $cancion['artista']; ?></p>
                    </div>
                    <a href="<?php echo $cancion['url']; ?>" target="_blank" class="btn btn-sm btn-spotify">
                        <i class="fab fa-spotify"></i> Escuchar
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php if (isset($config['musica']['mostrar_actividad_reciente']) && $config['musica']['mostrar_actividad_reciente']): ?>
        <!-- Recomendaciones actuales -->
        <div class="current-listening" data-aos="fade-up">
            <h3 class="subsection-title"><?php echo isset($config['musica']['titulo_actividad_reciente']) ? $config['musica']['titulo_actividad_reciente'] : 'Mi selección actual'; ?></h3>
            <div class="spotify-now-playing">
                <!-- Mostrar los top tracks de Spotify -->
                <iframe style="border-radius:12px" 
                       src="https://open.spotify.com/embed/playlist/<?php echo $config['musica']['playlist_id']; ?>?utm_source=generator" 
                       width="100%" 
                       height="152" 
                       frameBorder="0" 
                       allowfullscreen="" 
                       allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                       loading="lazy"></iframe>
                <p class="mt-10" style="font-style: italic; color: var(--gray); margin-top: 10px; font-size: 0.9rem;">
                    * <?php echo isset($config['musica']['descripcion_actividad_reciente']) ? $config['musica']['descripcion_actividad_reciente'] : 'Esta es una selección de canciones que representan lo que estoy escuchando últimamente'; ?>
                </p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .music-container {
        margin: 40px 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }
    
    .spotify-embed {
        border-radius: 20px;
        overflow: hidden;
    }
    
    .artists-section {
        margin: 50px 0 30px;
    }
    
    .subsection-title {
        font-size: 1.8rem;
        margin-bottom: 20px;
        color: var(--dark);
    }
    
    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 30px;
    }
    
    .tag {
        background-color: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid var(--gray-light);
        border-radius: 50px;
        padding: 8px 16px;
        font-size: 0.9rem;
        color: var(--dark);
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
    }
    
    .tag:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }
    
    .song-info {
        margin-bottom: 15px;
    }
    
    .song-info h4 {
        margin-bottom: 5px;
        font-size: 1.1rem;
    }
    
    .song-info p {
        color: var(--gray);
        font-size: 0.9rem;
    }
    
    .btn-spotify {
        background-color: #1DB954;
        color: white;
        border: none;
    }
    
    .btn-spotify:hover {
        background-color: #1aa34a;
    }
    
    .current-listening {
        margin-top: 50px;
        margin-bottom: 30px;
    }
    
    .spotify-now-playing {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
    }
    
    .mt-10 {
        margin-top: 10px;
    }
</style>
