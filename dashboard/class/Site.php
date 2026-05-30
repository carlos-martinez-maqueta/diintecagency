<?php

class Site
{
    private static ?bool $tablesReady = null;

    private static function conn(): ?PDO
    {
        global $conn;
        return $conn instanceof PDO ? $conn : null;
    }

    public static function hasTables(): bool
    {
        if (self::$tablesReady !== null) {
            return self::$tablesReady;
        }
        $db = self::conn();
        if (!$db) {
            self::$tablesReady = false;
            return false;
        }
        try {
            $stmt = $db->query("SHOW TABLES LIKE 'tbl_hero'");
            self::$tablesReady = (bool) $stmt->fetchColumn();
        } catch (Throwable $e) {
            self::$tablesReady = false;
        }
        return self::$tablesReady;
    }

    private static function defaultHero(): object
    {
        return (object) [
            'title' => 'Destaca en el mundo digital',
            'subtitle' => 'Creamos experiencias únicas que conectan, venden y posicionan tu marca en el universo digital.',
            'cta_text' => 'Comienza tu transformación ahora',
            'cta_url' => 'contactanos',
        ];
    }

    public static function getHero(): object
    {
        if (!self::hasTables()) {
            return self::defaultHero();
        }
        $row = self::conn()->query("SELECT * FROM tbl_hero WHERE state='active' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
        return $row ?: self::defaultHero();
    }

    public static function getHeroChips(): array
    {
        if (!self::hasTables()) {
            return self::defaultHeroChips();
        }
        $stmt = self::conn()->query("SELECT * FROM tbl_hero_chip WHERE state='active' ORDER BY sort_order ASC, id ASC");
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows ?: self::defaultHeroChips();
    }

    private static function defaultHeroChips(): array
    {
        $data = [
            ['Web que convierten', 'pain-chip--violet', -380, 2, -17],
            ['SEO estratégico', 'pain-chip--sky', -240, 82, -7],
            ['Automatización útil', 'pain-chip--orange', -86, 154, 9],
            ['UX/UI de alto impacto', 'pain-chip--blue', -30, 72, -2],
            ['Tiendas online potentes', 'pain-chip--mint', 178, 70, 8],
            ['Analítica en tiempo real', 'pain-chip--lilac', 378, 20, -9],
            ['Escalabilidad real', 'pain-chip--orange', 316, 152, 16],
            ['Soporte continuo', 'pain-chip--blue', 264, 102, 3],
            ['Resultados medibles', 'pain-chip--lime', 86, 186, -1],
        ];
        $out = [];
        foreach ($data as $i => $d) {
            $out[] = (object) [
                'label' => $d[0],
                'color_class' => $d[1],
                'pos_x' => $d[2],
                'pos_y' => $d[3],
                'rotation' => $d[4],
            ];
        }
        return $out;
    }

    public static function getFeatureCards(): array
    {
        if (!self::hasTables()) {
            return [
                (object) ['title' => 'Páginas web a medida', 'description' => 'Diseño y desarrollo adaptado a tu marca y objetivos comerciales.', 'icon' => 'assets/img/icon_parallax.png'],
                (object) ['title' => 'Sistemas según tu negocio', 'description' => 'Software y paneles hechos para tu operación real.', 'icon' => 'assets/img/icon_parallax.png'],
                (object) ['title' => 'SEO y posicionamiento', 'description' => 'Estrategia para aparecer en buscadores y atraer clientes.', 'icon' => 'assets/img/icon_parallax.png'],
            ];
        }
        $stmt = self::conn()->query("SELECT * FROM tbl_feature_card WHERE state='active' ORDER BY sort_order ASC, id ASC");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    private static function defaultCta(): object
    {
        return (object) [
            'title' => 'Tecnología que impulsa ventas, no solo presencia.',
            'description' => 'Diseñamos y desarrollamos paneles de control visuales, modernos y funcionales para tu negocio.',
            'stat_text' => '<span>Más de 50 negocios</span> ya gestionan sus procesos con nuestras soluciones. ¿Y tú?',
            'button_text' => '¡Contáctanos Ya!',
            'button_url' => 'contactanos',
            'image' => 'assets/img/celular.png',
        ];
    }

    public static function getCtaBlock(): object
    {
        if (!self::hasTables()) {
            return self::defaultCta();
        }
        $row = self::conn()->query("SELECT * FROM tbl_cta_block WHERE state='active' ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_OBJ);
        return $row ?: self::defaultCta();
    }

    public static function getServices(): array
    {
        if (!self::hasTables()) {
            return self::defaultServices();
        }
        $stmt = self::conn()->query("SELECT * FROM tbl_service WHERE state='active' ORDER BY sort_order ASC, id ASC");
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row) {
            $row->highlights_list = json_decode($row->highlights ?? '[]', true) ?: [];
        }
        return $rows ?: self::defaultServices();
    }

    private static function defaultServices(): array
    {
        return [
            (object) ['title' => 'Diseño y desarrollo web', 'slug' => 'diseno-desarrollo-web', 'short_desc' => 'Sitios corporativos, landings y e-commerce con UX premium.', 'long_desc' => 'Creamos experiencias digitales que comunican valor y convierten.', 'highlights_list' => ['UX/UI a medida', 'Responsive real', 'Integración CRM']],
            (object) ['title' => 'Sistemas a medida', 'slug' => 'sistemas-medida', 'short_desc' => 'Automatiza tu operación con software hecho para tu negocio.', 'long_desc' => 'Paneles, reportes y flujos internos en un solo ecosistema.', 'highlights_list' => ['Paneles admin', 'Reportes', 'Roles y permisos']],
            (object) ['title' => 'SEO y posicionamiento', 'slug' => 'seo-posicionamiento', 'short_desc' => 'Visibilidad orgánica con estrategia de contenido.', 'long_desc' => 'Auditoría técnica, on-page y seguimiento de KPIs.', 'highlights_list' => ['Auditoría SEO', 'Keywords locales', 'Contenido']],
            (object) ['title' => 'Mantenimiento y soporte', 'slug' => 'mantenimiento-soporte', 'short_desc' => 'Tu sitio seguro, actualizado y siempre online.', 'long_desc' => 'Monitoreo, backups y mejoras continuas.', 'highlights_list' => ['Actualizaciones', 'Seguridad', 'Soporte']],
        ];
    }

    public static function getProjects(bool $featuredOnly = false): array
    {
        if (!self::hasTables()) {
            return self::defaultProjects();
        }
        $sql = "SELECT * FROM tbl_project WHERE state='active'";
        if ($featuredOnly) {
            $sql .= " AND is_featured = 1";
        }
        $sql .= " ORDER BY sort_order ASC, id DESC";
        $rows = self::conn()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        return $rows ?: self::defaultProjects();
    }

    private static function defaultProjects(): array
    {
        return [
            (object) ['title' => 'Hullka Coffee', 'slug' => 'hullka', 'description' => 'E-commerce con catálogo y checkout optimizado.', 'category' => 'E-commerce', 'image' => 'assets/img/logo-hullka.png', 'client_name' => 'Hullka Coffee', 'city' => 'Lima', 'project_url' => ''],
            (object) ['title' => 'Astur Santa Fe', 'slug' => 'astur', 'description' => 'Web corporativa con SEO local.', 'category' => 'Corporativo', 'image' => 'assets/img/logo-astur.png', 'client_name' => 'Astur', 'city' => 'Lima', 'project_url' => ''],
            (object) ['title' => 'Aprak', 'slug' => 'aprak', 'description' => 'Plataforma digital a medida.', 'category' => 'Sistema', 'image' => 'assets/img/logo-aprak.png', 'client_name' => 'Aprak', 'city' => 'Cajamarca', 'project_url' => ''],
            (object) ['title' => 'Nuam', 'slug' => 'nuam', 'description' => 'Producto digital orientado a conversión.', 'category' => 'Producto', 'image' => 'assets/img/logo-nuam.png', 'client_name' => 'Nuam', 'city' => 'Lima', 'project_url' => ''],
        ];
    }

    public static function getClients(): array
    {
        if (!self::hasTables()) {
            return self::defaultClients();
        }
        $stmt = self::conn()->query("SELECT * FROM tbl_client WHERE state='active' ORDER BY sort_order ASC, id ASC");
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows ?: self::defaultClients();
    }

    private static function defaultClients(): array
    {
        $names = [
            ['Hullka Coffee', 'assets/img/logo-hullka.png', 'E-commerce | UX/UI | Conversión', 'Tienda online de alto rendimiento'],
            ['Astur Santa Fe', 'assets/img/logo-astur.png', 'Web corporativa | SEO', 'Presencia digital sólida'],
            ['Aprak', 'assets/img/logo-aprak.png', 'Sistemas web | Automatización', 'Operación digital centralizada'],
            ['Nuam', 'assets/img/logo-nuam.png', 'Producto digital | Estrategia', 'Plataforma escalable'],
        ];
        $out = [];
        foreach ($names as $n) {
            $out[] = (object) [
                'name' => $n[0],
                'logo' => $n[1],
                'hover_text' => $n[2],
                'tagline' => $n[3],
                'project_url' => 'proyectos',
            ];
        }
        return $out;
    }

    public static function getTrustBrands(): array
    {
        if (!self::hasTables()) {
            return self::defaultTrustBrands();
        }
        $stmt = self::conn()->query("SELECT * FROM tbl_trust_brand WHERE state='active' ORDER BY sort_order ASC, id ASC");
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows ?: self::defaultTrustBrands();
    }

    private static function defaultTrustBrands(): array
    {
        $logos = ['logo-hullka.png', 'logo-astur.png', 'logo-aprak.png', 'logo-nuam.png', 'logo-hullka.png', 'logo-astur.png'];
        $out = [];
        foreach ($logos as $i => $file) {
            $out[] = (object) ['name' => 'Cliente ' . ($i + 1), 'image' => 'assets/img/' . $file, 'url' => null];
        }
        return $out;
    }

    public static function getLocations(): array
    {
        if (!self::hasTables()) {
            return self::defaultLocations();
        }
        $stmt = self::conn()->query("SELECT * FROM tbl_location WHERE state='active' ORDER BY sort_order ASC, id ASC");
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows ?: self::defaultLocations();
    }

    /** @return array{0: float, 1: float} [lng, lat] */
    public static function coordsForCity(string $city): array
    {
        $coords = [
            'Lima' => [-77.0428, -12.0464],
            'Cajamarca' => [-78.523, -7.1617],
            'Trujillo' => [-79.029, -8.1116],
            'Arequipa' => [-71.5375, -16.409],
            'Cusco' => [-71.9675, -13.5319],
            'Piura' => [-80.6328, -5.1945],
            'Iquitos' => [-73.2538, -3.7491],
        ];
        return $coords[$city] ?? [-75.5, -9.5];
    }

    private static function defaultLocations(): array
    {
        $items = [
            ['Lima', 'Sede principal', 'Proyectos web, sistemas y SEO.', 28],
            ['Cajamarca', 'Norte del país', 'Implementaciones regionales.', 6],
            ['Trujillo', 'Costa norte', 'Webs y e-commerce.', 4],
            ['Arequipa', 'Sur', 'Soluciones para retail y servicios.', 3],
        ];
        $out = [];
        foreach ($items as $item) {
            [$lng, $lat] = self::coordsForCity($item[0]);
            $out[] = (object) [
                'city' => $item[0],
                'label' => $item[1],
                'description' => $item[2],
                'projects_count' => $item[3],
                'lng' => $lng,
                'lat' => $lat,
                'map_x' => 0,
                'map_y' => 0,
            ];
        }
        return $out;
    }

    public static function getSection(string $key): ?object
    {
        if (!self::hasTables()) {
            return null;
        }
        $stmt = self::conn()->prepare("SELECT * FROM tbl_site_section WHERE section_key = :k LIMIT 1");
        $stmt->bindValue(':k', $key);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row ?: null;
    }
}
