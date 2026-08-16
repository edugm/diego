    <section id="contacto" class="section section-alt contact-section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Contacto</p>
            </div>
            <div class="contact-panel">
                <?php if (!empty($formStatus)): ?>
                    <div class="form-message form-message--<?php echo $formStatus; ?>">
                        <?php echo htmlspecialchars($formMessage); ?>
                    </div>
                <?php endif; ?>
                <form class="contact-form" method="post" action="#">
                    <div class="form-grid">
                        <div class="form-field">
                            <label for="footer-subject">Asunto</label>
                            <input id="footer-subject" name="subject" type="text" placeholder="Asunto" required>
                        </div>
                        <div class="form-field">
                            <label for="footer-name">Nombre</label>
                            <input id="footer-name" name="name" type="text" placeholder="Nombre" required>
                        </div>
                        <div class="form-field">
                            <label for="footer-phone">Teléfono</label>
                            <input id="footer-phone" name="phone" type="tel" placeholder="Teléfono" required>
                        </div>
                        <div class="form-field">
                            <label for="footer-email">Email</label>
                            <input id="footer-email" name="email" type="email" placeholder="Email" required>
                        </div>
                        <div class="form-field">
                            <label for="footer-date">Día de la clase</label>
                            <input id="footer-date" name="class_date" type="text" placeholder="Selecciona un día" required>
                        </div>
                        <div class="form-field">
                            <label for="footer-time">Hora de la clase</label>
                            <select id="footer-time" name="class_time" required>
                                <option value="">Selecciona una hora</option>
                                <option value="08:00">8:00</option>
                                <option value="09:30">9:30</option>
                                <option value="11:00">11:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:30">17:30h</option>
                            </select>
                        </div>
                        <div class="form-field form-field--wide">
                            <div class="g-recaptcha" data-sitekey="6Lc830stAAAAAPC8fFqvCl9ADkYfcinc5SIpj2x1" data-callback="onCaptchaSuccess" data-expired-callback="onCaptchaExpired"></div>
                        </div>
                    </div>
                    <button type="submit" disabled>Enviar</button>
                </form>
            </div>
        </div>
    </section>
    <footer class="main-footer">
        <div class="container footer-grid">
            <div>
                <h3><?php echo $t['footer_title']; ?></h3>
                <p><?php echo $t['footer_tagline']; ?></p>
            </div>
            <div>
                <p><a href="mailto:paya.diego@gmail.com">paya.diego@gmail.com</a></p>
                <p><a href="https://www.instagram.com/" target="_blank" rel="noopener">Instagram</a></p>
            </div>
            <div>
                <p><?php echo $t['footer_place']; ?></p>
                <p><?php echo $t['footer_reservas']; ?></p>
            </div>
        </div>
    </footer>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="/assets/vendor/flatpickr.min.js" defer></script>
    <?php
        $isDevelopment = isset($_SERVER['HTTP_HOST']) && in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1'], true);
        $jsSrc = $isDevelopment ? '/assets/main.js' : '/assets/main.js?v=20260720';
    ?>
    <script src="<?php echo htmlspecialchars($jsSrc); ?>" defer></script>
</body>
</html>
