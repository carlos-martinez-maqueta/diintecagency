<?php
require_once __DIR__ . '/components/init-site.php';
require_once __DIR__ . '/dashboard/class/global.php';
$blogsAll = Globales::getBlogAllWithLabels();
$secBlog = Site::getSection('blog_page');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog | DIINTEC</title>
    <?php include __DIR__ . '/components/head.php' ?>
</head>
<body class="blog-page">
    <?php include __DIR__ . '/components/loader.php' ?>
    <?php include __DIR__ . '/components/header.php' ?>

    <main class="main_black main_blog">
        <section class="page-hero" style="min-height:58vh;">
            <div>
                <p class="section-kicker"><?= htmlspecialchars($secBlog->kicker ?? 'Insights') ?></p>
                <h1><?= htmlspecialchars($secBlog->title ?? 'Blog DIINTEC') ?></h1>
                <p><?= htmlspecialchars($secBlog->subtitle ?? 'Publicamos ideas sobre web, SEO, sistemas y crecimiento digital para tu negocio.') ?></p>
            </div>
        </section>

        <section class="py-5 site-animate">
            <div class="container">
                <div class="row g-4">
                    <?php if (empty($blogsAll)): ?>
                        <div class="col-12 text-center py-5">
                            <p class="text-white-50">Próximamente publicaremos artículos. Vuelve pronto.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($blogsAll as $blog): ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <article class="blog-card">
                                    <a href="blog/<?= htmlspecialchars($blog['friendly_url']) ?>" class="text-decoration-none">
                                        <div class="blog-card__media">
                                            <img src="<?= !empty($blog['banner']) ? 'dashboard/img/blog/' . htmlspecialchars($blog['banner']) : 'assets/img/icon_medio.png' ?>" alt="<?= htmlspecialchars($blog['title']) ?>">
                                        </div>
                                        <div class="blog-card__body">
                                            <?php if (!empty($blog['labels'])): ?>
                                                <div class="blog-card__tags">
                                                    <?php foreach (array_slice($blog['labels'], 0, 3) as $label): ?>
                                                        <span><?= htmlspecialchars($label) ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                            <h2 class="h5 text-white mb-2"><?= htmlspecialchars($blog['title']) ?></h2>
                                            <p class="mb-3" style="color:rgba(255,255,255,.65);font-size:.92rem;"><?= htmlspecialchars($blog['description']) ?></p>
                                            <span class="text-white-50">Leer artículo →</span>
                                        </div>
                                    </a>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/components/footer.php' ?>
    <?php include __DIR__ . '/components/scripts-site.php' ?>
</body>
</html>
