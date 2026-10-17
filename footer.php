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

<div class="sticky" id="sticky">
  <div class="container">
    <div class="sticky-price"><b>49.000đ</b><s>89.000đ</s><small>Freeship toàn quốc</small></div>
    <a href="#dat-hang" class="btn">Mua ngay</a>
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
