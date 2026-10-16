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

<?php wp_footer(); ?>
</body>
</html>
