<section class="section" style="padding-top: 150px;">
    <div class="container">
        <div class="grid grid-2" style="gap: 50px; align-items: center;">

            
            <div data-aos="fade-left">
                <h5 style="color: var(--primary); font-weight: 600; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 2px;">Sobre mí</h5>
                <h1 style="font-size: 2.5rem; margin-bottom: 25px;">
                    Hola, soy <span class="text-gradient"><?php echo $nombre; ?></span>
                </h1>
                
                <p style="color: var(--gray); margin-bottom: 20px; font-size: 1.1rem; line-height: 1.8;">
                    <?php echo $config['descripcion_detallada']; ?>
                </p>
                
                <p style="color: var(--gray); margin-bottom: 30px; font-size: 1.1rem; line-height: 1.8;">
                    Me encuentro especialmente interesado en <?php 
                        $intereses_nombres = array_map(function($item) { return $item['nombre']; }, array_slice($config['intereses']['items'], 0, 3));
                        echo implode(', ', $intereses_nombres); 
                    ?> y siempre estoy buscando ampliar mis conocimientos en estas áreas.
                </p>
                
                <div class="flex" style="gap: 30px; margin-bottom: 30px;">
                    <?php foreach (array_slice($estadisticas, 0, 2) as $stat): ?>
                    <div>
                        <h3 style="font-size: 1.8rem; margin-bottom: 5px;" class="text-gradient"><?php echo $stat['numero'] . $stat['simbolo']; ?></h3>
                        <p style="color: var(--gray);"><?php echo $stat['texto']; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <a href="/contact" class="btn btn-primary">Contáctame</a>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Habilidades -->
<section class="section" style="background-color: #f8fafc;">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Mis <span class="text-gradient">Habilidades</span></h2>
        <p class="section-description" data-aos="fade-up">Tecnologías y herramientas con las que trabajo</p>
        
        <div class="grid grid-2" style="gap: 40px;">
            <div data-aos="fade-right">
                <?php 
                $i = 0;
                $halfSkills = ceil(count($habilidades) / 2);
                foreach ($habilidades as $skill => $porcentaje): 
                    if ($i >= $halfSkills) continue;
                ?>
                <div style="margin-bottom: 30px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="font-weight: 500;"><?= $skill ?></span>
                        <span><?= $porcentaje ?>%</span>
                    </div>
                    <div style="height: 10px; background-color: #e5e7eb; border-radius: 5px; overflow: hidden;">
                        <div style="height: 100%; width: <?= $porcentaje ?>%; background: var(--gradient-1);"></div>
                    </div>
                </div>
                <?php 
                    $i++;
                endforeach; 
                ?>
            </div>
            
            <div data-aos="fade-left">
                <?php 
                $i = 0;
                foreach ($habilidades as $skill => $porcentaje): 
                    if ($i < $halfSkills) {
                        $i++;
                        continue;
                    }
                ?>
                <div style="margin-bottom: 30px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="font-weight: 500;"><?= $skill ?></span>
                        <span><?= $porcentaje ?>%</span>
                    </div>
                    <div style="height: 10px; background-color: #e5e7eb; border-radius: 5px; overflow: hidden;">
                        <div style="height: 100%; width: <?= $porcentaje ?>%; background: var(--gradient-2);"></div>
                    </div>
                </div>
                <?php 
                    $i++;
                endforeach; 
                ?>
                    </div>
                    <div style="height: 10px; background-color: #e5e7eb; border-radius: 5px; overflow: hidden;">
                        <div style="height: 100%; width: 70%; background: var(--gradient-2);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Educación y Experiencia -->
