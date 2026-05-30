<?php require_once __DIR__ . '/components/init-site.php';
$projects = Site::getProjects(false);
$sec = Site::getSection('projects_page');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyectos | DIINTEC</title>
    <?php include __DIR__ . '/components/head.php' ?>
</head>
<body>
    <?php include __DIR__ . '/components/loader.php' ?>
    <?php include __DIR__ . '/components/header.php' ?>

    <main class="main_black">
        <section class="page-hero">
            <div>
                <p class="section-kicker"><?= htmlspecialchars($sec->kicker ?? 'Portafolio') ?></p>
                <h1><?= htmlspecialchars($sec->title ?? 'Proyectos realizados') ?></h1>
                <p><?= htmlspecialchars($sec->subtitle ?? 'Explora lo que podemos construir para tu marca: webs, sistemas y experiencias digitales.') ?></p>
            </div>
        </section>

        <section class="trust-wall py-4 site-animate">
            <div class="container">
                <div class="text-center mb-4">
                    <h3 class="h4">Confían en nosotros</h3>
                </div>
                <div class="trust-wall__grid">
                    <?php foreach ($trustBrands as $brand): ?>
                        <div class="trust-wall__item">
                            <img src="<?= htmlspecialchars($brand->image) ?>" alt="<?= htmlspecialchars($brand->name) ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="py-5 site-animate">
            <div class="container">
                <div class="projects-grid">
                    <?php foreach ($projects as $p): ?>
                        <a href="proyecto/<?= htmlspecialchars($p->slug) ?>" class="project-card">
                            <div class="device-mockup device-mockup--laptop device-mockup--sm project-card__device">
                                <div class="device-mockup__screen">
                                    <img src="<?= htmlspecialchars($p->image) ?>" alt="<?= htmlspecialchars($p->title) ?>" loading="lazy">
                                </div>
                                <div class="device-mockup__base"></div>
                            </div>
                            <div class="project-card__body">
                                <p class="project-card__meta"><?= htmlspecialchars($p->category ?? 'Proyecto') ?> · <?= htmlspecialchars($p->city ?? 'Perú') ?></p>
                                <h3><?= htmlspecialchars($p->title) ?></h3>
                                <p><?= htmlspecialchars($p->description) ?></p>
                                <?php if (!empty($p->client_name)): ?>
                                    <p class="project-card__meta mb-0">Cliente: <?= htmlspecialchars($p->client_name) ?></p>
                                <?php endif; ?>
                                <span class="project-card__cta">Ver proyecto →</span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/components/footer.php' ?>
    <?php include __DIR__ . '/components/scripts-site.php' ?>
</body>
</html>
