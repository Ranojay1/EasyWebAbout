<section class="section" style="padding-top: 150px;">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Ponte en <span class="text-gradient">Contacto</span></h2>
        <p class="section-description" data-aos="fade-up">¿Tienes alguna pregunta o quieres charlar sobre programación? Me encantaría escucharte.</p>
        
        <div class="grid grid-2" style="gap: 50px;">
            <!-- Información de contacto -->
            <div data-aos="fade-right">
                <div class="card">
                    <div class="card-body">
                        <h3 style="margin-bottom: 30px;">Información de contacto</h3>
                        
                        <div style="display: flex; margin-bottom: 25px; gap: 15px;">
                            <div style="background: var(--gradient-1); min-width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-envelope" style="color: white; font-size: 20px;"></i>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 5px;">Email</h4>
                                <a href="mailto:contacto@cubenet.fun" style="color: var(--gray); text-decoration: none;">contacto@cubenet.fun</a>
                            </div>
                        </div>
                        
                        <div style="display: flex; margin-bottom: 25px; gap: 15px;">
                            <div style="background: var(--gradient-2); min-width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-map-marker-alt" style="color: white; font-size: 20px;"></i>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 5px;">Ubicación</h4>
                                <p style="color: var(--gray);">Madrid, España</p>
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
                            <a href="<?php echo $instagram; ?>" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 50%; color: var(--dark); text-decoration: none; transition: all 0.3s;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" title="<?php echo $discord; ?>" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 50%; color: var(--dark); text-decoration: none; transition: all 0.3s;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 50%; color: var(--dark); text-decoration: none; transition: all 0.3s;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" title="<?php echo $discord; ?>" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #f1f5f9; border-radius: 50%; color: var(--dark); text-decoration: none; transition: all 0.3s;">
                                <i class="fab fa-discord"></i>
                            </a>
                        </div>
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

