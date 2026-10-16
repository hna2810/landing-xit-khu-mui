<?php
/**
 * Trust & Commitments Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$certs = lx_get_field('lx_certificate_gallery', 'option', array());
?>
<!-- TRUST -->
<section class="section trust panel" id="cam-ket">
  <div class="container">
    <p class="label reveal">Cam kết</p>
    <h2 class="h2 display reveal d1">Yên tâm khi chọn <em>Mây Mây.</em></h2>
    <div class="trust-grid" id="trustGrid">
      <div class="trust-card reveal">
        <svg class="icon"><use href="#i-doc"/></svg>
        <h3>Đã công bố mỹ phẩm</h3>
        <p>Số công bố 60/26/CBMP-NB được cấp bởi Sở Y Tế.</p>
      </div>
      <div class="trust-card reveal d1">
        <svg class="icon"><use href="#i-leaf"/></svg>
        <h3>Thảo mộc thuần chay</h3>
        <p>Chiết xuất 100% thảo mộc tự nhiên: Bạc hà, trầu không, gừng và cam.</p>
      </div>
      <div class="trust-card reveal d2">
        <svg class="icon"><use href="#i-truck"/></svg>
        <h3>Freeship toàn quốc</h3>
        <p>Miễn phí vận chuyển tận nhà trên toàn quốc, kiểm tra trước khi nhận.</p>
      </div>
      <div class="trust-card reveal d3">
        <svg class="icon"><use href="#i-phone"/></svg>
        <h3>Xác nhận trước khi giao</h3>
        <p>Mây Mây gọi điện xác nhận thông tin đơn hàng trước khi gửi đi.</p>
      </div>
    </div>
    <div class="certs" id="certs">
      <?php if (!empty($certs) && is_array($certs)) : ?>
        <?php foreach ($certs as $c_img) : 
          $c_url = is_array($c_img) ? (isset($c_img['url']) ? $c_img['url'] : '') : $c_img;
          if (!$c_url) continue;
        ?>
          <div class="cert-item reveal" style="border-radius:12px; overflow:hidden; border:1px solid #ffd8b8;">
            <img src="<?php echo $c_url; ?>" alt="Giấy chứng nhận công bố" style="width:100%; display:block; border-radius:12px;">
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
