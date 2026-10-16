<?php
/**
 * Contact Form 7 Integration & Google Sheet Sync
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

// Disable automatic <p> and <br> wrapping in Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * 1. Đảm bảo form Contact Form 7 tiêu chuẩn cho Xịt Khử Mùi luôn tồn tại
 *
 * @return int|false Form ID or false
 */
function lx_ensure_cf7_form() {
    if (!class_exists('WPCF7_ContactForm')) {
        return false;
    }

    $form_content = '<div class="field">' . "\n"
        . '  <label for="fName">Họ và tên <i>*</i></label>' . "\n"
        . '  [text* your-name id:fName class:input autocomplete:name placeholder "Nhập họ và tên"]' . "\n"
        . '</div>' . "\n"
        . '<div class="field">' . "\n"
        . '  <label for="fPhone">Số điện thoại <i>*</i></label>' . "\n"
        . '  [tel* your-phone id:fPhone class:input autocomplete:tel placeholder "Nhập số điện thoại (10 chữ số)"]' . "\n"
        . '</div>' . "\n"
        . '<div class="field">' . "\n"
        . '  <label for="fAddress">Địa chỉ nhận hàng <i>*</i></label>' . "\n"
        . '  [textarea* your-address id:fAddress class:input autocomplete:street-address placeholder "Số nhà, tên đường, phường/xã, quận/huyện, tỉnh/thành..."]' . "\n"
        . '</div>' . "\n"
        . '<div class="field">' . "\n"
        . '  <span class="field-label">Chọn mua combo ưu đãi <i style="color:#e5484d; font-style:normal">*</i></span>' . "\n"
        . '  <div class="packages-wrap">[radio package use_label_element default:1 "1 chai 30ml – 49.000đ (giá gốc 89.000đ) + FREESHIP" "Combo 2 chai 30ml – 89.000đ (giá gốc 178.000đ) + FREESHIP" "Combo 3 chai 30ml – 129.000đ (giá gốc 267.000đ) + FREESHIP"]</div>' . "\n"
        . '</div>' . "\n"
        . '<div class="field">' . "\n"
        . '  <label for="fNote">Ghi chú (nếu có)</label>' . "\n"
        . '  [text your-note id:fNote class:input placeholder "Ví dụ: Giao giờ hành chính, gọi trước khi giao..."]' . "\n"
        . '</div>' . "\n"
        . '<div class="total-cf7" style="display:flex; justify-content:space-between; align-items:center; margin:16px 0; padding:12px 16px; background:#fff8f2; border-radius:12px; border:1px solid #ffd8b8;">' . "\n"
        . '  <span><strong>Tổng thanh toán:</strong> <small style="display:block; color:#d85c18;">Miễn phí vận chuyển toàn quốc</small></span>' . "\n"
        . '  <b id="cf7Total" style="font-size:22px; color:#d9531e;">49.000đ</b>' . "\n"
        . '</div>' . "\n"
        . '[submit class:btn class:btn-block id:submitBtn "Freeship toàn quốc – Đặt hàng ngay!"]' . "\n"
        . '<p class="form-note">(*) Vui lòng kiểm tra lại thông tin nhận hàng trước khi xác nhận đơn.</p>';

    $messages = array(
        'mail_sent_ok'             => '🎉 Cảm ơn bạn! Đơn đặt hàng đã được gửi thành công. Mây Mây sẽ liên hệ xác nhận đơn với bạn ngay!',
        'mail_sent_ng'             => '❌ Có lỗi xảy ra trong quá trình gửi đơn. Bạn vui lòng liên hệ hotline hoặc thử lại sau nhé.',
        'validation_error'         => '⚠️ Bạn vui lòng kiểm tra lại thông tin và điền đầy đủ các mục bắt buộc nhé!',
        'spam'                     => '❌ Có lỗi xảy ra trong quá trình gửi đơn. Bạn vui lòng thử lại sau nhé.',
        'accept_terms'             => 'Vui lòng đồng ý với các điều khoản trước khi gửi đơn.',
        'invalid_required'         => 'Vui lòng nhập thông tin vào trường này.',
        'invalid_tel'              => 'Số điện thoại chưa đúng định dạng (VD: 0901 234 567).',
        'invalid_radio'            => 'Vui lòng chọn gói sản phẩm phù hợp.',
    );

    // Kiểm tra xem form đã tồn tại chưa
    $existing = get_posts(array(
        'post_type'      => 'wpcf7_contact_form',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'title'          => 'Đặt Hàng Xịt Khử Mùi Mây Mây',
    ));

    if (!empty($existing)) {
        $fid = $existing[0]->ID;
        update_post_meta($fid, '_form', $form_content);
        update_post_meta($fid, '_messages', $messages);
        update_post_meta($fid, '_locale', 'vi');
        return $fid;
    }

    $form_id = wp_insert_post(array(
        'post_title'   => 'Đặt Hàng Xịt Khử Mùi Mây Mây',
        'post_type'    => 'wpcf7_contact_form',
        'post_status'  => 'publish',
    ));

    if ($form_id && !is_wp_error($form_id)) {
        $server_host = isset($_SERVER['SERVER_NAME']) ? sanitize_text_field($_SERVER['SERVER_NAME']) : 'khumui.homecarevietnam.com';
        $mail_tags = array(
            'active'    => true,
            'subject'   => 'Đơn đặt hàng Xịt Khử Mùi Mây Mây từ [your-name]',
            'sender'    => '[_site_title] <wordpress@' . $server_host . '>',
            'recipient' => get_option('admin_email'),
            'body'      => "Thông tin đơn hàng mới từ Landing Page:\n\n"
                         . "Họ tên: [your-name]\n"
                         . "Số điện thoại: [your-phone]\n"
                         . "Địa chỉ nhận hàng: [your-address]\n"
                         . "Gói chọn mua: [package]\n"
                         . "Ghi chú: [your-note]\n"
                         . "Thời gian: [_date] [_time]\n"
                         . "Trang gửi: [_url]\n",
        );

        update_post_meta($form_id, '_form', $form_content);
        update_post_meta($form_id, '_mail', $mail_tags);
        update_post_meta($form_id, '_messages', $messages);
        update_post_meta($form_id, '_locale', 'vi');
        return $form_id;
    }

    return false;
}
add_action('init', 'lx_ensure_cf7_form');

