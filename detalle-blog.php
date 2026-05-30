<?php
require_once __DIR__ . '/dashboard/config/conexion.php';
require_once __DIR__ . '/dashboard/class/global.php';

$slug = isset($_GET['slug']) ? trim((string) $_GET['slug']) : '';
if ($slug === '' && !empty($_SERVER['REQUEST_URI'])) {
    if (preg_match('#/blog/([a-zA-Z0-9_-]+)/?(?:\?|$)#', $_SERVER['REQUEST_URI'], $m)) {
        $slug = $m[1];
    }
}

$post = $slug !== '' ? Globales::getBlogByFriendlyUrl($slug) : null;
if (!$post) {
    http_response_code(404);
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $post ? htmlspecialchars($post->title) . ' | DIINTEC' : 'Artículo no encontrado | DIINTEC' ?></title>
    <?php include __DIR__ . '/components/head.php' ?>
</head>

<body>
    <?php include __DIR__ . '/components/loader.php' ?>
    <?php include __DIR__ . '/components/header.php' ?>

    <main class="main_black main_blog post-detail">
        <?php if (!$post): ?>
            <section class="main_hv">
                <div class="section_banner text-center">
                    <h2>No encontramos este artículo</h2>
                    <div class="p_info mt-4">
                        <p>El enlace puede estar desactualizado o el contenido ya no está disponible.</p>
                    </div>
                    <div class="button_banner mt-4">
                        <a href="blog" class="text-decoration-none text-white border border-white border-opacity-50 rounded-pill px-4 py-3 d-inline-block">Volver al blog</a>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="main_hv">
                <div class="section_banner text-center px-3">
                    <p class="section-kicker">Blog</p>
                    <h2 id="blog-hero-title"><?= htmlspecialchars($post->title) ?></h2>
                    <div class="p_info">
                        <p class="post-meta mb-0"><?= htmlspecialchars($post->description) ?></p>
                    </div>
                </div>
            </section>

            <section class="py-5 site-animate">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <?php if (!empty($post->banner)): ?>
                                <div class="post-hero-img mb-5">
                                    <img src="dashboard/img/blog/<?= htmlspecialchars($post->banner) ?>"
                                        class="img-fluid w-100 d-block"
                                        alt="">
                                </div>
                            <?php endif; ?>
                            <article class="post-body">
                                <?= $post->summer ?>
                            </article>
                            <p class="mt-5 mb-0">
                                <a href="blog" class="text-white-50">← Volver al blog</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <?php include __DIR__ . '/components/footer.php' ?>
    <?php include __DIR__ . '/components/scripts-site.php' ?>
</body>

</html>
