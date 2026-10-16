<?php
/**
 * Trust & Commitments Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$cert_doc_img   = lx_get_image_url('lx_cert_doc_image', '');
$cert_stamp_img = lx_get_image_url('lx_cert_stamp_image', '');

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

if (empty($cert_doc_img) && !empty($cert_urls[0])) {
    $cert_doc_img = $cert_urls[0];
}
if (empty($cert_stamp_img) && !empty($cert_urls[1])) {
    $cert_stamp_img = $cert_urls[1];
}

$cert_items = array(
    array(
        'id'    => 'doc',
        'title' => 'Giấy công bố mỹ phẩm',
        'image' => $cert_doc_img,
    ),
    array(
        'id'    => 'stamp',
        'title' => 'Tem chống hàng giả',
        'image' => $cert_stamp_img,
    ),
);
?>
<!-- TRUST -->
<section class="section trust panel" id="cam-ket">
  <div class="container">
    <p class="label reveal">Cam kết</p>
    <h2 class="h2 display reveal d1">Yên tâm khi chọn <em>Mây Mây.</em></h2>
    <div class="trust-grid" id="trustGrid">
      <div class="trust-item reveal">
        <svg class="icon"><use href="#i-doc"/></svg>
        <h3>Đã công bố mỹ phẩm</h3>
        <p>Số công bố 60/26/CBMP-NB được cấp bởi Sở Y Tế.</p>
      </div>
      <div class="trust-item reveal d1">
        <svg class="icon"><use href="#i-leaf"/></svg>
        <h3>Thảo mộc thuần chay</h3>
        <p>Chiết xuất 100% thảo mộc tự nhiên: Bạc hà, trầu không, gừng và cam.</p>
      </div>
      <div class="trust-item reveal d2">
        <svg class="icon"><use href="#i-truck"/></svg>
        <h3>Freeship toàn quốc</h3>
        <p>Miễn phí vận chuyển tận nhà trên toàn quốc, kiểm tra trước khi nhận.</p>
      </div>
      <div class="trust-item reveal d3">
        <svg class="icon"><use href="#i-phone"/></svg>
        <h3>Xác nhận trước khi giao</h3>
        <p>Mây Mây gọi điện xác nhận thông tin đơn hàng trước khi gửi đi.</p>
      </div>
    </div>
    <div class="certs" id="certs">
      <?php foreach ($cert_items as $idx => $item) : ?>
        <?php if (!empty($item['image'])) : ?>
          <button type="button" class="cert-card has-img reveal d<?php echo ($idx + 1); ?>" data-i="<?php echo $idx; ?>" aria-label="Xem <?php echo esc_attr($item['title']); ?>">
            <div class="cert-img-wrap">
              <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>" loading="lazy">
            </div>
            <div class="cert-caption">
              <b><?php echo esc_html($item['title']); ?></b>
            </div>
          </button>
        <?php else : ?>
          <div class="ph cert-ph reveal d<?php echo ($idx + 1); ?>">
            <span class="ph-badge">Chờ nội dung</span>
            <div class="ph-content">
              <svg class="icon" style="width:36px;height:36px;margin:0 auto 10px;opacity:.5;"><use href="#i-doc"/></svg>
              <b><?php echo esc_html($item['title']); ?></b>
              <small style="display:block;margin-top:4px;opacity:.65;">Ảnh dọc 3:4</small>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
