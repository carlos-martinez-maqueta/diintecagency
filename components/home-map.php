<?php
$mapPoints = [];
foreach ($locations as $loc) {
    $lng = isset($loc->lng) ? (float) $loc->lng : null;
    $lat = isset($loc->lat) ? (float) $loc->lat : null;
    if ($lng === null || $lat === null) {
        $fallback = Site::coordsForCity($loc->city ?? '');
        $lng = $fallback[0];
        $lat = $fallback[1];
    }
    $mapPoints[] = [
        'city' => $loc->city,
        'label' => $loc->label,
        'description' => $loc->description ?? '',
        'projects_count' => (int) ($loc->projects_count ?? 0),
        'lng' => $lng,
        'lat' => $lat,
    ];
}
?>
<section class="mapa-peru py-5 site-animate">
    <div class="container">
        <div class="mapa-peru__head">
            <?php if ($secMap && $secMap->kicker): ?><p class="section-kicker"><?= htmlspecialchars($secMap->kicker) ?></p><?php endif; ?>
            <h3><?= htmlspecialchars($secMap->title ?? 'Proyectos que conectan regiones') ?></h3>
            <p><?= htmlspecialchars($secMap->subtitle ?? 'Trabajamos con equipos en Lima, Cajamarca y más ciudades del Perú.') ?></p>
        </div>
        <div class="mapa-peru__layout">
            <div id="peru-map" class="peru-map" role="region" aria-label="Mapa de presencia en Perú"></div>
            <aside class="mapa-peru__sidebar">
                <?php foreach ($locations as $loc): ?>
                    <article class="mapa-peru__city-card">
                        <span class="mapa-peru__city-dot" aria-hidden="true"></span>
                        <div>
                            <h4><?= htmlspecialchars($loc->city) ?></h4>
                            <p class="mapa-peru__city-label"><?= htmlspecialchars($loc->label) ?></p>
                            <p><?= htmlspecialchars($loc->description) ?></p>
                            <span class="mapa-peru__city-meta"><?= (int) $loc->projects_count ?> proyectos</span>
                        </div>
                    </article>
                <?php endforeach; ?>
            </aside>
        </div>
    </div>
    <script type="application/json" id="peru-map-data"><?= json_encode($mapPoints, JSON_UNESCAPED_UNICODE) ?></script>
</section>
<link rel="stylesheet" href="https://unpkg.com/maplibre-gl@4.7.1/dist/maplibre-gl.css">
<script src="https://unpkg.com/maplibre-gl@4.7.1/dist/maplibre-gl.js"></script>
<script src="assets/js/peru-map.js"></script>
