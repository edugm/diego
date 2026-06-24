<?php
$locale = isset($locale) ? $locale : 'es';
include __DIR__ . '/includes/locale.php';
include __DIR__ . '/includes/header.php';
?>

<main class="page-content container">
    <section class="about-us">
        <h1><?php echo $t['about_title']; ?></h1>
        <div class="content-grid">
            <div class="text">
                <p><?php echo $t['about_intro']; ?></p>
                <p><?php echo $t['about_text']; ?></p>
            </div>
            <div class="image-placeholder">
                <!-- Aquí iría una imagen corporativa -->
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
