<?php
/**
 * PageSpeed & Clean WordPress Optimizations
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Remove WordPress emoji scripts and styles
 */
function lx_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'lx_disable_emojis');

/**
 * Dequeue unused core Gutenberg block styles on front-end
 */
function lx_dequeue_unused_styles() {
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('classic-theme-styles');
        wp_dequeue_style('global-styles');
    }
}
add_action('wp_enqueue_scripts', 'lx_dequeue_unused_styles', 100);

/**
 * Deregister wp-embed script
 */
function lx_disable_embeds() {
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'lx_disable_embeds');

/**
 * Remove unnecessary header bloat
 */
function lx_clean_header_bloat() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
}
add_action('init', 'lx_clean_header_bloat');
