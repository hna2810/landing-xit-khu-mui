<?php
/**
 * Ingredients Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$ing1_img  = lx_get_image_url('lx_ing_1_image', '');
$ing1_role = lx_get_field('lx_ing_1_role', 'option', 'Mát lạnh, sảng khoái');

$ing2_img  = lx_get_image_url('lx_ing_2_image', '');
$ing2_role = lx_get_field('lx_ing_2_role', 'option', 'Thảo mộc dân gian quen thuộc');

$ing3_img  = lx_get_image_url('lx_ing_3_image', '');
$ing3_role = lx_get_field('lx_ing_3_role', 'option', 'Ấm nhẹ, dễ chịu');

$ing4_img  = lx_get_image_url('lx_ing_4_image', '');
$ing4_role = lx_get_field('lx_ing_4_role', 'option', 'Tươi tắn, thơm thanh');
?>
<!-- INGREDIENTS -->
<section class="section ingredients-sec panel" id="thanh-phan">
  <div class="container">
    <div class="text-center">
      <p class="label center reveal">Xịt khử mùi Mây Mây</p>
      <h2 class="h2 display reveal d1">Chăm sóc mùi cơ thể,<br><em>thêm tự tin mỗi ngày.</em></h2>
      <p class="lead reveal d2">Mây Mây mang đến giải pháp chăm sóc mùi cơ thể với thành phần thảo mộc thuần chay bí truyền từ bạc hà, trầu không, gừng và cam.</p>
    </div>
    <div class="ing-grid reveal">
      <div class="ing">
        <div class="ing-media" data-ing="0" style="overflow:hidden; display:flex; align-items:center; justify-content:center;">
          <?php if (!empty($ing1_img)) : ?>
            <img src="<?php echo $ing1_img; ?>" alt="Bạc hà" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
          <?php else : ?>
            <svg><use href="#b-mint"/></svg>
          <?php endif; ?>
        </div>
        <h3>Bạc hà</h3>
        <p><?php echo $ing1_role; ?></p>
      </div>

      <div class="ing">
        <div class="ing-media" data-ing="1" style="overflow:hidden; display:flex; align-items:center; justify-content:center;">
          <?php if (!empty($ing2_img)) : ?>
            <img src="<?php echo $ing2_img; ?>" alt="Trầu không" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
          <?php else : ?>
            <svg><use href="#b-betel"/></svg>
          <?php endif; ?>
        </div>
        <h3>Trầu không</h3>
        <p><?php echo $ing2_role; ?></p>
      </div>

      <div class="ing">
        <div class="ing-media" data-ing="2" style="overflow:hidden; display:flex; align-items:center; justify-content:center;">
          <?php if (!empty($ing3_img)) : ?>
            <img src="<?php echo $ing3_img; ?>" alt="Gừng" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
          <?php else : ?>
            <svg><use href="#b-ginger"/></svg>
          <?php endif; ?>
        </div>
        <h3>Gừng</h3>
        <p><?php echo $ing3_role; ?></p>
      </div>

      <div class="ing">
        <div class="ing-media" data-ing="3" style="overflow:hidden; display:flex; align-items:center; justify-content:center;">
          <?php if (!empty($ing4_img)) : ?>
            <img src="<?php echo $ing4_img; ?>" alt="Cam" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
          <?php else : ?>
            <svg><use href="#b-orange"/></svg>
          <?php endif; ?>
        </div>
        <h3>Cam</h3>
        <p><?php echo $ing4_role; ?></p>
      </div>
    </div>
    <p class="ing-note reveal">Hương thảo mộc thanh mát mang đến trải nghiệm dễ chịu.</p>
  </div>
</section>
