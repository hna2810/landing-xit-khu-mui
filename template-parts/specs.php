<?php
/**
 * Specifications Table Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$spec_capacity = lx_get_field('lx_spec_capacity', 'option', '30ml');
$spec_cbmp     = lx_get_field('lx_spec_cbmp', 'option', '60/26/CBMP-NB');
$spec_expiry   = lx_get_field('lx_spec_expiry', 'option', '02 năm');
$spec_storage  = lx_get_field('lx_spec_storage', 'option', 'Nơi khô thoáng, tránh ánh nắng trực tiếp.');
?>
<!-- SPECS -->
<section class="section" id="thong-tin">
  <div class="container specs">
    <div>
      <p class="label reveal">Thông tin bổ sung</p>
      <h2 class="h2 display reveal d1">Xịt Khử Mùi Gừng Cam Mây Mây.</h2>
    </div>
    <div class="spec-card reveal d1"><table class="spec-table">
      <tr><th>Dung tích</th><td><?php echo $spec_capacity; ?></td></tr>
      <tr><th>Số công bố</th><td><?php echo $spec_cbmp; ?></td></tr>
      <tr><th>Hạn sử dụng</th><td><?php echo $spec_expiry; ?></td></tr>
      <tr><th>Bảo quản</th><td><?php echo $spec_storage; ?></td></tr>
    </table></div>
  </div>
</section>
