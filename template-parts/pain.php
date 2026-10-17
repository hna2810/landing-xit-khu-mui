<?php
/**
 * Pain Points Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$p1_img   = lx_get_image_url('lx_pain_1_image', '');
$p1_title = lx_get_field('lx_pain_1_title', 'option', 'Hôi nách');
$p1_desc  = lx_get_field('lx_pain_1_desc', 'option', 'Ngại giơ tay, đứng gần người khác, lo mùi quay trở lại.');

$p2_img   = lx_get_image_url('lx_pain_2_image', '');
$p2_title = lx_get_field('lx_pain_2_title', 'option', 'Hôi chân');
$p2_desc  = lx_get_field('lx_pain_2_desc', 'option', 'Mang giày cả ngày, ngại tháo giày vì mùi khó chịu.');

$p3_img   = lx_get_image_url('lx_pain_3_image', '');
$p3_title = lx_get_field('lx_pain_3_title', 'option', 'Mùi cơ thể');
$p3_desc  = lx_get_field('lx_pain_3_desc', 'option', 'Đi làm, gặp gỡ hay hẹn hò đều thấp thỏm vì mùi mồ hôi.');

$p4_img   = lx_get_image_url('lx_pain_4_image', '');
$p4_title = lx_get_field('lx_pain_4_title', 'option', 'Bà đẻ sau sinh');
$p4_desc  = lx_get_field('lx_pain_4_desc', 'option', 'Mùi sữa, cơ thể mẹ có mùi chua, hôi, khó chịu. Mùi vùng cô bé.');
?>
<!-- PROBLEMS -->
<section class="section" id="noi-lo">
  <div class="container">
    <div class="problems-head">
      <p class="label reveal">Nỗi lo thầm kín</p>
      <h2 class="h2 display reveal d1">Mùi cơ thể khiến bạn <em>ngại ngùng</em> hơn bạn nghĩ.</h2>
    </div>
    <div class="problems">
      <article class="problem reveal">
        <div class="problem-img" data-problem="0" style="overflow:hidden; display:flex; align-items:center; justify-content:center;">
          <?php if (!empty($p1_img)) : ?>
            <img src="<?php echo $p1_img; ?>" alt="<?php echo $p1_title; ?>" style="width:100%; height:100%; object-fit:cover;">
          <?php endif; ?>
        </div>
        <h3><?php echo $p1_title; ?></h3>
        <p><?php echo $p1_desc; ?></p>
      </article>

      <article class="problem reveal d1">
        <div class="problem-img" data-problem="1" style="overflow:hidden; display:flex; align-items:center; justify-content:center;">
          <?php if (!empty($p2_img)) : ?>
            <img src="<?php echo $p2_img; ?>" alt="<?php echo $p2_title; ?>" style="width:100%; height:100%; object-fit:cover;">
          <?php endif; ?>
        </div>
        <h3><?php echo $p2_title; ?></h3>
        <p><?php echo $p2_desc; ?></p>
      </article>

      <article class="problem reveal d2">
        <div class="problem-img" data-problem="2" style="overflow:hidden; display:flex; align-items:center; justify-content:center;">
          <?php if (!empty($p3_img)) : ?>
            <img src="<?php echo $p3_img; ?>" alt="<?php echo $p3_title; ?>" style="width:100%; height:100%; object-fit:cover;">
          <?php endif; ?>
        </div>
        <h3><?php echo $p3_title; ?></h3>
        <p><?php echo $p3_desc; ?></p>
      </article>

      <article class="problem reveal d3">
        <div class="problem-img" data-problem="3" style="overflow:hidden; display:flex; align-items:center; justify-content:center;">
          <?php if (!empty($p4_img)) : ?>
            <img src="<?php echo $p4_img; ?>" alt="<?php echo $p4_title; ?>" style="width:100%; height:100%; object-fit:cover;">
          <?php endif; ?>
        </div>
        <h3><?php echo $p4_title; ?></h3>
        <p><?php echo $p4_desc; ?></p>
      </article>
    </div>
    <div class="callout reveal">
      <p>Đừng để nỗi lo mùi cơ thể cản trở những khoảnh khắc tự tin của bạn.</p>
      <a href="#thanh-phan" class="btn">Xem giải pháp <svg class="icon"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>
