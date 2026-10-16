<?php
/**
 * Theme Helper Functions
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get ACF field with fallback to default value
 *
 * @param string $field_name
 * @param mixed  $post_id
 * @param mixed  $default
 * @return mixed
 */
function lx_get_field($field_name, $post_id = 'option', $default = '') {
    if (function_exists('get_field')) {
        $value = get_field($field_name, $post_id);
        if ($value !== null && $value !== false && $value !== '') {
            return $value;
        }
    }
    return $default;
}

/**
 * Get image URL from ACF field (ID, Array or string URL) with default fallback
 *
 * @param string $field_name
 * @param string $default_url
 * @param mixed  $post_id
 * @return string
 */
function lx_get_image_url($field_name, $default_url = '', $post_id = 'option') {
    $field = lx_get_field($field_name, $post_id, null);
    if (empty($field)) {
        return $default_url;
    }
    if (is_numeric($field)) {
        $url = wp_get_attachment_image_url((int)$field, 'full');
        return $url ? $url : $default_url;
    }
    if (is_array($field) && !empty($field['url'])) {
        return $field['url'];
    }
    if (is_string($field)) {
        return $field;
    }
    return $default_url;
}
