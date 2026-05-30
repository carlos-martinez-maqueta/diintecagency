<section class="clientes py-5 site-animate">
    <div class="container">
        <div class="section-intro">
            <?php if ($secClients && $secClients->kicker): ?><p class="section-kicker"><?= htmlspecialchars($secClients->kicker) ?></p><?php endif; ?>
            <h3><?= htmlspecialchars($secClients->title ?? 'Nuestros Clientes') ?></h3>
            <p><?= htmlspecialchars($secClients->subtitle ?? 'Casos reales con impacto en conversión, operación y posicionamiento digital.') ?></p>
        </div>
        <div class="carrusel_clientes py-4">
            <div class="owl-carousel owl-clientes">
                <?php foreach ($clients as $client): ?>
                    <div class="item_cliente">
                        <div class="alto_card">
                            <img src="<?= htmlspecialchars($client->logo) ?>" alt="<?= htmlspecialchars($client->name) ?>">
                            <?php if (!empty($client->hover_text)): ?>
                                <div class="aparece">
                                    <p><?= htmlspecialchars($client->hover_text) ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <h5><?= htmlspecialchars($client->name) ?></h5>
                            <p><?= htmlspecialchars($client->tagline ?? 'Proyecto digital con DIINTEC') ?></p>
                            <a href="<?= htmlspecialchars($client->project_url ?: 'proyectos') ?>">
                                Ver Proyecto
                                <img src="assets/img/ver.png" class="ms-3 negro img-fluid" alt="">
                                <img src="assets/img/none.png" class="ms-3 blanco img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <p class="text-center mt-3"><a href="proyectos" class="text-white-50">Ver todos los proyectos →</a></p>
    </div>
</section>