/**
 * 2. Tắt kiểm tra enum của CF7 SWV để hỗ trợ chọn radio linh hoạt
 */
add_action('wpcf7_init', function () {
    remove_action('wpcf7_swv_create_schema', 'wpcf7_swv_add_checkbox_enum_rules', 20);
    remove_action('wpcf7_swv_create_schema', 'wpcf7_swv_add_select_enum_rules', 20);
}, 20);

/**
 * 3. Tự động gửi dữ liệu đơn hàng Contact Form 7 sang Google Sheet Webhook
 *
 * @param WPCF7_ContactForm $contact_form
 */
function lx_cf7_save_to_google_sheet($contact_form) {
    if (!class_exists('WPCF7_Submission')) {
        return;
    }

    $submission = WPCF7_Submission::get_instance();
    if (!$submission) {
        return;
    }

    $posted_data = $submission->get_posted_data();
    $name    = sanitize_text_field(isset($posted_data['your-name']) ? $posted_data['your-name'] : (isset($posted_data['name']) ? $posted_data['name'] : ''));
    $phone   = sanitize_text_field(isset($posted_data['your-phone']) ? $posted_data['your-phone'] : (isset($posted_data['phone']) ? $posted_data['phone'] : ''));
    $address = sanitize_text_field(isset($posted_data['your-address']) ? $posted_data['your-address'] : (isset($posted_data['address']) ? $posted_data['address'] : ''));
    $note    = sanitize_text_field(isset($posted_data['your-note']) ? $posted_data['your-note'] : (isset($posted_data['note']) ? $posted_data['note'] : ''));

    $package_raw = isset($posted_data['package']) ? $posted_data['package'] : '';
    $package = is_array($package_raw) ? implode(', ', $package_raw) : (string)$package_raw;

    // Bỏ qua nếu thiếu họ tên hoặc số điện thoại
    if (empty($name) || empty($phone)) {
        return;
    }

    // Cơ chế chống gửi trùng đơn (Anti-duplicate lock trong 30 giây)
    $clean_phone = preg_replace('/[^0-9]/', '', $phone);
    $dup_transient_key = 'lx_lead_' . md5($clean_phone . '_' . $package);
    if (get_transient($dup_transient_key)) {
        return;
    }
    set_transient($dup_transient_key, 1, 30);

    // Lấy URL Web App Google Sheet từ ACF options hoặc hằng số
    $default_sheet = 'https://script.google.com/macros/s/AKfycbx2mCi48FGEQtg9pjX_YuWUxFbQdxe2aj5iUHDDj4-4s9qLyykE6EZySZ1V6UnZydHJ-A/exec';
    $sheet_url = lx_get_field('lx_sheet_endpoint', 'option', $default_sheet);
    if (empty($sheet_url)) {
        $sheet_url = $default_sheet;
    }

    if (!empty($sheet_url) && filter_var($sheet_url, FILTER_VALIDATE_URL)) {
        // Tự động phân loại giá tiền và số lượng chính xác
        $price = '49.000đ';
        $quantity = 1;
        if (strpos($package, '3 chai') !== false || strpos($package, '129.000') !== false) {
            $price = '129.000đ';
            $quantity = 3;
        } elseif (strpos($package, '2 chai') !== false || (strpos($package, '89.000') !== false && strpos($package, '1 chai') === false)) {
            $price = '89.000đ';
            $quantity = 2;
        } else {
            $price = '49.000đ';
            $quantity = 1;
        }

        $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? sanitize_text_field($_SERVER['HTTP_USER_AGENT']) : '';
        $page_url = wp_get_referer() ? wp_get_referer() : home_url();

        $payload = array(
            'time'       => current_time('d/m/Y H:i:s'),
            'name'       => $name,
            'phone'      => $phone,
            'address'    => $address,
            'package'    => $package,
            'product'    => $package ? $package : 'Xịt Khử Mùi Gừng Cam 30ml',
            'price'      => $price,
            'quantity'   => $quantity,
            'note'       => $note,
            'page'       => $page_url,
            'user_agent' => $user_agent,
        );

        // Đính kèm các tham số UTM Tracking nếu có
        $tracking_keys = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'fbclid', 'gclid', 'ttclid');
        foreach ($tracking_keys as $key) {
            if (!empty($_COOKIE[$key])) {
                $payload[$key] = sanitize_text_field($_COOKIE[$key]);
            } elseif (!empty($_GET[$key])) {
                $payload[$key] = sanitize_text_field($_GET[$key]);
            }
        }

        // Gửi ngầm không chặn luồng (Non-blocking) để form phản hồi tức thì
        wp_remote_post($sheet_url, array(
            'method'      => 'POST',
            'timeout'     => 15,
            'redirection' => 5,
            'blocking'    => false,
            'body'        => $payload,
        ));
    }
}
add_action('wpcf7_mail_sent', 'lx_cf7_save_to_google_sheet');

