<section class="section hero-section" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7)), url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80') no-repeat center/cover fixed;">
    <div class="container">
        <div style="max-width: 800px;" data-aos="fade-up">
            <h1 style="font-size: 3.5rem; margin-bottom: 20px;">
                Bienvenido, Soy <span class="text-gradient" style="display: inline-block;"><?php echo $nombre; ?></span>
            </h1>
            <p style="font-size: 1.2rem; color: var(--gray); margin-bottom: 40px;">
                <?php echo $config['descripcion_breve']; ?>
            </p>
            <div class="flex" style="gap: 15px; margin-bottom: 40px;">
                <a href="/about" class="btn btn-primary">Conoce más sobre mí</a>
                <a href="/contact" class="btn btn-outline">Contacta conmigo</a>
            </div>

            <div class="flex" style="gap: 20px;">
                <a href="<?php echo $instagram; ?>" style="color: var(--dark); font-size: 24px;"><i class="fab fa-instagram"></i></a>
                <a href="#" title="<?php echo $discord; ?>" style="color: var(--dark); font-size: 24px;"><i class="fab fa-discord"></i></a>
                <?php if (!empty($social['github'])): ?>
                <a href="<?php echo $social['github']; ?>" style="color: var(--dark); font-size: 24px;"><i class="fab fa-github"></i></a>
                <?php endif; ?>
                <?php if (!empty($social['spotify'])): ?>
                <a href="<?php echo $social['spotify']; ?>" style="color: var(--dark); font-size: 24px;"><i class="fab fa-spotify"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Sección Estadísticas -->
<section class="section" style="background-color: #f8fafc; padding: 80px 0;">
    <div class="container">
        <div class="grid grid-3" data-aos="fade-up">
            <?php foreach ($estadisticas as $stat): ?>
            <div class="card text-center">
                <div class="card-body">
                    <h3 style="font-size: 3rem; margin-bottom: 10px;">
                        <span class="text-gradient" style="display: inline-block;"><?php echo $stat['numero'] . $stat['simbolo']; ?></span>
                    </h3>
                    <p style="color: var(--gray);"><?php echo $stat['texto']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            
            <!-- Estadística adicional (quitada duplicación de edad) -->
        </div>
    </div>
</section>

<!-- Sección de Intereses -->
<section class="section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up"><?php echo $config['intereses']['titulo_seccion']; ?></h2>
        <p class="section-description" data-aos="fade-up"><?php echo $config['intereses']['descripcion']; ?></p>
        
        <div class="grid grid-3" style="gap: 40px;">
            <?php
            $gradients = ['gradient-1', 'gradient-2', 'gradient-3'];
            $i = 0;
            
            foreach ($config['intereses']['items'] as $index => $interes):
                $gradient = $gradients[$i % count($gradients)];
                $i++;
            ?>
            <div class="card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="card-body">
                    <div style="background: var(--<?= $gradient ?>); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 25px;">
                        <i class="fas <?= $interes['icono'] ?>" style="color: white; font-size: 24px;"></i>
                    </div>
                    <h3 class="card-title"><?= $interes['nombre'] ?></h3>
                    <p class="card-text">
                        <?= $interes['descripcion'] ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Sección de Proyectos -->
<section class="section" style="background-color: #f8fafc;">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Mis <span class="text-gradient">Proyectos</span></h2>
        <p class="section-description" data-aos="fade-up">Algunos de mis trabajos y proyectos personales</p>
        
        <div class="grid grid-3" style="gap: 30px;">
            <?php foreach ($proyectos as $index => $proyecto): ?>
            <div class="card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <img src="<?= $proyecto['imagen'] ?>" alt="<?= $proyecto['nombre'] ?>" style="width: 100%; border-radius: 10px 10px 0 0; height: 200px; object-fit: cover;">
                <div class="card-body" style="padding: 20px;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 10px;"><?= $proyecto['nombre'] ?></h3>
                    <p style="color: var(--gray); margin-bottom: 15px; font-size: 0.95rem;"><?= $proyecto['descripcion'] ?></p>
                    <a href="<?= $proyecto['enlace'] ?>" style="color: var(--primary); text-decoration: none; display: flex; align-items: center; gap: 5px; font-weight: 500;">
                        Ver proyecto <i class="fas fa-external-link-alt" style="font-size: 12px;"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Llamada a la acción -->
<section class="section" style="background: linear-gradient(135deg, #4f46e5, #10b981); color: white; padding: 80px 0;">
    <div class="container" data-aos="fade-up">
        <div style="max-width: 700px; margin: 0 auto; text-align: center;">
            <h2 style="font-size: 2.5rem; margin-bottom: 20px;">¿Quieres conectar conmigo?</h2>
            <p style="font-size: 1.1rem; margin-bottom: 30px; opacity: 0.9;">Me encantaría hablar sobre programación, videojuegos o cualquier tema relacionado con tecnología.</p>
            <a href="/contact" class="btn" style="background: white; color: var(--primary); font-weight: 600; padding: 15px 30px; font-size: 1.1rem;">Contáctame</a>
        </div>
    </div>
</section>
