<?php
/**
 * Landing Xịt Khử Mùi Theme functions and definitions
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

// ── Theme Constants ─────────────────────────────────────────
if (!defined('LX_THEME_VERSION')) {
    define('LX_THEME_VERSION', '1.1.5');
}
if (!defined('LX_THEME_DIR')) {
    define('LX_THEME_DIR', get_template_directory());
}
if (!defined('LX_THEME_URI')) {
    define('LX_THEME_URI', get_template_directory_uri());
}

// ── Theme Setup ─────────────────────────────────────────────
function lx_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
}
add_action('after_setup_theme', 'lx_theme_setup');

// ── Load Modules from /inc/ ─────────────────────────────────
require_once LX_THEME_DIR . '/inc/index.php';

/**
 * Auto-correct zone 1 (Nách) and zone 2 (Chân) image options in ACF if inverted
 */
function lx_fix_zone_options() {
    $z1 = get_option('options_lx_zone_1_image');
    $z2 = get_option('options_lx_zone_2_image');
    if ($z1 == '21' && (empty($z2) || $z2 == '18')) {
        update_option('options_lx_zone_1_image', '18');
        update_option('options_lx_zone_2_image', '21');
        update_option('_options_lx_zone_1_image', 'field_lx_zone_1_image');
        update_option('_options_lx_zone_2_image', 'field_lx_zone_2_image');
    }
}
add_action('init', 'lx_fix_zone_options');

