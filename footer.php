<?php
/**
 * Footer template for Landing Xịt Khử Mùi Theme
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
</main>

<footer class="footer">
  <div class="container">
    <div class="logo">Mây Mây</div>
    <p class="footer-tagline">Chăm sóc cơ thể thơm mát, tự tin hơn trong từng khoảnh khắc.</p>
    <div class="footer-bottom">
      <span>© <span id="year"><?php echo esc_html(date('Y')); ?></span> Home Care Việt Nam</span>
      <span>Số công bố 60/26/CBMP-NB</span>
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

<?php
$toast_img = lx_get_image_url('lx_hero_product_image', '');
?>
<!-- ORDER NOTIFICATION TOAST (SEEDING GÓC MÀN HÌNH) -->
<aside class="order-toast" id="orderToast" aria-live="polite" role="status" style="display:none;">
  <button type="button" class="order-toast-close" id="orderToastClose" aria-label="Đóng thông báo">&times;</button>
  <div class="order-toast-thumb">
    <?php if (!empty($toast_img)) : ?>
      <img src="<?php echo esc_url($toast_img); ?>" alt="Xịt khử mùi Gừng Cam Mây Mây">
    <?php else : ?>
      <svg viewBox="0 0 240 560" style="width:24px;height:40px;"><use href="#packshot"/></svg>
    <?php endif; ?>
  </div>
  <div class="order-toast-content">
    <p class="order-toast-buyer"><strong id="toastBuyer">Chị Thu Trang (Hà Nội)</strong> vừa đặt mua</p>
    <p class="order-toast-product"><span id="toastPackage">Combo 2 chai 30ml</span> · <span id="toastTime" style="color:var(--herb);font-weight:500;">Vừa xong</span></p>
    <div class="order-toast-badge"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>Đã xác nhận đơn hàng</div>
  </div>
</aside>

<?php wp_footer(); ?>
</body>
</html>
