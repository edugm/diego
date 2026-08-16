<!DOCTYPE html>
<html lang="<?php echo $locale === 'en' ? 'en' : 'es'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo htmlspecialchars($t['site_description']); ?>">
    <meta name="keywords" content="movent, movimiento, fuerza, movilidad, atención corporal, energía, bienestar, Dénia">
    <meta name="author" content="Movent">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?php echo htmlspecialchars($t['site_title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($t['meta_description']); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
    <meta property="og:site_name" content="Movent">
    <meta property="og:image" content="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1200&q=80">
    <meta property="og:image:alt" content="Persona practicando movimiento y fuerza con enfoque corporal">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($t['site_title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($t['meta_description']); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <link rel="icon" type="image/svg+xml" href="/assets/favicon.svg">
    <title><?php echo htmlspecialchars($t['site_title']); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <?php
        $isDevelopment = isset($_SERVER['HTTP_HOST']) && in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1'], true);
        $cssHref = $isDevelopment ? '/assets/style.css' : '/assets/style.css?v=20260625';
    ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($cssHref); ?>">
    <link rel="stylesheet" href="/assets/vendor/flatpickr.min.css">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <a href="<?php echo $home_url; ?>">
                    <img src="/assets/images/logo-negro-texto.png" alt="Logo de la Empresa">
                </a>
            </div>
            <button class="nav-toggle" aria-label="Abrir menú">
                <span class="hamburger"></span>
            </button>
            <nav class="main-nav">
                <ul>
                    <li><a href="#clases"><?php echo $t['nav_classes']; ?></a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <li class="lang-switch">
                        <a class="lang-switch__btn <?php echo $locale === 'es' ? 'is-active' : ''; ?>" href="/" aria-label="Cambiar a español" title="Español">
                            <span class="lang-switch__flag lang-switch__flag--es" aria-hidden="true"></span>
                        </a>
                        <a class="lang-switch__btn <?php echo $locale === 'en' ? 'is-active' : ''; ?>" href="/en/" aria-label="Switch to English" title="English">
                            <span class="lang-switch__flag lang-switch__flag--en" aria-hidden="true"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
