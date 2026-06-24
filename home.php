<?php
$locale = isset($locale) ? $locale : 'es';
include __DIR__ . '/includes/locale.php';
include __DIR__ . '/includes/header.php';
?>

<main>
    <section class="hero">
        <div class="container hero-content">
            <p class="eyebrow"><?php echo $t['eyebrow_location']; ?></p>
            <h1><?php echo $t['hero_title']; ?></h1>
            <p class="hero-copy"><?php echo $t['hero_copy']; ?></p>
            <p class="hero-strap"><?php echo str_replace('energía', '<span class="text-accent">energía</span>', $t['hero_strap']); ?></p>
            <div class="hero-actions">
                <a href="#el-problema" class="btn"><?php echo $t['hero_cta_primary']; ?></a>
                <a href="#clases" class="btn btn--ghost"><?php echo $t['hero_cta_secondary']; ?></a>
            </div>
            <div class="hero-highlights">
                <div class="hero-highlight">
                    <strong><?php echo $t['highlight_one_title']; ?></strong>
                    <span><?php echo $t['highlight_one_text']; ?></span>
                </div>
                <div class="hero-highlight">
                    <strong><?php echo $t['highlight_two_title']; ?></strong>
                    <span><?php echo $t['highlight_two_text']; ?></span>
                </div>
            </div>
        </div>
    </section>

    <section id="el-problema" class="section section-alt">
        <div class="container split-layout">
            <div class="section-copy">
                <p class="eyebrow"><?php echo $t['problem_eyebrow']; ?></p>
                <h2><?php echo $t['problem_title']; ?></h2>
                <p><span class="text-accent"><?php echo $t['problem_intro']; ?></span></p>
                <p><?php echo $t['problem_text_1']; ?></p>
                <p><?php echo $t['problem_text_2']; ?></p>
                <p><?php echo $t['problem_text_3']; ?></p>
                <p><?php echo $t['problem_text_4']; ?></p>
                <ul class="pill-grid">
                    <li class="pill"><?php echo $t['pill_noise']; ?></li>
                    <li class="pill"><?php echo $t['pill_sedentary']; ?></li>
                    <li class="pill"><?php echo $t['pill_fatigue']; ?></li>
                    <li class="pill"><?php echo $t['pill_tension']; ?></li>
                </ul>
            </div>
            <div class="image-card">
                <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=900&q=80" alt="Persona practicando movilidad y fuerza">
            </div>
        </div>
    </section>

    <section id="la-propuesta" class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow"><?php echo $t['proposal_eyebrow']; ?></p>
                <h2><?php echo $t['proposal_title_1']; ?></h2>
                <h2><?php echo $t['proposal_title_2']; ?></h2>
            </div>
            <p><span class="text-accent"><?php echo $t['proposal_intro']; ?></span></p>
            <p><?php echo $t['proposal_text_1']; ?></p>
            <p><?php echo $t['proposal_text_2']; ?></p>
            <p><?php echo $t['proposal_text_3']; ?></p>
            <div class="feature-grid">
                <article class="feature-card">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1000&q=80" alt="Práctica de movilidad y control corporal">
                    <div class="card-body">
                        <h3><?php echo $t['proposal_card_1_title']; ?></h3>
                        <p><?php echo $t['proposal_card_1_text']; ?></p>
                    </div>
                </article>
                <article class="feature-card">
                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=1000&q=80" alt="Persona en una práctica consciente de movimiento">
                    <div class="card-body">
                        <h3><?php echo $t['proposal_card_2_title']; ?></h3>
                        <p><?php echo $t['proposal_card_2_text']; ?></p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section id="beneficios" class="section section-alt">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow"><?php echo $t['benefits_eyebrow']; ?></p>
                <h2><?php echo $t['benefits_title']; ?></h2>
            </div>
            <div class="benefits-panel">
                <div class="benefits-visual">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1000&q=80" alt="Persona trabajando movilidad y respiración en un entorno sereno">
                </div>
                <div class="benefits-list">
                    <div class="benefits-list__line" aria-live="polite">
                        <span class="benefit-prefix"><?php echo $t['benefits_prefix']; ?></span>
                        <span class="benefit-current"><?php echo $t['benefits_current']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="clases" class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow"><?php echo $t['classes_eyebrow']; ?></p>
                <h2><?php echo $t['classes_title']; ?></h2>
            </div>
            <div class="class-grid">
                <article class="class-card">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1000&q=80" alt="Clase de fuerza">
                    <div class="card-body">
                        <h3><?php echo $t['class_strength_title']; ?></h3>
                        <p><?php echo $t['class_strength_text']; ?></p>
                    </div>
                </article>
                <article class="class-card">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=1000&q=80" alt="Clase de movimiento">
                    <div class="card-body">
                        <h3><?php echo $t['class_move_title']; ?></h3>
                        <p><?php echo $t['class_move_text']; ?></p>
                    </div>
                </article>
                <article class="class-card">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1000&q=80" alt="Práctica de handstand">
                    <div class="card-body">
                        <h3><?php echo $t['class_handstand_title']; ?></h3>
                        <p><?php echo $t['class_handstand_text']; ?></p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section id="para-quien" class="section section-alt">
        <div class="container split-layout reverse">
            <div class="image-card">
                <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=900&q=80" alt="Persona entrenando con enfoque">
            </div>
            <div class="section-copy">
                <p class="eyebrow"><?php echo $t['audience_eyebrow']; ?></p>
                <h2><?php echo $t['audience_title']; ?></h2>
                <ul class="check-list">
                    <li><?php echo $t['audience_item_1']; ?></li>
                    <li><?php echo $t['audience_item_2']; ?></li>
                    <li><?php echo $t['audience_item_3']; ?></li>
                    <li><?php echo $t['audience_item_4']; ?></li>
                </ul>
            </div>
        </div>
    </section>

    <section id="filosofia" class="section">
        <div class="container philosophy-block">
            <div class="philosophy-copy">
                <p class="eyebrow"><?php echo $t['philosophy_eyebrow']; ?></p>
                <h2><?php echo $t['philosophy_title']; ?></h2>
                <p><span class="text-accent"><?php echo $t['philosophy_text']; ?></span></p>
            </div>
            <div class="quote-card">
                <p>“<?php echo $t['quote_text']; ?>”</p>
            </div>
        </div>
    </section>

    <section id="cierre" class="section cta-section">
        <div class="container cta-box">
            <h2><?php echo $t['cta_title']; ?></h2>
            <p><?php echo $t['cta_text']; ?></p>
            <a href="mailto:paya.diego@gmail.com" class="btn btn--dark"><?php echo $t['cta_button']; ?></a>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
