<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-info">
                <a href="/" class="logo footer-logo">
                    <div class="logo-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <span class="logo-text">CubeNet</span>
                </a>
                <p class="footer-description">
                    Estudiante de 15 años apasionado por la programación y el desarrollo web.
                </p>
                <div class="social-links">
                    <a href="<?php echo $instagram; ?>" aria-label="Instagram" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" title="<?php echo $discord; ?>" aria-label="Discord" class="social-link">
                        <i class="fab fa-discord"></i>
                    </a>
                </div>
            </div>
            
            <div class="footer-links">
                <h3 class="footer-title">Enlaces rápidos</h3>
                <ul class="footer-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/about">Sobre mí</a></li>
                    <li><a href="/services">Servicios</a></li>
                    <li><a href="/portfolio">Portfolio</a></li>
                    <li><a href="/contact">Contacto</a></li>
                </ul>
            </div>
            
            <div class="footer-contact">
                <h3 class="footer-title">Contacto</h3>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:contacto@cubenet.fun">contacto@cubenet.fun</a>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>España</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Estudiante</span>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?> CubeNet. Todos los derechos reservados.</p>
            <p>Diseñado y desarrollado con <i class="fas fa-heart" style="color: #f43f5e;"></i></p>
        </div>
    </div>
</footer>

<!-- Scripts Principales - Sección única y consolidada -->
<?php if ($sitio['animaciones']): ?>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php endif; ?>

<!-- Archivos JavaScript principales -->
<script src="/includes/scripts.js"></script>
<script src="/includes/test.js"></script>

<!-- Controles UI -->
<?php if ($sitio['mostrar_scroll_top']): ?>
<!-- Botón volver arriba -->
<button id="scroll-top-btn" class="scroll-top-btn" aria-label="Volver arriba">
    <i class="fas fa-chevron-up"></i>
</button>
<?php endif; ?>

<?php if ($sitio['modo_oscuro']): ?>
<!-- Toggle de modo oscuro -->
<button id="dark-mode-toggle" class="dark-mode-toggle" aria-label="Cambiar tema">
    <i class="fas fa-moon"></i>
    <i class="fas fa-sun"></i>
</button>
<?php endif; ?>
</body>
</html>
