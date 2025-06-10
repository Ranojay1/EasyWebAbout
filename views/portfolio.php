<?php
/**
 * Portfolio Page
 * This page showcases the projects listed in the configuration file.
 */

$config = include '../config.php';
$proyectos = $config['proyectos'];
?>

<section class="section" style="padding-top: 150px;">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Mi <span class="text-gradient">Portafolio</span></h2>
        <p class="section-description" data-aos="fade-up">Proyectos destacados que he desarrollado</p>

        <div class="grid grid-3" style="gap: 30px;">
            <?php foreach ($proyectos as $proyecto): ?>
            <div class="card" data-aos="fade-up">
                <img src="<?= $proyecto['imagen'] ?>" alt="<?= $proyecto['nombre'] ?>" style="width: 100%; border-radius: 10px;">
                <div class="card-content" style="padding: 15px;">
                    <h3 style="margin-bottom: 10px; font-size: 1.5rem; color: var(--primary);">
                        <?= $proyecto['nombre'] ?>
                    </h3>
                    <p style="color: var(--gray); margin-bottom: 15px; font-size: 1rem; line-height: 1.6;">
                        <?= $proyecto['descripcion'] ?>
                    </p>
                    <div style="display: flex; gap: 10px;">
                        <a href="<?= $proyecto['enlace'] ?>" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.9rem;">Ver Proyecto</a>
                        <a href="<?= $proyecto['github'] ?>" class="btn btn-secondary" style="padding: 10px 20px; font-size: 0.9rem;">GitHub</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
