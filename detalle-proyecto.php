<?php
require_once __DIR__ . '/components/init-site.php';
require_once __DIR__ . '/dashboard/class/Admin.php';

$slug = isset($_GET['slug']) ? trim((string) $_GET['slug']) : '';
if ($slug === '' && !empty($_SERVER['REQUEST_URI'])) {
    if (preg_match('#/proyecto/([a-zA-Z0-9_-]+)/?#', $_SERVER['REQUEST_URI'], $m)) $slug = $m[1];
}

$project = $slug !== '' ? Admin::findProjectBySlug($slug) : null;
$gallery = $project ? Admin::projectImages((int) $project->id) : [];

if (!$project) http_response_code(404);

$relatedProjects = [];
if ($project) {
    foreach (Site::getProjects(false) as $p) {
        if ((int) $p->id !== (int) $project->id) $relatedProjects[] = $p;
    }
    $relatedProjects = array_slice($relatedProjects, 0, 3);
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $project ? htmlspecialchars($project->title) . ' | DIINTEC' : 'Proyecto no encontrado | DIINTEC' ?></title>
    <?php include __DIR__ . '/components/head.php' ?>
</head>
<body class="project-detail-page">
    <?php include __DIR__ . '/components/loader.php' ?>
    <?php include __DIR__ . '/components/header.php' ?>

    <main class="main_black">
        <?php if (!$project): ?>
            <section class="main_hv">
                <div class="section_banner text-center">
                    <h2>No encontramos este proyecto</h2>
                    <div class="p_info mt-4"><p>El proyecto puede haber sido movido o ya no está disponible.</p></div>
                    <div class="button_banner mt-4"><a class="btn-hero-cta" href="proyectos">Ver todos los proyectos</a></div>
                </div>
            </section>
        <?php else: ?>
            <section class="project-hero">
                <div class="container">
                    <div class="project-hero__inner">
                        <p class="section-kicker"><?= htmlspecialchars($project->category ?? 'Proyecto') ?> · <?= htmlspecialchars($project->city ?? 'Perú') ?></p>
                        <h1><?= htmlspecialchars($project->title) ?></h1>
                        <p class="project-hero__desc"><?= htmlspecialchars($project->description) ?></p>
                        <div class="project-hero__meta">
                            <?php if (!empty($project->client_name)): ?>
                                <div><span class="label">Cliente</span><strong><?= htmlspecialchars($project->client_name) ?></strong></div>
                            <?php endif; ?>
                            <?php if (!empty($project->category)): ?>
                                <div><span class="label">Categoría</span><strong><?= htmlspecialchars($project->category) ?></strong></div>
                            <?php endif; ?>
                            <?php if (!empty($project->city)): ?>
                                <div><span class="label">Ciudad</span><strong><?= htmlspecialchars($project->city) ?></strong></div>
                            <?php endif; ?>
                            <?php if (!empty($project->project_url)): ?>
                                <div><a class="project-hero__link" href="<?= htmlspecialchars($project->project_url) ?>" target="_blank" rel="noopener">Visitar sitio →</a></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <?php if (!empty($project->image)): ?>
            <section class="project-cover">
                <div class="container">
                    <div class="device-mockup device-mockup--laptop project-cover__device">
                        <div class="device-mockup__screen">
                            <img src="<?= htmlspecialchars($project->image) ?>" alt="<?= htmlspecialchars($project->title) ?>">
                        </div>
                        <div class="device-mockup__base"></div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php if (!empty($project->long_description)): ?>
            <section class="project-section site-animate">
                <div class="container">
                    <div class="project-overview">
                        <div class="project-overview__col">
                            <p class="section-kicker">El proyecto</p>
                            <h2>Sobre <?= htmlspecialchars($project->title) ?></h2>
                        </div>
                        <div class="project-overview__col project-overview__text">
                            <?= nl2br(htmlspecialchars($project->long_description)) ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php if ($gallery): ?>
            <section class="project-section site-animate">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-end mb-4">
                        <div>
                            <p class="section-kicker">Galería</p>
                            <h2 class="h3 mb-0 text-white">Capturas del proyecto</h2>
                        </div>
                        <span class="text-white-50 small"><?= count($gallery) ?> imágenes</span>
                    </div>
                    <div class="project-gallery">
                        <?php foreach ($gallery as $i => $img): ?>
                            <figure class="project-gallery__item">
                                <div class="device-mockup device-mockup--laptop device-mockup--sm">
                                    <div class="device-mockup__screen">
                                        <img src="<?= htmlspecialchars($img->image) ?>" alt="<?= htmlspecialchars($img->caption ?? $project->title) ?>" loading="lazy">
                                    </div>
                                    <div class="device-mockup__base"></div>
                                </div>
                                <?php if (!empty($img->caption)): ?>
                                    <figcaption><?= htmlspecialchars($img->caption) ?></figcaption>
                                <?php endif; ?>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <section class="project-section project-cta site-animate">
                <div class="container">
                    <div class="project-cta__box">
                        <div>
                            <p class="section-kicker">¿Te gustó?</p>
                            <h2>Hagamos algo así para tu marca.</h2>
                        </div>
                        <a class="btn-hero-cta" href="contactanos">Iniciar mi proyecto <img src="assets/img/button.svg" class="ms-2" alt=""></a>
                    </div>
                </div>
            </section>

            <?php if ($relatedProjects): ?>
            <section class="project-section site-animate pb-5">
                <div class="container">
                    <div class="text-center mb-4">
                        <p class="section-kicker">Más proyectos</p>
                        <h2 class="h3 text-white">Sigue explorando</h2>
                    </div>
                    <div class="row g-4">
                        <?php foreach ($relatedProjects as $rp): ?>
                            <div class="col-md-4">
                                <a href="proyecto/<?= htmlspecialchars($rp->slug) ?>" class="project-tile project-tile--link h-100 d-block">
                                    <div class="project-tile__img"><img src="<?= htmlspecialchars($rp->image) ?>" alt="<?= htmlspecialchars($rp->title) ?>"></div>
                                    <div class="project-tile__body">
                                        <p class="project-tile__meta"><?= htmlspecialchars($rp->category ?? 'Proyecto') ?></p>
                                        <h3><?= htmlspecialchars($rp->title) ?></h3>
                                        <span class="project-tile__cta">Ver proyecto →</span>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>

        <?php endif; ?>
    </main>

    <?php include __DIR__ . '/components/footer.php' ?>
    <?php include __DIR__ . '/components/scripts-site.php' ?>
</body>
</html>
