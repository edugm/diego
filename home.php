<?php
$locale = isset($locale) ? $locale : 'es';
include __DIR__ . '/includes/locale.php';

$formStatus = null;
$formMessage = '';
$recipientEmail = 'paya.diego@gmail.com';

require_once __DIR__ . '/includes/phpmailer.php';

function sanitizeFormValue($value)
{
    return trim(strip_tags($value));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
    $secretKey = '6Lc830stAAAAALZRO8nb37va-4NRswrkqoeTXqJo';

    if (!$recaptchaResponse) {
        $formStatus = 'error';
        $formMessage = 'Completa el captcha antes de enviar el formulario.';
    } else {
        $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $data = http_build_query([
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
        ]);

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => $data,
                'timeout' => 10,
            ],
        ];

        $context = stream_context_create($options);
        $result = @file_get_contents($verifyUrl, false, $context);
        $response = $result ? json_decode($result, true) : null;

        if (!empty($response['success'])) {
            $name = sanitizeFormValue($_POST['name'] ?? '');
            $subject = sanitizeFormValue($_POST['subject'] ?? '');
            $phone = sanitizeFormValue($_POST['phone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $classDate = sanitizeFormValue($_POST['class_date'] ?? '');
            $classTime = sanitizeFormValue($_POST['class_time'] ?? '');

            $errors = [];

            if ($name === '') {
                $errors[] = 'El nombre es obligatorio.';
            }

            if ($subject === '') {
                $errors[] = 'El asunto es obligatorio.';
            }

            if ($phone === '') {
                $errors[] = 'El teléfono es obligatorio.';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Introduce un email válido.';
            }

            if ($classDate === '') {
                $errors[] = 'Selecciona un día para la clase.';
            }

            if ($classTime === '') {
                $errors[] = 'Selecciona una hora para la clase.';
            }

            if ($errors) {
                $formStatus = 'error';
                $formMessage = implode(' ', $errors);
            } else {
                $sendResult = sendContactEmail([
                    'subject' => $subject,
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'class_date' => $classDate,
                    'class_time' => $classTime,
                ]);

                if ($sendResult['success']) {
                    $formStatus = 'success';
                    $formMessage = $sendResult['message'];
                } else {
                    $formStatus = 'error';
                    $formMessage = $sendResult['message'];
                }
            }
        } else {
            $formStatus = 'error';
            $formMessage = 'Error en la verificación del captcha. Intenta de nuevo.';
        }
    }
}

include __DIR__ . '/includes/header.php';
?>

