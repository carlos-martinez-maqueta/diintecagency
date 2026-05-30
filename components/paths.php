<?php
/**
 * Rutas base del sitio (raíz del proyecto, sin carpeta v2).
 */
if (!function_exists('site_base_path')) {
    function site_base_path(): string
    {
        $dir = dirname($_SERVER['SCRIPT_NAME'] ?? '/');
        $dir = str_replace('\\', '/', $dir);
        if ($dir === '/' || $dir === '.' || $dir === '') {
            return '/';
        }
        return rtrim($dir, '/') . '/';
    }
}

if (!function_exists('site_canonical_origin')) {
    function site_canonical_origin(): string
    {
        return 'https://diintec.com';
    }
}

if (!function_exists('site_canonical_url')) {
    function site_canonical_url(): string
    {
        $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        $path = $path === false || $path === '' ? '/' : $path;
        $path = str_replace('\\', '/', (string) $path);
        if (preg_match('#^/diintecagency#', $path)) {
            $path = preg_replace('#^/diintecagency#', '', $path);
        }
        if ($path === '' || $path === '/') {
            return rtrim(site_canonical_origin(), '/') . '/';
        }
        return rtrim(site_canonical_origin(), '/') . $path;
    }
}
