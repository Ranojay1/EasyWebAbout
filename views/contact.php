<section class="section" style="padding-top: 150px;">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up"><?php echo $config['textos']['contacto_titulo']; ?> <span class="text-gradient"></span></h2>
        <p class="section-description" data-aos="fade-up"><?php echo $config['textos']['contacto_subtitulo']; ?></p>
        
        <!-- Mensajes de éxito/error -->
        <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
        <div style="background: #d1fae5; border: 1px solid #10b981; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 30px; text-align: center;">
            <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
            <?php echo $config['textos']['mensaje_enviado']; ?>
        </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
        <div style="background: #fee2e2; border: 1px solid #ef4444; color: #991b1b; padding: 15px; border-radius: 8px; margin-bottom: 30px; text-align: center;">
            <i class="fas fa-exclamation-triangle" style="margin-right: 8px;"></i>
            <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
        <?php endif; ?>
        
        <div class="grid grid-2" style="gap: 50px;">
            <!-- Información de contacto -->
            <div data-aos="fade-right">
                <div class="card">
                    <div class="card-body">
                        <h3 style="margin-bottom: 30px;">Información de contacto</h3>
                        
                        <div style="display: flex; margin-bottom: 25px; gap: 15px;">
                            <div style="background: var(--gradient-1); min-width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-globe" style="color: white; font-size: 20px;"></i>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 5px;">Website</h4>
                                <span style="color: var(--gray);"><?php echo $_SERVER['HTTP_HOST']; ?></span>
                            </div>
                        </div>
                        
                        <div style="display: flex; margin-bottom: 25px; gap: 15px;">
                            <div style="background: var(--gradient-2); min-width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-map-marker-alt" style="color: white; font-size: 20px;"></i>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 5px;">Ubicación</h4>
                                <p style="color: var(--gray);"><?php echo $config['contacto']['ubicacion_mapa']; ?></p>
                            </div>
                        </div>
                        
                        <div style="display: flex; margin-bottom: 30px; gap: 15px;">
                            <div style="background: var(--gradient-3); min-width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-globe" style="color: white; font-size: 20px;"></i>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 5px;">Sitio web</h4>
                                <a href="https://cubenet.fun" style="color: var(--gray); text-decoration: none;">https://cubenet.fun</a>
                            </div>
                        </div>
                        
                        <h4 style="margin-bottom: 15px;">Sígueme en redes sociales</h4>
                        <div style="display: flex; gap: 15px;">
                            <?php if (!empty($config['social']['instagram'])): ?>
                            <a href="<?php echo $config['social']['instagram']; ?>" target="_blank" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 50%; color: var(--dark); text-decoration: none; transition: all 0.3s;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <?php endif; ?>
                            
                            <?php if (!empty($config['social']['discord'])): ?>
                            <a href="#" title="Discord: <?php echo $config['social']['discord']; ?>" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 50%; color: var(--dark); text-decoration: none; transition: all 0.3s;">
                                <i class="fab fa-discord"></i>
                            </a>
                            <?php endif; ?>
                            
                            <?php if (!empty($config['social']['github'])): ?>
                            <a href="<?php echo $config['social']['github']; ?>" target="_blank" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 50%; color: var(--dark); text-decoration: none; transition: all 0.3s;">
                                <i class="fab fa-github"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Formulario de contacto -->
            <div data-aos="fade-left">
                <div class="card">
                    <div class="card-body">
                        <h3 style="margin-bottom: 30px;"><?php echo $config['textos']['cta_boton']; ?></h3>
                        <p style="margin-bottom: 25px; color: var(--gray);"><?php echo $config['contacto']['texto_contacto']; ?></p>
                        
                        <form action="/send-message.php" method="POST" id="contactForm">
                            <div style="margin-bottom: 20px;">
                                <label for="name" style="display: block; margin-bottom: 8px; font-weight: 500;"><?php echo $config['textos']['form_nombre']; ?></label>
                                <input type="text" id="name" name="name" required 
                                       placeholder="<?php echo $config['textos']['form_placeholder_nombre']; ?>"
                                       style="width: 100%; padding: 12px 15px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                            </div>
                            
                            <div style="margin-bottom: 20px;">
                                <label for="email" style="display: block; margin-bottom: 8px; font-weight: 500;"><?php echo $config['textos']['form_email']; ?></label>
                                <input type="email" id="email" name="email" required 
                                       placeholder="<?php echo $config['textos']['form_placeholder_email']; ?>"
                                       style="width: 100%; padding: 12px 15px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                            </div>
                            
                            <div style="margin-bottom: 20px;">
                                <label for="subject" style="display: block; margin-bottom: 8px; font-weight: 500;"><?php echo $config['textos']['form_asunto']; ?></label>
                                <input type="text" id="subject" name="subject" required 
                                       placeholder="<?php echo $config['textos']['form_placeholder_asunto']; ?>"
                                       style="width: 100%; padding: 12px 15px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                            </div>
                            
                            <div style="margin-bottom: 30px;">
                                <label for="message" style="display: block; margin-bottom: 8px; font-weight: 500;"><?php echo $config['textos']['form_mensaje']; ?></label>
                                <textarea id="message" name="message" rows="5" required 
                                          placeholder="<?php echo $config['textos']['form_placeholder_mensaje']; ?>"
                                          style="width: 100%; padding: 12px 15px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem; resize: vertical;"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                                <?php echo $config['textos']['form_enviar']; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                                <i class="fab fa-instagram"></i>
                            </a>
                            <?php if (!empty($discord)): ?>
                                <?php if (filter_var($discord, FILTER_VALIDATE_URL)): ?>
                                <!-- Si es una URL completa -->
                                <a href="<?php echo $discord; ?>" target="_blank" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 50%; color: var(--dark); text-decoration: none; transition: all 0.3s;">
                                    <i class="fab fa-discord"></i>
                                </a>
                                <?php else: ?>
                                <!-- Si es un ID o nombre de usuario -->
                                <a href="#" onclick="copyDiscord('<?php echo htmlspecialchars($discord, ENT_QUOTES); ?>')" title="Click para copiar: <?php echo htmlspecialchars($discord, ENT_QUOTES); ?>" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 50%; color: var(--dark); text-decoration: none; transition: all 0.3s; cursor: pointer;">
                                    <i class="fab fa-discord"></i>
                                </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <!-- Discord tooltip para confirmación de copia -->
                        <span id="discord-tooltip" style="display:none; position:absolute; background: rgba(0,0,0,0.7); color:white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">ID copiado!</span>
                    </div>
                </div>
            </div>
            
            <!-- Formulario de contacto -->
            <div data-aos="fade-left">
                <div class="card">
                    <div class="card-body">
                        <h3 style="margin-bottom: 30px;">Envíame un mensaje</h3>
                        
                        <form action="/send-message" method="POST">
                            <div style="margin-bottom: 20px;">
                                <label for="name" style="display: block; margin-bottom: 8px; font-weight: 500;">Nombre completo</label>
                                <input type="text" id="name" name="name" required style="width: 100%; padding: 12px 15px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                            </div>
                            
                            <div style="margin-bottom: 20px;">
                                <label for="email" style="display: block; margin-bottom: 8px; font-weight: 500;">Correo electrónico</label>
                                <input type="email" id="email" name="email" required style="width: 100%; padding: 12px 15px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                            </div>
                            
                            <div style="margin-bottom: 20px;">
                                <label for="subject" style="display: block; margin-bottom: 8px; font-weight: 500;">Asunto</label>
                                <input type="text" id="subject" name="subject" required style="width: 100%; padding: 12px 15px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                            </div>
                            
                            <div style="margin-bottom: 30px;">
                                <label for="message" style="display: block; margin-bottom: 8px; font-weight: 500;">Mensaje</label>
                                <textarea id="message" name="message" rows="5" required style="width: 100%; padding: 12px 15px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem; resize: vertical;"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Enviar mensaje</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

