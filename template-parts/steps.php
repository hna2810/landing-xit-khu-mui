<?php
/**
 * 3 Steps Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$s1_img = lx_get_image_url('lx_step_1_image', '');
$s2_img = lx_get_image_url('lx_step_2_image', '');
$s3_img = lx_get_image_url('lx_step_3_image', '');
?>
<!-- STEPS -->
<section class="section steps-sec panel" id="cach-dung">
  <div class="container">
    <p class="label reveal">Cách dùng</p>
    <h2 class="h2 display reveal d1">3 bước đơn giản để sử dụng.</h2>
    <div class="steps">
      <div class="step reveal">
        <div class="step-img" data-step="0" style="overflow:hidden; position:relative; display:flex; align-items:center; justify-content:center;">
          <span class="step-num" style="z-index:3;">01</span>
          <?php if (!empty($s1_img)) : ?>
            <img src="<?php echo $s1_img; ?>" alt="Bước 1: Lắc nhẹ chai xịt" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0; z-index:1;">
          <?php endif; ?>
        </div>
        <h3>Lắc nhẹ chai xịt</h3>
        <p>Lắc nhẹ chai trước khi sử dụng.</p>
      </div>

      <div class="step reveal d1">
        <div class="step-img" data-step="1" style="overflow:hidden; position:relative; display:flex; align-items:center; justify-content:center;">
          <span class="step-num" style="z-index:3;">02</span>
          <?php if (!empty($s2_img)) : ?>
            <img src="<?php echo $s2_img; ?>" alt="Bước 2: Xịt lên vùng da" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0; z-index:1;">
          <?php endif; ?>
        </div>
        <h3>Xịt lên vùng da</h3>
        <p>Xịt lên vùng da, cách khoảng 10 – 15cm.</p>
      </div>

      <div class="step reveal d2">
        <div class="step-img" data-step="2" style="overflow:hidden; position:relative; display:flex; align-items:center; justify-content:center;">
          <span class="step-num" style="z-index:3;">03</span>
          <?php if (!empty($s3_img)) : ?>
            <img src="<?php echo $s3_img; ?>" alt="Bước 3: Để da khô tự nhiên" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0; z-index:1;">
          <?php endif; ?>
        </div>
        <h3>Để da khô tự nhiên</h3>
        <p>Để da khô tự nhiên, sau đó mặc quần áo.</p>
      </div>
    </div>
    <div class="caution reveal">
      <svg class="icon"><use href="#i-alert"/></svg>
      <span><b>Lưu ý:</b> Không xịt vào mắt, niêm mạc hoặc vùng da tổn thương.</span>
    </div>
  </div>
</section>