<main>
    <section class="hero">
        <div class="container hero-content">
            <p class="eyebrow"><?php echo $t['eyebrow_location']; ?></p>
            <h1 class="hero-title" aria-label="<?php echo htmlspecialchars($t['hero_title']); ?>">
                <span class="hero-title__rotator" aria-live="polite">
                    <span class="hero-title__word">Movimiento</span>
                    <span class="hero-title__word">Fuerza</span>
                    <span class="hero-title__word">Atención</span>
                </span>
                <span class="hero-title__suffix">para vivir con más energía</span>
            </h1>
            <p class="hero-strap"><?php echo str_replace('energía', '<span class="text-accent">energía</span>', $t['hero_strap']); ?></p>
            <div class="hero-actions">
                <a href="#contacto" class="btn hero-reserve-btn"><?php echo $t['hero_cta_primary']; ?></a>
                <a href="#clases" class="btn btn--ghost"><?php echo $t['hero_cta_secondary']; ?></a>
            </div>
        </div>
        <a href="#la-propuesta" class="hero-scroll" aria-label="Descubrir más abajo">
            <span class="hero-scroll__icon" aria-hidden="true">↓</span>
            <span class="hero-scroll__text">descubrir</span>
        </a>
    </section>

    <section id="capacidad-vital" class="section vital-capacity-section">
        <div class="container">
            <article class="vital-capacity-card">
                <div class="vital-capacity-card__content">
                    <h2><?php echo $t['vital_capacity_title']; ?></h2>
                    <p class="vital-capacity-card__lead"><?php echo $t['vital_capacity_intro']; ?></p>
                    <div class="vital-capacity-card__details">
                        <p class="vital-capacity-card__demands"><?php echo nl2br(htmlspecialchars(str_replace('\\n', "\n", $t['vital_capacity_demands']))); ?></p>
                        <div class="vital-capacity-card__copy">
                            <p><?php echo $t['vital_capacity_text_1']; ?></p>
                            <p><?php echo $t['vital_capacity_text_2']; ?></p>
                            <p><?php echo $t['vital_capacity_text_3']; ?></p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section id="la-propuesta" class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow"><?php echo $t['proposal_eyebrow']; ?></p>
                <h2><?php echo $t['proposal_intro']; ?></h2>
            </div>
            
            <div class="pillar-list">
                <article class="pillar-card">
                    <div class="pillar-card__content">
                        <div class="pillar-card__intro">
                            <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1600&q=85" alt="Entrenamiento de fuerza">
                            <h3><?php echo $t['proposal_card_1_title']; ?></h3>
                            <p class="pillar-card__lead"><?php echo $t['proposal_card_1_lead']; ?></p>
                        </div>
                        <div class="pillar-card__copy">
                            <p><?php echo $t['proposal_card_1_text_1']; ?></p>
                            <p><?php echo $t['proposal_card_1_text_2']; ?></p>
                            <p><?php echo $t['proposal_card_1_text_3']; ?></p>
                            <p><?php echo $t['proposal_card_1_text_4']; ?></p>
                        </div>
                    </div>
                </article>
                <article class="pillar-card">
                    <div class="pillar-card__content">
                        <div class="pillar-card__intro">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=1600&q=85" alt="Práctica de movilidad y control corporal">
                            <h3><?php echo $t['proposal_card_2_title']; ?></h3>
                            <p class="pillar-card__lead"><?php echo $t['proposal_card_2_lead']; ?></p>
                        </div>
                        <div class="pillar-card__copy">
                            <p><?php echo $t['proposal_card_2_text_1']; ?></p>
                            <p><?php echo $t['proposal_card_2_text_2']; ?></p>
                            <p><?php echo $t['proposal_card_2_text_3']; ?></p>
                            <p><?php echo $t['proposal_card_2_text_4']; ?></p>
                            <p><?php echo $t['proposal_card_2_text_5']; ?></p>
                        </div>
                    </div>
                </article>
                <article class="pillar-card">
                    <div class="pillar-card__content">
                        <div class="pillar-card__intro">
                            <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=1600&q=85" alt="Persona practicando atención corporal">
                            <h3><?php echo $t['proposal_card_3_title']; ?></h3>
                            <p class="pillar-card__lead"><?php echo $t['proposal_card_3_lead']; ?></p>
                        </div>
                        <div class="pillar-card__copy">
                            <p><?php echo $t['proposal_card_3_text_1']; ?></p>
                            <p class="pillar-card__perception"><?php echo nl2br(htmlspecialchars(str_replace('\\n', "\n", $t['proposal_card_3_text_2']))); ?></p>
                            <p><?php echo $t['proposal_card_3_text_3']; ?></p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

     <section id="clases" class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow"><?php echo $t['classes_eyebrow']; ?></p>
                <h2><?php echo $t['classes_title']; ?></h2>
            </div>
            <div class="class-pillar-list">
                <article class="class-pillar-card">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1600&q=85" alt="Clase de fuerza">
                    <div class="class-pillar-card__content">
                        <h3><?php echo $t['class_strength_title']; ?></h3>
                        <p class="class-pillar-card__lead"><?php echo $t['class_strength_lead']; ?></p>
                        <div class="class-pillar-card__copy">
                            <p><?php echo $t['class_strength_text_1']; ?></p>
                            <p><?php echo $t['class_strength_text_2']; ?></p>
                        </div>
                    </div>
                </article>
                <article class="class-pillar-card">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=1600&q=85" alt="Clase de movimiento">
                    <div class="class-pillar-card__content">
                        <h3><?php echo $t['class_move_title']; ?></h3>
                        <p class="class-pillar-card__lead"><?php echo $t['class_move_lead']; ?></p>
                        <div class="class-pillar-card__copy">
                            <p><?php echo $t['class_move_text_1']; ?></p>
                            <p><?php echo $t['class_move_text_2']; ?></p>
                            <p><?php echo $t['class_move_text_3']; ?></p>
                        </div>
                    </div>
                </article>
                <article class="class-pillar-card">
                    <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=1600&q=85" alt="Práctica de handstand">
                    <div class="class-pillar-card__content">
                        <h3><?php echo $t['class_handstand_title']; ?></h3>
                        <p class="class-pillar-card__lead"><?php echo $t['class_handstand_lead']; ?></p>
                        <div class="class-pillar-card__copy">
                            <p><?php echo $t['class_handstand_text_1']; ?></p>
                            <p><?php echo $t['class_handstand_text_2']; ?></p>
                            <p><?php echo $t['class_handstand_text_3']; ?></p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section id="respiracion" class="section breathing-section">
        <div class="container breathing-layout">
            <div class="breathing-copy">
                <h2><?php echo $t['breathing_title']; ?></h2>
                <p class="breathing-copy__lead"><?php echo $t['breathing_intro']; ?></p>
                <p><?php echo $t['breathing_text_1']; ?></p>
                <p><?php echo $t['breathing_text_2']; ?></p>
                <p><?php echo $t['breathing_text_3']; ?></p>
                <p><?php echo $t['breathing_text_4']; ?></p>
            </div>
            <div class="breathing-image">
                <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=1200&q=85" alt="Persona practicando respiración consciente">
            </div>
        </div>
    </section>

    <section id="conocerte" class="section process-section process-section--soft">
        <article class="intake-panel">
                <div class="intake-panel__header">
                    <h2><?php echo $t['intake_title']; ?></h2>
                    <p><?php echo $t['intake_intro']; ?></p>
                </div>
                <div class="intake-panel__context">
                    <p><?php echo $t['intake_context_label']; ?></p>
                    <div class="intake-panel__tags" aria-label="<?php echo $t['intake_context_label']; ?>">
                        <?php foreach ($t['intake_context_items'] as $item): ?>
                            <span><?php echo $item; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="intake-panel__footer">
                    <div>
                        <p><?php echo $t['intake_text_1']; ?></p>
                        <p class="intake-panel__question"><?php echo $t['intake_question_1']; ?></p>
                        <p><?php echo $t['intake_text_2']; ?></p>
                        <p class="intake-panel__question"><?php echo $t['intake_question_2']; ?></p>
                    </div>
                    <div>
                        <p><?php echo $t['intake_text_3']; ?></p>
                        <p><?php echo $t['intake_text_4']; ?></p>
                        <p><?php echo $t['intake_text_5']; ?></p>
                        <p><?php echo $t['intake_text_6']; ?></p>
                    </div>
                </div>
            </article>
    </section>

    <section id="respuesta" class="section response-section">
        <div class="container">
            <article class="response-panel">
                <div class="response-panel__header">
                    <h2><?php echo $t['response_title']; ?></h2>
                    <p><?php echo $t['response_intro']; ?></p>
                </div>
                <div class="response-panel__signals">
                    <p><?php echo $t['response_text_1']; ?></p>
                    <div class="response-panel__tags" aria-label="<?php echo $t['response_label']; ?>">
                        <?php foreach ($t['response_items'] as $item): ?>
                            <span><?php echo $item; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="response-panel__footer">
                    <p><?php echo $t['response_text_2']; ?></p>
                    <div>
                        <p><?php echo $t['response_text_3']; ?></p>
                        <p class="response-panel__question"><?php echo $t['response_question']; ?></p>
                        <p><?php echo $t['response_text_4']; ?></p>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section id="atencion-real" class="section response-section response-section--soft">
        <div class="container">
            <article class="response-panel">
                <div class="response-panel__header">
                    <h2><?php echo $t['attention_title']; ?></h2>
                    <p><?php echo $t['attention_intro']; ?></p>
                </div>
                <div class="response-panel__signals">
                    <p><?php echo $t['attention_label']; ?></p>
                    <div class="response-panel__tags" aria-label="<?php echo $t['attention_label']; ?>">
                        <?php foreach ($t['attention_items'] as $item): ?>
                            <span><?php echo $item; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="response-panel__footer">
                    <p><?php echo $t['attention_text_1']; ?></p>
                    <p><?php echo $t['attention_text_2']; ?></p>
                </div>
            </article>
        </div>
    </section>

    <section id="eventos" class="section response-section response-section--dark">
        <div class="container">
            <article class="response-panel response-panel--dark">
                <div class="response-panel__header">
                    <h2><?php echo $t['events_title']; ?></h2>
                    <p><?php echo $t['events_intro']; ?></p>
                    <p class="response-panel__context"><?php echo $t['events_label']; ?></p>
                </div>
                <div class="response-panel__signals">
                    <div class="response-panel__tags" aria-label="<?php echo $t['events_label']; ?>">
                        <?php foreach ($t['events_items'] as $item): ?>
                            <span><?php echo $item; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section id="longevidad" class="section response-section">
        <div class="container">
            <article class="response-panel">
                <div class="response-panel__header">
                    <h2><?php echo $t['longevity_title']; ?></h2>
                    <p><?php echo $t['longevity_intro']; ?></p>
                </div>
                <div class="response-panel__signals">
                    <p><?php echo $t['longevity_label']; ?></p>
                    <div class="response-panel__tags" aria-label="<?php echo $t['longevity_label']; ?>">
                        <?php foreach ($t['longevity_items'] as $item): ?>
                            <span><?php echo $item; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="response-panel__footer">
                    <p><?php echo $t['longevity_text_1']; ?></p>
                    <p><?php echo $t['longevity_text_2']; ?></p>
                </div>
            </article>
        </div>
    </section>

    <!-- <section id="cierre" class="section cta-section">
        <div class="container cta-box">
            <h2><?php echo $t['cta_title']; ?></h2>
            <p><?php echo $t['cta_text']; ?></p>
            <a href="mailto:paya.diego@gmail.com" class="btn btn--dark"><?php echo $t['cta_button']; ?></a>
        </div>
    </section> -->
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