/**
 * 4. Render Contact Form 7 hoặc HTML Fallback
 *
 * @return string HTML
 */
function lx_render_order_form() {
    $shortcode = lx_get_field('lx_cf7_shortcode', 'option', '');

    if (!empty($shortcode)) {
        return do_shortcode($shortcode);
    }

    if (class_exists('WPCF7_ContactForm')) {
        $form_id = lx_ensure_cf7_form();
        if ($form_id) {
            return do_shortcode('[contact-form-7 id="' . $form_id . '" title="Đặt Hàng Xịt Khử Mùi Mây Mây"]');
        }
    }

    // Form tĩnh fallback nếu chưa kích hoạt CF7
    ob_start();
    ?>
    <form id="orderForm" novalidate>
      <div class="field">
        <label for="fName">Họ và tên</label>
        <input id="fName" name="name" type="text" autocomplete="name" placeholder="Nhập họ và tên">
        <div class="err">Vui lòng nhập họ và tên.</div>
      </div>
      <div class="field">
        <label for="fPhone">Số điện thoại</label>
        <input id="fPhone" name="phone" type="tel" inputmode="numeric" autocomplete="tel" placeholder="Nhập số điện thoại">
        <div class="err">Số điện thoại gồm 10 số, bắt đầu bằng 0.</div>
      </div>
      <div class="field">
        <label for="fAddress">Địa chỉ nhận hàng</label>
        <textarea id="fAddress" name="address" autocomplete="street-address" placeholder="Số nhà, đường, phường/xã, quận/huyện, tỉnh/thành"></textarea>
        <div class="err">Vui lòng nhập địa chỉ nhận hàng.</div>
      </div>
      <div class="field">
        <span class="field-label">Chọn mua</span>
        <div class="packages" id="packages"></div>
      </div>
      <div class="total">
        <span>Tổng thanh toán<small>Miễn phí vận chuyển</small></span>
        <b id="total">49.000đ</b>
      </div>
      <button type="submit" class="btn btn-block" id="submitBtn">Đặt hàng ngay</button>
      <p class="form-note">(*) Vui lòng kiểm tra lại thông tin nhận hàng trước khi xác nhận đơn.</p>
    </form>
    <?php
    return ob_get_clean();
}
