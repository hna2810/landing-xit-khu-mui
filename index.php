<?php
/**
 * Main Template File for Landing Xịt Khử Mùi
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// 1. Hero Section
get_template_part('template-parts/hero');

// 2. Proof Strip
get_template_part('template-parts/strip');

// 3. Pain Points
get_template_part('template-parts/pain');

// 4. Ingredients
get_template_part('template-parts/ingredients');

// 5. Usage & Benefits by Zone
get_template_part('template-parts/usage');

// 6. Video Reviews
get_template_part('template-parts/video-reviews');

// 7. 3 Steps How to Use
get_template_part('template-parts/steps');

// 8. Customer Reviews
get_template_part('template-parts/reviews');

// 9. Feedback Screenshots
get_template_part('template-parts/feedback');

// 10. Trust & Certificates
get_template_part('template-parts/trust');

// 11. Specifications Table
get_template_part('template-parts/specs');

// 12. Order Form & Flash Sale
get_template_part('template-parts/order');

// 13. FAQ Accordion
get_template_part('template-parts/faq');

get_footer();
