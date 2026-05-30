<?php require_once __DIR__ . '/components/init-site.php'; ?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diseño y Desarrollo de Páginas Web en Lima, Perú | DIINTEC</title>
    <?php include 'components/head.php'?>
</head>

<body>
    <?php include __DIR__ . '/components/loader.php'; ?>
    <?php include 'components/header.php' ?>

    <main class="main_black">

        <section class="main_hv" data-hero="split" data-particles="1">
            <canvas class="hero-particle-canvas" aria-hidden="true"></canvas>
            <div class="section_banner text-center">
                <div class="hero-title-wrap">
                    <h2 id="text1"><?= htmlspecialchars($hero->title) ?></h2>
                </div>
                <div class="p_info">
                    <p><?= htmlspecialchars($hero->subtitle) ?></p>
                </div>
                <div class="hero-pain-points" aria-hidden="true">
                    <?php foreach ($heroChips as $chip): ?>
                    <span class="pain-chip <?= htmlspecialchars($chip->color_class) ?>" data-x="<?= (int) $chip->pos_x ?>" data-y="<?= (int) $chip->pos_y ?>" data-r="<?= (int) $chip->rotation ?>"><?= htmlspecialchars($chip->label) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="button_banner"><a class="btn-hero-cta" href="<?= htmlspecialchars($hero->cta_url ?? 'contactanos') ?>"><?= htmlspecialchars($hero->cta_text) ?> <img src="assets/img/button.svg" class="mx-2 img-fluid" alt=""></a></div>
            </div>
        </section>

        <section class="adornos_home py-5 site-animate">
            <div class="container">
                <div class="row align-items-center justify-content-md-center">
                    <div class="col-lg-4">
                        <div><img src="assets/img/linea_izquierda.png" class="img-fluid" alt=""></div>
                    </div>
                    <div class="col-lg-1">
                        <div class="text-center"><img src="assets/img/icon_medio.png" class="img-fluid" alt=""></div>
                    </div>
                    <div class="col-lg-4">
                        <div><img src="assets/img/linea_derecha.png" class="img-fluid" alt=""></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="efecto_parallax py-5 site-animate">
            <div class="container">
                <div class="row fondo_parallax align-items-stretch feature-cards-row">
                    <?php foreach ($featureCards as $card): ?>
                    <div class="col-lg-4 encima_fondo">
                        <div class="fondo_opaco feature-card-v2">
                            <div class="feature-card-v2__icon">
                                <img src="<?= htmlspecialchars($card->icon ?? 'assets/img/icon_parallax.png') ?>" alt="">
                            </div>
                            <div class="feature-card-v2__body">
                                <h4><?= htmlspecialchars($card->title) ?></h4>
                                <p class="card-desc"><?= htmlspecialchars($card->description) ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="fondo_efecto_parallax">
                        <img src="assets/img/efecto_fondo_parallax.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="cto py-5 site-animate">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-10">
                        <div class="cto_fondo row align-items-center">
                            <div class="col-lg-6">
                                <div class=""><img src="<?= htmlspecialchars($ctaBlock->image ?? 'assets/img/celular.png') ?>" class="img-fluid" alt=""></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="texto_cto">
                                    <h2><?= htmlspecialchars($ctaBlock->title) ?></h2>
                                    <p><?= htmlspecialchars($ctaBlock->description) ?></p>
                                    <div class="flex_button_cto">
                                        <div class="texto_informativo">
                                            <p><?= $ctaBlock->stat_text ?></p>
                                        </div>
                                        <div class="a_link">
                                            <a href="<?= htmlspecialchars($ctaBlock->button_url ?? 'contactanos') ?>"><?= htmlspecialchars($ctaBlock->button_text) ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                <?php include __DIR__ . '/components/home-map.php'; ?>
        <?php include __DIR__ . '/components/home-trust.php'; ?>
        <?php include __DIR__ . '/components/home-clientes.php'; ?>

        <section class="testimonios py-5 site-animate">
            <div class="col-12">
                <h3>Recomendaciones</h3>
            </div>
            <div class="testimonios-container py-5">
                <div class="columna scroll-down">
                    <div class="inner">
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columna scroll-up">
                    <div class="inner">
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="columna scroll-down">
                    <div class="inner">
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="assets/img/bars.svg" class="imgBars" alt="">
                                </div>
                                <div class="d-flex">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star.svg" class="imgStart" alt="">
                                    <img src="assets/img/star-empty.svg" class="imgStart" alt="">
                                </div>
                            </div>
                            <div class="mt-5 mb-2">
                                <p class="mb-0">Diintec es un equipo muy talentoso. Trabaja con rapidez y tiene un gran ojo para los detalles. sus diseños siempre son de alta calidad y lucen geniales. Diintec es paciente. sabe escuchar v hace cambios con rapidez. Lo recomendamos ampliamente</p>
                            </div>
                            <div>
                                <img src="assets/img/line-card-testimony.svg" class="w-100" alt="">
                            </div>
                            <div class="d-flex mt-3 gap-4">
                                <div>
                                    <img src="assets/img/user.png" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4 class="mb-1">Jeremy Smith</h4>
                                    <p class="mb-0 fundador">Fundador: Seedlang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="comunidad py-5 site-animate">
            <div class="container comunidadContainer">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="col-7 comunidadCard p-5">

                            <h3 class="text-center comunidadCardTitle">Únete a nuestra lista de espera</h3>

                            <div class="px-5">
                                <p class="comunidadCardParagraph mb-5">Sé el primero en recibir novedades sobre nuestros servicios de desarrollo web y apps, lanzamientos exclusivos y consejos de innovación digital directamente en tu bandeja de entrada.</p>
                            </div>

                            <div class="d-flex justify-content-center gap-3">
                                <input type="email" class="form-control comunidadCardInputEmail" placeholder="Ingresa tu correo electrónico">
                                <button type="button" class="btn btn-link comunidadCardButton">Iniciar Sesión</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>

    <?php include 'components/footer.php' ?>
    <?php include 'components/scripts-site.php' ?>
</body>

</html>