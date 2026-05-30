<?php require_once __DIR__ . '/components/init-site.php';
$services = Site::getServices();
$sec = Site::getSection('services_page');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servicios | DIINTEC</title>
    <?php include __DIR__ . '/components/head.php' ?>
</head>
<body>
    <?php include __DIR__ . '/components/loader.php' ?>
    <?php include __DIR__ . '/components/header.php' ?>

    <main class="main_black">
        <section class="page-hero">
            <div>
                <p class="section-kicker"><?= htmlspecialchars($sec->kicker ?? 'Servicios') ?></p>
                <h1><?= htmlspecialchars($sec->title ?? 'Diseño digital de otro mundo') ?></h1>
                <p><?= htmlspecialchars($sec->subtitle ?? 'Páginas web a medida, sistemas según tu negocio y SEO que genera resultados reales.') ?></p>
            </div>
        </section>

        <section class="py-5 site-animate">
            <div class="container">
                <div class="services-grid">
                    <?php foreach ($services as $svc): ?>
                        <article class="service-card">
                            <p class="section-kicker mb-2">Servicio</p>
                            <h3><?= htmlspecialchars($svc->title) ?></h3>
                            <p><?= htmlspecialchars($svc->short_desc) ?></p>
                            <?php if (!empty($svc->long_desc)): ?>
                                <p class="mt-2" style="color:rgba(255,255,255,.6);font-size:.92rem;"><?= htmlspecialchars($svc->long_desc) ?></p>
                            <?php endif; ?>
                            <?php if (!empty($svc->highlights_list)): ?>
                                <ul>
                                    <?php foreach ($svc->highlights_list as $item): ?>
                                        <li><?= htmlspecialchars($item) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
                <div class="text-center mt-5">
                    <a href="contactanos" class="btn btn-light rounded-pill px-4 py-3 fw-semibold">Solicitar propuesta</a>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/components/footer.php' ?>
    <?php include __DIR__ . '/components/scripts-site.php' ?>
</body>
</html>
