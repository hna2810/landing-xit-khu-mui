<?php
/**
 * ACF Options Page and Fields for Landing Xịt Khử Mùi
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Đăng ký trang cài đặt Theme Options trong WP Admin
 */
function lx_register_theme_options_page() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => __('Cài đặt Landing Page Xịt Khử Mùi', 'lx-landing'),
            'menu_title' => __('Cài đặt Landing Page', 'lx-landing'),
            'menu_slug'  => 'lx-landing-settings',
            'capability' => 'manage_options',
            'position'   => 59,
            'icon_url'   => 'dashicons-tagcloud',
            'redirect'   => false,
        ));
    }
}
add_action('acf/init', 'lx_register_theme_options_page');

/**
 * 2. Đăng ký nhóm trường ACF Local Field Group
 */
function lx_register_acf_field_group() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_lx_landing_xit_khu_mui',
        'title' => __('Nội dung Landing Page Xịt Khử Mùi', 'lx-landing'),
        'fields' => array(
            // ── TAB 1: HERO (VIDEO / ẢNH & NỘI DUNG) ───────────────
            array(
                'key' => 'field_tab_hero',
                'label' => __('1. Hero (Video / Ảnh & Nội dung)', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_hero_media_type',
                'label' => __('Loại hiển thị Hero Packshot', 'lx-landing'),
                'name' => 'lx_hero_media_type',
                'type' => 'radio',
                'choices' => array(
                    'video' => __('Video (Khuyên dùng)', 'lx-landing'),
                    'image' => __('Ảnh tĩnh', 'lx-landing'),
                ),
                'default_value' => 'video',
                'layout' => 'horizontal',
            ),
            array(
                'key' => 'field_lx_hero_video_url',
                'label' => __('Link Video Hero (YouTube hoặc MP4 trực tiếp)', 'lx-landing'),
                'name' => 'lx_hero_video_url',
                'type' => 'text',
                'instructions' => __('Dán link YouTube (https://www.youtube.com/watch?v=...) hoặc link MP4. Nếu để trống cả ô này và ô tải file bên dưới, hệ thống sẽ phát video mặc định của theme.', 'lx-landing'),
                'placeholder' => 'https://www.youtube.com/watch?v=... hoặc https://.../video.mp4',
            ),
            array(
                'key' => 'field_lx_hero_video_ratio',
                'label' => __('Tỷ lệ hiển thị Video', 'lx-landing'),
                'name' => 'lx_hero_video_ratio',
                'type' => 'select',
                'choices' => array(
                    '1:1'  => __('Vuông 1:1 (Hiển thị đầy đủ video vuông, không cắt viền)', 'lx-landing'),
                    '16:9' => __('Ngang 16:9 (Chuẩn màn hình ngang)', 'lx-landing'),
                    '4:5'  => __('Dọc 4:5 (Dọc tiêu chuẩn)', 'lx-landing'),
                    '9:16' => __('Dọc 9:16 (Shorts / Reels / TikTok)', 'lx-landing'),
                ),
                'default_value' => '1:1',
                'instructions' => __('Khuyên dùng tỷ lệ Vuông 1:1 cho video quảng cáo / review để hiển thị trọn vẹn cả tiêu đề và nội dung.', 'lx-landing'),
            ),
            array(
                'key' => 'field_lx_hero_video_file',
                'label' => __('Hoặc Tải lên File Video (.mp4 / .webm)', 'lx-landing'),
                'name' => 'lx_hero_video_file',
                'type' => 'file',
                'instructions' => __('Tải lên file video trực tiếp từ máy tính lên WordPress.', 'lx-landing'),
                'return_format' => 'url',
                'mime_types' => 'mp4,webm,mov',
            ),
            array(
                'key' => 'field_lx_hero_video_poster',
                'label' => __('Ảnh bìa Video (Poster)', 'lx-landing'),
                'name' => 'lx_hero_video_poster',
                'type' => 'image',
                'instructions' => __('Ảnh hiển thị khi video chưa kịp tải. Nếu để trống sẽ tự động lấy ảnh sản phẩm bên dưới.', 'lx-landing'),
                'return_format' => 'url',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_lx_hero_product_image',
                'label' => __('Ảnh sản phẩm tách nền (Hero Packshot / Poster)', 'lx-landing'),
                'name' => 'lx_hero_product_image',
                'type' => 'image',
                'instructions' => __('Tải lên ảnh chai xịt khử mùi đã tách nền (PNG/WebP trong suốt). Dùng làm ảnh chính khi chọn loại hiển thị "Ảnh tĩnh" hoặc làm poster video.', 'lx-landing'),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_lx_hero_gallery',
                'label' => __('Ảnh sản phẩm phụ (Gallery)', 'lx-landing'),
                'name' => 'lx_hero_gallery',
                'type' => 'gallery',
                'instructions' => __('Các góc chụp khác của sản phẩm hoặc ảnh lifestyle.', 'lx-landing'),
                'return_format' => 'url',
                'insert' => 'append',
                'library' => 'all',
            ),
            array(
                'key' => 'field_lx_hero_badge',
                'label' => __('Nhãn phụ trên tiêu đề (Tùy chọn)', 'lx-landing'),
                'name' => 'lx_hero_badge',
                'type' => 'text',
                'instructions' => __('Để trống nếu không muốn hiển thị nhãn phụ.', 'lx-landing'),
                'default_value' => '',
            ),
            array(
                'key' => 'field_lx_hero_title',
                'label' => __('Tiêu đề chính Hero', 'lx-landing'),
                'name' => 'lx_hero_title',
                'type' => 'text',
                'default_value' => 'Đừng để mùi cơ thể làm bạn mất tự tin.',
            ),
            array(
                'key' => 'field_lx_hero_lead',
                'label' => __('Mô tả ngắn Hero', 'lx-landing'),
                'name' => 'lx_hero_lead',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Khử mùi hôi nách, chân và cơ thể với hương thảo mộc thanh mát.',
            ),
            array(
                'key' => 'field_lx_hero_price',
                'label' => __('Giá khuyến mãi', 'lx-landing'),
                'name' => 'lx_hero_price',
                'type' => 'text',
                'default_value' => '49.000đ',
            ),
            array(
                'key' => 'field_lx_hero_old_price',
                'label' => __('Giá niêm yết cũ', 'lx-landing'),
                'name' => 'lx_hero_old_price',
                'type' => 'text',
                'default_value' => '89.000đ',
            ),
            array(
                'key' => 'field_lx_hero_discount_tag',
                'label' => __('Tag giảm giá', 'lx-landing'),
                'name' => 'lx_hero_discount_tag',
                'type' => 'text',
                'default_value' => 'Flash sale −45%',
            ),
            array(
                'key' => 'field_lx_hero_btn_text',
                'label' => __('Chữ trên nút đặt hàng Hero', 'lx-landing'),
                'name' => 'lx_hero_btn_text',
                'type' => 'text',
                'default_value' => 'FREESHIP - Mua Ngay!',
            ),

            // ── TAB 2: NỖI LO THẦM KÍN ───────────────────────────────
            array(
                'key' => 'field_tab_pain',
                'label' => __('2. Nỗi lo thầm kín', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_pain_1_image',
                'label' => __('Ảnh thẻ 1: Hôi nách', 'lx-landing'),
                'name' => 'lx_pain_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_pain_1_title',
                'label' => __('Tiêu đề thẻ 1', 'lx-landing'),
                'name' => 'lx_pain_1_title',
                'type' => 'text',
                'default_value' => 'Hôi nách',
            ),
            array(
                'key' => 'field_lx_pain_1_desc',
                'label' => __('Mô tả thẻ 1', 'lx-landing'),
                'name' => 'lx_pain_1_desc',
                'type' => 'text',
                'default_value' => 'Ngại giơ tay, đứng gần người khác, lo mùi quay trở lại.',
            ),
            array(
                'key' => 'field_lx_pain_2_image',
                'label' => __('Ảnh thẻ 2: Hôi chân', 'lx-landing'),
                'name' => 'lx_pain_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_pain_2_title',
                'label' => __('Tiêu đề thẻ 2', 'lx-landing'),
                'name' => 'lx_pain_2_title',
                'type' => 'text',
                'default_value' => 'Hôi chân',
            ),
            array(
                'key' => 'field_lx_pain_2_desc',
                'label' => __('Mô tả thẻ 2', 'lx-landing'),
                'name' => 'lx_pain_2_desc',
                'type' => 'text',
                'default_value' => 'Mang giày cả ngày, ngại tháo giày vì mùi khó chịu.',
            ),
            array(
                'key' => 'field_lx_pain_3_image',
                'label' => __('Ảnh thẻ 3: Mùi cơ thể', 'lx-landing'),
                'name' => 'lx_pain_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_pain_3_title',
                'label' => __('Tiêu đề thẻ 3', 'lx-landing'),
                'name' => 'lx_pain_3_title',
                'type' => 'text',
                'default_value' => 'Mùi cơ thể',
            ),
            array(
                'key' => 'field_lx_pain_3_desc',
                'label' => __('Mô tả thẻ 3', 'lx-landing'),
                'name' => 'lx_pain_3_desc',
                'type' => 'text',
                'default_value' => 'Đi làm, gặp gỡ hay hẹn hò đều thấp thỏm vì mùi mồ hôi.',
            ),
            array(
                'key' => 'field_lx_pain_4_image',
                'label' => __('Ảnh thẻ 4: Bà đẻ sau sinh', 'lx-landing'),
                'name' => 'lx_pain_4_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_pain_4_title',
                'label' => __('Tiêu đề thẻ 4', 'lx-landing'),
                'name' => 'lx_pain_4_title',
                'type' => 'text',
                'default_value' => 'Bà đẻ sau sinh',
            ),
            array(
                'key' => 'field_lx_pain_4_desc',
                'label' => __('Mô tả thẻ 4', 'lx-landing'),
                'name' => 'lx_pain_4_desc',
                'type' => 'text',
                'default_value' => 'Mùi sữa, cơ thể mẹ có mùi chua, hôi, khó chịu. Mùi vùng cô bé.',
            ),

            // ── TAB 3: THÀNH PHẦN THẢO MỘC ──────────────────────────
            array(
                'key' => 'field_tab_ingredients',
                'label' => __('3. Thành phần', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_ing_label',
                'label' => __('Nhãn đầu mục (Label tag)', 'lx-landing'),
                'name' => 'lx_ing_label',
                'type' => 'text',
                'default_value' => 'Xịt khử mùi gừng cam Mây Mây',
                'placeholder' => 'Xịt khử mùi gừng cam Mây Mây',
            ),
            array(
                'key' => 'field_lx_ing_1_image',
                'label' => __('Ảnh thành phần 1: Bạc hà', 'lx-landing'),
                'name' => 'lx_ing_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ing_1_role',
                'label' => __('Công dụng thành phần 1 (Bạc hà)', 'lx-landing'),
                'name' => 'lx_ing_1_role',
                'type' => 'text',
                'default_value' => 'Làm mát dịu tức thì, thanh lọc mùi khó chịu.',
            ),
            array(
                'key' => 'field_lx_ing_2_image',
                'label' => __('Ảnh thành phần 2: Trầu không', 'lx-landing'),
                'name' => 'lx_ing_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ing_2_role',
                'label' => __('Công dụng thành phần 2 (Trầu không)', 'lx-landing'),
                'name' => 'lx_ing_2_role',
                'type' => 'text',
                'default_value' => 'Kháng khuẩn tự nhiên, giảm tiết mồ hôi vùng nách.',
            ),
            array(
                'key' => 'field_lx_ing_3_image',
                'label' => __('Ảnh thành phần 3: Gừng', 'lx-landing'),
                'name' => 'lx_ing_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ing_3_role',
                'label' => __('Công dụng thành phần 3 (Gừng)', 'lx-landing'),
                'name' => 'lx_ing_3_role',
                'type' => 'text',
                'default_value' => 'Khử mùi sâu, giữ bề mặt da ấm áp và khô thoáng.',
            ),
            array(
                'key' => 'field_lx_ing_4_image',
                'label' => __('Ảnh thành phần 4: Cam', 'lx-landing'),
                'name' => 'lx_ing_4_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ing_4_role',
                'label' => __('Công dụng thành phần 4 (Cam)', 'lx-landing'),
                'name' => 'lx_ing_4_role',
                'type' => 'text',
                'default_value' => 'Hương thơm ngọt dịu, dưỡng sáng vùng da thâm sạm.',
            ),

            // ── TAB 4: CÔNG DỤNG THEO VÙNG ───────────────────────────
            array(
                'key' => 'field_tab_usage',
                'label' => __('4. Công dụng theo vùng', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_usage_main_image',
                'label' => __('Ảnh đại diện công dụng (Packshot/Lifestyle)', 'lx-landing'),
                'name' => 'lx_usage_main_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_zone_1_image',
                'label' => __('Ảnh vùng nách (Zone 1)', 'lx-landing'),
                'name' => 'lx_zone_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_zone_2_image',
                'label' => __('Ảnh vùng chân (Zone 2)', 'lx-landing'),
                'name' => 'lx_zone_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_zone_3_image',
                'label' => __('Ảnh cơ thể (Zone 3)', 'lx-landing'),
                'name' => 'lx_zone_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_zone_4_image',
                'label' => __('Ảnh vùng tiểu EVA (Zone 4)', 'lx-landing'),
                'name' => 'lx_zone_4_image',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // ── TAB 5: 3 BƯỚC SỬ DỤNG ────────────────────────────────
            array(
                'key' => 'field_tab_steps',
                'label' => __('5. 3 Bước sử dụng', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_step_1_image',
                'label' => __('Ảnh Bước 1 (Lắc nhẹ)', 'lx-landing'),
                'name' => 'lx_step_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_step_2_image',
                'label' => __('Ảnh Bước 2 (Xịt lên da)', 'lx-landing'),
                'name' => 'lx_step_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_step_3_image',
                'label' => __('Ảnh Bước 3 (Để khô)', 'lx-landing'),
                'name' => 'lx_step_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // ── TAB 6: VIDEO REVIEW ──────────────────────────────────
            array(
                'key' => 'field_tab_videos',
                'label' => __('6. Video Review', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_video_reviews',
                'label' => __('Danh sách Video Review', 'lx-landing'),
                'name' => 'lx_video_reviews',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => __('+ Thêm Video Review', 'lx-landing'),
                'sub_fields' => array(
                    array(
                        'key' => 'field_sub_video_url',
                        'label' => __('Link Video (YouTube, TikTok hoặc file MP4)', 'lx-landing'),
                        'name' => 'url',
                        'type' => 'text',
                        'placeholder' => 'https://www.tiktok.com/@.../video/... hoặc https://youtube.com/...',
                    ),
                    array(
                        'key' => 'field_sub_video_title',
                        'label' => __('Tiêu đề video', 'lx-landing'),
                        'name' => 'title',
                        'type' => 'text',
                        'placeholder' => 'Review sau 1 tuần dùng...',
                    ),
                    array(
                        'key' => 'field_sub_video_author',
                        'label' => __('Tác giả / Tên kênh', 'lx-landing'),
                        'name' => 'author',
                        'type' => 'text',
                        'placeholder' => '@ten_tiktok',
                    ),
                    array(
                        'key' => 'field_sub_video_poster',
                        'label' => __('Ảnh bìa video (Poster)', 'lx-landing'),
                        'name' => 'poster',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                ),
            ),

            // ── TAB 7: ĐÁNH GIÁ KHÁCH HÀNG ───────────────────────────
            array(
                'key' => 'field_tab_reviews',
                'label' => __('7. Đánh giá khách hàng', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_review_total_display',
                'label' => __('Tổng số lượt đánh giá hiển thị (Social Proof)', 'lx-landing'),
                'name' => 'lx_review_total_display',
                'type' => 'text',
                'instructions' => __('Số lượt đánh giá hiển thị ở Section 1 Hero và phần Tóm tắt Đánh giá (VD: 1.680 hoặc 2.450). Hệ thống vẫn hiển thị 53 nhận xét chi tiết bên dưới.', 'lx-landing'),
                'default_value' => '1.680',
                'placeholder' => '1.680',
            ),
            array(
                'key' => 'field_lx_review_rating_score',
                'label' => __('Điểm đánh giá trung bình hiển thị', 'lx-landing'),
                'name' => 'lx_review_rating_score',
                'type' => 'text',
                'instructions' => __('Điểm sao trung bình hiển thị (VD: 4.9 hoặc 5.0).', 'lx-landing'),
                'default_value' => '4.9',
                'placeholder' => '4.9',
            ),
            array(
                'key' => 'field_lx_customer_reviews',
                'label' => __('Danh sách Đánh giá thật', 'lx-landing'),
                'name' => 'lx_customer_reviews',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => __('+ Thêm Đánh giá', 'lx-landing'),
                'sub_fields' => array(
                    array(
                        'key' => 'field_sub_rev_name',
                        'label' => __('Tên khách hàng', 'lx-landing'),
                        'name' => 'name',
                        'type' => 'text',
                        'placeholder' => 'Chị Thu Lan',
                    ),
                    array(
                        'key' => 'field_sub_rev_location',
                        'label' => __('Địa phương', 'lx-landing'),
                        'name' => 'location',
                        'type' => 'text',
                        'placeholder' => 'Hà Nội',
                    ),
                    array(
                        'key' => 'field_sub_rev_tag',
                        'label' => __('Tag phân loại', 'lx-landing'),
                        'name' => 'tag',
                        'type' => 'text',
                        'placeholder' => 'Mẹ sau sinh / Dân văn phòng...',
                    ),
                    array(
                        'key' => 'field_sub_rev_rating',
                        'label' => __('Số sao đánh giá', 'lx-landing'),
                        'name' => 'rating',
                        'type' => 'number',
                        'default_value' => 5,
                        'min' => 1,
                        'max' => 5,
                    ),
                    array(
                        'key' => 'field_sub_rev_date',
                        'label' => __('Ngày đánh giá', 'lx-landing'),
                        'name' => 'date',
                        'type' => 'text',
                        'placeholder' => '15/10/2026',
                    ),
                    array(
                        'key' => 'field_sub_rev_content',
                        'label' => __('Nội dung đánh giá', 'lx-landing'),
                        'name' => 'content',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_sub_rev_image',
                        'label' => __('Ảnh kèm theo đánh giá (nếu có)', 'lx-landing'),
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                ),
            ),

            // ── TAB 8: FEEDBACK TIN NHẮN (2 HÀNG) ───────────────────
            array(
                'key' => 'field_tab_feedback',
                'label' => __('8. Feedback khách hàng (2 hàng)', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_feedback_gallery_34',
                'label' => __('Hàng 1: Ảnh feedback dọc 3:4 (Chụp tin nhắn Zalo, Messenger, SMS...)', 'lx-landing'),
                'name' => 'lx_feedback_gallery_34',
                'type' => 'gallery',
                'instructions' => __('Tải lên các ảnh feedback dạng dọc tỷ lệ 3:4 (chụp màn hình tin nhắn, review trên điện thoại).', 'lx-landing'),
                'return_format' => 'url',
                'insert' => 'append',
                'library' => 'all',
            ),
            array(
                'key' => 'field_lx_feedback_gallery_11',
                'label' => __('Hàng 2: Ảnh feedback vuông 1:1 (Ảnh thực tế, cận cảnh sản phẩm)', 'lx-landing'),
                'name' => 'lx_feedback_gallery_11',
                'type' => 'gallery',
                'instructions' => __('Tải lên các ảnh feedback tỷ lệ vuông 1:1 (khách cầm sản phẩm trên tay, ảnh cận cảnh chai xịt...).', 'lx-landing'),
                'return_format' => 'url',
                'insert' => 'append',
                'library' => 'all',
            ),
            array(
                'key' => 'field_lx_feedback_gallery',
                'label' => __('Ảnh feedback chung (Dự phòng / Legacy)', 'lx-landing'),
                'name' => 'lx_feedback_gallery',
                'type' => 'gallery',
                'instructions' => __('Nếu để trống 2 hàng trên, hệ thống sẽ tự động chia đều thư viện này cho cả 2 hàng slider.', 'lx-landing'),
                'return_format' => 'url',
                'insert' => 'append',
                'library' => 'all',
            ),

            // ── TAB 9: CAM KẾT & CHỨNG NHẬN ──────────────────────────
            array(
                'key' => 'field_tab_trust',
                'label' => __('9. Chứng nhận & Cam kết', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_cert_doc_image',
                'label' => __('1. Ảnh Giấy công bố mỹ phẩm (dọc 3:4)', 'lx-landing'),
                'name' => 'lx_cert_doc_image',
                'type' => 'image',
                'instructions' => __('Tải lên ảnh chụp Giấy công bố mỹ phẩm số 60/26/CBMP-NB (khuyên dùng ảnh dọc tỷ lệ 3:4).', 'lx-landing'),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_lx_cert_stamp_image',
                'label' => __('2. Ảnh Tem chống hàng giả (dọc 3:4)', 'lx-landing'),
                'name' => 'lx_cert_stamp_image',
                'type' => 'image',
                'instructions' => __('Tải lên ảnh chụp Tem chống hàng giả / tem xác thực chính hãng (khuyên dùng ảnh dọc tỷ lệ 3:4).', 'lx-landing'),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_lx_certificate_gallery',
                'label' => __('Ảnh bổ sung khác (nếu có)', 'lx-landing'),
                'name' => 'lx_certificate_gallery',
                'type' => 'gallery',
                'instructions' => __('Ảnh chụp chứng nhận, kiểm nghiệm phụ khác (nếu có)...', 'lx-landing'),
                'return_format' => 'url',
                'insert' => 'append',
                'library' => 'all',
            ),

            // ── TAB 10: ĐẶT HÀNG & FLASH SALE ─────────────────────────
            array(
                'key' => 'field_tab_form',
                'label' => __('10. Đặt hàng & Flash Sale', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_timer_enable',
                'label' => __('Bật đồng hồ đếm ngược Flash Sale', 'lx-landing'),
                'name' => 'lx_timer_enable',
                'type' => 'true_false',
                'instructions' => __('Bật hoặc tắt thanh đếm ngược thời gian ưu đãi phía trên ảnh sản phẩm.', 'lx-landing'),
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'field_lx_timer_title',
                'label' => __('Tiêu đề đồng hồ đếm ngược', 'lx-landing'),
                'name' => 'lx_timer_title',
                'type' => 'text',
                'default_value' => 'Flash sale kết thúc sau',
                'placeholder' => 'Flash sale kết thúc sau',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_lx_timer_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_lx_timer_type',
                'label' => __('Cách tính thời gian đếm ngược', 'lx-landing'),
                'name' => 'lx_timer_type',
                'type' => 'select',
                'choices' => array(
                    'hours'    => __('Đếm ngược theo số giờ (Tự động lặp lại cho mỗi khách)', 'lx-landing'),
                    'datetime' => __('Đếm ngược tới ngày & giờ cụ thể', 'lx-landing'),
                    'daily'    => __('Đếm ngược tới hết ngày hôm nay (23:59:59)', 'lx-landing'),
                ),
                'default_value' => 'hours',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_lx_timer_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_lx_timer_hours',
                'label' => __('Số giờ đếm ngược', 'lx-landing'),
                'name' => 'lx_timer_hours',
                'type' => 'number',
                'instructions' => __('Nhập số giờ đếm ngược (VD: 2, 4, 6, 8, 12, 24 giờ). Đồng hồ sẽ đếm ngược liên tục trong số giờ này.', 'lx-landing'),
                'default_value' => 8,
                'min' => 0.5,
                'max' => 168,
                'step' => 0.5,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_lx_timer_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'field_lx_timer_type',
                            'operator' => '==',
                            'value' => 'hours',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_lx_timer_end_datetime',
                'label' => __('Thời điểm kết thúc (Ngày & Giờ)', 'lx-landing'),
                'name' => 'lx_timer_end_datetime',
                'type' => 'date_time_picker',
                'instructions' => __('Chọn ngày giờ cụ thể kết thúc Flash sale (VD: 2026-10-31 23:59:59).', 'lx-landing'),
                'display_format' => 'd/m/Y H:i:s',
                'return_format' => 'Y-m-d H:i:s',
                'first_day' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_lx_timer_enable',
                            'operator' => '==',
                            'value' => '1',
                        ),
                        array(
                            'field' => 'field_lx_timer_type',
                            'operator' => '==',
                            'value' => 'datetime',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_lx_sheet_endpoint',
                'label' => __('URL Web App Google Sheet', 'lx-landing'),
                'name' => 'lx_sheet_endpoint',
                'type' => 'url',
                'instructions' => __('Đường dẫn webhook Google Apps Script để đẩy lead tự động vào Google Sheet.', 'lx-landing'),
                'default_value' => 'https://script.google.com/macros/s/AKfycbx2mCi48FGEQtg9pjX_YuWUxFbQdxe2aj5iUHDDj4-4s9qLyykE6EZySZ1V6UnZydHJ-A/exec',
            ),
            array(
                'key' => 'field_lx_cf7_shortcode',
                'label' => __('Shortcode Contact Form 7 tùy biến', 'lx-landing'),
                'name' => 'lx_cf7_shortcode',
                'type' => 'text',
                'instructions' => __('Để trống để tự động sử dụng form đặt hàng tiêu chuẩn của theme.', 'lx-landing'),
                'placeholder' => '[contact-form-7 id="..." title="..."]',
            ),
            array(
                'key' => 'field_lx_order_image',
                'label' => __('Ảnh sản phẩm cạnh Form đặt hàng', 'lx-landing'),
                'name' => 'lx_order_image',
                'type' => 'image',
                'instructions' => __('Ảnh sản phẩm hiển thị bên trái form đặt hàng. Để trống sẽ dùng ảnh Hero.', 'lx-landing'),
                'return_format' => 'url',
            ),

            // ── TAB 11: THÔNG SỐ & FAQ ───────────────────────────────
            array(
                'key' => 'field_tab_faq',
                'label' => __('11. Thông số & FAQ', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_spec_capacity',
                'label' => __('Dung tích sản phẩm', 'lx-landing'),
                'name' => 'lx_spec_capacity',
                'type' => 'text',
                'default_value' => '30ml',
            ),
            array(
                'key' => 'field_lx_spec_cbmp',
                'label' => __('Số công bố mỹ phẩm', 'lx-landing'),
                'name' => 'lx_spec_cbmp',
                'type' => 'text',
                'default_value' => '60/26/CBMP-NB',
            ),
            array(
                'key' => 'field_lx_spec_expiry',
                'label' => __('Hạn sử dụng', 'lx-landing'),
                'name' => 'lx_spec_expiry',
                'type' => 'text',
                'default_value' => '02 năm',
            ),
            array(
                'key' => 'field_lx_spec_storage',
                'label' => __('Bảo quản', 'lx-landing'),
                'name' => 'lx_spec_storage',
                'type' => 'text',
                'default_value' => 'Nơi khô thoáng, tránh ánh nắng trực tiếp.',
            ),
            array(
                'key' => 'field_lx_faq_items',
                'label' => __('Danh sách câu hỏi thường gặp (FAQ)', 'lx-landing'),
                'name' => 'lx_faq_items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => __('+ Thêm Câu hỏi FAQ', 'lx-landing'),
                'sub_fields' => array(
                    array(
                        'key' => 'field_sub_faq_q',
                        'label' => __('Câu hỏi', 'lx-landing'),
                        'name' => 'question',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_sub_faq_a',
                        'label' => __('Câu trả lời', 'lx-landing'),
                        'name' => 'answer',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                ),
            ),

            // ── TAB 12: CHÂN TRANG (FOOTER) ──────────────────────────
            array(
                'key' => 'field_tab_footer',
                'label' => __('12. Chân trang (Footer)', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_footer_logo',
                'label' => __('Logo tròn chân trang', 'lx-landing'),
                'name' => 'lx_footer_logo',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_footer_url',
                'label' => __('Link website chính (trỏ về)', 'lx-landing'),
                'name' => 'lx_footer_url',
                'type' => 'url',
                'default_value' => 'https://homecarevietnam.com',
            ),
            array(
                'key' => 'field_lx_footer_title',
                'label' => __('Tên thương hiệu / Slogan chân trang', 'lx-landing'),
                'name' => 'lx_footer_title',
                'type' => 'text',
                'default_value' => 'Mây Mây - Tự Tin Tỏa Sáng',
            ),
            array(
                'key' => 'field_lx_footer_hotline_display',
                'label' => __('Hotline hiển thị', 'lx-landing'),
                'name' => 'lx_footer_hotline_display',
                'type' => 'text',
                'default_value' => '0973.871.376 - 0962.131.515',
            ),
            array(
                'key' => 'field_lx_hotline_tel',
                'label' => __('Số điện thoại gọi Hotline (nút gọi nhanh)', 'lx-landing'),
                'name' => 'lx_hotline_tel',
                'type' => 'text',
                'default_value' => '0973871376',
            ),
            array(
                'key' => 'field_lx_zalo_number',
                'label' => __('Số điện thoại Zalo (nút Zalo nhanh)', 'lx-landing'),
                'name' => 'lx_zalo_number',
                'type' => 'text',
                'default_value' => '0973871376',
            ),
            array(
                'key' => 'field_lx_footer_company',
                'label' => __('Tên công ty doanh nghiệp', 'lx-landing'),
                'name' => 'lx_footer_company',
                'type' => 'text',
                'default_value' => 'CÔNG TY TNHH CHĂM SÓC MẸ VÀ BÉ TẠI NHÀ HOME CARE',
            ),
            array(
                'key' => 'field_lx_footer_address',
                'label' => __('Địa chỉ công ty', 'lx-landing'),
                'name' => 'lx_footer_address',
                'type' => 'text',
                'default_value' => 'Địa chỉ: 20 Huy Du, Phường Từ Liêm, TP Hà Nội, Việt Nam.',
            ),
            array(
                'key' => 'field_lx_footer_tax',
                'label' => __('Mã số thuế / Giấy phép kinh doanh', 'lx-landing'),
                'name' => 'lx_footer_tax',
                'type' => 'text',
                'default_value' => 'Mã số doanh nghiệp: 0107375668 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 29/03/2016',
            ),
            array(
                'key' => 'field_lx_footer_copy',
                'label' => __('Dòng bản quyền chân trang', 'lx-landing'),
                'name' => 'lx_footer_copy',
                'type' => 'text',
                'default_value' => '© 2026 Home Care. All rights reserved.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'lx-landing-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));
}
add_action('acf/init', 'lx_register_acf_field_group');
