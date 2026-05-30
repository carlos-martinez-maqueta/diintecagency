<section class="trust-wall site-animate">
    <div class="container">
        <div class="text-center">
            <?php if ($secTrust && $secTrust->kicker): ?><p class="section-kicker"><?= htmlspecialchars($secTrust->kicker) ?></p><?php endif; ?>
            <h3><?= htmlspecialchars($secTrust->title ?? 'Confían en nosotros') ?></h3>
            <p class="mx-auto" style="max-width:560px;color:rgba(255,255,255,.65);"><?= htmlspecialchars($secTrust->subtitle ?? 'Marcas que ya transformaron su presencia digital con DIINTEC.') ?></p>
        </div>
        <div class="trust-wall__grid">
            <?php foreach ($trustBrands as $brand): ?>
                <a href="<?= htmlspecialchars($brand->url ?: 'proyectos') ?>" class="trust-wall__item text-decoration-none">
                    <img src="<?= htmlspecialchars($brand->image) ?>" alt="<?= htmlspecialchars($brand->name) ?>">
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
