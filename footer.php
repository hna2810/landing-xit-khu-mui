<?php
/**
 * Footer template for Landing Xịt Khử Mùi Theme
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}
$footer_url     = lx_get_field('lx_footer_url', 'option', 'https://homecarevietnam.com');
if (empty($footer_url)) {
    $footer_url = 'https://homecarevietnam.com';
}
$footer_logo    = lx_get_image_url('lx_footer_logo', '', 'option');
$footer_title   = lx_get_field('lx_footer_title', 'option', 'Mây Mây - Tự Tin Tỏa Sáng');
$footer_company = lx_get_field('lx_footer_company', 'option', 'CÔNG TY TNHH CHĂM SÓC MẸ VÀ BÉ TẠI NHÀ HOME CARE');
$footer_address = lx_get_field('lx_footer_address', 'option', 'Địa chỉ: 20 Huy Du, Phường Từ Liêm, TP Hà Nội, Việt Nam.');
$footer_tax     = lx_get_field('lx_footer_tax', 'option', 'Mã số doanh nghiệp: 0107375668 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 29/03/2016');
$hotline_raw    = lx_get_field('lx_footer_hotline_display', 'option', '0973.871.376 - 0962.131.515');
$footer_copy    = lx_get_field('lx_footer_copy', 'option', '© 2026 Home Care. All rights reserved.');

$hotline_tel_acf = lx_get_field('lx_hotline_tel', 'option', '');
$zalo_num_acf    = lx_get_field('lx_zalo_number', 'option', '');
$hotline_clean   = !empty($hotline_tel_acf) ? preg_replace('/[^0-9+]/', '', $hotline_tel_acf) : '0973871376';
$zalo_clean      = !empty($zalo_num_acf) ? preg_replace('/[^0-9]/', '', $zalo_num_acf) : '0973871376';
$hotline_disp    = !empty($hotline_tel_acf) ? $hotline_tel_acf : '0973.871.376';

$hotlines = explode('-', $hotline_raw);
$hotline_links = array();
foreach ($hotlines as $hl) {
    $hl_clean = trim($hl);
    $hl_tel   = preg_replace('/[^0-9+]/', '', $hl_clean);
    if (!empty($hl_tel)) {
        $hotline_links[] = '<a href="tel:' . $hl_tel . '">' . $hl_clean . '</a>';
    } else {
        $hotline_links[] = $hl_clean;
    }
}
$hotline_html = implode(' - ', $hotline_links);
?>
</main>

<footer class="footer">
  <div class="container">
    <?php if (!empty($footer_logo)) : ?>
      <div class="footer-logo-wrap">
        <a href="<?php echo $footer_url; ?>" target="_blank" rel="noopener">
          <img src="<?php echo $footer_logo; ?>" alt="<?php echo $footer_title; ?>" class="footer-logo" loading="lazy">
        </a>
      </div>
    <?php endif; ?>

    <?php if (!empty($footer_title)) : ?>
      <h4 class="footer-title">
        <a href="<?php echo $footer_url; ?>" target="_blank" rel="noopener">
          <?php echo $footer_title; ?>
        </a>
      </h4>
    <?php endif; ?>

    <p class="footer-website">
      Website: <a href="<?php echo $footer_url; ?>" target="_blank" rel="noopener">homecarevietnam.com</a>
    </p>

    <?php if (!empty($hotline_html)) : ?>
      <p class="footer-hotline">
        Hotline: <?php echo $hotline_html; ?>
      </p>
    <?php endif; ?>

    <?php if (!empty($footer_company)) : ?>
      <p class="footer-company">
        <a href="<?php echo $footer_url; ?>" target="_blank" rel="noopener">
          <?php echo $footer_company; ?>
        </a>
      </p>
    <?php endif; ?>

    <?php if (!empty($footer_address)) : ?>
      <p class="footer-address"><?php echo $footer_address; ?></p>
    <?php endif; ?>

    <?php if (!empty($footer_tax)) : ?>
      <p class="footer-tax"><?php echo $footer_tax; ?></p>
    <?php endif; ?>

    <div class="footer-copy">
      <?php echo !empty($footer_copy) ? $footer_copy : ('© ' . date('Y') . ' Home Care. All rights reserved.'); ?>
    </div>
  </div>
</footer>

<!-- PC FLOATING QUICK CONTACT (Chỉ hiện trên PC góc phải dưới) -->
<aside class="pc-float-contact" aria-label="Liên hệ nhanh">
  <a href="https://zalo.me/<?php echo esc_attr($zalo_clean); ?>" target="_blank" rel="noopener" class="pc-float-btn pc-float-zalo" aria-label="Chat qua Zalo">
    <span class="pc-float-tooltip">Chat Zalo: <?php echo esc_html($zalo_clean); ?></span>
    <span class="pc-float-icon-wrap">
      <svg class="pc-float-svg" viewBox="0 0 48 48" aria-hidden="true">
        <use href="#i-zalo"/>
      </svg>
    </span>
  </a>
  <a href="tel:<?php echo esc_attr($hotline_clean); ?>" class="pc-float-btn pc-float-hotline" aria-label="Gọi Hotline">
    <span class="pc-float-ring"></span>
    <span class="pc-float-ring pc-float-ring-2"></span>
    <span class="pc-float-tooltip">Hotline: <?php echo esc_html($hotline_disp); ?></span>
    <span class="pc-float-icon-wrap">
      <svg class="pc-float-svg" viewBox="0 0 24 24" aria-hidden="true">
        <use href="#i-phone"/>
      </svg>
    </span>
  </a>
</aside>

<!-- MOBILE STICKY BAR (Chỉ hiện trên Mobile: Mua ngay về form, Zalo, Hotline) -->
<div class="sticky" id="sticky">
  <div class="sticky-inner">
    <a href="tel:<?php echo esc_attr($hotline_clean); ?>" class="sticky-action-btn sticky-btn-call" aria-label="Gọi Hotline <?php echo esc_attr($hotline_disp); ?>">
      <span class="sticky-action-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M5 3.5h3.5l1.5 4.5-2.2 1.3a11 11 0 0 0 6.9 6.9L16 14l4.5 1.5V19a1.5 1.5 0 0 1-1.6 1.5C10.7 20 4 13.3 3.5 5.1A1.5 1.5 0 0 1 5 3.5z"/>
        </svg>
      </span>
      <span class="sticky-action-label">Hotline</span>
    </a>

    <a href="https://zalo.me/<?php echo esc_attr($zalo_clean); ?>" target="_blank" rel="noopener" class="sticky-action-btn sticky-btn-zalo" aria-label="Chat Zalo <?php echo esc_attr($zalo_clean); ?>">
      <span class="sticky-action-icon">
        <svg viewBox="0 0 48 48" aria-hidden="true">
          <use href="#i-zalo"/>
        </svg>
      </span>
      <span class="sticky-action-label">Zalo</span>
    </a>

    <a href="#dat-hang" class="sticky-btn-buy" id="stickyBuyBtn" aria-label="Mua ngay giá 49.000đ cuộn về form đặt hàng">
      <span class="sticky-buy-text">Mua ngay</span>
      <span class="sticky-buy-sep">·</span>
      <span class="sticky-buy-price">49.000đ</span>
      <svg class="sticky-buy-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M9 5l7 7-7 7"/>
      </svg>
    </a>
  </div>
</div>

<div class="lightbox" id="lightbox" aria-hidden="true" role="dialog" aria-label="Xem ảnh">
  <button type="button" class="lb-btn lb-close" aria-label="Đóng"><svg class="icon"><use href="#i-close"/></svg></button>
  <button type="button" class="lb-btn lb-prev" aria-label="Ảnh trước"><svg class="icon"><use href="#i-chev-l"/></svg></button>
  <img alt="">
  <button type="button" class="lb-btn lb-next" aria-label="Ảnh tiếp"><svg class="icon"><use href="#i-chev-r"/></svg></button>
  <div class="lb-count"></div>
</div>

<div class="modal" id="vmodal" aria-hidden="true" role="dialog" aria-label="Xem video">
  <button type="button" class="lb-btn lb-close" aria-label="Đóng"><svg class="icon"><use href="#i-close"/></svg></button>
  <div class="modal-inner"></div>
</div>

<!-- ORDER NOTIFICATION TOAST (SEEDING GÓC MÀN HÌNH - CHỈ TEXT) -->
<aside class="order-toast" id="orderToast" aria-live="polite" role="status" style="display:none;">
  <button type="button" class="order-toast-close" id="orderToastClose" aria-label="Đóng thông báo">&times;</button>
  <div class="order-toast-content">
    <p class="order-toast-buyer"><strong id="toastBuyer">Chị Thu Trang (Hà Nội)</strong> vừa đặt mua</p>
    <p class="order-toast-product"><span id="toastPackage">Combo 2 chai 30ml</span> · <span id="toastTime" style="color:var(--herb);font-weight:500;">Vừa xong</span></p>
    <div class="order-toast-badge"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>Đã xác nhận đơn hàng</div>
  </div>
</aside>

<?php wp_footer(); ?>
</body>
</html>
