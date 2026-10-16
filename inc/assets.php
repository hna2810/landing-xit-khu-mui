<?php
/**
 * Enqueue Styles and Scripts
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add preconnect resource hints for Google Fonts
 *
 * @param array  $urls
 * @param string $relation_type
 * @return array
 */
function lx_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
        );
        $urls[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter('wp_resource_hints', 'lx_resource_hints', 10, 2);

/**
 * Enqueue scripts and styles
 */
function lx_enqueue_scripts() {
    // Google Fonts: Be Vietnam Pro & Lora
    wp_enqueue_style(
        'lx-landing-fonts',
        'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&family=Lora:ital,wght@0,500;0,600;1,500;1,600&display=swap',
        array(),
        null
    );

    // Main Theme CSS
    wp_enqueue_style(
        'lx-landing-main',
        LX_THEME_URI . '/assets/css/main.css',
        array(),
        LX_THEME_VERSION
    );

    // Main Theme JS
    wp_enqueue_script(
        'lx-landing-main',
        LX_THEME_URI . '/assets/js/main.js',
        array(),
        LX_THEME_VERSION,
        true
    );

    // Prepare ACF data for front-end JS
    $hero_img     = lx_get_image_url('lx_hero_product_image', '');
    $hero_gallery = lx_get_field('lx_hero_gallery', 'option', array());
    $gallery_urls = array();
    if (!empty($hero_gallery) && is_array($hero_gallery)) {
        foreach ($hero_gallery as $g) {
            $u = is_array($g) ? (isset($g['url']) ? $g['url'] : '') : $g;
            if ($u) {
                $gallery_urls[] = $u;
            }
        }
    }
    $product_images = array_filter(array_merge(array($hero_img), $gallery_urls));

    $video_items = lx_get_field('lx_video_reviews', 'option', array());
    $videos = array();
    if (!empty($video_items) && is_array($video_items)) {
        foreach ($video_items as $v) {
            if (!empty($v['url'])) {
                $poster = '';
                if (!empty($v['poster'])) {
                    $poster = is_array($v['poster']) ? (isset($v['poster']['url']) ? $v['poster']['url'] : '') : (is_numeric($v['poster']) ? wp_get_attachment_image_url((int)$v['poster'], 'full') : $v['poster']);
                }
                $videos[] = array(
                    'url'    => $v['url'],
                    'title'  => isset($v['title']) ? $v['title'] : '',
                    'author' => isset($v['author']) ? $v['author'] : '',
                    'poster' => $poster,
                );
            }
        }
    }

    $review_items = lx_get_field('lx_customer_reviews', 'option', array());
    $reviews = array();
    if (!empty($review_items) && is_array($review_items)) {
        foreach ($review_items as $r) {
            if (!empty($r['name'])) {
                $r_img = '';
                if (!empty($r['image'])) {
                    $r_img = is_array($r['image']) ? (isset($r['image']['url']) ? $r['image']['url'] : '') : (is_numeric($r['image']) ? wp_get_attachment_image_url((int)$r['image'], 'full') : $r['image']);
                }
                $reviews[] = array(
                    'name'     => $r['name'],
                    'location' => isset($r['location']) ? $r['location'] : '',
                    'tag'      => isset($r['tag']) ? $r['tag'] : '',
                    'rating'   => isset($r['rating']) ? (int)$r['rating'] : 5,
                    'date'     => isset($r['date']) ? $r['date'] : '',
                    'content'  => isset($r['content']) ? $r['content'] : '',
                    'images'   => $r_img ? array($r_img) : array(),
                    'verified' => true,
                );
            }
        }
    }

    $feedback_gallery = lx_get_field('lx_feedback_gallery', 'option', array());
    $feedback_urls = array();
    if (!empty($feedback_gallery) && is_array($feedback_gallery)) {
        foreach ($feedback_gallery as $fb) {
            $u = is_array($fb) ? (isset($fb['url']) ? $fb['url'] : '') : $fb;
            if ($u) {
                $feedback_urls[] = $u;
            }
        }
    }

    $cert_gallery = lx_get_field('lx_certificate_gallery', 'option', array());
    $cert_urls = array();
    if (!empty($cert_gallery) && is_array($cert_gallery)) {
        foreach ($cert_gallery as $c) {
            $u = is_array($c) ? (isset($c['url']) ? $c['url'] : '') : $c;
            if ($u) {
                $cert_urls[] = $u;
            }
        }
    }

    $default_sheet = 'https://script.google.com/macros/s/AKfycbx2mCi48FGEQtg9pjX_YuWUxFbQdxe2aj5iUHDDj4-4s9qLyykE6EZySZ1V6UnZydHJ-A/exec';
    $sheet_url = lx_get_field('lx_sheet_endpoint', 'option', $default_sheet);

    $wp_config = array(
        'showPlaceholders'  => true,
        'productImages'     => array_values($product_images),
        'usageImage'        => lx_get_image_url('lx_usage_main_image', ''),
        'zoneImages'        => array(
            lx_get_image_url('lx_zone_1_image', ''),
            lx_get_image_url('lx_zone_2_image', ''),
            lx_get_image_url('lx_zone_3_image', ''),
            lx_get_image_url('lx_zone_4_image', ''),
        ),
        'problemImages'     => array(
            lx_get_image_url('lx_pain_1_image', ''),
            lx_get_image_url('lx_pain_2_image', ''),
            lx_get_image_url('lx_pain_3_image', ''),
            lx_get_image_url('lx_pain_4_image', ''),
        ),
        'ingredientImages'  => array(
            lx_get_image_url('lx_ing_1_image', ''),
            lx_get_image_url('lx_ing_2_image', ''),
            lx_get_image_url('lx_ing_3_image', ''),
            lx_get_image_url('lx_ing_4_image', ''),
        ),
        'stepImages'        => array(
            lx_get_image_url('lx_step_1_image', ''),
            lx_get_image_url('lx_step_2_image', ''),
            lx_get_image_url('lx_step_3_image', ''),
        ),
        'orderImage'        => lx_get_image_url('lx_order_image', ''),
        'videos'            => $videos,
        'reviews'           => $reviews,
        'feedbackImages'    => array_values($feedback_urls),
        'certificateImages' => array_values($cert_urls),
        'orderEndpoint'     => $sheet_url,
        'price'             => 49000,
        'listPrice'         => 89000,
        'packages'          => array(
            array('qty' => 1, 'name' => '1 chai 30ml', 'price' => 49000, 'oldPrice' => 89000, 'tag' => 'Tiết kiệm 45%'),
            array('qty' => 2, 'name' => 'Combo 2 chai 30ml', 'price' => 89000, 'oldPrice' => 178000, 'tag' => 'Bán chạy nhất · Tiết kiệm 50%'),
            array('qty' => 3, 'name' => 'Combo 3 chai 30ml', 'price' => 129000, 'oldPrice' => 267000, 'tag' => 'Tiết kiệm 52%'),
        ),
    );

    wp_localize_script('lx-landing-main', 'WP_CONFIG', $wp_config);
}
add_action('wp_enqueue_scripts', 'lx_enqueue_scripts');
