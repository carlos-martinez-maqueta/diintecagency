<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contáctanos | DIINTEC</title>
    <?php include __DIR__ . '/components/head.php' ?>
</head>

<body>
    <?php include __DIR__ . '/components/loader.php' ?>
    <?php include __DIR__ . '/components/header.php' ?>

    <main class="main_black contact-page">
        <section class="main_hv">
            <div class="section_banner text-center px-3">
                <p class="section-kicker">Contacto</p>
                <h2 id="contact-hero-title">Hablemos de tu próximo proyecto</h2>
                <div class="p_info">
                    <p>Cuéntanos qué necesitas: web, app, SEO o una mezcla. Respondemos con una propuesta clara y tiempos realistas.</p>
                </div>
            </div>
        </section>

        <section class="py-5 site-animate">
            <div class="container">
                <div class="row g-4 contact-grid">
                    <div class="col-md-4">
                        <div class="contact-card">
                            <h4>Correo</h4>
                            <p class="text-white-50 small mb-0">Escríbenos cuando quieras.</p>
                            <p class="mt-3 mb-0"><a href="mailto:hola@diintec.com">hola@diintec.com</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-card">
                            <h4>Ubicación</h4>
                            <p class="text-white-50 small mb-0">Lima, Perú · trabajo remoto LATAM.</p>
                            <p class="mt-3 mb-0 text-white-50">Atención en horario laboral (PET).</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-card">
                            <h4>Respuesta</h4>
                            <p class="text-white-50 small mb-0">Te respondemos en 1–2 días hábiles.</p>
                            <p class="mt-3 mb-0"><a href="blog">Ver blog</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-5 site-animate">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-form-wrap">
                            <p class="section-kicker mb-2">Formulario</p>
                            <h3 class="h4 mb-4">Envíanos un mensaje</h3>
                            <form action="#" method="post" class="row g-3">
                                <div class="col-md-6">
                                    <label for="cname" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="cname" name="name" autocomplete="name" placeholder="Tu nombre">
                                </div>
                                <div class="col-md-6">
                                    <label for="cemail" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="cemail" name="email" autocomplete="email" placeholder="tu@correo.com">
                                </div>
                                <div class="col-12">
                                    <label for="csubject" class="form-label">Asunto</label>
                                    <input type="text" class="form-control" id="csubject" name="subject" placeholder="Ej. Web corporativa + SEO">
                                </div>
                                <div class="col-12">
                                    <label for="cmsg" class="form-label">Mensaje</label>
                                    <textarea class="form-control" id="cmsg" name="message" rows="5" placeholder="Describe tu proyecto, plazos y presupuesto aproximado."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-light rounded-pill px-4 fw-semibold">Enviar (demo)</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/components/footer.php' ?>
    <?php include __DIR__ . '/components/scripts-site.php' ?>
</body>

</html>
