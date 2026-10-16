<?php
/**
 * Module Loader for Landing Xịt Khử Mùi Theme
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$lx_modules = array(
    'helpers.php',
    'cleanup.php',
    'assets.php',
);

foreach ($lx_modules as $file) {
    $path = LX_THEME_DIR . '/inc/' . $file;
    if (file_exists($path)) {
        require_once $path;
    }
}
