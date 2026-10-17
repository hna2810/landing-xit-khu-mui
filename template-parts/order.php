<?php
/**
 * Order Form Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$order_img = lx_get_image_url('lx_order_image', '');
if (empty($order_img)) {
    $order_img = lx_get_image_url('lx_hero_product_image', '');
}
$sheet_url = lx_get_field('lx_sheet_endpoint', 'option', 'https://script.google.com/macros/s/AKfycbx2mCi48FGEQtg9pjX_YuWUxFbQdxe2aj5iUHDDj4-4s9qLyykE6EZySZ1V6UnZydHJ-A/exec');
?>
<!-- ORDER -->
<section class="section order panel" id="dat-hang">
  <div class="container">
    <div class="order-copy">
      <p class="label reveal">Đặt hàng</p>
      <h2 class="display reveal d1">Đừng để nỗi lo mùi cơ thể làm bạn <em>thiếu tự tin.</em></h2>
      <p class="lead reveal d1">Chủ động chăm sóc bản thân mỗi ngày với Xịt Khử Mùi Gừng Cam Mây Mây.</p>
      <?php
      $timer_enable_val = function_exists('get_field') ? get_field('lx_timer_enable', 'option') : null;
      $timer_enable     = ($timer_enable_val === null || $timer_enable_val === '') ? true : (bool) $timer_enable_val;
      $timer_title      = lx_get_field('lx_timer_title', 'option', 'Flash sale kết thúc sau');
      if (empty($timer_title)) {
          $timer_title = 'Flash sale kết thúc sau';
      }
      ?>
      <?php if ($timer_enable) : ?>
        <div class="timer reveal d2" id="timerBlock">
          <span id="timerTitle"><?php echo $timer_title; ?></span>
          <b id="timer">00:00:00</b>
        </div>
      <?php endif; ?>
      <div class="order-visual reveal d3" id="orderVisual">
        <?php if (!empty($order_img)) : ?>
          <img src="<?php echo $order_img; ?>" alt="Xịt Khử Mùi Gừng Cam Mây Mây" loading="lazy">
        <?php else : ?>
          <svg class="bottle-render" viewBox="0 0 160 380" aria-label="Chai xịt khử mùi gừng cam Mây Mây 30ml" style="width:58%; max-height:88%; z-index:2; position:relative;">
            <use href="#bottle-shape"/>
          </svg>
          <svg class="botanical b1" viewBox="0 0 84 84" style="z-index:1;"><use href="#b-mint"/></svg>
          <svg class="botanical b2" viewBox="0 0 84 84" style="z-index:1;"><use href="#b-orange"/></svg>
        <?php endif; ?>
      </div>
    </div>

    <div class="form-card reveal d1">
      <div id="formContent">
        <h3>Điền thông tin để đặt hàng</h3>
        <?php
        if (function_exists('lx_render_order_form')) {
            echo lx_render_order_form();
        }
        ?>
      </div>
      <div class="success" id="success" role="status" style="display:none;">
        <div class="check"><svg class="icon" style="width:30px;height:30px"><use href="#i-check"/></svg></div>
        <h3>Đặt hàng thành công</h3>
        <p>Cảm ơn <b id="sName">bạn</b>. Mây Mây sẽ liên hệ số <b id="sPhone"></b> để xác nhận đơn hàng.</p>
      </div>
    </div>
  </div>
</section>