<section class="section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Mi <span class="text-gradient">Trayectoria</span></h2>
        <p class="section-description" data-aos="fade-up">Un vistazo a mi formación y experiencia laboral</p>
        
        <div class="grid grid-2" style="gap: 50px;">
            <!-- Educación -->
            <div data-aos="fade-right">
                <h3 style="margin-bottom: 30px;">Educación</h3>
                
                <div style="position: relative; padding-left: 30px; margin-bottom: 40px; border-left: 2px solid var(--primary);">
                    <div style="position: absolute; left: -10px; top: 0; width: 20px; height: 20px; border-radius: 50%; background: var(--primary);"></div>
                    <h4 style="margin-bottom: 10px;">Máster en Desarrollo Web</h4>
                    <p style="color: var(--gray); margin-bottom: 5px;">Universidad Tecnológica</p>
                    <p style="color: var(--gray); font-size: 0.9rem;">2018 - 2020</p>
                </div>
                
                <div style="position: relative; padding-left: 30px; margin-bottom: 40px; border-left: 2px solid var(--primary);">
                    <div style="position: absolute; left: -10px; top: 0; width: 20px; height: 20px; border-radius: 50%; background: var(--primary);"></div>
                    <h4 style="margin-bottom: 10px;">Grado en Ingeniería Informática</h4>
                    <p style="color: var(--gray); margin-bottom: 5px;">Universidad Politécnica</p>
                    <p style="color: var(--gray); font-size: 0.9rem;">2014 - 2018</p>
                </div>
                
                <div style="position: relative; padding-left: 30px; border-left: 2px solid var(--primary);">
                    <div style="position: absolute; left: -10px; top: 0; width: 20px; height: 20px; border-radius: 50%; background: var(--primary);"></div>
                    <h4 style="margin-bottom: 10px;">Certificación en Desarrollo Full Stack</h4>
                    <p style="color: var(--gray); margin-bottom: 5px;">Plataforma Online</p>
                    <p style="color: var(--gray); font-size: 0.9rem;">2017</p>
                </div>
            </div>
            
            <!-- Experiencia -->
            <div data-aos="fade-left">
                <h3 style="margin-bottom: 30px;">Experiencia</h3>
                
                <div style="position: relative; padding-left: 30px; margin-bottom: 40px; border-left: 2px solid var(--secondary);">
                    <div style="position: absolute; left: -10px; top: 0; width: 20px; height: 20px; border-radius: 50%; background: var(--secondary);"></div>
                    <h4 style="margin-bottom: 10px;">Estudiante de Educación Secundaria</h4>
                    <p style="color: var(--gray); margin-bottom: 5px;">Instituto Actual</p>
                    <p style="color: var(--gray); font-size: 0.9rem;">2023 - Presente</p>
                </div>
                
                <div style="position: relative; padding-left: 30px; margin-bottom: 40px; border-left: 2px solid var(--secondary);">
                    <div style="position: absolute; left: -10px; top: 0; width: 20px; height: 20px; border-radius: 50%; background: var(--secondary);"></div>
                    <h4 style="margin-bottom: 10px;">Curso de Desarrollo Web</h4>
                    <p style="color: var(--gray); margin-bottom: 5px;">Plataforma Online</p>
                    <p style="color: var(--gray); font-size: 0.9rem;">2023</p>
                </div>
                
                <div style="position: relative; padding-left: 30px; border-left: 2px solid var(--secondary);">
                    <div style="position: absolute; left: -10px; top: 0; width: 20px; height: 20px; border-radius: 50%; background: var(--secondary);"></div>
                    <h4 style="margin-bottom: 10px;">Primeros pasos en programación</h4>
                    <p style="color: var(--gray); margin-bottom: 5px;">Aprendizaje autodidacta</p>
                    <p style="color: var(--gray); font-size: 0.9rem;">2022</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Llamada a la acción -->
<section class="section" style="background: url('https://images.unsplash.com/photo-1542903660-eedba2cda473?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center/cover; position: relative; color: white;">
    <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.7);"></div>
    
    <div class="container" style="position: relative; z-index: 1; text-align: center;">
        <div style="max-width: 700px; margin: 0 auto;" data-aos="fade-up">
            <h2 style="font-size: 2.5rem; margin-bottom: 20px;">¿Quieres conectar conmigo?</h2>
            <p style="margin-bottom: 30px; font-size: 1.1rem; opacity: 0.9;">
                Si te interesan temas de programación, desarrollo web o simplemente quieres charlar, no dudes en contactarme.
            </p>
            <a href="/contact" class="btn btn-primary" style="padding: 15px 40px; font-size: 1.1rem;">Envíame un mensaje</a>
        </div>
    </div>
</section>
